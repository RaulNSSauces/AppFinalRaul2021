<div class="cabeza">
<header>
    <h1>CONSULTAR / MODIFICAR DEPARTAMENTO</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Consulta/modifica un departamento</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codDepartamento">Código del departamento</label>
                <input type="text" name="codDepartamento" value="<?php echo $oDepartamento->getCodDepartamento(); ?>" readonly>
            </div>
        <br>
            <div>
                <label for="descDepartamento">Descripción del departamento</label>
                <input style="background-color:#D8DFEE; color: black;" type="text" name="descDepartamento" value="<?php 
                    if(isset($_REQUEST["descDepartamento"]) && $aErrores["descDepartamento"] == null){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["descDepartamento"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }else{
                        echo $oDepartamento->getDescDepartamento();
                    }
                ?>">
                <?php
                    if ($aErrores["descDepartamento"] != null) { //Compruebo que el array de errores no está vacío.
                        echo $aErrores["descDepartamento"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="volumenNegocio">Volumen de negocio</label>
                <input style="background-color: #D8DFEE; color: black;" type="text" name="volumenNegocio" value="<?php 
                    if(isset($_REQUEST["volumenNegocio"]) && $aErrores["volumenNegocio"] == null){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                        echo $_REQUEST["volumenNegocio"]; //Devuelve el campo que ha escrito previamente el usuario.
                    }else{
                        echo $oDepartamento->getVolumenDeNegocio();
                    }
                ?>">
                <?php
                    if ($aErrores["volumenNegocio"] != null) { //Compruebo que el array de errores no está vacío.
                        echo $aErrores["volumenNegocio"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                    }
                ?>  
            </div>
        <br>
            <div>
                <label for="fechaBajaDepartamento">Fecha baja del departamento</label>
                <input type="text" name="fechaBajaDepartamento" value="<?php 
                    if($oDepartamento->getFechaBajaDepartamento() == null){
                        echo "null";
                    }else{
                        echo date('d/m/Y',$oDepartamento->getFechaBajaDepartamento());}?>" readonly>
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