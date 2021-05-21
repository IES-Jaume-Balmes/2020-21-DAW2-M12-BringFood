-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2021 a las 21:12:19
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

--
-- Volcado de datos para la tabla `addresses`
--

INSERT INTO `addresses` (`id`, `created_at`, `updated_at`, `via`, `name`, `number`, `floor`, `door`, `stair`, `zip_code`) VALUES
(1, '2021-05-10 21:03:48', '2021-05-10 21:03:48', 'Calle', 'Simancas', '4', '5', '2', 'A', '08918'),
(2, '2021-05-10 21:07:09', '2021-05-10 21:07:09', 'Calle', 'Simancas', '5', '5', '2', 'A', '08918');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(6,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dishes`
--

INSERT INTO `dishes` (`id`, `created_at`, `updated_at`, `name`, `detail`, `img_url`, `price`, `user_id`) VALUES
(1, '2021-05-10 20:57:11', '2021-05-10 20:57:11', 'Chipawasu', 'Sopa paraguaya', 'chipa.png', 10.00, 2),
(2, '2021-05-10 20:57:49', '2021-05-10 20:57:49', 'Patatas', 'patatas fritas con sal y crocantes', 'patatas.png', 8.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dish_order`
--

CREATE TABLE `dish_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_request` timestamp NULL DEFAULT current_timestamp(),
  `date_send` timestamp NULL DEFAULT NULL,
  `date_deliver` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dish_order`
--

INSERT INTO `dish_order` (`id`, `dish_id`, `order_id`, `created_at`, `updated_at`, `date_request`, `date_send`, `date_deliver`) VALUES
(1, 1, 1, '2021-05-10 20:59:25', '2021-05-10 20:59:25', '2021-05-10 22:59:25', NULL, NULL);

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2019_08_19_000000_create_failed_jobs_table', 1),
(32, '2021_04_25_201724_create_roles_table', 1),
(33, '2021_04_25_202453_create_addresses_table', 1),
(34, '2021_04_25_221408_add_role_id_column_to_users_table', 1),
(35, '2021_04_29_120410_create_orders_table', 1),
(36, '2021_04_29_122233_create_payments_table', 1),
(37, '2021_04_29_124840_add_user_id_column_to_orders_table', 1),
(38, '2021_05_09_093033_create_dishes_table', 1),
(39, '2021_05_10_143047_add_user_id_column_to_dishes_table', 1),
(40, '2021_05_10_153356_create_dish_order_table', 1),
(41, '2021_05_10_154416_add_address_id_column_to_orders_table', 1),
(42, '2021_05_10_155426_add_order_id_column_to_payments_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  `total_price` double(8,2) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `updated_at`, `finished`, `total_price`, `user_id`, `address_id`) VALUES
(1, '2021-05-10 20:59:25', '2021-05-10 20:59:25', 0, 10.00, 4, NULL);

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
  `order_id` bigint(20) UNSIGNED NOT NULL
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
(1, '2021-05-10 20:51:46', '2021-05-10 20:51:46', 'admin', 'Este usuario puede hacer lo que sea'),
(2, '2021-05-10 20:51:58', '2021-05-10 20:51:58', 'restaurant', 'Este usuario puede subir sus productos al aplicativo'),
(3, '2021-05-10 20:52:13', '2021-05-10 20:52:13', 'client', 'Este usuario puede ver los productos subidos por el usuario con rol restaurant');

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
(1, 'Juan Carlos Oblitas Nuñez', 'juancarlos@gmail.com', NULL, '$2y$10$2OL3gHCQzE5bB4P0xsnENegVITJZloH0lQylq7wuTdXL6e22Uvi7S', NULL, '2021-05-10 20:53:10', '2021-05-10 20:53:10', 'NIF', NULL, '+34', '689745321', NULL, 1),
(2, 'Ena Mimi Nuñez Caja', 'enamimi@gmail.com', NULL, '$2y$10$FOqlkxbcMGI81oCRIxiBOOjw4btr/PprVGlYQuYRLe8zS4WPkR8/6', NULL, '2021-05-10 20:53:56', '2021-05-10 20:53:56', 'NIF', NULL, '+34', '689745322', NULL, 2),
(3, 'Liz Lorena Dominguez Benitez', 'lizema@gmail.com', NULL, '$2y$10$o5d.rn3sokGnJjUWl0q8eO9YVKqh1tBOs8FwqkYGeAvNOQ.gAb3O2', NULL, '2021-05-10 20:54:32', '2021-05-10 20:54:32', 'NIF', NULL, '+34', '689745323', NULL, 2),
(4, 'Erika Oblitas', 'erika@gmail.com', NULL, '$2y$10$iBeLPSsBn2Ihhg8hs/AiU.wSKygp9oJr0DGP01ubTpYWBQgdgFU56', NULL, '2021-05-10 20:55:13', '2021-05-10 20:55:13', 'NIF', NULL, '+34', '689745324', NULL, 3),
(5, 'Ricardo Luis Oblitas', 'ricardo@gmail.com', NULL, '$2y$10$AB2XD6Eg5vY/dMs9BQkuB.ZK1TkoaMDoh0czpuiobbi7x.SmRIELW', NULL, '2021-05-10 20:55:42', '2021-05-10 20:55:42', 'NIF', NULL, '+34', '689745325', NULL, 3),
(6, 'Froilan Ricardo Oblitas', 'froilan@gmail.com', NULL, '$2y$10$.Ln45KNMPKQSTZW2Q3uHs.UXS/AoEdXOvPzePmtSLSlPdzPoNumDi', NULL, '2021-05-10 20:56:08', '2021-05-10 20:56:08', 'NIF', NULL, '+34', '689745326', NULL, 3),
(7, 'Ena Mimi Nuñez Caja', 'enamiminu@hotmail.com', NULL, '$2y$10$R2qbyxFoBQFcEzu3vh76VOr/ejX2wwaTBXGwRU8royN3gVTnim89O', NULL, '2021-05-19 15:59:36', '2021-05-19 15:59:36', 'NIF', '46494161Y', '+34', '690834891', NULL, 3),
(8, 'Liz Lorena Dominguez Benitez', 'lizlorena234@gmail.com', NULL, '$2y$10$azK4f/I1I.O0yhMwjuWOmutM30TqGKp1NgHo4.86YhPExlQ9dFTPu', NULL, '2021-05-19 16:30:31', '2021-05-19 16:30:31', 'NIF', '46494171Y', '+34', '678987654', NULL, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `dish_order`
--
ALTER TABLE `dish_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dish_order_order_id_foreign` (`order_id`),
  ADD KEY `dish_order_dish_id_foreign` (`dish_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`);

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
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `dish_order`
--
ALTER TABLE `dish_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `dish_order`
--
ALTER TABLE `dish_order`
  ADD CONSTRAINT `dish_order_dish_id_foreign` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dish_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
