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

<!-- Men�-->
<?php include("menu.php");?>


<!-- Principal-->
<div class="container_12" id="principal">
  <div class="grid_12" >
  	
  	    <?php

include ("conexion_bdd.php");

include ("consulta_bdd.php");

$id=$_GET["id"];

$conexion=conectarbd("localhost","root","","notiseguweb");
$query="SELECT * FROM nota n INNER JOIN usuario u ON n.usuario_id = u.id WHERE n.id =".$id;

$consulta=consulta($query, $conexion);
if(mysql_num_rows($consulta)==0){
	
	print("<br>Error, no existe esa noticia");
}
else
  	
	for ($i=0; $i<mysql_num_rows($consulta); $i++)
{
$fila = mysql_fetch_array($consulta);
$titulo=$fila["titulo"];
$fecha=$fila["fecha_hora"];
$texto=$fila["texto"];
$autor=$fila["nombre_apellido"];
echo "<h1>".$titulo."</h1>";

}
	
 ?> 	
    </div>
  <div class="grid_6" id="autor" >
<?php echo $autor;?>
  </div>
  <div class="grid_2" id="fecha" >
<?php echo $fecha;?>
  </div>  
  <div class="clear"></div>
    <div class="grid_8" id="texto" >
<?php echo $texto;?>
  </div> 
  
    <div class="clear"></div>
    <div class="grid_8" id="form_comentarios" >
    	<h2>Realice un comentario:</h2>
<?php echo "PONER ACA EL FROMULARIO PARA CARGAR COMENTARIOS";?>
  </div> 
      <div class="grid_8" id="comentarios">
      	<h2>Comentarios:</h2>
<?php echo "PONER ACA LOS COMENTARIOS";?>
  </div> 
   
  
  
</div>

<!-- Pie-->
<?php include("pie.php");?>
</body>
</html>