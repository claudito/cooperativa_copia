<?php 

include'../../autoload.php';
include'../../session.php';

$id            =  $_POST['id'];
$fecha_gasto   =  $_POST['fecha'];
$motivo        =  $_POST['motivo'];
$destino       =  $_POST['destino'];
$viaje         =  $_POST['costo'];
$tipo          =  $_POST['tipo'];

foreach ($id as $key => $value_id) {
	
$value_fecha_gasto = $fecha_gasto[$key];
$value_motivo      = $motivo[$key];
$value_destino     = $destino[$key];
$value_viaje       = $viaje[$key];
$value_tipo        = $tipo[$key];
  
$objeto  =  new Plan_mov_det('?',$value_fecha_gasto,$value_motivo,$value_destino,$value_viaje,$value_tipo);
$valor   =  $objeto->actualizar($value_id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
 Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}



}








 ?>