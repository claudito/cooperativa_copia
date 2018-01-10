
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/rc-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );
