
function IniciarSesion()
{
  var correo = $('#correo').val();
  var contrasena = $('#contrasena').val(); 

  if(CampoVacio(correo) || CampoVacio(contrasena))
  {

    Swal.fire({position: 'top',type: 'warning',title: 'Rellene los espacios en blanco'});

  }
  /*else if(!Correo(correo))
  {

    Swal.fire({position: 'top',type: 'warning',title: 'El correo no es válido'});

  }*/
  else
  {
    
    var parametros = 
    {

      "accion" : 'iniciarSesion',
      "correo" : correo,
      "contrasena" : contrasena

    };  


    $.ajax(
    {

      data:  parametros,
      url:   '../bussiness/Sesion/Sesion_Accion.php',
      dataType: 'html',
      type:  'post',

      
      success: function(dataresponse, statustext, response)
      {
        //alert(dataresponse);
        if(dataresponse == 1)
        {

          window.location = "../presentation/Automoviles.php";
          $('#correo').val("");
          $('#contrasena').val("");

        }
        else if(dataresponse == 2)
        {

          window.location = "../presentation/Clientes.php";
          $('#correo').val("");
          $('#contrasena').val("");

        }
        /*else if(dataresponse == 3)
        {

          window.location = "Cliente_Productor.php";
          $('#correo').val("");
          $('#contrasena').val("");

        }*/
        else
        {
        
          Swal.fire({position: 'top',type: 'warning',title: 'Correo o contraseña incorrectos'});

        }

      },
      error: function(request, errorcode, errortext)
      {

        alert(errortext);

      }

    });

  }
  
}