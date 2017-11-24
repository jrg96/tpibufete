CREATE DATABASE tpi_bufete;
USE tpi_bufete;

CREATE TABLE tbl_usuario(
	id_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	email VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(50) NOT NULL,
	nombre_completo VARCHAR(200) NOT NULL,
	tipo VARCHAR(10) NOT NULL
);

CREATE TABLE tbl_caso(
	id_caso INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	nombre_caso VARCHAR(200),
	estado VARCHAR(50),
	atendido_por INT,
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY (atendido_por) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_mensaje(
	id_mensaje INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_caso INT NOT NULL,
	id_usuario INT NOT NULL,
	fecha_creacion DATETIME,
	texto_mensaje VARCHAR(1000),
	es_mensaje_archivo VARCHAR(10),
	nombre_archivo_original VARCHAR(100),
	nombre_archivo_encriptado VARCHAR(50),
	FOREIGN KEY (id_caso) REFERENCES tbl_caso(id_caso),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_pago(
	id_pago INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_caso INT NOT NULL,
	monto DECIMAL(10, 2),
	nombre_servicio VARCHAR(200),
	descripcion_pago VARCHAR(1000),
	estado_pago VARCHAR(50),
	payment_id VARCHAR(50),
	token VARCHAR(25),
	payer_id VARCHAR(30),
	FOREIGN KEY (id_caso) REFERENCES tbl_caso(id_caso)
);

CREATE TABLE tbl_chat_general(
	id_chat_general INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_usuario INT NOT NULL,
	estado VARCHAR(50),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario)
);

CREATE TABLE tbl_mensaje_general(
	id_mensaje_general INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	id_chat_general INT NOT NULL,
	id_usuario INT NOT NULL,
	fecha_creacion DATETIME,
	texto_mensaje VARCHAR(500),
	FOREIGN KEY (id_usuario) REFERENCES tbl_usuario(id_usuario),
	FOREIGN KEY (id_chat_general) REFERENCES tbl_chat_general(id_chat_general)
);

INSERT INTO `tbl_usuario` (`id_usuario`, `email`, `password`, `nombre_completo`, `tipo`) VALUES
(2, 'bufetealvarado@gmail.com', '2301c59cbdef6862ec9cb5935165d0de', 'Bufete Alvarado', 'admin'),
(4, 'gomezlopez.jorge96@gmail.com', '2301c59cbdef6862ec9cb5935165d0de', 'Jorge Alberto G.', 'user'),
(5, 'data2@gmail.com', '2301c59cbdef6862ec9cb5935165d0de', 'Empleado 1', 'emp');