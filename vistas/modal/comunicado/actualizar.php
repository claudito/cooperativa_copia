<?php 
include'../../../autoload.php';

$id     =  $_GET['id'];
$folder = "comunicado";

?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id ?>">  

<div class="row">
<div class="col-md-8">
<div class="form-group">
<label>ASUNTO</label>
<input type="text" name="asunto"  class="form-control" required 
value="<?php echo Comunicado::consulta($id,'asunto'); ?>" 
 autofocus  onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>FECHA</label>
<input type="date" name="fecha"  
value="<?php echo Comunicado::consulta($id,'fecha'); ?>"  class="form-control" required>
</div>  
</div>
</div>

<div class="form-group">
<label>CONTENIDO</label>
<textarea name="contenido"  rows="8" class="form-control" onchange="Mayusculas(this)" ><?php echo Comunicado::consulta($id,'contenido'); ?></textarea>
</div>

<div class="form-group">
  <label>ESTADO</label><br>
  <?php 

  switch (Comunicado::consulta($id,'estado')) {
    case '0':
     echo '<label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio1" value="0" checked> Programado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio2" value="1"> Postergado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio3" value="2"> Terminado
          </label>';
 break;
 case '1':
     echo '<label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio1" value="0"> Programado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio2" value="1" checked> Postergado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio3" value="2"> Terminado
          </label>';
 break;
 case '2':
     echo '<label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio1" value="0"> Programado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio2" value="1"> Postergado
          </label>
          <label class="radio-inline">
          <input type="radio" name="estado" id="inlineRadio3" value="2" checked> Terminado
          </label>';
      break;
    
    default:
echo "no existe";
      break;
  }

   ?>
</div>


<button class="btn btn-primary">Actualizar</button>



</form>

<script>
$("#actualizar").submit(function(e){
e.preventDefault();
var parametros = $(this).serialize();
$.ajax({
    type: "POST",
    url: "../controlador/<?php echo $folder; ?>/actualizar.php",
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
