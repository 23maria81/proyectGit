<?php
  require 'vendor/autoload.php';
  $app = new \Slim\App();
  $app->get("/", function ($request, $response, $args) {
    $response->write("<h1>Formularios</h1>");
});
$app->run();
?>
