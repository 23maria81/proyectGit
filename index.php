<?php
  require 'vendor/autoload.php';

  $app = new \Slim\App();

  $app->get("/", function ($request, $response, $args) {
    $response->write("<h1> Markdown:<br> Herramienta de conversion de texto plano a HTML
                      Es un lenguaje de marcado que facilita la escritura </h1>");

});

$app->run();
?>

 <?php
       try{
           $conexion = new PDO("mysql:host=localhost", "root");
       }catch(PDOException $e){
           echo "Error: ".$e->getMessage();
           die();
       }

       $sql = "create database juegoPreguntas;";
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>No se ha podido crear la base de datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>base de datos creada.</p>";
       }

       $sql = "use juegoPreguntas;";
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>No se ha podido conectar a la base de datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Conectados!!!!</p>";
       }
/*tabla temas*/
       $sql = <<<sql
create table Temas(
   id int primary key auto_increment,
   nombre varchar(20),
   titulo_url varchar(20)
);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>No se ha podido crear la tabla Temas.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Tabla Temas creada!!!</p>";
       }

/* tabla preguntas */
       $sql = <<<sql
create table preguntas(
   id int primary key auto_increment,
  pregunta varchar(30),
  tema (50)

);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>No se ha podido crear la tabla preguntas.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Tabla preguntas creada!!!</p>";
       }

       /* tabla respuesta */
       $sql = <<<sql
create table respuesta(
   id int primary key auto_increment,
   respuesta varchar(50),
   verdadera (false),

   primary key(id, Temas),
   foreign key(id) references preguntas(id),
   foreign key(id) references respuesta(id)
);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>No se ha podido crear la tabla respuesta</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Tabla respuesta creada!!!</p>";
       }

       /* insertar informacion en tabla Temas */
       $sql = <<<sql
insert into Temas(titulo) values
("La casa"),("El perro"),("El carro"),("La montaña");
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
       }


       /* Insert asignatura */
       $sql = <<<sql
insert into asignatura(nombre) values
("HTML"),("CSS"),("JavaScript"),("PHP");
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
       }

       /* Insert alumno_asignatura */
       $sql = <<<sql
insert into alumno_asignatura(alumno,asignatura,nota) values
(1,1,7),
(1,2,10),
(3,3,7),
(4,3,5);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
       }
       ?>
