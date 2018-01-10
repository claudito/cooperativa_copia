<?php 

include'../../../autoload.php';
include'../../../session.php';

$egresos  =  new Egresos();
$titulo = "EGRESOS DE CAJA";
$folder = "egresos";

 ?>

 <?php if (count($egresos->lista('EC'))>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title"><?php echo $titulo ?></h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>RECIBO</th>
				<th>MONTO</th>
				<th>CONCEPTO</th>
				<th>PERSONAL</th>
				<th>DOCUMENTO INTERNO</th>
				<th>FECHA DE REGISTRO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach ($egresos->lista('EC') as $key => $value): ?>
	    <tr>
	    <td><?php echo $value['numero']; ?></td>
	    <td><?php echo "S/. ".round($value['monto'],2); ?></td>
	    <td><?php echo $value['concepto']; ?></td>
	    <td><?php echo $value['personal']; ?></td>
	    <td><?php echo $value['documento']; ?></td>
	    <td><?php echo date_format(date_create($value['fecha_registro']),'d-m-Y'); ?></td>
	    <td style="text-align: center;">

		<a  href="<?php echo URL; ?>dompdf/reporte/documento?id=<?php echo $value['numero']; ?>"  class="btn btn-warning btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i></a>

		 <button class="btn btn-primary btn-sm btn-edit"
        data-id="<?php echo $value['numero']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>

        <button class="btn btn-danger btn-sm" data-toggle="modal"
         data-target="#modal-eliminar" 
         data-id="<?php echo $value['id']; ?>"
         data-nombres="<?php echo $value['monto']; ?>"

         ><i class="glyphicon glyphicon-trash"></i></button>
	    </td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>
 <!-- Script Modal Actualizar -->
   <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vistas/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
  			$("#form-edit").html(data);
  		});
  		$('#modal-actualizar').modal('show');
  	});
  </script>
  
  <!-- Inicio Modal Actualizar -->
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
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