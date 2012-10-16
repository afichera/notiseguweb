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
$id=$_GET['id'];
$confirma=$_GET['confirma'];

if ($confirma==0)
{echo '<p>¿Está seguro que desea dar de baja el cliente?</p>
<form name="confirma" action="baja_cliente.php?id='.$id.'&confirma=1" method="post">
<input type="submit" name="abm" value="Aceptar" class="boton"/>
<a href="clientes.php" class="boton">Cancelar</a>
</form>';
} else
{


include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");



$query="
UPDATE cliente SET fecha_baja = NOW() WHERE cliente.id =".$id."
";

$consulta1=consulta($query, $conexion);

$query="UPDATE domicilio SET fecha_baja = NOW() 
WHERE domicilio.cliente_id = ".$id;

$consulta2=consulta($query, $conexion);

$query="UPDATE contacto SET fecha_baja = NOW() 
WHERE contacto.cliente_id = ".$id;

$consulta3=consulta($query, $conexion);

$query="UPDATE usuario SET fecha_baja = NOW() 
WHERE usuario.cliente_id = ".$id;

$consulta4=consulta($query, $conexion);

$query="UPDATE dispositivo SET estado_habilitacion_id = 3, motivo_baja = 'Por baja del cliente'  
WHERE dispositivo.cliente_id = ".$id;

$consulta5=consulta($query, $conexion);

if ($consulta1==1&&$consulta2==1&&$consulta3==1&&$consulta4==1&&$consulta5==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='clientes.php' class='boton'>Aceptar</a>";
	
			include ("../scripts/carga_log.php");carga_log ("Se dio de baja lógica el cliente con id ".$id.".",$sesion->get("usuario"), 1);
	
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