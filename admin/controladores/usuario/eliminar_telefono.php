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
        //incluir conexión a la base de datos 
        include '../../../config/conexionBD.php';
        $codigo_tel = $_GET["id"];
        $codigo_usu = $_GET["usu"]; 
        
        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 

        $sql = "UPDATE telefono SET tel_eliminado='S'," . " tel_fecha_modificacion = '$fecha'" . "WHERE tel_usuario = $codigo_usu and tel_id = $codigo_tel"; 
        
        if ($conn->query($sql) === TRUE) { 
            echo "<p>Se ha eliminado los datos correctamemte!!!</p>"; 
        } else { 
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
        } 
        
        echo "<a href='../../vista/usuario/index.php?id=$codigo_usu'>Regresar</a>"; 
        
        $conn->close();
    ?> 
</body> 

</html>