<?php 
	//session_start();
	
	include "conexion.php";
	
	$idNoticia = $_POST['numero_noticia'];
	$comentario = $_POST['comentario'];
	//$autor = $_POST['autor_comentario'];
	
	switch($_POST["comentar"])
	{
		case ("Comentar"):
			
			//echo 'COMENTAR';
			$query='INSERT INTO comments (id, newsId, visitorUsername, description, creationDate) VALUES(NULL,"'.$idNoticia.'",NULL,"'.$comentario.'",NOW())';
			break;

		case ("Borrar Noticia"):
			//echo 'BORRAR';
			//$query='DELETE FROM comments WHERE newsId="'.$idNoticia.'"';
			$query='UPDATE news SET isDeleted ="1" WHERE id = "'.$idNoticia.'"';
			//mysql_query($query);
			
			//$query='DELETE FROM news WHERE id="'.$idNoticia.'"';
			break;
			
		case ("Activar Noticia"):
			//echo 'ACTIVAR';
			$query='UPDATE news SET isDeleted ="0" WHERE id = "'.$idNoticia.'"';

			break;
			
		default:
			echo 'no se';
			break;
	}
	
	mysql_query($query);
	mysql_close($conexion);
	
	echo '<html><head></head><body>';
	echo '<script language="javascript">';
	echo 'window.location="index.php"';
	echo '</script>';
	echo '</body></html>';
			
?>