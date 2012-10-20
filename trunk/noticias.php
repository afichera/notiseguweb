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


<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
    <h1>Noticias</h1>
  </div>
  <div class="grid_12" >
    <?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

$conexion=conectarbd("localhost","root","","seguweb");

$registros = 3; 

if (isset($_GET['pagina'])) {

$pagina = $_GET["pagina"];
}
if (!isset($pagina)) {
$inicio = 0;
$pagina = 1;
}
else {
$inicio = ($pagina - 1) * $registros;
} 






$query="SELECT id FROM articulos WHERE visible = 1";

$resultados=consulta($query, $conexion);


if(mysql_num_rows($resultados)==0){
	
	print("<br>Error, no existen registros con estos datos");
}
else

$total_registros = mysql_num_rows($resultados);
$resultados = mysql_query("SELECT * FROM articulos WHERE visible = 1 ORDER BY fecha DESC LIMIT $inicio, $registros");
$total_paginas = ceil($total_registros / $registros); 

while($articulo=mysql_fetch_array($resultados)) {

echo '<h2><a href="vernoticia.php?id='.$articulo["id"].'">'.$articulo["titulo"].'</a></h2>';
echo "<font color='#666666'>".$articulo["descripcion"]."</font><br><br><br>";

} 


if(($pagina - 1) > 0) {
echo "<a href='noticias.php?pagina=".($pagina-1)."'>< Anterior</a> ";
} 

for ($i=1; $i<=$total_paginas; $i++){
if ($pagina == $i) {
echo "<b>".$pagina."</b> ";
} else {
echo "<a href='noticias.php?pagina=$i'>$i</a> ";
} }


if(($pagina + 1)<=$total_paginas) {
echo " <a href='noticias.php?pagina=".($pagina+1)."'>Siguiente ></a>";
} 


?>
 
  </div>
</div>

<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>