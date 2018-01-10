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