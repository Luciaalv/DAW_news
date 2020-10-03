<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>


  <body>
  <form action="" method="POST">
<table class="login">
<tr><td class="tdlogin">INICIAR SESIÓN</td></tr>
<tr><td class="tdlogin"><label for ="user">Nombre de usuario:<input type="text" name="username" id="user"></td></tr>
<tr><td class="tdlogin"><label for ="pass">Contraseña:<input type="password" name="password" id="pass"></td></tr>
<tr><td class="tdlogin"><input type="submit" name="login" value="Iniciar sesión"></td></tr>
</table>


  </form>



<?php    
session_start();
    if(isset($_POST['login'])){
      login();
    }
    if(!isset($_SESSION['usuario'])){
    $_SESSION['user'] = session_id();
    }

 //FUNCIÓN DE LOGIN
 function login(){
  include "conexión.php";
     $username=mysqli_real_escape_string($conexion,strtolower($_POST['username']));
     $password=mysqli_real_escape_string($conexion,$_POST['password']);
     $query="SELECT* FROM usuarios WHERE nombre='$username' AND contraseña='$password'";
     $resultado=mysqli_query($conexion, $query);

      if (mysqli_affected_rows($conexion)==0){
        echo "<script type='text/javascript'>alert('El usuario no existe.');
        window.location.href='login.php';
        </script>";
      }
      else{
        $_SESSION['usuario'] = $username;
        echo "<script type='text/javascript'>alert('Bienvenido/a, ' + \"$username\".charAt(0).toUpperCase()+\"$username\".slice(1) +'.');
        window.location.href='index.php';
        </script>";
      }
      
    mysqli_close($conexion);
 }
 if(isset($_POST['desconectar'])){
   session_destroy();
   header('location:index.php');
 }

 echo "<div class='volver'><a href='index.php'>Volver</a><div>";


?>
   </body>

</html>