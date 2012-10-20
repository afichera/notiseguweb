<?php require("sesion.php");?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
<link href="table.css" rel="stylesheet" type="text/css">
</head>

<body>

<!-- Encabezado-->
<?php include("encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<?php
$abm=$_POST['abm'];




include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");


$id=$_POST['id'];
$nombre=$_POST['nombre'];	
$apellido=$_POST['apellido'];	
$razon_social=$_POST['razon_social'];	
$tipo_doc=$_POST['tipo_doc'];	
$nro_doc=$_POST['nro_doc'];	
$palabra_clave=$_POST['palabra_clave'];	
$calle=$_POST['calle'];	
$numero=$_POST['numero'];	
$provincia=$_POST['provincia'];	
$departamento=$_POST['departamento'];	
$localidad=$_POST['localidad'];	
$cod_post=$_POST['cod_post'];	
$email=$_POST['email'];	
$telefono_1=$_POST['telefono_1'];	
$telefono_2=$_POST['telefono_2'];	
$telefono_3=$_POST['telefono_3'];

	


if ($abm=='Agregar'){
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$rol_id=5;
$query="INSERT INTO cliente (
tipo_doc_id ,
nro_doc ,
nombre ,
apellido,
razon_social,
palabra_clave
)
VALUES (
$tipo_doc, $nro_doc, '$nombre', '$apellido', '$razon_social', '$palabra_clave'
);";
$consulta1=consulta($query, $conexion);
$cliente_id = mysql_insert_id();

$query="INSERT INTO domicilio (
nro, 
calle, 
localidad_id, 
cod_postal, 
cliente_id
) 
VALUES (
$numero, '$calle', $localidad, $cod_post, $cliente_id);";

$consulta2=consulta($query, $conexion);

$query="INSERT INTO contacto (
tel_principal, 
tel_alter, 
fax, 
email, 
cliente_id
) 
VALUES (
'$telefono_1','$telefono_2', '$telefono_3', '$email', $cliente_id);";
$consulta3=consulta($query, $conexion);

$query="INSERT INTO usuario (
usuario, 
password, 
nombre, 
apellido, 
cliente_id, 
rol_id 
) 
VALUES (
'$usuario', '$password', '$nombre', '$apellido', $cliente_id, $rol_id);";
$consulta4=consulta($query, $conexion);

if ($consulta1==1&&$consulta2==1&&$consulta3==1&&$consulta4==1){
	echo "La operacion se realiz&oacute; con &eacute;xito <br/>
	<a href='periodistas.php' class='boton'>Aceptar</a>";
	include ("scripts/carga_log.php");carga_log ("Se dio de alta un nuevo cliente, datos:
	".$id.",".$nombre.",".$apellido.",".$razon_social.",".$tipo_doc.",".$nro_doc.",".$palabra_clave.",".$calle.",".$numero.",".$provincia.",".$departamento.",".$localidad.",".$cod_post.",".$email.",".$telefono_1.",".$telefono_2.",".$telefono_3.",".$usuario.",".$rol_id.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operaci&oacute;n. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};


if ($abm=='Modificar'){

$query="
UPDATE cliente SET nombre = '".$nombre."',
apellido = '".$apellido."',
tipo_doc_id = ".$tipo_doc.",
nro_doc = ".$nro_doc.", 
razon_social = '".$razon_social."', 
palabra_clave = '".$palabra_clave."'  
WHERE cliente.id =".$id."
";

$consulta1=consulta($query, $conexion);

$query="UPDATE domicilio SET
nro = ".$numero.",  
calle = '".$calle."',  
localidad_id = ".$localidad.",  
cod_postal = ".$cod_post." 
WHERE domicilio.cliente_id = ".$id;

$consulta2=consulta($query, $conexion);

$query="UPDATE contacto SET 
tel_principal = '".$telefono_1."', 
tel_alter = '".$telefono_2."',  
fax = '".$telefono_3."',  
email = '".$email."' 
WHERE contacto.cliente_id = ".$id;

$consulta3=consulta($query, $conexion);

if ($consulta1==1&&$consulta2==1&&$consulta3==1){
	echo "La operaci&oacute;n se realiz&oacute; con &eacute;xito <br/>
	<a href='periodistas.php' class='boton'>Aceptar</a>";
		include ("scripts/carga_log.php");carga_log ("Se modific&oacute; un cliente cliente, nuevos datos:
	".$id.",".$nombre.",".$apellido.",".$razon_social.",".$tipo_doc.",".$nro_doc.",".$palabra_clave.",".$calle.",".$numero.",".$provincia.",".$departamento.",".$localidad.",".$cod_post.",".$email.",".$telefono_1.",".$telefono_2.",".$telefono_3.".",$sesion->get("usuario"), 1);
	}
	else {
		echo "No se pudo realizar la operaci&oacute;n. Contacte al administrador <br/>
		<input type='button' value='Back' onclick='goBack()' class='boton' />";
	}

};




?>
</div>
</div>


<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>