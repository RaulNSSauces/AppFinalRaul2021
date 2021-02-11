<div class="cabeza">
<header>
    <h1>ELIMINAR CUENTA</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">¿Quieres eliminar tu cuenta?</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codUsuario">Nombre de usuario</label>
                <input type="text" name="codUsuario" value="<?php echo $codUsuario?>" readonly>
            </div>
        <br>
            <div>
                <label for="descUsuario">Descripción del usuario</label>
                <input type="text" name="descUsuario" value="<?php echo $descUsuario?>" readonly>
            </div>
        <br>
            <div>
                <label for="fechaHoraUltimaConexion">Fecha y Hora de la última conexión</label>
                <input type="text" name="fechaHoraUltimaConexion" value="<?php echo date("d-m-Y H:i:s",$fechaHoraUltimaConexion)?>" readonly>
            </div>
        <br>
            <div class="contenedorAceptar">
                <button class="btnAceptar" type="submit" name="borrar">Borrar</button>
            </div>
    </form>
    <form class="contenedorAtras">
        <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
    </form>
    </div>
</main>