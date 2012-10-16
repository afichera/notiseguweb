--Consulta de alarmas por dispositivo
SELECT estado, fecha, falsa, dispositivo_id FROM alarma WHERE dispositivo_id = 1;
--Consulta de alarmas por cliente fecha descendete
SELECT A.estado, A.fecha, A.falsa, D.id,  C.id, T.descripcion 
FROM alarma A, dispositivo D, cliente C, tipo_dispositivo T  
WHERE D.id = A.dispositivo_id AND
T.id = D.tipo_dispositivo_id AND
C.id = D.cliente_id AND
D.cliente_id = 1 
ORDER BY A.fecha desc;
--Consulta de falsas alarmas por cliente fecha descendete
SELECT A.estado, A.fecha, A.falsa, D.id,  C.id, T.descripcion 
FROM alarma A, dispositivo D, cliente C, tipo_dispositivo T  
WHERE D.id = A.dispositivo_id AND
T.id = D.tipo_dispositivo_id AND
C.id = D.cliente_id AND
A.falsa = true AND
D.cliente_id = 1 
ORDER BY A.fecha desc;
--Consulta de Cantidad falsas alarmas por cliente
SELECT count(*) 
FROM alarma A, dispositivo D, cliente C, tipo_dispositivo T  
WHERE D.id = A.dispositivo_id AND
T.id = D.tipo_dispositivo_id AND
C.id = D.cliente_id AND
A.falsa = true AND
D.cliente_id = 1 
ORDER BY A.fecha desc;
--Consulta de Cantidad falsas alarmas por cliente entre fechas (recibe dos parametros de fecha y el cliente)
SELECT count(*) 
FROM alarma A, dispositivo D, cliente C, tipo_dispositivo T  
WHERE D.id = A.dispositivo_id AND
T.id = D.tipo_dispositivo_id AND
C.id = D.cliente_id AND
A.falsa = true AND
A.fecha BETWEEN (fecha_desde AND fecha_hasta)
D.cliente_id = 1 
ORDER BY A.fecha desc;

--Actualización de password (recibe el id de usuario y el password nuevo)
UPDATE usuario SET password = '123456' WHERE id = 1;
-- Alta de dispositivos
INSERT INTO dispositivo (tipo_dispositivo_id, estado_habilitacion_id, estado, inmobilizado, id_externo, cliente_id) 
VALUES (1,1,'ACTIVO', false , 1234.123 ,1);


