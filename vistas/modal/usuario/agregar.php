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

<div class="form-group">
<label>NOMBRES</label>
<input type="text" name="nombres"  required="" class="form-control" onchange="Mayusculas(this)" >
</div>

<div class="form-group">
<label>APELLIDOS</label>
<input type="text" name="apellidos"  required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>DNI</label>
<input type="text" name="dni"  required="" class="form-control" maxlength="8">
</div>

<div class="form-group">
<label>USUARIO</label>
<input type="text" name="user"  required="" class="form-control">
</div>

<div class="form-group">
<label>CONTRASEÑA</label>
<input type="password" name="pass"  required="" class="form-control">
</div>


<div class="form-group">
<label>TIPO</label>
<select name="tipo"  class="form-control">
  <option value="user">USER</option>
  <option value="admin">ADMIN</option>
</select>
</div>

<button type="submit" class="btn btn-primary">Agregar Socio</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->