<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Página de funciones</title>
  </head>


  <body>
   <?php
   //CREACIÓN DE LA SESIÓN

   session_start();

    //ESTRUCTURAS DE CONTROL QUE LLAMARÁN A SU FUNCIÓN SEGÚN EL BOTÓN QUE SE PULSE EN EL FORMULARIO DE NOTICIAS

    if(isset($_POST['insertarN'])){
      //VARIABLES PARA EL FORMULARIO DE NOTICIAS
      $titulo=$_POST['titulo'];
      $idn=$_POST['idn'];
      $contenido=$_POST['contenido'];
      $autor=$_POST['autor'];
      $creacion=$_POST['creacion'];
      insertarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion);
    }

    if(isset($_POST['eliminarN'])){
      //VARIABLES PARA EL FORMULARIO DE NOTICIAS
      $titulo=$_POST['titulo'];
      $idn=$_POST['idn'];
      $contenido=$_POST['contenido'];
      $autor=$_POST['autor'];
      $creacion=$_POST['creacion'];
      borrarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion);
    }

    if(isset($_POST['actualizarN'])){
      //VARIABLES PARA EL FORMULARIO DE NOTICIAS
      $titulo=$_POST['titulo'];
      $idn=$_POST['idn'];
      $contenido=$_POST['contenido'];
      $autor=$_POST['autor'];
      $creacion=$_POST['creacion'];
      actualizarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion);
    }

            //ESTRUCTURAS DE CONTROL QUE LLAMARÁN A SU FUNCIÓN SEGÚN EL BOTÓN QUE SE PULSE EN EL FORMULARIO DE USUARIOS

    if(isset($_POST['insertarU'])){
    //VARIABLES PARA EL FORMULARIO DE USUARIOS
    $idu=$_POST['idu'];
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $edad=$_POST['edad']; 
    $nacimiento=$_POST['nacimiento'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $genero=$_POST['genero'];
      insertarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero);
    }

    if(isset($_POST['eliminarU'])){
    //VARIABLES PARA EL FORMULARIO DE USUARIOS
    $idu=$_POST['idu'];
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $edad=$_POST['edad']; 
    $nacimiento=$_POST['nacimiento'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $genero=$_POST['genero'];
      borrarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero);
    }

    if(isset($_POST['actualizarU'])){
    //VARIABLES PARA EL FORMULARIO DE USUARIOS  
    $idu=$_POST['idu'];
    $nombre=$_POST['nombre'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $edad=$_POST['edad']; 
    $nacimiento=$_POST['nacimiento'];
    $direccion=$_POST['direccion'];
    $cp=$_POST['cp'];
    $provincia=$_POST['provincia'];
    $genero=$_POST['genero'];
      actualizarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero);
    }
    
    //FUNCIÓN PARA INSERTAR DATOS EN LA TABLA DE NOTICIAS

    function insertarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion){
    include "conexión.php";
    if(!empty($idn)&&!empty($titulo)){
    $query="INSERT INTO noticias (id, título,contenido, autor, creación) VALUES ('$idn','$titulo','$contenido', '$autor','$creacion')";

      if (mysqli_query($conexion, $query)){
        echo "<script type='text/javascript'>alert('Datos introducidos correctamente.');
        window.location.href='list_noticias.php';
        </script>";
      }
      else { echo "<script type='text/javascript'>alert('Error al insertar datos.');
        window.location.href='list_noticias.php';
        </script>";}  
    }
    else{
      echo "<script type='text/javascript'>alert('Introduce al menos un ID y un título.');
      window.location.href='form_noticias.php';
      </script>"; }

      mysqli_close($conexion);
    }
   
    //FUNCIÓN PARA ACTUALIZAR DATOS EN LA TABLA DE NOTICIAS

    function actualizarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion){
    include "conexión.php";
       $query="UPDATE noticias SET id ='$idn',título ='$titulo',contenido='$contenido', autor='$autor', creación='$creacion' WHERE id='$idn' OR título='$titulo'";

      if (mysqli_query($conexion, $query)){
        echo "<script type='text/javascript'>alert('Datos actualizados correctamente.');
        window.location.href='list_noticias.php';
        </script>";
      }
      else { echo "<script type='text/javascript'>alert('Error al actualizar los datos.');
        window.location.href='list_noticias.php';
        </script>";}
      mysqli_close($conexion);  
    }

    //FUNCIÓN PARA BORRAR DATOS EN LA TABLA DE NOTICIAS
   function borrarDatosNoticias($idn,$titulo,$contenido,$autor,$creacion){
    include "conexión.php";
        $query="DELETE FROM noticias WHERE id ='$idn'";
        $resultado=mysqli_query($conexion, $query) or die ("Error al borrar datos.");

        if (mysqli_affected_rows($conexion)==0){
          echo "<script type='text/javascript'>alert('No hay registros que eliminar');
          window.location.href='list_noticias.php';
          </script>";
        }
        else{
          $i=mysqli_affected_rows($conexion);
          echo "<script type='text/javascript'>alert('Registros eliminados: ' +\"$i\");
          window.location.href='list_noticias.php';
          </script>";
        }
        mysqli_close($conexion);
    }

    //FUNCIÓN PARA INSERTAR DATOS EN LA TABLA DE USUARIOS

    function insertarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero){
      include "conexión.php";
      if(!empty($idu)&&!empty($nombre)){
      $query="INSERT INTO usuarios (id, nombre, contraseña, email, edad, nacimiento, dirección, cp, provincia, género) VALUES ('$idu','$nombre','$password','$email',$edad,'$nacimiento','$direccion','$cp','$provincia','$genero')";
  
        if (mysqli_query($conexion, $query)){
          echo "<script type='text/javascript'>alert('Datos introducidos correctamente.');
          window.location.href='list_usuarios.php';
          </script>";
        }
        else { echo "<script type='text/javascript'>alert('Error al insertar datos.');
          window.location.href='list_usuarios.php';
          </script>";}  
      }
      else{
        echo "<script type='text/javascript'>alert('Introduce al menos un ID y un nombre.');
        window.location.href='form_usuarios.php';
        </script>"; }
  
        mysqli_close($conexion);
    }

    //FUNCIÓN PARA ACTUALIZAR DATOS EN LA TABLA DE USUARIOS

    function actualizarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero){
      include "conexión.php";
         $query="UPDATE usuarios SET id ='$idu',nombre ='$nombre',contraseña='$password', email='$email', 
         edad=$edad, nacimiento='$nacimiento', dirección='$direccion', cp='$cp', provincia='$provincia', género='$genero' WHERE id='$idu' OR nombre='$nombre'";
  
        if (mysqli_query($conexion, $query)){
          echo "<script type='text/javascript'>alert('Datos actualizados correctamente.');
          window.location.href='list_usuarios.php';
          </script>";
        }
        else { echo "<script type='text/javascript'>alert('Error al actualizar los datos.');
          window.location.href='list_usuarios.php';
          </script>";}
        mysqli_close($conexion);  
    }

       //FUNCIÓN PARA BORRAR DATOS EN LA TABLA DE USUARIOS
   function borrarDatosUsuarios($idu,$nombre,$password,$email,$edad,$nacimiento,$direccion,$cp,$provincia,$genero){
    include "conexión.php";
        $query="DELETE FROM usuarios WHERE id ='$idu'";
        $resultado=mysqli_query($conexion, $query) or die ("Error al borrar datos.");

        if (mysqli_affected_rows($conexion)==0){
          echo "<script type='text/javascript'>alert('No hay registros que eliminar');
          window.location.href='list_usuarios.php';
          </script>";
        }
        else{
          $i=mysqli_affected_rows($conexion);
          echo "<script type='text/javascript'>alert('Registros eliminados: ' +\"$i\");
          window.location.href='list_usuarios.php';
          </script>";
        }
        mysqli_close($conexion);
    }
  
   ?>


</body>
</html>