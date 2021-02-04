<div class="cabeza">
<header>
    <h1>INICIO</h1>
</header>
</div>
<main>
        <article class="vInicio">
            <h3>BIENVENIDO <?php echo $descUsuario?></h3>
            <?php
                if($numConexiones>1){
            ?>
            <br>
            <h3>Esta es su conexión número: <?php echo $numConexiones?></h3>
            <br>
            <h3>Su última conexión fue: <?php echo date("d-m-Y H:i:s",$fechaHoraUltimaConexion)?></h3>
            <?php
                }else{
                    echo "<h2>Esta es la primera vez que se conecta</h2>";
                }
            ?>
        </article>
    <form name="inicio" method="post">
        <button class="btnEditarPerfil" type="submit" name="editarPerfil"><img src="webroot/media/editarPerfil.png" width="35px" height="35px"></button>
        <button class="btnCerrarSesion" type="submit" name="cerrarSesion"><img src="webroot/media/cerrarSesion.png" width="30px" height="30px"></button>
        <button class="btnEliminar" type="submit" name="eliminar"><img src="webroot/media/eliminar.png" width="30px" height="30px"></button>
        <button class="btnRest" type="submit" name="rest"><img src="webroot/media/rest.png" width="30px" height="30px"></button>
        <button class="btnPassword" type="submit" name="cambiar"><img src="webroot/media/candado.png" width="30px" height="30px"></button>
        <button class="btnMto" type="submit" name="mtoDepartamentos"><img src="webroot/media/mto.png" width="30px" height="30px"></button>
    </form>
</main>