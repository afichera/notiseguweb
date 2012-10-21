<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>

</head>

<body>
	<!-- Encabezado-->
	<?php include("encabezado.php");?>

	<!-- Men�-->
	<?php include("menu.php");?>

	<!-- Principal-->
	<div class="container_12" id="principal">
		<div class="grid_12">
			<h1>Nueva Noticia</h1>
		</div>
		<div class="grid_12">

			<?php

			include ("conexion_bdd.php");

			include ("consulta_bdd.php");			
			
			$consulta="SELECT * FROM usuario";
			$conexion=conectarbd("localhost","root","","notiseguweb");
			$consulta0=consulta($consulta, $conexion);
			
			?>


			<form name="formulario" action="noticias_nueva_submit.php" method="post">
				<table>
                <tr><td><input type="hidden" name="cliente_id" value="<?php echo $id; ?>" />
                	<tr>
						<td>Autor:</td>
						<?php 
						
						//Si es periodista el autor es el usuario que inicio sesion
						//Si es editor pueden elegir quien es el autor de la nota.
						
						if($sesion->get("rol") == "PERIODISTA"){
							echo '<td><input type="text" id="autor" name="autor" readonly="readonly" value="'.$sesion->get("usuario").'"/></td>';
						}
						
						if($sesion->get("rol") == "EDITOR"){
						echo '<td><select id="autor" name="autor" style="width: 200px;">';				
						$usuarioRegistrado = $sesion->get("usuario");						
						echo '<option selected="'.$usuarioRegistrado.'" value="'.$usuarioRegistrado.'">'.$usuarioRegistrado;'>';
							
							while(isset($consulta0) && $row = mysql_fetch_array($consulta0)) {
								if($usuarioRegistrado!=$row["nombre_usu"]){									
									echo '<option value="'.$row["nombre_usu"].'">'.$row["nombre_usu"];'';
								}
							}
							
						echo '</select></td>';
						}
						?>
						
					</tr>
					<tr>
						<td>Titulo de la noticia:</td>
						<td><input type="text" name="titulo"
							value="" /></td>
					</tr>
					
					<tr>
						<td>Texto:</td>
						<td><textarea  cols="40" rows="10" name="texto"></textarea></td>
					</tr>
			
					</table>
				<input type="submit" name="abm" value="Subir Noticia" class="boton" /> <a
					href="noticias.php" class="boton">Cancelar</a>
			</form>


		</div>
	</div>


	<!-- Pie-->
	<?php include("pie.php");?>
</body>
</html>
