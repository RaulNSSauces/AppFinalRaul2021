<div class="cabeza">
<header>
    <h1>AÑADIR DEPARTAMENTO</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Añade un nuevo departamento</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codDepartamento">Código del departamento</label>
                <input type="text" name="codDepartamento" value="<?php 
                    if($aErrores["codDepartamento"] == null && isset($_REQUEST["codDepartamento"])){
                        echo $_REQUEST["codDepartamento"];
                    }
                ?>">
                <?php
                    if($aErrores["codDepartamento"] != null){
                        echo $aErrores["codDepartamento"];
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="descDepartamento">Descripción del departamento</label>
                <input type="text" name="descDepartamento" value="<?php
                    if($aErrores["descDepartamento"] == null && isset($_REQUEST["descDepartamento"])){
                        echo $_REQUEST["descDepartamento"];
                    }
                ?>">
                <?php
                    if($aErrores["descDepartamento"] != null){
                        echo $aErrores["descDepartamento"];
                    }
                ?>
            </div>
        <br>
            <div>
                <label for="volumenNegocio">Volumen de negocio</label>
                <input type="text" name="volumenNegocio" value="<?php
                    if($aErrores["volumenNegocio"] == null && isset($_REQUEST["volumenNegocio"])){
                        echo $_REQUEST["volumenNegocio"];
                    }
                ?>">
                <?php
                    if($aErrores["volumenNegocio"] != null){
                        echo $aErrores["volumenNegocio"];
                    }
                ?>
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