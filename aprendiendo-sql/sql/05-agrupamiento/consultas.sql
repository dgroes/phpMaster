select count(titulo) as 'numero de entradas', categoria_id from entradas group by categoria_id;

#Consulta de agrupamiento con condiciones#
select count(titulo) as 'numero de entradas', categoria_id from entradas 
group by categoria_id having count(titulo)>=1;


select * from entradas;
select avg(id) as 'Media de entradas' from entradas;

select max(id) as 'Maximo ID', titulo from entradas;

select sum(id) as 'Suma de ID' from entradas;