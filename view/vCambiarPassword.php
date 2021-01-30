<div class="cabeza">
<header>
    <h1>CAMBIAR CONTRASEÑA</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Modifica tu contraseña</p>
    <form name="modificarPassword" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="passwordActual">Contraseña actual</label>
                <input type="password" name="passwordActual" placeholder="Introduce tu contraseña actual">
            </div>
        <br>
            <div>
                <label for="passwordNueva">Contraseña nueva</label>
                <input type="password" name="passwordNueva" value="<?php
                    if($aErrores["passwordNueva"]==null && isset($_REQUEST["passwordNueva"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["passwordNueva"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }
                ?>" placeholder="Introduce la nueva contraseña">
                <?php
                    if($aErrores["passwordNueva"]!=null){ //Compruebo que el array de errores no está vacío.
                        echo $aErrores["passwordNueva"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="confirmarPassword">Confirmar contraseña nueva</label>
                <input type="password" name="confirmarPassword" value="<?php
                    if($aErrores["confirmarPassword"]==null && isset($_REQUEST["confirmarPassword"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["confirmarPassword"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }
                ?>" placeholder="Repite la contraseña anterior">
                <?php
                    if($aErrores["confirmarPassword"]!=null){ //Compruebo que el array de errores no está vacío.
                        echo $aErrores["confirmarPassword"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
                <button class="btnAceptar" type="submit" name="cambiar">Cambiar</button>
            </div>
    </form>
    </div>
</main>