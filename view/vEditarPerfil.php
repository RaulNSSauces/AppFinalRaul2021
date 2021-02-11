<div class="cabeza">
<header>
    <h1>EDITAR PERFIL</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Edita la descripción de tu usuario</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" onsubmit="return validarEditarPerfil()">
            <div>
                <label for="codUsuario">Nombre de usuario</label>
                <input type="text" name="codUsuario" value="<?php echo $codUsuario?>" readonly>
            </div>
        <br>
            <div>
                <label style="font-weight: bold;" for="descUsuario">Descripción del usuario</label>
                <input id="descripcionUsuario" style="font-weight: bold;" type="text" name="descUsuario" value="<?php echo $descUsuario?>">
                <?php
                    if(isset($_REQUEST["descUsuario"]) && $error == null){
                        echo $_REQUEST["descUsuario"];
                    }
                    if ($error != null){
                        echo $error;
                    }
                ?>
                <p id="warning1"></p>
            </div>
        <br>
            <div>
                <label for="numConexiones">Número de conexiones</label>
                <input type="text" name="numConexiones" value="<?php echo $numConexiones?>" readonly>
            </div>
        <br>
            <div>
                <label for="fechaHoraUltimaConexion">Fecha y Hora de la última conexión</label>
                <input type="text" name="fechaHoraUltimaConexion" value="<?php echo date("d-m-Y H:i:s",$fechaHoraUltimaActual)?>" readonly>
            </div>
        <br>
            <div class="contenedorAceptar">
                <button class="btnAceptar" type="submit" name="cambiar">Aceptar</button>
            </div>
    </form>
    <form class="contenedorAtras">
        <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
    </form>
    </div>
</main>