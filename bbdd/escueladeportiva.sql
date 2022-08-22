-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1
CREATE DATABASE IF NOT EXISTS escueladeportiva DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `escueladeportiva`
USE escueladeportiva;


-- Estructura de tabla para la tabla `deporte`
--

CREATE TABLE `deporte` (
                           `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                           `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `deporte`
--

INSERT INTO `deporte` (`idDeporte`, `Nombre`) VALUES
(1, 'Futbol'),
(2, 'Tenis'),
(3, 'Padel'),
(4, 'Zumba'),
(5, 'Gimnasia Artística'),
(6, 'Escuela de Verano'),
(7, 'Baloncesto'),
(8, 'Karate'),
(9, 'Piscina Municipal'),
(10, 'Pilates'),
(11, 'Futbol Sala'),
(12, 'Futbol 7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
                           `idHora` tinyint(3) UNSIGNED NOT NULL,
                           `HoraInicio` time NOT NULL,
                           `HoraFin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`idHora`, `HoraInicio`, `HoraFin`) VALUES
(1, '11:00:00', '12:00:00'),
(2, '12:00:00', '13:00:00'),
(3, '13:00:00', '14:00:00'),
(4, '16:00:00', '17:00:00'),
(5, '17:00:00', '18:00:00'),
(6, '18:00:00', '19:00:00'),
(7, '19:00:00', '20:00:00'),
(8, '20:00:00', '21:00:00'),
(9, '21:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
                            `idNoticia` smallint(5) UNSIGNED NOT NULL,
                            `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                            `Titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
                            `Desarrollo` varchar(10000) COLLATE utf8_spanish_ci NOT NULL,
                            `Imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `idDeporte`, `Titulo`, `Desarrollo`, `Imagen`) VALUES
(1, 1, 'Bienvenido al Proyecto Miguel ', 'Hola miguel', 'defecto.png'),
(2, 2, 'Bienvenido al Proyecto Ernesto', 'Hola Ernesto', 'defecto.png'),
(3, 2, 'Bienvenido al Proyecto Paco', 'Hola Paco', 'defecto.png'),
(4, 1, 'Bienvenido al Proyecto Miguel ', 'Hola miguel', 'defecto.png'),
(5, 2, 'Bienvenido al Proyecto Ernesto', 'Hola Ernesto', 'defecto.png'),
(6, 1, 'Bienvenido al Proyecto Paco ', 'Hola miguel', 'defecto.png');


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
                          `idPista` tinyint(3) UNSIGNED NOT NULL,
                          `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
                          `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                          `PrecioDia` decimal(10,2) NOT NULL,
                          `PrecioNoche` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`idPista`, `Nombre`, `idDeporte`, `PrecioDia`, `PrecioNoche`) VALUES
(1, 'Campo de Hierba', 1, '15.00', '25.00'),
(2, 'Campo de Tierra', 1, '10.00', '15.00'),
(3, 'Pista 1', 7, '15.00', '20.00'),
(4, 'Pista 2', 7, '10.00', '20.00'),
(5, 'Pista 3', 7, '10.00', '20.00'),
(7, 'Pista Interior', 11, '10.00', '20.00'),
(8, 'Pista Exterior', 11, '10.00', '20.00'),
(9, 'Pista Tenis 1', 2, '3.00', '5.00'),
(10, 'Pista Tenis 2', 2, '3.00', '5.00'),
(11, 'Pista Padel 1', 3, '3.00', '5.00'),
(12, 'Pista Padel 2', 3, '3.00', '5.00'),
(13, 'Campo de Albero', 12, '8.00', '12.00');

-- --------------------------------------------------------
CREATE TABLE `usuarios` (
                            `idUsuario` smallint(5) UNSIGNED NOT NULL,
                            `Nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `NombreUsuario` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL unique,
                            `Password` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL unique,
                            `Preguntaseg` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Respuesta` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
                            `Tipo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
                            `idReservas` int(10) UNSIGNED NOT NULL,
                            `idUsuario` smallint(5) UNSIGNED NOT NULL,
                            `idDeporte` tinyint(3) UNSIGNED NOT NULL,
                            `idPista` tinyint(3) UNSIGNED NOT NULL,
                            `Fecha` date NOT NULL,
                            `idHora` tinyint(3) UNSIGNED DEFAULT NULL,
                            `Nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--



--
-- Volcado de datos para la tabla `usuarios`
--


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `deporte`
--
ALTER TABLE `deporte`
    ADD PRIMARY KEY (`idDeporte`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
    ADD PRIMARY KEY (`idHora`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
    ADD PRIMARY KEY (`idNoticia`),
    ADD KEY `fk_deporte` (`idDeporte`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
    ADD PRIMARY KEY (`idPista`),
    ADD KEY `fk_deporte3` (`idDeporte`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
    ADD PRIMARY KEY (`idReservas`),
    ADD UNIQUE KEY `unique_index` (`idHora`,`Fecha`,`idPista`),
    ADD KEY `fk_deporte2` (`idDeporte`),
    ADD KEY `fk_pista` (`idPista`),
    ADD KEY `fk_Usuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `deporte`
--
ALTER TABLE `deporte`
    MODIFY `idDeporte` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
    MODIFY `idHora` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
    MODIFY `idNoticia` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pistas`
--
ALTER TABLE `pistas`
    MODIFY `idPista` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
    MODIFY `idReservas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `idUsuario` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
    ADD CONSTRAINT `fk_deporte` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pistas`
--
ALTER TABLE `pistas`
    ADD CONSTRAINT `fk_deporte3` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE;

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
    ADD CONSTRAINT `fk_HORA1` FOREIGN KEY (`idHora`) REFERENCES `horario` (`idHora`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_deporte2` FOREIGN KEY (`idDeporte`) REFERENCES `deporte` (`idDeporte`) ON DELETE CASCADE,
    ADD CONSTRAINT `fk_pista` FOREIGN KEY (`idPista`) REFERENCES `pistas` (`idPista`) ON DELETE CASCADE;
COMMIT;
