#insertar nuevos registros
INSERT INTO usuarios VALUES(null, 'Diego', 'Pasten Uribe', 'diego@gmail.com', '192837465n', '2023-07-26');
INSERT INTO usuarios VALUES(null, 'Miguel', 'Paz Urritia', 'miguel@gmail.com', '385720jewm', '2023-07-26');
INSERT INTO usuarios VALUES(null, 'Carmen', 'Espinoza Flores', 'carmen@gmail.com', 'jfhII38103p', '2023-07-26');

INSERT INTO usuarios (id, nombre, apellido, email, contrasena, fecha_nacimiento)
VALUES
  (null, 'Luis', 'Hernández Soto', 'luis.hernandez@example.com', 'abc123xyz', '1992-11-20'),
  (null, 'Julia', 'López Ramírez', 'julia.lopez@example.com', 'securepass', '1987-06-12'),
  (null, 'Andrés', 'Gómez Pérez', 'andres.gomez@example.com', 'password456', '1993-09-05'),
  (null, 'Sofía', 'González Rojas', 'sofia.gonzalez@example.com', 'pass1234', '1997-03-18'),
  (null, 'Diego', 'Torres Gutiérrez', 'diego.torres@example.com', 'qwertyuiop', '1991-08-25'),
  (null, 'Carolina', 'Martínez Ruiz', 'carolina.martinez@example.com', 'mysecretpass', '1989-12-03'),
  (null, 'Mateo', 'Sánchez Jiménez', 'mateo.sanchez@example.com', 'hello123', '1996-02-08'),
  (null, 'Valentina', 'Fernández García', 'valentina.fernandez@example.com', 'letmein321', '1990-05-15'),
  (null, 'Lucas', 'Rodríguez Molina', 'lucas.rodriguez@example.com', 'securepw789', '1994-07-29'),
  (null, 'Isabella', 'Vargas Castro', 'isabella.vargas@example.com', 'myp@ssword', '1986-10-02'),
  (null, 'María', 'González Ramírez', 'maria.gonzalez@example.com', 'p@ssw0rd', '1995-02-14'),
  (null, 'Pedro', 'Fernández López', 'pfernandez@example.com', '12345abcd', '1988-09-30'),
  (null, 'Laura', 'Martínez Navarro', 'laura.martinez@example.com', 'qwerty123', '1990-12-05'),
  (null, 'Carlos', 'Sánchez Gómez', 'csanchez@example.com', 'myp@ss123', '1985-07-10'),
  (null, 'Ana', 'Torres Rodríguez', 'ana.torres@example.com', 'password123', '1998-04-23');


#Insertar filas solo con ciertas columnas#
INSERT INTO usuarios(email, password) VALUES('dark@gmail.com', '1234admin');
