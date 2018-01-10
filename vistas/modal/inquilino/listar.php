<?php 

include'../../../autoload.php';
include'../../../session.php';

$inquilino  =  new Inquilino();
$titulo = "INQUILINO";
$folder = "inquilino";

 ?>

 <?php if (count($inquilino->lista())>0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
	<h3 class="panel-title"><?php echo $titulo; ?></h3>
		
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>DNI</th>
				<th>TELEFONO</th>
				<th>CORREO</th>
				<th>AREA</th>
				<th style="text-align: center;">ACCIONES</th>
				
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach ($inquilino->lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $value['nombres'] ?></td>
	    <td><?php echo $value['apellidos'] ?></td>
	    <td><?php echo $value['dni'] ?></td>
	    <td><?php echo $value['telefono'] ?></td>
	    <td><?php echo $value['correo'] ?></td>
	    <td><?php echo $value['area'] ?></td>

	    
	    
	    <td style="text-align: center;">
		
		<a class=" btn btn-puesto btn-success btn-sm" data-id="<?php echo $value['id']; ?>"><i class="fa fa-bars"></i></a>

		<button class="btn btn-primary btn-sm btn-edit"
        data-id="<?php echo $value['id']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>

        <button class="btn btn-danger btn-sm" data-toggle="modal"
         data-target="#modal-eliminar" 
         data-id="<?php echo $value['id']; ?>"
         data-nombres="<?php echo $value['nombres']; ?>"

         ><i class="glyphicon glyphicon-trash"></i></button>

	    
	    </td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>

  <!-- Modal Puesto -->
  <script>
    $(".btn-puesto").click(function(){
      id = $(this).data("id");
      $.get("../vistas/modal/<?php echo $folder ?>/puesto.php","id="+id,function(data){
        $("#form-puesto").html(data);
      });
      $('#modal-puesto').modal('show');
    });
  </script>
 <div class="modal fade" id="modal-puesto" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">PUESTO - INQUILINO</h4>
        </div>
        <div class="modal-body">
        <div id="form-puesto"></div>
        </div>

      </div>
    </div>
  </div>
  <!-- /.Fin Modal Puesto -->

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