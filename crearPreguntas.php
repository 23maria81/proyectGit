<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>formularios</title>
</head>
<body>
    <h1>Agregar informacion a la base de datos</h1>

    <form method="post" action="install.php">
        temas:<input type="Text" name="tema"><br><br>
        preguntas:<input type="Text" name="pregunta"><br><br>
        respuestas:<input type="Text" name="respuesta"><br><br>
        <input type="Submit" name="enviar" value="Agregar respuestas">
    </form>

    <?php
      $conexion = mysql_connect("localhost", "root");
      mysql_select_db("mydb",$e);
      $sql = "INSERT INTO install (preguntas, respuestas, temas)" +
      "VALUES ('$tema', '$pregunta', '$respuesta')";
      $result = mysql_query($sql);
      echo "¡Gracias! Hemos recibido sus datos.\n"
    ?>

</body>
</html>
