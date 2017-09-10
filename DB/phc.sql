-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2017 a las 01:32:06
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `id` int(11) NOT NULL,
  `item_name` varchar(64) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`id`, `item_name`, `user_id`, `created_at`) VALUES
(1, 'admin', 1, 1495054333);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL,
  `description` longtext,
  `rule_name` varchar(64) DEFAULT 'NULL',
  `data` longtext,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`id`, `name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
(2, '/*', 2, NULL, NULL, NULL, 1495054318, 1495054318),
(3, '/smsdtx/*', 2, NULL, NULL, NULL, 1495055600, 1495055600),
(7, '/smsdtx/contacto-grupo/create', 2, NULL, NULL, NULL, 1495074461, 1495074461),
(6, '/smsdtx/contacto-grupo/index', 2, NULL, NULL, NULL, 1495074461, 1495074461),
(5, '/smsdtx/contacto/create', 2, NULL, NULL, NULL, 1495074447, 1495074447),
(4, '/smsdtx/contacto/index', 2, NULL, NULL, NULL, 1495074447, 1495074447),
(9, '/smsdtx/grupo/create', 2, NULL, NULL, NULL, 1495074473, 1495074473),
(8, '/smsdtx/grupo/index', 2, NULL, NULL, NULL, 1495074473, 1495074473),
(12, '/smsdtx/sms/index', 2, NULL, NULL, NULL, 1495074760, 1495074760),
(10, '/smsdtx/sms/sms-grupal', 2, NULL, NULL, NULL, 1495074759, 1495074759),
(11, '/smsdtx/sms/sms-individual', 2, NULL, NULL, NULL, 1495074759, 1495074759),
(13, '/usuario/gestion/*', 2, NULL, NULL, NULL, 1495132439, 1495132439),
(15, '/usuario/gestion/create', 2, NULL, NULL, NULL, 1495132445, 1495132445),
(14, '/usuario/gestion/index', 2, NULL, NULL, NULL, 1495132445, 1495132445),
(16, '/usuario/gestion/rol', 2, NULL, NULL, NULL, 1495137849, 1495137849),
(1, 'admin', 1, NULL, NULL, NULL, 1495054307, 1495054307);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `id` int(11) NOT NULL,
  `parent` varchar(64) NOT NULL DEFAULT '',
  `child` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`id`, `parent`, `child`) VALUES
(1, 'admin', '/*');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL DEFAULT '',
  `data` longtext,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `observacion` text,
  `operadora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `numero`, `correo`, `direccion`, `observacion`, `operadora_id`) VALUES
(2, 'Ramón David Bello Flores', '+593989280204', 'ramon.bellodf@gnail.com', 'Montecristi', 'Sin observacion', 1),
(8, 'Luis Alfredo Bello FLores', '+593989280205', '', '', '', 2),
(9, 'Julian Ismael Jaramillo Recalde', '+59398928020', '', '', '', 2),
(10, 'María Esperamza FLores Lopez', '+593985302222', '', '', '', 1),
(11, 'Juan Lopez', '+593974854547', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_grupo`
--

CREATE TABLE `contacto_grupo` (
  `id` int(11) NOT NULL,
  `contacto_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto_grupo`
--

INSERT INTO `contacto_grupo` (`id`, `contacto_id`, `grupo_id`) VALUES
(601, 8, 3),
(602, 9, 3),
(603, 10, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`) VALUES
(3, 'Nivel Basico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT 'NULL',
  `data` bigint(20) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `data`, `order`) VALUES
(1, 'Contactos', NULL, '/smsdtx/contacto/index', NULL, NULL),
(2, 'Lista de contactos', 1, '/smsdtx/contacto/index', NULL, NULL),
(3, 'Crear contacto', 1, '/smsdtx/contacto/create', NULL, NULL),
(4, 'Grupos', NULL, '/smsdtx/grupo/index', NULL, NULL),
(5, 'Lista de grupos', 4, '/smsdtx/grupo/index', NULL, NULL),
(6, 'Crear grupo', 4, '/smsdtx/grupo/create', NULL, NULL),
(7, 'Mensajes', NULL, '/smsdtx/sms/index', NULL, NULL),
(8, 'Crear mensaje individual', 7, '/smsdtx/contacto/index', NULL, NULL),
(9, 'Crear mensaje grupal', 7, '/smsdtx/sms/sms-grupal', NULL, NULL),
(10, 'Historial de mensajes', 7, '/smsdtx/sms/index', NULL, NULL),
(11, 'Gestión de usuario', NULL, '/usuario/gestion/index', NULL, NULL),
(12, 'Lista de usuario', 11, '/usuario/gestion/index', NULL, NULL),
(13, 'Crear usuario', 11, '/usuario/gestion/create', NULL, NULL),
(14, 'Rol', 11, '/usuario/gestion/rol', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operadora`
--

CREATE TABLE `operadora` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `operadora`
--

INSERT INTO `operadora` (`id`, `nombre`) VALUES
(1, 'Claro'),
(2, 'Movistar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sms`
--

CREATE TABLE `sms` (
  `id` int(11) NOT NULL,
  `detalle` text,
  `fecha_hora` datetime DEFAULT NULL,
  `contacto_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sms`
--

INSERT INTO `sms` (`id`, `detalle`, `fecha_hora`, `contacto_id`, `usuario_id`) VALUES
(1, 'Hola', '2017-05-18 14:35:25', 8, 1),
(2, 'Hola', '2017-05-18 14:35:25', 9, 1),
(3, 'Hola', '2017-05-18 14:35:25', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `username` varchar(255) NOT NULL DEFAULT '',
  `foto` varchar(255) DEFAULT 'NULL',
  `auth_key` varchar(32) NOT NULL DEFAULT '',
  `password_hash` varchar(255) NOT NULL DEFAULT '',
  `password_reset_token` varchar(255) DEFAULT 'NULL',
  `token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `estado` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `fecha_creacion` date DEFAULT NULL,
  `fecha_actualizacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `celular`, `username`, `foto`, `auth_key`, `password_hash`, `password_reset_token`, `token`, `email`, `estado`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(1, 'Super admin', NULL, 'designtechx@gmail.com', 'NULL', '5io4YsU9MJ-7nS-HUeFNcewcPuwDKioE', '$2y$13$d7RIAudU9Yt36.U4hnw2..bjaidUoMkL68847ylpuTzU9Avjz3/NO', 'NULL', 'vR6LiiYjZd7TjPm6Rt0gGL4pTgaGoQEW', 'designtechx@gmail.com', 1, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `ix_auth_assignment_autoinc` (`id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `ix_auth_item_autoinc` (`id`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contacto_operadora_idx` (`operadora_id`);

--
-- Indices de la tabla `contacto_grupo`
--
ALTER TABLE `contacto_grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contacto_grupo_contacto1_idx` (`contacto_id`),
  ADD KEY `fk_contacto_grupo_grupo1_idx` (`grupo_id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `operadora`
--
ALTER TABLE `operadora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sms_contacto1_idx` (`contacto_id`),
  ADD KEY `fk_sms_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `contacto_grupo`
--
ALTER TABLE `contacto_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=604;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `operadora`
--
ALTER TABLE `operadora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_operadora` FOREIGN KEY (`operadora_id`) REFERENCES `operadora` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto_grupo`
--
ALTER TABLE `contacto_grupo`
  ADD CONSTRAINT `fk_contacto_grupo_contacto1` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contacto_grupo_grupo1` FOREIGN KEY (`grupo_id`) REFERENCES `grupo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `fk_sms_contacto1` FOREIGN KEY (`contacto_id`) REFERENCES `contacto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sms_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
