<?php

if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){ // si no se ha logueado le usuario
    header('Location: index.php'); // redirige al login
    exit;
}

if (isset($_REQUEST['cerrarSesion'])) { // si se ha pulsado el boton de Cerrar Sesion
    session_destroy(); // destruye todos los datos asociados a la sesion
    header("Location: index.php"); // redirige al login
    exit;
}
$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];

$numConexiones = $oUsuarioActual->getNumConexiones(); // variable que tiene el numero de conexiones sacado de la base de datos
$descUsuario = $oUsuarioActual->getDescUsuario(); // variable que tiene la descripcion del usuario sacado de la base de datos
$ultimaConexion = $oUsuarioActual->getFechaHoraUltimaConexion(); // variable que tiene la ultima hora de conexion del usuario
$imagenUsuario = $oUsuarioActual->getImagenPerfil(); // variable que tiene la imagen de perfil del usuario

$vistaEnCurso = $vistas['inicio']; // guardamos en la variable vistaEnCurso la vista que queremos implementar
require_once $vistas['layout'];

?>