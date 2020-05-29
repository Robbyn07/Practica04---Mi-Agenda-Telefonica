<!DOCTYPE html> 
<html> 
    
<head> 
    <meta charset="UTF-8"> 
    <title>Modificar Datos</title> 
    <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_modificar.css"/>
    <script src="../../javascript/validacion_modificar_telefono.js"></script>
</head> 

<body> 
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 

        $codigo_tel = $_GET["id"]; 
        $codigo_usu = $_GET["usu"];
    ?>

    <header>
        <a href="index.php?id=<?php echo $codigo_usu ?>"><img id="logo_principal" src="../../contenido/logo_ups.png" alt="logo"></a>
    </header>

    <?php
        $sql = "SELECT * FROM telefono where tel_usuario=$codigo_usu and tel_id=$codigo_tel"; 

        include '../../../config/conexionBD.php'; 
        $result = $conn->query($sql); 
        
        if ($result->num_rows > 0) { 
            while($row = $result->fetch_assoc()) { 
                ?> 
                <form method="POST" onsubmit="return validacion()" action="../../controladores/usuario/modificar_telefono.php">
                    <fieldset>
                        <legend>Modificar Telefono</legend>

                        <input type="hidden" id="id" name="id" value="<?php echo $codigo_tel ?>" />
                        <input type="hidden" id="usu" name="usu" value="<?php echo $codigo_usu ?>" /> 
                        <br>
                        <label for="telf">Telefono</label>
                        <input type="text" id="telf" name="telf" value="<?php echo $row["tel_numero"]; ?>" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), verificarDT(this, 'mtelefono',0)"/>
                        <span id="mtelefono" class="error"></span>

                        <label>Operadora</label>
                        <input type="text" id="oper" name="oper" placeholder="Ej. Movistar" value="<?php echo $row["tel_operadora"]; ?>" onkeyup="return verificarOperadoraTipo('oper', 'moper', 1)"/>
                        <span id="moper" class="error"></span>

                        <label>Tipo telefono</label>
                        <input type="text" id="tip" name="tip" placeholder="Celular/Convencional" value="<?php echo $row["tel_tipo"]; ?>" onkeyup="return verificarOperadoraTipo('tip', 'mtipo', 2)"/>
                        <span id="mtipo" class="error"></span>

                        <input id="modificar" type="submit" value="Modificar"/>
                        <input id="cancelar" type="button" value="Cancelar" onclick=<?php echo "location.href='agenda.php?id=$codigo_usu'"?>>
                        <div></div>
                    </fieldset>
                </form>
                <?php 
            } 
        } else { 
            echo "<p>Ha ocurrido un error inesperado !</p>"; 
            echo "<p>" . mysqli_error($conn) . "</p>"; 
        } 
        
        $conn->close(); 
    ?>
</body> 

</html>