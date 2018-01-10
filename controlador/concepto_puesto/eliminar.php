<?php 

include'../../autoload.php';
include'../../session.php';

 $id        =  $_POST['id'];

 $valor     =  Concepto_puesto::eliminar($id);

switch ($valor) {
	case 'ok':
Mensaje::sweetalert('Buen Trabajo','success','Asociación Eliminada',2);
		break;
	default:
Mensaje::sweetalert('Error','error','...',2);
		break;
}

 ?>

