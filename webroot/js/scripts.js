function validarRegistro(){
    var nombreUsuario = document.getElementById("nombreUsuario").value;
    var entradaOk = true;
    if(nombreUsuario.length>8){
        document.getElementById("warning1").innerHTML="No puedes introducir más de 8 caracteres";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else if(nombreUsuario.length === 0){
        document.getElementById("warning1").innerHTML="Este campo es obligatorio";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning1").innerHTML="";
    }
    
    var password = document.getElementById("password").value;
    if(password.length>8){
        document.getElementById("warning2").innerHTML="No puedes introducir más de 8 caracteres";
        document.getElementById("warning2").style.color="red";
        entradaOk = false;
    }else if(password.length === 0){
        document.getElementById("warning2").innerHTML="Este campo es obligatorio";
        document.getElementById("warning2").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning2").innerHTML="";
    }
    
    var passwordConfirmada = document.getElementById("passwordConfirmada").value;
    if(passwordConfirmada.length === 0){
        document.getElementById("warning3").innerHTML="Este campo es obligatorio";
        document.getElementById("warning3").style.color="red";
        entradaOk = false;
    }else if(passwordConfirmada !== password){
        document.getElementById("warning3").innerHTML="La contraseña no coincide";
        document.getElementById("warning3").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning3").innerHTML="";
    }
    
    var descripcion = document.getElementById("descripcionUsuario").value;
    if(descripcion.length>255){
        document.getElementById("warning4").innerHTML="No puedes introducir más de 8 caracteres";
        document.getElementById("warning4").style.color="red";
        entradaOk = false;
    }else if(descripcion.length === 0){
        document.getElementById("warning4").innerHTML="Este campo es obligatorio";
        document.getElementById("warning4").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning4").innerHTML="";
    }
    return entradaOk;
}

function validarModificarPassword(){
    var entradaOk = true;
    var passwordNueva = document.getElementById("passwordNueva").value;
    if(passwordNueva.length>8){
        document.getElementById("warning1").innerHTML="No puedes introducir más de 8 caracteres";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else if(passwordNueva.length === 0){
        document.getElementById("warning1").innerHTML="Este campo es obligatorio";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning1").innerHTML="";
    }
    
    var passwordConfirmada = document.getElementById("passwordConfirmada").value;
    if(passwordConfirmada.length === 0){
        document.getElementById("warning2").innerHTML="Este campo es obligatorio";
        document.getElementById("warning2").style.color="red";
        entradaOk = false;
    }else if(passwordConfirmada !== passwordNueva){
        document.getElementById("warning2").innerHTML="La contraseña no coincide";
        document.getElementById("warning2").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning2").innerHTML="";
    }
    return entradaOk;
}

function validarEditarPerfil(){
    var entradaOk = false;
    var descripcion = document.getElementById("descripcionUsuario").value;
    if(descripcion.length>255){
        document.getElementById("warning1").innerHTML="No puedes introducir más de 8 caracteres";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else if(descripcion.length === 0){
        document.getElementById("warning1").innerHTML="Este campo es obligatorio";
        document.getElementById("warning1").style.color="red";
        entradaOk = false;
    }else{
        document.getElementById("warning1").innerHTML="";
    }
    return entradaOk;
}

var buscar=document.getElementById('button');

        buscar.addEventListener('click',()=>{
            var caja=document.getElementById('caja').value;
            var img=document.getElementById('img');
            var p=document.getElementById('info');
            var xhttp=new XMLHttpRequest();
            xhttp.open("GET",`https://pokeapi.co/api/v2/pokemon/${caja}`)
            xhttp.send();
            xhttp.onreadystatechange=function () {
                if(this.readyState==4 && this.status==200){
					var datoPokemon=JSON.parse( this.responseText);
					console.log(datoPokemon);
					img.setAttribute("src",datoPokemon.sprites.front_shiny);
					p.textContent=datoPokemon.name;
                }
            }
        })