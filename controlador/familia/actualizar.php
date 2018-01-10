
<?php 

include'../../autoload.php';


$id        =  $_POST['id'];
$codigo    =$_POST['codigo'];
$descripcion   =  $_POST['descripcion'];



$mensaje  =  new Mensaje();
$concepto  =  new Familia($codigo,$descripcion);
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