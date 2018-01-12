<?php 

include'../../autoload.php';
include'../../session.php';

Assets::principal('Egresos');
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
		<h3 class="panel-title">Seleccionar  Socio</h3>
	</div>
	<div class="panel-body">
	
    <form action="<?php echo URL; ?>dompdf/reporte/pago_socio.php" class="form-inline" target="_blank">
    	
    <div class="input-group">
      <div class="form-group">

<select name="puesto"  class="form-control" required="">
<option value="">[Seleccionar]</option>
<?php foreach (Comerciante::lista_socio() as $key => $value): ?>

  <option value="<?php echo $value['id'] ?>"><?php echo $value['nombres'].' '.$value['apellidos'] ?></option> 



<?php endforeach ?>
</select>
</div>
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