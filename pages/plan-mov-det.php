<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Detalle de Planilla de Movilidad');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = "plan-mov-det";

$id  =   $_GET['id'];
$id  =   (!isset($_GET['id'])) ? 0 : $_GET['id'] ;

if ($id==0) {
	
	header('Location: '.URL.'pages/planilla-movilidad');
}

include'../vistas/modal/'.$carpeta.'/agregar.php';#modal agregar
include'../vistas/modal/'.$carpeta.'/eliminar.php';#modal eliminar

?>


<div class="row">	
<div class="col-md-12">
<?php include'../vistas/nav.php'; ?>
</div>	
</div>

<div class="row">
<div class="col-md-12">
<div id="loaderCab"></div>
<div id="tablaCab"></div>
</div>
</div>




<div class="row">
<div class="col-md-12">
	
<div class="pull-right">
<div class="form-group">
<a data-toggle="modal" href="#newModal" class="btn btn-primary">Agregar Registro</a>
</div>
</div>

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>



<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script>loadTabla(<?php echo $_GET['id']; ?>);</script>
<script>loadCab(<?php echo $_GET['id']; ?>);</script>
<?php 

$html->footer('Cooperativa');

 ?>