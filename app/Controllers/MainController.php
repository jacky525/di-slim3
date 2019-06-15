<?php
namespace Slim\Controllers;

use Jbcp104\Modules\Job\Services\AcService;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Interop\Container\ContainerInterface;
//use Throwable;
use \Slim\Services\TestService;
/**
 * Class MainController
 * @package Slim\Controllers
 */
class MainController
{
    /**
     * @var ContainerInterface
     */
    protected $container;
    private $testService;
    private $cache;
    /**
     * MainController constructor.
     * @param ContainerInterface $container
     */
    public function __construct(\Psr\Container\ContainerInterface $container)
    {

        $this->container = $container;
        $this->cache = $this->container->get('cache');
//        var_dump($cache);
//        $this->testService = $this->container->get('TestService');
        $this->testService = new TestService($this->cache);

    }


    /**
     * @param $name
     * @param $request
     * @param $response
     * @return mixed
     */
    public function hello($name , $request, $response )
    {

        $data = $this->testService->hello();

        $response->getBody()->write("Hello, $name $data ");
        return $response;
    }

}
