<?php
if ($_GET!=NULL)
{$error=$_GET["error"];}
else {$error="";}
?>
<?php include("doctype.php");?>
<head>
<?php include("head.php");?>
</head>

<body OnLoad="document.frmLogin.usuario.focus();">
<!-- Encabezado-->
<div class="container_12">
<div class="grid_12" id="encabezado">
&nbsp;
</div>
</div>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Ingreso al Sistema</h1>
</div>
<br/>
<form id="frmLogin" name="frmLogin" method="post" action="validar.php">
<div class="grid_1 prefix_4"><label for="usuario">Usuario: </label></div><div class="grid_3"><input type="text" name = "usuario" id="usuario" /></div>
<div class="clear"></div>
<div class="grid_1 prefix_4"><label for="password">Contrase�a: </label></div><div class="grid_3"><input type="password" name = "password" id="password" /></div>
<div class="clear"></div>
<div class="grid_3 prefix_5"><input type="submit" name ="iniciar" value="Iniciar Sesi�n" class="boton"/>
	  <?php if ($error =="password") {echo "<br/>Verifique su nombre de usuario y contrase�a.";};
	  		 if ($error =="permisos") {echo "<br/>No posee permisos para realizar esta operaci�n.";};
	  
	   ?>
      </div>
      <div class="clear"></div>
   
</form>
</div>

<?php include("pie.php");?>
</body>
</html>
