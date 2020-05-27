<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar Contrasenia</title> 
    <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_cambiar_contrasena.css"/>
    <script type="text/javascript" src="../../javascript/validacion_contrasena.js"></script>
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
                <form method="POST" onsubmit="return validacion()" action="../../controladores/usuario/modificar_contra.php">
                    <fieldset>
                        <legend>Cambiar Contrasena</legend>

                        <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" /> 
                        
                        <label>Constraseña Actual</label>
                        <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña actual..."/>

                        <label>Nueva Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Ej. Ingrese la nueva contraseña..." onkeyup="return verificarContrasena(this)"/>
                        <span id="mcontrasena" class="error"></span>

                        <input id="cambiar_contra" type="submit" value="Cambiar Contrasena"/>
                        <input id="cancelar" type="button" value="Cancelar" onclick="location.href='index.php?id=<?php echo $codigo ?>'">
                        <div></div>
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