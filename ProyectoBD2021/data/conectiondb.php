a<?php

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

}

?>