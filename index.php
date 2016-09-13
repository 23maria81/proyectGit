<?php
       try{
           $conexion = new PDO("mysql:host=localhost", "root");
       }catch(PDOException $e){
           echo "Error: ".$e->getMessage();
           die();
       }

       $sql = "drop database if exists cursos;";
       $res = $conexion->exec($sql);


       $sql = "create database juego Preguntas;";
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
   id int  auto_increment,
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
   id int  auto_increment,
   respuesta varchar(50),
   verdadera (false),
   pregunta varchar(50)

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
insert into Temas(id,titulo,titulo_url) values
(1,HTML,html),(2,JavaScript,JS),(3,CSS,css),(4,PHP,php);
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
insert into preguntas(id,pregunta,tema) values
(1,Existe el HTML,HTML),(2,Existe el CSS,CSS),(3,Existe el JavaScript,JS),(4,Existe el PHP,PHP);
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
(1,SI,true,1),
(2,SI,true,2),
(3,SI,treu,3),
(4,SI,true,4);
sql;
       $res = $conexion->exec($sql);
       if($res===FALSE){
           echo "<p>Error al añadir datos.</p>";
           echo "<p>".$conexion->errorInfo()[2]."</p>";
       }else{
           echo "<p>Se han añadido $res filas</p>";
    }
?>
