<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
  
<div class="row">
<div class="col-md-4">
<div class="form-group">
<label >FECHA</label>
<input type="date"  name="fecha" class="form-control" onchange="Mayusculas(this)" value="<?php echo Tipo_cambio::consulta($id,'fecha'); ?>" >
</div>
 
</div>
<div class="col-md-4">
<div class="form-group">
<label >COMPRA</label>
<input type="number"  step="any" name="compra"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Tipo_cambio::consulta($id,'compra') ; ?>" >
</div>
  
</div>
<div class="col-md-4">
<div class="form-group">
<label >VENTA</label>
<input type="number"  step="any" name="venta"  class="form-control" onchange="Mayusculas(this)" value="<?php echo Tipo_cambio::consulta($id,'venta') ; ?>" >
</div>
  
</div>
</div>



<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/tipo_cambio/actualizar.php",
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