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
    //http://localhost/practica04---mi-agenda-telefonica/admin/vista/admin/agregar_usuario.php?id=35
    //file:///D:/trabajos%20ups/trabajos%206%20ciclo/PROGRAMACION%20HIPERMEDIAL/Practica4/Pra%CC%81ctica%20de%20laboratorio%2004%20%20-%20Creacio%CC%81n%20de%20una%20aplicacio%CC%81n%20web%20usando%20PHP%20y%20Base%20de%20Datos.pdf
    //file:///D:/trabajos%20ups/trabajos%206%20ciclo/PROGRAMACION%20HIPERMEDIAL/5.%20PHP.pdf
  ?>

  <header>
    <img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo">
    <h1>Bienvenido</h1>
  </header>

  <input type="button" id="agregar" name="agregar" value="Agregar usuario" onclick=<?php echo "location.href='agregar_usuario.php?id=$id'" ?>> 
  <input type="button" id="modificar" name="modificar" value="Modificar y eliminar" onclick=<?php echo "location.href='modificar_usuario.php?id=$id'" ?>> 
  <input type="button" id="agenda" name="agenda" value="Agenda" onclick="location.href='agenda.php'">
  <input type="button" id="cerrar_sesion" name="cerrar_sesion" value="Cerrar Sesion" onclick="location.href='../../../config/cerrar_sesion.php'">

</body>
</html>

