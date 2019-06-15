<?php

$default = [
//    'config' => DI\create(\Noodlehaus\Config::class)->constructor(APP_ROOT . '/config'),
//    var_dump($config);
//        'test' => function (ContainerInterface $container) {
//            return new Slim\Controllers\TestController($container);
//        },
//        'test' => DI\create(Slim\Controllers\TestController),
//        'test' => function () {
//            return new Slim\Controllers\TestController();
//        },
//        \Slim\Views\Twig::class => function (ContainerInterface $c) {
//            $twig = new \Slim\Views\Twig('path/to/templates', [
//                'cache' => $config->get('cache.path.filesystemCache')
//            ]);
//
//            $twig->addExtension(new \Slim\Views\TwigExtension(
//                $c->get('router'),
//                $c->get('request')->getUri()
//            ));
//
//            return $twig;
//        },
//    Slim\Controllers\MainController::class => function (ContainerInterface $c) {
//        return new Slim\Controllers\MainController();
////        $TestController = new Slim\Controllers\MainController($c);
////         return $TestController;
//    },
////    Slim\Controllers\MainController::class => DI\decorate(function (ContainerInterface $c) {
////        // Wrap the database repository in a cache proxy
////        return new Slim\Controllers\MainController($c);
////    }),
//    // cache
//    CacheInterface::class => function (ContainerInterface $c) {
//        return $c->get(MemcachedCache::class);
//    },
//    FilesystemCache::class => function (ContainerInterface $c) {
//        $config = $c->get('config');
//
//        return new FilesystemCache('', 0, $config->get('cache.path.filesystemCache'));
//    },
//    Psr\Log\LoggerInterface::class => DI\factory(function () {
//        $logger = new Logger('mylog');
//        $fileHandler = new StreamHandler(APP_ROOT .'/log/access.log', Logger::DEBUG);
//        $fileHandler->setFormatter(new LineFormatter());
//        $logger->pushHandler($fileHandler);
//
//        return $logger;
//    }),

];
//echo $config->get('cache.path.filesystemCache');
//var_dump($config);

return $default;
