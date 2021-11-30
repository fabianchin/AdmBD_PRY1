<?php
    //include_once "../data/AutomovilData.php";
    include "../data/ConectionDB.php";
    $con = new ConectionDB();
    $conn = $con->conection2();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestión de Administrador</title>

        <link rel="stylesheet" href="../JS/css/bootstrap.min.css">
        <link rel="stylesheet" href="../JS/Iconos/css/all.min.css">
	    
        <script src="../JS/js/jquery-2.1.4.min.js"></script>
    </head>

    <body onload="">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a  href="#" class="navbar-brand text-black">
                <img style="margin-top:20px; height:45px;" src="../Estilo/images/ford-logo.png" alt="Logo" />
                <br>Ford Motors
            </a>
            <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto  ml-auto">
                    <li class="nav-item active">
                        <a class ="nav-link" href="#.php"></a>
                    </li>
                </ul>  
                <span class="navbar-text">
                    <a class ="nav-link" href="login.php">Salir</a>
                </span>                
            </div>
        </nav>
        
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Gestion de Vehiculos</h3>
            </div>
        </div>
            
            <div class="row">
                <div class="col-sm-6">
                    <?php
                        $query="SELECT DISTINCT m.idModelo, m.modelo FROM venta v inner join automovil a on v.idAutomovil=a.idAutomovil inner join modelo m on a.idModelo = m.idModelo";
                        $res = sqlsrv_query($conn,$query);
                        $option = "";
                    ?>
                    <form accept-charset="UTF-8" mehotd="post" action="../bussiness/reportAction.php">
                        <select id="list" name="cbname" class="form-control">
                        <?php while($row=sqlsrv_fetch_array($res)){ ?>
                            <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php } ?>
                        </select>
                        <input type="hidden" id="tipo" name="tipo" value="filtroModelo">
                        <button class="btn btn-primary" type=submit id=button1>Filtrar por Modelo</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <form action="report.php">
                        <button type="submit" class="btn btn-primary">Generar Reporte</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <?php
                        $query2="SELECT DISTINCT u.usuario FROM venta v inner join usuario u on v.usuario=u.usuario where u.tipo=2";
                        $res2 = sqlsrv_query($conn,$query2);
                    ?>
                    <form accept-charset="UTF-8" mehotd="post" action="../bussiness/reportAction.php">
                        <select id="list" name="cbname" class="form-control">
                        <?php while($row2=sqlsrv_fetch_array($res2)){ 
                            $user  = $row2[0];
                            $users = explode("@", $user);?>
                            <option value="<?php echo $users[0] ?>"><?php echo $row2[0] ?></option>
                        <?php } ?>
                        </select>
                        <input type="hidden" id="tipo" name="tipo" value="filtroUsuario">
                        <button class="btn btn-primary" type=submit id=button2>Filtrar por Usuario</button>
                    </form>
                </div>

                    <button type="button" class="btn btn-primary" name="bk" id="bk">Generar Respaldo</button>
                </div>
            </div>           
            
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label for="modelo">Modelo:</label>
                        <?php
                            $query="SELECT DISTINCT idModelo, modelo FROM modelo";
                            $res = sqlsrv_query($conn,$query);
                            $option = "";   
                        ?>                        
                        <select name="modelo" id="modelo" class="form-control">
                            <?php 
                            while($row=sqlsrv_fetch_array($res)){ ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="estilo">Estilo:</label>
                        <input type="text" name="estilo" id="estilo" placeholder="Ingrese el Estilo" onkeypress="return Letras(event)" class="form-control" autofocus> 
                    </div>
                    <div class="col-md-6">
                        <label for="color">Color:</label>
                        <?php
                            $query="SELECT DISTINCT idColor, color FROM color";
                            $res = sqlsrv_query($conn,$query);
                            $option = "";   
                        ?>                        
                        <select name="color" id="color" class="form-control">
                            <?php 
                            while($row=sqlsrv_fetch_array($res)){ ?>
                                <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="capacidad">Capacidad de Pasajeros:</label>
                        <input type="text" name="capacidad" id="capacidad" placeholder="Ingrese La Capacidad de Pasajeros" onkeypress="return Numeros(event)" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label for="combustible">Combustible:</label>
                        <select name="combustible" id="combustible" class="form-control">
                            <option value="1">Gasolina</option>
                            <option value="2">Diesel</option>
                            <option value="3">Electrico</option>
                            <option value="4">Hibrido</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="transmision">Transmision:</label><br>
                        <input type="radio" name="transmision" id="transmision" value="0">Automatico
                        <input type="radio" name="transmision" id="transmision" value="1">Manual
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="anio">Año:</label>
                        <input type="text" name="anio" id="anio" placeholder="Ingrese El año del Auto" onkeypress="return Numeros(event)" class="form-control">
                    </div><div class="col-md-6">
                        <label for="stock">Stock:</label>
                        <input type="text" name="stock" id="stock" placeholder="Ingrese La Cantidad" onkeypress="return Numeros(event)" class="form-control">
                    </div><div class="col-md-6">
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" id="precio" placeholder="Ingrese El Precio" onkeypress="return Numeros(event)" class="form-control">
                    </div><div class="col-md-6">
                        <label for="detalles">Detalles:</label>
                        <input type="text" name="detalles" id="detalles" placeholder="Ingrese Detalles" class="form-control" autofocus> 
                    </div>
                </div>
                <br><br>
                <center>
                    <button type="button" class="btn btn-success" onclick="Crear();">Registrar</button>
                </center>

            </div>
            <div class ="card-footer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Estilo</th>
                            <th>Color</th>
                            <th>Capacidad</th>
                            <th>Combustible</th>
                            <th>Transmision</th>
                            <th>Año</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody  id="datos" >
                        <?php
                            $query = "SELECT * FROM automovil";
                            $res = sqlsrv_query($conn,$query);
                            while($row=sqlsrv_fetch_array($res)){
                        ?>
                       <tr> 
                            <td> <?php echo $row[1] ?></td>
                            <td> <?php echo $row[2] ?></td>
                            <td> <?php echo $row[3] ?></td>
                            <td> <?php echo $row[4] ?></td>
                            <td> <?php echo $row[5] ?></td>
                            <td> <?php echo $row[6] ?></td>
                            <td> <?php echo $row[7] ?></td>
                            <td> <?php echo $row[8] ?></td>
                            <td> <?php echo $row[9] ?></td>
                            <td> <?php echo $row[10] ?></td>
                            <td> <?php echo $row[11] ?></td>
                            
                            <td>
                                <button type="button" class="btn btn-primary" onclick="Enviar(<?php echo $row[0] ?>,<?php echo $row[4] ?>,
                                <?php echo $row[9] ?>,<?php echo $row[10] ?>,'<?php echo $row[11] ?>');">Modificar</button>                                
                            </td>

                            <td> 
                                <button type="button" class="btn btn-primary" onclick="Eliminar(<?php echo $row[0] ?>);">Eliminar</button>
                            </td>

                            <?php } ?>
                        </tr>
                </table>

            </card-footer>  
            
            <div class="modal"  id="modal1">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header bg-info">
                                <h5 class="modal-title text-while">Modificando</h5> 
                                <button class="btn btn-danger" onclick="cerrarModal()">
                                    Cerrar
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="text" hidden="true" id="M_id"/>
                                <div class="card-body">
                                <div class="row">
                                        <input type="hidden" name="id" id="M_id" class="form-control">
                                        <label for="color">Color:</label>
                                        <input type="text" name="color" id="M_color" placeholder="Ingrese el Nombre" class="form-control" autofocus> 
                                        <label for="stock">Stock:</label>
                                        <input type="text" name="stock" id="M_stock" onkeypress="return Numeros(event)"  placeholder="Ingrese La Cantidad" class="form-control">
                                        <label for="precio">Precio:</label>
                                        <input type="text" name="precio" id="M_precio" onkeypress="return Numeros(event)"  placeholder="Ingrese La Cantidad" class="form-control">
                                        <label for="detalles">Detalles:</label>
                                        <input type="text" name="detalles" id="M_detalles" placeholder="Ingrese el Nombre" class="form-control" autofocus>  
                                    </div>             
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-success" onclick="Modificar()">Modificar</button>
                            </div>
                        </div>
                    </div>
                </div> 
    </body>
    <script src="../JS/Iconos/js/all.min.js"></script>
    <script src="../JS/js/bootstrap.min.js"></script>
    <script src="../JS/Automovil.js"></script>
    <script src="../JS/SweetAlert.js"></script>
    <script src="../JS/Validaciones.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("bk").click(function(){
                $.ajax({
                    type: 'POST',
                    url: '../.php',
                    success: function(data) {
                        alert(data);
                        $("p").text(data);
                    }
                });
            });
        });
    </script>
</html>