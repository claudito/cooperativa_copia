<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "familia";

 ?>

 <?php if (count(Familia::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">FAMILIA</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>CÓDIGO</th>
				<th>DESCRIPCIÓN</th>	
				<th class="text-center">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach (Familia::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo str_pad($value['codigo'], 6,'0',STR_PAD_LEFT); ?> </td>
	   
	    <td><?php echo $value['descripcion'] ?></td>
	    <td class="text-center">

        <button class="btn btn-danger btn-sm" data-toggle="modal"
         data-target="#modal-eliminar" 
         data-id="<?php echo $value['id']; ?>"
          data-nombres="<?php echo $value['descripcion']; ?>"

         ><i class="glyphicon glyphicon-trash"></i></button>
         
        <button class="btn btn-primary btn-sm btn-edit"
        data-id="<?php echo $value['id']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>
	    
	    </td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>
 <!-- Script Modal Actualizar -->
   <script>
  	$(".btn-edit").click(function(){
  		id = $(this).data("id");
  		$.get("../vistas/modal/familia/actualizar.php","id="+id,function(data){
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