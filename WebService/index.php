<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';
$app = AppFactory::create(); 
$app->setBasePath('/WebService');

require __DIR__ . '/dbconn.php';
require __DIR__ . '/api/products.php';
require __DIR__ . '/api/employees.php';
require __DIR__ . '/api/Mukata.php';

$app->run();

