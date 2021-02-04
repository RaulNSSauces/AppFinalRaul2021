<?php
    if(isset ($_REQUEST["registrate"])){//Si el usuario pulsa el botón de registrarse.
        $_SESSION["paginaEnCurso"] = $controlador["registro"];//Guardo en la variable de sesión la ruta del controlador del registro.
        header("Location: index.php");//Recargo el index y redirijo al usuario al registro.
        exit;
    }else{//Si no
        define("OBLIGATORIO", 1);
    
    $entradaOk=true;
    
    $aErrores=["codUsuario" => null,//Creo un array de errores donde almaceno los campos que le pido al usuario y los inicializo a null.
               "password" => null];
    
    if(isset($_REQUEST["iniciarSesion"])){//Si el usuario le da al botón de iniciar sesión.
        $aErrores["codUsuario"]= validacionFormularios::comprobarAlfaNumerico($_REQUEST["codUsuario"], 8, 3, OBLIGATORIO);//Valido que el campo de código de usuario lo ha escrito correctamente.
        $aErrores["password"] = validacionFormularios::validarPassword($_REQUEST["password"], 8, 1, 1, OBLIGATORIO);//Valido que el campo contraseña lo ha escrito correctamente.
    
        foreach($aErrores as $campo => $error){//Recorro el array de errores.
            if($error!=null){//Comprueblo que los campos no tienen errores.
                $entradaOk=false;//Si tienen errores la entrada es falsa.
                $_REQUEST[$campo]="";//Limpio los campos del formulario.
            }
        }
    }else{
        $entradaOk=false;
    }
    
    if($entradaOk){//Si la entrada es Ok.
        $aValidarUsuario= usuarioPDO::validarUsuario($_REQUEST["codUsuario"], $_REQUEST["password"]);//Ejecuto el método validarUsuario que devuelve un objeto.
        
        if(isset($aValidarUsuario)){
            $_SESSION["usuarioDAW203LoginLogoffMulticapa"]=$aValidarUsuario[0];//Almaceno en la sesión el objeto del resultado de la consulta.
            $_SESSION["fechaHoraUltimaConexionAnterior"] = $aValidarUsuario[1];
            $_SESSION["paginaEnCurso"] = $controlador["inicio"];//Almaceno en la sesión la página en curso con la ruta del controlador del inicio.
            header('Location: index.php');//Recargo el index y redirijo al usuario al inicio.
            exit;
        }
    }
    
    $vista = $vistas['login'];//Almaceno en una variable la vista del login que es la que quiero cargar.
    require_once $vistas['layout'];//Incluyo la vista del layout.
    }
?>