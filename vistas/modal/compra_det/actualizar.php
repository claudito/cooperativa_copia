<?php 

include'../../../autoload.php';
include'../../../session.php';

$id     =  $_GET['id'];
$idcita =  $_GET['idcita'];

$objeto  =  new Compra_det();

$folder  = "compra_det";

 ?>

<form  id="actualizar" autocomplete="Off">


<input type="hidden" name="id" id="id"  value="<?php echo $id; ?>">
<input type="hidden" name="idcita" id="idcita"  value="<?php echo $idcita; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DESCRIPCION</label>
<input type="text" name="descripcion" onchange="Mayusculas(this)" class="form-control"  required=""  value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>	
</div>
<div class="col-md-6">
<div class="form-group">
<label>cantidad</label>
<input type="number" name="cantidad"  class="form-control"  required=""  value="<?php echo $objeto->consulta($id,'cantidad'); ?>">
</div>
</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
<label>PRECIO UNITARIO</label>
<input type="number" step="any" name="precio_uni"  class="form-control"  required=""  value="<?php echo round($objeto->consulta($id,'precio_uni'),2); ?>">
</div>
	</div>
	<div class="col-md-6">

	</div>
</div>




<button type="submit" class="btn btn-primary">Actualizar</button>



</form>



<script>
$("#actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../controlador/<?php echo $folder ?>/actualizar.php",
data: parametros,
beforeSend: function(objeto){
$("#mensaje").html("Mensaje: Cargando...");
},
success: function(datos){
$("#mensaje").html(datos);
//$("#actualizar")[0].reset();  //resetear inputs
$('#modal-actualizar').modal('hide'); //ocultar modal
$('body').removeClass('modal-open');
$("body").removeAttr("style");
$('.modal-backdrop').remove();
loadTabla(<?php echo $idcita; ?>);
}
});
});
</script>