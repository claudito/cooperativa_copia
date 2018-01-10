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
<label>RAZON SOCIAL</label>
<input type="text" name="razon_social" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
<label>DIRECCION</label>
<input type="text" name="direccion" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
<label>RUC</label>
<input type="text" name="ruc" id="" maxlength="11" required="" class="form-control" onchange="Mayusculas(this)">
</div>
  </div>
  <div class="col-md-6">
    
    <div class="form-group">
      <label for="">TIPO DE DOCUMENTO</label>
      <select name="tipo_documento" id="" class="form-control" required="">
        <option value="">--SELECCIONAR--</option>
        <option value="0">OTROS TIPOS DE DOCUMENTO</option>
        <option value="1">DOCUMENTO NACIONAL DE IDNTIDAD (DNI)</option>
        <option value="4">CARNET DE EXTRANJERIA</option>
        <option value="6">REGISTRO UNICO DE CONTRIBUYENTE</option>
        <option value="7">PASAPORTE</option>
      </select>
    </div>
  </div>
</div>





<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->