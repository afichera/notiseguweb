<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/validaciones.js"></script>
</head>

<body>
	<!-- Encabezado-->
<?php include("encabezado.php");?>

	<!-- Men�-->
<?php include("menu.php");?>


	<!-- Principal-->
	<div class="container_12" id="principal">
		<div class="grid_12">

		<?php

		include ("conexion_bdd.php");

		include ("consulta_bdd.php");

		$id=$_GET["id"];

		$conexion=conectarbd("localhost","root","","notiseguweb");
		$query="SELECT * FROM nota n INNER JOIN usuario u ON n.usuario_id = u.id WHERE n.id =".$id;

		$consulta=consulta($query, $conexion);
		if(mysql_num_rows($consulta)==0){

			print("<br>Error, no existe esa noticia");
		}
		else
			
		for ($i=0; $i<mysql_num_rows($consulta); $i++)
		{
			$fila = mysql_fetch_array($consulta);
			$idNota=$fila["id"];
			$titulo=$fila["titulo"];
			$fecha=$fila["fecha_hora"];
			$texto=$fila["texto"];
			$autor=$fila["nombre_apellido"];
			echo "<h1>".$titulo."</h1>";

		}

		//Averiguo cual es el id del usuario que inicio sesion
		$nombreUsuario=$sesion->get("usuario");
		$conexion=conectarbd("localhost","root","","notiseguweb");
		$query="SELECT * FROM usuario WHERE nombre_usu='$nombreUsuario'";
		$consulta2=consulta($query, $conexion);
		$comentador = "An&oacute;nimo";
		$idSesion = -1;
		while(isset($consulta2) && $row = mysql_fetch_array($consulta2)) {
			$idSesion=$row["id"];
			$nombreSesion=$row["nombre_apellido"];
			$rolUsuario=$row["rol_id"];
			$comentador = $nombreSesion;
		}
		if ($consulta2==1){
			echo "La operacion se realiz&oacute; con &eacute;xito";
		}

		?>
		</div>
		<div class="grid_6" id="autor">
		<?php echo $autor;?>
		</div>
		<div class="grid_2" id="fecha">
		<?php echo $fecha;?>
		</div>
		<div class="clear"></div>
		<div class="grid_8" id="texto">
		<?php echo $texto;?>
		<br>
		<?php 
			if ($idSesion!=-1){				
				if ($rolUsuario == 2){
					echo "<form name='formulario_baja' action='borrar_nota.php'
							method='post'>
							<input type='hidden' id='notaId' name='notaId'
								value='$id'/>
					<input type='submit' value='Eliminar Nota' class='boton'></input>
					</form>"; 
				}
			}
		
		?>
		</div>
		

		<div class="clear"></div>
		<div class="grid_8" id="form_comentarios">
			<h2>Realice un comentario:</h2>
			<form name="formulario" action="comentario_nuevo_submit.php"
				method="post" onsubmit="return verificar_alta_comentario()">
				Autor: <input type="text" id="comentador" name="comentador"
					value="<?php echo $comentador;?>" />
					<label class="alerta" id="comentador_msg"></label>
				<br>
				Comentario:
				<br>
				<textarea type="text" id="comentario" name="comentario"></textarea>
				<label class="alerta" id="comentario_msg"></label>
				<br>
				<input type="submit" id="comentar" name="comentar" value="Comentar"/>
				<!--     		La Nota Id -->
				<input type="hidden" id="notaId" name="notaId"
					value="<?php echo $id;?>" /> <input type="hidden"
					name="comentadorId" id="comentadorId"
					value="<?php echo $idSesion;?>" />

			</form>

		</div>
		<div class="grid_8" id="comentarios">
			<h2>Comentarios:</h2>
			<?php
			$conexion=conectarbd("localhost","root","","notiseguweb");
			$query="SELECT * FROM comentario WHERE nota_id = '$id' ORDER BY fecha_hora DESC";
			$consulta3=consulta($query, $conexion);

			while($articulo=mysql_fetch_array($consulta3)) {
				echo '<div class="grid_8"><h2>'.$articulo["comentador"].'</h2>';				
				echo '<p>'.$articulo["texto"].'</p></div>';

			}
			?>
		</div>
	</div>
	<!-- Pie-->
	<?php include("pie.php");?>
</body>
</html>
