
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Index</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="JS/SweetAlert.js" type="text/javascript"></script>
        <script src="JS/ModeloJS.js" type="text/javascript"></script>    
        <script src="JS/FiltroReportes.js" type="text/javascript"></script>
        <script> 
            (function() {
                var scrt_var = document.getElementById("list").value;
                var strLink = "presentation/reportfilter.php?id=" + scrt_var + "&type=filtroModelo";
                document.getElementById("link2").setAttribute("href",strLink);
            })();
        </script>
    </head>
    <body>
    <?php
        /*include_once "data/ClienteData.php";
        $data = new ClienteData();
        $data->createColor3(new Color(3,"Blanco"));*/
        /*include_once "data/ModeloData.php";
        $data = new ModeloData();
        $data->crear(new Modelo(4,"Raptores"));*/
        /*include_once "data/ClienteData.php";
        $data = new ClienteData();
        $data->insertCliente(new Cliente(37845,"Raptor Melendez Garcia", "Lomas altas", 1785246, "ingeniero","rmg@gmail.com"));*/
        /*include_once "data/UsuarioData.php";
        $data = new UsuarioData();
        $data->insertUsuario(new Usuario("vende","vende123",2));*/
        /*include_once "data/AutomovilData.php";
        $data = new AutomovilData();
        //$data->insertAutomovil(new Automovil(3,"Ford",1,"pickup",2,5,1,1,2021,1,2500000,"4x4 turbo"));
        $data->updateAutomovil(new Automovil(3,"Ford",1,"pickup",1,5,1,1,2021,1,1200000,"4x2 turbo"));
        $data->deleteAutomovil(new Automovil(3,"Ford",1,"pickup",1,5,1,1,2021,2,1200000,"4x2 turbo"));*/

        /*include_once "data/AutomovilData.php";
        $data = new AutomovilData();
        $data->leerPorModelo("");*/

        include "./data/ConectionDB.php";
        $con = new ConectionDB(); 
        $conn = $con->conection2(); 
        if( $conn === false) {
            echo 'Fallo la conexion a base de datos en el indexP';
            die( print_r( sqlsrv_errors(), true)); //Mata el thread
        }

        $query="SELECT m.idModelo, m.modelo FROM venta v inner join automovil a on v.idAutomovil=a.idAutomovil inner join modelo m on a.idModelo = m.idModelo";
        $res = sqlsrv_query($conn,$query);
        $option = "";   
    ?>
    <form accept-charset="UTF-8" mehotd="post" action="./bussiness/reportAction.php">
        <select id="list" name="cbname" style="padding: 10px;">
        <?php while($row=sqlsrv_fetch_array($res)){ ?>
            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
        <?php } ?>
        </select>
            <input type="hidden" id="tipo" name="tipo" value="filtroModelo">
            <button type=submit id=button1>Filtrar</button>
        </form>

    </body>
</html>
