<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "comerciante_puesto";

 ?>

 <?php if (count(Comerciante_puesto::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<i class="fa fa-user fa-2x"></i><i class="fa fa-home fa-2x"></i> COMERCIANTE  - PUESTO
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-hover table-condensed">
		<thead>
			<tr class="info">
				<th>IT</th>
				<th>COMERCIANTE</th>
				<th>PUESTO</th>
				<th>ACCIONES</th>	
			</tr>
		</thead>
		<tbody>
	    <?php 
	    $item = 1;
	    foreach (Comerciante_puesto::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $item++; ?></td>
	    <td><?php echo $value['nombres'].' '.$value['apellidos']; ?></td>
	    <td><?php echo "N° ".$value['puesto'].' - '.$value['estado'].' - '.$value['tipo']; ?></td>
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

<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-user fa-2x"></i><i class="fa fa-home fa-2x"></i> COMERCIANTE  - PUESTO
</div>
<div class="panel-body">

<p class="alert alert-warning">No Hay Registros.</p>	
</div>
</div>

 <?php endif ?>