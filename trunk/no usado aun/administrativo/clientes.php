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
<h1>Clientes</h1>
</div>
<div class="grid_12" >
<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';

// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

$id_cliente = 2;

// Set the query, select all rows from the people table
$x->setQuery("*", "cliente","razon_social", "fecha_baja = '0000-00-00 00:00:00'");

// Hide ID Column
$x->hideColumn('id');
$x->hideColumn('tipo_doc_id');
$x->hideColumn('fecha_baja');

// Show reset grid control

// Add standard control
$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_cliente.php?id=%id%')");
$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_cliente.php?id=%id%&confirma=0')");

// Add create control
$x->showCreateButton("window.location = ('alta_cliente.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Cliente');

// Show checkboxes
//$x->showCheckboxes();

// Show row numbers
//$x->showRowNumber();

// Change the amount of results per page
$x->setResultsPerPage(20);

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