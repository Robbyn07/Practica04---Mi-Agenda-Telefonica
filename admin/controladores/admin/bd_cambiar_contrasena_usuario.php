<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Editando un usuario</title>
    <style type="text/css" rel="stylesheet"> 
        .error{
            color: red;}
    </style>

</head>
<body>
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <?php
        include '../../../config/conexionBD.php';
        $idadmin = $_POST["idadmin"];
        $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
        $contrasena = isset($_POST["password"]) ? trim($_POST["password"]) : null;
        
        
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE usuario SET usu_password=MD5('$contrasena'), usu_fecha_modificacion='$fecha' WHERE usu_cedula='$cedula'";
        
        if($conn->query($sql) === TRUE){
            header ("Location: ../../vista/admin/modificar_usuario.php?id=$idadmin");
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }

        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
 
    ?>
 </body>
 </html>