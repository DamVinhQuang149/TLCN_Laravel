-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql213.infinityfree.com
-- Thời gian đã tạo: Th7 10, 2024 lúc 11:56 PM
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
-- Cấu trúc bảng cho bảng `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `offer` varchar(100) DEFAULT NULL,
  `contact_info` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `content`, `offer`, `contact_info`, `created_at`) VALUES
(1, 'chương trình mới', 'chào mừng bạn đến với website, hiện tại chúng tôi đang có chương trình mới ', 'khuyến mãi 10%', 'thông tin của chúng tôi....', '2024-04-13 03:50:12'),
(2, 'tiêu đề 1', 'content 1', 'offer 1', 'info 1', '2024-04-12 21:10:10'),
(4, 'Chương trình khuyến mãi hấp dẫn tháng 5', '<p>Chào mừng tháng 5 với hàng loạt ưu đãi đặc biệt từ cửa hàng chúng tôi.&nbsp;</p><p>Mua sắm và nhận ngay những phần quà hấp dẫn, giảm giá lớn cho tất cả các&nbsp;</p><p>sản phẩm yêu thích của bạn.</p>', 'Giảm giá lên đến 70%', 'Hãy liên hệ ngay hôm nay để biết thêm thông tin chi tiết về chương trình khuyến mãi: Hotline: 0123 456 789 - Email: info@example.com', '2024-04-12 22:38:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `reply_to_comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `star` int(11) DEFAULT NULL,
  `isApproved` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`comm_id`, `reply_to_comment_id`, `user_id`, `product_id`, `created_at`, `updated_at`, `comment`, `star`, `isApproved`) VALUES
