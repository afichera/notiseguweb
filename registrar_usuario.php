<?php 
	session_start();
	
	include "conexion.php";
	
		
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$dni = $_POST['dni'];
	$username = $_POST['username'];
	$pass = $_POST['clave1'];
	$tipo_us = $_POST['tipo_usuario'];
	$estado = $_POST['estado'];
	

	$query='INSERT INTO users (username, roleId, dni, name, surname, password, creationDate, isDeleted) VALUES("'.$username.'",'.$tipo_us.','.$dni.',"'.$nombre.'","'.$apellido.'","'.$pass.'",NOW(),'.$estado.')';
	
	mysql_query($query);

	mysql_close($conexion);
	
	switch($_SESSION['rango'])
	{
		case ("1"):
			//echo 'Editor';
			
			echo '<html><head></head><body>';
			echo '<script language="javascript">';
			echo 'window.location="editor.php"';
			echo '</script>';
			echo '</body></html>';
			
			break;
		/*
		case ("2"):
			//echo 'Periodista';
			
			echo '<html><head></head><body>';
			echo '<script language="javascript">';
			echo 'window.location="periodista.php"';
			echo '</script>';
			echo '</body></html>';
			
			break;
		*/
		default:
			//echo 'ERROR El tipo de usuario NO coincide con los predeterminados';
			
			echo '<html><head></head><body>';
			echo '<script language="javascript">';
			//echo 'window.location="index.php"';
			echo 'window.location="nuevo_usuario.php"';
			echo '</script>';
			echo '</body></html>';
			
			break;
	}

?>