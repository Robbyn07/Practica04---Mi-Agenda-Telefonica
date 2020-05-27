<?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
?>

<?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    
    $codigo = $_POST["id"];
    $telefono = isset($_POST["telf"]) ? trim($_POST["telf"]): null;
    $operadora = isset($_POST["oper"]) ? mb_strtoupper(trim($_POST["oper"]), 'UTF-8'): null;
    $tipo = isset($_POST["tip"]) ? mb_strtoupper(trim($_POST["tip"]), 'UTF-8'): null;

    $ver_telefono = "SELECT * FROM telefono WHERE tel_numero='$telefono' and tel_usuario=$codigo";
    $sqlver = $conn->query($ver_telefono);

    if($sqlver->num_rows==0){
        $sql = "INSERT INTO telefono VALUES(0, '$telefono', '$operadora', '$tipo', 'N', NULL, NULL, $codigo)";

        if($conn -> query($sql) === TRUE){
            echo "<p>Se ha creado el nuevo telefono!!!</p>";
            header ("Location: ../../vista/usuario/agenda.php?id=$codigo");
        }else{ 
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>"; 
        }
    }else{
        header ("Location: ../../vista/usuario/agenda.php?id=$codigo");
    }

    $conn->close();
?>

