<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje 	= new Mensaje();


$razon_social   		 =  $_POST['razon_social'];
$direccion     =  $_POST['direccion'];
$ruc         =  $_POST['ruc'];
$tipo_documento         =  $_POST['tipo_documento'];



$producto = new Proveedor($razon_social,$direccion,$ruc,$tipo_documento);

$valor   =  $producto->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

