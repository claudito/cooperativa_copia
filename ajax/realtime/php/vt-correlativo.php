<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('vt','numero')+1;

 ?>

 Gasto de Venta # <?php echo $numero; ?>