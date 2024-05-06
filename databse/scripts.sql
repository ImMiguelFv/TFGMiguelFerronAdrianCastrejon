-- Tabla de usuarios
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,             -- Identificador único del usuario
  `correo` varchar(255) NOT NULL,    -- Correo electrónico del usuario
  `contraseña` varchar(255) NOT NULL,-- Contraseña del usuario
  `telefono` varchar(20) DEFAULT NULL,-- Número de teléfono del usuario
  `dirección` varchar(255) DEFAULT NULL,-- Dirección del usuario
  `Nombre` varchar(255) NOT NULL,    -- Nombre del usuario
  `Apellidos` varchar(255) NOT NULL, -- Apellidos del usuario
  PRIMARY KEY (`id`)                  -- Clave primaria
);

-- Tabla de productos
CREATE TABLE `producto` (
  `id` int(11) NOT NULL,             -- Identificador único del producto
  `nombre` varchar(255) NOT NULL,    -- Nombre del producto
  `precio` decimal(10,2) NOT NULL,   -- Precio del producto
  PRIMARY KEY (`id`)                  -- Clave primaria
);

-- Tabla de pedidos
CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,             -- Identificador único del pedido
  `usuario_id` int(11) NOT NULL,     -- ID del usuario que realizó el pedido
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, -- Fecha del pedido
  `precio_total` decimal(10,2) NOT NULL,-- Precio total del pedido
  PRIMARY KEY (`id`),                 -- Clave primaria
  FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) -- Clave foránea que referencia al usuario
);

-- Tabla de detalles del pedido
CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,             -- Identificador único del detalle del pedido
  `pedido_id` int(11) NOT NULL,      -- ID del pedido al que pertenece este detalle
  `producto_id` int(11) NOT NULL,    -- ID del producto en este detalle
  `cantidad` int(11) NOT NULL,       -- Cantidad del producto en este detalle
  PRIMARY KEY (`id`),                 -- Clave primaria
  FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),    -- Clave foránea que referencia al pedido
  FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) -- Clave foránea que referencia al producto
);

-- Inserción de un usuario de prueba
INSERT INTO `usuario` (`id`, `correo`, `contraseña`, `dirección`, `Nombre`, `Apellidos`, `telefono`) VALUES
(1, 'usuario_prueba@example.com', '1234', NULL, 'Nombre Prueba', 'Apellidos Prueba', NULL);
