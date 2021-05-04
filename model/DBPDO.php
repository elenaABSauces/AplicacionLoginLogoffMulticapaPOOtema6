<?php
class DBPDO {                                                                   //Nueva clase para lo conexion a la base de datos y ejecucion de consultas
    public static function ejecutarConsulta($sentenciaSQL, $parametros) {        //Creo un metodo que se llame ejecutar consulta y le pueda pasar una cosnulta y unos parametros
        try {                                                       
            $miDB = new PDO(HOST,USER,PASSWORD);                                //Establecer una conexión con la base de datos 
            $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     //La clase PDO permite definir la fórmula que usará cuando se produzca un error, utilizando el atributo PDO::ATTR_ERRMODE
            
            $consulta = $miDB->prepare($sentenciaSQL);                          //Preparamos la consulta que se le ha pasado
            $consulta->execute($parametros);                                    //Ejecutamos la consulta con los parametros pasados
            
        }catch(PDOException $e){
            $consulta = null;                                                   //Destruimos la consulta.
            $error = $e->getCode();                                             //guardamos en la variable error el error que salta
            $mensaje = $e->getMessage();//guardamos en la variable mensaje el mensaje del error que salta
            
            $miError = new Error($message, $code, $descripcion); //se instancia un objeto error
            
            $_SESSION['error'] = $miError; //se guarda el objeto error en la sesion
            $_SESSION['paginaEnCurso'] = $controlador['error'];
            
            header('Location: index.php'); //se recarga el index con el controlador de erro su vista
           
        } finally {
           unset($miDB);                                                        //cerramos la conexion con la base de datos
        }
        return $consulta;                                                       //Devolvemos la consulta
    }
}
?>