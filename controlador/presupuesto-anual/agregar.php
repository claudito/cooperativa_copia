<?php 

include'../../autoload.php';
include'../../session.php';

$mensaje   =  new Mensaje();

$anio      =  $_POST['anio'];

$producto  =  new Producto();

foreach ($producto->lista() as $key_p => $value_p) 
{
	
    
   $mes     = new Presupuesto_anual();
   foreach ($mes->lista_mes() as $key_m => $value_m) 
   {
   	 
   	 $presupuesto_anual =  new Presupuesto_anual($value_p['id'],$anio,$value_m['codigo']);
   	 $presupuesto_anual->agregar();

   }


}

$_SESSION[KEY.ANIO_PA] = $anio;



$mensaje->sweetalert('Presupuesto '.$anio.'','success','...',2);


 ?>

