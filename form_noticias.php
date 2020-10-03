<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulario noticias</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
  </head>
  <body>

  <?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
    header('location:index.php');}
    ?> 
     <form action="funciones_bd.php" method="POST">
        <div class="f_noticias">

        <label for ="idn">ID</label>
        <input type="text" name="idn" id="idn" placeholder="ID" value="<?php if(isset($_POST['idn'])) echo $_POST['idn']; else echo "";?>">
       
        <label for ="title">Título</label>
        <input type="text" name="titulo" id="title" placeholder="Título" maxlenght="100" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; else echo "";?>">

        <label for ="content">Contenido</label>
        <textarea name="contenido" id="content" rows="13" cols="30" maxlenght="300"placeholder="Introduce una noticia"><?php if(isset($_POST['contenido']) &&!empty($_POST['contenido']))echo $_POST['contenido']; else echo "";?></textarea>
    
        <label for ="author">Autor</label>
        <input type="text" name="autor" id="author" placeholder="Autor" maxlenght="50" value="<?php if(isset($_POST['autor'])) echo $_POST['autor']; else echo "";?>">

        <label for ="time">Fecha de creación</label>
        <input type="date" name="creacion" id="time" value="<?php if(isset($_POST['creacion'])) echo $_POST['creacion']; else echo "";?>">

        </div>

        <div class="buttons">
        <input type ="submit" value="Insertar" id="insertar" name="insertarN">
        <input type ="submit" value="Actualizar" id="actualizar" name="actualizarN">
        <input type ="submit" value="Eliminar" id="eliminar" name="eliminarN">
        </div>

     </form>

     <div class='volver'><a href='index.php'>Volver</a></div>
    </body>

</html>