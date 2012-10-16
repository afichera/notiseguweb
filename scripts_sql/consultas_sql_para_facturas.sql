SELECT cliente_id, count(dispositivo.id) AS Cant_dispositivos, sum(alarma.falsa) AS falsas_alarmas
FROM dispositivo join alarma ON dispositivo.id = alarma.dispositivo_id
WHERE dispositivo.fecha_baja = '0000-00-00 00:00:00' OR
dispositivo.fecha_baja > '2012-07-01 00:00:00' AND 
alarma.fecha BETWEEN '$2012-$07-01 23:59:59' AND '2012-08-01 00:00:00'
GROUP BY dispositivo.cliente_id 

CREATE OR REPLACE VIEW factura_cliente AS(
select factura.id AS id, factura.numero AS numero, factura.fecha_emi AS fecha, cliente.nombre AS nombre, cliente.apellido AS apellido, cliente.razon_social AS razon_social, factura.importe AS importe, factura.abonada AS abonada
FROM factura JOIN cliente ON cliente.id = factura.cliente_id
)



SELECT cliente_id, count(dispositivo.id) AS Cant_dispositivos, sum(alarma.falsa) AS falsas_alarmas
FROM dispositivo join alarma ON dispositivo.id = alarma.dispositivo_id 
AND alarma.fecha BETWEEN '2012-03-01 23:59:59' AND '2012-04-01 00:00:00'


WHERE dispositivo.fecha_baja = '0000-00-00 00:00:00' OR
dispositivo.fecha_baja > '2012-03-01 00:00:00' 
GROUP BY dispositivo.cliente_id



SELECT cliente_id, count(dispositivo.id) AS Cant_dispositivos, sum(alarma_mes.falsa) AS falsas_alarmas
FROM dispositivo left join (select falsa, dispositivo_id  FROM alarma WHERE alarma.fecha BETWEEN '$preanio-$premes-01 23:59:59' AND 'anio-$mes-01 00:00:00') AS alarma_mes
ON dispositivo.id = alarma_mes.dispositivo_id
WHERE dispositivo.fecha_baja = '0000-00-00 00:00:00' OR
dispositivo.fecha_baja > '$preanio-$premes-01 00:00:00' 
GROUP BY dispositivo.cliente_id