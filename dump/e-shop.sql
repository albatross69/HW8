-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 12 2016 г., 22:21
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `e-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(10) unsigned NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`category_id`, `category`) VALUES
(1, 'facere'),
(2, 'quia'),
(3, 'debitis'),
(4, 'et');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) unsigned NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `items` varchar(255) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `description`, `quantity`, `category`) VALUES
(1, 'voluptates', '182.47', 'Et quia quae corporis harum illo autem. Molestias rem voluptatem consequuntur et consectetur omnis. Qui nulla ipsa magnam voluptatem beatae. Quis ducimus omnis ut ratione est.', 6, 'facere'),
(2, 'fugiat', '72.59', 'Eligendi qui sit delectus. Sint recusandae rerum fugiat tenetur voluptatibus. Repellat consequuntur sequi ea debitis minus. Aut minima aspernatur magni voluptate iure.', 8, 'debitis'),
(3, 'ut', '75.17', 'Quaerat et pariatur eveniet dolorem. Sunt eaque sit illo tempore ea quo voluptatum. Qui similique eligendi eum officiis sed ipsam eaque ut. Rem perspiciatis rerum cumque iusto temporibus fugit.', 7, 'quia'),
(4, 'expedita', '101.89', 'Dolorem sed sunt aut quis. Itaque corporis repellendus consequatur laborum vero praesentium iure. Error et et illum voluptates quis accusantium. Nulla fugit dolorem sed rerum.', 5, 'debitis'),
(5, 'quis', '79.96', 'Nihil sed aliquam ab fuga. Rerum consequatur blanditiis aperiam exercitationem perspiciatis. Quis quis quos est. Aut praesentium suscipit ducimus est voluptatum.', 8, 'et');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
