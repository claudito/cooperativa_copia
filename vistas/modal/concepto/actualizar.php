<?php 
include'../../../autoload.php';

$id        =  $_GET['id'];
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>"> 

<div class="form-group">
<label>Descripción</label>
<input type="text" name="descripcion"  required class="form-control" onchange="Mayusculas(this)" value="<?php echo Concepto::consulta($id,'descripcion'); ?>">
</div>



<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>Porcentaje</label>
<input type="number" step="any" name="porcentaje"  class="form-control" required value="<?php echo round(Concepto::consulta($id,'porcentaje'),2); ?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Costo</label>
<input type="number" step="any" name="costo"  class="form-control" required
value="<?php echo round(Concepto::consulta($id,'costo'),2); ?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Tipo</label>
<select name="tipo"  required class="form-control">
<option value="<?php echo  Concepto::consulta($id,'tipo'); ?>"><?php echo strtoupper(Concepto::consulta($id,'tipo')); ?></option>
<?php 
$tipo = array('diario','variable','mensual','unico');
?>
<?php foreach ($tipo as $key => $value): ?>
<?php if ($value!==Concepto::consulta($id,'tipo')): ?>
<option value="<?php echo $value; ?>"><?php echo strtoupper($value); ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
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
          url: "../controlador/concepto/actualizar.php",
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