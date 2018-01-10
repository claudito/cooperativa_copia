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











}


 ?>