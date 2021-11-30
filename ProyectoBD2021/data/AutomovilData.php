<?php

include 'ConectionDB.php';
include '../domain/Automovil.php';

class AutomovilData{

    public function insertAutomovil(Automovil $vehiculo){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de insertAutomovil...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
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

        //echo $precio;
        
        //Defino un array y le doy los valores especificos que definimos arriba
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
        $sql = "EXEC sp_insertar_automovil @marca = ?, @idModelo = ?, @estilo = ?, @idColor = ?, @capacidadPasajeros = ?, @combustible = ?, @transmision = ?, @anio = ?, @stock = ?, @precio = ?, @detalles = ?";

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
        //print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 

        return $res;
    }

    public function updateAutomovil(Automovil $vehiculo){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de updateAutomovil...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
        $idAutomovil = $vehiculo->getIdAutomovil();
        $idColor = $vehiculo->getColor();
        $idStock = $vehiculo->getStock();
        $precio = $vehiculo->getprecio();
        $detalles = $vehiculo->getDetalle();
        //echo $idAutomovil;
        //echo $detalles;
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
        //print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }
    
    public function deleteAutomovil($idAutomovil){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de deleteAutomovil...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros
        //Agarro los parametros de la funcion
        //$idAutomovil = $vehiculo->getIdAutomovil();
        
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
        //print_r($myparams);
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 
    }

    public function obtainAutomovilIdModelo($v){
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de obtainAutomovilIdModelo';
            die( print_r( sqlsrv_errors(), true));
        }

        $sql = "SELECT * FROM automovil WHERE idAutomovil = ".$v."";  
        $stmt = sqlsrv_query( $conn, $sql );
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true) );
        }
        
        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
              $veh = new Automovil($row[0], $row[1],
              $row[2], $row[3],
              $row[4], $row[5],
              $row[6], $row[7],
              $row[8], $row[9],
              $row[10], $row[11]);
        }
        sqlsrv_free_stmt($stmt);
        return $veh;
    }

    public function createBackup(){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_generarbackup";

        // Una variable que prepara la ejecucion del procedimiento almacenado con la conexion a bd, el procedimiento y sus parametros
        $stmt = sqlsrv_prepare($conn, $sql);
        
        if( !$stmt ) { //Si hay algun error al ejecutarlo o no existe el procedimiento
        die( print_r( sqlsrv_errors(), true)); //Muestre el error y mate el proceso
        }

        if(sqlsrv_execute($stmt)){ //Paso final de ejecucion
        $res = sqlsrv_next_result($stmt); //Este res pregunta si hay otro valor, esto iria dentro de un while (esta comentado abajo)
        }else{
        die( print_r( sqlsrv_errors(), true));
        } 

        return $res;
    }

    /*
    function LeerPorModelo($modelo)
		{
			$con = new ConectionDB(); 
            //$con->set_charset('utf8');
			$conn = $con->conection2(); 

			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de createModelo...';
				die( print_r( sqlsrv_errors(), true)); //Mata el thread
			}

			$consulta = sqlsrv_query("EXEC sp_visualizar_automovil('".$modelo."')");
            $res = sqlsrv_query($conn,$consulta);
			
            if (!$res) {
            die(mysql_error());
            echo "MALO";
            }
            $resultado = $conn->query($query);

     		$todos = array();

			while ($fila = sqlsrv_fetch_array($consulta))
        	{
                echo $fila['modelo']."<br>";
        		//array_push($todos, new Automovil($fila['idAutomovil'],$fila['marca'],$fila['idModelo'],$fila['estilo'],$fila['idColor'],$fila['capacidadPasajeros'],$fila['combustible'],$fila['transmision'],$fila['anio'],$fila['stock'],$fila['precio'],$fila['detalles']));
        	
        	}
            
            sqlsrv_close( $conn);

//			return $todos;
		}
    function LeerPorModeloX($modelo)
		{
			$con = new ConectionDB(); 
            //$con->set_charset('utf8');
			$conn = $con->conection2(); 

			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de createModelo...';
				die( print_r( sqlsrv_errors(), true)); //Mata el thread
			}

			$query = "EXEC sp_visualizar_automovil('".$modelo."')";
            $res = sqlsrv_query($conn,$query);
			
            $resultado = $conn->query($query);

     		$todos = array();

			while ($fila = $resultado->sqlsrv_fetch_array())
        	{

        		array_push($todos, new Automovil($fila['idAutomovil'],$fila['marca'],$fila['idModelo'],$fila['estilo'],$fila['idColor'],$fila['capacidadPasajeros'],$fila['combustible'],$fila['transmision'],$fila['anio'],$fila['stock'],$fila['precio'],$fila['detalles']));
        	
        	}
            
			$con->close();

			return $todos;
		}*/
}
?>