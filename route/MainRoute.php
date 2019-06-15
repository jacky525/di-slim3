<?php


//main
$app->get('/hello/{name}', ['MainController', 'hello']);
$app->get('/hello', ['test', 'hello']);


$cache = $app->getContainer()->get('cache');
$app->add($cache);

$app->get('/', function ( $response, \Slim\Views\Twig $twig ) use( $cache ) {

    $str = 'foo response string';

    // add cache
    $cache->add('/', $str,200,['test' => 'test'],10);

    // clear cache
//    $cache->flush();

    return $twig->render($response, 'home.twig');
});

//$app->get('/hello/{name}',function ( $name,Request $request ,Response $response ,Slim\Controllers\MainController $ttt  ) {
//
//      $ttt->hello($request,$response);
////    return this->getContainer()->get('MainController');
////    $response->getBody()->write("Hello, $name");
////    return $response;
//});


