<?php require("../operador/sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("../operador/head.php");?>
<link href="../cliente/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("../operador/menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
    <h1>Modificar o Eliminar Alarma:</h1>
  </div>
  <div class="grid_12" >
    <?php

include ("../operador/conexion_bdd.php");

include ("../operador/consulta_bdd.php");


$conexion=conectarbd("localhost","root","","seguweb");

$us=$sesion->get("usuario");
$fecha=$_GET['fecha'];
$dispositivo_id=$_GET['dispositivo_id'];
$query="SELECT alarma . fecha, alarma . estado, alarma.falsa 
FROM usuario
JOIN dispositivo ON usuario.cliente_id = dispositivo.cliente_id
JOIN alarma ON alarma.dispositivo_id = dispositivo.id
where alarma.fecha='".$fecha."' AND dispositivo_id =".$dispositivo_id;

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$fecha=$fila["fecha"];
$estado=$fila["estado"];
$falsa=$fila["falsa"];
}


?>
    <form action="abm_alarma.php?dispositivo_id=<?php echo $dispositivo_id;?>" method="post">
      <table>
       <tr>
       <td>
       Midificar el Estado:
       </td>
       </tr>
       <tr>
       <td>
       <select name="estado">
       <option  <?php if($estado=='ON') {echo "selected='selected'";};   ?> value="ON">Activa</option>
       <option <?php if($estado=='OFF') {echo "selected='selected'";};   ?> value="OFF">Inactiva</option>
       </select>
       </td>
       </tr>   
       <tr>
       <td>
       Fecha y Hora (no se puede modificar, ya que corresponde a la fecha y hora del alta.):
       </td>
       </tr>
       <tr>
       <td>
       <input type="text" name="fecha" value="<?php echo $fecha; ?>" readonly="readonly" style="background-color:#CCC"  />
       </td>
       </tr>  
       <tr>
						<td>Falsa Alarma: 
						
						<input type="checkbox" name="falsa" value="1" 
						<?php if($falsa==1) echo 'checked="checked"';?>" /></td>
					</tr>        
       
      </table>
      <input type="submit" name="abm" value="Modificar" class="boton"/>
      <input type="submit" name="abm" value="Eliminar" class="boton"/>
      <a href="../cliente/alarmas.php" class="boton">Cancelar</a>
    </form>
  </div>
</div>

<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>