<?php 

include ("conexion_bdd.php");

include ("consulta_bdd.php");

			$conexion=conectarbd("localhost","root","","seguweb");

			$query="select cantidad_de_alarmas, id from cant_alarma_x_dispo";

			$consulta=consulta($query, $conexion);
			
			
			while ($fila = mysql_fetch_array($consulta,MYSQL_ASSOC)){

$datos[]=$fila["cantidad_de_alarmas"];

}

include("../graficos.php");

?>
