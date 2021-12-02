<?php

include 'ConectionDB.php';
include '../domain/Venta.php';

class VentaData{


    public function insertVenta(Venta $venta){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de createUsuario...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros - Ojo, deben de ser parametros que se pueden pasar por referencia! (yo tampoco entendi haha)
        //Agarro los parametros de la funcion
        $idAuto = $venta->getIdAutomovil();
        $ced = $venta->getCedula();
        $usu = $venta->getUsuario();

        //Defino un array y le doy los valores especificos que definimos arriba
        $myparams['idAutomovil'] = $idAuto;
        $myparams['cedula'] = $ced;
        $myparams['usuario'] = $usu;

        //Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
        $procedure_params = array(
        array(&$myparams['idAutomovil'], SQLSRV_PARAM_IN), 
        array(&$myparams['cedula'], SQLSRV_PARAM_IN),
        array(&$myparams['usuario'], SQLSRV_PARAM_IN)
        ); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_insertar_venta @idAutomovil = ?, @cedula = ?, @usuario = ?";

        // Una variable que prepara la ejecucion del procedimiento almacenado con la conexion a bd, el procedimiento y sus parametros
        $stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
        
        if( !$stmt ) { //Si hay algun error al ejecutarlo o no existe el procedimiento
        die( print_r( sqlsrv_errors(), true)); //Muestre el error y mate el proceso
        }

        if(sqlsrv_execute($stmt)){ //Paso final de ejecucion
        $res = sqlsrv_next_result($stmt); //Este res pregunta si hay otro valor, esto iria dentro de un while (esta comentado abajo)
       
        //print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }
    
}
?>