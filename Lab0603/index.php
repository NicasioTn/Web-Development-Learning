<?php
// import source code
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

//load libary 
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Lab0603');

//  http://localhost:Lab0603/helo/Peter just pattern use for call page
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name']; // Peter
    $response->getBody()->write("Hello GET, $name");
    return $response;
});

$app->post('/hello', function (Request $request, Response $response, array $args) {
    $body = $request->getParsedBody();
    $name = $body['name']; 
    $response->getBody()->write("Hello POST, $name");
    return $response;
});





$app->run();
