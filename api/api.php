<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

require 'config.php';

require 'security.php';



$app = new \Slim\App(["settings" => $config]);



$container = $app->getContainer();
$container['db'] = function ($container) {
    try {
        $db = $container['settings']['db'];
        $con = @mysqli_connect($db['servername'], $db['username'], $db['password'], $db['dbname']);
        return $con;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
};


/* test route */

$app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];	
	$sec = new input_validation();
    $response->getBody()/*->write($name);*/->write($sec->check_address($name));
    return $response;
});

/* subscriber routes */

$app->group('/subscriber',function() use ($app) {

    $app->post('/new',function(Request $req, Response $res){
        $formdata = $req->getParsedBody();
        $res->getBody()->write("Hello,". $formdata["vars"]);
        return $res;
    });
    
});



$app->run();