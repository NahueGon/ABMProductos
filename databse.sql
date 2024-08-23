CREATE DATABASE IF NOT EXISTS amb;
USE amb;

DROP TABLE IF EXISTS product;
CREATE TABLE IF NOT EXISTS product(
    id              int(11) auto_increment not null,
    product         varchar(255),
    description     text,
    price           float,

    CONSTRAINT pk_product PRIMARY KEY(id)
)ENGINE=InnoDb;

