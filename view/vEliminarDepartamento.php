<div class="cabeza">
<header>
    <h1>ELIMINAR DEPARTAMENTO</h1>
</header>
</div>
<main>
    <div class="loginbox">
        <p class="pEditarPerfil">Elimina este departamento</p>
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
                <label for="volumenDeNegocio">Volumen de negocio</label>
                <input type="text" name="volumenDeNegocio" value="<?php echo $oDepartamento->getVolumenDeNegocio(); ?>" readonly>
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
                <button class="btnAceptar" type="submit" name="eliminar">Aceptar</button>
            </div>
    </form>
        <form class="contenedorAtras">
            <button class="btnAtras" type="submit" name="cancelar">Atrás</button>
        </form>
    </div>
</main>