<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.blockUI.js"></script>
<script type="text/javascript" src="../js/prov-depto-loc-modif.js"></script>
<script type="text/javascript" src="../js/validaciones.js"></script>

</head>

<body>
<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_6" >
<h1>Modificar Periodista</h1>

<?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

//levanto el Id del cliente para mostrar sus datos.
$id=$_GET["id"];


$conexion=conectarbd("localhost","root","","seguweb");

$query="SELECT cliente.nombre as nombre, cliente.apellido as apellido, cliente.razon_social as rz, tipo_doc.descripcion as tipo_doc, cliente.nro_doc as nro_doc, cliente.palabra_clave as palabra_clave, domicilio.calle as calle, domicilio.nro as d_nro, domicilio.cod_postal as cp,provincias.id as provincia_id, provincias.nombre as provincia, departamentos.id as departamento_id, departamentos.nombre as departamento, localidades.id as localidad_id, localidades.nombre as localidad, contacto.email as email, contacto.tel_principal as tel_principal, contacto.tel_alter as tel_alter, contacto.fax as fax, usuario.usuario as usuario, rol.descripcion as descripcion_rol 
FROM cliente
JOIN domicilio ON cliente.id = domicilio.cliente_id
JOIN tipo_doc ON cliente.tipo_doc_id = tipo_doc.id
JOIN contacto ON cliente.id = contacto.cliente_id
JOIN localidades ON domicilio.localidad_id = localidades.id
JOIN departamentos ON localidades.departamento_id = departamentos.id
JOIN provincias ON departamentos.provincia_id = provincias.id 
JOIN usuario ON cliente.id = usuario.cliente_id
JOIN rol ON usuario.rol_id = rol.id 
WHERE cliente.id = '$id'";   //consulta sobre ese cliente.

$consulta=consulta($query, $conexion);

if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else
for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);

$id=$_GET["id"];
$nombre=$fila["nombre"];
$apellido=$fila["apellido"];
$razon_social=$fila["rz"];
$tipo_doc=$fila["tipo_doc"];
$nro_doc=$fila["nro_doc"];
$palabra_clave=$fila["palabra_clave"];
$calle=$fila["calle"];
$numero=$fila["d_nro"];
$codigo_postal=$fila["cp"];
$provinciaid=$fila["provincia_id"];
$provincia=$fila["provincia"];
$departamento=$fila["departamento"];
$departamentoid=$fila["departamento_id"];
$localidad=$fila["localidad"];
$localidadid=$fila["localidad_id"];
$email=$fila["email"];
$telefono_1=$fila["tel_principal"];
$telefono_2=$fila["tel_alter"];
$telefono_3=$fila["fax"];
$usuario=$fila["usuario"];
$rol=$fila["descripcion_rol"];
}
?>

<?php
//tipo de doc

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
$tipo_doc2[]=$fila["descripcion"];
$id_doc2[]=$fila["id"];

}

?>

    <form name="formulario" action="periodistas_abm.php" method="post"  onsubmit="return verificar_modificacion_cliente()">
      <table>
        <tr>
          <td><h2>Datos Particulares:</h2>
          
           <input type="hidden" name="id" value="<?php echo $id?>" /></td>
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
        <tr>
          <td> Razon Social: </td>
          <td><input type="text" name="razon_social" value="<?php echo $razon_social?>" /> <label class="alerta" id="razon_msg">
</label></td>
        </tr>
        <tr>
          <td> Tipo y Nro de Documento: </td>
          <td><select name="tipo_doc" style="width:50px;"/>
            
<?php 
for ($i=0; $i<$j; $i++){
echo '<option value="'.$id_doc2[$i].'"';
if ($tipo_doc2[$i]==$tipo_doc)	 echo ' selected="selected" ';
echo ('>'.$tipo_doc2[$i]. '</option>');
}
 ?>
            </select>
            <input type="text" name="nro_doc" value="<?php echo $nro_doc?>" style="width:124px;" />  <label class="alerta" id="nro_doc_msg">
