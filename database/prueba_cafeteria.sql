-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-05-2022 a las 20:13:56
-- Versión del servidor: 8.0.27
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_cafeteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_biometric` varchar(191) NOT NULL,
  `cedula` int NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `credito` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_biometric`),
  KEY `foreing key` (`cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_08_160649_add_username_to_users_table', 1),
(7, '2021_11_12_144742_create_permission_tables', 1),
(8, '2021_12_07_120807_create_transactions_tbl', 1),
(9, '2021_12_13_083556_update_users_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'permission_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(2, 'permission_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(3, 'permission_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(4, 'permission_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(5, 'permission_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(6, 'role_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(7, 'role_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(8, 'role_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(9, 'role_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(10, 'role_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(11, 'user_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(12, 'user_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(13, 'user_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(14, 'user_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(15, 'user_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(16, 'post_index', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(17, 'post_create', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(18, 'post_show', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(19, 'post_edit', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(20, 'post_destroy', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(21, 'Back-Office', 'web', '2022-01-31 18:41:39', '2022-01-31 18:41:39'),
(22, 'Legalizador', 'web', '2022-01-31 18:41:52', '2022-01-31 18:41:52'),
(23, 'Supervisor', 'web', '2022-01-31 18:42:04', '2022-01-31 18:42:04'),
(24, 'Historial', 'web', '2022-02-07 16:20:09', '2022-02-07 16:20:09'),
(25, 'Rechazos', 'web', '2022-02-09 13:07:20', '2022-02-09 13:07:20'),
(27, 'ventas_niza', 'web', '2022-05-07 20:55:52', '2022-05-07 20:55:52'),
(28, 'ventas_smdl', 'web', '2022-05-07 20:56:13', '2022-05-07 20:56:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `preciocompra` int DEFAULT NULL,
  `precioventa` decimal(8,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `preciocompra`, `precioventa`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Empanada', 1600, '2500.00', 45, '2022-05-04 19:45:54', '2022-05-18 18:16:53'),
(2, 'empanada', 1600, '2500.00', 15, '2022-05-04 19:46:33', '2022-05-13 21:50:04'),
(3, 'arepa', 1500, '2700.00', 9, '2022-05-04 19:47:03', '2022-05-13 20:54:45'),
(4, 'chocorramo', 600, '2500.00', 10, '2022-05-04 19:47:24', '2022-05-12 16:12:57'),
(5, 'patacon', 500, '2600.00', 23, '2022-05-04 19:47:43', '2022-05-14 16:06:29'),
(6, 'arepa', 500, '2500.00', 28, '2022-05-04 19:48:06', '2022-05-10 19:20:04'),
(7, 'papa rellena', 500, '2500.00', 44, '2022-05-04 19:48:24', '2022-05-10 19:20:14'),
(8, 'papas', 1500, '1700.00', 32, '2022-05-04 19:48:45', '2022-05-05 13:28:19'),
(9, 'gaseosa personal', 700, '3000.00', 14, '2022-05-04 19:49:25', '2022-05-05 13:28:34'),
(10, 'gaseosa personal', 800, '2500.00', 15, '2022-05-04 19:50:44', '2022-05-05 13:28:44'),
(11, 'gaseosa 1.5', 400, '5200.00', 7, '2022-05-04 19:52:02', '2022-05-05 13:28:54'),
(12, 'celular', 200, '2500.00', 1, '2022-05-05 13:15:59', '2022-05-07 15:56:36'),
(16, 'arroz', 1700, '2500.00', 22, '2022-05-09 18:21:25', '2022-05-10 18:47:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2021-12-20 19:45:37', '2021-12-20 19:45:37'),
(2, 'Asesor', 'web', '2021-12-20 19:45:37', '2022-01-31 18:42:40'),
(3, 'Supervisor', 'web', '2022-01-31 18:43:15', '2022-01-31 18:43:15'),
(4, 'Back Office', 'web', '2022-01-31 18:43:39', '2022-01-31 18:43:39'),
(5, 'Legalizador', 'web', '2022-01-31 18:43:51', '2022-01-31 18:43:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(27, 1),
(28, 1),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(20, 2),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(1, 4),
(16, 4),
(21, 4),
(22, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stockupdates`
--

DROP TABLE IF EXISTS `stockupdates`;
CREATE TABLE IF NOT EXISTS `stockupdates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `idprod` bigint UNSIGNED NOT NULL,
  `nombre` varchar(191) NOT NULL,
  `preciocompra` int DEFAULT NULL,
  `precioventa` int DEFAULT NULL,
  `stock_antiguo` int DEFAULT NULL,
  `stock_agregar` int NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `foreing key` (`idprod`)
) ENGINE=InnoDB AUTO_INCREMENT=518 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `stockupdates`
--

INSERT INTO `stockupdates` (`id`, `idprod`, `nombre`, `preciocompra`, `precioventa`, `stock_antiguo`, `stock_agregar`, `fecha_creacion`, `fecha_actualizacion`, `created_at`, `updated_at`) VALUES
(1, 1, 'Empanada', 1600, 2500, 28, 5, '2022-05-04 14:45:54', '2022-05-13 15:51:45', '2022-05-13 20:51:45', '2022-05-13 20:51:45'),
(2, 1, 'Empanada', 1600, 2500, 30, 5, '2022-05-04 14:45:54', '2022-05-13 16:49:30', '2022-05-13 21:49:30', '2022-05-13 21:49:30'),
(3, 2, 'empanada', 1600, 2500, 10, 5, '2022-05-04 14:46:33', '2022-05-13 16:50:04', '2022-05-13 21:50:04', '2022-05-13 21:50:04'),
(4, 1, 'Empanada', 1600, 2500, 34, 1, '2022-05-04 14:45:54', '2022-05-14 11:07:52', '2022-05-14 16:07:52', '2022-05-14 16:07:52'),
(513, 1, 'Empanada', 1600, 2500, 35, 5, '2022-05-04 14:45:54', '2022-05-14 11:27:43', '2022-05-14 16:27:43', '2022-05-14 16:27:43'),
(514, 1, 'Empanada', 1600, 2500, 40, 5, '2022-05-04 14:45:54', '2022-05-14 11:28:53', '2022-05-14 16:28:53', '2022-05-14 16:28:53'),
(515, 1, 'Empanada', 1600, 2500, 45, 5, '2022-05-04 14:45:54', '2022-05-14 11:33:06', '2022-05-14 16:33:06', '2022-05-14 16:33:06'),
(516, 1, 'Empanada', 1600, 2500, 50, 5, '2022-05-04 14:45:54', '2022-05-14 11:33:33', '2022-05-14 16:33:33', '2022-05-14 16:33:33'),
(517, 1, 'Empanada', 1600, 2500, 55, 5, '2022-05-04 14:45:54', '2022-05-14 11:36:20', '2022-05-14 16:36:20', '2022-05-14 16:36:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` bigint NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cedula`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`, `username`, `last_login`) VALUES
(1, 'Super Admin', 'admin@admin.com', 87654213, NULL, '$2y$10$LrCZXWhGEBG4MXinE0qt8.DXHuCzMOa9YpcBkDRRUitKdOJ3KKOTO', NULL, NULL, '6UTTjZNyZ6G2hFo6NT6wF7cLv2AjcWd1f8dGIcVTW18TwuDZrMEYAcoPpIQE', '2021-12-20 19:45:37', '2022-05-18 19:55:46', 'Superadmin', '2022-05-18 14:55:46'),
(2, 'Jenna Gamble', 'dycyjyxire@mailinator.com', 321987132, NULL, '$2y$10$vKD2lIDzxzMlw6mQZesch.KUFeG0uAsIjU6NlUx3bUemuf3X2iWEi', NULL, NULL, NULL, '2021-12-20 20:20:22', '2022-02-02 13:39:26', 'kavykic', '2022-02-02 08:39:26'),
(3, 'sdfsdfsdfsdfsdfsdfsdfsd', 'desarrosdfsdfsdfllo@mentius.com.co', 8974854654878, NULL, '$2y$10$7XQ1V6D88FtFdqHystQ.0uCQoF1TeURDCzEjlwVDC0daibcRl2Aj2', NULL, NULL, NULL, '2022-01-31 18:47:52', '2022-01-31 18:50:08', 'dsfjk', '2022-01-31 13:50:08'),
(4, 'Karen Julissa Auzaque Combita', 'kauzaque@mentius.com.co', 75646545645, NULL, '$2y$10$GIh5GLAwxZgKXSb40PFOr.Z9TsZs40SePAYa4LRK1XPbdIrGmTDWK', NULL, NULL, NULL, '2022-01-31 18:48:15', '2022-05-04 21:42:04', 'ertert34556', '2022-05-04 16:42:04'),
(5, 'werwerfw8f7d8s9f789sdfsdf', 'jvianawerwerwerwer2605@gmail.com', 98785465456456456, NULL, '$2y$10$TaVSgR2BfGXXJo4/y8R0LuxKjQf56NvRiMj4VVVd.uKOXBJVOZ0f2', NULL, NULL, NULL, '2022-01-31 18:48:34', '2022-01-31 18:53:53', '98785343', '2022-01-31 13:53:53'),
(7, 'juanpabloa', 'juanpaacos13@gmail.com', 1007714470, NULL, '$2y$10$yMdIecreEbfU4XtF0wVpdubICL1SaqvbmyPSge/ily.x0vMSr52pi', NULL, NULL, NULL, '2022-05-04 20:40:58', '2022-05-13 21:49:10', 'juanpabloa', '2022-05-13 16:49:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_colaborador` bigint UNSIGNED NOT NULL,
  `detalleventa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total` int NOT NULL,
  `cantidad` int NOT NULL,
  `pagado` int NOT NULL,
  `cambio` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metodo` varchar(50) NOT NULL,
  `cliente` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `foring key` (`id_colaborador`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_colaborador`, `detalleventa`, `total`, `cantidad`, `pagado`, `cambio`, `created_at`, `updated_at`, `metodo`, `cliente`) VALUES
