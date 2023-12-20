-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-12-2023 a las 19:41:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce_igniter`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `image`) VALUES
(1, 'Ezequiel bonino', 'admin@gmail.com', '$2y$10$WwJVtv8yv9Krq0Yvu.oY3.D/CLs.qZIe//KbEryREhq0pZsOgNTxa', 'admin/profile_image/admin-profile-image-id-1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `full_name` varchar(70) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(120) NOT NULL,
  `dni` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `full_name`, `image`, `email`, `password`, `dni`) VALUES
(8, 'juan', NULL, 'juan22@gmail.com', '$2y$10$aKS2OYrzRCNl5PoQsUao.uK3zXD4e5TYEzySXc46c7EjR6nSXwdH6', '123'),
(15, 'ezequieldbo25@gmail.com', NULL, 'ezequieldbo24@gmail.com', '123456', '12678318'),
(16, 'nuevo', NULL, 'nuevo@gmail.com', '123456', '11111'),
(17, '222', NULL, 'ezequieldbo225@gmail.com', '12345622', '126783182'),
(18, 'Mirta', 'clients/client-image.png', 'mirta@gmail.com', '123456', '111.111.11'),
(19, 'juansito', NULL, 'ezequieldbo19@gmail.com', '123456', '45.555.442'),
(20, 'alan', NULL, 'alan@gmail.com', '123456', '15.555.666'),
(21, 'eze', NULL, 'eze222@gmail.com', '123456', '35.855.666'),
(22, 'eze45', NULL, 'ezequieldbo35@gmail.com', '123456', '12678316'),
(23, 'pedro', NULL, 'ezequieldbo77@gmail.com', '123456', '45.122.666'),
(24, 'alejandro', NULL, 'alejandro@gmail.com', '123456', '454545'),
(25, 'Pietro Carlos', NULL, 'ezequieldbo44@gmail.com', '123456', '45.555.414'),
(26, 'cliente nuevo', NULL, 'clientenuevo@gmail.com', '123456', '1111144'),
(27, 'aka', NULL, 'aka@gmail.com', '123456', '44455566'),
(28, 'Lola Fernandez', NULL, 'lola@gmail.com', '$2y$10$ejmh83NrFo6GA4npn67Rp.6dL0uVk9svn.lKYn4g21QdLUCDVU7I.', '454986'),
(29, 'Lola Bonino', NULL, 'lola2@gmail.com', '$2y$10$2RemwmOfQlKWnnHbPRcx2eyqwCnNgkS3HNZLtAV0eCjDYdPbb90ey', '4477');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `stock`, `price`) VALUES
(21, 'AURICULARES GAMING TRUST BLIZZ GXT 450 7.1 RGB', 'asas', 'products/auriculares-gaming-gxt-322-carus-trust-0.jpg', 22, 22),
(22, 'Procesador AMD Ryzen 9 5900X AM4', '', 'products/100-100000909WOF.png', 10, 474),
(23, 'SILLA GAMER GAMING CHAIR IN7126 BLACK/RED', 'este e sun product', 'products/silla-gamer-gaming.jpg', 45, 45),
(24, 'MEMORIA 4GB DDR3 1600 MARKVISION', 'aaa', 'products/memoria-4gb-ddr3-1600-markvision-0.jpg', 45, 45),
(25, 'DISCO HDD 1TB WD BLUE SATA III 3.5\"', '222', 'products/disco-hdd-1tb-wd-blue-sata-iii-35-0.jpg', 45, 22),
(26, 'HD HDD 2TB WD PURPLE SATA III 3.5\"', 'aa', 'products/hd-hdd-2tb-wd-purple-sata-iii-35-0.jpg', 45, 45),
(27, 'MOTHER BIOSTAR B450M H DDR4 AM4', 'qwqw', 'products/mother-biostar-b450m-h-ddr4-am4-0.jpg', 22, 22),
(28, 'MOTHER ASUS PRIME A320M-K DDR4 AM4', 'asas', 'products/mother-asus-prime-a320mk-ddr4-am4-0.jpg', 22, 22),
(29, 'NOTEBOOK NSX 14\" EPSILON CLOUD N3350 4GB 64GB FREE', '22', 'products/notebook-nsx-14-epsilon-cloud-n3350-4gb-64gb-free-0.jpg', 22, 22),
(30, 'PC ARMADA AMD RYZEN 5 5600G+B550+8GB+240GB', '232', 'products/pc-armada-amd-ryzen-5-5600gb5508gb240gb-0.jpg', 23, 23),
(31, 'GABINETE NAXIDO F300 NEGRO COOLER BLUE S/FUENTE', 'we', 'products/gabinete-naxido-f300-negro-cooler-blue-sfuente-0.jpg', 22, 22),
(32, 'GABINETE THERMALTAKE H200 TG BLACK RGB', '22', 'products/gabinete-thermaltake-h200-tg-black-rgb-0.jpg', 22, 22),
(33, 'VIDEO GEFORCE GT 730 2GB ASUS GDDR5', '22', 'products/video-geforce-gt-730-2gb-asus-gddr5-0.jpg', 22, 22),
(34, '22', '22', NULL, 22, 22),
(35, 'ww', 'ww', NULL, 22, 22),
(36, '22', '22', NULL, 22, 22),
(37, '22', '22', NULL, 22, 22),
(38, '22', '22', NULL, 22, 22),
(39, '22', '22', NULL, 22, 22),
(40, '22', '22', NULL, 22, 22),
(41, '22', '22', NULL, 22, 22),
(42, '22', '22', NULL, 22, 22),
(43, '22', '22', NULL, 22, 22),
(44, '22', '22', NULL, 22, 22),
(45, '22', '22', NULL, 22, 22),
(46, '22', '22', NULL, 22, 22),
(47, '22', '22', NULL, 22, 22),
(48, '22', '22', NULL, 22, 22),
(49, '22', '22', NULL, 22, 22),
(50, '22', '22', NULL, 22, 22),
(51, '2', '22', NULL, 22, 22),
(52, 'ww', 'ww', NULL, 22, 22),
(53, '22', '22', NULL, 22, 22),
(54, '22', '22', NULL, 22, 22),
(55, '22', '22', NULL, 22, 22),
(56, '22', '22', NULL, 22, 22),
(57, 'ww', 'ww', NULL, 22, 22),
(58, 'ww', 'ww', 'products/ignaiter-image-project7.png', 22, 22),
(59, '2', '2', NULL, 2, 2),
(60, 'ww', 'ww', NULL, 22, 22),
(61, 'ww', 'ww', NULL, 2, 2),
(64, 'www', 'ww', NULL, 22, 22),
(65, 'asas', 'asas', NULL, 44, 11),
(66, '22', 'asas', NULL, 44, 44);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopping_car`
--

CREATE TABLE `shopping_car` (
  `client_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `shopping_car`
--

INSERT INTO `shopping_car` (`client_id`, `product_id`, `product_amount`) VALUES
(8, 25, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shopping_car`
--
ALTER TABLE `shopping_car`
  ADD KEY `client_id` (`client_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `shopping_car`
--
ALTER TABLE `shopping_car`
  ADD CONSTRAINT `shopping_car_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_car_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
