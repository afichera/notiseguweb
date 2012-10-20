<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
</head>

<body>
<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
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
$db = new EyeMySQLAdap('localhost', 'root', '', 'notiseguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

$id_cliente = 2;

// Set the query, select all rows from the people table
$x->setQuery("*", "usuario_rol", "" , "1");

// Hide ID Column
$x->hideColumn('id');
// Show reset grid control

// Add standard control

$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('periodistas_baja.php?id=%id%&confirma=0')");

// Add create control
$x->showCreateButton("window.location = ('periodistas_alta.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Periodista');

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
<?php include("pie.php");?>
</body>
</html>