<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar datos de persona </title> 
</head> 

<body> 
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <?php 
        //incluir conexión a la base de datos 
        include '../../../config/conexionBD.php'; 
        
        $codigo = $_POST["id"];  
        $nombres = isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'UTF-8') : null; 
        $apellidos = isset($_POST["lastname"]) ? mb_strtoupper(trim($_POST["lastname"]), 'UTF-8') : null; 
        $direccion = isset($_POST["address"]) ? mb_strtoupper(trim($_POST["address"]), 'UTF-8') : null; 
        $fechaNacimiento = isset($_POST["nac"]) ? trim($_POST["nac"]): null; 

        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 
        
        $sql = "UPDATE usuario " . "SET usu_nombres = '$nombres', " . "usu_apellidos = '$apellidos', " . 
        "usu_direccion = '$direccion', " . "usu_fecha_nacimiento = '$fechaNacimiento', " . "usu_fecha_modificacion = '$fecha' " . 
        "WHERE usu_id = $codigo"; 
        
        if ($conn->query($sql) === TRUE) { 
            echo "Se ha actualizado los datos personales correctamente!!!<br>"; 
            header("Location: ../../vista/usuario/index.php?id=$codigo"); 
            
        } else { 
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
            header("Location: ../../vista/usuario/modificar_info.php?id=$codigo");
        } 
        
        $conn->close(); 
    ?>
</body>
</html>