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
    xmlhttp.open("GET", "../../controladores/usuario/agenda.php?id="+codigo+"&numero="+numero+"&operadora="+""+"&tipo="+"", true);
    xmlhttp.send();
    }

    return false;
}

function buscarPorOperadora(codigo) {
    var combo = document.getElementById("operadora");
    var operadora = combo.options[combo.selectedIndex].text;

    console.log("Este valor es la operadora: " + operadora)

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
    xmlhttp.open("GET","../../controladores/usuario/agenda.php?id="+codigo+"&operadora="+operadora+"&numero="+""+"&tipo="+"", true);
    xmlhttp.send();
    }
    
    return false;
}

function buscarPorTipo(codigo) {
    var combo = document.getElementById("tipo");
    var tipo = combo.options[combo.selectedIndex].text;

    console.log("Este valor es el tipo: " + tipo)

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
    xmlhttp.open("GET","../../controladores/usuario/agenda.php?id="+codigo+"&tipo="+tipo+"&numero="+""+"&operadora="+"", true);
    xmlhttp.send();
    }
    
    return false;
}