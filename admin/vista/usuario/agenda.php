<?php
    $codigo = $_GET["id"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_agenda.css"/>
    <script type="text/javascript" src="../../javascript/funciones_agenda.js"></script>
</head>

<body onload="listarTodo(<?php echo $codigo?>)">
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <form id="form1" >
        <input type="text" id="numero" name="numero" value="">
        <input type="button" id="buscarnumero" name="buscarnumero" value="Buscar por numero" onclick="buscarPorNumero(<?php echo $codigo?>)">

        <select name="operadora" id="operadora">
            <option value="none" selected></option>
            <option value="claro">Claro</option>
            <option value="movistar">Movistar</option>
            <option value="tuenti">Tuenti</option>
            <option value="cnt">CNT</option>
        </select>
        <input type="button" id="buscaroperadora" name="buscaroperadora" value="Buscar por operadora" onclick="buscarPorOperadora(<?php echo $codigo?>)">

        <select name="tipo" id="tipo">
            <option value="none" selected></option>
            <option value="celular">Celular</option>
            <option value="convencional">Convencional</option>
        </select>
        <input type="button" id="buscartipo" name="buscartipo" value="Buscar por tipo" onclick="buscarPorTipo(<?php echo $codigo?>)">

        <input type="button" id="cancelar" name="cancelar" value="Cancelar" onclick=<?php echo "location.href='index.php?id=$codigo'"?>>
        <div id="separador"></div>
    </form>

    <h2>Telefonos relacionados</h2>
    <div id="informacion">
        <b></b>
    </div>

    <section id="agregar_telefono">
        <form id="form2" method="POST" onsubmit="return validacion()" action="../../controladores/usuario/agregar_telefono.php">
            <legend>Agregar Telefono</legend>
            <input type="hidden" id="id" name="id" value="<?php echo $codigo ?>" /> 
            <br>
            <label for="telf">Telefono</label>
            <input type="text" id="telf" name="telf" placeholder="Ej. 9999999999" onkeyup="return noLetras(this), verificarDT(this, 'mtelefono',0)"/>
            <span id="mtelefono" class="error"></span>

            <select name="oper" id="oper">
                <option value="claro" selected>Claro</option>
                <option value="movistar">Movistar</option>
                <option value="tuenti">Tuenti</option>
                <option value="cnt">CNT</option>
            </select>

            <select name="tip" id="tip">
                <option value="celular" selected>Celular</option>
                <option value="convencional">Convencional</option>
            </select>

            <input id="agregar" type="submit" value="Agregar"/>
            <input id="cancelar" type="button" value="Cancelar" onclick=<?php echo "location.href='index.php?id=$codigo'"?>>
        </form>
    </section>

    <section id="listar_telefono" >
        <h2>Todos los telefonos</h2> 
        <div id="informacion2">
            <b></b>
        </div>
    </section>

</body>
</html>