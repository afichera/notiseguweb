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
				
		//Averiguo cual es el id del usuario que inicio sesion
		$nombreUsuario=$sesion->get("usuario");	
		$conexion=conectarbd("localhost","root","","notiseguweb");
		$query="SELECT * FROM usuario WHERE nombre_usu='$nombreUsuario'";
		$consulta2=consulta($query, $conexion);
			
		while(isset($consulta2) && $row = mysql_fetch_array($consulta2)) {
			$id=$row["id"];
			$nombreApellido=$row["nombre_apellido"];
		}

	$autorSeleccionado=$_POST['autor'];
	$titulo=$_POST['titulo'];
	$texto=$_POST['texto'];


	$conexion=conectarbd("localhost","root","","notiseguweb");
	$query="SELECT * FROM usuario WHERE nombre_usu='$autorSeleccionado'";
	$consulta3=consulta($query, $conexion);
		
	while(isset($consulta3) && $row = mysql_fetch_array($consulta3)) {
		$idSeleccionado=$row["id"];
	}	
		
	$conexion=conectarbd("localhost","root","","notiseguweb");
	$query="
	INSERT INTO nota (titulo,texto,usuario_id,usuario_creador_id,fecha_hora_baja)
	VALUES ('$titulo','$texto','$idSeleccionado','$id','00/00/0000 00:00:00');";

	$consulta1=consulta($query, $conexion);
	$id_generado=mysql_insert_id();

	if ($consulta1==1){			
		echo "La operacion se realiz&oacute; con &eacute;xito";						
	}
	?>
	</div>

	<!-- Pie-->
	<?php include("pie.php");?>
</body>
</html>
