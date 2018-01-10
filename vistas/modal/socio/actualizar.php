<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$socio  = new Socio();

 ?>

<form id="actualizar">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >NOMBRES</label>
<input type="text" name="nombres"  class="form-control" 
 value="<?php echo $socio->consulta($id,'nombres'); ?>" >
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label >APELLIDOS</label>
<input type="text" name="apellidos"  class="form-control" 
 value="<?php echo $socio->consulta($id,'apellidos'); ?>" >
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >DNI</label>
<input type="text"  maxlength="8"  name="dni"  class="form-control" 
 value="<?php echo $socio->consulta($id,'dni'); ?>" >
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label >TELÉFONO</label>
<input type="text" maxlength="9"  name="telefono"  class="form-control" 
 value="<?php echo $socio->consulta($id,'telefono'); ?>" >
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >CORREO</label>
<input type="text" name="correo"  class="form-control" 
 value="<?php echo $socio->consulta($id,'correo'); ?>" >
</div>
</div>

<div class="col-md-6">
<label>AREA</label>
<select name="area" id="" class="form-control">
<option value="<?php echo $socio->consulta($id,'id_area') ?>"><?php echo $socio->consulta($id,'area') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($socio->consulta($id,'id_area')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN 1</label>
<textarea name="direccion_1" onchange="Mayusculas(this)"  class="form-control"  rows="5"><?php echo $socio->consulta($id,'direccion_1'); ?></textarea> 
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>DIRECCIÓN 2</label>
<textarea name="direccion_2" onchange="Mayusculas(this)"  class="form-control"  rows="5"><?php echo $socio->consulta($id,'direccion_2'); ?></textarea>
</div>
</div>
</div>




<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/socio/actualizar.php",
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