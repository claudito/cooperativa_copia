<?php 

include'../autoload.php';
include'../session.php';

$assets  =  new Assets();
$html    =  new Html();
$assets ->principal('Detalle de Concepto de Pago');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = "detalle-concepto";

include'../vistas/modal/'.$carpeta.'/agregar.php';#modal agregar
include'../vistas/modal/'.$carpeta.'/eliminar.php';#modal eliminar

?>

<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idtipo").change(function () {
$("#idtipo option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/comerciante.php", { elegido: elegido }, function(data){
$("#idcomerciante").html(data);
});     
});
});    
});
</script>


<div class="row">	
<div class="col-md-12">
<?php include'../vistas/nav.php'; ?>
</div>	
</div>

<div class="row">
<div class="col-md-12">
	
<div class="pull-right">
<div class="form-group">
<a data-toggle="modal" href="#modal-agregar" class="btn btn-primary">Agregar Registro</a>
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