<?php
    require_once 'config/config.php';
    require_once 'config/configDB.php';
    
    session_start();

    if(isset($_SESSION["paginaEnCurso"])){
        require_once $_SESSION["paginaEnCurso"];
    }else{
        require_once $controlador["login"];
    }
?>