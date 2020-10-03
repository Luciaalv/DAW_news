<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Lista de usuarios</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>


  <body>
   <?php
   include "conexión.php";
   session_start();
   $query="SELECT * FROM USUARIOS";

   $resultado=mysqli_query($conexion, $query) or die ("Error en la consulta.");

    echo "<table class='resultados'>";
 while ($fila=mysqli_fetch_row($resultado)){
    echo "<form action='form_usuarios.php' method='POST'>";
    echo "<tr><td>" .$fila[0] ."</td>";
    echo "<td>" .$fila[1] ."</td>";
    echo "<td>" .$fila[2] ."</td>";
    echo "<td>" .$fila[3] ."</td>";
    echo "<td>" .$fila[4] ."</td>";
    echo "<td>" .$fila[5] ."</td>";
    echo "<td>" .$fila[6] ."</td>";
    echo "<td>" .$fila[7] ."</td>";
    echo "<td>" .$fila[8] ."</td>";
    echo "<td>" .$fila[9] ."</td>";
    if(isset($_SESSION['usuario'])){
        echo "<td class='buttons'><input type ='submit' name='actualizarU' value='Modificar'>". "&nbsp;&nbsp;&nbsp;"."<input type ='submit' value='Eliminar' name='eliminarU'></td></tr>";
    }else{
        echo "</tr>";
    }
    echo "<input type='hidden' name='idu' value='$fila[0]'>";
    echo "<input type='hidden' name='nombre' value='$fila[1]'>";
    echo "<input type='hidden' name='password' value='$fila[2]'>";
    echo "<input type='hidden' name='email' value='$fila[3]'>";
    echo "<input type='hidden' name='edad' value='$fila[4]'>";
    echo "<input type='hidden' name='nacimiento' value='$fila[5]'>";
    echo "<input type='hidden' name='direccion' value='$fila[6]'>";
    echo "<input type='hidden' name='cp' value='$fila[7]'>";
    echo "<input type='hidden' name='provincia' value='$fila[8]'>";
    echo "<input type='hidden' name='genero' value='$fila[9]'>";
    echo "</form>";
    }      
    echo"</table>";     
 mysqli_close($conexion);
 echo "<div class='volver'><a href='index.php'>Volver</a><div>";

   ?>
           
           

</body>
</html>