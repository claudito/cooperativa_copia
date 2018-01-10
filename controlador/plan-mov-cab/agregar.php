<?php 

include'../../autoload.php';
include'../../session.php';

$correlativo    = new Correlativo();

$numero      	= $correlativo->correlativo('GM','numero')+1;
$personal   	= $_POST['personal'];
$fecha          = $_POST['fecha'];

$plan_mov_cab   = new Plan_mov_cab($numero,$personal,$fecha);
$valor          = $plan_mov_cab->agregar();

if ($valor=='ok') 
{
 
Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
$correlativo  =  new Correlativo('GM','',1);
$correlativo->actualizar_correlativo();

}
else 
{
 Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

