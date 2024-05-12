-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2024 a las 17:40:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfc`
--

-- --------------------------------------------------------

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

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `dirección` varchar(255) DEFAULT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario`(`id`, `correo`, `contraseña`, `telefono`, `direccion`, `nombre`, `apellidos`, `region`, `codigo_postal`, `ciudad`) 
VALUES ('1','usuario_prueba@example.com','1234','123123123','alli','Nombre Prueba','apellidosxd','Madri','111111','Madri')

--
-- Índices para tablas volcadas
--

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




/**** AÑADIR PRODUCTOS A LA BASE DE DATOS*****/

-- Para la conexion a la base de datos tambien he cambiado el usuario root, a uno que habia creado yo porque no me funcionaba
--  estos script que te voy a adjuntar son relativos porque hay alguna cosa que he ido cambiando desde el xampp xd
--
-- IMPORTANTE: en la tabla de usuario he creado un monton de columnas
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `dirección` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Este es un usuario de prueba pa que sepa con la nueva tabla de usuarios
INSERT INTO `usuario`(`id`, `correo`, `contraseña`, `telefono`, `direccion`, `nombre`, `apellidos`, `region`, `codigo_postal`, `ciudad`) 
VALUES ('1','usuario_prueba@example.com','1234','123123123','alli','Nombre Prueba','apellidosxd','Madri','111111','Madri')



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


-- Los productos que he usado de ejemplo
  INSERT INTO `producto` (`id`, `codigo`, `nombre`, `imagen`, `precio`) VALUES
(1, 'Caja Moria', 'CM1','../assets/Productos/MoiraCage/Moria_Front.jpg', 30.00),
(2, 'Caja Yamato', 'CY1', '../assets/Productos/YamatoCage/preview.jpg', 31.00),
(3, 'Caja Perona', 'CP1', '../assets/Productos/PeronaCage/preview.jpg', 32.00),
(4, 'Caja Dados', 'CD1', '../assets/Productos/CajaDados/preview2.jpg', 33.00)



