<div class="cabeza">
<header>
    <h1>EXPORTAR DEPARTAMENTOS</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Exporta tus departamentos</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <p>Haz click para exportar tus departamentos</p>
            </div>
        <br>
            <div class="contenedorAceptar">
                <button class="btnAceptar" type="submit" name="exportar">Exportar</button>
            </div>
    </form>
    <form class="contenedorAtras">
        <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
    </form>
    </div>
</main>

