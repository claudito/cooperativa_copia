<?php 
class SubMenu{


protected $descripcion;
protected $item;
protected $id_menu;
protected $ruta;



function __construct($descripcion='',$item='',$id_menu='',$ruta='')
{
  
  
  $this->descripcion    =  $descripcion;
  $this->item           =  $item;
  $this->id_menu        =  $id_menu;
  $this->ruta           =  $ruta;
 
  

}

function agregar (){

	$conexion  	=  new Conexion();
	$db         =  $conexion->get_conexion();
	$query     	=  "INSERT INTO submenu(descripcion,item,id_menu,ruta)
	 VALUES(:descripcion,:item,:id_menu,:ruta)";
	$statement    = $db->prepare($query);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':item',$this->item);
	$statement->bindParam(':id_menu',$this->id_menu);
	$statement->bindParam(':ruta',$this->ruta);
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
	$query     =  "DELETE FROM submenu WHERE id=:id";
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
	$query     =  "UPDATE submenu SET descripcion=:descripcion,item=:item,id_menu=:id_menu,ruta=:ruta
	 WHERE id=:id";
	$statement    = $db->prepare($query);
	$statement->bindParam(':id',$id);
	$statement->bindParam(':descripcion',$this->descripcion);
	$statement->bindParam(':item',$this->item);
	$statement->bindParam(':id_menu',$this->id_menu);
	$statement->bindParam(':ruta',$this->ruta);
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
$conexion =  new Conexion();
$db         =  $conexion->get_conexion();
$query    =  "SELECT sm.id,sm.ruta,m.id as id_menu,m.descripcion as menu,sm.descripcion as submenu,sm.item FROM submenu as sm 
	INNER JOIN menu as m on sm.id_menu=m.id WHERE sm.id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result   =  $statement->fetch();
return $result[$campo];
} catch (Exception $e) {
	echo "error: ".$e->getMessage();
}

}

function lista()
{
try {
	


$conexion =  new Conexion();
$db   =   $conexion->get_conexion();
$query    =  "SELECT sm.id,sm.ruta,m.id as id_menu,m.descripcion as menu,sm.descripcion as submenu,sm.item 
FROM submenu as sm 
INNER JOIN menu as m on sm.id_menu=m.id";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
  
   return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function lista_nav($idmenu)
{
try {
	


$conexion =  new Conexion();
$db   =   $conexion->get_conexion();
$query    =  "SELECT sm.id,sm.ruta,m.descripcion as menu,sm.descripcion as submenu,sm.item 
FROM submenu as sm 
INNER JOIN menu as m on sm.id_menu=m.id WHERE sm.id_menu=:idmenu";
$statement  =  $db->prepare($query);
$statement->bindParam(':idmenu',$idmenu);
$statement->execute();
$result  =  $statement->fetchAll();
  
   return $result;
} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}



}


 ?>