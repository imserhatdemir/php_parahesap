-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2021, 17:41:03
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yeni`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_authorized_name_surname` varchar(100) NOT NULL,
  `account_company` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `birim` varchar(50) NOT NULL,
  `bakiye` int(11) NOT NULL,
  `account_email` varchar(50) NOT NULL,
  `account_phone` varchar(50) NOT NULL,
  `account_tax_office` varchar(50) NOT NULL,
  `account_tax_number` varchar(50) NOT NULL,
  `account_iban` varchar(50) NOT NULL,
  `account_adress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `account`
--

INSERT INTO `account` (`account_id`, `account_date`, `account_authorized_name_surname`, `account_company`, `type`, `birim`, `bakiye`, `account_email`, `account_phone`, `account_tax_office`, `account_tax_number`, `account_iban`, `account_adress`) VALUES
(9, '2020-12-19 05:40:12', 'zarok', 'Serhat DEMİR', 'Kart', 'TL', 3764, 'serhatdemir1235@gmail.com', '02122122112', '', '', 'TR1234321123', ''),
(11, '2020-12-19 05:43:00', 'Sami DEMİR', 'DEMİR İNŞAAT', 'Nakit', 'DOLAR', 8900, 'samidemir@gmail.com', '05367718994', '', '', 'TR00000000011', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(11) NOT NULL,
  `admins_namesurname` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_file` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_username` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_pass` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `admins_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `admins_must` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_namesurname`, `admins_file`, `admins_username`, `admins_pass`, `admins_status`, `admins_must`) VALUES
(9, 'Serhat DEMİR', '5fdc04474c5e3.png', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `operation`
--

CREATE TABLE `operation` (
  `operation_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `operation_date` date NOT NULL,
  `operation_type` enum('Gelir','Gider') NOT NULL,
  `operation_price` float(9,2) NOT NULL,
  `operation_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `operation`
--

INSERT INTO `operation` (`operation_id`, `account_id`, `products_id`, `operation_date`, `operation_type`, `operation_price`, `operation_description`) VALUES
(13, 5, 0, '2020-12-19', 'Gider', 5.00, 'market'),
(17, 11, 0, '2021-01-03', 'Gider', 100.00, 'Akaryakıt'),
(18, 11, 0, '2021-01-03', 'Gider', 200.00, 'Sağlık');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `products_title` varchar(255) NOT NULL,
  `products_content` text NOT NULL,
  `products_price` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`products_id`, `products_title`, `products_content`, `products_price`) VALUES
(4, 'TELEFON', '', 5000.00),
(5, 'BİLGİSAYAR', '', 3000.00),
(6, 'TABLET', '', 1000.00),
(7, 'RAM', '', 150.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `sales_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sales`
--

INSERT INTO `sales` (`sales_id`, `account_id`, `products_id`, `sales_date`) VALUES
(3, 5, 1, '2019-05-18 22:01:01'),
(4, 6, 1, '2019-05-18 22:11:52'),
(6, 5, 3, '2020-12-18 18:37:00'),
(7, 5, 3, '2020-12-18 18:37:44'),
(8, 5, 3, '2020-12-18 18:37:54'),
(9, 5, 3, '2020-12-19 04:09:08'),
(10, 9, 3, '2020-12-19 06:13:44'),
(11, 9, 5, '2021-01-03 18:50:18'),
(12, 11, 4, '2021-01-03 18:50:30'),
(13, 11, 6, '2021-01-03 19:00:34'),
(14, 9, 4, '2021-01-03 19:04:18'),
(15, 11, 5, '2021-01-03 19:07:28');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `settings_description` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `settings_key` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `settings_value` text COLLATE utf8_turkish_ci NOT NULL,
  `settings_type` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `settings_must` int(3) NOT NULL,
  `settings_delete` enum('0','1') COLLATE utf8_turkish_ci NOT NULL,
  `settings_status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`) VALUES
(1, 'Site Başlığı', 'title', 'RETOPIA', 'text', 0, '0', '1'),
(2, 'Site Açıklama', 'description', 'RETOPIA', 'text', 1, '0', '1'),
(3, 'Site Logo', 'logo', '5cd5728b06b8b.png', 'file', 2, '0', '1'),
(4, 'Fav Icon', 'icon', '5fdc04d292847.png', 'file', 4, '0', '1'),
(5, 'Anahtar Kelimeler', 'keywords', 'ödev,final', 'text', 5, '0', '1'),
(9, 'İl', 'il', 'İstanbul', 'text', 12, '0', '1'),
(19, 'Copyright', 'copyright', 'Copyright © Serhat DEMİR 2021', 'text', 7, '0', '1'),
(22, 'Site Logo Text', 'logo_text', 'RE TOPIA', 'text', 3, '0', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Tablo için indeksler `operation`
--
ALTER TABLE `operation`
  ADD PRIMARY KEY (`operation_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`);

--
-- Tablo için indeksler `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `operation`
--
ALTER TABLE `operation`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
