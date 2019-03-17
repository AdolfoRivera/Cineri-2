drop database cine;

create database cine;

use cine;

create table Peliculas(
idPeliculas int not null primary key auto_increment,
Nombre varchar(40),
Director varchar(30) ,
Año year,
Clasificacion varchar(10),
pais varchar(30),
Genero varchar(50),
Sinposis text
);

create table Imagen(
idImagen int not null primary key auto_increment,
idPeliculas int not null,
Archivo varchar(30),
foreign key(idPeliculas) references Peliculas
);

create table Precios(
idPrecios int not null primary key auto_increment,
tradicional float,
D3 float
);

create table Cliente(
idCliente int not null primary key auto_increment,
Nombre varchar(30),
Apellidos varchar(45),
Correo varchar(50),
contraseña varchar(45) 
);

create table Compras(
idCompras int not null primary key auto_increment,
idCliente int not null,
Total float,
NBoletos int,
Fecha date
);


