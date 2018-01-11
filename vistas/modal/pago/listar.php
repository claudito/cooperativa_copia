<?php 

include'../../../autoload.php';
include'../../../session.php';

$puesto    = $_GET['puesto'];
$concepto  = $_GET['concepto'];
$costo     = Concepto::consulta($concepto,'costo');
$pago      = 0.00;
$fecha     = $_GET['fecha'];
$year      = substr($fecha,0,4);
$month     = substr($fecha,5,2);
$day       = substr($fecha,8,10);
$tipo      = Concepto::consulta($concepto,'tipo');

 ?>

<?php if (count(Pago::lista($puesto,$concepto,$year,$month,$day,$tipo))>0): ?>
<div class="panel panel-default">
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr class="success">
<th class="text-center">COSTO</th>
<th class="text-center">PAGO</th>
<th class="text-center">FECHA DE PAGO</th>
<th class="text-center">FECHA DE VENCIMIENTO</th>
<th class="text-center">FECHA ACTUALIZACIÓN</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php foreach (Pago::lista($puesto,$concepto,$year,$month,$day,$tipo) as $key => $value): ?>
<tr>
<td class="text-center"><?php echo round($value['costo'],2) ?></td>
<td class="text-center"><?php echo round($value['pago'],2) ?></td>
<td class="text-center"><?php echo date_format(date_create($value['fecha_pago']),'d/m/Y') ?></td>
<td class="text-center"><?php echo date_format(date_create($value['fecha_vencimiento']),'d/m/Y') ?></td>
<td class="text-center"><?php echo ($value['fecha_actualizacion']=='0000-00-00 00:00:00') ? '-' : date_format(date_create($value['fecha_actualizacion']),'d/m/Y H:i:s') ; ?></td>
<td><button class="btn btn-primary btn-sm btn-edit" 
	data-id="<?php echo $value['id']; ?>">PAGAR</button></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>

<!-- Script Modal Actualizar -->
   <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vistas/modal/pago/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#modal-actualizar').modal('show');
  	});
  </script>
  
  <!-- Inicio Modal Actualizar -->
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title"><i class="fa fa-book"></i> PAGAR CONCEPTO</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div>
    </div>
  </div>
<!-- Fin  Modal Actualizar -->


<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>