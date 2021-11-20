CREATE DATABASE DBcondominio180

CREATE TABLE administrador(
	idAdmin INTEGER(20) NOT NULL AUTO_INCREMENT,
	apellidos VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	dni VARCHAR(20) NOT NULL,
	email VARCHAR(20) NOT NULL,
	telefono VARCHAR(20) NOT NULL,
	direccion VARCHAR(50) NOT NULL,
	usuario VARCHAR(20) NOT NULL,
	clave VARCHAR(20) NOT NULL,
	estado VARCHAR(20) NOT NULL,
	PRIMARY KEY(idAdmin)

);

CREATE TABLE propietario(
	
	idPropietario INTEGER(20) NOT NULL PRIMARY KEY auto_increment,
	apellidos VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	dni VARCHAR(20) NOT NULL,
	email VARCHAR(20) NOT NULL,
	telefono VARCHAR(20) NOT NULL,
	usuario VARCHAR(20) NOT NULL,
	clave VARCHAR(20) NOT NULL,
	estado VARCHAR(20) NOT NULL
);

CREATE TABLE inmueble(
	
	idInmueble INTEGER(50) NOT NULL PRIMARY KEY auto_increment,
	idPropietario INTEGER(20) NOT NULL,
	idTorre INTEGER(20) NOT NULL,
	piso INTEGER(20) NOT NULL,
	numero INTEGER(20) NOT NULL,
	descripcion VARCHAR(200) ,
	activo VARCHAR(10),
	
	FOREIGN KEY (idPropietario)
	REFERENCES propietario(idPropietario)
	ON DELETE CASCADE ON UPDATE cascade

);

CREATE TABLE inquilino(
	
	idInqulino INTEGER(20) NOT NULL PRIMARY KEY auto_increment,
	apellidos VARCHAR(50) NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	idInmueble INTEGER(20) NOT NULL,
	dni VARCHAR(20) NOT NULL,
	email VARCHAR(20) NOT NULL,
	telefono VARCHAR(20) NOT NULL,
	direccion VARCHAR(50) NOT NULL,
	usuario VARCHAR(20) NOT NULL,
	clave VARCHAR(20) NOT NULL,
	estado VARCHAR(20) NOT NULL,
	
	FOREIGN KEY (idInmueble)
	REFERENCES inmueble(idInmueble)
	ON DELETE CASCADE ON UPDATE cascade

);

CREATE TABLE torre(

	idTorre INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(150)
);

ALTER TABLE inmueble
ADD CONSTRAINT fk_torreInmmueble
FOREIGN KEY (idTorre)
REFERENCES torre(idTorre);

ALTER TABLE inmueble
ADD COLUMN idTipoInmueble INTEGER;

CREATE TABLE tipoInmueble(
	
	idTipo INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombre VARCHAR(150),
	costoAgua DOUBLE,
	costoMantenimiento DOUBLE

);

ALTER TABLE inmueble
ADD CONSTRAINT fk_tipoInmmueble
FOREIGN KEY (idTipoInmueble)
REFERENCES tipoInmueble(idTipo);

CREATE TABLE alquilerAuditorio(
	idAlquiler INTEGER PRIMARY KEY AUTO_INCREMENT,
	idPropietario INTEGER,
	idInmueble INTEGER,
	fechaInicio DATETIME,
	fechaFin DATETIME,
	costo DOUBLE,
	pagado INTEGER,
	limpieza INTEGER,
	costoLimpieza NUMERIC(8,2),
	total NUMERIC(8,2),
	CONSTRAINT fk_idPropietario
	FOREIGN KEY (idPropietario)
	REFERENCES propietario(idPropietario)
	ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fk_idInmueble
	FOREIGN KEY (idInmueble)
	REFERENCES inmueble(idInmueble)
	ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE recibo(
	idRecibo INTEGER PRIMARY KEY AUTO_INCREMENT,
	idTipoObligacion INTEGER,
	anio INTEGER,
	mes INTEGER,
	importe NUMERIC(8,2),
	descripcion VARCHAR(150)
);

CREATE TABLE tipoObligacion(
	idTipoObligacion INTEGER PRIMARY KEY AUTO_INCREMENT,
	idRecibo INTEGER
);

CREATE TABLE obligacion(
	idObligacion INTEGER PRIMARY KEY AUTO_INCREMENT,
	idInmueble INTEGER,
	idTipoObligacion INTEGER,
	idPropietario INTEGER,
	anio INTEGER,
	mes INTEGER,
	
	CONSTRAINT fk_idInmuebleObli
	FOREIGN KEY (idInmueble)
	REFERENCES inmueble(idInmueble) 
	ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT fk_idTipoObligacion
	FOREIGN KEY (idTipoObligacion)
	REFERENCES tipoObligacion(idTipoObligacion)
	ON DELETE CASCADE ON UPDATE CASCADE,
	
	CONSTRAINT fk_idPropietarioObli
	FOREIGN KEY (idPropietario)
	REFERENCES propietario(idPropietario)
	ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE tipoObligacion
ADD CONSTRAINT fk_idRecibo
FOREIGN KEY (idRecibo)
REFERENCES recibo(idRecibo);

ALTER TABLE recibo
ADD CONSTRAINT fk_tipoObligacion
FOREIGN KEY (idTipoObligacion)
REFERENCES tipoObligacion(idTipoObligacion);
