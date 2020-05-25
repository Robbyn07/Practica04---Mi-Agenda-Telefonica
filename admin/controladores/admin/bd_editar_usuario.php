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
    include '../../../config/conexionBD.php';
    $idadmin = $_POST["idadmin"];
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $nombres = isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'UTF-8') : null;
    $apellidos = isset($_POST["lastname"]) ? mb_strtoupper(trim($_POST["lastname"]), 'UTF-8') : null;
    $direccion = isset($_POST["address"]) ? mb_strtoupper(trim($_POST["address"]), 'UTF-8') : null;
    $correo = isset($_POST["email"]) ? trim($_POST["email"]): null;
    
    $vercor1 = "SELECT usu_correo FROM usuario WHERE usu_cedula='$cedula'";
    $vercor2 = "SELECT usu_cedula FROM usuario WHERE usu_correo='$correo'";
    $ver1 = $conn->query($vercor1);
    $ver2 = $conn->query($vercor2);
    $senial = true;
    if($ver2->num_rows>0){
        echo $ver2->num_rows;
        while($row = $ver1->fetch_assoc()){
            $correo_antiguo = $row['usu_correo'];
        }
        
        if($correo_antiguo==$correo){
            $senial=true;
        }else{
            $senial = false;
        }
    }else{
        $senial = true;
    }
    
    //echo $correo;
    //echo $correo_antiguo;
    //echo $cedula;
    if($senial==true){
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE usuario SET usu_nombres='$nombres', usu_apellidos='$apellidos', usu_direccion='$direccion', usu_correo='$correo', usu_fecha_modificacion='$fecha' 
            WHERE usu_cedula='$cedula'";
        if($conn->query($sql) === TRUE){
            header ("Location: ../../vista/admin/modificar_usuario.php?id=$idadmin");
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }else{
        header ("Location: ../../vista/admin/modificar_usuario.php?id=$idadmin");
    }

    
 
     //cerrar la base de datos
     $conn->close();
     echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
 
    ?>
 </body>
 </html>