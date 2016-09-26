<?php
  class Estadistica{
    public function __invoke($request, $response, $next){
        $conexion = new PDO("mysql:host=localhost;dbname=install", "root");
        $sql = "insert into estadistica(contador) value(10);";

        $conexion->exec($sql);

    return $next($request, $response);
    }
  }
?>
