<?php
    //Incluyo aquellos ficheros que son necesarios.
    require_once 'core/libreriaValidacion.php';
    require_once 'model/DBPDO.php';
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/Rest.php';
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';;
    //Creo un array en el que almaceno todos los controladores.
    $controlador=["login" => "controller/cLogin.php",
                  "inicio" => "controller/cInicio.php",
                  "registro" => "controller/cRegistro.php",
                  "editarPerfil" => "controller/cEditarPerfil.php",
                  "borrarCuenta" => "controller/cBorrarCuenta.php",
                  "rest" => "controller/cRest.php",
                  "cambiarPassword" => "controller/cCambiarPassword.php",
                  "mtoDepartamentos" => "controller/cMtoDepartamentos.php",
                  "altaDepartamento" => "controller/cAltaDepartamento.php",
                  "consultarModificarDepartamento" => "controller/cConsultarModificarDepartamento.php",
                  "eliminarDepartamento" => "controller/cEliminarDepartamento.php",
                  "bajaLogicaDepartamento" => "controller/cBajaLogicaDepartamento.php",
                  "rehabilitacionDepartamento" => "controller/cRehabilitacionDepartamento.php",
                  "exportarDepartamentos" => "controller/cExportarDepartamentos.php",
                  "importarDepartamentos" => "controller/cImportarDepartamentos.php"];
    //Creo un array en el que almaceno todas las vistas.
    $vistas=["login" => "view/vLogin.php",
             "inicio" => "view/vInicio.php",
             "layout" => "view/Layout.php",
             "registro" => "view/vRegistro.php",
             "editarPerfil" => "view/vEditarPerfil.php",
             "borrarCuenta" => "view/vBorrarCuenta.php",
             "rest" => "view/vRest.php",
             "cambiarPassword" => "view/vCambiarPassword.php",
             "mtoDepartamentos" => "view/vMtoDepartamentos.php",
             "altaDepartamento" => "view/vAltaDepartamento.php",
             "consultarModificarDepartamento" => "view/vConsultarModificarDepartamento.php",
             "eliminarDepartamento" => "view/vEliminarDepartamento.php",
             "bajaLogicaDepartamento" => "view/vBajaLogicaDepartamento.php",
             "rehabilitacionDepartamento" => "view/vRehabilitacionDepartamento.php",
             "exportarDepartamentos" => "view/vExportarDepartamentos.php",
             "importarDepartamentos" => "view/vImportarDepartamentos.php"];
?>