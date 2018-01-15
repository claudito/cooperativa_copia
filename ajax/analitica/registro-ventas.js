
function loadTabla(mes){
    var parametros = {"mes":mes};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'../../ajax/analitica/registro-ventas.php',
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
var mes = $('#idmes').val();
$("#loader").fadeIn('slow');
$.ajax({
  url:'../../ajax/analitica/registro-ventas.php',
  data:{"mes":mes},
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
