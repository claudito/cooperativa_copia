  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id=correlativo>Cargando..</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<input type="hidden" name="tipo" id="" class="form-control" value="RC">

<div class="row">
<div class="col-md-6">
<div class="form-group">
  <label>COMPRA</label>
<select name="documento" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$area =  new Compra_cab();
foreach ($area->lista() as $key => $value): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['serie'].'-'.$value['numero'].'-'.$value['fecha_documento']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
  <label>PROVEEDOR</label>
<select name="documento" id="" class="form-control">
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




<button type="submit" class="btn btn-primary">Agregar</button>

</div>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->