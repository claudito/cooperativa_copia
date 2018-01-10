<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto  =  new Detalle_concepto();


 ?>
 <?php if (count($objeto->lista())>0): ?>
 <div class="panel panel-info">
 		<div class="panel-heading">
 			<h3 class="panel-title">DETALLE CONCEPTO DE PAGOS</h3>
 		</div>
 		<div class="panel-body">
 			<div class="table-responsive">
 				<table class="table table-bordered table-condensed">
 					<thead>
 						<tr>
 							<th>TIPO</th>
 							<th>COMERCIANTE</th>
 							<th>CONCEPTO</th>
 							
 							<th class="text-center">ACCIONES</th>
 						</tr>
 					</thead>
 					<tbody>
 						<?php foreach ($objeto->lista() as $key => $value): ?>
 						<tr>
 						<td><?php echo $value['tipo']; ?></td>
 						<td><?php echo $value['comerciante']; ?></td>
 						<td><?php echo $value['concepto']; ?></td>
 						
 						<td class="text-center"></td>
 						</tr>
 						<?php endforeach ?>
 					</tbody>
 				</table>
 			</div>
 		</div>
 	</div>	
 <?php else: ?>
 <div class="panel panel-info">
 		<div class="panel-heading">
 			<h3 class="panel-title">DETALLE CONCEPTO DE PAGOS</h3>
 		</div>
 		<div class="panel-body">
 		<p class="alert alert-warning">No hay Registros Disponibles.</p>
 		</div>
 	</div>	
 <?php endif ?>