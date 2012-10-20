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



<?php
include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

$us=$sesion->get("usuario");

$query="SELECT alarma . *
FROM usuario
JOIN dispositivo ON usuario.cliente_id = dispositivo.cliente_id
JOIN alarma ON alarma.dispositivo_id = dispositivo.id
where usuario.usuario='".$us."'";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$alarma_dispositivo_id=$fila["dispositivo_id"];
}
?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Mis Alarmas</h1>

<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "dispositivo_alarma", "fecha" , "dispositivo_id = '.$alarma_dispositivo_id.' and fecha_baja='0000-00-00 00:00:00'");

$x->setColumnHeader('fecha', '|| &nbsp&nbsp&nbsp Fecha alarma:');
$x->setColumnHeader('estado', 'Estado de alarma:');
$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('descripcion', 'Descripción:');



$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_alarma.php?fecha=%fecha%&dispositivo_id=%dispositivo_id%')");
$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "if(confirm('¿Deseas realmente eliminar?')){window.location = ('baja_alarma.php?fecha=%fecha%')}");
//$x->showCreateButton("window.location = ('alta_alarma.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nueva Alarma');

// Hide ID Column

$x->hideColumn('falsa');
$x->hideColumn('dispositivo_id');


// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "alert('Deleting %id%')");

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


<div class="grid_12" align="center">
<br />
<br />
<h1>Para ver la ubicación de las alarmas, correspondientes a sus dispositivos haga clic<br /><a href="../cliente/dispositivos.php">aqui</a></h1>
<br />
</div>


</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>