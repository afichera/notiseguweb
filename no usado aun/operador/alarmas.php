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
<h1>Monitoreo de Alarmas</h1>


<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "dispositivo_alarma", "" , "1");

//$x->setColumnHeader('fecha', '|| &nbsp&nbsp&nbsp Fecha alarma:');



$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_alarma.php?fecha=%fecha%&dispositivo_id=%dispositivo_id%')");

$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "if(confirm('¿Deseas realmente eliminar?')){window.location = ('baja_alarma.php?fecha=%fecha%')}");

//$x->showCreateButton("window.location = ('alta_alarma.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nueva Alarma');

// Hide ID Column

//$x->hideColumn('falsa');
//$x->hideColumn('dispositivo_id');


// Show reset grid control

// Add standard control

//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "alert('Deleting %id%')");

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

</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>