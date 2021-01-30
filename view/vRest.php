<div class="cabeza">
<header>
    <h1>API REST</h1>
</header>
</div>
<main>
    <article class="vInicio" style="border-bottom: 2px solid grey">
        <h3><a style="text-decoration: none; color: black;" href="https://datos.madrid.es/portal/site/egob/menuitem.214413fe61bdd68a53318ba0a8a409a0/?vgnextoid=b07e0f7c5ff9e510VgnVCM1000008a4a900aRCRD&vgnextchannel=b07e0f7c5ff9e510VgnVCM1000008a4a900aRCRD&vgnextfmt=default#" target="blank">API DE POLIDEPORTIVOS DE MADRID</a></h3>
        <br>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="direccion">Polideportivos en localidades de Madrid <p style="font-size: 15px;">ARGANZUELA, BARAJAS, CARABANCHEL, CENTRO, CHAMARTIN, CHAMBERI, HORTALEZA, RETIRO, TETUAN, USERA, VILLAVERDE</p></label>
            <br>
                <input type="text" name="polideportivo">
            <br>
                <?php
                    if(isset ($_REQUEST["polideportivo"])){
                        foreach ($aPolideportivos as $campo => $valor){
                            echo $valor."<br>";
                        }
                    }
                ?>
            <br>
            <button class="btnAtras" type="submit" name="buscar">Buscar</button>
            <button class="btnAtras" type="submit" name="cancelar">Volver</button>
            </form>
            <br>
            <br>
        </div>
    </article>
    <article class="vInicio">
        <h4><a style="text-decoration: none; color: black;" href="https://api.nasa.gov/" target="blank">API DE LA NASA</a></h4>
        <br>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <input type="date" name="fecha" value="<?php echo date('Y-m-d') ?>">
        <br>
                    <div>
                        <p><?php echo $tituloEnCurso?></p>
        <br>
        
                        <img src="<?php echo $imagenEnCurso?>" width="200px">
        <br>
                        <p><?php echo $descripcionEnCurso?></p>
                    </div>
        <br>
        <br>
                <button class="btnAtras" type="submit" name="enviar">Buscar</button>
                <button class="btnAtras" type="submit" name="cancelar">Volver</button>
            </form>
        </div>
    </article>
</main>