
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cuerpo php</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>


  <body>
   <?php
   include "cabecera.php";
   include "conexión.php";


   $query="SELECT * FROM noticias ORDER BY creación ASC LIMIT 5";

   $resultado=mysqli_query($conexion, $query) or die ("Error en la consulta.");

   echo "<table>";
   while ($fila=mysqli_fetch_row($resultado)){
    echo "<tr><td>" .$fila[0] ."</td>";
    echo "<td>" .$fila[1] ."</td>";
    echo "<td>" .$fila[2] ."</td>";
    echo "<td>" .$fila[3] ."</td>";
    echo "<td>" .$fila[4] ."</td></tr>";
    } 
   echo "</table>";      
 mysqli_close($conexion);


   ?>



</body>
</html>
