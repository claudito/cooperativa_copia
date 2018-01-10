<?php 
class Socio_negocio{

protected $codigo;
protected $ruc;
protected $razon_social;
protected $contacto;
protected $direccion1;
protected $direccion2;
protected $telefono1;
protected $telefono2;
protected $cuenta_bancaria;
protected $comentario;
protected $tipo;


function __construct($codigo='',$ruc='',$razon_social='',$contacto='',$direccion1='',$direccion2='',
	$telefono1='',$telefono2='',$cuenta_bancaria='',$comentario='',$tipo='')
{
  
  $this->codigo          =  $codigo;
  $this->ruc             =  $ruc;
  $this->razon_social    =  $razon_social;
  $this->contacto        =  $contacto;
  $this->direccion1      =  $direccion1;
  $this->direccion2      =  $direccion2;
  $this->telefono1       =  $telefono1;
  $this->telefono2       =  $telefono2;
  $this->cuenta_bancaria =  $cuenta_bancaria;
  $this->comentario      =  $comentario;
  $this->tipo            =  $tipo;

}

function agregar (){

	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "INSERT INTO socio_negocio(codigo,ruc,razon_social,contacto,direccion1,direccion2,
	telefono1,telefono2,cuenta_bancaria,comentario,tipo)
	 VALUES(:codigo,:ruc,:razon_social,:contacto,:direccion1,:direccion2,:telefono1,:telefono2,
	 :cuenta_bancaria,:comentario,:tipo)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':codigo',$this->codigo);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':contacto',$this->contacto);
	$statement->bindParam(':direccion1',$this->direccion1);
	$statement->bindParam(':direccion2',$this->direccion2);
	$statement->bindParam(':telefono1',$this->telefono1);
	$statement->bindParam(':telefono2',$this->telefono2);
	$statement->bindParam(':cuenta_bancaria',$this->cuenta_bancaria);
	$statement->bindParam(':comentario',$this->comentario);
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
	$conexion   =  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     =  "DELETE FROM socio_negocio WHERE id=:id";
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
	$query     =  "UPDATE  socio_negocio SET 
	codigo=:codigo,
	ruc=:ruc,
	razon_social=:razon_social,
	contacto=:contacto,
	direccion1=:direccion1,
	direccion2=:direccion2,
	telefono1=:telefono1,
	telefono2=:telefono2,
	cuenta_bancaria=:cuenta_bancaria,
	comentario=:comentario,
	tipo=:tipo
	
	 WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':codigo',$this->codigo);
	$statement->bindParam(':ruc',$this->ruc);
	$statement->bindParam(':razon_social',$this->razon_social);
	$statement->bindParam(':contacto',$this->contacto);
	$statement->bindParam(':direccion1',$this->direccion1);
	$statement->bindParam(':direccion2',$this->direccion2);
	$statement->bindParam(':telefono1',$this->telefono1);
	$statement->bindParam(':telefono2',$this->telefono2);
	$statement->bindParam(':cuenta_bancaria',$this->cuenta_bancaria);
	$statement->bindParam(':comentario',$this->comentario);
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
$query      =  "SELECT  * FROM socio_negocio WHERE id=:id";
$statement  =  $conexion->prepare($query);
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

$conexion   =  Conexion::get_conexion();
$query      =  "SELECT  * FROM socio_negocio ORDER BY id";
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