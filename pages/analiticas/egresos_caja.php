<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Egresos de Cajas');
Assets::datatables();
Assets::datatables_export();
Assets::sweetalert();
Html::header();
?>

<script>
$(document).ready(function() {
	$('#consulta').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			/*'copyHtml5',*/
			'excelHtml5',
			/*'csvHtml5',*/
			'pdfHtml5'
		]
	} );
} );
</script>

<div class="row">
<div class="col-md-12">
<?php include'../../vistas/nav.php'; ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<?php if (count(Egresos::lista())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">Egresos de Cajas</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="consulta" class="table table-condensed">
<thead>
<tr class="info">
<th>N°</th>
<th>MONTO</th>
<th>PERSONAL</th>
<th>NUMERO</th>
<th>CONCEPTO</th>
<th>FECHA REGISTRO</th>
<th>DOCUMENTO</th>
   
</tr>
</thead>
<tbody>
<?php 
$item = 1;  
foreach (Egresos::lista() as $key => $value): ?>

<tr>
<td><?php echo $item++;?></td>
<td><?php echo $value['monto'] ?></td>
<td><?php echo $value['personal'] ?></td>
<td><?php echo $value['numero'] ?></td>
<td><?php echo $value['concepto'] ?></td>
<td><?php echo $value['fecha_registro'] ?></td>
<td><?php echo $value['documento'] ?></td>

</tr>

<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>
	
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>	
<?php endif ?>


</div>
</div>

<?php 

Html::footer('Cooperativa');

 ?>