CREATE DATABASE IF NOT EXISTS exemplo;

USE exemplo;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT NOT NULL,
    descricao VARCHAR(255) DEFAULT NULL,  
    PRIMARY KEY (id)
);