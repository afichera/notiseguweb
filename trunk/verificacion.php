<?php 
	//Session_destroy();
	session_start();
	
	include "conexion.php";
		
	$username = $_POST['username'];
	$pass = $_POST['password'];
	
    $error = false; // no hay errores 
    
   // Validar el usuario ( solo valores alfanumericos ) 
   if (preg_match("/^[A-Za-z0-9]{3,}$/", trim($username))) { 
      // Validar la pass 
      if (preg_match("/^[A-Za-z0-9]{3,}$/", trim($pass))) { 
         // Todo OK 
         echo "Datos correctos!!!"; 
		 
		 //CONSULTO LA BASE DE DATOS PARA COMPROBAR QUE EL USUARIO INGRESADO EXISTA.
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
	
	         exit(); 
	      } else { // Error en la pass
	         $error = true; 
	      } 
	   } else { // Error en el usuario 
	      $error = true; 
	   } 
    
   // Muestro el error
   if ($error == true) { 
      echo "Error los datos no son correctos <br> por favor intentelo nuevamente"; 
      exit(); 
   } 
?>