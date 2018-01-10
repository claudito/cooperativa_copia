<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('EC','numero')+1;

 ?>
<style>
	h3{
color: blue;		
	}
</style>

<h3><i class="glyphicon glyphicon-ok"></i> Recibo de Egreso de Caja # <?php echo $numero; ?></h3> 