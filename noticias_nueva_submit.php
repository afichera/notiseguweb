<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
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
		$abm=$_POST['abm'];


		include ("conexion_bdd.php");

		include ("consulta_bdd.php");

		$conexion=conectarbd("localhost","root","","seguweb");



		$cliente_id=$_POST['cliente_id'];
		$descripcion=$_POST['descripcion'];
		$tipo_dispositivo_id=$_POST['tipo_dispositivo'];
				$query="
INSERT INTO dispositivo 
(tipo_dispositivo_id, 
estado_habilitacion_id, 
estado, 
cliente_id,
descripcion
)
VALUES (
$tipo_dispositivo_id,2,'ACTIVO',$cliente_id,'$descripcion');";

		$consulta1=consulta($query, $conexion);
		$id_generado=mysql_insert_id();
		$id_externo = 5555555+$id_generado;
		
		$query="UPDATE dispositivo SET id_externo = ".$id_externo." WHERE id = ".$id_generado.";";
		
		$consulta2=consulta($query, $conexion);
		
		






		if ($consulta1==1&&$consulta2==1){
						echo "La operacion se realiz&oacute; con &eacute;xito <br/>
					<a href='dispositivos.php' class='boton'>Aceptar</a>";
						include ("scripts/carga_log.php");carga_log ("Se cre� el dispositivo. Datos: ".$tipo_dispositivo_id.",2,ACTIVO,".$cliente_id.",".$descripcion.".",$sesion->get("usuario"), 1);
					}else{
						echo "No se pudo realizar la operaci&oacute;n. <br/>
					<input type='button' value='Volver' onclick='goBack()' class='boton' />";
						include ("scripts/carga_log.php");carga_log ("No se pudo crear el dispositivo",$sesion->get("usuario"), 1);
						
					}

	




		?>
		</div>
	</div>


	<!-- Pie-->
	<?php include("pie.php");?>
</body>
</html>
