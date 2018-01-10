<?php 

include'../../autoload.php';
include'../../session.php';

$comerciante =  Funciones::validar_xss($_POST['comerciante']);
$puesto      =  Funciones::validar_xss($_POST['puesto']);

$objeto    = new Comerciante_puesto($comerciante,$puesto);

$valor   =  $objeto->agregar();


switch ($valor) {
case 'existe':
Mensaje::sweetalert('Registro Duplicado','warning','Los Datos ya estan registrados',2);
break;
case 'ok':
Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
break;
default:
Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
break;
}






?>

