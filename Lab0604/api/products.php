<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//  http://localhost:Lab0603/products/12 just pattern use for call page
$app->get('/products/{id}', function (Request $request, Response $response, array $args) {
    $productid = $args['id']; // Peter
    $response->getBody()->write("Product GET, $productid");
    return $response;
});

// $app->post('/hello', function (Request $request, Response $response, array $args) {
//     $body = $request->getParsedBody();
//     $name = $body['name']; 
//     $response->getBody()->write("Hello POST, $name");
//     return $response;
// });

?>