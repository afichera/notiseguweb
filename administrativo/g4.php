<?php 

include ("conexion_bdd.php");

include ("consulta_bdd.php");

			$conexion=conectarbd("localhost","root","","seguweb");

			$query="select importe_total from facturacion";

			$consulta=consulta($query, $conexion);
			
			
			while ($fila = mysql_fetch_array($consulta,MYSQL_ASSOC)){

$datos[]=$fila["importe_total"];}


include("../graficos.php");

?>
