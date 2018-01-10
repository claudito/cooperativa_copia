<form id="agregar" autocomplete="off">
<div class="modal fade" id="modal-agregar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Agregar Comunicado</h4>
      </div>
      <div class="modal-body">
    
    <div class="row">
    <div class="col-md-8">
    <div class="form-group">
    <label>ASUNTO</label>
    <input type="text" name="asunto"  class="form-control" required placeholder="Ingrese el  Asunto del documento" autofocus  onchange="Mayusculas(this)">
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
    <label>FECHA</label>
    <input type="date" name="fecha"  value="<?php echo date('Y-m-d'); ?>" class="form-control" required>
    </div>  
    </div>
    </div>

    <div class="form-group">
    <label>CONTENIDO</label>
    <textarea name="contenido"  rows="8" class="form-control" required placeholder="Agrege el contenido del Comunicado" onchange="Mayusculas(this)"></textarea>
    </div>


        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
    </div>
  </div>
</div>
</form>