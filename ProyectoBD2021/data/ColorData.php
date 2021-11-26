<?php

include 'ConectionDB.php';
include './domain/Color.php';

class ColorData{


    public function insertColor(Color $color){
        // Crea la conexion
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el query de createColor3...';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        // Especificacion de parametros - Ojo, deben de ser parametros que se pueden pasar por referencia! (yo tampoco entendi haha)
        //Agarro los parametros de la funcion
        $colorid = $color->getIdColor();
        $colorcolor = $color->getColor();

        //Defino un array y le doy los valores especificos que definimos arriba
        $myparams['idColor'] = $colorid;
        $myparams['color'] = $colorcolor;

        //Configuramos el procedimiento almacenado por medio de los parametros del array - los parametros se deben de pasar por referencia
        $procedure_params = array(
        array(&$myparams['idColor'], SQLSRV_PARAM_IN), 
        array(&$myparams['color'], SQLSRV_PARAM_IN)
        ); //Existe SQLSRV_PARAM_OUT, pero ese creo que se usa si uno espera algo de retorno desde el procedimiento almacenado, en este punto solo son INPUTS

        // Una variable con el ejecutable del procedimiento almacenado
        $sql = "EXEC sp_insertar_color @idColor = ?, @color = ?";

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