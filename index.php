<?php
require "vendor/autoload.php";

$app = new Slim\App();

$app->get('/tema', function($request, $response, $args){
    $response->write("<h1>Respuesta Correcta</h1>");
    return $response;
});

$app->run();
?>
