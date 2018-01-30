
<form id="agregar" autocomplete="off">

<div class="modal fade" id="modal-agregar">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Asociar Concepto y Puesto</h4>
</div>
<div class="modal-body">

<div class="row">

<div class="col-md-6">
<div class="form-group">
<label>PUESTO -  COMERCIANTE</label>
<select name="puesto"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php foreach (Comerciante_puesto::lista() as $key => $value): ?>
<option value="<?php echo $value['idpuesto'] ?>"><?php echo "N° ".$value['puesto'].' - '.$value['nombres'].' '.$value['apellidos'].' - '.$value['estado'].' - '.$value['tipo']; ?></option>	
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>CONCEPTO</label>
<select name="concepto"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php foreach (Concepto::lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option> 
<?php endforeach ?>
</select>
</div>
</div>

</div>



</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Agregar</button>
</div>
</div>
</div>
</div>





</form>

