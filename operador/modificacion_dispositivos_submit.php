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
<div class="grid_12" >
<?php
$abm=$_POST['abm'];


include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");



$id=$_POST['id'];	
$descripcion=$_POST['descripcion'];	

$estado_habilitacion=$_POST['estado_habilitacion'];
$motivo_baja=$_POST['motivo_de_baja'];
$query="
UPDATE dispositivo SET descripcion = '".$descripcion."',
estado_habilitacion_id = '".$estado_habilitacion."',
motivo_baja = '".$motivo_baja."'   
WHERE id =".$id."
";

$consulta=consulta($query, $conexion);

if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='admin_dispositivos.php' class='boton'>Aceptar</a>";
	include ("../scripts/carga_log.php");carga_log ("Se modificó el estado de habilitación del dispositivo datos: ".$id.",".$estado_habilitacion.",".$motivo_baja.".",$sesion->get("usuario"), 1);}
	else {
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