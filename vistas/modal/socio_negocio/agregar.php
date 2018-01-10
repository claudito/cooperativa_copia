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
<label>CODIGO</label>
<input type="text" name="codigo" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>RUC</label>
<input type="number" name="ruc" id="" required="" class="form-control">
</div>

<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>


<div class="form-group">
<label>CONTACTO</label>
<input type="text" name="contacto" id="" required="" class="form-control" onchange="Mayusculas(this)"></div>

<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion1" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion2" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>TELEFONO 1</label>
<input type="number" name="telefono1" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>TELEFONO 2</label>
<input type="number" name="telefono2" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>CUENTA BANCARIA</label>
<input type="text" name="cuenta_bancaria" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>


<div class="form-group">
<label>TIPO</label>
<select name="tipo" id="" class="form-control">
<option value="C">CLIENTE</option>
<option value="P">PROVEEDOR</option> 
</select>
</div>


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->