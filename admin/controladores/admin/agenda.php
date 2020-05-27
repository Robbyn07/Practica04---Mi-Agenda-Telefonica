<?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

<?php
    include "../../../config/conexionBD.php";
    $cedula = $_GET['cedula'];
    $correo = $_GET['correo'];
    
    if($cedula!=''){
        $sql = "SELECT * FROM usuario WHERE usu_cedula='$cedula' AND usu_eliminado='N'";
        $result = $conn->query($sql);
        $senial = false;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
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

                $sql2 = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=". $row['usu_id'];
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
            }
            echo "</aside>";
        } else {
           echo "<p>No existe un usuario con esta cedula</p>";
        }
    }elseif($correo!=''){
        $sql = "SELECT * FROM usuario WHERE usu_correo='$correo' AND usu_eliminado='N'";
        $result = $conn->query($sql);
        $senial = false;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<aside>";
                echo "
                    <table class=usuario>
                    <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Fecha de nacimiento</th>
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
                $sql2 = "SELECT * FROM telefono WHERE tel_eliminado='N' and tel_usuario=".$row['usu_id'];
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
            }
            echo "</aside>";
        } else {
           echo "<p>No existe un usuario con este corrreo</p>";
           $senial = false;
        }
    }

    $conn->close();
?>