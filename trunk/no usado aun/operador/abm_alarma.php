<?php require("../operador/sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("../operador/head.php");?>
<link href="../cliente/table.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("../operador/menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<?php
$abm=$_POST['abm'];




include ("../operador/conexion_bdd.php");

include ("../operador/consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");




if ($abm=='Agregar'){
	
$dispositivo_id=$_POST['dispositivo'];
$estado=$_POST['estado'];
$fecha=$_POST['fecha'];

echo 'Agregando... Fecha y Hora: '.$fecha.', Estado: '.$estado.', Para el dispositivo: '.$dispositivo_id;

$query="INSERT INTO `seguweb`.`alarma` (
`fecha` ,
`falsa` ,
`estado` ,
`dispositivo_id`
)
VALUES (
'$fecha', '0', '$estado', '$dispositivo_id'
);";
$consulta=consulta($query, $conexion);


if ($consulta){
	echo "</br>La operacion se realizó con éxito <br/>
	<a href='alarmas.php' class='boton'>Aceptar</a>";}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}


};



if ($abm=='Modificar'){
	
$dispositivo_id=$_GET['dispositivo_id'];
$estado=$_POST['estado'];
$fecha=$_POST['fecha'];
if (isset($_POST['falsa'])) {$falsa=$_POST['falsa'];}
else $falsa=0;

echo 'Modificando... Estado: '.$estado;

$query="UPDATE `alarma` SET `estado` = '$estado', falsa = $falsa WHERE `alarma`.`fecha` = '$fecha' AND `alarma`.`dispositivo_id` =$dispositivo_id";
$consulta=consulta($query, $conexion);


if ($consulta){
	echo "</br>La operacion se realizó con éxito <br/>
	<a href='alarmas.php' class='boton'>Aceptar</a>";
	
		include ("../scripts/carga_log.php");carga_log ("Se modifico estado de una ALARMA por parte de un operador, datos:".$fecha.",".$estado  ,$sesion->get("usuario"), 1);

	
	}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}


};


if ($abm=='Eliminar'){
	
$dispositivo_id=$_GET['dispositivo_id'];
$fecha=$_POST['fecha'];

echo 'Eliminando... Alarma: Fecha: '.$fecha.' Perteneciente al Dispositivo: '.$dispositivo_id;

$query="DELETE FROM `seguweb`.`alarma` WHERE `alarma`.`fecha` = '$fecha' AND `alarma`.`dispositivo_id` ='$dispositivo_id'";
$consulta=consulta($query, $conexion);


if ($consulta){
	echo "</br>La operacion se realizó con éxito <br/>
	<a href='alarmas.php' class='boton'>Aceptar</a>";}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
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