<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Egresos de Caja');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = 'egresos';
Html::nav('..'); #barra de navegación
Html::breadcrumbs('GESTIÓN','REGISTRO EGRESOS DE CAJA'); #cinta de ubicación
include'../vistas/modal/'.$carpeta.'/agregar.php';#modal agregar
include'../vistas/modal/'.$carpeta.'/eliminar.php';#modal eliminar

?>

<div class="row">
<div class="col-md-12">
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
</div>



<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>


<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script src="../ajax/realtime/js/ec-correlativo.js"></script>

<script>loadTabla();</script>
<?php 

$html->footer('Cooperativa');

 ?>