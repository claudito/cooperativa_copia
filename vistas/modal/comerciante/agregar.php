<form id="agregar" autocomplete="off">

<div class="modal fade" id="modal-agregar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Agregar</h4>
</div>
<div class="modal-body">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres" class="form-control" onchange="Mayusculas(this)" required="">
</div>  
</div>
<div class="col-md-6">
<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos"  class="form-control" onchange="Mayusculas(this)" required="">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni"   class="form-control" maxlength="8" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc"   class="form-control" maxlength="11" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social"   class="form-control" maxlength="200" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN</label>
<input type="text" name="direccion"   class="form-control" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono"   class="form-control" maxlength="7" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular"   class="form-control" maxlength="9" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo"  class="form-control">
</div>
</div>
</div>

<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>ÁREA</label>
<select name="area"  class="form-control" >
<option value="">[Seleccionar]</option>
<?php foreach (Area::lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>FECHA DE INGRESO</label>
<input type="date" name="fecha_ingreso"  required="" class="form-control" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>TIPO</label>
<select name="tipo"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<option value="socio">SOCIO</option>
<option value="inquilino">INQUILINO</option>
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