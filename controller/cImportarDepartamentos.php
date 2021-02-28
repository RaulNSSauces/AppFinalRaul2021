<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamentos.
    header("Location: index.php");//Recargo el index.
    exit;
}

$entradaOK = true;

$errorArchivo = null;

if (isset($_REQUEST['importar'])) {

    if ($_FILES['archivo']['type'] != 'text/xml') {
        $errorArchivo = "El fomato de archivo debe ser .xml";
    }
    
    if($errorArchivo==null){
        $entradaOK=false;
    }
}else{
    $entradaOK=false;
}
if($entradaOK){
    DepartamentoPDO::importar($_FILES['importarDep']['tmp_name']);
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamentos.
    header("Location: index.php");//Recargo el index.
    exit;
}
$vista = $vistas["importarDepartamentos"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>