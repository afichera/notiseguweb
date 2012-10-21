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
		include ("conexion_bdd.php");

		include ("consulta_bdd.php");

		//Averiguo cual es el id del usuario que inicio sesion
		$nombreUsuario=$sesion->get("usuario");		
		if($nombreUsuario!=null){
			$conexion=conectarbd("localhost","root","","notiseguweb");
			$query="SELECT * FROM usuario WHERE nombre_usu='$nombreUsuario'";
			$consulta2=consulta($query, $conexion);

			while(isset($consulta2) && $row = mysql_fetch_array($consulta2)) {
				$id=$row["id"];
				$nombreApellido=$row["nombre_apellido"];
			}

		}
		
		$notaId=$_POST['notaId'];

		$conexion=conectarbd("localhost","root","","notiseguweb");
		$query="UPDATE NOTA SET fecha_hora_baja = NOW() where id = '$notaId';"; 
		$consulta1=consulta($query, $conexion);
		$id_generado=mysql_insert_id();

		if ($consulta1==1){
			//
			echo "La operacion se realiz&oacute; con &eacute;xito <br/>
					<a href='index.php' class='boton'>Aceptar</a>";

		}else {
			echo "No se pudo realizar la operaci&oacute;n. Contacte al administrador <br/>
			<input type='button' value='Back' onclick='goBack()' class='boton' />";
		}
			

		?>
		</div>

		<!-- Pie-->
		<?php include("pie.php");?>

</body>
</html>