<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$requisc  =  new Compra_cab();
$requisd  =  new Compra_det();
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

<h1 class="center">REGISTRO DE COMPRAS</h1>

<h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>



<table  class="cabecera">
<tr>
<td><strong>PROVEEDOR:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'razon_social'); ?></td>
</tr>
<tr>
<td><strong>DIRECCION:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'direccion1'); ?></td>
</tr>
<tr>
<td><strong>RUC:</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'ruc'); ?></td>
</tr>
<tr>
<td><strong>SERIE :</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'serie'); ?></td>
</tr>
<tr>
<td><strong>NUMERO :</strong></td>
<td><?php echo $requisc->consulta($_GET['id'],'numero'); ?></td>
</tr>

<tr>
<td><strong>FECHA:</strong></td>
<td><?php echo date_format(date_create($requisc->consulta($_GET['id'],'fecha_documento')),'d/m/Y') ?></td>
</tr>


</table>






<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">#</th>	
<th class="detalle-th center">DESCRIPCION</th>
<th class="detalle-th left">CANTIDAD</th>
<th class="detalle-th left">SUB-TOTAL</th>
<th class="detalle-th left">IGV</th>
<th class="detalle-th left">PRECIO UNITARIO</th>
<th class="detalle-th center">PRECIO TOTAL INCLUIDO EL IGV</th>


</tr>
</thead>
<tbody>
<?php 
$item =0;
$suma =0;
$sum_igv=0;
$suma_sub=0;
$suma_uni=0;

foreach ($requisd->lista($_GET['id'],'GM') as $key => $value): ?>
<?php 

                $sub=round($value['precio_uni']-$value['precio_uni']/1.18,2);
                $igv=round($value['precio_uni']-$sub,2); 

         ?>
<tr>
<td class="detalle-td center"><?php echo $item = $item+1; ?></td>
<td class="detalle-td center"><?php echo $value['descripcion']; ?></td>
<td class="detalle-td center"><?php echo $value['cantidad']; ?></td>
<td class="detalle-td center"><?php echo $igv; ?></td>
<td class="detalle-td center"><?php echo $sub; ?></td>

<td class="detalle-td center"><?php echo round($value['precio_uni'],2); ?></td>
<td class="detalle-td center"><?php $costo=($value['cantidad']*$value['precio_uni']);  echo $costo; ?></td>



<?php 

  $suma =  $suma+$costo;
  $suma_igv =  $suma/1.18;
  $suma_sub =  $suma - $suma_igv;
  $suma_uni =  $suma_uni+$value['precio_uni'];



 ?>

</tr>
<?php endforeach ?>

<tr>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>
<td class="td-final"></td>

</tr>
<tr class="detalle">
<td colspan="5" class="right detalle-th"> </td>
<td  class="detalle-th center">sub-total</td>
<td class="detalle-th right"><?php echo 's/. '.round($suma_igv,2); ?></td>


</tr>
<tr class="detalle">
<td colspan="5" class="right detalle-th"> </td>
<td  class="detalle-th center">igv</td>
<td class="detalle-th right"><?php echo 's/. '.round($suma_sub,2); ?></td>


</tr>
<tr class="detalle">
<td colspan="5" class="right detalle-th"></td>
<td  class="detalle-th center">total :</td>
<td class="detalle-th right"><?php echo 's/. '.$suma;  ?></td>


</tr>

</tbody>
</table>

	
	
</body>
</html>