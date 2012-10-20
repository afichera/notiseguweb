<?php
include("clases/class.mysql.php");
include("clases/class.combos.php");
$selects = new selects();
$provincias = $selects->cargarProvincias();
foreach($provincias as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}
?>