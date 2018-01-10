<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  =  $_GET['numero'];
?>

<?php if (count(Plan_mov_det::lista($numero))>0): ?>
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr>
<th>FECHA DE GASTO</th>
<th>MOTIVO</th>
<th>DESTINO</th>
<th>VIAJE</th>
<th>TIPO</th>
<th>ACCIONES</th>
</tr>
</thead>
<tbody>
<?php foreach (Plan_mov_det::lista($numero) as $key => $value): ?>
<tr>
<td><input type="date"  id="fecha" class="form-control"></td>
</tr>
<?php endforeach ?>
</tbody>
</table>
</div>
<?php else: ?>
<div class="table-responsive">
<table class="table table-condensed">
<thead>
<tr>
<th width="10%">FECHA DE GASTO</th>
<th width="20%">MOTIVO</th>
<th width="30%">DESTINO</th>
<th width="12%">VIAJE</th>
<th width="15%">TIPO</th>
<th width="8%"></th>
</tr>
</thead>
<tbody>
<tr>
<input type="hidden" id="numero" value="<?php echo $numero; ?>">
<td><input type="date"  id="fecha" class="form-control"></td>
<td><textarea  id="motivo" rows="3" class="form-control" onchange="Mayusculas(this)"></textarea></td>
<td><textarea  id="destino" rows="3" class="form-control" onchange="Mayusculas(this)"></textarea></td>
<td><input type="number" id="viaje" class="form-control"></td>
<td>
<select  id="tipo" class="form-control">
<option value="ida">IDA</option>
<option value="vuelta">VUELTA</option>	
</select>
</td>
<td class="text-center">
<button class="btn btn-success btn-sm" id="btn_add"><i class="fa fa-plus"></i></button>
</td>
</tr>
</tbody>
</table>
</div>
<?php endif ?>



