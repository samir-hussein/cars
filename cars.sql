-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2020 at 11:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) UNSIGNED NOT NULL,
  `text` varchar(1000) NOT NULL,
  `text_en` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `text`, `text_en`) VALUES
(1, 'تـأسست الشركـة للسيارات عام 1984 وأصبحت رائدة فى مجال السـيــارات . تقوم الشركة للسيارات بإنماء حجم اعمالها داخل السوق المصرى لتوفير جميع إحتياجات المستهلك المصرى فى مجال السيارات وعلى اعلى مستوى من الرقى والجودة من خلال ما يقرب من 15 فرع تغطى جميع انجاء الجمهورية تعرض اكثر من 25 ماركة من السيارات تحت سقف واحد وبالتعاون مع كبرى البنوك وشركات التأمين محلية كانت او عالمية, لتحقيق خدمة مميزة وفريدة لعملاءها فقط للحفاظ على ثقتهم الغالية والتى تعد هى ثروتنا الاساسية .', 'Auto Company was established in 1984 and became a pioneer in the field of cars. Auto Company is developing its business in the Egyptian market to provide all the needs of the Egyptian consumer in the field of cars and the highest level of quality and through nearly 15 branches covering all Egypt . More than 25 brands of cars are presented under one roof and in cooperation with major banks and companies. The insurance companies to achieve a unique service for its customers to maintain their precious trust which is our main asset.');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE `home_slider` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `image`) VALUES
(1, 'home_slider5fbba3d68e8a5.webp'),
(2, 'home_slider5fbba3d08844f.webp'),
(3, 'home_slider5fbba3e3004d5.webp');

-- --------------------------------------------------------

--
-- Table structure for table `new_brands`
--

CREATE TABLE `new_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_brands`
--

INSERT INTO `new_brands` (`id`, `name`, `image`) VALUES
(11, 'BAIC', 'brand5fbbac88d6ead.webp'),
(13, 'BMW', 'new_brands5fbbad6ce75c3.webp'),
(4, 'BYD', 'brand5fbbab58c932e.webp'),
(5, 'CHANGAN', 'brand5fbbabc5746fd.webp'),
(10, 'CITROEN', 'brand5fbbac7bab65d.webp'),
(12, 'FIAT', 'brand5fbbac6107ec4.webp'),
(3, 'HONDA', 'brand5fbbab8b3cb14.webp'),
(6, 'HYUNDAI', 'brand5fbbabe1ebcdf.webp'),
(1, 'JAGUAR', 'brand5fbbab3dd9462.webp'),
(7, 'Jeep', 'brand5fbbabfc7f6cf.webp'),
(8, 'LAND ROVER', 'brand5fbbac1abc6b7.webp'),
(2, 'MG', 'brand5fbbab7b4847f.webp'),
(9, 'SUZUKI', 'brand5fbbac4b6550f.webp');

-- --------------------------------------------------------

--
-- Table structure for table `new_cars`
--

CREATE TABLE `new_cars` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(255) NOT NULL,
  `model` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `specifications_en` varchar(1000) NOT NULL,
  `specifications_ar` varchar(1000) NOT NULL,
  `active_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_cars`
--

