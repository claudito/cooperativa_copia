<?php 
class Day
{


function diario($year,$month)
{
try {
	
$conexion   = Conexion::get_conexion();
$query      =  "SELECT  *  FROM day where year=:year AND month=:month";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':year',$year);
$statement->bindParam('month',$month);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}




}


 ?>