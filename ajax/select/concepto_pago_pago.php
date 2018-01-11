<?php 

include'../../autoload.php';
include'../../session.php';
$puesto = $_POST['elegido'];

 ?>

<script>
$(document).ready(function() {
// Parametros para el combo
$("#id_concepto").change(function () {
$("#id_concepto option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/concepto_fecha_pago.php", { elegido: elegido }, function(data){
$("#id_concepto_fecha").html(data);
});     
});
});    
});
</script>


<?php if (count(Concepto_puesto::concepto($puesto))>0): ?>
<div class="col-md-4">
<div class="form-group">
<label>CONCEPTO</label>
<select name="concepto"  id="id_concepto"  class="form-control" required>
<option value="">[Seleccionar]</option>
<?php foreach (Concepto_puesto::concepto($puesto) as $key => $value): ?>
<option value="<?php echo $value['id']; ?>"><?php echo strtoupper($value['tipo']).' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>


<div id="id_concepto_fecha"></div>


<?php else: ?>
<p class="alert alert-warning">No hay registros asociados.</p>
<?php endif ?>