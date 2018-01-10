<?php 

include'../../../autoload.php';
include'../../../session.php';

$folder = "venta_cab";
 ?>

 <?php if (count(Venta_cab::lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title">VENTAS</h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>IT</th>
				<th>NÚMERO DE SERIE</th>
				<th>NÚMERO</th>
				<th>RAZÓN SOCIAL</th>
				<th>DIRECCIÓN</th>
				<th>RUC</th>
				<th>TIPO DE DOCUMENTO</th>
			    <th>FECHA</th>
			    <th>ESTADO</th>
				<th style="text-align: center;">ACCIONES</th>
				
				
			</tr>
		</thead>
		<tbody>
	    <?php 
        $item = 1;
	    foreach(Venta_cab::lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $item++ ?></td>
	    <td><?php echo '001'; ?> </td>
	    <td><?php echo str_pad($value['numero'], 6,'0',STR_PAD_LEFT); ?> </td>
	    <td><?php echo $value['nombres']; ?></td>
	    <td><?php echo $value['direccion1']; ?></td>
	    <td><?php echo $value['ruc']; ?></td>
	     <td><?php

        switch ($value['tipo_documento']) {
         	case '01':
            echo "FACTURA";
         		break;
         	case '03':
            echo "BOLETA";
         		break;
         	
         	
         	default:
            echo "N.A.";
         		break;
         } 


         ?></td>
	    <td><?php echo $value['fecha_documento']; ?></td>
	    <td><?php echo $value['estado']; ?></td>
	    <td style="text-align: center;">

		<a  href="<?php echo URL; ?>dompdf/reporte/ventas?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="glyphicon glyphicon-print" title="Reporte"></i></a>

		<a href="venta_det?id=<?php echo $value['id']; ?>" class="btn btn-detalle btn-success btn-sm"><i class="fa fa-address-card-o"></i></a>


		<button class="btn btn-primary btn-sm btn-edit" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-edit"></i></button>

        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar" 
         data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
         
	    
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
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">VENTAS</h3>
</div>
<div class="panel-body">
<p class="alert alert-warning">No Hay Registros.</p>	
</div>
</div>
 <?php endif ?>