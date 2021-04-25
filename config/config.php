<?php
require_once "core/libreriaValidacion.php";

require_once "model/Usuario.php";
require_once "model/UsuarioPDO.php";
require_once "model/DBPDO.php";

$controladores = [
    "login" => "controller/cLogin.php",
    "inicio" => "controller/cInicio.php",
    "registro" => "controller/cRegistro.php"
];

$vistas = [
    "layout" => "view/layout.php",
    "login" => "view/vLogin.php",
    "inicio" => "view/vInicio.php",
    "registro" => "view/vRegistro.php"
];
?>