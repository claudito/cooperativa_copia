<?php 
class Compra_det{

protected $id_compra_cab;
protected $descripcion;
protected $cantidad;
protected $precio_uni;
protected $precio_total;




function __construct($id_compra_cab='',$descripcion='',$cantidad='',$precio_uni='',$precio_total)
{
  
     $this->id_compra_cab    =  $id_compra_cab;
     $this->descripcion    =  $descripcion;
     $this->cantidad    =  $cantidad;
     $this->precio_uni    =  $precio_uni;
     $this->precio_total    =  $precio_total;

}

function agregar ()
{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO compra_det(id_compra_cab,descripcion,cantidad,precio_uni)
	 VALUES(:id_compra_cab,:descripcion,:cantidad,:precio_uni)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id_compra_cab',$this->id_compra_cab);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':cantidad',$this->cantidad);
	$statement->bindParam(':precio_uni',$this->precio_uni);
	
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
	$query     =  "DELETE FROM compra_det WHERE id=:id";
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
	$query     =  "UPDATE  compra_det SET descripcion=:descripcion,cantidad=:cantidad,precio_uni=:precio_uni WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':cantidad',$this->cantidad);
	$statement->bindParam(':precio_uni',$this->precio_uni);

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
$query      =  "SELECT  * FROM compra_det WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
	
} catch (Exception $e) {
	
echo "Error: ".$e->getMenssage();

}

}

function lista($id)
{
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM compra_det WHERE id_compra_cab=:id ORDER BY id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}

}


 ?>