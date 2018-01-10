
<?php 

include'../../autoload.php';


$id        =  $_POST['id'];
$codigo_socio_negocio  =$_POST['razon'];

$serie   =  $_POST['serie'];
$numero   =  $_POST['numero'];


$fecha_documento   =  $_POST['fecha_documento'];

$mensaje  =  new Mensaje();
$concepto  =  new Compra_cab($serie,$numero,$codigo_socio_negocio,$fecha_documento);
$valor    =  $concepto->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>