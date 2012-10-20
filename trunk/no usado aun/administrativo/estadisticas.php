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
<h1>Estadísticas</h1>
<br />
<h2>Cantidad de Alarmas por Dispositivo:</h2>


<?php
//create view cant_alarma_x_dispo as SELECT dispositivo.id, dispositivo.descripcion, count( alarma.fecha ) AS cantidad_de_alarmas
//FROM alarma
//JOIN dispositivo ON alarma.dispositivo_id = dispositivo.id
//GROUP BY dispositivo.id
//LIMIT 0 , 30

require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';

// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);


// Set the query, select all rows from the people table
$x->setQuery("*", "cant_alarma_x_dispo","", "1");



$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('descripcion', 'Descripción:');
$x->setColumnHeader('cantidad_de_alarmas', 'Cantidad de Alarmas:');

// Hide ID Column
//$x->hideColumn('id');
//$x->hideColumn('tipo_doc_id');
//$x->hideColumn('fecha_baja');

// Show reset grid control

// Add standard control
//$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_cliente.php?id=%id%')");
//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_cliente.php?id=%id%&confirma=0')");
//
//// Add create control
//$x->showCreateButton("window.location = ('alta_cliente.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Cliente');

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

<img src="g1.php" />
<br />
<br />
<h2>Alarmas por Cliente:</h2>
<?php

//create or replace view alarma_x_cliente as
//SELECT cliente . * , count( alarma.fecha ) as cant_alarmas
//FROM cliente
//JOIN dispositivo ON cliente.id = dispositivo.cliente_id
//JOIN alarma ON alarma.dispositivo_id = dispositivo.id
//GROUP BY cliente.id, dispositivo.id
//LIMIT 0 , 30


//require 'class.eyemysqladap.inc.php';
//require 'class.eyedatagrid.inc.php';

// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);


// Set the query, select all rows from the people table
$x->setQuery("*", "alarma_x_cliente","", "1");



$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('descripcion', 'Descripción:');
$x->setColumnHeader('count( alarma.fecha )', 'Cantidad de Alarmas:');

// Hide ID Column
//$x->hideColumn('id');
//$x->hideColumn('tipo_doc_id');
//$x->hideColumn('fecha_baja');

// Show reset grid control

// Add standard control
//$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_cliente.php?id=%id%')");
//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_cliente.php?id=%id%&confirma=0')");
//
//// Add create control
//$x->showCreateButton("window.location = ('alta_cliente.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Cliente');

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
<img src="g2.php" />

<br />
<br />
<h2>Falsas Alarmas por Cliente:</h2>
<?php

//create or replace view falsa_alarma_x_cliente as
//SELECT cliente. * , count( alarma.fecha ) as cant_alarmas
//FROM cliente
//JOIN dispositivo ON cliente.id = dispositivo.cliente_id
//JOIN alarma ON alarma.dispositivo_id = dispositivo.id
//WHERE alarma.falsa =1
//GROUP BY cliente.id, dispositivo.id
//LIMIT 0 , 30


//require 'class.eyemysqladap.inc.php';
//require 'class.eyedatagrid.inc.php';

// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);


// Set the query, select all rows from the people table
$x->setQuery("*", "falsa_alarma_x_cliente","", "1");



$x->setColumnHeader('id', 'Id del Dispositivo:');
$x->setColumnHeader('descripcion', 'Descripción:');
$x->setColumnHeader('count( alarma.fecha )', 'Cantidad de Falsas Alarmas:');

// Hide ID Column
//$x->hideColumn('id');
//$x->hideColumn('tipo_doc_id');
//$x->hideColumn('fecha_baja');

// Show reset grid control

// Add standard control
//$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_cliente.php?id=%id%')");
//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_cliente.php?id=%id%&confirma=0')");
//
//// Add create control
//$x->showCreateButton("window.location = ('alta_cliente.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Cliente');

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

<img src="g3.php" />


<br />
<br />
<h2>Facturacion Total Mensual:</h2>
<?php

//create view falsa_alarma_x_cliente as
//SELECT cliente. * , count( alarma.fecha )
//FROM cliente
//JOIN dispositivo ON cliente.id = dispositivo.cliente_id
//JOIN alarma ON alarma.dispositivo_id = dispositivo.id
//WHERE alarma.falsa =1
//GROUP BY cliente.id, dispositivo.id
//LIMIT 0 , 30


//require 'class.eyemysqladap.inc.php';
//require 'class.eyedatagrid.inc.php';

// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);


// Set the query, select all rows from the people table
$x->setQuery("*", "facturacion","", "1");



//$x->setColumnHeader('id', 'Id del Dispositivo:');
//$x->setColumnHeader('descripcion', 'Descripción:');
//$x->setColumnHeader('count( alarma.fecha )', 'Cantidad de Falsas Alarmas:');

// Hide ID Column
//$x->hideColumn('id');
//$x->hideColumn('tipo_doc_id');
//$x->hideColumn('fecha_baja');

// Show reset grid control

// Add standard control
//$x->addStandardControl(EyeDataGrid::STDCTRL_EDIT, "window.location = ('modificacion_cliente.php?id=%id%')");
//$x->addStandardControl(EyeDataGrid::STDCTRL_DELETE, "window.location = ('baja_cliente.php?id=%id%&confirma=0')");
//
//// Add create control
//$x->showCreateButton("window.location = ('alta_cliente.php')", EyeDataGrid::TYPE_ONCLICK, 'Agregar nuevo Cliente');

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
<img src="g4.php" />



</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>