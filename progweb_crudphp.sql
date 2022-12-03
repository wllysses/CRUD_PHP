CREATE DATABASE progweb_crudphp;
USE progweb_crudphp;

ALTER DATABASE progweb_crudphp CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE IF NOT EXISTS tab_pessoas (
	nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(15) NOT NULL,
    email VARCHAR(50),
    PRIMARY KEY(cpf)
);

SELECT * FROM tab_pessoas;