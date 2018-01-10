<form role="form" method="post" id="agregar" autocomplete="off">

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
 <div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" >Concepto de Pago</h4>
</div>
<div class="modal-body">


<div class="form-group">
<label>Descripción</label>
<input type="text" name="descripcion" id="" required class="form-control" onchange="Mayusculas(this)">
</div>



<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>Porcentaje</label>
<input type="number" step="any" name="porcentaje" id="" class="form-control" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Costo</label>
<input type="number" step="any" name="costo" id="" class="form-control" required>
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>Tipo</label>
<select name="tipo" id="" required class="form-control">
<option value="">[Seleccionar]</option>
<option value="diario">DIARIO</option>
<option value="variable">VARIABLE</option>
<option value="mensual">MENSUAL</option>
<option value="unico">UNICO</option>
</select>
</div>
</div>

</div>




<button type="submit" class="btn btn-primary">Agregar</button>

</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</form>