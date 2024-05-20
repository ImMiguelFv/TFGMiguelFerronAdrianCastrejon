CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Esto es lo mismo que esta más arriba pero lo adjunto para que veas los cambios
-- Solo he añadido la fila de "codigo" en la tabla del xampp y luego le pones que sea unique y ya
CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Te pongo el sql por tenerlo aqui pero realmente lo hice a mano por el xampp
ALTER TABLE `producto`
  ADD UNIQUE KEY `codigo producto` (`codigo`);

  --
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);



-- Los productos que he usado de ejemplo
  INSERT INTO `producto` (`id`, `codigo`, `nombre`, `imagen`, `precio`) VALUES
(1, 'Caja Moria', 'CM1','../assets/Productos/MoiraCage/Moria_Front.jpg', 30.00),
(2, 'Caja Yamato', 'CY1', '../assets/Productos/YamatoCage/preview.jpg', 31.00),
(3, 'Caja Perona', 'CP1', '../assets/Productos/PeronaCage/preview.jpg', 32.00),
(4, 'Caja Dados', 'CD1', '../assets/Productos/CajaDados/preview2.jpg', 33.00)


-- Usuario ejemplo
INSERT INTO `usuario` (`id`, `correo`, `contraseña`, `telefono`, `direccion`, `nombre`, `apellidos`, `region`, `codigo_postal`, `ciudad`) 
VALUES ('1','usuario_prueba@example.com','1234','123123123','alli','Nombre Prueba','apellidosxd','Madri','111111','Madri')
