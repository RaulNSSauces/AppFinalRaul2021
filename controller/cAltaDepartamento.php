<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa en el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del mantenimiento de departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}

define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
define ('MAX_FLOAT', 3.402823466E+38); //Creo una constante del máximo permitido en un campo float.
define ('MIN_FLOAT', -3.402823466E+38); //Creo una constante del mínimo permitido en un campo float.
    
$entradaOk=true;

$aErrores = ["codDepartamento" => null,
             "descDepartamento" => null,
             "volumenNegocio" => null];

if(isset($_REQUEST["cambiar"])){
    
    $aErrores["codDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["codDepartamento"],3,3, OBLIGATORIO); //Compruebo que el campo CodDepartamento que introduce el usuario es válido.
    if($aErrores["codDepartamento"]==null && DepartamentoPDO::validarCodNoExiste($_REQUEST["codDepartamento"])==false){//Si el array de errores del campo del código está vacío y el método validadCodNoExiste() devuelve falso.
            $aErrores["codDepartamento"]="El código de usuario ya existe";//Muestro un mensaje de que el código del usuario ya existe.
        }
    $aErrores["descDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["descDepartamento"],255,1, OBLIGATORIO); //Compruebo que el campo DescDepartamento que introduce el usuario es válido.
    $aErrores["volumenNegocio"] = validacionFormularios::comprobarFloat($_REQUEST["volumenNegocio"], MAX_FLOAT, MIN_FLOAT, OBLIGATORIO); //Compruebo que el campo VolumenNegocio que introduce el usuario es válido.

    foreach($aErrores as $campo => $error){//Recorro cada campo del array de errores.
            if($error!=null){//Compruebo que cada campo no tiene errores.
                $entradaOk=false;//Si los tiene devuelve un false.
                $_REQUEST[$campo]="";//Limpio los campos.
            }
        }
    }else{
        $entradaOk=false;
    }
    if($entradaOk){
        $oDepartamento = DepartamentoPDO::altaDepartamento($_REQUEST["codDepartamento"], $_REQUEST["descDepartamento"], $_REQUEST["volumenNegocio"]);
        $_SESSION["paginaEnCurso"]=$controlador["mtoDepartamentos"];
        header("Location: index.php");
        exit;
    }
$vista = $vistas["altaDepartamento"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>