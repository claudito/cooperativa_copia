
<?php 

include'../../autoload.php';


$id        		    = $_POST['id'];
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


$mensaje  =  new Mensaje();
$socio_negocio  =  new Socio_negocio($codigo,$ruc,$razon_social,$contacto,$direccion1,$direccion2,$telefono1,
$telefono2,$cuenta_bancaria,$comentario,$tipo);
$valor    =  $socio_negocio->actualizar($id);

if ($valor=='ok') 
{
 
 $mensaje->sweetalert('Buen Trabajo','success','Datos Actualizados Correctamente',2);

}
else 
{
  $mensaje->sweetalert('Error','error','Consulte al área de Soporte',2);
}



 ?>