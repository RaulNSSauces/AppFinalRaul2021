<div class="cabeza">
    <header>
        <h1>Aplicación Final</h1>
    </header>
</div>
<main>
    <div class="ver1">
        <article>
            <a href="docs/201129CatalogoDeRequisitos.pdf" target="blank">Ver catálogo de requisitos</a>
        <br>
        <br>
            <a href="docs/210102DiagramaDeCasosDeUso.pdf" target="blank">Ver diagrama de casos de uso</a>
        <br>
        <br>
            <a href="docs/210102DiagramaDeClases.pdf" target="blank">Ver diagrama de clases</a>
        <br>
        <br>
            <a href="docs/210102ArbolDeNavegación.pdf" target="blank">Ver ver árbol de navegación</a>
        </article>
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
    <div class="ver2">
        <article>
            <a href="docs/210102RelacionDeFicheros.pdf" target="blank">Ver mapa web - relación de ficheros</a>
        <br>
        <br>
            <a href="docs/200113EstructuraDeAlmacenamiento.JPG" target="blank">Ver estructura de almacenamiento</a>
        <br>
        <br>
            <a href="docs/201127ModeloFisicoDeDatos2021.pdf" target="blank">Ver modelo físico de datos</a>
        </article>
    </div>
</main>