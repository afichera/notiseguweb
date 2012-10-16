-- Clientes
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(1, 5, 20282300142 , 'ALEJANDRO' , 'FICHERA' , 'SOFTDOIT S.A.', 'MESA' );
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(2, 2, 12345678 , 'GASTON' , 'APIOLI' , 'CARLOS COLECTORA S.R.L', 'SILLA' );
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(3, 1, 98765432 , 'JUAN' , 'MARGENATS' , ' ', 'SILA Y MESA' );
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(4, 5, 30123456704 , 'CLIENTE4' , 'APELLIDO4' , 'EMPRESA4 S.A.', 'MESA4' );
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(5, 5, 33123456785 , 'CLIENTE5' , 'APELLIDO5' , 'EMPRESA5 S.A.', 'MESA5' );
INSERT INTO cliente (id, tipo_doc_id, nro_doc, nombre, apellido, razon_social, palabra_clave) VALUES(6, 1, 33123456786 , 'CLIENTE6' , 'APELLIDO6' , 'EMPRESA6 S.A.', 'MESA6' );
-- Domicilios
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(1, 111, 'CALLE 1' , 111 , 1711 , 1);
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(2, 222, 'CALLE 2' , 222 , 1712 , 2);
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(3, 333, 'CALLE 3' , 333 , 1410 , 3);
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(4, 444, 'CALLE 4' , 444 , 1411 , 4);
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(5, 555, 'CALLE 5' , 555 , 1712 , 5);
INSERT INTO domicilio (id, nro, calle, localidad_id, cod_postal, cliente_id) VALUES(6, 666, 'CALLE 6' , 666 , 1423 , 6);
--Contacto
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(1, '44444441', '55555552' , '66666663' , 'alejandrofichera@gmail.com' , 1);
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(2, '44444442', '55555552' , '66666663' , 'gast.apioli@gmail.com' , 2);
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(3, '44444443', '55555552' , '66666663' , 'margenats@gmail.com' , 3);
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(4, '44444444', '55555552' , '66666663' , 'cliente4@gmail.com' , 4);
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(5, '44444445', '55555552' , '66666663' , 'cliente5@gmail.com' , 5);
INSERT INTO contacto (id, tel_principal, tel_alter, fax, email, cliente_id) VALUES(6, '44444446', '55555552' , '66666663' , 'cliente6@gmail.com' , 6);

INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(1, 1, 'ACTIVO', false , 12341.12341 , 1, 1, 'DISPOSITIVO 1');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(2, 3, 'INACTIVO', false , 12347.12347 , 1, 1, 'DISPOSITIVO 2');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(3, 2, 'ACTIVO', false , 12342.12342 , 2, 1, 'DISPOSITIVO 3');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(4, 1, 'INACTIVO', true , 12343.12343 , 3, 1, 'DISPOSITIVO 4');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(5, 1, 'ACTIVO', true , 12344.12344 , 4, 1, 'DISPOSITIVO 5');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(6, 2, 'INACTIVO', false , 12345.12345 , 4, 2, 'DISPOSITIVO 5');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(7, 1, 'ACTIVO', true , 12345.12345 , 5, 1, 'DISPOSITIVO 6');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(8, 2, 'INACTIVO', false , 12345.12340 , 5, 3, 'DISPOSITIVO 7');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(9, 1, 'ACTIVO', true , 12346.12346 , 6, 1, , 'DISPOSITIVO 8');
INSERT INTO dispositivo (id, tipo_dispositivo_id, estado, inmobilizado, id_externo, cliente_id, estado_habilitacion_id, descripcion) VALUES(10, 3, 'INACTIVO', false , 12346.12340 , 6, 4, 'DISPOSITIVO 9');

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO usuario (id, usuario, password, nombre, apellido, rol_id, cliente_id) VALUES
(5, 'afichera', '123456', 'Alejandro', 'Fichera', 1, 1),
(6, 'gapioli', '123456', 'Gaston', 'Apioli', 2, 2),
(7, 'jmargenats', '123456', 'Juan', 'Margenats', 3, 3),
(8, 'cliente4', 'cliente4', 'Cliente 4', 'Cliente 4', 4, 4),
(9, 'cliente5', 'cliente5', 'Cliente 5', 'Cliente 5', 4, 5),
(10, 'cliente6', 'cliente6', 'Cliente 6', 'Cliente 6', 4, 6);


INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 2);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 3);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(true, 'ON', 4);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 5);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 6);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 7);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(true, 'ON', 8);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 9);
INSERT INTO alarma(falsa, estado, dispositivo_id) VALUES(false, 'ON', 10);


INSERT INTO factura(id, numero, importe, abonada, cliente_id) VALUES(1, 1234567890, 400.5, true, 1);
INSERT INTO factura(id, numero, importe, abonada, cliente_id) VALUES(2, 1234567891, 200, false, 2);
INSERT INTO factura(id, numero, importe, abonada, cliente_id) VALUES(3, 1234567892, 1800, false, 3);
INSERT INTO factura(id, numero, importe, abonada, cliente_id) VALUES(4, 1234567893, 345.9, true, 4);
INSERT INTO factura(id, numero, importe, abonada, cliente_id) VALUES(5, 1234567894, 80, false, 5);

INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (1, -58.66668, -34.66664 );
INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (2, -58.66663, -34.66666 );
INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (3, -58.66663, -34.66664 );
INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (4, -58.66663, -34.66662 );
INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (5, -58.66669, -34.66667 );
INSERT INTO seguimiento(dispositivo_id, longitud, latitud) VALUES (6, -58.66664, -34.66667 );

