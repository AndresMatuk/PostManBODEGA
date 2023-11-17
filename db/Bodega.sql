create database bodega;
use bodega;
create table productos(
	codigoProducto int auto_increment primary key not null,
    nombreProducto varchar(30) not null,
    precio int not null,
    cantidad int not null,
    fechaExp date
);
create table cliente(
	codigoCliente int auto_increment primary key not null,
    nombreCliente varchar(30) not null,
    FK_codigoProducto int not null,
    cantidadCompra int not null,
    cantidadPago int not null
);
alter table cliente add foreign key(FK_codigoProducto) references productos(codigoProducto);


INSERT INTO productos (nombreProducto, precio, cantidad, fechaExp) VALUES
('Camisa', 2500, 50, '2023-12-31'),
('Zapatos', 3500, 30, '2024-06-30'),
('Teléfono', 8000, 20, '2025-02-28'),
('Libro', 500, 100, NULL),
('Laptop', 12000, 10, '2024-09-15'),
('Gafas de sol', 1000, 40, '2023-08-31'),
('Bolso', 1800, 25, '2024-04-15'),
('Reloj', 3000, 15, '2023-11-30'),
('Teclado', 800, 50, NULL),
('Auriculares', 1500, 35, '2024-03-15');


INSERT INTO cliente (nombreCliente, FK_codigoProducto, cantidadCompra, cantidadPago) VALUES
('Juan Pérez', 2, 2, 7000),
('María Rodríguez', 5, 1, 12000),
('Pedro Gómez', 3, 5, 40000),
('Laura Martínez', 8, 1, 3000),
('Carlos Sánchez', 4, 3, 1500),
('Ana López', 1, 2, 5000),
('Miguel Torres', 6, 4, 4000),
('Elena Díaz', 9, 1, 800),
('Sergio Ramírez', 7, 2, 3600),
('Isabel García', 10, 3, 4500);

select * from productos;
select * from cliente;


