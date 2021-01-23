-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Oca 2021, 18:13:10
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vt`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bilgi`
--

CREATE TABLE `bilgi` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `isim` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `icerik` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bilgi`
--

INSERT INTO `bilgi` (`id`, `isim`, `icerik`) VALUES
(1, 'Site Sahibi', 'Enes Şeker'),
(2, 'Hakkımızda', 'Selamlar. Ben Enes Şeker. Mehmet Akif Ersoy Üniversitesi Yönetim Bilişim Sistemleri bölümünde okuyorum. Yazılım alanıyla ilgileniyorum. Hobi olarak yeni yerler görmeyi ve hayvanlarla vakit geçirmeyi çok seviyorum.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `egitim`
--

CREATE TABLE `egitim` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `adi` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `tipi` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `baslama` year(4) NOT NULL,
  `bitis` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `egitim`
--

INSERT INTO `egitim` (`id`, `adi`, `tipi`, `baslama`, `bitis`) VALUES
(1, 'Osmangazi Ortaokulu', 'Orta Öğretim', 2010, 2015),
(2, 'Burdur Mehmet Akif Ersoy Üniversitesi - Yönetim Bilişim Sistemleri', 'Lisans', 2015, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletisim`
--

CREATE TABLE `iletisim` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `isim` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `soyisim` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `eposta` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `mesaj` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `iletisim`
--

INSERT INTO `iletisim` (`id`, `isim`, `soyisim`, `eposta`, `mesaj`) VALUES
(1, 'Cristiano', 'Ronaldo', 'cristiano.cr7@outlook.com', 'Selam dostum ! Ben Ronaldo. Seni tanıdığıma çok sevindim. Görüşmek üzere !');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `isim` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `soyisim` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `eposta` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `sifre` varchar(512) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `isim`, `soyisim`, `eposta`, `sifre`) VALUES
(1, 'Enes', 'Şeker', 'enes.seker@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resimler`
--

CREATE TABLE `resimler` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `ad` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `resimler`
--

INSERT INTO `resimler` (`id`, `ad`) VALUES
(1, 'r1'),
(2, 'r2'),
(3, 'r3'),
(5, 'r5');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slayt`
--

CREATE TABLE `slayt` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `ad` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `slayt`
--

INSERT INTO `slayt` (`id`, `ad`) VALUES
(1, 'enes1'),
(2, 'enes2'),
(3, 'enes3');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bilgi`
--
ALTER TABLE `bilgi`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `egitim`
--
ALTER TABLE `egitim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `iletisim`
--
ALTER TABLE `iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `resimler`
--
ALTER TABLE `resimler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `slayt`
--
ALTER TABLE `slayt`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bilgi`
--
ALTER TABLE `bilgi`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `egitim`
--
ALTER TABLE `egitim`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `iletisim`
--
ALTER TABLE `iletisim`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `resimler`
--
ALTER TABLE `resimler`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `slayt`
--
ALTER TABLE `slayt`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
