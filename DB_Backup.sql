-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2017 a las 03:48:44
-- Versión del servidor: 10.0.17-MariaDB
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `icoder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sport_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `year`, `enable`, `branch`, `sport_id`, `created_at`, `updated_at`) VALUES
(1, 1996, 1, 'M', 1, NULL, NULL),
(2, 1998, 1, 'M', 2, '2017-05-31 09:55:44', '2017-05-31 09:55:44'),
(3, 1999, 1, 'M', 3, '2017-05-31 09:56:34', '2017-05-31 09:56:34'),
(4, 2000, 1, 'M', 4, '2017-05-31 09:56:53', '2017-05-31 09:56:53'),
(5, 2001, 1, 'M', 5, '2017-05-31 09:57:20', '2017-05-31 09:57:20'),
(6, 2000, 1, 'M', 7, '2017-05-31 09:57:53', '2017-05-31 09:57:53'),
(7, 2002, 1, 'M', 6, '2017-05-31 09:58:21', '2017-05-31 09:58:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `challenges`
--

CREATE TABLE `challenges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `challenges`
--

INSERT INTO `challenges` (`id`, `name`, `cat_id`, `created_at`, `updated_at`) VALUES
(1, '100 metros', 1, NULL, NULL),
(2, '200 metros', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editions`
--

CREATE TABLE `editions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `place` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_date` date NOT NULL,
  `final_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `editions`
--

INSERT INTO `editions` (`id`, `name`, `enable`, `year`, `place`, `initial_date`, `final_date`, `created_at`, `updated_at`) VALUES
(1, 'Nombre de prueba', 1, 2017, 'Lugar de prueba', '2017-05-22', '2017-06-04', '2017-05-21 01:01:40', '2017-05-21 01:01:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `sport` int(10) UNSIGNED NOT NULL,
  `category` int(10) UNSIGNED NOT NULL,
  `proof` int(10) UNSIGNED NOT NULL,
  `inscription` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pase_cantonal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` int(11) NOT NULL,
  `stade` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `sport`, `category`, `proof`, `inscription`, `pase_cantonal`, `edition`, `stade`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, '202220222/UbzdYGUwp6yCZe8V9pk79f0ptlxqtua8MRBPlZ2Z.pdf', '', 1, 1, '2017-05-30 11:04:11', '2017-05-30 11:04:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_27_051750_create_states_table', 1),
(4, '2017_04_28_025944_create_towns_table', 1),
(5, '2017_04_28_030706_create_editions_table', 1),
(6, '2017_04_28_032242_create_sports_table', 1),
(7, '2017_04_28_033559_create_categories_table', 1),
(8, '2017_05_01_224123_create_people_table', 1),
(9, '2017_05_01_225701_create_inscriptions_table', 1),
(10, '2017_05_16_203417_create_challenges_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card` int(11) NOT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double NOT NULL,
  `width` double NOT NULL,
  `blood` int(11) NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `town` int(10) UNSIGNED NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card_front` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_card_back` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `people`
--

INSERT INTO `people` (`id`, `name`, `middlename`, `lastname`, `gender`, `id_card`, `mail`, `phone`, `height`, `width`, `blood`, `country`, `birthday`, `town`, `address`, `role`, `image`, `id_card_front`, `id_card_back`, `city`, `province`, `created_at`, `updated_at`) VALUES
(4, 'Jorge', 'Rojas', 'Sánchez', '1', 202220222, 'asd@mail.com', '88888888', 171, 75, 1, 'Costa Rica', '1996-02-02', 1, 'San Ramón', 1, '202220222/T8nXjueo57FotNw39oxLC8KrGwyk9tRt4JAeyh0q.jpeg', '202220222/NMTb2L1bFbz7lZesZzwJVmahkeUhreoZ6OPdxUT7.jpeg', '202220222/9QRBeOvMBssfdCRGjwYhPON0Ok4Z2UdtYJr6iiyQ.jpeg', 'San Ramon', 'Alajuela', '2017-05-30 11:04:11', '2017-05-30 11:04:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sports`
--

CREATE TABLE `sports` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `max_participants` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sports`
--

INSERT INTO `sports` (`id`, `name`, `enable`, `type`, `max_participants`, `created_at`, `updated_at`) VALUES
(1, 'Atletismo', 1, 0, 1, NULL, NULL),
(2, 'Ciclismo de Montaña', 1, 0, 1, '2017-05-31 09:50:51', '2017-05-31 09:50:51'),
(3, 'Ciclismo de Ruta', 1, 0, 1, '2017-05-31 09:51:28', '2017-05-31 09:51:28'),
(4, 'Karate', 1, 0, 1, '2017-05-31 09:52:17', '2017-05-31 09:52:17'),
(5, 'Baloncesto', 1, 0, 15, '2017-05-31 09:52:53', '2017-05-31 09:52:53'),
(6, 'Natación', 1, 0, 1, '2017-05-31 09:53:20', '2017-05-31 09:53:20'),
(7, 'Alterofilia', 1, 0, 1, '2017-05-31 09:53:42', '2017-05-31 09:53:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'San Jose', '2017-05-11 06:00:00', '2017-05-10 06:00:00'),
(2, 'Alajuela', NULL, NULL),
(3, 'Cartado', '2017-05-31 09:03:31', '2017-05-31 09:03:31'),
(4, 'Heredia', '2017-05-31 09:03:44', '2017-05-31 09:03:44'),
(5, 'Guanacaste', '2017-05-31 09:04:03', '2017-05-31 09:04:03'),
(6, 'Puntarenas', '2017-05-31 09:04:26', '2017-05-31 09:04:26'),
(7, 'Limón', '2017-05-31 09:04:37', '2017-05-31 09:04:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `towns`
--

CREATE TABLE `towns` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `state_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `towns`
--

INSERT INTO `towns` (`id`, `name`, `enable`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'San Jose', 1, 1, NULL, NULL),
(2, 'Escazu', 1, 1, '2017-05-31 09:08:38', '2017-05-31 09:08:38'),
(3, 'Desamparados', 1, 1, '2017-05-31 09:08:52', '2017-05-31 09:08:52'),
(4, 'Puriscal', 1, 1, '2017-05-31 09:09:08', '2017-05-31 09:09:08'),
(5, 'Tarrazú', 1, 1, '2017-05-31 09:09:44', '2017-05-31 09:09:44'),
(6, 'Aserrin', 1, 1, '2017-05-31 09:10:08', '2017-05-31 09:10:08'),
(7, 'Mora', 1, 1, '2017-05-31 09:10:17', '2017-05-31 09:10:17'),
(8, 'Giocoechea', 1, 1, '2017-05-31 09:10:45', '2017-05-31 09:10:45'),
(9, 'San Ana', 1, 1, '2017-05-31 09:11:05', '2017-05-31 09:11:05'),
(10, 'Alajuelita', 1, 1, '2017-05-31 09:11:30', '2017-05-31 09:11:30'),
(11, 'Vázquez de Coronado', 1, 1, '2017-05-31 09:12:32', '2017-05-31 09:12:32'),
(12, 'Acosta', 1, 1, '2017-05-31 09:13:00', '2017-05-31 09:13:00'),
(13, 'Tibás', 1, 1, '2017-05-31 09:13:21', '2017-05-31 09:13:21'),
(14, 'Moravia', 1, 1, '2017-05-31 09:13:39', '2017-05-31 09:13:39'),
(15, 'Montes de Oca', 1, 1, '2017-05-31 09:13:58', '2017-05-31 09:13:58'),
(16, 'Turrubares', 1, 1, '2017-05-31 09:14:26', '2017-05-31 09:14:26'),
(17, 'Dota', 1, 1, '2017-05-31 09:14:44', '2017-05-31 09:14:44'),
(18, 'Curridabat', 1, 1, '2017-05-31 09:15:10', '2017-05-31 09:15:10'),
(19, 'Pérez Zeledón', 1, 1, '2017-05-31 09:15:52', '2017-05-31 09:15:52'),
(20, 'León Cortés', 1, 1, '2017-05-31 09:16:13', '2017-05-31 09:16:32'),
(21, 'Alajuela', 1, 2, '2017-05-31 09:17:17', '2017-05-31 09:17:17'),
(22, 'San Ramón', 1, 2, '2017-05-31 09:17:45', '2017-05-31 09:17:45'),
(23, 'Grecia', 1, 2, '2017-05-31 09:18:21', '2017-05-31 09:18:21'),
(24, 'San Mateo', 1, 2, '2017-05-31 09:18:44', '2017-05-31 09:18:44'),
(25, 'Atenas', 1, 2, '2017-05-31 09:19:07', '2017-05-31 09:19:07'),
(26, 'Naranjo', 1, 2, '2017-05-31 09:19:31', '2017-05-31 09:19:31'),
(27, 'Naranjo', 1, 2, '2017-05-31 09:19:33', '2017-05-31 09:19:33'),
(28, 'Palmares', 1, 2, '2017-05-31 09:19:51', '2017-05-31 09:19:51'),
(29, 'Poas', 1, 2, '2017-05-31 09:20:08', '2017-05-31 09:20:08'),
(30, 'Orotina', 1, 2, '2017-05-31 09:20:34', '2017-05-31 09:20:34'),
(31, 'San Carlos', 1, 2, '2017-05-31 09:20:56', '2017-05-31 09:20:56'),
(32, 'Zarcero', 1, 2, '2017-05-31 09:21:31', '2017-05-31 09:21:31'),
(33, 'Valverde Vega', 1, 2, '2017-05-31 09:22:04', '2017-05-31 09:22:04'),
(34, 'Upala', 1, 2, '2017-05-31 09:23:06', '2017-05-31 09:23:06'),
(35, 'Los Chiles', 1, 2, '2017-05-31 09:23:39', '2017-05-31 09:23:39'),
(36, 'Guatuso', 1, 2, '2017-05-31 09:24:00', '2017-05-31 09:24:00'),
(37, 'Cartago', 1, 3, '2017-05-31 09:26:14', '2017-05-31 09:26:14'),
(38, 'Paraiso', 1, 3, '2017-05-31 09:26:39', '2017-05-31 09:26:39'),
(39, 'La Unión', 1, 3, '2017-05-31 09:27:27', '2017-05-31 09:27:27'),
(40, 'Jiménez', 1, 3, '2017-05-31 09:27:52', '2017-05-31 09:27:52'),
(41, 'Turrialba', 1, 3, '2017-05-31 09:28:18', '2017-05-31 09:28:18'),
(42, 'Alvarado', 1, 3, '2017-05-31 09:29:14', '2017-05-31 09:29:14'),
(43, 'Oreamuno', 1, 3, '2017-05-31 09:31:04', '2017-05-31 09:31:04'),
(44, 'El Guarco', 1, 3, '2017-05-31 09:31:25', '2017-05-31 09:31:25'),
(45, 'Heredia', 1, 4, '2017-05-31 09:31:55', '2017-05-31 09:31:55'),
(46, 'Barva', 1, 4, '2017-05-31 09:32:17', '2017-05-31 09:32:17'),
(47, 'Santo Domingo', 1, 4, '2017-05-31 09:32:45', '2017-05-31 09:32:45'),
(48, 'Santa Bárbara', 1, 4, '2017-05-31 09:33:14', '2017-05-31 09:33:14'),
(49, 'San Rafael', 1, 4, '2017-05-31 09:33:34', '2017-05-31 09:33:34'),
(50, 'San Isidro', 1, 4, '2017-05-31 09:33:56', '2017-05-31 09:33:56'),
(51, 'Belén', 1, 4, '2017-05-31 09:34:21', '2017-05-31 09:34:21'),
(52, 'Flores', 1, 4, '2017-05-31 09:34:40', '2017-05-31 09:34:40'),
(53, 'San Pablo', 1, 4, '2017-05-31 09:34:58', '2017-05-31 09:34:58'),
(54, 'Sarapiquí', 1, 4, '2017-05-31 09:35:24', '2017-05-31 09:35:24'),
(55, 'Liberia', 1, 5, '2017-05-31 09:35:48', '2017-05-31 09:35:48'),
(56, 'Nicoya', 1, 5, '2017-05-31 09:36:07', '2017-05-31 09:36:07'),
(57, 'Santa Cruz', 1, 5, '2017-05-31 09:36:34', '2017-05-31 09:36:34'),
(58, 'Bagaces', 1, 5, '2017-05-31 09:36:53', '2017-05-31 09:36:53'),
(59, 'Carrillo', 1, 5, '2017-05-31 09:37:12', '2017-05-31 09:38:10'),
(60, 'Cañas', 1, 5, '2017-05-31 09:38:33', '2017-05-31 09:38:33'),
(61, 'Abangares', 1, 5, '2017-05-31 09:38:51', '2017-05-31 09:38:51'),
(62, 'Tilarán', 1, 5, '2017-05-31 09:39:19', '2017-05-31 09:39:19'),
(63, 'Nandayure', 1, 5, '2017-05-31 09:39:41', '2017-05-31 09:39:41'),
(64, 'La Cruz', 1, 5, '2017-05-31 09:40:02', '2017-05-31 09:40:02'),
(65, 'Hojancha', 1, 5, '2017-05-31 09:40:33', '2017-05-31 09:40:33'),
(66, 'Puntarenas', 1, 6, '2017-05-31 09:40:54', '2017-05-31 09:40:54'),
(67, 'Esparza', 1, 6, '2017-05-31 09:41:15', '2017-05-31 09:41:15'),
(68, 'Buenos Aires', 1, 6, '2017-05-31 09:41:33', '2017-05-31 09:41:33'),
(69, 'Montes de oro', 1, 6, '2017-05-31 09:41:55', '2017-05-31 09:41:55'),
(70, 'Osa', 1, 6, '2017-05-31 09:42:12', '2017-05-31 09:42:12'),
(71, 'Quepos', 1, 6, '2017-05-31 09:42:34', '2017-05-31 09:42:34'),
(72, 'Golfito', 1, 6, '2017-05-31 09:43:09', '2017-05-31 09:43:09'),
(73, 'Coto Brus', 1, 6, '2017-05-31 09:43:39', '2017-05-31 09:43:39'),
(74, 'Parrita', 1, 6, '2017-05-31 09:44:09', '2017-05-31 09:44:09'),
(75, 'Corredores', 1, 6, '2017-05-31 09:44:30', '2017-05-31 09:44:30'),
(76, 'Garabito', 1, 6, '2017-05-31 09:45:18', '2017-05-31 09:45:18'),
(77, 'Limón', 1, 7, '2017-05-31 09:45:37', '2017-05-31 09:45:37'),
(78, 'Pococi', 1, 7, '2017-05-31 09:46:13', '2017-05-31 09:46:13'),
(79, 'Siquirres', 1, 6, '2017-05-31 09:46:33', '2017-05-31 09:46:33'),
(80, 'Talamanca', 1, 7, '2017-05-31 09:47:03', '2017-05-31 09:47:03'),
(81, 'Matina', 1, 7, '2017-05-31 09:47:30', '2017-05-31 09:47:30'),
(82, 'Guácimo', 1, 7, '2017-05-31 09:48:02', '2017-05-31 09:48:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `town_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `nickname`, `enable`, `id_card`, `role`, `town_id`, `created_at`, `updated_at`) VALUES
(1, 'Maria', 'admin@admin.com', '$2y$10$QFwmMgbf53SGejablsKSJuZi1IMXcl7QHdmy2OB6ZZV1XLnwxdqiK', 'zhbQgJVhvy2AjWFh69ZLG4lJKiTGOKNFz79NyFZJXo6DKtILrJEBJugzARMb', 'maria', 1, 202220222, 1, 1, '2017-05-11 06:00:00', '2017-05-31 06:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `challenges_cat_id_foreign` (`cat_id`);

--
-- Indices de la tabla `editions`
--
ALTER TABLE `editions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inscriptions_sport_foreign` (`sport`),
  ADD KEY `inscriptions_category_foreign` (`category`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `people_town_foreign` (`town`);

--
-- Indices de la tabla `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `towns`
--
ALTER TABLE `towns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `towns_state_id_foreign` (`state_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_id_card_unique` (`id_card`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `editions`
--
ALTER TABLE `editions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sports`
--
ALTER TABLE `sports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `towns`
--
ALTER TABLE `towns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `challenges_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `inscriptions_category_foreign` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscriptions_sport_foreign` FOREIGN KEY (`sport`) REFERENCES `sports` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `people`
--
ALTER TABLE `people`
  ADD CONSTRAINT `people_town_foreign` FOREIGN KEY (`town`) REFERENCES `towns` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `towns`
--
ALTER TABLE `towns`
  ADD CONSTRAINT `towns_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
