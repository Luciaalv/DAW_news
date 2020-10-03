<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Header</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>


  <body>
  <div class="header">
  <?php
  session_start();
   if(isset($_SESSION['usuario'])){
    ?>
    <ul class="headermenu">
    <li><a href="list_noticias.php">Noticias</a></li>
    <li><a href="list_usuarios.php">Usuarios</a></li>
    <li><a href="form_usuarios.php">Crear usuario</a></li>
    <li><a href="form_noticias.php">Crear noticia</a></li>
    <li><form action="login.php" method="POST"><input type="submit"value="Cerrar sesión" name="desconectar"></form></li>
    </ul>
   <?php }else{?>
    <ul class="headermenu">
    <li><a href="list_noticias.php">Noticias</a></li>
    <li><a href="list_usuarios.php">Usuarios</a></li>
    <li><a href="login.php">Iniciar sesión</a></li>
    </ul>

  <?php }?>

  </div>







</body>
</html>