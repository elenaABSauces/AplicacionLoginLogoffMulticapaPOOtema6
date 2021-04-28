<?php

if(isset($_REQUEST['Cancelar'])){
    
    $_SESSION['paginaEnCurso'] = $controladores['login']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del login
    header('Location: index.php');
    exit;
}


define("OBLIGATORIO", 1); // defino e inicializo la constante a 1 para los campos que son obligatorios

$entradaOK = true;

$aErrores = [ //declaro e inicializo el array de errores
    'CodUsuario' => null,
    'DescUsuario' => null,
    'Password' => null,
    'PasswordConfirmacion' => null
];


if (isset($_REQUEST["Registrarse"])) { // comprueba que el usuario le ha dado a al boton de IniciarSesion y valida la entrada de todos los campos
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO); // comprueba que la entrada del codigo de usuario es correcta

    if($aErrores['CodUsuario']==null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario'])==false){ // si no ha habido error en el campo CodUsuario y que no exista el nombre de usuario en la base de datos
        $aErrores['CodUsuario']="El nombre de usuario ya existe"; // guarda en el array de errores el men saje de error
    }

    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO); // comprueba que la entrada del codigo de usuario es correcta
    
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    $aErrores['PasswordConfirmacion'] = validacionFormularios::validarPassword($_REQUEST['PasswordConfirmacion'], 8, 1, 1, OBLIGATORIO);// comprueba que la entrada del password es correcta
    if($_REQUEST['Password'] != $_REQUEST['PasswordConfirmacion']){
        $aErrores['PasswordConfirmacion'] = "Las contraseñas no coinciden";
    }
    
    foreach ($aErrores as $campo => $error) { // recorro el array de errores
        if ($error != null) { // compruebo si hay algun mensaje de error en algun campo
            $entradaOK = false; // le doy el valor false a $entradaOK
            $_REQUEST[$campo] = ""; // si hay algun campo que tenga mensaje de error pongo $_REQUEST a null
        }
    }
} else { // si el usuario no le ha dado al boton de enviar
    $entradaOK = false; // le doy el valor false a $entradaOK
}

if ($entradaOK) { // si la entrada esta bien recojo los valores introducidos y hago su tratamiento

    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'],$_REQUEST['Password'],$_REQUEST['DescUsuario']); // guardamos en la variable el resultado de la funcion que valida si existe un usuario con el codigo y password introducido
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario; // guarda en la session el objeto usuario
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; // guardamos en la variable de sesion 'pagina' la ruta del controlador del inicio

    header('Location: index.php'); // redirige al index.php
    exit;

}

$vistaEnCurso = $vistas['registro']; // guardamos en la variable vistaEnCurso la vista que queremos implementar

require_once $vistas['layout'];
?> 