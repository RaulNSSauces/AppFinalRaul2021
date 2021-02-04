<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Almaceno en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset($_REQUEST['buscar'])) {//Si el usuario pulsa el botón de buscar.
    $aPolideportivos=REST::instalacionesDeportivas($_REQUEST["polideportivo"]);//Llamo al servicio y le paso los polideportivos que quiere consultar el usuario.
}

if(isset($_REQUEST['enviar'])) { //Si el usuatio pulsa el botón de enviar.
    $aServicioAPOD = REST::sevicioAPOD($_REQUEST['fecha']);//Llamamos al servicio y le pasamos la fecha introducida por el usuario
}
else {
    $aServicioAPOD = REST::sevicioAPOD(date('Y-m-d'));//Llamamos al servicio y le pasamos la fecha de hoy.
}
$tituloEnCurso = $aServicioAPOD['title'];
$imagenEnCurso = $aServicioAPOD['url'];
$descripcionEnCurso = $aServicioAPOD['explanation'];

if(isset($_REQUEST["calcula"])){//Si el usuario pulsa el botón de calcula.
    $resultado=Rest::calculadora($_REQUEST["operacion"], $_REQUEST["n1"], $_REQUEST["n2"]);//Llamo al servicio y le paso el tipo y los dos números intoducidos por el usuario.
}

$vista = $vistas['rest'];//Almaceno en una variable la vista de editar perfil que es la que quiero cargar.
require_once $vistas['layout'];//Incluyo la vista del layout.
?>