<?php

	include "ConectionDB.php";

	class SesionConsulta
	{		

		function VerificarDatos($correo,$pass){
			$con = new ConectionDB(); 
			$conn = $con->conection2(); 
			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de obtainAutomovilIdModelo';
				die( print_r( sqlsrv_errors(), true));
			}
			$dato = "";
			$umail = $correo;
			$upass = $pass;
			$myparams['correo'] = $umail;
			$myparams['pass'] = $upass;
			$myparams['resultado'] = "";
			$procedure_params = array(
			array(&$myparams['correo'], SQLSRV_PARAM_IN),
			array(&$myparams['pass'], SQLSRV_PARAM_IN),
			array(&$myparams['resultado'], SQLSRV_PARAM_OUT));

			$sql = "EXEC sp_validateUserExist @mail=?, @pass=?";  
			$stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
			if(!$stmt){die( print_r( sqlsrv_errors(),true));}
			
			sqlsrv_execute($stmt); 
			
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
				$dato = $row[0];
			}
			sqlsrv_free_stmt($stmt);
			return $dato;
		}

		/*------------------------------------------------------------------------------------------------------------
		------------------------------------------------------------------------------------------------------------*/


		function IniciarSesion($correo,$pass){
			$con = new ConectionDB(); 
			$conn = $con->conection2(); 
			if( $conn === false) {
				echo 'Fallo la conexion a base de datos en el query de obtainAutomovilIdModelo';
				die( print_r( sqlsrv_errors(), true));
			}
			
			$tipoUsuario = 0; //tipo de usuario
			$umail = $correo;
			$upass = $pass;
			$myparams['correo'] = $umail;
			$myparams['pass'] = $upass;
			$myparams['resultado'] = "";
			$procedure_params = array(
			array(&$myparams['correo'], SQLSRV_PARAM_IN),
			array(&$myparams['pass'], SQLSRV_PARAM_IN),
			array(&$myparams['resultado'], SQLSRV_PARAM_OUT));

			$sql = "EXEC sp_Sesion_Iniciar @mail=?, @pass=?";  
			$stmt = sqlsrv_prepare($conn, $sql, $procedure_params);
			if(!$stmt){die( print_r( sqlsrv_errors(),true));}
			
			sqlsrv_execute($stmt); 
			
			while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC) ) {
				$tipoUsuario = $row[2];
			}
			sqlsrv_free_stmt($stmt);
			return $tipoUsuario;
		}
	}
?>