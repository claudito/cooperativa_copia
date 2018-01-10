

<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$area  = new Compra_cab();

//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
 
 <div class="row">
   <div class="col-md-6">
   <div class="form-group">
<label >PROVEEDOR</label>
<select name="razon" id="" class="form-control">
<option value="<?php echo $area->consulta($id,'codigo'); ?>"><?php echo $area->consulta($id,'razon_social').' - '.$area->consulta($id,'ruc').' - '.$area->consulta($id,'direccion1'); ?></option>
<?php 
$menu  =  new Socio_negocio();
foreach ($menu->lista() as $key => $value): ?>
<?php if ($value['tipo']=='P'): ?>
<?php if ($value['codigo']!==Compra_cab::consulta($id,'codigo_socio_negocio')): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['razon_social'].' - '.$value['ruc'].' - ' .$value['direccion1']; ?></option>
<?php endif ?>
<?php endif ?>
<?php endforeach ?> 
</select>
</div>

   </div>
   <div class="col-md-6">
     
<div class="form-group">
<label >FECHA DOCUMENTO</label>
<input type="date" name="fecha_documento"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $area->consulta($id,'fecha_documento'); ?>" >
</div>
   </div>
 </div> 



<div class="form-group">
<label >SERIE</label>
<input type="text" name="serie"  class="form-control" 
 value="<?php echo $area->consulta($id,'serie'); ?>" onchange="Mayusculas(this)">
</div>
<div class="form-group">
<label >NUMERO</label>
<input type="text" name="numero"  class="form-control" 
 value="<?php echo $area->consulta($id,'numero'); ?>" onchange="Mayusculas(this)">
</div>
<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/compra_cab/actualizar.php",
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

