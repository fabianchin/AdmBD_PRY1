<?php
	include "ConectionDB.php";
	include '../domain/Modelo.php';
	//include "../../Negocio/Artesanal/Artesanal.php";

	class ModeloData{

		public function Crear(Modelo $modelo){
			$con = new ConectionDB(); 
			$conn = $con->conection2(); 
			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de createModelo...';
				die( print_r( sqlsrv_errors(), true)); //Mata el thread
			}
	
			// Especificacion de parametros
			//Agarro los parametros de la funcion
			$modeloid = $modelo->getIdModelo();
			$modelo = $modelo->getModelo();

			$sql = "EXEC sp_insertar_modelo @idModelo = ".$modeloid.", @modelo = ".$modelo."";
			$res = sqlsrv_prepare($conn,$sql);

			if(sqlsrv_execute($res)){
				echo "Datos insertados";
			}else{
				echo "Datos No insertados";
			}
		}

		public function insertModelo(Modelo $modelo){
			// Crea la conexion
			$con = new ConectionDB(); 
			$conn = $con->conection2(); 
			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de createModelo...';
				die( print_r( sqlsrv_errors(), true)); //Mata el thread
			}
	
			// Especificacion de parametros
			//Agarro los parametros de la funcion
			$modeloid = $modelo->getIdModelo();
			$modelo = $modelo->getModelo();
	
			//Defino un array y le doy los valores especificos que definimos arriba
			$myparams['idModelo'] = $modeloid;
			$myparams['modelo'] = $modelo;
	
			//Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
			$procedure_params = array(
			array(&$myparams['idModelo'], SQLSRV_PARAM_IN), 
			array(&$myparams['modelo'], SQLSRV_PARAM_IN)
			); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS
	
			// Una variable con el ejecutable del procedimiento almacenado
			$sql = "EXEC sp_insertar_modelo @idModelo = ?, @modelo = ?";
	
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

		/*------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------*/

		function Leer()
		{
			$conectar = new conexion();

            $leer = "EXEC sp_visualizar_automovil";

            $conectar->set_charset('utf8');

			$resultado = $conectar->query($leer);

     		$todos = array();

			while ($fila = $resultado->fetch_assoc())
        	{

        		array_push($todos, new Artesanal($fila['id_tbartesanal'],$fila['nombre_tbartesanal'],$fila['descripcion_tbartesanal'],$fila['imagen_tbartesanal'],$fila['precio_tbartesanal']));
        	
        	}

			$conectar->close();

			return $todos;
		}

		/*------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------*/

		function Modificar($artesanal,$imagenCargada)
		{
			$id = $artesanal->getId();
   			$nombre = $artesanal->getNombre();
   			$descripcion = $artesanal->getDescripcion();
   			$imagen = $artesanal->getImagen();
   			$precio = $artesanal->getPrecio();

			$conectar = new conexion();
			mysqli_set_charset($conectar, 'utf8');

			$modificar = "call Artesanal_Modificar('".$id."','".$nombre."','".$descripcion."','".$imagen."','".$precio."','".$imagenCargada."')";

			$resultado = $conectar->query($modificar);

			$conectar->close();

        	return $resultado;
		}

		/*------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------*/

		function Eliminar($id)
		{
			$conectar = new conexion();

			$eliminar = "call Artesanal_Eliminar('".$id."')";

			$resultado = $conectar->query($eliminar);

			$conectar->close();

        	return $resultado;
		}

		/*------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------*/

		function LeerPorMarca($modelo)
		{
			$con = new ConectionDB(); 
            $con->set_charset('utf8');
			$conn = $con->conection2(); 

			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de createModelo...';
				die( print_r( sqlsrv_errors(), true)); //Mata el thread
			}

			$leer = "EXEC sp_visualizar_automovil('".$modelo."')";

			$resultado = $conectar->query($leer);

     		$todos = array();

			while ($fila = $resultado->fetch_assoc())
        	{

        		array_push($todos, new Automovil($fila['id_tbartesanal'],$fila['nombre_tbartesanal'],$fila['descripcion_tbartesanal'],$fila['imagen_tbartesanal'],$fila['precio_tbartesanal']));
        	
        	}

			$conectar->close();

			return $todos;
		}

	}

?>
