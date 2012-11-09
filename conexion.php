<?php

	$dbhost = "localhost";

	$dbusuario = "root";
	$dbpassword="";

	$db="web_news";


	$conexion = mysql_connect($dbhost,$dbusuario,$dbpassword) or die(mysql_error());

	mysql_select_db($db);

?>