<?php 
include'../../autoload.php';
include'../../session.php';
Assets::principal('Saldo por Cobrar Inquilinos');
Assets::datatables();
Assets::sweetalert();
Html::header();
Html::nav('../..'); #barra de navegación
Html::breadcrumbs('ANALÍTICAS','SALDO POR COBRAR - INQUILINO'); #cinta de ubicación
?>

<style>
.table{
width: 50%;
}
</style>


<div class="row">
<div class="col-md-12">
<form id="consultar" class="form-inline">
<div class="form-group">
<div class="input-group">
<input type="month"  id="idmes" class="form-control" value="<?php echo date('Y-m'); ?>" required>
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


<script src="../../ajax/analitica/saldo-inquilino.js"></script>
<script>loadTabla()</script>
<?php Html::footer('Cooperativa');  ?>