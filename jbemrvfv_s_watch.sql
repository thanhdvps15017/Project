-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 04, 2023 lúc 01:30 PM
-- Phiên bản máy phục vụ: 10.3.38-MariaDB-log-cll-lve
-- Phiên bản PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jbemrvfv_s_watch`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `keywords`, `image`, `appear`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Citizen', 'citizen-2', 'null', 'null', '71', 1, 8, NULL, '2023-04-26 11:05:41'),
(2, 'Casio', 'casio', NULL, NULL, '73', 1, 2, NULL, '2023-04-25 16:35:14'),
(3, 'Longines', 'longines', NULL, NULL, '75', 1, 3, NULL, '2023-04-26 11:02:48'),
(4, 'Elio', 'elio', NULL, NULL, '74', 1, 4, NULL, NULL),
(5, 'Orienti', 'orienti', NULL, NULL, '72', 1, 5, NULL, NULL),
(6, 'Baby - G', 'baby-g', NULL, NULL, '70', 1, 6, NULL, NULL),
(8, 'Ferrari', 'ferrari', NULL, NULL, '69', 1, 7, NULL, '2023-04-26 11:04:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `quantity`, `created_at`, `updated_at`) VALUES
(28, 5, 2, 1, '2023-04-04 09:58:06', '2023-04-04 09:58:06'),
(29, 38, 2, 1, '2023-04-04 09:58:14', '2023-04-04 09:58:14'),
(33, 37, 2, 1, '2023-04-18 17:26:06', '2023-04-18 17:26:06'),
(38, 36, 7, 1, '2023-04-25 04:05:03', '2023-04-25 04:05:10'),
(39, 34, 7, 1, '2023-04-25 04:05:13', '2023-04-25 04:05:13'),
(58, 37, 1, 2, '2023-04-27 03:38:36', '2023-04-27 03:39:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `user_id` varchar(1000) DEFAULT NULL,
  `coupon_type` tinyint(4) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `min_total` int(11) NOT NULL DEFAULT 0,
  `max_discount` int(11) DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_expire` date DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupon`
--

INSERT INTO `coupon` (`id`, `coupon_code`, `user_id`, `coupon_type`, `description`, `discount`, `min_total`, `max_discount`, `date_start`, `date_expire`, `quantity`, `remaining`, `created_at`, `updated_at`) VALUES
(1, 'SWATCH2023', '[2,1,1]', 0, '', 10, 5000000, 500000, '2023-03-26', '2023-04-27', 12, -1, '2023-03-25 06:19:38', '2023-04-27 03:42:48'),
(2, 'SWATCH2022', '[1]', 0, '', 10, 5000000, 500000, '2023-04-12', '2023-04-21', 12, 1, '2023-03-25 06:19:38', '2023-04-18 17:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `email`
--

INSERT INTO `email` (`id`, `name`, `phone`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tôi muốn đặt số lượng lớn sản phẩm thì phải liên hệ nhu thế nào? Nếu đặt số lượng lớn có ưu đãi gì không?', '2023-03-25 06:05:18', '2023-03-25 06:05:18'),
(2, 'Trần Văn A', '0834659734', 'tunguyenkhoi2002.work@gmail.com', 'Tôi muốn cộng tác bán hàng trên web của các bạn. Chúng ta có thể gặp nhau để trao đổi được không?\r\n', '2023-03-25 06:06:18', '2023-03-25 06:06:18'),
(3, 'Nguyễn Văn B', '0756449832', 'abc@gmail.com', 'Chào anh chị. Em là sinh viên mới ra trường. Em có thể đăng ký làm nhân viên quản trị website bên mình được không ạ? Mong anh chị trả lời em sớm. Em xin cảm ơn ạ', '2023-03-25 06:07:16', '2023-03-25 06:07:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(500) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `name`, `url`, `alt`, `created_at`, `updated_at`) VALUES
(2, 'Component-4.jpg', 'images/Component-4.jpg', '123123123', NULL, '2023-03-15 15:31:12'),
(4, 'Rectangle-797.jpg', 'images/Rectangle-797.jpg', NULL, NULL, NULL),
(7, 'Rectangle-799.jpg', 'images/Rectangle-799.jpg', '0asdf', NULL, '2023-03-16 08:38:48'),
(8, 'shutterstock_2025488660-1.jpg', 'images/shutterstock_2025488660-1.jpg', 'asdfa', NULL, '2023-03-16 10:29:36'),
(11, 'image-3.png', 'images/image-3.png', NULL, NULL, NULL),
(12, 'image-4.png', 'images/image-4.png', NULL, NULL, NULL),
(13, 'image-5.png', 'images/image-5.png', NULL, NULL, NULL),
(14, 'image-6.png', 'images/image-6.png', NULL, NULL, NULL),
(15, 'image-7.png', 'images/image-7.png', NULL, NULL, NULL),
(17, 'email.png', 'images/email.png', NULL, NULL, NULL),
(18, 'facebook.png', 'images/facebook.png', NULL, NULL, NULL),
(19, 'icon_home_4.png', 'images/icon_home_4.png', NULL, NULL, NULL),
(20, 'icon_home_5.png', 'images/icon_home_5.png', NULL, NULL, NULL),
(21, 'icon_home_6.png', 'images/icon_home_6.png', NULL, NULL, NULL),
(22, 'icon_home_7.png', 'images/icon_home_7.png', NULL, NULL, NULL),
(23, 'icon_home_8.png', 'images/icon_home_8.png', NULL, NULL, NULL),
(24, 'instagram.png', 'images/instagram.png', NULL, NULL, NULL),
(25, 'youtube.png', 'images/youtube.png', NULL, NULL, NULL),
(26, 'zalo.png', 'images/zalo.png', NULL, NULL, NULL),
(27, 'contact.jpg', 'images/contact.jpg', NULL, NULL, NULL),
(28, 'banner_1.jpg', 'images/banner_1.jpg', NULL, NULL, NULL),
(32, 'page_logo_2.png', 'images/page_logo_2.png', NULL, NULL, NULL),
(34, 'demo.jpg', 'images/demo.jpg', NULL, NULL, NULL),
(35, 'img-01.webp', 'images/img-01.webp', NULL, '2023-03-17 17:27:02', NULL),
(37, 'ava_default.png', 'images/ava_default.png', NULL, '2023-03-17 17:27:29', NULL),
(39, 'Asset-2-1.png', 'images/Asset-2-1.png', NULL, '2023-03-18 05:07:46', NULL),
(40, 'image-removebg-preview-(2).png', 'images/image-removebg-preview-(2).png', NULL, '2023-03-18 12:27:48', NULL),
(41, 'image-removebg-preview-(1).png', 'images/image-removebg-preview-(1).png', NULL, '2023-03-18 12:27:48', NULL),
(42, 'image-removebg-preview.png', 'images/image-removebg-preview.png', NULL, '2023-03-18 12:27:48', NULL),
(43, 'image-removebg-preview-(4).png', 'images/image-removebg-preview-(4).png', NULL, '2023-03-18 12:28:33', NULL),
(44, 'image-removebg-preview-(3).png', 'images/image-removebg-preview-(3).png', NULL, '2023-03-18 12:28:33', NULL),
(45, 'favicon.png', 'images/favicon.png', NULL, '2023-03-25 03:16:21', NULL),
(46, '10-checklist-giup-dong-ho-tai-hai-trieu-chat-luong-hon-doi-thu.webp', 'images/10-checklist-giup-dong-ho-tai-hai-trieu-chat-luong-hon-doi-thu.webp', NULL, '2023-03-25 04:52:47', NULL),
(47, '12.jpeg', 'images/12.jpeg', NULL, '2023-03-25 04:52:47', NULL),
(48, 'anhbia-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.webp', 'images/anhbia-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.webp', NULL, '2023-03-25 04:52:47', NULL),
(49, 'banner-DONG-HO-TISSOT.webp', 'images/banner-DONG-HO-TISSOT.webp', NULL, '2023-03-25 04:52:47', NULL),
(50, 'bia-cach-do-chon-size-dong-ho-deo-tay-nam-nu-chuan-de-hieu.jpeg', 'images/bia-cach-do-chon-size-dong-ho-deo-tay-nam-nu-chuan-de-hieu.jpeg', NULL, '2023-03-25 04:52:47', NULL),
(51, 'bia-giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong.webp', 'images/bia-giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong.webp', NULL, '2023-03-25 04:52:47', NULL),
(52, 'bia-review-dong-ho-fc-moonphase-va-top-mau-ban-chay-nhat.webp', 'images/bia-review-dong-ho-fc-moonphase-va-top-mau-ban-chay-nhat.webp', NULL, '2023-03-25 04:52:47', NULL),
(53, 'bia-tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-hai-trieu.webp', 'images/bia-tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-hai-trieu.webp', NULL, '2023-03-25 04:52:47', NULL),
(54, 'cach-chinh-dong-ho-casio-3-nut-cuc-don-gian-nhanh-de-CASIO-LA670WGA-6DF-2.webp', 'images/cach-chinh-dong-ho-casio-3-nut-cuc-don-gian-nhanh-de-CASIO-LA670WGA-6DF-2.webp', NULL, '2023-03-25 04:52:47', NULL),
(55, 'cach-lam-mem-day-da-dong-ho-1.jpg', 'images/cach-lam-mem-day-da-dong-ho-1.jpg', NULL, '2023-03-25 04:52:47', NULL),
(56, 'cau-tao-dong-ho-deo-tay-1.jpg', 'images/cau-tao-dong-ho-deo-tay-1.jpg', NULL, '2023-03-25 04:52:47', NULL),
(57, 'Chinh-sach-mua-tra-gop-Dong-Ho-Hai-Trieu.webp', 'images/Chinh-sach-mua-tra-gop-Dong-Ho-Hai-Trieu.webp', NULL, '2023-03-25 04:52:47', NULL),
(58, 'do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da.webp', 'images/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da.webp', NULL, '2023-03-25 04:52:47', NULL),
(59, 'dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu.webp', 'images/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu.webp', NULL, '2023-03-25 04:52:47', NULL),
(60, 'dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu.webp', 'images/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu.webp', NULL, '2023-03-25 04:52:58', NULL),
(61, 'dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu.webp', 'images/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu.webp', NULL, '2023-03-25 04:52:58', NULL),
(62, 'dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua.webp', 'images/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua.webp', NULL, '2023-03-25 04:52:58', NULL),
(63, 'dong-ho-orient-noi-dia-nhat-1024x717.jpg', 'images/dong-ho-orient-noi-dia-nhat-1024x717.jpg', NULL, '2023-03-25 04:52:58', NULL),
(64, 'doxa-banner-dong-ho-kim-cuong.webp', 'images/doxa-banner-dong-ho-kim-cuong.webp', NULL, '2023-03-25 04:52:58', NULL),
(65, 'Longines_Heritage_Weems_Second-Setting_Watch_L2.713.4.13-1.webp', 'images/Longines_Heritage_Weems_Second-Setting_Watch_L2.713.4.13-1.webp', NULL, '2023-03-25 04:52:58', NULL),
(66, 'sokolov-banner.webp', 'images/sokolov-banner.webp', NULL, '2023-03-25 04:52:58', NULL),
(67, 'thep-khong-gi-316l-4.jpg', 'images/thep-khong-gi-316l-4.jpg', NULL, '2023-03-25 04:52:58', NULL),
(68, 'tho-sua-dong-ho-luong-bao-nhieu-hoc-o-dau-can-to-chat-gi-bia.webp', 'images/tho-sua-dong-ho-luong-bao-nhieu-hoc-o-dau-can-to-chat-gi-bia.webp', NULL, '2023-03-25 04:52:58', NULL),
(69, 'Ferrari-l-220x48.jpg', 'images/Ferrari-l-220x48.jpg', NULL, '2023-03-25 05:29:35', NULL),
(70, 'Baby-G7264-b_39.jpg', 'images/Baby-G7264-b_39.jpg', NULL, '2023-03-25 05:29:35', NULL),
(71, 'Citizen7264-b_41.jpg', 'images/Citizen7264-b_41.jpg', NULL, '2023-03-25 05:29:35', NULL),
(72, 'ORIENTl-220x48.jpg', 'images/ORIENTl-220x48.jpg', NULL, '2023-03-25 05:29:35', NULL),
(73, 'Casio7264-b_39.jpg', 'images/Casio7264-b_39.jpg', NULL, '2023-03-25 05:29:35', NULL),
(74, 'Elio7264-b_49.jpg', 'images/Elio7264-b_49.jpg', NULL, '2023-03-25 05:29:35', NULL),
(75, 'logo-longines_1617939728.png', 'images/logo-longines_1617939728.png', NULL, '2023-03-25 05:29:35', NULL),
(76, 'banner_6.jpg', 'images/banner_6.jpg', NULL, '2023-04-04 08:41:42', NULL),
(77, 'banner.jpg', 'images/banner.jpg', NULL, '2023-04-04 08:43:25', NULL),
(78, 'banner_2.jpg', 'images/banner_2.jpg', NULL, '2023-04-04 08:43:26', NULL),
(79, 'banner_3.jpg', 'images/banner_3.jpg', NULL, '2023-04-04 08:43:26', NULL),
(80, 'banner_4.jpg', 'images/banner_4.jpg', NULL, '2023-04-04 08:43:26', NULL),
(81, 'banner_5.jpg', 'images/banner_5.jpg', NULL, '2023-04-04 08:43:26', NULL),
(82, '156.30.00.000.05.01.2.webp', 'images/156.30.00.000.05.01.2.webp', NULL, '2023-04-04 10:52:30', NULL),
(83, '127.30.00.001.01.01.2-699x699.webp', 'images/127.30.00.001.01.01.2-699x699.webp', NULL, '2023-04-04 10:52:30', NULL),
(84, '136.30.00.000.03.01.2.webp', 'images/136.30.00.000.03.01.2.webp', NULL, '2023-04-04 10:52:30', NULL),
(85, '155.30.00.000.01.02.2.webp', 'images/155.30.00.000.01.02.2.webp', NULL, '2023-04-04 10:52:30', NULL),
(86, '153.30.00.001.06.01.2.webp', 'images/153.30.00.001.06.01.2.webp', NULL, '2023-04-04 10:52:30', NULL),
(87, '140.01.71.000.02.01.2.webp', 'images/140.01.71.000.02.01.2.webp', NULL, '2023-04-04 10:52:30', NULL),
(88, '53768-GPZSVGP-2.webp', 'images/53768-GPZSVGP-2.webp', NULL, '2023-04-04 10:52:30', NULL),
(89, '80737-RGMRRG-2S.webp', 'images/80737-RGMRRG-2S.webp', NULL, '2023-04-04 10:52:30', NULL),
(90, '53442-GPMWGP-2A.webp', 'images/53442-GPMWGP-2A.webp', NULL, '2023-04-04 10:52:30', NULL),
(91, '53229-SVMWSV-4.webp', 'images/53229-SVMWSV-4.webp', NULL, '2023-04-04 10:52:30', NULL),
(92, '53229-RGMWRG-5.webp', 'images/53229-RGMWRG-5.webp', NULL, '2023-04-04 10:52:30', NULL),
(93, 'T006.407.11.033.00.webp', 'images/T006.407.11.033.00.webp', NULL, '2023-04-04 10:52:30', NULL),
(94, 'T063.907.36.038.00.webp', 'images/T063.907.36.038.00.webp', NULL, '2023-04-04 10:52:30', NULL),
(95, 'T063.610.22.037.00.webp', 'images/T063.610.22.037.00.webp', NULL, '2023-04-04 10:52:30', NULL),
(96, 'T097.410.11.038.00.webp', 'images/T097.410.11.038.00.webp', NULL, '2023-04-04 10:52:30', NULL),
(97, 'T101.417.23.061.00-699x699.webp', 'images/T101.417.23.061.00-699x699.webp', NULL, '2023-04-04 10:52:30', NULL),
(98, '415_D201RSV-3-699x699.webp', 'images/415_D201RSV-3-699x699.webp', NULL, '2023-04-04 10:52:30', NULL),
(99, '46_D220SSV.webp', 'images/46_D220SSV.webp', NULL, '2023-04-04 10:52:30', NULL),
(100, '3_53555-SVMWSV-2-699x699.webp', 'images/3_53555-SVMWSV-2-699x699.webp', NULL, '2023-04-04 10:52:30', NULL),
(101, 'T063.617.36.037.00-699x699.webp', 'images/T063.617.36.037.00-699x699.webp', NULL, '2023-04-04 10:52:30', NULL),
(102, '46_D220SSV-699x699.webp', 'images/46_D220SSV-699x699.webp', 'DOXA EXECUTIVE HOMME D211SSV', '2023-04-04 10:54:05', '2023-04-04 11:11:19'),
(103, '430_D211SSV.jpg', 'images/430_D211SSV.jpg', NULL, '2023-04-04 10:54:05', NULL),
(104, '49_D224RGY-699x699.webp', 'images/49_D224RGY-699x699.webp', NULL, '2023-04-04 10:54:05', NULL),
(105, '6_D154TWH-699x699.webp', 'images/6_D154TWH-699x699.webp', NULL, '2023-04-04 10:54:05', NULL),
(107, 'page_logo.png', 'images/page_logo.png', NULL, '2023-04-11 04:55:32', NULL),
(108, '53555-SVMWSV-2.jpeg', 'images/53555-SVMWSV-2.jpeg', NULL, '2023-04-11 17:33:13', NULL),
(109, 'Saga-53555-SVMWSV-2-2-1.jpeg', 'images/Saga-53555-SVMWSV-2-2-1.jpeg', NULL, '2023-04-11 17:33:13', NULL),
(110, 'Saga-53555-SVMWSV-2-4.jpeg', 'images/Saga-53555-SVMWSV-2-4.jpeg', NULL, '2023-04-11 17:33:13', NULL),
(111, '136_30_00_000_03_01_2-106_30_00_001_06_01_2.jpeg', 'images/136_30_00_000_03_01_2-106_30_00_001_06_01_2.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(112, '136_30_00_000_03_01_2-106_30_00_001_06_01_2-120_30_00_000_01_01_2.jpeg', 'images/136_30_00_000_03_01_2-106_30_00_001_06_01_2-120_30_00_000_01_01_2.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(113, '870_T101_417_23_061_00.jpeg', 'images/870_T101_417_23_061_00.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(114, '53229-RGMWRG-5_1.jpeg', 'images/53229-RGMWRG-5_1.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(115, '53229-SVMWSV-4-3.jpeg', 'images/53229-SVMWSV-4-3.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(116, 'T101_410_26_031_00_2.jpeg', 'images/T101_410_26_031_00_2.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(117, 'T101_410_26_031_00_3.jpeg', 'images/T101_410_26_031_00_3.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(118, 'T101_410_26_031_00_6.jpeg', 'images/T101_410_26_031_00_6.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(119, 'Tissot-T101_417_23_061_00-2.jpeg', 'images/Tissot-T101_417_23_061_00-2.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(120, 'Tissot-T101_417_23_061_00-3.jpeg', 'images/Tissot-T101_417_23_061_00-3.jpeg', NULL, '2023-04-11 17:34:52', NULL),
(121, 'D211SSV-699x699.webp', 'images/D211SSV-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(122, 'DOXA-D211SSV-0-699x699.webp', 'images/DOXA-D211SSV-0-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(123, 'DOXA-D211SSV-2-699x699.webp', 'images/DOXA-D211SSV-2-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(124, 'D220SSV-1-699x699.webp', 'images/D220SSV-1-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(125, 'D220SSV-3-699x699.webp', 'images/D220SSV-3-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(126, 'D220SSV-4-699x699.webp', 'images/D220SSV-4-699x699.webp', NULL, '2023-04-11 17:34:52', NULL),
(128, '53442-GPMWGP-2A_1.jpg', 'images/53442-GPMWGP-2A_1.jpg', NULL, '2023-04-11 17:41:07', NULL),
(129, '53442-GPMWGP-2A_2.jpg', 'images/53442-GPMWGP-2A_2.jpg', NULL, '2023-04-11 17:41:07', NULL),
(130, '53442-GPMWGP-2A_3.jpg', 'images/53442-GPMWGP-2A_3.jpg', NULL, '2023-04-11 17:41:07', NULL),
(131, '80737-RGMRRG-2L-4.jpg', 'images/80737-RGMRRG-2L-4.jpg', NULL, '2023-04-11 17:41:59', NULL),
(132, '80737-RGMRRG-2S.jpg', 'images/80737-RGMRRG-2S.jpg', NULL, '2023-04-11 17:41:59', NULL),
(133, '80737-RGMRRG-2S_2.jpg', 'images/80737-RGMRRG-2S_2.jpg', NULL, '2023-04-11 17:41:59', NULL),
(134, '80737-RGMRRG-2S_3.jpg', 'images/80737-RGMRRG-2S_3.jpg', NULL, '2023-04-11 17:41:59', NULL),
(135, '53768-GPZSVGP-2_2.jpg', 'images/53768-GPZSVGP-2_2.jpg', NULL, '2023-04-11 17:42:43', NULL),
(136, 'saga-53768-lgmwlg-2-nu-quartz-pin-day-kim-loai-mat-so-30mm-1.webp', 'images/saga-53768-lgmwlg-2-nu-quartz-pin-day-kim-loai-mat-so-30mm-1.webp', NULL, '2023-04-11 17:42:43', NULL),
(137, 'saga-53768-lgmwlg-2-nu-quartz-pin-day-kim-loai-mat-so-30mm-2.webp', 'images/saga-53768-lgmwlg-2-nu-quartz-pin-day-kim-loai-mat-so-30mm-2.webp', NULL, '2023-04-11 17:42:43', NULL),
(138, '155.30.00.000.01.02.2_2.jpg', 'images/155.30.00.000.01.02.2_2.jpg', NULL, '2023-04-11 17:44:20', NULL),
(139, 'sokolov_box.jpg', 'images/sokolov_box.jpg', NULL, '2023-04-11 17:44:20', NULL),
(143, '127.30.00.001.01.01.2_2.jpg', 'images/127.30.00.001.01.01.2_2.jpg', NULL, '2023-04-11 17:46:53', NULL),
(144, '136.30.00.000.03.01.2_2.jpg', 'images/136.30.00.000.03.01.2_2.jpg', NULL, '2023-04-11 17:48:56', NULL),
(145, '136.30.00.000.03.01.2-106.30.00.001.06.01.2.jpg', 'images/136.30.00.000.03.01.2-106.30.00.001.06.01.2.jpg', NULL, '2023-04-11 17:48:56', NULL),
(146, '136.30.00.000.03.01.2-106.30.00.001.06.01.2-120.30.00.000.01.01.2.jpg', 'images/136.30.00.000.03.01.2-106.30.00.001.06.01.2-120.30.00.000.01.01.2.jpg', NULL, '2023-04-11 17:48:56', NULL),
(147, '140.01.71.000.02.01.2_2.jpg', 'images/140.01.71.000.02.01.2_2.jpg', NULL, '2023-04-11 17:49:44', NULL),
(148, 'sokolov_box_2.jpg', 'images/sokolov_box_2.jpg', NULL, '2023-04-11 17:49:44', NULL),
(149, '153.30.00.001.06.01.2_2.jpg', 'images/153.30.00.001.06.01.2_2.jpg', NULL, '2023-04-11 17:51:19', NULL),
(150, '641d638cdcb825e67ca9_7878db8bbd18426291d87f78dd841931_master.webp', 'images/641d638cdcb825e67ca9_7878db8bbd18426291d87f78dd841931_master.webp', NULL, '2023-04-11 17:52:09', NULL),
(151, '718853da35eeccb095ff_003227c34c184deca68bffdd25a0eb38_master.webp', 'images/718853da35eeccb095ff_003227c34c184deca68bffdd25a0eb38_master.webp', NULL, '2023-04-11 17:52:09', NULL),
(152, 'e5572c0e4a3ab364ea2b_f121cc61234f4140bffd83b0e0fab9ca_master.webp', 'images/e5572c0e4a3ab364ea2b_f121cc61234f4140bffd83b0e0fab9ca_master.webp', NULL, '2023-04-11 17:52:09', NULL),
(153, 'e70369520f66f638af77_0917eb24ca7d4ab1a7ca210c2248ba5e_master.webp', 'images/e70369520f66f638af77_0917eb24ca7d4ab1a7ca210c2248ba5e_master.webp', NULL, '2023-04-11 17:52:09', NULL),
(154, '4ee4ce9d4b2fb271eb3e_e42d6ec658e745bb9aaec8b788ce4d2d_master.webp', 'images/4ee4ce9d4b2fb271eb3e_e42d6ec658e745bb9aaec8b788ce4d2d_master.webp', NULL, '2023-04-11 17:53:32', NULL),
(155, '8a448d6e08dcf182a8cd_01db892810b84486bf1f09c3f2a89726_master.webp', 'images/8a448d6e08dcf182a8cd_01db892810b84486bf1f09c3f2a89726_master.webp', NULL, '2023-04-11 17:53:32', NULL),
(156, '26d3765cf3ee0ab053ff_f243466af36d4cb8a1095643c18857e6_master.webp', 'images/26d3765cf3ee0ab053ff_f243466af36d4cb8a1095643c18857e6_master.webp', NULL, '2023-04-11 17:53:32', NULL),
(157, '3479a0972425dd7b8434_21af02e8658d439ca030511cd82f1d6a_master.webp', 'images/3479a0972425dd7b8434_21af02e8658d439ca030511cd82f1d6a_master.webp', NULL, '2023-04-11 17:53:32', NULL),
(158, 'T063_610_22_037_00-1.jpeg', 'images/T063_610_22_037_00-1.jpeg', NULL, '2023-04-12 01:44:07', NULL),
(159, 'T063_610_22_037_00-5.jpeg', 'images/T063_610_22_037_00-5.jpeg', NULL, '2023-04-12 01:44:07', NULL),
(160, 'T063_610_22_037_00-T063_210_22_037-1.jpeg', 'images/T063_610_22_037_00-T063_210_22_037-1.jpeg', NULL, '2023-04-12 01:44:07', NULL),
(161, 'T063_610_22_037_00-T063_210_22_037-3.jpeg', 'images/T063_610_22_037_00-T063_210_22_037-3.jpeg', NULL, '2023-04-12 01:44:07', NULL),
(162, 'T097.410.11.038.004.jpg', 'images/T097.410.11.038.004.jpg', NULL, '2023-04-12 01:45:59', NULL),
(163, 'z3366231970132_45a4e4a76dee8552d5c0a86439b92a22_9d471d2497c548b8b04892c18811b5e9_master.webp', 'images/z3366231970132_45a4e4a76dee8552d5c0a86439b92a22_9d471d2497c548b8b04892c18811b5e9_master.webp', NULL, '2023-04-12 01:45:59', NULL),
(164, 'z3366232196972_aacbfdf3204a3a4e99129c7f2c696cd9_881527f64b2a4dd0a1edd028de029210_master.webp', 'images/z3366232196972_aacbfdf3204a3a4e99129c7f2c696cd9_881527f64b2a4dd0a1edd028de029210_master.webp', NULL, '2023-04-12 01:46:00', NULL),
(165, 'T101.410.26.031.00.jpg', 'images/T101.410.26.031.00.jpg', NULL, '2023-04-12 01:50:06', NULL),
(166, 'T063.617.36.037.00-1.jpg', 'images/T063.617.36.037.00-1.jpg', NULL, '2023-04-12 01:53:55', NULL),
(167, 'T063.617.36.037.00-2.jpg', 'images/T063.617.36.037.00-2.jpg', NULL, '2023-04-12 01:53:55', NULL),
(168, 'T063.617.36.037.00-5.jpg', 'images/T063.617.36.037.00-5.jpg', NULL, '2023-04-12 01:53:55', NULL),
(169, '415_D201RSV-2.jpeg', 'images/415_D201RSV-2.jpeg', '415_D201RSV-2', '2023-04-12 01:55:54', '2023-04-26 07:28:04'),
(170, 'D201RSV-699x699.webp', 'images/D201RSV-699x699.webp', NULL, '2023-04-12 01:55:54', NULL),
(171, 'Doxa-Box.jpeg', 'images/Doxa-Box.jpeg', NULL, '2023-04-12 01:55:54', NULL),
(172, '7_D156RBY-699x699.webp', 'images/7_D156RBY-699x699.webp', 'DOXA-D156RBY-0', '2023-04-12 02:07:08', '2023-04-26 07:27:54'),
(173, 'DOXA-D156RBY-0-699x699.webp', 'images/DOXA-D156RBY-0-699x699.webp', 'DOXA-D156RBY-0', '2023-04-12 02:07:08', '2023-04-26 07:27:51'),
(174, 'DOXA-D156RBY-1-699x699.webp', 'images/DOXA-D156RBY-1-699x699.webp', 'DOXA-D156RBY-0', '2023-04-12 02:07:08', '2023-04-26 07:27:46'),
(175, 'DOXA-D156RBY-2-699x699.jpg', 'images/DOXA-D156RBY-2-699x699.jpg', 'DOXA-D156RBY-2', '2023-04-12 02:07:08', '2023-04-26 07:27:59'),
(176, '9_D154TWH-699x699.webp', 'images/9_D154TWH-699x699.webp', 'DOXA-D224RGY', '2023-04-12 02:10:15', '2023-04-17 15:57:26'),
(177, 'DOXA-D154TWH-0-699x699.webp', 'images/DOXA-D154TWH-0-699x699.webp', 'DOXA-D154TWH', '2023-04-12 02:10:15', '2023-04-17 15:55:44'),
(178, 'DOXA-D154TWH-1-699x699.webp', 'images/DOXA-D154TWH-1-699x699.webp', 'DOXA-D154TWH', '2023-04-12 02:10:15', '2023-04-17 16:07:24'),
(179, 'DOXA-D154TWH-2.webp', 'images/DOXA-D154TWH-2.webp', NULL, '2023-04-12 02:10:15', NULL),
(180, 'DOXA-D224RGY-0-1-699x699.webp', 'images/DOXA-D224RGY-0-1-699x699.webp', 'DOXA-D224RGY', '2023-04-12 02:11:58', '2023-04-17 16:14:26'),
(181, 'DOXA-D224RGY-0-699x699.webp', 'images/DOXA-D224RGY-0-699x699.webp', 'DOXA-D224RGY', '2023-04-12 02:11:58', '2023-04-17 15:57:36'),
(182, 'DOXA-D224RGY-1-1-699x699.webp', 'images/DOXA-D224RGY-1-1-699x699.webp', 'DOXA-D224RGY', '2023-04-12 02:11:58', '2023-04-25 17:35:57'),
(183, 'DOXA-D224RGY-2-1.webp', 'images/DOXA-D224RGY-2-1.webp', 'DOXA-D154TWH', '2023-04-12 02:11:58', '2023-04-17 15:55:30'),
(188, 'home_banner_3-min.jpg', 'images/home_banner_3-min.jpg', NULL, '2023-04-21 16:52:15', NULL),
(189, 'home_banner-min.jpg', 'images/home_banner-min.jpg', NULL, '2023-04-21 16:52:15', NULL),
(190, 'home_banner_2-min.jpg', 'images/home_banner_2-min.jpg', NULL, '2023-04-21 16:52:15', NULL),
(191, 'Rectangle-695-min.png', 'images/Rectangle-695-min.png', NULL, '2023-04-21 16:59:08', NULL),
(192, 'bg-1-min.png', 'images/bg-1-min.png', NULL, '2023-04-21 16:59:08', NULL),
(193, 'citizen-nh8391-51x-nam-7.jpg', 'images/citizen-nh8391-51x-nam-7.jpg', NULL, '2023-04-26 14:48:59', NULL),
(194, 'citizen-nh8391-51x-nam-1-1.jpg', 'images/citizen-nh8391-51x-nam-1-1.jpg', NULL, '2023-04-26 14:49:05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_02_01_105046_create_coupon_table', 1),
(5, '2023_02_01_105210_create_pages_table', 1),
(6, '2023_02_01_131139_create_brands_table', 1),
(7, '2023_02_01_131202_create_product_categories_table', 1),
(8, '2023_02_01_131314_create_news_categories_table', 1),
(9, '2023_02_01_131457_create_users_table', 1),
(10, '2023_02_01_165910_create_email_table', 1),
(11, '2023_02_10_131100_create_products_table', 1),
(12, '2023_02_10_131224_create_product_comments_table', 1),
(13, '2023_02_10_131239_create_product_details_table', 1),
(14, '2023_02_10_131258_create_news_table', 1),
(15, '2023_02_10_131332_create_news_comments_table', 1),
(16, '2023_02_10_131405_create_carts_table', 1),
(17, '2023_02_10_131421_create_orders_table', 1),
(18, '2023_02_10_131441_create_order_detail_table', 1),
(19, '2023_02_25_160955_create_permission_tables', 1),
(20, '2023_03_05_105222_create_page_meta_table', 1),
(21, '2023_03_15_181611_create_media_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(9, 'App\\Models\\User', 6),
(10, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 6),
(2, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `summary` varchar(1000) DEFAULT NULL,
  `content` text NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `hot` tinyint(4) NOT NULL DEFAULT 0,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `summary`, `content`, `keywords`, `view`, `hot`, `appear`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '50', 'CÙNG MỘT SẢN PHẨM, ĐỒNG HỒ Ở S_WATCH KHÁC GÌ SO VỚI NHỮNG NƠI KHÁC?', 'cung-mot-san-pham-dong-ho-o-swatch-khac-gi-so-voi-nhung-noi-khac', 'Có rất nhiều nơi bán cũng một mẫu mã đồng hồ, vậy sản phẩm của S_Watch có gì khác so với những nơi khác mà nhiều người tin tưởng lựa chọn và trở thành khách hàng trung thành như vậy?', '<h2><strong>CÙNG MỘT MẪU MÃ, HÀNG Ở S_WATCH CÓ GÌ KHÁC BIỆT?</strong></h2><p>Là đại lý bán lẻ đồng hồ nổi tiếng có thể nói S_Watch chính là cái tên “cộm cán” trong thị trường phân phối đồng hồ. Rất nhiều người thắc mắc rằng, liệu cùng một sản phẩm thì đồng hồ ở S_Watch có gì khác biệt so với những nơi bán khác?&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2021/09/cung-mot-san-pham-dong-ho-o-hai-trieu-co-gi-khac-so-voi-nhung-noi-khac-1.jpg\" alt=\"Cùng một sản phẩm, đồng hồ ở Hải Triều khác gì so với những nơi khác? - Ảnh: 1\"></figure><p><i>Dù là cùng một mẫu mã sản phẩm, nhưng nếu mua từ những nơi khác nhau, người dùng sẽ nhận được những giá trị hoàn toàn khác nhau</i></p><h3><strong>1. LÀ HÀNG LOẠI 1, ĐƯỢC KỸ THUẬT VIÊN KIỂM TRA BẰNG TAY TRƯỚC KHI PHÂN PHỐI</strong></h3><p>Do là đại lý lớn có uy tín lâu đời nên S_Watch có một “đặc quyền” mà hiếm có đại lý nào có được, đó là S_Watch được quyền kiểm tra đồng hồ bằng tay trước khi đồng ý nhận phân phối.</p><p>S_Watch thiết lập một quy trình kiểm tra nghiêm ngặt: Sau khi nhận sản phẩm từ Nhà phân phối, tất cả các sản phẩm được đội ngũ kỹ thuật viên tại Hải Triều kiểm tra kỹ lưỡng bằng tay, nếu có bất kỳ vết trầy xước hay dấu hiệu “xấu” nào ở vẻ ngoài thì sản phẩm sẽ bị vận chuyển ngược lại cho Nhà phân phối.</p><p>Ở S_Watch, dù sản phẩm có giá rẻ hay đắt thì đều được kiểm tra như nhau, đảm bảo chất lượng xứng đáng với số tiền mà khách hàng bỏ ra, sẽ không có chuyện quảng cáo quá đà trong khi chất lượng sản phẩm không được đảm bảo như nhiều nơi bán khác.</p><p>Uy tín chính là yếu tố đầu tiên mà khách hàng nhắc đến mỗi khi nghĩ về hệ thống S_Watch. Tất cả sản phẩm tại S_Watch đều được cam kết chính hãng, có đầy đủ giấy chứng nhận uỷ quyền từ hãng, nếu phát hiện hàng giả thì sẽ đền gấp 10 lần.</p><h3><strong>2. MẪU MÃ MỚI ĐƯỢC CẬP NHẬT LIÊN TỤC, PHÂN PHỐI ĐỘC QUYỀN&nbsp;</strong></h3><p>Do có <a href=\"https://donghohaitrieu.com/kinh-nghiem\">kinh nghiệm</a> kinh doanh trong lĩnh vực đã lâu, S_Watch nhạy bén hơn trong việc cập nhật những mẫu mã mới, hot trend. Đơn cử, S_Watch là đại lý đầu tiên tại Việt Nam mở bán <a href=\"https://donghohaitrieu.com/bo-suu-tap/citizen-c7\">đồng hồ Citizen C7</a> – bộ sưu tập đình đám của thương hiệu <a href=\"https://donghohaitrieu.com/brand/Citizen\">Citizen</a> được ra mắt hồi cuối năm 2020.</p><p>Mới đây nhất, S_Watch cũng đã nhanh chóng trình làng sản phẩm cùng các bài viết, video <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/review-dong-ho\">review</a> (đánh giá) chi tiết các bộ sưu tập mới, được các tín đồ săn lùng nhất từ các hãng lớn như DW 5-Link, Citizen Tsuyosa (NJ01), Fossil Scarlette, Orient Hodinky,…</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2021/09/cung-mot-san-pham-dong-ho-o-hai-trieu-khac-gi-so-voi-nhung-noi-khac-4.jpg\" alt=\"Cùng một sản phẩm, đồng hồ ở Hải Triều khác gì so với những nơi khác - Ảnh 4\"></figure><p><i>Phiên bản Citizen Tsuyosa mạnh mẽ, năng động “HOT” trên các diễn đàn đồng hồ nổi tiếng đã góp mặt tại S_Watch – Ảnh: Citizen </i><a href=\"https://donghohaitrieu.com/san-pham/citizen-nj0150-81a-nam-kinh-sapphire-automatic-tu-dong-day-kim-loai-mat-so-40mm\"><i>NJ0150-81A</i></a><i>, </i><a href=\"https://donghohaitrieu.com/san-pham/citizen-nj0155-87e-nam-kinh-sapphire-automatic-tu-dong-day-kim-loai-mat-so-40mm\"><i>NJ0155-87E</i></a><i>, </i><a href=\"https://donghohaitrieu.com/san-pham/citizen-nj0155-87e-nam-kinh-sapphire-automatic-tu-dong-day-kim-loai-mat-so-40mm\"><i>NJ0154-80H</i></a><i>&nbsp;</i></p>', 'Đồng hồ S_Watch, Đồng hồ Swatch có tốt không, Review Swatch, Có nên mua đồng hồ Swatch, So sánh đồng hồ Swatch', 0, 1, 1, '2023-03-21 22:12:15', '2023-04-12 16:13:41'),
(3, 1, 1, '59', 'MUA ĐỒNG HỒ TRẢ GÓP 0% TẠI S_WATCH QUA MIRAE ASSET', 'mua-dong-ho-tra-gop-0-tai-swatch-qua-mirae-asset', 'Với mong muốn tạo điều kiện cho nhiều khách hàng có cơ hội sở hữu đồng hồ chính hãng, Hải Triều đã liên liên kết với các ngân hàng và công ty tài chính uy tín Mirae Asset để triển khai chương trình mua đồng hồ trả góp với nhiều hình thức thanh toán đa dạng.', '<h2><strong>CHƯƠNG TRÌNH MUA ĐỒNG HỒ TRẢ GÓP BẰNG MIRAE ASSET&nbsp;</strong></h2><p>Giờ đây, những tín đồ đam mê đồng hồ tại thị trường Việt Nam hoàn toàn có cơ hội sở hữu đồng hồ chính hãng từ nhiều quốc gia trên thế giới, mà không cần bỏ ra số tiền ban đầu quá lớn nhờ chính sách mua đồng hồ trả góp đang được áp dụng tại S_Watch.</p><h3><strong>MUA ĐỒNG HỒ TRẢ GÓP QUA MIRAE ASSET</strong></h3><p>Mirae Asset là công ty tài chính của Hàn Quốc, được thành lập vào năm 1997. Với ưu điểm giải ngân nhanh, bảo mật thông tin, hỗ trợ đa dạng phương thức thanh toán. Do đó, bạn sẽ yên tâm mua đồng hồ trả góp qua Mirae Asset.</p><p><strong>Cách 1: Trả góp Online bằng thẻ tín dụng</strong></p><ul><li>Điều kiện: Áp dụng cho đơn hàng từ 3.000.000 VNĐ</li></ul><p><strong>Cách 2: Trả góp trực tiếp tại cửa hàng</strong></p><p><strong>►&nbsp;Điều kiện</strong></p><ul><li>Áp dụng cho đơn hàng từ 2.250.000 VNĐ</li><li>Đơn hàng dưới 15 triệu cần có CMND, Bằng lái xe</li><li>Đơn hàng trên 15 triệu cần có CMND, Bằng lái xe và Sổ hộ khẩu</li></ul><p><strong>► Hướng dẫn</strong></p><ul><li>Đến chi nhánh Đồng Hồ Hải Triều gần nhất, mua đồng hồ và thanh toán 10% giá trị đơn hàng. Sau đó nhân viên sẽ tư vấn và hỗ trợ về chính sách mua đồng hồ trả góp qua công ty tài chính Mirae Asset.</li><li>Giải ngân nhanh chóng ngay tại cửa hàng.</li></ul>', 'Đồng hồ trả góp, Mua trả góp, Trả góp 0%, Mirae Asset, Mua đồng hồ trả góp, Trả góp qua Mirae Asset, Trả góp đồng hồ', 0, 1, 1, '2023-03-21 22:20:53', '2023-04-12 16:12:36'),
(4, 1, 1, '49', '3 “CHECKLIST” GIÚP ĐỒNG HỒ TẠI S_WATCH CHẤT LƯỢNG HƠN ĐỐI THỦ', '3-“checklist”-giup-dong-ho-tai-swatch-chat-luong-hon-doi-thu', 'Có sự thật mà nhiều cửa hàng đồng hồ không muốn cho bạn biết: Đó là cùng một sản phẩm, nhưng không phải chỗ nào cũng giống nhau.', '<p><strong>Đồng hồ chất lượng hơn</strong> được định nghĩa là những sản phẩm QC kỹ càng, bảo quản tốt, trưng bày thông minh, vận chuyển cẩn thận, tư vấn hiệu quả và sửa chữa đúng sau khi mua.</p><p>Còn <strong>đồng hồ mà bạn hay thấy</strong> ở các cửa hàng giảm giá, là đã lược bỏ nhiều yếu tố để tiết kiệm chi phí cho doanh nghiệp.</p><p>Tùy theo nhu cầu mà bạn nên tìm hiểu kỹ trước khi mua. Và sau đây là 10 “checklist” giúp đồng hồ tại S_Watch chất lượng hơn đối thủ được đúc kết qua hơn 30 năm phân phối và bán lẻ đồng hồ đeo tay.</p><h3><strong>1. QC TRÊN TỪNG CHIẾC ĐỒNG HỒ</strong></h3><p>QC (Quality Control) là quá trình kiểm soát chất lượng. Dù sản phẩm trước khi nhập khẩu về Việt Nam đều được nhà sản xuất QC, nhưng trong quá trình vận chuyển sẽ có những sai sót dẫn đến hàng lỗi, trầy,…</p><p>Tại đây sẽ có 2 trường hợp:</p><p><strong>Trường hợp 1:</strong> Nhà bán lẻ không QC lại mà nhập nguyên kiện</p><ul><li>Giá đầu vào rẻ hơn</li><li>Không tốn thêm chi phí</li><li>Tiết kiệm thời gian</li></ul><p>Chỉ với 3 điều trên đã giúp doanh nghiệp tiết kiệm nhiều chi phí, nhờ vậy mà có mức giá tốt, từ đó giảm vào giá sản phẩm để thu hút khách hàng. Trong khi vẫn dễ dàng quảng bá hàng chính hãng.</p><p><strong>Trường hợp 2:</strong> Nhà bán lẻ QC lại</p><ul><li>Giá đầu vào cao hơn</li><li>Tốn thời gian làm việc</li><li>Tốn chi phí vận hành</li></ul><p>Nếu QC lại thì đây là hàng loại 1. Nhưng hiếm doanh nghiệp chọn cách này, một phần tốn tiền và <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-y-nghia-cua-thoi-gian-giup-ban-tran-trong-cuoc-song.html\">thời gian</a>. Phần còn lại là hãng không cho phép vì muốn nhà bán lẻ nhập nguyên kiện.</p><p>Thực tế, chỉ những nhà bán lẻ có sức ảnh hưởng mới được Nhà phân phối cho QC, khi gặp hàng trầy xước nhẹ, sản phẩm bị trả lại Nhà phân phối. Dĩ nhiên, hàng này sẽ quay ngược phân bổ vào trường hợp 1.</p><h3><strong>2. ĐỒNG HỒ ĐƯỢC BỌC TÚI NILON</strong></h3><p>Đồng hồ trong quá trình vận chuyển, trưng bày rất dễ bám bụi bẩn. Nếu tiếp xúc với mồ hôi tay còn làm giảm tuổi thọ.</p><p>Vì thế, sản phẩm khi trưng bày và vận chuyển bởi S_Watch đều được bọc một lớp nilon mỏng, giúp không bám bụi, mồ hôi tay và luôn mới 100%.</p><p>Nếu bạn trải nghiệm ở những cửa hàng truyền thống, phần lớn không có điều này, đồng hồ sẽ trần trụi và tiếp xúc với rất nhiều thứ ngoài môi trường.</p><p>Bọc nilon tốn chi phí, thời gian,… đặc biệt là những hệ thống có nhiều mẫu và nhiều cửa hàng nên doanh nghiệp thường bỏ qua.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/10-checklist-giup-dong-ho-tai-hai-trieu-chat-luong-hon-doi-thu-3.jpg\" alt=\"10 “checklist” giúp đồng hồ tại Hải Triều chất lượng hơn đối thủ - Ảnh: 3\"></figure><p><i>Khách hàng yên tâm với độ “mới 100%”</i></p><h3><strong>3. </strong><a href=\"https://donghohaitrieu.com/tin-tuc/hai-trieu/tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-hai-trieu.html\"><strong>TỦ TRƯNG BÀY ĐỒNG HỒ</strong></a><strong> ĐẠT CHUẨN</strong></h3><p>Không phải ngẫu nhiên mà tủ trưng bày <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-thuong-hieu-dong-ho-quoc-te-ban-chay-nhat-tai-viet-nam.html\">đồng hồ chuẩn quốc tế</a> rất đắt tiền, lý do đến từ nhiệt độ và ánh sáng được căn chỉnh ở mức lý tưởng.</p><p>Như vậy mang lại tuổi thọ cao nhất cho đồng hồ.</p><p>Đối với trường hợp cửa hàng nào bán chậm, đồng thời tủ kệ không đạt chuẩn thì chất lượng sản phẩm trưng bày tệ, không đẹp, dễ bị hỏng sau khi mua.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/10-checklist-giup-dong-ho-tai-hai-trieu-chat-luong-hon-doi-thu-4.jpg\" alt=\"10 “checklist” giúp đồng hồ tại Hải Triều chất lượng hơn đối thủ - Ảnh: 4\"></figure><p><i>Không gian tại S_Watch được </i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/review-dong-ho\"><i>đánh giá</i></a><i> sang trọng.</i></p>', 'Đồng hồ Swatch, Đồng hồ tốt, Đồng hồ thời trang, Swatch, Đồng hồ chất lượng tốt', 0, 1, 1, '2023-03-21 22:27:29', '2023-04-12 16:09:22'),
(5, 1, 1, '53', 'TIÊU CHUẨN TỦ TRƯNG BÀY ĐỒNG HỒ ĐEO TAY ĐẸP TẠI S_WATCH', 'tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-swatch', 'Không chỉ tuân thủ hai nguyên tắc trưng bày “phù hợp” và “đúng kỹ thuật”, tủ trưng bày tại S_WATCH còn vượt qua nhiều tiêu chuẩn khác, đáp ứng và hoàn thiện điều kiện showroom đạt chuẩn Thụy Sỹ.', '<h2><strong>TỦ TRƯNG BÀY </strong><a href=\"https://donghohaitrieu.com/dong-ho-deo-tay-chinh-hang\"><strong>ĐỒNG HỒ ĐEO TAY</strong></a><strong> CỦA S_WATCH ĐÃ ĐÁP ỨNG NHỮNG TIÊU CHÍ NÀO?</strong></h2><p>Điểm khác biệt của S_Watch chính là đầu tư đem đến trải nghiệm mua hàng hoàn hảo cho khách hàng. Và để thực hiện được, S_Watch đã không ngần ngại <a href=\"https://donghohaitrieu.com/kinh-nghiem/dau-tu-tai-chinh\">đầu tư</a> kỹ lưỡng để đáp ứng các điều kiện khắt khe dưới đây.</p><p>&nbsp;</p><h3><strong>1. ĐẠT TIÊU CHUẨN TRƯNG BÀY CỦA CÁC HÃNG ĐỒNG HỒ CAO CẤP</strong></h3><p>Là một đại lý phân phối hàng loạt thương hiệu đồng hồ cao cấp đến từ Thụy Sỹ như <a href=\"https://donghohaitrieu.com/brand/longines\">Longines</a>, <a href=\"https://donghohaitrieu.com/brand/doxa\">Doxa</a>, <a href=\"https://donghohaitrieu.com/brand/tissot\">Tissot</a>, <a href=\"https://donghohaitrieu.com/brand/rado\">Rado</a>… Hải Triều hiểu rằng nhóm khách hàng của mình cần nhiều hơn một mẫu đồng hồ chất lượng.</p><p>Tiêu chuẩn trưng bày của <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/cac-thuong-hieu-dong-ho-noi-tieng-gia-binh-dan-tai-viet-nam.html\">các hãng đồng hồ</a> cao cấp yêu cầu rõ ràng về số lượng <a href=\"https://donghohaitrieu.com/tin-tuc/hai-trieu/cung-mot-san-pham-dong-ho-o-hai-trieu-khac-gi-so-voi-nhung-noi-khac.html\">sản phẩm</a> trên kệ, phương pháp đặt để sản phẩm, chất lượng tủ đạt thẩm mỹ.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/12/1-tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-hai-trieu.jpg\" alt=\"Tiêu chuẩn tủ trưng bày đồng hồ đeo tay đẹp tại Hải Triều - hình 1\"></figure><p><i>Góc không gian với nhiều loại tủ trưng bày đồng hồ khác nhau tương ứng với từng thương hiệu</i></p><p>&nbsp;</p><p>Ngoài ra còn cộng hưởng nhiều yếu tố khác ảnh hưởng đến <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-website-lay-hinh-anh-dong-ho-dep-nhat-tren-the-gioi-va-vn.html\">hình ảnh</a> bày trí như:</p><p>✔ Sắp xếp gần các thương hiệu có cùng phong cách hoặc phân khúc giá để người mua có thể dễ dàng so sánh và lựa chọn sản phẩm thật sự phù hợp.</p><p>✔ Khoảng cách đặt giữa các mẫu tạo điểm dừng và chú ý. Như vậy, người mua không bị choáng ngợp bởi quá nhiều sản phẩm, vừa đáp ứng sự thẩm mỹ trong cách bày trí.</p><p>✔ Những mẫu cao cấp và giá trị hơn được đặt riêng biệt tương xứng.</p><p>✔ Ánh sáng phù hợp, có độ sáng đầu ra (Lumen) đạt tiêu chuẩn trưng bày quốc tế, giúp tăng trải nghiệm <a href=\"https://donghohaitrieu.com/kinh-nghiem/top-15-trung-tam-thuong-mai-mua-sam-lon-nhat-tai-sai-gon.html\">mua sắm</a> và hấp dẫn thị giác khách hàng. Đồng thời, thương hiệu cũng được nhận diện một cách sang trọng hơn.</p><p>✔ Đa dạng kích thước tủ, phù hợp số lượng trưng bày từng thương hiệu.</p><p>Vượt qua “hàng tá” tiêu chuẩn không mấy dễ dàng, bài toán có vẻ “đau đầu” mà không có khá nhiều đại lý bán lẻ có thể trụ vững đem đến trải nghiệm mua sắm cho khách hàng của mình.</p><h3><strong>2. BẢO QUẢN ĐỒNG HỒ TỐT HƠN</strong></h3><p>Một trong những tiêu chuẩn khác chính là tủ trưng bày là điều kiện cần cho việc bảo quản một chiếc đồng hồ giá trị.</p><p>Trong quá trình đồng hồ về tay chủ nhân phù hợp, khách hàng hoàn toàn yên tâm rằng các sản phẩm luôn được bảo quản theo đúng tiêu chuẩn.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2022/12/2-tieu-chuan-tu-trung-bay-dong-ho-deo-tay-dep-tai-hai-trieu.jpg\" alt=\"Tiêu chuẩn tủ trưng bày đồng hồ đeo tay đẹp tại Hải Triều - hình 2\"></figure><p><i>Tủ kính trưng bày thuận tiện cho khách hàng quan sát và bảo quản tốt đồng hồ</i></p><p>&nbsp;</p><p>Từng mẫu đều đặt để trên một giá đỡ đồng hồ tương ứng. Việc đặt trong tủ và kệ trưng bày này hạn chế tác nhân ảnh hưởng từ môi trường bên ngoài.</p><p>&nbsp;</p>', 'Cách trưng bày đồng hồ tại S_Watch, Tủ trưng đồng hồ, Swatch, Tủ trưng đồng hồ Swatch', 0, 1, 1, '2023-03-21 22:31:44', '2023-04-12 16:08:25'),
(6, 1, 1, '54', 'CÁCH ĐO, CHỌN SIZE ĐỒNG HỒ ĐEO TAY NAM, NỮ CHUẨN, DỄ HIỂU', 'cach-do-chon-size-dong-ho-deo-tay-nam-nu-chuan-de-hieu', 'Để chọn được một chiếc đồng hồ đeo tay nam hoặc nữ ưng ý thì cách đơn giản nhất thiết thực nhất vẫn là bạn đến trực tiếp shop để lựa chọn. Nhưng nếu như bạn ở quá xa, hoặc không có thời gian thì chúng ta phải làm thế nào? Hãy cùng tham khảo ngay cách chọn size đồng hồ thực sự phù hợp với cổ tay.', '<h2><strong>CÁCH CHỌN SIZE ĐỒNG HỒ THEO KÍCH THƯỚC CỔ TAY</strong></h2><p>Dù bạn mua để sử dụng hay để tặng, thì một chiếc <a href=\"https://donghohaitrieu.com/dong-ho-deo-tay-chinh-hang\">đồng hồ đeo tay</a> chỉ thật sự đẹp khi nó phù hợp với bạn, hay nói một cách chính xác hơn là phù hợp với cổ tay của bạn. Và bài chia sẻ về cách chọn mua đồng hồ đeo tay này sẽ giúp bạn xác định điều đó một cách đơn giản nhất.&nbsp;</p><h3><strong>1. CÁC BƯỚC CHỌN SIZE ĐỒNG HỒ ĐEO TAY</strong></h3><p>Để có thể chọn được một chiếc đồng hồ đeo tay nam hoặc nữ vừa với cổ tay bạn hãy thực hiện theo 3 bước đơn giản như hướng dẫn bên dưới nhé.</p><p><strong>Bước 1</strong>: Đo “size tay” của bạn (Chu vi cổ tay)</p><p>Để đo chu vi cổ tay bạn chỉ cần thực hiện theo một số cách đơn giản như sau:</p><ul><li>Cách 1: Dùng thước dây đo 1 vòng quanh cổ tay, bạn lưu ý là đo ở vị trí mà bạn đeo đồng hồ ấy nha.</li><li>Cách 2: Trường hợp bạn không có thước dây thì làm thế nào? Đơn giản thôi bạn hãy dùng một tờ giấy quấn quanh cổ tay, sau đó hãy đo lại bằng thước kẻ tay thông thường.</li></ul><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2015/01/cach-chon-mua-dong-ho-deo-tay-nam-phu-hop-voi-ban-2.jpg\" alt=\"cach chon mua dong ho deo tay nam phu hop voi ban 2\"></figure><p><i>Cách đo chu vi cổ tay bằng thước dây</i></p><p><strong>Bước 2</strong>:&nbsp; Tra bảng cách chọn Size đồng hồ đeo tay ở bên dưới (áp dụng cho nam và nữ luôn nha)</p><p>Sau khi biết được chu vi cổ tay rồi bạn hãy dùng nó để đối chiếu với bảng bên dưới xem với số đo như thế ta nên chọn Size đồng hồ nào là tối ưu nhất nhé.</p><p>Ví dụ: Tay mình size 15cm thì nên chọn đồng hồ đeo tay nam như thế nào cho phù hợp nhĩ?</p><p>Size tay (chu vi cổ tay) của bạn là 15cm = 150mm, đối chiếu với bảng (bảng cách chọn mua đồng hồ đeo tay bên dưới nha) thì ta nên chọn size đồng hồ tối ưu là 32-34mm. Nhưng không nhất thiết là phải chỉ được chọn size trong khoảng 32-34, nếu bạn thích to hơn hay nhỏ hơn một chút thì vẫn được nhé (to hơn bạn chọn 36, và bé hơn bạn chọn 30 nha)</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2015/01/cach-chon-mua-dong-ho-deo-tay-nam-phu-hop-voi-ban-3.jpg\" alt=\"cach chon mua dong ho deo tay nam phu hop voi ban 3\"></figure><p><i>Bảng size đồng hồ cho tay có chu vi từ 13 – 15.5 cm</i></p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2015/01/cach-chon-mua-dong-ho-deo-tay-nam-phu-hop-voi-ban-4.jpg\" alt=\"cach chon mua dong ho deo tay nam phu hop voi ban 4\"></figure><p><i>Bảng size đồng hồ cho tay có chu vi từ 16 – 18.5 cm</i></p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2015/01/cach-chon-mua-dong-ho-deo-tay-nam-phu-hop-voi-ban-5.jpg\" alt=\"\"></figure><p><i>Bảng size đồng hồ cho tay có chu vi từ 19 – 21.5 cm</i></p><p>&nbsp;</p><p><strong>Bước 3</strong>: Tải file đính kèm, in ra, rồi cảm nhận xem size đó có thức sự hợp với cổ tay mình không nhé.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2015/01/cach-chon-mua-dong-ho-deo-tay-nam-phu-hop-voi-ban-6.jpg\" alt=\"cach chon mua dong ho deo tay nam phu hop voi ban 6\"></figure><p>Size mặt kính đồng hồ</p><h3><strong>2. CÁCH ĐO SIZE ĐỒNG HỒ ĐEO TAY LÀM QUÀ TẶNG</strong></h3><p>Bạn muốn chọn một chiếc đồng hồ đeo tay nam hoặc nữ để làm quà tặng cho bạn bè, người thân trong gia đình nhưng không biết Size cổ tay của họ, làm thế nào bây giờ?</p><p>Đơn giản thôi hãy bạn hãy chọn Size đồng hồ đeo tay trong khoảng an toàn như sau nhé:</p><ul><li>Size đồng hồ nam: 39 – 42mm</li><li>Size đồng hồ nữ: 29 – 34mm</li></ul><p>&nbsp;</p><p>Bên cạnh đó thì nữ vẫn có thể đeo đồng hồ nam bình thường nếu quá yêu thích mẫu đó. Và sẽ có một vài tips nhỏ để các cô nàng cá tính dễ dàng hơn trong việc lựa chọn đồng hồ nam hoặc unisex chẳng hạn.</p><p>&nbsp;Size mặt đồng hồ theo chuẩn Quốc Tế như sau:</p><ul><li>Women’s Mini (đồng hồ nữ – size nhỏ): 23mm – 25mm</li><li>Women’s Regular (đồng hồ nữ – size thông thường): 26mm – 29mm</li><li>Midsize – Unisex (nam hoặc nữ đều đeo được): 34mm – 36mm</li><li>Men’s Regular (đồng hồ nam – size thông thường): 37mm – 39mm</li><li>Men’s Sport (đồng hồ nam – size thể thao): 40mm – 42mm</li><li>Men’s XL (đồng hồ nam – size lớn, rất lớn): 45mm</li></ul><p>Midsize: là kích thước phù hợp cho nữ giới thích chọn đồng hồ đeo tay lớn hơn so với bình thường. Hầu hết nam giới sẽ thấy kích thước này hơi nhỏ, tuy nhiên với một số người có cổ tay nhỏ thì ta nên lựa chọn size này cho phù hợp với “cơ địa” của mình.</p><h2><strong>MỘT SỐ LƯU Ý KHI CHỌN SIZE ĐỒNG HỒ ĐEO TAY</strong></h2><p>Vừa rồi là các bước, hướng dẫn chọn size đồng hồ phù hợp với cổ tay nam nữ phù hợp nhất. Bên cạnh đó bạn nên lưu ý các điểm sau giúp lựa chọn đồng hồ nhanh, phù hợp hơn:</p><ul><li>Trường hợp cổ tay mỏng, chiều ngang to thì ta nên chọn lớn hơn 1 size so với bảng trên (ví dụ: tối ưu là 34mm thì bạn nên tham khảo thêm size 36mm)</li><li>Cổ tay của bạn nhỏ thì không nên chọn một chiếc đồng hồ quá dày. Và khi mua bạn nên hỏi kỹ người bán xem dây đeo của chiếc đồng hồ bạn chọn có ôm tay hay không, vì nếu dây không ôm tay thì khi đeo sẽ không đẹp.</li><li><a href=\"https://donghohaitrieu.com/hinh-dang-mat-so/vuong\">Đồng hồ mặt vuông</a> bao giờ trông cũng có cảm giác to hơn so với <a href=\"https://donghohaitrieu.com/hinh-dang-mat-so/tron\">đồng hồ mặt tròn</a></li><li>Đường kính đồng hồ hình Oval tính theo chiều ngang cổ tay.</li><li>Đối với các bạn có vóc dáng to cao nên ưu tiên chọn những mẫu đồng hồ mặt số lớn. Điều này giúp cho ngoại hình của bạn trở nên cân đối hơn, tránh việc chọn đồng hồ nhỏ dẫn đến mất thẩm mỹ.</li></ul><h2><strong>TỔNG KẾT</strong></h2><p>Trên đây là cách chọn size đồng hồ phù hợp với cổ tay đơn giản, dễ hiểu nhất. Hy vọng thông qua bài viết này, bạn sẽ chọn được cho mình mẫu đồng hồ phù hợp, đồng hành lâu dài cùng bạn. Nếu bạn cần mua đồng hồ, ghé ngay S_Watch để chúng tôi giúp bạn lựa chọn nhé.</p><p>&nbsp;</p><p><br>&nbsp;</p>', 'Cách chọn size đồng hồ chuẩn, Cách đo size đồng hồ, Đo size đồng hồ, Chọn size đồng hồ, Cách chọn đồng hồ', 0, 1, 1, '2023-03-21 22:34:46', '2023-04-12 16:07:55'),
(7, 1, 11, '55', 'ĐỒNG HỒ FITBIT CÓ TÍNH NĂNG GÌ, TỐT KHÔNG, GIÁ BAO NHIÊU?', 'dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu', 'Fitbit là một cái tên nổi tiếng trong thế giới công nghệ với các tính năng tập thể dục và các ứng dụng dùng hàng này. Trong bài viết này, S_Watch sẽ mang đến đánh giá chuyên sâu về đồng hồ Fitbit, khám phá các tính năng và khả năng khác nhau của nó để giúp bạn quyết định xem đó có phải là chiếc đồng hồ thông minh thể dục phù hợp với mình hay không.', '<h2><strong>ĐỒNG HỒ FITBIT CÓ TỐT KHÔNG, GIÁ BAO NHIÊU?</strong></h2><h3><strong>1. THIẾT KẾ TRẺ TRUNG, NĂNG ĐỘNG</strong></h3><p>Đồng hồ Fitbit là một thiết bị <a href=\"https://donghohaitrieu.com/kinh-nghiem/thoi-trang\">thời trang</a> và trẻ trung sẽ bổ sung cho phong cách sống năng động của bạn. Với thiết kế hiện đại, hoàn hảo cho bất kỳ ai muốn giữ dáng và khỏe mạnh trong khi vẫn muốn có một chiếc đồng hồ thông minh thời trang. Fitbit có nhiều màu sắc và dây đeo khác nhau, vì vậy bạn có thể chọn một chiếc phù hợp nhất với phong cách của mình.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-2.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 2\"></figure><p><i>Với vẻ ngoài thời trang và trẻ trung, đồng hồ thông minh Fitbit là </i><a href=\"https://donghohaitrieu.com/danh-muc/phu-kien-dong-ho\"><i>phụ kiện</i></a><i> hoàn hảo cho mọi trang phục thường ngày</i></p><p>&nbsp;</p><p>Fitbit tự hào có thiết kế hiện đại và trẻ trung với đường kính 40mm và độ dày 11,2mm, là một lựa chọn mỏng và nhẹ, thoải mái khi đeo cả ngày. Nó có <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/nhan-biet-cac-kieu-mat-dong-ho-deo-tay-pho-bien-nhat-hien-nay.html\">mặt đồng hồ</a> hình vuông với các cạnh bo tròn và có nhiều kiểu kết hợp màu sắc khác nhau. Đồng hồ cũng có một nút vật lý ở phía bên tay trái để dễ dàng điều hướng và kiểm soát.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-3.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 3\"></figure><p><i>Đồng hồ thông minh Fitbit tự hào có thiết kế kiểu dáng đẹp và hiện đại, hoàn hảo cho những người trẻ tuổi và năng động</i></p><p>&nbsp;</p><h3><strong>2. GIÁ THÀNH TẦM TRUNG, HỢP LÝ</strong></h3><p>Đồng hồ Fitbit cung cấp một bộ tính năng ấn tượng với mức giá phải chăng, khiến chiếc đồng hồ trở thành một lựa chọn đáng đồng tiền bát gạo. Chiếc đồng hồ này có giá khoảng <strong>5,000,000VND</strong>, nằm ở danh mục đồng hồ thông minh giá tầm trung.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-4.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 4\"></figure><p><i>Mặc dù có mức giá phải chăng nhưng Fitbit không bỏ qua các tính năng hay chất lượng</i></p><p>&nbsp;</p><p>Với sự kết hợp giữa giá thành hợp lý và chức năng đầy đủ trong tầm tiền, đồng hồ thông minh Fitbit là một lựa chọn thông minh cho những ai đang tìm kiếm một chiếc đồng hồ thông minh chất lượng cao mà không quá tốn kém.</p><h3><strong>3. XUẤT XỨ TỪ MỸ, UY TÍN, AN TÂM</strong></h3><p>Với câu hỏi: “Đồng hồ Fitbit của nước nào?”. Thì câu trả lời chính là: Fitbit tự hào được sản xuất tại Hoa Kỳ, đảm bảo mức độ kiểm soát chất lượng cao và các tiêu chuẩn sản xuất có rõ ràng. Điều này giúp bạn yên tâm rằng bạn đang mua một <a href=\"https://donghohaitrieu.com/tin-tuc/hai-trieu/cung-mot-san-pham-dong-ho-o-hai-trieu-khac-gi-so-voi-nhung-noi-khac.html\">sản phẩm</a> đã được sản xuất theo tiêu chuẩn cao nhất. Với xuất xứ này, đồng hồ cũng được tích hợp sâu với các chức năng trên iOS lẫn Android.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-5.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 5\"></figure><p><i>Với danh tiếng uy tín và chất lượng “Made in USA”, đồng hồ thông minh Fitbit mang đến sự an tâm cho người tiêu dùng</i></p><p>&nbsp;</p><h3><strong>4. CÁC TÍNH NĂNG&nbsp;</strong></h3><p>Đồng hồ thông minh Fitbit cung cấp nhiều tính năng để giúp bạn luôn đạt được các mục tiêu tập thể dục của mình. Một số chức năng của đồng hồ thông minh Fitbit bao gồm:</p><p>▸ Theo dõi nhịp tim 24/7.</p><p>▸ Theo dõi giấc ngủ với giai đoạn giấc ngủ và đưa ra đề xuất cải thiện giấc ngủ.</p><p>▸ Chức năng đếm nhịp thở hỗ trợ tập Yoga.</p><p>▸ GPS tích hợp để theo dõi các hoạt động ngoài trời.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-6.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 6\"></figure><p><i>Cho dù bạn là người đam mê thể dục hay chỉ đang tìm kiếm một phụ kiện thời trang, Fitbit luôn có thứ dành cho tất cả mọi người</i></p><p>&nbsp;</p><p>▸ Thiết kế chống nước <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-chong-nuoc-5atm-la-gi-di-mua-tam-boi-co-sao-khong.html\">5ATM</a>.</p><p>▸ Nhận thông báo về cuộc gọi, tin nhắn và ứng dụng.</p><p>▸ Kiểm soát danh sách nhạc.</p><p>▸ Thanh toán không tiếp xúc an toàn và thuận tiện với Fitbit Pay.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-7.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 7\"></figure><p><i>Đồng hồ thông minh Fitbit được trang bị hàng loạt tính năng giúp ích cho bạn trong cuộc sống đời thường</i></p><p>&nbsp;</p><p>Nhìn chung, đồng hồ Fitbit là một lựa chọn tuyệt vời cho bất kỳ ai muốn cải thiện sức khỏe và đồng thời duy trì kết nối đa dạng với các ứng dụng. Với thiết kế tuyệt vời, giá cả phải chăng và các tính năng tiên tiến, Fitbit là người bạn đồng hành hoàn hảo cho lối sống năng động của bạn.</p><h2><strong>MỘT SỐ MẪU ĐỒNG HỒ FITBIT BÁN CHẠY NHẤT</strong></h2><p>Hiện Fitbit có 3 dòng chính, với Versa là dòng đồng hồ thông minh phổ biến nhất, Charge là dòng đồng hồ chủ yếu mang chức năng fitness và Sense là dòng cao cấp nhất với đầy đủ các chức năng. Các dòng đồng hồ đều có nhiều phiên bản khác nhau, sau đây là các mẫu bán chạy nhất.</p><p>&nbsp;</p><h3><strong>1. ĐỒNG HỒ FITBIT VERSA 2</strong></h3><p>Đồng hồ Fitbit Versa 2 hiện là sản phẩm khởi điểm của dòng Versa. Được thiết kế để trở thành một thiết bị đeo toàn diện hơn, kết hợp tính năng theo dõi hoạt động thể chất với các tính năng của đồng hồ thông minh, chẳng hạn như khả năng nhận thông báo, thanh toán không tiếp xúc và kiểm soát âm nhạc của bạn.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-8.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 8\"></figure><p><i>Với Amazon Alexa tích hợp sẵn, đồng hồ Fitbit Versa 2 mang đến nhiều tiện ích và khả năng tiếp cận hơn</i></p><p>&nbsp;</p><p>Trong khi đó, đồng hồ Versa 2 có màn hình lớn hơn và có nhiều tùy chỉnh hơn về mặt đồng hồ và dây đeo có thể hoán đổi cho nhau.</p><p>&nbsp;</p><h3><strong>2. ĐỒNG HỒ FITBIT VERSA 3</strong></h3><p>Đồng hồ Fitbit Versa 3 là một chiếc đồng hồ thông minh thời trang cung cấp một loạt các tính năng nâng cao để giúp bạn luôn kiểm soát được tình trạng sức khỏe và thể chất của mình. Được tính hợp nhiều chức năng hơn phiên bản trước, được nâng cấp tới hơn 20 chế độ tập luyện.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-fitbit-co-tinh-nang-gi-tot-khong-gia-bao-nhieu-9.jpg\" alt=\"Đồng hồ Fitbit có tính năng gì, tốt không, giá bao nhiêu? - Ảnh 9\"></figure><p><i>Với thiết kế thời trang và khả năng của đồng hồ thông minh, đồng hồ thông minh Fitbit Versa 3 hoàn hảo cho những ai muốn giữ sức khỏe và phong cách hàng đầu</i></p><p>&nbsp;</p><p>Đồng hồ Fitbit Versa 3 có thể theo dõi quá trình tập luyện của bạn và cung cấp cho bạn thông tin chuyên sâu được cá nhân hóa để giúp bạn cải thiện thể lực. Nó cũng có thời lượng pin dài, khả năng tương thích với trợ lý giọng nói và khả năng thanh toán không tiếp xúc.</p>', 'Đồng hồ Fitbit, Fitbit, Đồng hồ thông minh Fitbit, Đồng hồ thông minh, Đồng hồ thông minh giá bao nhiêu, Fitbit giá bao nhiêu, Fitbit có chức năng gì, Fitbit có tốt không', 0, 1, 1, '2023-03-21 22:43:33', '2023-04-12 16:06:53'),
(8, 1, 11, '56', 'ĐỒNG HỒ BURGI CỦA NƯỚC NÀO, CÓ TỐT KHÔNG, GIÁ BAO NHIÊU?', 'dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu', 'Đồng hồ Burgi hiện đang được nhiều người dùng quan tâm với thiết kế độc đáo. Vậy hãng này đến từ nước nào? Giá bao nhiêu? Có tốt không? Có những điểm nào nổi bật? Hãy cùng S_WATCH tìm hiểu trong bài viết dưới đây.', '<h2><strong>REVIEW CHI TIẾT ĐỒNG HỒ BURGI CHÍNH HÃNG</strong></h2><p>Được giới mộ điệu yêu thích bởi phong cách thời trang đầy sang trọng và quý phái, đồng hồ Burgi trong thời gian gần đây đã trở thành hiện tượng với thiết kế sành điệu và cuốn hút. Hãy cùng Đồng Hồ Hải Triều giải đáp những thắc mắc về đồng hồ Burgi nhé.</p><h3><strong>ĐỒNG HỒ BURGI CỦA NƯỚC NÀO?</strong></h3><p>Với câu hỏi: “Burgi là đồng hồ nước nào?” – Thì Burgi từ lâu là một <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/cac-thuong-hieu-dong-ho-noi-tieng-gia-binh-dan-tai-viet-nam.html\">thương hiệu đồng hồ</a> thuộc tập đoàn August Steiner của Mỹ. Hướng tới phong cách sang trọng và <a href=\"https://donghohaitrieu.com/kinh-nghiem/thoi-trang\">thời trang</a>, các mẫu đồng hồ Burgi mang đến vẻ đẹp cuốn hút ngay từ cái nhìn đầu tiên.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-2.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 2\"></figure><p><i>Đồng hồ Burgi nữ được xem là biểu tượng của sự quý phái và sành điệu</i></p><p>&nbsp;</p><p>Đồng hồ Burgi nổi tiếng với những mẫu đồng hồ Burgi nữ đính đá <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/trang-suc-swarovski-cua-nuoc-nao-lam-bang-gi-co-tot-khong.html\">Swarovski</a> lấp lánh đi kèm các hoạt tiết đậm nét nghệ thuật khác nhau trên mặt số. Hãng cũng đưa ra nhiều lựa chọn màu sắc cho dây đeo để đáp ứng theo nhu cầu của khách hàng.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-3.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 3\"></figure><p><i>Phái đẹp có thể thoải mái thể hiện cá tính, lựa chọn trang phục tùy thích khi sở hữu một chiếc đồng hồ Burgi</i></p><p>&nbsp;</p><h3><strong>2. ĐỒNG HỒ BURGI CÓ TỐT KHÔNG?</strong></h3><p>Được đầu tư nhiều về mặt thiết kế đồng thời hãng cũng rất chú trọng về bộ máy bên trong và vật liệu chế tác. Dù đến từ nước Mỹ nhưng bộ máy của đồng hồ Burgi lại đến từ Thụy Sỹ- quốc gia đứng đầu trong ngành chế tạo đồng hồ trên toàn thế giới.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-4.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 4\"></figure><p><i>Bạn có thể hoàn toàn yên tâm về chất lượng của đồng hồ Burgi với bộ máy chất lượng đến từ Thụy Sỹ</i></p><p>&nbsp;</p><p>Sản phẩm đồng hồ Burgi đều được sản xuất trên dây chuyền hiện đại, áp dụng công nghệ tiên tiến, từng chi tiết nhỏ nhặt ở đồng hồ đều được chế tác một cách tỉ mỉ không thua gì so với các mẫu đồng hồ Thụy Sỹ.</p><p>Ngoài ra, mặt kính của đồng hồ hiệu Burgi sử dụng chất liệu là mặt đá tráng <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/toan-bo-su-that-ve-mat-kinh-sapphire-cua-dong-ho.html\">Sapphire</a> vì thế có thể chịu được va đập mạnh, áp lực nước, nhiệt độ cao cùng khả năng trống trầy xước rất tốt. Người dùng có thể hoàn toàn yên tâm khi chọn mua sản phẩm này.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-5.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 5\"></figure><p><i>Đồng hồ Burgi còn được trang bị thêm chức năng xem lịch ngày nhằm tối ưu hóa trải nghiệm của người dùng</i></p><p>&nbsp;</p><h3><strong>3. ĐỒNG HỒ BURGI GIÁ BAO NHIÊU?</strong></h3><p>Là dòng sản phẩm được thiết kế sang trọng, thu hút, tôn lên vẻ đẹp nữ tính cùng bộ máy Thụy Sỹ cao cấp nhưng hãng đồng hồ Burgi nữ này lại có một giá thành cực tốt. Giá đồng hồ Burgi chỉ từ 3 triệu đồng đến 5 triệu đồng là bạn hoàn toàn có thể mua cho mình một chiếc.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-6.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 6\"></figure><p><i>Xuất xứ tại Mỹ cùng bộ máy Thụy Sỹ đẳng cấp nhưng thương hiệu đồng hồ Burgi lại có mức giá bình dân</i></p><p>&nbsp;</p><h3><strong>4. CÓ NÊN MUA ĐỒNG HỒ BURGI?</strong></h3><p>Sau khi đã tìm hiểu qua một số thông tin về xuất xứ, chất lượng và thiết kế chắc hẳn bạn đã có cho mình câu trả lời rồi đúng không? Mẫu đồng hồ này sẽ chỉ thực sự phù hợp với ai yêu thích thiết kế sang trọng, mà ít quan tâm đến thương hiệu hay bộ máy bên trong.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-7.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 7\"></figure><p><i>Hãy tham khảo kỹ các thiết kế của dòng đồng hồ này cũng như xem thêm các thương hiệu khác trước khi bạn chọn mua</i></p><p>&nbsp;</p><h2><strong>5 MẪU ĐỒNG HỒ BURGI ĐƯỢC SĂN LÙNG NHIỀU NHẤT</strong></h2><p>Tiếp theo Hải Triều xin được giới thiệu đến bạn 5 mẫu đồng hồ Burgi hiện đang được săn lùng nhiều nhất ở thời điểm hiện tại.&nbsp;</p><p>&nbsp;</p><h3><strong>1. ĐỒNG HỒ BURGI NỮ ĐÍNH ĐÁ</strong></h3><p>Mẫu đồng hồ Burgi nữ đính đá Swarovski sang trọng với mặt số tròn nhỏ gọn. Phối màu hồng nhạt kết hợp cùng các tone màu đỏ và trắng khác nhau tạo nên một tổng thể rất hài hòa.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-8.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 8\"></figure><p><i>Đồng hồ Burgi nữ đính đá thời thượng rất được ưa chuộng bởi thiết kế và kiểu dáng</i></p><p>&nbsp;</p><p>Màu sắc tinh tế, mặt kính to vừa phải là một trong những ưu điểm của mẫu đồng hồ này. Phần dây da được thiết kế khá mỏng. Đây là mẫu thiết kế được rất nhiều chị em lựa chọn vì đường nét tinh tế, thiết kế không quá cầu kì nhưng vẫn tôn lên vẻ nữ tính.</p><p>&nbsp;</p><h3><strong>2. ĐỒNG HỒ BURGI MÂM XÔI</strong></h3><p>Sở dĩ được gọi là đồng hồ Burgi mâm xôi vì thiết kế này với viền ngoài được bao quanh bởi một số lượng đá Swarovski dày đặc tạo nên hiệu ứng giống với quả mâm xôi.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-burgi-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-9.jpg\" alt=\"Đồng hồ Burgi của nước nào, có tốt không, giá bao nhiêu? - Ảnh 9\"></figure><p><i>Đồng hồ Burgi nữ mâm xôi hiện nay đang rất được ưa chuộng bởi các chị em phái đẹp</i></p><p>&nbsp;</p><p>Mẫu thiết kế này được chế tác hoàn toàn từ thép không gỉ 316L từ dây đeo, chất liệu case, gờ. Mặt kính <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/4-ly-do-vi-sao-kinh-khoang-mineral-crystal-pho-bien-nhat-o-dong-ho.html\">Mineral Crystal</a> với độ cứng khá, chịu lực tốt, ít trầy xước được trang bị để giảm giá thành của sản phẩm và nâng cao độ bền của sản phẩm.</p>', 'Đồng hồ Burgi, Đồng hồ Burgi sản xuất ở đâu, Burgi, Đồng hồ thời trang Burgi, Đồng hồ nữ Burgi', 0, 1, 1, '2023-03-21 22:46:02', '2023-04-12 16:05:40'),
(9, 1, 11, '57', 'REVIEW ĐỒNG HỒ FC MOONPHASE VÀ TOP MẪU BÁN CHẠY NHẤT', 'review-dong-ho-fc-moonphase-va-top-mau-ban-chay-nhat', 'Thụy Sỹ từ lâu là nơi sinh ra những huyền thoại đồng hồ với tính năng nổi bật, sáng tạo. Một đại diện trẻ tuổi FC Moonphase có màn thể hiện ngoạn mục khiến cả thế giới phải bất ngờ. Cùng S_Watch đánh giá đồng hồ Frederique Constant Moonphase có gì đặc biệt nhé.', '<h2><strong>ĐÁNH GIÁ ĐỒNG HỒ FC MOONPHASE CHÍNH HÃNG TỪ A-Z</strong></h2><p>FC Moonphase được đánh giá khá cao và có thể đánh bại được nhiều thương hiệu cạnh tranh. Dù tuổi đời còn rất trẻ nhưng với định hướng đúng đắn, đồng hồ FC Moonphase đang trở thành một biểu tượng của ngành công nghiệp đồng hồ.</p><h3><strong>1. ĐỒNG HỒ FC MOONPHASE CỦA NƯỚC NÀO?</strong></h3><p>Câu chuyện của Frederique Constant bắt đầu từ <a href=\"https://donghohaitrieu.com/kinh-nghiem/tuoi-mau-thin-sinh-nam-1988-menh-gi-hop-mau-gi-hop-voi-ai.html\">năm 1988</a>, sau chuyến đi Thụy Sỹ thì đôi vợ chồng Aletta &amp; Peter Stars đã quyết định xây dựng đế chế của riêng mình. <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-thuong-hieu-dong-ho-thuy-sy-noi-tieng-nhat-gia-binh-dan.html\">Thương hiệu đồng hồ Thụy Sỹ</a> này dù tuổi đời có vẻ không là gì so với <a href=\"https://donghohaitrieu.com/brand/doxa\">Doxa</a>, <a href=\"https://donghohaitrieu.com/brand/longines\">Longines</a>,… nhưng đã nhanh chóng gây được tiếng vang toàn cầu.</p><p>Tầm ảnh hưởng cũng như độ phủ thương hiệu FC dần tạo tiền đề cho nhà sản xuất này đạt được các mốc tăng trưởng ấn tượng. Đồng hồ FC ra đời với nhiều bộ sưu tập, mẫu mã ấn&nbsp; tượng, đẹp mắt và được các chuyên gia đánh giá cao.</p><h3><strong>2. ĐỒNG HỒ FC MOONPHASE GIÁ BAO NHIÊU?</strong></h3><p>Đồng hồ FC Moonphase sở hữu tính năng lịch tuần trăng trứ danh chỉ dành cho các sản phẩm cao cấp. Dành cho ai chưa biết thì lịch tuần trăng cung cấp thông tin lịch trăng tròn và lịch âm.</p><p>Đây là một tính năng cực kỳ phức tạp và mức giá cho mẫu đồng hồ này không hề nhỏ. Đồng hồ Frederique Constant Moonphase hiện tại có giá từ 30 triệu trở lên. Đồng hồ trải qua nhiều quy trình kiểm tra nghiêm ngặt và phải đạt chuẩn <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-swiss-made-la-gi-cach-phan-biet-san-pham-noi-bat.html\">Swiss Made</a> trước khi tới tay người dùng.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/2-review-dong-ho-fc-moonphase-va-top-mau-ban-chay-nhat.jpg\" alt=\"Review đồng hồ FC Moonphase và TOP mẫu bán chạy nhất - ảnh 2\"></figure><p><i>Mức giá từ 30 triệu trở lên, FC không dành cho đại đa số người dùng</i></p><p>&nbsp;</p><h3><strong>3. ĐỒNG HỒ FC MOONPHASE CÓ TỐT KHÔNG?</strong></h3><p>Tùy vào nhu cầu và khả năng tài chính, mỗi người sẽ có đánh giá khác nhau về đồng hồ FC moonphase. Xét về mặt chất lượng, FC đến từ Thụy Sỹ chắc chắn đã vượt qua vòng kiểm định chất lượng ban đầu của người dùng.</p><p>Phong cách thiết kế của đồng hồ FC moonphase trước đến nay không quá cầu kỳ, phù hợp cho người dùng trẻ trung, phóng khoáng. Nhiều người giàu có hay bạn trẻ đều muốn khẳng định bản thân thông qua các phụ kiện thời thượng như đồng hồ FC moonphase.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/3-review-dong-ho-fc-moonphase-va-top-mau-ban-chay-nhat.jpg\" alt=\"Review đồng hồ FC Moonphase và TOP mẫu bán chạy nhất - ảnh 3\"></figure><p><i>FC Moonphase sở hữu bộ chuyển động nhịp nhàng thể hiện khung thời gian ngày đêm đạt chuẩn chất lượng Swiss Made</i></p><p>&nbsp;</p><p>Tiếp đến là tính năng lịch tuần trăng, đây không phải tính năng dễ để có thể đưa vào bộ máy mà vẫn có thể làm tốt mọi thứ. Chính vì thế đây như một lời khẳng định đanh thép về tay nghề của FC, cúng như trình độ chuyên môn, tính sáng tạo của hãng.</p><p>Nói tóm lại, đồng hồ FC moonphase là một trong những sản phẩm rất đáng để sở hữu và trải nghiệm. Với những gì thương hiệu đã làm được, chắc chắn người sở hữu sẽ không thất vọng.</p>', 'Review đồng hồ, Đồng hồ FC Moonphase, Review FC Moonphase, FC Moonphase, Đồng hồ FC, Review đồng hồ FC Moonphase', 0, 1, 1, '2023-03-21 22:52:22', '2023-04-12 16:04:45'),
(10, 1, 1, '58', 'TỪ ĐIỂN KIẾN THỨC ĐỒNG HỒ, TRA CỨU Ý NGHĨA, GIẢI THÍCH THUẬT NGỮ ANH-VIỆT', 'tu-dien-kien-thuc-dong-ho-tra-cuu-y-nghia-giai-thich-thuat-ngu-anh-viet', 'Bạn muốn trang bị kiến thức đồng hồ để sử dụng đúng hoặc hiểu biết thêm về thế giới máy đo thời gian? Bạn muốn đọc những bài viết về đồng hồ tiếng Anh nhưng không rành về thuật ngữ? Đây chính là bộ từ điển đồng hồ bao hàm các kiến thức và thuật ngữ đồng hồ có thể giúp bạn làm được điều đó!', '<h2><strong>TỪ ĐIỂN KIẾN THỨC ĐỒNG HỒ, TRA CỨU Ý NGHĨA, GIẢI THÍCH THUẬT NGỮ ANH-VIỆT</strong></h2><p>Thế giới <a href=\"https://donghohaitrieu.com/\"><i><strong>đồng hồ</strong></i></a> có vô vàn kiến thức để khám phá nhưng nếu không hệ thống thì hẳn rất khó để tìm hiểu về đồng hồ, đó là lý do mà bạn cần đến bộ từ điển đồng hồ đeo tay mà S_Watch đã tổng hợp bên dưới được phân chia thành các phần: bộ máy đồng hồ, vật liệu đồng hồ, chức năng đồng hồ, thuật ngữ đồng hồ, trang trí hoàn thiện đồng hồ, linh kiện phụ tùng đồng hồ.</p><p><img src=\"https://donghohaitrieu.com/wp-content/uploads/2017/06/tu-dien-kien-thuc-dong-ho-tra-cuu-y-nghia-giai-thich-thuat-ngu-anh-viet-1.gif\" alt=\"Từ Điển Kiến Thức Đồng Hồ, Tra Cứu Ý Nghĩa, Giải Thích Thuật Ngữ Anh-Việt\"><br>&nbsp;</p><p><i>Bộ máy cơ lên dây thủ công đang hoạt động</i></p><h3><i><strong>BỘ MÁY – MOVEMENT – CALIBER – CALIBRE</strong></i></h3><h4><strong>✦&nbsp; BỘ MÁY ĐỒNG HỒ</strong></h4><p>Tiếng Anh gọi là <strong>Movement/Watch Movement</strong>, viết tắt là Movt/Mov’t, hoặc Caliber và Calibre trong tiếng Pháp, viết tắt là Cal. Bộ máy là linh hồn của đồng hồ, vận hành các chức năng và được bảo vệ trong bộ vỏ bên ngoài.</p><p>&nbsp;</p><h4><strong>✦&nbsp; CƠ – CƠ KHÍ – MECHANICAL</strong></h4><p>Cách gọi chung tất cả bộ máy (tự động, lên dây thủ công) được tạo ra từ các bộ phận cơ khí, không có mạch điện, hoạt động bằng nguồn năng lượng sinh ra từ dây cót. Thường dùng để chỉ máy lên dây thủ công.<br>&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/06/tu-dien-kien-thuc-dong-ho-tra-cuu-y-nghia-giai-thich-thuat-ngu-anh-viet-1.jpg\" alt=\"Từ điển kiến thức đồng hồ bộ máy đồng hồ - Ảnh 1\"></figure><p><i>Bộ máy đồng hồ</i></p><h4>✦&nbsp;<strong> TỰ ĐỘNG – TỰ ĐỘNG LÊN DÂY – AUTOMATIC – SELF WINDING – AUTO WINDING</strong></h4><p>Máy đồng hồ cơ có khả năng tự lên dây cót khi đeo trên tay. Khi đeo đồng hồ và cử động tay tự nhiên, Bánh Đà – oscillating weight/rotor sẽ quay và từ đó vặn dây cót. Tiền thân của máy tự động là máy lên dây thủ công nên nó cũng hoạt động bằng nguồn năng lượng cơ do dây cót sinh ra, phần lớn máy tự động cũng có thể lên dây thủ công.</p><h4>✦&nbsp;<strong> LÊN DÂY THỦ CÔNG – HAND WOUND – HAND WINDING – MANUAL WINDING – MANUALLY WOUND</strong>&nbsp;</h4><p>Máy đồng hồ cơ lên dây cót thủ công. Khi lên dây, dây cót được quấn chặt sẽ sinh ra năng lượng cơ học, năng lượng này sẽ làm đồng hồ chuyển động.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/06/tu-dien-kien-thuc-dong-ho-tra-cuu-y-nghia-giai-thich-thuat-ngu-anh-viet-2.jpg\" alt=\"Từ điển kiến thức đồng hồ bộ máy đồng hồ - Ảnh 2\"></figure><p><i>Lên dây cót thủ công</i></p><p>&nbsp;</p><h4>✦&nbsp; <strong>THẠCH ANH – PIN – QUARTZ</strong></h4><p>Máy đồng hồ là tổ hợp các mạch điện và động cơ, sử dụng một tinh thể thạch anh (tự nhiên hoặc tổng hợp) để tạo ra độ chính xác và hoạt động bằng năng lượng điện do pin cung cấp. Máy quartz có độ chính xác cao hơn máy cơ rất nhiều. Các loại máy đồng hồ sử dụng pin sạc như Eco-Drive, Solar, Kinetic, Autoquartz đều thuộc loại máy thạch anh.</p><h4>&nbsp; <strong>ECO-DRIVE – SOLAR – NĂNG LƯỢNG ÁNH SÁNG</strong>&nbsp;</h4><p>Loại máy thạch anh dùng pin sạc trang bị thêm tấm quang điện cho bộ máy để chuyển đổi năng lượng ánh sáng thành năng lượng điện và tích trữ trong pin sạc, pin sạc sẽ cung cấp năng lượng cho các hoạt động của máy. Xem thêm <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-eco-drive-la-gi-dinh-cao-cua-cong-nghe-dong-ho-eco-drive.html\"><i><strong>đồng hồ Eco-Drive là gì</strong></i></a> tại đây!<br>&nbsp;</p><p>&nbsp;</p><h4>✦&nbsp; <strong>KINETIC – AUTOQUARTZ – CƠ LAI PIN</strong></h4><p>Loại máy thạch anh dùng pin sạc trang bị thêm Bánh Đà cho bộ máy để chuyển đổi năng lượng cơ thành năng lượng điện và tích trữ trong pin sạc, pin sạc sẽ cung cấp năng lượng cho các hoạt động của máy.</p>', 'Từ điển kiến thức đồng hồ, Tìm hiểu về đồng hồ, Kiến thức về đồng hồ, Đồng hồ là gì', 0, 1, 1, '2023-03-21 22:55:45', '2023-04-12 16:04:01'),
(11, 1, 1, '59', 'THỢ SỬA ĐỒNG HỒ LƯƠNG BAO NHIÊU, HỌC Ở ĐÂU, CẦN TỐ CHẤT GÌ?', 'tho-sua-dong-ho-luong-bao-nhieu-hoc-o-dau-can-to-chat-gi', 'Đồng hồ đeo tay trở thành phụ kiện thời trang nhiều người ưa chuộng. Theo nhịp sống đó, nhu cầu mua sắm và sửa chữa đồng hồ cũng gia tăng đáng kể. Có lẽ vì thế, ngày nay, học nghề làm thợ sửa đồng hồ trở thành nghề nghiệp HOT được ưa chuộng nhất thị trường.', '<h2><strong>TÌM HIỂU VỀ NGHỀ THỢ SỬA ĐỒNG HỒ – LƯƠNG CAO, CƠ HỘI HẤP DẪN</strong></h2><p>Đáp ứng nhu cầu thị trường, nghề sửa đồng hồ được xem là mục tiêu được nhiều người hướng đến. Không chỉ vì mức thu nhập khủng mà bạn còn được trao cơ hội làm việc hấp dẫn trong việc phát triển bản thân.</p><p>Trong bài viết này, S_Watch sẽ cùng bạn tìm hiểu vì sao thợ sửa đồng hồ lại ngày càng được xem trọng trong giới.</p><h3><strong>1. NGHỀ SỬA ĐỒNG HỒ LÀ LÀM GÌ?</strong></h3><p>Nghề sửa đồng hồ là thực hiện các công việc giúp bảo dưỡng, thay mới và giải quyết lỗi sai trên một cỗ máy. Chẳng hạn như thay pin, <a href=\"https://donghohaitrieu.com/dich-vu-lau-dau-dong-ho\">lau dầu</a>, đánh bóng kính, thay dây,…</p><p>Thoạt nhìn có vẻ đơn giản nhưng bản chất thợ sửa đồng hồ cần nhiều tố chất mới làm được. Không cần kinh nghiệm nhưng bạn phải thực sự nỗ lực vì mục tiêu này mới dễ đạt thành công.&nbsp;</p><h3><strong>2. NHỮNG TỐ CHẤT CẦN CÓ CỦA THỢ SỬA ĐỒNG HỒ</strong></h3><p>Như đã nói trên, học sửa chữa đồng hồ là nghề dễ học, không đòi hỏi bằng cấp. Tuy nhiên, để một ngành nghề trở nên phổ biến và thịnh hành như thế cũng không phải dễ.</p><p>Thợ sửa đồng hồ được coi trọng không chỉ vì tay nghề chuyên nghiệp mà bản thân họ phải có được những tố chất cần có.</p><p><strong>» Đam mê đồng hồ, máy móc</strong>: Học sửa đồng hồ đeo tay là học làm việc với linh kiện và máy móc. Chính vì vậy, để bước chân vào một ngành nghề, bạn cần có đam mê và kiên trì. Nếu không, bạn sẽ mau chán và dễ dàng bỏ cuộc.</p><p><strong>» Tính cách kiên nhẫn</strong>: Các công việc liên quan đến kỹ thuật luôn đòi hỏi tính kiên nhẫn và tỉ mỉ cao. Bởi khi làm việc, bạn sẽ phải tiếp xúc với rất nhiều linh kiện nhỏ. Nếu không cẩn thận, bạn sẽ làm hỏng cả một bộ máy. Yếu tố cần cho lĩnh vực này chính là bình tĩnh, kiên nhẫn và tỉ mỉ.</p><p><strong>» Khả năng tự học cao</strong>: Thời đại phát triển kéo theo công nghệ tăng lên từng cao. Đáp ứng những thay đổi từ thị trường, thợ sửa đồng hồ phải có khả năng tự học cao, tự cập nhật kiến thức để không tụt hậu. Điều này giúp bạn dễ thăng tiến và nâng cao tay nghề bản thân.</p><p><strong>» Đòi hỏi tập trung tốt</strong>: Để sửa chữa thành công một chiếc đồng hồ, bạn có thể mất đi vài tiếng làm việc. Mô hình chung khiến bạn dễ lơ là vì mệt và áp lực. Vì thế, nếu muốn theo nghề lâu dài, bạn cần rèn luyện được tính tập trung cao độ và <a href=\"https://donghohaitrieu.com/kinh-nghiem/tinh-yeu-la-gi-ly-giai-40-khai-niem-hay-nhat-ve-tinh-yeu.html\">tình yêu</a> nghề.</p>', 'Thợ sửa đồng hồ, Nghề sửa đồng hồ, Tìm hiểu nghề sửa đồng hồ, Nghề thợ sửa đồng hồ, Thợ sửa đồng hồ là làm gì', 0, 1, 1, '2023-03-21 22:58:41', '2023-04-12 16:03:13');
INSERT INTO `news` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `summary`, `content`, `keywords`, `view`, `hot`, `appear`, `created_at`, `updated_at`) VALUES
(12, 1, 11, '60', 'Đồng hồ Orient nội địa Nhật Bản và những điều cần phải biết', 'dong-ho-orient-noi-dia-nhat-ban-va-nhung-dieu-can-phai-biet', 'Nới đến các thương hiệu đồng hồ Nhật Bản, không thể nào không nhắc đến Orient. Trong đó, đồng hồ Orient nội địa Nhật Bản đang dần được quan tâm và được tìm kiếm nhiều hơn. Vậy, đồng hồ Orient nội địa Nhật là gì cũng như cách phân biệt Orient nội địa Nhật ra sao? Hãy cùng S_Watch tìm hiểu ngay trong bài viết dưới đây nhé!', '<h2><strong>Đồng hồ Orient nội địa Nhật Bản là gì?</strong></h2><p>Đồng hồ <a href=\"https://orient-watch.com/\">Orient</a> nội địa Nhật Bản là những mẫu đồng hồ được sản xuất và bán riêng tại thị trường trong nước – đất nước mặt trời mọc Nhật Bản. Vì vậy, nếu muốn sở hữu, anh chị em phải qua Nhật mua hoặc nhờ người thân, người quen mua và đem về.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o-1024x683.jpg\" alt=\"Đồng hồ Orient nội địa Nhật Bản là những mẫu đồng hồ được sản xuất và bán riêng tại thị trường trong nước\" srcset=\"https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o-1024x683.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o-600x400.jpg 600w, https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o-300x200.jpg 300w, https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o-768x512.jpg 768w, https://benhviendongho.com/wp-content/uploads/2019/02/51825946_2004158236349711_6126609889549615104_o.jpg 1709w\" sizes=\"100vw\" width=\"680\"></p><p><i>Đồng hồ Orient nội địa Nhật Bản là những mẫu đồng hồ được sản xuất và bán riêng tại thị trường trong nước</i></p><h2><strong>Phân biệt đồng hồ Orient nội địa Nhật Bản và Orient quốc tế</strong></h2><p>Vậy đồng hồ Orient nội địa Nhật Bản và phiên bản quốc tế có khác nhau không? Để có cái nhìn tổng quát về hai phiên bản này, anh chị em hãy theo dõi ngay thông tin dưới đây nhé.</p><h3><strong>Số hiệu sản phẩm</strong></h3><p>Số hiệu sản phẩm là một trong những tiêu chí mà anh chị em có thể sử dụng để kiểm tra xem chiếc đồng hồ Orient mình đang sở hữu là bản nội địa hay hàng quốc tế. Tại thị trường nội địa Nhật, đồng hồ Orient được áp dụng số hiệu sản phẩm là 8 chữ số. Khi được bán tại thị trường quốc tế số hiệu sản phẩm sẽ được bổ sung ký tự theo chuẩn 10 chữ số tuỳ theo nhà phân phối hoặc quy tắc nhập khẩu tại quốc gia đó.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-680x469.jpg\" alt=\"Số hiệu sản phẩm là một trong những tiêu chí mà anh chị em có thể sử dụng để kiểm tra xem chiếc đồng hồ Orient mình đang sở hữu là bản nội địa hay hàng quốc tế.\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-680x469.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-600x414.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-1024x707.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-768x530.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2-1536x1060.jpg 1536w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-2.jpg 1600w\" sizes=\"100vw\" width=\"680\"></p><p><i>Số hiệu sản phẩm là một trong những tiêu chí mà anh chị em có thể sử dụng để kiểm tra xem chiếc đồng hồ Orient mình đang sở hữu là bản nội địa hay hàng quốc tế.</i></p><h3><strong>Thẻ bảo hành</strong></h3><p>Bên cạnh số hiệu sản phẩm, thẻ bảo hành cũng là yếu tố giúp anh chị em phân biệt. Với đồng hồ Orient nội địa Nhật, trên thẻ bảo hành sẽ ghi dòng chữ “This guarantee is valid only in Japan“ (Thẻ bảo hành này chỉ có hiệu lực tại Nhật Bản). Với phiên bản Orient quốc tế, anh chị em sẽ thấy dòng chữ “International Guarantee” (Thẻ bảo hành quốc tế) trên thẻ. Với sổ bảo hành này, anh chị em có thể bảo hành đồng hồ Orient của mình tại bất kỳ trung tâm bảo hành Orient nào trên thế giới.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-680x383.jpg\" alt=\"Với đồng hồ Orient nội địa Nhật, trên thẻ bảo hành sẽ ghi dòng chữ “This guarantee is valid only in Japan“\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-680x383.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-600x338.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-1024x576.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-768x432.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1-1536x864.jpg 1536w, https://benhviendongho.com/wp-content/uploads/2021/12/dong-ho-orient-noi-dia-nhat-ban-1.jpg 1600w\" sizes=\"100vw\" width=\"680\"></p><p><i>Với đồng hồ Orient nội địa Nhật, trên thẻ bảo hành sẽ ghi dòng chữ “This guarantee is valid only in Japan“</i></p><h3><strong>“Made in Japan”</strong></h3><p>Ngoài ra, đây cũng là một cách khá dễ dàng để anh chị em có thể nhận biết đâu là đồng hồ Orient nội địa Nhật Bản. Với những chiếc đồng hồ nội địa Nhật, chắc chắn sẽ được khắc dòng chữ “Made in Japan” ở ngay góc 6h. Tuy nhiên, điều này là chưa đủ chứng minh đó có phải là hàng nội địa hay không. Hãy kiểm tra kết hợp thêm những dấu hiệu khác anh chị em nhé.</p>', 'Đồng hồ nội địa Nhật, Đồng hồ Nhật, Đồng hồ Orient nội địa Nhật Bản, Đồng hồ Orient, Orient', 0, 1, 1, '2023-03-21 23:15:04', '2023-04-12 16:02:13'),
(13, 1, 1, '61', 'Hướng dẫn cách làm mềm dây da đồng hồ chỉ 30s tại nhà', 'huong-dan-cach-lam-mem-day-da-dong-ho-chi-30s-tai-nha', 'Đối với những anh chị em sử dụng đồng hồ, dây đeo là một trong những bộ phận chiếm diện tích lớn và quan trọng không kém bộ máy đồng hồ. Đặc biệt với dây da, dễ hỏng, bong tróc và có tuổi thọ ngắn hơn nhiều so với những chất liệu khác. Trong bài viết hôm nay, S_Watch sẽ hướng dẫn anh chị em cách làm mềm dây da đồng hồ chỉ 30s tại nhà cực nhanh chóng dưới đây nhé.', '<h2><strong>Cách làm mềm dây da đồng hồ với dưỡng da chuyên dụng</strong></h2><p>Đây là cách làm dây da đồng hồ mềm hiệu quả nhất và nhanh nhất. Anh chị em chỉ cần lấy một lượng dưỡng da vừa đủ, làm ấm bằng lòng bàn tay và thoa đều lên da. Hãy cẩn thận không để tiếp xúc với bộ phận khác như vỏ hay mặt số nhé.</p><p>Với phương pháp này, cách thực hiện vô cùng đơn giản, nhưng lựa chọn loại dưỡng da nào phù hợp mới là vấn đề anh chị em cần quan tâm. Bệnh Viện Đồng Hồ cũng sẽ hướng dẫn anh chị em ngay dưới đây.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1-680x510.jpg\" alt=\"Cách làm mềm dây da đồng hồ với dưỡng da chuyên dụng\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1-680x510.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1-400x300.jpg 400w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1-600x450.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1-768x576.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-1.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Cách làm mềm dây da đồng hồ với dưỡng da chuyên dụng</i></p><h3><strong>Hướng dẫn lựa chọn loại dưỡng da chuyên dụng phù hợp</strong></h3><p>Về cơ bản, có 3 tiêu chí chính giúp anh chị em có thể lựa chọn được loại dưỡng da chuyên dụng phù hợp với dây đeo đồng hồ của mình như sau:</p><h4><strong>Lựa chọn loại dưỡng da chuyên dụng không chứa hóa chất</strong></h4><p>Trước tiên, anh chị em hãy xem xét thành phần của chất dưỡng da. Nếu chứa các hóa chất mạnh cũng có thể làm hỏng dây da đồng hồ của anh chị em đó nhé. Hơn nữa, nếu thuộc làn da quá mẫn cảm, việc này cũng có thể gây kích ứng, dị ứng cho làn da của người đeo.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-2-680x383.jpg\" alt=\"Những thành phần hóa chất mạnh có thể làm hỏng dây đeo da\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-2-680x383.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-2-600x338.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-2-768x432.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-2.jpg 800w\" sizes=\"100vw\" width=\"680\"></p><p><i>Những thành phần hóa chất mạnh có thể làm hỏng dây đeo da</i></p><h4><strong>Lựa chọn loại dưỡng da chuyên dụng có đặc tính phù hợp</strong></h4><p>Bên cạnh thành phần, anh chị em cũng nên đọ kỹ hướng dẫn sử dụng và mô tả của loại dưỡng da đó. Cùng là chất liệu da, nhưng dưỡng da cho dây đeo đồng hồ sẽ khác hoàn toàn với dây da thắt lưng hay thậm chí da trên yên xe, …</p><h4><strong>Không nên quá chú trọng vào giá khi lựa chọn loại dưỡng da chuyên dụng</strong></h4><p>Nhiều người cho rằng tiền nào của nấy, hay giá cả đi đôi với chất lượng. Tuy nhiên, điều này sẽ cực kỳ sai lầm nếu anh chị em không quan tâm đến thành phần hay đặc tính của sản phẩm. Bởi như đã nói, nếu có nhiều hóa chất mạnh hay chất không phù hợp có thể phá hủy dây da của anh chị em hoặc ảnh hưởng đến sức khỏe làn da của người đeo.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8-680x453.jpg\" alt=\"Không nên quá chú trọng vào giá khi lựa chọn loại dưỡng da chuyên dụng\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8-680x453.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8-600x400.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8-1024x682.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8-768x512.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-8.jpg 1100w\" sizes=\"100vw\" width=\"680\"></p><p><i>Không nên quá chú trọng vào giá khi lựa chọn loại dưỡng da chuyên dụng</i></p><h2><strong>Cách làm mềm dây da đồng hồ với hỗn hợp vaseline</strong></h2><p>Sử dụng hỗn hợp vaseline cùng cồn cũng là một cách làm cho dây da đồng hồ mềm khá hiệu quả và đơn giản. Anh chị em chỉ cần chuẩn bị vaseline, cồn, bông gòn là đã có thể thực hiện phương pháp này rồi nhé. Theo dõi từng bước dưới đây nếu chưa biết cách làm:</p><p>Bước 1: Trộn dung dịch cồn và vaseline một lượng vừa đủ. Sử dụng bông gòn thấm hỗn hợp và xoa đều nhẹ nhàng lên dây da đồng hồ. Có thể thực hiện lại thao tác này từ 2 – 3 lần cho đến khi dây đồng hồ sạch hết bụi bẩn, cặn thừa.</p><p>Bước 2: Dùng ngón tay thoa đều phần hỗn hợp này, chú ý không để dính vào những bộ phận khác trên đồng hồ như vỏ hay mặt số.</p><p>Bước 3: Có thể sử dụng bông gòn lau lại nếu lấy quá nhiều hỗn hợp. Để ở nơi thoáng mát để dây đồng hồ khô hẳn trước khi sử dụng lại.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-4-680x452.jpg\" alt=\"Cách làm mềm dây da đồng hồ với hỗn hợp vaseline\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-4-680x452.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-4-600x399.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-4.jpg 730w\" sizes=\"100vw\" width=\"680\"></p><p><i>Cách làm mềm dây da đồng hồ với hỗn hợp vaseline</i></p><h2><strong>Cách làm mềm dây da đồng hồ với dầu tự nhiên</strong></h2><p>Sử dụng dầu tự nhiên cũng là 1 cách làm mềm dây đồng hồ mà nhiều người áp dụng thành công. Loại dầu mà anh chị em sử dụng cũng rất dễ dàng tìm kiếm được như dầu dừa, dầu ô liu, … Dưới đây là hướng dẫn từng bước làm mềm dây với dầu tự nhiên:</p><p>Bước 1: Phơi dây da đồng hồ dưới ánh nắng mặt trời nhẹ khoảng 5 phút, giúp mở lỗ chân lông và nới lỏng liên kết cấu trúc.</p><p>Bước 2: Thoa đều dầu tự nhiên lên bề mặt dây đeo. Với thành phần an toàn gần như 100%, loại dưỡng này sẽ không gây hại đến hầu hết tất cả chất liệu dây.</p><p>Bước 3: Để đồng hồ ở nơi thoáng mát và đợi khô hẳn để sử dụng lại.</p><blockquote><p><i>Tham khảo&nbsp;</i><a href=\"https://benhviendongho.com/day-dong-ho\"><i>+100 dây đồng hồ đa dạng mẫu mã tại Bệnh Viện Đồng Hồ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-5-680x385.jpg\" alt=\"Cách làm mềm dây da đồng hồ với dầu tự nhiên\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-5-680x385.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-5-600x340.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-5-768x435.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-5.jpg 900w\" sizes=\"100vw\" width=\"680\"></p><p><i>Cách làm mềm dây da đồng hồ với dầu tự nhiên</i></p><h2><strong>Một số lưu ý khi làm mềm dây da đồng hồ</strong></h2><p>Dù sử dụng phương pháp làm mềm dây đồng hồ nào. anh chị em cũng cần lưu ý một vài thông tin dưới đây.</p><h3><strong>#1. Cách làm mềm dây da đồng hồ mới</strong></h3><p>Với một chiếc dây da đồng hồ mới tinh, có thể anh chị em có thể gặp phải tình trạng hơi cứng ban đầu. Tuy nhiên, nếu không muốn áp dụng những phương pháp trên, anh chị em chỉ cần chịu khó sử dụng khoảng 2 – 3 ngày, dây sẽ tự mềm ra.</p><h3><strong>#2. Sử dụng một lượng dung dịch làm mềm vừa đủ</strong></h3><p>Như đã nói, việc sử dụng quá nhiều hỗn hợp làm mềm vừa gây lãng phí không cần thiết mà thậm chí còn có thể gây hư hại đến bề mặt da.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-6.jpg\" alt=\"Sử dụng một lượng dung dịch làm mềm vừa đủ\"></p><p><i>Sử dụng một lượng dung dịch làm mềm vừa đủ</i></p><h3><strong>#3. Đợi dây đồng hồ khô hẳn mới sử dụng</strong></h3><p>Nhiều anh chị em vội vàng sử dụng đồng hồ ngay khi vừa dùng các dung dịch làm mềm. Tuy nhiên, điều này là không nên. Hãy đợi dây đồng hồ khô hẳn tốt nhất là từ 8 – 10 tiếng (qua đêm). Việc này sẽ giúp đạt được hiệu quả cao nhất trong việc làm mềm cũng như đem đến cảm giác thoải mái nhất khi đeo đồng hồ.</p><h3><strong>#4. Cẩn thận khi sử dụng hỗn hợp với cồn</strong></h3><p>Phương pháp sử dụng vaseline cùng cồn cũng là một cách được sử dụng phổ biến. Tuy nhiên, hãy chú ý lấy một lượng cồn vừa đủ, vì dù đã được pha loãng, nhưng vẫn có thể gây hại đến dây đeo do tính chất hóa học đặc trưng của cồn.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/cach-lam-mem-day-da-dong-ho-7.jpg\" alt=\"Cẩn thận khi sử dụng hỗn hợp với cồn\"></p><p><i>Cẩn thận khi sử dụng hỗn hợp với cồn</i></p><h3><strong>#5. Cẩn thận với những hoạt chất mạnh có thể gây biến đổi sắc da</strong></h3><p>Nhắc lại một lần nữa về tác hại của hoạt chất mạnh có trong chất dưỡng da. Hãy tìm hiểu thật kỹ càng thành phần của dung dịch làm mềm trước khi quyết định sử dụng trên dây đeo anh chị em nhé!</p><p><i>(Nguồn: wristwatchessentials.com)</i></p><p>Trên đây, Bệnh Viện Đồng Hồ đã tổng hợp thông tin đến anh chị em hướng dẫn cách làm mềm dây da đồng hồ cực kỳ nhanh chóng và hiệu quả 100% tại nhà. Hy vọng anh chị em đã có được những kiến thức mới và bổ ích.</p>', 'Cách làm mềm dây da đồng hồ, Làm mềm dây da đồng hồ, Khắc phục dây da đồng hồ, Dây da đồng hồ', 0, 1, 1, '2023-03-21 23:17:51', '2023-04-12 16:01:24'),
(14, 1, 1, '62', 'Thép không gỉ 316L là gì? Thép 316 và thép 316L có gì khác nhau?', 'thep-khong-gi-316l-la-gi-thep-316-va-thep-316l-co-gi-khac-nhau', 'Nếu là một tín đồ của đồng hồ đeo tay chắc hẳn anh chị em cũng đã từng nghe đến chất liệu thép 316L (Inox 316L, hợp kim 316L). Bởi đây là một trong những thành phần phổ biến và được sử dụng nhiều nhất trong việc chế tạo nên vỏ của đồng hồ đeo tay. Trong bài viết hôm nay, S_Watch sẽ cùng anh chị em tìm hiểu thép không gỉ 316L là gì? Thép 316L có tốt không? So sánh thép 316 và thép 316L có gì khác nhau nhé.', '<h2><strong>Thép 316L là gì? Inox 316L là gì? 316L Stainless Steel là gì?</strong></h2><p>Thép không gỉ 316L, thép 316L, inox 316L hay 316L Stainless Steel đều là tên của cùng 1 loại chất liệu. Như đã nói, bên cạnh việc là thành phần chủ chốt trong ngành công nghiệp chế tác đồng hồ đeo tay, thép 316L còn được sử dụng trong y tế, phẫu thuật. Vậy trong chất liệu này có những thành phần nào, tại sao nó được ưa chuộng như vậy?</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-1.jpg\" alt=\"Thép không gỉ 316L là một loại hợp kim có thành phần chủ yếu là sắt có khả năng chống ăn mòn\"></p><p><i>Thép không gỉ 316L là một loại hợp kim có thành phần chủ yếu là sắt có khả năng chống ăn mòn</i></p><p>Thép không gỉ 316L là một loại hợp kim có thành phần chủ yếu là sắt có khả năng chống ăn mòn. Bên cạnh đó, trong thép 316L còn chứa 16,5% – 18,5% Crom, 10% – 13% Niken và 2% – 2,5% Molypden. Ngoài ra, cũng chưa một lượng nhỏ các nguyên tố khác như 0.045% Phốt Pho, 0.015% Lưu Huỳnh, 0.11% Nitơ.</p><p>Trong đó, Crom có tính chất tăng cường chống ăn mòn, oxi hóa, bảo vệ thép không bị gỉ sét kể cả sau một thời gian dài sử dụng. Cùng với Niken bổ sung khả năng chống axit và Molypden thêm độ bền và chống lại nhiệt độ cao.</p><h2><strong>Thép 316L có tốt không? Tại sao được sử dụng phổ biến trong chế tác đồng hồ?</strong></h2><p>Với thành phần cấu tạo như trên, chắc hẳn anh chị em cũng biết được ưu điểm nổi bật của chất liệu thép 316L chính là khả năng chống ăn mòn, chống oxi hóa với độ bền cực cao. Do đó, dù sử dụng qua một thời gian dài, tiếp xúc nhiều với nước, muối, nước clo, … cũng không làm hư hại đến thép 316L.</p><p>Bên cạnh đó, thép 316L còn có tính chất đặc biệt an toàn, bởi đây là loại thép được sử dụng trong y tế, phẫu thuật, do đó, rất hiếm khi có khả năng gây kích ứng, trừ những trường hợp đặc biệt hiếm gặp.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-680x680.jpg\" alt=\"Thép 316L là chất liệu được sử dụng rất phổ biến trong chế tác đồng hồ đeo tay\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-680x680.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-100x100.jpg 100w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-600x600.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-150x150.jpg 150w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2-768x768.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-2.jpg 800w\" sizes=\"100vw\" width=\"680\"></p><p><i>Thép 316L là chất liệu được sử dụng rất phổ biến trong chế tác đồng hồ đeo tay</i></p><p>Một số đặc điểm khác của thép 316L khiến chúng được sử dụng phổ biến nhất trong ngành công nghiệp chế tác đồng hồ đeo tay:</p><ul><li>Bề mặt nhẵn, bóng, mịn, không bị xám và mờ như Titan.</li><li>Bền màu, không bị đổi màu, dễ dàng vệ sinh, làm sạch chỉ với khăn mềm.</li><li>Dễ tạo kiểu, uốn nắn, sơn phủ, đặc biệt khi sử dụng công nghệ mạ PVD sẽ không bị bong tróc loang lổ mất thẩm mỹ.</li></ul><h2><strong>Thép 316 và thép 316L có gì khác nhau?</strong></h2><p>Thép 316L thực tế là một loại chất liệu thuộc dạng thép 316. Ngoài 316L, thép 316 còn có 316F, 316N, 316H. Cùng tìm hiểu sự khác nhau của thép 316 và 316L ngay dưới đây nhé.</p><h3><strong>Tính chất của thép 316 với thép 316L</strong></h3><p>Cả 2 loại thép 316 và 316L đều có khả năng chống ăn mòn và chịu nhiệt độ cao rất tốt, cũng như dễ dàng tạo kiểu, uốn nắn.</p><h3><strong>Sự khác nhau giữa thép 316 và thép 316L</strong></h3><p>Sự khác biệt phải kể đến đầu tiên là thép 316L có ít carbon hơn thép 316. Bên cạnh đó, trong 2 loại thép này cũng có thành phần khác nhau. Thép 316 có hàm lương Molypden cao hơn khiến cho khả năng chống ăn mòn, chống rỗ trong dung dịch clorua và chống chịu nhiệt độ cao hơn.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-3-680x383.jpg\" alt=\"Sự khác biệt phải kể đến đầu tiên là thép 316L có ít carbon hơn thép 316\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-3-680x383.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-3-600x338.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-3-768x432.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/11/thep-khong-gi-316l-3.jpg 860w\" sizes=\"100vw\" width=\"680\"></p><p><i>Sự khác biệt phải kể đến đầu tiên là thép 316L có ít carbon hơn thép 316</i></p><p>Các ứng dụng phổ biến của thép 316 bao gồm chế tạo ống xả, bộ phận lò, bộ trao đổi nhiệt, bộ phận động cơ phản lực, thiết bị dược phẩm, nhiếp ảnh, bộ phận van, máy bơm, thiết bị xử lý hóa chất, bồn chứa, thiết bị bay hơi, các thiết bị xử lý bột giấy, giấy, dệt may, …</p><p>Với thép 316L có hàm lượng carbon thấp hơn, giúp đem đến sự an toàn hơn cho người sử dụng bởi nó giảm thiểu sự kết tủa các cacbua có hại.</p><h3><strong>Thuộc tính và thành phần của thép 316 và 316L</strong></h3><ul><li>Mật độ: 0,799g / cm3.</li><li>Điện trở suất: 74 microhm-cm (20 độ C).</li><li>Nhiệt riêng: 0,50 kiloJoules / kilôgam-Kelvin (0–100 độ C).</li><li>Độ dẫn nhiệt: 16,2 Watts / mét-Kelvin (100 độ C).</li><li>Mô đun đàn hồi (MPa): lực căng 193 x 103.</li><li>Phạm vi nóng chảy: 2.500–2.550 độ F (1.371–1.399 độ C).</li></ul><p>Dưới đây là bảng phân tích tỷ lệ phần trăm của các nguyên tố khác nhau được sử dụng để tạo ra thép 316 và 316L:</p><figure class=\"table\"><table><tbody><tr><td>Thành phần</td><td>Thép 316 (%)</td><td>Thép 316L (%)</td></tr><tr><td>Carbon</td><td>0.08 max.</td><td>0.03 max.</td></tr><tr><td>Mangan</td><td>2.00 max.</td><td>2.00 max.</td></tr><tr><td>Phốt pho</td><td>0.045 max.</td><td>0.045 max.</td></tr><tr><td>Lưu huỳnh</td><td>0.03 max.</td><td>0.03 max.</td></tr><tr><td>Silicon</td><td>0.75 max.</td><td>0.75 max.</td></tr><tr><td>Chromium</td><td>16.00-18.00</td><td>16.00-18.00</td></tr><tr><td>Niken</td><td>10.00-14.00</td><td>10.00-14.00</td></tr><tr><td>Molypden</td><td>2.00-3.00</td><td>2.00-3.00</td></tr><tr><td>Nitơ</td><td>0.10 max.</td><td>0.10 max.</td></tr><tr><td>Sắt</td><td>Balance</td><td>Balance</td></tr></tbody></table></figure><p><i>(Nguồn: circulawatches.com và thoughtco.com)</i></p><p>Hi vọng với bài viết ngày hôm nay, anh chị em đã nắm được thông tin về thép không gỉ 316L là gì? Thép 316L có tốt không? So sánh thép 316 và thép 316L có gì khác nhau. Nếu có bất cứ thắc mắc nào cần được giải đáp hoặc tư vấn, anh chị em đừng ngần ngại liên hệ tới S_Watch nhé.</p>', 'Thép không gỉ, Thép không gỉ 316, Thép không gỉ 316L, Thép 316, Thép 316L, Thép 316L có tốt không, Thép 316 có tốt không, Thép 316 khác thép 316L ', 0, 1, 1, '2023-03-21 23:20:09', '2023-04-12 16:00:09'),
(15, 1, 1, '63', 'Cấu tạo đồng hồ đeo tay có đơn giản như bạn nghĩ?', 'cau-tao-dong-ho-deo-tay-co-don-gian-nhu-ban-nghi', 'Đối với những anh chị em đã biết tới S_Watch từ lâu, chắc chắn đã sở hữu cho bản thân một hoặc thậm chí cả bộ sưu tập đồng hồ đeo tay đồ sộ. Tuy nhiên, cấu tạo đồng hồ đeo tay như thế nào không phải ai cũng nắm rõ. Trong bài viết hôm nay, S_Watch sẽ giúp anh chị em có được thông tin đầy đủ và chi tiết nhất về các bộ phận của đồng hồ đeo tay từ trong ra ngoài nhé.', '<h2><strong>Bộ phận bên ngoài của đồng hồ đeo tay</strong></h2><p>Phần đầu tiên của bài viết, mời anh chị em cùng tìm hiểu về những bộ phận lộ rõ ra bên ngoài khi quan sát một chiếc đồng hồ đeo tay thông thường nhé.</p><h3><strong>Vỏ đồng hồ</strong></h3><p>Vỏ đồng hồ là một trong những bộ phận chiếm phần lớn nhất để tạo nên một chiếc đồng hồ đeo tay hoàn chỉnh. Đây cũng là nơi chứa những bộ phận cấu tạo đồng hồ khác.</p><p>Vỏ đồng hồ có thể có nhiều chất liệu sản xuất, phổ biến nhất là thép không gỉ, bởi thép có tính dẻo, dễ tạo hình, chịu sốc nhẹ. Bên cạnh đó, vàng, hay bạch kim cũng là chất liệu thường được sử dụng cho những mẫu đồng hồ cao cấp. Ở những dòng đồng hồ thể thao, chất liệu nhựa cũng được ưu tiên dùng cho vỏ đồng hồ.</p><blockquote><p><a href=\"https://benhviendongho.com/cac-vat-lieu-duoc-su-dung-lam-vo-dong-ho\"><i>Các loại vỏ đồng hồ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2018/11/IMG_1969-copy-1.jpg\" alt=\"Vỏ đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2018/11/IMG_1969-copy-1.jpg 794w, https://benhviendongho.com/wp-content/uploads/2018/11/IMG_1969-copy-1-600x400.jpg 600w, https://benhviendongho.com/wp-content/uploads/2018/11/IMG_1969-copy-1-300x200.jpg 300w, https://benhviendongho.com/wp-content/uploads/2018/11/IMG_1969-copy-1-768x512.jpg 768w\" sizes=\"100vw\" width=\"680\"></p><p><i>Vỏ đồng hồ</i></p><h3><strong>Quai đeo đồng hồ</strong></h3><p>Phần quai đeo đồng hồ, hay thường gọi là phần lug đồng hồ, là bộ phận giúp kết nối vỏ đồng hồ với dây đeo. Lug đồng hồ thường được sản xuất đồng nhất chất liệu với vỏ đồng hồ.</p><h3><strong>Núm đồng hồ</strong></h3><p>Núm đồng hồ là bộ phận không thể thiếu trong cấu tạo của đồng hồ đeo tay. Nó giúp người đeo điều chình thời gian, hoặc một chức năng khác nếu được tích hợp trên đồng hồ. Núm đồng hồ cần đảm bảo được độ kín nước, chống vào nước.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2019/02/lich-su-dong-ho-tag-heuer-carrera-24.jpg\" alt=\"Núm đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2019/02/lich-su-dong-ho-tag-heuer-carrera-24.jpg 680w, https://benhviendongho.com/wp-content/uploads/2019/02/lich-su-dong-ho-tag-heuer-carrera-24-600x400.jpg 600w, https://benhviendongho.com/wp-content/uploads/2019/02/lich-su-dong-ho-tag-heuer-carrera-24-300x200.jpg 300w\" sizes=\"100vw\" width=\"680\"></p><p><i>Núm đồng hồ</i></p><h3><strong>Dây đồng hồ / Khóa đồng hồ</strong></h3><p>Bên cạnh vỏ đồng hồ thì dây đeo đồng hồ là bộ phận chiếm phần diện tích lớn thứ hai. Dây đồng hồ có thể được làm từ nhiều chất liệu khác nhau như kim loại (thép không gỉ, vàng, bạch kim, …), hoặc da (da bê, da bò, da cá sấu, …). Ngoài ra một số chất liệu khác có độ phổ biến kém hơn như cao su, nhựa cũng được sử dụng để xuất dây đeo đồng hồ.</p><blockquote><p><a href=\"https://benhviendongho.com/cac-loai-khoa-dong-ho-deo-tay\"><i>Các loại khóa đồng hồ đeo tay</i></a></p></blockquote><p>Đi kèm với dây đồng hồ là khóa đồng hồ, có tác dụng giúp cố định chắc chắc phần dây ôm sát với cổ tay người đeo. Bộ phận này thường được cấu tạo từ thép không gỉ, một số phiên bản cao cấp có thể được sử dụng vàng, bạch kim, …</p><blockquote><p><a href=\"https://benhviendongho.com/dich-vu-thay-day-dong-ho\"><i>Dịch vụ thay dây đồng hồ</i></a></p></blockquote><h3><strong>Kim đồng hồ</strong></h3><p>Tiếp theo không thể nào thiếu được kim đồng hồ. Đa số các mẫu đồng hồ trên thị trường hiện nay đều là kiểu đồng hồ Analog, do đó, kim là một bộ phận phải có.</p><blockquote><p><a href=\"https://benhviendongho.com/dong-ho-analog-la-gi\"><i>Đồng hồ Analog là gì?</i></a></p></blockquote><p>Ba loại kim chính là kim giờ, kim phút, kim giây, với thiết kế kim giờ ngắn và lớn nhất, kim giây dài và mảnh nhất. Ngoài ra, đồng hồ có thể có thêm kim chỉ lịch ngày, thứ, tháng, kim chỉ 24h, …</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2019/02/dong-ho-co-kim-giay-giat_habring-2.jpg\" alt=\"Kim đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2019/02/dong-ho-co-kim-giay-giat_habring-2.jpg 680w, https://benhviendongho.com/wp-content/uploads/2019/02/dong-ho-co-kim-giay-giat_habring-2-600x402.jpg 600w, https://benhviendongho.com/wp-content/uploads/2019/02/dong-ho-co-kim-giay-giat_habring-2-300x201.jpg 300w\" sizes=\"100vw\" width=\"680\"></p><p><i>Kim đồng hồ</i></p><p>Hơn nữa, không chỉ có một thiết kế nhàm chán, kim đồng hồ cũng có rất nhiều kiểu thiết kế khác nhau. Mỗi thiết kế này cũng có một tên gọi khác. Anh chị em có thể tham khảo thêm trong bài viết dưới đây nhé!</p><blockquote><p><a href=\"https://benhviendongho.com/kim-dong-ho-phan-1\"><i>Kim đồng hồ</i></a></p></blockquote><h3><strong>Vòng bezel</strong></h3><p>Vòng bezel là một vòng ngoài của vỏ đồng hồ kết nối với phần quai đeo đồng hồ. Vòng bezel thường có chất liệu đồng nhất với vỏ, một số phiên bản đặc biệt khác sẽ được làm từ chất liệu cao cấp hơn.</p><p>Bộ phận này cũng có thể được cố định hoặc xoay 1 chiều, 2 chiều tùy thuộc vào thiết kế và chức năng của mỗi mẫu dồng hồ.</p><h3><strong>Kính đồng hồ</strong></h3><p>Mặt kính chính là một bộ phận không thể thiếu của một chiếc đồng hồ, giúp bảo vệ các bộ phận bên trong khỏi các tác động từ bên ngoài môi trường. Các chất liệu làm kính đồng hồ cũng cực kỳ đa dạng, có thể từ nhựa mica, kính cứng, kính Sapphire, …</p><blockquote><p><a href=\"https://benhviendongho.com/bao-gia-thay-mat-kinh-dong-ho-deo-tay\"><i>Dịch vụ thay mặt kính đồng hồ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/09/thay-mat-kinh-dong-ho-versace-1-680x425.jpg\" alt=\"Kính đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/09/thay-mat-kinh-dong-ho-versace-1-680x425.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/09/thay-mat-kinh-dong-ho-versace-1-600x375.jpg 600w, https://benhviendongho.com/wp-content/uploads/2021/09/thay-mat-kinh-dong-ho-versace-1-768x480.jpg 768w, https://benhviendongho.com/wp-content/uploads/2021/09/thay-mat-kinh-dong-ho-versace-1.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Kính đồng hồ</i></p><h3><strong>Mặt số đồng hồ</strong></h3><p>Mặt số đồng hồ chính là nơi giúp người đeo xem giờ, hiển thị các chức năng khác của đồng hồ. Mặt đồng hồ thường có bề mặt phẳng, đa dạng màu sắc, chất liệu.</p><h2><strong>Bộ phận bên trong của bộ máy đồng hồ đeo tay</strong></h2><p>Để đồng hồ có thể hoạt động trơn tru, bộ phận quan trọng nhất chính là bộ máy đồng hồ. Dưới đây mời anh chị em cùng tìm hiểu các bộ phận cấu tạo nên bộ máy phức tạp này nhé.</p><h3><strong>Dây tóc đồng hồ</strong></h3><p>Dây tóc đồng hồ hay còn gọi là dây tóc cân bằng là một bộ phận trong bộ máy đồng hồ cơ, giúp giữ cho bánh xe cân bằng của đồng hồ hoạt động trơn tru, mềm mại hơn.</p><blockquote><p><a href=\"https://benhviendongho.com/ky-thuat-day-toc-dong-ho-duoc-san-xuat-nhu-the-nao\"><i>Dây tóc đồng hồ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture.jpg\" alt=\"Dây tóc đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture.jpg 1500w, https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture-600x409.jpg 600w, https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture-300x205.jpg 300w, https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture-768x524.jpg 768w, https://benhviendongho.com/wp-content/uploads/2019/03/rolex-parachrom-bleu-hairspring-picture-1024x698.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Dây tóc đồng hồ</i></p><h3><strong>Bánh xe cân bằng</strong></h3><p>Như đã nhắc ở trên, bánh xe cân bằng sẽ hoạt động đồng thời với dây tóc đồng hồ. Bộ phận này giúp chia từng khoảng thời gian, đảm bảo đồng hồ hoạt động chính xác.</p><blockquote><p><a href=\"https://benhviendongho.com/nhung-thiet-ke-banh-xe-can-bang-dac-biet-nhat-the-gioi\"><i>Bánh xe cân bằng</i></a></p></blockquote><h3><strong>Barrel</strong></h3><p>Là bộ phận có ảnh hưởng và quyết định đến khả năng dự trữ cót của đồng hồ. Một số mẫu đồng hồ có Barrel lớn cũng có thời gian trữ cót dài hơn.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2018/12/h%E1%BB%99p-c%C3%B3tbarrel.jpg\" alt=\"Hộp cót (barrel) đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2018/12/hộp-cótbarrel.jpg 1280w, https://benhviendongho.com/wp-content/uploads/2018/12/hộp-cótbarrel-600x338.jpg 600w, https://benhviendongho.com/wp-content/uploads/2018/12/hộp-cótbarrel-300x169.jpg 300w, https://benhviendongho.com/wp-content/uploads/2018/12/hộp-cótbarrel-768x432.jpg 768w, https://benhviendongho.com/wp-content/uploads/2018/12/hộp-cótbarrel-1024x576.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Hộp cót (barrel) đồng hồ</i></p><h3><strong>Bridge</strong></h3><p>Là bộ phận được gắn cố định vào đĩa đồng hồ chính, tạo thành một bộ khung của máy, chứa tất cả các bộ phận khác.</p><h3><strong>Calibre / Caliber</strong></h3><p>Đầu tiên đây là tên gọi để chỉ vị trí và kich thước của bộ phận đồng hồ. Tuy nhiên, hiện nay, nó được dùng để chỉ số máy đồng hồ, nguồn gốc hoặc nhà máy sản xuất.</p><blockquote><p><a href=\"https://benhviendongho.com/tai-sao-bo-may-dong-ho-duoc-goi-la-caliber\"><i>Calibre là gì?</i></a></p></blockquote><h3><strong>Bộ thoát</strong></h3><p>Đây là một trong những bộ phận quan trọng nhất của đồng hồ đeo tay. Nó giúp duy trì dao động của bánh xe cân bằng và giữ cho đồng hồ hoạt động liên tục, không gián đoạn.</p><blockquote><p><a href=\"https://benhviendongho.com/lich-su-va-su-phat-trien-cua-bo-thoat-trong-che-tac-dong-ho\"><i>Lịch sử của bộ thoát đồng hồ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever.jpg\" alt=\"Bộ thoát đồng hồ Swiss Lever\" srcset=\"https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever.jpg 1500w, https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever-600x328.jpg 600w, https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever-300x164.jpg 300w, https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever-1024x560.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2020/06/Bo-thoat-Swiss-Lever-768x420.jpg 768w\" sizes=\"100vw\" width=\"680\"></p><p><i>Bộ thoát đồng hồ Swiss Lever</i></p><h3><strong>Gioăng đồng hồ</strong></h3><p>Gioăng đồng hồ là một bộ phận vòng nhỏ được sử dụng để tạo ra một vòng đệm kín khí. Những chiếc gioăng này được đặt xung quanh mặt đáy đồng hồ, kính đồng hồ và núm đồng hồ giúp đồng hồ kín nước, không bị vào nước. Gioăng đồng hồ thường được làm từ cao su và nên được kiểm tra định kỳ khả năng chống nước.</p><h3><strong>Con dấu Geneva</strong></h3><p>Mắc dù đây không phải là một bộ phận thuộc bộ máy đồng hồ, nhưng con dấu này được đóng dấu trên bộ máy. Để đạt được con dấu Geneva, đồng hồ phải trải qua 12 bài kiểm tra khác nhau, liên quan đến chất lượng, độ hoàn thiện và chất liệu. Chiếc đồng hồ này cũng phải được sản xuát tại Geneva.</p><blockquote><p><a href=\"https://benhviendongho.com/ky-thuat-cac-chung-chi-va-con-dau-chat-luong-cho-dong-ho-thuy-sy\"><i>Các chứng chỉ và con dấu chất lượng cho đồng hồ Thuỵ Sỹ</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example.jpg\" alt=\"Một chiếc đồng hồ Vacheron Constantin mang dấu Geneva Seal\" srcset=\"https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example.jpg 1200w, https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example-600x400.jpg 600w, https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example-300x200.jpg 300w, https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example-768x512.jpg 768w, https://benhviendongho.com/wp-content/uploads/2019/02/slideshow-example-1024x683.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Một chiếc đồng hồ Vacheron Constantin mang dấu Geneva Seal</i></p><h3><strong>Hệ thống chống sốc Incabloc</strong></h3><p>Đây là một hệ thống ngày nay không còn quá phổ biến và chỉ được xuất hiện ở những mẫu đồng hồ cao cấp. Incabloc giúp bảo vệ chống sốc cho các bộ phận của đồng hồ khi gặp va chậm, chấn động lớn.</p><blockquote><p><a href=\"https://benhviendongho.com/incabloc-la-gi\"><i>Incabloc là gì?</i></a></p></blockquote><h3><strong>Chân kính đồng hồ</strong></h3><p>Là bộ phận được sản xuất từ một viên ruby thặt hoặc đá quý tổng hợp, có tác dụng giúp giảm ma sát giữa các bánh răng. Điều này giúp đồng hồ hoạt động chính xác hơn, giảm đáng kể sự mài mòn và tăng tuổi thọ của đồng hồ.</p><blockquote><p><a href=\"https://benhviendongho.com/chan-kinh-dong-ho-la-gi\"><i>Chân kính đồng hồ là gì?</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01.jpg\" alt=\"Chân kính đồng hồ\" srcset=\"https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01.jpg 2016w, https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01-600x388.jpg 600w, https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01-300x194.jpg 300w, https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01-1024x663.jpg 1024w, https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01-768x497.jpg 768w, https://benhviendongho.com/wp-content/uploads/2020/05/cach-nhan-biet-dong-ho-bao-nhieu-chan-kinh-01-1536x994.jpg 1536w\" sizes=\"100vw\" width=\"680\"></p><p><i>Chân kính đồng hồ</i></p><h3><strong>Main Plate / Base Plate</strong></h3><p>Đây là một tấm kim loại chính có tác dụng giữ tất các bộ phận của bộ máy đồng hồ. Mỗi bộ phận đều được gắn vào một Main Plate.</p><h3><strong>Mainspring</strong></h3><p>Mainspring đóng vai trò tạo năng lượng cho sự chuyển động của bộ máy đồng hồ.</p><h3><strong>Repeater</strong></h3><p>Là một bộ phận có cấu tạo cực kỳ phức tạp, giúp hiển thị giờ, phút, có thể sử dụng bật / tắt bằng cách sử dụng một nút trên vỏ đồng hồ.</p><blockquote><p><a href=\"https://benhviendongho.com/chuc-nang-minute-repeater\"><i>Minute Repeater là gì?</i></a></p></blockquote><p><img src=\"https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-c%C3%B3-ch%E1%BB%A9c-n%C4%83ng-repeater.jpg\" alt=\"Patek Phillipe có chức năng Repeater\" srcset=\"https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-có-chức-năng-repeater.jpg 1280w, https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-có-chức-năng-repeater-600x338.jpg 600w, https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-có-chức-năng-repeater-300x169.jpg 300w, https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-có-chức-năng-repeater-768x432.jpg 768w, https://benhviendongho.com/wp-content/uploads/2018/12/patek-phillipe-có-chức-năng-repeater-1024x576.jpg 1024w\" sizes=\"100vw\" width=\"680\"></p><p><i>Patek Phillipe có chức năng Repeater</i></p><h3><strong>Rotor</strong></h3><p>Rotor là một bộ phận chỉ có trên cơ cấu máy đồng hồ cơ. Nhờ nó, đồng hồ có thể tự động lên dây cót, thay vì cách lên dây cót thủ công.</p><h3><strong>Hệ thống giảm xóc</strong></h3><p>Khác với Incabloc, hệ thống giảm xóc này “dự đoán” các tác động từ bên ngoài, bảo vệ các bộ phận đồng hồ không bị hư hại. Bộ phận này đặc biệt quan trọng với những mẫu đồng hồ thể thao.</p><h3><strong>Tourbillon</strong></h3><p>Tourbillon được tạo ra khi bánh xe cân bằng và bộ thoát được gắn bên trong một lồng quay. Hai bộ phận này giúp hoạt động của đồng hồ trở nên chính xác hơn, ít xảy ra lỗi hơn.</p><p><img src=\"https://benhviendongho.com/wp-content/uploads/2021/05/Danh-gia-Ulysse-Nardin-Blast-HourStriker-Tourbillon-14jpg212005.jpg\" alt=\"Chiếc Ulysse Nardin Blast HourStriker Tourbillon\" srcset=\"https://benhviendongho.com/wp-content/uploads/2021/05/Danh-gia-Ulysse-Nardin-Blast-HourStriker-Tourbillon-14jpg212005.jpg 680w, https://benhviendongho.com/wp-content/uploads/2021/05/Danh-gia-Ulysse-Nardin-Blast-HourStriker-Tourbillon-14jpg212005-600x400.jpg 600w\" sizes=\"100vw\" width=\"680\"></p><p><i>Chiếc Ulysse Nardin Blast HourStriker Tourbillon</i></p><p>Tourbillon thường quay một lần mỗi phút, tuy nhiên, một số cơ cấu máy được sản xuất sẽ quay 4 phút hoặc 6 phút một lần. Đây cũng là một cơ chế phức tạp không phải mẫu đồng hồ nào cũng sở hữu.</p>', 'Cấu tạo đồng hồ, Đồng hồ cấu tạo thế nào, Bộ phận đồng hồ', 0, 1, 1, '2023-03-21 23:22:42', '2023-04-12 15:58:48'),
(16, 1, 11, '64', 'ĐỒNG HỒ JACQUES DU MANOIR CỦA NƯỚC NÀO, CÓ TỐT KHÔNG, GIÁ BAO NHIÊU?', 'dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu', 'Jacques Du Manoir là một thương hiệu Thụy Sỹ với những chiếc đồng hồ thanh lịch và giá cả phải chăng. Khám phá lịch sử và các tính năng đặc trưng của các dòng sản phẩm phổ biến nhất của thương hiệu, đồng thời tìm hiểu điều gì làm nên sự khác biệt của đồng hồ Jacques Du Manoir so với các thương hiệu khác.', '<h2><strong>KHÁM PHÁ CHI TIẾT ĐỒNG HỒ JACQUES DU MANOIR</strong></h2><h3><strong>1. ĐỒNG HỒ JACQUES DU MANOIR CỦA NƯỚC NÀO?</strong></h3><p>Jacques Du Manoir là một hãng Thụy Sỹ đã sản xuất những chiếc đồng hồ thời trang giá rẻ từ năm 1991. Thương hiệu này có trụ sở tại thị trấn Bienne, nơi được biết đến với di sản chế tạo đồng hồ lâu đời.&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-2.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 2\"></figure><p><i>Bienne, Thụy Sỹ: nơi sản sinh ra những chiếc đồng hồ Jacques Du Manoir</i></p><p>&nbsp;</p><p>Hãng&nbsp; tự hào về di sản Thụy Sỹ của mình và tiếp tục phát huy truyền thống chế tạo đồng hồ có độ chính xác cao, và chất lượng tốt được chú ý đến từng chi tiết. Thương hiệu đồng hồ Jacques Du Manoir được biết đến với những thiết kế vượt thời gian và sự khéo léo trong chế tác đặc biệt.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-3.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 3\"></figure><p><i>Sự chính xác và chất lượng của đồng hồ Thụy Sỹ thể hiện trong từng chiếc Jacques Du Manoir</i></p><p>&nbsp;</p><h3><strong>2. ĐỒNG HỒ JACQUES DU MANOIR CÓ TỐT KHÔNG?</strong></h3><p>Để đánh giá một chiếc đồng hồ có tốt không, bên cạnh xuất xứ và danh tiếng thương hiệu; Còn cần phải xét đến vật liệu, tính năng đi kèm và loại máy sử dụng. Theo dõi đánh giá đồng hồ Jacques Du Manoir sau đây:</p><p>&nbsp;</p><h4><strong>► VẬT LIỆU</strong></h4><p>Hãng đồng hồ Jacques Du Manoir được chế tác bằng các vật liệu chất lượng cao như <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/thep-khong-gi-316l-la-gi-tai-sao-duoc-su-dung-trong-che-tac-dong-ho.html\">thép không gỉ</a>, <a href=\"https://donghohaitrieu.com/danh-muc/do-da\">da thật</a> và mặt <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/toan-bo-su-that-ve-mat-kinh-sapphire-cua-dong-ho.html\">kính sapphire</a>. Những chiếc đồng hồ có thiết kế cổ điển vừa thanh lịch vừa vượt thời gian.&nbsp;</p><p>Thương hiệu cũng cung cấp nhiều loại dây đeo bao gồm da, thép không gỉ và cao su, mang đến cho người đeo tùy chọn tùy chỉnh đồng hồ để phù hợp với phong cách và sở thích cá nhân.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-4.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 4\"></figure><p><i>Một chiếc đồng hồ được chế tạo để tồn tại lâu dài, được chế tác từ những vật liệu tốt nhất và được thiết kế với độ chính xác</i></p><p>&nbsp;</p><h4><strong>► TÍNH NĂNG ĐI KÈM</strong></h4><p>Đồng hồ đi kèm với một loạt các tính năng bao gồm <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/lich-su-dong-ho-bam-gio-the-thao-chronograph-mot-trong-nhung-phat-minh-vi-dai-nhat-phan-1.html\">đồng hồ bấm giờ</a>, hiển thị ngày và khả năng chống nước, tùy vào mẫu. Nhìn chung hãng khá hào phóng cho một chiếc đồng hồ thương hiệu Thụy Sỹ có mức giá phải chăng.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-5.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 5\"></figure><p><i>Từ đồng hồ bấm giờ đến hiển thị ngày, đồng hồ Jacques Du manoir </i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-swiss-made-la-gi-cach-phan-biet-san-pham-noi-bat.html\"><i>Swiss Made</i></a><i> đều có chức năng và phong cách</i></p><p>&nbsp;</p><p>Với câu hỏi đồng hồ Jacques Du Manoir có tốt không với các tính năng đi kèm, thì câu trả lời là có.</p><p>&nbsp;</p><h4><strong>► BỘ MÁY SỬ DỤNG</strong></h4><p>Jacques Du Manoir mang đến nhiều dòng đồng hồ với các loại máy khác nhau, bao gồm cả máy&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-may-quartz-la-gi-uu-nhuoc-diem-dong-ho-quartz.html\">Quartz</a> và <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-automatic-la-gi-3-luu-y-nen-biet-khi-mua.html\">Automatic</a>. Nhưng phần lớn đồng hồ Jacques Du Manoir là đồng hồ chạy Quartz, hiển thị thời gian rất chính xác.&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-6.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 6\"></figure><p><i>đồng hồ Jacques Du Manoir đáng tin cậy, bền bỉ và được thiết kế để chịu được thử thách của thời gian</i></p><p>&nbsp;</p><p>Tuy nhiên, thương hiệu cũng cung cấp nhiều lựa chọn đồng hồ Automatic, chạy bằng chuyển động tự nhiên của cổ tay người đeo hoặc <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/huong-dan-cach-su-dung-va-len-day-cot-dong-ho-co.html\">lên dây cót</a> thủ công và được những người đam mê đồng hồ đánh giá cao về kỹ thuật và tay nghề thủ công.&nbsp;</p><p>Cuối cùng, sự lựa chọn giữa <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-thach-anh-la-gi-cach-hoat-dong-dong-ho-thach-anh-ra-sao.html\">đồng hồ thạch anh</a> hoặc đồng hồ tự động tùy thuộc vào sở thích cá nhân cũng như các tính năng và chức năng cụ thể mà người đeo đang tìm kiếm ở một chiếc đồng hồ.</p><h3><strong>3. ĐỒNG HỒ JACQUES DU MANOIR GIÁ BAO NHIÊU?</strong></h3><p>Về giá đồng hồ Jacques Du Manoir dao động từ<strong> 5,200,000VND</strong> đến<strong> 12,000,000VND</strong> tùy thuộc vào kiểu dáng và tính năng. Mặc dù thương hiệu này có thể không nổi tiếng như một số thương hiệu đồng hồ Thụy Sỹ lâu đời hơn, nhưng chất lượng của đồng hồ Jacques Du <strong>c</strong>ũng có phần dễ tiếp cận hơn.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-7.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 7\"></figure><p><i>Khám phá bí mật của đồng hồ Jacques Du Manoir, chỉ được biết đến với những người đánh giá cao độ chính xác và tay nghề thủ công của Thụy Sỹ</i></p><p>&nbsp;</p><h3><strong>4. NHỮNG AI NÊN MUA ĐỒNG HỒ JACQUES DU MANOIR?</strong></h3><p>Đồng hồ Jacques Du Manoir nhắm đến những cá nhân đánh giá cao những chiếc đồng hồ chất lượng ổn, vừa phong cách vừa tiện dụng. Các thiết kế cổ điển và sự chú ý đến từng chi tiết của thương hiệu khiến chúng trở thành lựa chọn phổ biến cho những người đam mê đồng hồ, những người coi trọng chất lượng và sự khéo léo.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/03/dong-ho-jacques-du-manoir-cua-nuoc-nao-co-tot-khong-gia-bao-nhieu-8.jpg\" alt=\"Đồng hồ Jacques Du Manoir của nước nào, có tốt không, giá bao nhiêu? - Ảnh 8\"></figure><p><i>Đối với những người đam mê đồng hồ coi trọng chất lượng và phong cách, Jacques Du Manoir mang đến chiếc đồng hồ hoàn hảo</i></p><p>&nbsp;</p><p>Đồng hồ Jacques Du manoir Swiss Made cũng là một lựa chọn tuyệt vời cho những cá nhân đang tìm kiếm một chiếc Thụy Sỹ giá rẻ để trải nghiệm.&nbsp;</p>', 'Đồng Hồ Thụy Sỹ, Đồng hồ Jacques Du Manoir, Jacques Du Manoir, Đồng hồ cao cấp', 0, 1, 1, '2023-03-22 03:02:20', '2023-04-12 15:57:22');
INSERT INTO `news` (`id`, `user_id`, `category_id`, `image`, `title`, `slug`, `summary`, `content`, `keywords`, `view`, `hot`, `appear`, `created_at`, `updated_at`) VALUES
(17, 1, 11, '65', 'ĐỒNG HỒ MOVADO SERIES 800 CÓ GÌ ĐẶC BIỆT, GIÁ BÁN, NƠI MUA', 'dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua', 'Được biết đến nhiều qua bộ sưu tập Museum đình đám, hãng đồng hồ Movado lừng danh đến từ Thụy Sỹ còn chinh phục những người hâm mộ đồng hồ trên toàn thế giới qua dòng đồng hồ Movado Series 800. Hãy cùng S_Watch tìm hiểu điều gì tạo nên sức hút của dòng sản phẩm này nhé. ', '<h2><strong>KHÁM PHÁ CHI TIẾT BST ĐỒNG HỒ MOVADO SERIES 800</strong></h2><p>Sự ra mắt của dòng đồng hồ Movado Series 800 với thiết kế thể thao, được trang bị nhiều tính năng được xem là một bước đột phá lớn của hãng đồng hồ đến từ Thụy Sỹ này vì từ trước đến nay đồng hồ Movado được biết đến thông qua nét thiết kế tối giản, không kim, không số.&nbsp;&nbsp;</p><h3><strong>. PHONG CÁCH THIẾT KẾ</strong></h3><p>Được hướng tới phong cách thể thao, mặt số của các mẫu đồng hồ Movado Series 800 có rất nhiều lưa chọn về màu sắc cũng như chất liệu chế tác từ dây da, dây thép, mặt số với nhiều màu sắc khác nhau như xanh lá, xanh dương, đen, trắng,…&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-2.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 2\"></figure><p><i>Vị trí 12 giờ trên chiếc&nbsp; Series 800 là dấu chấm màu bạc độc quyền của Movado, ngay dưới đó là tên của bộ sưu tập Movado 800</i></p><p>&nbsp;</p><p>Được cho là dòng đồng hồ thể thao chuyên nghiệp nhưng Series 800 vẫn đậm chất <a href=\"https://donghohaitrieu.com/kinh-nghiem/thoi-trang\">thời trang</a>, thanh lịch không thua kém gì so với các dòng đồng hồ thời trang khác.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-3.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 3\"></figure><p><i>Dòng chữ “</i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-swiss-made-la-gi-cach-phan-biet-san-pham-noi-bat.html\"><i>Swiss Made</i></a><i>” khẳng định đẳng cấp </i><a href=\"https://donghohaitrieu.com/tu-khoa/dong-ho-thuy-sy\"><i>đồng hồ Thụy Sỹ</i></a><i> ở góc 6 giờ trên dòng đồng hồ Movado series 800 </i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-automatic-la-gi-3-luu-y-nen-biet-khi-mua.html\"><i>automatic</i></a></p><p>&nbsp;</p><p>Sự đổi mới trong phong cách thiết kế của Movado đã khiến cho người hâm mộ đồng hồ trên toàn thế giới bất ngờ vì trước đây người ta chỉ biết đến Movado qua những mẫu đồng hồ ít kim, không số và thiết kế tối giản.&nbsp;&nbsp;</p><p>&nbsp;</p><h3><strong>2. CHẤT LIỆU CHẾ TÁC</strong></h3><p>Các mẫu đồng hồ Movado Series 800 được trang bị vòng bezel cố định, vỏ thép chắc chắn với đường kính 40-43mm tùy mẫu. Núm điều chỉnh chống nước thể thao cũng được tích hợp trên dòng đồng hồ này.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-4.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 4\"></figure><p><i>Thiết lập đồng hồ bằng cách xoay núm điều chỉnh theo chiều kim đồng hồ, rất đơn giản</i></p><p>&nbsp;</p><p>Kim giờ, phút và giây trên dòng đồng hồ Movado Series 800 đều được phủ một lớp super lumianova nhằm tối ưu hóa trải nghiệm của người dùng khi xem giờ trong điều kiện thiếu sáng.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-5.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 5\"></figure><p><i>Nắp lưng của dòng đồng hồ Movado Series 8 đều được khắc tên bộ sưu tập, dây đeo bằng thép có thể thao lắp vừa vặn trên tay</i></p><p>&nbsp;</p><h3><strong>3. BỘ MÁY SỬ DỤNG</strong></h3><p>Các dòng đồng hồ Movado Series 800 được sử dụng bộ máy chuyển động <a href=\"https://donghohaitrieu.com/tin-tuc/phu-kien-thoi-trang/da-thach-anh-co-tac-dung-gi-mua-o-dau-gia-bao-nhieu.html\">thạch anh</a> chạy bằng bảng mạch điện tử. Các bộ máy chuyển động bằng thạch anh được trang bị trên dòng này có kim giây chuyển động với tốc độ 32.768 dao động/giây.&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-6.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 6\"></figure><p><i>Bộ máy đồng hồ thạch anh được đánh giá cao về độ chính xác, lẫn khả năng chế tác tuyệt vời</i></p><p>&nbsp;</p><p>Với tốc độ 32.768 dao động một giây, chúng ta có thể theo dõi được chuyển động nhịp nhàng ở trên mặt số của đồng hồ. Bộ máy này được đánh giá cao về độ chính xác, có thể vận hành liên tục cho đến khi hết pin mà không cần cài đặt lại thường xuyên như các dòng đồng hồ cơ.&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-7.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 7\"></figure><p><i>Đồng hồ thạch anh hiện đại có tuổi thọ từ 2-5 năm, sau đó chỉ cần thay pin là có thể sử dụng được bình thường – không tốn nhiều thời gian bảo dưỡng</i></p><p>&nbsp;</p><p>Sự gọn nhẹ và tiện dụng của bộ máy thạch anh mang đến cho người dùng sự tiện lợi và hoàn toàn <a href=\"https://donghohaitrieu.com/tin-tuc/hai-trieu/su-that-dang-sau-slogan-quyen-duoc-an-tam-cua-dong-ho-hai-trieu.html\">an tâm</a> trong quá trình trải nghiệm. Một vài mẫu đồng hồ thuộc dòng Movado Series 800 vẫn được trang bị bộ máy Quartz với mức giá thành rẻ hơn.&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-8.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 8\"></figure><p><i>Một số mẫu thuộc dòng Movado Series 800 được trang bị bộ máy Quartz với mức giá thấp hơn so với các mẫu chạy </i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-co-la-gi-cac-kien-thuc-co-ban-ve-dong-ho-may-co-la-gi.html\"><i>máy cơ</i></a></p><p>&nbsp;</p><h3><strong>4. TÍNH NĂNG ĐI KÈM</strong></h3><p>Được thiết kế rất nhiều kim, số và mặt phụ (subdial) để tối ưu hóa nhu cầu của người dùng, dòng đồng hồ Movado Series 800 còn được trang bị nhiều tiện ích không kém.</p><p>Sở hũu <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/chuc-nang-chronograph-la-gi-dong-ho-chronograph-la-gi.html\">Chronograph</a>, là một chức năng giúp người xem “ghi giờ” hay còn gọi là “đếm giờ”. Chức năng này được hiển thị ở mặt phụ của đồng hồ, được kích hoạt thông qua một cơ chế cò lẫy. Chức năng này thường được sử dụng trong quá trình tập luyện, các hoạt động thể thao, cuộc thi, …</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-9.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 9\"></figure><p><i>Dòng đồng hồ Movado Series 800 Chornograph được trang bị chức năng Chronograph với kiểu dáng thể thao, lịch lãm</i></p><p>&nbsp;</p><p>Khả năng chống nước của các mẫu thuộc dòng Series 800 còn lên đến <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/huong-dan-su-dung-nuoc-cho-dong-ho-deo-tay.html\">20ATM</a>, một mức độ chống nước khá cao thường được trang bị cho các mẫu đồng hồ lặn.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-10.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 10\"></figure><p><i>Với mức độ chống nước lên đến 20ATM này, bạn có thể thoải mải tham gia các hoạt động thể thao dưới nước, tắm rửa, lặn ở một độ sâu nhất định một cách thoải mái mà không sợ hư hỏng</i></p><p>&nbsp;</p><p>Giờ chuẩn Greenwich (<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-gmt-la-gi-cach-xem-va-su-dung-dong-ho-gmt.html\">GMT</a>) cũng được trang bị ở trên một số mẫu thuộc dòng đồng hồ Movado Series 800 GMT cho phép chúng ta theo dõi nhiều múi giờ một lúc.</p><h3><strong>5. GIÁ BÁN HIỆN NAY</strong></h3><p>Các mẫu đồng hồ thuộc dòng Movado Series 800 có mức giá khá chênh lệch nhau, phụ thuộc vào chất liệu chế tác, bộ máy, tiện ích. Mức giá trung bình tham khảo cho một mẫu khoir điểm của dòng này là <strong>20,000,000VND</strong> (850USD), một con số hợp lý cho danh tiếng của một thương hiệu Thụy Sỹ uy tín.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2023/02/dong-ho-movado-series-800-co-gi-dac-biet-gia-ban-noi-mua-11.jpg\" alt=\"Đồng hồ Movado Series 800 có gì đặc biệt, giá bán, nơi mua - Ảnh 11\"></figure><p><i>Giá đồng hồ Movado Series 800 nằm ở mức trung bình nếu so sánh với các thương hiệu đồng hương đến từ Thụy Sỹ khác</i></p><p>&nbsp;</p><p>Một số mẫu Series 800 được sử dụng bộ máy tốt, vật liệu đắt tiền có thể có mức giá lên đến khoảng 50 triệu đồng. Trên chỉ là mức giá khởi điểm trung bình tham khảo.</p>', 'Đồng hồ Movado 800, Movado series, Đồng hồ Movado, Đồng hồ kim loại, Đồng hồ Casio, Casio, Movado', 0, 1, 1, '2023-03-22 03:04:52', '2023-04-12 15:56:12'),
(18, 1, 11, '66', 'ĐỒNG HỒ CASIO F-91W CHÍNH HÃNG GIÁ BAO NHIÊU, REVIEW TỪ A-Z', 'dong-ho-casio-f-91w-chinh-hang-gia-bao-nhieu-review-tu-a-z', 'Đồng hồ Casio luôn luôn nằm trong TOP sản phẩm giá rẻ và chất lượng vượt trội trên thị trường. Casio F-91W với hơn 30 năm tuổi vẫn là đồng hồ được nhiều người dùng quan tâm. Vậy cùng S_Watch đánh giá chi tiết và những điều có thể bạn chưa biết về Casio F-91W.', '<h2><strong>ĐÁNH GIÁ CHI TIẾT ĐỒNG HỒ CASIO F-91W</strong></h2><p>Chiếc đồng hồ Casio gắn liền với tuổi thơ của bao thế hệ 8x, 9x. Mức giá vài trăm nghìn cùng chất lượng siêu bền bỉ và nhiều tính năng hữu ích. Casio F-91W là sản phẩm chưa bao giờ lỗi thời tính đến thời điểm hiện tại.</p><h3><strong>1. THIẾT KẾ</strong></h3><p>Dù là thời điểm ra mắt những năm 90 hay hiện tại, chất liệu dây cao su và khung vỏ nhựa luôn là lựa chọn sáng giá cho mẫu đồng hồ Casio F-91W.</p><p>Mặc dù định hình trong phân khúc giá rẻ, nhưng độ hoàn thiện trên từng chi tiết không hề rẻ tiền chút nào.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/1-dong-ho-casio-f-91w-chinh-hang-gia-bao-nhieu-review-tu-a-z.jpg\" alt=\"Đồng hồ Casio F-91W chính hãng giá bao nhiêu, review từ a-z - ảnh 1\"></figure><p><i>Thiết kế mang tính biểu tượng của sự bền bỉ và chính xác của Casio</i></p><p>&nbsp;</p><h3><strong>2. TÍNH NĂNG</strong></h3><p>Casio F-91W chính hãng sở hữu nhiều tính năng người dùng như đèn LED, lịch ngày, bộ bấm giờ, chế độ hẹn giờ <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/top-15-chiec-dong-ho-bao-thuc-dang-mua-nhat-tai-viet-nam.html\">báo thức</a>…</p><p>Tạo nên sự thuận tiện cho người đeo trong các hoạt động hằng ngày.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/2-dong-ho-casio-f-91w-chinh-hang-gia-bao-nhieu-review-tu-a-z.jpg\" alt=\"Đồng hồ Casio F-91W chính hãng giá bao nhiêu, review từ a-z - ảnh 2\"></figure><p><i>Không chỉ đơn giản là </i><a href=\"https://donghohaitrieu.com/dong-ho-deo-tay-chinh-hang\"><i>đồng hồ đeo tay</i></a><i> chỉ xem ngày giờ</i></p><p>&nbsp;</p><h3><strong>3. BỘ MÁY</strong></h3><p>Đồng hồ Casio F-91W chính hãng trang bị bộ <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-may-quartz-la-gi-uu-nhuoc-diem-dong-ho-quartz.html\">máy quartz</a> cho khả năng vận hành chính xác và êm ái. Đây là bộ máy cực kỳ phổ biến ở phân khúc giá rẻ, dễ sử dụng ngay cả với người dùng nhỏ tuổi.</p><p>&nbsp;</p><h3><strong>4. GIÁ BÁN</strong></h3><p>Mức giá bán của Casio F-91W chính hãng chưa tới 1 triệu đồng. Xứng đáng là mẫu đồng hồ giá rẻ, chất lượng tốt nhất không có đối thủ.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/3-dong-ho-casio-f-91w-chinh-hang-gia-bao-nhieu-review-tu-a-z.jpg\" alt=\"Đồng hồ Casio F-91W chính hãng giá bao nhiêu, review từ a-z - ảnh 3\"></figure><h2><strong>NHỮNG KIỂU “ĐỘ” ĐỒNG HỒ ĐIỆN TỬ CASIO F-91W</strong></h2><p>Ra mắt <a href=\"https://donghohaitrieu.com/kinh-nghiem/tuoi-tan-mui-sinh-nam-1991-menh-gi-hop-mau-gi-hop-voi-ai.html\">năm 1991</a>, Casio F-91W là chiếc đồng hồ điện tử điện tử khiến hãng đồng hồ non trẻ Nhật Bản thành công vang dội trên toàn thế giới.</p><p>Sản phẩm này dùng màn hình LCD để hiển thị, ba nút bấm, ngoài giờ phút giây còn thêm các lịch, báo thức, bộ bấm giờ, đếm ngược cùng đèn LED, hoạt động sai số 30 giây/ tháng và tuổi thọ pin lên đến 7 năm.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-1.jpg\" alt=\"“Độ” Đồng Hồ Điện Tử Casio F-91W Huyền Thoại Thêm Tính Năng Siêu Đã\"></figure><p><i>Nguyên mẫu đồng hồ Casio F-91W</i></p><p>&nbsp;</p><p>Đa năng, giá rẻ và có độ bền cao, Casio F-91W trở thành vật bất ly thân của hàng triệu triệu người từ người lớn đến học sinh trong những năm 90-2000, cựu tổng thống Mỹ Obama cũng là một trong số đó. Ở Việt Nam, có thể nói thế hệ 8x, 9x đã lớn lên cùng với chiếc <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-mau-dong-ho-casio-huyen-thoai-ban-chay-nhat-moi-thoi-dai.html\">đồng hồ Casio huyền thoại</a> này.</p><p>Đến nay, đồng hồ Casio F91W vẫn còn được sản xuất, thú vị là vẫn có không ít mẫu Casio F-91W mua hơn hai mươi năm còn chạy tốt, bởi thế chúng không chỉ là kỷ niệm tuổi thơ mà còn là đối tượng để các vọc sĩ “độ” lên tầm cao mới vì: linh kiện chất lượng, cấu trúc đơn giản, giá rẻ.</p><p>Ngay bên dưới chính là một số các tác phẩm độ đồng hồ Casio F-91W nổi tiếng nhất thế giới.</p><p>&nbsp;</p><h3><strong>1. TỔ CHỨC AL-QAEDA “ĐỘ” ĐỒNG HỒ CASIO F-91W THÀNH BOM HẸN GIỜ</strong></h3><p>Những kẻ khủng bố Al-Qaeda đã cải tạo đồng hồ Casio F-91W để nó có thể hẹn giờ kích hoạt một quả bom từ xa mà không cần phải bật một chiếc công tắc trên quả bom, loại bom này đã được thu giữ lần đầu vào khoảng <a href=\"https://donghohaitrieu.com/kinh-nghiem/tuoi-canh-thin-sinh-nam-2000-menh-gi-hop-mau-gi-hop-voi-ai.html\">năm 2000</a>.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-bom.jpg\" alt=\"“Độ” Đồng Hồ Điện Tử Casio F-91W Huyền Thoại Thêm Tính Năng Siêu Đã Bom\"></figure><p><i>Đồng hồ Casio F-91W được độ thành bom hẹn giờ giá siêu rẻ sử dụng bởi khủng bố Al-Qaeda</i></p><p>&nbsp;</p><p>Công thức bom Casio F-91W này chỉ gồm một chiếc đồng hồ Casio F-91W, một bảng mạch, một cục pin 9-volt, một ống thủy tinh chứa đầy dung dịch nitroglycerin. Bom Casio F-91W đủ nhỏ để mang trong túi, nhưng có sức công phá có thể san bằng 1 ngôi nhà, chi phí để chế tạo chỉ khoảng 5 USD.<strong>2. YOUTUBER N-O-D-E: “ĐỘ” ĐÈN, CHIP NFC, KHE CẮM THẺ NHỚ</strong></p><p>Anh chàng YouTuber N-O-D-E đã tích hợp cho chiếc đồng hồ Casio F-91W một số tính năng thời thượng bằng cách loại bỏ đèn LED cổ điển bằng đèn ánh sáng trắng, sáng hơn, tích hợp một con chip ntag213 NFC để nó giao tiếp được với thiết bị có NFC, “nhồi nhét” thêm một khe cắm thẻ nhớ MicroSD đặt ở mặt sau để tăng thêm khả năng lưu trữ dữ liệu.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-nfc-led-microsd.jpg\" alt=\"\"></figure><p><i>Đồng hồ Casio F91W độ chip NFC, đèn LED siêu sáng, khe cắm thẻ nhớ MicroSD bởi Youtober N-O-D-E</i></p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://i.ytimg.com/vi/BBcSQrD18f4/hqdefault.jpg\" alt=\"YouTube video\"></figure><p><i>Video về sản phẩm Casio F-91W độ bởi N-O-D-E</i></p><p>&nbsp;</p><h3><strong>3. DIỄN ĐÀN WATCHUSEEK: ĐỘ MÀU SẮC HIỂN THỊ, ĐÈN CHO ĐỒNG HỒ CASIO F-91W</strong></h3><p>Thiết kế của đồng hồ Casio F91W rất đơn giản nên ngoài việc độ thêm tính năng thì còn có thể chỉnh sửa tính năng, điển hình như thành viên hansp trên diễn đàn Watchuseek đã đảo ngược <a href=\"https://donghohaitrieu.com/kinh-nghiem/y-nghia-mau-sac\">màu sắc</a> trên màn hình của chiếc đồng hồ Casio F-91W từ mặt nền trắng-chữ số đen thành mặt nền đen-chữ số trắng.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-dao-mau-man-hinh.jpg\" alt=\"“Độ” Đồng Hồ Điện Tử Casio F-91W Huyền Thoại Thêm Tính Năng Siêu Đã LCD\"></figure><p><i>Độ đảo ngược màu sắc màn hình hiển thị LCD của Casio F-91W</i></p><p>&nbsp;</p><h3><strong>4. INSTRUCTABLES: ĐỘ ÁNH SÁNG ĐÈN LED</strong></h3><p>Bằng cách can thiệp vào bộ máy, nhóm instructables cho biết họ đã “độ” ánh sáng đèn LED nguyên bản vốn nổi tiếng yếu và mờ chỉ sáng một góc nhỏ trên đồng hồ Casio F91W thành một đèn cực sáng chiếu khắc màn hình. Độ đèn theo cách của họ có thể tùy chọn nhiều dải màu và độ sáng khác nhau.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-do-den-led.jpg\" alt=\"“Độ” Đồng Hồ Điện Tử Casio F-91W Huyền Thoại Thêm Tính Năng Siêu Đã LED\"></figure><p><i>Ánh sáng đèn LED đã được tăng mạnh cường độ</i></p><p>&nbsp;</p><h3><strong>5. DIỄN ĐÀN THE WATCH SITE: ĐỘ KHẢ NĂNG CHỊU NƯỚC CHO ĐỒNG HỒ CASIO F-91W</strong></h3><p>Mẫu đồng hồ Casio F-91W nguyên bản chỉ có thể chịu mồ hôi, vô tình đổ nước hoặc rửa tay, để cải thiện khả năng chịu nước này, theo lời thành viên Homocaballus của diễn đàn The Watch Site thì đồng hồ Casio F-91W cần phải được bơm đầy dầu.</p><p>Dầu ngập trong khoang vỏ không làm nguy hại bộ máy đồng hồ Casio F-91W mà còn cách ly máy khỏi nước. Cách bơm đầy dầu vào khoang vỏ cũng là một trong những phương pháp chống nước, áp suất được dùng nhiều nhất trên <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/nhan-dien-va-tim-toi-cac-bi-mat-cua-dong-ho-lan.html\">đồng hồ lặn</a> sâu máy quartz.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2017/04/do-dong-ho-dien-tu-casio-f-91w-huyen-thoai-them-tinh-nang-sieu-da-do-chiu-nuoc.jpg\" alt=\"“Độ” Đồng Hồ Điện Tử Casio F-91W Huyền Thoại Thêm Tính Năng Siêu Đã Chịu Nước\"></figure><p><i>“Độ” nâng khả năng chịu nước bằng cách ngâm mặt đồng hồ đã mở nắp lưng để dầu ngập vào khoang vỏ</i></p><p>&nbsp;</p><p>Ngoài ra, nếu bơm đầy dầu thì việc dầu ngập trong mặt số cũng giúp chúng ta có thể đọc thời gian thật dễ dàng nước nước hoặc ánh sáng chói mà không cần đến <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/kinh-cong-lieu-co-de-vo-co-nen-mua-dong-ho-mat-kinh-cong.html\">mặt kính cong</a> và lớp phủ chống phản chiếu (Anti-reflective – AR).</p><p>Việc “độ” khả năng chịu nước cũng rất dễ, không cần hiểu biết gì về điện tử hay khéo tay. Đầu tiên chuẩn bị một tô đầy dầu (dầu khoáng, dầu olive, …), sau đó tháo nắp lưng đồng hồ ra và đặt nó sang một bên, từ từ ngâm mặt đồng hồ vào tô dầu để không làm sinh bong bóng, xoay đảo mặt để dầu đi vào đầy khoang vỏ, đóng chặt nắp lưng lại.</p><p>Dầu ô liu sẽ biến màn hình thành màu xanh còn dầu khoáng lại không. YouTuber Artur Martins đã thử nghiệm chiếc đồng hồ casio F-91W được “độ” chống nước theo cách này và cho biết nó vẫn hoàn toàn chạy khỏe sau khi đi lặn ngắm san hô và đi bơi lội cùng với anh ấy trong suốt 3 năm qua.</p><p>Lưu ý: việc tự ý sửa chữa, mở máy, “độ” sẽ làm mất bảo hành, bạn cũng phải chịu trách nhiệm hoàn toàn cho mọi hư hỏng nếu có.</p>', 'Đồng hồ Casio, Đồng hồ Casio F-91W, Casio F-91W, Đồng hồ Casio, Đồng hồ điện tử, Đồng hồ điện tử Casio', 0, 1, 1, '2023-03-22 03:13:33', '2023-04-26 10:53:40'),
(19, 1, 1, '67', 'CÁCH CHỈNH NGÀY, GIỜ ĐỒNG HỒ CASIO 3 NÚT, ĐIỆN TỬ NHANH, DỄ', 'cach-chinh-ngay-gio-dong-ho-casio-3-nut-dien-tu-nhanh-de', 'Bạn chưa biết cách chỉnh đồng hồ 3 nút của Casio phong cách vintage cực chất như LA680W, A168W, A159W, …? Bài viết này sẽ chia sẻ toàn tập cách chỉnh đồng hồ điện tử 3 nút cá tính của Casio cực kỳ đơn giản dễ nhớ. (Cách chỉnh áp dụng cho hầu hết đồng hồ Casio 3 nút hiện nay).', '<h2><strong>CÁCH CHỈNH </strong><a href=\"https://donghohaitrieu.com/brand/casio\"><strong>ĐỒNG HỒ CASIO</strong></a><strong> 3 NÚT ĐƠN GIẢN NHANH DỄ TRONG 1 PHÚT</strong></h2><p>Nhờ dáng thanh mảnh với thiết kế mặt số điện tử đi kèm <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/12-kieu-day-dong-ho-kim-loai-noi-tieng-nhat-the-gioi.html\">dây kim loại</a> rất khác biệt, những chiếc <a href=\"https://donghohaitrieu.com/dong-ho-deo-tay-chinh-hang\">đồng hồ đeo tay</a> 3 nút của Casio đã tạo ra làn sóng vintage mạnh mẽ trong giới trẻ, đặc biệt là phái đẹp những năm gần đây.</p><p>Ngoài ra, các loại đồng hồ 3 nút Casio cũng khá là đa năng, điều đó thể hiện qua việc chúng sở hữu <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/lich-su-dong-ho-bam-gio-the-thao-chronograph-mot-trong-nhung-phat-minh-vi-dai-nhat-phan-1.html\">Bấm Giờ</a>, <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/auto-light-casio-se-tu-dong-bat-den-dong-ho-giup-ban.html\">Đèn LED</a>, … Và trong bài này sẽ <a href=\"https://donghohaitrieu.com/kinh-nghiem/huong-dan-cach-lam\">hướng dẫn</a> bạn cách chỉnh đồng hồ Casio 3 nút để áp dụng chung cho nhiều dòng như <a href=\"https://donghohaitrieu.com/?s=LA680W&amp;post_type=product\">LA680W</a>, <a href=\"https://donghohaitrieu.com/?s=A168W&amp;post_type=product\">A168W</a>, <a href=\"https://donghohaitrieu.com/?s=A159W&amp;post_type=product\">A159W</a>,…</p><h2><strong>HƯỚNG DẪN CÁCH CHỈNH ĐỒNG HỒ CASIO 3 NÚT</strong></h2><p>Trước khi tìm hiểu cách chỉnh đồng hồ Casio 3 nút, bạn cần nắm rõ các tên nút điều chỉnh và dùng để làm gì. Từ đó mà có thể điều chỉnh dễ dàng hơn.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/03/1-cach-chinh-dong-ho-casio-3-nut-don-gian-nhanh-de-trong-1-phut.jpg\" alt=\"Cách chỉnh đồng hồ Casio 3 nút đơn giản nhanh dễ trong 1 phút - hình 1\"></figure><p><i>Quan sát vị trí và chức năng của các nút bấm để thực hiện cách chỉnh đồng hồ Casio 3 nút dễ dàng hơn</i></p><p>&nbsp;</p><p>● Tính năng và tên gọi các nút cần nhớ (xem trên <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/nhan-biet-cac-kieu-mat-dong-ho-deo-tay-pho-bien-nhat-hien-nay.html\">mặt đồng hồ</a>):</p><p><strong>▶ MODE</strong>: nút dùng để vào các chế độ như Giờ Hiện Hành, <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/top-15-chiec-dong-ho-bao-thuc-dang-mua-nhat-tai-viet-nam.html\">Báo Thức</a>, Bấm Giờ, …</p><p><strong>▶ LIGHT (nút đèn)</strong>: dùng để chọn các giá trị muốn chỉnh.</p><p><strong>▶ START</strong> (hoặc Nút <strong>START/STOP</strong> tùy theo mẫu): dùng để tăng giá trị cần chỉnh</p><p>●&nbsp; &nbsp;Ngoài ra, đồng hồ Casio 3 nút còn có các chức năng chính sau:</p><p>▶ Chế độ giờ hiện hành</p><p>▶ Chế độ cài đặt báo thức (màn hình hiện chữ AL)</p><p>▶ Chế độ bấm giờ thể thao (màn hình hiện chữ ST)</p><p>●&nbsp;&nbsp; Lần lượt Ấn Nút MODE thì sẽ lần lượt vào các chế độ: giờ hiện hành, cài đặt báo thức, cài đặt bấm giờ thể thao.</p><p>&nbsp;</p><h3><strong>1. CÁCH CHỈNH GIỜ ĐỒNG HỒ CASIO 3 NÚT</strong></h3><p>Cách chỉnh giờ <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/dong-ho-dien-tu-casio-chinh-hang-da-chiem-linh-thi-truong-viet-nam-nhu-nao.html\">đồng hồ điện tử Casio</a> 3 nút thực hiện theo các bước sau đây:</p><p><strong>▶ Bước 1</strong>: Nếu đã là giờ hiện hành thì bỏ qua bước này, nếu không, Ấn Nút <strong>MODE</strong> đến khi màn hình <strong>mất chữ ST, AL và hiện ra </strong><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/10-y-nghia-cua-thoi-gian-giup-ban-tran-trong-cuoc-song.html\"><strong>thời gian</strong></a><strong> hiện hành</strong>.</p><p><strong>▶ Bước 2</strong>: Ấn Nút <strong>LIGHT</strong> để chuyển đến giá trị thời gian muốn chỉnh (giờ, phút, giây, am/pm, tháng, thứ, ngày).</p><p><strong>▶ Bước 3</strong>: Ấn nút <strong>START</strong> (hoặc Nút <strong>START/STOP</strong>) để <strong>điều chỉnh tăng giảm</strong> giá trị muốn chỉnh. Lặp lại Bước 2 và Bước nếu bạn muốn chỉnh giá trị thời gian khác.</p><p><strong>▶ Bước 4</strong>: Bạn Ấn Nút <strong>MODE</strong> để kết thúc cài đặt giờ hiện hành.</p><p>Thực hiện tương tự để điều chỉnh ngày đồng hồ Casio 3 nút hoặc thứ dễ dàng bằng cách nhấn vào nút LIGHT để đi đến giá trị điều chỉnh.</p><p>&nbsp;</p><h3><strong>2. CÁCH CHỈNH BÁO THỨC (CHẾ ĐỘ AL) VÀ TÍN HIỆU GIỜ ĐỒNG HỒ CASIO 3 NÚT</strong></h3><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/03/2-cach-chinh-dong-ho-casio-3-nut-don-gian-nhanh-de-trong-1-phut.jpg\" alt=\"Cách chỉnh đồng hồ Casio 3 nút đơn giản nhanh dễ trong 1 phút - hình 2\"></figure><p><i>Tham khảo cách điều chỉnh đồng hồ Casio 3 nút: báo thức</i></p><p>&nbsp;</p><p>Mẫu <a href=\"https://donghohaitrieu.com/tu-khoa/dong-ho-dien-tu\">đồng hồ điện tử</a> này của Casio luôn đi kèm chức năng báo giờ, và cách chỉnh đồng hồ Casio 3 nút khi muốn sử dụng chức năng này ra sao, cùng tham khảo qua các bước dưới đây.</p><p>● <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/cach-tat-bao-thuc-dong-ho-casio-3-nut-4-nut-don-gian-nhat.html\"><strong>Cách chỉnh báo thức đồng hồ Casio</strong></a><strong> 3 nút:</strong></p><p><strong>▶ Bước 1</strong>: Ấn Nút <strong>MODE</strong> vào chế độ cài đặt báo thức (AL)</p><p><strong>▶ Bước 2</strong>: Ấn Nút <strong>LIGHT</strong> để chuyển đến giá trị muốn chỉnh (giờ, phút).</p><p><strong>▶ Bước 3</strong>: Ấn Nút <strong>START</strong> (hoặc Nút <strong>START/STOP</strong>) để điều chỉnh tăng giảm thời gian đặt báo thức.</p><p><strong>▶ Bước 4</strong>: Ấn Nút <strong>LIGHT</strong> để kết thúc quá trình cài đặt báo thức. Để tắt âm khi Báo Thức đang đổ chuông, Ấn Nút <strong>LIGHT</strong>.</p><p>&nbsp;</p><p>● <strong>Cách chỉnh tín hiệu giờ</strong></p><p>Cụ thể, khi cài đặt chức năng báo thức cho đồng hồ Casio điện tử sẽ có 3 trạng thái lựa chọn: một là vừa báo thức và vừa có đèn tín hiệu, hai là chỉ có báo thức, ba là chỉ có tín hiệu.</p><p>Vậy nếu cần điều chỉnh tín hiệu giờ, dưới đây là cách chỉnh đồng hồ Casio 3 nút đơn giản cho bạn:</p><p><strong>▶ Bước 1</strong>: Ấn Nút <strong>MODE</strong> vào chế độ cài đặt báo thức (AL)</p><p><strong>▶ Bước 2</strong>: Ấn Nút <strong>START</strong> (hoặc Nút <strong>START/STOP</strong>) để chọn lần lượt: Báo Thức+Tín Hiệu; Tắt hết Báo Thức+Tín Hiệu ; Chỉ bật Báo Thức; Chỉ bật Tín Hiệu.</p><p><strong>▶ Bước 4</strong>: Ấn Nút <strong>LIGHT</strong> để kết thúc quá trình cài đặt báo thức.</p><p>&nbsp;</p><h3><strong>3. CÁCH CHỈNH BẤM GIỜ (CHẾ ĐỘ ST) ĐỒNG HỒ CASIO 3 NÚT</strong></h3><p>Với cách điều chỉnh đồng hồ Casio 3 nút khi sử dụng chức năng bấm giờ cũng thực hiện qua các bước dưới đây:</p><p><strong>▶ Bước 1</strong>: Ấn Nút <strong>MODE</strong> vào chế độ Bấm Giờ (ST)</p><p><strong>▶ Bước 2</strong>: Ấn Nút <strong>START/STOP</strong> để bắt đầu bấm giờ và ấn lần nữa để kết thúc quá trình bấm giờ. Bấm Giờ chạy tối đa 59’59.99″ (59 phút 59.99 giây) với độ chính xác 1/100 giây.</p><p><strong>▶ Bước 3</strong>: Ấn Nút <strong>LIGHT</strong> để bắt đầu lại (reset) thời gian bấm giờ về 0.</p><p><strong>▶ Bước 4</strong>: Ấn Nút <strong>MODE</strong> để kết thúc và thoát ra màn hình giờ hiện hành.</p>', 'Cách chỉnh đồng hồ, Cách chỉnh đồng hồ Casio, Chỉnh đồng hồ Casio, Cách chỉnh giờ đồng hồ Casio, Chỉnh giờ đồng hồ, Chỉnh ngày đồng hồ Casio', 0, 1, 1, '2023-03-22 03:16:10', '2023-04-26 10:53:38'),
(20, 1, 1, '68', 'CÁCH CHỈNH NGÀY ĐỒNG HỒ CƠ (AUTOMATIC) ĐÚNG CHO NGƯỜI MỚI', 'cach-chinh-ngay-dong-ho-co-automatic-dung-cho-nguoi-moi', 'Đồng hồ cơ là sản phẩm sở hữu bộ máy cơ khí đẳng cấp bên trong. Tuy nhiên, đây là sản phẩm có nhiều lưu ý người dùng cần phải nắm rõ để tránh làm sai lệch giờ. Tham khảo ngay bài viết sau để nắm rõ lý do cũng như cách chỉnh ngày đồng hồ cơ chính xác và đơn giản nhất.', '<h2><strong>CÁCH CHỈNH NGÀY ĐỒNG HỒ ĐƠN GIẢN CHỈ TRONG 5 BƯỚC</strong></h2><p>Chỉnh ngày đồng hồ cơ tốn rất ít thời gian, chỉ khoảng vài phút. Tuy nhiên, cũng cần lưu ý một vài điểm để cách chỉnh thứ ngày đồng hồ cơ có thể nhanh chóng và không ảnh hưởng gì đến chất lượng bộ máy bên trong.</p><p>&nbsp;</p><h3><strong>BƯỚC 1: RÚT NÚM CHỈNH</strong></h3><p>Rút nhẹ và tác động lực vừa đủ lên núm chỉnh ở nấc 2 để chỉnh lịch ngày đồng hồ cơ. Nên dùng lực vừa đủ và hạn chế can thiệp trợ lực bằng các vật cứng gây biến dạng núm, xô lệch linh kiện liên quan bên trong.</p><p>Nếu đồng hồ có chế độ hacking stop, kim giây sẽ dừng lại ở thao tác này. Mục đích của chế độ hacking stop chính để thao tác chỉnh giờ thêm chính xác. Nếu kim giây đồng hồ không dừng, đồng nghĩa với việc tính năng hacking stop không được trang bị cho sản phẩm của bạn.</p><p>Lưu ý rằng, đồng hồ có núm ren vặn phải mở khóa ngược chiều kim đồng hồ đến khi núm mở hoàn toàn. Sau đó mới có thể thực hiện thao tác rút núm chỉnh.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/1-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.jpg\" alt=\"Cách Chỉnh Ngày Đồng Hồ Cơ, Đảm Bảo Nhảy Đúng 12 Giờ Đêm ảnh 1\"></figure><p><i>Núm chỉnh là bộ phận quan trọng giúp chỉnh ngày đồng hồ cơ</i></p><p>&nbsp;</p><h3><strong>BƯỚC 2: CHỈNH LỊCH GIỜ</strong></h3><p>Một trong những lưu ý để chỉnh ngày giờ đồng hồ cơ không ảnh hưởng đến linh kiện bên trong chính là thao tác vặn núm phải thực hiện nhẹ nhàng, đúng chiều kim đồng hồ. Lực tác động lên núm quá mạnh, sai chiều… có thể gây ảnh hưởng đến bộ máy bên trong.</p><p>Hãy vặn núm đến khi lịch nhảy sang ngày kế tiếp và thời gian rơi vào khoảng 9 đến 11 giờ thì ngừng lại.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/2-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.jpg\" alt=\"Cách Chỉnh Ngày Đồng Hồ Cơ, Đảm Bảo Nhảy Đúng 12 Giờ Đêm ảnh 2\"></figure><p><i>Cách chỉnh ngày tháng đồng hồ cơ cần lưu ý từng bước để không ảnh hưởng đến bộ máy</i></p><p>&nbsp;</p><h3><strong>BƯỚC 3: CHỈNH LỊCH NGÀY</strong></h3><p>Nhẹ nhàng thao tác đẩy nhẹ núm chỉnh để về lại nấc số 1. Hãy đảm bảo tay bạn vẫn dùng lực vừa đủ và núm vặn cố định đúng tại nấc thứ 1 không xô lệch. Đây là một thao tác quan trọng nhất trong cách chỉnh ngày đồng hồ cơ 5 bước.</p><p>Hãy xoay núm để lịch ngày tăng dần (Ví dụ: 29 → 30 → 1 → 2), đến đúng ngày hôm qua thì dừng lại (ví dụ hôm nay là ngày 20 thì bạn phải chỉnh về ngày 19). Tuyệt đối không xoay kim lùi ngày (ví dụ từ ngày 3 → 2 → 1). Thao tác lùi ngược ngày có thể gây hư hại đến các linh kiện bên trong khiến đồng hồ hư hỏng, sai số thời gian lớn…</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/3-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.jpg\" alt=\"Cách Chỉnh Ngày Đồng Hồ Cơ, Đảm Bảo Nhảy Đúng 12 Giờ Đêm ảnh 3\"></figure><p><i>Xoay kim đúng chiều là lưu ý quan trọng trong cách chỉnh thứ ngày đồng hồ cơ</i></p><p>&nbsp;</p><h3><strong>BƯỚC 4: TIẾP TỤC CHỈNH LỊCH GIỜ</strong></h3><p>Nhẹ nhàng thao tác đẩy nhẹ núm chỉnh để về lại nấc số 2. Như đã đề cập ở trên, lưu ý về thao tác nhẹ nhàng, không gây xô lệch trục vặn là điều kiện quan trọng trong cách chỉnh ngày đồng hồ cơ không gây hại cho bộ máy.</p><p>Xoay núm vặn thuận chiều <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/tong-hop-kieu-va-ten-goi-cac-loai-kim-dong-ho-pho-bien.html\">kim đồng hồ</a> đến ngày hôm nay đúng Thứ-Ngày-Giờ-Phút ở hiện tại. Nếu thực hiện đủ các thao tác đã kể trên, kể từ thời điểm này đồng hồ cơ đã có thể nhảy đúng lịch theo như thời gian hiện tại.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/4-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.jpg\" alt=\"Cách Chỉnh Ngày Đồng Hồ Cơ, Đảm Bảo Nhảy Đúng 12 Giờ Đêm ảnh 4\"></figure><p><i>Nhẹ nhàng thao tác là cách chỉnh ngày đồng hồ cơ quan trọng cần lưu ý</i></p><p>&nbsp;</p><h3><strong>BƯỚC 5: CHỐT NÚM CHỈNH</strong></h3><p>Để các thao tác cách chỉnh ngày đồng hồ cơ không ảnh hưởng đến vận hành bộ máy, đừng quên đóng khít núm chỉnh lại như ban đầu để tránh nước, bụi xâm nhập. Nếu đồng hồ có núm ren bảo vệ, hãy chốt khóa thật kĩ lưỡng với lực nhẹ nhàng để bảo vệ sản phẩm.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/5-cach-chinh-ngay-dong-ho-co-dam-bao-nhay-dung-12-gio-dem.jpg\" alt=\"Cách Chỉnh Ngày Đồng Hồ Cơ, Đảm Bảo Nhảy Đúng 12 Giờ Đêm ảnh 5\"></figure><p><i>Chốt núm chỉnh sẽ giúp cách chỉnh ngày đồng hồ cơ không ảnh hưởng xấu đến </i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/tong-hop-cac-nha-san-xuat-bo-may-dong-ho-noi-tieng-nhat.html\"><i>bộ máy</i></a><i> do các yếu tố bên ngoài</i></p><h2><strong>NÊN CHỈNH NGÀY ĐỒNG HỒ CƠ VÀO LÚC NÀO?</strong></h2><p>Cách chỉnh ngày đồng hồ cơ nên được thực hiện trong thời gian từ 9 – 15 giờ. Đây là khung thời gian lý tưởng cho việc điều chỉnh cả lịch thứ ngày và giờ cho đồng hồ cơ.</p><p>Không nên chỉnh ngày đồng hồ từ 22h đến 4h sáng hôm sau, bởi đây là thời gian chuyển dịch giữa 2 ngày. Nếu chỉnh ngày, giờ trong thời gian này có thể làm ảnh hưởng đến bộ máy, khả năng hoạt động không chính xác của đồng hồ. Gây đảo lộn lịch ban ngày và ban đêm của thiết bị.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/09/1-cach-chinh-ngay-dong-ho-co-automatic-dung-cho-nguoi-moi.jpg\" alt=\"Cách chỉnh ngày đồng hồ cơ (automatic) đúng cho người mới - ảnh 10\"></figure><p><i>Cách chỉnh ngày đồng hồ cơ đơn giản nhất</i></p>', 'Cách chỉnh đồng hồ, Chỉnh đồng hồ thế nào, Chỉnh đồng hồ, Làm sao để chỉnh đồng hồ, Chỉnh giờ đồng hồ', 0, 1, 1, '2023-03-22 03:18:26', '2023-04-12 15:52:36'),
(21, 1, 11, '69', 'GIẢI ĐÁP: ĐỒNG HỒ CHỐNG NƯỚC 3ATM CÓ TẮM ĐƯỢC KHÔNG?', 'giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong', 'Đồng hồ 3ATM có tắm được không? Sử dụng nước khi đeo đồng hồ chống nước 3ATM như thế nào? Thật đáng buồn, câu trả lời đó là KHÔNG, tất cả đồng hồ chính hãng chống nước 3ATM đều có thể bị vào nước khi tắm. Hãy xem ngay cách sử dụng nước cho đồng hồ chống nước 3ATM.', '<h2><strong>GIẢI ĐÁP: ĐỒNG HỒ CHỐNG NƯỚC 3ATM CÓ TẮM ĐƯỢC KHÔNG?</strong></h2><p>Câu trả lời cho vấn đề <a href=\"https://donghohaitrieu.com/muc-chong-nuoc/di-mua-nho-3-atm\">đồng hồ 3ATM</a> có tắm được không đó là <strong>KHÔNG</strong>! Rất đáng tiếc khi phải nói rằng bạn đừng bao giờ đeo chiếc đồng hồ chống nước 3ATM khi tắm, tắm bồn, tắm vòi sen, đi mưa lớn, đi bơi, hoặc bất cứ hoạt động thể thao nước nào, đặc biệt là các loại sử dụng <a href=\"https://donghohaitrieu.com/danh-muc/phu-kien-dong-ho/day-da-dong-ho\">dây đồng hồ da</a> không có khả năng chịu nước.</p><p>&nbsp;</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/07/1-giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong.jpg\" alt=\"Giải đáp: Đồng hồ chống nước 3ATM có tắm được không? - hình 1\"></figure><p><i>Đồng hồ 3ATM có tắm được không? Câu trả lời là không cho bất cứ thương hiệu nào, bất kể xuất xứ</i></p><h3><strong>1. ĐỒNG HỒ 3ATM LÀ GÌ?</strong></h3><p><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/07/giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong-Skagen-SKW2639-a.jpg\" alt=\"Giải đáp: Đồng hồ chống nước 3ATM có tắm được không? - hình 2\"></p><p>Đồng hồ có chỉ số chịu nước 3ATM (30m), đáp ứng được các tiêu chuẩn về chịu nước khi tiếp xúc với không khí ẩm thường ngày, chịu được nước khi rửa tay.</p><p>Nói ngắn gọn, đồng hồ 3ATM là đồng hồ chống nước nhưng mức chống nước thấp, theo nhiều hãng khuyến cáo (đặc biệt là <a href=\"https://donghohaitrieu.com/phien-ban-dac-biet/sieu-mong\">đồng hồ siêu mỏng</a> dưới 8 mm) tốt nhất là không nên để chúng tiếp xúc với nước.</p><blockquote><p><i><strong>“Để biết đồng hồ có chỉ số chịu nước là bao nhiêu ATM, bạn có thể tìm trên mặt số hoặc ở trên nắp đáy. Tùy theo đồng hồ, đơn vị có thể thay đổi, thường dùng có 3ATM = 30m = 3BAR = 100ft. ”</strong></i></p><h3><strong>2. TẠI SAO ĐỒNG HỒ CHỐNG NƯỚC 3ATM KHÔNG TẮM ĐƯỢC?</strong></h3><p>Đồng hồ 3ATM không tắm được liên quan đến cấu tạo của <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/case-dong-ho-la-gi-truong-hop-cai-hop-hay-cai-vo-dong-ho.html\">vỏ đồng hồ</a>. Chủ yếu là do chúng có ít lớp ron cao su niêm phong hoặc ron rất mỏng nên khả năng chống nước kém.</p><p><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/07/giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong-ron.jpg\" alt=\"Giải đáp: Đồng hồ chống nước 3ATM có tắm được không? - hình 3\"></p><p>Đồng hồ chống nước 3ATM thường mỏng, núm nhỏ, nên thường chỉ trang bị 2-3 ron cao su, 1 cái ở đáy, 1-2 cái ở núm, đồng hồ càng mỏng/nhỏ ron cũng càng mỏng/nhỏ. Do đó, chúng có khả năng chống nước yếu, không chịu được nước có áp suất lớn (tắm bồn, ngâm lâu) hoặc các tia nước nhỏ nhưng mạnh (vòi sen, mưa lớn)…</p><p>&nbsp;</p><p><i>Ron cao su là đai </i><a href=\"https://donghohaitrieu.com/kinh-nghiem/y-nghia-mau-sac/y-nghia-mau-den-phan-loai-tinh-cach-nguoi-yeu-mau-den.html\"><i>màu đen</i></a><i>, thường bọc vòng quanh nắp đáy và đặt trong núm chỉnh ►</i><br>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><blockquote><p><i><strong>“Ron cao su (hoặc nhựa, chất dẻo) là linh kiện quan trọng nhất mang đến khả năng chống thấm nước của đồng hồ, chúng bịt kín các khe hở của phần vỏ, ngăn không cho nước vào trong </strong></i><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/tong-hop-cac-nha-san-xuat-bo-may-dong-ho-noi-tieng-nhat.html\"><i><strong>bộ máy</strong></i></a><i><strong>. Thường thì càng nhiều ron (đòi hỏi trình độ sản xuất rất cao), đồng hồ thường chống nước càng tốt.”</strong></i></p></blockquote><p>&nbsp;</p><h3><strong>3. ĐỒNG HỒ 3ATM CHỊU ĐƯỢC NƯỚC Ở TRƯỜNG HỢP NÀO?</strong></h3><p>Đồng hồ 3ATM không tắm được nhưng vẫn có thể chịu nước khi tiếp xúc với không khí ẩm thường ngày, chịu được nước khi rửa tay hoặc các “rủi ro” bất ngờ như bị ly nước đổ lên, mưa lâm râm.</p><figure class=\"image\"><img src=\"https://cdn3.dhht.vn/wp-content/uploads/2018/07/4-giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong.jpg\" alt=\"Giải đáp: Đồng hồ chống nước 3ATM có tắm được không? - hình 4\"></figure><p><i>Đồng hồ chống nước 3ATM có thể chịu nước khi rửa tay, đi mưa nhỏ</i><br>&nbsp;</p><p>&nbsp;</p><h3><strong>4. SỬ DỤNG NƯỚC CHO ĐỒNG HỒ CHỐNG NƯỚC 3ATM NHƯ THẾ NÀO?</strong></h3><p>Theo tiêu chuẩn, đồng hồ chống nước 3 ATM có thể đeo khi rửa tay, chống ẩm không khí hằng ngày với điều kiện núm chỉnh luôn đóng kín và phần vỏ, kính không có sự hư hại nào.</p><p>Hãy nhớ, sau khi điều <a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/cach-chinh-dong-ho-deo-tay-don-gian-nhat-cho-nguoi-moi.html\">chỉnh thời gian</a> bạn phải luôn ấn kín núm chỉnh lại như cũ. Tuyệt đối không được kéo rút nút hoặc bấm bất cứ nút khi đồng hồ đang tiếp xúc nước, độ ẩm cao.</p><p>Cuối cùng, đừng để cho đồng hồ chống nước 3ATM hay bất cứ đồng hồ chống nước nào tiếp xúc với các loại <a href=\"https://donghohaitrieu.com/kinh-nghiem/15-hang-my-pham-han-quoc-noi-tieng-nhat-the-gioi-tai-vn.html\">mỹ phẩm</a>, dầu, dung môi vì các thành phần dầu khoáng, dầu thực vật, benzene, toluene … sẽ gây trương nở cao su từ đó hủy hoại khả năng chống nước của đồng hồ.</p><h3><strong>5. ĐỒNG HỒ CHỐNG NƯỚC 3ATM BỊ VÀO NƯỚC CÓ ĐƯỢC BẢO HÀNH KHÔNG?</strong></h3><p>Trả lời: thường là KHÔNG vì gần như không thể xác định việc để đồng hồ vào nước là do lỗi người dùng hay do lỗi kỹ thuật.</p><p>Bởi thế, bạn nên ưu tiên mua đồng hồ chống nước 3ATM của một nhà sản xuất có tên tuổi từ Nhật Bản, Thụy Sĩ (họ nổi tiếng là “cho dư” khả năng chống nước thực tế so với chỉ số công bố).</p></blockquote>', 'Đồng hồ chống nước, Đồng hồ chống thấm nước, Đồng hồ 3ATM, Đồng hồ chống thấm nước 3ATM', 0, 1, 1, '2023-03-22 03:23:05', '2023-04-26 14:34:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_categories`
--

