<?php 

include'../../config.php';
include'../../clases/Conexion.php';
include'../../autoload.php';
include'../../session.php';

$egresos  =  new Socio();


 ?>

 <?php if (count($egresos->lista_nav())>0): ?>


	<h1 class="center"><img  src="../img/cooperativa.jpg" alt="" width="100"  height="100" ></h1>
	
	
<h1 class="center">LISTADO DE SOCIO</h1>

 <h3 class="center">Coop. Servicios Especiales Mercado Nueve de Febrero de Ventanilla Alta del Callao  Ltda <br>  R.U.C N 20210994735
</h3>
 <p>Cantidad de socio : <?php echo count($egresos->lista_nav()) ?> </p>


	<link rel="stylesheet" href="../estilos/estilos.css">
	<table width="100%">
		<thead>
		<tr>
			
			<th class="center">NOMBRES</th>
		    <th class="center">APELLIDOS</th>
			<th class="center">DNI</th>
			<th class="center">DIRECCION 1</th>
			<th class="center">DIRECCION 2</th>
			<th class="center">TELEFONO</th>
			<th  class="center">AREA</th>
			<th class="center">CORREO</th>
			
		</tr>
	</thead>
		<tbody>
	    <?php 
	    foreach ($egresos->lista_nav() as $key => $value): ?>
	    <tr>
	   
	    <td class="center"><?php echo $value['nombres']; ?></td>
	    <td class="center"><?php echo $value['apellidos']; ?></td>
	    <td class="center"><?php echo $value['dni']; ?></td>
	    <td class="center"><?php echo $value['direccion_1']; ?></td>
	    <td class="center"><?php echo $value['direccion_2']; ?></td>
	    <td class="center"><?php echo $value['telefono']; ?></td>
	    <td class="center"><?php echo $value['area']; ?></td>
	   <td class="center"><?php echo $value['correo']; ?></td>

	    </tr>
	    <?php endforeach ?>

		</tbody>
	</table>

	
 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros.</p>	
 <?php endif ?>