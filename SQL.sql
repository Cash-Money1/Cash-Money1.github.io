-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июл 24 2017 г., 23:46
-- Версия сервера: 5.7.12-5-log
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `host1587927_globus`
--

-- --------------------------------------------------------

--
-- Структура таблицы `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batchpm` varchar(55) NOT NULL,
  `m_operation_id` varchar(55) NOT NULL,
  `vremya` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `summa` float NOT NULL,
  `segodnya` varchar(12) NOT NULL,
  `frod` int(1) NOT NULL DEFAULT '0',
  `summa_rub` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL DEFAULT '1',
  `depperiod` int(11) NOT NULL DEFAULT '15',
  `start` bigint(20) NOT NULL,
  `start1` bigint(20) NOT NULL,
  `restart` bigint(20) NOT NULL,
  `admin_per` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `config`
--

INSERT INTO `config` (`id`, `depperiod`, `start`, `start1`, `restart`, `admin_per`) VALUES
(1, 15, 1493701200, 1493701200, 1493753040, 0.00);

-- --------------------------------------------------------

--
-- Структура таблицы `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `curatorid` int(11) NOT NULL,
  `summa` double(10,2) NOT NULL,
  `unixtime` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `transaction` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `summa` float NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL COMMENT '0 - нейтрально (отладка), 1 - положительное действие (green), 2 - отрицательное (red)',
  `status` int(1) NOT NULL DEFAULT '0',
  `timeunix` int(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `ss_users`
--

CREATE TABLE `ss_users` (
  `id` int(11) NOT NULL,
  `wallet` varchar(15) NOT NULL,
  `curator` int(11) NOT NULL,
  `i_have_refs_as_curator` int(11) NOT NULL,
  `refs_wait` double(10,2) NOT NULL,
  `balans` double(11,2) NOT NULL,
  `withdraw` double(11,2) NOT NULL,
  `ip` varchar(20) NOT NULL COMMENT 'IP пользователя при регистрации',
  `last_ip` varchar(15) NOT NULL COMMENT 'IP пользователя при последнем входе в аккаунт',
  `came` varchar(50) NOT NULL COMMENT 'Откуда пришел',
  `act_1` int(1) NOT NULL DEFAULT '0',
  `reg_unix` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Таблица юзеров';

-- --------------------------------------------------------

--
-- Структура таблицы `userstat`
--

CREATE TABLE `userstat` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 NOT NULL,
  `opisanie` text CHARACTER SET utf8 NOT NULL,
  `color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `summa` float DEFAULT NULL,
  `comment` varchar(33) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `summa` double(10,2) NOT NULL,
  `unixtime` bigint(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ss_users`
--
ALTER TABLE `ss_users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `ss_users` ADD FULLTEXT KEY `came` (`came`);

--
-- Индексы таблицы `userstat`
--
ALTER TABLE `userstat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ss_users`
--
ALTER TABLE `ss_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `userstat`
--
ALTER TABLE `userstat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
