-- Esquema de base de datos para club de patinaje
CREATE TABLE apoderados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(20),
    cuota_social DECIMAL(10,2) DEFAULT 3000.00
);

CREATE TABLE deportistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apoderado_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    edad INT,
    FOREIGN KEY (apoderado_id) REFERENCES apoderados(id) ON DELETE CASCADE
);

CREATE TABLE coaches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE modalidades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    coach_id INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    tarifa DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (coach_id) REFERENCES coaches(id) ON DELETE CASCADE
);

-- inscripciones de deportistas a modalidades
CREATE TABLE inscripciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    deportista_id INT NOT NULL,
    modalidad_id INT NOT NULL,
    FOREIGN KEY (deportista_id) REFERENCES deportistas(id) ON DELETE CASCADE,
    FOREIGN KEY (modalidad_id) REFERENCES modalidades(id) ON DELETE CASCADE
);

CREATE TABLE pagos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    apoderado_id INT NOT NULL,
    tipo ENUM('cuota_social','clases') NOT NULL,
    monto DECIMAL(10,2) NOT NULL,
    fecha DATE NOT NULL,
    FOREIGN KEY (apoderado_id) REFERENCES apoderados(id) ON DELETE CASCADE
);

CREATE TABLE facturas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  apoderado_id INT NOT NULL,
  mes TINYINT NOT NULL,
  año YEAR NOT NULL,
  monto_social DECIMAL(10,2) NOT NULL,
  monto_clases DECIMAL(10,2) NOT NULL,
  monto_total DECIMAL(10,2) AS (monto_social + monto_clases) STORED,
  monto_pagado DECIMAL(10,2) NOT NULL DEFAULT 0,
  saldo DECIMAL(10,2) AS (monto_total - monto_pagado) STORED,
  estado ENUM('pendiente','parcial','pagada') NOT NULL DEFAULT 'pendiente',
  fecha_generacion DATE NOT NULL,
  UNIQUE KEY(apoderado_id, mes, año),
  FOREIGN KEY (apoderado_id) REFERENCES apoderados(id)
);

-- detalle de cada factura por coach
CREATE TABLE facturas_coach (
  id INT AUTO_INCREMENT PRIMARY KEY,
  factura_id INT NOT NULL,
  coach_id INT NOT NULL,
  monto_clases DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (factura_id) REFERENCES facturas(id) ON DELETE CASCADE,
  FOREIGN KEY (coach_id) REFERENCES coaches(id) ON DELETE CASCADE
);

-- insertar coaches iniciales
INSERT INTO coaches (nombre) VALUES ('Freeskating'), ('Danza & Flex');
