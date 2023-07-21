# Reenombrar una tabla
ALTER TABLE usuarios RENAME TO usuarios_renom;

#Cambiar nombre de una columna
ALTER TABLE usuarios_renom CHANGE apellidos apellido varchar(100) null;

#Modificar Columna sin cambiar nombre
ALTER TABLE usuarios_renom MODIFY apellido char(50) not null;

#Añadir columna
ALTER TABLE usuarios_renom ADD website varchar(100) not null;

#Añadir rescricción a columna
ALTER TABLE usuarios_renom ADD CONSTRAINT uq_email UNIQUE(email);

#Borrar una columna
ALTER TABLE usuarios_renom DROP website;