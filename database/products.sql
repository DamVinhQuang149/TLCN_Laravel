-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2024 lúc 10:03 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandoantest`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL,
  `pro_image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `discount_price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(1, 'Bánh kem bơ Pháp', 18, 2, 850000, 620000, 'banhkembophap.jpg', '<span style=\"background-color: rgb(255, 0, 0);\">Vẫn sở hữu phần cốt bánh bông lan xốp mịn, điều làm cho những chiếc bánh kem này trở nên đặc biệt và cuốn hút nằm ở phần kem bơ.\r\n\r\nKem bơ Pháp được làm từ những nguyên liệu gồm lòng đỏ trứng, syrup đường và bơ lạt. Nhờ sử dụng thêm lòng đỏ trứng, thành phẩm kem bơ sẽ có hương vị cực kì thơm ngon, mềm mượt và tan ngay khi vào miệng.\r\n\r\nNhững người thợ tài hoa của Grand Castella còn tận dụng phần kem bơ này, sáng tạo nên những hình ảnh trang trí độc đáo, giúp chiếc bánh kem đã ngon nay trở nên xinh đẹp hơn.</span>', 1, '2021-10-22 04:15:10'),
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `manu_id` (`manu_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
