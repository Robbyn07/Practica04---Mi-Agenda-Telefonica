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
