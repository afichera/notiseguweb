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

$query="select u.cliente_id as id from usuario as u where u.usuario='".$us."'";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$id=$fila["id"];
}
?>


<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Mis Facturas</h1>
<?php
require 'class.eyemysqladap.inc.php';
require 'class.eyedatagrid.inc.php';



// Load the database adapter
$db = new EyeMySQLAdap('localhost', 'root', '', 'seguweb');

// Load the datagrid class
$x = new EyeDataGrid($db);

// Set the query, select all rows from the people table
$x->setQuery("id, numero, fecha_emi, importe", "factura", "id", "cliente_id = '.$id.'");

$x->setColumnHeader('id', 'Id de Factura:');
$x->setColumnHeader('numero', 'Número:');
$x->setColumnHeader('fecha_emi', 'Fecha de emisión:');
$x->setColumnHeader('importe', 'Importe Total:');



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