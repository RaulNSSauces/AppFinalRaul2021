<div class="cabeza">
    <header>
        <h1>Aplicación Raúl 2021</h1>
    </header>
</div>
<main>
    <div class="ver1">
        <a href="docs/201129CatalogoDeRequisitos.pdf" target="blank"><img src="webroot/media/requisitos.PNG"></a>
        <a href="docs/210216DiagramaDeCasosDeUso.pdf" target="blank"><img src="webroot/media/casosUso.PNG"></a>
        <a href="docs/diagramaDeClasesRaul.PNG" target="blank"><img src="docs/diagramaDeClasesRaul.PNG"></a>
        <a href="docs/210102ArbolDeNavegación.pdf" target="blank"><img src="webroot/media/arbolNavegacion.PNG"></a>
        <a href="docs/210102RelacionDeFicheros.pdf" target="blank"><img src="webroot/media/relacionFicheros.PNG" ></a>
        <a href="docs/200113EstructuraDeAlmacenamiento.JPG" target="blank"><img src="webroot/media/estructuraDeAlmacenamiento.PNG"></a>
        <a href="docs/201127ModeloFisicoDeDatos2021.pdf" target="blank"><img src="webroot/media/modelo.PNG"></a>
    </div>
    <div class="loginbox">
        <p class="pLogin">Iniciar sesión en la aplicación</p>
    <form name="login" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <div>
                <label for="codUsuario">Nombre de usuario</label>
                <input type="text" name="codUsuario" placeholder="Introduce nombre de usuario">
            </div>
        <br>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="Introduce contraseña">
            </div>
        <br>
            <div>
                <button class="btnIniciarSesion" type="submit" name="iniciarSesion">Iniciar sesión</button>
                <button class="btnRegistro" type="submit" name="registrate">Regístrate</button>
            </div>
    </form>
    </div>
</main>