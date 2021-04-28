<?php
    if(!isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){                // Si el usuario no se ha logueado
        header('Location: index.php');                                          //Recargamos el index
        exit;
    }

    if(isset($_REQUEST['volver'])){                                             //Si el usuario pulsa el boton de volver
        $_SESSION['paginaEnCurso'] = $controladores['inicio'];                  //Cargamos el controlador de inicio en PaginaenCurso
        header('Location: index.php');                                          //Redirigimos al usuario al programa de nuevo
        exit;
    }
  
    $vistaEnCurso = $vistas['detalle'];                                         //Cargamos la vista de detalles
    
    require_once $vistas['layout'];                                             //Cargamos el layout
?>