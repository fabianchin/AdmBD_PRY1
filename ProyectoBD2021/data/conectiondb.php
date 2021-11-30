<?php

class ConectionDB{

    function conection(){
        $host='localhost';
        $dbname='BDProyectoFinal';
        $username='sa';
        $pass='system';
        $port=1433;

        try{
            $conn = new PDO ("sqlsrv:Server=$host,$port;Database=$dbname",$username,$pass);
            echo "Se conecto ajuaaaa";
        }catch(PDOException $e){
            echo ("No se conecto a: $dbname, error: $e");
        }

    }

    function conection2(){
        $serverName = "localhost\\sqlexpress, 1433";
        $connectionInfo = array( "Database"=>"BDProyectoFinal2", "UID"=>"sa", "PWD"=>"system");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
        if( $conn === false) {
            echo 'Welp...';
            die( print_r( sqlsrv_errors(), true));
        }
        return $conn;
    }
}

?>