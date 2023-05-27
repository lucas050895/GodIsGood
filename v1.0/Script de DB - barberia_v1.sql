create database barberia_v1;
use barberia_v1;

create table horas(
    id int,
    hora time
);
insert into horas(id,hora)
values
(1,100000),
(2,110000),
(3,120000),
(4,130000),
(5,140000),
(6,150000),
(7,160000),
(8,170000),
(9,180000),
(10,190000),
(11,200000),
(12,210000);

CREATE TABLE datos (
    id INT,
    nombre varchar(12),
    celular int,
    dia date,
    hora time
);

CREATE TABLE registro (
    id INT,
    nombre varchar(12),
    celular int,
    dia date,
    hora time
);