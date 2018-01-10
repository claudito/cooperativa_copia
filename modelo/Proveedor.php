<?php 
class Proveedor{


protected $razon_social;
protected $direccion;
protected $ruc;
protected $tipo_documento;


function __construct($razon_social='',$direccion='',$ruc='',$tipo_documento='')
{
  
  
  $this->razon_social    =  $razon_social;
  $this->direccion  =  $direccion;
  $this->ruc  =  $ruc;
  $this->tipo_documento  =  $tipo_documento;
  

}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO proveedor(razon_social,direccion,ruc,tipo_documento)
	 VALUES(:razon_social,:direccion,:ruc,:tipo_documento)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':direccion',$this->direccion);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':tipo_documento',$this->tipo_documento);
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
	$query     =  "DELETE FROM proveedor WHERE id=:id";
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

function actualizar ($id)
{

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE  proveedor SET razon_social=:razon_social,direccion=:direccion,ruc=:ruc,tipo_documento=:tipo_documento WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':direccion',$this->direccion);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':tipo_documento',$this->tipo_documento);
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
$query      =  "SELECT  * FROM proveedor WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}


function lista()
{
	
try {

$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM proveedor";
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