<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('AA','numero')+1;

 ?>

 Area Numero # <?php echo $numero; ?>