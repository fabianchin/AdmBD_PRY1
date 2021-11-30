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
    var estilo = $("#estilo").val().trim();
    var color = $("#color").val().trim();
    var capacidad = $("#capacidad").val().trim();
    var combustible = $("#combustible").val().trim();
    var transmision = $("#transmision").val().trim();
    var anio = $("#anio").val().trim();
    var stock = $("#stock").val().trim();
    var precio = $("#precio").val().trim();
    var detalles = $("#detalles").val().trim();
  
    if (CampoVacio(modelo) || CampoVacio(estilo) || CampoVacio(color) || CampoVacio(capacidad) || CampoVacio(combustible)
        || CampoVacio(transmision) || CampoVacio(anio) || CampoVacio(stock) || CampoVacio(precio) || CampoVacio(detalles)) {
      Swal.fire({
        position: "top",
        type: "warning",
        title: "Rellene los espacios en blanco",
      });
    } else {
      var parametros = {
        accion: "crear",
        modelo: modelo,
        estilo: estilo,
        color: color,
        capacidad: capacidad,
        combustible: combustible,
        transmision: transmision,
        anio: anio,
        stock: stock,
        precio: precio,
        detalles : detalles,
      };
      
      $.ajax({
        data: parametros,
        url: "../bussiness/AutomovilAction.php",
        type: "POST",
        dataType: "html",
        
        success: function (dataresponse, statustext, response) {
          console.log(dataresponse);
          if (dataresponse == true) {
            Swal.fire({
              position: "top",
              type: "success",
              title: "Datos Guardados Correctamente",
              showConfirmButton: false,
              timer: 3000,
            });
            $("#modelo").val("");
          } else {
            Swal.fire({
              position: "top",
              type: "error",
              title: "Datos no Guardados",
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
  
  function Modificar() {
    id = $("#M_id").val();
    color = $("#M_color").val();
    stock = $("#M_stock").val();
    precio = $("#M_precio").val();
    detalles = $("#M_detalles").val();
  
    if (CampoVacio(color) || CampoVacio(stock) || CampoVacio(precio) || CampoVacio(detalles)) {
      Swal.fire({
        position: "top",
        type: "warning",
        title: "Rellene los espacios en blanco",
      });
    } else {
      Swal.fire({
        position: "top",
        text: "¿Está seguro que desea modificar este Vehiculo?",
        type: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
      }).then((result) => {
        if (result.value) {
          $.post(
            "../bussiness/AutomovilAction.php",
            {
              accion: "modificar",
              id: id,
              color: color,
              stock: stock,
              precio: precio,
              detalles: detalles,
            },
            function (responseText) {
              alert(responseText);
              if (responseText == true) {
                Swal.fire({
                  position: "top",
                  type: "success",
                  title: "Vehiculo modificado correctamente",
                  showConfirmButton: false,
                  timer: 3000,
                });
                $("#modal1").css("display", "none");
               // Leer();
              } else {
                Swal.fire({
                  position: "top",
                  type: "error",
                  title: "Vehiculo no modificado",
                  showConfirmButton: false,
                  timer: 3000,
                });
                $("#modal1").css("display", "none");
                //Leer();
              }
            }
          );
        }
      });
    }
    Limpiar();
  }
  
  function Eliminar(id) {
      Swal.fire({
      position: "top",
      text: "¿Está seguro que desea eliminar este Vehiculo?",
      type: "question",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
    }).then((result) => {
      if (result.value) {
        $.post(
          "../bussiness/AutomovilAction.php",
          {
            accion: "eliminar",
            id: id,
          },
          function (responseText) {alert(responseText);
            if (responseText == true) {
              Swal.fire({
                position: "top",
                type: "success",
                title: "Vehiculo eliminado correctamente",
                showConfirmButton: false,
                timer: 3000,
              });
              //Leer();
            } else {
              Swal.fire({
                position: "top",
                type: "error",
                title: "Vehiculo no eliminado",
                showConfirmButton: false,
                timer: 3000,
              });
             // Leer();
            }
          }
        );
      }
    });
  }
  
  function Leer() {
    var body = document.getElementById("datos");
    body.innerHTML = "";
  
    $.post(
      "../bussiness/AutomovilAction.php",
      {
        accion: "leer",
      },
      function (responseText) {
        var htmltags = "";
        var obj = JSON.parse(responseText);
  
        for (i = 0; i < obj.length; i++) {
          htmltags +=
            "<tr>" +
            "<td>" +
            obj[i].marca +
            "</td>" +
            "<td>" +
            obj[i].modelo +
            "</td>" +
            "<td>" +
            obj[i].color +
            "</td>" +
            "<td><button class='btn btn-warning'  name=modificar onclick=\"Enviar('" +
            obj[i].idalimento +
            "','" +
            obj[i].nombre +
            "','" +
            obj[i].cantidad +
            "','" +
            obj[i].fechavencimiento +
            "')\"><span class='fa fa-edit'></span></button></td>" +
            "<td><button class='btn btn-danger' onclick=Eliminar(" +
            obj[i].idalimento +
            ") name=eliminar id=elimminar><span class='fa fa-trash'></span></button></td>" +
            "</tr>";
        }
  
        $("#datos").append(htmltags);
      }
    );
  
    Limpiar();
  }
  
  function Enviar(id, color, stock, precio, detalles) {
    $("#modal1").css("display", "block");
    $("#M_id").val(id);
    $("#M_color").val(color);
    $("#M_stock").val(stock);
    $("#M_precio").val(precio);
    $("#M_detalles").val(detalles);
  }
  
  function cerrarModal() {
    $("#modal1").css("display", "none");
    $("#M_id").val("");
    $("#M_nombre").val("");
    $("#M_cantidad").val("");
    $("#M_fecha").val("");
  }
  
  function Limpiar() {
    $("#modelo").val("");
    $("#estilo").val("");
    $("#capacidad").val("");
    $("#anio").val("");
    $("#precio").val("");
    $("#detalles").val("");
  }