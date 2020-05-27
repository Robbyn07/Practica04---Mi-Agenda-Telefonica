<?php 
    session_start(); 
    
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: ../../../public/vista/index.html"); 
    } 
?>

<?php
    include '../../../config/conexionBD.php';
    $usuario = $_GET["usuario"];
    $admin = $_GET["admin"];
    $sql = "SELECT * FROM usuario WHERE usu_id=$usuario";
    $resultado = $conn->query($sql);


    while($row = $resultado->fetch_assoc()){
        /*<input type="text" id="id" name="id"  value="<?php echo $id ?>" />*/
        
        echo "<form method='POST' action='../../controladores/admin/bd_eliminar_usuario.php'>
                <fieldset>
                    <label>Cedula</label>
                    <input type='text' id='dni' name='dni' value='".$row['usu_cedula']."' disabled />
                    <label>Nombres</label>
                    <input type='text' id='name' name='name' value='".$row['usu_nombres']."' disabled />
                    <label>Apellidos</label>
                    <input type='text' id='lastname' name='lastname' value='".$row['usu_apellidos']."' disabled />
                    <label>Direccion</label>
                    <input type='text' id='address' name='address' value='".$row['usu_direccion']."' disabled />
                    <label>E-mail</label>
                    <input type='text' id='email' name='email' value='".$row['usu_correo']."' disabled />
                    <label>Fecha de nacimiento</label>
                    <input type='text' id='nac' name='nac' value='".$row['usu_fecha_nacimiento']."' disabled />
                    <input id='eliminar' type='submit' value='Eliminar'/>
                    </fieldset>
                    <input type='text' class='ocultar' name='idadmin' value=$admin></input>
                    <input type='text' class='ocultar' name='cedula' value=".$row['usu_cedula']."></input>
            </form>";
    }
?>