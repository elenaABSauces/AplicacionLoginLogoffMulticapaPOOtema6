<?php 
require_once 'config/config.php';

session_start();

require_once 'config/configDB.php';
require_once 'config/lang.php';

if(isset($_SESSION['paginaEnCurso']) && $_SESSION['paginaEnCurso']!==$controladores["login"]){ // Si el usuario ha solicitado otra pagina distinta del login
    require_once $_SESSION['paginaEnCurso']; // Incluimos el controlador de la pagina solicitada almacenado en la sesion
} else { 
    require_once $controladores["login"]; // Por defecto, la primera vez que el usuario entra en la pagina cargamos el controlador del login
}