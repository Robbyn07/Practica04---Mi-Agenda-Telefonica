<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar Contrasenia</title> 
    <link rel="stylesheet" type="text/css" href="../../css/diseno_cambiar_contrasena.css"/>
    <script type="text/javascript" src="../../javascript/validacion_contrasena.js"></script>
</head> 

<body> 
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <?php
        $codigo = $_GET["id"]; 
        $sql = "SELECT * FROM usuario where usu_id=$codigo"; 

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql); 
        
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                ?> 
                <form method="POST" onsubmit="return validacion(this)" action="../../controladores/usuario/modificar_contra.php">
                    <fieldset>
                        <legend>Formulario</legend>

                        <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" /> 
                        
                        <label for="nombres">Constraseña Actual</label>
                        <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña actual..."/>

                        <label>Nueva Contraseña</label>
                        <input type="password" id="password" name="password" placeholder="Ej. Ingrese la nueva contraseña..." onkeyup="return verificarContrasena(this)"/>
                        <span id="mcontrasena" class="error"></span>

                        <input id="cambiar_contra" type="submit" value="Cambiar Contrasena"/>
                        <input id="cancelar" type="button" value="Cancelar" onclick=<?php echo "location.href='index.php?id=$codigo'"?>>
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