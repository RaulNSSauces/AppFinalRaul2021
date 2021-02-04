<div class="cabeza">
<header>
    <h1>MTO. DEPARTAMENTOS</h1>
</header>
</div>
<main>
        <article class="vInicio">
            <form name="formularioBuscar" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div class="buscarMto">
                    <label for="DescDepartamento">Busca un departamento:</label>
                    <input type="text" name="DescDepartamento">
                    <button class="btnMtoBuscar" type="submit" name="buscar">Buscar</button>
                </div>
            </form>
            
            <table class="tMto">
                <tr class="trMto">
                    <th class="thMto">Código</td>
                    <th class="thMto">Descripción</td>
                    <th class="thMto">Fecha</td>
                    <th class="thMto">Volumen de Negocio</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <form name="mtoDep" method="post">
                            <button class="btnacb" type="submit" name="añadir"><img src="webroot/media/añadirDep.png" width="30px" height="30px"></button>
                            <button class="btnacb" type="submit" name="consultar"><img src="webroot/media/consultarDep.png" width="30px" height="30px"></button>
                            <button class="btnacb" type="submit" name="eliminar"><img src="webroot/media/eliminarDep.png" width="30px" height="30px"></button>
                            <button class="btnacb" type="submit" name="alta"><img src="webroot/media/altaDep.png" width="30px" height="30px"></button>
                            <button class="btnacb" type="submit" name="baja"><img src="webroot/media/bajaDep.png" width="30px" height="30px"></button>
                        </form>
                    </td>
                </tr>
            </table>
            
            <form name="mtoDep" method="post">
                <button class="btnMtoImportar" type="submit" name="importar">Importar</button>
                <button class="btnMtoExportar" type="submit" name="exportar">Exportar</button>
                <button class="btnMtoVolver" type="submit" name="volver">Volver</button>
            </form>
        </article>
</main>