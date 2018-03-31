<?php 


class Funciones
{


function __construct()
{

}


function validar_xss($cadena)
{
	$cadena = htmlspecialchars(trim($cadena), ENT_QUOTES,'UTF-8');
	return $cadena;
}


function get_edad($fecha_nac)
{


$fecha1 = new DateTime($fecha_nac);
$fecha2 = new DateTime(date('Y-m-d'));
$fecha = $fecha1->diff($fecha2);
//printf('%d años, %d meses, %d días, %d horas, %d minutos', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);
printf('%d', $fecha->y, $fecha->m, $fecha->d, $fecha->h, $fecha->i);


}


function ceros_izq($valor,$ceros)
{
    return sprintf("%0"."".$ceros.""."s", "".$valor."");
}



function get_month($month)
{

switch ($month) {
	case '01':
return "ENERO";
		break;
	case '02':
return "FEBRERO";
		break;
	case '03':
return "MARZO";
		break;
case '04':
return "ABRIL";
		break;
case '05':
return "MAYO";
		break;
case '06':
return "JUNIO";
		break;
case '07':
return "JULIO";
		break;
case '08':
return "AGOSTO";
		break;
case '09':
return "SEPTIEMBRE";
		break;
case '10':
return "OCTUBRE";
		break;

case '11':
return "NOVIENBRE";
		break;
case '12':
return "DICIEMBRE";
		break;
	
	default:
return "-";
		break;
}


}



function get_year($year)
{

switch ($year) {
	case '2016':
return "2016";
		break;
case '2017':
return "2017";
		break;

case '2018':
return "2018";
		break;
case '2019':
return "2019";
		break;
case '2020':
return "2020";
		break;
case '2021':
return "2021";
		break;
case '2022':
return "2022";
		break;

	default:
return "-";
		break;
}

	
}


function dia_anterior($fecha) 
{ 
     $sol = (strtotime($fecha) - 3600); 
    return date('Y-m-d', $sol); 
}  


function mes_anterior($fecha_)
{

$fecha = new DateTime($fecha_);

$fecha->modify('-1 month');
return $fecha->format('Y-m-d');

}



}


 ?>