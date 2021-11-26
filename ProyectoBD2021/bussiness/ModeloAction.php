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
  else if ($_POST["accion"] == "leerPorProductor") 
  {
    LeerPorProductor();
  }

  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/

  function Crear()
  {
    window.alert("Entra modeloAction");
    if(isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["precio"]))
    {

      if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]))
      {

        if(is_numeric($_POST["precio"]))
        {

          if($_FILES['imagen']['error'] == 0)
          {

            if(!empty($_FILES["imagen"]["tmp_name"])) 
            {
            
              $nombre = ucfirst($_POST["nombre"]);
              $descripcion = ucfirst($_POST["descripcion"]);
              $imagen = $_FILES["imagen"]["tmp_name"];
              $imagenContent = addslashes(file_get_contents($imagen));
              $precio = $_POST["precio"];

              if (is_uploaded_file($imagen))
              {

                if ($_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["type"] == "image/pjpeg" || $_FILES["imagen"]["type"] == "image/gif" || $_FILES["imagen"]["type"] == "image/bmp" || $_FILES["imagen"]["type"] == "image/png")
                {

                  session_start();

                  $idProductor = $_SESSION['idAsociado']; 

                  $artesanal = new Artesanal(0,$nombre,$descripcion,$imagenContent,$precio);
                  $negocio = new ArtesanalNegocio();
                  $resultado = $negocio->Crear($artesanal,$idProductor);

                  if ($resultado) 
                  {
                    echo true;
                  }
                  else
                  {
                    echo false;
                  }

                }
                else
                {

                  echo "ArchivoNoImagen";

                }
      
              }
              else
              {

                echo "ArchivoNoPost";

              }

            }
            else
            {

              echo "ImagenVacia";
          
            }

          }
          else
          {

            echo "ImagenNoCargada";

          }

        }
        else
        {
          echo "NoNumero";
        }

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



  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/


  
  function Leer()
  {

    $negocio = new ArtesanalNegocio();
    $resultado = $negocio->Leer();

    if($resultado != null)
    {
 
      foreach ($resultado as $artesanal) 
      {
        echo 
        "
          <tr>
            <td>".$artesanal->getNombre()."</td>
            <td>".$artesanal->getDescripcion()."</td>
            <td><img src='data:image/jpeg;base64,".base64_encode($artesanal->getImagen())."' width='80' height='80'/></td>
            <td>".$artesanal->getPrecio()."</td>           
          </tr>                                       
        ";
      }
    }    
  }



  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/



  function Modificar()
  {

    if(isset($_POST["nombre"]) && isset($_POST["descripcion"])  && isset($_POST["precio"]))
    {

      if(!empty($_POST["nombre"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"]))
      {

        $id = $_POST["id"];
        $nombre = ucfirst($_POST["nombre"]);
        $descripcion = ucfirst($_POST["descripcion"]);
        $precio = $_POST["precio"];
        $imagenCargada = $_POST["imagenCargada"];
        $artesanal = NULL;


        if($imagenCargada == "true")
        {

          if($_FILES['imagen']['error'] == 0)
          {

            if(!empty($_FILES["imagen"]["tmp_name"])) 
            {

              $imagen = $_FILES["imagen"]["tmp_name"];
              $imagenContent = addslashes(file_get_contents($imagen));  

              if (is_uploaded_file($imagen))
              {

                if ($_FILES["imagen"]["type"] == "image/jpeg" || $_FILES["imagen"]["type"] == "image/pjpeg" || $_FILES["imagen"]["type"] == "image/gif" || $_FILES["imagen"]["type"] == "image/bmp" || $_FILES["imagen"]["type"] == "image/png")
                {
            
                  $artesanal = new Artesanal($id,$nombre,$descripcion,$imagenContent,$precio);       
               
                }
                else
                {

                  echo "ArchivoNoImagen";

                }

              }
              else
              {

                echo "ArchivoNoPost";

              }

            }
            else
            {

              echo "ImagenVacia";
            
            }

          }
          else
          {

            echo "ImagenNoCargada";

          }

        }
        else
        {

          $artesanal = new Artesanal($id,$nombre,$descripcion,"",$precio);
    
        }

    
        if($artesanal != NULL)
        {

          $negocio = new ArtesanalNegocio();
          $resultado = $negocio->Modificar($artesanal,$imagenCargada);

          if ($resultado)
          {
          
            echo true;
    
          }
          else
          {
    
            echo false;
    
          }

        }

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



  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/


  
  function Eliminar()
  {
    $id = $_POST["id"];

    $negocio = new ArtesanalNegocio();
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



  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/


  
  function LeerPorProductor()
  {
    session_start();

    $id = $_SESSION['idAsociado'];

    $negocio = new ArtesanalNegocio();
    $resultado = $negocio->LeerPorProductor($id);

    if($resultado != null)
    {
 
      foreach ($resultado as $artesanal) 
      {
        echo 
        "
          <tr>
            <td>".$artesanal->getNombre()."</td>
            <td>".$artesanal->getDescripcion()."</td>
            <td><img src='data:image/jpeg;base64,".base64_encode($artesanal->getImagen())."' width='80' height='80'/></td>
            <td>".$artesanal->getPrecio()."</td>
            <td>
              <button class='btn btn-success'  title='Modificar' onclick=\"ModificarDatos('".$artesanal->getId()."','".$artesanal->getNombre()."','".$artesanal->getDescripcion()."','".$artesanal->getPrecio()."')\"><spam class='fas fa-edit'></spam></button>
              <span>&nbsp;</span>
              <button class='btn btn-danger'  title='Eliminar' onclick=\"Eliminar('".$artesanal->getId()."')\"><spam class='fas fa-trash-alt'></spam></button>
            </td>
  
          </tr>                                       
        ";
      }
    }    
  }

