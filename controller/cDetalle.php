<?php
//Si no hay una sesiÃ³n iniciada te manda al Login
if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){ 
    header('Location: index.php');
    exit;
}
//Si se ha pulsado Cancelar
if (isset($_REQUEST['volver'])) {
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del login
    $_SESSION['paginaEnCurso'] = $controladores['inicio'];
    header('Location: index.php');
    exit;
}

//Guardamos en la variable vistaEnCurso la vista que queremos implementar
$vistaEnCurso = $vistas['detalle']; 

require_once $vistas['layout'];                                            //Cargamos el layout
?>