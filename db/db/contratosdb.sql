-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 06:20:27
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contratosdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratantestb`
--

CREATE TABLE `contratantestb` (
  `id_contratante` int(5) NOT NULL,
  `tipo_contratante` varchar(50) NOT NULL,
  `nit_contratante` varchar(20) NOT NULL,
  `nombre_contratante` varchar(100) NOT NULL,
  `siglas_contratante` varchar(20) NOT NULL,
  `id_user` int(5) NOT NULL,
  `reg_contratante` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ALMACENA TODOS LOS DATOS DE IDENTIFICACION DE CADA CONTRATANTE';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contratostb`
--

CREATE TABLE `contratostb` (
  `id_contrato` int(5) NOT NULL,
  `tipo_contrato` varchar(50) NOT NULL,
  `cod_contrato` varchar(100) NOT NULL,
  `num_contrato` varchar(100) NOT NULL,
  `obj_contrato` varchar(4000) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_contratante` int(5) NOT NULL,
  `reg_contrato` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ALMACENA TODOS LOS DATOS DE IDENTIFICACION DE CADA CONTRATO';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obligacionestb`
--

CREATE TABLE `obligacionestb` (
  `id_obligacion` int(7) NOT NULL,
  `id_contrato` int(5) NOT NULL,
  `obligacion` varchar(8000) NOT NULL,
  `area_obligacion` varchar(50) NOT NULL,
  `id_user` int(5) NOT NULL,
  `obser_obligacion` longtext NOT NULL,
  `reg_obligacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ALMACENA TODOS LOS DATOS DE CADA OBLIGACIÓN';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariostb`
--

CREATE TABLE `usuariostb` (
  `id_user` int(5) NOT NULL,
  `nombre_user` varchar(50) NOT NULL,
  `apellido_user` varchar(50) NOT NULL,
  `mail_user` varchar(50) NOT NULL,
  `tipo_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL,
  `reg_user` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='ALMACENA TODOS LOS DATOS DE IDENTIFICACION DE CADA USUARIO';

--
-- Volcado de datos para la tabla `usuariostb`
--

INSERT INTO `usuariostb` (`id_user`, `nombre_user`, `apellido_user`, `mail_user`, `tipo_user`, `password_user`, `reg_user`) VALUES
(1, 'Andrés Mauricio', 'Ospina G.', 'andres_ospina_g8@hotmail.com', 'admin', 'MTIzNDU=', '2023-11-10 21:27:01'),
(2, 'José', 'Ospina', 'jose_op@gmail.com', 'admin', 'MTIzNDU2Nzg=', '2023-11-19 22:54:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contratantestb`
--
ALTER TABLE `contratantestb`
  ADD PRIMARY KEY (`id_contratante`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `contratostb`
--
ALTER TABLE `contratostb`
  ADD PRIMARY KEY (`id_contrato`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_contratante` (`id_contratante`);

--
-- Indices de la tabla `obligacionestb`
--
ALTER TABLE `obligacionestb`
  ADD PRIMARY KEY (`id_obligacion`),
  ADD KEY `id_contrato` (`id_contrato`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `usuariostb`
--
ALTER TABLE `usuariostb`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contratantestb`
--
ALTER TABLE `contratantestb`
  MODIFY `id_contratante` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contratostb`
--
ALTER TABLE `contratostb`
  MODIFY `id_contrato` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `obligacionestb`
--
ALTER TABLE `obligacionestb`
  MODIFY `id_obligacion` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariostb`
--
ALTER TABLE `usuariostb`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contratantestb`
--
ALTER TABLE `contratantestb`
  ADD CONSTRAINT `contratantestb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuariostb` (`id_user`);

--
-- Filtros para la tabla `contratostb`
--
ALTER TABLE `contratostb`
  ADD CONSTRAINT `contratostb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuariostb` (`id_user`),
  ADD CONSTRAINT `contratostb_ibfk_2` FOREIGN KEY (`id_contratante`) REFERENCES `contratantestb` (`id_contratante`);

--
-- Filtros para la tabla `obligacionestb`
--
ALTER TABLE `obligacionestb`
  ADD CONSTRAINT `obligacionestb_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuariostb` (`id_user`),
  ADD CONSTRAINT `obligacionestb_ibfk_2` FOREIGN KEY (`id_contrato`) REFERENCES `contratostb` (`id_contrato`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
