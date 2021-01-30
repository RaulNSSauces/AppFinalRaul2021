<div class="cabeza">
<header>
    <h1>REGISTRO</h1>
</header>
</div>
<main>
    <form name="registro" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div class="loginbox">
            <p class="pRegistro">Crea tu cuenta</p>
            <div>
                <label for="codUsuario">Nombre de usuario</label>
                <input type="text" name="codUsuario" value="<?php 
                    if($aErrores["codUsuario"] == null && isset($_REQUEST["codUsuario"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["codUsuario"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }
                ?>" placeholder="Introduce nombre de usuario">
                <?php
                    if ($aErrores["codUsuario"] != null) { //Compruebo que el array de errores no está vacío.
                        echo $aErrores["codUsuario"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" value="<?php
                    if($aErrores["password"]==null && isset($_REQUEST["password"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["password"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }
                ?>" placeholder="Introduce una contraseña">
                <?php
                    if($aErrores["password"]!=null){ //Compruebo que el array de errores no está vacío.
                        echo $aErrores["password"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="confirmarPassword">Confirmar contraseña</label>
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
                <label for="descUsuario">Descripción del usuario</label>
                <input type="text" name="descUsuario" value="<?php
                    if($aErrores["descUsuario"]==null && isset($_REQUEST["descUsuario"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["descUsuario"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }
                ?>" placeholder="Introduce descripción del usuario">
                <?php
                    if($aErrores["descUsuario"]!=null){ //Compruebo que el array de errores no está vacío.
                        echo $aErrores["descUsuario"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
                <button class="btnAceptar" type="submit" name="registrate">Aceptar</button>
            </div>
    </form>
        </div>
</main>