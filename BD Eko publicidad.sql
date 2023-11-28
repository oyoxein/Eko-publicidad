CREATE DATABASE EkoPublicidad;
USE EkoPublicidad;

CREATE TABLE cliente(
	idCliente INT PRIMARY KEY NOT NULL,
	nombre VARCHAR(30) NOT NULL,
	correo VARCHAR(50) NOT NULL,
	contrasena VARCHAR(50) NOT NULL
);


CREATE TABLE producto(
	idProducto INT PRIMARY KEY NOT NULL,
	nombre VARCHAR(30) NOT NULL,
	descripcion VARCHAR(100) NOT NULL,
	precio DOUBLE NOT NULL
);

ALTER TABLE producto ADD COLUMN imagen VARCHAR(1024) NOT NULL;

CREATE TABLE cotizacion(
	idCotizacion INT PRIMARY KEY NOT NULL,
	idProducto INT NOT NULL,
	estado BOOLEAN NOT NULL,
	fechaVencimiento DATE NOT NULL,
	FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
);

CREATE TABLE factura(
	idFactura INT PRIMARY KEY NOT NULL,
	idCliente INT NOT NULL,
	idProducto INT NOT NULL,
	precioUnidad DOUBLE NOT NULL,
	cantidad INT NOT NULL,
	total DOUBLE NOT NULL,
	FOREIGN KEY(idCliente) REFERENCES cliente(idCliente),
	FOREIGN KEY(idProducto) REFERENCES producto(idProducto)
);


INSERT INTO producto(idProducto, nombre, descripcion, precio, imagen)
VALUES(1, 'PROCESADOR AMD RYZEN', 'PROCESADOR AMD RYZEN 3 4100-AM4', 42000.00, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/CPU/100-100000510BOX-800x800.jpg.webp'),
(2, 'APPLE IPHONE 11', 'APPLE IPHONE 11 64GB', 299900.00, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/IPH11-8-800x800h.jpg.webp'),
(3, 'PARLANTES UNNO TECHNO RGB 6W', 'PARLANTES UNNO TECHNO RGB 6W', 4000.00, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/Parlantes/SP9025BK-800x800w.jpg.webp'),
(4, 'MONITOR LED CURVO', 'MONITOR LED 23.5" SAMSUNG CF390 CURVO 4MS-60HZ-1920X1080', 79900, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/LC24F390FHLXZP-800x800w.jpg.webp'),
(5, 'DELL INSPIRON 3520', 'DELL INSPIRON 3520 256GB-SSD-15.6"-W11', 245000.00, 'https://www.intelec.co.cr/image/cache/catalog/catalogo/Portatiles/D5N53-800x800w.jpg.webp');


SELECT * FROM producto;


