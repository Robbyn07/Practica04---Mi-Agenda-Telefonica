var vgeneral = [false, false, false];

function validacion(){
    var bandera = true;

    for(var i=0; i<3 ; i++){
        if(vgeneral[i]==false){
            bandera = false;
            i = 3;
        }
    }

    if(bandera!==true){
        verificarDT(document.getElementById('telf'), 'mtelefono', 0);
        verificarOperadoraTipo('oper' , 'moper', 1)
        verificarOperadoraTipo('tipo', 'mtipo', 2)
    }

    return bandera;
}

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

function noNumeros(texto){
    if(texto.value.length > 0){
        var as = texto.value.charCodeAt(texto.value.length-1);

        if((as >= 97 && as <= 122)||(as>=65 && as<=90) || as==32){
            return true;
        }else {
            texto.value = texto.value.substring(0, texto.value.length-1);
            return false;
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

function verificarOperadoraTipo(atri, men,id){
    console.log('adad')
    bandera = false;
    campo = document.getElementById(atri).value;
    if(campo.length>2){
        arreglo(document.getElementById(atri), men);
        bandera = true;
        vgeneral[id]=bandera;
    }else{
        error(document.getElementById(atri), men, '<br>El texto es muy pequeño para este campo')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}

//Verificar direccion y telefono
function verificarDT(atrib, mens, id){
    var bandera = false;
    if(atrib.value.length > 0){
        if(mens=='mtelefono' && atrib.value.length<9){
            error(atrib, mens, '<br>El numero de telefono no tiene los digitos necesarios')
            bandera = false;
            vgeneral[id]=bandera;
        }else{
            arreglo(atrib, mens);
            bandera = true;
            vgeneral[id]=bandera;
        }
        
    }else{
        error(atrib, mens, '<br>El campo esta vacio')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}
