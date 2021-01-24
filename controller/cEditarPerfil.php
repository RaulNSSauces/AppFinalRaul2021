<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Almaceno en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
define("OBLIGATORIO", 1);//Creo una constante y le asigno un 1.
    
    $entradaOk=true;//Creo una variable boleana y la igualo a true.
    
    $error=null;//Creo una variable de error y lo igualo a null.
    
    if(isset($_REQUEST["cambiar"])){//Si el usuario pulsa el botón de cambiar.
        $error=validacionFormularios::comprobarAlfabetico($_REQUEST["descUsuario"], 16, 3, OBLIGATORIO);//Compruebo que el campo descripción del usuario haya introducido datos válidos.
        
        if($error!=null){//Compruebo que la variable $error no está vacía.
            $entradaOk=false;//Si los hay devuelve falso.
            $error="";//Limpio el campo.
        }
    }else{
        $entradaOk=false;
    }

    if($entradaOk){//Si la entrada es Ok.
        $oUsuario= usuarioPDO::modificarUsuario($_REQUEST["codUsuario"], $_REQUEST["descUsuario"]); //Ejecuto el método modificarUsuario().
        $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$oUsuario;//Almaceno en la sesión la variable $oUsuario que contiene un objeto el resultado de ejecutar la consulta.
        $_SESSION["paginaEnCurso"] = $controlador["inicio"];//Almaceno en la variable de sesión la ruta del contrololador del inicio.
        header("Location: index.php");//Recargo el index.
        exit;
    }
    //Almaceno en variables los datos que quiero sacar de la base de datos.
    $codUsuario=$_SESSION['usuarioDAW203LoginLogoffMulticapa']->getCodUsuario();
    $descUsuario = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getDescUsuario();
    $numConexiones = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getNumConexiones();
    $fechaHoraUltimaConexion = $_SESSION['usuarioDAW203LoginLogoffMulticapa']->getFechaHoraUltimaConexion();
    
    $vista = $vistas['editarPerfil'];//Almaceno en una variable la vista de editar perfil que es la que quiero cargar.
    require_once $vistas['layout'];//Incluyo la vista del layout.
?>