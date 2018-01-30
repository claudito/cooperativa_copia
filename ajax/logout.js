 var path  = "http://192.168.8.243/dev/cooperativa/";
//var path = "http://cooperativa.perutec.com.pe/";

function logout(){

	$.ajax({
		url:path+'controlador/logout.php',
		type:'POST',
		async:true,
		data:{accion:'logout'},
		success:function()
		{  

		self.location=path;
		},
		error:function(xhr,status,error)
		{
			alert('ERROR: '+error);
		}


	});
}