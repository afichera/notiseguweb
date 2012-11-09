<?PHP
	session_start();
	
	if($_SESSION['rango'] == 1)
	{
		include "conexion.php";
			
		//$query='SELECT username AS U, name AS N, surname AS AP, dni AS DNI,  FROM users';
		$query = "SELECT * FROM (users U JOIN roles R ON U.roleId = R.id)";
		
		$resultado = mysql_query($query);
?>

<html>
	<head>
		<meta charset="utf-8" />
		<title>Business Solutions</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="all" />
		<script type="text/javascript" language="javascript" src="funciones.js"></script>
	</head>
	<body>
		<div id="header">
			<div id="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="" /></a>		
			</div>		
			<ul>
				<li><a href="index.php"><span>Noticias</span></a></li>
				<li><a href="editor.php"><span>Cargar Noticia</span></a></li>
				<li><a href="nuevo_usuario.php"><span>Alta Usuario</span></a></li>
				<li class="selected"><a href="ver_usuarios.php"><span>Ver Usuarios</span></a></li>
				<li><a href="salir.php"><span>Salir</span></a></li>
				<!--
				<li><a href="products.html"><span>products</span></a></li>
				<li><a href="contact.html"><span>contact us</span></a></li>
				-->
			</ul>
		</div>
		
		<div id="body">
			<div class="header">

			</div>
			<div class="body">
				<div class="section">
					<a href="services.html">
					<img src="images/gears.jpg" alt="" />				
					services
					</a>			
				</div>	
				<div class="article">
					<img src="images/graph2.jpg" alt="" />		
					<h4>This website template has been designed by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a></h4>	
					<p>for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us.</p>
				</div>
				<div class="section">
					<a href="about.html"><img src="images/globe.jpg" alt="" />about</a>			
				</div>		
			</div>
			<div class="footer">
				<div class="section">
					<h3><a href="blog.html">blog</a></h3>	
					<ul>
						<li>
							<p>This website template has been designed</p>	
							<span>Sept 21, by Nullam | 99 Views | 69 Comments</span>		
						</li>		
						<li>
							<p>by <a href="http://www.freewebsitetemplates.com/">Free Website Templates</a> for you, for free. You can replace all this text with your own text.</p>
							<span>Sept 21, by Nullam | 99 Views | 69 Comments</span>				
						</li>	
						<li>
							<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>				
							<span>Sept 21, by Nullam | 99 Views | 69 Comments</span>
						</li>		
					</ul>	
				</div>
			<div class="featured">
				<!--
				<form method="post" id="form_ver_usu" name="form_ver_usu" action="modificar_usuario.php">
				-->
				<form method="post" id="form_ver_usu" name="form_ver_usu" action="ver_usuarios.php">

					<?PHP

						if(mysql_num_rows($resultado) > 0)
						{
					?>
							<table border=1>
								<tr>
									<td>Usuario</td>
									<td>Nombre</td>
									<td>Apellido</td>
									<!--
									<td>D.N.I.</td>
									-->
									<td>Puesto</td>
									<td>Estado</td>
									<!--
									<td>Cambiar Estado</td>
									-->
									<td>&nbsp;</td>
								</tr>
							<?PHP
								while($Rs = mysql_fetch_array($resultado))
								{
									echo
										"<tr>".
											"<td>".$Rs["username"]."</td>".
											"<td>".$Rs["name"]."</td>".
											"<td>".$Rs["surname"]."</td>".
											//"<td>".$Rs["dni"]."</td>".
											"<td>".$Rs["description"]."</td>";
											if($Rs["isDeleted"] == 0)
											{
												echo '<td>Activo</td>';
												echo '<td><a href="borrar_usuarios.php?username='.$Rs["username"].'">Borrar</a></td>';
											}else
												{
													if($Rs["isDeleted"] == 1)
													{
														echo '<td>Inactivo</td>';
														echo '<td><a href="activar_usuarios.php?username='.$Rs["username"].'">Activar</a></td>';
													}else
														{
															echo '<td>Vacio</td>';
															echo '<td><a href="activar_usuarios.php?username='.$Rs["username"].'">Activar</a></td>';
														}
												}
											//"<td>".$Rs["isDeleted"]."</td>".
											//echo '<td><a href="borrar_usuarios.php?username='.$Rs["username"].'">Borrar</a></td>'.
										/*
										"<td><a href=./modif_estado_usuarios.php?dni_us=".$Rs["dni"]."&accion=1>Activar</a></td>".
										"<td><a href=./modif_estado_usuarios.php?dni_us=".$Rs["dni"]."&accion=4>Suspender</a></td>".
										"<td><a href=./modif_estado_usuarios.php?dni_us=".$Rs["dni"]."&accion=0>Borrar</a></td>";
										*/

									echo "</tr>";
								}
							echo '</table>';
						}else
							{
						 
								echo "No hay usuarios registrados para listar";
						 
							}
							?>

				</form>

				
			</div>
			<div class="section">
				<h3>suspendisse aliquam</h3>	
				<ul class="news">
					<li>
						<p>You can remove any link to our</p>			
					</li>		
					<li>
						<p>website from this website template, you're free to use</p>				
					</li>	
					<li>
						<p>this website template without linking back to us.</p>							
					</li>		
					<li>
						<p>lorem ipsum dolor sit amet</p>
					</li>
					<li>
						<p>consectetur adipiscing nunc eu augue vel dui cursus</p>				
					</li>
				</ul>	
			</div>
			</div>
		</div>
		<div id="footer">
			<div>
				<div>
					<h3>america</h3>
					<ul>
						<li>457-380-1654 main</li>				
						<li>257-301-9417 toll free</li>
					</ul>			
				</div>		
				<div>
					<h3>europe</h3>
					<ul>
						<li>457-380-1654 main</li>				
						<li>257-301-9417 toll free</li>
					</ul>			
				</div>	
				<div>
					<h3>canada</h3>
					<ul>
						<li>457-380-1654 main</li>				
						<li>257-301-9417 toll free</li>
					</ul>			
				</div>	
				<div>
					<h3>middle east</h3>
					<ul>
						<li>457-380-1654 main</li>				
						<li>257-301-9417 toll free</li>
					</ul>			
				</div>	
				<div>
					<h3>follow us:</h3>
					<!--
					<a class="facebook" href="http://facebook.com/freewebsitetemplates" target="_blank">facebook</a>		
					<a class="twitter" href="http://twitter.com/fwtemplates" target="_blank">twitter</a>
					-->
				</div>	
			</div>
			<div>
				<p>&copy Copyright 2012. All rights reserved</p>
			</div>
		</div>
	</body>
</html>
<?PHP
	}else
		{
			echo 'No tiene los permisos necesarios para ver esta página';
			die();
		}
?>