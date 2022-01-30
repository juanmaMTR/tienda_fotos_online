/*
 *Script.sql
 *Archivo para crear la base de datos de la tienda de fotos online
 */
CREATE DATABASE tienda_fotos_online;
USE tienda_fotos_online;

CREATE TABLE cliente(
    idCliente tinyint UNSIGNED primary key AUTO_INCREMENT not null,
    nombre varchar(50) not null,
    direccion varchar(60) not null
);
CREATE TABLE pedido(
    idPedido smallint UNSIGNED primary key AUTO_INCREMENT not null,
    fotografias longblob not null,
    idCliente tinyint UNSIGNED not null,
    CONSTRAINT FK_idCliente FOREIGN KEY (idCliente) REFERENCES cliente(idCliente) ON DELETE CASCADE ON UPDATE CASCADE
);
CREATE TABLE producto(
    idProducto tinyint UNSIGNED primary key AUTO_INCREMENT not null,
    descripcion varchar(100) not null
);
CREATE TABLE pedido_producto(
    idPedido smallint UNSIGNED not null,
    idProducto tinyint UNSIGNED not null,
    CONSTRAINT FK_idPedido FOREIGN KEY (idPedido) REFERENCES pedido(idPedido) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_idProducto FOREIGN KEY (idProducto) REFERENCES producto(idProducto) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT PK_pedido_producto PRIMARY KEY (idPedido,idProducto)
);