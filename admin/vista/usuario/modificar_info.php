<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar Datos</title> 
    <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_modificar.css"/>
    <script type="text/javascript" src="../../javascript/validacion_modificar.js"></script>
</head> 

<body> 
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 

        $codigo = $_GET["id"]; 
    ?>

    <header>
        <a href="index.php?id=<?php echo $codigo ?>"><img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo"></a>
    </header>

    <?php
        $sql = "SELECT * FROM usuario where usu_id=$codigo"; 

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql); 
        
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                ?> 
                <form method="POST" onsubmit="return validacion(this)" action="../../controladores/usuario/modificar_info.php">
                    <fieldset>
                        <legend>Modificar Informacion</legend>

                        <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" /> 

                        <label>Cedula</label>
                        <input type="text" id="dni" name="dni" value="<?php echo $row["usu_cedula"]; ?>" disabled/>
                        <span id="mcedula" class="error"></span>

                        <label>Nombres</label>
                        <input type="text" id="name" name="name" value="<?php echo $row["usu_nombres"]; ?>" placeholder="Ej. Pablo Esteban" onkeyup="return noNumeros(this), validarNA(this, 'mnombre', 0)"/>
                        <span id="mnombre" class="error"></span>

                        <label>Apellidos</label>
                        <input type="text" id="lastname" name="lastname" value="<?php echo $row["usu_apellidos"]; ?>" placeholder="Ej. Loja Morocho" onkeyup="return noNumeros(this), validarNA(this, 'mapellido', 1)"/>
                        <span id="mapellido" class="error"></span>

                        <label>Direccion</label>
                        <input type="text" id="address" name="address" value="<?php echo $row["usu_direccion"]; ?>" placeholder="Ej. Av. calle1" onkeyup="return verificarDT(this, 'mdireccion', 2)"/>
                        <span id="mdireccion" class="error"></span>

                        <label>Fecha de nacimiento</label>
                        <input type="text" id="nac" name="nac" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" placeholder="Ej. 1999-01-20" onkeyup="return soloFecha(this), validarFecha(3)"/>
                        <span id="mnac" class="error" ></span>

                        <label>E-mail</label>
                        <input type="text" id="email" name="email" value="<?php echo $row["usu_correo"]; ?>" placeholder="Ej. usu1@est.ups.edu.ec / usu2@ups.edu.ec" onkeyup="return verificarCorreo(4)"/>
                        <span id="mmail" class="error"></span>

                        <input id="modificar" type="submit" value="Modificar"/>
                        <input id="cancelar" type="button" value="Cancelar" onclick= "location.href='index.php?id=<?php echo $codigo ?>'">
                        <input id="eliminar" type="button" value="Eliminar" onclick= "location.href='../../controladores/usuario/eliminar_usuario.php?id=<?php echo $codigo ?>'"/>
                    </fieldset>
                </form>

                <?php 
            } 
        } else { 
            echo "<p>Ha ocurrido un error inesperado !</p>"; 
            echo "<p>" . mysqli_error($conn) . "</p>"; 
        } 
        
        $conn->close(); 
    ?>
</body> 

</html>