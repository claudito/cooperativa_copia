<?php 

class Venta_det
{

protected $id_compra_cab;
protected $descripcion;
protected $cantidad;
protected $precio_uni;





function __construct($id_compra_cab='',$descripcion='',$cantidad='',$precio_unitario='')
{
  $this->id_compra_cab      =  $id_compra_cab;
  $this->descripcion        =  $descripcion;
  $this->cantidad       	=  $cantidad;
  $this->precio_unitario    =  $precio_unitario;
 
}

function agregar ()
{

  try {
  $conexion   =   Conexion::get_conexion();
  $query     =  "INSERT INTO venta_det(id_compra_cab,descripcion,cantidad,precio_unitario)
   VALUES(:id_compra_cab,:descripcion,:cantidad,:precio_unitario)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':id_compra_cab',$this->id_compra_cab);
  $statement->bindParam(':descripcion',$this->descripcion);
  $statement->bindParam(':cantidad',$this->cantidad);
  $statement->bindParam(':precio_unitario',$this->precio_unitario);

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

  	echo "Error:".$e->getMessage();
    
  }

  

}

 

 function eliminar($id)
{
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM venta_det WHERE id=:id";
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
	$query     =  "UPDATE  venta_det SET descripcion=:descripcion,cantidad=:cantidad,precio_unitario=:precio_unitario WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':cantidad',$this->cantidad);
	$statement->bindParam(':precio_unitario',$this->precio_unitario);

	
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
$query      =  "SELECT  * FROM venta_det WHERE id=:id";
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
$query      =  "SELECT  * FROM venta_det WHERE id_compra_cab=:id ORDER BY id";
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