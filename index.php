<?php
require_once 'vendor/autoload.php';
require_once 'config.php';
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

$app = new \Slim\App;
$pdo = new \Slim\PDO\Database($dsn, $usr, $pwd);

$app->get('/', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args){
    require 'views/main.php';
});

$app->get('/product_info', function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) use ($pdo){
    $statement = $pdo->select()->from('products');
    $res = $statement->execute();
    $data = $res->fetchAll();

    return $response->withJson($data);
});

$app->run();
