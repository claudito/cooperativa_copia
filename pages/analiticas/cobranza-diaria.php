<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Cobranza Diaria');
Assets::datatables();
Assets::sweetalert();
Html::header();
Html::nav('../..'); #barra de navegación
Html::breadcrumbs('ANALÍTICAS','COBRANZA DIARIA'); #cinta de ubicación
?>


<div class="row">
<div class="col-md-12">

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">COBRANZA DIARIA</h3>
	</div>
	<div class="panel-body">
	 
<form action="../../docs/pdf/cobranza-diaria" method="GET" target="_blank">

<div class="row">
	
<div class="col-md-3">
<div class="form-group">
<input type="date" name="fecha" id="" class="form-control" value="<?php echo date('Y-m-d'); ?>">
</div>
</div>

<div class="col-md-2">
<div class="form-group">
<select name="tipo" id="" class="form-control" onchange="this.form.submit()">
<option value="">[Seleccionar]</option>
<option value="socio">SOCIO</option>
<option value="inquilino">INQUILINO</option>
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