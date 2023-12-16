-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql213.infinityfree.com
-- Thời gian đã tạo: Th12 16, 2023 lúc 02:25 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `if0_35580029_bandoan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(30) NOT NULL,
  `coupon_type` int(11) NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `min_order` int(11) NOT NULL,
  `coupon_quantity` int(11) NOT NULL,
  `coupon_used` int(11) NOT NULL,
  `coupon_remain` int(11) NOT NULL,
  `coupon_expired` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`coupon_id`, `coupon_code`, `coupon_type`, `coupon_amount`, `min_order`, `coupon_quantity`, `coupon_used`, `coupon_remain`, `coupon_expired`) VALUES
(2, 'GIAMGIA10', 1, 10, 300000, 30, 11, 19, '2023-12-31'),
(3, 'GIAMGIA100K', 0, 100000, 1000000, 30, 5, 25, '2023-11-10'),
(4, 'GIAMGIA150K', 0, 150000, 500000, 30, 9, 21, '2023-11-09'),
(5, '', 0, 0, 0, 123125, 5, 123120, '2114-12-31'),
(6, 'GIAMGIATEST', 0, 120000, 1000000, 12, 5, 7, '2023-12-15'),
(10, 'GIAMGIA101K', 0, 100100, 100000, 5, 5, 0, '2024-11-02'),
(11, 'GIAMGIAT', 0, 120000, 1000000, 12, 2, 10, '2023-12-12'),
(12, 'GIAMGIA123', 0, 123000, 1230000, 15, 0, 15, '2023-11-12'),
(13, 'Giamgia10k', 0, 10000, 100000, 5, 2, 3, '2023-11-15'),
(14, 'Giam50k', 0, 50000, 100000, 5, 0, 5, '2023-11-15'),
(15, '2123', 0, 10000, 100000, 5, 0, 5, '2023-11-15'),
(20, 'GiamGia@#$10K', 0, 10000, 100000, 5, 0, 5, '2023-11-15'),
(19, '@#$', 0, 10000, 100000, 5, 0, 5, '2023-11-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons_type`
--

