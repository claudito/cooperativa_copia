<?php
include'../autoload.php';
include'../session.php';

Assets::principal('venta');
Assets::datatables();
Assets::sweetalert();
Html::header();
$folder      =  "venta_det";
$id          = $_GET['id'];
include'../vistas/modal/'.$folder.'/agregar.php';
include'../vistas/modal/'.$folder.'/eliminar.php';
 ?>



<style>
table{font-size: 12px;}
</style>


<div class="row">
<div class="col-md-12">
<?php include('../vistas/nav.php'); ?>
</div>
</div>






<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title">DOCUMENTO </h3>
</div>
<div class="table-responsive">
<table class="table table-bordered table-condensed">
<thead>
<tr>
<th>SERIE</th>
<th>NÚMERO</th>
<th>CLIENTE</th>
<th>FECHA</th>
<th>TIPO</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo Venta_cab::consulta($id,'serie'); ?></td>
<td><?php echo str_pad(Venta_cab::consulta($id,'numero'),6,'0',STR_PAD_LEFT) ?></td>
<td><?php echo Venta_cab::consulta($id,'ruc').' - '.Venta_cab::consulta($id,'nombres'); ?></td>
<td><?php echo date_format(date_create(Venta_cab::consulta($id,'fecha_documento')),'d/m/Y'); ?></td>
<td>
<?php if (Venta_cab::consulta($id,'tipo_documento')=='01'): ?>
FACTURA	
<?php else: ?>
BOLETA
<?php endif ?>
</td>
</tr>
</tbody>

</table>
</div>
</div>









<div class="pull-right">
<button  data-toggle="modal"  href="#modal-agregar"   class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</button>
</div>


<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->




<script src="../ajax/app/<?php echo $folder ?>.js"></script>

<script>loadTabla(<?php echo $id ?>)</script>
<?php $html -> footer('cooperativa'); ?>