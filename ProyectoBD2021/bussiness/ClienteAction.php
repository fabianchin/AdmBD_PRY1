<?php
	  
  include "ClienteBussiness.php";
 
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

  /*  Agrega un cliente   */
  function Crear()
  {
    if(isset($_POST["cedula"]))
    {

      if(!empty($_POST["cedula"]))
      {
            
        $cedula = ucfirst($_POST["cedula"]);
        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $telefono = $_POST["telefono"];
        $ocupacion = $_POST["ocupacion"];
        $correo = $_POST["correo"];

        $cliente = new Cliente($cedula,$nombre,$direccion,$telefono,$ocupacion,$correo);
        $negocio = new ClienteBussiness();
        $resultado = $negocio->Crear($cliente);

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
  
/*  Mustra la tabla con los datos  */

  function Leer()
  {

    $negocio = new ClienteBussiness();
    echo $negocio->Leer();
      
  }

/*  elimina un cliente   */
function Eliminar()
  {
    $id = $_POST["id"];

    $negocio = new ClienteBussiness();
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