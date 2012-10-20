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

			//levanto el Id del dispositivo y cliente
			
			$conexion=conectarbd("localhost","root","","notiseguweb");
	//tipo de dispositivo

			?>


			<form name="formulario" action="noticias_nueva_submit.php" method="post">
				<table>
                <tr><td><input type="hidden" name="cliente_id" value="<?php echo $id; ?>" />
                
					<tr>
						<td>Descripcion:</td>
						<td><input type="text" name="descripcion"
							value="" /></td>
					</tr>
					<tr>
						<td>Tipo:</td>
						<td><select name="tipo_dispositivo" style="width: 200px;">

								<?php 
								for ($i=0; $i<$cantTiposDispo; $i++){
									echo '<option value="'.$tipos_dispositivos_id[$i].'"';
									echo ('>'.$tipos_dispositivos_desc[$i]. '</option>');
								}
								?>
						</select></td>
					</tr>
			
					</table>
				<input type="submit" name="abm" value="Alta" class="boton" /> <a
					href="noticias.php" class="boton">Cancelar</a>
			</form>


		</div>
	</div>


	<!-- Pie-->
	<?php include("pie.php");?>
</body>
</html>
