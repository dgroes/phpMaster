#INSERTS PARA CATEGORIAS#
INSERT INTO categorias VALUES(null, 'Accion');
INSERT INTO categorias VALUES(null, 'Rol');
INSERT INTO categorias VALUES(null, 'Deportes');
INSERT INTO categorias VALUES(null, 'Misterio');
INSERT INTO categorias VALUES(null, 'Estrategia');
INSERT INTO categorias VALUES(null, 'JRPG');
INSERT INTO categorias VALUES(null, 'MMO');
INSERT INTO categorias VALUES(null, 'Aventura');

select * from categorias;
select * from usuarios;
#INSERTS PARA ENTRADAS#
INSERT INTO entradas VALUES(null, 1, 2, 'Dark Souls', 'Juego de rol de acción creada por Hidetaka Miyazaki de FromSoftware y publicada por Bandai Namco Entertainment.', curdate());
INSERT INTO entradas VALUES(null, 2, 1, 'Uncharted', 'Juego de acción y aventura de disparos en tercera persona. Desarrollado por la empresa Naughty Dog, y publicado por Sony Computer Entertainment para la consola PlayStation 3.', curdate());
INSERT INTO entradas VALUES(null, 3, 8, 'Terraria', 'Videojuego de acción, aventura y de sandbox producido de forma independiente por el estudio Re-Logic..', curdate());
INSERT INTO entradas VALUES(null, 4, 5, 'StarCraft II', 'videojuego de estrategia en tiempo real desarrollado por Blizzard Entertainment para Microsoft Windows y Macintosh.', curdate());
INSERT INTO entradas VALUES(null, 5, 1, 'Doom Eternal', 'videojuego de acción y disparos en primera persona desarrollado por id Software', curdate());
INSERT INTO entradas VALUES(null, 6, 3, 'Forza Horizon 5', 'videojuego de carreras multijugador en línea desarrollado por Playground Games y publicado por Xbox Game Studios. Es el quinto título de Forza Horizon y la duodécima entrega principal de la serie Forza. El juego está ambientado en una representación ficticia de México', curdate());
INSERT INTO entradas VALUES(null, 7, 4, 'Heavy Rain', 'Heavy Rain es un videojuego de drama interactivo de thriller psicológico desarrollado por Quantic Dream y distribuido por Sony Computer Entertainment para PlayStation 3, PlayStation 4 y PC.', curdate());
INSERT INTO entradas VALUES(null, 8, 7, 'World Of wARCRAFT', 'World of Warcraft es un videojuego de rol multijugador masivo en línea desarrollado por Blizzard Entertainment. Es el cuarto juego lanzado establecido en el universo fantástico de Warcraft, el cual fue introducido por primera vez por Warcraft: Orcs & Humans en 1994.', curdate());
INSERT INTO entradas VALUES(null, 9, 6, 'Final Fantasy X', 'Final Fantasy X es un RPG desarrollado y publicado por la compañía Squaresoft para el sistema PlayStation 2, llegando a Europa en 2002; es la décima entrega de la serie Final Fantasy, y fue la primera en desarrollarse para esta videoconsola.', curdate());
INSERT INTO entradas VALUES(null, 10, 1, 'Sekiro: Shadows Die Twice', 'videojuego de acción y aventura desarrollado por From Software y distribuido por Activision.​ El juego fue lanzado el 22 de marzo de 2019 en las plataformas PlayStation 4, Xbox One y Microsoft Windows.​', curdate());

select * from entradas;
