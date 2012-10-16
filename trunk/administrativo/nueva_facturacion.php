<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<script type="text/javascript" src="../js/validaciones.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Generar nueva facturación</h1>
<p>nota: utilizar punto como valor decimal</p><br/>
<?php
include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");
$query="select * from valor;";
$consulta=consulta($query, $conexion);
if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else {
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$valor5=$fila["valor5"];
$valor10=$fila["valor10"];
$valorextra=$fila["valorextra"];
$valorfalsa=$fila["valorfalsa"];
}

$anio=date("Y");
$mes=date("m");
}
?>
<form name="formulario" action="generar_facturas.php" method="post" onSubmit="return verificar_nueva_facturacion()">
<table>
<tr>
  <td> Año: </td>
  <td><input type="text" name="anio" value="<?php echo date("Y"); ?>" /> <label class="alerta" id="anio_msg"></label></td>
</tr>
<tr>
  <td> Mes: </td>
  <td><input type="text" name="mes" value="<?php echo date("m"); ?>" /> <label class="alerta" id="mes_msg"></label></td>
</tr>
<tr>
  <td> Valor Abono hasta 5 dispositivos: </td>
  <td><input type="text" name="valor5" value="<?php echo $valor5; ?>" /> <label class="alerta" id="valor5_msg"></label></td>
</tr>
<tr>
  <td> Valor Abono hasta 10 dispositivos: </td>
  <td><input type="text" name="valor10" value="<?php echo $valor10; ?>" /> <label class="alerta" id="valor10_msg"></label></td>
</tr>
<tr>
  <td> Valor dispositivo extra: </td>
  <td><input type="text" name="valorextra" value="<?php echo $valorextra; ?>" /> <label class="alerta" id="valorextra_msg"></label></td>
</tr>
<tr>
  <td> Valor falsa alarma: </td>
  <td><input type="text" name="valorfalsa" value="<?php echo $valorfalsa; ?>" /> <label class="alerta" id="valorfalsa_msg"></label></td>
</tr>
</table>

<input type="submit" name="abm" value="Generar" class="boton"/>
      <a href="facturas.php" class="boton">Cancelar</a>
</form>
</div>
</div>

<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>