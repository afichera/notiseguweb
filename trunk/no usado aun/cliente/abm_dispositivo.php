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
$dispositivo_id=$_POST['dispositivo_id'];	
$tipo_dispositivo_id=$_POST['tipo_dispositivo_id'];	

$estado=$_POST['estado'];
if (isset($_POST['inmobilizado'])) {$inmobilizado=$_POST['inmobilizado'];}
else $inmobilizado=0;	

$descripcion=$_POST['descripcion'];

if ($abm=='Agregar'){

$query="INSERT INTO dispositivo (
descripcion ,
tipo_dispositivo_id ,
estado ,
inmobilizado,
estado_habilitacion_id)
VALUES (
'$descripcion', $tipo_dispositivo_id, '$estado', '$inmobilizado', 2);";
$consulta=consulta($query, $conexion);

if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='dispositivos.php' class='boton'>Aceptar</a>";
	include ("../scripts/carga_log.php");carga_log ("Se creó un dispositivo datos: ".$descripcion.",".$tipo_dispositivo_id.",".$estado.",".$inmobilizado.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};


if ($abm=='Modificar'){

$query="
UPDATE dispositivo SET descripcion = '".$descripcion."',
estado = '".$estado."',
tipo_dispositivo_id = ".$tipo_dispositivo_id.",
inmobilizado = ".$inmobilizado."  
WHERE id =".$dispositivo_id."
";
$consulta=consulta($query, $conexion);

if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='dispositivos.php' class='boton'>Aceptar</a>";
		include ("../scripts/carga_log.php");carga_log ("Se modificó un dispositivo nuevos datos: ".$dispositivo_id.",".$descripcion.",".$tipo_dispositivo_id.",".$estado.",".$inmobilizado.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}
};


if ($abm=='Eliminar'){
	
	
	
$query="UPDATE dispositivo SET estado_habilitacion_id = '3', estado = 'INACTIVO' WHERE id = '$dispositivo_id'";
//TODO: Falta hacer la baja logica en el server del profesor.

$consulta=consulta($query, $conexion);
if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='dispositivos.php' class='boton'>Aceptar</a>";
		include ("../scripts/carga_log.php");carga_log ("Se creó un dispositivo datos: ".$descripcion.",".$tipo_dispositivo_id.",".$estado.",".$inmobilizado.",2.",$sesion->get("usuario"), 1);
}
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