<div class="cabeza">
<header>
    <h1>IMPORTAR DEPARTAMENTOS</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Importa tus departamentos</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <div>
                <label for="importarDep">Examina para importar tus departamentos</label>
                <br>
                <input type="file" id="importarDep" name="importarDep">
            </div>
        <br>
            <div class="contenedorAceptar">
                <button class="btnAceptar" type="submit" name="importar">Aceptar</button>
            </div>
    </form>
    <form class="contenedorAtras">
        <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
    </form>
    </div>
</main>