(5, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 5000, 2500, '2022-05-13 20:54:32', '2022-05-13 20:54:32', '', ''),
(6, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1},{\"id\":2,\"nombre\":\"empanada\",\"precio\":\"2500.00\",\"cantidad\":2},{\"id\":3,\"nombre\":\"arepa\",\"precio\":\"2700.00\",\"cantidad\":1}]', 10200, 4, 50000, 39800, '2022-05-13 20:54:45', '2022-05-13 20:54:45', '', ''),
(7, 1, '[{\"id\":2,\"nombre\":\"empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 5000, 2500, '2022-05-13 21:05:21', '2022-05-13 21:05:21', '', ''),
(8, 7, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 5000, 2500, '2022-05-13 21:49:23', '2022-05-13 21:49:23', '', ''),
(9, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1},{\"id\":5,\"nombre\":\"patacon\",\"precio\":\"2600.00\",\"cantidad\":1}]', 5100, 2, 50000, 44900, '2022-05-14 16:06:29', '2022-05-14 16:06:29', '', ''),
(28, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 2500, 0, '2022-05-16 20:47:45', '2022-05-16 20:47:45', 'Credito', 'admin'),
(29, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2650.00\",\"cantidad\":5}]', 13250, 5, 13250, 0, '2022-05-18 14:17:06', '2022-05-18 14:17:06', 'Credito', 'admin'),
(30, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 5000, 2500, '2022-05-18 14:21:38', '2022-05-18 14:21:38', 'Efectivo', 'Cliente mentius'),
(31, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 5000, 2500, '2022-05-18 18:06:30', '2022-05-18 18:06:30', 'Efectivo', 'Cliente Cafeteria'),
(32, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":2}]', 5000, 2, 10000, 5000, '2022-05-18 18:09:32', '2022-05-18 18:09:32', 'Efectivo', 'Cliente Cafeteria'),
(33, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":3}]', 7500, 3, 15275634, 15268134, '2022-05-18 18:15:14', '2022-05-18 18:15:14', 'Efectivo', 'Cliente Cafeteria'),
(34, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 10000, 7500, '2022-05-18 18:16:21', '2022-05-18 18:16:21', 'Efectivo', 'Cliente Cafeteria'),
(35, 1, '[{\"id\":1,\"nombre\":\"Empanada\",\"precio\":\"2500.00\",\"cantidad\":1}]', 2500, 1, 525252, 522752, '2022-05-18 18:16:53', '2022-05-18 18:16:53', 'Efectivo', 'Cliente Cafeteria');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `stockupdates`
--
ALTER TABLE `stockupdates`
  ADD CONSTRAINT `stockupdates_ibfk_1` FOREIGN KEY (`idprod`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_colaborador`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
