  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Consultar</h4>
        </div>
        <div class="modal-body">

        <div id="msj_send"></div>

<form role="form" method="post" id="agregar" autocomplete="off">

<div class="form-group">
<div class="input-group">
<select name="anio" id="" class="form-control" required="">
<?php 
$anio  =  new Presupuesto_anual();
foreach ($anio->lista_anio() as $key => $value): ?>
<option value="<?php  echo $value['codigo'] ?>"><?php   echo $value['codigo'] ?></option>
<?php endforeach ?>
</select>
<span class="input-group-btn">
  <button class="btn btn-primary" type="submit"><i class=" fa fa-search"></i></button>
</span>
</div><!-- /input-group -->
</div>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->