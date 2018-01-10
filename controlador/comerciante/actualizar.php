<?php 

include'../../autoload.php';
include'../../session.php';

 $id             =  Funciones::validar_xss($_POST['id']);
 $nombres        =  Funciones::validar_xss($_POST['nombres']);
 $apellidos      =  Funciones::validar_xss($_POST['apellidos']);
 $dni            =  Funciones::validar_xss($_POST['dni']);
 $ruc            =  Funciones::validar_xss($_POST['ruc']);
 $razon_social   =  Funciones::validar_xss($_POST['razon_social']);
 $direccion      =  Funciones::validar_xss($_POST['direccion']);
 $telefono       =  Funciones::validar_xss($_POST['telefono']);
 $celular        =  Funciones::validar_xss($_POST['celular']);
 $correo         =  Funciones::validar_xss($_POST['correo']);
 $area           =  Funciones::validar_xss($_POST['area']);
 $fecha_ingreso  =  Funciones::validar_xss($_POST['fecha_ingreso']);
 $fecha_salida   =  '';
 $tipo           =  Funciones::validar_xss($_POST['tipo']);

$comerciante    = new Comerciante($nombres,$apellidos,$dni,$ruc,$razon_social,$direccion,$telefono,$celular,$correo,$area,$fecha_ingreso,$fecha_salida,$tipo);

$valor   =  $comerciante->actualizar($id);

if ($valor=='ok') 
{
 
 Mensaje::sweetalert('Buen Trabajo','success','Datos Actualizados',2);

}
else 
{
  Mensaje::sweetalert('Error','error','Consulte al área de Soporte',2);
}


 ?>

