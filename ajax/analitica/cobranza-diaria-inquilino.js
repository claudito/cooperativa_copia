
function loadTabla(fecha){
    var parametros = {"fecha":fecha};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../../ajax/analitica/cobranza-diaria-inquilino.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='../../assets/img/loader.gif'>");
      },
      success:function(data){
        $("#tabla").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }


$("#consultar" ).submit(function( event ) {
var fecha = $('#idfecha').val();
$("#loader").fadeIn('slow');
$.ajax({
  url:'../../ajax/analitica/cobranza-diaria-inquilino.php',
  data:{"fecha":fecha},
   beforeSend: function(objeto){
  $("#loader").html("<img src='../../assets/img/loader.gif'>");
  },
  success:function(data){
 $("#tabla").html(data).fadeIn('slow');
 $("#loader").html("");
  }
})

event.preventDefault();
});
