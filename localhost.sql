-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-07-2015 a las 12:00:24
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rss`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallusers`()
    READS SQL DATA
    COMMENT 'traer todos los usuarios ameo'
SELECT * FROM users 
left join infouser on users.id = infouser.userid$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertar`(IN `nombre` VARCHAR(30) CHARSET utf8, IN `pass` VARCHAR(16) CHARSET utf8, IN `correo` VARCHAR(50) CHARSET utf8)
    MODIFIES SQL DATA
INSERT INTO users (name, password, email) VALUES ( @nombre, @pass, @correo)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infouser`
--

CREATE TABLE IF NOT EXISTS `infouser` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `intro` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `gender` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='detalles adicionales del usuario';

--
-- Volcado de datos para la tabla `infouser`
--

INSERT INTO `infouser` (`id`, `userid`, `photo`, `intro`, `datebirth`, `gender`) VALUES
(1, 3, '2560x1600.png', 'Mi introduccionsdaasd piola', NULL, 'I DONT KNOW!'),
(2, 5, '17107', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(16) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `infouserid` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='tabla de usuarios';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`, `infouserid`) VALUES
(1, 'Elias', '123', 'locura.elias@gmail.com', NULL),
(3, 'maximilian', '123', 'maximilianoe.alvariiiz@yahoo.com.ar', NULL),
(4, 'pepe', '123', 'mujica@hotmail.com', NULL),
(5, 'df', '123', 'df@yahoo.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `infouser`
--
ALTER TABLE `infouser`
  ADD PRIMARY KEY (`id`) COMMENT 'informacion adicional del usuario',
  ADD UNIQUE KEY `FK_User` (`userid`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) COMMENT 'pk',
  ADD KEY `username` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `infouser`
--
ALTER TABLE `infouser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
