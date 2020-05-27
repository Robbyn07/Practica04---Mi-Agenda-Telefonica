<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Eliminar datos de persona </title> 
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
        $codigo = $_GET["id"];
        
        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 

        $sql = "UPDATE usuario SET usu_eliminado='S'," . " usu_fecha_modificacion = '$fecha'" . "WHERE usu_id = $codigo"; 
        
        if ($conn->query($sql) === TRUE) { 
            header("Location: ../../../public/vista/index.html");
        } else { 
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
        } 
        
        $conn->close();
    ?> 
</body> 

</html>