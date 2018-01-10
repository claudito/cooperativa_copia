<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Cobro Diario');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = "cobro-diario";

include'../vistas/modal/'.$carpeta.'/agregar.php';
include'../vistas/modal/'.$carpeta.'/consultar.php';

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
<a data-toggle="modal" href="#modal-consultar" class="btn btn-primary">Consultar</a>
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