<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc-modif.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>

</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_6" >
<h1>Modificar Cliente</h1>

<?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

//levanto el Id del cliente para mostrar sus datos.
$id=$_GET["id"];


$conexion=conectarbd("localhost","root","","seguweb");

$query="SELECT usuario, nombre, apellido, rol_id  
FROM usuario
WHERE id = '$id'";   //consulta sobre ese cliente.

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
}
?>

<?php
// todos los roles

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

    <form name="formulario" action="abm_usuario_interno.php" method="post"  onsubmit="return verificar_modificacion_usuario_interno()">
      <table>
        <tr>
          <td><h2>Datos Particulares:</h2>
          
           <input type="hidden" name="id" value="<?php echo $id?>" /></td>
        </tr>

        <tr>
          <td> usuario: </td>
          <td><input type="text" name="usuario" value="<?php echo $usuario?>" disabled="disabled" /> <label class="alerta" id="usuario_msg">
</label></td>
        </tr>
        
        <tr>
          <td> Nombre: </td>
          <td><input type="text" name="nombre" value="<?php echo $nombre?>" /> <label class="alerta" id="nombre_msg">
</label></td>
        </tr>
        <tr>
          <td> Apellido: </td>
          <td><input type="text" name="apellido" value="<?php echo $apellido?>" /> <label class="alerta" id="apellido_msg">
</label></td>
        </tr>
                 <td> Rol: </td>
          <td><select name="rol" />
           
<?php
for ($i=1; $i<$j; $i++){
echo '<option value="'.$rol_id_todos[$i].'"';
if ($rol_id_todos[$i]==$rol_id)	 echo ' selected="selected" ';
echo ('>'.$rol_todos[$i]. '</option>');
}
 ?>
            </select>
 </td></tr>
      </table>
      <input type="submit" name="abm" value="Modificar" class="boton"/>
      <a href="clientes.php" class="boton">Cancelar</a>
    </form>


</div>

<div class="grid_6">
<h2>Asignar nueva password</h2>
<form name="user_password" action="abm_usuario_interno.php" method="post" onsubmit="return verificar_cambio_password ()">
<input type="hidden" name="idusuario" value="<?php echo $id?>" /></td>
<table>
<tr><td>Password:</td><td><input type="password" name="password" value="" />  <label class="alerta" id="password_msg"></td>
        </tr>
<tr><td>Repita:</td><td><input type="password" name="password2" value="" />  <label class="alerta" id="password2_msg"></td>
        </tr>
        <tr><td></td><td>
<input type="submit"  name="abm" value="Cambiar Password" class="boton"/></td></tr>
</table>

</div>


</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>