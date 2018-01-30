
<?php 

include'../../autoload.php';


 $numero         =  $_POST['id'];
 $monto          =  $_POST['monto'];
 $concepto       =  $_POST['concepto'];
 $id_personal    =  $_POST['personal'];
 $documento      =$_POST['documento'];
 $fecha_registro =  $_POST['fecha_registro'];

$mensaje  =  new Mensaje();
$egresos  =  new Egresos($monto,$numero,$concepto,$id_personal,$documento,$fecha_registro);
$valor    =  $egresos->actualizar();

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>