var listaIng = [
    "../contenido/images/i0.jpg", "../contenido/images/i1.jpg", "../contenido/images/i2.jpg", "../contenido/images/i3.jpg", 
    "../contenido/images/i4.jpg", "../contenido/images/i5.jpg", "../contenido/images/i6.jpg", "../contenido/images/i7.jpg", 
    "../contenido/images/i8.jpg", "../contenido/images/i9.jpg"
];
var posicion=0;
var imgs= [-1];

//GENERAR IMAGENES
function generarImagenes(){
    clearInterval(sizq);
    clearInterval(sder);
    imgs= [-1];
    var i=0;
    var ran;
    var sen;
    do{
        ran = Math.round(Math.random()*9);
        for(var j=0; j<imgs.length; j++){
            if(imgs[j]==ran){
                sen = false;
                j = imgs.length;
            }else{
                sen = true;
            }
        }
        if(sen==true){
            imgs[i] = ran;
            i++;
        }
    }       while(i<5);
    for(i=0; i<5; i++){
        imgs[i]=listaIng[imgs[i]];
    }
    posicion=0;
    document.getElementById("anterior").disabled = true;
    document.getElementById("siguiente").disabled = false;
    document.getElementById("d1").style.right='27%';
    document.getElementById("d1").style.visibility = 'visible';
    document.getElementById("d2").style.visibility = 'hidden';
    document.getElementById("i1").src = imgs[0];
}


//CAMBIAR IMAGENES SIGUIENTE
var m;
var l;

var mizq=27;
var lizq=-60;
function siguiente(){
    posicion++;
    if(posicion%2==0){
        document.getElementById('i1').src = imgs[posicion];
        
        m = document.getElementById('d2');
        l = document.getElementById('d1');
    }else{
        document.getElementById('i2').src = imgs[posicion];
        
        m = document.getElementById('d1');
        l = document.getElementById('d2');
    }
    mizq=27;
    lizq=-60;
    l.style.visibility = 'visible';
    intervaloIzq();
}

function superior(){
    if(posicion>3){
        document.getElementById("siguiente").disabled = true;
    }else{
        document.getElementById("anterior").disabled = false;
    }
}

//movimiento a la izquerda
var sizq;
function intervaloIzq(){
    sizq=setInterval(moverIzq, 15);
}

function moverIzq(){
    if(lizq<27){
        document.getElementById("siguiente").disabled = true;
        document.getElementById("anterior").disabled = true;
        mizq += 1;
        lizq += 1;
        m.style.right = mizq+'%';
        l.style.right = lizq+'%';
    }else{
        document.getElementById("siguiente").disabled = false;
        document.getElementById("anterior").disabled = false;
        m.style.visibility = 'hidden';
        superior();
        clearInterval(sizq);
    }
    
}


//CAMBIAN IMAGENES ANTERIOR
var mder=27;
var lder=00;
function anterior(){
    posicion--;
    if(posicion%2==0){
        document.getElementById('i1').src = imgs[posicion];
        m = document.getElementById('d2');
        l = document.getElementById('d1');

    }else{
        document.getElementById('i2').src = imgs[posicion];
        m = document.getElementById('d1');
        l = document.getElementById('d2');
    }
    mder=27;
    lder=100;
    l.style.visibility = 'visible';
    intervaloDer();
}

function inferior(){
    if(posicion<1){
        document.getElementById("anterior").disabled = true;
    }else{
        document.getElementById("siguiente").disabled = false;
    }
}

//movimiento a la derecha
var sder;
function intervaloDer(){
    sder=setInterval(moverDer, 15);
}

function moverDer(){
    if(lder>27){
        document.getElementById("siguiente").disabled = true;
        document.getElementById("anterior").disabled = true;
        mder -= 1;
        lder -= 1;
        m.style.right = mder+'%';
        l.style.right = lder+'%';
    }else{
        document.getElementById("siguiente").disabled = false;
        document.getElementById("anterior").disabled = false;
        m.style.visibility = 'hidden';
        inferior();
        clearInterval(sder);
    }
}
