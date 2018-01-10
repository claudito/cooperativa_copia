<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "comerciante";

 ?>

 <?php if (count(Comerciante::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<i class="fa fa-users fa-1x"></i>	LISTA DE SOCIOS E INQUILINOS 
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-hover table-condensed">
		<thead>
			<tr class="info">
				<th>TIPO</th>
				<th>NOMBRES</th>
				<th>APELLIDOS</th>
				<th>DNI</th>
				<th>RUC</th>
				<th>RAZÓN SOCIAL</th>
				<th>DIRECCIÓN</th>
				<th>TELEFÓNO</th>
				<th>CELULAR</th>
				<th>CORREO</th>
				<th>ÁREA</th>
				<th>F. INGRESO</th>
				<th>ACCIONES</th>	
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach (Comerciante::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo ($value['tipo']=='socio') ? "SOCIO" : "INQUILINO" ; ?></td>
	    <td><?php echo $value['nombres'] ?></td>
	    <td><?php echo $value['apellidos'] ?></td>
	    <td><?php echo $value['dni'] ?></td>
	    <td><?php echo $value['ruc'] ?></td>
	    <td><?php echo $value['razon_social'] ?></td>
	    <td><?php echo $value['direccion'] ?></td>
	    <td><?php echo $value['telefono'] ?></td>
	    <td><?php echo $value['celular'] ?></td>
	    <td><?php echo $value['correo'] ?></td>
	    <td><?php echo $value['area'] ?></td>
	    <td><?php echo date_format(date_create($value['fecha_ingreso']),'d/m/Y');    ?></td>
	    <td>
         
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

<div class="panel panel-default">
<div class="panel-heading">
<i class="fa fa-users fa-2x"></i>	LISTA DE SOCIOS E INQUILINOS 
</div>
<div class="panel-body">

<p class="alert alert-warning">No Hay Registros.</p>	
</div>
</div>

 <?php endif ?>