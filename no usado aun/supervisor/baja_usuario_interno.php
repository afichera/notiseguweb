<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<?php
$id=$_GET['id'];
$confirma=$_GET['confirma'];

if ($confirma==0)
{echo '<p>�Est� seguro que desea dar de baja el cliente?</p>
<form name="confirma" action="baja_usuario_interno.php?id='.$id.'&confirma=1" method="post">
<input type="submit" name="abm" value="Aceptar" class="boton"/>
<a href="Usuarios_internos.php" class="boton">Cancelar</a>
</form>';
} else
{


include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");



$query="
UPDATE usuario SET fecha_baja = NOW() WHERE usuario.id =".$id."
";

$consulta1=consulta($query, $conexion);


if ($consulta1==1){
	echo "La operacion se realiz� con �xito <br/>
	<a href='usuarios_internos.php' class='boton'>Aceptar</a>";
	include ("../scripts/carga_log.php");carga_log ("Se dio de baja al usauri interno con id ".$id.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operaci�n. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};




?>
</div>
</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>