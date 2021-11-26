
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Index</title>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
        <script src="JS/SweetAlert.js" type="text/javascript"></script>
        <script src="JS/ModeloJS.js" type="text/javascript"></script>    
    </head>
    <body>
    <?php
        /*include_once "data/ClienteData.php";
        $data = new ClienteData();
        $data->createColor3(new Color(3,"Blanco"));*/
        /*include_once "data/ModeloData.php";
        $data = new ModeloData();
        $data->insertModelo(new Modelo(3,"Raptor"));*/
        /*include_once "data/ClienteData.php";
        $data = new ClienteData();
        $data->insertCliente(new Cliente(37845,"Raptor Melendez Garcia", "Lomas altas", 1785246, "ingeniero","rmg@gmail.com"));*/
        include_once "data/UsuarioData.php";
        $data = new UsuarioData();
        $data->insertUsuario(new Usuario("vende","vende123",2));
    ?>
    <label for="nombre" >Nombre:</label>
    <input type="text" name="modelo" id="modelo" placeholder="Nombre"  class="form-control" />
    <div class="modal-footer">
        <button type="button" class="btn btn-success" onclick="Crear()">Insertar</button>
    </div>
    </body>
</html>
