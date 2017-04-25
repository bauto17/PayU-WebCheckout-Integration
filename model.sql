# Create tables
CREATE TABLE IF NOT EXISTS productos
(
    id INT NOT NULL,
    name VARCHAR(50),
    precio INT,
    cantidad INT,
    image VARCHAR(150),
    PRIMARY KEY(id)
);

CREATE TABLE IF NOT EXISTS pagos
(
    referenceCode VARCHAR(150) NOT NULL,
    estado INT,
    PRIMARY KEY(referenceCode)
);

CREATE TABLE IF NOT EXISTS pagoProducto
(
    id INT NOT NULL,
    reference VARCHAR(150) NOT NULL,
    unidades INT,
    PRIMARY KEY(id, reference)
);


# Create FKs
ALTER TABLE pagoProducto
    ADD    FOREIGN KEY (id)
    REFERENCES productos(id)
;

ALTER TABLE pagoProducto
    ADD    FOREIGN KEY (reference)
    REFERENCES pagos(referenceCode)
;
