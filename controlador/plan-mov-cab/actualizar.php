
<?php 

include'../../autoload.php';


$numero              =  $_POST['id'];
$mes             =  $_POST['mes'];
$trabajador      =  $_POST['trabajador'];
$dni             =  $_POST['dni'];
$cargo           =  $_POST['cargo'];
$fecha_emision   =  $_POST['fecha_emision'];



$mensaje  =  new Mensaje();
$area  =  new Plan_mov_cab($numero,$trabajador,$cargo,$mes,$dni,$fecha_emision,'');

$valor    =  $area->actualizar($numero);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>