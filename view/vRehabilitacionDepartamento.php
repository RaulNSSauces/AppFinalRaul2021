<div class="cabeza">
<header>
    <h1>REHABILITACIÓN DEPARTAMENTO</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Rehabilita un departamento</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codDepartamento">Código del departamento</label>
                <input type="text" name="codDepartamento">
            </div>
        <br>
            <div>
                <label for="descDepartamento">Descripción del departamento</label>
                <input type="text" name="descDepartamento">
            </div>
        <br>
            <div>
                <label for="volumenDeNegocio">Volumen de negocio</label>
                <input type="text" name="volumenDeNegocio">
            </div>
        <br>
            <div>
                <label for="fechaBajaDepartamento">Fecha baja del departamento</label>
                <input type="text" name="fechaBajaDepartamento">
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