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
        $codigo = $_GET["id"]; 
        
        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 

        $sql = "UPDATE usuario SET usu_eliminado='S'," . " usu_fecha_modificacion = '$fecha'" . "WHERE usu_id = $codigo"; 
        
        if ($conn->query($sql) === TRUE) { 
            echo "<p>Se ha eliminado los datos correctamemte!!!</p>"; 
        } else { 
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
        } 
        
        echo "<a href='../../vista/usuario/agenda.php?id=$codigo'>Regresar</a>"; 
        
        $conn->close();
    ?> 
</body> 

</html>