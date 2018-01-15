<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Registro de Ventas');
Assets::datatables();
Assets::sweetalert();
Html::header();
Html::nav('../..'); #barra de navegación
Html::breadcrumbs('ANALÍTICAS','REGISTRO DE VENTAS'); #cinta de ubicación
?>

<div class="row">
<div class="col-md-12">
<form id="consultar" class="form-inline">
<div class="form-group">
<div class="input-group">
<input type="date"  id="idmes" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
<span class="input-group-btn">
<button class="btn btn-primary" type="submit">CONSULTAR</button>
</span>
</div><!-- /input-group -->
</div>
</form>
</div>
</div>


<br>

<div class="row">
<div class="col-md-12">
<div id="loader" class="text-center"> <img src="../../assets/img/loader.gif"></div>
<div id="mensaje"></div><!-- Datos ajax Final -->
<div id="tabla"></div><!-- Datos ajax Final -->

</div>
</div>


<script src="../../ajax/analitica/registro-ventas.js"></script>
<script>loadTabla()</script>
<?php Html::footer('Cooperativa');  ?>