<?php 
	session_start();
	
	if($_SESSION['rango'] == 2)
	{
		include "conexion.php";
		
			
		$titulo = $_POST['titulo_noticia'];
		$contenido = $_POST['contenido_noticia'];
		$autor = $_POST['autor_noticia'];
		
		//echo $contenido;

		$query='INSERT INTO news (id, userUsername, title, description, creationDate, isDeleted) VALUES(NULL,"'.$autor.'","'.$titulo.'","'.$contenido.'",NOW(),"0")';

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
			
			case ("2"):
				//echo 'Periodista';
				
				echo '<html><head></head><body>';
				echo '<script language="javascript">';
				echo 'window.location="periodista.php"';
				echo '</script>';
				echo '</body></html>';
				
				break;
			
			default:
				//echo 'ERROR El tipo de usuario NO coincide con los predeterminados';
				
				echo '<html><head></head><body>';
				echo '<script language="javascript">';
				echo 'window.location="index.php"';
				//echo 'window.location="nueva_nota.php"';
				echo '</script>';
				echo '</body></html>';
				
				break;
		}

	}else
		{
			echo 'No tiene los permisos necesarios para ver esta página';
			die();
		}

?>