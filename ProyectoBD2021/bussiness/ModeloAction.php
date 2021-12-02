<?php
	  
  include "ModeloBussiness.php";
 
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

  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/

  function Crear(){

    if(isset($_POST["modelo"]))    {

      if(!empty($_POST["modelo"]))
      {
            
        $nombre = ucfirst($_POST["modelo"]);

        $modelo = new Modelo(5,$nombre);
        $negocio = new ModeloBussiness();
        $resultado = $negocio->Crear($modelo);

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

  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/

  function Modificar(){

    if(isset($_POST["modelo"])){

      if(!empty($_POST["modelo"]))
      {

        $id = $_POST["id"];
        $nombre = ucfirst($_POST["modelo"]);

        $modelo = new Modelo($id,$nombre);
    
        if($modelo != NULL){

          $negocio = new ModeloBussiness();
          $resultado = $negocio->Modificar($modelo);

          if ($resultado)
          {          
            echo true;
          }
          else
          {    
            echo false;
          }

        }

      }else{

        echo "CamposVacios";

      }

    }else{

      echo "VariablesNoDefinidas";
    
    }

  }

  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/

  function Eliminar()
  {
    $id = $_POST["id"];

    $negocio = new ModeloBussiness();
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