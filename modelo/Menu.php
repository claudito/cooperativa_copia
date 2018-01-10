<?php 
class Menu{


protected $descripcion;
protected $item;



function __construct($descripcion='',$item='')
{
  
  
  $this->descripcion    =  $descripcion;
  $this->item  			=  $item;
 
  

}



function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO menu(descripcion,item)
	 VALUES(:descripcion,:item)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':item',$this->item);
	
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
	$query     =  "DELETE FROM menu WHERE id=:id";
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
	$query     =  "UPDATE  menu SET descripcion=:descripcion,item=:item WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':item',$this->item);
	
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
$query      =  "SELECT  * FROM menu WHERE id=:id";
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
$query      =  "SELECT  * FROM menu";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



function lista_nav()
{
	
try {
	
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM menu ORDER BY item";
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