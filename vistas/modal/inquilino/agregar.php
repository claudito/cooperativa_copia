  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="POST" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NOMBRE</label>
<input type="text" name="nombres" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>APELLIDO</label>
<input type="text" name="apellidos" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id="" required="" class="form-control" maxlength="8">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id="" required="" class="form-control" maxlength="9">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion_1" id="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion_2" id="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="email" name="correo" id="" required="" class="form-control">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>ÁREA</label>
<select name="area" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$menu =  new Area();
foreach ($menu->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>

<button type="submit" class="btn btn-primary">Agregar Inquilino</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->