<!DOCTYPE html>

<html lang="es">
<head>
  <meta charset="utf-8"/>
  <title>Perfil</title>
  <link rel="stylesheet" type="text/css" href="../../css/admin/diseno_agregar_usuario.css">
  <script type="text/javascript" src="../../javascript/agregar_usuario.js"></script>
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

  <form method="POST" onsubmit="return validacion(this)" action="../../controladores/admin/agregar_usuario.php">
        <fieldset>
            <legend>Formulario</legend>

            <label>Cedula</label>
            <input type="text" id="dni" name="dni" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), validarCedula(0)" />
            <span id="mcedula" class="error"></span>

            <label>Rol</label>
            <input type="text" id="rol" name="rol" placeholder="Ej. A/U" onkeyup="return noNumeros(this), validarRol(1)" />
            <span id="mrol" class="error"></span>

            <label>Nombres</label>
            <input type="text" id="name" name="name" placeholder="Ej. Pablo Esteban" onkeyup="return noNumeros(this), validarNA(this, 'mnombre', 2)"/>
            <span id="mnombre" class="error"></span>

            <label>Apellidos</label>
            <input type="text" id="lastname" name="lastname" placeholder="Ej. Loja Morocho" onkeyup="return noNumeros(this), validarNA(this, 'mapellido', 3)"/>
            <span id="mapellido" class="error"></span>

            <label>Direccion</label>
            <input type="text" id="address" name="address" placeholder="Ej. Av. calle1" onkeyup="return verificarDT(this, 'mdireccion', 4)"/>
            <span id="mdireccion" class="error"></span>

            <label>Telefono</label>
            <input type="text" id="telf" name="telf" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), verificarDT(this, 'mtelefono',5)"/>
            <span id="mtelefono" class="error"></span>

            <label>Operadora</label>
            <input type="text" id="oper" name="oper" placeholder="Ej. Movistar" onkeyup="return validarOperadoraTipo('oper', 'moper', 6)"/>
            <span id="moper" class="error"></span>

            <label>Tipo telefono</label>
            <input type="text" id="tipo" name="tipo" placeholder="Celular/Convencional" onkeyup="return validarOperadoraTipo('tipo', 'mtipo', 7)"/>
            <span id="mtipo" class="error"></span>

            <label>Fecha de nacimiento</label>
            <input type="text" id="nac" name="nac" placeholder="Ej. 1999-01-20" onkeyup="return soloFecha(this), validarFecha(8)"/>
            <span id="mnac" class="error" ></span>

            <label>E-mail</label>
            <input type="text" id="email" name="email" placeholder="Ej. usu1@est.ups.edu.ec / usu2@ups.edu.ec" onkeyup="return verificarCorreo(9)"/>
            <span id="mmail" class="error"></span>

            <label>Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ej. Ingrese su contraseña aqui" onkeyup="verificarContrasena(10)"/>
            <span id="mcontrasena" class="error"></span>

            <input id="agregar" type="submit" value="Agregar"/>
            <input id="cancelar" type="button" value="Cancelar" onclick="location.href='index.html'">
            <div></div>
            <input type="text" id="id" name="id"  value="<?php echo $id ?>" />
        </fieldset>
    </form>

</body>
</html>

