<?php

  require "vendor/autoload.php";

  use Slim\Views\PhpRenderer;

  $app = new \Slim\App();
  $con = $app->getContainer();


  $con['urlbase'] = "/MariaB/proyectGit";


  $app->run();

 ?>
