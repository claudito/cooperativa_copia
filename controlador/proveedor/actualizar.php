
<?php 

include'../../autoload.php';


$id        =  $_POST['id'];
$razon_social    =  $_POST['razon_social'];
$direccion   =  $_POST['direccion'];
$ruc       =  $_POST['ruc'];
$tipo_documento       =  $_POST['tipo_documento'];


$mensaje  =  new Mensaje();
$producto  =  new Proveedor($razon_social,$direccion,$ruc,$tipo_documento);
$valor    =  $producto->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>