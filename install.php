<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Instalación de CMSimple</title>

        <style>
            .err, .ok{
                border: 1px solid;
                border-radius: 10px;
                padding: 5px;
                margin: 10px;
                display: inline-block;
            }
            .err{
                border-color: rgb(150,0,0);
                background-color: rgb(255,200,200);
                color: rgb(150,0,0);
            }
            .ok{
                border-color: rgb(0,150,0);
                background-color: rgb(200,255,200);
                color: rgb(0,150,0);
            }
        </style>
    </head>
    <body>
        <h1>Instalación Base de datos <strong>Install</strong></h1>
        <ol>
        <?php
            /* Establecer la conexión con el SGBD */
            try{
                $conexion = new PDO("mysql:host=localhost", "root");
                echo "<li>Conexión con el SGBD: <span class='ok'>OK</span></li>";
            }catch(PDOException $e){
                echo "<li>Conexión con el SGBD: <span class='err'>ERROR</span></li>";
            }


            // borramos la base de datos para no tener que borrarla en myAdmin
            $sql="drop database if exists install;";
            $res=$conexion->exec($sql);

            /* Crear la BD */
            $sql = "create database install; use install;";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Creación de la BD: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Creación de la BD: <span class='ok'>OK</span></li>";
            /* Crear la tabla temas */
            $sql = "create table temas(id int auto_increment primary key, titulo varchar(30) not null, titulo_url varchar(30) not null unique);";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Creación de la tabla temas: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Creación de la tabla temas: <span class='ok'>OK</span></li>";
            /* Crear la tabla preguntas */
            $sql = "create table preguntas(id int auto_increment primary key, pregunta varchar(150) not null, tema int, foreign key (tema) references temas(id));";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Creación de la tabla preguntas: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Creación de la tabla preguntas: <span class='ok'>OK</span></li>";
            /* Crear la tabla respuestas */
            $sql = "create table respuestas(id int auto_increment primary key, respuesta varchar(150) not null, verdadera tinyint(1), pregunta int, foreign key (pregunta) references preguntas(id));";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Creación de la tabla respuestas: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Creación de la tabla respuestas: <span class='ok'>OK</span></li>";
            /* Introducir temas de prueba */
            $sql = "insert into temas(titulo, titulo_url) values
                ('Matemáticas', 'matematicas'),
                ('Física', 'fisica');";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Introducción de temas de prueba: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Introducción de temas de prueba: <span class='ok'>OK</span></li>";
            /* Introducir preguntas de prueba */
            $sql = "insert into preguntas(pregunta, tema) values
                ('5+5?', 1);";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Introducción de preguntas de prueba: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Introducción de artículo de preguntas: <span class='ok'>OK</span></li>";
            /* Introducir respuestas de prueba */
            $sql = "insert into respuestas(respuesta, verdadera, pregunta) values
                ('10', 1, 1),('55', 0, 1),('25',0,1),('15',0,1);";
            $res = $conexion->exec($sql);
            $err=$conexion->errorInfo()[2];
            if($res===FALSE) echo "<li>Introducción de respuestas de prueba: <span class='err' title=\"$err\">ERROR</span></li>";
            else echo "<li>Introducción de artículo de respuestas: <span class='ok'>OK</span></li>";
        ?>
        </ol>

        <?php if($res!==FALSE){ ?>
            <p>Instalación finalizada con éxito!!</p>
            <a href='crearPreguntas.php'>Iniciar el programa</a>
        <?php } ?>
    </body>
</html>
