<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();


$codigo         	= $_POST['codigo'];
$ruc             	= $_POST['ruc'];
$razon_social    	= $_POST['razon_social'];
$contacto 	        = $_POST['contacto'];
$direccion1     	= $_POST['direccion1'];
$direccion2         = $_POST['direccion2'];
$telefono1        	= $_POST['telefono1'];
$telefono2 	        = $_POST['telefono2'];
$cuenta_bancaria 	= $_POST['cuenta_bancaria'];
$comentario 	    = $_POST['comentario'];
$tipo 	            = $_POST['tipo'];
$fecha_creacion 	= $_POST['fecha_creacion'];



$socio_negocio = new Socio_negocio($codigo,$ruc,$razon_social,$contacto,$direccion1,$direccion2,$telefono1,
$telefono2,$cuenta_bancaria,$comentario,$tipo,$fecha_creacion);

$valor   =  $socio_negocio->agregar();


if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Registrados Correctamente',2);


}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}




 ?>

