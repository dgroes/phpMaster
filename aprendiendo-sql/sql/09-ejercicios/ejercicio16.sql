/* Obtener listado de clientes atendidos por el vendedor 'David Lopez' */
select * from clientes
where vendedor_id = 1;

select * from clientes
where vendedor_id IN
(select id from vendedores where nombre = 'David' AND apellidos = 'Lopez');

select * from vendedores;
select * FROM clientes;