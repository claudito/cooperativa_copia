<?php 

include'../../../autoload.php';
include'../../../session.php';

$id  	 =  $_GET['id'];
$tipo    =  "S";
?>             

<div id="mensaje_data" ></div>
<div id="live_data"></div>


<script src="../ajax/live-edit/socio-concepto.js"></script>
<script>fetch_data(<?php echo $id; ?>,'<?php echo $tipo; ?>');</script>