INSERT INTO `new_cars` (`id`, `name`, `price`, `model`, `type`, `images`, `specifications_en`, `specifications_ar`, `active_image`) VALUES
(1, 'X1, X-Line', 735000, 2019, 'BMW', '[\"new_car5fd286f9a39a9.webp\",\"new_car5fd286f9a39e0.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'new_car5fd286faab991.webp'),
(2, 'BMW 2 Series, Active Tourer', 600000, 2020, 'BMW', '[\"new_car5fd2893ba8f60.webp\",\"new_car5fd2893ba8fb7.webp\",\"new_car5fd2893ba8ff6.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'new_car5fd2893c01a0c.webp'),
(3, 'X35, ellite', 285000, 2021, 'BAIC', '[\"new_car5fd28acb78804.webp\",\"new_car5fd28acb78872.webp\",\"new_car5fd28acb7889b.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'new_car5fd28acbed698.webp'),
(4, 'F3, GLI M/T', 160000, 2021, 'BYD', '[\"new_car5fd28bdc05033.webp\",\"new_car5fd28bdc050b0.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'new_car5fd28bdc266a7.webp');

-- --------------------------------------------------------

--
-- Table structure for table `used_brands`
--

CREATE TABLE `used_brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `used_brands`
--

INSERT INTO `used_brands` (`id`, `name`, `image`) VALUES
(13, 'BMW', 'brand5fbbace500627.webp'),
(2, 'BYD', 'brand5fbbab64b46da.webp'),
(5, 'CHANGAN', 'brand5fbbabd1d08e7.webp'),
(9, 'CITROEN', 'brand5fbbac722a2bd.webp'),
(11, 'FIAT', 'brand5fbbac56926c5.webp'),
(3, 'HONDA', 'brand5fbbab971a30c.webp'),
(6, 'HYUNDAI', 'brand5fbbabeb11f0f.webp'),
(1, 'JAGUAR', 'brand5fbbab4b4f62b.webp'),
(7, 'Jeep', 'brand5fbbac06e77b8.webp'),
(8, 'LAND ROVER', 'brand5fbbac257e258.webp'),
(4, 'MG', 'brand5fbbab7170dba.webp'),
(10, 'SUZUKI', 'brand5fbbac33302b9.webp');

-- --------------------------------------------------------

--
-- Table structure for table `used_cars`
--

CREATE TABLE `used_cars` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(255) NOT NULL,
  `model` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `specifications_en` varchar(255) NOT NULL,
  `specifications_ar` varchar(255) NOT NULL,
  `active_image` varchar(255) NOT NULL,
  `km` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `used_cars`
--

INSERT INTO `used_cars` (`id`, `name`, `price`, `model`, `type`, `images`, `specifications_en`, `specifications_ar`, `active_image`, `km`) VALUES
(1, 'X1, X-Line', 435000, 2015, 'BMW', '[\"used_car5fd2881233a3a.webp\",\"used_car5fd2881233a6c.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'used_car5fd2881336872.webp', '150000'),
(2, 'BMW 2 Series, Active Tourer', 300000, 2017, 'BMW', '[\"used_car5fd289dab36fe.webp\",\"used_car5fd289dab376a.webp\",\"used_car5fd289dab37aa.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'used_car5fd289db06280.webp', '100000'),
(3, 'F3, GLI M/T', 100000, 2016, 'BYD', '[\"used_car5fd28b9fa9b82.webp\",\"used_car5fd28b9fa9be5.webp\"]', 'Automatic Transmission/Air Condition/Radio/Fog Light/Centeral Lock/Engine diplasment=2000 cc/Leather Seats/Air Bag/USB/Rain Sensor/Power Mirrors/LED Gadge/Rim=18', 'ناقل حركه اوتوماتيكي/مكيف هواء/راديو/مصابيح ضباب/قفل مركزي/سعة المحرك=2000 cc/مقاعد جلد/وسائد هواء/يو إس بي/حساس مطر/مرايا كهربائية/شاشة عداد ليد/جنط=18', 'used_car5fd28b9fcc2ab.webp', '120000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `type`) VALUES
(1, 'Samir Hussein', 'samirhussein274@gmail.com', '$2y$10$8MT2VQ979F.S20jZ0T3/BOsvISgjFbbWd8Sg3.RMiF1BCq098aIqi', 'owner'),
(2, 'Admin', 'meroosamir10@gmail.com', '$2y$10$BupBev13hXs6fNhTIZg25OAorbK1VN8/h1jU6i1RGWgrvvAmhKNf6', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(255) UNSIGNED NOT NULL,
  `visitor_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `visitor_id`) VALUES
(1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `total_visits` bigint(255) NOT NULL DEFAULT 0,
  `daily_visits` bigint(255) NOT NULL DEFAULT 0,
  `today` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`total_visits`, `daily_visits`, `today`) VALUES
(84, 68, '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_brands`
--
ALTER TABLE `new_brands`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `new_cars`
--
ALTER TABLE `new_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `used_brands`
--
ALTER TABLE `used_brands`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `used_cars`
--
ALTER TABLE `used_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_slider`
--
ALTER TABLE `home_slider`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `new_brands`
--
ALTER TABLE `new_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `new_cars`
--
ALTER TABLE `new_cars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `used_brands`
--
ALTER TABLE `used_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `used_cars`
--
ALTER TABLE `used_cars`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `new_cars`
--
ALTER TABLE `new_cars`
  ADD CONSTRAINT `new_cars_ibfk_1` FOREIGN KEY (`type`) REFERENCES `new_brands` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `used_cars`
--
ALTER TABLE `used_cars`
  ADD CONSTRAINT `used_cars_ibfk_1` FOREIGN KEY (`type`) REFERENCES `used_brands` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
