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


if ($abm=='Agregar'){
$id=$_POST['id'];
$nombre=$_POST['nombre'];	
$apellido=$_POST['apellido'];	
$usuario=$_POST['usuario'];
$rol_id=$_POST['rol'];	
$password=$_POST['password'];
$query="INSERT INTO usuario (
nombre ,
apellido,
usuario,
password,
rol_id

)
VALUES (
'$nombre', '$apellido', '$usuario', '$password', $rol_id 
);";

$consulta1=consulta($query, $conexion);

if ($consulta1==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='usuarios_internos.php' class='boton'>Aceptar</a>";
	include ("../scripts/carga_log.php");carga_log ("Se creo un usuario interno. Datos ".$nombre.",".$apellido.",".$usuario.",".$rol_id.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};


if ($abm=='Modificar'){
$id=$_POST['id'];
$nombre=$_POST['nombre'];	
$apellido=$_POST['apellido'];	
$rol_id=$_POST['rol'];
$query="
UPDATE usuario SET nombre = '".$nombre."',
apellido = '".$apellido."',
rol_id = ".$rol_id."  
WHERE usuario.id =".$id."
";

$consulta1=consulta($query, $conexion);


if ($consulta1==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='usuarios_internos.php' class='boton'>Aceptar</a>";
		include ("../scripts/carga_log.php");carga_log ("Se modificó un usuario interno. Nuevos datos: ".$id.",".$nombre.",".$apellido.",".$rol_id.".",$sesion->get("usuario"), 1);}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};

if ($abm=='Cambiar Password'){
$id=$_POST['idusuario'];
$password=$_POST['password'];	

$query="UPDATE usuario SET 
password = '".$password."' 
WHERE usuario.id = ".$id;


$consulta=consulta($query, $conexion);

if ($consulta==1){
	echo "La operacion se realizó con éxito <br/>
	<input type='button' value='Volver' onclick='goBack()' class='boton' />";
		include ("../scripts/carga_log.php");carga_log ("Se cambio la password del usuario con id ".$id.".",$sesion->get("usuario"), 1);}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Volver' onclick='goBack()' class='boton' />";
	}
};

?>
</div>
</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>