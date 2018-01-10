<form role="form" method="post" id="agregar" autocomplete="off">
<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title">REGISTRO DE VENTAS</h4>
</div>
<div class="modal-body">


<div class="form-group">
<label>TIPO DOCUMENTO</label>
<select name="tipo_documento" id="" class="form-control" required="">
<option value="01">FACTURA</option>
<option value="03">BOLETA</option> 
</select>
</div>

<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha_documento" id="" required="" class="form-control"
value="<?php echo date('Y-m-d'); ?>" >
</div>


<div class="form-group">
<label>CLIENTE</label>
<select name="cliente" required="" id="id" class="form-control" required="">
<option value="">[ Seleccionar ]</option>
<?php 
$tratamiento = new Socio_negocio();
foreach ($tratamiento->lista() as $key => $value): ?>
<?php if ($value['tipo']=='C'): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['ruc'].' - '.$value['razon_social']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>



<button type="submit" class="btn btn-primary">Agregar</button>

</div>

</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</form>