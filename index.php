<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require 'vendor/autoload.php';


$app = AppFactory::create();

$app->addRoutingMiddleware();

$app->get('/', function ($request, $response, $args) {
    $response->getBody()->write("Hello, world!");
    return $response;
});

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

$app->run();

?>