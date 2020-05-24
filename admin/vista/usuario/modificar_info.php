<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar Datos</title> 
</head> 

<body> 
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <?php
        echo "hola mundo";

        $codigo = $_GET["id"]; 
        $sql = "SELECT * FROM usuario where usu_id=$codigo"; 
        
        echo $codigo;
        echo "soy peor";

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql); 
        
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                ?> 
                <form id="formulario01" method="POST" action="../../controladores/usuario/modificar.php"> 
                
                    <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" /> 

                    <label for="cedula">Cedula (*)</label> 
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" required placeholder="Ingrese la cedula ..."/> 
                    <br> 
                    <label for="nombres">Nombres (*)</label> 
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" required placeholder="Ingrese los dos nombres ..."/>
                    <br> 
                    <label for="apellidos">Apelidos (*)</label> 
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" required placeholder="Ingrese los dos apellidos ..."/> 
                    <br> 
                    <label for="direccion">Dirección (*)</label> 
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" required placeholder="Ingrese la dirección ..."/> 
                    <br>
                    <label for="fecha">Fecha Nacimiento (*)</label> 
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" required placeholder="Ingrese la fecha de nacimiento ..."/> 
                    <br> 
                    <label for="correo">Correo electrónico (*)</label> 
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" required placeholder="Ingrese el correo electrónico ..."/> 
                    <br> 
                    <input type="submit" id="modificar" name="modificar" value="Modificar" /> 
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" /> 
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