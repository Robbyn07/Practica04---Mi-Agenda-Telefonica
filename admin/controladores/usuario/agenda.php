<?php
    include "../../../config/conexionBD.php";

    $codigo = $_GET['id'] ;
    $numero = $_GET['numero'];
    $operadora = strtoupper($_GET['operadora']);
    $tipo = strtoupper($_GET['tipo']);

    if($numero!=''){
        $sql = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=$codigo and tel_numero='$numero'";
        $result = $conn->query($sql);
        echo "  <table style='width:100%'>
                <tr>
                <th>Operadora</th>
                <th>Tipo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                </tr>";
                
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row['tel_operadora'] ."</td>";
                echo " <td>" . $row['tel_tipo'] ."</td>";
                echo " <td> <a href='eliminar_tel.php?id=" . $row['tel_id'] . "'>Eliminar</a> </td>"; 
                echo " <td> <a href='modificar_tel.php?id=" . $row['tel_id'] . "'>Modificar</a> </td>";
                echo "</tr>";
                
            }
        } else {
            echo "<tr>";
            echo " <td colspan='5'> No existen numeros para este usuario </td>";
            echo "</tr>";
        }
        echo "</table>";

    }elseif($operadora!=''){
        $sql = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=$codigo and tel_operadora='$operadora'";
        $result = $conn->query($sql);
        echo "  <table style='width:100%'>
                <tr>
                <th>Numero</th>
                <th>Tipo</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                </tr>";
                
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row['tel_numero'] ."</td>";
                echo " <td>" . $row['tel_tipo'] ."</td>";
                echo " <td> <a href='eliminar_tel.php?id=" . $row['tel_id'] . "'>Eliminar</a> </td>"; 
                echo " <td> <a href='modificar_tel.php?id=" . $row['tel_id'] . "'>Modificar</a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='5'> No existen numeros para este usuario </td>";
            echo "</tr>";
        }
        echo "</table>";

    }elseif($tipo!=''){
        $sql = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=$codigo and tel_tipo='$tipo'";
        $result = $conn->query($sql);
        echo "  <table style='width:100%'>
                <tr>
                <th>Numero</th>
                <th>Operadora</th>
                <th>Modificar</th>
                <th>Eliminar</th>
                </tr>";
                
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row['tel_numero'] ."</td>";
                echo " <td>" . $row['tel_operadora'] ."</td>";
                echo " <td> <a href='eliminar_tel.php?id=" . $row['tel_id'] . "'>Eliminar</a> </td>"; 
                echo " <td> <a href='modificar_tel.php?id=" . $row['tel_id'] . "'>Modificar</a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='5'> No existen numeros para este usuario </td>";
            echo "</tr>";
        }
        echo "</table>";
    }
        
    $conn->close();
?>