CREATE TABLE `coupons_type` (
  `coupon_type` int(11) NOT NULL,
  `type_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `coupons_type`
--

INSERT INTO `coupons_type` (`coupon_type`, `type_name`) VALUES
(0, 'Giảm theo số tiền'),
(1, 'Giảm theo tỉ lệ %');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `email_lists`
--

CREATE TABLE `email_lists` (
  `email_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `email_lists`
--

INSERT INTO `email_lists` (`email_id`, `email`, `created_at`) VALUES
(1, 'quangdz@gmail.com', '2023-12-15 11:16:29'),
(2, 'hoduyhoang@gmail.com', '2023-12-13 11:08:08'),
(3, 'aido@gmail.com', '2023-12-20 09:08:45'),
(4, 's@gmail.com', '2023-12-11 20:19:54'),
(5, 's@gmail.com', '2023-12-11 20:26:35'),
(6, 'quang@gmail.com', '2023-12-11 20:26:51'),
(7, 's22@gmail.com', '2023-12-11 21:06:37'),
(8, 's@gmail.com', '2023-12-12 10:38:01'),
(9, 's@gmail.com', '2023-12-12 16:22:25'),
(16, 'ssss@gmail.com', '2023-12-13 15:59:10'),
(11, 'asdasd@gmail.com', '2023-12-12 16:25:17'),
(12, '123123@gmail.com', '2023-12-12 16:25:36'),
(13, 'ssss@gmail.com', '2023-12-12 16:25:58'),
(14, 'asdasda@gmail.com', '2023-12-12 16:26:46'),
(15, 'batjky@gmail.com', '2023-12-13 13:23:45'),
(17, 'hoang@gmail.com', '2023-12-13 21:37:11'),
(18, 'duyhoang@gmail.com', '2023-12-17 00:26:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(18, 'Capple.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `coupon_discount` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `note` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `checkout` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address`, `phone`, `status`, `coupon_discount`, `total`, `note`, `checkout`, `created_at`) VALUES
(245, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 150000, 450000, '', 1, '2023-10-30 17:42:21'),
(244, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 660000, '', 1, '2023-10-30 17:41:36'),
(243, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 150000, 15000, '', 1, '2023-10-30 17:40:50'),
(242, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 150000, -50000, '', 0, '2023-10-30 17:25:32'),
(241, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 1, 20, 212000, '', 0, '2023-10-30 16:12:37'),
(240, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 1, 20, 376000, 'Chúc mừng sinh nhật', 1, '2023-10-30 16:11:26'),
(157, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 165000, '', 0, '2023-10-28 04:15:44'),
(158, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 120000, '', 0, '2023-10-28 04:17:30'),
(239, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 15000, 340000, '', 1, '2023-10-30 16:03:34'),
(238, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 20, 364000, '', 1, '2023-10-30 16:01:12'),
(237, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 20, 924000, '', 1, '2023-10-30 15:54:55'),
(236, 1, 'test', '0357369820', 1, 20, 308000, '', 1, '2023-10-30 14:57:59'),
(164, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 120000, '', 0, '2023-10-28 04:31:30'),
(165, 1, 'test', '0357369820', 1, 0, 165000, '', 0, '2023-10-28 04:33:48'),
(166, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 1200000, '', 1, '2023-10-28 04:35:46'),
(167, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 320000, '', 0, '2023-10-28 04:39:03'),
(168, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 355000, '', 0, '2023-10-28 06:44:03'),
(169, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 1, 0, 850000, '', 0, '2023-10-28 06:44:17'),
(170, 1, 'test', '0357369820', 1, 0, 550000, '', 0, '2023-10-28 06:45:00'),
(171, 1, 'test', '0357369820', 0, 0, 1550000, '', 1, '2023-10-28 06:56:01'),
(172, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 380000, '', 1, '2023-10-28 07:41:52'),
(173, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 190000, '', 1, '2023-10-28 07:44:48'),
(174, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 190000, '', 1, '2023-10-28 08:01:10'),
(175, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 190000, '', 1, '2023-10-28 08:04:00'),
(176, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 190000, '', 1, '2023-10-28 08:10:25'),
(177, 1, '15 An Nhon', '0935540795', 0, 0, 310000, '', 1, '2023-10-28 08:16:54'),
(178, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 190000, '', 1, '2023-10-28 08:17:55'),
(179, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 380000, '', 1, '2023-10-28 09:32:36'),
(180, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 355000, '', 1, '2023-10-29 03:24:10'),
(181, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 03:24:40'),
(182, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 165000, '', 1, '2023-10-29 03:29:24'),
(183, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 1, '2023-10-29 03:30:00'),
(184, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 03:31:15'),
(185, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 1200000, '', 0, '2023-10-29 03:32:32'),
(186, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 03:34:29'),
(187, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 100000, '', 0, '2023-10-29 03:35:56'),
(188, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 03:52:28'),
(189, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 1, '2023-10-29 03:53:16'),
(190, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 03:55:11'),
(191, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 04:12:05'),
(192, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 04:14:47'),
(193, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 04:15:27'),
(194, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 04:23:04'),
(195, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 165000, '', 0, '2023-10-29 04:26:09'),
(196, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 04:27:49'),
(197, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 1, '2023-10-29 04:31:24'),
(198, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 100000, '', 0, '2023-10-29 06:24:19'),
(199, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 06:27:52'),
(200, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 06:33:02'),
(201, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 1, '2023-10-29 06:36:33'),
(202, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 06:40:05'),
(203, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 310000, '', 0, '2023-10-29 06:45:42'),
(204, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 06:47:36'),
(205, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 07:18:21'),
(206, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 07:52:14'),
(207, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 310000, '', 0, '2023-10-29 08:01:47'),
(208, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 190000, '', 0, '2023-10-29 08:06:07'),
(209, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 08:07:42'),
(210, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 08:08:21'),
(211, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 08:10:41'),
(212, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 0, 0, 190000, '', 0, '2023-10-29 08:15:46'),
(213, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 1, 0, 190000, '', 0, '2023-10-29 08:39:48'),
(214, 1, '22 Lang Hai', '935540795', 6, 0, 120000, '', 0, '2023-10-29 08:40:03'),
(215, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 85000, '', 0, '2023-10-29 10:24:43'),
(216, 1, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '0935540795', 6, 0, 120000, '', 0, '2023-10-29 10:47:12'),
(217, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 660000, '', 0, '2023-10-30 06:52:10'),
(218, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 165000, '', 0, '2023-10-30 07:00:01'),
(219, 1, 'test', '0357369820', 6, 0, 165000, '', 0, '2023-10-30 07:01:16'),
(220, 1, '190 Nguyễn Thái Sơn, Phường 4, Quận Gò Vấp', '935540795', 6, 0, 165000, '', 0, '2023-10-30 07:02:51'),
(221, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 240000, '', 0, '2023-10-30 07:04:08'),
(222, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 165000, '', 0, '2023-10-30 07:06:19'),
(223, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 190000, '', 0, '2023-10-30 07:08:02'),
(224, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 600000, '', 0, '2023-10-30 07:11:49'),
(225, 1, 'test', '0357369820', 6, 0, 0, '', 0, '2023-10-30 07:13:39'),
(226, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 0, '', 0, '2023-10-30 07:14:24'),
(227, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 330000, '', 0, '2023-10-30 07:15:05'),
(228, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 1005000, '', 1, '2023-10-30 07:33:49'),
(229, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 990000, '', 1, '2023-10-30 08:22:09'),
(230, 1, 'test', '0357369820', 0, 150000, 1170000, '', 1, '2023-10-30 08:37:30'),
(231, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 150000, 1170000, '', 0, '2023-10-30 09:30:53'),
(232, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 1155000, '', 1, '2023-10-30 10:22:39'),
(233, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 990000, '', 0, '2023-10-30 10:32:50'),
(234, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 1155000, '', 1, '2023-10-30 10:39:31'),
(235, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 6, 20, 1320000, '', 0, '2023-10-30 14:31:03'),
(246, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 510000, '', 1, '2023-10-31 05:32:29'),
(247, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 150000, 450000, '', 1, '2023-10-31 06:47:56'),
(248, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 150000, 450000, '', 1, '2023-10-31 06:50:42'),
(249, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 10, 540000, '', 1, '2023-10-31 06:53:08'),
(250, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 70000, '', 1, '2023-10-31 06:54:47'),
(251, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 2000000, 10170000, '', 0, '2023-10-31 09:06:06'),
(252, 14, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 150000, 620000, '', 0, '2023-10-31 11:08:06'),
(253, 1, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 595000, '', 1, '2023-10-31 12:56:30'),
(254, 1, '566/72/63R Nguyễn Thái Sơn, P.5, Quận Gò Vấp', '0935540795', 0, 150000, 450000, '', 1, '2023-10-31 14:16:54'),
(278, 18, 'ad', '385273123', 1, 10000, 155000, 'ad', 1, '2023-12-02 01:01:06'),
(279, 25, 'add', '385273123', 0, 0, 285000, NULL, 1, '2023-12-02 08:34:40'),
(280, 18, 'ass', '385273123', 1, 0, 165000, NULL, 0, '2023-12-02 09:22:32'),
(281, 18, 'asss', '385273123', 0, 0, 285000, NULL, 1, '2023-12-02 09:24:27'),
(282, 18, 'aaaaa', '385273123', 1, 0, 835000, NULL, 1, '2023-12-02 09:31:17'),
(283, 18, 'ahaha', '385273123', 0, 0, 835000, NULL, 1, '2023-12-02 10:47:06'),
(284, 25, 'aw', '385273123', 0, 10000, 360000, NULL, 1, '2023-12-03 06:10:19'),
(285, 25, 'a123', '385273123', 0, 10000, 3240000, NULL, 1, '2023-12-03 06:16:22'),
(286, 25, 'a123', '385273123', 0, 10000, 3240000, NULL, 1, '2023-12-03 06:16:46'),
(287, 25, '123', '385273123', 0, 10000, 3240000, NULL, 1, '2023-12-03 06:17:47'),
(288, 25, 'ad123', '385273123', 0, 0, 3250000, NULL, 1, '2023-12-03 07:23:11'),
(289, 25, '123', '385273123', 0, 10000, 275000, NULL, 1, '2023-12-03 07:26:51'),
(290, 25, '123', '385273123', 0, 0, 275000, NULL, 1, '2023-12-03 07:27:28'),
(291, 18, 'ad', '385273123', 0, 0, 165000, NULL, 1, '2023-12-03 07:31:53'),
(292, 18, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 0, 0, 120000, NULL, 0, '2023-12-06 00:51:27'),
(293, 18, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 220000, NULL, 0, '2023-12-06 00:52:01'),
(294, 18, 'test', '0357369820', 6, 0, 420000, NULL, 0, '2023-12-06 00:56:58'),
(295, 18, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 1, 0, 100000, NULL, 0, '2023-12-06 00:58:12'),
(296, 18, '15 An Nhon', '0935540795', 0, 0, 900000, NULL, 0, '2023-12-06 01:20:50'),
(297, 18, '285/6/8 Phạm Văn Chiêu, P.14, Quận Gò Vấp', '0935540795', 6, 0, 1020000, NULL, 0, '2023-12-06 01:22:58'),
(298, 28, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 120000, 1055000, NULL, 1, '2023-12-09 20:37:19'),
(299, 28, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 0, 90000, NULL, 1, '2023-12-09 20:39:40'),
(300, 28, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 120000, 1055000, NULL, 1, '2023-12-09 20:46:14'),
(301, 30, '19/21A Vo Van Ngan', '0917407137', 1, 120000, 120000, 'NO NOTE', 0, '2023-12-10 13:41:22'),
(302, 30, '19/21A Vo Van Ngan', '0917407137', 1, 120000, 120000, 'NO NOTE', 0, '2023-12-10 13:41:52'),
(303, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 0, 160000, 'hhhh', 1, '2023-12-11 08:11:23'),
(304, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 6, 0, 90000, 'gaga', 0, '2023-12-11 08:12:06'),
(305, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 6, 0, 90000, '12312', 0, '2023-12-11 08:12:35'),
(306, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 0, 2795000, '123123', 0, '2023-12-11 08:13:38'),
(307, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 10, 495000, 'NO NOTE', 0, '2023-12-12 15:59:35'),
(308, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 0, 550000, NULL, 1, '2023-12-12 16:03:49'),
(309, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 550000, NULL, 1, '2023-12-12 16:22:11'),
(310, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 0, 550000, NULL, 1, '2023-12-12 17:06:54'),
(311, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 550000, NULL, 1, '2023-12-12 17:07:17'),
(312, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 550000, NULL, 1, '2023-12-12 17:08:19'),
(313, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 550000, '123123', 1, '2023-12-12 17:12:42'),
(314, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 0, 120000, NULL, 1, '2023-12-12 17:13:34'),
(315, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 120000, NULL, 1, '2023-12-12 17:20:31'),
(316, 31, '123', '978533147', 6, 0, 120000, NULL, 0, '2023-12-12 17:28:08'),
(317, 31, '123', '978533147', 0, 0, 120000, '22', 1, '2023-12-12 17:28:49'),
(318, 31, '123', '978533147', 0, 0, 575000, NULL, 1, '2023-12-12 17:37:47'),
(319, 31, 'Cvc', '978533147', 0, 120000, 210000, NULL, 1, '2023-12-12 19:12:38'),
(320, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 4, 120000, 130000, NULL, 1, '2023-12-12 21:01:37'),
(321, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 0, 0, 220000, '12312', 1, '2023-12-12 21:08:05'),
(322, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 5, 0, 120000, NULL, 1, '2023-12-12 21:10:28'),
(323, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 120000, 3375000, '123123', 0, '2023-12-12 21:11:52'),
(324, 31, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 10, 3145500, '123', 0, '2023-12-12 21:15:46'),
(325, 26, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '+84935540795', 1, 10, 3919500, 'Chúc mừng sinh nhật', 1, '2023-12-12 21:34:19'),
(326, 31, '123123', '978533147', 1, 0, 745000, NULL, 1, '2023-12-12 23:24:49'),
(327, 26, 'ad', '935540795', 0, 0, 4355000, NULL, 1, '2023-12-13 00:09:13'),
(328, 31, '01 Võ Văn Ngân', '978533147', 3, 120000, 2115000, NULL, 0, '2023-12-13 13:13:33'),
(329, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 0, 0, 120000, NULL, 1, '2023-12-13 16:01:22'),
(330, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 5, 0, 360000, NULL, 1, '2023-12-13 16:09:53'),
(331, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 6, 0, 1590000, 'Chúc mừng sinh nhật', 0, '2023-12-13 16:21:21'),
(332, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 0, 120000, 1470000, NULL, 1, '2023-12-13 16:22:06'),
(333, 33, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '084935540795', 0, 0, 120000, NULL, 1, '2023-12-13 16:45:53'),
(334, 33, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', '084935540795', 0, 10, 4320000, 'Chúc mừng sinh nhật', 0, '2023-12-13 21:40:27'),
(335, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 1, 0, 465000, 'Chúc mừng sinh nhật', 1, '2023-12-13 21:45:41'),
(336, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 3, 0, 465000, NULL, 0, '2023-12-13 21:47:11'),
(337, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 6, 0, 120000, NULL, 0, '2023-12-13 21:53:11'),
(338, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 3, 0, 120000, NULL, 0, '2023-12-13 21:54:05'),
(339, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 5, 0, 400000, NULL, 1, '2023-12-15 12:09:28'),
(340, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 1, 10, 4131000, 'Chúc mừng sinh nhật', 0, '2023-12-17 00:07:21'),
(341, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 0, 0, 300000, NULL, 1, '2023-12-17 00:19:25'),
(342, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 0, 0, 800000, NULL, 1, '2023-12-17 00:21:02'),
(343, 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', '0935540795', 0, 0, 4590000, NULL, 1, '2023-12-17 00:22:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `discount_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `product_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `orderdetail_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_name`, `discount_price`, `product_quantity`, `cost`, `product_id`, `type_id`, `product_image`, `orderdetail_id`) VALUES
(115, 'Chanh tươi Irag (kg)', 250000, 6, 1500000, 3, 3, 'chanhtuoiirag.png', 79),
(114, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 78),
(114, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 77),
(114, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 76),
(114, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 75),
(114, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 74),
(114, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 56, 1, 'nho.png', 73),
(114, 'Bánh kem bơ Pháp', 850000, 2, 1700000, 1, 2, 'banhkembophap.jpg', 72),
(113, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 56, 1, 'nho.png', 71),
(113, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 70),
(113, 'Chanh tươi Irag (kg)', 250000, 2, 500000, 3, 3, 'chanhtuoiirag.png', 69),
(113, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 68),
(113, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 67),
(113, 'Cà tím Châu Phi (kg)', 120000, 3, 360000, 7, 3, 'catim.jpg', 66),
(113, 'Hồng đỏ Nam Mỹ (kg)', 165000, 5, 825000, 11, 1, 'hongdomy.png', 65),
(120, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 83),
(119, 'Kiwi ngọt Brazil (kg)', 190000, 3, 570000, 57, 1, 'kiwi.png', 81),
(119, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 82),
(121, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 84),
(148, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 85),
(148, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 86),
(149, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 87),
(149, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 88),
(149, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 89),
(150, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 90),
(150, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 91),
(151, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 92),
(151, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 93),
(152, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 94),
(153, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 95),
(154, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 96),
(154, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 97),
(155, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 98),
(155, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 99),
(156, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 100),
(157, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 101),
(158, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 102),
(159, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 103),
(160, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 104),
(161, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 105),
(162, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 106),
(163, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 107),
(164, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 108),
(165, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 109),
(166, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 110),
(167, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 111),
(0, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 112),
(168, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 113),
(168, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 114),
(169, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 115),
(170, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 116),
(171, 'Bánh kem Matcha Nho', 320000, 1, 320000, 12, 2, 'banhkemnhomatcha.jpg', 117),
(171, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 118),
(171, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 119),
(172, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 120),
(173, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 121),
(174, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 122),
(175, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 123),
(176, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 124),
(177, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 125),
(177, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 126),
(178, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 127),
(179, 'Kiwi ngọt Brazil (kg)', 190000, 2, 380000, 57, 1, 'kiwi.png', 128),
(180, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 129),
(180, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 130),
(181, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 131),
(182, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 132),
(183, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 133),
(184, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 134),
(185, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 135),
(186, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 136),
(187, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 137),
(188, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 138),
(189, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 139),
(190, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 140),
(191, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 141),
(192, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 142),
(193, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 143),
(194, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 144),
(195, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 145),
(196, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 146),
(197, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 147),
(198, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 148),
(199, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 149),
(200, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 150),
(201, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 151),
(202, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 152),
(203, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 153),
(203, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 154),
(204, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 155),
(205, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 156),
(206, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 157),
(207, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 158),
(207, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 159),
(208, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 160),
(209, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 161),
(210, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 162),
(211, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 163),
(212, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 164),
(213, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 165),
(214, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 166),
(215, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 167),
(216, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 168),
(217, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 169),
(218, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 170),
(219, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 171),
(220, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 172),
(221, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 173),
(222, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 174),
(223, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 175),
(224, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 176),
(225, 'Chanh dây Nga tươi (kg)', 120000, 3, 360000, 16, 1, 'chanhday.png', 177),
(226, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 178),
(227, 'Chanh dây Nga tươi (kg)', 120000, 4, 480000, 16, 1, 'chanhday.png', 179),
(228, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 180),
(229, 'Hồng đỏ Nam Mỹ (kg)', 165000, 6, 990000, 11, 1, 'hongdomy.png', 181),
(230, 'Hồng đỏ Nam Mỹ (kg)', 165000, 8, 1320000, 11, 1, 'hongdomy.png', 182),
(231, 'Hồng đỏ Nam Mỹ (kg)', 165000, 8, 1320000, 11, 1, 'hongdomy.png', 183),
(232, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 184),
(233, 'Hồng đỏ Nam Mỹ (kg)', 165000, 6, 990000, 11, 1, 'hongdomy.png', 185),
(234, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 186),
(235, 'Hồng đỏ Nam Mỹ (kg)', 165000, 10, 1650000, 11, 1, 'hongdomy.png', 187),
(236, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 188),
(236, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 189),
(236, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 190),
(237, 'Hồng đỏ Nam Mỹ (kg)', 165000, 7, 1155000, 11, 1, 'hongdomy.png', 191),
(238, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 192),
(238, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 193),
(238, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 194),
(239, 'Kiwi ngọt Brazil (kg)', 190000, 1, 190000, 57, 1, 'kiwi.png', 195),
(239, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 196),
(240, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 197),
(240, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 198),
(240, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 199),
(240, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 200),
(241, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 201),
(241, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 202),
(242, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 203),
(243, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 204),
(244, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 205),
(245, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 206),
(246, 'Hồng đỏ Nam Mỹ (kg)', 165000, 4, 660000, 11, 1, 'hongdomy.png', 207),
(247, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 208),
(248, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 209),
(249, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 210),
(250, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 211),
(251, 'Kiwi ngọt Brazil (kg)', 190000, 3, 570000, 57, 1, 'kiwi.png', 212),
(251, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 213),
(251, 'Bánh kem Matcha', 600000, 5, 3000000, 22, 2, 'banhkemmatcha.jpg', 214),
(251, 'Bánh kem dâu Ý', 1200000, 6, 7200000, 5, 2, 'banhkemdau.jpg', 215),
(251, 'Bánh kem Táo Hàn Quốc', 550000, 2, 1100000, 17, 2, 'banhkemtao.jpg', 216),
(252, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 217),
(252, 'Vải thiều loại to (kg)', 85000, 2, 170000, 21, 1, 'vaithieuloaito.png', 218),
(253, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 219),
(253, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 220),
(254, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 221),
(255, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 222),
(255, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 223),
(259, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 224),
(260, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 225),
(260, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 226),
(260, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 227),
(261, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 228),
(261, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 229),
(261, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 230),
(262, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 231),
(262, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 232),
(262, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 233),
(278, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 240),
(263, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 235),
(279, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 241),
(279, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 242),
(280, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 243),
(281, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 244),
(281, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 245),
(282, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 246),
(282, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 247),
(282, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 248),
(283, 'Hồng đỏ Nam Mỹ (kg)', 165000, 3, 495000, 11, 1, 'hongdomy.png', 249),
(283, 'Chanh dây Nga tươi (kg)', 120000, 2, 240000, 16, 1, 'chanhday.png', 250),
(283, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 251),
(284, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 252),
(284, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 253),
(285, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 254),
(285, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 255),
(286, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 256),
(286, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 257),
(287, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 258),
(287, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 259),
(288, 'Bánh kem bơ Pháp', 850000, 1, 850000, 1, 2, 'banhkembophap.jpg', 260),
(288, 'Bánh kem dâu Ý', 1200000, 2, 2400000, 5, 2, 'banhkemdau.jpg', 261),
(289, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 262),
(289, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 263),
(291, 'Hồng đỏ Nam Mỹ (kg)', 165000, 1, 165000, 11, 1, 'hongdomy.png', 264),
(292, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 265),
(293, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 266),
(293, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 267),
(294, 'Chanh dây Nga tươi (kg)', 120000, 1, 120000, 16, 1, 'chanhday.png', 268),
(294, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 269),
(295, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 270),
(296, 'Chanh dây Nga tươi (kg)', 120000, 5, 600000, 16, 1, 'chanhday.png', 271),
(296, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 272),
(297, 'Chanh dây Nga tươi (kg)', 120000, 6, 720000, 16, 1, 'chanhday.png', 273),
(297, 'Dâu tây đỏ ngọt (kg)', 100000, 3, 300000, 18, 1, 'dautay.png', 274),
(298, 'Chanh dây Nga tươi (kg)', 90000, 7, 630000, 16, 1, 'chanhday.png', 275),
(298, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 276),
(298, 'Dâu tây đỏ ngọt (kg)', 100000, 2, 200000, 18, 1, 'dautay.png', 277),
(298, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 278),
(298, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 279),
(299, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 280),
(300, 'Chanh dây Nga tươi (kg)', 90000, 7, 630000, 16, 1, 'chanhday.png', 281),
(300, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 282),
(300, 'Dâu tây đỏ ngọt (kg)', 100000, 2, 200000, 18, 1, 'dautay.png', 283),
(300, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 284),
(300, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 285),
(301, 'Hồng đỏ Nam Mỹ (kg)', 190000, 2, 380000, 11, 1, 'hongdomy.png', 286),
(301, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 287),
(302, 'Hồng đỏ Nam Mỹ (kg)', 190000, 2, 380000, 11, 1, 'hongdomy.png', 288),
(302, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 289),
(303, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 290),
(303, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 291),
(304, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 292),
(305, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 293),
(306, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 294),
(306, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 295),
(306, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 296),
(306, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 297),
(306, 'Bánh kem bơ Pháp', 620000, 1, 620000, 1, 2, 'banhkembophap.jpg', 298),
(306, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 299),
(307, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 300),
(308, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 301),
(309, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 302),
(310, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 303),
(311, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 304),
(312, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 305),
(313, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 306),
(314, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 307),
(315, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 308),
(316, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 309),
(317, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 310),
(318, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 311),
(318, 'Dâu tây đỏ ngọt (kg)', 100000, 4, 400000, 18, 1, 'dautay.png', 312),
(318, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 313),
(319, 'Chanh dây Nga tươi (kg)', 90000, 2, 180000, 16, 1, 'chanhday.png', 314),
(320, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 315),
(321, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 316),
(322, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 317),
(323, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 318),
(323, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 319),
(323, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 96, 1, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 320),
(323, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 321),
(323, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 322),
(323, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 323),
(323, 'Bánh kem bơ Pháp', 620000, 1, 620000, 1, 2, 'banhkembophap.jpg', 324),
(323, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 325),
(324, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 326),
(324, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 327),
(324, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 96, 1, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 328),
(324, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 329),
(324, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 330),
(324, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 331),
(324, 'Bánh kem bơ Pháp', 620000, 1, 620000, 1, 2, 'banhkembophap.jpg', 332),
(324, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 333),
(325, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 334),
(325, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 335),
(325, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 336),
(325, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 337),
(325, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 338),
(325, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 339),
(325, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 340),
(325, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 341),
(325, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 342),
(325, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 343),
(325, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 344),
(325, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 345),
(325, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 346),
(325, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 347),
(326, 'Chanh dây Nga tươi (kg)', 90000, 2, 180000, 16, 1, 'chanhday.png', 348),
(326, 'Hồng đỏ Nam Mỹ (kg)', 190000, 2, 380000, 11, 1, 'hongdomy.png', 349),
(326, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 350),
(326, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 351),
(327, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 352),
(327, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 353),
(327, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 354),
(327, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 355),
(327, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 356),
(327, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 357),
(327, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 358),
(327, 'Cà rốt Bắc Mỹ (kg)', 120000, 1, 120000, 54, 3, 'carot.png', 359),
(327, 'Cải thìa Triều Tiên (kg)', 70000, 1, 70000, 53, 3, 'caithia.png', 360),
(327, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 361),
(327, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 362),
(327, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 363),
(327, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 364),
(327, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 365),
(328, 'Dâu tây đỏ ngọt (kg)', 100000, 4, 400000, 18, 1, 'dautay.png', 366),
(328, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 367),
(328, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 368),
(328, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 369),
(329, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 370),
(330, 'Chanh dây Nga tươi (kg)', 90000, 4, 360000, 16, 1, 'chanhday.png', 371),
(331, 'Chanh dây Nga tươi (kg)', 90000, 3, 270000, 16, 1, 'chanhday.png', 372),
(331, 'Kiwi ngọt Brazil (kg)', 280000, 2, 560000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 373),
(331, 'Hồng đỏ Nam Mỹ (kg)', 190000, 4, 760000, 11, 1, 'hongdomy.png', 374),
(332, 'Chanh dây Nga tươi (kg)', 90000, 3, 270000, 16, 1, 'chanhday.png', 375),
(332, 'Kiwi ngọt Brazil (kg)', 280000, 2, 560000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 376),
(332, 'Hồng đỏ Nam Mỹ (kg)', 190000, 4, 760000, 11, 1, 'hongdomy.png', 377),
(333, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 378),
(334, 'Bánh kem dâu Ý', 1200000, 4, 4800000, 5, 2, 'banhkemdau.jpg', 379),
(335, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 380),
(335, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 381),
(335, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 382),
(335, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 383),
(336, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 384),
(336, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 385),
(336, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 386),
(336, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 387),
(337, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 388),
(338, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 389),
(339, 'Dâu tây đỏ ngọt (kg)', 100000, 4, 400000, 18, 1, 'dautay.png', 390),
(340, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 391),
(340, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 392),
(340, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 393),
(340, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 394),
(340, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 395),
(340, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 396),
(341, 'Chanh dây Nga tươi (kg)', 90000, 3, 270000, 16, 1, 'chanhday.png', 397),
(342, 'Dâu tây đỏ ngọt (kg)', 100000, 8, 800000, 18, 1, 'dautay.png', 398),
(343, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 399),
(343, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 400),
(343, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 401),
(343, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 402),
(343, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 403),
(343, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 404);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `order_id` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `bankcode` varchar(50) NOT NULL,
  `content` varchar(5) NOT NULL,
  `card_type` varchar(24) NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`order_id`, `total_cost`, `bankcode`, `content`, `card_type`, `status`, `created_at`) VALUES
(226, 510000, 'VNPAY', '226', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(227, 330000, 'VNPAY', '227', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(233, 990000, 'VNPAY', '233', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(235, 1320000, 'VNPAY', '235', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(241, 212000, 'NCB', '241', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(251, 10170000, 'NCB', '251', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(252, 620000, 'VNPAY', '252', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(255, 285000, 'VNPAY', '255', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(294, 420000, 'VNPAY', '294', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(295, 100000, 'VNPAY', '295', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(297, 1020000, 'VNPAY', '297', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(302, 120000, 'NCB', '302', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(304, 90000, 'VNPAY', '304', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(305, 90000, 'VNPAY', '305', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(306, 2795000, 'NCB', '306', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(307, 495000, 'NCB', '307', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(316, 120000, 'VNPAY', '316', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(323, 3375000, 'VNPAY', '323', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(324, 3145500, 'NCB', '324', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(328, 2115000, 'NCB', '328', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(331, 1590000, 'VNPAY', '331', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(334, 4320000, 'NCB', '334', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(336, 465000, 'NCB', '336', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(337, 120000, 'VNPAY', '337', 'QRCODE', 'Thanh toán thất bại', '2023-12-16 19:28:40'),
(338, 120000, 'NCB', '338', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(340, 4131000, 'NCB', '340', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `discount_price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Bánh kem bơ Pháp', 18, 2, 850000, 620000, 'banhkembophap.jpg', 'Vẫn sở hữu phần cốt bánh bông lan xốp mịn, điều làm cho những chiếc bánh kem này trở nên đặc biệt và cuốn hút nằm ở phần kem bơ.\r\n\r\nKem bơ Pháp được làm từ những nguyên liệu gồm lòng đỏ trứng, syrup đường và bơ lạt. Nhờ sử dụng thêm lòng đỏ trứng, thành phẩm kem bơ sẽ có hương vị cực kì thơm ngon, mềm mượt và tan ngay khi vào miệng.\r\n\r\nNhững người thợ tài hoa của Grand Castella còn tận dụng phần kem bơ này, sáng tạo nên những hình ảnh trang trí độc đáo, giúp chiếc bánh kem đã ngon nay trở nên xinh đẹp hơn.', 1, '2021-10-22 04:15:10'),
(53, 'Cải thìa Triều Tiên (kg)', 18, 3, 190000, 70000, 'caithia.png', 'Cải thìa Triều Tiên do ông Kim trồng ăn rất ngon nhé. Mua ăn thử đi biết', 1, '2022-11-18 08:20:02'),
(54, 'Cà rốt Bắc Mỹ (kg)', 18, 3, 180000, 120000, 'carot.png', 'Cà rốt Bắc Mỹ do ông Donald Trump đích thân trồng tại nông trại. Không qua bất cứ máy móc và hóa chất. Nên rất ngon và đắt', 1, '2022-11-18 08:19:55'),
(55, 'Cà chua Nhật Bản (kg)', 18, 3, 160000, 110000, 'cachua.png', 'Do Thiên Hoàng Minh Trị trồng từ thời chiến tranh thế giới thứ 2. Đặc biệt loại này không dính phóng xạ nên ăn bổ lắm nha.', 0, '2022-11-18 08:19:46'),
(3, 'Chanh tươi Irag (kg)', 18, 3, 500000, 250000, 'chanhtuoiirag.png', 'Loại tranh xuất xứ từ những anh Iran, Irag đẹp trai. Khủng b*, nên chanh này ăn ngon và hấp dẫn. Tận hưởng những phút giây như bị kh**g bố khi ăn nó', 0, '2022-11-18 08:22:41'),
(5, 'Bánh kem dâu Ý', 18, 2, 1600000, 1200000, 'banhkemdau.jpg', 'Xuất xứ từ Ý, du nhập Việt Nam năm 2022. Mới lạ và đang là xu hướng', 1, '2022-11-18 08:22:28'),
(7, 'Cà tím Châu Phi (kg)', 18, 3, 180000, 120000, 'catim.jpg', 'Loại cà tím Châu Phi này to thì khỏi phải nói :)). Ăn thì cũng ngon, làm ngất ngây bao nhiêu chị em. Mua ăn thử bạn nhé', 1, '2022-11-18 08:22:20'),
(11, 'Hồng đỏ Nam Mỹ (kg)', 18, 1, 225000, 190000, 'hongdomy.png', 'Hồng đỏ tươi Nam Mỹ, cung cấp nhiều khoáng chất tốt cho cơ thể', 1, '2022-11-18 08:22:12'),
(12, 'Bánh kem Matcha Nho', 18, 2, 990000, 870000, 'banhkemnhomatcha.jpg', 'Sản phẩm tốt với giá thành rẻ. Ngon mà đẹp, thích hợp với sinh viên', 1, '2022-11-18 08:21:53'),
(13, 'Dưa leo Ấn Độ (kg)', 18, 3, 120000, 50000, 'dualeoando.png', 'Dưa leo Ấn Độ chỉ được trồng ở Ấn Độ. Không xuất khẩu, nay có ở Việt Nam nhờ tui buôn l*u. Mua ăn đi nhé!!!', 1, '2022-11-18 08:21:34'),
(16, 'Chanh dây Nga tươi (kg)', 18, 1, 120000, 90000, 'chanhday.png', 'Loại chanh dây đặc biệt này chỉ trồng được ở nước Hàn Đới như Nga, nên đừng thắc ắc giá cả. Mua ăn liền đi nhé!!!', 1, '2022-11-18 08:21:23'),
(17, 'Bánh kem Táo Hàn Quốc', 18, 2, 1120000, 550000, 'banhkemtao.jpg', 'Bánh kem táo Hàn Quốc siêu đẹp và ngon', 1, '2022-11-18 08:21:15'),
(18, 'Dâu tây đỏ ngọt (kg)', 18, 1, 160000, 100000, 'dautay.png', 'Loại dâu tây này siêu ngọt và thơm. Ăn ngon nhé bạn', 1, '2022-11-18 08:21:01'),
(21, 'Vải thiều loại to (kg)', 18, 1, 140000, 85000, 'vaithieuloaito.png', 'Vải thiều loại to, tươi mới mỗi ngày. Cung cấp Vitamin tốt cho sức khỏe', 1, '2022-11-18 08:20:52'),
(22, 'Bánh kem Matcha', 18, 2, 890000, 600000, 'banhkemmatcha.jpg', 'Bánh kem matcha trà xanh, cực kỳ thơm ngon. Được khá nhiều người ưa chuộng', 1, '2022-11-18 08:22:01'),
(23, 'Ớt chuông đỏ (kg)', 18, 3, 240000, 60000, 'otchuongdo.png', 'Ớt chuông đỏ cung cấp nhiều Vitamin D. Loại này ít cay nhưng ngon khi xào chung với Mực', 1, '2022-11-18 08:20:15'),
(96, 'Nho Pháp thượng hạng (kg)', 18, 1, 190000, 150000, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 'Loại nho Pháp thượng hạng này được Napoleon cho trồng vào giữa thế kỷ XVII và thịnh hành đến bây giờ. Được mình nhập khẩu chui về bán cho bạn ăn<br>', 1, '2023-12-11 14:07:51'),
(98, 'Cà chua Nhật Bản (kg)', 18, 3, 160000, 140000, 'image1702304086-Cà chua Nhật Bản (kg).png', 'Do Thiên Hoàng Minh Trị trồng từ thời chiến tranh thế giới thứ 2. Đặc biệt loại này không dính phóng xạ nên ăn bổ lắm nha', 1, '2023-12-11 14:14:45'),
(97, 'Kiwi ngọt Brazil (kg)', 18, 1, 320000, 280000, 'image1702303861-Kiwi ngọt Brazil (kg).png', 'Kiwi được hái từ trong rừng Amazon tại Brazil, hương vị phải nói là ngây ngất lòng người, ăn 1 lần là lần sau khỏi ăn luôn<br>', 1, '2023-12-11 14:08:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Trái cây tươi'),
(2, 'Bánh ngọt'),
(3, 'Rau củ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `status` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`status`, `status_name`) VALUES
(0, 'Đang gói hàng'),
(1, 'Đã giao hàng'),
(2, 'Đang thanh toán'),
(3, 'Đã thanh toán'),
(4, 'Đang giao hàng'),
(5, 'Đơn đã hủy'),
(6, 'Đã hủy thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `image` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `First_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `image`, `First_name`, `Last_name`, `email`, `phone`, `address`, `username`, `password`, `role_id`) VALUES
(27, 'image1702269401-.jpg', 'Quang', 'Đàm', 'quang@gmail.com', 987788611, '', 'quang', '$2y$10$vngoRErCjAXRXpXu8CqNoeoLbqUqpibxVyQagCTfH3taFSWYEwVG2', 1),
(26, 'admin.jpg', 'Hoang', 'Ho', 'duyhoang04244@gmail.com', 935540795, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 'hoang', '$2y$10$p50TzDlT4qiLWvfQzdzgSObw.BrKBb.oXQSeAZH0zL0C4nS1SaZlO', 1),
(30, 'image1702272187-.jpg', 'DIP', 'TRUONG', 'khanhdip@gmail.com', 917123456, '', 'khanhdip', '$2y$10$80OkmsUOqH3nA/2ZOuQdbevVvK1MdNxIf.N6wSHV39Fw2qDiMsRGe', 2),
(31, 'image1702455768-.png', 'Mới', 'Khách Hàng', 'utal2322ik.com@gmail.com', 978533147, '', 'customer', '$2y$10$mU1JMFDim2fFLsewbgJPF.cfCsf2OEyr1rSIB7zIE1mgckmJa24F.', 2),
(33, 'image1702616800-.png', 'Hoang', 'Ho', 'utalik.com@gmail.com', 84935540795, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', 'user', '$2y$10$OXwsJxowRh6Kl8Z1FX1eK.RkRyEGdoUOzYn06l2wTKXuLaCeJtTIO', 2),
(34, NULL, 'Hoang', 'Ho', 'ut213123alik.com@gmail.com', 84935540795, NULL, '123123', '$2y$10$YeuYnbpiTHVvOrmMNA.bT.smQ7OG/pbiObahbl9RSfHhpOvYDIh7i', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`,`coupon_code`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Chỉ mục cho bảng `coupons_type`
--
ALTER TABLE `coupons_type`
  ADD PRIMARY KEY (`coupon_type`);

--
-- Chỉ mục cho bảng `email_lists`
--
ALTER TABLE `email_lists`
  ADD PRIMARY KEY (`email_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderdetail_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `email_lists`
--
ALTER TABLE `email_lists`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
