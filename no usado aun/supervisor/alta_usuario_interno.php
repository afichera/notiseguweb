<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc.js"></script>
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
    <h1>Alta Nuevo Usuario Interno</h1>
  </div>
  <div class="grid_12" >
    <?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

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
    <form name="formulario" action="abm_usuario_interno.php" method="post" onSubmit="return verificar_alta_usuario_interno()">
      <table>
        <tr>
          <td><h2>Datos Particulares:</h2>
          
           <input type="hidden" name="id" value="" /></td>
        </tr>
        
        <tr>
          <td> Nombre: </td>
          <td><input type="text" name="nombre" value="" /> <label class="alerta" id="nombre_msg">
</label></td>
        </tr>
        <tr>
          <td> Apellido: </td>
          <td><input type="text" name="apellido" value="" /> <label class="alerta" id="apellido_msg">
</label></td>
        </tr>
        <tr>
          <td><h2>Usuario:</h2></td>
        </tr>
        <tr>
          <td>usuario: </td>
          <td><input type="text" name="usuario" value="" />   <label class="alerta" id="usuario_msg"></td>
        </tr>
                <tr>
          
          <td> Rol: </td>
          <td><select name="rol" />
           
<?php
for ($i=1; $i<$j; $i++){
echo '<option value="'.$rol_id_todos[$i].'"';
if ($rol_id_todos[$i]==2)	 echo ' selected="selected" ';
echo ('>'.$rol_todos[$i]. '</option>');
}
 ?>
            </select>
 </td></tr>
        
        
        <tr><td>Password:</td><td><input type="password" name="password" value="" />  <label class="alerta" id="password_msg"></td>
        </tr>
<tr><td>Repita Password:</td><td><input type="password" name="password2" value="" />  <label class="alerta" id="password2_msg"></td>
        </tr>
        
        
      </table>
      <input type="submit" name="abm" value="Agregar" class="boton"/>
      <input type="reset" value="Limpiar Formulario" class="boton"/>
      <a href="clientes.php" class="boton">Cancelar</a>
    </form>
  </div>
</div>

<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>