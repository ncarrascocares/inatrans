-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2022 a las 22:15:57
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_inatrans`
--
CREATE DATABASE IF NOT EXISTS `db_inatrans` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `db_inatrans`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_licencia`
--

CREATE TABLE `categoria_licencia` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_licencia`
--

INSERT INTO `categoria_licencia` (`id`, `Nombre`) VALUES
(1, 'Transporte de pasajeros'),
(2, 'Transporte de carga'),
(3, 'Vehiculos livianos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

CREATE TABLE `licencia` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Ley` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria_licencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id`, `Nombre`, `Ley`, `Descripcion`, `categoria_licencia_id`) VALUES
(1, 'A-1', '19495', 'Transporte de personal, solo en taxis basicos o de turismo', 1),
(2, 'A-2', '19495', 'Transporte de personal, con un máximo de de 17 personas sin contar al conductor y ambulancias', 1),
(3, 'A-3', '19495', 'Transporte de personal, sin limite de asientos y ambulancias', 1),
(4, 'A-4', '19495', 'Transporte de carga, vehiculos rígidos', 2),
(5, 'A-5', '19495', 'Transporte de carga, vehiculos rígidos y articulados', 2),
(6, 'B', '0', 'Vehículos particular y 4x4', 3),
(7, 'A-1', '18290', 'Transporte de personal sin limites de asientos', 1),
(8, 'A-2', '18290', 'Transporte de carga, vehiculos rigidos y articulados', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulador`
--

CREATE TABLE `simulador` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `Tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `Nombre`) VALUES
(1, 'Antofagasta'),
(2, 'Iquique'),
(3, 'Santiago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id`, `Nombre`) VALUES
(1, 'Bus Articulado'),
(2, 'Bus Rigido'),
(3, 'Bus Rigido doble piso'),
(4, 'Cabeza Tractora'),
(5, 'Camion Articulado'),
(6, 'Camion Bi Articulado'),
(7, 'Camion Rigido'),
(8, 'Camion Rigido Bomberos'),
(9, 'Camioneta de Bomberos'),
(10, 'Todo Terreno'),
(11, 'Microbús'),
(12, 'Van');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transmision`
--

CREATE TABLE `transmision` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Categoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `transmision`
--

INSERT INTO `transmision` (`id`, `Nombre`, `Categoria`) VALUES
(1, 'PowerShift', 'Automatica'),
(2, 'Allison', 'Automatica'),
(3, 'Fuller', 'Mecanica'),
(4, 'Opticruise', 'Automatizada'),
(5, '4x4', 'Mecanica'),
(6, 'Ishift', 'Automatizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `Marca` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Modelo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_vehiculo_id` int(11) NOT NULL,
  `Transmision_id` int(11) NOT NULL,
  `categoria_licencia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `Marca`, `Modelo`, `Tipo_vehiculo_id`, `Transmision_id`, `categoria_licencia_id`) VALUES
(1, 'Scania', 'K270', 2, 4, 1),
(2, 'Mercedes Benz', 'Actros', 7, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_licencia`
--
ALTER TABLE `categoria_licencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_licencia_id` (`categoria_licencia_id`);

--
-- Indices de la tabla `simulador`
--
ALTER TABLE `simulador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sucursal_id` (`Sucursal_id`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transmision`
--
ALTER TABLE `transmision`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sucursal_id` (`Sucursal_id`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Tipo_vehiculo_id` (`Tipo_vehiculo_id`),
  ADD KEY `Transmision_id` (`Transmision_id`),
  ADD KEY `Licencia_id` (`categoria_licencia_id`),
  ADD KEY `categoria_licencia_id` (`categoria_licencia_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_licencia`
--
ALTER TABLE `categoria_licencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `simulador`
--
ALTER TABLE `simulador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `transmision`
--
ALTER TABLE `transmision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD CONSTRAINT `licencia_ibfk_1` FOREIGN KEY (`categoria_licencia_id`) REFERENCES `categoria_licencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `simulador`
--
ALTER TABLE `simulador`
  ADD CONSTRAINT `simulador_ibfk_1` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `simulador_ibfk_2` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`Transmision_id`) REFERENCES `transmision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`Tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_4` FOREIGN KEY (`categoria_licencia_id`) REFERENCES `categoria_licencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
