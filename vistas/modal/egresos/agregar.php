<form id="agregar">

<div class="modal fade" id="newModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title" id=correlativo>Cargando..</h4>
</div>
<div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">
<input type="hidden" name="id_personal"  value="<?php echo $_SESSION[KEY.ID] ?>">
<input type="hidden" name="tipo"  class="form-control" value="EC">


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>MONTO</label>
<input type="number" step="any" name="monto"  required="" class="form-control" onchange="Mayusculas(this)"
placeholder="00.0" 
>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label>DOCUMENTOS INTERNOS</label>
<select name="documento"  class="form-control">
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
<textarea name="concepto"  class="form-control" rows="3" required="" onchange="Mayusculas(this)"></textarea>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>RESPONSABLE</label>
<select name="personal"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php 
$personal = new Personal();
foreach ($personal->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'],' ',$value['apellidos']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha_registro"  class="form-control" required="">
</div>
</div>
</div>










</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Agregar</button>
</form>
</div>
</div>
</div>
</div>

</form>