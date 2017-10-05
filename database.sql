CREATE DATABASE IF NOT EXISTS SYSMASG DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;

USE SYSMASG;


CREATE TABLE IF NOT EXISTS tbl_usuarios (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  usuario varchar(90) DEFAULT NULL,
  password varchar(60) DEFAULT NULL,
  rol varchar(30) DEFAULT 'USER',
  fecha_registro DATE,
  hora_registro TIME,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tbl_proveedores (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  proveedor varchar(60),
  direccion text,
  telefono varchar(60),
  contacto varchar(40),
  fecha_registro DATE,
  hora_registro TIME,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tbl_producto (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  producto varchar(90) DEFAULT NULL,
  descripcion text DEFAULT NULL,
  precio_proveedor float,
  precio_venta float,
  fecha_registro DATE,
  hora_registro TIME,
  id_proveedor int,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS tbl_caja (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  id_usuario int,
  cantidad_abierta float,
  cantidad_cerrada float,
  fecha_abierta DATE,
  hora_abierta TIME,
  fecha_cerrada DATE,
  hora_cerrada TIME,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS tbl_ticket (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  id_usuario int,
  id_caja int,
  fecha_registro DATE,
  hora_registro TIME,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS tbl_ventas (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  id_usuario int,
  id_caja int,
  id_ticket int,
  id_producto int,
  cantidad int,
  total float,
  fecha_registro DATE,
  hora_registro TIME,
  estatus varchar(34) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;