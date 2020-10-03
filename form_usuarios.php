<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario usuarios</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>



    <body>
    <?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
    header('location:index.php');}
    ?> 
     <form action="funciones_bd.php" method="POST">
        <div class="f_usuarios">
        <label for ="idu">ID</label>
        <input type="text" name="idu" id="idu" placeholder="ID" value="<?php if(isset($_POST['idu'])) echo $_POST['idu']; else echo "";?>">
       
        <label for ="name">Nombre</label>
        <input type="text" name="nombre" id="name" maxlenght="50" placeholder="Nombre" value="<?php if(isset($_POST['nombre'])) echo $_POST['nombre']; else echo "";?>">

        <label for ="password">Contraseña</label>
        <input type="password" name="password" id="password" maxlenght="50" placeholder="Contraseña" value="<?php if(isset($_POST['password'])) echo $_POST['password']; else echo "";?>">
    
        <label for ="email">E-mail</label>
        <input type="text" name="email" id="email" placeholder="E-mail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo "";?>">

        <label for ="age">Edad</label>
        <input type="text" name="edad" id="age" placeholder="Edad" value="<?php if(isset($_POST['edad'])) echo $_POST['edad']; else echo "";?>">
 
        <label for ="birthdate">Fecha de nacimiento</label>
        <input type="date" name="nacimiento" id="birthdate" placeholder="Fecha nacimiento" value="<?php if(isset($_POST['nacimiento'])) echo $_POST['nacimiento']; else echo "";?>">

        <label for ="address">Dirección</label>
        <input type="text" name="direccion" id="address" maxlenght="50" placeholder="Dirección" value="<?php if(isset($_POST['direccion'])) echo $_POST['direccion']; else echo "";?>">

        <label for ="postcode">Código postal</label>
        <input type="text" name="cp" id="postcode" maxlenght="50" placeholder="Código postal" value="<?php if(isset($_POST['cp'])) echo $_POST['cp']; else echo "";?>">

        <label for ="city">Provincia</label>
        <input type="text" name="provincia" id="city" maxlenght="50" placeholder="Provincia" value="<?php if(isset($_POST['provincia'])) echo $_POST['provincia']; else echo "";?>">

        <label for ="genero">Género</label>
        <input type="radio" name="genero" id="gender" value="Masculino">Hombre
        <input type="radio" name="genero" id="gender" value="Femenino">Mujer<br>

        </div>

        <div class="buttons">
        <input type ="submit" value="Insertar" id="insertar" name="insertarU">
        <input type ="submit" value="Actualizar" id="actualizar" name="actualizarU">
        <input type ="submit" value="Eliminar" id="eliminar" name="eliminarU">
        </div>



     </form>
     <div class='volver'><a href='index.php'>Volver</a></div>

    </body>

</html>