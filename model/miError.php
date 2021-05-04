<?php

class miError {
    private $codError;
    
    private $mensaje;
    
    private $descripcion;
    
    function __construct($codError, $mensaje, $descripcion=null){
        $this->codError = $codError;
        $this->mensaje =$mensaje;
        $descripcion != null ? $this->descripcion = $descripcion : $this->descripcion = "ERROR ENTRADA/SALIDA";
               
    }
    
    function getCode(){
        return $this->codError;
    }
    
    function getMessage(){
        return $this->mensaje;
    }
    
    function getDescripcion(){
        return $this->descripcion;
    }
    
    function setDescripcion($descripcionError){
        $this->descripcion = $descripcionError;
    }
    
    
}
?>