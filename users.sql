-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 17 2019 г., 16:39
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `c2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(10) NOT NULL,
  `age` int(3) NOT NULL,
  `email` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `age`, `email`) VALUES
(1, 'Иван', 12, '1223@te.tt'),
(2, 'Иван2', 12, 'фываф'),
(3, 'Вася', 32, 'ааа@dklf.gg'),
(4, 'Андрей', 12, ''),
(5, 'Петя', 34, '123'),
(6, 'Вася', 33, ''),
(7, 'Андрей', 12, ''),
(8, 'Andy', 34, 'wer'),
(9, 'Андрей', 12, '123'),
(10, 'Андрей', 0, ''),
(11, 'Андрей', 0, ''),
(12, 'Andy', 0, ''),
(13, 'Вася', 34, ''),
(14, 'Андрей', 22, ''),
(15, 'Вася', 34, ''),
(16, 'Игорь', 22, ''),
(56, 'Andy', 33, '123'),
(57, 'Петя', 34, '234234234'),
(58, 'Митя', 34, '23333'),
(59, 'Жуль', 34, ''),
(60, 'Ира', 34, ''),
(61, 'Andy', 34, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
