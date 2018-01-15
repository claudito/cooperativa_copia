<?php 

include'../../autoload.php';
include'../../session.php';

$mes  = $_GET['mes'];
$tipo = "inquilino";
?>

<?php if (count(Analitica::saldo_comerciante($mes,$tipo))>0): ?>

<!-- Cabecera -->
<?php foreach (Analitica::puesto_concepto_mes_cab($mes,$tipo) as $key_c => $value_c): ?>

<strong><p><?php echo "Puesto N°: ".$value_c['codigo_puesto'].' - '.$value_c['nombres'].' '.$value_c['apellidos']; ?></p></strong>
<table class="table">
<thead>
<tr>
<th>CONCEPTO</th>
<th class="text-center">TIPO</th>
<th class="text-center">COSTO</th>
<th class="text-center">PAGO</th>
<th class="text-center">SALDO</th>
<th class="text-center">FECHA</th>
</tr>
</thead>
<tbody>
<!-- Detalle -->
<?php 

$costo = 0;
$pago  = 0; 
foreach (Analitica::puesto_concepto_mes_det($mes,$tipo) as $key_d => $value_d): ?>
<!-- Validación de cabecera y detalle -->
<?php if ($value_c['codigo_puesto']==$value_d['codigo_puesto']): ?>
<tr>
<td><?php echo $value_d['descripcion']; ?></td>
<td class="text-center"><?php echo strtoupper($value_d['tipo']); ?></td>
<td class="text-center"><?php echo round($value_d['costo'],2); ?></td>
<td class="text-center"><?php echo round($value_d['pago'],2); ?></td>
<td class="text-center"><?php echo round(($value_d['costo']-$value_d['pago']),2); ?></td>
<td></td>
</tr>
<?php 
$costo  = $costo + $value_d['costo'];
$pago   = $pago  + $value_d['pago'];
 ?>
<?php endif ?>
<?php endforeach ?>
<tr>
<td></td>
<td class="text-right"><strong>TOTAL:</strong></td>
<td class="text-center"><?php echo $costo; ?></td>
<td class="text-center"><?php echo $pago; ?></td>
<td class="text-center"><?php echo round($costo-$pago,2); ?></td>
</tr>
</tbody>
</table>


<?php endforeach ?>






<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles en este mes.</p>
<?php endif ?>