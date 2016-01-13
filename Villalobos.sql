-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2015 a las 19:36:11
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `villalobos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoranoticias`
--

CREATE TABLE IF NOT EXISTS `bitacoranoticias` (
  `id` int(32) NOT NULL,
  `usuario` int(32) NOT NULL,
  `razon` varchar(255) NOT NULL,
  `id_noticia` int(32) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `encabezado` varchar(255) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `noticia` mediumtext NOT NULL,
  `autor` varchar(64) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacoranoticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id_noticia` int(32) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `encabezado` varchar(255) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `noticia` mediumtext NOT NULL,
  `autor` varchar(64) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(32) NOT NULL,
  `idioma` varchar(32) NOT NULL,
  `trad` int(32) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(32) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `apellido_p` varchar(64) NOT NULL,
  `apellido_m` varchar(64) DEFAULT NULL,
  `calle` varchar(64) DEFAULT NULL,
  `numero` int(32) DEFAULT NULL,
  `colonia` varchar(64) DEFAULT NULL,
  `cp` int(32) DEFAULT NULL,
  `usuario` varchar(32) NOT NULL,
  `contra` varchar(32) NOT NULL,
  `r_contra` varchar(32) NOT NULL,
  `telefono` int(32) NOT NULL,
  `celular` bigint(32) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `fecha` date NOT NULL,
  `perfil` set('webmaster','inactivo','normal','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido_p`, `apellido_m`, `calle`, `numero`, `colonia`, `cp`, `usuario`, `contra`, `r_contra`, `telefono`, `celular`, `correo`, `fecha`, `perfil`) VALUES
(1, 'Juanito', 'Perez', 'Loya', 'Rasputin', 3212, 'Reforma', 1231, 'master', 'viMsfzJzmXt9Q', 'viMsfzJzmXt9Q', 3446741, 2147483647, 'juan@hotmail.com', '2015-07-20', 'webmaster'),
(2, 'Pedro', 'Gutierrez', 'Cardenas', 'Chichimeca', 3341, 'Rosales', 2341, 'usuario', 'viyFphPKX4mXQ', 'viyFphPKX4mXQ', 3446741, 6143446741, 'pedrito@hotmail.com', '2015-07-20', 'normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacoranoticias`
--
ALTER TABLE `bitacoranoticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacoranoticias`
--
ALTER TABLE `bitacoranoticias`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
