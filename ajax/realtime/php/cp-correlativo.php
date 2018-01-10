<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('CP','numero')+1;

 ?>

 Recibo de Concepto De Pago # <?php echo $numero; ?>