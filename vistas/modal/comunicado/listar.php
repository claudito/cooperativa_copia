<?php 

include'../../../autoload.php';
include'../../../session.php';
$folder = "comunicado";

 ?>

 <?php if (count(Comunicado::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">COMUNICADOS</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>IT</th>
				<th>NÚMERO</th>
				<th>ASUNTO</th>
				<th>FECHA</th>
				<th>USUARIO</th>
				<th>CONTENIDO</th>
				<th>Estado</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
	    <?php 
	    $item =1;
	    foreach (Comunicado::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $item++; ?></td>
	    <td><?php echo date_format(date_create($value['fecha']),'Y').' - '.str_pad($value['id'], 6,'0',STR_PAD_LEFT); ?> </td>
	    <td><?php echo $value['asunto'] ?></td>
	    <td><?php echo date_format(date_create($value['fecha']),'d/m/Y'); ?></td>
	    <td><?php echo $value['nombres'].' '.$value['apellidos'] ?></td>
	     <td><?php echo $value['contenido'] ?></td>
	    <td><?php  switch ($value['estado']) {
			case '0':
				echo "PROGRAMADO";
				break;

			case '1':
				echo "POSTERGADO";
				break;
			
			case '2':
				echo "TERMINADO";
				break;

			default:
				echo "ERROR";
				break;
		}  ?> </td>
	    <td style="text-align: center;">
		
		 <button class="btn btn-primary btn-sm btn-edit"
        data-id="<?php echo $value['id']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>

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
          <h4 class="modal-title">ACTUALIZAR COMUNICADO</h4>
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