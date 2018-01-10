<?php 
class Tipo_cambio{


protected $fecha;
protected $compra;
protected $venta;




function __construct($fecha='',$compra='',$venta='')
{
  
     
     $this->fecha    =  $fecha;
     $this->compra   =  $compra;
     $this->venta    =  $venta;

}

function agregar ()
{

	$db         =  Conexion::get_conexion();
	$query     =  "INSERT INTO tipo_cambio(fecha,compra,venta)
	 VALUES(:fecha,:compra,:venta)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':fecha',$this->fecha);
	$statement->bindParam(':compra',$this->compra);
	$statement->bindParam(':venta',$this->venta);
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
 

 function eliminar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM tipo_cambio WHERE id=:id";
	$statement    = $db->prepare($query);
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
	
}

function actualizar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE  tipo_cambio SET fecha=:fecha,compra=:compra,venta=:venta WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':fecha',$this->fecha);
	$statement->bindParam(':compra',$this->compra);
	$statement->bindParam(':venta',$this->venta);
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


function consulta($id,$campo)
{
	
try {
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM tipo_cambio WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMenssage();

}

}

function lista()
{
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM tipo_cambio ORDER BY id";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}

}


 ?>