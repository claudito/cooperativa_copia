var objeto =  "compra_det";

function loadTabla(id){
    var parametros = {"action":"ajax","id":id};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vistas/modal/'+objeto+'/listar.php',
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



$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
var  id        = $('#id').val();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/agregar.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  $("#agregar")[0].reset();  //resetear inputs
  $('#modal-agregar').modal('hide');  // ocultar modal
  loadTabla(id);
  }
});
event.preventDefault();
});


$( "#sms" ).submit(function( event ) {
var parametros = $(this).serialize();
$.ajax({
  type: "POST",
  url:'../controlador/'+objeto+'/sms.php',
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  //$('#agregar').modal('hide'); // ocultar  formulario
  $("#sms")[0].reset();  //resetear inputs
  }
});
event.preventDefault();
});




$('#modal-eliminar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var idcita = button.data('idcita')
      var modal = $(this)
      modal.find('#id').val(id)
      modal.find('#idcita').val(idcita)
    })



$( "#eliminar" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var idcita     = $('#idcita').val();
       $.ajax({
          type: "POST",
          url:'../controlador/'+objeto+'/eliminar.php',
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
          $('#modal-eliminar').modal('hide');
          loadTabla(idcita);
          }
      });
      event.preventDefault();
    });