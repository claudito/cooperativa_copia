<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$producto  = new Producto();
$carpeta = "producto";

//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">

<div class="form-group">

</div>

<div class="form-group">
<label >CUENTA</label>
<input type="text" name="cuenta" class="form-control" value="<?php echo $producto->consulta($id,'cuenta'); ?>" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label >DESCRIPCIÓN</label>
<input type="text" name="descripcion" class="form-control" value="<?php echo $producto->consulta($id,'descripcion'); ?>" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<div class="form-group">
<label>UNIDAD DE MEDIDA</label>
<select name="unidad" id="" class="form-control">
<option value="<?php echo $producto->consulta($id,'codigo_unidad') ?>"><?php echo $producto->consulta($id,'codigo_unidad').' - '.$producto->consulta($id,'unidad') ?></option>
<?php 
$area = new Unidad();
foreach ($area->lista() as $key => $value): ?>
<?php if ($producto->consulta($id,'codigo_unidad')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
</div>
</div>

<div class="form-group">
<div class="form-group">
<label>FAMILIA</label>
<select name="familia" id="" class="form-control">
<option value="<?php echo $producto->consulta($id,'codigo_familia') ?>"><?php echo $producto->consulta($id,'codigo_familia').' - '.$producto->consulta($id,'familia') ?></option>
<?php 
$area = new Familia();
foreach ($area->lista() as $key => $value): ?>
<?php if ($producto->consulta($id,'codigo_familia')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
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