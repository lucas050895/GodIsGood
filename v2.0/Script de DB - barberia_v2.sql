use barberia_v2;

/*HORARIOS*/
create table hora(
	hora time,
    primary key(hora)
);

insert into hora(hora) 
value
(100000),
(110000),
(120000),
(130000),
(140000);

drop table hora;

	/*DATOS*/
create table datos(
	id_datos int auto_increment,
    hora time, 
    nombre varchar(15),
    primary key(id_datos),
    foreign key(hora) references hora(hora)
);

insert into datos(id_datos,hora,nombre) 
value
(1,100000,null),
(2,110000,null),
(3,120000,null),
(4,130000,null),
(5,140000,null);

select *
from datos;

UPDATE `barberia_v2`.`datos` SET `nombre` = '' WHERE (`id_datos` = '5');