CREATE DATABASE aula0408;
USE aula0408;

CREATE TABLE tb_usuario (
    cd_usuario INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    nm_usuario VARCHAR(110),
    em_usuario VARCHAR(110)
);