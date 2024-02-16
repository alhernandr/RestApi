-- Crea la base de datos
CREATE DATABASE IF NOT EXISTS andercode_webservice;
USE andercode_webservice;

-- Crea la tabla tm_categoria
CREATE TABLE tm_categoria (
    cat_id INT NOT NULL AUTO_INCREMENT ,
    cat_nom VARCHAR(50) NOT NULL ,
    cat_obs VARCHAR(250) NOT NULL ,
    est INT NOT NULL ,
    PRIMARY KEY (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Crea la tabla tm_productos
CREATE TABLE tm_productos(
    prod_id int(11) NOT NULL AUTO_INCREMENT,
    prod_nom varchar(20) NOT NULL,
    cat_id int(11) NOT NULL,
    PRIMARY KEY (prod_id),
    FOREIGN KEY (cat_id) REFERENCES tm_categoria (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserta valores en la tabla tm_categoria
INSERT INTO tm_categoria (cat_nom, cat_obs, est) VALUES 
('Televisores', 'Observación tv', 1),
('Refrigeradoras', 'Observación Refrigeradoras', 1),
('Cocinas', 'Observación Cocinas', 1),
('Lavadoras', 'Observación Lavadoras', 1);