<?php
try{
        $conexion = new PDO("mysql:host=localhost", "root");
       }catch(PDOException $e){
           echo "Error: ".$e->getMessage();
           die();
       }

       $sql = "drop database if exists juegoPreguntas;";
       $res = $conexion->exec($sql);

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
   Id int primary key auto_increment,
   titulo varchar(20) not null,
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
  Tema varchar(20)

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
   respuesta varchar(20),
   verdadera tinyint(1),
   pregunta varchar(20)
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
insert into Temas(Id,titulo,titulo_url) values
(1,'HTML',1),(2,'JavaScript',2),(3,'CSS',3),(4,'PHP',4);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
       }
/* Insert informacion tabla preguntas */
       $sql = <<<sql
insert into preguntas(pregunta,tema) values
('Existe el HTML',1),('Existe el javaScript',2),('Existe el CSS',3),('Existe el PHP',4);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
       }

       /* Insert informacion tabla respuesta */
       $sql = <<<sql
insert into respuesta(id,respuesta,verdadera,pregunta) values
(1,'SI',1,1),
(2,'SI',1,2),
(3,'SI',1,3),
(4,'SI',1,4);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
    }
?>
