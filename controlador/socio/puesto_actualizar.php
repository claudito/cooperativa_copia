<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje         =  new Mensaje();

if (count($_POST['id'])>0) 
{

$id_socio       =  $_POST['id'];
$codigo_puesto  =  $_POST['codigo_puesto'];
$descripcion  	=  $_POST['descripcion'];

foreach ($id_socio as $key_id => $value_id) 
{
   
$value_codigo_puesto    = $codigo_puesto[$key_id];
$value_descripcion  	= $descripcion[$key_id];

$objeto 	= new Socio_puesto('',$value_codigo_puesto,$value_descripcion);
$valor 		= $objeto->actualizar($value_id);

switch ($valor) 

{
	case 'ok':
	$mensaje->sweetalert('Buen Trabajo','success','Registro Actualizado',2);
		break;
	
	default:
	$mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
		break;
} 


}

} 
else
{
$mensaje->sweetalert('Lista Vacía','warning','No hay registros disponibles para actualizar',2);
}




 ?>