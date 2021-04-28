<?php

if(!isset($_COOKIE['idioma'])){
    setcookie('idioma','es',time()+2592000); // crea la cookie 'idioma' con el valor 'es' para 30 dias
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['idiomaElegido'])) { // si se ha pulsado el botton de idiomaElegido
    setcookie('idioma', $_REQUEST['idiomaElegido'], time() + 2592000); // modifica la cookie 'idioma' con el valor recibido del formulario para 30 dias
    header('Location: index.php');
    exit;
}

if (isset($_REQUEST['Registrarse'])) { // si se ha pulsado el boton de registrarse
    $_SESSION['paginaEnCurso'] = $controladores['registro']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del registro
    
    header('Location: index.php');
    exit;
} else {

define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$entradaOK = true;

$aErrores = [ //declaro e inicializo el array de errores
    'CodUsuario' => null,
    'Password' => null
];

if (isset($_REQUEST["IniciarSesion"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO); // comprueba que la entrada del codigo de usuario es correcta

    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta

    $oUsuario = UsuarioPDO::validarUsuario($_REQUEST['CodUsuario'], $_REQUEST['Password']); // guardamos en la variable el resultado de la funcion que valida si existe un usuario con el codigo y password introducido

    if(!isset($oUsuario)){ // si es null 
        $aErrores['CodUsuario'] = "El codigo de usuario no se encuentra en la base de datos"; // guardo en el array de errores el error de que no existe el codigo de usuario en la base de datos
    }
    

    if ($aErrores['CodUsuario'] != null || $aErrores['Password']!=null) { // compruebo si hay algun mensaje de error en algun campo
        $entradaOK = false; // le doy el valor false a $entradaOK
        unset($_REQUEST);
    }
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if ($entradaOK) { // si la entrada esta bien recojo los valores introducidos y hago su tratamiento

    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario; // guarda en la session el objeto usuario
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio

    header('Location: index.php'); // redirige al index.php
    exit;

}

$vistaEnCurso = $vistas['login']; // guardamos en la variable vistaEnCurso la vista que queremos implementar

}

require_once $vistas['layout'];
?> 