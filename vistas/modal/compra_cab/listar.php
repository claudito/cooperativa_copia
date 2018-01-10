<?php 

include'../../../autoload.php';
include'../../../session.php';

$concepto  =  new Compra_cab();
$titulo = "COMPRAS";
$folder = "compra_cab";

 ?>

 <?php if (count($concepto->lista())>0): ?>
<div class="panel panel-info">
	<div class="panel-heading">
	<h3 class="panel-title"><?php echo $titulo ?></h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th>RUC</th>
				<th>RAZON SOCIAL</th>
				<th>DIRECCION</th>
				<th>TIPO</th>
				<th>SERIE</th>
				<th>NUMERO</th>
				
				<th>FECHA DOCUMENTO</th>
				<th style="text-align: center;">ACCIONES</th>
				
				
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach ($concepto->lista() as $key => $value): ?>
	    <tr>
	    	<td><?php echo $value['ruc'] ?></td>
	    	<td><?php echo $value['razon_social'] ?></td>
	    <td><?php echo $value['direccion1'] ?></td>
	    <td>
        <?php

        switch ($value['tipo']) {
         	case 'C':
            echo "CLIENTE";
         		break;
         	case 'P':
            echo "PROVEEDOR";
         		break;
         	
         	
         	default:
            echo "N.E";
         		break;
         } 


         ?>

	    </td>
	    <td><?php echo $value['serie'] ?></td>
	    <td><?php  echo $value['numero'] ?></td>
	    
	    <td><?php  echo $value['fecha_documento'] ?></td>
	    <td style="text-align: center;">
<a href="<?php echo URL; ?>dompdf/reporte/cc?id=<?php echo $value['id']; ?>" class="btn btn-warning btn-sm" target="_blank"><i class="glyphicon glyphicon-print" title="Reporte"></i></a>

		 <a  href="compra_det?id=<?php echo $value['id']; ?>"  class="btn btn-sm btn-info"><i class="glyphicon glyphicon-list" title="Agregar Detalles"></i></a>

		 <button title="Actualizar Cabecera" class="btn btn-primary btn-sm btn-edit"
        data-id="<?php echo $value['id']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>

        <button title="Eliminar" class="btn btn-danger btn-sm" data-toggle="modal"
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