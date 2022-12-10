CREATE DATABASE reservasutp;

USE reservasutp;

CREATE TABLE usuario(
	id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50),
    correo VARCHAR(50) UNIQUE KEY,
    contrasena VARCHAR(50),
    telefono VARCHAR(50),
    fecha_nac DATE,
    direccion VARCHAR(50),
    provincia VARCHAR(50)
);

CREATE TABLE provincia_alojamiento(
	id INT AUTO_INCREMENT PRIMARY KEY,
    provincia VARCHAR(50),
    imagen_paisaje VARCHAR(50)
);

CREATE TABLE alojamiento(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_lugar INT,
    CONSTRAINT fk_id_lugar_alojamiento FOREIGN KEY (id_lugar) REFERENCES provincia_alojamiento(id),
    precio_original VARCHAR(50),
    precio_oferta VARCHAR(50) NULL,
    impuestos VARCHAR(50),
    nombre_hotel VARCHAR(50),
	ubicacion VARCHAR(50),
    imagen VARCHAR(50),
    kilometros VARCHAR(50),
    descripcion VARCHAR(500)
);

CREATE TABLE habitaciones(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_alojamiento INT,
    CONSTRAINT fk_id_alojamiento_habitaciones FOREIGN KEY (id_alojamiento) REFERENCES alojamiento(id),
    nombre_habitacion VARCHAR(500),
    cama VARCHAR(500),
    precio VARCHAR(50)
);

CREATE TABLE disponibilidad_habitacion(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_habitaciones INT,
    CONSTRAINT fk_id_habitaciones_disponibilidad FOREIGN KEY (id_habitaciones) REFERENCES habitaciones(id),
    adultos INT,
    ninos INT
);

CREATE TABLE reservas(
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_habitacion INT,
    id_usuario INT,
    CONSTRAINT fk_id_habitacion_reservas FOREIGN KEY (id_habitacion) REFERENCES habitaciones(id),
    CONSTRAINT fk_id_usuario_reservas FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

DELIMITER //
CREATE PROCEDURE sp_habitacion(
	IN spid INT
)
BEGIN
	SELECT h.id, h.nombre_habitacion, h.cama, h.precio, d.adultos, d.ninos FROM habitaciones as h
		JOIN disponibilidad_habitacion as d on h.id = d.id_habitaciones WHERE id_alojamiento=spid;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_reserva(
	IN spidh INT,
    IN spidu INT
)
BEGIN
	INSERT INTO reservas (id_habitacion, id_usuario) VALUES (spidh, spidu);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_ver_reservas(
	IN spidh INT
)
BEGIN
	SELECT h.nombre_habitacion, h.cama, h.precio, r.id, d.adultos, d.ninos, a.nombre_hotel, a.imagen FROM habitaciones as h join reservas as r ON h.id = r.id_habitacion 
    JOIN  disponibilidad_habitacion as d on h.id = d.id_habitaciones
    JOIN alojamiento as a ON h.id_alojamiento = a.id  
    where r.id_usuario=spidh;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_hoteles(
	IN spid INT
)
BEGIN
	SELECT A.id, A.id_lugar, A.precio_original, A.precio_oferta, A.impuestos, A.nombre_hotel,
    A.ubicacion, A.imagen, A.kilometros, A.descripcion, P.provincia, p.imagen_paisaje
    FROM alojamiento as A JOIN provincia_alojamiento as P on A.id_lugar = P.id WHERE id_lugar=spid;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_validarlogin(
	IN spcorreo VARCHAR(50),
    IN spcontrasena VARCHAR(50)
)
BEGIN
	SELECT * FROM usuario WHERE correo=spcorreo AND contrasena=spcontrasena;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_verperfil(
	IN spid INT
)
BEGIN
	SELECT * FROM usuario WHERE id=spid;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_actualizarperfil(
	IN spnombre VARCHAR(50),
    IN spcorreo VARCHAR(50),
    IN sptelefono VARCHAR(50),
    IN spfecha_nac DATE,
    IN spdireccion VARCHAR(50),
    IN spprovincia VARCHAR(50),
	IN spid INT
)
BEGIN
	UPDATE usuario SET nombre=spnombre, correo=spcorreo, telefono=sptelefono, fecha_nac=spfecha_nac,direccion=spdireccion,provincia=spprovincia WHERE id=spid;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_registrarusuario(
	IN spnombre VARCHAR(50),
	IN spcorreo VARCHAR(50),
    IN spprovincia VARCHAR(50),
    IN sptelefono VARCHAR(50),
    IN spdireccion VARCHAR(50),
    IN spfecha_nac DATE,
    IN spcontrasena VARCHAR(50)
)
BEGIN
	INSERT INTO usuario (nombre, correo, provincia, telefono, direccion, fecha_nac, contrasena) VALUES 
(spnombre, spcorreo,spprovincia,sptelefono,spdireccion,spfecha_nac,spcontrasena);
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_busqueda(
	IN spprovincia VARCHAR(50),
    IN spadulto INT,
    IN spnino INT
)
BEGIN
	SELECT h.id, h.nombre_habitacion, h.cama, h.precio, d.adultos, d.ninos, a.nombre_hotel, a.imagen, p.provincia FROM habitaciones as h
		JOIN disponibilidad_habitacion as d on h.id = d.id_habitaciones
        JOIN alojamiento as a ON h.id_alojamiento = a.id
        JOIN provincia_alojamiento as p ON a.id_lugar = p.id WHERE p.provincia=spprovincia AND d.adultos=spadulto AND d.ninos=spnino;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_inforeserva(
    IN sph INT
)
BEGIN
	SELECT a.nombre_hotel, h.precio, a.impuestos, h.nombre_habitacion FROM habitaciones as h
	JOIN alojamiento as a ON h.id_alojamiento = a.id WHERE h.id =sph;
END //
DELIMITER ;

DELIMITER //
CREATE PROCEDURE sp_infousuarioreserva(
    IN sph INT
)
BEGIN
	SELECT h.nombre_habitacion, h.cama, h.precio, r.id, d.adultos, d.ninos, a.nombre_hotel, a.imagen FROM habitaciones as h join reservas as r ON h.id = r.id_habitacion 
    JOIN  disponibilidad_habitacion as d on h.id = d.id_habitaciones
    JOIN alojamiento as a ON h.id_alojamiento = a.id  
    where r.id=sph;
END //
DELIMITER ;