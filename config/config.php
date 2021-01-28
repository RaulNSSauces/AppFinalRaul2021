<?php
    //Incluyo aquellos ficheros que son necesarios.
    require_once 'core/libreriaValidacion.php';
    require_once 'model/DBPDO.php';
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/Rest.php';
    //Creo un array en el que almaceno todos los controladores.
    $controlador=["login" => "controller/cLogin.php",
                  "inicio" => "controller/cInicio.php",
                  "registro" => "controller/cRegistro.php",
                  "editarPerfil" => "controller/cEditarPerfil.php",
                  "borrarCuenta" => "controller/cBorrarCuenta.php",
                  "rest" => "controller/cRest.php",
                  "cambiarPassword" => "controller/cCambiarPassword.php"];
    //Creo un array en el que almaceno todas las vistas.
    $vistas=["login" => "view/vLogin.php",
             "inicio" => "view/vInicio.php",
             "layout" => "view/Layout.php",
             "registro" => "view/vRegistro.php",
             "editarPerfil" => "view/vEditarPerfil.php",
             "borrarCuenta" => "view/vBorrarCuenta.php",
             "rest" => "view/vRest.php",
             "cambiarPassword" => "view/vCambiarPassword.php"];
?>