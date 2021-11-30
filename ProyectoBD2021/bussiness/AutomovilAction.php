<?php
	  
  include "AutomovilBussiness.php";
 
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
    if(isset($_POST["modelo"]))
    {

      if(!empty($_POST["modelo"]))
      {
            
        $modelo = ucfirst($_POST["modelo"]);
        $estilo = $_POST["estilo"];
        $color = $_POST["color"];
        $capacidad = $_POST["capacidad"];
        $combustible = $_POST["combustible"];
        $transmision = $_POST["transmision"];
        $anio = $_POST["anio"];
        $stock = $_POST["stock"];
        $precio = $_POST["precio"];
        $detalles = $_POST["detalles"];


                  //session_start();

        $vehiculo = new Automovil(5,"Ford",2,$estilo,$color,$capacidad,$combustible,$transmision,$anio,$stock,$precio,$detalles);
        $negocio = new AutomovilBussiness();
        $resultado = $negocio->Crear($vehiculo);

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
  
  function Modificar()
  {
    if(isset($_POST["color"]) && isset($_POST["stock"])  && isset($_POST["precio"]) && isset($_POST["detalles"]))
    {

      if(!empty($_POST["color"]) && !empty($_POST["stock"]) && !empty($_POST["precio"]) && !empty($_POST["detalles"]))
      {
        $id = $_POST["id"];
        $color = ($_POST["color"]);
        $stock = ($_POST["stock"]);
        $precio = $_POST["precio"];
        $detalles = $_POST["detalles"];

        $vehiculo = new Automovil($id,"",0,"",$color,0,0,0,0,$stock,$precio,$detalles);

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
  
  }