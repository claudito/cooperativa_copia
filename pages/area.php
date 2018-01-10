<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Área');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
include'../vistas/modal/area/agregar.php';#modal agregar
include'../vistas/modal/area/eliminar.php';#modal eliminar

?>


<div class="row">
	
<div class="col-md-12">
<?php include'../vistas/nav.php'; ?>
</div>	

</div>




<div class="row">
<div class="col-md-12">
	<div class="pull-right">
		<div class="form-group">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
</div>

	</div>

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>


<script src="../ajax/app/area.js"></script>
<script>loadTabla();</script>
<?php 

$html->footer('Cooperativa');

 ?>