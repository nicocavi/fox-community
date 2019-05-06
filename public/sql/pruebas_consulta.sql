INSERT INTO users (apellido,email,name_user,nombre,pass) VALUES 
('Cavilla', 'nico_cavi@hotmail.com', 'cavi', 'nicolas', '123456')


INSERT INTO post (cuerpo,fecha,titulo,url,user) VALUES 
('Contenido primer post', NOW(), 'Titulo primer post', 'titulo-primer-post','cavi')


INSERT INTO comentario (contenido,fecha,titulo,user) VALUES 
('Comentario primer post', NOW(), 'Titulo primer post','cavi')

INSERT INTO comentario (contenido,fecha,titulo,user) VALUES 
('Comentario SEGUNDO post', NOW(), 'Titulo primer post','cavi')