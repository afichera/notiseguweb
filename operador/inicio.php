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
<h1>Panel de Control Operativo</h1>
</div>

<div class="grid_3 menu_inicio">
<a href="admin_dispositivos.php"><img src="../imagenes/icon_abm_dispositivos.png" alt="Administraci�n de dispositivos" /><br/>
Administraci�n de Dispositivos</a>
</div>

<div class="grid_3 menu_inicio">
<a href="mon_dispositivos.php"><img src="../imagenes/icon_dispositivo.png" alt="Monitoreo de Dispositivos" /><br/>
Monitoreo de Dispositivos</a>
</div>

<div class="grid_3 menu_inicio">
<a href="alarmas.php"><img src="../imagenes/icon_alarma.png" alt="Monitoreo de Alarmas" /><br/>
Monitoreo de Alarmas</a>
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