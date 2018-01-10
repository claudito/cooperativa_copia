<?php 

include'../../autoload.php';
include'../../session.php';

$concepto =   $_POST['elegido'];

 ?>


<div class="col-md-2">
<div class="form-group">
<?php if (Concepto::consulta($concepto,'tipo')=='diario'): ?>
<label>MES</label>
<input type="month" name="fecha"  class="form-control" required="" 
value="<?php echo date('Y-m'); ?>" 
>	
<?php else: ?>
<label>FECHA</label>
<input type="date" name="fecha"  class="form-control" required="" 
value="<?php echo date('Y-m-d'); ?>" 
>	
<?php endif ?>



</div>
</div>
<div class="col-md-2">
<div style="padding-bottom: 24px"></div>
<button class="btn btn-success"><i class="fa fa-plus"></i> CREAR</button>
</div>