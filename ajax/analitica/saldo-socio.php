<?php 

include'../../autoload.php';
include'../../session.php';

$mes  = $_GET['mes'];
$tipo = "socio";
?>

<?php if (count(Analitica::saldo_comerciante($mes,$tipo))>0): ?>
	1
<?php else: ?>
<p class="alert alert-warning">No hay registros disponibles.</p>
<?php endif ?>