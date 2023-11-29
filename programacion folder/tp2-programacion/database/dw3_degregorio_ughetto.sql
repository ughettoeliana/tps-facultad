-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 08-07-2022 a las 19:45:56
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dw3_degregorio_ughetto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_has_product`
--

CREATE TABLE `category_has_product` (
  `category_id_category` int(11) NOT NULL,
  `product_id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `image_description` varchar(45) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `image`, `image_description`, `price`, `title`, `quantity`, `product_description`) VALUES
(1, NULL, NULL, '149.00', 'Grapes', NULL, 'Green grapes from Mendoza, 100% free of pesticides and made in a garden.'),
(2, NULL, NULL, '249.00', 'Apple', NULL, 'Big red apple, 100% free of pesticides and made in a garden.'),
(3, NULL, NULL, '149.00', 'Orange', NULL, 'Orange for juice, 100% free of pesticides and made in a garden.'),
(4, NULL, NULL, '249.00', 'Brocoli', NULL, 'brocoli, 100% free of pesticides and made in a garden.'),
(5, NULL, NULL, '149.00', 'Kiwi', NULL, 'kiwi, 100% free of pesticides and made in a garden.'),
(6, NULL, NULL, '249.00', 'Onion', NULL, 'Onion, 100% free of pesticides and made in a garden.'),
(7, NULL, NULL, '149.00', 'Banana', NULL, 'Banana, 100% free of pesticides and made in a garden.'),
(8, NULL, NULL, '249.00', 'Pear', NULL, 'Pear, 100% free of pesticides and made in a garden.'),
(9, NULL, NULL, '149.00', 'Tomato', NULL, 'Tomato, 100% free of pesticides and made in a garden.'),
(10, NULL, NULL, '249.00', 'Lettuce', NULL, 'Lettuce, 100% free of pesticides and made in a garden.'),
(11, NULL, NULL, '149.00', 'Carrot', NULL, 'Carrot, 100% free of pesticides and made in a garden.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `category_has_product`
--
ALTER TABLE `category_has_product`
  ADD PRIMARY KEY (`category_id_category`,`product_id_product`),
  ADD KEY `fk_category_has_product_product1_idx` (`product_id_product`),
  ADD KEY `fk_category_has_product_category1_idx` (`category_id_category`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category_has_product`
--
ALTER TABLE `category_has_product`
  ADD CONSTRAINT `fk_category_has_product_category1` FOREIGN KEY (`category_id_category`) REFERENCES `category` (`id_category`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_category_has_product_product1` FOREIGN KEY (`product_id_product`) REFERENCES `product` (`product_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
