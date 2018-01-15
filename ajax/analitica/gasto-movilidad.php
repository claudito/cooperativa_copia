<?php 

include'../../autoload.php';
include'../../session.php';

$mes  = $_GET['mes'];

?>

<?php if (count(Analitica::gasto_movilidad($mes))>0): ?>
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
<h3 class="panel-title">PLANILLA DE MOVILIDAD</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="consulta" class="table table-condensed">
<thead>
<tr class="info">
<th>N°</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>COSTO</th>
<th>APERTURA DE PLANILLA</th>

</tr>
</thead>
<tbody>
<?php foreach (Analitica::gasto_movilidad($mes) as $key => $value): ?>
<tr>
<td><?php echo $value['numero'];?></td>
<td><?php echo $value['nombres'] ?></td>
<td><?php echo $value['apellidos'] ?></td>
<td><?php echo round($value['costo'],2) ?></td>
<td><?php echo date_format(date_create($value['fecha_emision']),'d/m/Y');?></td>

</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>

<?php else: ?>
<p class="alert alert-warning">No Hay Registros Disponibles para este Mes.</p>
<?php endif ?>