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
        
        echo "<form method='POST' onsubmit=\"return validacionModiciacion()\" action='../../controladores/admin/bd_editar_usuario.php'>
                <fieldset>
                    <p>El usuario no se modificara si el correo ya esta ocupado por algun otro usuario</p>
                    <label>Cedula</label>
                    <input type='text' id='dni' name='dni' value='".$row['usu_cedula']."' disabled/>
                    <label>Nombres</label>
                    <input type='text' id='name' name='name' value='".$row['usu_nombres']."' onkeyup=\"return noNumeros(this), validarNA(this, 'mnombre', 0)\"/>
                    <span id='mnombre' class='error'></span>
                    <label>Apellidos</label>
                    <input type='text' id='lastname' name='lastname' value='".$row['usu_apellidos']."' onkeyup=\"return noNumeros(this), validarNA(this, 'mapellido', 1)\"/>
                    <span id='mapellido' class='error'></span>
                    <label>Direccion</label>
                    <input type='text' id='address' name='address' value='".$row['usu_direccion']."' onkeyup=\"return verificarDT(this, 'mdireccion', 2)\"/>
                    <span id='mdireccion' class='error'></span>
                    <label>E-mail</label>
                    <input type='text' id='email' name='email' value='".$row['usu_correo']."' onkeyup=\"return verificarCorreo(3)\"/>
                    <span id='mmail' class='error'></span>
                    <input id='agregar' type='submit' value='Agregar'/>
                </fieldset>
                <input type='text' class='ocultar' name='idadmin' value=$admin></input>
                <input type='text' class='ocultar' name='cedula' value=".$row['usu_cedula']."></input>
            </form>";
    }

?>