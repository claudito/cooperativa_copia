<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Lista de Inquilinos');
Assets::datatables();
Assets::datatables_export();
Assets::sweetalert();
Html::header();
Html::nav('../..'); #barra de navegación
Html::breadcrumbs('ANALÍTICAS','LISTA DE INQUILINOS'); #cinta de ubicación
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
<?php if (count(Comerciante::lista())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">LISTA DE INQUILINOS</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="consulta" class="table table-condensed">
<thead>
<tr class="info">
<th>N°</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>DNI</th>
<th>DIRECCIÓN</th>
<th>CELULAR</th>
<th>ÁREA</th>
<th>FECHA DE INGRESO</th>	   
</tr>
</thead>
<tbody>
<?php 
$item = 1;  
foreach (Comerciante::lista() as $key => $value): ?>
<?php if ($value['tipo']=='inquilino'): ?>
<tr>
<td><?php echo $item++;?></td>
<td><?php echo $value['nombres'] ?></td>
<td><?php echo $value['apellidos'] ?></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
<?php endif ?>
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