</label></td>
        </tr>
        <tr>
          <td> Palabra Clave: </td>
          <td><input type="text" name="palabra_clave" value="<?php echo $palabra_clave?>" /> <label class="alerta" id="palabra_msg">
</label></td>
        </tr>
        <tr>
          <td> <p>Domicilio:</p> </td>
        </tr>
        <tr>
          <td> Calle:</td>
          <td><input type="text" name="calle" value="<?php echo $calle?>" /> <label class="alerta" id="calle_msg">
</label></td>
        </tr>
        <tr>
          <td> Nro.:</td>
          <td><input type="text" name="numero" value="<?php echo $numero?>" />  <label class="alerta" id="numero_msg">
</label></td>
        </tr>
        <tr>
          <td> Provincia:</td>
          <td><select id="provincia" name="provincia">
              <option value="<?php echo $provinciaid?>" selected="selected"><?php echo $provincia?></option>
            </select>  <label class="alerta" id="provincia_msg"></td>
        </tr>
        <tr>
          <td> Departamento/Partido:</td>
          <td><select id="departamento" name="departamento">
              <option value="<?php echo $departamentoid?>" selected="selected"><?php echo $departamento?></option>
              </select>   <label class="alerta" id="departamento_msg"></td>
        </tr>
        <tr>
          <td>Localidad:</td>
          <td><select id="localidad" name="localidad">
              <option value="<?php echo $localidadid?>" selected="selected"><?php echo $localidad?></option>
              </select>  <label class="alerta" id="localidad_msg"></td>
        </tr>
        <tr>
          <td>Codigo Postal:</td>
          <td><input type="text" name="cod_post" value="<?php echo $codigo_postal?>" />  <label class="alerta" id="codigo_msg"></td>
        </tr>
        <tr>
          <td><h2>Datos de contacto:</h2></td>
        </tr>
        <tr>
          <td> Email de contacto: </td>
          <td><input type="text" name="email" value="<?php echo $email?>" />  <label class="alerta" id="email_msg"></td>
        </tr>
        <tr>
          <td><p>Tel&eacute;fonos de contacto:</p> </td>
        </tr>
        <tr>
          <td> Tel&eacute;fono Principal:</td>
          <td><input type="text" name="telefono_1" value="<?php echo $telefono_1?>" />  <label class="alerta" id="telefono1_msg"></td>
        </tr>
        <tr>
          <td> Tel&eacute;fono Alternativo:</td>
          <td><input type="text" name="telefono_2" value="<?php echo $telefono_2?>" />  <label class="alerta" id="telefono2_msg"></td>
        </tr>
        <tr>
          <td> Fax:</td>
          <td><input type="text" name="telefono_3" value="<?php echo $telefono_3?>" />  <label class="alerta" id="telefono3_msg"></td>
        </tr>
      </table>
      <input type="submit" name="abm" value="Modificar" class="boton"/>
      <a href="periodistas.php" class="boton">Cancelar</a>
    </form>


</div>

<div class="grid_6">
<h2>Usuario asignado para el sistema</h2>
<form name="user_password" action="cambio_password.php" method="post" onsubmit="return verificar_cambio_password ()">
<input type="hidden" name="idcliente" value="<?php echo $id?>" /></td>
<table>
<tr>
          <td> Usuario:</td>
          <td><input type="text" name="usuario" value="<?php echo $usuario?>" disabled="disabled" /></td>
        </tr>
        <tr>
          <td> Rol:</td>
          <td><input type="text" name="rol" value="<?php echo $rol?>" disabled="disabled"/></td>
        </tr>
        

<tr><td colspan="2">
<h2>Asignar nueva password</h2>
</td></tr>

<tr><td>Password:</td><td><input type="password" name="password" value="" />  <label class="alerta" id="password_msg"></td>
        </tr>
<tr><td>Repita:</td><td><input type="password" name="password2" value="" />  <label class="alerta" id="password2_msg"></td>
        </tr>
        <tr><td></td><td>
<input type="submit" name="cambio_password" Value="Enviar" class="boton"/></td></tr>
</table>

</div>


</div>


<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>