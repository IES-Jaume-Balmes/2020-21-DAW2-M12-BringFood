-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2021 a las 21:54:57
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bringfood`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `via` enum('Avenida','Calle','Paseo','Plaza','Carretera') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Avenida',
  `name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floor` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `door` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stair` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `address_user`
--

CREATE TABLE `address_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foods`
--

CREATE TABLE `foods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(6,2) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(151, '2014_10_12_000000_create_users_table', 1),
(152, '2014_10_12_100000_create_password_resets_table', 1),
(153, '2019_08_19_000000_create_failed_jobs_table', 1),
(154, '2021_04_25_201724_create_roles_table', 1),
(155, '2021_04_25_202453_create_addresses_table', 1),
(156, '2021_04_25_215810_create_address_user_table', 1),
(157, '2021_04_25_221408_add_role_id_column_to_users_table', 1),
(158, '2021_04_29_120410_create_orders_table', 1),
(159, '2021_04_29_122233_create_payments_table', 1),
(160, '2021_04_29_122514_create_foods_table', 1),
(161, '2021_04_29_124744_add_user_id_column_to_payments_table', 1),
(162, '2021_04_29_124840_add_user_id_column_to_orders_table', 1),
(163, '2021_04_29_124933_add_order_id_column_to_foods_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_request` timestamp NULL DEFAULT current_timestamp(),
  `date_send` timestamp NULL DEFAULT NULL,
  `date_deliver` timestamp NULL DEFAULT NULL,
  `total_price` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `date_request`, `date_send`, `date_deliver`, `total_price`, `user_id`) VALUES
(1, '2021-05-07 12:10:06', '2021-05-07 13:06:14', '2021-05-07 13:06:14', '2021-05-07 15:10:06', '2021-05-07 16:10:06', 3.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method` enum('Credit Card','PayPal') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Credit Card',
  `card_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_expiry` date NOT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('admin','restaurant','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `type`, `description`) VALUES
(1, '2021-05-07 12:09:06', '2021-05-07 12:09:06', 'admin', 'Este usuario puede hacer lo que sea'),
(2, '2021-05-07 12:09:23', '2021-05-07 12:09:23', 'restaurant', 'Este usuario puede subir sus productos al aplicativo'),
(3, '2021-05-07 12:09:35', '2021-05-07 12:09:35', 'client', 'Este usuario puede ver los productos subidos por el usuario con rol restaurant');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_document` enum('NIF','NIE','CIF') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NIF',
  `document` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+34',
  `mobile` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(9) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type_document`, `document`, `prefix`, `mobile`, `phone`, `role_id`) VALUES
(1, 'Ena Mimi', 'enamimi@gmail.com', NULL, '$2y$10$Y20fgv.k6h2vphlZfRztFu71mrKWxMcxgEqIzi9p.U1WWTjYvQTP2', NULL, '2021-05-07 12:09:47', '2021-05-07 12:09:47', 'NIF', NULL, '+34', '689745331', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `address_user`
--
ALTER TABLE `address_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_user_user_id_foreign` (`user_id`),
  ADD KEY `address_user_address_id_foreign` (`address_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foods_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_type_unique` (`type`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_document_unique` (`document`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `address_user`
--
ALTER TABLE `address_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foods`
--
ALTER TABLE `foods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `address_user`
--
ALTER TABLE `address_user`
  ADD CONSTRAINT `address_user_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `address_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
