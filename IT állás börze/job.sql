-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Sze 06. 10:29
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `job`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `company`
--

CREATE TABLE `company` (
  `company_id` int(20) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `web` varchar(50) NOT NULL,
  `company_email` varchar(255) NOT NULL,
  `company_phone` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `company_description` varchar(1000) NOT NULL,
  `company_password` varchar(255) NOT NULL,
  `company_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `web`, `company_email`, `company_phone`, `address`, `company_description`, `company_password`, `company_date`) VALUES
(1, 'VTS', 'https://www.vts.su.ac.rs/', 'vts@gmail.com', 633332333, 'Marka Oreškovi?a 16', 'Magas informatikai iskola!', 'vts', '2022-09-01 13:13:25'),
(2, 'dudico', 'https://www.dudico.com/', 'dudico@gmail.com', 637225369, 'Dinka Zlatari?a 12, Subotica, SRB', 'informatikai termekekkel foglalkozunk!', 'dudico', '2022-09-01 13:23:18'),
(3, 'Gigatron', 'https://gigatron.rs/', 'gigatron@gmail.com', 66, 'Pariska 2, Sombor 25000', 'Informatikai eszközök eladásával foglalkozó cég.', 'gigatron', '2022-09-03 00:03:07');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mail`
--

CREATE TABLE `mail` (
  `mail_id` int(20) NOT NULL,
  `mine` varchar(255) NOT NULL,
  `his` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `mail_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user`
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `biography` varchar(1000) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `phone`, `biography`, `password`, `date`) VALUES
(1, 'Zabos', 'Bence', 'zabosdeni@gmail.com', 635555555, 'Admin2', 'denisz', '2022-09-01 14:56:48'),
(2, 'Hubi', 'Bubi', 'hubai@gmail.com', 633332333, 'Én egy 30 éves férfi vagyok. Sok tapasztalatal. Most végeztem egy informatikai középiskolát. Remekül bírom a terhelést van és könnyen kommunikálok másokkal.', 'hubai', '2022-09-01 15:13:48'),
(3, 'Nagy', 'Virág', 'virag@gmail.com', 637775777, 'Én egy 19 éves n? vagyok. Most végeztem egy informatikai középiskolát. Remekül bírom a terhelést van és könnyen kommunikálok másokkal.', 'virag', '2022-08-11 15:22:01'),
(4, 'Pet?fi', 'Sándor', 'sanyi@gmail.com', 632221115, 'Én egy 28 éves férfi vagyok. Most végeztem egy informatikai középiskolát. Remekül bírom a terhelést van és könnyen kommunikálok másokkal.', 'sanyi', '2022-09-01 15:22:01'),
(5, 'Balog', 'Robert', 'robi@gmail.com', 635556888, 'Én egy 32 éves férfi vagyok. Sok tapasztalatal. Most végeztem egy informatikai középiskolát. Remekül bírom a terhelést van és könnyen kommunikálok másokkal.', 'robi', '2022-09-02 15:22:01');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `work`
--

CREATE TABLE `work` (
  `company_id` int(20) NOT NULL,
  `work_id` int(20) NOT NULL,
  `work_address` varchar(255) NOT NULL,
  `work_description` varchar(1000) NOT NULL,
  `work_category` varchar(255) NOT NULL,
  `work_money` varchar(255) NOT NULL,
  `work_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `work`
--

INSERT INTO `work` (`company_id`, `work_id`, `work_address`, `work_description`, `work_category`, `work_money`, `work_date`) VALUES
(1, 7, 'Reon utca 12. Tornyos;', 'Egy magas iskolÃ¡t vÃ©gzett szakembert vÃ¡runk a cÃ©gÃ¼nkbe. ElÅ‘ny nagy tapasztalat Ã©s remek kommunikÃ¡ciÃ³.', 'TitkÃ¡ri munka !', 'KezdÅ‘ fizetÃ©s 50.000/hÃ³', '2022-09-05 21:02:30'),
(1, 8, 'Marka OreÅ¡koviÄ‡a 16, Subotica 450390', 'LeÃ­rÃ¡s:\r\n\r\n\r\nTitkÃ¡ri munka !\r\n\r\nEgy magas iskolÃ¡t vÃ©gzett szakembert vÃ¡runk a cÃ©gÃ¼nkbe. ElÅ‘ny nagy tapasztalat Ã©s remek kommunikÃ¡ciÃ³.', 'TanÃ¡ri munka!', 'KezdÅ‘ fizetÃ©s 30.000/hÃ³', '2021-09-05 22:09:55'),
(1, 10, 'Marka OreÅ¡koviÄ‹a 16', 'Remek munka lehetÃ¶sÃ©gek vÃ¡rnak rÃ¡d itt nÃ¡lunk. NÃ¡lunk az a legfontosabb hogy elÃ©gedett legyen a dolgozoink!', 'Irodai Ã¡llÃ¡s', '100.000/hÃ³', '2022-09-05 22:14:20'),
(2, 11, 'Dinka ZlatariÄ‡a 12, Subotica, SRB', 'remek munka lehetÃ¶sÃ©gek vÃ¡rnak rÃ¡d itt nÃ¡lunk. NÃ¡lunk az a legfontosabb hogy elÃ©gedett legyen a dolgozoink!', 'szÃ¡mÃ­tÃ³gÃ©pekhez karbantartÃ³t!', '45.000/hÃ³', '2022-09-05 22:20:25'),
(2, 12, 'Marka OreÅ¡koviÄ‹a 16, Topolya;', 'remek munka lehetÃ¶sÃ©gek vÃ¡rnak rÃ¡d itt nÃ¡lunk. NÃ¡lunk az a legfontosabb hogy elÃ©gedett legyen a dolgozoink!', 'HÃ¡lÃ³zati menedzser!', 'KezdÅ‘ fizetÃ©s 70.000/hÃ³', '2022-09-05 22:21:56'),
(2, 13, 'Marka OreÅ¡koviÄ‹a 16', 'sdvsdfsd', 'Fizika', '30.000', '2022-09-06 08:29:35');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- A tábla indexei `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mail_id`);

--
-- A tábla indexei `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `work`
--
ALTER TABLE `work`
  ADD PRIMARY KEY (`work_id`,`company_id`),
  ADD KEY `company_id` (`company_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `mail`
--
ALTER TABLE `mail`
  MODIFY `mail_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT a táblához `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT a táblához `work`
--
ALTER TABLE `work`
  MODIFY `work_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
