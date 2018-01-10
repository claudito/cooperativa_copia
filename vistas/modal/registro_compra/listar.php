<?php 

include'../../../autoload.php';
include'../../../session.php';

$egresos  =  new Registro_compra();
$titulo = "REGISTRO DE COMPRA";
$folder = "registro_compra";

 ?>

 <?php if (count($egresos->lista())>0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
	<h3 class="panel-title"><?php echo $titulo ?></h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>#</th>
				<th>FECHA_DOCUMENTO</th>
				<th>TIPO_DOCUMENTO</th>
				<th>SERIE</th>
				<th>NUMERO</th>
				
				<th style="text-align: center;">ACCIONES</th>
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach ($egresos->lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $value['numero']; ?></td>
	    <td><?php echo date_format(date_create($value['fecha_documento']),'d-m-Y'); ?></td>
	    <td><?php echo $value['tipo_documento']; ?></td>
	    <td><?php echo $value['serie']; ?></td>
	    <td><?php echo $value['numero']; ?></td>
	    <td style="text-align: center;">
		<a href="<?php echo URL; ?>docs/pdf/reporte/egresos.php?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="glyphicon glyphicon-print"></i></a>

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