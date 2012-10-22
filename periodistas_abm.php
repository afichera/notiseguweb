<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script src="../notiseguweb/js/funciones.js" type="text/javascript"></script>
<script src="../notiseguweb/js/validaciones.js" type="text/javascript"></script>

</head>

<body>

<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<?php
$abm=$_POST['abm'];

include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","notiseguweb");


$nombre=$_POST['nombre'];	
$usuario=$_POST['usuario'];
$password=$_POST['password'];

$query="select nombre_usu from usuario where nombre_usu = '$usuario'";
$consulta0=consulta($query, $conexion);
if(mysql_num_rows($consulta0)==0)
{
$query="INSERT INTO usuario (
nombre_apellido, 
nombre_usu, 
pass,
rol_id
)
VALUES (
'$nombre', '$usuario', '$password', 1
);";
$consulta1=consulta($query, $conexion);
if ($consulta1==1){
	echo "La operacion se realiz&oacute; con &eacute;xito <br/>
	<a href='periodistas.php' class='boton'>Aceptar</a>";
	
	}
	else {
		echo "No se pudo realizar la operaci&oacute;n. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

}

else {
			echo "Ya existe ese nombre de usuario en la base. Elija otro. <br/>
		<input type='button' value='Volver' onclick='goBack()' class='boton' />";
	
}







?>
</div>
</div>


<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>