<?php 

include'../../autoload.php';
include'../../session.php';

$id      = $_POST['id'];
$text    = $_POST['text'];
$campo   = $_POST['column_name'];
$text    = str_replace(',','.', $text);
$numeric = (is_numeric($text)) ? "si" : "no";

if ($numeric=='si') 
{
  
$objeto  =  new Detalle_concepto();
$valor   =  $objeto->actualizar($id,$campo,$text);

if ($valor=='ok') 
{
echo '<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Monto Actualizado
</div>';
} 
else 
{
echo '<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	Error, Consulte al área de soporte
</div>';
}

} 
else 
{
  echo '<div class="alert alert-danger">
  	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  	El monto no es un valor numérico.
  </div>';
}






 ?>