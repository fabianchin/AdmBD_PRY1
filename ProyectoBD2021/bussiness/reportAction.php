<?php 
if(isset($_POST)){
    $idDato = $_REQUEST['cbname'];
    $tipo = $_REQUEST["tipo"];
    if(strcmp($tipo, "filtroModelo") == 0){
    header("location: ../presentation/reportfilter.php?id=".$idDato."&type=filtroModelo");
    }else if(strcmp($tipo, "filtroUsuario") == 0){
        header("location: ../presentation/reportfilter.php?id=".$idDato."&type=filtroUsuario");
    }
}
?>