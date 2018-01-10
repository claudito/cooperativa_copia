<?php 

include'../../autoload.php';
include'../../session.php';
 
$numero   	        =  $_POST['numero'];
$fecha_gasto   	    =  $_POST['fecha'];
$motivo   	        =  Funciones::validar_xss($_POST['motivo']);
$destino   	        =  Funciones::validar_xss($_POST['destino']);
$viaje   			=  $_POST['costo'];
$tipo   			=  $_POST['tipo'];

$plan_mov_det = new Plan_mov_det($numero,$fecha_gasto,$motivo,$destino,$viaje,$tipo);

$valor   =  $plan_mov_det->agregar();

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
 Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>

