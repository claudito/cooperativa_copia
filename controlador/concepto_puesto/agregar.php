<?php 

include'../../autoload.php';
include'../../session.php';

 $concepto        =  $_POST['concepto'];
 $puesto          =  $_POST['puesto'];

$concepto_puesto  = new Concepto_puesto($concepto,$puesto);
 
       $valor     = $concepto_puesto->agregar();

switch ($valor) {
	case 'ok':
Mensaje::sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);
		break;
	case 'existe':
Mensaje::sweetalert('Registro Duplicado','warning','El Concepto ya se encuentra asociado',2);
		break;
	default:
Mensaje::sweetalert('Error','error','...',2);
		break;
}

 ?>

