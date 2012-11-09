<?php 
	//Session_destroy();
	session_start();
	
	include "conexion.php";
		
	$username = $_POST['username'];
	$pass = $_POST['password'];
	
		
	$query='SELECT * FROM users WHERE username="'.$username.'" AND password="'.$pass.'" AND isDeleted="0"';
	
	$resultado = mysql_query($query);
	
	$resultado2 = mysql_num_rows($resultado);

	if($resultado2 != '1')
	{
		mysql_close($conexion);
		echo 'Los datos no corresponden a un usuario activo.<br><br>';
		echo '<a href="login.php"><span>Identificarse</span></a>';
		//echo 'malos datos!!';//SI REDIRECCIONA DIRECTAMENTE CAMBIAR X PopUp

	}else
		{
			$Rs = mysql_fetch_array($resultado);
			$_SESSION['rango'] = $Rs['roleId'];
			$_SESSION['username'] = $Rs['username'];
			
			//echo 'logueado!!';
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
					//echo 'ERROR El tipo de empleado NO coincide con los predeterminados';
					
					echo '<html><head></head><body>';
					echo '<script language="javascript">';
					echo 'window.location="login.php"';
					echo '</script>';
					echo '</body></html>';
					
					break;
			}
		}
		
	
?>