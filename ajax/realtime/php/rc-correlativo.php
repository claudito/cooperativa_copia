<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('RC','numero')+1;

 ?>

 Registro de Compra # <?php echo $numero; ?>