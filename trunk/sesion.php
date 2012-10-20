<?php
require_once("sesion.class.php");
$sesion = new sesion();
if( $sesion->get("usuario") == false || $sesion->get("rol") != "supervisor" ) {
	// si no se ha iniciado sesión redirecciona a la pagina login.php
	header("Location: ../login.php?error=permisos");
} else {
	// Aquí va el contenido de la pagina qu se mostrara en caso de que se haya iniciado sesion
}
?>