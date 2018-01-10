<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "usuario";
 ?>

 <?php if (count(Usuarios::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> LISTA DE USUARIOS</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
        <th>IT</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>DNI</th>
				<th>USUARIO</th>
				<th>TIPO</th>
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
	    <?php 
      $item = 1;
	    foreach (Usuarios::lista() as $key => $value): ?>
	    <tr>
      <td><?php echo $item++; ?></td>
	    <td><?php echo $value['nombres'] ?></td>
	    <td><?php echo $value['apellidos'] ?></td>
      <td><?php echo $value['dni'] ?></td>
	    <td><?php echo $value['user'] ?></td>
	    <td>
        <?php

        switch ($value['tipo']) {
         	case 'admin':
            echo "ADMINISTRADOR";
         		break;
         	case 'user':
            echo "USUARIO";
         		break;
         	case 'socio':
            echo "SOCIO";
         		break;
         	
         	default:
            echo "N.E";
         		break;
         } 


         ?>

	    </td>
       
	    <td style="text-align: center;">
        
        <a data-id="<?php echo $value['id'];?>" class="btn btn-permisos btn-sm btn-warning"><i class="glyphicon glyphicon-lock"></i></a>

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

  <!-- Modal  Permisos-->
  <script>
    $(".btn-permisos").click(function(){
      id = $(this).data("id");
      $.get("../vistas/modal/<?php echo $folder; ?>/permisos.php","id="+id,function(data){
        $("#form-permisos").html(data);
      });
      $('#permisosModal').modal('show');
    });
  </script>
  <div class="modal fade" id="permisosModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">PERMISOS <i class="fa fa-lock"></i></h4>
        </div>
        <div class="modal-body">
        <div id="form-permisos"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Permisos-->

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