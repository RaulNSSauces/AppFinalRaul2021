<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<div class="cabeza">
    <header>
        <h1>API CON AJAX</h1>
    </header>
</div>
<main style="background: #eeeeee;">
    <br>
    <img src="webroot/media/logo.png" class="logo" alt="">
	<div class="contenedor">
		<input type="text" id="caja" placeholder="Ingrese Un Numero">
		<button class="text-white btn bg-danger" id="button">Buscar</button>
		<img src="" id="img" class="pokemon" alt="">
	</div>
        <form class="contenedorAtras">
            <button class="btnAtrasRest" type="submit" name="cancelar">Volver</button>
        </form>
</main>
<script>
        var buscar=document.getElementById('button'); //Creo una variable buscar y almaceno el ID que tiene el botón.
        buscar.addEventListener('click',()=>{ //Lanzo un evento click sobre ese botón.
            var caja=document.getElementById('caja').value; //Almaceno en una variable el valor que ha introducido el usuario en el campo.
            var img=document.getElementById('img'); //Almaceno en la variable img el id de la imagen para utilizarla después.
            var xhttp=new XMLHttpRequest(); //Instancio un objeto XMLHttpRequest para solicitar datos al servidor.
            xhttp.open("GET",`https://pokeapi.co/api/v2/pokemon/${caja}`); //Le paso por el GET la ruta de la API más el valor que he guardado anteriormente.
            xhttp.send(); //Envío la petición.
            xhttp.onreadystatechange=function () { //Especifico una función que se ejecutará cada vez que cambie el estado del objeto XMLHttpRequest.
                if(this.readyState===4 && this.status===200){ //Si me devuelve el readyState 4 y el estado 200, es correcto.
		    var datoPokemon=JSON.parse( this.responseText); //Almaceno en una variable lo que me devuelve en JSON.
		    console.log(datoPokemon);
		    img.setAttribute("src",datoPokemon.sprites.front_shiny); //Modifico el valor del atributo src de la imagen para mostrar la imagen que corresponda dependiendo del número que haya introducido el usuario.
                }else if(this.readyState===4 && this.status===404){ //Si me devuelve el readyState 4 y el estado 400, no es correcto.
                    alert("No existe"); //Esa petición no existe.
                }
            }
        })
</script>