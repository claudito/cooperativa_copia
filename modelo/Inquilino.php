<?php 
class Inquilino{


protected $nombres;
protected $apellidos;
protected $dni;
protected $telefono;
protected $direccion_1;
protected $direccion_2;
protected $correo;
protected $area;



function __construct($nombres='',$apellidos='',$dni='',$telefono='',$direccion_1='',$direccion_2='',$correo='',$area='')
{
  
  
  $this->nombres    	=  $nombres;
  $this->apellidos  	=  $apellidos;
  $this->dni        	=  $dni;
  $this->telefono   	=  $telefono;
  $this->direccion_1   	=  $direccion_1;
  $this->direccion_2   	=  $direccion_2;
  $this->correo     	=  $correo;
  $this->area     		=  $area;
 

}

function agregar (){

	$conexion  =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO inquilino(nombres,apellidos,dni,telefono,direccion_1,direccion_2,correo,area)
	 VALUES(:nombres,:apellidos,:dni,:telefono,:direccion_1,:direccion_2,:correo,:area)";

    $statement    = $db->prepare($query);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':telefono',$this->telefono);
	$statement->bindParam(':direccion_1',$this->direccion_1);
	$statement->bindParam(':direccion_2',$this->direccion_2);
	$statement->bindParam(':correo',$this->correo);
	$statement->bindParam(':area',$this->area);
	
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
	$query     =  "DELETE FROM inquilino WHERE id=:id";
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
	$query     =  "UPDATE inquilino SET nombres=:nombres,apellidos=:apellidos,dni=:dni,telefono=:telefono,direccion_1=:direccion_1,direccion_2=:direccion_2,correo=:correo,area=:area WHERE id=:id";

	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':telefono',$this->telefono);
	$statement->bindParam(':direccion_1',$this->direccion_1);
	$statement->bindParam(':direccion_2',$this->direccion_2);
	$statement->bindParam(':correo',$this->correo);
	$statement->bindParam(':area',$this->area);

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
$query      =  "SELECT i.id, i.nombres, i.apellidos, i.dni, i.telefono, i.direccion_1, i.direccion_2, i.correo, a.id AS id_area, a.descripcion as area
FROM inquilino as i
LEFT JOIN area AS a ON i.area = a.id WHERE i.id=:id";
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
$query      =  "SELECT i.id, i.nombres, i.apellidos, i.dni, i.telefono, i.direccion_1, i.direccion_2, i.correo, a.id AS id_area, a.descripcion as area
FROM inquilino as i
LEFT JOIN area AS a ON i.area = a.id ORDER BY i.id";
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
$query      =  "SELECT i.id, concat(i.nombres,' ',i.apellidos) as nombres, i.dni,i.ruc,i.direccion_1,i.direccion_2 ,i.telefono,i.correo,i.fecha_inicio,i.fecha_fin,i.fecha_creacion,a.id AS id_area, a.descripcion as area
FROM inquilino as i LEFT JOIN area AS a ON i.area = a.id ORDER BY i.id";
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