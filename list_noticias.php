<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de noticias</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">

  </head>


  <body>
   <?php
   include "conexión.php";
   session_start();
   $query="SELECT * FROM NOTICIAS";

   $resultado=mysqli_query($conexion, $query) or die ("Error en la consulta.");
$contador=0;
    echo "<table class='resultados'>";
 while ($fila=mysqli_fetch_row($resultado)){
    echo "<form action='form_noticias.php' method='POST'>";
    echo "<tr><td>" .$fila[0] ."</td>";
    echo "<td>" .$fila[1] ."</td>";
    echo "<td>" .$fila[2] ."</td>";
    echo "<td>" .$fila[3] ."</td>";
    echo "<td>" .$fila[4] ."</td>";
    if(isset($_SESSION['usuario'])){
      echo "<td class='buttons'><input type ='submit' name='actualizarN' value='Modificar'>". "&nbsp;&nbsp;&nbsp;"."<input type ='submit' value='Eliminar' name='eliminarN'></td></tr>"; 

    }else{
      echo "</tr>";
    }
    echo "<input type='hidden' name='idn' value='$fila[0]'>";
    echo "<input type='hidden' name='titulo' value='$fila[1]'>";
    echo "<input type='hidden' name='contenido' value='$fila[2]'>";
    echo "<input type='hidden' name='autor' value='$fila[3]'/>";
    echo "<input type='hidden' name='creacion' value='$fila[4]'>";
    echo "</form>";
    }    
    echo "</table>"; 
 mysqli_close($conexion);
 echo "<div class='volver'><a href='index.php'>Volver</a><div>";

   ?>

           

</body>
</html>