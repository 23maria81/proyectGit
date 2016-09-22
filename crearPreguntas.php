<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Crear Preguntas nuevas en base de datos</title>
        <link href="estilos.css" rel="stylesheet">

        <style type="text/css">
          h1 { text-align: center; }
          td { padding: 0.2em 2em ; }
        </style>

    </head>
    <body>
      <h1> Formularios de  Preguntas </h1>
      <form action="crearPreguntas.php" method="get"/>

      <p>Temas de preguntas:</p>
      <select name="tema">
         <option>Temas</option>
         <option value="mat">Matematicas</option>
         <option value="hist">Historia</option>
         <option value="arts">Artes</option>
         <option value="Music">Musica</option>
         <option value="Folk">Cultura</option>
      </select>



      <p>Escribe una pregunta <input type="text" name="pregunta"/></p>

      <table>
        <tr>
        <td>
        Opciones<br/>
        <input type="radio" name="ver" value="Verdadero"/> Verdadera<br/>
        <input type="radio" name="fal" value="Falso"/> Falsa</p>
        </td></tr>
      </table>



      <input type="submit" value="Cargar pregunta">
      <input type="reset" value="Borrar todo"></p>
      </form>


<?php


        ?>



    </body>
</html>
