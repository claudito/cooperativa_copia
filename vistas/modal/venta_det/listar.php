<?php 

include'../../../autoload.php';
include'../../../session.php';

$objeto     =  new Venta_det();


$folder     =  "venta_det";

$id         =  $_GET['id'];

 ?>

 <?php if (count($objeto->lista($id))>0): ?>
 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Detalle</h3>
  </div>
  <div class="panel-body">
   <div class="table-responsive">
    <table class="table table-hover table-condensed table-bordered" id="consulta">
      <thead>
        <tr class="info">
          <th>IT</th>
          <th>DESCRIPCIÓN</th>
          <th>CANTIDAD</th>
          <th>PRECIO UNITARIO</th>
         <th>PRECIO TOTAL</th>
          <th class="text-center">ACCIONES</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      $item=1;
      foreach ($objeto->lista($id) as $key => $value): ?>
      <tr>
      
      <td><?php echo $item++; ?></td>
      <td><?php echo $value['descripcion']; ?></td>
      <td><?php echo round($value['cantidad'],2); ?></td>
      <td><?php echo 'S/. '.round($value['precio_unitario'],2); ?></td>
      <td><?php echo round($value['cantidad']*$value['precio_unitario'],2); ?></td>

      
      <td class="text-center">
      <button  class="btn btn-edit btn-xs btn-info" data-id="<?php echo $value['id']; ?>"
      data-idcita="<?php echo $value['id_compra_cab']; ?>"
        ><i class="glyphicon glyphicon-edit"></i></button>
      <button class="btn btn-danger btn-xs" data-target="#modal-eliminar" data-toggle="modal" 
      data-id="<?php echo $value['id']; ?>"
      data-idcita="<?php echo $value['id_compra_cab']; ?>"
      ><i class="glyphicon glyphicon-trash"></i></button>
      </td>



      </tr>
      <?php endforeach ?>
      </tbody>
    </table>
   </div>
  </div>
 </div>


  <!-- Modal  Actualizar -->
  <script>
    $(".btn-edit").click(function(){
      id     = $(this).data("id");
      idcita = $(this).data("idcita");
      $.get("../vistas/modal/<?php echo $folder ?>/actualizar.php","id="+id+"&idcita="+idcita,function(data){
        $("#form-edit").html(data);
      });
      $('#modal-actualizar').modal('show');
    });
  </script>
  <div class="modal fade" id="modal-actualizar" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div>
    </div>
  </div>
  <!-- /.Fin Modal Actualizar -->


 

   <script>
 $(document).ready(function(){
    $('#consulta').DataTable();
});
 </script>



 <?php else: ?>
 <p class="alert alert-warning">No Hay Registros Disponibles.</p>
 <?php endif ?>