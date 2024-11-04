-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2024 a las 07:43:24
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
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `clave_producto` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `clave`, `clave_producto`, `ruta`) VALUES
(8, '5a47190eb50f4aadf967ea44d0ed2d210c2cc400', '1bffe5341344a9b0197f9ea567b37f535a7aa6df', 'fotos/5a47190eb50f4aadf967ea44d0ed2d210c2cc4002081.png'),
(9, '2884cf28707f6bcccbb865f83455087769b55bfd', '1bffe5341344a9b0197f9ea567b37f535a7aa6df', 'fotos/2884cf28707f6bcccbb865f83455087769b55bfd3362.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(10) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `clave`, `producto`, `cantidad`, `precio`, `categoria`, `descripcion`, `foto`) VALUES
(1, '1bffe5341344a9b0197f9ea567b37f535a7aa6df', '2', 1, 644.00, 'HOGAR', 'producto2', 'foto_producto/1bffe5341344a9b0197f9ea567b37f535a7aa6df.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
