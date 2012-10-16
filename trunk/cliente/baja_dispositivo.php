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
include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

$dispositivo_id=$_GET['id_dispositivo'];

$query="UPDATE dispositivo SET estado_habilitacion_id = '3', estado = 'INACTIVO' WHERE id = '$dispositivo_id'";
//TODO: Falta hacer la baja logica en el server del profesor.

$consulta=consulta($query, $conexion);
if ($consulta==1){
	echo "La operacion se realizó con éxito<br/>El dispositivo quedará pendiente de ser Eliminado. En 48 hs. la solicitud será procesada.  <br/>
	<a href='dispositivos.php' class='boton'>Aceptar</a>";
		include ("../scripts/carga_log.php");carga_log ("Se pasó a pendiente de baja al dispositivo con id ".$dispositivo_id.".",$sesion->get("usuario"), 1);
}
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