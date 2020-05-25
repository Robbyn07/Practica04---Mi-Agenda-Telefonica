function modificar(usuario, informacion, admin, contador){
    for (i=0; i< contador; i++){
        if(i!=informacion){
            document.getElementById(i).innerHTML = '';
            
        }
        
    }

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
            document.getElementById(informacion).innerHTML = this.responseText;
        }
    };
    //xmlhttp.open("GET","/practica04---mi-agenda-telefonica/admin/controladores/admin/editar_usuario.php?usuario="+usuario+"?admin="+admin,true);
    xmlhttp.open("GET","../../controladores/admin/editar_usuario.php?usuario="+usuario+"&admin="+admin,true);
    xmlhttp.send();
    
    return false;
}

function eliminar(usuario, informacion, admin, contador){
    for (i=0; i< contador; i++){
        if(i!=informacion){
            document.getElementById(i).innerHTML = '';
            
        }
        
    }

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
            document.getElementById(informacion).innerHTML = this.responseText;
        }
    };
    //xmlhttp.open("GET","/practica04---mi-agenda-telefonica/admin/controladores/admin/editar_usuario.php?usuario="+usuario+"?admin="+admin,true);
    xmlhttp.open("GET","../../controladores/admin/eliminar_usuario.php?usuario="+usuario+"&admin="+admin,true);
    xmlhttp.send();
    
    return false;
}


function contra(usuario, informacion, admin, contador){
    for (i=0; i< contador; i++){
        if(i!=informacion){
            document.getElementById(i).innerHTML = '';
            
        }
        
    }

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
            document.getElementById(informacion).innerHTML = this.responseText;
        }
    };
    //xmlhttp.open("GET","/practica04---mi-agenda-telefonica/admin/controladores/admin/editar_usuario.php?usuario="+usuario+"?admin="+admin,true);
    xmlhttp.open("GET","../../controladores/admin/cambiar_contrasena_usuario.php?usuario="+usuario+"&admin="+admin,true);
    xmlhttp.send();
    
    return false;
}


var vgeneral = [false, false, false, false];

function validacionModiciacion(){
    var bandera = true;
    validarNA(document.getElementById('name'), 'mnombre',0);
    validarNA(document.getElementById('lastname'), 'mapellido',1)
    verificarDT(document.getElementById('address'), 'mdireccion',2);
    verificarCorreo(3);
    for(var i=0; i<4 ; i++){
        if(vgeneral[i]==false){
            bandera = false;
            i = 4;
        }
    }

    return bandera;
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

//Verificar direccion y telefono
function verificarDT(atrib, mens, id){
    var bandera = true;
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



function verificarContrasena(){
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
                arreglo(document.getElementById('password'), 'mpassword');
                bandera = true;
                bcontra = bandera;
            }else{
                error(document.getElementById('password'), 'mpassword', '<br>La contrasena no contiene mayusculas o minusculas')
                bandera = false;
                bcontra = bandera;
            }
        }else{
            error(document.getElementById('password'), 'mpassword', '<br>La contrasena no contiene caracteres especiales')
            bandera = false;
            bcontra = bandera;
        }
    }else{
        error(document.getElementById('password'), 'mpassword', '<br>Contraseña muy corta')
        bandera = false;
        bcontra = bandera;
    }
    return bandera;
}