<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Men�-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Panel de Supervisi�n</h1>
</div>

<div class="grid_3 menu_inicio">
<a href="roles.php"><img src="../imagenes/icon_roles.png" alt="Administracion de Roles" /><br/>
Administracion de Roles</a>
</div>

<div class="grid_3 menu_inicio">
<a href="usuarios_internos.php"><img src="../imagenes/icon_usuario.png" alt=">Administraci&oacute;n Usuarios Internos" /><br/>
Administraci&oacute;n Usuarios Internos</a>
</div>

<div class="grid_3 menu_inicio">
<a href="admin_dispositivos.php"><img src="../imagenes/icon_abm_dispositivos.png" alt="Administracion de dispositivos" /><br/>
Administraci�n de Dispositivos</a>
</div>

<div class="grid_3 menu_inicio">
<a href="bitacoras.php"><img src="../imagenes/icon_bitacoras.png" alt="Bit�coras" /><br/>
Bit�coras</a>
</div>

<div class="grid_3 menu_inicio">
<a href="../logout.php"><img src="../imagenes/icon_logout.png" alt="Cerrar Sesi�n" /><br/>
Cerrar Sesi�n</a>
</div>

</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>