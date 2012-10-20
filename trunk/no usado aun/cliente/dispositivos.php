<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<?php include("actualizar_dispo_desde_poll.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>




<?php
// include ("conexion_bdd.php");

// include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

$us=$sesion->get("usuario");

$query="select u.cliente_id as id_cliente from usuario as u where u.usuario='".$us."'";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$id_cliente=$fila["id_cliente"];
}
?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<a name="arriba"></a> 

<h1>Mis Dispositivos</h1>
<a href="#mapa" title="Ir Arriba"><img src="../imagenes/icono-mapa.png" width="85" height="60" />ir al mapa</a> 
<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("id, descripcion, estado, inmobilizado, cliente_id", "dispositivo", "id", "cliente_id = '.$id_cliente.' and estado_habilitacion_id!=3");

$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('estado', 'Estado:');
$x->setColumnHeader('descripcion', 'Descripción:');
$x->setColumnHeader('inmobilizado', 'Dispositivo On / Off:');



$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_dispositivos.php?id_dispositivo=%id%&id_cliente=%cliente_id%')");
$x->showCreateButton("window.location = ('alta_dispositivo.php?id_cliente=$id_cliente')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column

$x->hideColumn('tipo_dispositivo_id');
$x->hideColumn('estado_habilitacion_id');
$x->hideColumn('id_externo');
$x->hideColumn('cliente_id');


// Show reset grid control

// Add standard control

$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "if(confirm('¿Deseas realmente eliminar?')){window.location = ('baja_dispositivo.php?id_dispositivo=%id%')}");

// Add create control

// Show checkboxes
//$x->showCheckboxes();

// Show row numbers
//$x->showRowNumber();

// Change the amount of results per page
$x->setResultsPerPage(10);

// Stop ordering
$x->hideOrder();



// Print the table
$x->printTable();
?>

<div class="container_12" align="center">
<div class="grid_3">
<a name="mapa"></a> 
<h1>Ubicación:</h1>
</div>
<div class="grid_9">
<h4 style="color:#F00">Los Dispositivos con Alarmas ACTIVAS ('ON') aparecen con el ícono ROJO</h4>
<h4 style="color:#00F">Los Dispositivos con Alarmas INACTIVAS ('OFF') aparecen con el ícono AZUL</h4>
</div>
<div class="grid_12">
<?php include("../cliente/mapa.php"); 
?>
<br />
<a href="../cliente/alarmas.php">ALARMAS Ver/ Activar/ Desactivar/ Modificar. Clic aqui.</a>
<br />
<a href="#arriba"><img src="images/flecha_arriba.png" width="35" height="35" /></a> 

</div>
</div>

</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>