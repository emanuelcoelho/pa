<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

/*
$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");

    return $response;
}); 
*/

require_once('../app/api/books.php');
require_once('../app/api/genres.php');
require_once('../app/api/teste.php');
require_once('../app/api/teste2.php');

$app->run();