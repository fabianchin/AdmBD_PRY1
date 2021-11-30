<?php
    include '../data/ConectionDB.php';
    $con = new ConectionDB();
    $conn = $con->conection2();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gestión de Vendedor</title>

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
                <span class="navbar-text">
                    <a class ="nav-link" href="Clientes.php">Atras</a>
                </span>                
            </div>
        </nav>
        
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white">Ficha Tecnica</h3>
            </div>
        </div>
                         
        </div>
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
                    if (isset($_POST["fModelo"])) 
                    {
                        if(empty($_POST["fModelo"]))
                        {
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
                                    <?php 
                            } ?>
                                </tr>
                    <?php
                        }else{                
                            $query = "SELECT * FROM automovil where idModelo='".$_POST["fModelo"]."'";
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
                        <?php 
                            }
                        }
                    } ?>
                            </tr>              
                </tbody>
            </table>                          
        </div>       
    </body>
    <script src="../JS/Iconos/js/all.min.js"></script>
    <script src="../JS/js/bootstrap.min.js"></script>
    <script src="../JS/Cliente.js"></script>
    <script src="../JS/SweetAlert.js"></script>
    <script src="../JS/Validaciones.js"></script>
</html>