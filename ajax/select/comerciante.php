<?php 
include'../../autoload.php';
include'../../session.php';

$tipo  =  $_POST['elegido'];
 ?>

<div class="col-md-4">
<?php if ($tipo=='S'): ?>
<div class="form-group">
<label>SOCIO</label>
<select name="comerciante" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$socio  =  new Socio();
foreach ($socio->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'].' '.$value['apellidos'] ?></option>	
<?php endforeach ?>
</select>
</div>	
<?php else: ?>
<div class="form-group">
<label>INQUILINO</label>
<select name="comerciante" id="" class="form-control">
<option value="<?php echo $value['id'] ?>">[Seleccionar]</option>
<?php 
$inquilino  =  new Inquilino();
foreach ($inquilino->lista() as $key => $value): ?>
<option value=""><?php echo $value['nombres'].' '.$value['apellidos'] ?></option>	
<?php endforeach ?>
</select>
</div>	
<?php endif ?>

</div>


<div class="col-md-4">
<div class="form-group">
<label>CONCEPTO</label>
<select name="concepto" id="" class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php 
$concepto = new Concepto();
foreach ($concepto->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>
