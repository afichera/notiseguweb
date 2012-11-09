<?PHP
	session_start();
	include('conexion.php');

	$query='SELECT id, userUsername, title, description, creationDate, isDeleted FROM news WHERE isDeleted="0" ORDER BY creationDate DESC';
	// $result=mysql_query($query);

?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Business Solutions</title>
		<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	</head>
	<body>
		<div id="header">
			<div id="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="" /></a>		
			</div>		
			<ul>
				<li class="selected"><a href="index.php"><span>Noticias</span></a></li>
	
				<?PHP
					if(isset($_SESSION['rango']))
					{
						// echo "verdadero";
					// }else
						// {
							// echo "falso";
						// }
					
						switch($_SESSION['rango'])
						{
							case ("1"):
								//echo 'Editor';
								$query='SELECT id, userUsername, title, description, creationDate, isDeleted FROM news ORDER BY creationDate DESC';
								
								echo '<li><a href="editor.php"><span>Cargar Noticia</span></a></li>';
								echo '<li><a href="nuevo_usuario.php"><span>Alta Usuario</span></a></li>';
								echo '<li><a href="ver_usuarios.php"><span>Ver Usuarios</span></a></li>';
								echo '<li><a href="salir.php"><span>Salir</span></a></li>';
								
								break;
							
							case ("2"):
								//echo 'Periodista';
								
								echo '<li><a href="periodista.php"><span>Cargar Noticia</span></a></li>';
								echo '<li><a href="salir.php"><span>Salir</span></a></li>';
								
								break;
							
							default:
								//echo 'ERROR El tipo de usuario NO coincide con los predeterminados';

								echo '<li><a href="login.php"><span>Identificarse</span></a></li>';
															
								break;
						}
					}else
						{
							echo '<li><a href="login.php"><span>Identificarse</span></a></li>';
						}
					$result=mysql_query($query);
				?>
				
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
				
				<h3>Noticias </h3>
				<?PHP

					while($fila=mysql_fetch_row($result))
					{
						//echo "<div name='".$fila[id]."' id='".$fila[id]."'>";
						echo '<div name="nota">';
							//echo "<form name='".$fila['0']."' id='".$fila[id]."'>";
							echo '<form method="post" id="form_noticia" name="form_noticia" action="registrar_comentario.php">';
								echo "<h2>".$fila['2']."</h2>";
								echo $fila['3']."<br>";
								echo '<td><input type="hidden" name="numero_noticia" value="'.$fila['0'].'"/></td>';
								echo '<textarea name="comentario" rows="1" cols="40" maxlength="150"></textarea></br>';
								echo '<input type="submit" id="comentar" name="comentar" value="Comentar" />';
								
								if(isset($_SESSION['rango']))
								{
									if($_SESSION['rango'] == 1)
									{
										//echo '<input type="checkbox" name="borrar_noticia" value=1> Borrar';
										//echo '</form>';
										//echo '<form method="post" action="borrar_noticia.php">';
										if($fila['5'] == 0)
										{
											echo '<input type="submit" id="comentar" name="comentar" value="Borrar Noticia" />';
										}else
											{
												if($fila['5'] == 1)
												{
													echo '<input type="submit" id="comentar" name="comentar" value="Activar Noticia" />';
												}
											}
											
										//echo '</form><br>';
									}
								}
								echo "<br>";
							echo "</form>";


							$query2='SELECT id, newsId, visitorUsername, description, creationDate FROM comments WHERE newsId='.$fila['0'].' ORDER BY creationDate DESC';
							$result2=mysql_query($query2);

							while($fila2=mysql_fetch_row($result2))
							{		
								//echo '<hr><div background="#D8DFEA">';
								echo '<div>';
								echo "<h5>".$fila2['3']."</br>";
								echo '</div><hr>';
							}
							//echo '<hr>';
						echo "</div>";
					}

					mysql_close($conexion);

				?>
				
				<!--
				<ul>
					<li>
						<h3>If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forum">Forum</a>.</h3>		
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eu augue vel dui cursus porta. Nulla sit amet tellus urna</p>		
						<span>Sept 21, by Nullam | 99 Views | 69 Comments</span>
					</li>		
					<li>
						<h3>Vestibulum tristique, dui a vestibulum blandit, mi elit laoreet nulla consequat nec quam</h3>
						<img src="images/discussing.jpg" alt="" />
						<p>Morbi non leo augue, et hendrerit lectus. Pellentesque ultricies sapien ornare ipsum tempor lobortis ullamcorper urna</p>
						<span>Sept 21, by Nullam | 99 Views | 69 Comments</span>
					</li>	
				</ul>
				-->
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
					<a class="facebook" href="http://facebook.com/freewebsitetemplates" target="_blank">facebook</a>		
					<a class="twitter" href="http://twitter.com/fwtemplates" target="_blank">twitter</a>
				</div>	
			</div>
			<div>
				<p>&copy Copyright 2012. All rights reserved</p>
			</div>
		</div>
	</body>
</html>

<?PHP
	//mysql_close($conexion);
?>
	