
<?php 

include'../../../autoload.php';
include'../../../session.php';

$id  	   =  $_GET['id'];
$objeto  =  new Inquilino();
$folder  =  "inquilino";

?>

</div>
<div class="modal-body">

<form id="puesto" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>PUESTO</label>
<select name="codigo_puesto" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$puesto = new Puesto();
foreach ($puesto->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>


<div class="col-md-8">
<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" class="form-control" required="" onchange="Mayusculas(this)">
</div>
</div>
</div>

<button type="submit" class="btn btn-primary">Grabar</button>



</form>

<script>
$("#puesto").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../controlador/<?php echo $folder ?>/puesto.php",
data: parametros,
beforeSend: function(objeto){
$("#mensaje").html("Mensaje: Cargando...");
},
success: function(datos){
$("#mensaje").html(datos);
//$("#puesto")[0].reset();  //resetear inputs
$('#modal-puesto').modal('hide'); //ocultar modal
$('body').removeClass('modal-open');
$("body").removeAttr("style");
$('.modal-backdrop').remove();
loadTabla();
}
});
});
</script>

<br>

<form id="puesto_actualizar" autocomplete="off">
<div class="table-responsive">
	<table class="table table-bordered table-condensed">
		<thead>
			<tr class="info">
				<th class="text-center">PUESTO</th>
				<th class="text-center">DESCRIPCIÓN</th>
				<th class="text-center">ELIMINAR</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$inquilino_puesto = new Inquilino_puesto($id); 
		foreach ($inquilino_puesto->lista() as $key => $value): ?>
		<tr>
				<td>
               <input type="hidden" name="id[]" id="" value="<?php echo $value['id']; ?>">
				<input type="text" name="codigo_puesto[]" value="<?php echo $value['codigo_puesto']; ?>" id="" class="form-control text-center" maxlength="9" required></td>

				<td><input type="text" name="descripcion[]" onchange="Mayusculas(this)" value="<?php echo $value['descripcion']; ?>" id="" class="form-control" required></td>
				<td class="text-center">
			    <a data-toggle="modal" class="btn btn-danger" 
			     data-target="#modal-eliminar-puesto"  data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
		</tr>
		<?php endforeach ?>
		</tbody>
	</table>

	<button type="submit" class="btn btn-primary">Actualizar</button>
</div>
</form>

<script>
$("#puesto_actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
type: "POST",
url: "../controlador/<?php echo $folder ?>/puesto_actualizar.php",
data: parametros,
beforeSend: function(objeto){
$("#mensaje").html("Mensaje: Cargando...");
},
success: function(datos){
$("#mensaje").html(datos);
//$("#telefono")[0].reset();  //resetear inputs
$('#modal-puesto').modal('hide'); //ocultar modal
$('body').removeClass('modal-open');
$("body").removeAttr("style");
$('.modal-backdrop').remove();
loadTabla();
}
});
});
</script>

<?php include'../../modal/inquilino/puesto_eliminar.php'; ?>
<script>

$('#modal-eliminar-puesto').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id').val(id)
      $("body").removeAttr("style"); // remover todos los estilos
    })

 $("#modal-eliminar-puesto").on('hidden.bs.modal', function () {
            //$("body").removeAttr("style");
            //$('.modal-backdrop').remove();
    });

 $("#modal-puesto").on('hidden.bs.modal', function () {
           $('.modal-backdrop').remove();
    });


$( "#eliminar_puesto" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "../controlador/inquilino/puesto_eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
           $("#mensaje").html(datos);
          $('#modal-puesto').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          //loadTabla(1);
          }
      });
      event.preventDefault();
    });


</script>

</div>