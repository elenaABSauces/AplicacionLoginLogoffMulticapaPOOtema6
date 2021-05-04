<?php
//se inlcuye ...
require_once "core/libreriaValidacion.php";  //la libreria

require_once "model/Usuario.php"; //clase usuario
require_once "model/UsuarioPDO.php"; //clase usuarioPDO
require_once "model/DBPDO.php"; //clase DPDO
require_once "model/miError.php"; //clase Error

$controladores = [ //se crea un array con los controladores
    "login" => "controller/cLogin.php", //se le asigna una ruta a un string
    "inicio" => "controller/cInicio.php",
    "registro" => "controller/cRegistro.php",
    "detalle" => "controller/cDetalle.php",
    "editar"=> "controller/cEditar.php",
    "editar" => "controller/cEditar.php",
    "cambiarPassword" => "controller/cCambiarPassword.php",
    "borrarCuenta" => "controller/cBorrarCuenta.php",
    "wip" => "controller/cWIP.php",
    "error" =>"controller/cError.php"
];

$vistas = [ //se crea un array con las vistas
    "layout" => "view/layout.php", //se le asigna una ruta a un string
    "login" => "view/vLogin.php",
    "inicio" => "view/vInicio.php",
    "registro" => "view/vRegistro.php",
    "detalle" => "view/vDetalle.php",
    "editar" => "view/vEditar.php",
    "cambiarPassword" => "view/vCambiarPassword.php",
    "borrarCuenta" => "view/vBorrarCuenta.php",
    "wip" => "view/vWIP.php",
    "error" =>"view/vError.php"
];
?>