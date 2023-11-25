-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2023 lúc 03:15 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandoan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `image`, `First_name`, `Last_name`, `email`, `phone`, `username`, `password`, `role_id`) VALUES
(1, 'admin.jpg', 'Hồ ', 'Duy Hoàng', '', 935540795, 'hoang', '202cb962ac59075b964b07152d234b70', 1),
(14, 'avatar3.jpg', 'Nguyễn ', 'Quốc Huy', '', 123456, 'huy', '202cb962ac59075b964b07152d234b70', 2),
(17, NULL, 'Đàm ', 'Vinh Quang', '', 999777333, 'quang', '202cb962ac59075b964b07152d234b70', 1),
(18, 'avatar7.png', 'quang1', 'dam1', 'damquang149@gmail.com', 374568503, 'vipz111', '$2y$10$tn02J7KA3ilsVB1YhjBnXuHd/lD0.CzEx0PrPOqeLFHRMfOXRSxBW', 2),
(19, NULL, 'Quang', 'shinro', 'damquang1491@gmail.com', 385273875, 'shin', '$2y$10$pharB.we1uwLZ3LKyFWW4OZkreEf5olgzbibXj1xnt.1zdTFtHD0q', 2),
(20, NULL, 'Quang', 'shinro', 'damquang1492@gmail.com', 385273875, 'shin123', '$2y$10$Migx4ZM6yjxc3OgD81Bk.eI.ymYa6g7erYs5JWBvWTzml479RiEf2', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
