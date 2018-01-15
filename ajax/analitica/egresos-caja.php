<?php 

include'../../autoload.php';
include'../../session.php';

$mes  = $_GET['mes'];

?>

<?php if (count(Analitica::egresos_caja($mes))>0): ?>
<script>
$(document).ready(function() {
$('#consulta').DataTable( {
"ordering": false,
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
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">EGRESOS DE CAJA</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="consulta" class="table table-condensed">
<thead>
<tr class="info">
<th>IT</th>
<th>NÚMERO</th>
<th>PERSONAL</th>
<th>CONCEPTO</th>
<th>FECHA REGISTRO</th>
<th>DOCUMENTO</th>
<th class="text-center">MONTO</th>

</tr>
</thead>
<tbody>
<?php 
$count= 0;
$item = 1;  
foreach (Analitica::egresos_caja($mes) as $key => $value): ?>

<tr>
<td><?php echo $item++;?></td>
<td><?php echo $value['numero'] ?></td>
<td><?php echo $value['personal'] ?></td>
<td><?php echo $value['concepto'] ?></td>
<td><?php echo date_format(date_create($value['fecha_registro']),'d/m/Y')?></td>
<td><?php echo $value['documento'] ?></td>
<td class="text-center"><?php echo round($value['monto'],2) ?></td>

<?php $count = $count + $value['monto'];
?>
</tr>

<?php endforeach ?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td>TOTAL:</td>
<td class="text-center"><?php echo $count; ?></td>
</tr>

</tbody>

</table>
</div>
</div>
</div>

<?php else: ?>
<p class="alert alert-warning">No Hay Registros Disponibles para este Mes.</p>
<?php endif ?>