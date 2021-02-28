<?php
if(isset($_REQUEST["volver"])){//Si el usuario pulsa el botón de volver.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Guardo en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset($_REQUEST["añadir"])){//Si el usuario pulsa el botón de añadir.
    $_SESSION["paginaEnCurso"]=$controlador["altaDepartamento"];//Guardo en la variable de sesión la ruta del controlador del alta de departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["consultar"])){//Si el usuario pulsa el botón de consultar.
    $_SESSION["codDepartamento"]=$_REQUEST["consultar"];
    $_SESSION["paginaEnCurso"]=$controlador["consultarModificarDepartamento"];//Guardo en la variable de sesión la ruta del controlador del consultar modificar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["eliminar"])){//Si el usuario pulsa el botón de eliminar.
    $_SESSION["codDepartamento"]=$_REQUEST["eliminar"];
    $_SESSION["paginaEnCurso"]=$controlador["eliminarDepartamento"];//Guardo en la variable de sesión la ruta del controlador del eliminar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["alta"])){//Si el usuario pulsa el botón de alta.
    $_SESSION["codDepartamento"]=$_REQUEST["alta"];
    $_SESSION["paginaEnCurso"]=$controlador["rehabilitacionDepartamento"];//Guardo en la variable de sesión la ruta del controlador de la rehabilitación del departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["baja"])){//Si el usuario pulsa el botón de baja.
    $_SESSION["codDepartamento"]=$_REQUEST["baja"];
    $_SESSION["paginaEnCurso"]=$controlador["bajaLogicaDepartamento"];//Guardo en la variable de sesión la ruta del controlador de la baja logica del departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["importar"])){//Si el usuario pulsa el botón de importar.
    $_SESSION["paginaEnCurso"]=$controlador["importarDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del importar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset($_REQUEST["exporta"])){
    $_SESSION["paginaEnCurso"]=$controlador["exportarDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del importar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}

if(!isset($_REQUEST["buscar"])){
    $aDepartamento = DepartamentoPDO::buscaDepartamentosPorDescripcion("");
}

define("OPCIONAL", 0);

if(isset($_REQUEST["buscar"])){
    $entradaOk = true;
    $errorBusqueda = null;
    
    $errorBusqueda = validacionFormularios::comprobarAlfaNumerico($_REQUEST["descDepartamento"], 255, 1, OPCIONAL);
    if($errorBusqueda != null){
        $entradaOk = false;
        $_REQUEST["descDepartamento"] = "";
    }
}else{
    $_REQUEST["descDepartamento"] = "";
}

if($entradaOk){
    $_SESSION["BuscarDepartamento"] = $_REQUEST["descDepartamento"];
    $aDepartamento = DepartamentoPDO::buscaDepartamentosPorDescripcion($_REQUEST["descDepartamento"]);
}

$vista = $vistas["mtoDepartamentos"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>