<?php 

include'../../../autoload.php';
include'../../../session.php';

$id = $_GET['id'];

 ?>

<form  id="actualizar">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
<input type="hidden"  id="puesto"    value="<?php echo Pago::consulta($id,'codigo_puesto'); ?>" >
<input type="hidden"  id="concepto"  value="<?php echo Pago::consulta($id,'id_concepto'); ?>" >
<input type="hidden"  id="fecha"     value="<?php echo Pago::consulta($id,'fecha'); ?>" >

<div class="form-group">
<label>COSTO</label>
<input type="number" step="any"  name="costo" id="" class="form-control" readonly=""  
value="<?php echo round(Pago::consulta($id,'costo'),2); ?>" 
>
</div>

<div class="form-group">
<label>PAGO</label>
<input type="number" step="any" name="pago" id="" class="form-control" required=""
value="<?php echo round(Pago::consulta($id,'costo'),2); ?>" >
</div>


<button class="btn btn-primary">PAGAR</button>


</form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
	var puesto   = $('#puesto').val();
	var concepto = $('#concepto').val();
	var fecha    = $('#fecha').val();
     $.ajax({
          type: "POST",
          url: "../controlador/pago/actualizar.php",
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
          loadTabla(puesto,concepto,fecha);
          }
      });
  });
</script>