<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamentos.
    header("Location: index.php");//Recargo el index.
    exit;
}

define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
define ('MAX_FLOAT', 3.402823466E+38); //Creo una constante del máximo permitido en un campo float.
define ('MIN_FLOAT', -3.402823466E+38); //Creo una constante del mínimo permitido en un campo float.
    
    $entradaOk = true;//Creo una variable boleana y la igualo a true.
    
    $aErrores = ["descDepartamento" => null,
                 "volumenNegocio" => null];
    
    if(isset ($_REQUEST["cambiar"])){
        $aErrores["descDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["descDepartamento"],255,1, OBLIGATORIO); //Compruebo que el campo DescDepartamento que introduce el usuario es válido.
        $aErrores["volumenNegocio"] = validacionFormularios::comprobarFloat($_REQUEST["volumenNegocio"], MAX_FLOAT, MIN_FLOAT, OBLIGATORIO); //Compruebo que el campo VolumenNegocio que introduce el usuario es válido.
    
        foreach($aErrores as $valor => $error){
            if($error != null){
                $entradaOk=false;
                $_REQUEST[$valor]="";
            }
        }
    }else{
        $entradaOk=false;
    }
    
    if($entradaOk){
        $oDepartamento = DepartamentoPDO::modificaDepartamento($_REQUEST["codUsuario"], $_REQUEST["descDepartamento"], $_REQUEST["volumenNegocio"]);
        $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];
        header("Location: index.php");
        exit;
    }
    
$vista = $vistas["consultarModificarDepartamento"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.