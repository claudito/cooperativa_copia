<?php 

include'../../../autoload.php';
include'../../../session.php';

$producto  =  new Proveedor();
$titulo = "PROVEEDOR";
$folder = "proveedor";

 ?>

 <?php if (count($producto->lista())>0): ?>
<div class="panel panel-default">
	<div class="panel-heading">
	<h3 class="panel-title"><?php echo $titulo; ?></h3>
		
	</div>
	<div class="panel-body">
		<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr>
				<th>RAZON SOCIAL</th>
				<th>DIRECCION</th>
                <th>RUC</th>
                <th>TIPO DE DOCUMENTO</th>
				<th style="text-align: center;">ACCIONES</th>
				
			</tr>
		</thead>
		<tbody>
	    <?php 
	    foreach ($producto->lista() as $key => $value): ?>
	    <tr>
	    <td><?php echo $value['razon_social'] ?></td>
	    <td><?php echo $value['direccion'] ?></td>
	    <td><?php echo $value['ruc'] ?></td>
	    <td>
	    <?php

         switch ($value['tipo_documento']) {
         	case '0':
            echo "OTROS TIPOS DE DOCUMENTOS";
         		break;
         	case '1':
            echo "DOCUMENTOS NACIONAL DE IDENTIDAD(DNI)";
         		break;
         	case '4':
            echo "CARNET DE EXTRANJERIA";
         		break;
         	case '6':
            echo "REGISTRO UNICO DE CONTRIBUYTENTE";
         		break;
         		case '7':
            echo "PASAPORTE";
         		break;
         	default:
            echo "N.E";
         		break;
         } 

         ?></td>
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