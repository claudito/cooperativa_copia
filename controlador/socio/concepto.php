<?php 


include'../../autoload.php';
include'../../session.php';

$mensaje     = new Mensaje();


$concepto    = $_POST['concepto'];
$costo       = $_POST['monto'];
$tipo        = $_POST['tipo'];
$usuario     = $_POST['id'];

$puesto_det  = new Puesto_det($tipo,$usuario); 


if (count($puesto_det->lista())>0) 
{

 foreach ($puesto_det->lista() as $key => $value) {
 	
   $objeto  =  new Detalle_concepto($tipo,$usuario,$concepto,$costo,$value['puesto']);
   $valor = $objeto->agregar();
  
   
    switch ($valor) {
    	case 'ok':
    echo '<div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    Concepto Registrado para el Puesto #'.$value["puesto"].'
    </div>';
    		break;
    case 'existe':
    echo '<div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    El concepto ya esta registrado para el Puesto #'.$value["puesto"].'
    </div>';
    		break;
    	default:
    echo '<div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Error
    </div>';
    		break;
    }


 }
  
} 
else 
{

  echo '<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    No tiene puesto asociados,necesita agregar un puesto para crear un concepto de Pago.
  </div>';

}






 ?>