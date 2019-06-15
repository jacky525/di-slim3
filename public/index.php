<?php
use Noodlehaus\Config;
use Slim\Components\AppEnvConstant;
use DI\ContainerBuilder;

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


//error_reporting(E_ALL&~E_NOTICE);

define('APP_ROOT', dirname(dirname(__FILE__)));
require APP_ROOT . '/vendor/autoload.php';

$appEnvConfig = null;
try {
    //Load env
    $envFileName = '/.env.slim.ini';
    $envFilePath = APP_ROOT . $envFileName;
    if (!file_exists($envFilePath)) {
        $envFilePath = '/opt' . $envFileName;
    }
    //default read example.ini
    if (!file_exists($envFilePath)) {
        $envFilePath = APP_ROOT . '/.env.example.ini';
    }
    $appEnvConfig = Config::load($envFilePath);
} catch (Throwable $t) {
    throw new Exception('No envFile.');
}

//var_dump($appEnvConfig);
//==========
define('APP_ENV', $appEnvConfig['APP_ENV'] ? $appEnvConfig['APP_ENV'] : AppEnvConstant::LAB_ENV);
define('APP_DEBUG', (boolean)$appEnvConfig['APP_DEBUG']);


//Load Config
$config = Config::load(APP_ROOT . '/config.dist.yml')->get(APP_ENV);
$settings = [
    'config' => $config,
    'settings' => [
        'displayErrorDetails' => APP_DEBUG,
        'determineRouteBeforeAppMiddleware' => true,
        'routerCacheFile' => ( APP_ENV === AppEnvConstant::PRODUCTION_ENV) ? APP_ROOT . '/cache/routes.php' : false
    ]
];

//Load dbConfig
$appDatabaseConfig = require_once APP_ROOT . '/config/database.php';
//==================



$app = new class() extends \DI\Bridge\Slim\App {

    protected function configureContainer(ContainerBuilder $builder)
    {

        $cacheConf = require APP_ROOT . '/config/cache.php';
        $builder->enableCompilation(APP_ROOT . '/cache/compiler-cache/compiler');

        //  The cache relies on APCu directly because it is the only cache system
        //  $builder->enableDefinitionCache();
            // Main definition
//            $builder->addDefinitions(APP_ROOT . '/config/definition.php');


            $definitions = [
                'settings.responseChunkSize' => 4096,
                'settings.outputBuffering' => 'append',
                'settings.determineRouteBeforeAppMiddleware' => false,
                'settings.displayErrorDetails' => false,
                'config' => DI\create(\Noodlehaus\Config::class)->constructor(APP_ROOT . '/config'),
                \Slim\Views\Twig::class => function (\Psr\Container\ContainerInterface $c) {
                    $twig = new \Slim\Views\Twig(APP_ROOT .'/app/templates', [
                        'cache' => APP_ROOT .'/cache'
                    ]);

                    $twig->addExtension(new \Slim\Views\TwigExtension(
                        $c->get('router'),
                        $c->get('request')->getUri()
                    ));

                    return $twig;
                },
                'test' => function (\Psr\Container\ContainerInterface $container) {
                    return new Slim\Controllers\TestController();
                },
                'MainController' => function (\Psr\Container\ContainerInterface $container) {
                    return new Slim\Controllers\MainController($container);
                },
                'cache' => function (\Psr\Container\ContainerInterface $container) {
                    $slim = new \DI\Bridge\Slim\App;
                    $cache =  new \SNicholson\SlimFileCache\Cache( $slim,APP_ROOT .'/cache');
                    return $cache;
                },
            ];

            $builder->addDefinitions($definitions);

    }
};

/*
 * Load define constant file
 */
require_once APP_ROOT . '/config/envConstant.php';

/*
 * Load Routes
 */
$routeFiles = glob(APP_ROOT . '/route/*.php');
foreach ($routeFiles as $file) {
    require_once $file;
}


$app->run();
exit;


//以下為測試範例
$app = new \DI\Bridge\Slim\App;

$app->get('/hello/{name}', function ( Response $response,$name,Request $request) {
//    $name = $request->withRequestTarget('name');
//    var_dump($name);
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->run();
