<form  id="agregar" autocomplete="Off">

<div class="modal fade" id="modal-agregar">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">Agregar Detalle</h4>
</div>


<div class="modal-body">

<input type="hidden" name="id" id="id"  value="<?php echo $id; ?>">

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion"  required="" class="form-control" 
onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad"  required="" class="form-control">
</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>PRECIO UNITARIO</label>
<input type="number"  step="any" name="precio_uni"  required="" class="form-control" >
</div>	
</div>
</div>






</div>

<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
<button type="submit" class="btn btn-primary">Registrar</button>
</div>

</div>
</div>
</div>

</form>