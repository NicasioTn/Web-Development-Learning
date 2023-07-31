<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// import source code
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/customers/{id}', function (Request $request, Response $response, array $args) {
    $customerid = $args['id']; // Peter
    $response->getBody()->write("Customer GET, $customerid");
    return $response;
});
?>