<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Crear Preguntas nuevas en base de datos</title>


        <style type="text/css">
          h1 { text-align: center; }
          td { padding: 0.2em 2em ; }
        </style>

    </head>
    <body>
      <h1> Formularios de  Preguntas </h1>
      <form action="crearPreguntas.php" method="post" id="pregunta"/>

      <p>Temas de preguntas:</p>
      <select name="tema">
         <option>Temas</option>
         <option value="mat">Matematicas</option>
         <option value="hist">Fisica</option>
     </select>

     <p>Escribe una pregunta <input type="text" name="pregunta"/></p>

      <table>
        <tr>
        <td>
        Opciones<br/>
        <input type="radio" name="ver" value="true"/> Verdadera<br/>
        <input type="radio" name="fal" value="False"/> Falsa</p>
        </td></tr>
      </table>

      <input type="submit" value="Cargar pregunta">
      <input type="reset" value="Borrar todo"></p>
      </form>

      <?php
      require "vendor/autoload.php";

      use Slim\Views\PhpRenderer;

      $app = new \Slim\App();
      $con = $app->getContainer();


        // Recibimos por POST los datos procedentes del formulario
        $temas = $_POST["tema"];
        $preg = $_POST["pregunta"];
        $resp = $_POST["ver"];
        $resp2 = $_POST["fal"];

        // Abrimos la conexion a la base de datos


        $_GRABAR_SQL = "INSERT INTO preguntas('pregunta') VALUES ('$preg')";
        mysql_query($_GRABAR_SQL);

        $_GRABAR_SQL = "INSERT INTO respuestas('respuesta') VALUES ('$resp', '$resp2')";
        mysql_query($_GRABAR_SQL);

      // Confirmamos que el registro ha sido insertado con exito
        echo "
        <p>Los datos han sido guardados con exito.</p>

        ";


      ?>
</body>
</html>
