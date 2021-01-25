-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 20, 2021 lúc 05:13 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sidebyside.shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` smallint(5) NOT NULL COMMENT 'id Danh mục',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên Danh mục',
  `id_admin` int(11) NOT NULL COMMENT 'id Quản trị',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Cập nhật lần cuối',
  `lft` int(11) NOT NULL COMMENT 'left index',
  `rgt` int(11) NOT NULL COMMENT 'right index',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái hoạt động\r\n( > 2: kích hoạt; 1: tạm ẩn)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_admin`, `date`, `lft`, `rgt`, `active`) VALUES
(1, 'Thiết bị di động', 2, '2021-01-19 17:55:01', 1, 6, 2),
(2, 'Điện tử - Điện lạnh', 2, '2021-01-19 17:55:01', 7, 8, 2),
(3, 'Phụ kiện - Thiết bị số', 2, '2021-01-19 17:55:01', 9, 10, 2),
(4, 'Laptop - Thiết bị IT', 2, '2021-01-19 17:55:01', 11, 12, 2),
(5, 'Điện gia dụng', 2, '2021-01-19 17:55:01', 13, 14, 2),
(6, 'Tiêu dùng - Thực phẩm', 2, '2021-01-19 17:55:01', 15, 16, 2),
(7, 'Mẹ và bé', 2, '2021-01-19 17:55:01', 17, 18, 2),
(8, 'Thời trang - Phụ kiện', 2, '2021-01-19 17:55:01', 19, 20, 2),
(9, 'Phụ nữ - Làm đẹp', 2, '2021-01-19 17:55:01', 21, 22, 2),
(10, 'Học tập', 2, '2021-01-19 17:55:01', 23, 24, 2),
(11, 'Thể thao - Dã ngoại', 2, '2021-01-19 17:55:01', 25, 26, 2),
(12, 'Y tế - Sức khoẻ', 2, '2021-01-19 17:55:01', 27, 28, 2),
(13, 'Giao thông - Di chuyển', 2, '2021-01-19 17:55:01', 29, 30, 2),
(14, 'Truyền thông - Giải trí', 2, '2021-01-19 17:55:01', 31, 32, 2),
(15, 'Voucher - Dịch vụ', 2, '2021-01-19 17:55:01', 33, 34, 2),
(90, 'Android', 2, '2021-01-19 17:55:01', 4, 5, 2),
(91, 'iOS', 2, '2021-01-19 17:55:01', 2, 3, 2),
(92, 'demo somuchtime', 2, '2021-01-19 17:55:01', 35, 40, 1),
(93, 'abcdef', 2, '2021-01-19 17:55:01', 38, 39, 1),
(94, 'demo somuchtime 1', 2, '2021-01-19 17:55:01', 36, 37, 1),
(96, 'demo somuchtime 2', 2, '2021-01-19 17:55:01', 41, 42, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_hashtag`
--

CREATE TABLE `category_hashtag` (
  `id` int(11) NOT NULL COMMENT 'id Hastag sản phẩm',
  `name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên phân nhánh danh mục',
  `id_category` smallint(5) NOT NULL COMMENT 'id Danh mục'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_hashtag`
--

INSERT INTO `category_hashtag` (`id`, `name`, `id_category`) VALUES
(76, 'iPhone', 91),
(77, 'iPad', 91),
(100, '', 90),
(101, '', 90),
(102, '', 90),
(103, '', 90);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL COMMENT 'id Bình luận',
  `id_product` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `id_user` int(11) NOT NULL COMMENT 'id Người dùng',
  `content` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nội dung bình luận',
  `time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian đăng bình luận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `delivery_address`
--

CREATE TABLE `delivery_address` (
  `id` int(11) NOT NULL COMMENT 'id Nơi nhận hàng',
  `client_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên người nhận',
  `tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Sđt người nhận',
  `province` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tỉnh/Thành phố',
  `district` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Quận/Huyện',
  `ward` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phường/Xã',
  `specific_address` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ cụ thể',
  `id_user` int(11) NOT NULL COMMENT 'id Người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL COMMENT 'id Tin nhắn',
  `id_user` int(11) NOT NULL COMMENT 'id Người dùng',
  `id_seller` int(11) NOT NULL COMMENT 'id Người bán',
  `content` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Nội dung tin nhắn',
  `time` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời gian gửi',
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT 'Trạng thái (gửi: 1X; nhận: 2X / ẩn: X0; hiện: X1)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên sản phẩm',
  `id_category` smallint(5) NOT NULL COMMENT 'id Danh mục',
  `categories_hashtag` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Phân nhóm danh mục',
  `id_seller` int(11) NOT NULL COMMENT 'id Người bán',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày thêm sản phẩm',
  `price` int(10) NOT NULL COMMENT 'Giá sản phẩm',
  `promotion` int(11) NOT NULL COMMENT 'id Khuyến mãi',
  `purchase` int(10) NOT NULL DEFAULT 0 COMMENT 'Lượt mua',
  `card_img` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ảnh bìa',
  `description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mô tả',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái\r\n(0: banned, 1: inactive, 2: active)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_category`, `categories_hashtag`, `id_seller`, `date`, `price`, `promotion`, `purchase`, `card_img`, `description`, `status`) VALUES
(18, 'Sản phẩm 5', 91, '76, 77', 1, '2021-01-19 05:35:12', 10000000, 2, 0, '', 'Đây là sản phẩm 5', 1),
(19, 'demo 1', 92, '', 1, '2021-01-19 05:35:12', 5000000, 1, 10, '', 'alo', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_classify`
--

CREATE TABLE `product_classify` (
  `id` int(11) NOT NULL COMMENT 'id Phân loại sp',
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên phân loại',
  `id_product` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `value` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Giá trị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL COMMENT 'id Hình ảnh sản phẩm',
  `name` varchar(105) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên hình ảnh sản phẩm',
  `id_product` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `basename` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên file hình ảnh',
  `role` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Sort: 1-> 8'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `id_product`, `basename`, `role`) VALUES
(26, 'Sản phẩm 5 - #0', 18, 'b2b9aad7896a022a86d1a44d22510428-1607472789.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL COMMENT 'id Khuyến mãi',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên khuyến mãi',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Loại giảm giá (1: %; 2: trừ thẳng)',
  `id_admin` int(11) NOT NULL COMMENT 'id Admin',
  `discount` float NOT NULL COMMENT 'Giá trị được giảm',
  `min` int(11) NOT NULL COMMENT 'Giá tối thiểu',
  `max` int(11) NOT NULL COMMENT 'Giá tối đa',
  `begin` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày bắt đầu',
  `end` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày kết thúc',
  `description` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả',
  `card_image` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh bìa',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'Trạng thái (1: Tạm ẩn: > 2: hoạt động)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotions`
--

INSERT INTO `promotions` (`id`, `name`, `type`, `id_admin`, `discount`, `min`, `max`, `begin`, `end`, `description`, `card_image`, `active`) VALUES
(1, 'Khuyến mãi Tết Tây', 1, 2, 30, 0, 0, '2020-12-28 10:00:00', '2021-01-02 09:59:59', '', NULL, 1),
(2, 'Merry Chrismart', 2, 2, 20000, 100000, 175000, '2020-12-22 10:00:00', '2020-12-25 09:59:59', '', NULL, 1),
(3, 'Giờ vàng giá sốc', 1, 2, 50, 10000, 200000, '2021-01-11 06:25:13', '2021-01-18 06:25:18', 'Giờ vàng giá sốc, săn ngay lốc giảm', NULL, 1),
(4, 'Hot trong ngày', 2, 2, 39000, 100000, 150000, '2021-01-11 04:00:00', '2021-01-12 04:00:00', 'Hot hot hot!!!', NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL COMMENT 'id Đánh giá',
  `id_product` int(11) NOT NULL COMMENT 'id Sản phẩm',
  `id_user` int(11) NOT NULL COMMENT 'id Người dùng',
  `value` tinyint(1) NOT NULL COMMENT 'Giá trị đánh giá (1 - 5)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL COMMENT 'id Người bán',
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên gian hàng',
  `name_mart` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên gian hàng',
  `email` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email người bán',
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Việt Nam' COMMENT 'Địa chỉ kho (Quốc gia)',
  `pass` varchar(254) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `activation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Kích hoạt',
  `avatar` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh đại diện',
  `cardimage` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Ảnh bìa',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đăng ký',
  `role` int(2) NOT NULL COMMENT 'Phân quyền (10: Cá nhân; 20: Công ty) ( >= X1: Seller VIP)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `name_mart`, `email`, `tel`, `address`, `pass`, `activation`, `avatar`, `cardimage`, `date`, `role`) VALUES
(1, 'Nguyễn Bảo Toàn', 'Gian hàng 1', 'nguyenbaotoan2001@gmail.com', '0921469828', 'Việt Nam', '$2y$10$NFgJQ3k0Lr4MND5aEMadaOV7ysSTwSlMHSZNvpg3vqcevqZBvUnV2', 'e7702c37117d4566a80d829f47d5108d', NULL, NULL, '2021-01-09 21:24:42', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL COMMENT 'id Giao dịch',
  `client_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên khách hàng',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày giao dịch',
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Địa chỉ nhận hàng',
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại liên hệ',
  `id_user` int(11) NOT NULL COMMENT 'id Người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'id người dùng',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Tên người dùng',
  `email` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email người dùng',
  `tel` varchar(15) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Số điện thoại',
  `pass` varchar(254) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mật khẩu',
  `activation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã xác nhận/ mã kích hoạt',
  `avatar` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ảnh địa diện',
  `cardimage` varchar(254) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ảnh bìa',
  `birth` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sinh',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đăng kí',
  `role` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'Phân quyền người dùng\r\n(0: inactive; 10: active; 20: fb; 25: gg; 14: normal-vip; 24: fb-vip; 29: gg-vip; 30: admin; X3: banned;)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `pass`, `activation`, `avatar`, `cardimage`, `birth`, `date`, `role`) VALUES
(1, 'Nguyễn Bảo Toàn', 'nguyenbaotoan2001@gmail.com', '0921469828', '$2y$10$FtQQtpB/aOfN/HR9kOGuJe3PpMCk4oTdPP32y3wfDiK00/5EiAIN6', NULL, NULL, NULL, '2021-01-11 17:07:21', '2020-11-18 17:07:21', 10),
(2, 'admin', 'admin@admin.com', '123456789', '$2y$10$8fsmdGmEJ1fFTOBtbf4xRu5FAkzRneKfH4SrjBZSbufxlm9bACckG', '72e886fbc4c47215ac5793a1575a75f2', NULL, NULL, '2021-01-11 17:08:35', '2020-11-18 17:11:00', 30),
(3, 'account 1', 'account1@gmail.com', '012345678', '$2y$10$X7KK8ydKrwDnDMf7BhEbF.nbW60uLyZvV4n2RQysHTPFfannYSNJu', '840aabfef4a233b1acaf76e3a3a76284', NULL, NULL, '2021-01-11 17:14:01', '2020-12-06 23:47:56', 0),
(8, 'Bao Toan Nguyen', 'toannbps12879@fpt.edu.vn', '0', '9df2c69b80d202380ff6738210d358dd', '9ce7048a8aff91f2a140ba71db876669', NULL, NULL, '2021-01-12 01:16:22', '2020-12-13 19:37:27', 20),
(15, 'Nguyễn Bảo Toàn', 'toannbps12879@fpt.edu.vn', '0593433778', '$2y$10$R2BrFl5jTMJa1mQgFMVcquz0VbMUlDSB4UXj0moilwo/KEVy6q98.', NULL, NULL, NULL, '2021-01-13 02:51:43', '2020-12-17 02:51:43', 10),
(17, 'Bảo Toàn Nguyễn', 'nguyenbaotoan2001@gmail.com', '0', '7d6b260a25921a63ef6cc3bbc814e7cb', NULL, NULL, NULL, '2021-01-13 04:12:32', '2020-12-17 04:12:32', 25),
(18, 'Nguyễn Bảo Toàn', 'btoann.it@gmail.com', '1234567890', '$2y$10$8fsmdGmEJ1fFTOBtbf4xRu5FAkzRneKfH4SrjBZSbufxlm9bACckG', NULL, NULL, NULL, '2021-01-17 01:46:25', '2020-12-18 01:46:25', 10),
(19, '$name', '$email', '$tel', '$pass', NULL, NULL, NULL, '2021-01-18 07:56:57', '2021-01-18 07:56:57', 0),
(21, 'btoann.it@gmail.com', 'btoann.it@gmail.com', '123', '123', NULL, NULL, NULL, '2021-01-20 06:35:48', '2021-01-20 06:35:48', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_category` (`name`),
  ADD KEY `admin_category` (`id_admin`);

--
-- Chỉ mục cho bảng `category_hashtag`
--
ALTER TABLE `category_hashtag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_hashtag` (`id_category`) USING BTREE;

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_comment` (`id_product`),
  ADD KEY `user_comment` (`id_user`);

--
-- Chỉ mục cho bảng `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_DeliveryAddress` (`id_user`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_message` (`id_user`),
  ADD KEY `seller_message` (`id_seller`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_order` (`id_cart`),
  ADD KEY `product_order` (`id_product`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_product` (`id_seller`) USING BTREE,
  ADD KEY `category_product` (`id_category`) USING BTREE,
  ADD KEY `promotion_product` (`promotion`);

--
-- Chỉ mục cho bảng `product_classify`
--
ALTER TABLE `product_classify`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_classify` (`id_product`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image` (`id_product`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_promotion` (`id_admin`);

--
-- Chỉ mục cho bảng `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_rate` (`id_user`),
  ADD KEY `product_rate` (`id_product`);

--
-- Chỉ mục cho bảng `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_seller` (`email`,`tel`) USING BTREE;

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_cart` (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT 'id Danh mục', AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `category_hashtag`
--
ALTER TABLE `category_hashtag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Hastag sản phẩm', AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Bình luận';

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Tin nhắn';

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Sản phẩm', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product_classify`
--
ALTER TABLE `product_classify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Phân loại sp';

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Hình ảnh sản phẩm', AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Khuyến mãi', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Đánh giá';

--
-- AUTO_INCREMENT cho bảng `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Người bán', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Giao dịch';

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id người dùng', AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `admin_category` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category_hashtag`
--
ALTER TABLE `category_hashtag`
  ADD CONSTRAINT `category_hashtag` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `product_comment` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`id_user`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `delivery_address`
--
ALTER TABLE `delivery_address`
  ADD CONSTRAINT `user_DeliveryAddress` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `seller_message` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_message` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `cart_order` FOREIGN KEY (`id_cart`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `promotion_product` FOREIGN KEY (`promotion`) REFERENCES `promotions` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `seller_product` FOREIGN KEY (`id_seller`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_classify`
--
ALTER TABLE `product_classify`
  ADD CONSTRAINT `product_classify` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_image` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `admin_promotion` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `product_rate` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_rate` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `user_cart` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
