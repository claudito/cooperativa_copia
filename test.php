<?php 


$fecha = new DateTime('2018-03-01');

$fecha->modify('-1 month');
echo $fecha->format('Y-m-d') . "\n";




 ?>