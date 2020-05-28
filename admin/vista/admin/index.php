<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../../css/admin/diseno_index.css">
</head>

<body>
  <?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
    $id = $_GET['id'];
  ?>

  <header>
    <img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo">
    
  </header>

  <section>
    <h1>Bienvenido Administrador</h1>

    <input type="button" id="agregar" name="agregar" value="Agregar usuario" onclick=<?php echo "location.href='agregar_usuario.php?id=$id'" ?>> 
    <input type="button" id="modificar" name="modificar" value="Modificar y eliminar" onclick=<?php echo "location.href='modificar_usuario.php?id=$id'" ?>> 
    <input type="button" id="agenda" name="agenda" value="Agenda" onclick=<?php echo "location.href='agenda.php?id=$id'" ?>>
    <input type="button" id="cerrar_sesion" name="cerrar_sesion" value="Cerrar Sesion" onclick="location.href='../../../config/cerrar_sesion.php'">
  </section>
</body>
</html>

