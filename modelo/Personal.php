<?php 

class Personal

{

protected $nombres;
protected $apellidos;
protected $dni;
protected $ruc;
protected $razon_social;
protected $telefono;
protected $celular;
protected $direccion;
protected $correo;
protected $cargo;




function __construct($nombres='',$apellidos='',$dni='',$ruc='',$razon_social='',$telefono='',$celular='',$direccion='',$correo='',$cargo='')
{
  
  
  $this->nombres  		=  $nombres;
  $this->apellidos      =  $apellidos;
  $this->dni        	=  $dni;
  $this->ruc        	=  $ruc;
  $this->razon_social   =  $razon_social;
  $this->telefono   	=  $telefono;
  $this->celular   		=  $celular;
  $this->direccion   	=  $direccion;
  $this->correo     	=  $correo;
  $this->cargo     		=  $cargo;
 

}

function agregar (){

	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO personal(nombres,apellidos,dni,ruc,razon_social,direccion,telefono,celular,correo,cargo)
	 VALUES(:nombres,:apellidos,:dni,:ruc,:razon_social,:direccion,:telefono,:celular,:correo,:cargo)";

    $statement    = $db->prepare($query);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':direccion',$this->direccion);
	$statement->bindParam(':telefono',$this->telefono);
	$statement->bindParam(':celular',$this->celular);
	$statement->bindParam(':correo',$this->correo);
	$statement->bindParam(':cargo',$this->cargo);
	
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

	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM personal WHERE id=:id";
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
$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "UPDATE personal SET nombres=:nombres,apellidos=:apellidos,dni=:dni,ruc=:ruc,razon_social=:razon_social,direccion=:direccion ,telefono=:telefono,celular=:celular,correo=:correo,cargo=:cargo WHERE id=:id";

	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':direccion',$this->direccion);
	$statement->bindParam(':telefono',$this->telefono);
	$statement->bindParam(':celular',$this->celular);
	$statement->bindParam(':correo',$this->correo);
	$statement->bindParam(':cargo',$this->cargo);

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
$query      =  "SELECT * FROM personal WHERE id=:id";
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
$query      =  "SELECT * FROM personal ORDER BY nombres";
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