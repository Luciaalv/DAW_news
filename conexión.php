<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
  </head>

    <body>
        <?php
            $host = "localhost";
            $bbdd = "M07";
            $usuario = "root";
            $contraseña = "";

            $conexion = mysqli_connect($host, $usuario, $contraseña);

                if(mysqli_connect_errno()){
                    echo "No se ha podido establecer la conexión.";
                    exit();    
                }

            mysqli_select_db($conexion, $bbdd) or die ("Base de datos no encontrada.");

            mysqli_set_charset($conexion, "utf8");
        ?>
    </body>
</html>
