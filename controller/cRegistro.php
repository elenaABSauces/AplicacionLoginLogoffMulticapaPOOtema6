<?php
//Si se ha pulsado Cancelar
if(isset($_REQUEST['Cancelar'])){
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del login
    $_SESSION['paginaEnCursoSinRegistro'] = $controladores['login']; 
    header('Location: index.php');
    exit;
}

//Defino e inicializo la constante a 1 para los campos que son obligatorios
define("OBLIGATORIO", 1); 

$entradaOK = true;

//Declaro e inicializo el array de errores
$aErrores = [ 
    'CodUsuario' => null,
    'DescUsuario' => null,
    'Password' => null,
    'PasswordConfirmacion' => null
];

//Comprueba que el usuario le ha dado a al botÃ³n de IniciarSesion y valida la entrada de todos los campos
if (isset($_REQUEST["Registrarse"])) { 
    $aErrores['CodUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['CodUsuario'], 15, 3, OBLIGATORIO);
    //Si no ha habido error en el campo CodUsuario pero el cÃ³digo de usuario ya existe en la BBDD
    if($aErrores['CodUsuario'] == null && UsuarioPDO::validarCodNoExiste($_REQUEST['CodUsuario']) == false){
        //Guarda en el array de errores el mensaje de error
        $aErrores['CodUsuario']="El nombre de usuario ya existe"; 
    }

    $aErrores['DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['DescUsuario'], 255, 3, OBLIGATORIO);
    $aErrores['Password'] = validacionFormularios::validarPassword($_REQUEST['Password'], 8, 1, 1, OBLIGATORIO);
    $aErrores['PasswordConfirmacion'] = validacionFormularios::validarPassword($_REQUEST['PasswordConfirmacion'], 8, 1, 1, OBLIGATORIO);
    //Si la primera contraseÃ±a introducida no coincide con la segunda salta un error
    if($_REQUEST['Password'] != $_REQUEST['PasswordConfirmacion']){
        $aErrores['PasswordConfirmacion'] = "Las contraseÃ±as no coinciden";
    }
    
    //Recorro el array de errores
    foreach ($aErrores as $campo => $error) {
        //Compruebo si hay algun mensaje de error en algun campo, en caso de que los haya $entradaOK pasa a false y se vacÃ­a el campo que dÃ© error
        if ($error != null) {
            $entradaOK = false; 
            $_REQUEST[$campo] = "";
        }
    }
 //Si el usuario no le ha dado al boton de enviar $entradaOK pasa a false
} else {
    $entradaOK = false;
}

//Si la entrada esta bien recojo los valores introducidos y hago su tratamiento
if ($entradaOK) { 
    //Guardamos en la variable el resultado de la funciÃ³n que valida si existe un usuario con el cÃ³digo y password introducido
    $oUsuario = UsuarioPDO::altaUsuario($_REQUEST['CodUsuario'],$_REQUEST['Password'],$_REQUEST['DescUsuario']);
    //Creamos la fecha y hora de la Ãºltima conexiÃ³n anterior
    $_SESSION['fechaHoraUltimaConexionAnterior'] = null;
    //Guarda en la sesiÃ³n el objeto usuario
    $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'] = $oUsuario;
    //Guardamos en la variable de sesiÃ³n 'pagina' la ruta del controlador del inicio
    $_SESSION['paginaEnCurso'] = $controladores['inicio']; 
    //Redirige al index.php
    header('Location: index.php');
    exit;
}

//Guardamos en la variable vistaEnCurso la vista que queremos implementar
$vistaEnCurso = $vistas['registro']; 

require_once $vistas['layout'];
?> 