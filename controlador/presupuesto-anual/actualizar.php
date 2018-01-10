<?php 

include "../../autoload.php";
include'../../session.php';
  
$mensaje     = new Mensaje;
$anio        =  $_POST['anio'];
$id_producto =  $_POST['id_producto'];

foreach ($_POST['mes'] as $key => $value) {

 $key    =  str_pad($key+1,2,'00',STR_PAD_LEFT);
 $objeto =  new Presupuesto_anual($id_producto,$anio,$key,$value);
 $valor  = $objeto->actualizar();
    
if ($valor == 'ok') 
{

$mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);
}
else 
{
$mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}


}



 ?>
