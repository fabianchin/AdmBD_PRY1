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
  else if ($_POST["accion"] == "modificar") 
  {
    Modificar();
  }

  /*  Agrega un herramienta   */
  function Crear()
  {
    if(isset($_POST["cedula"]))
    {

      if(!empty($_POST["cedula"]))
      {
            
        $cedula = ucfirst($_POST["cedula"]);
        $idAutomovil = $_POST["carro"];
        $usuario = $_POST["vendedor"];
                  //session_start();

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
  /*
  function Modificar()
  {
    if(isset($_POST["color"]) && isset($_POST["stock"])  && isset($_POST["precio"]) && isset($_POST["detalles"]))
    {

      if(!empty($_POST["color"]) && !empty($_POST["stock"]) && !empty($_POST["precio"]) && !empty($_POST["detalles"]))
      {
        //$id = $_POST["id"];
        $color = ($_POST["color"]);
        $stock = ($_POST["stock"]);
        $precio = $_POST["precio"];
        $detalles = $_POST["detalles"];

        $vehiculo = new Automovil(5,"",0,"",$color,0,0,0,0,$stock,$precio,$detalles);

        //if($carro != NULL){
          $negocio = new AutomovilBussiness();
          $resultado = $negocio->Modificar($vehiculo);

          if ($resultado)
          {
            echo true;
          }
          else
          {
            echo false;    
          }
        //}
        
      }
      else
      {
        echo "CamposVacios";
      }
    } 
    else
    {
      echo "VariablesNoDefinidas";
    }
  }

/*  Mustra la tabla con los datos  */
/*
  function Leer()
  {

    $negocio = new LogicaAlimento();
    echo $negocio->Leer();
      
  }


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
  
  }*/