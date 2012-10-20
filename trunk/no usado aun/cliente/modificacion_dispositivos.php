<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>

</head>

<body>
	<!-- Encabezado-->
	<?php include("../encabezado.php");?>

	<!-- Menú-->
	<?php include("menu.php");?>

	<!-- Principal-->
	<div class="container_12" id="principal">
		<div class="grid_12">
			<h1>Modificar Dispositivo</h1>
		</div>
		<div class="grid_12">

			<?php

			include ("conexion_bdd.php");

			include ("consulta_bdd.php");

			//levanto el Id del dispositivo y cliente
			$id=$_GET["id_cliente"];
			$dispositivo_id=$_GET["id_dispositivo"];


			$conexion=conectarbd("localhost","root","","seguweb");

			$query="SELECT id, tipo_dispositivo_id, estado_habilitacion_id, estado, inmobilizado, id_externo, cliente_id, descripcion
			FROM dispositivo
			WHERE id = '$dispositivo_id'";//consulta sobre ese dispositivo.

			$consulta=consulta($query, $conexion);

			if(mysql_num_rows($consulta)==0){

				print("<br>Error, no existen registros con estos datos");
			}
			else
				for ($i=0; $i<mysql_num_rows($consulta); $i++)
				{
					$fila = mysql_fetch_array($consulta);


					$tipo_dispositivo_id=$fila["tipo_dispositivo_id"];
					$estado_habilitacion_id=$fila["estado_habilitacion_id"];
					$estado=$fila["estado"];
					$inmobilizado=$fila["inmobilizado"];
					$id_externo=$fila["id_externo"];
					$cliente_id=$fila["cliente_id"];
					$descripcion=$fila["descripcion"];

				}
				?>

			<?php
			//tipo de dispositivo

			$query="select id, descripcion from tipo_dispositivo";

			$consulta=consulta($query, $conexion);
			if(mysql_num_rows($consulta)==0){

				print("<br>Error, no existen registros con estos datos");
			}
			else
				$cantTiposDispo=mysql_num_rows($consulta);
			for ($i=0; $i<$cantTiposDispo; $i++)
			{
				$fila = mysql_fetch_array($consulta);
				$tipos_dispositivos_id[]=$fila["id"];
				$tipos_dispositivos_desc[]=$fila["descripcion"];
			}
			//tipo de estado habilitacion

			$query="select id, descripcion from estado_habilitacion";

			$consulta=consulta($query, $conexion);
			if(mysql_num_rows($consulta)==0){

				print("<br>Error, no existen registros con estos datos");
			}
			else
				$cantTiposEstado=mysql_num_rows($consulta);
			for ($i=0; $i<$cantTiposEstado; $i++)
			{
				$fila = mysql_fetch_array($consulta);
				$estados_habilitacion_id[]=$fila["id"];
				$estados_habilitacion_desc[]=$fila["descripcion"];
			}

			?>


			<form name="formulario" action="abm_dispositivo.php" method="post">
				<table>
					<tr>
						<td><input type="hidden" name="dispositivo_id"
							value="<?php echo $dispositivo_id?>" /></td>
						<td><input type="hidden" name="dispositivo_id_externo"
							value="<?php echo $id_externo?>" /></td>
						<td><input type="hidden" name="tipo_dispositivo_id"
							value="<?php echo $tipo_dispositivo_id?>" /></td>
						<td><input type="hidden" name="estado_habilitacion_id"
							value="<?php echo $estado_habilitacion_id?>" /></td>
						<td><input type="hidden" name="id" value="<?php echo $id?>" /></td>
					</tr>
					<tr>
						<td>Descripcion:</td>
						<td><input type="text" name="descripcion"
							value="<?php echo $descripcion?>" /></td>
					</tr>
					<tr>
						<td>Tipo:</td>
						<td><select name="tipo_dispositivo" style="width: 200px;">

								<?php 
								for ($i=0; $i<$cantTiposDispo; $i++){
									echo '<option value="'.$tipos_dispositivos_id[$i].'"';
									if ($tipos_dispositivos_id[$i]==$tipo_dispositivo_id)	 echo ' selected="selected" ';
									echo ('>'.$tipos_dispositivos_desc[$i]. '</option>');
								}
								?>
						</select></td>
					</tr>
					<tr>
						<td>Estado:</td>
						<td><select name="estado" style="width: 200px;">
								<option value="ACTIVO" <?php if ($estado=='ACTIVO')	 echo ' selected="selected" '; ?> >ACTIVO</option>
								<option value="INACTIVO" <?php if ($estado=='INACTIVO')	 echo ' selected="selected" '; ?>>INACTIVO</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Inmobilizar:</td>
						<td>
						
						<input type="checkbox" name="inmobilizado" value="1" 
						<?php if($inmobilizado==1) echo 'checked="checked"';?>" /></td>
					</tr>
					<tr>
						<td>Estado Habilitaci&oacute;n:</td>
						<td><input type="text" readonly="readonly"
							name="estado_habilitacion_desc"
							value="<?php 
			for ($i=0; $i<$cantTiposEstado; $i++){
				if ($estados_habilitacion_id[$i]==$estado_habilitacion_id)	 echo $estados_habilitacion_desc[$i];

			}?>" />
					
					</tr>
				</table>
				<input type="submit" name="abm" value="Modificar" class="boton" /> <a
					href="dispositivos.php" class="boton">Cancelar</a>
			</form>


		</div>
	</div>


	<!-- Pie-->
	<?php include("../pie.php");?>
</body>
</html>
