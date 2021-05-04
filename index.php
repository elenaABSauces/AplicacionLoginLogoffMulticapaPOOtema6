<?php
require_once 'config/config.php';// incluye el fichero de configuracion de la aplicacion 
require_once 'config/configDB.php'; // incluye el fichero de configuracion de la base de datos
session_start(); // inicia una sesion o recupera una anterior
    if(isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){ // si se ha iniciado sesion
        require_once $_SESSION['paginaEnCurso']; // incluye el controlador de la pagina en curso
    } else if (isset($_SESSION['paginaEnCursoSinRegistro'])){ // si no se ha iniciado sesion pero esta inicializada la variable de sesion 'paginaEnCursoSinRegistro'
        require_once $_SESSION['paginaEnCursoSinRegistro']; // incluye el controlador de la pagina en curso de usuarios sin registrar
    }else{
        require_once $controladores['login']; // incluye el controlador del login
    }
?>