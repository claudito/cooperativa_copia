<?php 

include'../../autoload.php';
include'../../session.php';

$mes  = $_GET['mes'];
?>


<!-- Conceptos -->
<?php if (count(Analitica::total_conceptos_mensual($mes))>0): ?>
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title">CONCEPTOS</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr>
<th>CONCEPTO</th>
<th class="text-center">COSTO</th>
<th class="text-center">PAGO</th>
<th class="text-center">MES</th>
</tr>
</thead>
<tbody>
<?php 
$costo_concepto = 0;
$pago  = 0;

foreach (Analitica::total_conceptos_mensual($mes) as $key => $value): ?>
<tr>
<td><?php echo $value['concepto']; ?></td>
<td class="text-center"><?php echo round($value['costo'],2); ?></td>
<td class="text-center"><?php echo round($value['pago'],2); ?></td>
<td class="text-center"><?php echo date_format(date_create($value['fecha']),'m-Y'); ?></td>
<?php 
$costo = $costo+$value['costo'];
$pago = $pago+$value['pago'];
?>
</tr>
<?php endforeach ?>
<tr>
<td class="text-right">TOTAL:</td>
<td class="text-center"><?php echo $costo; ?></td>
<td class="text-center"><?php echo $pago; ?></td>
<td class="text-center"></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<?php else: ?>
<p class="alert alert-warning">No hay Conceptos Disponibles para visualizar..</p>
<?php endif ?>


<!-- Egresos de caja -->
<?php if (count(Analitica::total_egresos_caja_mensual($mes))>0): ?>
<div class="panel panel-success">
<div class="panel-heading">
<h3 class="panel-title">EGRESOS DE CAJA</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr>
<th>DESCRIPCIÓN</th>
<th class="text-center">MONTO</th>
<th class="text-center">MES</th>
</tr>
</thead>
<tbody>
<?php 
$monto = 0;
foreach (Analitica::total_egresos_caja_mensual($mes) as $key => $value): ?>
<tr>
<td ><?php echo $value['descripcion']; ?></td>
<td class="text-center"><?php echo round($value['monto'],2); ?></td>
<td class="text-center"><?php echo date_format(date_create($value['fecha_registro']),'m-Y'); ?></td>
</tr>
<?php 
$monto = $monto+$value['monto'];
 ?>
<?php endforeach ?>
<tr>
<td class="text-right">TOTAL</td>
<td class="text-center"><?php echo $monto; ?></td>
<td></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<?php else: ?>
<p class="alert alert-warning">No hay Egresos  Disponibles para visualizar.</p>
<?php endif ?>



<?php if (count(Analitica::total_conceptos_mensual($mes))>0 AND  count(Analitica::total_egresos_caja_mensual($mes))>0): ?>
<div class="well well-sm">SALDO FINAL: 
CONCEPTOS - EGRESOS DE CAJA =
<strong><?php echo $costo-$monto;  ?></strong> soles
</div>
<?php endif ?>