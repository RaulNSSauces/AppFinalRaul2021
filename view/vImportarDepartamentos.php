<div class="cabeza">
<header>
    <h1>IMPORTAR DEPARTAMENTOS</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Importa tus departamentos</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="importarDep">Examina para importar tus departamentos</label>
                <br>
                <br>
                <input type="file" name="importarDep">
            </div>
        <br>
            <div>
                <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
            </div>
    </form>
    </div>
</main>