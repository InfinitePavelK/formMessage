-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 28 2023 г., 19:28
-- Версия сервера: 8.0.24
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `formmessages`
--

-- --------------------------------------------------------

--
-- Структура таблицы `formresponses`
--

CREATE TABLE `formresponses` (
  `Name` varchar(32) NOT NULL COMMENT 'Имя',
  `Email` varchar(64) NOT NULL COMMENT 'Электронная почта',
  `Phone` varchar(16) NOT NULL COMMENT 'Номер телефона',
  `Message` text NOT NULL COMMENT 'Сообщение'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `formresponses`
--

INSERT INTO `formresponses` (`Name`, `Email`, `Phone`, `Message`) VALUES
('Павел', 'hunm@mail.ru', '89773781234', 'Привет!'),
('павел', 'hunte@mail.ru', '80982043572', 'Привет-привет'),
('Ян', 'Hunter@mail.ru', '79451234512', 'Привет!');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `formresponses`
--
ALTER TABLE `formresponses`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
