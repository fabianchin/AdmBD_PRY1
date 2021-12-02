function CampoVacio(dato) 
{
	var bandera = false;

	if(dato.length == 0)
	{ 
		bandera = true;
	}

	return bandera;
}

function Crear() {
    var modelo = $("#modelo").val().trim();
  
    if (CampoVacio(modelo)) {
      Swal.fire({
        position: "top",
        type: "warning",
        title: "Escriba un Comentario",
      });
    } else {
      var parametros = {
        accion: "crear",
        modelo: modelo,
      };
      
      $.ajax({
        data: parametros,
        url: "../bussiness/ModeloAction.php",
        type: "POST",
        dataType: "html",
        
        success: function (dataresponse, statustext, response) {
          console.log(dataresponse);
          if (dataresponse == true) {
            Swal.fire({
              position: "top",
              type: "success",
              title: "Modelo agregado correctamente",
              showConfirmButton: false,
              timer: 3000,
            });
            $("#modelo").val("");
          } else {
           /* Swal.fire({
              position: "top",
              type: "error",
              title: "Comentario no agregado",
              showConfirmButton: false,
              timer: 3000,
            });*/
          }
        },
        error: function (request, errorcode, errortext) {
          Swal.fire({
            position: "top",
            type: "error",
            title: errortext,
            timer: 3000,
          });
          $("#modelo").val("");
        },
      });
    }
  }
  
  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/
  
  function Eliminar(id) {
    var parametros = {
      accion: "eliminar",
      id: id,
    };
  
    Swal.fire({
      position: "top",
      text: "¿Está seguro que desea eliminar este modelo?",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) {
        $.ajax({
          data: parametros,
          url: "../bussiness/ModeloAction.php",
          dataType: "html",
          type: "post",
  
          success: function (dataresponse, statustext, response) {
            if (dataresponse == true) {
              Swal.fire({
                position: "top",
                type: "success",
                title: "Modelo eliminado",
                showConfirmButton: false,
                timer: 3000,
              });
            } else {
             /* Swal.fire({
                position: "top",
                type: "error",
                title: "Modelo no eliminado",
                showConfirmButton: false,
                timer: 3000,
              });*/
            }
          },
          error: function (request, errorcode, errortext) {
            Swal.fire({
              position: "top",
              type: "error",
              title: errortext,
              timer: 3000,
            });
          },
        });
      }
    });
  }
  