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
              title: "Su comentario ha sido enviado correctamente",
              showConfirmButton: false,
              timer: 3000,
            });
            $("#modelo").val("");
          } else {
            Swal.fire({
              position: "top",
              type: "error",
              title: "Comentario no agregado",
              showConfirmButton: false,
              timer: 3000,
            });
            $("#modelo").val("");
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
  
  
  
  function Leer() {
    var parametros = {
      accion: "leer",
    };
  
    $.ajax({
      data: parametros,
      url: "../Negocio/Comentario/Comentario_Accion.php",
      dataType: "html",
      type: "post",
  
      success: function (dataresponse, statustext, response) {
        $("#tbodyComentario").html(dataresponse);
  
        $("#tbComentario").DataTable({
          language: {
            processing: "Procesando...",
            search: "Buscar:",
            lengthMenu: "Mostrar _MENU_ registros",
            info: " ",
            infoEmpty: "",
            infoFiltered: "",
            infoPostFix: "",
            loadingRecords: "Cargando...",
            zeroRecords: "No se han encontrado coincidencias",
            emptyTable: "No hay datos disponibles en la tabla",
            paginate: {
              first: "Primera",
              previous: "Anterior",
              next: "Siguiente",
              last: "Última",
            },
            aria: {
              sortAscending: "Ordenación ascendente",
              sortDescending: "Ordenación descendente",
            },
          },
          paging: true,
          aaSorting: [],
          lengthMenu: [
            [5, 10, 15, 20, 25, 50, -1],
            [5, 10, 15, 20, 25, 50, "Todos"],
          ],
          iDisplayLength: 5,
          bJQueryUI: false,
        });
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
  
  
  /*------------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------*/
  
  
  
  function Eliminar(id) {
    var parametros = {
      accion: "eliminar",
      id: id,
    };
  
    Swal.fire({
      position: "top",
      text: "¿Está seguro que desea eliminar este comentario?",
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
          url: "../Negocio/Comentario/Comentario_Accion.php",
          dataType: "html",
          type: "post",
  
          success: function (dataresponse, statustext, response) {
            if (dataresponse == true) {
              Swal.fire({
                position: "top",
                type: "success",
                title: "Comentario eliminado",
                showConfirmButton: false,
                timer: 3000,
              });
  
              $("#tbComentario").DataTable().clear();
              $("#tbComentario").DataTable().destroy();
  
              Leer();
            } else {
              Swal.fire({
                position: "top",
                type: "error",
                title: "Comentario no eliminado",
                showConfirmButton: false,
                timer: 3000,
              });
  
              $("#tbComentario").DataTable().clear();
              $("#tbComentario").DataTable().destroy();
  
              Leer();
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
  