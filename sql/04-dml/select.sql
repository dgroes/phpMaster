#Mostrar todos los registros de una tabla#
SELECT email, nombre, apellidos FROM usuarios;

#Mostrar todos los campos#
SELECT * FROM usuarios;

#Operadores aritmeticos#
SELECT email, (4+7) as 'Operacion' FROM usuarios; 

SELECT id, email  FROM usuarios ORDER BY id; 

#Funciones Matematicas#
SELECT abs(7) as 'Operacion' FROM usuarios; 
