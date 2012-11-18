<?PHP
	session_start();
	include('conexion.php');

	$query='SELECT username FROM users ORDER BY username ASC';
	$result=mysql_query($query);

	//mysql_close($conexion);
	

	
if(isset ($_SESSION['rango']) && $_SESSION['rango'] == '1')
	
	{
	
	
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
				<li class="selected"><a href="editor.php"><span>Cargar Noticia</span></a></li>
				<li><a href="nuevo_usuario.php"><span>Alta Usuario</span></a></li>
				<li><a href="ver_usuarios.php"><span>Ver Usuarios</span></a></li>
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
				<form method="post" id="form_alta_nota" name="form_alta_nota" action="registrar_nota.php">
					
					<table>
						<tr>
							<td colspan=2><b>Escribir Noticia</b></td>					
						</tr>
						
						<tr>
							<td>Titulo</td>
							<td><input type="text" id="titulo_noticia" name="titulo_noticia" size="40" maxlength="100"/></td>
						</tr>
						
						<tr>
							<td>Contenido</td>
							<td><textarea id="contenido_noticia" name="contenido_noticia" rows="13" cols="40" maxlength="500"></textarea></td>
						</tr>
						
						<tr>
							<td>Autor</td>
							<td>
								<select id="autor_noticia" name="autor_noticia">
									<?php
										
										while($fila=mysql_fetch_row($result))
										{
											$usuarioEncriptado = $fila['0'];
											$usuarioDesencriptado = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5("E5t0EsUnaCl4veSegur4"), base64_decode($usuarioEncriptado), MCRYPT_MODE_CBC, md5(md5("E5t0EsUnaCl4veSegur4"))), "\0");
											echo "<option value='".$usuarioDesencriptado."'>".$usuarioDesencriptado."</option>";
										}

									?>
								</select>
							</td>
						</tr>
						
						<tr>
							<td>
								<input type="submit" id="guardar" name="guardar" value="Guardar" onClick="validar()"/>
							</td>
							<td>
								<input type="reset" id="cancelar" name="cancelar" value="Cancelar"/>
							</td>
							
						</tr>
					
					</table>
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
			echo 'No tiene los permisos necesarios para ver esta pagina';
			die();
		}
?>