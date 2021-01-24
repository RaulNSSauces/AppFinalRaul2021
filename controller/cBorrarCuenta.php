<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Guardo en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}

if(isset($_REQUEST["borrar"])){//Si el usuario pulsa en el botón de borrar.
    $comprobarUsuario=UsuarioPDO::borrarUsuario($_REQUEST["codUsuario"]);//Ejecuto el metodo borrarUsuario().
    $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$comprobarUsuario;
    $_SESSION["paginaEnCurso"]=$controlador["login"];//Guardo en la variable de sesión la ruta del controlador del login.
    header("Location: index.php");//Recargo el index.
    exit;
}
    //Saco los campos de la base de datos que necesito almacenándolos en variables a través de la variable $_SESSION.
    $codUsuario=$_SESSION['usuarioDAW203LoginLogoffMulticapa']->getCodUsuario();
    $descUsuario = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getDescUsuario();
    $fechaHoraUltimaConexion = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getFechaHoraUltimaConexion();
    
$vista = $vistas["borrarCuenta"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.