create database barberia_v2;
use barberia_v2;

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


CREATE TABLE lunes (
    id int auto_increment primary key,
    hora time,
    nombre varchar(12),
    celular int
);

drop table lunes;

insert into lunes(hora)
values
(100000),
(110000),
(120000),
(130000),
(140000),
(150000),
(160000),
(170000),
(180000),
(190000),
(200000),
(210000);

select *
from lunes;