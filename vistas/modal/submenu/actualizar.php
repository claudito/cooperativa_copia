<?php 
include'../../../autoload.php';

$id  =  $_GET['id'];

$submenu  = new SubMenu();

 ?>

<form id="actualizar" autocomplete="off">

<input type="hidden"  name="id" value="<?php echo $id; ?>">
  
<div class="form-group">
<label >MENÚ</label>
<select name="menu" id="" class="form-control">
<option value="<?php echo $submenu->consulta($id,'id_menu'); ?>"><?php echo $submenu->consulta($id,'menu'); ?></option>
<?php 
$menu  =  new Menu();
foreach ($menu->lista() as $key => $value): ?>
<?php if ($value['id']!==$submenu->consulta($id,'id_menu')): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?> 
</select>
</div>

<div class="form-group">
<label >SUBMENÚ</label>
<input type="text" name="submenu"  class="form-control" onchange="Mayusculas(this)" value="<?php echo $submenu->consulta($id,'submenu'); ?>" >
</div>

<div class="form-group">
<label >ITEM</label>
<input type="text" name="item"  class="form-control" value="<?php echo $submenu->consulta($id,'item'); ?>">
</div>

<div class="form-group">
<label>RUTA</label>
<input type="text" name="ruta" id="" class="form-control" value="<?php echo $submenu->consulta($id,'ruta') ?>">
</div>


<button class="btn btn-primary">Actualizar</button>

 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/submenu/actualizar.php",
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