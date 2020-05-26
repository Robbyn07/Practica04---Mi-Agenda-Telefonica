<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <style type="text/css" rel="stylesheet"> 
        .error{
            color: red;}
    </style>

</head>
<body>
    <?php
    include '../../../config/conexionBD.php';
    $id = $_POST["id"];
    $cedula = isset($_POST["dni"]) ? trim($_POST["dni"]) : null;
    $nombres = isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'UTF-8') : null;
    $apellidos = isset($_POST["lastname"]) ? mb_strtoupper(trim($_POST["lastname"]), 'UTF-8') : null;
    $direccion = isset($_POST["address"]) ? mb_strtoupper(trim($_POST["address"]), 'UTF-8') : null;
    $telefono = isset($_POST["telf"]) ? trim($_POST["telf"]): null;
    $operadora = isset($_POST["oper"]) ? mb_strtoupper(trim($_POST["oper"]), 'UTF-8'): null;
    $tipo_telefono = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8'): null;
    $correo = isset($_POST["email"]) ? trim($_POST["email"]): null;
    $fechaNacimiento = isset($_POST["nac"]) ? trim($_POST["nac"]): null;
    $contrasena = isset($_POST["password"]) ? trim($_POST["password"]) : null;
    
    $verced = "SELECT usu_id FROM usuario WHERE usu_cedula='$cedula'";
    $vercor = "SELECT usu_id FROM usuario WHERE usu_correo='$correo'";
    $ver1 = $conn->query($verced);
    $ver2 = $conn->query($vercor);

    if($ver1->num_rows==0 && $ver2->num_rows==0){
        $sql = "INSERT INTO usuario VALUES (0, 'U','$cedula', '$nombres', '$apellidos', '$direccion', '$correo', 
            MD5('$contrasena'), '$fechaNacimiento', 'N', null, null)";


        if ($conn->query($sql) === TRUE) {
            $sql2 = "SELECT usu_id FROM usuario WHERE usu_cedula='$cedula'";
            $result = $conn->query($sql2);

            //if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $usu_id =  $row["usu_id"];
                }
                $sql3 = "INSERT INTO telefono VALUES (0, '$telefono', '$operadora', '$tipo_telefono', 'N', null, null, $usu_id)";
                if($conn->query($sql3) === TRUE){
                    echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
                    header ("Location: ../../vista/admin/index.php?id=$id");
                }else{
                    echo "<p>Ususario creado, pero telefono incorrecto</p>";
                    echo "<a href='../../vista/admin/index.php?id=$id'>Ir a login</a>";
                }

                
            //} else {
            //   echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            //   echo "<a href='../vista/login.html'>Ir a login</a>";
            //}
            
        } else {
            if($conn->errno == 1062){
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
            }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
    }else{
        header ("Location: ../../vista/admin/agregar_usuario.php?id=$id");
    }

        
 
     //cerrar la base de datos
     $conn->close();
     echo "<a href='../vista/crear_usuario.html'>Regresar</a>";
 
    ?>
 </body>
 </html>