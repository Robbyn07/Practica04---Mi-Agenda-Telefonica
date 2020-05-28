<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar telefono</title> 
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
        
        $codigo_tel = $_POST["id"];
        $codigo_usu = $_POST["usu"];  

        $telefono = isset($_POST["telf"]) ? trim($_POST["telf"]): null;
        $operadora = isset($_POST["oper"]) ? mb_strtoupper(trim($_POST["oper"]), 'UTF-8'): null;
        $tipo = isset($_POST["tip"]) ? mb_strtoupper(trim($_POST["tip"]), 'UTF-8'): null;

        date_default_timezone_set("America/Guayaquil"); 
        $fecha = date('Y-m-d H:i:s', time()); 
        
        $sql = "SELECT * WHERE tel_id=$codigo_tel and tel_usuario=$codigo_usu"; 

        $sql = "UPDATE telefono " . "SET tel_numero = '$telefono', " . "tel_operadora = '$operadora', " . "tel_tipo = '$tipo', " . 
        "tel_fecha_modificacion = '$fecha' " . "WHERE tel_id = $codigo_tel" . " and tel_usuario = $codigo_usu"; 
        
        if ($conn->query($sql) === TRUE) { 
            header ("Location: ../../vista/usuario/agenda.php?id=$codigo_usu"); 
        } else { 
            header ("Location: ../../vista/usuario/agenda.php?id=$codigo_usu");
        }
        
        $conn->close(); 
    ?>
</body>
</html>