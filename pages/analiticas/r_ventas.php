<?php 

include'../../autoload.php';
include'../../session.php';

Assets::principal('Ventas');
Html::header();

$mes =  date('Y-m');

?>


<div class="row">
	
<div class="col-md-12">
<?php include'../../vistas/nav.php'; ?>
</div>	

</div>




<div class="row">
<div class="col-md-12">


<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de Ventas</h3>
	</div>
	<div class="panel-body">
	
    <form action="<?php echo URL; ?>dompdf/reporte/r_ventas" class="form-inline" target="_blank">
    	
    <div class="input-group">
      <input type="month"  name="mes" class="form-control" value="<?php echo $mes; ?>">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Consultar</button>
      </span>
    </div><!-- /input-group -->


    </form>


	</div>
</div>


</div>
</div>

<?php 

Html::footer('Cooperativa');

 ?>