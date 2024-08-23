CREATE DATABASE IF NOT EXISTS amb;
USE amb;

DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products(
    id              int(11) auto_increment not null,
    product         varchar(255),
    description     text,
    price           float,

    CONSTRAINT pk_products PRIMARY KEY(id)
)ENGINE=InnoDb;

