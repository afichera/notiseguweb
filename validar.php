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
      $urlRol=tomarUrlRol($usuario);
	  $rol=tomarRol($usuario);
	  $sesion->set("rol",$rol);
	  include ("scripts/carga_log.php");carga_log ("Ingreso del usuario.",$sesion->get("usuario"), 1);
	  header("location: noticias.php");
   } else {
	   include ("scripts/carga_log.php");carga_log ("Intento de sesion fallido. Usuario intentado: ".$usuario.".","", 1); 
     header("location: login.php?error=password");
	 }
}

function validarUsuario($usuario, $password)	{
   $conexion = new mysqli("localhost","root","","seguweb");
   $consulta = "select password from usuario where usuario = '".$usuario."' AND fecha_baja = '0000-00-00 00:00:00';";
   $result = $conexion->query($consulta);
   if($result->num_rows > 0)	{
      $fila = $result->fetch_assoc();
      if( strcmp($password,$fila["password"]) == 0 )
         return true;
      else
         return false;
   }  else
       return false;
}


function tomarUrlRol($usuario){
$conexion = new mysqli("localhost","root","","seguweb");
   $consulta = "SELECT url_inicio FROM usuario INNER JOIN rol ON (usuario.rol_id=rol.id)   where usuario.usuario = '".$usuario."';";
   $result = $conexion->query($consulta);
   
   if($result->num_rows > 0)	{
      $fila = $result->fetch_assoc();
      return $fila["url_inicio"];}
      else
         return false;
  
}


function tomarRol($usuario){
$conexion = new mysqli("localhost","root","","seguweb");
   $consulta = "SELECT rol.descripcion FROM usuario INNER JOIN rol ON (usuario.rol_id=rol.id)   where usuario.usuario = '".$usuario."';";
   $result = $conexion->query($consulta);
   
   if($result->num_rows > 0)	{
      $fila = $result->fetch_assoc();
      return $fila["descripcion"];}
      else
         return false;
  
}

?>