var vgeneral = [false, false, false, false, false, false, false, false, false, false];

function validacion(formulario){
    var bandera = true;
    for(var i=0; i<8 ; i++){
        if(vgeneral[i]==false){
            bandera = false;
            i = 8;
        }
    }
    if(bandera!==true){
        validarCedula(0);
        validarRol(1);
        validarNA(document.getElementById('name'), 'mnombre',2);
        validarNA(document.getElementById('lastname'), 'mapellido',3)
        verificarDT(document.getElementById('address'), 'mdireccion',4);
        verificarDT(document.getElementById('telf'), 'mtelefono',5);
        verificarOperadora(document.getElementById(oper), 'moper', 6)
        validarFecha(7);
        verificarCorreo(8);
        verificarContrasena(9);
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

function validarRol(id){
    bandera = false;
    rol = document.getElementById('rol').value;
    if(rol=='A' || rol=='a' || rol=='U' || rol=='u'){
        arreglo(document.getElementById('rol'), 'mrol');
        bandera = true;
        vgeneral[id]=bandera;
    }else{
        error(document.getElementById('rol'), 'mrol', '<br>Este campo solo admite A/U/a/u')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}

function verificarOperadora(id){
    bandera = false;
    operadora = document.getElementById('oper').value;
    if(operadora.length>2){
        arreglo(document.getElementById('oper'), 'moper');
        bandera = true;
        vgeneral[id]=bandera;
    }else{
        error(document.getElementById('oper'), 'moper', '<br>El texto es muy pequeño para ser una operadora')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
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


//VALIDACION CEDULA
function validarCedula (id){
    var bandera = true;
    var ced = document.getElementById("dni");
    if(ced.value.length!==10 && ced.type == 'text'){
        error(ced, 'mcedula', '<br>Datos invalidos')
        bandera = false;
        vgeneral[id]=bandera;
    }else{
        var suma =0;
        for(var i=0; i<(ced.value.length-1); i++){
            var num = ced.value.charCodeAt(i) - 48;
            if(i%2==0){
                num = num*2;
                if(num>=10){
                    num = num-9;
                }
            }
            suma = suma + num;
        }
        console.log(suma)
        suma = suma/10;
        console.log(suma)
        var isuperior = Math.ceil(suma);
        console.log(isuperior)
        var resul = eval(isuperior*10-suma*10)
        if(resul !== (ced.value.charCodeAt(9)-48)){
            error(ced, 'mcedula', '<br>La cedula ingresada no es correcta')
            bandera = false;
            vgeneral[id]=bandera;
        }else{
            arreglo(ced, 'mcedula');
            bandera = true;
            vgeneral[id]=bandera;
        }
    }
    return bandera;
}


//VALIDACION NOMBRES Y APELLIDOS
function validarNA(atri, men, id){
    var bandera = true;
    if(atri.value!==''){
        var partes = atri.value.split(" ");
        if(partes.length !== 2 || partes[0]=='' || partes[1]==''){
            error(atri, men, '<br>Los datos ingresados no son aceptados')
            bandera = false;
            vgeneral[id]=bandera;
        }else{
            arreglo(atri, men);
            bandera = true;
            vgeneral[id]=bandera;
        }
    }else{
        error(atri, men, '<br>Debe ingresar mas informacion')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}


//VALIDAR FECHA
function soloFecha(fec){
    if(fec.value.length > 0){
        if(fec.value.length > 10){
            fec.value = fec.value.substring(0, fec.value.length-1);
            return false;
        }else{
            var feca = fec.value.charCodeAt(fec.value.length-1);
            if(feca>=47 && feca<=57){
                if(fec.value.length==4 || fec.value.length==7){
                    fec.value = fec.value+'-';
                }
                return true;
            }else{
                fec.value = fec.value.substring(0, fec.value.length-1);
                return false;
            }
            
        }
    }else{
        return true;
    }
}

function validarFecha(id){
    var bandera = true;
    var fecha = document.getElementById("nac").value
    var partes = fecha.split("-");
    
    if(fecha.length==10){
        if(partes.length!==3 || partes[0].length!==4 || partes[1].length!==2 || partes[2].length!==2){
            error(document.getElementById("nac"), 'mnac', '<br>Los datos no estan en el formato')
            bandera = false;
            vgeneral[id]=bandera;
        }else{
            if(partes[2]<32 && partes[1]<13 && partes[0]<2021 && partes[0]>=1900){
                arreglo(document.getElementById("nac"), 'mnac');
                bandera = true;
                vgeneral[id]=bandera;
            }else{
                error(document.getElementById("nac"), 'mnac', '<br>Los datos no son una fecha valida')
                bandera = false;
                vgeneral[id]=bandera;
            }
        }
    }else{
        error(document.getElementById("nac"), 'mnac', '<br>Los datos no estan completos');
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}

//VERIFICACION DE CORREO
function verificarCorreo(id){
    var bandera = true;
    var corr = document.getElementById("email").value;
    var partes = corr.split("@");

    if(partes.length==2){
        if(partes[0].length>=3){
            if(partes[1]=='ups.edu.ec' || partes[1]=='est.ups.edu.ec'){
                arreglo(document.getElementById("email"), 'mmail');
                bandera = true;
                vgeneral[id]=bandera;
            }else{
                error(document.getElementById("email"), 'mmail', '<br>El correo no pertenece a la UPS')
                bandera = false;
                vgeneral[id]=bandera;
            }
        }else{
            error(document.getElementById("email"), 'mmail', '<br>El nombre de la cuenta es muy corta')
            bandera = false;
            vgeneral[id]=bandera;
        }
    }else{
        error(document.getElementById("email"), 'mmail', '<br>El dato ingresado no es un correo electronico')
        bandera = false;
        vgeneral[id]=bandera;
    }

}

//VERIFICAR CONTRASENIA
function verificarContrasena(id){
    var bandera = true;
    var senmayus = false;
    var senminus = false;
    var ltascii;
    var contra = document.getElementById('password').value;
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
                vgeneral[id]=bandera;
            }else{
                error(document.getElementById('password'), 'mcontrasena', '<br>La contrasena no contiene mayusculas o minusculas')
                bandera = false;
                vgeneral[id]=bandera;
            }
        }else{
            error(document.getElementById('password'), 'mcontrasena', '<br>La contrasena no contiene caracteres especiales')
            bandera = false;
            vgeneral[id]=bandera;
        }
    }else{
        error(document.getElementById('password'), 'mcontrasena', '<br>Contraseña muy corta')
        bandera = false;
        vgeneral[id]=bandera;
    }
    return bandera;
}

//Verificar direccion y telefono
function verificarDT(atrib, mens, id){
    var bandera = true;
    if(atrib.value.length > 0){
        if(mens=='mtelefono' && atrib.value.length<10){
            error(atrib, mens, '<br>El numero de telefono debe ser de 10 digitos')
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