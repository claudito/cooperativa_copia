  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">TIPO DE CAMBIO</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha"  required="" class="form-control"  onchange="Mayusculas(this)">
</div>  
</div>
<div class="col-md-4">
<div class="form-group">
<label>COMPRA</label>
<input type="number"  step="any" name="compra"  required="" class="form-control"  onchange="Mayusculas(this)">
</div>

</div>
<div class="col-md-4">
<div class="form-group">
<label>VENTA</label>
<input type="number"  step="any" name="venta"  required="" class="form-control"  onchange="Mayusculas(this)">
</div>
</div>
</div>




<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->