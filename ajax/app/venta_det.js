
var carpeta =  "venta_det";

function loadTabla(id){
    var parametros = {"action":"ajax","id":id};
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

function loadCab(id){
    var parametros = {"action":"ajax","id":id};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../vistas/modal/'+carpeta+'/cabecera.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loaderCab").html("<img src='../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tablaCab").html(data).fadeIn('slow');
        $("#loaderCab").html("");
      }
    })
  }


$( "#agregar" ).submit(function( event ) {
var parametros = $(this).serialize();
var numero     = $('#numero').val();
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
  loadTabla(numero);

  }
});
event.preventDefault();
});




$('#modal-eliminar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var nombres = button.data('nombres')
      var modal = $(this)
      modal.find('#id').val(id)
      modal.find('#nombres').val(nombres)
    })



$( "#eliminar" ).submit(function( event ) {
    var parametros = $(this).serialize();
    var numero     = $('#numero').val();
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
          loadTabla(numero);
          }
      });
      event.preventDefault();
    });