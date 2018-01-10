<?php 


$assets  =  new Assets();
$html    =  new Html();
$mensaje =  new Mensaje();
$assets ->principal('Estado Cuenta');
$assets ->datatables();
$assets->sweetalert();
$html   ->header();
$carpeta = "estado-cuenta";
if (isset($_GET['ok'])) 
{

$mensaje->sweetalert('Bienvenido','success',$_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS],2);
}

?>



<div class="row">
	
<div class="col-md-12">
<?php include'vistas/nav-socio.php'; ?>
</div>	

</div>




<div class="row">
<div class="col-md-12">
<h1>Estado de Cuenta</h1>


</div>
</div>



<?php 

$html->footer('Cooperativa');

 ?>