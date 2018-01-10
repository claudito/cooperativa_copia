<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];
$inquilino  = new Inquilino();
$carpeta = "inquilino";

//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >NOMBRES</label>
<input type="text" name="nombres"  class="form-control" 
 value="<?php echo $inquilino->consulta($id,'nombres'); ?>" >
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label >APELLIDOS</label>
<input type="text" name="apellidos"  class="form-control" 
 value="<?php echo $inquilino->consulta($id,'apellidos'); ?>" >
</div>
</div>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >DNI</label>
<input type="text" name="dni"  class="form-control" 
 value="<?php echo $inquilino->consulta($id,'dni'); ?>" >
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label >TELÉFONO</label>
<input type="text" name="telefono"  class="form-control" 
 value="<?php echo $inquilino->consulta($id,'telefono'); ?>" >
</div>
</div>
</div>

<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion_1" id="" class="form-control" onchange="Mayusculas(this)" value="<?php echo $inquilino->consulta($id,'direccion_1'); ?>">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion_2" id="" class="form-control" onchange="Mayusculas(this)" value="<?php echo $inquilino->consulta($id,'direccion_2'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label >CORREO</label>
<input type="text" name="correo"  class="form-control" 
 value="<?php echo $inquilino->consulta($id,'correo'); ?>" >
</div>
</div>

<div class="col-md-6">
<label>AREA</label>
<select name="area" id="" class="form-control">
<option value="<?php echo $inquilino->consulta($id,'id_area') ?>"><?php echo $inquilino->consulta($id,'area') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($inquilino->consulta($id,'id_area')!==$value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
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