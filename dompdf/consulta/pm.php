<?php 
$id  =  $_GET['id'];
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PLANILLA DE GASTOS DE  MOVILIDAD N° <?php echo $id; ?></title>
	<link rel="stylesheet" href="<?php echo URL; ?>assets/css/plan_mov.css">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL; ?>assets/img/favicon.ico">
</head>
<body>


	<h1 class="center"><img  src="../img/market.jpg" alt="" width="150"></h1>
<h1 class="center">PLANILLA DE GASTOS DE MOVILIDAD</h1>
<h1 class="center">DOCUMENTO N° <?php echo $id; ?></h1>
<h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>






<table  class="cabecera">
<tr>
<td><strong>PERSONAL:</strong></td>
<td><?php echo Plan_mov_cab::consulta($id,'nombres').' '.Plan_mov_cab::consulta($id,'apellidos'); ?></td>
</tr>
<tr>
<td><strong>CARGO:</strong></td>
<td><?php echo Plan_mov_cab::consulta($id,'cargo') ?></td>
</tr>
<tr>
<td><strong>MES:</strong></td>
<td><?php echo date_format(date_create(Plan_mov_cab::consulta($id,'fecha_emision')),'m'); ?></td>
</tr>
<tr>
<td><strong>DNI :</strong></td>
<td><?php echo Plan_mov_cab::consulta($id,'dni'); ?></td>
</tr>
<tr>
<td><strong>FECHA EMISIÓN:</strong></td>
<td><?php echo date_format(date_create(Plan_mov_cab::consulta($id,'fecha_emision')),'d/m/Y'); ?></td>
</tr>


</table>



<table class="detalle">
<thead>
<tr>
<th class="detalle-th center">#</th>	
<th class="detalle-th center">FECHA DE GASTO</th>
<th class="detalle-th center">MOTIVO</th>
<th class="detalle-th center">DESTINO</th>
<th class="detalle-th center">MONTO</th>
<th class="detalle-th center">TIPO</th>

</tr>
</thead>
<tbody>
<?php 
$item =1;
$suma =0;

foreach (Plan_mov_det::lista($id) as $key => $value): ?>
<tr>
<td class="detalle-td center"><?php echo $item++; ?></td>
<td class="detalle-td center"><?php echo date_format(date_create($value['fecha_gasto']),'d/m/Y'); ?></td>
<td class="detalle-td center"><?php echo $value['motivo']; ?></td>
<td class="detalle-td center"><?php echo $value['destino']; ?></td>
<td class="detalle-td center"><?php echo 's/. '.round($value['viaje'],2); ?></td>
<td class="detalle-td center"><?php echo strtoupper($value['tipo']); ?></td>

<?php   $suma =  $suma+$value['viaje']; ?>

</tr>
<?php endforeach ?>
<tr class="detalle">
<td colspan="4" class="right detalle-th">TOTAL: </td>
<td  class="detalle-th center"><?php echo 's/. '.$suma;  ?></td>
<td class="detalle-th"></td>
</tr>
</tbody>
</table>

	
</body>
</html>