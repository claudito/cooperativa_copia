  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<div class="row">
<div class="col-md-2">
<div class="form-group">
<label>N° DE PUESTO</label>
<input type="number" min="1" name="codigo" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div> 
</div>
<div class="col-md-4">
<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id="" required="" class="form-control" onchange="Mayusculas(this)">
</div> 
</div>
<div class="col-md-3">
<div class="form-group">
<label>ESTADO</label>
<select name="estado" class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php $estado = array('libre','socio','cooperativa'); ?>
<?php foreach ($estado as $key => $value): ?>
<option value="<?php echo $value; ?>"><?php echo strtoupper($value); ?></option>
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-3">
<div class="form-group">
<label>TIPO</label>
<select name="tipo" class="form-control" required>
<option value="">[Seleccionar]</option>
<?php $tipo = array('exterior','interior','puesto'); ?>
<?php foreach ($tipo as $key => $value): ?>
<option value="<?php echo $value; ?>"><?php echo strtoupper($value); ?></option>
<?php endforeach ?>
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