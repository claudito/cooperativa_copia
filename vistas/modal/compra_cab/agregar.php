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
            <select name="razon" id="idcompra" class="form-control" required="">
            <option value="">[ Seleccionar ]</option>
            <?php 
            $tratamiento = new Socio_negocio();
            foreach ($tratamiento->lista() as $key => $value): ?>
<?php if ($value['tipo']=='P'): ?>
  <option value="<?php echo $value['codigo'] ?>"><?php echo $value['ruc'].' - '.$value['razon_social'].' - ' .$value['direccion1']; ?></option>
<?php endif ?>

            
            <?php endforeach ?>
            </select>
            </div>

    </div>
    <div class="col-md-6">
  <div class="form-group">
<label>FECHA DOCUMENTO</label>
<input type="date" name="fecha_documento" id="" required="" class="form-control" >
</div>    
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
<label>SERIE</label>
<input type="text" name="serie" id="" required="" maxlength="3" class="form-control" onchange="Mayusculas(this)">
</div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
<label>NUMERO</label>
<input type="text" name="numero" id="" required="" maxlength="6" class="form-control" onchange="Mayusculas(this)">
</div>    
    </div>
  </div>

 






<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->