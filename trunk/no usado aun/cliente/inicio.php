<?php require("sesion.php");?>
<?php include("../doctype.php");?>
<head>
<?php include("head.php");?>
</head>

<body>
<!-- Encabezado-->
<?php include("../encabezado.php");?>

<!-- Menú-->
<?php include("menu.php");?>

<!-- Principal-->
<div class="container_12" id="principal">
<div class="grid_12" >
<h1>Panel de control Clientes</h1>
</div>

<div class="grid_3 menu_inicio">
<a href="dispositivos.php"><img src="../imagenes/icon_dispositivo.png" alt="Mis Dispositivos" /><br/>
Mis Dispositivos</a>
</div>

<div class="grid_3 menu_inicio">
<a href="alarmas.php"><img src="../imagenes/icon_alarma.png" alt="Mis Alarmas" /><br/>
Mis Alarmas</a>
</div>

<div class="grid_3 menu_inicio">
<a href="facturas.php"><img src="../imagenes/icon_facturas.png" alt="Mis Facturas" /><br/>
Mis Facturas</a>
</div>

<div class="grid_3 menu_inicio">
<a href="../logout.php"><img src="../imagenes/icon_logout.png" alt="Cerrar Sesión" /><br/>
Cerrar Sesión</a>
</div>

</div>


<!-- Pie-->
<?php include("../pie.php");?>
</body>
</html>