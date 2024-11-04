-- Tabla para auditoría de productos
CREATE TABLE log_productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    accion ENUM('INSERT', 'UPDATE', 'DELETE'),
    campo_modificado VARCHAR(50),
    valor_anterior VARCHAR(255),
    valor_nuevo VARCHAR(255),
    usuario VARCHAR(50),
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para auditoría de ventas
CREATE TABLE log_ventas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venta_id INT,
    accion ENUM('INSERT', 'UPDATE', 'DELETE'),
    estado_anterior VARCHAR(20),
    estado_nuevo VARCHAR(20),
    usuario VARCHAR(50),
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabla para historial de precios
CREATE TABLE historial_precios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    precio_anterior DECIMAL(10,2),
    precio_nuevo DECIMAL(10,2),
    fecha_cambio TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    usuario VARCHAR(50)
);

-- Tabla para control de inventario
CREATE TABLE movimientos_inventario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT,
    tipo_movimiento ENUM('ENTRADA', 'SALIDA'),
    cantidad INT,
    motivo VARCHAR(100),
    stock_anterior INT,
    stock_nuevo INT,
    fecha_movimiento TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);