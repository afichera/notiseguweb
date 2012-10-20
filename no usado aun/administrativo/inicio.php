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
<h1>Panel de control Administrativo</h1>
</div>

<div class="grid_3 menu_inicio">
<a href="clientes.php"><img src="../imagenes/icon_cliente.png" alt="Clientes" /><br/>
Clientes</a>
</div>

<div class="grid_3 menu_inicio">
<a href="facturas.php"><img src="../imagenes/icon_facturas.png" alt="Facturaci�n" /><br/>
Facturaci�n</a>
</div>

<div class="grid_3 menu_inicio">
<a href="estadisticas.php"><img src="../imagenes/icon_estadisticas.png" alt="Estad�sticas" /><br/>
Estad�sticas</a>
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