-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2017 a las 22:30:07
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transportes`
--
CREATE DATABASE IF NOT EXISTS `transportes` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `transportes`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_Rol` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_Rol`, `name`) VALUES
(1, 'Logistcs'),
(2, 'Vigilant'),
(3, 'Bus Manager');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `tranportdetails`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `tranportdetails` (
`idtransport` int(11)
,`folio` varchar(10)
,`linea` varchar(45)
,`tipo` varchar(45)
,`placas` varchar(8)
,`box_number` varchar(45)
,`user` varchar(9)
,`comments` text
,`enter_date` datetime
,`exit_date` datetime
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transport`
--

CREATE TABLE `transport` (
  `idtransport` int(11) NOT NULL,
  `folio` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_transport_line` int(11) DEFAULT NULL,
  `id_type` int(11) DEFAULT NULL,
  `placas` varchar(8) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `box_number` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `comments` text COLLATE utf8_spanish2_ci,
  `enter_date` datetime DEFAULT NULL,
  `exit_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `transport`
--

INSERT INTO `transport` (`idtransport`, `folio`, `id_transport_line`, `id_type`, `placas`, `box_number`, `id_responsable`, `comments`, `enter_date`, `exit_date`) VALUES
(1, 'M&S0000001', 1, 2, 'A00-AAA', '6990', 3, 'N/A', '2017-08-14 18:42:22', '2017-08-14 18:42:26'),
(2, 'M&S0000002', 3, 2, 'UKF-AAA', '9069', 3, 'N/A', '2017-08-15 19:32:43', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transport_line`
--

CREATE TABLE `transport_line` (
  `id_transport_line` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `transport_line`
--

INSERT INTO `transport_line` (`id_transport_line`, `name`) VALUES
(1, 'ETN'),
(2, 'Primera Plus'),
(3, 'DHL'),
(4, 'Estafeta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transport_type`
--

CREATE TABLE `transport_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `transport_type`
--

INSERT INTO `transport_type` (`id_type`, `name`) VALUES
(1, 'Importación'),
(2, 'Exportación'),
(3, 'Local');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_Users` int(11) NOT NULL,
  `user` varchar(9) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_Users`, `user`, `password`, `rol`, `active`) VALUES
(1, '212561549', '123', 1, 1),
(3, '212561548', '123', 2, 1),
(4, '212561547', '123', 3, 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `tranportdetails`
--
DROP TABLE IF EXISTS `tranportdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tranportdetails`  AS  select `transport`.`idtransport` AS `idtransport`,`transport`.`folio` AS `folio`,`line`.`name` AS `linea`,`lipo`.`name` AS `tipo`,`transport`.`placas` AS `placas`,`transport`.`box_number` AS `box_number`,`users`.`user` AS `user`,`transport`.`comments` AS `comments`,`transport`.`enter_date` AS `enter_date`,`transport`.`exit_date` AS `exit_date` from (((`transport` join `transport_line` `line` on((`line`.`id_transport_line` = `transport`.`id_transport_line`))) join `transport_type` `lipo` on((`lipo`.`id_type` = `transport`.`id_type`))) join `users` on((`users`.`id_Users` = `transport`.`id_responsable`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_Rol`);

--
-- Indices de la tabla `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`idtransport`),
  ADD UNIQUE KEY `folio_UNIQUE` (`id_type`,`id_transport_line`,`id_responsable`,`folio`),
  ADD KEY `transportLine_idx` (`id_transport_line`),
  ADD KEY `transportReposable_idx` (`id_responsable`);

--
-- Indices de la tabla `transport_line`
--
ALTER TABLE `transport_line`
  ADD PRIMARY KEY (`id_transport_line`);

--
-- Indices de la tabla `transport_type`
--
ALTER TABLE `transport_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_Users`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `transport`
--
ALTER TABLE `transport`
  MODIFY `idtransport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `transport_line`
--
ALTER TABLE `transport_line`
  MODIFY `id_transport_line` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `transport_type`
--
ALTER TABLE `transport_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_Users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `transport`
--
ALTER TABLE `transport`
  ADD CONSTRAINT `transportLine` FOREIGN KEY (`id_transport_line`) REFERENCES `transport_line` (`id_transport_line`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transportReposable` FOREIGN KEY (`id_responsable`) REFERENCES `users` (`id_Users`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transportType` FOREIGN KEY (`id_type`) REFERENCES `transport_type` (`id_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `from rol` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_Rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
