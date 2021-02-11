<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamentos.
    header("Location: index.php");//Recargo el index.
    exit;
}

if(isset ($_REQUEST["eliminar"])){
    $oDepartamento = DepartamentoPDO::bajaFisicaDepartamento($_REQUEST["codDepartamento"]);
    $_SESSION["departamentos"]=$oDepartamento;
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];
    header("Location: index.php");
    exit;
}

$vista = $vistas["eliminarDepartamento"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>