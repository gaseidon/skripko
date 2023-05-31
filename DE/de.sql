-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2023 г., 15:02
-- Версия сервера: 5.7.38
-- Версия PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `de`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(14, 'adasda'),
(15, '123123123'),
(16, 'фывфыв');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Новый',
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_detail`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(3, 2, ' Название sdasd Всего 3 По стоимости 642693 Рублей<br> Название sadsaf Всего 1 По стоимости 44 Рублей<br>', 'Подтверждён', '', '2023-05-29 09:39:48', '2023-05-29 09:57:51'),
(5, 2, ' Название sdasd Всего 1 По стоимости 214231 Рублей<br>', 'Отклонён', 'ЛОх', '2023-05-29 10:00:53', '2023-05-29 10:01:38'),
(7, 2, ' Название sdasd Всего 4 По стоимости 856924 Рублей<br> Название sadsaf Всего 1 По стоимости 44 Рублей<br>', 'Отклонён', 'asdsadasd', '2023-05-29 19:44:01', '2023-05-29 19:44:40'),
(8, 2, ' Название длод Всего 2 По стоимости 46 Рублей<br> Название sadsaf Всего 2 По стоимости 88 Рублей<br>', 'Новый', NULL, '2023-05-30 10:36:46', '2023-05-30 10:36:46');

-- --------------------------------------------------------

--
-- Структура таблицы `prod`
--

CREATE TABLE `prod` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category_id` int(255) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `prod`
--

INSERT INTO `prod` (`id`, `name`, `count`, `price`, `date`, `category_id`, `image`, `image_path`) VALUES
(1, 'длод', 2, 23, '2023-05-24 13:43:17', 15, 'hjCCqh0Pvjw.jpg', '../uploads/hjCCqh0Pvjw.jpg'),
(17, 'sadsaf', 123, 44, '2023-05-25 13:10:53', 15, 'EivOxlzVlpo.jpg', '../uploads/EivOxlzVlpo.jpg'),
(23, 'sdasd', 21321, 214231, '2023-05-24 13:43:17', 14, 'EivOxlzVlpo-восстановлено.png', '../uploads/EivOxlzVlpo-восстановлено.png'),
(24, 'sadsaf', 123, 44, '2023-05-25 13:10:53', 14, 'unknown712.png', '../uploads/unknown712.png'),
(25, 'sdasd', 21321, 214231, '2023-05-24 13:43:17', 14, 'My_man.png', '../uploads/My_man.png'),
(26, 'sadsaf', 123, 44, '2023-05-25 13:10:53', 14, 'unknown716.png', '../uploads/unknown716.png'),
(27, 'sadsad', 44, 33, '2023-05-24 13:43:17', 15, 'unknown5.png', '../uploads/unknown5.png'),
(28, 'sadsaf', 123, 44, '2023-05-25 13:10:53', 14, 'fotka2.png', '../uploads/fotka2.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`, `user_role`) VALUES
(1, 'Данил', 'Скрипко', 'Андреевич', 'danil111', 'danil.danilka500@gmail.com', '$2y$10$eo.lImjWV1gX0qbgc/OiUueqkbR09iH3Ponp0DFsl83LP2cQoKr3a', 'user'),
(2, 'Админ', 'Админ', 'Админ', 'admin', 'admin@admin.ru', '$2y$10$Y8xxXAEQCh7V8TGynIo/POWpTvc0yY706g0eeSo8QqgTDfWI/3CdG', 'admin'),
(3, 'sadsa', 'sadsad', 'sadsad', 'asdas', 'danil.danilka500@gmail.com', '$2y$10$BlSyvC63OGUcAHvoVd8DmeLyprDAAMDtkMcg4M9B5XGuGIQrWqPVa', 'user'),
(4, 'asd', 'asd', 'asd', 'asd', 'asda@mail.ru', '$2y$10$KPGNac112xafqcdOULs4Wux.w0mi.tmmWSbPwae.atfL1ruixTJLO', 'user'),
(5, 'выф', 'выф', 'выф', 'вфы', 'danil.danilka500@gmail.com', '$2y$10$DkLJ5o0JUvp3T19HTV8zeuzN/6kQOj1vyBKWNh7x1RtNDTzkpwHTu', 'user'),
(6, 'выфвфыв', 'фывфывфыв', 'фывфывфыв', 'asdsadasd', 'danil.danilka500@gmail.com', '$2y$10$/9U89f.9U6wtxoQ7bofvHOOnHrLo0pizSWwdsCAeYkxu0Oxy88BDW', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `prod`
--
ALTER TABLE `prod`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
