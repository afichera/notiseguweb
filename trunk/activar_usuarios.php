<?php 
	session_start();
	
	if($_SESSION['rango'] == 1)
	{
		include "conexion.php";
			
		$username = $_GET['username'];
		//$comentario = $_POST['comentario'];
		//$autor = $_POST['autor_comentario'];
		
		//echo $username;
		//$query='INSERT INTO comments (id, newsId, visitorUserName, description, creationDate) VALUES(NULL,"'.$idNoticia.'",NULL,"'.$comentario.'",NOW())';
		//$query='DELETE FROM users WHERE username="'.$username.'"';
		$query='UPDATE users SET isDeleted = "0" WHERE username = "'.$username.'"';
		mysql_query($query);
		
		mysql_close($conexion);
		
		echo '<html><head></head><body>';
		echo '<script language="javascript">';
		echo 'window.location="ver_usuarios.php"';
		echo '</script>';
		echo '</body></html>';
		
	}else
		{
			echo 'No tiene los permisos necesarios para realizar esta acción';
			die();
		}

?>