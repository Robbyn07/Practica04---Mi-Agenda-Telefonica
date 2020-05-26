<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
    <link rel='stylesheet' type='text/css' href='../../css/admin/agenda.css'>
    <script type='text/javascript' src='../../javascript/admin_agenda.js'></script>
</head>

<body>
    <?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
    $id = $_GET['id'];
   ?>
   
   <form>
        <input type="text" id="cedula" name="cedula" value="">
        <input type="button" id="buscarcedula" name="buscarcedula" value="Buscar por cedula" onclick="buscarPorCedula()">
        <input type="text" id="correo" name="correo" value="">
        <input type="button" id="buscarcorreo" name="buscarcorreo" value="Buscar por correo" onclick="buscarPorCorreo()">
        <input type="button" id="cancelar" name="volver" value="Volver a index" onclick=<?php echo "\"location.href='index.php?id=$id'\"" ?>">
        <div id="separador"></div>
    </form>

    
    <div id="informacion"><b></b></div>

    <h2>Lista de usuarios</h2>
    
    
    <?php 
        include '../../../config/conexionBD.php';
        $sql = "SELECT * FROM usuario WHERE usu_eliminado='N'";
        $resultado = $conn->query($sql);
        if($resultado->num_rows > 0){
            while($row = $resultado->fetch_assoc()){
                echo "<aside>";
                echo "
                    <table class=usuario>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Fehca de nacimiento</th>
                    </tr>
                ";
                echo "<tr>";
                echo "<td>".$row["usu_cedula"]."</td>";
                echo "<td>".$row["usu_nombres"]."</td>";
                echo "<td>".$row["usu_apellidos"]."</td>";
                echo "<td>".$row["usu_direccion"]."</td>";
                echo "<td>".$row["usu_correo"]."</td>";
                echo "<td>".$row["usu_fecha_nacimiento"]."</td>";
                echo "</tr>";
                echo "</table>";
                $sql2 = "SELECT * FROM telefono WHERE tel_usuario=".$row['usu_id'];
                $resultado2 = $conn->query($sql2);
                if($resultado2->num_rows > 0){
                    while($row2 = $resultado2->fetch_assoc()){
                        echo "
                            <table class=telefono>
                            <tr>
                                <th>Numero</th>
                                <th>Operadora</th>
                                <th>Tipo</th>
                            </tr>
                        ";
                        echo "<tr >";
                        echo "<td class=telefono>".$row2["tel_numero"]."</td>";
                        echo "<td>".$row2["tel_operadora"]."</td>";
                        echo "<td>".$row2["tel_tipo"]."</td>";
                        echo "</tr>";
                        echo "</table>";
                    }
                }
                echo "</aside>";
            }
            
        }else{
            echo "<tr>";
            echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
            echo "</tr>";
        }

    ?>
</body>
</html>