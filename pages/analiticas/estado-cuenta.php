<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Estado de Cuenta');
Assets::datatables();
Assets::sweetalert();
Html::header();
Html::nav('../..'); #barra de navegación
Html::breadcrumbs('ANALÍTICAS','ESTADO DE CUENTA'); #cinta de ubicación
?>


<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">ESTADO DE CUENTA</h3>
	</div>
	<div class="panel-body">
	 
<form action="../../docs/pdf/estado-cuenta" method="GET" target="_blank">

<div class="row">
	
<div class="col-md-3">
<div class="form-group">
<input type="month" name="fecha" class="form-control" value="<?php echo date('Y-m'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<select name="codigo" class="form-control" onchange="this.form.submit()">
<option value="">[Seleccionar]</option>
<?php foreach (Concepto_puesto::puesto() as $key => $value): ?>
<option value="<?php echo $value['codigo_puesto'] ?>"><?php echo "N° ". $value['numero_puesto'].' - '.$value['nombres'].' '.$value['apellidos'].' - '.$value['estado'].' - '.$value['tipo'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>


</div>






</form>




	</div>
</div>

</div>
</div>





<?php Html::footer('Cooperativa');  ?>