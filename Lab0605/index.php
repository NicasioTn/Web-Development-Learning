<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
// import source code
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

//load libary 
require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();
$app->setBasePath('/Lab0605');

require __DIR__ . '/dbconnect.php';
require __DIR__ . '/api/products.php';
require __DIR__ . '/api/customers.php';
require __DIR__ . '/api/Upload.php';



$app->run();
