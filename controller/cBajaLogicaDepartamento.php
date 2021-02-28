<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamentos.
    header("Location: index.php");//Recargo el index.
    exit;
}

$oDepartamento = DepartamentoPDO::datosDepartamentos($_SESSION["codDepartamento"]);

define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
    
$entradaOk=true;

$error = ["fechaBaja" => null];

if(isset($_REQUEST["cambiar"])){
    $error = validacionFormularios::validarFecha($_REQUEST["fechaBaja"], '2050/01/01', date("Y/m/d", time()), OBLIGATORIO);
    
    if($error != null){
        $entradaOk = false;
        $_REQUEST["fechaBaja"]="";
    }
}else{
    $entradaOk=false;
}

if($entradaOk){
    DepartamentoPDO::bajaLogicaDepartamento($_SESSION["codDepartamento"], $_REQUEST["fechaBaja"]);
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];
    header("Location: index.php");
    exit;
}

$vista = $vistas["bajaLogicaDepartamento"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>