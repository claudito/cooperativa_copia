<?php 
include'../autoload.php';
include'../session.php';


Assets::principal('Asociar Comerciante y Puesto');
Assets::datatables();
Assets::sweetalert();
Html::header();
$folder =  "comerciante_puesto";
Html::nav('..'); #barra de navegación
Html::breadcrumbs('PAGOS ','ASOCIAR COMERCIANTE Y PUESTO'); #cinta de ubicación
include'../vistas/modal/'.$folder.'/eliminar.php';#modal eliminar

?>



<div id="loader_agregar"></div>
<div id="tabla_agregar"></div>


<div class="row">
<div class="col-md-12">
<div class="pull-right"><div class="form-group">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary"><i class="fa fa-plus"></i>  Agregar</a>
</div></div>
<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->


</div>
</div>


<script src="../ajax/app/<?php echo $folder; ?>.js"></script>
<script>loadTabla();</script>
<script>loadModalAgregar()</script>
<?php 

Html::footer('Cooperativa');

 ?>