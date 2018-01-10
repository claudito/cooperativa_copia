<?php 

class Detalle_concepto
{

protected $tipo;
protected $usuario;
protected $id_concepto;
protected $costo;
protected $puesto;

function __construct($tipo='',$usuario='',$id_concepto='',$costo='',$puesto='')
{
	$this->tipo 			= $tipo;
	$this->usuario 	        = $usuario;
	$this->id_concepto 		= $id_concepto;
	$this->costo 			= $costo;
	$this->puesto           = $puesto;
}


function agregar()
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query      = "SELECT * FROM detalle_concepto WHERE tipo=:tipo AND usuario=:usuario AND id_concepto=:id_concepto AND puesto=:puesto";
	$statement  = $db->prepare($query);
	$statement->bindParam(':tipo',$this->tipo);
	$statement->bindParam(':usuario',$this->usuario);
	$statement->bindParam(':id_concepto',$this->id_concepto);
	$statement->bindParam(':puesto',$this->puesto);
	$statement->execute();
	$result     =  $statement->fetchAll();
	if (count($result)>0) 
	{
	  return "existe";
	} 
	else
	{
	
    $query     	=  "INSERT INTO detalle_concepto(tipo,usuario,id_concepto,costo,puesto)
	 VALUES(:tipo,:usuario,:id_concepto,:costo,:puesto)";
	$statement  = $db->prepare($query);
	$statement->bindParam(':tipo',$this->tipo);
	$statement->bindParam(':usuario',$this->usuario);
	$statement->bindParam(':id_concepto',$this->id_concepto);
	$statement->bindParam(':costo',$this->costo);
	$statement->bindParam(':puesto',$this->puesto);

	if ($statement) 
	{   
		$statement->execute();
		return "ok";
	} 
	else 
	{
		return "error";
	}


	}



}


function lista()
{

try {

$conexion = new Conexion();
$db       = $conexion->get_conexion();
$query    =  "SELECT d.id, d.tipo, d.usuario, c.descripcion AS concepto, d.costo,d.puesto
FROM detalle_concepto as d
INNER JOIN concepto as c on d.id_concepto = c.id  WHERE
d.tipo=:tipo AND d.usuario=:usuario
ORDER BY d.id";
$statement = $db->prepare($query);
$statement->bindParam(':tipo',$this->tipo);
$statement->bindParam(':usuario',$this->usuario);
$statement->execute();
$result    = $statement->fetchAll();
return $result;


	
} catch (Exception $e) {
	
	echo "Error: ".$e->getMessage();
}

}



function eliminar($id)
{

try {

$conexion = new Conexion();
$db       = $conexion->get_conexion();
$query    = "DELETE FROM detalle_concepto WHERE id=:id";
$statement= $db->prepare($query);
$statement->bindParam(':id',$id);
if ($statement) 
{
$statement->execute();
return "ok";
} 
else
{
return "error";
}
	
} catch (Exception $e) {
	
 echo "Error: ".$e->getMessage();

}


}






function concepto()
{
	
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM concepto";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function actualizar($id,$campo,$costo)
{

try {
	
$conexion  = new Conexion();
$db        = $conexion->get_conexion();
$query     = "UPDATE detalle_concepto SET ".$campo."=:costo WHERE id=:id";
$statement = $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':costo',$costo);
if ($statement) 
{
   $statement->execute();
   return "ok";
}
else
{
   return "error";
}


} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}




}



 ?>