<?php 

include'../../autoload.php';
include'../../session.php';

$puesto    = $_POST['puesto'];
$concepto  = $_POST['concepto'];
$costo     = Concepto::consulta($concepto,'costo');
$pago      = 0.00;
$fecha     = $_POST['fecha'];
$year      = substr($fecha,0,4);
$month     = substr($fecha,5,2);
$day       = substr($fecha,8,10);
$tipo      = Concepto::consulta($concepto,'tipo');


if (Concepto::consulta($concepto,'tipo')=='diario') 
{

foreach (Day::diario($year,$month) as $key => $value) {
	
	$day       = substr($value['day'],8,10);
	
    $objeto = new  Pago($puesto,$concepto,$costo,$pago,$value['day'],$month,$year,$day,$tipo);
    $valor  = $objeto->agregar();

    $_SESSION['puesto']    = $puesto;
    $_SESSION['concepto']  = $concepto;
    $_SESSION['month']     = $month;
    $_SESSION['year']      = $year;
    $_SESSION['day']       = $day;
    $_SESSION['tipo']      = $tipo;

}

}
else
{

    $objeto = new  Pago($puesto,$concepto,$costo,$pago,$fecha,$month,$year,$day,$tipo);
    $valor = $objeto->agregar();

    $_SESSION['puesto']    = $puesto;
    $_SESSION['concepto']  = $concepto;
    $_SESSION['month']     = $month;
    $_SESSION['year']      = $year;
    $_SESSION['day']       = $day;
    $_SESSION['tipo']      = $tipo;


}


switch ($valor) {
	case 'ok':
	Mensaje::sweetalert('Buen Trabajo','success','Lista de Pagos Creada',2);
		break;
	case 'existe':
	Mensaje::sweetalert('Registro o Registro duplicados','warning','La Lista de Pagos ya esta Creada para esta Puesto y Concepto',3);
		break;
	default:
	Mensaje::sweetalert('Error','error','Consulte al área de soporte',2);
		break;
}



 ?>