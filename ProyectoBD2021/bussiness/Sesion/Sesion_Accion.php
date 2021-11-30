<?php

  include "Sesion_Negocio.php";


  if ($_POST["accion"] == "iniciarSesion")
  {
    VerificarDatos();
  }

  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/


  function VerificarDatos()
  {

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $negocio = new SesionNegocio();
    $resultado = $negocio->VerificarDatos($correo,$contrasena);

    if($resultado == 1)
    {
      IniciarSesion($correo,$contrasena);
    }
    else
    {
      echo $resultado;
    }

  }


  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/


  function IniciarSesion($correo,$contrasena)
  {
    $negocio = new SesionNegocio();
    $resultado = $negocio->IniciarSesion($correo,$contrasena);

    echo $resultado;
  }


/*********************************************************/


function VerificarRegistro()
  {

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    $negocio = new SesionNegocio();
    $resultado = $negocio->VerificarDatos($correo,$contrasena);

    echo $resultado;

  }
