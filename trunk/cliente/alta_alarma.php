<?php require("../cliente/sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("../cliente/head.php");?>
<link href="../cliente/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("../cliente/menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
    <h1>Alta de Nueva Alarma</h1>
  </div>
  <div class="grid_12" >
    <?php

include ("../cliente/conexion_bdd.php");

include ("../cliente/consulta_bdd.php");


$conexion=conectarbd("localhost","root","","seguweb");

$us=$sesion->get("usuario");

$query="SELECT dispositivo . id, dispositivo . descripcion
FROM usuario
JOIN dispositivo ON usuario.cliente_id = dispositivo.cliente_id

where usuario.usuario='".$us."'";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
$j=mysql_num_rows($consulta);
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$dispositivo_descripcion[]=$fila["descripcion"];
$dispositivo_id[]=$fila["id"];

}


?>
    <form action="../cliente/abm_alarma.php" method="post">
      <table>
       <tr>
       <td>
       Seleccione el dispositivo al cual desea agregarle una Alarma:
       </td>
       </tr>
       <tr>
       <td>
       <select name="dispositivo"/>
            
            <?php 
for ($i=0; $i<$j; $i++){
echo ('<option value="'.$dispositivo_id[$i].'">'.$dispositivo_descripcion[$i].'</option>');
}
 ?>
           
           </select>
       </td>
       </tr>
       <tr>
       <td>
       Estado:
       </td>
       </tr>
       <tr>
       <td>
       <select name="estado">
       <option value="ON">Activa</option>
       <option value="OFF">Inactiva</option>
       </select>
       </td>
       </tr>   
       <tr>
       <td>
       Fecha y Hora:
       </td>
       </tr>
       <tr>
       <td>
       <input type="text" name="fecha" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly="readonly"  style="background-color:#CCC" />
       </td>
       </tr>          
       
      </table>
      <input type="submit" name="abm" value="Agregar" class="boton"/>
      <input type="reset" value="Limpiar Formulario" class="boton"/>
      <a href="../cliente/alarmas.php" class="boton">Cancelar</a>
    </form>
  </div>
</div>

<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>