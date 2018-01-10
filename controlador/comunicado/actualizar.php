<?php 

include'../../autoload.php';
include'../../session.php';

$id          =  $_POST['id'];
$asunto      =  Funciones::validar_xss($_POST['asunto']);
$fecha       =  $_POST['fecha'];
$contenido   =  Funciones::validar_xss($_POST['contenido']);
$estado      =  $_POST['estado'];
$comunicado  =  new Comunicado($asunto,$fecha,'',$contenido,$estado);
$valor       =  $comunicado->actualizar($id);

if ($valor=='ok') 
{ 
Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);
}
else 
{
Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}

 ?>