(48, NULL, 27, 11, '2024-05-13', '2024-05-14', 'Sản phẩm tốt', 3, 1),
(49, NULL, 27, 11, '2024-05-13', '2024-05-13', 'Ngon lắm ạ', 3, 1),
(50, NULL, 35, 11, '2024-05-13', '2024-05-13', 'tưới ngon, ngọt lắm ạ', 5, 1),
(53, 50, 27, 11, '2024-05-13', '2024-05-13', 'Cảm ơn bạn', NULL, 1),
(54, 49, 27, 11, '2024-05-13', '2024-05-13', 'oke bạn :v', NULL, 1),
(55, NULL, 27, 11, '2024-05-13', '2024-05-14', 'xịn', 3, 1),
(56, NULL, 26, 128, '2024-05-25', '2024-05-25', 'lô', 5, 1),
(57, NULL, 27, 128, '2024-05-25', '2024-05-25', '123123', 5, 0),
(58, NULL, 26, 108, '2024-06-02', '2024-06-02', 'oK PHẾT', 1, 0),
(59, NULL, 42, 103, '2024-06-25', '2024-06-25', 'Sản phẩm tốt', 5, 0),
(60, NULL, 42, 103, '2024-06-25', '2024-06-25', 'Tốt', 3, 0),
(61, NULL, 42, 103, '2024-06-25', '2024-06-25', 'Tốt', 1, 0);

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
(2, 'GIAMGIA10', 1, 10, 30000, 30, 20, 10, '2024-12-31'),
(3, 'GIAMGIA100K', 0, 100000, 1000000, 30, 5, 25, '2024-11-10'),
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
(1, 'damquang149@gmail.com', '2023-12-15 11:16:29'),
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
(18, 'duyhoang@gmail.com', '2023-12-17 00:26:31'),
(19, 'duyhoang042444@gmail.com', '2024-04-13 07:07:55'),
(20, 'bin@gmail.com', '2024-06-03 17:23:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 35, 1, '2024-03-20', '2024-03-20'),
(6, 35, 11, '2024-03-20', '2024-03-20'),
(14, 35, 53, '2024-04-02', '2024-04-02'),
(4, 35, 21, '2024-03-20', '2024-03-20'),
(11, 35, 13, '2024-03-20', '2024-03-20'),
(12, 35, 7, '2024-03-20', '2024-03-20'),
(13, 35, 23, '2024-03-20', '2024-03-20'),
(15, 35, 3, '2024-04-02', '2024-04-02'),
(19, 27, 13, '2024-05-12', '2024-05-12'),
(20, 27, 104, '2024-05-12', '2024-05-12'),
(21, 27, 125, '2024-05-12', '2024-05-12'),
(22, 27, 16, '2024-05-12', '2024-05-12'),
(23, 27, 18, '2024-05-12', '2024-05-12'),
(24, 27, 7, '2024-05-13', '2024-05-13'),
(25, 35, 16, '2024-05-25', '2024-05-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flash_sales`
--

CREATE TABLE `flash_sales` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `initial_price` int(11) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `flash_sales`
--

INSERT INTO `flash_sales` (`id`, `product_id`, `initial_price`, `start_date`, `end_date`) VALUES
(49, 125, 325000, '2024-06-05 20:33:53', '2024-08-10 20:33:00'),
(53, 114, 760000, '2024-06-05 20:35:36', '2024-07-13 20:35:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventories`
--

CREATE TABLE `inventories` (
  `inventory_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `product_id` int(11) NOT NULL,
  `import_quantity` int(11) NOT NULL,
  `sold_quantity` int(11) NOT NULL,
  `remain_quantity` int(11) DEFAULT NULL,
  `inventory_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `inventories`
--

INSERT INTO `inventories` (`inventory_id`, `product_name`, `product_image`, `product_id`, `import_quantity`, `sold_quantity`, `remain_quantity`, `inventory_status`, `created_at`) VALUES
(7, 'Cà tím Châu Phi (kg)', 'catim.jpg', 7, 123, 100, 23, 'In Stock', '2024-05-14 03:10:28'),
(8, 'Bánh kem bơ Pháp', 'banhkembophap.jpg', 1, 13, 42, 1, 'Nearly Out Of Stock', '2024-07-06 05:57:10'),
(9, 'Chanh tươi Irag (kg)', 'chanhtuoiirag.png', 3, 123, 10, 113, 'In Stock', '2024-05-14 03:10:28'),
(10, 'Bánh kem dâu Ý', 'banhkemdau.jpg', 5, 12, 30, 9, 'In Stock', '2024-05-10 08:21:00'),
(11, 'Hồng đỏ Nam Mỹ (kg)', 'hongdomy.png', 11, 12, 7, 5, 'Nearly Out Of Stock', '2024-06-06 01:02:30'),
(12, 'Bánh kem Matcha Nho', 'banhkemnhomatcha.jpg', 12, 24, 41, 2, 'Nearly Out Of Stock', '2024-05-14 03:10:27'),
(13, 'Dưa leo Ấn Độ (kg)', 'dualeoando.png', 13, 500, 1, 499, 'In Stock', '2024-04-16 12:45:45'),
(14, 'Chanh dây Nga tươi (kg)', 'chanhday.png', 16, 450, 9, 441, 'In Stock', '2024-06-06 01:02:31'),
(15, 'Bánh kem Táo Hàn Quốc', 'banhkemtao.jpg', 17, 25, 1, 24, 'In Stock', '2024-07-06 05:57:11'),
(16, 'Dâu tây đỏ ngọt (kg)', 'dautay.png', 18, 600, 40, 0, 'Out Of Stock', '2024-05-10 17:31:22'),
(17, 'Vải thiều loại to (kg)', 'vaithieuloaito.png', 21, 780, 71, 759, 'In Stock', '2024-05-25 07:02:24'),
(18, 'Bánh kem Matcha', 'banhkemmatcha.jpg', 22, 12, 2, 10, 'In Stock', '2024-04-16 12:49:34'),
(19, 'Ớt chuông đỏ (kg)', 'otchuongdo.png', 23, 15, 60, 0, 'Out Of Stock', '2024-05-10 15:03:26'),
(20, 'Cải thìa Triều Tiên (kg)', 'caithia.png', 53, 70, 40, 60, 'In Stock', '2024-05-26 14:08:33'),
(21, 'Cà rốt Bắc Mỹ (kg)', 'carot.png', 54, 123, 0, 123, 'In Stocks', '2024-04-16 10:44:02'),
(22, 'Cà chua Nhật Bản (kg)', 'cachua.png', 55, 123, 50, 113, 'In Stock', '2024-05-10 08:21:15'),
(23, 'Nho Pháp thượng hạng (kg)', 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 96, 900, 14, 886, 'In Stock', '2024-07-06 05:27:08'),
(27, 'Kiwi ngọt Brazil (kg)', 'image1715327867-Kiwi ngọt Brazil (kg).png', 103, 120, 103, 87, 'In Stock', '2024-06-24 19:03:36'),
(28, 'Bánh kem cặp đôi cute', 'image1715345866-Bánh kem cặp đôi cute.png', 104, 120, 42, 109, 'In Stock', '2024-05-14 03:12:57'),
(29, 'Bánh kem cho bé', 'image1715345948-Bánh kem cho bé.png', 105, 12, 42, 12, 'In Stocks', '2024-05-24 13:41:59'),
(30, 'Bánh kem Chocolate KitKat', 'image1715346040-Bánh kem Chocolate KitKat.png', 106, 12, 100, 12, 'In Stocks', '2024-05-10 17:13:51'),
(31, 'Bánh kem sữa thơm ngon béo ngậy', 'image1715346106-Bánh kem sữa thơm ngon béo ngậy.png', 107, 12, 0, 12, 'In Stocks', '2024-05-10 13:01:46'),
(32, 'Bánh kem phong cách đơn giản Nhật Bản', 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 108, 123, 10, 113, 'In Stock', '2024-06-03 06:29:22'),
(33, 'Bắp Indonesia (kg)', 'image1715356588-Bắp Indonesia (kg).jpg', 109, 233, 0, 233, 'In Stocks', '2024-05-10 15:56:28'),
(34, 'Bắp cải trắng Malaysia (kg)', 'image1715356698-Bắp cải trắng Malaysia (kg).jpg', 110, 123, 0, 123, 'In Stocks', '2024-05-10 15:58:18'),
(35, 'Bí ngô Nam Mỹ (kg)', 'image1715356763-Bí ngô Nam Mỹ (kg).png', 111, 123, 0, 123, 'In Stocks', '2024-05-10 15:59:23'),
(36, 'Bơ sáp Tây Nguyên (kg)', 'image1715356874-Bơ sáp Tây Nguyên (kg).jpg', 112, 234, 0, 234, 'In Stocks', '2024-05-10 16:01:14'),
(37, 'Cam tươi Trung Quốc (kg)', 'image1715356998-Cam tươi Trung Quốc (kg).jpg', 113, 123, 1, 122, 'In Stock', '2024-05-25 07:02:24'),
(38, 'Cherry đỏ ngọt Campuchia', 'image1715357075-Cherry đỏ ngọt Campuchia.jpg', 114, 23, 4, 19, 'In Stock', '2024-07-06 05:27:08'),
(39, 'Đậu Hà Lan Brunei (kg)', 'image1715357176-Đậu Hà Lan Brunei (kg).jpg', 115, 234, 0, 234, 'In Stocks', '2024-05-10 16:06:16'),
(40, 'Dưa hấu đỏ Long An (kg)', 'image1715357248-Dưa hấu đỏ Long An (kg).png', 116, 235, 2, 233, 'In Stock', '2024-05-25 07:02:24'),
(41, 'Dưa hấu ruột vàng Châu Phi (kg)', 'image1715357340-Dưa hấu ruột vàng Châu Phi (kg).jpg', 117, 234, 1, 233, 'In Stock', '2024-05-25 07:02:24'),
(42, 'Dừa tươi mọng nước Thái Lan (kg)', 'image1715357426-Dừa tươi mọng nước Thái Lan (kg).png', 118, 234, 206, 228, 'In Stock', '2024-06-02 10:20:22'),
(43, 'Hành tím Myanmar (kg)', 'image1715357658-Hành tím Myanmar (kg).jpg', 119, 123, 41, 123, 'In Stocks', '2024-05-10 17:14:30'),
(44, 'Khoai tây Phillipines (kg)', 'image1715357763-Khoai tây Phillipines (kg).png', 120, 222, 52, 222, 'In Stocks', '2024-05-10 17:14:34'),
(45, 'Măng cục Châu Úc (kg)', 'image1715357868-Măng cục Châu Úc (kg).jpg', 121, 444, 0, 444, 'In Stocks', '2024-05-10 16:17:48'),
(46, 'Khổ qua rừng Singapore (kg)', 'image1715357942-Khổ qua rừng Singapore (kg).jpg', 122, 234, 1, 233, 'In Stock', '2024-05-25 07:02:24'),
(47, 'Lượu đỏ ngọt mọng nước Lào (kg)', 'image1715358036-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 123, 222, 108, 214, 'In Stock', '2024-06-02 10:20:22'),
(48, 'Súp lơ xanh tươi Bhutan (kg)', 'image1715358141-Súp lơ xanh tươi Bhutan (kg).jpg', 124, 122, 1, 121, 'In Stock', '2024-05-25 07:02:24'),
(49, 'Táo đỏ xuất khẩu Canada (kg)', 'image1715358215-Táo đỏ xuất khẩu Canada (kg).jpg', 125, 333, 103, 330, 'In Stock', '2024-05-25 07:02:24'),
(50, 'Táo xanh ngọt chát México (kg)', 'image1715358314-Táo xanh ngọt chát México (kg).jpg', 126, 197, 100, 197, 'In Stocks', '2024-05-10 17:12:45'),
(51, 'Thanh long ruột đỏ Italia (kg)', 'image1715358382-Thanh long ruột đỏ Italia (kg).png', 127, 197, 1, 196, 'In Stock', '2024-05-14 02:50:53'),
(52, 'Tỏi cay Kazakhstan (kg)', 'image1715358456-Tỏi cay Kazakhstan (kg).png', 128, 197, 13, 184, 'In Stock', '2024-05-27 09:21:38'),
(54, 'Xoài cát chín cây miền tây (kg)', 'image1715358613-Xoài cát chín cây miền tây (kg).jpg', 130, 197, 0, 197, 'In Stocks', '2024-05-10 16:30:13'),
(55, 'Xoài xanh thơm Nepal (kg)', 'image1715358682-Xoài xanh thơm Nepal (kg).png', 131, 197, 2, 195, 'In Stock', '2024-05-27 09:21:38');

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
  `order_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shipping_fee` int(11) DEFAULT NULL,
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

INSERT INTO `orders` (`order_id`, `order_code`, `user_id`, `address`, `shipping_fee`, `phone`, `status`, `coupon_discount`, `total`, `note`, `checkout`, `created_at`) VALUES
(397, '27-12052024-142000', 27, 'gò vấp', 27000, '0987788611', 0, 0, 142000, NULL, 1, '2024-05-12 03:24:30'),
(398, '27-12052024-117000', 27, 'gò vấp', 27000, '0987788611', 1, 0, 117000, NULL, 1, '2024-05-12 03:42:43'),
(399, '27-13052024-211000', 27, 'gò vấp', 21000, '0987788611', 1, 0, 211000, NULL, 1, '2024-05-12 21:53:38'),
(400, '35-13052024-211000', 35, 'gvấpò', 21000, '0385273875', 1, 0, 211000, NULL, 1, '2024-05-12 21:55:32'),
(401, '27-14052024-1218600', 27, 'gò vấp', 22500, '0987788611', 1, 0, 1218600, NULL, 1, '2024-05-13 19:50:45'),
(402, '35-14052024-12636000', 35, 'gvấpò', 21000, '0385273875', 1, 0, 12636000, NULL, 1, '2024-05-13 20:10:20'),
(403, '36-14052024-10710000', 36, 'bình thạch', 15000, '0385273875', 1, 0, 10710000, NULL, 1, '2024-05-13 20:12:51'),
(404, '26-24052024-7013550', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 19500, '0935540795', 5, 10, 7013550, NULL, 0, '2024-05-24 11:29:33'),
(405, '26-25052024-13145500', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 19500, '0935540795', 0, 0, 13145500, NULL, 1, '2024-05-25 11:02:22'),
(406, '31-26052024-133000', 31, '285 Phạm Văn Chiêu, P.14, Quận Gò Vấp', 28500, '0935540795', 5, 0, 133000, NULL, 1, '2024-05-26 18:07:19'),
(407, '27-27052024-445800', 27, 'gò vấp', 21000, '0987788611', 0, 0, 445800, NULL, 1, '2024-05-27 13:21:35'),
(408, '27-27052024-438500', 27, 'gò vấp', 21000, '0987788611', 3, 0, 438500, NULL, 0, '2024-05-27 21:02:36'),
(409, '31-02062024-4445000', 31, '285 Phạm Văn Chiêu, P.14, Quận Gò Vấp', 28500, '0978533147', 6, 0, 4445000, NULL, 0, '2024-06-02 21:19:23'),
(410, '31-02062024-4445000', 31, '285 Phạm Văn Chiêu, P.14, Quận Gò Vấp', 28500, '0978533147', 0, 0, 4445000, NULL, 1, '2024-06-02 21:20:20'),
(411, '26-02062024-445000', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 0, '0935540795', 5, 0, 445000, NULL, 1, '2024-06-02 22:21:36'),
(412, '26-02062024-1198950', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 0, '0935540795', 5, 10, 1198950, NULL, 1, '2024-06-02 22:25:39'),
(413, '26-02062024-2400450', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 0, '0935540795', 5, 10, 2400450, NULL, 1, '2024-06-02 22:31:26'),
(414, '35-03062024-12600000', 35, 'gò vấp', 0, '0385273875', 0, 0, 12600000, NULL, 1, '2024-06-03 04:25:16'),
(415, '26-03062024-2401050', 26, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 0, '0935540795', 0, 10, 2401050, NULL, 1, '2024-06-03 17:29:19'),
(416, '35-06062024-270900', 35, 'gò vấp', 0, '0385273875', 5, 10, 270900, NULL, 1, '2024-06-06 11:41:51'),
(417, '35-06062024-270900', 35, 'gò vấp', 0, '0385273875', 5, 10, 270900, NULL, 1, '2024-06-06 11:55:02'),
(418, '35-06062024-301000', 35, 'gò vấp', 21000, '0385273875', 0, 0, 301000, NULL, 1, '2024-06-06 12:02:27'),
(419, '31-10062024-440550', 31, '285 Phạm Văn Chiêu, P.14, Quận Gò Vấp', 0, '0978533147', 0, 10, 440550, NULL, 1, '2024-06-10 14:01:57'),
(420, '42-25062024-149400', 42, 'Linh đông', 6000, '0374568505', 0, 10, 149400, NULL, 1, '2024-06-25 06:03:33'),
(421, '42-06072024-594000', 42, 'Số 6 Linh đông', 0, '0374568505', 0, 0, 594000, NULL, 1, '2024-07-06 16:27:05'),
(422, '42-06072024-1247000', 42, 'Quận 1', 0, '0374568505', 2, 0, 1247000, NULL, 0, '2024-07-06 16:52:34'),
(423, '42-06072024-1247000', 42, 'Quận 1', 0, '0374568505', 3, 0, 1247000, NULL, 0, '2024-07-06 16:52:34');

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
(343, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 404),
(344, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 405),
(345, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 406),
(346, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 407),
(347, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 408),
(348, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 409),
(349, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 410),
(350, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 411),
(351, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 412),
(352, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 413),
(353, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 414),
(354, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 415),
(355, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 416),
(356, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 417),
(356, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 418),
(357, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 419),
(357, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 420),
(358, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 421),
(358, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 422),
(359, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 423),
(359, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 424),
(360, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 425),
(360, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 426),
(361, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 427),
(361, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 428),
(362, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 429),
(362, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 430),
(363, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 431),
(363, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 432),
(364, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 433),
(364, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 434),
(365, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 435),
(365, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 436),
(366, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 437),
(366, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 438),
(367, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 439),
(367, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 440),
(368, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 441),
(368, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 442),
(369, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 443),
(369, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 444),
(370, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 445),
(370, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 446),
(371, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 447),
(371, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 448),
(372, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 449),
(372, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 450),
(372, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 96, 1, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 451),
(373, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 452),
(373, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 453),
(373, 'Nho Pháp thượng hạng (kg)', 150000, 1, 150000, 96, 1, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 454),
(374, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 455),
(374, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 456),
(374, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 457),
(375, 'Hồng đỏ Nam Mỹ (kg)', 190000, 2, 380000, 11, 1, 'hongdomy.png', 458),
(376, 'Bánh kem bơ Pháp', 620000, 1, 620000, 1, 2, 'banhkembophap.jpg', 459),
(376, 'Bánh kem dâu Ý', 1200000, 1, 1200000, 5, 2, 'banhkemdau.jpg', 460),
(376, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 461),
(377, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 462),
(377, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 463),
(377, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 464),
(378, 'Chanh tươi Irag (kg)', 250000, 1, 250000, 3, 3, 'chanhtuoiirag.png', 465),
(378, 'Cà tím Châu Phi (kg)', 120000, 1, 120000, 7, 3, 'catim.jpg', 466),
(378, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 467),
(379, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 468),
(380, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 469),
(381, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 470),
(382, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 471),
(382, 'Dâu tây đỏ ngọt (kg)', 100000, 1, 100000, 18, 1, 'dautay.png', 472),
(383, 'Dâu tây đỏ ngọt (kg)', 100000, 10, 1000000, 18, 1, 'dautay.png', 473),
(383, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 474),
(383, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 475),
(383, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 476),
(383, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 477),
(383, 'Dưa leo Ấn Độ (kg)', 50000, 1, 50000, 13, 3, 'dualeoando.png', 478),
(383, 'Ớt chuông đỏ (kg)', 60000, 1, 60000, 23, 3, 'otchuongdo.png', 479),
(384, 'Dâu tây đỏ ngọt (kg)', 100000, 10, 1000000, 18, 1, 'dautay.png', 480),
(384, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 481),
(384, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 482),
(384, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 483),
(385, 'Dâu tây đỏ ngọt (kg)', 100000, 10, 1000000, 18, 1, 'dautay.png', 484),
(385, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 485),
(385, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 486),
(385, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 487),
(386, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 488),
(386, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 489),
(386, 'Bánh kem dâu Ý', 1200000, 3, 3600000, 5, 2, 'banhkemdau.jpg', 490),
(387, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 491),
(387, 'Bánh kem Matcha', 600000, 1, 600000, 22, 2, 'banhkemmatcha.jpg', 492),
(387, 'Nho Pháp thượng hạng (kg)', 150000, 2, 300000, 96, 1, 'image1702303842-Nho Pháp thượng hạng (kg).jpg', 493),
(388, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 494),
(388, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 495),
(389, 'Ho Duy Hoang', 1231233, 10, 12312330, 102, 1, 'image1713486451-Ho Duy Hoang.png', 496),
(390, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 497),
(391, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 498),
(392, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 499),
(393, 'Kiwi ngọt Brazil (kg)', 280000, 1, 280000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 500),
(394, 'Kiwi ngọt Brazil (kg)', 280000, 9, 2520000, 97, 1, 'image1702303861-Kiwi ngọt Brazil (kg).png', 501),
(395, 'Bánh kem Matcha Nho', 870000, 1, 870000, 12, 2, 'banhkemnhomatcha.jpg', 502),
(396, 'Kiwi ngọt Brazil (kg)', 280000, 10, 2800000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 503),
(396, 'Bánh kem Matcha Nho', 870000, 10, 8700000, 12, 2, 'banhkemnhomatcha.jpg', 504),
(396, 'Bánh kem bơ Pháp', 620000, 10, 6200000, 1, 2, 'banhkembophap.jpg', 505),
(396, 'Cải thìa Triều Tiên (kg)', 70000, 10, 700000, 53, 3, 'caithia.png', 506),
(396, 'Cà chua Nhật Bản (kg)', 110000, 10, 1100000, 55, 3, 'cachua.png', 507),
(396, 'Ớt chuông đỏ (kg)', 60000, 10, 600000, 23, 3, 'otchuongdo.png', 508),
(396, 'Vải thiều loại to (kg)', 85000, 10, 850000, 21, 1, 'vaithieuloaito.png', 509),
(396, 'Dâu tây đỏ ngọt (kg)', 100000, 10, 1000000, 18, 1, 'dautay.png', 510),
(397, 'Tỏi cay Kazakhstan (kg)', 115000, 1, 115000, 128, 3, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 511),
(398, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 512),
(399, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 513),
(400, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 514),
(401, 'Bánh kem cặp đôi cute', 357500, 1, 357500, 104, 2, 'image1715345866-Bánh kem cặp đôi cute.png', 515),
(401, 'Thanh long ruột đỏ (kg)', 421200, 1, 421200, 127, 1, 'image1715358382-Thanh long ruột đỏ Italia (kg).png', 516),
(401, 'Tỏi cay Kazakhstan (kg)', 115000, 1, 115000, 128, 3, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 517),
(401, 'Xoài xanh thơm Nepal (kg)', 324900, 1, 324900, 131, 1, 'image1715358682-Xoài xanh thơm Nepal (kg).png', 518),
(402, 'Bánh kem Matcha Nho', 870000, 10, 8700000, 12, 2, 'banhkemnhomatcha.jpg', 519),
(402, 'Chanh tươi Irag (kg)', 300000, 10, 3000000, 3, 3, 'chanhtuoiirag.png', 520),
(402, 'Cà tím Châu Phi (kg)', 93600, 10, 936000, 7, 3, 'catim.jpg', 521),
(403, 'Nho Pháp thượng hạng (kg)', 348500, 10, 3485000, 96, 1, 'image1715349937-Nho Pháp thượng hạng (kg).png', 522),
(403, 'Kiwi ngọt Brazil (kg)', 280000, 10, 2800000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 523),
(403, 'Vải thiều loại to (kg)', 85000, 10, 850000, 21, 1, 'vaithieuloaito.png', 524),
(403, 'Bánh kem cặp đôi cute', 357500, 10, 3575000, 104, 2, 'image1715345866-Bánh kem cặp đôi cute.png', 525),
(404, 'Táo đỏ Canada (kg)', 390000, 3, 1170000, 125, 1, 'image1715359625-Táo đỏ xuất khẩu Canada (kg).jpg', 526),
(404, 'Lượu đỏ ngọt Lào (kg)', 720000, 5, 3600000, 123, 1, 'image1715359689-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 527),
(404, 'Dừa tươi mọng nước (kg)', 185000, 5, 925000, 118, 1, 'image1715359376-Dừa tươi mọng nước Thái Lan (kg).png', 528),
(404, 'Tỏi cay Kazakhstan (kg)', 115000, 10, 1150000, 128, 3, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 529),
(404, 'Súp lơ tươi Bhutan (kg)', 420000, 1, 420000, 124, 3, 'image1715358141-Súp lơ xanh tươi Bhutan (kg).jpg', 530),
(404, 'Khổ qua Singapore (kg)', 530000, 1, 530000, 122, 3, 'image1715360723-Khổ qua Singapore (kg).jpg', 531),
(405, 'Cherry Campuchia (kg)', 760000, 2, 1520000, 114, 1, 'image1715359203-Cherry đỏ ngọt Campuchia.jpg', 532),
(405, 'Dưa hấu đỏ Long An (kg)', 184500, 2, 369000, 116, 1, 'image1715359388-Dưa hấu đỏ Long An (kg).png', 533),
(405, 'Kiwi ngọt Brazil (kg)', 280000, 10, 2800000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 534),
(405, 'Vải thiều loại to (kg)', 85000, 1, 85000, 21, 1, 'vaithieuloaito.png', 535),
(405, 'Dưa hấu ruột vàng Úc (kg)', 266500, 1, 266500, 117, 1, 'image1715359063-Dưa hấu ruột vàng Châu Phi (kg).jpg', 536),
(405, 'Cam tươi Trung Quốc (kg)', 310000, 1, 310000, 113, 1, 'image1715359193-Cam tươi Trung Quốc (kg).jpg', 537),
(405, 'Táo đỏ Canada (kg)', 390000, 3, 1170000, 125, 1, 'image1715359625-Táo đỏ xuất khẩu Canada (kg).jpg', 538),
(405, 'Lượu đỏ ngọt Lào (kg)', 720000, 5, 3600000, 123, 1, 'image1715359689-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 539),
(405, 'Dừa tươi mọng nước (kg)', 185000, 5, 925000, 118, 1, 'image1715359376-Dừa tươi mọng nước Thái Lan (kg).png', 540),
(405, 'Tỏi cay Kazakhstan (kg)', 115000, 10, 1150000, 128, 3, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 541),
(405, 'Súp lơ tươi Bhutan (kg)', 420000, 1, 420000, 124, 3, 'image1715358141-Súp lơ xanh tươi Bhutan (kg).jpg', 542),
(405, 'Khổ qua Singapore (kg)', 530000, 1, 530000, 122, 3, 'image1715360723-Khổ qua Singapore (kg).jpg', 543),
(406, 'Cải thìa Triều Tiên (kg)', 104500, 1, 104500, 53, 3, 'caithia.png', 544),
(407, 'Tỏi cay Kazakhstan (kg)', 138000, 1, 138000, 128, 3, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 545),
(407, 'Xoài xanh thơm Nepal (kg)', 307800, 1, 307800, 131, 1, 'image1715358682-Xoài xanh thơm Nepal (kg).png', 546),
(408, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 547),
(408, 'Nho Pháp thượng hạng (kg)', 348500, 1, 348500, 96, 1, 'image1715349937-Nho Pháp thượng hạng (kg).png', 548),
(409, 'Kiwi ngọt Brazil (kg)', 160000, 2, 320000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 549),
(409, 'Bánh kem Nhật Bản', 445000, 4, 1780000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 550),
(409, 'Lượu đỏ ngọt Lào (kg)', 720000, 3, 2160000, 123, 1, 'image1715359689-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 551),
(409, 'Dừa tươi mọng nước (kg)', 185000, 1, 185000, 118, 1, 'image1715359376-Dừa tươi mọng nước Thái Lan (kg).png', 552),
(410, 'Kiwi ngọt Brazil (kg)', 160000, 2, 320000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 553),
(410, 'Bánh kem Nhật Bản', 445000, 4, 1780000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 554),
(410, 'Lượu đỏ ngọt Lào (kg)', 720000, 3, 2160000, 123, 1, 'image1715359689-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 555),
(410, 'Dừa tươi mọng nước (kg)', 185000, 1, 185000, 118, 1, 'image1715359376-Dừa tươi mọng nước Thái Lan (kg).png', 556),
(411, 'Bánh kem Nhật Bản', 445000, 1, 445000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 557),
(412, 'Bánh kem Nhật Bản', 445000, 3, 1335000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 558),
(413, 'Bánh kem Nhật Bản', 445000, 6, 2670000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 559),
(414, 'Bánh kem Matcha Nho', 870000, 10, 8700000, 12, 2, 'banhkemnhomatcha.jpg', 560),
(415, 'Bánh kem Nhật Bản', 445000, 6, 2670000, 108, 2, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 561),
(416, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 562),
(416, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 563),
(417, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 564),
(417, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 565),
(418, 'Hồng đỏ Nam Mỹ (kg)', 190000, 1, 190000, 11, 1, 'hongdomy.png', 566),
(418, 'Chanh dây Nga tươi (kg)', 90000, 1, 90000, 16, 1, 'chanhday.png', 567),
(419, 'Cherry Campuchia (kg)', 489500, 1, 489500, 114, 1, 'image1715359203-Cherry đỏ ngọt Campuchia.jpg', 568),
(420, 'Kiwi ngọt Brazil (kg)', 160000, 1, 160000, 103, 1, 'image1715327867-Kiwi ngọt Brazil (kg).png', 569),
(421, 'Nho Pháp thượng hạng (kg)', 104500, 1, 104500, 96, 1, 'image1715349937-Nho Pháp thượng hạng (kg).png', 570),
(421, 'Cherry Campuchia (kg)', 489500, 1, 489500, 114, 1, 'image1715359203-Cherry đỏ ngọt Campuchia.jpg', 571),
(422, 'Bánh kem bơ Pháp', 348500, 2, 697000, 1, 2, 'banhkembophap.jpg', 572),
(423, 'Bánh kem bơ Pháp', 348500, 2, 697000, 1, 2, 'banhkembophap.jpg', 573),
(422, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 574),
(423, 'Bánh kem Táo Hàn Quốc', 550000, 1, 550000, 17, 2, 'banhkemtao.jpg', 575);

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
(340, 4131000, 'NCB', '340', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
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
(340, 4131000, 'NCB', '340', 'ATM', 'Thanh toán thành công', '2023-12-16 19:28:40'),
(395, 870000, 'NCB', '395', 'ATM', 'Thanh toán thành công', '2024-04-19 03:04:10'),
(404, 7013550, 'NCB', '404', 'ATM', 'Thanh toán thành công', '2024-05-24 07:30:42'),
(408, 438500, 'NCB', '408', 'ATM', 'Thanh toán thành công', '2024-05-27 21:03:36'),
(409, 4445000, 'VNPAY', '409', 'QRCODE', 'Thanh toán thất bại', '2024-06-02 21:19:29'),
(423, 1247000, 'NCB', '423', 'ATM', 'Thanh toán thành công', '2024-07-06 16:57:08');

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
(96, 'Nho Pháp thượng hạng (kg)', 18, 1, 190000, 348500, 'image1715349937-Nho Pháp thượng hạng (kg).png', 'Loại nho Pháp thượng hạng này được Napoleon cho trồng vào giữa thế kỷ XVII và thịnh hành đến bây giờ. Được mình nhập khẩu chui về bán cho bạn ăn<br>', 1, '2023-12-11 14:07:51'),
(23, 'Ớt chuông đỏ (kg)', 18, 3, 240000, 60000, 'otchuongdo.png', 'Ớt chuông đỏ cung cấp nhiều Vitamin D. Loại này ít cay nhưng ngon khi xào chung với Mực', 1, '2022-11-18 08:20:15'),
(22, 'Bánh kem Matcha', 18, 2, 890000, 390000, 'banhkemmatcha.jpg', 'Bánh kem matcha trà xanh, cực kỳ thơm ngon. Được khá nhiều người ưa chuộng', 1, '2022-11-18 08:22:01'),
(17, 'Bánh kem Táo Hàn Quốc', 18, 2, 1120000, 550000, 'banhkemtao.jpg', 'Bánh kem táo Hàn Quốc siêu đẹp và ngon', 0, '2022-11-18 08:21:15'),
(18, 'Dâu tây đỏ ngọt (kg)', 18, 1, 160000, 100000, 'dautay.png', 'Loại dâu tây này siêu ngọt và thơm. Ăn ngon nhé bạn', 1, '2022-11-18 08:21:01'),
(21, 'Vải thiều loại to (kg)', 18, 1, 140000, 85000, 'vaithieuloaito.png', 'Vải thiều loại to, tươi mới mỗi ngày. Cung cấp Vitamin tốt cho sức khỏe', 1, '2022-11-18 08:20:52'),
(16, 'Chanh dây Nga tươi (kg)', 18, 1, 120000, 90000, 'chanhday.png', 'Loại chanh dây đặc biệt này chỉ trồng được ở nước Hàn Đới như Nga, nên đừng thắc ắc giá cả. Mua ăn liền đi nhé!!!', 1, '2022-11-18 08:21:23'),
(13, 'Dưa leo Ấn Độ (kg)', 18, 3, 120000, 72000, 'dualeoando.png', 'Dưa leo Ấn Độ chỉ được trồng ở Ấn Độ. Không xuất khẩu, nay có ở Việt Nam nhờ tui buôn l*u. Mua ăn đi nhé!!!', 1, '2022-11-18 08:21:34'),
(12, 'Bánh kem Matcha Nho', 18, 2, 990000, 870000, 'banhkemnhomatcha.jpg', 'Sản phẩm tốt với giá thành rẻ. Ngon mà đẹp, thích hợp với sinh viên', 1, '2022-11-18 08:21:53'),
(11, 'Hồng đỏ Nam Mỹ (kg)', 18, 1, 225000, 190000, 'hongdomy.png', 'Hồng đỏ tươi Nam Mỹ, cung cấp nhiều khoáng chất tốt cho cơ thể', 1, '2022-11-18 08:22:12'),
(7, 'Cà tím Châu Phi (kg)', 18, 3, 180000, 90000, 'catim.jpg', 'Loại cà tím Châu Phi này to thì khỏi phải nói :)). Ăn thì cũng ngon, làm ngất ngây bao nhiêu chị em. Mua ăn thử bạn nhé', 1, '2022-11-18 08:22:20'),
(5, 'Bánh kem dâu Ý', 18, 2, 1600000, 800000, 'banhkemdau.jpg', 'Xuất xứ từ Ý, du nhập Việt Nam năm 2022. Mới lạ và đang là xu hướng', 0, '2022-11-18 08:22:28'),
(3, 'Chanh tươi Irag (kg)', 18, 3, 500000, 300000, 'chanhtuoiirag.png', 'Loại tranh xuất xứ từ những anh Iran, Irag đẹp trai. Khủng b*, nên chanh này ăn ngon và hấp dẫn. Tận hưởng những phút giây như bị kh**g bố khi ăn nó', 0, '2022-11-18 08:22:41'),
(55, 'Cà chua Nhật Bản (kg)', 18, 3, 160000, 110000, 'cachua.png', 'Do Thiên Hoàng Minh Trị trồng từ thời chiến tranh thế giới thứ 2. Đặc biệt loại này không dính phóng xạ nên ăn bổ lắm nha.', 0, '2022-11-18 08:19:46'),
(54, 'Cà rốt Bắc Mỹ (kg)', 18, 3, 180000, 120000, 'carot.png', 'Cà rốt Bắc Mỹ do ông Donald Trump đích thân trồng tại nông trại. Không qua bất cứ máy móc và hóa chất. Nên rất ngon và đắt', 1, '2022-11-18 08:19:55'),
(53, 'Cải thìa Triều Tiên (kg)', 18, 3, 190000, 104500, 'caithia.png', 'Cải thìa Triều Tiên do ông Kim trồng ăn rất ngon nhé. Mua ăn thử đi biết', 1, '2022-11-18 08:20:02'),
(1, 'Bánh kem bơ Pháp', 18, 2, 850000, 348500, 'banhkembophap.jpg', 'Vẫn sở hữu phần cốt bánh bông lan xốp mịn, điều làm cho những chiếc bánh kem này trở nên đặc biệt và cuốn hút nằm ở phần kem bơ.\n\nKem bơ Pháp được làm từ những nguyên liệu gồm lòng đỏ trứng, syrup đường và bơ lạt. Nhờ sử dụng thêm lòng đỏ trứng, thành phẩm kem bơ sẽ có hương vị cực kì thơm ngon, mềm mượt và tan ngay khi vào miệng.\n\nNhững người thợ tài hoa của Grand Castella còn tận dụng phần kem bơ này, sáng tạo nên những hình ảnh trang trí độc đáo, giúp chiếc bánh kem đã ngon nay trở nên xinh đẹp hơn.', 0, '2021-10-22 04:15:10'),
(104, 'Bánh kem cặp đôi cute', 18, 2, 650000, 325000, 'image1715345866-Bánh kem cặp đôi cute.png', 'Bánh kem dành cho các cặp đôi yêu nhau, tặng nhau những ngày ý nghĩa, ngày lễ, ngày kỷ niệm... Với thiết kế dễ thương và hương vị đặc biệt thơm ngon', 1, '2024-05-10 12:57:46'),
(103, 'Kiwi ngọt Brazil (kg)', 18, 1, 320000, 160000, 'image1715327867-Kiwi ngọt Brazil (kg).png', 'Kiwi được hái từ trong rừng Amazon tại Brazil, hương vị phải nói là ngây ngất lòng người, ăn 1 lần là lần sau khỏi ăn luôn', 1, '2024-05-10 07:57:47'),
(105, 'Bánh kem cho bé', 18, 2, 450000, 350000, 'image1715345948-Bánh kem cho bé.png', 'Bánh kem dành cho những bé nhỏ với thiết kế dễ thương, phong cách Hàn Quốc', 0, '2024-05-10 12:59:08'),
(106, 'Bánh kem KitKat', 18, 2, 890000, 445000, 'image1715346040-Bánh kem Chocolate KitKat.png', 'Bánh kem với vị ngon đặc trưng của Socola và được tạo một cách tỉ mỉ theo phong cách của thương hiệu KitKat', 1, '2024-05-10 13:00:40'),
(107, 'Bánh kem sữa béo ngậy', 18, 2, 670000, 301500, 'image1715346106-Bánh kem sữa thơm ngon béo ngậy.png', 'Bánh kem gồm hương vị sữa + phô mai thơm ngon béo ngậy', 1, '2024-05-10 13:01:46'),
(108, 'Bánh kem Nhật Bản', 18, 2, 890000, 780000, 'image1715346190-Bánh kem phong cách đơn giản Nhật Bản.png', 'Bánh kem theo phong cách Nhật Bản, thiết kế đơn giản nhưng rất thơm ngon, khiến khách hàng ăn 1 lần là nhớ cả đời', 1, '2024-05-10 13:03:10'),
(109, 'Bắp Indonesia (kg)', 18, 3, 120000, 78000, 'image1715360800-Bắp Indonesia (kg).jpg', 'Bắp này được trồng ở Indo, với từng hạt ngon ngọt, thơm nứt mũi', 0, '2024-05-10 15:56:28'),
(110, 'Bắp cải trắng Malaysia (kg)', 18, 3, 250000, 210000, 'image1715356698-Bắp cải trắng Malaysia (kg).jpg', 'Bắp cải trắng tốt cho sức khỏe, cung cấp nhiều khoáng chất cho cơ thể được nhập khẩu từ Malaysia', 0, '2024-05-10 15:58:18'),
(111, 'Bí ngô Nam Mỹ (kg)', 18, 3, 380000, 360000, 'image1715360756-Bí ngô Nam Mỹ (kg).png', 'Loại bị ngô này chỉ được tìm thấy ở các nước Mỹ La Tinh, rất quý hiếm, không dễ gì mà có được', 0, '2024-05-10 15:59:23'),
(112, 'Bơ sáp Tây Nguyên (kg)', 18, 1, 560000, 490000, 'image1715359181-Bơ sáp Tây Nguyên (kg).jpg', 'Vẫn là Tây Nguyên với những thực phẩm bổ dưỡng được trồng nên từ đất đỏ Bazan, loại bơ này được cho là ngon nhất tại Việt Nam, xuất khẩu thị trường quốc tế', 1, '2024-05-10 16:01:14'),
(113, 'Cam tươi Trung Quốc (kg)', 18, 1, 340000, 310000, 'image1715359193-Cam tươi Trung Quốc (kg).jpg', 'Loại cam được trồng ở đất nước tỷ dân, không thiếu người chăm bón nên về độ ngon thì không cần bàn cãi', 0, '2024-05-10 16:03:18'),
(114, 'Cherry Campuchia (kg)', 18, 1, 890000, 489500, 'image1715359203-Cherry đỏ ngọt Campuchia.jpg', 'Loại Cherry đỏ ngọt được trồng và xuất khẩu tại Campuchia, có thể nói loại trái cây này chỉ dành cho những giới thượng lưu :))', 1, '2024-05-10 16:04:35'),
(115, 'Đậu Hà Lan Brunei (kg)', 18, 3, 210000, 180000, 'image1715357176-Đậu Hà Lan Brunei (kg).jpg', 'Đậu Hà Lan là loại đậu hạt tròn thuộc Chi Đậu Hà Lan, dùng làm thực phẩm. Đây là loài thực vật một năm, được trồng theo vụ vào mùa có khí hậu mát mẻ tại nhiều nơi trên thế giới.', 0, '2024-05-10 16:06:16'),
(116, 'Dưa hấu đỏ Long An (kg)', 18, 1, 450000, 184500, 'image1715359388-Dưa hấu đỏ Long An (kg).png', 'Đặc sản Long An, dưa hấu đỏ chứa nhiều khoáng chất &amp; vitamin', 0, '2024-05-10 16:07:28'),
(117, 'Dưa hấu ruột vàng Úc (kg)', 18, 1, 650000, 266500, 'image1715359063-Dưa hấu ruột vàng Châu Phi (kg).jpg', 'Dưa hấu ruột vàng có nguồn gốc từ Châu Phi, thuộc họ bầu bí. Loại dưa hấu này có vỏ mỏng, cứng, ruột nhiều nước nên thường được lựa chọn để giải nhiệt', 1, '2024-05-10 16:09:00'),
(118, 'Dừa tươi mọng nước (kg)', 18, 1, 240000, 185000, 'image1715359376-Dừa tươi mọng nước Thái Lan (kg).png', 'Tốt cho hệ tiêu hóa và hệ miễn dịch. Không chỉ đẹp dáng, đẹp da, tốt cho tim mạch mà dừa tươi còn tốt cho hệ tiêu hóa cũng như hệ miễn dịch của chúng ta', 0, '2024-05-10 16:10:26'),
(119, 'Hành tím Myanmar (kg)', 18, 3, 150000, 120000, 'image1715357658-Hành tím Myanmar (kg).jpg', 'Trong hành tím có chứa các thành phần dinh dưỡng mang lại nhiều lợi ích sức khỏe như điều trị huyết áp cao, tăng tiết sữa mẹ, giảm rụng tóc', 1, '2024-05-10 16:14:18'),
(120, 'Khoai tây Phillipines (kg)', 18, 3, 456000, 440000, 'image1715360742-Khoai tây Phillipines (kg).png', 'Khoai tây là loại củ mọc ngầm trên rễ của cây khoai tây, có tên tiếng Anh là Solanum tuberosum. Loại cây này thuộc bộ Cà, có liên quan đến cây cà chua và thuốc lá', 0, '2024-05-10 16:16:03'),
(121, 'Măng cục Châu Úc (kg)', 18, 1, 850000, 760000, 'image1715359474-Măng cục Châu Úc (kg).jpg', 'Măng cụt là một loại trái cây nhiệt đới, có vị hơi ngọt và chua. Loại quả này được tìm thấy đầu tiên ở Đông Nam Á và xuất hiện tại nhiều nước nhiệt đới khác. Măng cụt có màu tím đậm, vỏ cứng, phần thịt bên trong mọng nước màu trắng', 1, '2024-05-10 16:17:48'),
(122, 'Khổ qua Singapore (kg)', 18, 3, 560000, 530000, 'image1715360723-Khổ qua Singapore (kg).jpg', 'Khổ qua hay mướp đắng với nhiều tên gọi được liệt kê bên dưới, là một loài thực vật thân thảo nhiệt đới và cận nhiệt đới thuộc họ Cucurbitaceae, được trồng rộng rãi ở châu Á, châu Phi và vùng Caribe để trồng lấy quả ăn được, nhồi thịt thì hết sẩy', 0, '2024-05-10 16:19:02'),
(123, 'Lượu đỏ ngọt Lào (kg)', 18, 1, 780000, 720000, 'image1715359689-Lượu đỏ ngọt mọng nước Lào (kg).jpg', 'Hỗ trợ trị rối loạn cương dương. Tác dụng của nước ép lựu trong việc cải thiện khả năng tình dục ở nam giới đã được chứng minh.&nbsp; Đồng thời vị của quả này rất ngon ngọt', 0, '2024-05-10 16:20:36'),
(124, 'Súp lơ tươi Bhutan (kg)', 18, 3, 550000, 420000, 'image1715358141-Súp lơ xanh tươi Bhutan (kg).jpg', 'Bông cải trắng hay còn gọi là súp lơ, hay su lơ, bắp su lơ, hoa lơ, cải hoa hay cải bông trắng là một loại cải ăn được, thuộc loài Brassica oleracea, họ Cải, mọc quanh năm, gieo giống bằng hạt. Được trồng tại quốc gia chủ trương ăn chay theo tinh thần Phật giáo', 0, '2024-05-10 16:22:21'),
(125, 'Táo đỏ Canada (kg)', 18, 1, 650000, 390000, 'image1715359625-Táo đỏ xuất khẩu Canada (kg).jpg', 'Táo đỏ chứa 19 loại axit amin, trong đó 8 loại axit amin thiết yếu cho cơ thể con người mỗi ngày. Ngoài ra, còn chứa một lượng lớn vitamin A, phức hợp vitamin B, C và E', 1, '2024-05-10 16:23:35'),
(126, 'Táo xanh México (kg)', 18, 1, 550000, 302500, 'image1715359612-Táo xanh ngọt chát México (kg).jpg', 'Táo này có thể giúp kích thích tiêu hóa, phòng ngừa táo bón. Lượng chất xơ dồi dào trong táo có tác dụng nhuận tràng cực tốt.', 1, '2024-05-10 16:25:14'),
(127, 'Thanh long ruột đỏ (kg)', 18, 1, 780000, 710000, 'image1715358382-Thanh long ruột đỏ Italia (kg).png', 'Thanh long ruột đỏ cung cấp vitamin, khoáng chất giúp tăng cường sức khỏe, đẩy lùi bệnh tật. Ăn thanh long đỏ cũng giúp thải độc cơ thể', 0, '2024-05-10 16:26:22'),
(128, 'Tỏi cay Kazakhstan (kg)', 18, 3, 230000, 115000, 'image1715360710-Tỏi cay Kazakhstan (kg).png', 'Phòng ngừa các bệnh tim mạch. Tỏi có tác dụng hạ mức cholesterol xấu và tăng lượng cholesterol tốt trong cơ thể, giúp loại bỏ các mảnh xơ vữa', 0, '2024-05-10 16:27:36'),
(131, 'Xoài xanh thơm Nepal (kg)', 18, 1, 570000, 285000, 'image1715358682-Xoài xanh thơm Nepal (kg).png', 'Xoài xanh là một phương thuốc tự nhiên tuyệt vời để điều trị các vấn đề về đường tiêu hóa. Nó kích thích sự tiết dịch tiêu hóa', 0, '2024-05-10 16:31:22'),
(130, 'Xoài chín cây miền tây (kg)', 18, 1, 380000, 228000, 'image1715359760-Xoài cát chín cây miền tây (kg).jpg', 'Xoài cát Hòa Lộc là giống xoài đặc sản nổi tiếng của vùng đất Định Tường, một trong những loại trái cây chủ lực của Tiền Giang', 0, '2024-05-10 16:30:13');

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
-- Cấu trúc bảng cho bảng `star_rating`
--

CREATE TABLE `star_rating` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `star_rating`
--

INSERT INTO `star_rating` (`user_id`, `product_id`, `star`, `id`, `updated_at`, `created_at`) VALUES
(27, 11, 3, 12, '2024-05-12 21:54:48', '2024-05-12 21:54:12'),
(35, 11, 5, 13, '2024-05-12 21:58:10', '2024-05-12 21:58:10'),
(26, 128, 5, 14, '2024-05-25 11:11:37', '2024-05-25 11:11:37'),
(27, 128, 5, 15, '2024-05-25 11:14:57', '2024-05-25 11:14:57'),
(26, 108, 1, 16, '2024-06-02 23:03:29', '2024-06-02 23:03:29'),
(42, 103, 1, 17, '2024-06-25 06:09:20', '2024-06-25 06:06:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `status`
--

INSERT INTO `status` (`id`, `status`, `status_name`) VALUES
(1, 0, 'Đang gói hàng'),
(2, 1, 'Đã giao hàng'),
(3, 2, 'Đang thanh toán'),
(4, 3, 'Đã thanh toán'),
(5, 4, 'Đang giao hàng'),
(6, 5, 'Đơn đã hủy'),
(7, 6, 'Đã hủy thanh toán');

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
(27, 'image1702269401-.jpg', 'Quang', 'Đàm', 'quang@gmail.com', 987788611, 'gò vấp', 'quang', '$2y$10$TyLhloLXh5KOxQNsKCDdUOnJJL5YrwjjHzCjyyt0Cy6yAusNNUqkO', 1),
(26, 'admin.jpg', 'Hoang', 'Ho', 'duyhoang04244@gmail.com', 935540795, '15 An Nhơn, Phường 17, Quận Gò Vấp, Tp. Hồ Chí Minh', 'hoang', '$2y$10$p50TzDlT4qiLWvfQzdzgSObw.BrKBb.oXQSeAZH0zL0C4nS1SaZlO', 1),
(30, 'image1702272187-.jpg', 'DIP', 'TRUONG', 'khanhdip@gmail.com', 917123456, '', 'khanhdip', '$2y$10$80OkmsUOqH3nA/2ZOuQdbevVvK1MdNxIf.N6wSHV39Fw2qDiMsRGe', 2),
(31, 'image1702455768-.png', 'Mới', 'Khách Hàng', 'utal2322ik.com@gmail.com', 978533147, '285 Phạm Văn Chiêu, P.14, Quận Gò Vấp', 'customer', '$2y$10$aPTKp8xNV5eiNkNespMnJ.KF9H693WxQDTPAwd886R4AVQfhTR8YK', 2),
(33, 'image1702616800-.png', 'Hoang', 'Ho', 'utalik.com@gmail.com', 84935540795, '566/72/63R Nguyen Thai Son, Phuong 5, Quan Go Vap', 'user', '$2y$10$OXwsJxowRh6Kl8Z1FX1eK.RkRyEGdoUOzYn06l2wTKXuLaCeJtTIO', 2),
(34, NULL, 'Hoang', 'Ho', 'ut213123alik.com@gmail.com', 84935540795, NULL, '123123', '$2y$10$YeuYnbpiTHVvOrmMNA.bT.smQ7OG/pbiObahbl9RSfHhpOvYDIh7i', 2),
(35, 'image1710856912-.jpg', 'Shin123', 'Quang', 'damquang149@gmail.com', 385273875, 'gò vấp', 'customer1', '$2y$10$VrD0g6KrsLDavP/BuWfWTuPQUOYsiblAdEehlqFI0CfQHvrwHdw.a', 2),
(36, 'image1710867857-.jpg', 'Nguyen Van', 'A', 'damquang14911112@gmail.com', 385273875, 'bình thạch', 'customer2', '$2y$10$YBrW2RIWtR1564i7oz8g3O.koDhZg/PgMFhspvm8QCGUbkmvV.bJC', 2),
(38, 'avatar1.png', 'Nguyen Van', 'B', 'damquang14911113@gmail.com', 385273875, NULL, 'customer3', '$2y$10$8J.6r6HPYVdxCQhm0BK4R.pgQZVQNNIFYM85RL8PX5qcShyotLY/q', 2),
(39, 'avatar1.png', 'sin', 'sin', 'damquang123@gmail.com', 374568503, NULL, 'test123', '$2y$10$E00PL0fo9MqTq2QEv.Nn6O0uH8qSysOLWuw2f3EhrARGMNGTW5OmW', 2),
(40, NULL, 'sin', 'shinro', 'damquang111@gmail.com', 374568503, NULL, 'sinsin', '$2y$10$T7yhZlAvJDdPFdnawNHt.OOUlUO9v.gbtGp0EnVIZWaijpyC8aCwu', 2),
(41, 'avatar1.png', 'd', 'd', 'damquang149@gmail.com123', 123, NULL, 'customer12', '$2y$10$lHzxEIHxHMEcXChZzz/NGeIVqweCU0qlwD2Q4byh1h.xS/HrCsxTK', 2),
(42, 'image1719255945-.jpg', 'Đàm Vinh', 'Quang', 'dquang11998@gmail.com', 374568505, 'Quận 1', 'quangnew', '$2y$10$k5wAHiw6RI6yexa5Jh54Wu4S2iznM0l/EEMJvh4WJ4AOLuLsvEptW', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`,`coupon_code`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`),
  ADD KEY `coupon_type` (`coupon_type`);

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
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `flash_sales`
--
ALTER TABLE `flash_sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`inventory_id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `manu_id` (`manu_id`);

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
-- Chỉ mục cho bảng `star_rating`
--
ALTER TABLE `star_rating`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `email_lists`
--
ALTER TABLE `email_lists`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `flash_sales`
--
ALTER TABLE `flash_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `inventories`
--
ALTER TABLE `inventories`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderdetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=576;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `star_rating`
--
ALTER TABLE `star_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
