<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Almaceno en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset($_REQUEST['buscar'])) {
    $aPolideportivos=REST::instalacionesDeportivas($_REQUEST["polideportivo"]);
}

if(isset($_REQUEST['enviar'])) { //si se ha enviado una fecha
    //llamamos al servicio y le pasamos la fecha introducida por el usuario
    $aServicioAPOD = REST::sevicioAPOD($_REQUEST['fecha']);
}
else {
    //llamamos al servicio y le pasamos la fecha de hoy
    $aServicioAPOD = REST::sevicioAPOD(date('Y-m-d'));
}
$tituloEnCurso = $aServicioAPOD['title'];
$imagenEnCurso = $aServicioAPOD['url'];
$descripcionEnCurso = $aServicioAPOD['explanation'];

$vista = $vistas['rest'];//Almaceno en una variable la vista de editar perfil que es la que quiero cargar.
require_once $vistas['layout'];//Incluyo la vista del layout.
?>