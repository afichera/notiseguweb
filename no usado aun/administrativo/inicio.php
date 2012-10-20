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
<h1>Panel de control Administrativo</h1>
</div>

<div class="grid_3 menu_inicio">
<a href="clientes.php"><img src="../imagenes/icon_cliente.png" alt="Clientes" /><br/>
Clientes</a>
</div>

<div class="grid_3 menu_inicio">
<a href="facturas.php"><img src="../imagenes/icon_facturas.png" alt="Facturación" /><br/>
Facturación</a>
</div>

<div class="grid_3 menu_inicio">
<a href="estadisticas.php"><img src="../imagenes/icon_estadisticas.png" alt="Estadísticas" /><br/>
Estadísticas</a>
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