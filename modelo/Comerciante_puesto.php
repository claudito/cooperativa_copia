<?php 
class Comerciante_puesto{

protected $comerciante;
protected $puesto;


function __construct($comerciante='',$puesto='')
{
  
 $this->comerciante        = $comerciante;
 $this->puesto             = $puesto;

}

function agregar (){

$conexion  =  Conexion::get_conexion();
$query     =  "SELECT * FROM comerciante_puesto WHERE id_comerciante=:comerciante AND codigo_puesto=:puesto";
$statement = $conexion->prepare($query);
$statement->bindParam(':comerciante',$this->comerciante);
$statement->bindParam(':puesto',$this->puesto);
$statement->execute();
$result    = $statement->fetchAll();
if (count($result)>0)
{
 return "existe";
}
else
{
 
$query  =  "INSERT INTO comerciante_puesto(id_comerciante,codigo_puesto)
VALUES(:comerciante,:puesto)";
$statement    = $conexion->prepare($query);
$statement->bindParam(':comerciante',$this->comerciante);
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
 

function eliminar($id)
{

	$conexion  =  Conexion::get_conexion();
	$query     =  "DELETE FROM comerciante_puesto WHERE id=:id";
	$statement = $conexion->prepare($query);
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



function lista()
{
	
try {

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT cp.id,c.nombres,c.apellidos,c.razon_social,c.ruc,p.codigo puesto,
p.id idpuesto,
p.descripcion,UPPER(p.estado)estado,UPPER(p.tipo)tipo
FROM comerciante_puesto as cp
INNER JOIN comerciante as c ON cp.id_comerciante=c.id
INNER JOIN puesto as p ON cp.codigo_puesto=p.id ORDER by p.codigo";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}


function consulta($puesto,$campo)
{
	
try {

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT cp.id,c.nombres,c.apellidos,c.razon_social,c.ruc,p.codigo puesto,
p.id idpuesto,
p.descripcion,UPPER(p.estado)estado,UPPER(p.tipo)tipo,c.telefono,c.celular,
c.correo
FROM comerciante_puesto as cp
INNER JOIN comerciante as c ON cp.id_comerciante=c.id
INNER JOIN puesto as p ON cp.codigo_puesto=p.id WHERE p.id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$puesto);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}




function comerciante()
{
	
try {

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT id,nombres,apellidos,ruc,razon_social,tipo FROM comerciante ORDER BY nombres";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}


function puesto()
{
	
try {

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT id,codigo,UPPER(tipo)tipo,UPPER(estado)estado FROM puesto
WHERE id NOT IN (SELECT codigo_puesto FROM comerciante_puesto) ORDER BY codigo";
$statement  =  $conexion->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;

} catch (Exception $e) {
	

  echo "Error:".$e->getMessage();

}


}




}


 ?>