<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$localidades = new selects();
$localidades->id = $_GET["id"];
$localidades = $localidades->cargarLocalidades();
foreach($localidades as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>