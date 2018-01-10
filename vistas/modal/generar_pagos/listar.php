<?php 

include'../../../autoload.php';
include'../../../session.php';

  

$puesto   =  (isset($_SESSION['puesto'])) ? $_SESSION['puesto'] : '' ;
$concepto =  (isset($_SESSION['concepto'])) ? $_SESSION['concepto'] : '' ;
$month    =  (isset($_SESSION['month'])) ? $_SESSION['month'] : '' ;
$year     =  (isset($_SESSION['year'])) ? $_SESSION['year'] : '' ;
$day      =  (isset($_SESSION['day'])) ? $_SESSION['day'] : '' ;
$tipo     =  (isset($_SESSION['tipo'])) ? $_SESSION['tipo'] : '' ;



 ?>

 <?php if (count(Pago::lista($puesto,$concepto,$year,$month,$day,$tipo))>0): ?>
 <div class="panel panel-default">
 <div class="table-responsive">
 	<table class="table table-condensed">
 		<thead>
 			<tr class="info">
 				<th>PUESTO</th>
 				<th>CONCEPTO</th>
 				<th>COSTO</th>
 				<th>FECHA DE PAGO</th>
 				<th>FECHA DE VENCIMIENTO</th>
 				<th>TIPO</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach (Pago::lista($puesto,$concepto,$year,$month,$day,$tipo) as $key => $value): ?>
		<tr>
		<td><?php echo "N° ".$value['codigo_puesto'] ?></td>
		<td><?php echo $value['concepto'] ?></td>
		<td><?php echo round($value['costo'],2) ?></td>
		<td><?php echo date_format(date_create($value['fecha_pago']),'d/m/Y') ?></td>
		<td><?php echo date_format(date_create($value['fecha_vencimiento']),'d/m/Y') ?></td>
		<td><?php echo strtoupper($value['tipo']); ?></td>
		</tr>
 		<?php endforeach ?>
 		</tbody>
 	</table>
 </div>
 </div>
 <?php else: ?>
 <p class="alert alert-warning">No hay registros disponibles.</p>
 <?php endif ?>