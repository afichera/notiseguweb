<?php
require_once("sesion.class.php");

$sesion = new sesion();

if( $sesion->get("usuario") != false ) {
$_SESSION = array();
      session_destroy ();
	header("Location: login.php");
} else {
	Echo "<p>No se encontraron sesiones abiertas, contacte con el administrador</p><p><a href='login.php'>Ir a la p&aacute;gina de logueo</a></p>";
}
?>