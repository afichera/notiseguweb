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


$id=$_POST['id'];
$rol=$_POST['rol'];	

$query="UPDATE usuario SET 
rol_id = ".$rol." 
WHERE usuario.id = ".$id;
$consulta=consulta($query, $conexion);

if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='roles.php' class='boton'>Volver</a>";
	include ("../scripts/carga_log.php");carga_log ("Se cambio el rol del usuario con id ".$id." por el rol ".$rol.".",$sesion->get("usuario"), 1);
				}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Volver' onclick='goBack()' class='boton' />";
	}



?>
</div>
</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>