<?php 

include'../../../autoload.php';
include'../../../session.php';

$id  =  $_GET['id'];
 ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idanio").change(function () {
$("#idanio option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/presupuesto.php", { elegido: elegido }, function(data){
$("#meses").html(data);
});     
});
});    
});
</script>



 <form >
 	
<div class="form-group">
<label>Año</label>
<select name="" id="idanio" class="form-control">
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
</div>


<div id="meses"></div>


 </form>