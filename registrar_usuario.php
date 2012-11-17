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

//Modificacion para encriptar el usuario, algo básico y reversible.
$usuario_encriptado1 = md5($username);

//Modificación para encriptar la contraseña. Varios Niveles
//Comenzamos con la encriptacion.
//Encriptacion nivel 1 MD5
$pass_encriptada1 = md5 ($pass);
//Encriptacion nivel 1 CRC32
$pass_encriptada2 = crc32($pass_encriptada1);
//Encriptacion nivel 2, se agrega un Salt/Clave
$pass_encriptada3 = crypt($pass_encriptada2, "E5t0EsUnaCl4veSegur4"); 
//Encriptacion nivel 3 SHA1, se agrega el mismo 
// Salt/Clave aunque podría ser diferente.
$pass_encriptada4 = sha1("E5t0EsUnaCl4veSegur4".$pass_encriptada3); 



$query='INSERT INTO users (username, roleId, dni, name, surname, password, creationDate, isDeleted) 
VALUES("'.$usuario_encriptado1.'",'.$tipo_us.','.$dni.',"'.$nombre.'","'.$apellido.'","'.$pass_encriptada4.'",NOW(),'.$estado.')';

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