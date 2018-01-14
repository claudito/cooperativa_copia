<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Concepto');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = "concepto";
Html::nav('..'); #barra de navegación
Html::breadcrumbs('BASE DE DATOS','CONCEPTO DE PAGO'); #cinta de ubicación
include'../vistas/modal/'.$carpeta.'/agregar.php';#modal agregar
include'../vistas/modal/'.$carpeta.'/eliminar.php';#modal eliminar

?>


<div class="row">
<div class="col-md-12">
	
<div class="pull-right">
<div class="form-group">
<a data-toggle="modal" href="#newModal" class="btn btn-primary">Agregar</a>
</div>
</div>

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>



<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>

<script>loadTabla();</script>
<?php 

$html->footer('Cooperativa');

 ?>