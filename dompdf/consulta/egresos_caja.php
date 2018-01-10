<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$requisc  =  new Egresos();

$id  =  $_GET['id'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plan_mov.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>assets/img/favicon.ico">

</head>
<body>


	

	<h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>

<h1 class="center">EGRESOS DE CAJA</h1>

<h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>




<table  class="cabecera">
<tr>
<td><strong>RECIBO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'numero','EC'); ?></td>
</tr>
<tr>
<td><strong>MONTO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'monto','EC'); ?></td>
</tr>
<tr>
<td><strong>COMCEPTO:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'concepto','EC'); ?></td>
</tr>
<tr>
<td><strong>PERSONAL</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'personal','EC'); ?></td>
</tr>
<tr>
<td><strong>DOCUMENTO INTERNO</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'documento','EC'); ?></td>
</tr>
<tr>
<td><strong>FECHA DE REGISTRO:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_registro','EC')),'d/m/Y') ?></td>
</tr>


</table>
	
</body>
</html>