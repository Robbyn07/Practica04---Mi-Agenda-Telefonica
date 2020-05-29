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
  ?>

  <header>
      <a href="index.php?id=<?php echo $id ?>"><img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo"></a>
  </header>

  <form method="POST" onsubmit="return validacion(this)" action="../../controladores/admin/agregar_usuario.php">
        <fieldset>
            <legend>Agregar Nuevo Usuario</legend>

            <label>Cedula</label>
            <input type="text" id="dni" name="dni" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), validarCedula(0)" />
            <span id="mcedula" class="error"></span>

            <label>Nombres</label>
            <input type="text" id="name" name="name" placeholder="Ej. Pablo Esteban" onkeyup="return noNumeros(this), validarNA(this, 'mnombre', 1)"/>
            <span id="mnombre" class="error"></span>

            <label>Apellidos</label>
            <input type="text" id="lastname" name="lastname" placeholder="Ej. Loja Morocho" onkeyup="return noNumeros(this), validarNA(this, 'mapellido', 2)"/>
            <span id="mapellido" class="error"></span>

            <label>Direccion</label>
            <input type="text" id="address" name="address" placeholder="Ej. Av. calle1" onkeyup="return verificarDT(this, 'mdireccion', 3)"/>
            <span id="mdireccion" class="error"></span>

            <label>Telefono</label>
            <input type="text" id="telf" name="telf" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), verificarDT(this, 'mtelefono',4)"/>
            <span id="mtelefono" class="error"></span>

            <label>Operadora</label>
            <input type="text" id="oper" name="oper" placeholder="Ej. Movistar" onkeyup="return verificarOperadoraTipo('oper', 'moper',5)"/>
            <span id="moper" class="error"></span>

            <label>Tipo telefono</label>
            <input type="text" id="tipo" name="tipo" placeholder="Celular/Convencional" onkeyup="return verificarOperadoraTipo('tipo', 'mtipo', 6)"/>
            <span id="mtipo" class="error"></span>

            <label>Fecha de nacimiento</label>
            <input type="text" id="nac" name="nac" placeholder="Ej. 1999-01-20" onkeyup="return soloFecha(this), validarFecha(7)"/>
            <span id="mnac" class="error" ></span>

            <label>E-mail</label>
            <input type="text" id="email" name="email" placeholder="Ej. usu1@est.ups.edu.ec / usu2@ups.edu.ec" onkeyup="return verificarCorreo(8)"/>
            <span id="mmail" class="error"></span>

            <label>Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ej. Ingrese su contraseña aqui" onkeyup="verificarContrasena(9)"/>
            <span id="mcontrasena" class="error"></span>

            <input id="agregar" type="submit" value="Agregar"/>
            <input id="cancelar" type="button" value="Cancelar" onclick="location.href='index.php?id=<?php echo $id ?>'">
            <div></div>
            <input type="text" id="id" name="id"  value="<?php echo $id ?>" />
        </fieldset>
    </form>

</body>
</html>

