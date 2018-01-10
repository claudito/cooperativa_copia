<form id="agregar">

<div class="modal fade" id="newModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id=correlativo>Cargando..</h4>
</div>
<div class="modal-body">

<input type="hidden" name="id_personal" id="" value="<?php echo $_SESSION[KEY.ID] ?>">
<input type="hidden" name="tipo" id="" class="form-control" value="EC">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>MONTO</label>
<input type="number" step="any" name="monto" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label>DOCUMENTOS INTERNOS</label>
<select name="documento" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$area =  new Documento_interno();
foreach ($area->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="form-group">
<label>CONCEPTO</label>
<textarea name="concepto" id="" class="form-control" rows="3" required="" onchange="Mayusculas(this)"></textarea>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>RESPONSABLE</label>
<select name="personal" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$personal =  new Usuarios();
foreach ($personal->lista() as $key => $value): ?>
<?php if ($value['tipo']=='admin'): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['nombres']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha_registro" id="" class="form-control" required="">
</div>
</div>
</div>










</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="button" class="btn btn-primary">Agregar</button>
</div>
</div>
</div>
</div>

</form>