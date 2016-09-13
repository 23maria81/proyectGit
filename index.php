<?php
  require 'vendor/autoload.php';
  $app = new \Slim\App();
  $app->get("/", function ($request, $response, $args) {
    $response->write("<h1> Markdown:<br> Herramienta de conversion de texto plano a HTML
                      Es un lenguaje de marcado que facilita la escritura </h1>");
});
$app->run();
?>
