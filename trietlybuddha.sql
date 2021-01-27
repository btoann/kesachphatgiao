-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 27, 2021 lúc 07:11 AM
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
-- Cơ sở dữ liệu: `trietlybuddha`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introduce`
--

CREATE TABLE `introduce` (
  `id` tinyint(4) NOT NULL COMMENT 'id Phần giới thiệu',
  `title` varchar(50) NOT NULL COMMENT 'Nhan đề phần giới thiệu',
  `sort` tinyint(4) DEFAULT NULL COMMENT 'Thứ tự',
  `status` tinyint(1) DEFAULT 0 COMMENT 'Trạng thái (1: hiện, 0: ẩn)',
  `content` mediumtext NOT NULL COMMENT 'Nội dung phần giới thiệu',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Thời điểm tạo bài viết',
  `id_admin` int(11) NOT NULL COMMENT 'id Người tạo bài viết',
  `lastUpdate` varchar(50) NOT NULL DEFAULT current_timestamp() COMMENT 'Cập nhật lần cuối'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `introduce`
--

INSERT INTO `introduce` (`id`, `title`, `sort`, `status`, `content`, `date`, `id_admin`, `lastUpdate`) VALUES
(14, 'Tiên tri zũ trụ Trần Dần 4', NULL, 1, '<h2>Tiên tri zũ trụ Trần Dần 4</h2>', '2021-01-27 04:18:01', 22, '2021-01-27 11:18:01'),
(16, 'Tiên tri zũ trụ Trần Dần 5', NULL, 1, '<h2>Tiên tri zũ trụ Trần Dần 5</h2>', '2021-01-27 04:19:20', 22, '2021-01-27 11:19:20'),
(17, 'Tiên tri zũ trụ Trần Dần 1', NULL, 1, '<p>Tiên tri zũ trụ Trần Dần 1</p>', '2021-01-27 04:22:28', 22, '2021-01-27 11:22:28'),
(18, 'Tiên tri zũ trụ Trần Dần 2', NULL, 1, '<p>Tiên tri zũ trụ Trần Dần 2</p>', '2021-01-27 04:22:48', 22, '2021-01-27 11:22:48'),
(19, 'Tiên tri zũ trụ Trần Dần 3', NULL, 1, '<p>Tiên tri zũ trụ Trần Dần 3</p>', '2021-01-27 04:24:08', 22, '2021-01-27 11:24:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introduce_images`
--

CREATE TABLE `introduce_images` (
  `id` int(11) NOT NULL COMMENT 'id Hình ảnh',
  `path` varchar(50) NOT NULL COMMENT 'Tên file',
  `sort` tinyint(2) NOT NULL COMMENT 'Sắp xếp (0: ảnh bìa; >0: ảnh thường)',
  `id_introduce` tinyint(4) NOT NULL COMMENT 'id Phần giới thiệu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `introduce_images`
--

INSERT INTO `introduce_images` (`id`, `path`, `sort`, `id_introduce`) VALUES
(1, '55ccf27d26d7b23839986b6ae2e447ab-1611721081.jpg', 1, 14),
(2, 'a6156febc4698ee899aa081c30cc24f7-1611721160.jpg', 1, 16),
(3, '55ccf27d26d7b23839986b6ae2e447ab-1611721348.jpg', 1, 17),
(4, 'dad953cf45e5332f60efb07e3ef0d9c0-1611721368.jpg', 1, 18),
(5, '7fdc1a630c238af0815181f9faa190f5-1611721448.jpg', 1, 19);

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
  `birth` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày sinh',
  `date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày đăng kí',
  `role` tinyint(2) NOT NULL DEFAULT 0 COMMENT 'Phân quyền người dùng\r\n(0: inactive; 10: active; 20: fb; 25: gg; 14: normal-vip; 24: fb-vip; 29: gg-vip; 30: admin; X3: banned;)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `tel`, `pass`, `activation`, `avatar`, `birth`, `date`, `role`) VALUES
(22, 'Nguyễn Bảo Toàn', '', '', '', NULL, NULL, '2021-01-27 02:35:48', '2021-01-27 02:35:48', 30);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `introduce`
--
ALTER TABLE `introduce`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sort` (`sort`),
  ADD KEY `introduce_author` (`id_admin`);

--
-- Chỉ mục cho bảng `introduce_images`
--
ALTER TABLE `introduce_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `introduce_image` (`id_introduce`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `introduce`
--
ALTER TABLE `introduce`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'id Phần giới thiệu', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `introduce_images`
--
ALTER TABLE `introduce_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Hình ảnh', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id người dùng', AUTO_INCREMENT=23;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `introduce`
--
ALTER TABLE `introduce`
  ADD CONSTRAINT `introduce_author` FOREIGN KEY (`id_admin`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `introduce_images`
--
ALTER TABLE `introduce_images`
  ADD CONSTRAINT `introduce_image` FOREIGN KEY (`id_introduce`) REFERENCES `introduce` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
