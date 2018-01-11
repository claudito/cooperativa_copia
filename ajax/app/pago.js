
var carpeta =  "pago";

function loadTabla(puesto='',concepto='',fecha=''){
    var parametros = {"puesto":puesto,"concepto":concepto,"fecha":fecha};
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
var puesto   = $('#id_puesto').val();
var concepto = $('#id_concepto').val();
var fecha    = $('#id_fecha').val();
$.ajax({
  type: "POST",
  url: "../controlador/"+carpeta+"/agregar.php",
  data: parametros,
   beforeSend: function(objeto){
    $("#mensaje").html("Mensaje: Cargando...");
    },
  success: function(datos){
  $("#mensaje").html(datos);//mostrar mensaje 
  loadTabla(puesto,concepto,fecha);
  }
});
event.preventDefault();
});





$(document).ready(function() {
// Parametros para el combo
$("#id_puesto").change(function () {
$("#id_puesto option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/concepto_pago_pago.php", { elegido: elegido }, function(data){
$("#id_concepto_pago").html(data);
});     
});
});    
});