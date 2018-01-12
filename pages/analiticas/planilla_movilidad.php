<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Planilla de Movilidad Consolidado');
Assets::datatables();
Assets::datatables_export();
Assets::sweetalert();
Html::header();
?>

<script>
$(document).ready(function() {
  $('#consulta').DataTable( {
    dom: 'Bfrtip',
    buttons: [
      /*'copyHtml5',*/
      'excelHtml5',
      /*'csvHtml5',*/
      'pdfHtml5'
    ]
  } );
} );
</script>

<div class="row">
<div class="col-md-12">
<?php include'../../vistas/nav.php'; ?>
</div>
</div>


<div class="row">
<div class="col-md-12">
<?php if (count(Reporte::planilla_movilidad())>0): ?>
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">PLANILLA DE MOVILIDAD</h3>
</div>
<div class="panel-body">
<div class="table-responsive">
<table id="consulta" class="table table-condensed">
<thead>
<tr class="info">
<th>N°</th>
<th>NOMBRES</th>
<th>APELLIDOS</th>
<th>COSTO</th>
<th>APERTURA DE PLANILLA</th>

</tr>
</thead>
<tbody>
<?php foreach (Reporte::planilla_movilidad() as $key => $value): ?>
<tr>
<td><?php echo $value['numero'];?></td>
<td><?php echo $value['nombres'] ?></td>
<td><?php echo $value['apellidos'] ?></td>
<td><?php echo round($value['costo'],2) ?></td>
<td><?php echo date_format(date_create($value['fecha_emision']),'d/m/Y');?></td>

</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
</div>
</div>
  
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>  
<?php endif ?>


</div>
</div>

<?php 

Html::footer('Cooperativa');

 ?>