CREATE TABLE `news_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `slug`, `description`, `keywords`, `image`, `appear`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Tin tức S - Watch', 'tin-tuc-s-watch', NULL, NULL, NULL, 1, 4, NULL, NULL),
(11, 'Tin đồng hồ', 'tin-dong-ho', NULL, NULL, NULL, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news_comments`
--

INSERT INTO `news_comments` (`id`, `news_id`, `user_id`, `message`, `appear`, `created_at`, `updated_at`) VALUES
(10, 3, 8, 'Mình phải trả trước bao nhiêu % số tiền thì mới được đăng ký trả góp?', 1, '2023-04-26 14:44:01', '2023-04-26 14:44:01'),
(11, 2, 8, 'Chính sách bảo hành của Swatch có gì đặc biệt hơn các cửa hàng khác không?', 1, '2023-04-26 14:50:32', '2023-04-26 14:50:32'),
(12, 16, 8, 'Những mẫu nào của JACQUES DU MANOIR có chống nước vậy shop?', 1, '2023-04-26 14:56:48', '2023-04-26 14:56:48'),
(13, 4, 8, 'Mình muốn đồng hồ tặng cho bạn thì bên Swatch có nhận gói quà và giao hàng không?', 1, '2023-04-26 14:58:09', '2023-04-26 14:58:09'),
(14, 18, 8, 'Trang web này có nhiều mẫu đồng hồ đẹp và hiện đại. Mình đã mua một chiếc đồng hồ Orient cho chồng và một chiếc Casio cho con trai. Cả hai đều rất thích. Sẽ ủng hộ web vào lần sau.', 1, '2023-04-26 15:05:41', '2023-04-26 15:05:41'),
(15, 21, 8, 'Nếu không được bảo hành thì đồng hồ vô nước có sửa đc ko với bên shop có nhận sửa chữa khônng?', 1, '2023-04-26 15:07:54', '2023-04-26 15:07:54'),
(16, 15, 8, 'Mình là fan của đồng hồ điện tử Casio. Mình thấy trang web này có nhiều mẫu đồng hồ Casio đẹp và phong cách. Mình đã mua một chiếc G-Shock và một chiếc Vintage từ trang web này. Cả hai đều rất ổn, không có lỗi lầm gì. Mình cũng thích cách trang web giới thiệu các tính năng và cách sử dụng của các loại đồng hồ Casio.', 1, '2023-04-26 15:08:48', '2023-04-26 15:08:48'),
(17, 12, 8, 'Đồng hồ Orient với Casio thì cái nào tốt hơn?', 1, '2023-04-26 15:09:56', '2023-04-26 15:09:56'),
(18, 7, 8, 'Khi mua đồng hồ Fitbit thì có kèm theo dây sạc không, chính sách bảo hành đồng hồ ntn???', 1, '2023-04-26 15:13:20', '2023-04-26 15:13:20'),
(19, 18, 9, 'Đồng hồ rất đẹp và chất lượng. Giao hàng nhanh và gói hàng cẩn thận. Nhân viên tư vấn nhiệt tình và thân thiện. Rất hài lòng với trang web này.', 1, '2023-04-26 15:16:23', '2023-04-26 15:16:23'),
(20, 17, 9, 'Trang web có nhiều mẫu đồng hồ đa dạng và phù hợp với nhiều đối tượng khách hàng. Giá cả hợp lý và có nhiều chương trình khuyến mãi. Đồng hồ chính hãng và có bảo hành dài hạn.', 1, '2023-04-26 15:19:19', '2023-04-26 15:19:19'),
(21, 14, 9, 'Cách vệ sinh đồng hồ bằng thép không gỉ như thế nào vậy shop?', 1, '2023-04-26 15:21:00', '2023-04-26 15:21:00'),
(22, 13, 9, 'Trang web này là nơi mua đồng hồ uy tín nhất mà mình biết. Mình đã mua nhiều đồng hồ từ trang web này và không bao giờ thất vọng. Đồng hồ có tem và giấy tờ rõ ràng. Giao hàng nhanh chóng và an toàn. Trang web cũng có nhiều thông tin bổ ích về đồng hồ.', 1, '2023-04-26 15:21:42', '2023-04-26 15:21:42'),
(23, 9, 9, 'Mình là người thích sưu tầm đồng hồ. Mình đã mua nhiều đồng hồ từ nhiều trang web khác nhau nhưng trang web này là trang web mà mình tin tưởng nhất. Trang web có nhiều đồng hồ chính hãng, có giấy chứng nhận và bảo hành quốc tế. Trang web cũng có nhiều đồng hồ hiếm và độc đáo mà mình không thể tìm thấy ở nơi khác. Mình rất hạnh phúc khi mua hàng ở đây và sẽ tiếp tục ủng hộ trang web này.', 1, '2023-04-26 15:22:18', '2023-04-26 15:22:18'),
(24, 3, 9, 'Mình là người hay đi du lịch và công tác nên mình cần một chiếc đồng hồ có thể hiển thị nhiều múi giờ khác nhau. Mình đã chọn mua chiếc Casio AE-1200WHD từ trang web này vì nó có thiết kế đẹp và tiện lợi. Đồng hồ có thể hiển thị 4 múi giờ cùng lúc và có chức năng bấm giờ, báo thức, đèn led... Đồng hồ cũng rất bền và chống nước tốt. Mình rất hài lòng với chiếc đồng hồ này và cảm ơn trang web đã giao hàng nhanh chóng.', 1, '2023-04-26 15:23:24', '2023-04-26 15:23:24'),
(25, 21, 10, 'Mình là người khá kén chọn khi mua đồng hồ. Mình đã tìm kiếm nhiều trang web bán đồng hồ nhưng không có cái nào ưng ý. Cho đến khi mình biết đến trang web này, mình đã tìm thấy chiếc đồng hồ mà mình mong muốn. Mẫu đồng hồ rất duyên dáng và nữ tính. Mình rất vui khi nhận được đồng hồ và cảm ơn trang web đã mang lại sự hài lòng cho mình.', 1, '2023-04-26 15:38:47', '2023-04-26 15:38:47'),
(26, 16, 10, 'Trang web này là thiên đường cho những người yêu thích đồng hồ cơ. Mình đã mua một chiếc Jacques Du Manoir từ trang web này. sản phẩm\n rất tuyệt vời, có thiết kế sang trọng và lộ máy đẹp. Mình cũng thấy trang web có nhiều thông tin bổ ích về cách bảo quản và vệ sinh đồng hồ cơ.', 1, '2023-04-26 15:41:46', '2023-04-26 15:41:46'),
(27, 18, 10, 'Mẫu đồng hồ nào của Casio cũng đều đẹp, chất lượng rất tốt đi đôi với giá tiền, web bán hàng chính hãng và an tâm, nên ủng hộ web nhiều hơn', 1, '2023-04-26 15:44:38', '2023-04-26 15:44:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `province` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `ward` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `admin_note` varchar(255) DEFAULT NULL,
  `payment` varchar(100) NOT NULL DEFAULT 'COD',
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `phone`, `email`, `province`, `district`, `ward`, `address`, `code`, `status`, `note`, `admin_note`, `payment`, `total`, `created_at`, `updated_at`) VALUES
(35, 9, 'Bùi Kim Tú', '0123456789', '', '', '', '', 'Hồ Chí Minh', '0U0dCqZLyx', 'Đã thanh toán', NULL, NULL, 'COD', 6884282, '2023-02-13 02:32:26', '2023-04-27 02:35:44'),
(36, 19, 'Đoàn  Sơn', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'CVbBR0kZRc', 'Đang chờ duyệt', NULL, NULL, 'COD', 5663374, '2023-06-01 02:32:26', NULL),
(37, 45, 'Trần Tiến Thảo', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'lCvsQBU2BC', 'Đang giao hàng', NULL, NULL, 'COD', 6351397, '2023-03-26 02:32:26', NULL),
(38, 17, 'Trần Ngọc Sơn', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'iM8g3FcKDq', 'Giao thành công', NULL, NULL, 'COD', 2918906, '2023-07-20 02:32:26', NULL),
(39, 38, 'Tần Văn Anh', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'zxh0FRVR1Q', 'Giao thành công', NULL, NULL, 'COD', 8868867, '2023-02-09 02:32:26', NULL),
(40, 25, 'Nguyễn  Bảo', '0123456789', '', '', '', '', 'Hồ Chí Minh', '3ERUoPhSmo', 'Giao thành công', NULL, NULL, 'COD', 5025199, '2023-07-26 02:32:26', '2023-03-25 06:28:58'),
(41, 25, 'Nguyễn  Bảo', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'Mzcq2yotSe', 'Đang giao hàng', NULL, NULL, 'COD', 4129633, '2023-06-24 02:32:26', NULL),
(42, 49, 'Võ Thị Ly', '0123456789', '', '', '', '', 'Hồ Chí Minh', '8OHh7y8tjx', 'Đang giao hàng', NULL, NULL, 'COD', 4286294, '2023-04-20 02:32:26', NULL),
(43, 48, 'Bùi Nguyên Ly', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'sYWnENAmUe', 'Đang giao hàng', NULL, NULL, 'COD', 3401691, '2023-04-24 02:32:26', NULL),
(44, 36, 'Lý Tiến Bảo', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'jCR2Jol4Xr', 'Giao thành công', NULL, NULL, 'COD', 6544476, '2023-06-06 02:32:26', NULL),
(45, 27, 'Tần Tiến Anh', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'ecsr0Vkh2C', 'Đang giao hàng', NULL, NULL, 'COD', 7591089, '2023-02-23 02:32:26', NULL),
(46, 36, 'Đoàn Khôi Ánh', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'LJXYo6nxMg', 'Đang chờ duyệt', NULL, NULL, 'COD', 4451677, '2023-03-05 02:32:26', NULL),
(47, 49, 'Đoàn Văn Ánh', '0123456789', '', '', '', '', 'Hồ Chí Minh', '0OpjskeT7s', 'Đang chờ duyệt', NULL, NULL, 'COD', 7999803, '2023-04-18 02:32:26', NULL),
(48, 35, 'Tần Kim Ánh', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'zdF2C9NiBT', 'Đang giao hàng', NULL, NULL, 'COD', 2371070, '2023-05-08 02:32:26', NULL),
(49, 5, 'Võ  Bảo', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'hwZWq0gcKb', 'Đang chờ duyệt', NULL, NULL, 'COD', 5308763, '2023-05-05 02:32:26', NULL),
(50, 43, 'Đoàn Nguyên Phương', '0123456789', '', '', '', '', 'Hồ Chí Minh', 'kF9NwIaoST', 'Giao thành công', NULL, NULL, 'COD', 7678123, '2023-04-25 02:32:26', NULL),
(51, 1, 'Từ Nguyên Khôi', '0854643848', '', 'Thành phố Hà Nội', 'Quận Bắc Từ Liêm', 'Phường Liên Mạc', '49 QL20\r\nPhú Hội', 'P1KYPO6EPD', 'Chờ xác nhận', NULL, NULL, 'COD', 12690000, '2023-04-01 15:15:46', '2023-04-01 15:15:46'),
(52, 1, 'Từ Nguyên Khôi', '0854643848', '', 'Thành phố Hà Nội', 'Quận Bắc Từ Liêm', 'Phường Liên Mạc', '49 QL20\r\nPhú Hội', 'EBKNI664XR', 'Chờ xác nhận', NULL, NULL, 'COD', 12690000, '2023-04-01 15:23:53', '2023-04-01 15:23:53'),
(53, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', '7DODIBQDOL', 'Chờ xác nhận', NULL, NULL, 'COD', 24438000, '2023-04-02 05:44:17', '2023-04-02 05:44:17'),
(54, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'YPIEXKQPUE', 'Chờ xác nhận', NULL, NULL, 'COD', 24438000, '2023-04-02 05:45:11', '2023-04-02 05:45:11'),
(55, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'SJEQRQXMKT', 'Chờ xác nhận', NULL, NULL, 'COD', 24438000, '2023-04-02 05:45:36', '2023-04-02 05:45:36'),
(56, 2, 'Từ Nguyên Khôi', '0854643848', 'khoitnps15595@fpt.edu.vn', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'CMJ3IDTLFC', 'Chờ xác nhận', NULL, NULL, 'COD', 16610000, '2023-04-02 05:50:27', '2023-04-02 05:50:27'),
(57, 2, 'Từ Nguyên Khôi', '0854643848', 'khoitnps15595@fpt.edu.vn', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'A8XIUA3L2O', 'Chờ xác nhận', NULL, NULL, 'COD', 16610000, '2023-04-02 05:50:46', '2023-04-02 05:50:46'),
(58, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'HFB8ECA9I8', 'Chờ xác nhận', NULL, NULL, 'COD', 6610000, '2023-04-02 07:38:44', '2023-04-02 07:38:44'),
(59, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'IZ2TJEBUT9', 'Chờ xác nhận', NULL, NULL, 'COD', 6610000, '2023-04-02 07:39:35', '2023-04-02 07:39:35'),
(60, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'WV8W5EUVTI', 'Chờ xác nhận', NULL, NULL, 'COD', 6610000, '2023-04-02 07:41:19', '2023-04-02 07:41:19'),
(61, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'G72FBS6B16', 'Đã thanh toán ', NULL, NULL, 'COD', 6610000, '2023-04-02 07:42:30', '2023-04-02 07:42:30'),
(62, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'BIWPW02ERS', 'Chờ xác nhận', NULL, NULL, 'COD', 6610000, '2023-04-02 07:42:42', '2023-04-02 07:42:42'),
(63, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'FMW1P33SKH', 'Chờ xác nhận', NULL, NULL, 'COD', 6610000, '2023-04-02 07:42:53', '2023-04-02 07:42:53'),
(64, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'TLT9MB3XV5', 'Đã thanh toán ', NULL, NULL, 'COD', 6610000, '2023-04-02 07:43:18', '2023-04-02 07:43:18'),
(65, 2, 'Từ Nguyên Khôi', '0854643848', 'nguyenkhoi99899@gmail.com', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', 'JIXB6JLC1P', 'Chờ xác nhận', NULL, NULL, 'COD', 6200000, '2023-04-02 07:50:09', '2023-04-02 07:50:09'),
(66, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'LCUWFTIX0Y', 'Chờ xác nhận', NULL, NULL, 'COD', 24110000, '2023-04-04 04:12:33', '2023-04-04 04:12:33'),
(67, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'O0ECFPFIMW', 'Đã thanh toán ', NULL, NULL, 'COD', 24110000, '2023-04-04 04:14:15', '2023-04-04 04:14:15'),
(68, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'QHDEVPFW6B', 'Chờ xác nhận', NULL, NULL, 'COD', 10030000, '2023-04-04 04:15:34', '2023-04-04 04:15:34'),
(69, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Đà Nẵng', 'Quận Sơn Trà', 'Phường Mân Thái', '62 đường 27', 'HK2J9AKVOU', 'Đã thanh toán ', NULL, NULL, 'cod', 13320000, '2023-04-04 08:05:49', '2023-04-04 08:05:49'),
(70, 1, 'Webadmin', '0854643848', 'nguyenkhoi99899@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', '5KPET31WVO', 'Chờ xác nhận', NULL, NULL, 'cod', 21280000, '2023-04-18 15:57:43', '2023-04-18 15:57:43'),
(71, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'RI59ZDROLQ', 'Chờ xác nhận', NULL, NULL, 'cod', 8500000, '2023-04-18 17:17:38', '2023-04-18 17:17:38'),
(72, 7, 'Duy Tân', '0933843032', 'tandd2604@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Phước', '20/15', 'GPLDLF9SI1', 'Đang giao hàng', NULL, NULL, 'vnpay', 15200000, '2023-04-25 02:30:59', '2023-04-26 08:24:16'),
(73, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'EVCITADRV9', 'Đã thanh toán ', NULL, NULL, 'cod', 23160000, '2023-04-26 11:09:35', '2023-04-26 11:09:35'),
(74, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'ZABFRR3DEX', 'Chờ xác nhận', NULL, NULL, 'vnpay', 6580000, '2023-04-26 11:12:46', '2023-04-26 11:12:46'),
(75, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'T8IXDPYEGT', 'Đã thanh toán ', NULL, NULL, 'vnpay', 45000000, '2023-04-26 15:25:37', '2023-04-26 15:25:37'),
(76, 1, 'Webadmin', '0854643848', 'beeswatch.online@gmail.com', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', 'JRPEJZISV1', 'Đã thanh toán ', NULL, NULL, 'vnpay', 45000000, '2023-04-26 15:27:59', '2023-04-26 15:31:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 52, 38, 'SOKOLOV 156.30.00.000.05.01.2', 2, 6580000, '2023-03-15 15:23:53', '2023-04-01 15:23:53'),
(2, 53, 38, 'SOKOLOV 156.30.00.000.05.01.2', 2, 6580000, '2023-03-14 05:44:17', '2023-04-02 05:44:17'),
(3, 54, 38, 'SOKOLOV 156.30.00.000.05.01.2', 2, 6580000, '2023-03-22 05:45:11', '2023-04-02 05:45:11'),
(4, 54, 31, 'SAGA 80737-RGMRRG-2L', 2, 5624000, '2023-03-22 05:45:11', '2023-04-02 05:45:11'),
(5, 56, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-03-08 05:50:27', '2023-04-02 05:50:27'),
(6, 56, 34, 'SOKOLOV 153.30.00.001.06.01.2', 1, 10000000, '2023-03-08 05:50:27', '2023-04-02 05:50:27'),
(7, 58, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-01-12 07:38:44', '2023-04-02 07:38:44'),
(8, 59, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-02-22 07:39:35', '2023-04-02 07:39:35'),
(9, 61, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-02-25 07:42:30', '2023-04-02 07:42:30'),
(10, 65, 35, 'SOKOLOV 155.30.00.000.01.02.2', 1, 6170000, '2023-02-15 07:50:09', '2023-04-02 07:50:09'),
(11, 66, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-02-01 04:12:33', '2023-04-04 04:12:33'),
(12, 66, 37, 'SOKOLOV 127.30.00.001.01.01.2', 2, 9000000, '2023-02-01 04:12:33', '2023-04-04 04:12:33'),
(13, 68, 34, 'SOKOLOV 153.30.00.001.06.01.2', 1, 10000000, '2023-02-16 04:15:34', '2023-04-04 04:15:34'),
(14, 69, 28, 'SAGA CHARM 53229-RGMWRG-5', 1, 7120000, '2023-02-22 08:05:49', '2023-04-04 08:05:49'),
(15, 69, 35, 'SOKOLOV 155.30.00.000.01.02.2', 1, 6170000, '2023-02-18 08:05:49', '2023-04-04 08:05:49'),
(16, 70, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-01-28 15:57:43', '2023-04-18 15:57:43'),
(17, 70, 37, 'SOKOLOV 127.30.00.001.01.01.2', 1, 9000000, '2023-01-28 15:57:43', '2023-04-18 15:57:43'),
(18, 70, 35, 'SOKOLOV 155.30.00.000.01.02.2', 1, 6170000, '2023-01-28 15:57:43', '2023-04-18 15:57:43'),
(19, 71, 37, 'SOKOLOV 127.30.00.001.01.01.2', 1, 9000000, '2023-01-19 17:17:38', '2023-04-18 17:17:38'),
(20, 72, 37, 'SOKOLOV 127.30.00.001.01.01.2', 1, 9000000, '2023-01-04 02:30:59', '2023-04-25 02:30:59'),
(21, 72, 35, 'SOKOLOV 155.30.00.000.01.02.2', 1, 6170000, '2023-01-04 02:30:59', '2023-04-25 02:30:59'),
(22, 73, 33, 'SOKOLOV 140.01.71.000.02.01.2', 1, 10000000, '2023-04-26 11:09:35', '2023-04-26 11:09:35'),
(23, 73, 38, 'SOKOLOV 156.30.00.000.05.01.2', 2, 6580000, '2023-04-26 11:09:35', '2023-04-26 11:09:35'),
(24, 74, 38, 'SOKOLOV 156.30.00.000.05.01.2', 1, 6580000, '2023-04-26 11:12:46', '2023-04-26 11:12:46'),
(25, 75, 37, 'SOKOLOV 127.30.00.001.01.01.2', 5, 9000000, '2023-04-26 15:25:37', '2023-04-26 15:25:37'),
(26, 76, 37, 'SOKOLOV 127.30.00.001.01.01.2', 5, 9000000, '2023-04-26 15:27:59', '2023-04-26 15:27:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `featured_image` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `pages`
--

INSERT INTO `pages` (`id`, `name`, `title`, `description`, `keywords`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', 'Chuỗi cửa hàng đồng hồ S - Watch', 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.', 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp', NULL, '2023-03-10 14:44:47', '2023-03-10 15:31:03'),
(2, 'Tin tức', 'Tin tức - S - Watch', 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.', 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp', NULL, '2023-03-10 14:44:47', NULL),
(3, 'Giới thiệu', 'Giới thiệu - S - Watch', 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.', 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp', NULL, '2023-03-10 14:44:47', NULL),
(4, 'Sản phẩm', 'Sản phẩm - S - Watch', 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.', 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp', NULL, '2023-03-10 14:44:47', NULL),
(5, 'Liên hệ', 'Liên hệ - S - Watch', 'Mua online đồng hồ nam, nữ, trẻ em, cặp đôi chính hãng. Giá tốt nhất, có trả góp 0%. Giao nhanh chóng, xem hàng không mua không sao.', 'đồng hồ thời trang, đồng hồ đeo tay, đồng hồ nam, đồng hồ nữ, đồng hồ trẻ em, đồng hồ đôi, đồng hồ cặp', NULL, '2023-03-10 14:44:47', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page_meta`
--

CREATE TABLE `page_meta` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `meta_key` varchar(100) NOT NULL,
  `meta_label` varchar(100) NOT NULL,
  `meta_type` varchar(50) NOT NULL,
  `meta_value` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page_meta`
--

INSERT INTO `page_meta` (`id`, `page_id`, `meta_key`, `meta_label`, `meta_type`, `meta_value`, `created_at`, `updated_at`) VALUES
(83, 5, 'map_iframe', 'Nhập link google map', 'text', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443923602038!2d106.62339274688422!3d10.853801100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b684ce076f3%3A0x4da1cf0078f423fa!2zRlBUIFBvbHl0ZWNobmljIC0gVG_DoCBUIC0gVHLGsOG7nW5nIGPhu6dhIHTDtGk!5e0!3m2!1svi!2s!4v1678638753574!5m2!1svi!2s', NULL, '2023-03-12 16:33:04'),
(84, 5, 'form_title', 'Nhập tiêu đề form liên hệ', 'text', 'Liên hệ', NULL, '2023-03-13 13:15:14'),
(85, 5, 'form_des', 'Nhập mô tả form liên hệ', 'text', 'Quý khách có nhu cầu liên hệ nhận tư vấn sản phẩm hoặc hợp tác xin vui lòng điền vào form bên dưới hoặc liên hệ trực tiếp đến số 0928.799.403', NULL, '2023-04-18 16:52:13'),
(86, 5, 'social_icon', 'Nhập icon mạng xã hội', 'repeater', '[[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"18\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/www.facebook.com\\/\",\"title\":\"Facebook\",\"target\":\"\"}}],[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"24\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/www.instagram.com\\/\",\"title\":\"Instagram\",\"target\":\"_blank\"}}],[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"17\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"mailto:contact.beeswatch@gmail.com\",\"title\":\"Email\",\"target\":\"_blank\"}}]]', NULL, '2023-03-17 04:31:16'),
(87, 5, 'img_contact', 'Chọn ảnh', 'image', '27', NULL, '2023-03-17 03:32:58'),
(88, 2, 'banner_image', 'Chọn ảnh banner', 'image', '80', NULL, '2023-04-04 08:47:08'),
(89, 2, 'link_fanpage', 'Nhập link fanpage', 'text', 'https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fbusiness.facebook.com%2Ftnkhoiweb&tabs&width=340&height=130&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=532133051086417', NULL, NULL),
(90, 2, 'choose_news_cat', 'Chọn danh mục tin tức', 'news_cat', '[1,11]', NULL, '2023-03-25 05:11:46'),
(91, 2, 'choose_hot_posts', 'Chọn tin tức xem nhiều (Lấy tự động theo lượt xem nếu không chọn)', 'posts', '[2,5,3,10,15,14,12]', NULL, '2023-03-25 05:19:19'),
(92, 2, 'news_page_title', 'Nhập tiêu đề', 'text', 'Tin tức', NULL, NULL),
(93, 2, 'news_page_des', 'Nhập mô tả', 'text', 'Cập nhật tin tức mới nhất từ chúng tôi!', NULL, NULL),
(94, 4, 'banner_image', 'Chọn ảnh banner', 'image', '28', NULL, '2023-03-17 03:43:17'),
(95, 4, 'banner_detail_pd', 'Chọn ảnh banner cho trang chi tiết', 'image', '28', NULL, '2023-04-26 07:51:30'),
(97, 1, 'banner_image', 'Chọn hình ảnh banner', 'gallery', '[190,189,188]', NULL, '2023-04-21 16:52:37'),
(98, 1, 'title_sec_1', 'Tiêu đề section 1', 'text', 'SẢN PHẨM', NULL, '2023-03-18 12:08:33'),
(99, 1, 'des_sec_1', 'Mô tả section 1', 'text', 'Các dòng sản phẩm bán chạy tại S - Watch', NULL, NULL),
(100, 1, 'bg_title_sec_1', 'Tiêu đề ẩn section 1', 'text', 'PRODUCTS', NULL, NULL),
(101, 1, 'choose_pd_sec_1', 'Chọn sản phẩm section 1', 'products', '[2,4,5,6,16,17,18,19,20]', NULL, '2023-03-13 05:53:51'),
(102, 1, 'bg_img_sec_1', 'Ảnh nền section 1', 'image', '191', NULL, '2023-04-21 16:59:24'),
(103, 1, 'title_sec_2', 'Tiêu đề section 2', 'text', 'TẠI SAO CHỌN CHÚNG TÔI', NULL, NULL),
(104, 1, 'des_sec_2', 'Mô tả section 2', 'text', 'Với nhiều năm kinh nghiệm chúng tôi tự tin rằng về dịch vụ cũng như sản phẩm của mình', NULL, NULL),
(105, 1, 'bg_title_sec_2', 'Tiêu đề ẩn section 2', 'text', 'WHY TO CHOOSE', NULL, NULL),
(106, 1, 'content_sec_2', 'Nội dung section 2', 'repeater', '[[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"TI\\u1ec6N L\\u1ee2I\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"13\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"\\u0110\\u1ed8I NG\\u0168 NH\\u00c2N VI\\u00caN\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"14\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"S\\u1ea2N PH\\u1ea8M M\\u1edaI NH\\u1ea4T\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"15\"}]]', NULL, '2023-03-17 04:56:36'),
(107, 1, 'title_sec_3', 'Tiêu đề section 3', 'text', 'S - WATCH', NULL, NULL),
(108, 1, 'sub_title_sec_3', 'Tiêu đề phụ section 3', 'text', 'Cam kết thành công, cùng chung trách nhiệm', NULL, NULL),
(109, 1, 'des_sec_3', 'Mô tả section 3', 'editor', '<p>Chúng tôi là công ty công nghệ cung cấp những giải pháp đơn giản với chi phí tiết kiệm, giúp khách hàng nâng cao hiệu quả kinh doanh.</p> <p>Chúng tôi hướng tới tầm nhìn trở thành công ty cung cấp giải pháp công nghệ cho doanh nghiệp phổ biến tại Đông Nam Á.</p>', NULL, NULL),
(110, 1, 'bg_img_sec_3', 'Ảnh nền section 3', 'image', '192', NULL, '2023-04-21 16:59:24'),
(111, 1, 'icons_sec_3', 'Chọn icon section 3', 'gallery', '[19,20,21,22,23]', NULL, NULL),
(112, 1, 'link_sec_3', 'Liên kết section 3', 'link', '{\"url\":\"#\",\"title\":\"T\\u00ecm hi\\u1ec3u th\\u00eam\",\"target\":\"_blank\"}', NULL, NULL),
(113, 1, 'title_sec_4', 'Tiêu đề section 4', 'text', 'TIN TỨC NỔI BẬT', NULL, NULL),
(114, 1, 'des_sec_4', 'Mô tả section 4', 'text', '', NULL, '2023-03-17 04:23:27'),
(115, 1, 'bg_title_sec_4', 'Tiêu đề ẩn section 4', 'text', 'NEWS', NULL, NULL),
(116, 1, 'choose_news_sec_4', 'Chọn tin tức section 4', 'posts', '[2,3,5,7,4]', NULL, '2023-03-25 05:24:30'),
(117, 1, 'title_sec_5', 'Tiêu đề section 5', 'text', 'THƯƠNG HIỆU', NULL, NULL),
(118, 1, 'des_sec_5', 'Mô tả section 5', 'text', 'S-Watch sẵn sàng đồng hành cùng Quý đối tác trên mọi miền đất nước', NULL, NULL),
(119, 1, 'bg_title_sec_5', 'Tiêu đề ẩn section 5', 'text', 'BRANDS', NULL, NULL),
(120, 1, 'brands_sec_5', 'Chọn thương hiệu section 5', 'brands', '[1,2,3,4,5,6,8]', NULL, NULL),
(154, 999, 'logo_page', 'Chọn logo cho trang web', 'image', '32', NULL, '2023-03-17 04:08:19'),
(155, 999, 'favicon', 'Chọn icon cho trang web', 'image', '45', NULL, '2023-03-25 03:16:41'),
(156, 999, 'address_footer', 'Nhập địa chỉ footer', 'text', 'FPT Polytechnic - Tòa F Tân Hưng Thuận, Quận 12, Thành phố Hồ Chí Minh, Việt Nam', NULL, NULL),
(157, 999, 'phone_footer', 'Nhập số điện thoại footer', 'text', '0854.643.848', NULL, NULL),
(158, 999, 'fax_footer', 'Nhập địa chỉ fax', 'text', '0123456789', NULL, NULL),
(159, 999, 'email_footer', 'Nhập địa chỉ email', 'text', 'contact@beeswatch.online', NULL, NULL),
(160, 999, 'copyright', 'Nhập copyright', 'text', 'Copyright © 2023 S Watch by FPT Polytechnic', NULL, '2023-04-25 11:10:06'),
(161, 999, 'social_footer', 'Nhập icon mạng xã hội footer', 'repeater', '[[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"18\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/\",\"title\":\"Trang ch\\u1ee7\",\"target\":\"\"}}],[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"24\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/contact\",\"title\":\"Li\\u00ean h\\u1ec7\",\"target\":\"_blank\"}}],[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"25\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/shop\",\"title\":\"S\\u1ea3n ph\\u1ea9m\",\"target\":\"_blank\"}}],[{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"26\"},{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/www.youtube.com\\/\",\"title\":\"Youtube\",\"target\":\"_blank\"}}]]', NULL, '2023-04-26 15:59:40'),
(162, 999, 'choose_pd_cat_footer', 'Chọn danh mục sản phẩm footer', 'pd_cat', '[2,3,4,1]', NULL, '2023-04-11 05:14:38'),
(163, 999, 'choose_news_cat_footer', 'Chọn danh mục tin tức footer', 'news_cat', '[1,11]', NULL, '2023-03-17 04:45:17'),
(164, 999, 'choose_link_footer', 'Nhập link footer', 'repeater', '[[{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/\",\"title\":\"Trang ch\\u1ee7\",\"target\":\"\"}}],[{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/contact\",\"title\":\"Li\\u00ean h\\u1ec7\",\"target\":\"_blank\"}}],[{\"child_key\":\"link\",\"child_label\":\"Nh\\u1eadp link\",\"child_type\":\"link\",\"child_value\":{\"url\":\"https:\\/\\/beeswatch.online\\/shop\",\"title\":\"S\\u1ea3n ph\\u1ea9m\",\"target\":\"_blank\"}}]]', NULL, '2023-04-26 15:59:40'),
(165, 999, 'map_iframe_footer', 'Nhập link google map footer', 'text', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.443923602038!2d106.62339274688422!3d10.853801100000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752b684ce076f3%3A0x4da1cf0078f423fa!2zRlBUIFBvbHl0ZWNobmljIC0gVG_DoCBUIC0gVHLGsOG7nW5nIGPhu6dhIHTDtGk!5e0!3m2!1svi!2s!4v1678638753574!5m2!1svi!2s', NULL, '2023-03-12 16:33:04'),
(166, 999, 'default_banner', 'Chọn banner mặc định cho web', 'image', '28', NULL, '2023-04-26 08:20:23'),
(167, 5, 'site_title', 'Nhập tiêu đề trang', 'text', 'Liên hệ', NULL, '2023-03-13 13:15:14'),
(168, 5, 'site_des', 'Nhập mô tả trang', 'text', 'Kết nối với chúng tôi', NULL, '2023-04-11 04:33:42'),
(169, 3, 'title_sec_1', 'Tiêu đề section 1', 'text', 'Chuỗi cửa hàng kinh doanh đồng hồ <br> S Watch', NULL, '2023-04-26 17:06:36'),
(170, 3, 'bg_title_sec_1', 'Tiêu đề ẩn section 1', 'text', 'S WATCH', NULL, '2023-04-26 17:06:36'),
(171, 3, 'des_sec_1', 'Mô tả section 1', 'text', 'Bạn đang tìm kiếm một web site bán đồng hồ uy tín, chất lượng và giá cả hợp lý? Bạn muốn sở hữu những chiếc đồng hồ chính hãng của các thương hiệu nổi tiếng như Casio, Orient, Citizen, Tissot...? Bạn muốn được tư vấn và hỗ trợ nhiệt tình khi mua hàng online? Nếu câu trả lời là có, thì bạn không thể bỏ qua S Watch.', NULL, '2023-04-26 17:06:36'),
(172, 3, 'choose_pd_sec_1', 'Chọn sản phẩm section 1', 'products', '[2,5,16,18,4]', NULL, '2023-04-26 17:14:22'),
(173, 3, 'bg_img_sec_1', 'Ảnh nền section 1', 'image', '2', NULL, '2023-04-26 17:06:36'),
(174, 3, 'title_sec_2', 'Tiêu đề section 2', 'text', 'TẦM NHÌN & HƯỚNG HOẠT ĐỘNG', NULL, NULL),
(175, 3, 'bg_title_sec_2', 'Tiêu đề ẩn section 2', 'text', 'OUR TARGET', NULL, NULL),
(176, 3, 'content_sec_2', 'Nội dung section 2', 'repeater', '[[{\"child_key\":\"sub_title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"Ph\\u00e1t tri\\u1ec3n b\\u1ec1n v\\u1eefng\"},{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"T\\u1ea7m nh\\u00ecn\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Mong mu\\u1ed1n c\\u1ee7a S Watch l\\u00e0 tr\\u1edf th\\u00e0nh \\u0111\\u1ecba ch\\u1ec9 mua s\\u1eafm \\u0111\\u1ed3ng h\\u1ed3 uy t\\u00edn v\\u00e0 ch\\u1ea5t l\\u01b0\\u1ee3ng h\\u00e0ng \\u0111\\u1ea7u t\\u1ea1i Vi\\u1ec7t Nam. \"},{\"child_key\":\"image\",\"child_label\":\"Ch\\u1ecdn hinh anh\",\"child_type\":\"image\",\"child_value\":\"53\"}],[{\"child_key\":\"sub_title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"T\\u00f4n ch\\u1ec9 ho\\u1ea1t \\u0111\\u1ed9ng\"},{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"Gi\\u1eef tr\\u1ecdn ch\\u1eef t\\u00edn\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Cung c\\u1ea5p cho kh\\u00e1ch h\\u00e0ng nh\\u1eefng s\\u1ea3n ph\\u1ea9m ch\\u00ednh h\\u00e3ng, c\\u00f3 gi\\u00e1 tr\\u1ecb th\\u1ea9m m\\u1ef9 v\\u00e0 th\\u1eddi gian cao, ph\\u1ee5c v\\u1ee5 kh\\u00e1ch h\\u00e0ng m\\u1ed9t c\\u00e1ch t\\u1eadn t\\u00e2m v\\u00e0 chuy\\u00ean nghi\\u1ec7p.\"},{\"child_key\":\"image\",\"child_label\":\"Ch\\u1ecdn hinh anh\",\"child_type\":\"image\",\"child_value\":\"34\"}]]', NULL, '2023-04-26 17:34:50'),
(177, 3, 'title_sec_3', 'Tiêu đề section 3', 'text', 'SỨ MỆNH', NULL, NULL),
(178, 3, 'bg_title_sec_3', 'Tiêu đề ẩn section 3', 'text', 'MISSION', NULL, NULL),
(179, 3, 'bg_img_sec_3', 'Ảnh nền section 3', 'image', '16', NULL, '2023-03-17 03:57:27'),
(180, 3, 'content_sec_3', 'Nội dung section 3', 'repeater', '[[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"TI\\u1ec6N L\\u1ee2I\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"13\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"\\u0110\\u1ed8I NG\\u0168 NH\\u00c2N VI\\u00caN\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"14\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"S\\u1ea2N PH\\u1ea8M M\\u1edaI NH\\u1ea4T\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"15\"}]]', NULL, '2023-03-17 04:56:36'),
(181, 3, 'title_sec_4', 'Tiêu đề section 4', 'text', 'LÝ DO CHỌN', NULL, '2023-04-26 17:40:27'),
(182, 3, 'bg_title_sec_4', 'Tiêu đề ẩn section 4', 'text', 'WHY', NULL, NULL),
(183, 3, 'des_sec_4', 'Mô tả section 4', 'text', 'Chúng tôi có nhiều ưu điểm vượt trội so với các web site khác. S Watch có nhiều mẫu đồng hồ đẹp và chất lượng, từ các thương hiệu nổi tiếng như Casio, Orient, Citizen, Tissot... đến các thương hiệu mới và độc đáo. S Watch có giá cả cạnh tranh và nhiều ưu đãi hấp dẫn. S Watch có dịch vụ giao hàng nhanh chóng và an toàn, có chế độ bảo hành và đổi trả linh hoạt. Vì vậy Watch là sự lựa chọn tốt nhất cho những ai yêu thích đồng hồ.', NULL, '2023-04-26 17:40:04'),
(184, 3, 'content_sec_4', 'Nội dung section 4', 'repeater', '[[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"TI\\u1ec6N L\\u1ee2I\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"13\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"\\u0110\\u1ed8I NG\\u0168 NH\\u00c2N VI\\u00caN\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"14\"}],[{\"child_key\":\"title\",\"child_label\":\"Nh\\u1eadp ti\\u00eau \\u0111\\u1ec1\",\"child_type\":\"text\",\"child_value\":\"S\\u1ea2N PH\\u1ea8M M\\u1edaI NH\\u1ea4T\"},{\"child_key\":\"content\",\"child_label\":\"Nh\\u1eadp n\\u1ed9i dung\",\"child_type\":\"text\",\"child_value\":\"Giao di\\u1ec7n \\u0111\\u01a1n gi\\u1ea3n, th\\u00e2n thi\\u1ec7n v\\u00e0 th\\u00f4ng minh. Nh\\u00e2n vi\\u00ean ch\\u1ec9 m\\u1ea5t 15 ph\\u00fat l\\u00e0m quen \\u0111\\u1ec3 b\\u00e1n h\\u00e0ng.\"},{\"child_key\":\"icon\",\"child_label\":\"Ch\\u1ecdn icon\",\"child_type\":\"image\",\"child_value\":\"15\"}]]', NULL, '2023-03-17 04:56:36'),
(185, 2, 'banner_image_detail', 'Chọn ảnh banner cho trang chi tiết', 'image', '80', NULL, '2023-04-04 08:47:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'news-list', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(2, 'news-category', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(3, 'news-comment', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(4, 'product-list', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(5, 'product-category', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(6, 'product-brand', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(7, 'product-comment', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(8, 'order', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(9, 'form-contact', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(10, 'media', 'web', '2023-03-25 03:05:30', '2023-03-25 03:05:30'),
(11, 'edit-articles', 'web', '2023-04-27 02:18:07', '2023-04-27 02:18:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `pr_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `images` varchar(500) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `bought` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `contents` text NOT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `price_pay` int(11) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `brand_id`, `pr_category_id`, `name`, `slug`, `images`, `view`, `quantity`, `bought`, `description`, `contents`, `keywords`, `price`, `discount`, `price_pay`, `sku`, `appear`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Doxa D154TWH', 'doxa-d154twh', '[105,176,177,178,179]', 0, 20, 0, '<p>Mẫu Doxa D154TWH phi&ecirc;n bản giới hạn 1000 chiếc tr&ecirc;n to&agrave;n thế giới, sự kết hợp c&aacute;ch điệu giữa c&aacute;c vạch số c&ugrave;ng chữ số la m&atilde; được mạ v&agrave;ng sang trọng, điểm nhấn với nền mặt số Skeleton lộ</p>', '<p><strong>Thương Hiệu:</strong>&nbsp;Doxa (Phiên Bản Giới Hạn 1000 Chiếc Trên Toàn Thế Giới)</p><p><strong>Số Hiệu Sản Phẩm:</strong>&nbsp;<a href=\"https://donghohaitrieu.com/san-pham/doxa-d154twh-nam-kinh-sapphire-handwinding-len-cot-bang-tay-day-da\">D154TWH</a>&nbsp;–&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/doxa-grandemetre-d154-tuyet-tac-dong-ho-skeleton-len-day-thu-cong.html\"><strong>Giới Thiệu Chi Tiết</strong></a></p><p><strong>Xuất Xứ:</strong>&nbsp;Thụy Sỹ</p><p><strong>Giới Tính:</strong>&nbsp;Nam</p><p><strong>Kính:</strong>&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/toan-bo-su-that-ve-mat-kinh-sapphire-cua-dong-ho.html\">Sapphire</a>&nbsp;(Kính Chống Trầy)</p><p><strong>Máy:</strong>&nbsp;Handwinding (Lên Cót Bằng Tay)</p><p><strong>Bảo Hành Quốc Tế:</strong>&nbsp;2 Năm</p><p><strong>Bảo Hành Tại Hải Triều:</strong>&nbsp;<strong>4 Năm –&nbsp;</strong><a href=\"https://donghohaitrieu.com/chinh-sach-bao-hanh-cua-dong-ho-hai-trieu\"><strong>RED Guarantee</strong></a></p><p><strong>Đường Kính Mặt Số:</strong>&nbsp;40 mm</p><p><strong>Bề Dày Mặt Số:</strong>&nbsp;11.2 mm</p><p><strong>Niềng:</strong>&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/thep-khong-gi-316l-la-gi-tai-sao-duoc-su-dung-trong-che-tac-dong-ho.html\">Thép Không Gỉ</a></p><p><strong>Dây Đeo:</strong>&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/tat-tan-tat-ve-day-da-dong-ho-tai-thi-truong-viet-nam.html\">Dây Da Chính Hãng</a></p><p><strong>Màu Mặt Số:</strong>&nbsp;Trắng</p><p><strong>Chống Nước:</strong>&nbsp;<a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/giai-dap-dong-ho-chong-nuoc-3atm-co-tam-duoc-khong.html\">3 ATM</a></p><p><strong>Chức Năng:</strong></p><p><a href=\"https://donghohaitrieu.com/tin-tuc/dong-ho/noi-san-xuat-dong-ho-deo-tay-cua-cac-thuong-hieu-noi-tieng.html\"><strong>Nơi sản xuất</strong></a><strong>:</strong>&nbsp;Thụy Sỹ</p><p><strong>Thông Số Đặc Biệt:</strong>&nbsp;Tần Số Dao Động 28.800VPH, 17 Chân Kính, Trữ Cót 42 Giờ</p>', 'Đồng hồ, Đồng hồ cơ, Đồng hồ S Watch, Đồng hồ nam, Đồng hồ hiện đại, Đồng hồ da', 10000000, 1, 9900000, 'PROD-20230412091129', 1, '2023-03-21 03:08:33', '2023-04-26 11:06:20'),
(4, 1, 1, 'DOXA EXECUTIVE HOMME D211SSV', 'doxa-executive-homme-d211ssv-2', '[102,121,122,123]', 0, 20, 0, 'Mạnh mẽ đầy quyền lực với mẫu D211SSV mang tr&ecirc;n m&igrave;nh một vẻ ngo&agrave;i giản dị của chiếc đồng hồ 3 kim ẩn chứa b&ecirc;n dưới mặt k&iacute;nh Sapphire với thiết kế độc đ&aacute;o &ocirc; ch&acirc;n k&iacute;nh ph&ocirc; diễn ra 1 phần của bộ m&aacute;y cơ đậm chất nam t&iacute;nh đến từ thương hiệu Doxa', '<p>Thương Hiệu: Doxa Số Hiệu Sản Phẩm: D211SSV Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Automatic (Tự Động) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 41 mm Bề Dày Mặt Số: 11 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Chống Nước: 10 ATM Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Tần Số Dao Động 28.800VPH, 26 Chân Kính, Trữ Cót 38 Giờ</p>', 'Đồng hồ nam, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang', 8000000, 2, 7840000, 'PROD-20230426154114', 1, '2023-03-21 04:23:59', '2023-04-26 08:41:14'),
(5, 1, 1, 'DOXA D224RGY', 'doxa-d224rgy', '[104,182,180,181,183]', 0, 20, 0, '<p>Mẫu Doxa D224RGY phi&ecirc;n bản lịch l&atilde;m với bộ d&acirc;y da tạo h&igrave;nh v&acirc;n c&aacute; sấu, vẻ ngo&agrave;i thời trang tone m&agrave;u v&agrave;ng hồng tr&ecirc;n cọc vạch số được tạo h&igrave;nh mỏng trẻ trung.</p>', '<p>Thương Hiệu: Doxa Số Hiệu Sản Phẩm: D224RGY Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Automatic (Tự Động) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 41 mm Bề Dày Mặt Số: 11 mm Niềng: Thép Không Gỉ Dây Đeo: Dây Da Chính Hãng Màu Mặt Số: Đen Chống Nước: 5 ATM Chức Năng: Lịch Ngày</p>', NULL, 10000000, 10, 9000000, 'PROD-20230412091228', 1, '2023-03-21 04:28:51', '2023-04-12 02:12:28'),
(6, 1, 1, 'DOXA EXECUTIVE D220SSV', 'doxa-executive-d220ssv', '[99,124,125,126]', 0, 20, 0, 'Mẫu Doxa D220SSV phiên bản kim cương sang trọng đính trên mặt số họa tiết size 41mm, đơn giản trẻ trung với kiểu dáng 3 kim mạ vàng hồng tone màu thời trang.', '<p>Thương Hiệu: Doxa Số Hiệu Sản Phẩm: D220SSV Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Automatic (Tự Động) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 41 mm Bề Dày Mặt Số: 11 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Chống Nước: 5 ATM Chức Năng: Lịch Ngày Thông Số Đặc Biệt: Đính 14 Viên Kim Cương, 26 Chân Kính, Trữ Cót 38 Giờ</p>', 'Đồng hồ nam, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang', 7560000, 5, 7182000, 'PROD-20230412224434', 1, '2023-03-21 04:37:11', '2023-04-12 15:44:34'),
(16, 1, 1, 'DOXA EXECUTIVE', 'doxa-executive-2', '[172,174,173,175]', 0, 20, 0, 'Tuy trình làng từ khá sớm, khoảng từ những năm 1889, thế nhưng cái tên Doxa thực sự chỉ mới du nhập vào Việt Nam trong thời gian gần đây, chính vì thế mà không tránh khỏi việc nhiều người chưa biết đến thương hiệu này.', '<p>Tuy trình làng từ khá sớm, khoảng từ những năm 1889, thế nhưng cái tên Doxa thực sự chỉ mới du nhập vào Việt Nam trong thời gian gần đây, chính vì thế mà không tránh khỏi việc nhiều người chưa biết đến thương hiệu này. Theo đó, Doxa là một trong những hãng sản xuất đồng hồ danh giá và chính thống của Thụy Sỹ, có lịch sử phát triển hơn 130 năm và cũng là cái tên đi đầu trong việc sử dụng kim cương thật lên đồng hồ đeo tay.</p>', NULL, 10000000, 20, 8000000, 'PROD-20230425114504', 1, '2023-03-21 05:37:10', '2023-04-25 04:45:04'),
(17, 1, 1, 'DOXA D201RSV', 'doxa-d201rsv', '[98,169,170,171]', 0, 20, 0, '<p>Mẫu Doxa D201RSV vẻ ngoài sang trọng với mẫu vạch số tạo hình mỏng mang lại sự tinh tế dành cho phái mạnh đầy nổi bật khi các chi tiết kim chỉ được phủ tông vàng hồng trẻ trung đầy cuốn hút.</p>', '<p>Thương Hiệu: Doxa Số Hiệu Sản Phẩm: D201RSV Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 40 mm Bề Dày Mặt Số: 6.7 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Chống Nước: 5 ATM Chức Năng: Nơi sản xuất: Thụy Sỹ</p>', NULL, 10000000, 1, 9900000, 'PROD-20230412085710', 1, '2023-03-21 05:41:44', '2023-04-12 01:57:10'),
(18, 2, 1, 'TISSOT T109.610.11.077.00', 'tissot-t109-610-11-077-00', '[83]', 0, 20, 0, 'Mẫu Tissot T109.610.11.077.00 phiên bản dây đeo kim loại mạ bạc sang trọng kiểu dáng thời trang nam tính, nền cọc số học trò nhỏ tạo nét mỏng cách tân trên nền kính Sapphire.', '<p>Thương Hiệu Tissot Số Hiệu Sản Phẩm T109.610.11.077.00 Xuất Xứ Thụy Sỹ Giới Tính Nam Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 2 Năm Bảo Hành Tại Hải Triều 4 Năm – RED Guarantee Đường Kính Mặt Số 42 mm Bề Dày Mặt Số 6.45 mm Niềng Thép Không Gỉ Dây Đeo Thép Không Gỉ Màu Mặt Số Đen Chống Nước 3 ATM Chức Năng Nơi sản xuất Thụy Sỹ</p>', 'Đồng hồ nam, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang', 9000000, 2, 8820000, 'PROD-20230412224458', 1, '2023-03-21 05:43:50', '2023-04-12 15:44:58'),
(19, 2, 1, 'TISSOT TRADITION T063.617.36.037.00', 'tissot-tradition-t063-617-36-037-00', '[94,166,167,168]', 0, 20, 0, '<p>Đồng hồ Tissot T063.617.36.037.00 c&oacute; niềng kim loại bo tr&ograve;n tinh tế quanh nền số m&agrave;u trắng trang nh&atilde;, kim chỉ v&agrave; vạch số được d&aacute;t mỏng tinh tế, d&acirc;y đeo da m&agrave;u n&acirc;u c&oacute; v&acirc;n đem lại phong c&aacute;ch thời trang mang vẻ lịch l&atilde;m, nam t&iacute;nh.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T063.617.36.037.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 42 mm Bề Dày Mặt Số: 11.07 mm Niềng: Thép Không Gỉ Dây Đeo: Dây Da Chính Hãng Màu Mặt Số: Trắng Chống Nước: 3 ATM Chức Năng: Lịch Ngày – Chronograph Nơi sản xuất (Tùy từng lô hàng): Thụy Sỹ Thông Số Đặc Biệt: Máy ETA G10.211, 4 Chân Kính, Mạ Vàng Hồng PVD , Da Bò Vân Cá Sấu</p>', NULL, 10000000, 1, 9900000, 'PROD-20230412085416', 1, '2023-03-21 05:47:17', '2023-04-12 01:54:16'),
(20, 2, 1, 'TISSOT PR 100 T101.417.23.061.00', 'tissot-pr-100-t101-417-23-061-00', '[97,119,120,113]', 0, 20, 0, '<p>Phong cách thể thao kiểu dáng 6 kim cùng chức năng bấm giờ Chronograph đầy nam tính trên nền mặt kính Sapphire, không kém phần sang trọng đến từ thương hiệu Tissot dành cho mẫu đồng hồ T101.417.23.061.00 với mẫu kim chỉ cùng vạch số vàng hồng.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T101.417.23.061.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 41 mm Bề Dày Mặt Số: 10.7 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Đen Chống Nước: 10 ATM Chức Năng: Lịch Ngày – Chronograph Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Máy ETA G10.211, 4 Chân Kính, Mạ Vàng Hồng PVD</p>', NULL, 10000000, 12, 8800000, 'PROD-20230412085308', 1, '2023-03-21 05:54:17', '2023-04-12 01:53:08'),
(21, 2, 1, 'TISSOT T101.410.26.031.00', 'tissot-t101-410-26-031-00', '[118,165,116,117]', 0, 20, 0, '<p>Đồng&nbsp; hồ Tissot T101.410.26.031.00 có kiểu dáng cổ điển khi mặt số tròn kết hợp cùng dây đeo da màu nâu có vân lịch lãm, kim chỉ phản quang cùng vạch số màu đồng nổi bật trên nền số màu trắng sang trọng, còn có ô lịch ngày vị trí 6h, tạo nên phụ kiện thời trang.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T101.410.26.031.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 39 mm Bề Dày Mặt Số: 9 mm Niềng: Thép Không Gỉ Dây Đeo: Dây Da Chính Hãng Màu Mặt Số: Trắng Chống Nước: 10 ATM Chức Năng: Lịch Ngày Nơi sản xuất: Thụy Sỹ</p>', NULL, 12323492, 21, 9735559, 'PROD-20230412085213', 1, '2023-03-21 05:56:13', '2023-04-12 01:52:13'),
(22, 2, 1, 'TISSOT BRIDGEPORT T097.410.11.038.00', 'tissot-bridgeport-t097-410-11-038-00', '[96,163,162,164]', 0, 20, 0, '<p>Đồng hồ Tissot T097.410.11.038.00 có vỏ và dây đeo kim loại bằng chất liệu thép không gỉ mạ bạc sáng bóng, nền số màu xám trang nhã, kim chỉ và vạch số được dát mỏng tinh tế nổi bật.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T097.410.11.038.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 40 mm Bề Dày Mặt Số: 8.64 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Xám Chống Nước: 5 ATM Chức Năng: Lịch Ngày Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Máy ETA F06.111, 3 Chân Kính, Chỉ Báo Tuổi Thọ Pin</p>', NULL, 10000000, 25, 7500000, 'PROD-20230412084625', 1, '2023-03-21 06:29:21', '2023-04-12 01:46:25'),
(23, 2, 1, 'TISSOT TRADITION T063.610.22.037.00', 'tissot-tradition-t063-610-22-037-00', '[95,161,160,159,158]', 0, 20, 0, '<p>Với niềng đồng hồ Tissot T063.610.22.037.00 bằng kim loại thép không gỉ mạ bạc, kim chỉ và gạch số được phủ vàng tinh tế trên nền trắng mặt số tròn cổ điển.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T063.610.22.037.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 42 mm Bề Dày Mặt Số: 7.47 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Chống Nước: 3 ATM Chức Năng: Lịch Ngày Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Máy ETA F06.111, 3 Chân Kính, Chỉ Báo Tuổi Thọ Pin, Mạ Vàng PVD</p>', NULL, 98700000, 21, 77973000, 'PROD-20230412084439', 1, '2023-03-21 06:30:42', '2023-04-12 01:44:39'),
(25, 2, 1, 'TISSOT TRADITION T063.907.36.038.00', 'tissot-tradition-t063-907-36-038-00', '[94,157,156,155,154]', 0, 20, 0, '<p>Mẫu Tissot T063.907.36.038.00 dưới mặt kính Sapphire nổi bật với nền mặt số thiết kế chân kính lộ ra 1 phần của bộ máy cơ mang đậm nét tinh tế, nổi bật với vỏ máy bằng thép không gỉ mạ màu vàng hồng đầy sang trọng.</p>', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T063.907.36.038.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Automatic (Tự Động) Thời Gian Trữ Cót: 80 Giờ Tần Số Dao Động: 21600 vph Chân Kính: 25 Viên Lên Dây Thủ Công: Có Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 40 mm Bề Dày Mặt Số: 9.4 mm Niềng: Thép Không Gỉ Dây Đeo: Dây Da Chính Hãng Màu Mặt Số: Trắng Chống Nước: 3 ATM Tính Năng: Open Heart – Guilloché Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Kiểu Powermatic 80.601, Thời Gian Trữ Cót 80 Giờ, 23 Chân Kính, Da Bò Vân Cá Sấu, Mạ Vàng Hồng PVD</p>', NULL, 10000000, 22, 7800000, 'PROD-20230412005356', 1, '2023-03-21 06:34:22', '2023-04-11 17:53:56'),
(26, 2, 1, 'TISSOT LE LOCLE T006.407.11.033.00', 'tissot-le-locle-t006-407-11-033-00', '[93,153,152,151,150]', 0, 20, 0, 'Mẫu Tissot T006.407.11.033.00 nền cọc số la mã tạo hình mỏng trên nền mặt số trắng thiết kế họa tiết Guilloche.', '<p>Thương Hiệu: Tissot Số Hiệu Sản Phẩm: T006.407.11.033.00 Xuất Xứ: Thụy Sỹ Giới Tính: Nam Kính: Sapphire (Kính Chống Trầy) Máy: Automatic (Tự Động) Thời Gian Trữ Cót: 80 Giờ Tần Số Dao Động: 21600 vph Chân Kính: 23 Viên Lên Dây Thủ Công: Có Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 4 Năm – RED Guarantee Đường Kính Mặt Số: 39.3 mm Bề Dày Mặt Số: 9.8 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Chống Nước: 3 ATM Chức Năng: Lịch Ngày Tính Năng: Hacking Second – Guilloché Nơi sản xuất: Thụy Sỹ Thông Số Đặc Biệt: Máy Powermatic 80.111, Thời Gian Trữ Cót 80 Giờ, 23 Chân Kính</p>', 'Đồng hồ nam, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang', 9250000, 12, 8140000, 'PROD-20230412224514', 1, '2023-03-21 06:35:38', '2023-04-12 15:45:14'),
(27, 3, 2, 'SAGA 53555-SVMWSV-2', 'saga-53555-svmwsv-2', '[100,108,109,110]', 0, 20, 0, 'Mẫu Saga 53555-SVMWSV-2 phiên bản mạ bạc thời trang với nền mặt số xà cừ size 22mm nổi bật thiết kế đính pha lê Swarovski kết hợp cùng bộ dây đeo tay kiểu dây lắc.', '<p>Thương Hiệu: Saga Số Hiệu Sản Phẩm: 53555 SVMWSV-2 Xuất Xứ: Mỹ Giới Tính: Nữ Kính: Mineral Crystal (Kính Cứng) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 5 Năm Đường Kính Mặt Số: 22.5 mm Bề Dày Mặt Số: mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Xà Cừ Chống Nước: 3 ATM Tính Năng: Đính Đá Swarovski Nơi sản xuất (Tùy từng lô hàng): Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 5244000, 1, 5191560, 'PROD-20230412224610', 1, '2023-03-21 21:56:17', '2023-04-12 15:46:10'),
(28, 3, 2, 'SAGA CHARM 53229-RGMWRG-5', 'saga-charm-53229-rgmwrg-5', '[92,114,115,91]', 0, 20, 0, 'Mẫu Saga 53229-RGMWRG-5 phiên bản dây đeo vòng Charm được phối tone màu vàng hồng kết hợp với nền mặt số trắng xà cừ kích thước 20mm tròn nhỏ nữ tính.', '<p>hương Hiệu Saga Số Hiệu Sản Phẩm 53229-RGMWRG-5 Xuất Xứ Mỹ Giới Tính Nữ Kính Mineral Crystal (Kính Cứng) Máy Quartz (Pin) Bảo Hành Quốc Tế 2 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 20 mm Bề Dày Mặt Số 7 mm Niềng Thép Không Gỉ Dây Đeo Thép Không Gỉ Màu Mặt Số Trắng Xà Cừ Chống Nước 3 ATM Chức Năng Nơi sản xuất (Tùy từng lô hàng) Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 7120000, 1, 7048800, 'PROD-20230412224638', 1, '2023-03-21 21:57:29', '2023-04-12 15:46:38'),
(29, 3, 2, 'SAGA CHARM 53229-SVMWSV-4', 'saga-charm-53229-svmwsv-4', '[91,115,114,92]', 0, 20, 0, 'Mẫu Saga 53229-SVMWSV-4 phi&ecirc;n bản d&acirc;y đeo v&ograve;ng Charm được phối tone m&agrave;u bạc thời trang kết hợp với nền mặt số trắng x&agrave; cừ k&iacute;ch thước 20mm tr&ograve;n nhỏ nữ t&iacute;nh.', '<p>Thương Hiệu: Saga Số Hiệu Sản Phẩm: 53229-SVMWSV-4 Xuất Xứ: Mỹ Giới Tính: Nữ Kính: Mineral Crystal (Kính Cứng) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 5 Năm Đường Kính Mặt Số: 20 mm Bề Dày Mặt Số: 7 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Xà Cừ Chống Nước: 3 ATM Chức Năng: Nơi sản xuất (Tùy từng lô hàng): Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 6384000, 23, 4915680, 'PROD-20230412224650', 1, '2023-03-21 21:59:12', '2023-04-12 15:46:50'),
(30, 3, 2, 'SAGA 53442-GPMWGP-2A', 'saga-53442-gpmwgp-2a', '[90,130,129,128]', 0, 20, 0, 'Mẫu Saga 53442-GPMWGP-2A phi&ecirc;n bản 12 vi&ecirc;n đ&aacute; pha l&ecirc; Swarovski đ&iacute;nh tương ứng với 12 m&uacute;i giờ tạo n&ecirc;n vẻ đẹp thời trang sang trọng tr&ecirc;n nền mặt số size 24mm tone m&agrave;u x&agrave; cừ.', '<p>Thương Hiệu Saga Số Hiệu Sản Phẩm 53442-GPMWGP-2A Xuất Xứ Mỹ Giới Tính Nữ Kính Mineral Crystal (Kính Cứng) Máy Quartz (Pin) Bảo Hành Quốc Tế 2 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 24.5 mm Bề Dày Mặt Số 8 mm Niềng Thép Không Gỉ Dây Đeo Thép Không Gỉ Màu Mặt Số Trắng Xà Cừ Chống Nước 3 ATM Chức Năng Nơi sản xuất (Tùy từng lô hàng) Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ mạ vàng, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 5920000, 25, 4440000, 'PROD-20230412224711', 1, '2023-03-21 22:00:15', '2023-04-12 15:47:11'),
(31, 3, 2, 'SAGA 80737-RGMRRG-2L', 'saga-80737-rgmrrg-2l', '[89,133,132,131,134]', 0, 20, 0, 'Mẫu Saga 80737-RGMRRG-2L mặt số vu&ocirc;ng tone m&agrave;u đỏ x&agrave; cừ kết hợp c&ugrave;ng thiết kế đơn giản 2 kim thời trang trẻ trung cho ph&aacute;i đẹp.', '<p>Thương Hiệu Saga Số Hiệu Sản Phẩm 80737-RGMRRG-2L Xuất Xứ Mỹ Giới Tính Nữ Kính Mineral Crystal (Kính Cứng) Máy Quartz (Pin) Bảo Hành Quốc Tế 2 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 20 mm Bề Dày Mặt Số 7 mm Niềng Thép Không Gỉ Dây Đeo Thép Không Gỉ Màu Mặt Số Đỏ Chống Nước 3 ATM Chức Năng Nơi sản xuất (Tùy từng lô hàng) Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 5624000, 12, 4949120, 'PROD-20230412224737', 1, '2023-03-21 22:01:25', '2023-04-12 15:47:37'),
(32, 3, 2, 'SAGA 53768-GPZSVGP-2', 'saga-53768-gpzsvgp-2', '[88,137,136,135]', 0, 20, 0, 'Mẫu Saga 53768-GPZSVGP-2 mặt số trắng phiên bản tone màu xà cừ thời trang sang trọng với thiết kế đính các viên đá pha lê xung quanh trên phần vỏ viền đồng hồ.', '<p>Thương Hiệu: Saga Số Hiệu Sản Phẩm: 53768 GPZSVGP-2 Xuất Xứ: Mỹ Giới Tính: Nữ Kính: Mineral Crystal (Kính Cứng) Máy: Quartz (Pin) Bảo Hành Quốc Tế: 2 Năm Bảo Hành Tại Hải Triều: 5 Năm Đường Kính Mặt Số: 30 mm Bề Dày Mặt Số: 8 mm Niềng: Thép Không Gỉ Dây Đeo: Thép Không Gỉ Màu Mặt Số: Trắng Xà Cừ Chống Nước: 3 ATM Chức Năng: Nơi sản xuất (Tùy từng lô hàng): Trung Quốc</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 7920000, 21, 6256800, 'PROD-20230412224749', 1, '2023-03-21 22:02:44', '2023-04-12 15:47:49'),
(33, 4, 2, 'SOKOLOV 140.01.71.000.02.01.2', 'sokolov-140-01-71-000-02-01-2', '[87,147,139,148]', 0, 20, 0, '<p>Mẫu Sokolov 140.01.71.000.02.01.2 phiên bản sang trọng với 12 viên kim cương được đính tương ứng với 12 múi giờ tạo nên điểm nhấn nổi bật trên nền mặt số với kích thước 31mm.</p>', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 140.01.71.000.02.01.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 31 mm Bề Dày Mặt Số mm Niềng Thép Không Gỉ Dây Đeo Thép Không Gỉ Màu Mặt Số Trắng Xà Cừ Chống Nước 5 ATM</p>', NULL, 10000000, 22, 7800000, 'PROD-20230412005002', 1, '2023-03-22 04:20:57', '2023-04-11 17:50:02'),
(34, 4, 2, 'SOKOLOV 153.30.00.001.06.01.2', 'sokolov-153-30-00-001-06-01-2', '[86,149]', 0, 20, 0, '<p>Mẫu Sokolov 153.30.00.001.06.01.2 phiên bản thiết kế siêu mỏng với phần vỏ máy pin chỉ dày 4.9mm, kim chỉ mỏng được phối tone màu vàng hồng làm nổi bật trên nền mặt số trắng xà cừ.</p>', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 153.30.00.001.06.01.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 35.6 mm Bề Dày Mặt Số 4.9 mm Niềng Bạc 925 Dây Đeo Dây Da Chính Hãng Màu Mặt Số Trắng Xà Cừ Chống Nước 3 ATM</p>', NULL, 10000000, 21, 7900000, 'PROD-20230412005127', 1, '2023-03-22 04:22:25', '2023-04-11 17:51:27'),
(35, 4, 2, 'SOKOLOV 155.30.00.000.01.02.2', 'sokolov-155-30-00-000-01-02-2', '[85,138,139]', 0, 20, 0, 'Mẫu Sokolov 155.30.00.000.01.02.2 phiên bản nền cọc số la mã được tạo hình cách điệu thời trang nữ tính trên nền mặt số với kích thước 24mm được phối tone màu trắng xà cừ.', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 155.30.00.000.01.02.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 24 mm Bề Dày Mặt Số 6.1 mm Niềng Bạc 925 Dây Đeo Dây Da Chính Hãng Màu Mặt Số Trắng Xà Cừ Chống Nước 3 ATM</p>', 'Đồng hồ nam, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ kim loại, Đồng hồ đeo tay, Đồng hồ thời trang', 6170000, 10, 5553000, 'PROD-20230412224820', 1, '2023-03-22 04:23:47', '2023-04-12 15:48:20'),
(36, 4, 2, 'SOKOLOV 136.30.00.000.03.01.2', 'sokolov-136-30-00-000-03-01-2', '[84,144,145,146]', 0, 20, 0, '<p>Mẫu Sokolov 136.30.00.000.03.01.2 phiên bản nổi bật 12 viên pha lê được đính tương ứng với 12 múi giờ tạo nên thiết kế sang trọng trên nền mặt số kích thước 30mm.</p>', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 136.30.00.000.03.01.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 30 mm Bề Dày Mặt Số 6.3 mm Niềng Bạc 925 Dây Đeo Dây Da Chính Hãng Màu Mặt Số Trắng Chống Nước 3 ATM</p>', NULL, 10000000, 25, 7500000, 'PROD-20230412004912', 1, '2023-03-22 04:26:43', '2023-04-11 17:49:12'),
(37, 4, 2, 'SOKOLOV 127.30.00.001.01.01.2', 'sokolov-127-30-00-001-01-01-2', '[83,143,139]', 0, 15, 5, 'Mẫu Sokolov 127.30.00.001.01.01.2 thiết kế nổi bật với tính năng Chronograph (đo thời gian) tạo nên kiểu dáng đồng hồ 6 kim hiện thị trên nền mặt số trắng với kích thước lớn 37mm.', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 127.30.00.001.01.01.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 37 mm Bề Dày Mặt Số 9.4 mm Niềng Bạc 925 Dây Đeo Dây Da Chính Hãng Màu Mặt Số Trắng Chống Nước 3 ATM Chức Năng Lịch Ngày – Chronograph</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ da, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 9000000, 22, 7020000, 'PROD-20230412224840', 1, '2023-03-22 04:28:14', '2023-04-26 15:27:59'),
(38, 4, 2, 'SOKOLOV 156.30.00.000.05.01.2', 'sokolov-156-30-00-000-05-01-2', '[82]', 0, 20, 0, 'Mẫu Sokolov 156.30.00.000.05.01.2 với thiết kế cọc số la mã tại vị trí 12 giờ được tạo hình họa tiết uốn lượn tạo nên điểm nhấn nổi bật trên nền mặt số được phối tone màu đen xà cừ.', '<p>Thương Hiệu Sokolov Số Hiệu Sản Phẩm 156.30.00.000.05.01.2 Xuất Xứ Nga Giới Tính Nữ Kính Sapphire (Kính Chống Trầy) Máy Quartz (Pin) Bảo Hành Quốc Tế 3 Năm Bảo Hành Tại Hải Triều 5 Năm Đường Kính Mặt Số 34 mm x 20 mm Bề Dày Mặt Số 7.45 mm Niềng Bạc 925 Dây Đeo Dây Da Chính Hãng Màu Mặt Số Đen Xà Cừ Chống Nước 3 ATM</p>', 'Đồng hồ nữ, Đồng hồ phong cách, Đồng hồ swatch, Swatch, Watches,  Đồng hồ da, Đồng hồ đeo tay, Đồng hồ thời trang, Đồng hồ dây mỏng', 6580000, 10, 5922000, 'PROD-20230412224858', 1, '2023-03-30 04:30:40', '2023-04-12 15:48:58'),
(109, 1, 1, 'Đồng hồ CITIZEN 40 mm Nam NH8391-51X', 'dong-ho-citizen-40-mm-nam-nh8391-51x', '[194]', 0, 0, 0, NULL, '<p>•&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-deo-tay-citizen\">Đồng hồ Citizen</a>&nbsp;đến từ xứ sở hoa anh đào - Nhật Bản. Mỗi dòng đồng hồ Citizen đều có&nbsp;kiểu thiết kế độc đáo, nhà sản xuất luôn cập nhật các xu hướng hiện đại nhưng vẫn duy trì được nét đặc trưng riêng của mỗi dòng sản phẩm từ trước đến nay. Mẫu đồng hồ này phù hợp với những ai thích sự thanh lịch và sang trọng.</p><p>• Đường kính mặt của mẫu&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-deo-tay/citizen-nh8391-51x-nam\">đồng hồ CITIZEN 40 mm Nam NH8391-51X</a>&nbsp;này là&nbsp;<strong>40 mm</strong>, độ rộng dây là&nbsp;<strong>20 mm</strong>.</p><p>• Khung viền và dây đeo&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-deo-tay\">đồng hồ</a>&nbsp;làm từ thép không gỉ 316L cứng cáp, bền bỉ và có khả năng chống chịu mọi thời tiết, chống oxi hoá.</p><p>• Khả năng chống nước của mẫu&nbsp;<a href=\"https://www.thegioididong.com/dong-ho-deo-tay-nam\">đồng hồ nam</a>&nbsp;này là&nbsp;<strong>5&nbsp;ATM</strong>, người dùng hoàn toàn có thể sử dụng khi đi tắm, đi mưa. Không nên sử dụng khi đi bơi, lặn.</p><p>• Lịch ngày và lịch thứ được tích hợp ngay trên mặt đồng hồ khiến người dùng nắm bắt thời gian một cách thuận tiện. Kim dạ quang giúp người dùng theo dõi thời gian trong bóng tối dễ dàng hơn.</p>', NULL, 6800000, 1, 6732000, 'PROD-20230426221846', 1, '2023-04-26 14:51:26', '2023-04-26 15:18:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `description`, `keywords`, `image`, `appear`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Đồng hồ nam', 'dong-ho-nam', NULL, NULL, NULL, 1, 1, NULL, '2023-04-26 11:03:12'),
(2, 'Đồng hồ nữ', 'dong-ho-nu', NULL, NULL, NULL, 1, 2, NULL, NULL),
(3, 'Đồng hồ cơ', 'dong-ho-co', NULL, NULL, NULL, 1, 3, NULL, NULL),
(4, 'Đồng hồ điện tử', 'dong-ho-dien-tu', NULL, NULL, NULL, 1, 4, NULL, NULL),
(5, 'Đồng hồ trẻ em', 'dong-ho-tre-em', NULL, NULL, NULL, 1, 5, NULL, NULL),
(6, 'Đồng hồ cặp', 'dong-ho-cap', NULL, NULL, NULL, 1, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_comments`
--

CREATE TABLE `product_comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `appear` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_comments`
--

INSERT INTO `product_comments` (`id`, `product_id`, `user_id`, `message`, `appear`, `created_at`, `updated_at`) VALUES
(25, 38, 10, 'Đồng hồ này có thay mẫu dây khác được không?', 1, '2023-04-26 15:46:10', '2023-04-26 15:46:10'),
(26, 29, 10, 'Pin đồng hồ tuổi thọ bao lâu vậy shop?', 1, '2023-04-26 15:47:18', '2023-04-26 15:47:18'),
(27, 2, 10, 'Shop mình có nhận gói quà mẫu này không ạ?', 1, '2023-04-26 15:57:08', '2023-04-26 15:57:08'),
(28, 2, 9, 'Đồng hồ này có vô nước được không? Shop có nhận sửa chữa nếu hư hỏng không?', 1, '2023-04-26 15:58:07', '2023-04-26 15:58:07'),
(29, 35, 9, 'Cho mình hỏi mẫu này còn màu nào khác ngoài màu trằng không ko vậy shop?', 1, '2023-04-26 15:58:48', '2023-04-26 15:58:48'),
(30, 109, 9, 'Đồng hồ rất đẹp và chất lượng. Giao hàng nhanh và gói hàng cẩn thận. Nhân viên tư vấn nhiệt tình và thân thiện. Rất hài lòng với trang web này.', 1, '2023-04-26 15:59:11', '2023-04-26 15:59:11'),
(31, 31, 9, 'Mình là người thích sưu tầm đồng hồ. Mình đã mua nhiều đồng hồ từ nhiều trang web khác nhau nhưng trang web này là trang web mà mình tin tưởng nhất. Trang web có nhiều đồng hồ chính hãng, có giấy chứng nhận và bảo hành quốc tế. Trang web cũng có nhiều đồng hồ hiếm và độc đáo mà mình không thể tìm thấy ở nơi khác. Mình rất hạnh phúc khi mua hàng ở đây và sẽ tiếp tục ủng hộ trang web này.', 1, '2023-04-26 15:59:37', '2023-04-26 15:59:37'),
(32, 25, 9, 'Đồng hồ này có chống nước tốt ko vậy shop?', 1, '2023-04-26 16:00:24', '2023-04-26 16:00:24'),
(33, 22, 9, 'Tuổi thọ pin đồng hồ bao lâu vậy shop?', 1, '2023-04-26 16:02:51', '2023-04-26 16:02:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super-Admin', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(2, 'Admin', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(3, 'Product-Full', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(4, 'News-Full', 'web', '2023-03-25 03:05:29', '2023-03-25 03:05:29'),
(5, 'User', 'web', '2023-04-27 02:17:40', '2023-04-27 02:17:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(100) NOT NULL DEFAULT 'images/ava_default.png',
  `phone` varchar(10) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `ward` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `phone`, `province`, `district`, `ward`, `address`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Webadmin', 'beeswatch.online@gmail.com', '$2y$10$9zkx.QUDoDuuu56661sQKugSDvOOgoHylWR98CZGmU65e5TGp71WO', 'images/avatar/1682317027.jpg', '0854643848', 'Thành phố Hồ Chí Minh', 'Thành phố Thủ Đức', 'Phường Hiệp Bình Chánh', '62 đường 27', NULL, NULL, '2023-03-25 08:55:48', '2023-04-24 06:17:07'),
(2, 'Từ Nguyên Khôi', 'nguyenkhoi99899@gmail.com', '$2y$10$ovGkLqKiacUBYonTj9WiIeR.COttU7M3E5VQ4SjUhl8qag7GG0gUK', 'images/ava_default.png', '0854643848', 'Tỉnh Lâm Đồng', 'Huyện Đức Trọng', 'Xã Phú Hội', '49 QL20', NULL, NULL, '2023-03-25 08:54:02', '2023-04-02 05:10:53'),
(4, 'Webadmin', 'beeswatch.online@gmail.com2', '$2y$10$ce6Qk6eTZRpgpWnpHk/wrednDEzynoNYZFQUXwaVoQnRcFeUdGrFS', 'images/ava_default.png', '0854643848', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-25 03:04:37', '2023-03-25 03:04:37'),
(6, 'thuanne1231', 'ducthuanlk2222@gmail.com', '$2y$10$ZR8efWMaLLtQ7X10S868de2u4tLRQ9.0RkBxBN4.2CJ8PeKjqcoPK', 'images/ava_default.png', '0342309365', 'Thành phố Hồ Chí Minh', 'Quận Bình Thạnh', 'Phường 25', '1', NULL, NULL, '2023-04-11 04:43:38', '2023-04-11 04:45:19'),
(7, 'Duy Tân', 'tandd2604@gmail.com', '$2y$10$Ce7h/pUD7oOb.5CWnEgTe.T89481WwdfZo2fZTt96WUyNLrrcYKFK', 'images/ava_default.png', '0933843032', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-25 02:28:53', '2023-04-25 02:28:53'),
(8, 'banotangyn', 'bng.baongoc@gmail.com', '$2y$10$kuOeHRmU8AEmVfCnzUfbDOjN4uQZnUtZ4sWP.6cqaFKeFvCG7V8Oa', 'images/avatar/1682520819.jpg', '0982224440', 'Thành phố Hồ Chí Minh', 'Quận 7', 'Phường Tân Quy', '91 đường số 15', NULL, NULL, '2023-04-26 14:40:12', '2023-04-26 14:53:39'),
(9, 'Bảo Ngọc', 'baongocbngoc@gmail.com', '$2y$10$TMxt/prIizRXGdTyhYl9VOozW/fZ823BOXv1jPHit0fx0FhWzFGji', 'images/avatar/1682522238.jpg', '0966066281', 'Tỉnh Bình Dương', 'Thành phố Dĩ An', 'Phường Dĩ An', 'ktx khu b', NULL, NULL, '2023-04-26 15:15:30', '2023-04-26 15:17:18'),
(10, 'Khánh Linh', 'kalixjjk@gmail.com', '$2y$10$YymAgrPeF/zPBBmPIaz79.A96zdZmLOqXbY7UUu1qG7svItSGHxZ.', 'images/ava_default.png', '0963703763', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-26 15:35:17', '2023-04-26 15:35:17');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD UNIQUE KEY `brands_sort_unique` (`sort`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_name_unique` (`name`),
  ADD UNIQUE KEY `media_url_unique` (`url`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_categories_slug_unique` (`slug`),
  ADD UNIQUE KEY `news_categories_sort_unique` (`sort`);

--
-- Chỉ mục cho bảng `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_comments_news_id_foreign` (`news_id`),
  ADD KEY `news_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `page_meta`
--
ALTER TABLE `page_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_pr_category_id_foreign` (`pr_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_categories_slug_unique` (`slug`),
  ADD UNIQUE KEY `product_categories_sort_unique` (`sort`);

--
-- Chỉ mục cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comments_product_id_foreign` (`product_id`),
  ADD KEY `product_comments_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `page_meta`
--
ALTER TABLE `page_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `news_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_pr_category_id_foreign` FOREIGN KEY (`pr_category_id`) REFERENCES `product_categories` (`id`);

--
-- Các ràng buộc cho bảng `product_comments`
--
ALTER TABLE `product_comments`
  ADD CONSTRAINT `product_comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
