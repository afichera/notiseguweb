<?php

function conectarbd($servidor,$usuario,$pass,$bdd){
	
	
	$conexion = mysql_connect ($servidor,$usuario,$pass)
	or die ("<br>No se puede conectar con el servidor");


	mysql_select_db($bdd)
	or die ("<br>No se puede seleccionar la base de datos");
if ($conexion) 
//print("<br>La conexion se realizo con éxito a ".$bdd);

return $conexion;
	
}



?>
