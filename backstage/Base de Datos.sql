CREATE table usuarios(
    id int(3)AUTO_INCREMENT NOT NULL,
	nombre varchar(20),
    paterno varchar(20),
    materno varchar(20),
    correo varchar(100),
    usuario varchar(20),
    contrasena varchar(20),
    biografia  varchar(255) DEFAULT '',
    fb  varchar(100) DEFAULT '',
    insta  varchar(100) DEFAULT '',
    tw  varchar(100) DEFAULT '',
    img_perfil mediumblob,
    img_nombre  varchar(30),
    img_tamano  varchar(50),
    imp_tipo  varchar(20),
    PRIMARY KEY (id)
);