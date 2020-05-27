<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar contrasena del usuario</title> 
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

        $codigo = $_POST["id"];
        $contra = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]):null;
        $contra2 = isset($_POST["password"]) ? trim($_POST["password"]):null;

        $sql = "SELECT * FROM usuario WHERE usu_id = '$codigo' and usu_password = MD5('$contra')";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            date_default_timezone_set("America/Guayaquil"); 
            $fecha = date('Y-m-d H:i:s', time()); 
            
            $sql2 = "UPDATE usuario " . "SET usu_password = MD5('$contra2'), " . "usu_fecha_modificacion = '$fecha' " . "WHERE usu_id = $codigo"; 
            
            if ($conn->query($sql2) === TRUE) { 
                echo "Se ha actualizado la contrasena correctamente!!!<br>"; 
                header ("Location: ../../vista/usuario/index.php?id=$codigo");
            } else { 
                echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
            } 
            
        }
 
        $conn->close(); 
    ?>
</body>
</html>