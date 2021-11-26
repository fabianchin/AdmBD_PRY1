<?php

include 'ConectionDB.php';
include './domain/Automovil.php';

class AutomovilData{

    public function insertAutomovil(Automovil $vehiculo){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de createCliente...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
        $idAutomovil = $vehiculo->getIdAutomovil();
        $marca = $vehiculo->getMarca();
        $idModelo = $vehiculo->getModelo();
        $estilo = $vehiculo->getEstilo();
        $idColor = $vehiculo->getColor();
        $capacidadPasajeros = $vehiculo->getCapacidadPasajeros();
        $combustible = $vehiculo->getCombustible();
        $transmision = $vehiculo->getTransmision();
        $anio = $vehiculo->getAnio();
        $idStock = $vehiculo->getStock();
        $precio = $vehiculo->getprecio();
        $detalles = $vehiculo->getDetalle();
        
        //Defino un array y le doy los valores especificos que definimos arriba
        $myparams['idAutomovil'] = $idAutomovil;
        $myparams['marca'] = $marca;
        $myparams['idModelo'] = $idModelo;
        $myparams['estilo'] = $estilo;
        $myparams['idColor'] = $idColor;
        $myparams['capacidadPasajeros'] = $capacidadPasajeros;
        $myparams['combustible'] = $combustible;
        $myparams['transmision'] = $transmision;
        $myparams['anio'] = $anio;
        $myparams['idStock'] = $idStock;
        $myparams['precio'] = $precio;
        $myparams['detalles'] = $detalles;

        //Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
        $procedure_params = array(
        array(&$myparams['idAutomovil'], SQLSRV_PARAM_IN), 
        array(&$myparams['marca'], SQLSRV_PARAM_IN),
        array(&$myparams['idModelo'], SQLSRV_PARAM_IN),
        array(&$myparams['estilo'], SQLSRV_PARAM_IN),
        array(&$myparams['idColor'], SQLSRV_PARAM_IN),
        array(&$myparams['capacidadPasajeros'], SQLSRV_PARAM_IN),
        array(&$myparams['combustible'], SQLSRV_PARAM_IN),
        array(&$myparams['transmision'], SQLSRV_PARAM_IN),
        array(&$myparams['anio'], SQLSRV_PARAM_IN),
        array(&$myparams['idStock'], SQLSRV_PARAM_IN),
        array(&$myparams['precio'], SQLSRV_PARAM_IN),
        array(&$myparams['detalles'], SQLSRV_PARAM_IN)
        ); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_insertar_automovil @idAutomovil = ?, @marca = ?, @idModelo = ?, @estilo = ?, @idColor = ?, @capacidadPasajeros = ?, @combustible = ?, @transmision = ?, @anio = ?, @stock = ?, @precio = ?, @detalles = ?";

        // Una variable que prepara la ejecucion del procedimiento almacenado con la conexion a bd, el procedimiento y sus parametros
        $stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
        
        if( !$stmt ) { //Si hay algun error al ejecutarlo o no existe el procedimiento
        die( print_r( sqlsrv_errors(), true)); //Muestre el error y mate el proceso
        }

        if(sqlsrv_execute($stmt)){ //Paso final de ejecucion
        $res = sqlsrv_next_result($stmt); //Este res pregunta si hay otro valor, esto iria dentro de un while (esta comentado abajo)
        
        //while($res = sqlsrv_next_result($stmt)){
            // Aqui se puede definir un array $params donde se van guardando los datos o lo que sea 
        //}
        // Los outputs en pantalla:
        //print_r($params);
        print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }

    public function updateAutomovil(Automovil $vehiculo){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de createCliente...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
        $idAutomovil = $vehiculo->getIdAutomovil();
        $idColor = $vehiculo->getColor();
        $idStock = $vehiculo->getStock();
        $precio = $vehiculo->getprecio();
        $detalles = $vehiculo->getDetalle();
        
        //Defino un array y le doy los valores especificos que definimos arriba
        $myparams['idAutomovil'] = $idAutomovil;
        $myparams['idColor'] = $idColor;
        $myparams['idStock'] = $idStock;
        $myparams['precio'] = $precio;
        $myparams['detalles'] = $detalles;

        //Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
        $procedure_params = array(
        array(&$myparams['idAutomovil'], SQLSRV_PARAM_IN),
        array(&$myparams['idColor'], SQLSRV_PARAM_IN),
        array(&$myparams['idStock'], SQLSRV_PARAM_IN),
        array(&$myparams['precio'], SQLSRV_PARAM_IN),
        array(&$myparams['detalles'], SQLSRV_PARAM_IN)
        ); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_actualizar_automovil @idAutomovil = ?, @idColor = ?, @stock = ?, @precio = ?, @detalles = ?";

        // Una variable que prepara la ejecucion del procedimiento almacenado con la conexion a bd, el procedimiento y sus parametros
        $stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
        
        if( !$stmt ) { //Si hay algun error al ejecutarlo o no existe el procedimiento
        die( print_r( sqlsrv_errors(), true)); //Muestre el error y mate el proceso
        }

        if(sqlsrv_execute($stmt)){ //Paso final de ejecucion
        $res = sqlsrv_next_result($stmt); //Este res pregunta si hay otro valor, esto iria dentro de un while (esta comentado abajo)
        
        //while($res = sqlsrv_next_result($stmt)){
            // Aqui se puede definir un array $params donde se van guardando los datos o lo que sea 
        //}
        // Los outputs en pantalla:
        //print_r($params);
        print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }
    
    public function deleteAutomovil(Automovil $vehiculo){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de createCliente...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
        $idAutomovil = $vehiculo->getIdAutomovil();
        
        //Defino un array y le doy los valores especificos que definimos arriba
        $myparams['idAutomovil'] = $idAutomovil;

        //Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
        $procedure_params = array(
        array(&$myparams['idAutomovil'], SQLSRV_PARAM_IN)
        ); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_eliminar_automovil @idAutomovil = ?";

        // Una variable que prepara la ejecucion del procedimiento almacenado con la conexion a bd, el procedimiento y sus parametros
        $stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
        
        if( !$stmt ) { //Si hay algun error al ejecutarlo o no existe el procedimiento
        die( print_r( sqlsrv_errors(), true)); //Muestre el error y mate el proceso
        }

        if(sqlsrv_execute($stmt)){ //Paso final de ejecucion
        $res = sqlsrv_next_result($stmt); //Este res pregunta si hay otro valor, esto iria dentro de un while (esta comentado abajo)
        
        //while($res = sqlsrv_next_result($stmt)){
            // Aqui se puede definir un array $params donde se van guardando los datos o lo que sea 
        //}
        // Los outputs en pantalla:
        //print_r($params);
        print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }
}
?>