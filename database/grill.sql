-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 19 2022 г., 14:39
-- Версия сервера: 10.4.17-MariaDB
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grill`
--

-- --------------------------------------------------------

--
-- Структура таблицы `korzinkas`
--

CREATE TABLE `korzinkas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `total_cost` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `korzinkas`
--

INSERT INTO `korzinkas` (`id`, `user_id`, `product_id`, `amount`, `total_cost`, `created_at`, `updated_at`) VALUES
(25, '1', '19', 0, 0, '2021-05-25 20:08:25', '2021-05-25 20:08:25'),
(26, '1', '23', 0, 0, '2021-05-25 20:09:09', '2021-05-25 20:09:09'),
(27, '1', '20', 0, 0, '2021-05-25 20:33:40', '2021-05-25 20:33:40'),
(28, '1', '21', 0, 0, '2021-07-03 05:40:11', '2021-07-03 05:40:11'),
(29, '1', '20', 0, 0, '2021-07-03 05:40:18', '2021-07-03 05:40:18'),
(30, '1', '19', 0, 0, '2021-07-03 05:40:23', '2021-07-03 05:40:23');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_02_155716_create_products_table', 2),
(4, '2021_05_02_160148_create_product_groups_table', 2),
(5, '2021_05_03_072033_create_orders_table', 3),
(7, '2021_05_06_115848_create_user_statuses_table', 4),
(9, '2014_10_12_000000_create_users_table', 5),
(11, '2021_05_06_115748_create_user_roles_table', 6),
(12, '2021_05_12_073221_create_korzinkas_table', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL,
  `expected_delivery_time` datetime NOT NULL,
  `orders` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_group_id`, `product_price`, `image_url`, `description`, `created_at`, `updated_at`) VALUES
(18, 'grill_limon', 2, 40000, 'gril-limon-kurica-myaso_1620634985.jpg', 'Limonli (sochniy)', '2021-05-10 03:23:07', '2021-07-03 05:43:13'),
(19, 'tabaka', 1, 28000, 'tabaka_1620635176.jpg', 'Qizartirib pishirilgan tabaka', '2021-05-10 03:26:16', '2021-05-10 03:26:16'),
(20, 'KFC', 3, 30000, 'f78b8d9deaf4505b4700b543e405aebb_1620635212.jpg', 'Sousli qarsildoq kfc', '2021-05-10 03:26:52', '2021-05-10 03:26:52'),
(21, 'Kola yoki Pepsi 1.5', 5, 10000, 'maxresdefault_1620636678.jpg', 'Muzdek ichimlik', '2021-05-10 03:51:18', '2021-05-10 03:51:18'),
(22, 'Tovuq shashlik', 4, 10000, 'recipe_50162ca9-44e2-4dc8-9dee-62dad6adede7_1620636734.jpg', 'Tovuqli shashlik qirsildoq', '2021-05-10 03:52:14', '2021-05-10 03:52:14'),
(23, 'Fanta', 5, 10000, 'fanta_catalog_product_detail_1620753435.jpg', 'Yaxna fanta', '2021-05-11 12:17:15', '2021-05-11 12:17:15'),
(24, 'Sprite', 5, 10000, 'sprajt-2-l_1620754024.jpg', 'Sprite so\'raganlar uchun', '2021-05-11 12:27:04', '2021-05-11 12:27:04');

-- --------------------------------------------------------

--
-- Структура таблицы `product_groups`
--

CREATE TABLE `product_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_groups`
--

INSERT INTO `product_groups` (`id`, `group_name`) VALUES
(1, 'Tabaka'),
(2, 'Grill'),
(3, 'KFC'),
(4, 'Shashlik'),
(5, 'ichimliklar');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fathername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `role` int(11) NOT NULL DEFAULT 0,
  `totalcost` int(11) NOT NULL DEFAULT 0,
  `adresses` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `fathername`, `email`, `phone`, `status`, `role`, `totalcost`, `adresses`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mirzayev', 'Karim', 'Komilovich', 'karimjonmirzayev1999@gmail.com', '913103298', 0, 1, 136000, NULL, NULL, '$2y$10$JqT.Ts0wUHIFFLidgjGq6.8bS6bIeXhEC8IkqRnAmEBctE85xqa26', NULL, '2021-05-07 02:59:50', '2021-07-03 05:57:13');

-- --------------------------------------------------------

--
-- Структура таблицы `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(0, 'User', NULL, NULL),
(1, 'Admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_statuses`
--

CREATE TABLE `user_statuses` (
  `id` bigint(20) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_statuses`
--

INSERT INTO `user_statuses` (`id`, `status`, `created_at`, `updated_at`) VALUES
(-1, 'Ban', NULL, NULL),
(0, 'Registratsiya qilmagan', NULL, NULL),
(1, 'Telefon kirgizilmagan', NULL, NULL),
(2, 'Email kirgizilmagan', NULL, NULL),
(3, 'Registratsiyadan o\'tgan', NULL, NULL),
(4, 'Doimiy klient', NULL, NULL),
(5, 'Vip klient', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `korzinkas`
--
ALTER TABLE `korzinkas`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_groups`
--
ALTER TABLE `product_groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Индексы таблицы `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_statuses`
--
ALTER TABLE `user_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `korzinkas`
--
ALTER TABLE `korzinkas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `product_groups`
--
ALTER TABLE `product_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_statuses`
--
ALTER TABLE `user_statuses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
