<?php
namespace Slim\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Interop\Container\ContainerInterface;

class TestController
{
    public function __construct()
    {
        echo "im in test controll";
    }
    public function hello(){
        echo "hello world";
    }
}