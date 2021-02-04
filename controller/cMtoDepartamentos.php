<?php
if(isset ($_REQUEST["volver"])){//Si el usuario pulsa el botón de volver.
    $_SESSION["paginaEnCurso"]=$controlador["inicio"];//Guardo en la variable de sesión la ruta del controlador del inicio.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset($_REQUEST["añadir"])){//Si el usuario pulsa el botón de añadir.
    $_SESSION["paginaEnCurso"]=$controlador["altaDepartamento"];//Guardo en la variable de sesión la ruta del controlador del alta de departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["consultar"])){//Si el usuario pulsa el botón de consultar.
    $_SESSION["paginaEnCurso"]=$controlador["consultarModificarDepartamento"];//Guardo en la variable de sesión la ruta del controlador del consultar modificar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["eliminar"])){//Si el usuario pulsa el botón de eliminar.
    $_SESSION["paginaEnCurso"]=$controlador["eliminarDepartamento"];//Guardo en la variable de sesión la ruta del controlador del eliminar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["alta"])){//Si el usuario pulsa el botón de alta.
    $_SESSION["paginaEnCurso"]=$controlador["rehabilitacionDepartamento"];//Guardo en la variable de sesión la ruta del controlador de la rehabilitación del departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["baja"])){//Si el usuario pulsa el botón de baja.
    $_SESSION["paginaEnCurso"]=$controlador["bajaLogicaDepartamento"];//Guardo en la variable de sesión la ruta del controlador de la baja logica del departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
if(isset ($_REQUEST["importar"])){//Si el usuario pulsa el botón de importar.
    $_SESSION["paginaEnCurso"]=$controlador["importarDepartamentos"];//Guardo en la variable de sesión la ruta del controlador del importar departamento.
    header("Location: index.php");//Recargo el index.
    exit;
}
$vista = $vistas["mtoDepartamentos"]; //Almaceno en una variable la vista que quiero cargar.
require_once $vistas['layout']; //Incluyo la vista del layout.
?>