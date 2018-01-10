<?php 

include'../../../autoload.php';
include'../../../session.php';

$id          =  $_GET['id'];
$tipo        =  $_GET['tipo'];

$objeto =  new Detalle_concepto($tipo,$id);
 ?>
<script>
function edit_data(id, text, column_name,codigo,tipo)  
  {  
       $.ajax({  
            url:'../controlador/'+carpeta+'/actualizar_concepto.php', 
            method:"POST",  
            data:{id:id, text:text, column_name:column_name,codigo:codigo,tipo:tipo},  
            dataType:"text",  
            success:function(data){  
            $('#mensaje_data').html(data);
            fetch_data(codigo,tipo); 
            }  
       });  
  }

$(document).on('blur', '.monto', function(){ 
       var id          = $(this).data("idupdate");
       var codigo      = $(this).data("codigo"); 
       var tipo        = $(this).data("tipo");  
       var monto       = $(this).text()
       var column_name = "costo";
       edit_data(id,monto,column_name,codigo,tipo);  
  });
</script>
 <?php if (count($objeto->lista())>0): ?>
 <div class="table-responsive">
 	<table class="table table-condensed table-bordered">
 		<thead>
 			<tr class="active">
 				<th class="text-center" width="10%">PUESTO</th>
 				<th width="50%">CONCEPTO</th>
 				<th width="30%" class="text-center">MONTO</th>
 				<th width="10%" class="text-center"><i class="fa fa-cog"></i></th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php foreach ($objeto->lista() as $key => $value): ?>
		<tr>
		<td class="text-center"># <?php echo $value['puesto'] ?></td>
		<td><?php echo $value['concepto']; ?></td>
    <td class="text-center monto"  contenteditable="" data-idupdate="<?php echo $value['id'] ?>" data-codigo="<?php echo $id ?>"  
      data-tipo="<?php echo $tipo ?>"><?php echo round($value['costo'],2) ?></td>
		
		<td class="text-center">
		<button type="button" name="delete_btn" data-id3="<?php echo $value['id']; ?>"
         data-codigo="<?php echo $id ?>"  data-tipo="<?php echo $tipo ?>"
		 class="btn btn-xs btn-danger btn_delete">
     <i class="glyphicon glyphicon-remove"></i>  
     </button></td>
		</tr>
 		<?php endforeach ?>
 		</tbody>
 		<tbody>
 		<tr>
 		<input type="hidden" id="id_add"     value="<?php echo $id; ?>">
 		<input type="hidden" id="tipo_add"   value="<?php echo $tipo; ?>">
 		<td colspan="2">
 		<select  id="concepto" class="form-control">
		<option value="">[Concepto]</option>
		<?php foreach ($objeto->concepto() as $key => $value): ?>
		<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
		<?php endforeach ?>
		</select>
	   </td>
 		<td class="text-center" ><input type="number"  id="monto" step="any" min="0.01" class="form-control text-center" required></td>
 		<td class="text-center"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i></button></td>
 		</tr>
 		</tbody>
 	</table>
 </div>
 <?php else: ?>
<table class="table table-condensed">
<thead>
<tr class="active">
<th width="10%"></th>
<th width="50%">CONCEPTO</th>
<th width="30%" class="text-center">MONTO</th>
<th  width="10%" class="text-center"><i class="fa fa-cog"></i></th>
</tr>
</thead>
<tbody>
<tr>
 		<input type="hidden" id="id_add"     value="<?php echo $id; ?>">
 		<input type="hidden" id="tipo_add"   value="<?php echo $tipo; ?>">
 		<td colspan="2">
 		<select  id="concepto" class="form-control">
		<option value="">[Concepto]</option>
		<?php foreach ($objeto->concepto() as $key => $value): ?>
		<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion'] ?></option>
		<?php endforeach ?>
		</select>
	   </td>
 		<td  class="text-center"><input type="number"  id="monto" step="any" min="0.01" class="form-control text-center" required></td>
 		<td class="text-center"><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-plus"></i></button></td>
 		</tr>
</tbody>
</table>
 <?php endif ?>