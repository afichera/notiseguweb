<?php 

include ("conexion_bdd.php");

include ("consulta_bdd.php");

			$conexion=conectarbd("localhost","root","","seguweb");

			$query="select cant_alarmas from alarma_x_cliente";

			$consulta=consulta($query, $conexion);
			
			
			while ($fila = mysql_fetch_array($consulta,MYSQL_ASSOC)){

$datos[]=$fila["cant_alarmas"];}


include("../graficos.php");

?>
