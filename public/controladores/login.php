<?php
    session_start();
    include '../../config/conexionBD.php';
    $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
    $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
    $sql = "SELECT usu_id, usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password =
    MD5('$contrasena')";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $usu_id = $row['usu_id'];
            $usu_rol =  $row["usu_rol"];
        }
        echo $usu_rol;
        echo $usu_id;
        if($usu_rol=='A'){
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../../admin/vista/admin/index.php?id=" . $usu_id);
        }else{
            $_SESSION['isLogged'] = TRUE;
            header("Location: ../../admin/vista/usuario/index.php?id=" . $usu_id);
        }
        
    } else {
        header("Location: ../vista/login.html");
    }

    $conn->close();
?>