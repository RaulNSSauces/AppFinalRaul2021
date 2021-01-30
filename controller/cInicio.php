<?php
    if(!isset($_SESSION["usuarioDAW203LoginLogoffMulticapa"])){//Si el usuario no ha iniciado sesión.
        header("Location: index.php");//Recargo el index y redirijo al usuario al login.
        exit;
    }
    
    if(isset($_REQUEST["editarPerfil"])){//Si el usuario pulsa en el botón de editar perfil.
        $_SESSION["paginaEnCurso"] = $controlador["editarPerfil"];//Almaceno en la variable de sesión la ruta del controlador de editar perfil.
        header("Location: index.php"); //Recargo el index.
        exit;
    }
    
    if(isset($_REQUEST["eliminar"])){//Si el usuario pulsa en el botón de eliminar usuario.
        $_SESSION["paginaEnCurso"] = $controlador["borrarCuenta"];//Almaceno en la variable de sesión la ruta del controlador de borrar cuenta.
        header("Location: index.php");//Recargo el index.
        exit;
    }
    
    if(isset($_REQUEST["cambiar"])){
        $_SESSION["paginaEnCurso"] = $controlador["cambiarPassword"];
        header("Location: index.php");
        exit;
    }
    
    if(isset($_REQUEST["rest"])){//Si el usuario pulsa en el botón de eliminar usuario.
        $_SESSION["paginaEnCurso"] = $controlador["rest"];//Almaceno en la variable de sesión la ruta del controlador de borrar cuenta.
        header("Location: index.php");//Recargo el index.
        exit;
    }
    
    if(isset($_REQUEST["cerrarSesion"])){//Si el usuario pulsa el botón de cerrar sesión.
        session_destroy();//Destruyo la sesión.
        header("Location: index.php");//Recargo el index.
        exit;
    }
    //Saco todos los campos necesarios de la base de datos almacenándolos en variables.
    $numConexiones = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getNumConexiones();
    $descUsuario = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getDescUsuario();
    $fechaHoraUltimaConexion = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getFechaHoraUltimaConexion();
    
    $vista = $vistas['inicio'];//Almaceno en una variable la vista que quiero cargar.
    require_once $vistas['layout'];//Incluyo la vista del layout.
?>