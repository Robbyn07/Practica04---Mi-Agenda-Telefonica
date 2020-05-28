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

        $sql1 = "UPDATE telefono SET tel_eliminado='S'," . " tel_fecha_modificacion = '$fecha'" . " WHERE tel_usuario = $codigo";
        $sql2 = "UPDATE usuario SET usu_eliminado='S'," . " usu_fecha_modificacion = '$fecha'" . " WHERE usu_id = $codigo"; 
        
        if ($conn->query($sql1) === TRUE) { 
            echo("Esto no se que hara");

            if($conn->query($sql2) === TRUE){
                header("Location: ../../../public/vista/index.html"); 
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                header("Location: ../../vista/usuario/modificar_info.php?id=$codigo");
            }
        } else { 
            echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
            header("Location: ../../vista/usuario/modificar_info.php?id=$codigo");
        } 

        $conn->close();
    ?> 
</body> 

</html>