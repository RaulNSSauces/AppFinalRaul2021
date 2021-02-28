<div class="cabeza">
<header>
    <h1>BAJA LOGICA DEPARTAMENTO</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Baja lógica de un departamento</p>
    <form name="modificarPerfil" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codDepartamento">Código del departamento</label>
                <input type="text" name="codDepartamento" value="<?php echo $oDepartamento->getCodDepartamento(); ?>" readonly>
            </div>
        <br>
            <div>
                <label for="descDepartamento">Descripción del departamento</label>
                <input type="text" name="descDepartamento" value="<?php echo $oDepartamento->getDescDepartamento(); ?>" readonly>
            </div>
        <br>
            <div>
                <label for="fechaCreacion">Fecha de creación del departamento</label>
                <input type="text" name="fechaCreacion" value="<?php echo date('d/m/Y',$oDepartamento->getFechaCreacionDepartamento()); ?>" readonly>
            </div>
        <br>
            <div>
                <label for="volumenDeNegocio">Volumen de negocio</label>
                <input type="text" name="volumenDeNegocio" value="<?php echo $oDepartamento->getVolumenDeNegocio(); ?>" readonly>
            </div>
        <br>
            <div>
                <label for="fechaBaja">Fecha baja del departamento</label>
                <input type="date" name="fechaBaja" value="<?php echo date('Y-m-d');?>">
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