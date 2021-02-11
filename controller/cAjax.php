<?php
if(isset ($_REQUEST["cancelar"])){//Si el usuario pulsa el botón de cancelar.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Almaceno en la variable de sesión la ruta del controlador del inicio para que vaya a esa página.
    header("Location: index.php");//Recargo el index.
    exit;
}
$vista = $vistas["ajax"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>