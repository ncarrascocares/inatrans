-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2023 a las 21:32:26
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
-- Estructura de tabla para la tabla `averia`
--

DROP TABLE IF EXISTS `averia`;
CREATE TABLE IF NOT EXISTS `averia` (
  `id_averia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_averia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_averia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `averia`
--

INSERT INTO `averia` (`id_averia`, `Nombre_averia`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Electrico'),
(4, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_categoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `Nombre_categoria`) VALUES
(1, 'Leve'),
(2, 'Grave'),
(3, 'Critico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_licencia`
--

DROP TABLE IF EXISTS `categoria_licencia`;
CREATE TABLE IF NOT EXISTS `categoria_licencia` (
  `id_categoria_licencia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_categoria_licencia` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_categoria_licencia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `categoria_licencia`
--

INSERT INTO `categoria_licencia` (`id_categoria_licencia`, `Nombre_categoria_licencia`) VALUES
(1, 'Transporte de pasajeros'),
(2, 'Transporte de carga'),
(3, 'Vehiculos livianos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id_eventos` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `start` datetime NOT NULL,
  PRIMARY KEY (`id_eventos`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `title`, `descripcion`, `color`, `start`) VALUES
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
(12, 'Limpieza de simuladores', 'Limpiar los ordernadores de los simuladores de Antofagasta', '#fff111', '2022-11-30 00:00:00'),
(13, 'Revisión simulador 5', 'Revisión de los potenciometros del simulador', '#fff111', '2022-12-31 00:00:00'),
(14, 'www', 'www', '#fff111', '2023-01-07 00:00:00'),
(15, 'qqq', 'qqq', '#fff111', '2023-01-08 00:00:00'),
(16, 'wwww', 'wwww', '#fff111', '2023-01-15 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_reporte`
--

DROP TABLE IF EXISTS `historial_reporte`;
CREATE TABLE IF NOT EXISTS `historial_reporte` (
  `id_historial_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_id` int(11) NOT NULL,
  `Reporte_id` int(11) NOT NULL,
  `Fecha_crea_historial_reporte` datetime DEFAULT current_timestamp(),
  `Comentario_historial_reporte` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_historial_reporte`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `historial_reporte`
--

INSERT INTO `historial_reporte` (`id_historial_reporte`, `Usuario_id`, `Reporte_id`, `Fecha_crea_historial_reporte`, `Comentario_historial_reporte`) VALUES
(1, 1, 5, '2023-01-10 00:00:00', 'se cambia vastago'),
(2, 2, 5, '2023-01-11 00:00:00', 'te respondo'),
(5, 1, 5, '2023-01-14 00:00:00', 'Cierra la odt'),
(6, 2, 5, '2023-01-12 22:52:14', 'ok, lo cierro'),
(7, 1, 4, '2023-01-01 23:37:17', 'Personal de España realiza revisión del software, pero continua problema'),
(8, 1, 4, '2023-01-12 03:37:17', 'Personal de España realiza cambio del software del pc servidor, pero continua problema'),
(9, 2, 4, '2023-01-14 23:39:42', 'Se utiliza carpeta truckbus de simulador 2 para reemplazar la del simulador 3 y se soluciona el problema.'),
(10, 1, 1, '0000-00-00 00:00:00', 'aaa'),
(11, 1, 1, '2023-01-27 14:57:00', 'test'),
(12, 1, 1, '2023-01-27 14:59:19', 'test 3'),
(13, 1, 1, '2023-01-27 15:01:37', 'ssss'),
(14, 1, 1, '2023-01-27 15:02:08', 'xxxx'),
(15, 1, 2, '2023-01-27 15:04:02', 'test'),
(16, 2, 2, '2023-01-27 15:08:31', 'comentario de maglio santana'),
(17, 1, 2, '2023-01-27 15:09:42', 'respuesta de Nicolás Carrasco'),
(18, 1, 2, '2023-01-27 15:16:14', 'Se soluciona el inconveniente luego de re iniciar el ordenador izquierdo.'),
(19, 1, 6, '2023-01-30 09:32:54', 'test'),
(20, 1, 3, '2023-01-30 11:42:54', 'test'),
(21, 1, 3, '2023-01-30 11:43:00', 'Cierre de ODT'),
(22, 1, 4, '2023-01-30 11:52:03', 'Cierre de ODT'),
(23, 1, 5, '2023-01-30 11:53:58', 'Cierre de ODT'),
(24, 1, 6, '2023-01-30 12:15:09', 'Cierre de ODT'),
(25, 1, 10, '2023-01-30 12:20:59', 'otro comentario más'),
(26, 1, 10, '2023-01-30 12:21:05', 'Cierre de ODT'),
(27, 1, 7, '2023-01-30 12:22:33', 'nuevo comentario'),
(28, 1, 7, '2023-01-30 12:22:37', 'Cierre de ODT'),
(29, 1, 18, '2023-01-30 12:25:04', 'Por favor cerrar el ticket si ya fue resuelto el problema'),
(30, 1, 19, '2023-01-30 14:44:10', 'Se realiza cambio del cable y todo funciona con normalidad'),
(31, 1, 19, '2023-01-30 14:44:16', 'Cierre de ODT'),
(32, 1, 9, '2023-01-30 14:47:21', 'nuevo comentario'),
(33, 1, 9, '2023-01-30 14:47:26', 'Cierre de ODT'),
(34, 1, 11, '2023-01-30 14:48:20', 'Se solicita atención a personal de españa y se espera respuesta para mañana 31/01/2023'),
(35, 1, 23, '2023-01-30 16:41:13', 'Grabación de las rutas listas, se ealizan pruebas de funcionamiento las cuales funcionan de manera normal. '),
(36, 1, 23, '2023-01-30 16:41:18', 'Cierre de ODT'),
(37, 1, 18, '2023-01-30 16:44:47', 'Aún se encuentra abierto esta odt y al parecer ya fue resuelto. Cerrar.'),
(38, 1, 11, '2023-02-02 10:47:30', 'nuevo comentario'),
(39, 1, 16, '2023-02-02 13:08:16', 'test'),
(40, 1, 24, '2023-02-02 13:13:42', 'Se realiza revisión de los ordenadores, y estos se encontraban desconectado. Se realiza la conexión y todos encienden de manera normal. Simulador operativo.'),
(41, 1, 16, '2023-02-02 13:23:31', 'Cierre de ODT'),
(42, 1, 15, '2023-02-02 13:23:47', 'Comentario de prueba'),
(43, 1, 15, '2023-02-02 13:25:06', 'Cierre de ODT'),
(44, 1, 24, '2023-02-02 13:26:01', 'Simulador operativo'),
(45, 1, 24, '2023-02-02 13:27:02', 'Cierre de ODT'),
(46, 1, 27, '2023-02-03 17:06:18', 'Se realizar reparación del sistema de cremallera por un riel de mueble, el cual cumple con lo necesario. Ademas se realiza ajuste de pedal de frenos el cual se encontraba con sus resortes vencidos. Equipo no presenta ninguna anomalia y se entrega operativ'),
(47, 1, 27, '2023-02-03 17:06:28', 'Cierre de ODT'),
(48, 1, 11, '2023-02-06 17:00:56', 'Cierre de ODT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licencia`
--

DROP TABLE IF EXISTS `licencia`;
CREATE TABLE IF NOT EXISTS `licencia` (
  `id_licencia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Ley` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `categoria_licencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id_licencia`),
  KEY `categoria_licencia_id` (`categoria_licencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `licencia`
--

INSERT INTO `licencia` (`id_licencia`, `Nombre`, `Ley`, `Descripcion`, `categoria_licencia_id`) VALUES
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

DROP TABLE IF EXISTS `reporte`;
CREATE TABLE IF NOT EXISTS `reporte` (
  `id_reporte` int(11) NOT NULL AUTO_INCREMENT,
  `Simulador_id` int(11) NOT NULL,
  `Usuario_id` int(11) NOT NULL,
  `Instructor` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Averia_reporte` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Categoria_id` int(11) NOT NULL,
  `Clasificacion` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Fecha_crea` datetime NOT NULL,
  `Estatus_reporte` int(11) DEFAULT 1,
  `Tipo_averia_id` int(11) NOT NULL,
  PRIMARY KEY (`id_reporte`),
  KEY `fk_Simulador_id` (`Simulador_id`),
  KEY `Usuario_id` (`Usuario_id`),
  KEY `Categoria_id` (`Categoria_id`),
  KEY `Tipo_averia_id` (`Tipo_averia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reporte`
--

INSERT INTO `reporte` (`id_reporte`, `Simulador_id`, `Usuario_id`, `Instructor`, `Averia_reporte`, `Categoria_id`, `Clasificacion`, `Fecha_crea`, `Estatus_reporte`, `Tipo_averia_id`) VALUES
(1, 1, 1, '', 'Volante con desgaste test', 1, 'Correctivo', '2023-01-11 21:00:00', 0, 1),
(2, 2, 1, '', 'No arranca pc servidor', 1, 'Correctivo', '2023-01-09 00:00:00', 0, 2),
(3, 1, 1, '', 'Pantalla salpicadera quemada', 3, 'Correctivo', '2023-01-09 00:00:00', 0, 2),
(4, 3, 1, '', 'Simulador presenta problemas ruta mel', 3, 'Correctivo', '2023-01-03 00:00:00', 0, 2),
(5, 4, 1, '', 'test', 1, 'Correctivo', '2023-01-11 00:00:00', 0, 2),
(6, 6, 1, '', 'Pantalla salpicadera quemada', 1, 'Correctivo', '2023-01-11 00:00:00', 0, 1),
(7, 7, 1, '', 'Automatico electrico quemado', 3, 'Correctivo', '2023-01-11 00:00:00', 0, 3),
(8, 1, 1, '', 'test', 3, 'Correctivo', '2023-01-11 00:00:00', 0, 3),
(9, 7, 1, 'Victor espinoza', 'Chapa de arranque suelta', 1, 'Correctivo', '2023-01-23 00:00:00', 0, 2),
(10, 2, 1, 'Maglio Santana', 'Cremallera suena al realizar volanteo', 2, 'Correctivo', '2023-01-24 00:00:00', 0, 2),
(11, 3, 1, 'Sin instructor', 'Ruta MEL con problemas al grabar tramos', 3, 'Correctivo', '2023-01-24 00:00:00', 0, 1),
(12, 1, 1, 'Aaa', 'aaaa', 1, 'Correctivo', '2023-01-24 00:00:00', 1, 2),
(13, 1, 1, 'Daniel Quiñones', 'Plataforma', 1, 'Correctivo', '2023-01-24 00:00:00', 1, 3),
(14, 1, 1, 'Erick Noack', 'Volante de apoyo descalibrado', 1, 'Correctivo', '2023-01-24 00:00:00', 1, 4),
(15, 1, 1, 'Zzzz', 'zzzzz', 1, 'Correctivo', '2023-01-24 00:00:00', 0, 4),
(16, 1, 1, '', '', 1, 'Correctivo', '0000-00-00 00:00:00', 0, 1),
(17, 5, 1, 'Williams salinas', 'UPS secundaría con problemas', 1, 'Correctivo', '2023-01-23 00:00:00', 1, 3),
(18, 3, 2, 'ivan ramirez', 'malo', 1, 'Correctivo', '2023-01-24 20:32:25', 1, 4),
(19, 6, 1, 'Cristian saa', 'Cable de la cámara cortado', 1, 'Correctivo', '2023-01-24 00:00:00', 0, 4),
(20, 1, 1, 'Rrr', 'rrrr', 3, 'Correctivo', '2023-01-24 00:00:00', 1, 4),
(21, 1, 1, 'Qqq', 'qqqq', 1, 'Correctivo', '2023-01-24 00:00:00', 1, 4),
(22, 2, 11, 'Gustavo Saavedra', 'No enciende pc', 1, 'Correctivo', '2023-01-25 00:00:00', 1, 3),
(23, 10, 1, 'Maglio Santana', 'Grabación de las rutas Descenso Mel y uso de pista de emergencia.', 1, 'Correctivo', '2023-01-30 00:00:00', 0, 4),
(24, 2, 1, 'Maglio Santana', 'No enciende el simulador', 1, 'Correctivo', '2023-02-02 00:00:00', 0, 3),
(25, 11, 1, 'Sin instructor', 'Equipo sin uso', 3, 'Correctivo', '2023-02-01 00:00:00', 1, 4),
(26, 1, 1, 'Pedro Cabezas', 'Camara no funciona', 1, 'Correctivo', '2023-02-09 00:00:00', 1, 2),
(27, 2, 1, 'Gustavo Saavedra', 'Cremallera del volante suelta', 1, 'Preventivo', '2023-02-03 00:00:00', 0, 2),
(28, 1, 1, 'Maglio Santana', 'pc no enciende', 1, 'Correctivo', '0000-00-00 00:00:00', 1, 2),
(29, 1, 1, 'Maglio Santana', 'pc se apaga', 1, 'Preventivo', '2023-02-06 00:00:00', 1, 2),
(30, 1, 1, 'Gustavo Saavedra', 'Volante operativo', 1, 'Preventivo', '2023-02-06 17:30:00', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulador`
--

DROP TABLE IF EXISTS `simulador`;
CREATE TABLE IF NOT EXISTS `simulador` (
  `id_simulador` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_simulador` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `Tipo_simulador` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Descripcion_simulador` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Status_id` int(11) NOT NULL,
  PRIMARY KEY (`id_simulador`),
  KEY `Sucursal_id` (`Sucursal_id`),
  KEY `Status_id` (`Status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `simulador`
--

INSERT INTO `simulador` (`id_simulador`, `Nombre_simulador`, `Sucursal_id`, `Tipo_simulador`, `Descripcion_simulador`, `Status_id`) VALUES
(1, 'Simulador 1', 1, 'Movil', 'Simulador modelo antiguo', 2),
(2, 'Simulador 2', 3, 'Fijo', 'Simulador modelo antiguo', 1),
(3, 'Simulador 3', 1, 'Movil', 'Simulador modelo antiguo', 3),
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
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_status` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id_status`, `Nombre_status`) VALUES
(1, 'Operativo'),
(2, 'Operativo con detalles'),
(3, 'Fuera de servicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_sucursal` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id_sucursal`, `Nombre_sucursal`) VALUES
(1, 'Antofagasta'),
(2, 'Iquique'),
(3, 'Santiago');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_tipo_usuario` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `Nombre_tipo_usuario`) VALUES
(1, 'administrador'),
(2, 'mantenedor'),
(3, 'usuario'),
(4, 'Root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

DROP TABLE IF EXISTS `tipo_vehiculo`;
CREATE TABLE IF NOT EXISTS `tipo_vehiculo` (
  `id_tipo_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_vehiculo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id_tipo_vehiculo`, `Nombre`) VALUES
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

DROP TABLE IF EXISTS `transmision`;
CREATE TABLE IF NOT EXISTS `transmision` (
  `id_transmision` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Categoria` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_transmision`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `transmision`
--

INSERT INTO `transmision` (`id_transmision`, `Nombre`, `Categoria`) VALUES
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

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_us` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Apellido_us` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo_us` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Cargo_us` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Sucursal_id` int(11) NOT NULL,
  `password_us` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Status_us` int(11) DEFAULT 1,
  `usuario_tipo` int(11) DEFAULT 3,
  PRIMARY KEY (`id_usuario`),
  KEY `Status` (`Status_us`),
  KEY `usuario_tipo` (`usuario_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `Nombre_us`, `Apellido_us`, `Correo_us`, `Cargo_us`, `Sucursal_id`, `password_us`, `Status_us`, `usuario_tipo`) VALUES
(1, 'Nicolás', 'Carrasco', 'ncarrasco@correo.cl', 'Jefe Mantenimiento', 3, 'ncarrasco', 1, 4),
(2, 'Maglio', 'Santana', 'msantana@inatrans.cl', 'Evaluador', 3, 'msantana', 0, 1),
(3, 'Octavio', 'Jimenez', 'ojimenez@inatrans.cl', 'Evaluador', 3, 'ojimenez', 0, 3),
(4, 'Fidel', 'Loyola', 'floyola@inatrans.cl', 'Evaluador', 3, 'floyola', 0, 3),
(5, 'Gustavo', 'Saavedra', 'gsaavedra@inatrans.cl', 'Evaluador', 3, 'gsaavedra', 0, 3),
(6, 'Juan', 'Gonzalez', 'jgonzalez@inatrans.cl', 'Evaluador', 2, 'jgonzalez', 0, 3),
(7, 'Cesar', 'Rojas', 'crojas@inatrans.cl', 'Evaluador', 2, 'crojas', 0, 3),
(8, 'Victor', 'Reyes', 'vreyes@inatrans.cl', 'Evaluador', 2, 'vreyes', 0, 3),
(9, 'German', 'Martinez', 'gmartinez@inatrans.cl', 'Evaluador', 1, 'gmartinez', 1, 3),
(10, 'Erick', 'Noack', 'enoack@inatrans.cl', 'Evaluador', 1, 'enoack', 1, 3),
(11, 'Cristian', 'Saa', 'csaa@inatrans.cl', 'Evaluador', 1, 'csaa', 1, 1),
(12, 'Daniel', 'Quiñones', 'dquinones@inatrans.cl', 'Evaluador', 1, 'dquinones', 1, 3),
(13, 'Pedro', 'Cabezas', 'pcabezas@inatrans.cl', 'Evaluador', 1, 'pcabezas', 0, 3),
(14, 'Juan', 'Gutierrez', 'jgutierrez@inatrans.cl', 'Evaluador', 1, 'jgutierrez', 1, 3),
(15, 'Williams', 'Salinas', 'wsalinas@inatrans.cl', 'Evaluador', 2, 'wsalinas', 1, 3),
(16, 'Javier', 'Rosales', 'jrosales@inatrans.cl', 'Evaluador', 2, 'jrosales', 1, 3),
(17, 'Cristian', 'Acevedo', 'cacevedo@inatrans.cl', 'Evaluador', 3, 'cacevedo', 1, 3),
(18, 'aa', 'aa', 'aa', 'aa', 1, 'aa', 0, 3),
(19, 'Hector', 'Ortega', 'hortega@inatrans.cl', 'Encargado de laboratorio', 3, 'hortega', 1, 3),
(20, 'Aaaa', 'Aaaaaa', 'dddddd', 'Zzzz', 1, 'zz', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Modelo` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_vehiculo_id` int(11) NOT NULL,
  `Transmision_id` int(11) NOT NULL,
  `categoria_licencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id_vehiculo`),
  KEY `Tipo_vehiculo_id` (`Tipo_vehiculo_id`),
  KEY `Transmision_id` (`Transmision_id`),
  KEY `Licencia_id` (`categoria_licencia_id`),
  KEY `categoria_licencia_id` (`categoria_licencia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `Marca`, `Modelo`, `Tipo_vehiculo_id`, `Transmision_id`, `categoria_licencia_id`) VALUES
(1, 'Scania', 'K270', 2, 4, 1),
(2, 'Mercedes Benz', 'Actros', 7, 1, 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `licencia`
--
ALTER TABLE `licencia`
  ADD CONSTRAINT `licencia_ibfk_1` FOREIGN KEY (`categoria_licencia_id`) REFERENCES `categoria_licencia` (`id_categoria_licencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD CONSTRAINT `fk_Simulador_id` FOREIGN KEY (`Simulador_id`) REFERENCES `simulador` (`id_simulador`),
  ADD CONSTRAINT `reporte_ibfk_1` FOREIGN KEY (`Usuario_id`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_2` FOREIGN KEY (`Categoria_id`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reporte_ibfk_3` FOREIGN KEY (`Tipo_averia_id`) REFERENCES `averia` (`id_averia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `simulador`
--
ALTER TABLE `simulador`
  ADD CONSTRAINT `simulador_ibfk_1` FOREIGN KEY (`Sucursal_id`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `simulador_ibfk_2` FOREIGN KEY (`Status_id`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`usuario_tipo`) REFERENCES `tipo_usuario` (`id_tipo_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`Transmision_id`) REFERENCES `transmision` (`id_transmision`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`Tipo_vehiculo_id`) REFERENCES `tipo_vehiculo` (`id_tipo_vehiculo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehiculo_ibfk_4` FOREIGN KEY (`categoria_licencia_id`) REFERENCES `categoria_licencia` (`id_categoria_licencia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
