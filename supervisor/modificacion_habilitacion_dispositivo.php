<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12">
    <h1>Modificar Habilitación Dispositivo</h1>
  </div>
  <div class="grid_12">
    <?php

			include ("conexion_bdd.php");

			include ("consulta_bdd.php");

			//levanto el Id del dispositivo y cliente
			$id=$_GET["id"];

			$conexion=conectarbd("localhost","root","","seguweb");

			$query="SELECT id, estado_habilitacion_id, descripcion, motivo_baja, id_externo, alta_server, tipo_dispositivo_id
			FROM dispositivo
			WHERE id = '$id'";//consulta sobre ese dispositivo.

			$consulta=consulta($query, $conexion);








			if(mysql_num_rows($consulta)==0){

				print("<br>Error, no existen registros con estos datos");
			}
			else
			
			
			
			
				for ($i=0; $i<mysql_num_rows($consulta); $i++)
				{
					$fila = mysql_fetch_array($consulta);
					$estado_habilitacion_id=$fila["estado_habilitacion_id"];
					$descripcion=$fila["descripcion"];
					$motivo_de_baja=$fila["motivo_baja"];
					$alta_server=$fila["alta_server"];
					$estado_habilitacion_id_ant=$fila["estado_habilitacion_id"];
					$id_externo=$fila["id_externo"];
					$tipo_dispositivo_id=$fila["tipo_dispositivo_id"];
				}
				?>
    <?php
			
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
    <form name="formulario" action="modificacion_dispositivos_submit.php" method="post" onSubmit="return verificar_modificacion_habilitacion_dispositivo()" >
				<table>
					<tr><td>ID: </td>
						<td><input type="text" name="id"
							value="<?php echo $id?>" disabled="disabled"/><input type="hidden" name="id"
							value="<?php echo $id?>"/><input type="hidden" name="id_externo" 
							value="<?php echo $id_externo?>"/><input type="hidden" name="estado_habilitacion_id_ant" 
							value="<?php echo $estado_habilitacion_id_ant?>"/><input type="hidden" name="alta_server" 
							value="<?php echo $alta_server?>"/>
							<input type="hidden" name="tipo_dispositivo_id" 
							value="<?php echo $tipo_dispositivo_id?>"/>
							
    </td>
    </tr>
    <tr>
      <td>Descripcion:</td>
      <td><input type="text" name="descripcion"	value="<?php echo $descripcion?>" />
        <label class="alerta" id="descripcion_msg"> </label></td>
    </tr>
    <tr>
      <td>Estado Habilitaci&oacute;n:</td>
      <td><select name="estado_habilitacion" />
        
        <?php
for ($i=0; $i<$cantTiposEstado; $i++){
echo '<option value="'.$estados_habilitacion_id[$i].'"';
if ($estados_habilitacion_id[$i]==$estado_habilitacion_id)	 echo ' selected="selected" ';
echo ('>'.$estados_habilitacion_desc[$i]. '</option>');
}
 ?>
        </select></td>
    </tr>
    <tr>
      <td>Motivo de baja:</td>
      <td><input type="text" name="motivo_de_baja" value="<?php echo $motivo_de_baja?>" />
        <label class="alerta" id="motivo_de_baja_msg"> </label></td>
    </tr>
    </table>
    <input type="submit" name="abm" value="Modificar" class="boton" />
    <a	href="admin_dispositivos.php" class="boton">Cancelar</a>
    </form>
    
    
  </div>
</div>

<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>
