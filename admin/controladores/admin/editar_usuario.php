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

<!--
    <form method="POST" onsubmit="return validacion(this)" action="../controladores/crear_usuario.php">
        <fieldset>
            <legend>Formulario</legend>


            <label>Telefono</label>
            <input type="text" id="telf" name="telf" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), verificarDT(this, 'mtelefono',5)"/>
            <span id="mtelefono" class="error"></span>

            <label>Operadora</label>
            <input type="text" id="oper" name="oper" placeholder="Ej. Movistar" onkeyup="return validarOperadoraTipo('oper', 'moper', 6)"/>
            <span id="moper" class="error"></span>

            <label>Tipo telefono</label>
            <input type="text" id="tipo" name="tipo" placeholder="Celular/Convencional" onkeyup="return validarOperadoraTipo('tipo', 'mtipo', 7)"/>
            <span id="mtipo" class="error"></span>

            <label>Fecha de nacimiento</label>
            <input type="text" id="nac" name="nac" placeholder="Ej. 1999-01-20" onkeyup="return soloFecha(this), validarFecha(8)"/>
            <span id="mnac" class="error" ></span>

            

            <label>Contraseña</label>
            <input type="password" id="password" name="password" placeholder="Ej. Ingrese su contraseña aqui" onkeyup="verificarContrasena(10)"/>
            <span id="mcontrasena" class="error"></span>

            <input id="agregar" type="submit" value="Agregar"/>
            <input id="cancelar" type="button" value="Cancelar" onclick="location.href='index.html'">
            <div></div>
        </fieldset>
    </form>
-->