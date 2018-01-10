<?php 
$inquilino  =  new Inquilino();
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inquilino</title>
	<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>


 <?php if (count($inquilino->lista_nav())>0): ?>


	<h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>
	
	
<h1 class="center">PLANILLA INQUILINO</h1>

 <h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>



<p>Cantidad de inquilino : <?php echo count($inquilino->lista_nav()) ?> </p>

	<table width="100%">
		<thead>
		<tr>

			
			<th class="center">NOMBRES</th>
			<th class="center">DNI</th>
			<th class="center">RUC</th>
		    <th class="center">DIRECCION 1</th>
			<th class="center">DIRECCION 2</th>
			<th class="center">TELEFONO</th>
            <th class="center">CORREO</th>
            <th class="center">AREA</th>
		</tr>
	</thead>
		<tbody>
	    <?php 
	    foreach ($inquilino->lista_nav() as $key => $value): ?>
	    <tr>
	    <td class="center"><?php echo $value['nombres']; ?></td>
	    <td class="center"><?php echo $value['dni']; ?></td>
	    <td class="center"><?php echo $value['ruc']; ?></td>
	    <td class="center"><?php echo $value['direccion_1']; ?></td>
        <td class="center"><?php echo $value['direccion_2']; ?></td>
        <td class="center"><?php echo $value['telefono']; ?></td>
        <td class="center"><?php echo $value['correo']; ?></td>
        <td class="center"><?php echo $value['area']; ?></td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>

	
 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros.</p>	
 <?php endif ?>
</body>
</html>