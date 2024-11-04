-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2024 a las 19:24:16
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
-- Base de datos: `ecommercefase1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `clave_producto` varchar(200) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(3) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `estatus_envio` varchar(50) NOT NULL,
  `estatus_compra` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `nombre` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `clave`, `correo_usuario`, `clave_producto`, `producto`, `foto`, `descripcion`, `cantidad`, `precio`, `total`, `fecha`, `estatus_envio`, `estatus_compra`, `direccion`, `nombre`) VALUES
(1, '7dae346065eb71524fd89a15677a01285995412e', 'ms1540686@gmail.com', 'fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d', 'Chamarra', 'foto_producto/fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d.jpg', 'Hpc discount polo chamarras', 2, 699.00, 1398.00, '2024-10-31', '', 'AGREGADO', '', ''),
(2, 'a352511a3ae77a4ea042122d12add6d9d579c9b3', 'ms1540686@gmail.com', '27ef6e9cddd1ce31da1d23a1f15e9679e8425d73', 'Iphone', 'foto_producto/27ef6e9cddd1ce31da1d23a1f15e9679e8425d73.jpg', 'iPhone 16 -Verde Azulado - 128GB', 1, 28900.00, 28900.00, '2024-10-31', '', 'AGREGADO', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deseos`
--

CREATE TABLE `deseos` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave_producto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `deseos`
--

INSERT INTO `deseos` (`id`, `clave`, `correo`, `clave_producto`) VALUES
(1, '0ca076369ecce1ce899590977f9ff96f812d2bda', 'jorges.hernandez22@gmail.com', '1bffe5341344a9b0197f9ea567b37f535a7aa6df');

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
(2, '71e0533ddd22d22e5f4320aa01b6b3c85f1c6ee9', 'Smart TV', 8, 9000.00, 'ELECTRONICA', 'Xiaomi Tv A Pro 55\r\nMarca: Xiaomi', 'foto_producto/71e0533ddd22d22e5f4320aa01b6b3c85f1c6ee9.png'),
(3, 'fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d', 'Chamarra', 4, 699.00, 'MODA', 'Hpc discount polo chamarras', 'foto_producto/fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d.jpg'),
(4, '79301dff563643cfc4789cdcac204c82a1db9218', 'Reloj-c', 5, 800.00, 'RELOJES', 'Reloj Casio MTP-VD03B-1ACF', 'foto_producto/79301dff563643cfc4789cdcac204c82a1db9218.jpg'),
(5, '27ef6e9cddd1ce31da1d23a1f15e9679e8425d73', 'Iphone', 9, 28900.00, 'ELECTRONICA', 'iPhone 16 -Verde Azulado - 128GB', 'foto_producto/27ef6e9cddd1ce31da1d23a1f15e9679e8425d73.jpg'),
(6, '656ec7639c4b5e56e62c28311192c7f2f9b807fa', 'Collar', 3, 1500.00, 'JOYERIA', 'Collar largo Vintage de cristal azul para mujer', 'foto_producto/656ec7639c4b5e56e62c28311192c7f2f9b807fa.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(10) NOT NULL,
  `clave_producto` varchar(100) NOT NULL,
  `clave_user` varchar(100) NOT NULL,
  `foto` text NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rating`
--

INSERT INTO `rating` (`id`, `clave_producto`, `clave_user`, `foto`, `fecha`, `comentario`, `usuario`, `rating`) VALUES
(3, 'fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d', 'c5e1ed88cdd0f72713fc219590647e6de8d0f45e', 'https://lh3.googleusercontent.com/a/ACg8ocLEnr9U_elHEe9EX0HyjsDxvDACoh7jfoKcL9AVoy5_6W3AVw=s96-c', '2024-10-31', 'saludos', 'Santos Reyes Jos&eacute; Manuel', 4),
(4, 'fe5cb776065ba4a55c4ccb55f9d9e74cf6619d0d', '48a90309a329f491fd789526e239396059203054', 'https://lh3.googleusercontent.com/a/ACg8ocKen6KGnDbgRR94Hx4fTX-xU42FCV82H8YGhMuTjiOhMe1QEA=s96-c', '2024-10-31', 'excelente calidad', 'Manuel Santos', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `clave`, `nombre`, `correo`, `foto`) VALUES
(1, '40b06b304eb51cfe5514cf9819de378c2bc60e72', 'Jorge Sinai Hern&aacute;ndez Francisco', 'jorges.hernandez22@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocICV451W6i0UDx1qo_dy1JhO0-O4UOjKsBdzAMg3vHCS8Lwpg=s96-c'),
(2, 'c5e1ed88cdd0f72713fc219590647e6de8d0f45e', 'Santos Reyes Jos&eacute; Manuel', 'manuel.santos260303@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocLEnr9U_elHEe9EX0HyjsDxvDACoh7jfoKcL9AVoy5_6W3AVw=s96-c'),
(3, '48a90309a329f491fd789526e239396059203054', 'Manuel Santos', 'ms1540686@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocKen6KGnDbgRR94Hx4fTX-xU42FCV82H8YGhMuTjiOhMe1QEA=s96-c');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`);

--
-- Indices de la tabla `deseos`
--
ALTER TABLE `deseos`
  ADD PRIMARY KEY (`id`);

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
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clave` (`clave`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `deseos`
--
ALTER TABLE `deseos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
