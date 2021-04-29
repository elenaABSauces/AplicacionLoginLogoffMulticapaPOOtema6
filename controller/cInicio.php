<?php
//Si el usuario no ha iniciado sesiÃ³n se le redirige al login.php
if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){ 
    header('Location: index.php');
    exit;
}

//Si se ha pulsado el botÃ³n de Cerrar SesiÃ³n
if (isset($_REQUEST['cerrarSesion'])) {
    //Destruye todos los datos asociados a la sesiÃ³n
    session_destroy();
    //Redirige al login.php
    header("Location: index.php"); 
    exit;
}
//Si se ha pulsado el botÃ³n de detalle
if (isset($_REQUEST['detalle'])) {
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del registro
    $_SESSION['paginaEnCurso'] = $controladores['detalle']; 
    header('Location: index.php');
    exit;
}
//Si se ha pulsado el botÃ³n de editar
if (isset($_REQUEST['editar'])) {
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del registro
    $_SESSION['paginaEnCurso'] = $controladores['editar']; 
    header('Location: index.php');
    exit;
}
//Si se ha pulsado el botÃ³n Borrar Cuenta
if (isset($_REQUEST['BorrarCuenta'])) {
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del editor de contraseÃ±a
    $_SESSION['paginaEnCurso'] = $controladores['borrarCuenta'];
    header('Location: index.php');
    exit;
}

$oUsuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];

//Variables que almacenan los datos del usuario sacadas de la BBDD
$numConexiones = $oUsuarioActual->getNumConexiones();
$descUsuario = $oUsuarioActual->getDescUsuario();
$ultimaConexionAnterior = $_SESSION['fechaHoraUltimaConexionAnterior'];
$imagenUsuario = $oUsuarioActual->getImagenPerfil();

//Guardamos en la variable vistaEnCurso la vista que queremos implementar
$vistaEnCurso = $vistas['inicio']; 
require_once $vistas['layout'];

?>