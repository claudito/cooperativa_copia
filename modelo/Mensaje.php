<?php 
class Mensaje
{


function __construct()
{

}


function sweetalert($titulo,$tipo,$texto,$tiempo)
{
 echo ' 
  <script>
  swal({
  title: "'.$titulo.'",
  type:  "'.$tipo.'",
  text:  "'.$texto.'",
  timer: '.$tiempo.'000,
  showConfirmButton: false
});
 </script>

  ';

}


}






 ?>