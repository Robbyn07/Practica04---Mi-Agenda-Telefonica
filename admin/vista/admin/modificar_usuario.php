<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar Usuario</title>
    <link rel='stylesheet' type='text/css' href='../../css/admin/modificar_usuario.css'>
    <script type='text/javascript' src='../../javascript/admin_modificar_usuario.js'></script>
</head>

<body>
    <?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
    $id = $_GET['id'];
    $cont = 0;
   ?>
   
    <header>
        <a href="index.php?id=<?php echo $id ?>"><img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo"></a>
    </header>

    <table id='cabecera'>
        <tr>
            <th>Cedula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Fecha de nacimiento</th>
            <th>Modificar</th>
            <th>Eliminar</th>
            <th>Cambiar Contraseña</th>
        </tr>
    
    </table>
    <?php 
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='N'";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                echo "<table class='contenido'>";
                echo "<tr>";
                echo "<td>".$row["usu_cedula"]."</td>";
                echo "<td>".$row["usu_nombres"]."</td>";
                echo "<td>".$row["usu_apellidos"]."</td>";
                echo "<td id='correo$cont'>".$row["usu_direccion"]."</td>";
                echo "<td>".$row["usu_correo"]."</td>";
                echo "<td>".$row["usu_fecha_nacimiento"]."</td>";
                echo "<td> <input type='button' id='modificar$cont' name='modificar$cont' value='Modificar' onclick=\"modificar(".$row['usu_id'].", '$cont', $id, $resultado->num_rows)\"></td>";
                echo "<td> <input type='button' id='eliminar$cont' name='eliminar$cont' value='Eliminar' onclick=\"eliminar(".$row['usu_id'].", '$cont', $id, $resultado->num_rows)\"></td>";
                echo "<td> <input type='button' id='contra$cont' name='contra$cont' value='Cambiar Contraseña' onclick=\"contra(".$row['usu_id'].", '$cont', $id, $resultado->num_rows)\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "<div id='$cont'> </div>";
                $cont = $cont + 1;
            }
        }else{
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

    ?>
</body>
</html>