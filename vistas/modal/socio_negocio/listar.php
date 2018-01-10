<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "socio_negocio";

 ?>

 <?php if (count(Socio_negocio::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">SOCIOS DE NEGOCIO</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-condensed">
		<thead>
			<tr class="info">
				<th>TIPO</th>
				<th>CÓDIGO</th>
				<th>RUC</th>
				<th>RAZÓN SOCIAL</th>
				<th>CONTACTO</th>
				<th>DIRECCIÓN 1</th>
				<th>DIRECCIÓN 2</th>
				<th>TELEFONO 1</th>
				<th>TELEFONO 2</th>
				<th>CUENTA BANCARIA</th>
				<th>COMENTARIO</th>
				<th style="text-align: center;">ACCIONES</th>
				
				
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach (Socio_negocio::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo ($value['tipo']=='C') ? "CLIENTE" : "PROVEEDOR" ;  ?></td>
	    <td><?php echo $value['codigo'] ?></td>
	    <td><?php echo $value['ruc'] ?></td>
	    <td><?php echo $value['razon_social'] ?></td>
	    <td><?php echo $value['contacto'] ?></td>
        <td><?php echo $value['direccion1'] ?></td>
        <td><?php echo $value['direccion2'] ?></td>
        <td><?php echo $value['telefono1'] ?></td>
        <td><?php echo $value['telefono2'] ?></td>
        <td><?php echo $value['cuenta_bancaria'] ?></td>
        <td><?php echo $value['comentario'] ?></td>




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