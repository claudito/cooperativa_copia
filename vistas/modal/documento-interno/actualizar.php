<?php 
include'../../../autoload.php';

$id      =  $_GET['id'];
$carpeta = "documento-interno";

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="input-group">
<input type="text" name="descripcion"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Documento_interno::consulta($id,'descripcion'); ?>" >

<span class="input-group-btn">
<button class="btn btn-primary">Actualizar</button>
</span>
</div><!-- /input-group -->




  


 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#modal-actualizar').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>