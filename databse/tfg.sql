-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2024 a las 00:01:59
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tfg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas_producto`
--

CREATE TABLE `caracteristicas_producto` (
  `id` int(11) NOT NULL,
  `producto_codigo` varchar(255) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` varchar(2000) DEFAULT NULL,
  `descripcion2` varchar(2000) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caracteristicas_producto`
--

INSERT INTO `caracteristicas_producto` (`id`, `producto_codigo`, `titulo`, `descripcion`, `descripcion2`, `rating`) VALUES
(1, 'CD1', 'Caja de dados', 'Mantén tu set de dados de los Mugiwara seguro y organizado con nuestra exclusiva caja de dados heptagonal, diseñada para guardar hasta 10 dados. Fabricada con precisión mediante impresión 3D, esta caja combina funcionalidad y estilo, ideal para cualquier fan de One Piece. Cada compartimento está pensado para proteger tus dados y facilitar su acceso durante tus sesiones de juego.', 'Capacidad: Almacena hasta 10 dados estándar.\nDiseño Heptagonal: Un diseño único que destaca entre las opciones tradicionales, proporcionando un toque especial y distintivo.\nMaterial de Calidad: Impresa en 3D con materiales duraderos y resistentes.\nPersonalización Mugiwara: Decorada con los símbolos y emblemas de la tripulación de los Sombrero de Paja, esta caja es perfecta para cualquier seguidor de Luffy y su equipo.\nCon esta caja, no solo tendrás un accesorio práctico, sino también una pieza de colección que refleja tu pasión por One Piece. ¡Añádela a tu inventario y lleva a los Mugiwara contigo a cada aventura!', '5'),
(2, 'CM1', 'Deckbox Gecko Moria', 'Organiza y protege tus cartas del One Piece Trading Card Game con nuestra exclusiva deckbox inspirada en Gecko Moria. Diseñada específicamente para los fanáticos de One Piece, esta deckbox impresa en 3D no solo ofrece funcionalidad, sino también un diseño temático que resalta tu pasión por la serie.', 'Capacidad: Almacena hasta 50 cartas estándar y 10 cartas de dones, manteniéndolas seguras y en perfecto estado.\nCompartimento para el Líder: Destaca a tu carta de líder con un compartimento especial en la parte frontal, diseñado para ensalzar y proteger a tu líder durante las partidas.\nDiseño Temático de Gecko Moria: Inspirado en el icónico personaje de One Piece, Gecko Moria, esta deckbox presenta detalles únicos que capturan la esencia del maestro de las sombras.\nImpresión 3D de Alta Calidad: Fabricada con materiales resistentes y duraderos, garantizando una larga vida útil y protección superior para tus cartas.\nCon esta deckbox, no solo tendrás un accesorio práctico para tus partidas, sino también una pieza de colección que refleja tu afición por One Piece y su fascinante universo. Lleva a Gecko Moria contigo y domina el campo de batalla con estilo.', '4'),
(3, 'CP1', 'Deckbox de Perona', '¡Prepárate para adentrarte en el encantador reino de Perona con nuestra exclusiva deckbox inspirada en la amada fantasma de One Piece! Diseñada para los jugadores que desean un toque de carisma y misterio en sus partidas, esta deckbox impresa en 3D es mucho más que un simple accesorio de almacenamiento.', 'Capacidad Espeluznante: Guarde hasta 50 cartas estándar y 10 cartas de dones en el interior, mientras que un compartimento oculto en la parte inferior permite guardar tus dados con facilidad. Permite a Perona proteger tus preciadas posesiones mientras lanzas hechizos y conjuros en tus partidas.\r\nLíder Fantasmal: La parte frontal de la deckbox presenta un nicho especial para destacar a tu carta de líder, como una morada para la mismísima Perona. Haz que tu líder brille con elegancia y estilo, como un auténtico espíritu en su propio reino.\r\nDiseño Encantador de Perona: Inspirado en la adorable pero traviesa Perona, esta deckbox está adornada con detalles que reflejan su peculiar estilo y personalidad. Desde sus sombreros fantasmas hasta sus adorables ojos lágrima, cada aspecto de esta deckbox te transportará al mundo de Perona.\r\nImpresión 3D de Calidad Espectral: Fabricada con materiales de alta calidad y duraderos, esta deckbox asegura una protección óptima para tus cartas y dados, mientras que su diseño intrincado y elegante la convierte en una pieza digna de exhibir.\r\nCon la Deckbox de Perona, tus partidas nunca volverán a ser las mismas. Únete a la diversión, al carisma y al misterio, y deja que Perona te guíe en cada paso del camino.', '3'),
(4, 'CY1', 'Deckbox de Yamato', '¡Embárcate en una aventura épica junto a Yamato con nuestra exclusiva deckbox inspirada en el valiente y decidido guerrero de One Piece! Diseñada para aquellos que buscan un compañero confiable en sus partidas, esta deckbox impresa en 3D no solo ofrece funcionalidad, sino también un toque de carisma y emoción.', 'Capacidad Aventurera: Guarda hasta 50 cartas estándar y 10 cartas de dones en su interior, mientras que un compartimento adicional en la parte inferior te permite llevar contigo tus dados para lanzarlos en cada desafío. Yamato protege tus cartas y te acompaña en cada paso de tu viaje hacia la victoria.\r\nLíder Valiente: La deckbox presenta un espacio especial en la parte frontal para resaltar a tu carta de líder, como un escenario para el heroísmo de Yamato. Haz que tu líder destaque con orgullo y determinación, reflejando la fuerza y el coraje del guerrero que todos admiran.\r\nDiseño Aventurero de Yamato: Inspirada en la valentía y la determinación de Yamato, esta deckbox está decorada con detalles que capturan su espíritu aventurero y su carisma magnético. Desde sus ropajes distintivos hasta su mirada decidida, cada aspecto de esta deckbox te transportará a los campos de batalla de One Piece.\r\nImpresión 3D de Calidad Heroica: Fabricada con materiales resistentes y duraderos, esta deckbox garantiza la máxima protección para tus cartas y dados, mientras que su diseño elegante y dinámico la convierte en una pieza imprescindible para cualquier jugador de One Piece TCG.\r\nCon la Deckbox  de Yamato, tus partidas cobrarán vida con la emoción y el espíritu de la aventura. Únete a Yamato en su búsqueda de libertad y justicia, y deja que su coraje te inspire en cada jugada.', '2'),
(6, 'CDF1', 'Deckbox de Doflamingo', '¡Sumérgete en el mundo de la intriga y la ambición con nuestra exclusiva deckbox inspirada en el implacable y carismático Doflamingo, el Señor de los Hilos! Esta deckbox, meticulosamente elaborada con impresión 3D, es mucho más que un simple contenedor para tus cartas; es una declaración de poder y determinación para cualquier aspirante a conquistador.', 'Capacidad para el Dominio: Guarda hasta 50 cartas estándar y 10 cartas de dones en el interior de esta deckbox, mientras que un compartimento secreto en la base te permite mantener tus dados a salvo y ocultos, listos para ser desplegados en tu próxima jugada maestra.\r\nResalta a tu Líder Supremo: En el frente de la deckbox, un espacio dedicado permite que tu carta de líder brille con la misma arrogancia y magnificencia que el propio Doflamingo. Haz que tu líder se alce por encima de los demás, demostrando tu habilidad para manipular y controlar el campo de batalla.\r\nDiseño Imponente del Señor de los Hilos: Inspirada en la presencia imponente y la astucia de Doflamingo, esta deckbox está adornada con detalles que evocan su aura de dominio y su estilo extravagante. Desde sus ropajes ornamentados hasta su mirada penetrante, cada aspecto de esta deckbox te transporta al mundo de la alta sociedad y la conspiración.\r\nImpresión 3D de Calidad Superior: Fabricada con materiales de primera calidad y una precisión de impresión excepcional, esta deckbox garantiza una protección impenetrable para tus cartas y dados, mientras que su diseño sofisticado y amenazante la convierte en una pieza digna de un verdadero rey pirata.', '5'),
(7, 'CRE1', 'Deckbox de Reijuu', 'Adéntrate en el mundo de la elegancia y el veneno con nuestra exclusiva deckbox inspirada en la enigmática y poderosa Reiju, la Princesa Germa 66. Esta deckbox, meticulosamente elaborada con impresión 3D, no solo es un contenedor para tus cartas, sino una declaración de estilo y misterio que no pasará desapercibida en tus partidas.', 'Capacidad para la Elegancia: Almacena hasta 50 cartas estándar y 10 cartas de dones en el interior de esta deckbox, con un compartimento secreto en la base diseñado para guardar tus dados con seguridad y estilo. Reiju protege tus cartas con la misma gracia y astucia que utiliza para maniobrar en los pasillos del poder.\r\nDestaca a tu Líder Real: En el frente de la deckbox, un espacio reservado permite que tu carta de líder brille con la misma majestuosidad y encanto que Reiju. Haz que tu líder se destaque como una verdadera realeza, mostrando tu dominio en cada movimiento estratégico.\r\nDiseño Elegante de la Princesa Germa: Inspirada en la belleza letal y la sofisticación de Reiju, esta deckbox está adornada con detalles que evocan su aura de intriga y poder. Desde sus detalles de armadura hasta su mirada cautivadora, cada aspecto de esta deckbox te transporta al mundo de la nobleza y el peligro.\r\nImpresión 3D de Calidad Superior: Fabricada con materiales de primera calidad y una precisión de impresión excepcional, esta deckbox ofrece una protección impecable para tus cartas y dados, mientras que su diseño elegante y distinguido la convierte en una pieza de colección digna de admirar.\r\nCon la Deckbox de Reiju: Elegancia Venenosa, tus partidas adquieren un toque de sofisticación y misterio digno de una verdadera princesa. Únete al juego con estilo y clase, y deja que Reiju te guíe hacia la victoria con su astucia y gracia sin igual.', '5'),
(8, 'CEX1', 'Deckbox para el Exploding Kittens Ultimate Edition', '¡Prepárate para una experiencia felinamente explosiva con nuestra exclusiva caja diseñada para el juego Exploding Kittens Ultimate Edition! Con capacidad para más de 100 cartas, esta caja ancha y espaciosa es la solución perfecta para organizar y transportar tu colección completa de cartas explosivas.', 'Capacidad Expandible: Guarda y protege más de 100 cartas en el interior de esta caja, proporcionando espacio más que suficiente para tu colección completa de Exploding Kittens y todas sus expansiones. ¡Nunca te quedes sin espacio para tus cartas favoritas y las sorpresas que traen consigo!\r\nDiseño Estallido Felino: Inspirada en el caos hilarante y la diversión explosiva de Exploding Kittens, esta caja está adornada con detalles que capturan la esencia del juego. Desde los gatos traviesos hasta las explosiones coloridas, cada aspecto de esta caja te sumerge en el mundo cómico y emocionante del juego.\r\nAnchura Espaciosa: A diferencia de las cajas estándar, esta caja tiene una anchura adicional para acomodar fácilmente las cartas grandes y abultadas de la Ultimate Edition, sin sacrificar la protección o la organización. ¡Tus cartas estarán seguras y listas para jugar en cualquier momento!\r\nConstrucción Duradera: Fabricada con materiales resistentes y duraderos, esta caja garantiza una protección óptima para tus cartas contra golpes, caídas y explosiones repentinas. ¡Lleva tu colección a donde quieras y disfruta de la diversión felina sin preocupaciones!', '5'),
(9, 'LLD1', 'LLavero Default', 'Es un llavero, no lo menosprecies.', '', '100000'),
(10, 'CCK1', 'Deckbox de Captain Kid', '¡Embárcate en una odisea pirata llena de emoción y desafíos con nuestra exclusiva deckbox inspirada en el intrépido y carismático Capitán Kid! Esta pieza de coleccionista, hecha con impresión 3D, está diseñada para cautivar a los corazones de los verdaderos amantes de One Piece, ofreciendo mucho más que un simple contenedor para tus cartas.', 'Capacidad del Tesoro Pirata: Con espacio para guardar hasta 50 cartas estándar y 10 cartas de dones, esta deckbox está lista para resguardar tus preciadas posesiones mientras navegas por los mares turbulentos del One Piece TCG. Además, un compartimento secreto en la parte inferior te permite ocultar tus dados, listos para lanzar en cada enfrentamiento.\r\nDestaca tu Líder Pirata: En el frente de la deckbox, un espacio reservado permite que tu carta de líder brille con la misma audacia y carisma que el propio Capitán Kid. ¡Haz que tu líder sea el centro de atención en cada partida, demostrando tu determinación para conquistar los mares y convertirte en el rey pirata!\r\nDiseño Emblemático del Capitán Kid: Inspirada en la icónica presencia del Capitán Kid, esta deckbox está adornada con detalles que capturan su esencia rebelde y su aura de misterio. Desde sus cicatrices de batalla hasta su mirada desafiante, cada aspecto de esta deckbox te transporta al mundo de la piratería y la aventura.\r\nImpresión 3D de Calidad Legendario: Fabricada con materiales de primera calidad y una precisión de impresión excepcional, esta deckbox garantiza una protección óptima para tus cartas y dados, mientras que su diseño único y llamativo la convierte en una verdadera joya para exhibir en tu colección.', '5'),
(11, 'GDM1', 'Set de dados de los Mugiwara', '¡Embárcate en una emocionante aventura pirata con nuestro set de dados temáticos de los 10 Mugiwara! Este set incluye 10 dados únicos, cada uno representando a un miembro diferente de la icónica tripulación. ¡Lleva contigo el espíritu de One Piece en cada lanzamiento y crea tus propias leyendas piratas con este set imprescindible para los fans!', NULL, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `hex` varchar(10) DEFAULT NULL,
  `disponible` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `nombre`, `hex`, `disponible`) VALUES
(1, 'Rojo', '#FF0000', 1),
(2, 'Verde', '#00FF00', 1),
(3, 'Azul', '#0000FF', 0),
(4, 'Amarillo', '#FFFF00', 1),
(5, 'Negro', '#000000', 1),
(6, 'Blanco', '#FFFFFF', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `producto_codigo` varchar(255) DEFAULT NULL,
  `ruta_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `producto_codigo`, `ruta_imagen`) VALUES
