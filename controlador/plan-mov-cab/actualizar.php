
<?php 

include'../../autoload.php';


$numero          =  $_POST['numero'];
$personal        =  $_POST['personal'];
$fecha_emision   =  $_POST['fecha_emision'];

$mensaje  =  new Mensaje();
$objeto   =  new Plan_mov_cab($numero,$personal,$fecha_emision);

$valor    =  $objeto->actualizar($numero);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>