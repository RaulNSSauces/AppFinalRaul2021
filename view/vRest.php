<div class="cabeza">
<header>
    <h1>API REST</h1>
</header>
</div>
<main>
    <article class="vInicio" style="border-bottom: 2px solid grey">
        <h3>Calculadora</h3>
        <br>
        <div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <label for="operacion">Elije una opción para operar</label>
                <select style='width: 120px; height: 30px;' id="operacion", name="operacion">
                    <option value="1"
                        <?php  
                            if(isset($_REQUEST["operacion"])){
                                if($_REQUEST["operacion"]==1){
                                    echo "selected ";
                                }
                            }
                        ?>>SUMA</option>
                    <option value="2"
                        <?php  
                            if(isset($_REQUEST["operacion"])){
                                if($_REQUEST["operacion"]==2){
                                    echo "selected ";
                                }
                            }
                        ?>>RESTA</option>
                    <option value="3"
                        <?php  
                            if(isset($_REQUEST["operacion"])){
                                if($_REQUEST["operacion"]==3){
                                    echo "selected ";
                                }
                            }
                        ?>>MULTIPLICA</option>
                    <option value="4"
                        <?php  
                            if(isset($_REQUEST["operacion"])){
                                if($_REQUEST["operacion"]==4){
                                    echo "selected ";
                                }
                            }
                        ?>>DIVIDE</option>
                </select>
                <br>
                <br>
                <label for="n1">Primer número</label>
                <input style='width: 50px; height: 50px; border-radius: 50%; text-align: center;' type="text" name="n1" value="<?php 
                    if(isset($_REQUEST["n1"])){
                        echo $_REQUEST["n1"];
                    }
                ?>">
                <br>
                <br>
                <label for="n2">Segundo número</label>
                <input style='width: 50px; height: 50px; border-radius: 50%; text-align: center;' type="text" name="n2" value="<?php 
                    if(isset($_REQUEST["n2"])){
                        echo $_REQUEST["n2"];
                    }
                ?>">
                <br>
                <br>
                <?php
                    if(isset($_REQUEST["calcula"])){
                        echo $resultado;
                    }
                ?>
                <br>
                <br>
                <div class="contenedorAceptar">
                    <button class="btnAceptarRest" type="submit" name="calcula">Calcula</button>
                </div>
                <div class="contenedorAtras">
                    <button class="btnAtrasRest" type="submit" name="cancelar">Volver</button>
                </div>
            </form>
            <br>
            <br>
        </div>
    </article>
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
            <div class="contenedorAceptar">
                <button class="btnAceptarRest" type="submit" name="buscar">Buscar</button>
            </div>
            <div class="contenedorAtras">
                <button class="btnAtrasRest" type="submit" name="cancelar">Volver</button>
            </div>
            </form>
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
            <div class="contenedorAceptar">
                <button class="btnAceptarRest" type="submit" name="enviar">Buscar</button>
            </div>
            <div class="contenedorAtras">
                <button class="btnAtrasRest" type="submit" name="cancelar">Volver</button>
            </div> 
            </form>
        </div>
    </article>
</main>