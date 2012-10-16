<?php
		include ("conexion_bdd.php");

		include ("consulta_bdd.php");
		include ("../scripts/carga_log.php");

		$conexion=conectarbd("localhost","root","","seguweb");

		$query="SELECT id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id
				FROM DISPOSITIVO WHERE estado_habilitacion_id = 1
				AND estado = 'ACTIVO' 
				AND alta_server = 1";

		$consulta=consulta($query, $conexion);
		$cantFilas = mysql_num_rows($consulta);
			if($cantFilas>0){
				for ($i=0; $i<$cantFilas; $i++){
					
					$fila = mysql_fetch_array($consulta);
					
					$dispositivo_id=$fila["id"];
					$tipo_dispositivo_id=$fila["tipo_dispositivo_id"];
					$estado=$fila["estado"];
					$inmobilizado=$fila["inmobilizado"];
					$dispositivo_id_externo=$fila["id_externo"];
					$dispositivo_cliente_id=$fila["cliente_id"];
					
					
					if ($inmobilizado==1){
						$accion='ALARMAON';	
					}else{
						$accion='ALARMAOFF';
					}
					
					$mensajeRecibido = file_get_contents("http://200.32.20.13/consulta.php?dispo=".$dispositivo_id_externo."&usuario=28230014&clave=28230014&accion='".$accion."'&tipo=".$tipo_dispositivo_id);
					
					//Parsear Mensaje recibido
					//{ 'Resultado' : [ { 'Estado' : 'OK', 'Latitud' : '34,9460 ' , 'Longitud' : '58,6322', 'ST' : 'A' } ] }
					$mensajeAux = strstr($mensajeRecibido, "Latitud' : '");
					$mensajeAux = substr($mensajeAux, 11);
					$posApostrofe = strpos($mensajeAux, "'");
					
					$longitud =  substr($mensajeAux,1, 6);					
					$longitud = str_replace(",", ".", $longitud);
					$longitud = (float)$longitud;
					$longitud = $longitud * -1;
					//echo substr($mensajeAux,1, $posApostrofe-1);
					//echo $longitud;
					
					$mensajeAux = strstr($mensajeAux, "Longitud' : '");
					$mensajeAux = substr($mensajeAux, 12);
					$posApostrofe = strpos($mensajeAux, "'");
					
					$latitud = substr($mensajeAux,1, 6);
					$latitud = str_replace(",", ".", $latitud);
					$latitud = (float)$latitud;
					$latitud = $latitud * -1;	
				
					
					$querySegui="SELECT fecha_hora, longitud, latitud
					FROM SEGUIMIENTO WHERE dispositivo_id = ".$dispositivo_id."
					";
					

					$consultaSegui=consulta($querySegui, $conexion);
					$cantFilasSegui = mysql_num_rows($consultaSegui);
					
					if($cantFilasSegui==1){
						
						$filaSegui = mysql_fetch_array($consultaSegui);
							
						$longitud_segui=$filaSegui["longitud"];
						$latitud_segui=$filaSegui["latitud"];
						
						if($latitud_segui != $latitud || $longitud_segui != $longitud){
							//Crear Alarma
							$queryCreaAlarma = "INSERT INTO ALARMA(estado, dispositivo_id) VALUES ('ON', ".$dispositivo_id.")";
							
							//Actualizar Seguimiento.
							$queryUpdateSegui = "UPDATE SEGUIMIENTO SET longitud = ".$longitud.", latitud = ".$latitud." WHERE dispositivo_id=".$dispositivo_id;
							
							$consultaCreaAlarma=consulta($queryCreaAlarma, $conexion);
							
							$consultaUpdateSegui=consulta($queryUpdateSegui, $conexion);

							if($consultaCreaAlarma == 1 && $consultaUpdateSegui == 1){
								carga_log ("Se actualizo correctamente el seguimiento del dispositivo con id: ".$dispositivo_id,$sesion->get("usuario"), 1);
							}else{
								carga_log ("No se pudo actualizar el seguimiento del dispositivo con id: ".$dispositivo_id,$sesion->get("usuario"), 1);
							}
						}
						
					}else{
					
						$queryCreaSegui = "INSERT INTO SEGUIMIENTO (longitud, latitud, dispositivo_id) VALUES (".$longitud.", ".$latitud.", ".$dispositivo_id.")";
						
						$consultaCreaSegui=consulta($queryCreaSegui, $conexion);
						if($consultaCreaSegui == 1){
							carga_log ("Se creo el seguimiento inicial del dispositivo con id: ".$dispositivo_id,$sesion->get("usuario"), 1);
						}else{
							carga_log ("No se pudo crear el seguimiento inicial del dispositivo con id: ".$dispositivo_id,$sesion->get("usuario"), 1);
						}
					}	
						
					
				}
				
			}

?>