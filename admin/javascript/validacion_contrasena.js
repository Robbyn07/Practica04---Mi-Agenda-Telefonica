var bandera;

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

//VERIFICAR CONTRASENIA
function verificarContrasena(contra_e){
    bandera = false;
    var senmayus = false;
    var senminus = false;
    var ltascii;
    contra = contra_e.value;

    if(contra.length>=8){
        if(contra.includes('_')==true || contra.includes('@')==true || contra.includes('$')==true){
            for(var i=0; i<contra.length; i++){
                ltascii = contra.charCodeAt(i);
                if(ltascii>=65 && ltascii<=90){
                    senmayus = true;
                }
                if((ltascii>=97 && ltascii<=122)){
                    senminus = true;
                }
                if(senmayus==true && senminus==true){
                    i = contra.length;
                }
            }
            if(senmayus==true && senminus==true){
                arreglo(document.getElementById('password'), 'mcontrasena');
                bandera = true;
            }else{
                error(document.getElementById('password'), 'mcontrasena', '<br>La contrasena no contiene mayusculas o minusculas')
                bandera = false;
            }
        }else{
            error(document.getElementById('password'), 'mcontrasena', '<br>La contrasena no contiene caracteres especiales')
            bandera = false;
        }
    }else{
        error(document.getElementById('password'), 'mcontrasena', '<br>Contraseña muy corta')
        bandera = false;
    }
    return bandera;
}

function validacion(formulario){
    if(bandera == false){
        return false;
    }else{
        return true;
    }
}