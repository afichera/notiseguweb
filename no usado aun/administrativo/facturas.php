<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<head>
<?php include("head.php");?>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Facturación</h1>
<a href="nueva_facturacion.php" class="boton">Generar nueva facturación</a><br/><br/><br/>
<h2>Facturas pendientes de cobro</h2>
<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "factura_cliente", "id", "abonada = 0");

$x->setColumnHeader('id', 'Id de Factura:');
$x->setColumnHeader('numero', 'Número:');
$x->setColumnHeader('fecha_emi', 'Fecha de emisión:');
$x->setColumnHeader('importe', 'Importe Total:');
$x->setColumnHeader('nombre', 'Nombre:');
$x->setColumnHeader('apellido', 'Apellido:');
$x->setColumnHeader('razon_social', 'Razón Social:');



$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('pagar_factura.php?id_factura=%id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column

$x->hideColumn('abonada');
$x->hideColumn('cliente_id');

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
<br/><br/>
<h2>Facturas cobradas</h2>
<?php




// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("*", "factura_cliente", "id", "abonada = 1");

$x->setColumnHeader('id', 'Id de Factura:');
$x->setColumnHeader('numero', 'Número:');
$x->setColumnHeader('fecha_emi', 'Fecha de emisión:');
$x->setColumnHeader('importe', 'Importe Total:');
$x->setColumnHeader('nombre', 'Nombre:');
$x->setColumnHeader('apellido', 'Apellido:');
$x->setColumnHeader('razon_social', 'Razón Social:');



$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('pagar_factura.php?id_factura=%id%')");
//$x->showCreateButton("window.location = ('alta_dispositivos.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Dispositivo');

// Hide ID Column

$x->hideColumn('abonada');
$x->hideColumn('cliente_id');

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

</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>