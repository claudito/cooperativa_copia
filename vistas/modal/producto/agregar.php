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
<label>CUENTA</label>
<input type="number" name="cuenta" id="" required="" class="form-control">
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id="" required="" class="form-control" 
 onchange="Mayusculas(this)">
</div>

 <div class="form-group">
<label>FAMILIA</label>
<select name="familia" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$area =  new Familia();
foreach ($area->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>
 <div class="form-group">
<label>UNIDAD DE MEDIDA</label>
<select name="unidad" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$area =  new  Unidad();
foreach ($area->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>






<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->