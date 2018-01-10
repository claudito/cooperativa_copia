<!--<?php /*

include'../../../autoload.php';
include'../../../session.php';
$id  = $_GET['id'];
$objeto =  new Venta_cab();
?>


<?php if (count($objeto->consulta($id,'id'))>0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">PLANILLA DE VENTAS</h3>
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table id="consulta" class="table table-bordered table-condensed">
				<thead>
					<tr class="active">
						
						
						<th class="text-center">NÚMERO</th>
						<th class="text-center">RAZÓN SOCIAL</th>
						<th class="text-center">DIRECCIÓN</th>
                        <th class="text-center">FECHA</th>
						
					</tr>
				</thead>
				<tbody>
				<tr>
				<td class="text-center"><?php echo $objeto->consulta($id,'numero'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'nombres'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'direccion1'); ?></td>
				<td class="text-center"><?php echo $objeto->consulta($id,'ruc'); ?></td>
                 
				
				</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>	
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles</p>	
<?php endif ?>

*/