(1, 'CM1', '../assets/Productos/MoriaCage/Moria_Preview.jpg\n'),
(2, 'CM1', '../assets/Productos/MoriaCage/Moria_Front.jpg'),
(3, 'CM1', '../assets/Productos/MoriaCage/Moria_Lat.jpg'),
(4, 'CM1', '../assets/Productos/MoriaCage/Moria_Lat1.jpg'),
(5, 'CM1', '../assets/Productos/MoriaCage/Moria_Back.jpg'),
(6, 'CD1', '../assets/productos/CajaDados/Preview.jpg'),
(7, 'CD1', '../assets/productos/CajaDados/Preview2.jpg'),
(8, 'CD1', '../assets/productos/CajaDados/Preview3.jpg'),
(9, 'GCK', '../assets/productos/CarrotKnife/Preview.jpg'),
(10, 'GDM1', '../assets/productos/DadosMugiwara/Front.jpg'),
(11, 'GDM1', '../assets/productos/DadosMugiwara/Preview.jpg'),
(12, 'CDF1', '../assets/productos/DoflamingoCage/Preview.jpg'),
(13, 'CDF1', '../assets/productos/DoflamingoCage/Front.jpg'),
(14, 'CDF1', '../assets/productos/DoflamingoCage/LAt.jpg'),
(15, 'CDF1', '../assets/productos/DoflamingoCage/Lat1.jpg'),
(16, 'CDF1', '../assets/productos/DoflamingoCage/Back.jpg'),
(17, 'CDF1', '../assets/productos/DoflamingoCage/Top.jpg'),
(18, 'CEX1', '../assets/productos/ExplodingCage/Preview.jpg'),
(19, 'CEX1', '../assets/productos/ExplodingCage/Front.jpg'),
(20, 'CEX1', '../assets/productos/ExplodingCage/Lat.jpg'),
(21, 'CEX1', '../assets/productos/ExplodingCage/Lat1.jpg'),
(22, 'CEX1', '../assets/productos/ExplodingCage/Back.jpg'),
(23, 'CEX1', '../assets/productos/ExplodingCage/Top.jpg'),
(24, 'CCK1', '../assets/productos/KidCage/Preview.jpg'),
(25, 'CCK1', '../assets/productos/KidCage/Front.jpg'),
(26, 'CCK1', '../assets/productos/KidCage/Lat.jpg'),
(27, 'CCK1', '../assets/productos/KidCage/Lat1.jpg'),
(28, 'CCK1', '../assets/productos/KidCage/Back.jpg'),
(29, 'CCK1', '../assets/productos/KidCage/Top.jpg'),
(30, 'LLD1', '../assets/productos/LlaveroDefault/Preview.jpg'),
(31, 'CP1', '../assets/productos/PeronaCage/Preview.jpg'),
(32, 'CP1', '../assets/productos/PeronaCage/Front.jpg'),
(33, 'CP1', '../assets/productos/PeronaCage/Lat.jpg'),
(34, 'CP1', '../assets/productos/PeronaCage/Lat1.jpg'),
(35, 'CP1', '../assets/productos/PeronaCage/Back.jpg'),
(36, 'CRE1', '../assets/productos/ReijuuCage/Preview.jpg'),
(37, 'CRE1', '../assets/productos/ReijuuCage/Front.jpg'),
(38, 'CRE1', '../assets/productos/ReijuuCage/Lat.jpg'),
(39, 'CRE1', '../assets/productos/ReijuuCage/Lat1.jpg'),
(40, 'CRE1', '../assets/productos/ReijuuCage/Back.jpg'),
(41, 'CY1', '../assets/productos/YamatoCage/Preview.jpg'),
(42, 'CY1', '../assets/productos/YamatoCage/Front.jpg'),
(43, 'CY1', '../assets/productos/YamatoCage/Lat.jpg'),
(44, 'CY1', '../assets/productos/YamatoCage/Lat1.jpg'),
(45, 'CY1', '../assets/productos/YamatoCage/Back.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `precio_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo`, `nombre`, `precio`, `imagen`) VALUES
(1, 'CM1', 'Caja de Gecko Moria', '50.00', '../assets/Productos/MoriaCage/Moria_Front.jpg'),
(2, 'CY1', 'Caja de Yamato', '31.00', '../assets/Productos/YamatoCage/preview.jpg'),
(3, 'CP1', 'Caja de Perona', '32.00', '../assets/Productos/PeronaCage/preview.jpg'),
(4, 'CD1', 'Caja de Dados', '33.00', '../assets/Productos/CajaDados/preview2.jpg'),
(5, 'CDF1', 'Caja de Doflamingo', '30.00', '../assets/productos/DoflamingoCage/Preview.jpg'),
(6, 'CCK1', 'Caja de Captain Kid', '30.00', '../assets/productos/KidCage/Preview.jpg'),
(7, 'CRE1', 'Caja de Reijuu', '30.00', '../assets/productos/ReijuuCage/Preview.jpg'),
(8, 'CEX1', 'Caja del Exploding  Kittens', '35.00', '../assets/productos/ExplodingCage/Preview.jpg'),
(9, 'GCK', 'Carrot Knife', '5.00', '../assets/productos/CarrotKnife/Preview.jpg'),
(10, 'LLD1', 'Llavero', '2.00', '../assets/productos/LlaveroDefault/Preview.jpg'),
(12, 'GDM1', 'Set de dados Mugiwara', '10.00', '../assets/productos/DadosMugiwara/Preview.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(250) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `correo`, `contraseña`, `telefono`, `direccion`, `nombre`, `apellidos`, `region`, `codigo_postal`, `ciudad`) VALUES
(1, 'usuario_prueba@example.com', '1234', '659997641', 'calle armas n11', 'Nombre Prueba', 'Apellidos Prueba', 'Madrid', '28048', 'Madrid'),
(2, 'usuario@correo.com', '$2y$10$xt2IeG8cBHjC2KCATumqquQ1YRqwYQesaTKxkQTHRO/6zqOUVOblO', NULL, NULL, 'Usuario', 'Usuario', '', '0', ''),
(3, 'prueba@c.c', '1234', NULL, NULL, 'Usuario', 'Usuario', '', '', ''),
(4, 'usuario_prueba3@example.com', '$2y$10$y0kJFGilE.riPfQL9UK0b.uO6DYHpaql6UYQ4/4JPm9EQc/PC/lca', NULL, NULL, 'Usuario3', 'Usuario3', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas_producto`
--
ALTER TABLE `caracteristicas_producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_codigo` (`producto_codigo`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_codigo` (`producto_codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_2` (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas_producto`
--
ALTER TABLE `caracteristicas_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas_producto`
--
ALTER TABLE `caracteristicas_producto`
  ADD CONSTRAINT `caracteristicas_producto_ibfk_1` FOREIGN KEY (`producto_codigo`) REFERENCES `producto` (`codigo`) ON DELETE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`producto_codigo`) REFERENCES `producto` (`codigo`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
