function buscarPorNumero(codigo) {
    var numero = document.getElementById("numero").value;

    if (numero == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
            };
        xmlhttp.open("GET", "../../controladores/usuario/buscar_telefonos.php?id="+codigo+"&numero="+numero+"&operadora="+""+"&tipo="+"", true);
        xmlhttp.send();
    }

    return false;
}

function buscarPorOperadora(codigo) {
    var combo = document.getElementById("operadora");
    var operadora = combo.options[combo.selectedIndex].text;

    if (operadora == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
    xmlhttp.open("GET","../../controladores/usuario/buscar_telefonos.php?id="+codigo+"&operadora="+operadora+"&numero="+""+"&tipo="+"", true);
    xmlhttp.send();
    }
    
    return false;
}

function buscarPorTipo(codigo) {
    var combo = document.getElementById("tipo");
    var tipo = combo.options[combo.selectedIndex].text;

    if (tipo == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                //alert("llegue");
                document.getElementById("informacion").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../controladores/usuario/buscar_telefonos.php?id="+codigo+"&tipo="+tipo+"&numero="+""+"&operadora="+"", true);
        xmlhttp.send();
    }
    
    return false;
}

function listarTodo(codigo){
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
        console.log("Se termina aqui la funcion")
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacion2").innerHTML = this.responseText;
        }
    };

    console.log("cosas antes de mandar al  controlador");
    xmlhttp.open("GET","../../controladores/usuario/listar_telefonos.php?id="+codigo, true);
    xmlhttp.send();

    return false;
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////
//DESDE AQUI SE VALIDA PARA AGREGAR NUEVOS TELEFONOS
var bandera = false;

//LIMITACION CARACTERES
function noLetras(texto){
    if(texto.value.length >0){
        if(texto.value.length>10){
            texto.value = texto.value.substring(0, texto.value.length-1);
            return false;
        }else{
            var valor = texto.value.charCodeAt(texto.value.length-1);
            if(valor >= 48 && valor <= 57){
                return true;
            }else{
                texto.value = texto.value.substring(0, texto.value.length-1);
                return false;
            }
        } 
    }else{
        return true;
    }
}

//FORMATO ERROR/ARREGLO
function error(inp, spa, men){
    document.getElementById(spa).innerHTML = men;
    inp.style.border = '2px red solid';
    inp.className = 'error';
}

function arreglo(inp, spa){
    document.getElementById(spa).innerHTML = '';
    inp.style.border = '2px green solid';
    inp.className = 'none';
}

//Verificar direccion y telefono
function verificarDT(atrib, mens, id){
    bandera = false;
    if(atrib.value.length > 0){
        if(mens=='mtelefono' && atrib.value.length<9){
            error(atrib, mens, '<br>El numero de telefono no tiene los digitos necesarios')
            bandera = false;
        }else{
            arreglo(atrib, mens);
            bandera = true;
        }
        
    }else{
        error(atrib, mens, '<br>El campo esta vacio')
        bandera = false;
    }
    return bandera;
}

function validacion(){
    if(bandera == false){
        return false;
    }else{
        return true;
    }
}
