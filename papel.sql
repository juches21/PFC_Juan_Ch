-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2022 a las 10:38:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `papel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20220425185732', '2022-04-25 20:57:44', 56),
('DoctrineMigrations\\Version20220429145847', '2022-04-29 16:58:59', 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `puntos` int(255) DEFAULT 0,
  `ultimo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `puntos`, `ultimo`) VALUES
(1, 'test', '[\"ROLE_ADMIN\"]', '$2y$13$PivCdSW5noKuxFnkaD94IeBO23FhwGm8qavZe7U.Zo6XBkF/6Ddmq', 41, 'Empatada'),
(2, 'Ramon', '[]', '$2y$13$PivCdSW5noKuxFnkaD94IeBO23FhwGm8qavZe7U.Zo6XBkF/6Ddmq', 135, 'Ganada'),
(3, 'tetejuan0221', '[]', '$2y$13$PivCdSW5noKuxFnkaD94IeBO23FhwGm8qavZe7U.Zo6XBkF/6Ddmq', 31, 'Empatada'),
(12, 'alex', '[]', '$2y$10$5f5t2i66Z6AtauTPO9UizOexW/6G9oKYHOq3ip0ug8pQ.UEQR5uxe', 180, 'Ganada'),
(13, 'Muriel', '[]', '$2y$10$R5Ny2Ml9TLHWfizk0eRt3OAjFSJI2H9l17xoU6QFqp/BZ15DWQsMG', 763, 'Ganada'),
(14, 'Valentino', '[]', '$2y$10$ORTjQWNJEhMbhrBEI14.S.25VbSXcfWxbm45bxigAkC2jLpBK.Pd6', 6373, 'Perdida'),
(15, 'Nishka', '[]', '$2y$10$PAp/bbPg65bPbAQz4/1T9upJTfcTVGMDkZSEZkGWsPh.0ylUejMzK', 1918, 'Ganada');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
