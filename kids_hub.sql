-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Апр 13 2026 г., 14:54
-- Версия сервера: 8.0.41
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kids_hub`
--

-- --------------------------------------------------------

--
-- Структура таблицы `circles`
--

CREATE TABLE `circles` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `age_min` int DEFAULT NULL,
  `age_max` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `circles`
--

INSERT INTO `circles` (`id`, `title`, `description`, `age_min`, `age_max`, `price`, `city`, `category`) VALUES
(1, 'Футбол', 'Футбольная секция для детей', 7, 12, 3000.00, 'Москва', 'Спорт'),
(2, 'Рисование', 'Творческая студия', 6, 14, 2500.00, 'Москва', 'Искусство'),
(3, 'Программирование', 'Основы IT', 10, 16, 5000.00, 'Москва', 'Наука'),
(4, 'Футбол', 'Секция футбола', 7, 12, 4000.00, 'Хабаровск', 'Спорт'),
(5, 'Баскетбол', 'Секция баскетбола', 8, 14, 3200.00, 'Москва', 'Спорт'),
(6, 'Плавание', 'Обучение плаванию', 6, 12, 2800.00, 'Москва', 'Спорт'),
(7, 'Рисование', 'Художественная студия', 6, 14, 2500.00, 'Москва', 'Искусство'),
(8, 'Музыка', 'Игра на инструментах', 7, 15, 4000.00, 'Хабаровск', 'Искусство'),
(9, 'Танцы', 'Современные танцы', 6, 13, 2700.00, 'Москва', 'Искусство'),
(10, 'Программирование', 'Основы IT', 10, 16, 5000.00, 'Москва', 'Наука'),
(11, 'Робототехника', 'Сборка роботов', 9, 15, 5200.00, 'Москва', 'Наука'),
(12, 'Английский язык', 'Разговорный английский', 7, 16, 3500.00, 'Москва', 'Языки'),
(13, 'Китайский язык', 'Основы китайского', 10, 16, 4500.00, 'Москва', 'Языки');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, '2222', '$2y$10$zFJZTUIRg.RVgxNObP3J1.PyvDheTAzz4.Uc6g4VrccvXzJ79i7im');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `circles`
--
ALTER TABLE `circles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `circles`
--
ALTER TABLE `circles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
