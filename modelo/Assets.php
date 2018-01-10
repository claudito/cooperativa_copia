<?php 

class Assets
{


function __construct()
{

}


function principal($titulo)
{

echo '
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>'.$titulo.' | Cooperativa 9 de Febrero</title>
<!-- metas -->
<meta http-equiv="refresh" content="1200">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- no caché -->
<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">



 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> <!--
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="shortcut icon" type="image/x-icon" href="'.URL.'assets/img/favicon.ico">
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
<style>
nav{font-size:14px}
body{
font-family: "PT+Sans", sans-serif;
}
</style>
<script>

function Mayusculas(field) {
field.value         = field.value.toUpperCase();

}
</script>

<style>
table{font-size: 12px;}
.btn-responsive {
    white-space: normal !important;
    word-wrap: break-word;
}
</style>

';



}

function datatables()
{
echo '<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="'.URL.'assets/js/datatable-es.js"></script>

<script type="text/javascript" src="http://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>';
}

function datatables_export()
{
echo '<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">
';
}



function sweetalert()
{
echo '  
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
';
}

function selectize()
{
echo '<link rel="stylesheet" href="http://selectize.github.io/selectize.js/css/selectize.default.css" >
<script src="http://selectize.github.io/selectize.js/js/selectize.js"></script>';
}


function jqueryiu()
{
	echo '<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">';
}


}








 ?>