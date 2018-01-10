<?php 

include'../autoload.php';
include'../session.php';
Assets::principal('Planilla por Gastos de Movilidad');
Assets::datatables();
Assets::sweetalert();
  Html::header();
$carpeta = "plan-mov-cab";

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
	
<div class="pull-right">
<div class="form-group">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
</div>
</div>

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>



<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script src="../ajax/realtime/js/gm-correlativo.js"></script>
<script>loadTabla();</script>
<?php 

Html::footer('Cooperativa');

 ?>