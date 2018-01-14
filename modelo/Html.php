<?php 

class html
{
	
	function __construct()
	{
		
	}

	function header()
	{

	echo '
	</head>
	<body>
	<div class="container-fluid">
	';

	}


function nav($ruta)
{
echo '<div class="row">
<div class="col-md-12">';
include''.$ruta.'/vistas/nav.php';
echo '</div>
</div>';
}

function breadcrumbs($menu='',$submenu='')
{
echo '<div class="row">
<div class="col-md-12">
<ol class="breadcrumb">
<li><a href="'.URL.'"><i class="fa fa-home"></i> INICIO</a></li>
<li>'.$menu.'</li>
<li>'.$submenu.'</li>
</ol>
</div>
</div>';
}



	function footer($texto)
	{
	
	echo '
    
    <br></br>
	<p class="text-center">&copy; '.date('Y').' '.$texto.'</p>
	</div>
	<script src="'.URL.'ajax/logout.js"></script>
	</body>
	</html>';

	}
}


 ?>