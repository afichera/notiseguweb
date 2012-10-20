<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc-modif.js"></script>

</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_6" >
<h1>Modificar Rol</h1>

<?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

//levanto el Id del cliente para mostrar sus datos.
$id=$_GET["id"];


$conexion=conectarbd("localhost","root","","seguweb");

$query="SELECT usuario.*, rol.descripcion as descripcion FROM usuario INNER JOIN rol
 WHERE usuario.rol_id = rol.id AND usuario.id = $id";

$consulta=consulta($query, $conexion);

if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);


$usuario=$fila["usuario"];
$nombre=$fila["nombre"];
$apellido=$fila["apellido"];
$rol_id=$fila["rol_id"];
$rol=$fila["descripcion"];
}
?>

<?php
//tipo de doc

$query="select id, descripcion from rol";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
$j=mysql_num_rows($consulta);
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$rol_id_todos[]=$fila["id"];
$rol_todos[]=$fila["descripcion"];

}

?>

    <form name="formulario" action="cambiar_rol_submit.php" method="post">
      <table>
        <tr>
          <td>      
           <input type="hidden" name="id" value="<?php echo $id?>" /></td>
        </tr>
        <tr>
          <td> Usuario : </td>
          <td><input type="text" name="nombre" value="<?php echo $usuario?>" disabled="disabled" /></td>
        </tr>
        <tr>
          <td> Nombre: </td>
          <td><input type="text" name="nombre" value="<?php echo $nombre?>" disabled="disabled" /></td>
        </tr>
        <tr>
          <td> Apellido: </td>
          <td><input type="text" name="apellido" value="<?php echo $apellido?>" disabled="disabled" /></td>
        </tr>
        <tr>
          
          <td> Rol: </td>
          <td><select name="rol" />
           
<?php
for ($i=0; $i<$j; $i++){
echo '<option value="'.$rol_id_todos[$i].'"';
if ($rol_id_todos[$i]==$rol_id)	 echo ' selected="selected" ';
echo ('>'.$rol_todos[$i]. '</option>');
}
 ?>
            </select>
 </td></tr>
      <tr><td></td><td>
      <input type="submit" name="abm" class="boton"/>
      <a href="roles.php" class="boton">Cancelar</a>
      </td>
    </form>
</table>

</div>



</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>