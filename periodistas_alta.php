<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>
</head>

<body>
<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
    <h1>Alta Nuevo Cliente</h1>
  </div>
  <div class="grid_12" >
    <?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

$query="select nombre from provincias";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$provincia[]=$fila["nombre"];
}

$query="select id, descripcion from tipo_doc";

$consulta=consulta($query, $conexion);



if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
$j=mysql_num_rows($consulta);
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$tipo_doc[]=$fila["descripcion"];
$id_doc[]=$fila["id"];

}


?>
    <form name="formulario" action="periodistas_abm.php" method="post" onsubmit="return verificar_alta_cliente()">
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
          <td> Razon Social: </td>
          <td><input type="text" name="razon_social" value="" /> <label class="alerta" id="razon_msg">
</label></td>
        </tr>
        <tr>
          <td> Tipo y Nro de Documento: </td>
          <td><select name="tipo_doc" style="width:50px;"/>
            
            <?php 
for ($i=0; $i<$j; $i++){
echo ('<option value="'.$id_doc[$i].'">'.$tipo_doc[$i].'</option>');
}
 ?>
            </select>
            <input type="text" name="nro_doc" value="" style="width:124px;" />  <label class="alerta" id="nro_doc_msg">
</label></td>
        </tr>
        <tr>
          <td> Palabra Clave: </td>
          <td><input type="text" name="palabra_clave" value="" /> <label class="alerta" id="palabra_msg">
</label></td>
        </tr>
        <tr>
          <td> <p>Domicilio:</p> </td>
        </tr>
        <tr>
          <td> Calle:</td>
          <td><input type="text" name="calle" value="" /> <label class="alerta" id="calle_msg">
</label></td>
        </tr>
        <tr>
          <td> Nro.:</td>
          <td><input type="text" name="numero" value="" />  <label class="alerta" id="numero_msg">
</label></td>
        </tr>
        <tr>
          <td> Provincia:</td>
          <td><select id="provincia" name="provincia">
              <option value="0">Selecciona Una...</option>
            </select>  <label class="alerta" id="provincia_msg"></td>
        </tr>
        <tr>
          <td> Departamento/Partido:</td>
          <td><select id="departamento" name="departamento">
              <option value="0">Selecciona Uno...</option>
            </select>   <label class="alerta" id="departamento_msg"></td>
        </tr>
        <tr>
          <td>Localidad:</td>
          <td><select id="localidad" name="localidad">
              <option value="0">Selecciona Uno...</option>
            </select>  <label class="alerta" id="localidad_msg"></td>
        </tr>
        <tr>
          <td>Codigo Postal:</td>
          <td><input type="text" name="cod_post" value="" />  <label class="alerta" id="codigo_msg"></td>
        </tr>
        <tr>
          <td><h2>Datos de contacto:</h2></td>
        </tr>
        <tr>
          <td> Email de contacto: </td>
          <td><input type="text" name="email" value="" />  <label class="alerta" id="email_msg"></td>
        </tr>
        <tr>
          <td><p>Tel&eacute;fonos de contacto:</p> </td>
        </tr>
        <tr>
          <td> Tel&eacute;fono Principal:</td>
          <td><input type="text" name="telefono_1" value="" />  <label class="alerta" id="telefono1_msg"></td>
        </tr>
        <tr>
          <td> Tel&eacute;fono Alternativo:</td>
          <td><input type="text" name="telefono_2" value="" />  <label class="alerta" id="telefono2_msg"></td>
        </tr>
        <tr>
          <td> Fax:</td>
          <td><input type="text" name="telefono_3" value="" />  <label class="alerta" id="telefono3_msg"></td>
        </tr>
        <tr>
          <td><h2>Usuario:</h2></td>
        </tr>
        <tr>
          <td>usuario: </td>
          <td><input type="text" name="usuario" value="" />   <label class="alerta" id="usuario_msg"></td>
        </tr>
        <tr><td>Password:</td><td><input type="password" name="password" value="" />  <label class="alerta" id="password_msg"></td>
        </tr>
<tr><td>Repita Password:</td><td><input type="password" name="password2" value="" />  <label class="alerta" id="password2_msg"></td>
        </tr>
        
        
      </table>
      <input type="submit" name="abm" value="Agregar" class="boton"/>
      <input type="reset" value="Limpiar Formulario" class="boton"/>
      <a href="periodistas.php" class="boton">Cancelar</a>
    </form>
  </div>
</div>

<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>