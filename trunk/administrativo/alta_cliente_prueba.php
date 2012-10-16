<?php
require_once("../sesion.class.php");

$sesion = new sesion();

if( $sesion->get("usuario") == false ) {
	// si no se ha iniciado sesión redirecciona a la pagina login.php
	header("Location: ../login.php");
} else {
	// Aquí va el contenido de la pagina qu se mostrara en caso de que se haya iniciado sesion
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SEGUWEB</title>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="../css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="../css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="../css/style.css" />
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>


<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Alta de Usuarios</h1>
</div>
<form action="alta_usuario_bdd.php" method="post">
<div class="grid_12" >
<h2>Datos para la sesión:</h2>
</div>
<div class="grid_2" ><label for="usuario">Usuario:</label></div><div class="grid_3" ><input type="text" name="usuario" id="usuario" /></div>
<div class="clear"></div>
<div class="grid_2" ><label for="password">Password:</label></div><div class="grid_3" ><input type="password" name="password" id="password" /></div>
<div class="clear"></div>
<div class="grid_2" ><label for="password_2">Repita Password:</label></div><div class="grid_3" ><input type="password" name="password_2" id="password_2" /></div>
<div class="clear"></div>
<div class="grid_12" >
<h2>Datos particulares:</h2>
</div>
<div class="grid_2" ><label for="nombre">Nombre:</label></div><div class="grid_3" ><input type="text" name="nombre" id="nombre"/></div>
<div class="clear"></div>
<div class="grid_2"><label for="apellido">Apellido:</label></div><div class="grid_3" ><input type="text" name="apellido" id="apellido"/></div>
<div class="clear"></div>
<div class="grid_2" ><label for="dni">Tipo y N° de Documento:</label></div><div class="grid_3" >
<select name="tipo_doc" id="tipo_doc">
<option value="dni">DNI</option>
<option value="lc">LC</option>
<option value="otro">Otro</option>
</select>
<input type="text" name="dni" maxlength="8" size="10" id="dni"/></div>
<div class="clear"></div>
<div class="grid_2" ><label>Sexo:</label></div>
<div class="grid_3" ><input type="radio" name="sexo" value="F" id="sexoF" /><label for="sexoF">Femenino</label>&nbsp;&nbsp;<input type="radio" name="sexo" value="M" id="sexoM" /><label for="sexoM">Masculino</label></div>
<div class="clear"></div>
<div class="grid_2" ><label for="fecha_nacimiento">Fecha de nacimiento:</label></div><div class="grid_3" ><input type="text" name="fecha_nacimiento" id="fecha_nacimiento" value="aaaa-mm-dd" /></div>
<div class="clear"></div>
<div class="grid_12" >
<h2>Datos de contacto:</h2>
</div>
<div class="grid_2" ><label for="email">Email de contacto:</label></div><div class="grid_3" ><input type="text" name="email" id="email"/></div>
<div class="clear"></div>
<div class="grid_12" >
<p>Teléfonos de contacto:</p>
</div>
<div class="grid_2" ><label for="telefono_1">Teléfono 1:</label></div><div class="grid_3" ><input type="text" name="telefono_1" id="telefono_1" /></div>
<div class="clear"></div>
<div class="grid_2" ><label for="telefono_2">Teléfono 2:</label></div><div class="grid_3" ><input type="text" name="telefono_2" id="telefono_2"/></div>
<div class="clear"></div>
<div class="grid_2" ><label for="email">Teléfono 3:</label></div><div class="grid_3" ><input type="text" name="telefono_3" id="telefono_3" /></div>
<div class="clear"></div>
<div class="grid_3 prefix_2" ><input type="reset" value="Borrar Formulario" class="boton" />&nbsp;&nbsp;<input type="submit" value="Enviar" class="boton" /></div>
</form>
<div class="clear"></div>
</div>
<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>