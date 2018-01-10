  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">


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
<input type="text" name="apellidos" id="" class="form-control" onchange="Mayusculas(this)" required="">
</div>
</div>
</div>


<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id="" required="" class="form-control" maxlength="8" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc" id="" required="" class="form-control" maxlength="11" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" id="" required="" class="form-control" maxlength="200" onchange="Mayusculas(this)">
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN</label>
<input type="text" name="direccion" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id="" required="" class="form-control" maxlength="7" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CELULAR</label>
<input type="text" name="celular" id="" required="" class="form-control" maxlength="9" onchange="Mayusculas(this)">
</div>
</div>
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
<label>CARGO</label>
<input type="text" name="cargo" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
</div>
</div>



<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->