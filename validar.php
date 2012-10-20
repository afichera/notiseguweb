<?php
require_once("sesion.class.php");

$sesion = new sesion();
?>
<?php
include ("conexion_bdd.php");

include ("consulta_bdd.php");
if( isset($_POST["iniciar"]) )	{
   $usuario = $_POST["usuario"];
   $password = $_POST["password"];
   if(validarUsuario($usuario,$password) == true){
      $sesion->set("usuario",$usuario);
      $rol=tomarRol($usuario);
	  $sesion->set("rol",$rol);
	  
	  header("location: noticias.php");
   } else {

     header("location: login.php?error=password");
	 }
}

function validarUsuario($usuario, $password)	{
   $conexion = new mysqli("localhost","root","","notiseguweb");
   $consulta = "select pass from usuario where nombre_usu = '".$usuario."' AND fecha_hora_baja = '0000-00-00 00:00:00';";
  
  $result = $conexion->query($consulta);
   if($result->num_rows > 0)	{
      $fila = $result->fetch_assoc();
      if( strcmp($password,$fila["pass"]) == 0 )
         return true;
      else
         return false;
   }  else
       return false;
}


function tomarRol($usuario){
$conexion = new mysqli("localhost","root","","notiseguweb");
   $consulta = "SELECT rol.descripcion FROM usuario INNER JOIN rol ON (usuario.rol_id=rol.id)   where nombre_usu = '".$usuario."';";
   $result = $conexion->query($consulta);
   
   if($result->num_rows > 0)	{
      $fila = $result->fetch_assoc();
      return $fila["descripcion"];}
      else
         return false;
  
}
?>