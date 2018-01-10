<?php 
class Comerciante{

protected $nombres;
protected $apellidos;
protected $dni;
protected $ruc;
protected $razon_social;
protected $direccion;
protected $telefono;
protected $celular;
protected $correo;
protected $area;
protected $fecha_ingreso;
protected $fecha_salida;
protected $tipo;


function __construct($nombres='',$apellidos='',$dni='',$ruc='',$razon_social='',$direccion='',$telefono='',$celular='',$correo='',$area='',$fecha_ingreso='',$fecha_salida='',$tipo='')
{
  
 $this->nombres        = $nombres;
 $this->apellidos      = $apellidos;
 $this->dni            = $dni;
 $this->ruc            = $ruc;
 $this->razon_social   = $razon_social;
 $this->direccion      = $direccion;
 $this->telefono       = $telefono;
 $this->celular        = $celular;
 $this->correo         = $correo;
 $this->area           = $area;
 $this->fecha_ingreso  = $fecha_ingreso;
 $this->fecha_salida   = $fecha_salida;
 $this->tipo           = $tipo;

}

function agregar (){

	$conexion  =  Conexion::get_conexion();
	$query     =  "INSERT INTO comerciante(nombres,apellidos,dni,ruc,razon_social,direccion,telefono,
	celular,correo,id_area,fecha_ingreso,fecha_salida,tipo)
	 VALUES(:nombres,:apellidos,:dni,:ruc,:razon_social,:direccion,:telefono,:celular,:correo,:area,
	 :fecha_ingreso,:fecha_salida,:tipo)";
	$statement    = $conexion->prepare($query);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
	$statement->bindParam(':dni',$this->dni);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':direccion',$this->direccion);
	$statement->bindParam(':telefono',$this->telefono);
	$statement->bindParam(':celular',$this->celular);
	$statement->bindParam(':correo',$this->correo);
	$statement->bindParam(':area',$this->area);
	$statement->bindParam(':fecha_ingreso',$this->fecha_ingreso);
	$statement->bindParam(':fecha_salida',$this->fecha_salida);
	$statement->bindParam(':tipo',$this->tipo);

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

	$conexion  =  Conexion::get_conexion();
	$query     =  "DELETE FROM comerciante WHERE id=:id";
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

function actualizar ($id)
{

	$conexion  =  Conexion::get_conexion();
	$query     =  "UPDATE  comerciante SET nombres=:nombres,apellidos=:apellidos,
	dni=:dni,ruc=:ruc,razon_social=:razon_social,telefono=:telefono,direccion=:direccion,celular=:celular,correo=:correo,id_area=:area,fecha_ingreso=:fecha_ingreso,tipo=:tipo WHERE id=:id";
	$statement    = $conexion->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':nombres',$this->nombres);
	$statement->bindParam(':apellidos',$this->apellidos);
    $statement->bindParam(':dni',$this->dni);
    $statement->bindParam(':ruc',$this->ruc);
    $statement->bindParam(':razon_social',$this->razon_social);
    $statement->bindParam(':telefono',$this->telefono);
    $statement->bindParam(':direccion',$this->direccion);
    $statement->bindParam(':celular',$this->celular);
    $statement->bindParam(':correo',$this->correo);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':fecha_ingreso',$this->fecha_ingreso);
    $statement->bindParam(':tipo',$this->tipo);
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

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT c.id,c.nombres,c.apellidos,c.dni,c.ruc,c.razon_social,c.direccion,c.telefono,c.correo,c.celular,c.id_area,c.fecha_ingreso,c.fecha_salida,c.tipo,a.descripcion area
 FROM comerciante c INNER JOIN area a ON c.id_area=a.id WHERE c.id=:id";
$statement  =  $conexion->prepare($query);
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

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT c.id,c.nombres,c.apellidos,c.dni,c.ruc,c.razon_social,c.direccion,c.telefono,c.correo,c.celular,a.descripcion as area,c.fecha_ingreso,c.fecha_salida,c.tipo,a.descripcion area
 FROM comerciante c INNER JOIN area a ON c.id_area=a.id ORDER BY c.nombres";
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