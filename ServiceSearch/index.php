<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';


$app = AppFactory::create();
$app->setBasePath('/ServiceSearch');

$app->get('/hello', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world! Ten");
    return $response;
});
require __DIR__ . '/dbconn.php';
require __DIR__ . '/api/mukata.php';
require __DIR__ . '/api/tour.php';


$app->run();