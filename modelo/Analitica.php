<?php 
class Analitica
{


function total_egresos_caja_mensual($mes)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT sum(monto)monto,id_documento,d.descripcion,e.fecha_registro FROM egresos_caja as e 
INNER JOIN documento_interno as d ON e.id_documento=d.id
WHERE date_format(fecha_registro,'%Y-%m')=:mes
group by id_documento ORDER BY d.descripcion;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function total_conceptos_mensual($mes)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT tc.descripcion concepto,tc.costo,tc.pago,tc.fecha FROM (SELECT id,descripcion,IFNULL(p.costo,0.00)costo,IFNULL(p.pago,0.00)pago,
date_format(p.fecha,'%Y-%m')fecha FROM concepto as c 
LEFT JOIN (SELECT p.id_concepto,SUM(p.costo)costo,SUM(p.pago)pago,fecha,p.tipo FROM pago as p 
WHERE date_format(p.fecha,'%Y-%m')=:mes 
GROUP BY p.id_concepto,date_format(p.fecha,'%Y-%m'))as p 
ON c.id=p.id_concepto)as tc  where fecha is not null order by descripcion";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function saldo_comerciante($mes,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,
p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=p.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE DATE_FORMAT(p.fecha_pago,'%Y-%m')=:mes and puesto.tipo_socio=:tipo
GROUP BY codigo_puesto,id_concepto;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function saldo_comerciante_diario($fecha,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,
p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=p.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE p.fecha_pago=:fecha and puesto.tipo_socio=:tipo
GROUP BY codigo_puesto,id_concepto;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}





function puesto_concepto_mes_cab($mes,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.nombres,puesto.apellidos FROM pago as p 
INNER JOIN (SELECT c.tipo,cp.codigo_puesto,c.nombres,c.apellidos FROM comerciante_puesto as cp 
LEFT JOIN  comerciante as c  ON cp.id_comerciante=c.id
LEFT JOIN  puesto as p ON cp.codigo_puesto=p.codigo)puesto ON p.codigo_puesto=puesto.codigo_puesto
WHERE date_format(fecha_pago,'%Y-%m')=:mes AND puesto.tipo=:tipo
GROUP BY codigo_puesto,date_format(fecha_pago,'%Y-%m');
";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function puesto_concepto_mes_det($mes,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,
p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=puesto.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE DATE_FORMAT(p.fecha_pago,'%Y-%m')=:mes and puesto.tipo_socio=:tipo
GROUP BY codigo_puesto,id_concepto;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function puesto_concepto_diario_cab($fecha,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.nombres,puesto.apellidos FROM pago as p 
INNER JOIN (SELECT c.tipo,cp.codigo_puesto,c.nombres,c.apellidos FROM comerciante_puesto as cp 
LEFT JOIN  comerciante as c  ON cp.id_comerciante=c.id
LEFT JOIN  puesto as p ON cp.codigo_puesto=p.codigo)puesto ON p.codigo_puesto=puesto.codigo_puesto
WHERE fecha_pago=:fecha AND puesto.tipo=:tipo
GROUP BY codigo_puesto,fecha_pago;
";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function puesto_concepto_diario_det($fecha,$tipo)
{

try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT p.codigo_puesto,puesto.estado,puesto.tipo_puesto,puesto.nombres,puesto.apellidos,
puesto.tipo_socio,p.id_concepto,concepto.descripcion,sum(p.costo)costo,sum(p.pago)pago,
p.tipo,p.fecha_pago,p.fecha_vencimiento
 FROM pago as p
INNER JOIN (SELECT cp.id_comerciante,c.nombres,c.apellidos,c.tipo as tipo_socio,cp.codigo_puesto,p.estado,p.tipo as tipo_puesto FROM comerciante_puesto as cp 
INNER JOIN  comerciante as c  ON cp.id_comerciante=c.id
INNER JOIN  puesto as p ON cp.codigo_puesto=p.codigo)AS puesto ON p.codigo_puesto=puesto.codigo_puesto
INNER JOIN (SELECT id,descripcion FROM concepto) as concepto ON p.id_concepto=concepto.id
WHERE p.fecha_pago=:fecha and puesto.tipo_socio=:tipo
GROUP BY codigo_puesto,id_concepto;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':fecha',$fecha);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function egresos_caja($mes)
{
	
try {

$conexion   =  Conexion::get_conexion();
$query      =  "
SELECT e.id,e.monto, e.numero,e.monto_letras,e.concepto,e.fecha_registro, p.id as id_personal,d.descripcion as documento,concat(p.nombres,' ',p.apellidos) as personal
FROM egresos_caja as e 
INNER JOIN personal as p ON e.id_personal = p.id
INNER JOIN documento_interno as d ON e.id_documento=d.id
WHERE date_format(fecha_registro,'%Y-%m')=:mes;";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}


function gasto_movilidad($mes)
{

try {

$conexion   =  Conexion::get_conexion();
$query     = "SELECT c.id,c.numero,p.nombres,p.apellidos,c.fecha_emision,costo FROM 
plan_mov_cab as c INNER JOIN personal as p 
ON c.id_personal=p.id
INNER JOIN (SELECT numero,SUM(viaje)costo FROM plan_mov_det
GROUP BY numero)AS d ON  c.numero=d.numero 
WHERE date_format(c.fecha_emision,'%Y-%m')=:mes";
$statement = $conexion->prepare($query);
$statement->bindParam(':mes',$mes);
$statement->execute();
$result = $statement->fetchAll();
return $result;
} catch (Exception $e) {
echo "ERROR: " . $e->getMessage();
}


}






}



 ?>