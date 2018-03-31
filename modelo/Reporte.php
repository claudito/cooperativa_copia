<?php 

class Reporte
{


function __construct()
{

}


function planilla_movilidad()
{

try {

$conexion  = Conexion::get_conexion();
$query     = "SELECT c.id,c.numero,p.nombres,p.apellidos,c.fecha_emision,costo FROM 
plan_mov_cab as c INNER JOIN personal as p 
ON c.id_personal=p.id
INNER JOIN (SELECT numero,SUM(viaje)costo FROM plan_mov_det
GROUP BY numero)AS d ON  c.numero=d.numero;";
$statement = $conexion->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
return $result;
} catch (Exception $e) {
echo "ERROR: " . $e->getMessage();
}



}



function cobranza_diaria_socio($fecha)
{

try {

$conexion = Conexion::get_conexion();
$query  =  "CALL SP_COBRANZA_DIARIA_SOCIO(:fecha)";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
}

}

function cobranza_diaria_inquilino($fecha)
{

try {

$conexion = Conexion::get_conexion();
$query  =  "CALL SP_COBRANZA_DIARIA_INQUILINO(:fecha)";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
}

}


function estado_cuenta_anterior($fecha,$puesto,$campo)
{

try {

$conexion = Conexion::get_conexion();
$query  =  "SELECT sum(p.costo)costo,sum(p.pago)pago,sum(p.costo) - sum(p.pago) saldo FROM pago p 
INNER JOIN (SELECT id,descripcion FROM concepto) c ON p.id_concepto=c.id
INNER JOIN (SELECT id_comerciante,codigo_puesto,c.nombres,c.apellidos FROM comerciante_puesto cp 
INNER JOIN comerciante c ON cp.id_comerciante=c.id) com ON p.codigo_puesto=com.codigo_puesto
WHERE SUBSTRING(fecha_pago,1,7)=:fecha AND p.codigo_puesto=:puesto;
";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result    = $statement->fetch();
return  ($result[$campo]==null) ? 0.00 : round($result[$campo],2);

} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
}


}






function estado_cuenta_actual($fecha,$puesto)
{

try {

$conexion = Conexion::get_conexion();
$query  =  "SELECT p.codigo_puesto,CONCAT(com.nombres,' ',com.apellidos)comerciante,c.descripcion concepto,
sum(p.costo)costo,sum(p.pago)pago,p.fecha,p.fecha_pago,p.tipo FROM pago p 
INNER JOIN (SELECT id,descripcion FROM concepto) c ON p.id_concepto=c.id
INNER JOIN (SELECT id_comerciante,codigo_puesto,c.nombres,c.apellidos FROM comerciante_puesto cp 
INNER JOIN comerciante c ON cp.id_comerciante=c.id) com ON p.codigo_puesto=com.codigo_puesto
WHERE SUBSTRING(fecha_pago,1,7)=:fecha AND p.codigo_puesto=:puesto
GROUP BY concepto
ORDER BY tipo,concepto;";
$statement = $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result    = $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
}


}




}


 ?>