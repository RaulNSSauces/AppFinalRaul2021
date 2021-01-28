<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Almaceno en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
    define("OBLIGATORIO", 1);
    
    $entradaOk=true;
    
    $aErrores=["passwordActual" => null,//Creo un array de errores donde almaceno los campos que le pido al usuario y los inicializo a null.
               "passwordNueva" => null,
               "confirmarPassword" => null];
    
    if(isset($_REQUEST["cambiar"])){//Si el usuario pulsa el botón de registrarse.
        $aErrores["passwordActual"] = validacionFormularios::validarPassword($_REQUEST["passwordActual"], 8, 4, 2, OBLIGATORIO);//Valido que los campos que ha escrito el usuario son correctos.
        $aErrores["passwordNueva"]= validacionFormularios::validarPassword($_REQUEST["passwordNueva"], 8, 4, 2, OBLIGATORIO);
        $aErrores["confirmarPassword"] = validacionFormularios::validarPassword($_REQUEST["confirmarPassword"], 8, 4, 2, OBLIGATORIO);
        
        
        if($_REQUEST["passwordNueva"]!=$_REQUEST["confirmarPassword"]){//Compruebo que las dos contraseñas son iguales.
            $aErrores["confirmarPassword"]="Las contraseñas no coinciden";//Si no lo son muestro un mensaje de error.
        }
    
        foreach($aErrores as $campo => $error){//Recorro cada campo del array de errores.
            if($error!=null){//Compruebo que cada campo no tiene errores.
                $entradaOk=false;//Si los tiene devuelve un false.
                $_REQUEST[$campo]="";//Limpio los campos.
            }
        }
    }else{
        $entradaOk=false;
    }
    
    if($entradaOk){//Si la entrada es Ok.
        $oUsuario= usuarioPDO::modificarPassword($_SESSION["usuarioDAW203LoginLogoffMulticapa"]->getCodUsuario(), $_REQUEST["passwordNueva"]);//Almaceno en una variable la ejecución del método modificarPassword() que me devuelve un objeto.
        $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$oUsuario;//Almaceno en la sesión el nuevo usuario registrado.
        $_SESSION["paginaEnCurso"] = $controlador["inicio"];//Almaceno en la sesión de la página en curso el controlador del inicio.
        header("Location: index.php");
        exit;
    }

$vista = $vistas["cambiarPassword"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.

?>
