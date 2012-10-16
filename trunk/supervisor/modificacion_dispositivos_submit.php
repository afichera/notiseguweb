<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
</head>

<body>

	<!-- Encabezado-->
<?php include("../encabezado.php");?>

	<!-- Menú-->
<?php include("menu.php");?>

	<!-- Principal-->
	<div class="container_12" id="principal">
		<div class="grid_12">
		<?php
		$abm=$_POST['abm'];


		include ("conexion_bdd.php");

		include ("consulta_bdd.php");

		$conexion=conectarbd("localhost","root","","seguweb");



		$id=$_POST['id'];
		$descripcion=$_POST['descripcion'];
		$id_externo=$_POST['id_externo'];
		$estado_habilitacion=$_POST['estado_habilitacion'];
		$tipo_dispositivo_id=$_POST['tipo_dispositivo_id'];
		$estado_habilitacion_ant=$_POST['estado_habilitacion_id_ant'];
		$alta_server=$_POST['alta_server'];

		$motivo_baja=$_POST['motivo_de_baja'];
		$query="
UPDATE dispositivo SET descripcion = '".$descripcion."',
estado_habilitacion_id = '".$estado_habilitacion."',
motivo_baja = '".$motivo_baja."'   
WHERE id =".$id."
";

		$consulta=consulta($query, $conexion);

		if ($consulta==1){
			if($estado_habilitacion == 1 && $estado_habilitacion_ant!=1 && $alta_server!=1){
				$mensajeRecibido = file_get_contents("http://200.32.20.13/alta.php?dispo=".$id_externo."&usuario=28230014&clave=28230014&tipo=".$tipo_dispositivo_id);
				//Aca hay que validar el estado del recibido. Si esta todo bien
				if (strlen(strstr($mensajeRecibido,'OK'))>0) {
					$estaTodoOK = true;	
				}elseif (strlen(strstr($mensajeRecibido,'FAIL'))>0){
					$estaTodoOK = false;
					echo "entro por fail";					
				}else{
					$estaTodoOK = false;
					echo "leyo cualquiera";
				}
				
				if($estaTodoOK){
					$query="UPDATE dispositivo SET alta_server = 1
						WHERE id =".$id."";					
				}else{
					$query="UPDATE dispositivo SET alta_server = 0,
								   estado_habilitacion_id = 2 
						WHERE id =".$id."";
				}
				$consulta=consulta($query, $conexion);
				if($consulta ==1){
					if($estaTodoOK){
						echo "La operacion se realizó con éxito <br/>
					<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
						include ("../scripts/carga_log.php");carga_log ("Se modificó el estado de habilitación del dispositivo datos: ".$id.",".$estado_habilitacion.",".$motivo_baja.".",$sesion->get("usuario"), 1);
					}else{
						echo "No se pudo habilitar el dispositivo en el servidor de poll. El dispositivo queda pendiente de habilitar.<br/>
					<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
						include ("../scripts/carga_log.php");carga_log ("No se pudo habilitar el dispositivo en el servidor de poll. El dispositivo queda pendiente de habilitar.: ".$id.", 2,".$motivo_baja.".",$sesion->get("usuario"), 1);
						
					}

				}else{
					echo "No se pudo realizar la operación. Contacte al administrador <br/>
						<input type='button' value='Back' onclick='goBack()' class='boton' />";					
				}

			}elseif($estado_habilitacion == 4 && $alta_server==1){
				$accion = 'BAJA';
				$mensajeRecibido = file_get_contents("http://200.32.20.13/consulta.php?dispo=".$id_externo."&usuario=28230014&clave=28230014&accion='".$accion."'&tipo=".$tipo_dispositivo_id);
				//Aca hay que validar el estado del recibido. Si esta todo bien
							
				if (strlen(strstr($mensajeRecibido,'OK'))>0){
					$estaTodoOK = true;									
				}else{
					$estaTodoOK = false;
					echo "leyo cualquiera";
				}
				
				if($estaTodoOK){
					$query="UPDATE dispositivo SET alta_server = 0
						WHERE id =".$id."";					
				}else{
					$query="UPDATE dispositivo SET estado_habilitacion_id = ".$estado_habilitacion_ant. 
						" WHERE id =".$id."";
				}
				$consulta=consulta($query, $conexion);
				if($consulta ==1){
					if($estaTodoOK){
						echo "La operacion se realizó con éxito <br/>
					<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
						include ("../scripts/carga_log.php");carga_log ("Se modificó el estado de habilitación del dispositivo datos: ".$id.",".$estado_habilitacion.",".$motivo_baja.".",$sesion->get("usuario"), 1);
					}else{
						echo "No se pudo dar de baja el dispositivo en el servidor de poll. El dispositivo queda con su estado anterior.<br/>
					<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
						include ("../scripts/carga_log.php");carga_log ("No se pudo dar de baja el dispositivo en el servidor de poll. El dispositivo queda con su estado anterior.: ".$id.", 2,".$motivo_baja.".",$sesion->get("usuario"), 1);
						
					}

				}else{
					echo "No se pudo realizar la operación. Contacte al administrador <br/>
						<input type='button' value='Back' onclick='goBack()' class='boton' />";					
				}
				
			}else{
				echo "La operacion se realizó con éxito <br/>
					<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
				include ("../scripts/carga_log.php");carga_log ("Se modificó el estado de habilitación del dispositivo datos: ".$id.",".$estado_habilitacion.",".$motivo_baja.".",$sesion->get("usuario"), 1);}

		}else {
			echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
		}




		?>
		</div>
	</div>


	<!-- Pie-->
	<?php include("../pie.php");?>
</body>
</html>
