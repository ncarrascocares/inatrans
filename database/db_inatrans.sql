-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2022 a las 22:06:14
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
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `descripcion`, `color`, `start`) VALUES
(1, 'vvv', 'vvv', '#fff111', '2022-12-02 00:00:00'),
(2, 'xxx', 'xxx', '#fff111', '2022-12-02 00:00:00'),
(3, 'bbb', 'bbb', '#fff111', '2022-12-02 00:00:00'),
(4, 'wwwww', 'wwwww', '#fff111', '2022-12-02 00:00:00'),
(5, 'wwwww', 'wwwww', '#fff111', '2022-12-02 00:00:00'),
(6, 'wwwww', 'wwwww', '#fff111', '2022-12-02 00:00:00'),
(7, 'xxx', 'xxx', '#fff111', '2022-12-02 00:00:00'),
(8, 'zzz', 'zzz', '#fff111', '2022-12-02 00:00:00'),
(9, 'nn', 'nn', '#fff111', '2022-12-03 00:00:00'),
(10, 'ccc', 'ccc', '#fff111', '2022-12-03 00:00:00'),
(11, 'nicolas', 'nicolas', '#fff111', '2022-12-01 00:00:00'),
(12, 'Limpieza de simuladores', 'Limpiar los ordernadores de los simuladores de Antofagasta', '#fff111', '2022-11-30 00:00:00');

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
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `id_interno` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Simulador_id` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `Reporte_averia` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Reporte_solucion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Observacion` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Fecha_inicio` date DEFAULT NULL,
  `Fecha_termino` date DEFAULT NULL,
  `hh` int(11) DEFAULT NULL,
  `Estado_averia` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Uso_repuesto` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `Inventario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id`, `id_interno`, `Simulador_id`, `Usuario_id`, `Reporte_averia`, `Reporte_solucion`, `Observacion`, `Fecha_inicio`, `Fecha_termino`, `hh`, `Estado_averia`, `Uso_repuesto`, `Inventario_id`) VALUES
(2, 'SIM06-39', 1, 1, 'Volante no realiza centrado', 'Se realiza cierre de proceso y se vuelve a iniciar', NULL, '2022-11-29', '2022-11-30', 5, 'Cerrada', 'No', NULL),
(3, 'SIM01-40', 1, 1, 'Las cajas power e ishift no responden', '', 'Se solicitara apoyo a España', '2022-12-01', '0000-00-00', 0, 'Abierta', 'No', 0),
(13, 'qqqqq', 1, 1, 'qqqq', 'qqqq', 'qqqq', '2022-12-01', '2022-12-01', 1, 'cerrada', 'no', 0),
(25, 'SIM01-41', 1, 1, 'Equipo con problemas en el a/c', 'Se realiza mantenimiento en faena', 'Jaime solicita al cliente el mantenimiento del equ', '2022-11-30', '2022-12-01', 1, 'cerrada', 'No', 0),
(26, 'SIM02-01', 2, 2, 'Pedal de frenos con juego', 'Se realiza cambio de pedal', 'Pedal reemplazado necesita cambio de gomas de tope', '2022-12-08', '2022-12-08', 1, 'Cerrada', 'No', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulador`
--

CREATE TABLE `simulador` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Tipo` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `simulador`
--

INSERT INTO `simulador` (`id`, `Nombre`, `Sucursal_id`, `Tipo`, `Descripcion`, `Status`) VALUES
(1, 'Simulador 1', 1, 'Movil', 'Simulador modelo antiguo', 1),
(2, 'Simulador 2', 3, 'Fijo', 'Simulador modelo antiguo', 1),
(3, 'Simulador 3', 1, 'Movil', 'Simulador modelo antiguo', 1),
(4, 'Simulador 4', 2, 'Fijo', 'Simulador modelo antiguo', 1),
(5, 'Simulador 5', 2, 'Movil', 'Simulador modelo antiguo', 1),
(6, 'Simulador 6', 1, 'Fijo', 'Simulador nuevo modelo', 1),
(7, 'Simulador 7', 3, 'Movil', 'Simulador nuevo modelo', 1),
(8, 'Simulador 8', 2, 'Fijo', 'Simulador nuevo modelo', 1),
(9, 'Simulador 9', 1, 'Fijo', 'Simulador nuevo modelo', 1),
(10, 'Simulador 10', 3, 'Fijo', 'Simulador nuevo modelo', 1),
(11, 'Simulador 11', 1, 'Fijo', 'Simulador nuevo modelo', 1);

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
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `nombre`) VALUES
(1, 'administrador'),
(2, 'mantenedor'),
(3, 'usuario');

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
  `password` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `usuario_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `Nombre`, `Apellido`, `Correo`, `password`, `Status`, `usuario_tipo`) VALUES
(1, 'Nicolás', 'Carrasco', 'ncarrasco@correo.cl', 'ncarrasco', 1, 1),
(2, 'Maglio', 'Santana', 'msantana@inatrans.cl', 'msantana', 1, 3),
(3, 'Octavio', 'Jimenez', 'ojimenez@inatrans.cl', 'ojimenez', 1, 3),
(4, 'Fidel', 'Loyola', 'floyola@inatrans.cl', 'floyola', 1, 3),
(5, 'Gustavo', 'Saavedra', 'gsaavedra@inatrans.cl', 'gsaavedra', 1, 3),
(6, 'Juan', 'Gonzalez', 'jgonzalez@inatrans.cl', 'jgonzalez', 1, 3),
(7, 'Cesar', 'Rojas', 'crojas@inatrans.cl', 'crojas', 1, 3),
(8, 'Victor', 'Reyes', 'vreyes@inatrans.cl', 'vreyes', 1, 3),
(9, 'German', 'Martinez', 'gmartinez@inatrans.cl', 'gmartinez', 1, 3),
(10, 'Erick', 'Noack', 'enoack@inatrans.cl', 'enoack', 1, 3),
(11, 'Cristian', 'Saa', 'csaa@inatrans.cl', 'csaa', 1, 3),
(12, 'Daniel', 'Quiñones', 'dquinones@inatrans.cl', 'dquinones', 1, 3),
(13, 'Pedro', 'Cabezas', 'pcabezas@inatrans.cl', 'pcabezas', 1, 3),
(14, 'Juan', 'Gutierrez', 'jgutierrez@inatrans.cl', 'jgutierrez', 1, 3),
(15, 'Williams', 'Salinas', 'wsalinas@inatrans.cl', 'wsalinas', 1, 3),
(16, 'Javier', 'Rosales', 'jrosales@inatrans.cl', 'jrosales', 1, 3),
(17, 'Cristian', 'Acevedo', 'cacevedo@inatrans.cl', 'cacevedo', 1, 3);

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
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_licencia_id` (`categoria_licencia_id`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Simulador_id` (`Simulador_id`),
  ADD KEY `Usuario_id` (`Usuario_id`);

--
-- Indices de la tabla `simulador`
--
ALTER TABLE `simulador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Sucursal_id` (`Sucursal_id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
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
  ADD KEY `Status` (`Status`),
  ADD KEY `usuario_tipo` (`usuario_tipo`);

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
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `licencia`
--
ALTER TABLE `licencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `simulador`
--
ALTER TABLE `simulador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_Simulador_id` FOREIGN KEY (`Simulador_id`) REFERENCES `simulador` (`id`),
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `simulador`
--
ALTER TABLE `simulador`
  ADD CONSTRAINT `simulador_ibfk_1` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`usuario_tipo`) REFERENCES `tipo_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
