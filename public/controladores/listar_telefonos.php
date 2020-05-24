<?php
    
    include "../../config/conexionBD.php";
    $cedula = $_GET['cedula'];
    $correo = $_GET['correo'];
    $senial = false;
    
    if($cedula!=''){
        $sql = "SELECT usu_id FROM usuario WHERE usu_cedula='$cedula'";
        $result = $conn->query($sql);
        $senial = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usu_id =  $row["usu_id"];
            }
            $senial = true;
        } else {
           echo "<p>No existe un usuario con esta cedula</p>";
           $senial = false;
        }
    }elseif($correo!=''){
        $sql = "SELECT usu_id FROM usuario WHERE usu_correo='$correo'";
        $result = $conn->query($sql);
        $senial = false;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $usu_id =  $row["usu_id"];
            }
            $senial = true;
        } else {
           echo "<p>No existe un usuario con este corrreo</p>";
           $senial = false;
        }
    }else{
        $senial=false;
    }

    if($senial==true){
        $sql = "SELECT * FROM telefono WHERE tel_eliminado = 'N' and tel_usuario=$usu_id";
        $result = $conn->query($sql);
        echo " <table style='width:100%'>
        <tr>
        <th>Numero</th>
        <th>Operadora</th>
        </tr>";
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo " <td>" . $row['tel_numero'] . "</td>";
        echo " <td>" . $row['tel_operadora'] ."</td>";
        echo "</tr>";
        }
        } else {
        echo "<tr>";
        echo " <td colspan='7'> No existen numeros para este usuario </td>";
        echo "</tr>";
        }
        echo "</table>";
    }

        
    $conn->close();

?>