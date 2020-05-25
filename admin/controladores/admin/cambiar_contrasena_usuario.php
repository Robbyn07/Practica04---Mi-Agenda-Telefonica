<?php
    include '../../../config/conexionBD.php';
    $usuario = $_GET["usuario"];
    $admin = $_GET["admin"];
    $sql = "SELECT * FROM usuario WHERE usu_id=$usuario";
    $resultado = $conn->query($sql);


    while($row = $resultado->fetch_assoc()){
        /*<input type="text" id="id" name="id"  value="<?php echo $id ?>" />*/
        
        echo "<form method='POST' onsubmit='return verificarContrasena()' action='../../controladores/admin/bd_cambiar_contrasena_usuario.php'>
                <fieldset>
                    <label>Cedula</label>
                    <input type='text' id='dni' name='dni' value='".$row['usu_cedula']."' disabled />
                    <label>Nombres</label>
                    <input type='text' id='name' name='name' value='".$row['usu_nombres']."' disabled />
                    <label>Apellidos</label>
                    <input type='text' id='lastname' name='lastname' value='".$row['usu_apellidos']."' disabled />
                    <label>Nueva contraseña</label>
                    <input type='password' id='password' name='password' placeholder='Ej. Ingrese nueva contraaseña' onkeyup='verificarContrasena()' />
                    <span id='mpassword' class='error'></span>
                    <input id='cambiar' type='submit' value='Cambiar'/>
                    </fieldset>
                    <input type='text' class='ocultar' name='idadmin' value=$admin></input>
                    <input type='text' class='ocultar' name='cedula' value=".$row['usu_cedula']."></input>
            </form>";
    }

    

?>