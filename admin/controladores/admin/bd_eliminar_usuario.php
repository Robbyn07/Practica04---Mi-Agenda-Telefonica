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
        
        //echo $cedula;
        
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE usuario SET usu_eliminado='S', usu_fecha_modificacion='$fecha' WHERE usu_cedula='$cedula'";
        $sqlid = "SELECT usu_id FROM usuario WHERE usu_cedula='$cedula'";
        $resul = $conn->query($sqlid);
        if ($resul->num_rows > 0) {
            while($row = $resul->fetch_assoc()) {
                $id = $row["usu_id"];
            }
        }
        echo $id;
        if($conn->query($sql) === TRUE){
            $sql2 = "UPDATE telefono SET tel_eliminado='S', tel_fecha_modificacion='$fecha' WHERE tel_usuario=$id ";
            if($conn->query($sql2)===TRUE){
                header ("Location: ../../vista/admin/modificar_usuario.php?id=$idadmin");
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }

        //cerrar la base de datos
        $conn->close();
        echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
    ?>
 </body>
 </html>