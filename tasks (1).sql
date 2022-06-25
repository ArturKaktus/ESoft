-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 25 2022 г., 12:54
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tododb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `text` text,
  `dateend` date NOT NULL,
  `datecreate` date NOT NULL,
  `dateupdate` date NOT NULL,
  `priority` text NOT NULL,
  `status` text NOT NULL,
  `creator` int NOT NULL,
  `respons` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `text`, `dateend`, `datecreate`, `dateupdate`, `priority`, `status`, `creator`, `respons`) VALUES
(1, 'Текст заголовка1', 'Какое то описание1', '2022-06-25', '2022-06-23', '2022-06-23', '1', 'К выполнению', 1, 3),
(2, 'Текст заголовка2', 'Какое то описание2', '2022-06-29', '2022-06-23', '2022-06-23', '2', 'К выполнению', 1, 2),
(3, 'Текст заголовка3', 'Какое то описание3', '2022-06-29', '2022-06-23', '2022-06-23', '3', 'К выполнению', 1, 2),
(4, 'Текст заголовка4', 'Какое то описание4', '2022-06-29', '2022-06-23', '2022-06-23', '1', 'К выполнению', 1, 3),
(5, 'Текст заголовка5', 'Какое то описание5', '2022-06-29', '2022-06-23', '2022-06-23', '2', 'К выполнению', 1, 2),
(6, 'Текст заголовка6', 'Какое то описание6', '2022-06-29', '2022-06-24', '2022-06-23', '3', 'К выполнению', 1, 3),
(8, 'hjg', 'uyt', '2022-06-30', '2022-06-25', '2022-06-25', '1', 'К выполнению', 1, 2),
(9, 'hjg', 'uyt', '2022-06-30', '2022-06-25', '2022-06-25', '1', 'К выполнению', 1, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
