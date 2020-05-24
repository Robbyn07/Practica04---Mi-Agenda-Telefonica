<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_index.css">
</head>

<body>
  <?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
  ?>

  <?php
    $usu_id = $_GET["id"];
  ?>

  <header>
    <img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo">
    <h1>Bienvenido</h1>
  </header>

  <input type="button" id="modificar_usu" name="modificar_usu" value="Modificar Informacion" onclick=<?php echo "location.href='modificar_info.php?id=$usu_id'"?>> 
  <input type="button" id="cambiar_contra" name="cambiar_contra" value="Cambiar Contrasena" onclick="location.href='cambiar_contra.php'"> 
  <input type="button" id="agenda" name="agenda" value="Agenda" onclick="location.href='agenda.php'">
  <input type="button" id="cerrar_sesion" name="cerrar_sesion" value="Cerrar Sesion" onclick="location.href='../../../config/cerrar_sesion.php'">

</body>
</html>