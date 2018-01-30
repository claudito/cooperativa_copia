<?php 
include'../autoload.php';
include'../session.php';
Assets::principal('Configuración de  Pagos');
Assets::datatables();
Assets::sweetalert();
Html::header();
Html::nav('..'); #barra de navegación
Html::breadcrumbs('PAGOS ','CONFIGURACIÓN DE PAGOS'); #cinta de ubicación
?>


<form  id="agregar">
<div class="row">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-book"></i> CONFIGURACIÓN DE PAGOS</h3>
</div>
<div class="panel-body">
<div class="row">

<div class="col-md-4">
<div class="form-group">
<label>N° DE PUESTO -  COMERCIANTE</label>
<select name="puesto" id="id_puesto" class="form-control">
<option value="">[Seleccionar]</option>
<?php foreach (Concepto_puesto::puesto() as $key => $value): ?>
<option value="<?php echo $value['codigo_puesto'] ?>"><?php echo "N° ". $value['numero_puesto'].' - '.$value['nombres'].' '.$value['apellidos'].' - '.$value['estado'].' - '.$value['tipo'] ?></option>
<?php endforeach ?>
</select>
</div>
</div>

<div id="id_concepto_pago"></div>

</div>
</div>
</div>
</div>
</div>
</form>




<div class="row">
<div class="col-md-12">
	
<div id="loader" class="text-center"> <img src="../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>


<script src="../ajax/app/generar_pagos.js"></script>
<script>loadTabla();</script>
<?php 

Html::footer('Cooperativa');

 ?>