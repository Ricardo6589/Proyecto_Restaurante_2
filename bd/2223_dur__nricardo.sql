-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2022 a las 19:23:00
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `2223_duránricardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencias`
--

CREATE TABLE `tbl_incidencias` (
  `id` int(11) NOT NULL,
  `fecha_incidencia` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_final_incidencia` varchar(30) NOT NULL,
  `motivo_incidencia` varchar(100) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_mesas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesas`
--

CREATE TABLE `tbl_mesas` (
  `id` int(11) NOT NULL,
  `numero_mesa` char(2) NOT NULL,
  `estado_mesa` enum('libre','ocupado','mantenimiento') NOT NULL,
  `capacidad_mesa` int(1) NOT NULL,
  `img_mesa` varchar(20) NOT NULL,
  `id_salas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mesas`
--

INSERT INTO `tbl_mesas` (`id`, `numero_mesa`, `estado_mesa`, `capacidad_mesa`, `img_mesa`, `id_salas`) VALUES
(1, '1', 'libre', 12, 'mesa_12.svg', 1),
(2, '2', 'libre', 2, 'mesa_2.svg', 1),
(3, '3', 'libre', 4, 'mesa_4.svg', 1),
(4, '4', 'libre', 4, 'mesa_4.svg', 1),
(5, '5', 'libre', 4, 'mesa_4.svg', 1),
(6, '6', 'libre', 4, 'mesa_4.svg', 1),
(7, '7', 'libre', 2, 'mesa_2.svg', 1),
(8, '8', 'libre', 12, 'mesa_12.svg', 1),
(9, '1', 'libre', 4, 'mesa_4.svg', 2),
(10, '2', 'libre', 2, 'mesa_2.svg', 2),
(11, '3', 'libre', 2, 'mesa_2.svg', 2),
(12, '4', 'libre', 4, 'mesa_4.svg', 2),
(13, '1', 'libre', 12, 'mesa_12.svg', 3),
(14, '2', 'libre', 2, 'mesa_2.svg', 3),
(15, '3', 'libre', 4, 'mesa_4.svg', 3),
(16, '4', 'libre', 2, 'mesa_2.svg', 3),
(17, '5', 'libre', 4, 'mesa_4.svg', 3),
(18, '6', 'libre', 2, 'mesa_2.svg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `id` int(11) NOT NULL,
  `fecha_reserva` varchar(30) NOT NULL,
  `fecha_final_reserva` varchar(30) NOT NULL,
  `nombre_reserva` varchar(30) NOT NULL,
  `id_usuarios` int(11) NOT NULL,
  `id_mesas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salas`
--

CREATE TABLE `tbl_salas` (
  `id` int(11) NOT NULL,
  `nombre_sala` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_salas`
--

INSERT INTO `tbl_salas` (`id`, `nombre_sala`) VALUES
(1, 'Comedor'),
(2, 'Terraza'),
(3, 'Privada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `personal_usuario` enum('admin','camarero','mantenimiento','cliente') NOT NULL,
  `nombre_usuario` varchar(15) NOT NULL,
  `apellido_usuario` varchar(20) NOT NULL,
  `email_usuario` varchar(40) NOT NULL,
  `password_usuario` varchar(300) NOT NULL,
  `telefono_usuario` char(9) NOT NULL,
  `dni_usuario` char(9) NOT NULL,
  `img_usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `personal_usuario`, `nombre_usuario`, `apellido_usuario`, `email_usuario`, `password_usuario`, `telefono_usuario`, `dni_usuario`, `img_usuario`) VALUES
(1, 'admin', 'Ricardo', 'Admin', 'ricardo_admin@gmail.com', '60fe74406e7f353ed979f350f2fbb6a2e8690a5fa7d1b0c32983d1d8b3f95f67', '643141840', '49813243G', ''),
(2, 'camarero', 'Ricardo', 'Camarero', 'ricardo_camarero@gmail.com', 'dc96fe03acc04c194649640d9bc1447b2e7334a5feb73333321323e06648ad2f', '644131230', '49813244G', ''),
(3, 'mantenimiento', 'Ricardo', 'Mantenimiento', 'ricardo_mantenimiento@gmail.com', '758449d9e0542b5f286b40b8d82768b58269f208ea8d4ed8a11c98e8df1e6097', '612131417', '49813245G', ''),
(4, 'cliente', 'Ricardo', 'Cliente', 'ricardo_cliente@gmail.com', '27517e2f3aa2768386779f7273f02290632352f721709c646e20a65c5e888dff', '644131619', '49813246G', ''),
(5, 'admin', 'Pablo', 'Admin', 'pablo_admin@gmail.com', '60fe74406e7f353ed979f350f2fbb6a2e8690a5fa7d1b0c32983d1d8b3f95f67', '643141840', '47599287M', ''),
(6, 'camarero', 'Pablo', 'Camarero', 'pablo_camarero@gmail.com', 'dc96fe03acc04c194649640d9bc1447b2e7334a5feb73333321323e06648ad2f', '644131230', '47599288M', ''),
(7, 'mantenimiento', 'Pablo', 'Mantenimiento', 'pablo_mantenimiento@gmail.com', '758449d9e0542b5f286b40b8d82768b58269f208ea8d4ed8a11c98e8df1e6097', '612131417', '47599289M', ''),
(8, 'cliente', 'Pablo', 'Cliente', 'pablo_cliente@gmail.com', '27517e2f3aa2768386779f7273f02290632352f721709c646e20a65c5e888dff', '644131619', '47599299M', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_mesas` (`id_mesas`);

--
-- Indices de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_salas` (`id_salas`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuarios` (`id_usuarios`),
  ADD KEY `id_mesas` (`id_mesas`);

--
-- Indices de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_salas`
--
ALTER TABLE `tbl_salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD CONSTRAINT `tbl_incidencias_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_incidencias_ibfk_2` FOREIGN KEY (`id_mesas`) REFERENCES `tbl_mesas` (`id`);

--
-- Filtros para la tabla `tbl_mesas`
--
ALTER TABLE `tbl_mesas`
  ADD CONSTRAINT `tbl_mesas_ibfk_1` FOREIGN KEY (`id_salas`) REFERENCES `tbl_salas` (`id`);

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `tbl_reservas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_reservas_ibfk_2` FOREIGN KEY (`id_mesas`) REFERENCES `tbl_mesas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
