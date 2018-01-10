<form id="agregar" autocomplete="off" >
  
<div class="modal fade" id="modal-agregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="correlativo">Agregar Registro</h4>
      </div>
      <div class="modal-body">

      <div class="row">
      <div class="col-md-6">
      <label>PERSONAL</label>
      <select name="personal"  class="form-control" required>
      <option value="">[Seleccionar]</option>
      <?php foreach (Personal::lista() as $key => $value): ?>
      <option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'].' '.$value['apellidos'] ?></option>
      <?php endforeach ?>
      </select>

      </div>
      <div class="col-md-6">
      <label>FECHA</label>
      <input type="date" name="fecha"  class="form-control" required 
       value="<?php echo date('Y-m-d'); ?>">
      </div>      
      </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
      </div>
    </div>
  </div>
</div>



</form>