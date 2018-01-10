<?php 
include'../../../autoload.php';
include'../../../session.php';

$id            =  $_GET['id'];
$carpeta       = "venta_cab";

?>

<form id="actualizar">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha_documento" id="" required="" class="form-control"
value="<?php echo Venta_cab::consulta($id,'fecha_documento'); ?>" >
</div>	
</div>
<div class="col-md-8">
<div class="form-group">
<label>CLIENTE</label>
<select name="cliente" required="" id="id" class="form-control" required="">
<option value="<?php echo Venta_cab::consulta($id,'codigo_socio_negocio'); ?>"><?php echo Venta_cab::consulta($id,'nombres').' - '.Venta_cab::consulta($id,'ruc'); ?></option>
<?php 
$tratamiento = new Socio_negocio();
foreach ($tratamiento->lista() as $key => $value): ?>
<?php if ($value['tipo']=='C'): ?>
<?php if ($value['codigo']!==Venta_cab::consulta($id,'codigo_socio_negocio')): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['ruc'].' - '.$value['razon_social']; ?></option>
<?php endif ?>
<?php endif ?>
<?php endforeach ?>
</select>
</div>	
</div>
</div>


<div class="form-group">
<label>ESTADO</label>

<select name="estado" required="" id="id" class="form-control" required="">
  <option value="emitido">Emitido</option> 
 
  <option value="anulado">Anulado</option>
</select>
</div>  


<button class="btn btn-primary">Actualizar</button>

</form>

<script>
$("#actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
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
loadTabla(1);
}
});
});
</script>



