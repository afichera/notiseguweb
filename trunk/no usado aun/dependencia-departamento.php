<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$departamentos = new selects();
$departamentos->id = $_GET["id"];
$departamentos = $departamentos->cargarDepartamentos();
foreach($departamentos as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>