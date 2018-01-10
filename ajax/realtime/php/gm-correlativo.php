<?php

include'../../../autoload.php';

$correlativo  =  new Correlativo();
$numero       =  $correlativo->correlativo('GM','numero')+1;

 ?>

 Documento N° <?php echo $numero; ?>