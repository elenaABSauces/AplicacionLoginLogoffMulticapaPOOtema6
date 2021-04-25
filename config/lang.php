<?php
if(isset($_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'])){
    $usuarioActual = $_SESSION['usuarioDAW2LoginLogoffMulticapaPOO'];
}

$aLang = [
    'es'=> [
        'user' => 'Usuario',
        'password' => 'Contraseña',
        'login' => 'Iniciar Sesion',
        'signup' => 'Registrarse',

        'title' => 'Programa',
        'logoff' => 'Cerrar Sesion',
        'welcome' => 'Bienvenido/a '.(isset($usuarioActual) ? $usuarioActual->getDescUsuario() : null),
        'numConnections' => 'Se ha conectado '.(isset($usuarioActual) ? $usuarioActual->getNumConexiones() : null).' veces',
        'numConnectionsWelcome' => 'Esta es la primera vez que se conecta',  
        'lastConnection' => 'Ultima conexion: '.(isset($usuarioActual) ? date('d/m/Y H:i:s',$usuarioActual->getFechaHoraUltimaConexion()) : null),
        'details' => 'Detalle',
        'editProfile' => 'Editar Perfil',

        'description' => 'Descripcion',
        'confirmPassword' => 'Confirmar contraseña',
        'cancel' => 'Cancelar'
    ],

    'en' => [
        'user' => 'User',
        'password' => 'Password',
        'login' => 'Login',
        'signup' => 'Sign Up',

        'title' => 'Program',
        'logoff' => 'Logoff',
        'welcome' => 'Welcome '.(isset($usuarioActual) ? $usuarioActual->getDescUsuario() : null),
        'numConnections' => 'You have connected '.(isset($usuarioActual) ? $usuarioActual->getNumConexiones() : null).' times',
        'numConnectionsWelcome' => 'This is the first time you connect',  
        'lastConnection' => 'Last connection: '.(isset($usuarioActual) ? date('d/m/Y H:i:s',$usuarioActual->getFechaHoraUltimaConexion()) : null),
        'details' => 'Detail',
        'editProfile' => 'Edit Profile',

        'description' => 'Description',
        'confirmPassword' => 'Confirm password',
        'cancel' => 'Cancel'
    ]
];
?>