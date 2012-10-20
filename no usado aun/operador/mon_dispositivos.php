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

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<a name="arriba"></a> 
<h1>Monitoreo de Dispositivos</h1>
<a href="#mapa"><img src="../imagenes/icono-mapa.png" width="85" height="60" />ir al mapa</a> 



<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "dispositivo_alarma_seguimiento", "id", "1");

$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('estado', 'Estado:');
$x->setColumnHeader('descripcion', 'Descripción:');
$x->setColumnHeader('inmobilizado', 'Dispositivo On / Off:');



//$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_dispositivos.php?id_dispositivo=%id%&id_cliente=%cliente_id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column

$x->hideColumn('tipo_dispositivo_id');
$x->hideColumn('estado_habilitacion_id');
$x->hideColumn('id_externo');
$x->hideColumn('latitud');
$x->hideColumn('longitud');
$x->hideColumn('falsa');
$x->hideColumn('dispositivo_id');


// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_dispositivo.php?id_dispositivo=%id%')");

// Add create control

// Show checkboxes
//$x->showCheckboxes();

// Show row numbers
//$x->showRowNumber();

// Change the amount of results per page
$x->setResultsPerPage(50);

// Stop ordering
$x->hideOrder();



// Print the table
$x->printTable();
?>


<div class="container_12" align="center">
<div class="grid_3">
<a name="mapa"></a> 
<br />
<br />
<h1>Todos los Dispositivos:</h1>
</div>
<div class="grid_9">
<h4 style="color:#F00">Los Dispositivos con Alarmas ACTIVAS ('ON') aparecen con el ícono ROJO</h4>
<h4 style="color:#00F">Los Dispositivos con Alarmas INACTIVAS ('OFF') aparecen con el ícono AZUL</h4>
</div>
<div class="grid_12">
<?php include("../operador/mapa.php"); 
?>
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