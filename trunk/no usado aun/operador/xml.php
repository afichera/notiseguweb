<?php


function parseToXML($htmlStr) 
{ 
$xmlStr=str_replace('<','&lt;',$htmlStr); 
$xmlStr=str_replace('>','&gt;',$xmlStr); 
$xmlStr=str_replace('"','&quot;',$xmlStr); 
$xmlStr=str_replace("'",'&#39;',$xmlStr); 
$xmlStr=str_replace("&",'&amp;',$xmlStr); 
return $xmlStr; 
} 

// Abrir la conexion a la db
$connection=mysql_connect ('localhost', 'root', '');
if (!$connection) {
  die('Not connected : ' . mysql_error());
}

// Selecccionar la base de datos
$db_selected = mysql_select_db('seguweb', $connection);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Seleccionar todas las filas
$query = "SELECT * FROM dispositivo_alarma_seguimiento";

$result = mysql_query($query);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Empezar el archivo XML , echo nodo padre
echo '<dispositivos>';

// Iteratuar a traves de las filas, IMPRIMIR XML 
//nodes POR CADA UNO
while ($row = @mysql_fetch_assoc($result)){
  // Agregar al documento XML al nodo
  echo '<dispositivos ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'descripcion="' . parseToXML($row['descripcion']) . '" ';
  echo 'longitud="' . $row['longitud'] . '" ';
  echo 'latitud="' . $row['latitud'] . '" ';
  echo 'fecha_hora="' . $row['fecha_hora'] . '" ';
  echo 'estado_alarma="' . $row['estado_alarma'] . '" ';
  echo '/>';
}

// Fin archivo XML 
echo '</dispositivos>';

?>

