<?php
function consulta($consulta, $conexion){
	
	
	$consulta = mysql_query($consulta, $conexion)
	
	or die ("<br>Fallo en la consulta");
	
	
	if($consulta)
//	print("<br>La consulta se realizo con éxito");

	
	return $consulta;
	
	}



?>
