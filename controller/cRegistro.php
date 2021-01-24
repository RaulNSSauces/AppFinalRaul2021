<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["login"];//Almaceno en la sesión una variable de sesión la ruta del controlador del login.
    header("Location: index.php");//Recargo el index y redirijo al usuario al login.
    exit;
}

    define("OBLIGATORIO", 1);
    
    $entradaOk=true;
    
    $aErrores=["codUsuario" => null,//Creo un array de errores donde almaceno los campos que le pido al usuario y los inicializo a null.
               "descUsuario" => null,
               "password" => null,
               "confirmarPassword" => null];
    
    if(isset($_REQUEST["registrate"])){//Si el usuario pulsa el botón de registrarse.
        $aErrores["codUsuario"]= validacionFormularios::comprobarAlfaNumerico($_REQUEST["codUsuario"], 8, 4, OBLIGATORIO);//Valido que los campos que ha escrito el usuario son correctos.
        
        if($aErrores["codUsuario"]==null && UsuarioPDO::validarCodNoExiste($_REQUEST["codUsuario"])==false){//Si el array de errores del campo del código está vacío y el método validadCodNoExiste() devuelve falso.
            $aErrores["codUsuario"]="El código de usuario ya existe";//Muestro un mensaje de que el código del usuario ya existe.
        }
        //Valido que los campos que ha escrito el usuario son correctos.
        $aErrores["descUsuario"]= validacionFormularios::comprobarAlfabetico($_REQUEST["descUsuario"], 255, 4, OBLIGATORIO);
        $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST["password"], 8, 4, 1, OBLIGATORIO);
        $aErrores["confirmarPassword"] = validacionFormularios::validarPassword($_REQUEST["confirmarPassword"], 8, 4, 1, OBLIGATORIO);
        
        
        if($_REQUEST["password"]!=$_REQUEST["confirmarPassword"]){//Compruebo que las dos contraseñas son iguales.
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
        $oUsuario= usuarioPDO::altaUsuario($_REQUEST["codUsuario"],$_REQUEST["password"],$_REQUEST["descUsuario"]);//Almaceno en una variable la ejecución del método altaUsuario() que me devuelve un objeto.
        $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$oUsuario;//Almaceno en la sesión el nuevo usuario registrado.
        $_SESSION["paginaEnCurso"] = $controlador["inicio"];//Almaceno en la sesión de la página en curso el controlador del inicio.
        header("Location: index.php");
        exit;
    }
    
    $vista = $vistas['registro'];//Almaceno en una variable la vista del registro que es la que quiero cargar.
    require_once $vistas['layout'];//Incluyo la vista del layout.
?>