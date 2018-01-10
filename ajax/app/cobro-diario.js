
var carpeta =  "cobro-diario";

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
  $('#newModal').modal('hide');  // ocultar modal
  loadTabla(1);
  }
});
event.preventDefault();
});

