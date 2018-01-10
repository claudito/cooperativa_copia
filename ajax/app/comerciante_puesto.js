
var carpeta =  "comerciante_puesto";

function loadTabla(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vistas/modal/'+carpeta+'/listar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }

function loadModalAgregar(){
    var parametros = {"action":"ajax"};
    $("#loader_agregar").fadeIn('slow');
    $.ajax({
      url:'../vistas/modal/'+carpeta+'/agregar.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader_agregar").html("cargando...");
      },
      success:function(data){
        $("#tabla_agregar").html(data).fadeIn('slow');
        $("#loader_agregar").html("");
      }
    })
  }




$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url: "../controlador/"+carpeta+"/agregar.php",
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  $("#agregar")[0].reset();  //resetear inputs
  $('#modal-agregar').modal('hide');  // ocultar modal
  loadTabla();
  }
});
event.preventDefault();
});




$('#modal-eliminar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
    })



$( "#eliminar" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "../controlador/"+carpeta+"/eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-eliminar').modal('hide');
          loadTabla();
          }
      });
      event.preventDefault();
    });