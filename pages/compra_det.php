<?php
include'../autoload.php';
include'../session.php';

$assets   = new Assets();
$html     = new Html();
$message  = new Mensaje();
$assets ->principal('COMPRA ');
$assets->datatables();
$assets ->sweetalert();
$html->header();
$cita_cab    =  new Compra_cab();

$folder      =  "compra_det";
$id          = $_GET['id'];
$razon_social    = $cita_cab->consulta($id,'razon_social');
$direccion = $cita_cab->consulta($id,'direccion1');
$ruc = $cita_cab->consulta($id,'ruc');
$serie = $cita_cab->consulta($id,'serie');
$numero = $cita_cab->consulta($id,'numero');

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
		<h3 class="panel-title">Datos</h3>
	</div>
	<div class="table-responsive">
	<table class="table table-bordered table-condensed">
		<tr>
			<th>CODIGO</th>
			<th>RAZON SOCIAL</th>
			<th>DIRECCION</th>
			<th>RUC</th>
			<th>SERIE</th>
			<th>NUMERO</th>
		</tr>
		<tr>
			<td><?php echo $id; ?></td>
			<td><?php echo $razon_social; ?></td>
			<td><?php echo $direccion; ?></td>
			<td><?php echo $ruc; ?></td>
			<td><?php echo $serie; ?></td>
			<td><?php echo $numero; ?></td>
		</tr>
	</table></div>
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