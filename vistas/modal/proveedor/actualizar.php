<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$area  = new Proveedor();

//echo $alumnos->consulta($id,'nombres');
 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
  
  <div class="form-group">
<label >RAZON SOCIAL</label>
<input type="text" name="razon_social"  class="form-control" 
 value="<?php echo $area->consulta($id,'razon_social'); ?>" onchange="Mayusculas(this)">
</div>
<div class="form-group">
<label >DIRECCION</label>
<input type="text" name="direccion"  class="form-control" 
 value="<?php echo $area->consulta($id,'direccion'); ?>" onchange="Mayusculas(this)">
</div>
<div class="form-group">
<label >RUC</label>
<input type="text" name="ruc" maxlength="11" class="form-control" 
 value="<?php echo $area->consulta($id,'ruc'); ?>" onchange="Mayusculas(this)">
</div>
<div class="form-group">
<label >TIPO DE DOCUMENTO</label>
<select name="tipo_documento" id="" class="form-control" required="">
        <option value="">--SELECCIONAR--</option>
        <option value="0">OTROS TIPOS DE DOCUMENTO</option>
        <option value="1">DOCUMENTO NACIONAL DE IDNTIDAD (DNI)</option>
        <option value="4">CARNET DE EXTRANJERIA</option>
        <option value="6">REGISTRO UNICO DE CONTRIBUYENTE</option>
        <option value="7">PASAPORTE</option>
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
          url: "../controlador/proveedor/actualizar.php",
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