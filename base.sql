-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2017 a las 19:39:28
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `latitud` varchar(50) DEFAULT NULL,
  `longitud` varchar(50) DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL,
  `id_viaje` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `latitud`, `longitud`, `combustible`, `id_viaje`) VALUES
(10, '-34.683021', '-58.663003800000006', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_vehiculo`
--

CREATE TABLE `chofer_vehiculo` (
  `usuario` varchar(10) NOT NULL,
  `id_vehiculo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chofer_viaje`
--

CREATE TABLE `chofer_viaje` (
  `id_viaje` int(10) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) NOT NULL,
  `razon_social` varchar(10) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `razon_social`, `direccion`, `telefono`, `email`) VALUES
(1, 'RS1', 'cochabamba 11', 2345, 'lalala@lila.com'),
(2, 'RS2', 'cochabamba 12', 2345, 'lalala@lila.com'),
(3, 'RS3', 'cochabamba 13', 2345, 'lalala@lila.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(8) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `rol` int(10) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `apellido` varchar(10) NOT NULL,
  `dni` int(10) NOT NULL,
  `area` varchar(20) DEFAULT NULL,
  `licencia` varchar(20) DEFAULT NULL,
  `matricula` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `usuario`, `password`, `rol`, `nombre`, `apellido`, `dni`, `area`, `licencia`, `matricula`) VALUES
(3, 'cacho', '1234', 2, 'Carlos', 'Perez', 37254136, 'chofer', 'profesional', ''),
(4, 'est', '8888', 2, 'esther', 'dddduuud', 212121111, NULL, NULL, NULL),
(5, 'lau', '4567', 1, 'Laura', 'Ramos', 34332212, 'administrador', '', ''),
(2, 'leo', '1212', 3, 'Leonardo', 'Montero', 212121111, 'mecanico', 'profesional', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` varchar(10) NOT NULL,
  `fecha_service` date DEFAULT NULL,
  `km_unidad` float DEFAULT NULL,
  `combustible` int(11) NOT NULL,
  `costo` float DEFAULT NULL,
  `repuestos` varchar(15) DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `id_vehiculo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `fecha_service`, `km_unidad`, `combustible`, `costo`, `repuestos`, `usuario`, `id_vehiculo`) VALUES
('1', '2017-05-06', 15, 120, 15, 'frenos', 'leo', '23'),
('2', '2017-06-01', 39, 250, 4444, 'frenos', 'lau', '20'),
('3', '2017-08-08', 25, 320, 555, 'frenos', 'leo', '26'),
('4', '2017-02-02', 150, 0, 150655, 'GD', 'lau', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `nro` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `usuario` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id_vehiculo` varchar(10) NOT NULL,
  `patente` varchar(6) DEFAULT NULL,
  `nro_motor` int(11) DEFAULT NULL,
  `nro_chasis` int(11) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id_vehiculo`, `patente`, `nro_motor`, `nro_chasis`, `marca`, `modelo`, `usuario`) VALUES
('20', 'mel123', 1234, 1234, 'ford', 'ka', 'lau'),
('23', 'sdf456', 1123456, 12345, 'ford', 'ka', 'lau'),
('26', '4444', 11111, 4444, 'fffff', '2015', 'lau');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo_viaje`
--

CREATE TABLE `vehiculo_viaje` (
  `id_vehiculo` varchar(10) NOT NULL,
  `id_viaje` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE `viaje` (
  `id_viaje` int(10) NOT NULL,
  `origen` varchar(20) NOT NULL,
  `destino` varchar(20) NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_llegada` date NOT NULL,
  `tipo_carga` varchar(20) NOT NULL,
  `km_recorrido_previsto` int(10) NOT NULL,
  `km_recorrido_real` int(10) NOT NULL,
  `combustible_previsto` int(10) NOT NULL,
  `combustible_real` int(10) NOT NULL,
  `tiempo_estimado` time DEFAULT NULL,
  `tiempo_real` time DEFAULT NULL,
  `id_cliente` int(10) NOT NULL,
  `usuario` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`id_viaje`, `origen`, `destino`, `fecha_salida`, `fecha_llegada`, `tipo_carga`, `km_recorrido_previsto`, `km_recorrido_real`, `combustible_previsto`, `combustible_real`, `tiempo_estimado`, `tiempo_real`, `id_cliente`, `usuario`) VALUES
(1, 'Argentina', 'Brasil', '2017-08-09', '2017-08-09', 'Mercaderia', 100, 150, 25, 20, '12:02:00', '10:01:01', 1, 'lau'),
(2, 'Argentina', 'chileeeee', '2017-08-09', '2017-08-09', 'Mercaderia', 100, 0, 25, 0, '12:02:00', '00:00:00', 2, 'cacho'),
(3, 'Argentina', 'Brasil', '2017-08-09', '2017-08-09', 'Mercaderia', 100, 150, 25, 188, '12:02:00', '10:01:01', 3, 'leo'),
(4, 'Buenos Aires', 'Mendoza', '2017-01-01', '2017-01-05', 'Madera', 100, 90, 150, 160, '10:08:00', '11:00:00', 2, 'lau');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_viaje` (`id_viaje`);

--
-- Indices de la tabla `chofer_vehiculo`
--
ALTER TABLE `chofer_vehiculo`
  ADD PRIMARY KEY (`usuario`,`id_vehiculo`),
  ADD KEY `vehiculo_fk` (`id_vehiculo`);

--
-- Indices de la tabla `chofer_viaje`
--
ALTER TABLE `chofer_viaje`
  ADD PRIMARY KEY (`id_viaje`,`usuario`),
  ADD KEY `chofer_fk` (`usuario`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`usuario`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `me_fk` (`usuario`),
  ADD KEY `ve_fk` (`id_vehiculo`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`nro`),
  ADD KEY `fk_rol` (`usuario`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id_vehiculo`),
  ADD KEY `flota_fk` (`usuario`);

--
-- Indices de la tabla `vehiculo_viaje`
--
ALTER TABLE `vehiculo_viaje`
  ADD PRIMARY KEY (`id_vehiculo`,`id_viaje`),
  ADD KEY `vii_fk` (`id_viaje`);

--
-- Indices de la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD PRIMARY KEY (`id_viaje`),
  ADD KEY `ad_fk` (`usuario`),
  ADD KEY `cli_fk` (`id_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `chofer_vehiculo`
--
ALTER TABLE `chofer_vehiculo`
  ADD CONSTRAINT `usuario_fk` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`),
  ADD CONSTRAINT `vehiculo_fk` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `chofer_viaje`
--
ALTER TABLE `chofer_viaje`
  ADD CONSTRAINT `chofer_fk` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`),
  ADD CONSTRAINT `vi_fk` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `me_fk` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`),
  ADD CONSTRAINT `ve_fk` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`);

--
-- Filtros para la tabla `rol`
--
ALTER TABLE `rol`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `flota_fk` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`);

--
-- Filtros para la tabla `vehiculo_viaje`
--
ALTER TABLE `vehiculo_viaje`
  ADD CONSTRAINT `vee_fk` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculo` (`id_vehiculo`),
  ADD CONSTRAINT `vii_fk` FOREIGN KEY (`id_viaje`) REFERENCES `viaje` (`id_viaje`);

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `ad_fk` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`),
  ADD CONSTRAINT `cli_fk` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
