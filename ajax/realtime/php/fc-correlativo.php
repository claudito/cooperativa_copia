<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('FC','numero')+1;

 ?>

 Agregar Comunicado # <?php echo $numero; ?>