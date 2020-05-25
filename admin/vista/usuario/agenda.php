<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Agenda</title>
    <link rel="stylesheet" type="text/css" href="../../css/usuario/diseno_agenda.css"/>
    <script type="text/javascript" src="../../javascript/listar_telefonos.js"></script>
</head>

<body>
    <?php 
        session_start(); 
        
        if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
            header("Location: ../../../public/vista/index.html"); 
        } 
    ?>

    <?php
        $codigo = $_GET["id"];
    ?>

    <form>
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
    <div id="informacion"><b></b></div>
</body>
</html>