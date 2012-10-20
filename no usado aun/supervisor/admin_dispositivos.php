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
<h1>ABM de Dispositivos</h1>
<h2>Dispositivos Pendientes de Habilitación</h2>

<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "admin_dispositivos", "id", "estado_id = 2");

$x->setColumnHeader('nombre_cliente', 'Nombre:');
$x->setColumnHeader('apellido_cliente', 'Apellido:');
$x->setColumnHeader('razon_social_cliente', 'Raz&oacute;n Social:');
$x->setColumnHeader('estado_descripcion', 'Estado:');




$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_habilitacion_dispositivo.php?id=%id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column


$x->hideColumn('estado_id');




// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_dispositivo.php?id_dispositivo=%id%')");

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
<br/><br/>
<h2>Dispositivos Pendientes de BAJA</h2>

<?php




// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "admin_dispositivos", "id", "estado_id = 3");

$x->setColumnHeader('nombre_cliente', 'Nombre:');
$x->setColumnHeader('apellido_cliente', 'Apellido:');
$x->setColumnHeader('razon_social_cliente', 'Raz&oacute;n Social:');
$x->setColumnHeader('estado_descripcion', 'Estado:');




$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_habilitacion_dispositivo.php?id=%id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column


$x->hideColumn('estado_id');




// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_dispositivo.php?id_dispositivo=%id%')");

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
<br/><br/>
<h2>Todos los dispositivos (Habilitados y Pendientes)</h2>

<?php




// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "admin_dispositivos", "id", "estado_id != 4");

$x->setColumnHeader('nombre_cliente', 'Nombre:');
$x->setColumnHeader('apellido_cliente', 'Apellido:');
$x->setColumnHeader('razon_social_cliente', 'Raz&oacute;n Social:');
$x->setColumnHeader('estado_descripcion', 'Estado:');




$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_habilitacion_dispositivo.php?id=%id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column


$x->hideColumn('estado_id');




// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_dispositivo.php?id_dispositivo=%id%')");

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




</div>
</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>