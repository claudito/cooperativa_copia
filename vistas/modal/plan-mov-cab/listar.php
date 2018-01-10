<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "plan-mov-cab";

 ?>

 <?php if (count(Plan_mov_cab::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">PLANILLA DE GASTOS DE MOVILIDAD</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>N° RECIBO</th>
				<th>PERSONAL</th>
				<th>FECHA EMISIÓN</th>
				<th style="text-align: center;">ACCIONES</th>
				
				
			</tr>
		</thead>
		<tbody>
	    <?php 


	    
	    foreach (Plan_mov_cab::lista() as $key => $value): ?>
	    <tr>
		<td><?php echo $value['numero']; ?></td>
	    <td><?php echo $value['nombres'].' '.$value['apellidos']; ?></td>
	    <td><?php echo date_format(date_create($value['fecha_emision']),'d-m-Y'); ?></td>
	    
	    <td style="text-align: center;">

	    <button class="btn btn-success btn-sm btn-detalle" data-numero="<?php echo $value['numero']; ?>"><i class="fa fa-plus"></i></button>
	    
	    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar" 
         data-id="<?php echo $value['numero']; ?>"><i class="glyphicon glyphicon-trash"></i></button>

		<a  href="<?php echo URL; ?>dompdf/reporte/pm?id=<?php echo $value['numero']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i></a>

        
         
	    
	    </td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>
 <!-- Script Modal Actualizar -->
   <script>
  	$(".btn-detalle").click(function(){
  		numero = $(this).data("numero");
  		$.get("../vistas/modal/<?php echo $folder; ?>/detalle.php","numero="+numero,function(data){
  			$("#form-detalle").html(data);
  		});
  		$('#modal-detalle').modal('show');
  	});
  </script>
  
  <!-- Inicio Modal Actualizar -->
  <div class="modal fade" id="modal-detalle" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
 
        <div class="modal-body">
        <div id="form-detalle"></div>
        </div>

      </div>
    </div>
  </div>
<!-- Fin  Modal Actualizar -->




	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>
</div>
	</div>
</div>
 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros.</p>	
 <?php endif ?>