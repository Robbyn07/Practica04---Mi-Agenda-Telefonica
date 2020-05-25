<?php
    include "../../../config/conexionBD.php";

    $codigo = $_GET['id'] ; 

    $sql = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario='$codigo'";
    $result = $conn->query($sql);
    echo "  <table style='width:100%'>
            <tr>
            <th>Numero</th>
            <th>Operadora</th>
            <th>Tipo</th>
            </tr>";
            
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row['tel_numero'] ."</td>";
            echo " <td>" . $row['tel_operadora'] ."</td>";
            echo " <td>" . $row['tel_tipo'] ."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo " <td colspan='4'> No existen numeros para este usuario </td>";
        echo "</tr>";
    }
    echo "</table>";     
?>