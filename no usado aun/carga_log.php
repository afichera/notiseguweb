<?php
function carga_log ($texto, $usuario, $nivel){

$conexion=conectarbd("localhost","root","","seguweb");
$query="INSERT INTO log (
comentario ,
usuario ,
nivel)
VALUES (
'$texto', '$usuario', $nivel);";
$consulta=consulta($query, $conexion);
}
?>