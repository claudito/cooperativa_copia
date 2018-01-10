<?php 

include'../../../autoload.php';
include'../../../session.php';

$presupuesto_anual  =  new Presupuesto_anual();
$folder             = "presupuesto-anual";
$anio               =  (isset($_SESSION[KEY.ANIO_PA])) ? $_SESSION[KEY.ANIO_PA] : date('Y') ;

 ?>

 <?php if (count($presupuesto_anual->lista($anio))>0): ?>
 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">PRESUPUESTO ANUAL <?php echo $anio; ?></h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-bordered table-condensed" id="consulta">
 			<thead>
 				<tr class="info">
 					<th>CUENTA</th>
 					<th>DESCRIPCIÓN</th>
 					<th class="text-center">ENERO</th>
 					<th class="text-center">FEBRERO</th>
 					<th class="text-center">MARZO</th>
 					<th class="text-center">ABRIL</th>
 					<th class="text-center">MAYO</th>
 					<th class="text-center">JUNIO</th>
 					<th class="text-center">JULIO</th>
 					<th class="text-center">AGOSTO</th>
 					<th class="text-center">SEPTIEMBRE</th>
 					<th class="text-center">OCTUBRE</th>
 					<th class="text-center">NOVIEMBRE</th>
 					<th class="text-center">DICIEMBRE</th>
 					<th class="text-center">TOTAL</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php 
            
      $total_general = 0;
      $enero         = 0;
 			$febrero       = 0;
 			$marzo         = 0;
 			$abril         = 0;
 			$mayo          = 0;
 			$junio         = 0;
 			$julio         = 0;
 			$agosto        = 0;
 			$septiembre    = 0;
 			$octubre       = 0;
 			$noviembre     = 0;
 			$diciembre     = 0;
        
 			foreach ($presupuesto_anual->lista($anio) as $key => $value): ?>
			<tr class="active">
			<td><?php echo $value['cuenta']; ?></td>
			<td><a data-id_producto="<?php echo $value['id']; ?>" data-anio="<?php echo $anio ?>" class="btn btn-presupuesto btn-xs"><?php echo $value['descripcion']; ?></a></td>
			<td class="text-center"><?php echo round($value['enero'],2); ?></td>
			<td class="text-center"><?php echo round($value['febrero'],2); ?></td>
			<td class="text-center"><?php echo round($value['marzo'],2); ?></td>
			<td class="text-center"><?php echo round($value['abril'],2); ?></td>
			<td class="text-center"><?php echo round($value['mayo'],2); ?></td>
			<td class="text-center"><?php echo round($value['junio'],2); ?></td>
			<td class="text-center"><?php echo round($value['julio'],2); ?></td>
			<td class="text-center"><?php echo round($value['agosto'],2); ?></td>
			<td class="text-center"><?php echo round($value['septiembre'],2); ?></td>
			<td class="text-center"><?php echo round($value['octubre'],2); ?></td>
			<td class="text-center"><?php echo round($value['noviembre'],2); ?></td>
			<td class="text-center"><?php echo round($value['diciembre'],2); ?></td>
			<td class="text-center">
			<?php 
             $total =round($value['enero'],2)+round($value['febrero'],2)+round($value['marzo'],2)+round($value['abril'],2)+round($value['mayo'],2)+round($value['junio'],2)+round($value['julio'],2)+round($value['agosto'],2)+round($value['septiembre'],2)+round($value['octubre'],2)+round($value['noviembre'],2)+round($value['diciembre'],2);

             echo $total;
             $enero  		  = $enero + $value['enero'];
             $febrero  		= $febrero + $value['febrero'];
             $marzo  		  = $marzo + $value['marzo'];
             $abril  		  = $abril + $value['abril'];
             $mayo  		  = $mayo + $value['mayo'];
             $junio  		  = $junio + $value['junio'];
             $julio  		  = $julio + $value['julio'];
             $agosto  		= $agosto + $value['agosto'];
             $septiembre  = $septiembre + $value['septiembre'];
             $octubre  		= $octubre + $value['octubre'];
             $noviembre  	= $noviembre + $value['noviembre'];
             $diciembre  	= $diciembre + $value['diciembre'];
			 ?>
			</td>
			</tr>
			<?php 

             $total_general  = $total_general +$total;

			 ?>
 			<?php endforeach ?>
 			</tbody>
 			<tbody>
 			<tr class="success">
 			<td></td>
 			<td class="text-right"><strong>TOTAL</strong></td>
 			<td class="text-center"><?php echo $enero; ?></td>
 			<td class="text-center"><?php echo $febrero; ?></td>
 			<td class="text-center"><?php echo $marzo; ?></td>
 			<td class="text-center"><?php echo $abril; ?></td>
 			<td class="text-center"><?php echo $mayo; ?></td>
 			<td class="text-center"><?php echo $junio; ?></td>
 			<td class="text-center"><?php echo $julio; ?></td>
 			<td class="text-center"><?php echo $agosto; ?></td>
 			<td class="text-center"><?php echo $septiembre; ?></td>
 			<td class="text-center"><?php echo $octubre; ?></td>
 			<td class="text-center"><?php echo $noviembre; ?></td>
 			<td class="text-center"><?php echo $diciembre; ?></td>
 			<td class="text-center"><?php echo $total_general; ?></td>
 			</tr>
 			</tbody>
 		</table>
 	</div>
 	</div>
 </div>

 <!-- Script Modal Actualizar -->
   <script>
  	$(".btn-presupuesto").click(function(){
  		id_producto = $(this).data("id_producto");
  		anio 		= $(this).data("anio");
  		$.get("../vistas/modal/<?php echo $folder; ?>/actualizar.php","id_producto="+id_producto+"&anio="+anio,function(data){
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
          <h4 class="modal-title">Actualizar Presupuesto</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div>
    </div>
  </div>
<!-- Fin  Modal Actualizar -->
<!--  
<script>
$(document).ready(function(){
$('#consulta').DataTable();
});
</script>-->
 <?php else: ?>
 <p class="alert alert-warning">No hay Registros Disponibles</p>
 <?php endif ?>


