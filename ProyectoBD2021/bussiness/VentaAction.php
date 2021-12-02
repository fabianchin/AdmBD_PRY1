<?php
	  
  include "VentaBussiness.php";
 
  if ($_POST["accion"] == "crear") 
  {
    Crear();
  }
  else if ($_POST["accion"] == "leer") 
  {
    Leer();
  }
  else if ($_POST["accion"] == "eliminar") 
  {
    Eliminar();
  }
  /*else if ($_POST["accion"] == "modificar") 
  {
    Modificar();
  }*/

  /*  Agrega una venta   */
  function Crear()
  {
    if(isset($_POST["cedula"]))
    {

      if(!empty($_POST["cedula"]))
      {
            
        $cedula = ucfirst($_POST["cedula"]);
        $idAutomovil = $_POST["carro"];
        $usuario = $_POST["vendedor"];

        $venta = new Venta($idAutomovil,$cedula,$usuario);
        $negocio = new VentaBussiness();
        $resultado = $negocio->Crear($venta);

        if ($resultado){
          echo true;
        }
        else
        {
        echo false;
        }
      }
      else
        echo "CamposVacios";        
    }
    else
    {
      echo "VariablesNoDefinidas";
    }
  }

  /*  Elimina una venta   */
function Eliminar()
  {
    $id = $_POST["id"];

    $negocio = new AutomovilBussiness();
    $resultado = $negocio->Eliminar($id);

    if ($resultado) 
    {
      echo true;
    }
    else
    {
      echo false;
    }
  
  }