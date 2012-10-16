SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE provincias (
	id INT( 2 ) NOT NULL ,
	nombre VARCHAR( 50 ) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE departamentos (
	id INT( 3 ) NOT NULL ,
	provincia_id INT ( 2 ) NOT NULL ,
	nombre VARCHAR( 100 ) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE localidades (
	id INT( 4 ) NOT NULL ,
	departamento_id INT ( 3 ) NOT NULL ,
	nombre VARCHAR( 100 ) NOT NULL ,
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS tipo_doc (
  id int(2) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(50));


CREATE TABLE IF NOT EXISTS cliente (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  tipo_doc_id int(2) NOT NULL,
  nro_doc bigint(20) NOT NULL,
  nombre varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  apellido varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  razon_social varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  palabra_clave varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  fecha_baja timestamp
);

CREATE TABLE IF NOT EXISTS rol (
  id int(2) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripcion varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  url_inicio varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL );


CREATE TABLE IF NOT EXISTS usuario  (
  id bigint(20)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  usuario varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  password varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  nombre varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  apellido varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  cliente_id bigint(20),
  rol_id int(2) NOT NULL
);


CREATE TABLE IF NOT EXISTS tipo_error (
  id int(2) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripcion varchar(20) NOT NULL);


CREATE TABLE IF NOT EXISTS domicilio (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,  
  nro int NOT NULL,
  calle varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  localidad_id int(4) NOT NULL,
  cod_postal int(4) NOT NULL,
  cliente_id bigint(20) NOT NULL);

CREATE TABLE IF NOT EXISTS contacto (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  tel_principal VARCHAR(20) NOT NULL,
  tel_alter VARCHAR(20) NOT NULL,
  fax VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  cliente_id bigint(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS tipo_dispositivo (
  id int(2) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(50)
  
);

CREATE TABLE IF NOT EXISTS estado_habilitacion (
  id int(2)PRIMARY KEY NOT NULL AUTO_INCREMENT,
  descripcion VARCHAR(20));


CREATE TABLE IF NOT EXISTS dispositivo (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  tipo_dispositivo_id int(2) NOT NULL,
  estado_habilitacion_id int(2) NOT NULL,
  estado VARCHAR(20) NOT NULL,
  inmobilizado boolean NOT NULL,
  id_externo double NOT NULL,
  cliente_id bigint(20) NOT NULL,
  descripcion VARCHAR(50),
  alta_server boolean not null
);

CREATE TABLE IF NOT EXISTS alarma (  
  fecha timestamp  NOT NULL DEFAULT CURRENT_TIMESTAMP,
  falsa boolean  NOT NULL,
  estado VARCHAR(20) NOT NULL,
  dispositivo_id bigint(20) NOT NULL,
  fecha_baja timestamp,
  motivo_baja varchar(250),
 PRIMARY KEY (fecha, dispositivo_id));

 CREATE TABLE IF NOT EXISTS proximo_nro (
  	id int(2) PRIMARY KEY NOT NULL AUTO_INCREMENT,
 	proximo bigint NOT NULL DEFAULT 1,
 	descripcion VARCHAR(50) NOT NULL
  	
 );
 
 
CREATE TABLE IF NOT EXISTS factura (
  id bigint(20) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  numero bigint(20) NOT NULL,
  fecha_emi timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,  
  importe double(18,2)NOT NULL,
  abonada boolean NOT NULL,
  cliente_id bigint(20) NOT NULL
);

CREATE TABLE IF NOT EXISTS seguimiento (
  fecha_hora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  dispositivo_id bigint(10) NOT NULL,
  longitud float NOT NULL,
  latitud float NOT NULL,
  PRIMARY KEY (fecha_hora, dispositivo_id)
);


CREATE TABLE IF NOT EXISTS log (
  fecha_hora timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  comentario text NOT NULL,
  usuario_id bigint(20) NOT NULL,
  nivel int(2) NOT NULL
);