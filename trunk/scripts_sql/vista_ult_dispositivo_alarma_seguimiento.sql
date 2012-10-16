CREATE OR REPLACE VIEW ult_dispositivo_alarma_seguimiento AS
SELECT id,tipo_dispositivo_id,estado_habilitacion_id,estado,inmobilizado,id_externo,cliente_id,descripcion,motivo_baja,fecha_baja,MAX(fecha) as fecha,falsa,estado_alarma,alarma_fecha_baja,fecha_hora,dispositivo_id,longitud,latitud 
FROM dispositivo_alarma_seguimiento
GROUP BY dispositivo_id