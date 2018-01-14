<?php 
include'../autoload.php';
include'../session.php';

Assets::principal('Comunicados');
Assets::datatables();
Assets::sweetalert();
Html::header();
$carpeta = 'comunicado';
Html::nav('..'); #barra de navegación
Html::breadcrumbs('GESTIÓN','COMUNICADOS'); #cinta de ubicación
include'../vistas/modal/'.$carpeta.'/agregar.php';#modal agregar

?>

<div class="row">
<div class="col-md-12">

<div class="pull-right">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar</a>
</div>

<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>

<script src="../ajax/app/<?php echo $carpeta; ?>.js"></script>
<script>loadTabla();</script>
<?php Html::footer('Cooperativa');  ?>