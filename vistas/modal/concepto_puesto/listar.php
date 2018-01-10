<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "concepto_puesto";

 ?>

 <?php if (count(Concepto_puesto::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<i class="fa fa-usd fa-2x"></i><i class="fa fa-home fa-2x"></i> CONCEPTO  - PUESTO
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-hover table-condensed">
		<thead>
			<tr class="info">
				<th>PUESTO</th>
				<th>CONCEPTO</th>
				<th>TIPO CONCEPTO</th>
				<th>COMERCIANTE</th>
				<th>ACCIONES</th>	
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach (Concepto_puesto::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo "N° ".$value['puesto']; ?></td>
	    <td><?php echo $value['concepto']; ?></td>
	    <td><?php echo strtoupper($value['tipo_concepto']) ?></td>
	    <td><?php echo $value['nombres'].' '.$value['apellidos'].' - '.strtoupper($value['tipo_comerciante']); ?></td>
	    <td>
	    
        <button class="btn btn-danger btn-sm" data-toggle="modal"
         data-target="#modal-eliminar" 
         data-id="<?php echo $value['id']; ?>"
        
         ><i class="glyphicon glyphicon-trash"></i></button>
	    </td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>
 <!-- Script Modal Actualizar -->
   <script>
  	$(".btn-concepto").click(function(){
  		id = $(this).data("id");
  		$.get("../vistas/modal/<?php echo $folder; ?>/concepto.php","id="+id,function(data){
  			$("#form-concepto").html(data);
  		});
  		$('#modal-concepto').modal('show');
  	});
  </script>
  





	<script>
	$(document).ready(function(){
	$('#consulta').DataTable();
	});
	</script>
</div>
	</div>
</div>
 <?php else: ?>

<div class="panel panel-info">
<div class="panel-heading">
<i class="fa fa-usd fa-2x"></i><i class="fa fa-home fa-2x"></i> CONCEPTO  - PUESTO
</div>
<div class="panel-body">

<p class="alert alert-warning">No Hay Registros.</p>	
</div>
</div>

 <?php endif ?>