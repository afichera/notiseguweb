<?php require("sesion.php");?>
<?php include("../doctype.php");?>
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
<h1>Generar nueva facturación</h1>

<?php
include ("conexion_bdd.php");

include ("consulta_bdd.php");
$conexion=conectarbd("localhost","root","","seguweb");

$mes=$_POST["mes"];
if ($mes==12) $postmes=1;else $postmes=$mes+1;
$anio=$_POST["anio"];
if ($mes==12) $postanio=$anio+1;else $postanio=$anio;
$valor5=$_POST["valor5"];
$valor10=$_POST["valor10"];
$valorextra=$_POST["valorextra"];
$valorfalsa=$_POST["valorfalsa"];
$totalfacturacion=0;
$consulta=consulta("select COUNT(*) AS cuenta, anio from facturacion where facturacion.anio = $anio AND facturacion.mes = $mes",$conexion);
if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else {
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$facturado=$fila["cuenta"];
}
if ($facturado>0)
echo "No se puede realizar la operación. El mes ya fue facturado con anterioridad <br/>
<input type='button' value='Volver' onclick='goBack()' class='boton' />";
else {

$query="SELECT cliente_id, count(dispositivo.id) AS Cant_dispositivos, sum(alarma_mes.falsa) AS falsas_alarmas
FROM dispositivo left join (select falsa, dispositivo_id  FROM alarma WHERE alarma.fecha BETWEEN '$anio-$mes-01 23:59:59' AND '$postanio-$postmes-01 00:00:00') AS alarma_mes
ON dispositivo.id = alarma_mes.dispositivo_id
WHERE dispositivo.fecha_baja = '0000-00-00 00:00:00' OR
dispositivo.fecha_baja > '$anio-$mes-01 00:00:00' 
GROUP BY dispositivo.cliente_id";

$consulta=consulta($query, $conexion);

if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else {
while ($fila = mysql_fetch_array($consulta,MYSQL_ASSOC)){
//for ($i=0; $i<mysql_num_rows($consulta); $i++){
$cliente_id=$fila["cliente_id"];
$cant_dispositivos=$fila["Cant_dispositivos"];
$falsas_alarmas=$fila["falsas_alarmas"];
$total=0;
$total+=$falsas_alarmas*$valorfalsa;
if ($cant_dispositivos>0 &&$cant_dispositivos<=5)
	$total+=$valor5;
	else if ($cant_dispositivos<=10)
			$total+=$valor10;
			else $total+=($valor10+(($cant_dispositivos-10)*$valorextra));
//obtengo numero de ultima factura
$consultaF=consulta("select proximo from proximo_nro where id=1;", $conexion);
if(mysql_num_rows($consultaF)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else {
for ($i=0; $i<mysql_num_rows($consultaF); $i++)
{
$fila = mysql_fetch_array($consultaF);
$num_factura=$fila["proximo"];
}
$consultaF=consulta("UPDATE proximo_nro SET proximo = ($num_factura+1) where id=1;", $conexion);
}



$query="INSERT INTO factura (
numero,
importe,
abonada,
cliente_id)
VALUES ($num_factura,$total,0,$cliente_id);";
$consulta2=consulta($query, $conexion);	
$totalfacturacion+=$total;
}
//}
}
$query="insert into facturacion (
anio, 
mes, 
importe_total)
values (
$anio, 
$mes, 
$totalfacturacion
);";
$consulta3=consulta($query, $conexion);	

$query="UPDATE valor SET 
valor5 = ".$valor5.",  
valor10 = ".$valor10.", 
valorextra = ".$valorextra.", 
valorfalsa = ".$valorfalsa." 
WHERE valor.id =1;";
$consulta4=consulta($query, $conexion);



if ($consulta2==1&&$consulta3==1&&$consulta4==1){
	echo "La operacion se realizó con éxito <br/>
	<a href='facturas.php' class='boton'>Aceptar</a>";
include ("../scripts/carga_log.php");carga_log ("Se generó la facturación del ".$mes."/".$anio.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operación. Contacte al administrador <br/>
		<input type='button' value='Volver' onclick='goBack()' class='boton' />";
	}

}
	
}



?>












</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>