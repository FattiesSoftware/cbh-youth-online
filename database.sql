-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2020 lúc 11:49 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `members`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','github','facebook','google','twitter') NOT NULL,
  `oauth_uid` text NOT NULL,
  `name` varchar(155) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `profile_pic` text NOT NULL,
  `activation_code` varchar(50) DEFAULT '',
  `location` varchar(100) NOT NULL,
  `link` varchar(255) NOT NULL,
  `verified` varchar(3) NOT NULL,
  `permission` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `oauth_provider`, `oauth_uid`, `name`, `username`, `password`, `email`, `date`, `profile_pic`, `activation_code`, `location`, `link`, `verified`, `permission`) VALUES
(1, 'github', '17230355', 'Duong Tung Anh', 'tunganh03', '', 'duongtunganh2111@gmail.com', '2020-03-17', 'https://avatars2.githubusercontent.com/u/17230355?v=4', '', 'Vietnam', 'https://github.com/tunganh03', 'yes', 'xungkich'),
(11, '', '', 'Dương Tùng Anh', 'admin', '$2y$10$1QLvQahvkZ6ZWYtV6w0xluJkg0SRIlvH8LlZGujHRk86DlMbZY1Dm', 'duongtunganh2111@gmail.com', '2020-03-13', 'images/nmfW44orqFM4kC9IrpYb_02_796e50f8b3587f416bf66736e7641420_avatar_full.jpg ', '', '', '', 'yes', 'admin'),
(15, '', '', 'Dương Tùng Anh', 'ta03', '$2y$10$E4jrBCuDcoZWr/D3SWShPuTDbX7Akx2wa3VGsQIS2k/uZAR7yoJdW', 'tunnaduong@gmail.com', '2020-03-13', 'images/87024097_549381862593623_7382297003633410048_n.jpg ', '', '', '', 'yes', 'admin'),
(18, '', '', 'Hoàng Phát', 'hoangphat', '$2y$10$C1uVsfSKM0o8/H34DG2TBePq9alYJ3jSZpfa3xwpQ2kT0G4DyIpuK', 'hoangphat@gmail.com', '2020-03-13', 'images/default_pic.jpg', '', '', '', 'yes', 'xungkich'),
(19, '', '', 'haidz', 'haidz', '$2y$10$9tkFCK0IgrmvSeWxqb/Qq.sUGZ1WDqWbLlbVKXQbxO86UnqkSSgUu', 'haidz@gmail.com', '2020-03-13', 'images/default_pic.jpg', '', '', '', 'no', 'user'),
(22, '', '', 'Cái Lồn Má', 'clm', '$2y$10$mMudBQxN7pnYhB59wJN.CeYMZ2xZyTNSDFdTCehlQoNefNAE5QJ3W', 'concacne@gmail.com', '2020-03-13', 'images/banmuonthanhcong_black.png ', '', '', '', 'no', 'user'),
(23, '', '', 'có cái lồn ấy', 'ccla', '$2y$10$TlkIz3BkF2yKR8YHIJRu4O/8T9yyfY3tmNGAH3Y..0hpLEIKO3Nei', 'cocainon@gmail.com', '2020-03-13', 'images/default_pic.jpg', '', '', '', 'no', 'user'),
(44, '', '', 'Dương Tùng Anh', 'tunnaduong', '$2y$10$z3WFCAz8dFr.LUN2dCxkm.R9LNzL.P0z.DtjygEq7pHlzPpPmfmQ6', 'duongtunganh2111@gmail.com', '2020-08-10', 'images/monkey-wrench.png ', '', '', '', 'yes', 'xungkich'),
(45, '', '', 'HAHAHAHa', 'tunganh031', '$2y$10$i9RjRHk8Io5Nyp0OZm2xbuAnJLVaEIavhouwNzDJm4NEtgCEIuolq', 'ahahaha@gmail.com', '2020-09-03', '/images/default_pic.jpg', '', '', '', 'no', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `audios`
--

CREATE TABLE `audios` (
  `audio_id` int(11) NOT NULL,
  `audio_name` varchar(99) NOT NULL,
  `filename` varchar(999) NOT NULL,
  `audio_creator` varchar(11) NOT NULL,
  `view` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `audios`
--

INSERT INTO `audios` (`audio_id`, `audio_name`, `filename`, `audio_creator`, `view`, `date`) VALUES
(1, 'Ông đa Remix', 'uploads/Ông Đa 70 Tuổi Remix - Thành Black Remix - ĐM Chúng Mày, Thằng Ranh Con Này.mp3', 'ta03', 1, '2020-08-09 00:00:00'),
(2, 'Ngọt - Hết thời (Karaoke)', 'uploads/[Karaoke] Hết thời - Ngọt.mp3', 'ta03', 1, '2020-08-09 00:00:00'),
(5, 'Có một học sinh đi muộn tên Dương Tùng Anh mời xuống vp đoàn', 'uploads/b5015952-e87d-487e-81ed-8dff36f221ce.ogg', 'ta03', 1, '2020-08-10 00:00:00'),
(7, 'binzzzz', 'uploads/1ec20de4-75b2-4344-8545-ee4563eaf951.ogg', 'hoangphat', 1, '2020-08-12 09:37:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baocao`
--

CREATE TABLE `baocao` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `xungkich` varchar(55) NOT NULL,
  `class` varchar(55) NOT NULL,
  `diem` varchar(55) NOT NULL,
  `absent` varchar(55) NOT NULL,
  `vesinh` varchar(55) NOT NULL,
  `dongphuc` varchar(55) NOT NULL,
  `tenloi1` varchar(55) NOT NULL,
  `tenloi2` varchar(55) NOT NULL,
  `tenloi3` varchar(55) NOT NULL,
  `tenloi4` varchar(55) NOT NULL,
  `tenloi5` varchar(55) NOT NULL,
  `maloi1` int(11) NOT NULL,
  `maloi2` int(11) NOT NULL,
  `maloi3` int(11) NOT NULL,
  `maloi4` int(11) NOT NULL,
  `maloi5` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `baocao`
--

INSERT INTO `baocao` (`id`, `date`, `xungkich`, `class`, `diem`, `absent`, `vesinh`, `dongphuc`, `tenloi1`, `tenloi2`, `tenloi3`, `tenloi4`, `tenloi5`, `maloi1`, `maloi2`, `maloi3`, `maloi4`, `maloi5`) VALUES
(9, '2020-11-12 18:51:30', 'ta03', '12 Toán', '0', '0', 'Sạch', 'Đủ', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 0, 0, 0, 0, 0),
(10, '2020-11-12 19:26:05', 'ta03', '12 Nga', '01', '0', 'Sạch', 'Đủ', 'Không đúng trang phục: áo phù hiệu giày', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 7, 0, 0, 0, 0),
(11, '2020-11-12 19:26:29', 'ta03', '12 Nga', '01', '0', 'Sạch', 'Đủ', 'Không cất ghế sau giờ tập trung', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 12, 0, 0, 0, 0),
(12, '2020-11-12 19:28:55', 'ta03', '12 Toán', '02', '0', 'Sạch', 'Đủ', 'Nói bậy', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 13, 0, 0, 0, 0),
(13, '2020-11-12 20:07:04', 'ta03', '12 Toán', '05', '0', 'Sạch', 'Đủ', 'Mất trật tự trong buổi tập trung', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 11, 0, 0, 0, 0),
(14, '2020-11-12 20:17:27', 'ta03', '12 Nga', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0),
(15, '2020-11-12 20:17:48', 'ta03', '12 Nga', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0),
(16, '2020-11-12 20:17:51', 'ta03', '12 Nga', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0),
(18, '2020-11-12 20:29:07', 'ta03', '12 Nga', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0),
(19, '2020-11-12 20:30:57', 'ta03', '12 Toán', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0),
(20, '2020-11-13 05:46:17', 'ta03', '12 Toán', '02', '0', 'Sạch', 'Đủ', 'Vắng mặt không lí do giờ truy bài', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 'Không có lỗi', 5, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `btvn`
--

CREATE TABLE `btvn` (
  `id` int(11) NOT NULL,
  `title` varchar(999) NOT NULL,
  `content` varchar(999) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `btvn`
--

INSERT INTO `btvn` (`id`, `title`, `content`, `date`) VALUES
(2, 'BTVN (18/09/2020)', 'Không có bài tập về nhà nào!', '2020-09-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forum_comments`
--

CREATE TABLE `forum_comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_sender_name` varchar(99) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `forum_comments`
--

INSERT INTO `forum_comments` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 0, 'Some example comment...', 'ta03', '2020-08-14 16:53:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gvcn`
--

CREATE TABLE `gvcn` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `email` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL,
  `name` varchar(999) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(12) NOT NULL,
  `phone_number` int(12) NOT NULL,
  `avatar` varchar(999) NOT NULL,
  `class_id` int(12) NOT NULL,
  `account_name` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loi_vi_pham`
--

CREATE TABLE `loi_vi_pham` (
  `id` int(11) NOT NULL,
  `mistake_id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `school_year` varchar(11) NOT NULL,
  `main_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `class_id`, `name`, `school_year`, `main_teacher_id`) VALUES
(1, 3251, '12 Nga', '60', 0),
(2, 2970, '12 Toán', '60', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating_info`
--

CREATE TABLE `rating_info` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_action` varchar(11) COLLATE latin1_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `rating_info`
--

INSERT INTO `rating_info` (`comment_id`, `user_id`, `rating_action`) VALUES
(30, 15, 'like'),
(44, 22, 'like'),
(44, 15, 'like'),
(45, 22, 'like'),
(20, 22, ''),
(13, 22, 'like'),
(45, 15, 'like'),
(13, 15, 'like'),
(43, 15, 'like'),
(1, 22, 'like');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `topic_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `topic_id`) VALUES
(1, 0, 'sdsdsdsd', 'guest', '2020-08-14 08:17:35', 0),
(2, 0, 'sdsdsdsd', 'guest', '2020-08-14 08:17:36', 0),
(3, 0, 'sdsdsdsd', 'guest', '2020-08-14 08:17:36', 0),
(4, 0, 'sdsdsdsd', 'guest', '2020-08-14 08:17:36', 0),
(5, 0, 'sdsd', 'guest', '2020-08-14 08:24:57', 0),
(6, 3, 'vcvcvcvcv', '', '2020-08-14 08:25:04', 0),
(7, 0, 'ghfghfgh', 'guest', '2020-08-15 03:04:39', 0),
(8, 0, 'fghfgh', '', '2020-08-15 03:04:43', 0),
(9, 0, 'jhjhj', '', '2020-08-15 03:04:53', 0),
(10, 0, 'sadasd', 'guest', '2020-08-15 03:06:38', 0),
(11, 0, 'địt mẹ chúng mày thằng ranh con này', 'guest', '2020-08-19 23:35:41', 0),
(12, 0, 'sdsdsd', 'guest', '2020-08-23 12:27:20', 0),
(13, 0, 'sdfsdfsdf', 'guest', '2020-08-31 16:07:01', 0),
(14, 0, 'sdsdsdsdsdsd', 'guest', '2020-08-31 16:11:19', 0),
(15, 0, 'dsdsdsdsdsd', 'guest', '2020-08-31 21:12:44', 0),
(22, 2, 'địt mẹ mày thằng lồn', 'guest', '2020-08-31 22:10:11', 0),
(24, 6, 'csdfsdf', 'guest', '2020-08-31 23:02:54', 0),
(25, 3, 'ádasdasd', '', '2020-08-31 23:03:04', 0),
(26, 24, 'ádasdasd', '', '2020-08-31 23:03:08', 0),
(27, 6, 'dsfsdf', '', '2020-08-31 23:07:08', 0),
(28, 3, 'sdsd', 'guest', '2020-08-31 23:08:55', 0),
(29, 26, 'cvccvcv', 'guest', '2020-08-31 23:09:50', 0),
(30, 26, 'vcbcvbcvb', '', '2020-08-31 23:10:01', 0),
(31, 24, 'fđfgrfgedrg', '', '2020-08-31 23:10:12', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaolop`
--

CREATE TABLE `thongbaolop` (
  `id` int(11) NOT NULL,
  `title` varchar(99) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbaolop`
--

INSERT INTO `thongbaolop` (`id`, `title`, `content`, `date`) VALUES
(1, 'ITV 2 CBH Official Stream', '<p>sdsdsdsdsdsd</p>', '2020-09-18 04:11:05'),
(2, 'Đòi tiền trà chanh 23k', '<p><span style=\"color: rgb(5, 5, 5); font-family: &quot;Segoe UI Historic&quot;, &quot;Segoe UI&quot;, Helvetica, Arial, sans-serif; font-size: 15px; white-space: pre-wrap; background-color: rgb(255, 255, 255);\">mọi người ơii hôm đi chơi t có trích 1 số tiền trong lĩnh vực uống trà chanh và đi xe lúc mng đưa t tiền đông quá t ko kiểm soát hết hqua t kiểm lại tiền thì bị âm không biết ngoài TA thì còn ai quên chưa đưa t tiền ko thì bảo lại t nhé :((</span></p>', '2020-09-19 03:05:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkb`
--

CREATE TABLE `tkb` (
  `id` int(11) NOT NULL,
  `t2t1` varchar(11) NOT NULL,
  `t2t2` varchar(255) DEFAULT NULL,
  `t2t3` varchar(255) DEFAULT NULL,
  `t2t4` varchar(255) DEFAULT NULL,
  `t2t5` varchar(255) DEFAULT NULL,
  `t3t1` varchar(255) DEFAULT NULL,
  `t3t2` varchar(255) DEFAULT NULL,
  `t3t3` varchar(255) DEFAULT NULL,
  `t3t4` varchar(255) DEFAULT NULL,
  `t3t5` varchar(255) DEFAULT NULL,
  `t4t1` varchar(255) DEFAULT NULL,
  `t4t2` varchar(255) DEFAULT NULL,
  `t4t3` varchar(255) DEFAULT NULL,
  `t4t4` varchar(255) DEFAULT NULL,
  `t4t5` varchar(255) DEFAULT NULL,
  `t5t1` varchar(255) DEFAULT NULL,
  `t5t2` varchar(255) DEFAULT NULL,
  `t5t3` varchar(255) DEFAULT NULL,
  `t5t4` varchar(255) DEFAULT NULL,
  `t5t5` varchar(255) DEFAULT NULL,
  `t6t1` varchar(255) DEFAULT NULL,
  `t6t2` varchar(255) DEFAULT NULL,
  `t6t3` varchar(255) DEFAULT NULL,
  `t6t4` varchar(255) DEFAULT NULL,
  `t6t5` varchar(255) DEFAULT NULL,
  `t7t1` varchar(255) DEFAULT NULL,
  `t7t2` varchar(255) DEFAULT NULL,
  `t7t3` varchar(255) DEFAULT NULL,
  `t7t4` varchar(255) DEFAULT NULL,
  `t7t5` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `t2c` varchar(255) DEFAULT NULL,
  `t3c` varchar(255) DEFAULT NULL,
  `t4c` varchar(255) DEFAULT NULL,
  `t5c` varchar(255) DEFAULT NULL,
  `t6c` varchar(255) DEFAULT NULL,
  `t7c` varchar(255) DEFAULT NULL,
  `tuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tkb`
--

INSERT INTO `tkb` (`id`, `t2t1`, `t2t2`, `t2t3`, `t2t4`, `t2t5`, `t3t1`, `t3t2`, `t3t3`, `t3t4`, `t3t5`, `t4t1`, `t4t2`, `t4t3`, `t4t4`, `t4t5`, `t5t1`, `t5t2`, `t5t3`, `t5t4`, `t5t5`, `t6t1`, `t6t2`, `t6t3`, `t6t4`, `t6t5`, `t7t1`, `t7t2`, `t7t3`, `t7t4`, `t7t5`, `date`, `t2c`, `t3c`, `t4c`, `t5c`, `t6c`, `t7c`, `tuan`) VALUES
(1, 'CHÀO CỜ', 'Sinh học', 'Tin học', 'Văn học', 'Văn học', 'Địa lý', 'Anh', 'Thể dục', 'Văn học', 'Văn học', 'Hoá học', 'Công nghệ', 'Toán', 'Nga', 'Nga', 'Toán', 'Toán', 'Nga', 'Lịch sử', 'Anh', '(nghỉ)', '(nghỉ)', '(nghỉ)', '(nghỉ)', '(nghỉ)', 'Lịch sử', 'Sinh học', 'Hoá học', 'Vật lý', 'Sinh học', '2020-09-16', '(nghỉ)', 'Văn học', 'Nga', 'Toán', '(nghỉ)', 'Anh/Nga', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tkb_color`
--

CREATE TABLE `tkb_color` (
  `id` int(11) NOT NULL,
  `t2t1` varchar(11) NOT NULL,
  `t2t2` varchar(255) DEFAULT NULL,
  `t2t3` varchar(255) DEFAULT NULL,
  `t2t4` varchar(255) DEFAULT NULL,
  `t2t5` varchar(255) DEFAULT NULL,
  `t3t1` varchar(255) DEFAULT NULL,
  `t3t2` varchar(255) DEFAULT NULL,
  `t3t3` varchar(255) DEFAULT NULL,
  `t3t4` varchar(255) DEFAULT NULL,
  `t3t5` varchar(255) DEFAULT NULL,
  `t4t1` varchar(255) DEFAULT NULL,
  `t4t2` varchar(255) DEFAULT NULL,
  `t4t3` varchar(255) DEFAULT NULL,
  `t4t4` varchar(255) DEFAULT NULL,
  `t4t5` varchar(255) DEFAULT NULL,
  `t5t1` varchar(255) DEFAULT NULL,
  `t5t2` varchar(255) DEFAULT NULL,
  `t5t3` varchar(255) DEFAULT NULL,
  `t5t4` varchar(255) DEFAULT NULL,
  `t5t5` varchar(255) DEFAULT NULL,
  `t6t1` varchar(255) DEFAULT NULL,
  `t6t2` varchar(255) DEFAULT NULL,
  `t6t3` varchar(255) DEFAULT NULL,
  `t6t4` varchar(255) DEFAULT NULL,
  `t6t5` varchar(255) DEFAULT NULL,
  `t7t1` varchar(255) DEFAULT NULL,
  `t7t2` varchar(255) DEFAULT NULL,
  `t7t3` varchar(255) DEFAULT NULL,
  `t7t4` varchar(255) DEFAULT NULL,
  `t7t5` varchar(255) DEFAULT NULL,
  `t2c` varchar(255) DEFAULT NULL,
  `t3c` varchar(255) DEFAULT NULL,
  `t4c` varchar(255) DEFAULT NULL,
  `t5c` varchar(255) DEFAULT NULL,
  `t6c` varchar(255) DEFAULT NULL,
  `t7c` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tkb_color`
--

INSERT INTO `tkb_color` (`id`, `t2t1`, `t2t2`, `t2t3`, `t2t4`, `t2t5`, `t3t1`, `t3t2`, `t3t3`, `t3t4`, `t3t5`, `t4t1`, `t4t2`, `t4t3`, `t4t4`, `t4t5`, `t5t1`, `t5t2`, `t5t3`, `t5t4`, `t5t5`, `t6t1`, `t6t2`, `t6t3`, `t6t4`, `t6t5`, `t7t1`, `t7t2`, `t7t3`, `t7t4`, `t7t5`, `t2c`, `t3c`, `t4c`, `t5c`, `t6c`, `t7c`) VALUES
(1, 'info', 'success', 'success', 'warning', 'warning', 'success', 'warning', 'info', 'warning', 'warning', 'success', 'danger', 'warning', 'info', 'info', 'warning', 'warning', 'info', 'success', 'warning', 'info', 'info', 'info', 'info', 'info', 'success', 'success', 'success', 'warning', 'success', 'info', 'warning', 'info', 'warning', 'info', 'warning');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(9999) COLLATE utf8_bin NOT NULL,
  `topic_content` mediumtext COLLATE utf8_bin NOT NULL,
  `topic_creator` varchar(9999) COLLATE utf8_bin NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `category` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_content`, `topic_creator`, `view`, `date`, `category`) VALUES
(36, 'Giá vàng trong nước lao dốc mạnh, mất mốc 60 triệu đồng/lượng', '<p style=\"text-align: justify;\"><img class=\"news-avatar\" data-field=\"firstphoto\" alt=\"\" src=\"https://vtv1.mediacdn.vn/thumb_w/650/2020/8/10/gia-vang-giam-15970246015661785649483.jpg\" width=\"650\" style=\"margin: 0px auto; padding: 0px; list-style: none; border-width: initial; border-style: none; font-family: &quot;Times New Roman&quot;; font-size: 19px; vertical-align: top; display: block; max-height: 100%; text-align: start;\"></p><p class=\"avatar-desc\" style=\"margin: 0px; padding: 8px 14px; list-style: none; border: none; font-family: Arial; font-size: 12px; background-color: rgb(0, 0, 0); color: rgb(255, 255, 255); line-height: 16px;\">Giá vàng trong nước giảm sâu, mất mốc 60 triệu đồng/lượng. (Ảnh: Dân trí)</p><h2 class=\"sapo\" data-field=\"sapo\" style=\"margin-top: 20px; margin-bottom: 20px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; font-size: 19px; font-weight: bold; line-height: 25px; color: rgb(86, 86, 86);\">VTV.vn - Sáng nay (10/8), mở đầu tiên giao dịch trong ngày đầu tuần, giá vàng SJC đã mất hơn 500.000 đồng/lượng.</h2><p class=\"tinlienquan clearfix\" style=\"margin: 0px 0px 30px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; font-size: 19px; zoom: 1; clear: both;\"><ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"><li style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; display: block; line-height: 14px;\"><i class=\"icon_li\" style=\"margin: 5px 10px 0px 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; background: rgb(181, 181, 181); width: 5px; height: 5px; float: left; border-radius: 10px;\"></i><a title=\"Hôm nay (9/8), giá vàng giảm sâu, mất mốc 60 triệu đồng/lượng\" href=\"https://vtv.vn/kinh-te/hom-nay-9-8-gia-vang-giam-sau-mat-moc-60-trieu-dong-luong-20200809103122635.htm\" data-nocheck=\"1\" style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: Arial; font-size: 14px; font-weight: 600; outline: none; color: rgb(0, 67, 131);\">Hôm nay (9/8), giá vàng giảm sâu, mất mốc 60 triệu đồng/lượng</a></li><li style=\"margin: 10px 0px 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; display: block; line-height: 14px;\"><i class=\"icon_li\" style=\"margin: 5px 10px 0px 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; background: rgb(181, 181, 181); width: 5px; height: 5px; float: left; border-radius: 10px;\"></i><a title=\"&quot;Tin vui&quot; từ nước Mỹ, giá vàng thế giới quay đầu giảm mạnh\" href=\"https://vtv.vn/kinh-te/tin-vui-tu-nuoc-my-gia-vang-the-gioi-quay-dau-giam-manh-20200808080837729.htm\" data-nocheck=\"1\" style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: Arial; font-size: 14px; font-weight: 600; outline: none; color: rgb(0, 67, 131);\">\"Tin vui\" từ nước Mỹ, giá vàng thế giới quay đầu giảm mạnh</a></li><li style=\"margin: 10px 0px 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; display: block; line-height: 14px;\"><i class=\"icon_li\" style=\"margin: 5px 10px 0px 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; background: rgb(181, 181, 181); width: 5px; height: 5px; float: left; border-radius: 10px;\"></i><a title=\"Tăng cả triệu đồng trong &quot;chớp mắt&quot;, giá vàng vượt mốc 62 triệu đồng/lượng\" href=\"https://vtv.vn/kinh-te/gia-vang-trong-nuoc-tang-vot-vuot-moc-62-trieu-dong-luong-20200807091102275.htm\" data-nocheck=\"1\" style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: Arial; font-size: 14px; font-weight: 600; outline: none; color: rgb(0, 67, 131);\">Tăng cả triệu đồng trong \"chớp mắt\", giá vàng vượt mốc 62 triệu đồng/lượng</a></li></ul></p><p data-field=\"body\" class=\"ta-justify\" id=\"entry-body\" style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; font-size: 19px; text-align: justify;\"><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Lúc 8h35, Công ty Vàng bạc Đá quý Sài Gòn niêm yết&nbsp;<a href=\"https://vtv.vn/gia-vang.html\" title=\"giá vàng\" target=\"_blank\" style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; font-weight: inherit; outline: none; color: rgb(26, 76, 144);\">giá vàng</a>&nbsp;SJC tại thị trường Hà Nội ở mức 57,96 - 59,94 triệu đồng/lượng (mua vào - bán ra). Mức giá này giảm 540.000 đồng/lượng ở chiều mua vào và 380.000 đồng/lượng ở chiều bán ra so với cuối tuần qua.&nbsp;Tại TP.HCM, giá vàng SJC hiện giao dịch ở mức 57,66 triệu đồng/lượng - 59,62 triệu đồng/lượng (mua vào - bán ra).</p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Trong khi đó,&nbsp;Công ty Vàng bạc Đá quý Phú Nhuận cũng niêm yết giá vàng SJC ở mức dưới 58 - 59,5 triệu đồng/lượng (mua vào - bán ra), giảm 200.000 đồng/lượng ở chiều mua vào và 700.000 đồng/lượng ở chiều bán ra so với cuối tuần qua.</p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Tại tập đoàn Vàng bạc Đá quý DOJI, giá vàng được niêm yết ở mức 58,15 triệu đồng/lượng (mua vào) - 59,65 triệu đồng/lượng (bán ra).&nbsp;<br style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"></p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Còn tại Công ty Vàng bạc đá quý Bảo Tín Minh Châu, giá vàng rồng Thăng Long được giao dịch ở mức 55,16 - 56,26 triệu đồng/lượng (mua vào - bán ra).<br style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"></p><p class=\"VCSortableInPreviewMode active\" type=\"Photo\" style=\"margin: auto auto 12.75px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; width: 639px;\"><p style=\"margin: auto; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"><img src=\"https://vtv1.mediacdn.vn/thumb_w/640/2020/8/10/gia-vang-giam-1-15970247390321317693623.jpg\" id=\"img_0ec4b030-daad-11ea-aa4e-af186a481c6a\" w=\"650\" h=\"406\" alt=\"Giá vàng trong nước lao dốc mạnh, mất mốc 60 triệu đồng/lượng - Ảnh 1.\" title=\"Giá vàng trong nước lao dốc mạnh, mất mốc 60 triệu đồng/lượng - Ảnh 1.\" rel=\"lightbox\" photoid=\"0ec4b030-daad-11ea-aa4e-af186a481c6a\" type=\"photo\" data-original=\"https://vtv1.mediacdn.vn/2020/8/10/gia-vang-giam-1-15970247390321317693623.jpg\" width=\"\" height=\"\" style=\"margin: auto; padding: 0px; list-style: none; border-width: initial; border-style: none; font-family: &quot;Times New Roman&quot;; vertical-align: top; display: block; width: 639px;\"></p><p class=\"PhotoCMS_Caption\" style=\"margin: 0px; padding: 13px; list-style: none; border-width: 0px 1px 1px; border-style: solid; border-color: rgb(237, 237, 237); border-image: initial; font-size: 12px; text-align: center; line-height: 18px; color: rgb(102, 102, 102); background-color: rgb(250, 250, 250); font-family: Arial !important;\"><p data-placeholder=\"[nhập chú thích]\" class=\"\" style=\"margin-bottom: 0px; padding: 0px; list-style: none; border: none; line-height: 18px; font-family: Arial !important;\">Giao dịch vàng tại Công ty Vàng bạc Đá quý Bảo Tín Minh Châu. (Ảnh: TTXVN)</p></p></p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Giá vàng giảm khi đồng USD tăng 0,8%, hướng tới tuần tăng đầu tiên trong 6 tuần qua, sau khi tăng 0,3% trong tuần kết thúc ngày 19/6. Nhà phân tích thị trường của CMC Markets UK David Madden cho rằng việc đồng USD lên giá mạnh đã gây ra làn sóng chốt lời.<br style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"></p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Thị trường vàng thế giới và trong nước vừa trải qua một tuần \"thăng hoa\" khi giá vàng thế giới lần đầu vượt qua mốc 2.000 USD/ounce, còn giá vàng trong nước đã phá mốc 62 triệu đồng/lượng. Trong phiên cuối tuần, dù đà tăng của kim loại quý đã chững lại, nhưng giới chuyên gia vẫn dự báo khả năng tăng của kim loại quý vẫn tiếp diễn.<br style=\"margin: 0px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;;\"></p><p style=\"margin-top: 21px; margin-bottom: 21px; padding: 0px; list-style: none; border: none; font-family: &quot;Times New Roman&quot;; color: rgb(86, 86, 86); line-height: 26px;\">Tính chung cả tuần, các doanh nghiệp vàng trong nước đã điều chỉnh giá vàng SJC tăng khoảng 2 triệu đồng/lượng. Giá vàng thế giới cũng tăng 2,1% trong tuần qua. Kim loại quý này lên giá 9 tuần liên tiếp, ghi dấu chuỗi tăng giá dài nhất kể từ sau giai đoạn kết thúc vào ngày 12/5/2006.</p></p>', 'admin', 5, '2020-08-10 17:18:22', 'hoctap'),
(37, 'Em có đánh rơi 500k ở trước cửa vp đoàn', '<p>như tiêu đề</p><p>em cần tìm lại gấp số tiền trên vì đó là số tiền em định đóng học phí</p><p>em xin cảm ơn và hậu tạ!</p>', 'admin', 5, '2020-08-10 17:17:28', 'timdo'),
(41, 'alo123test', '<p>test</p>', 'ta03', 4, '2020-08-10 17:16:53', 'giaitri'),
(43, 'Thí sinh Hoa hậu Việt Nam 2020 có thành tích học tập tốt', '<p><br></p><table class=\"picture\" align=\"center\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 80px; margin-right: 0px; margin-bottom: 30px; padding: 0px; border: 0px; font-size: 0.9em; vertical-align: baseline; background: rgb(255, 255, 255); text-size-adjust: 100%; font-family: sans-serif; line-height: 1.5; margin-left: -180px !important; width: 960px !important;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 14px 96px 30px; border: 0px; font-size: 1.2em; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: inline;\">Phù Bảo Nghi, 19 tuổi, vừa tốt nghiệp trung học phổ thông tại trường quốc tế American International School (TP.HCM). Cô trúng tuyển ba trường đại học ở Mỹ, gồm Hult International Business School, University of New Hampshire và University of Massachusetts Boston. Chia sẻ với&nbsp;<em style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\">Zing</em>&nbsp;về lần đầu thi hoa hậu, 10X cho biết: \"Mình muốn thử sức, trau dồi kiến thức và xem đây là trải nghiệm mới. Gia đình, người thân đều ủng hộ mình đi thi\". Ảnh:<em style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\">&nbsp;NVCC.</em></p></td></tr></tbody></table><table class=\"picture gallery\" align=\"center\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 80px; margin-right: 0px; margin-bottom: 30px; padding: 0px; border: 0px; font-size: 0.9em; vertical-align: baseline; background: rgb(255, 255, 255); text-size-adjust: 100%; font-family: sans-serif; line-height: 1.5; margin-left: -180px !important; width: 960px !important;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; width: 960px;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding-bottom: 2px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative; overflow: hidden; width: 960px; cursor: pointer;\"><p class=\"photoset-item\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px 1px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; float: left;\"><img alt=\"Hoa hau Viet Nam 2020 thi sinh anh 4\" src=\"https://znews-photo.zadn.vn/w1024/Uploaded/opluoaa/2020_08_06/116913350_320120516028335_8738857501980564214_n.jpg\" width=\"640\" height=\"960\" class=\"loaded\" data-title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 4\" title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 4\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: block; height: 718px; width: 479px;\"></p><p class=\"photoset-item\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px 1px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; float: left;\"><img title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 5\" alt=\"Hoa hau Viet Nam 2020 thi sinh anh 5\" src=\"https://znews-photo.zadn.vn/w1024/Uploaded/opluoaa/2020_08_06/111454661_320120469361673_501946096505638728_n.jpg\" width=\"640\" height=\"960\" class=\"loaded\" original-width=\"479\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: block; height: 718px; width: 478px;\"></p></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; width: 960px;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 14px 96px 30px; border: 0px; font-size: 1.2em; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative; overflow: hidden; width: 960px;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: inline;\">Doãn Hải My, 19 tuổi, là sinh viên năm thứ nhất của Đại học Luật Hà Nội. Trước đó, cô theo học THPT Marie Curie, có thành tích tốt (giỏi môn Văn). Ngoài ra, cô còn đạt trình độ IELTS 7.0. Nữ sinh cũng có năng khiếu nghệ thuật ở nhiều lĩnh vực như hát, vẽ, chơi piano. Hải My chia sẻ: \"My luôn nghĩ mình phải cố gắng, nỗ lực hơn nữa để không phụ lòng mọi người và để trở thành phiên bản Doãn Hải My tốt hơn mỗi ngày. Tham gia cuộc thi&nbsp;<a href=\"https://zingnews.vn/tieu-diem/hoa-hau-viet-nam.html\" title=\"Tin tức Hoa hậu Việt Nam\" class=\"topic normal autolink\" topic-id=\"4590\" style=\"text-rendering: geometricprecision; outline: none; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; font-size: 19.008px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(0, 72, 97); cursor: pointer; border-bottom: 0px none;\">Hoa Hậu Việt Nam</a>&nbsp;2020, My hy vọng đây sẽ là một trải nghiệm thật đẹp và là kỷ niệm tuyệt vời cho tuổi thanh xuân của mình\". Ảnh:&nbsp;<em style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\">NVCC</em>.</p></td></tr></tbody></table><br><table class=\"picture\" align=\"center\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 80px; margin-right: 0px; margin-bottom: 30px; padding: 0px; border: 0px; font-size: 0.9em; vertical-align: baseline; background: rgb(255, 255, 255); text-size-adjust: 100%; font-family: sans-serif; line-height: 1.5; margin-left: -180px !important; width: 960px !important;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative; cursor: pointer;\"><img src=\"https://znews-photo.zadn.vn/w1024/Uploaded/opluoaa/2020_08_06/93675024_2638841873006049_7950155335874904064_o.jpg\" alt=\"Hoa hau Viet Nam 2020 thi sinh anh 6\" data-bind-event=\"true\" slide-pos=\"4\" data-title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 6\" title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 6\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: block; width: 960px;\"></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 14px 96px 30px; border: 0px; font-size: 1.2em; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: inline;\">Lâm Hà Thủy Tiên, 20 tuổi, là sinh viên ngành Luật của Đại học Kinh tế - Luật, Đại học Quốc gia TP.HCM. Cô có nét đẹp trong trẻo, gương mặt khả ái, được dự đoán là một trong những ứng viên tiềm năng của cuộc thi năm nay. Khi còn ngồi ghế nhà trường những năm cấp 3, Thủy Tiên có thành tích học tập ấn tượng, 12 năm là học sinh giỏi. Bên cạnh đó, 10X cũng năng nổ tham gia các hoạt động văn nghệ như nhảy flashmob, đóng phim ngắn.</p></td></tr></tbody></table><table class=\"picture\" align=\"center\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 80px; margin-right: 0px; margin-bottom: 30px; padding: 0px; border: 0px; font-size: 0.9em; vertical-align: baseline; background: rgb(255, 255, 255); text-size-adjust: 100%; font-family: sans-serif; line-height: 1.5; margin-left: -180px !important; width: 960px !important;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative; cursor: pointer;\"><img src=\"https://znews-photo.zadn.vn/w1024/Uploaded/opluoaa/2020_08_06/bich_thuy.jpg\" alt=\"Hoa hau Viet Nam 2020 thi sinh anh 7\" data-bind-event=\"true\" slide-pos=\"5\" data-title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 7\" title=\"Hoa hậu Việt Nam 2020 thí sinh ảnh 7\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: block; width: 960px;\"></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 15.84px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 14px 96px 30px; border: 0px; font-size: 1.2em; vertical-align: baseline; background: transparent; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%; display: inline;\"><p>Nguyễn Thị Bích Thùy, đến từ Đắk Lắk, từng tham gia Miss World Vietnam 2019 và đạt thành tích top 10. Bên cạnh đó, cô cũng giành giải phụ Người đẹp Áo dài. Hiện, Bích Thùy là sinh viên năm thứ nhất Đại học Tài chính - Marketing tại TP.HCM. Trở lại cuộc thi sắc đẹp lần này, 10X tâm sự cô cảm thấy khá căng thẳng: \"Năm 2019, Thùy đi thi với mong muốn bản thân có cơ hội thử sức, trải nghiệm. Bây giờ, đến với Hoa hậu Việt Nam, tôi đề ra mục tiêu cao hơn và quyết tâm hơn. Vì thế, tôi có áp lực một chút\". Ảnh:&nbsp;<em style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; font-size: 19.008px; vertical-align: baseline; background: transparent; text-size-adjust: 100%;\">NVCC.</em></p></p></td></tr></tbody></table>', 'hoangphat', 3, '2020-08-10 17:15:00', 'hoctap'),
(46, 'Đen Vâu quyên góp trăm triệu đồng chống dịch', '<p class=\"the-article-summary\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; line-height: 1.618; clear: both; float: left; width: 660px;\">Rapper \"Lối nhỏ\" muốn chung tay góp lửa và gửi lời cảm ơn, chúc tốt lành đến những y bác sĩ trong công tác phòng chống dịch bệnh.</p><p class=\"the-article-body\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; float: left; width: 660px; position: relative; line-height: 1.618;\"><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; float: none; width: 660px;\">Đen Vâu vừa gửi tiền ủng hộ công tác phòng, chống dịch Covid-19 và hạn mặn ở miền Tây tới số tài khoản của Ủy ban Trung ương Mặt trận Tổ quốc Việt Nam. Anh không tiết lộ con số chính xác dù ảnh chuyển khoản cho thấy con số \"trăm triệu đồng\".</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">\"Nhà nước kiên cường chống dịch, miền Tây oằn mình chống hạn, là một người con Việt Nam, bản thân Đen thấy trách nhiệm của mình cùng cộng đồng vượt qua giai đoạn gian khó này\", nam rapper nhắn gửi.</p><table class=\"picture\" align=\"right\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 10px 0px 18px 20px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; width: 320px; max-width: 320px;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative; cursor: pointer;\"><img src=\"https://znews-photo.zadn.vn/w660/Uploaded/izhqv/2020_03_28/90591179_1346570902196893_43451952205398016_n.jpg\" title=\"Đen Vâu góp trăm triệu ảnh 1\" alt=\"Den Vau gop tram trieu anh 1\" data-bind-event=\"true\" slide-pos=\"1\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: block; width: 320px;\"></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pCaption caption default-caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding-top: 5px; padding-bottom: 8px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative;\">Đen Vâu gửi tiền ủng hộ công tác chống hạn mặn miền Tây và phòng chống dịch Covid-19.</td></tr></tbody></table><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Anh cũng cho biết hành động này thể hiện sự chung tay góp lửa và muốn gửi lời cảm ơn, lời chúc tốt lành đến những y bác sĩ, những chiến sĩ kỹ sư anh hùng đang ngày đêm công tác vì bình an cho xã hội.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">\"Đen cũng xin dùng chút ảnh hưởng nhỏ nhoi của mình kêu gọi anh chị em đồng âm cùng Đen ủng hộ. Có ít góp ít, có nhiều góp nhiều, mình vì mọi người, mọi người vì mình. Thân thương hai tiếng Việt Nam, tự hào là người Việt Nam\".</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Những ngày qua, nhiều fandom của nghệ sĩ Việt như FC Mỹ Tâm, FC Sơn Tùng M-TP, FC Noo Phước Thịnh, FC Jack, FC K-ICM cũng quyên góp hỗ trợ phòng chống dịch.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Nhiều nghệ sĩ Việt đồng hành cùng các chương trình gây quỹ, mua vật phẩm hỗ trợ công tác phòng chống dịch Covid-19. Ngoài ra, họ cũng chung tay giúp đỡ bà con miền Tây đang gồng mình chiến đấu với hạn mặn.</p></p>', 'clm', 0, '2020-08-11 10:09:54', 'giaitri');
INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_content`, `topic_creator`, `view`, `date`, `category`) VALUES
(47, 'Hoàng Thùy Linh đại thắng tại giải Âm nhạc Cống hiến', '<p class=\"the-article-summary\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; line-height: 1.618; clear: both; float: left; width: 660px;\">Hoàng Thùy Linh trở thành nghệ sĩ đầu tiên chiến thắng bốn hạng mục tại giải thưởng Âm nhạc Cống hiến.</p><p class=\"the-article-body\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; float: left; width: 660px; position: relative; line-height: 1.618;\"><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; float: none; width: 660px;\">Ngày 25/3, giải thưởng Âm nhạc Cống hiến công bố danh sách các nghệ sĩ đoạt giải ở 9 hạng mục.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Theo đó,&nbsp;<a href=\"https://zingnews.vn/tieu-diem/hoang-thuy-linh-nhan-vat.html\" title=\"Tin tức Hoàng Thùy Linh\" class=\"topic person autolink\" topic-id=\"3670\" style=\"text-rendering: geometricprecision; outline: none; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; cursor: pointer; border-bottom: 0px none;\">Hoàng Thùy Linh</a>&nbsp;đã trở thành nghệ sĩ đầu tiên lập cú “poker” (ăn 4) khi chiến thắng 4 hạng mục là: Bài hát của năm (<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Để Mị nói cho mà nghe</span>), Music video của năm (<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Đệ Mị nói cho mà nghe</span>), Album của năm (<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hoàng</span>) và Ca sĩ của năm.</p><table class=\"picture\" align=\"right\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 10px 0px 18px 20px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; width: 320px; max-width: 320px;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative; cursor: pointer;\"><img src=\"https://znews-photo.zadn.vn/w660/Uploaded/izhqv/2020_03_25/Hoang_Thuy_Linh_14_1.jpg\" alt=\"Hoang Thuy Linh dai thang anh 1\" data-bind-event=\"true\" slide-pos=\"1\" data-title=\"Hoàng Thùy Linh đại thắng ảnh 1\" title=\"Hoàng Thùy Linh đại thắng ảnh 1\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: block; width: 320px;\"></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding-top: 5px; padding-bottom: 8px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: inline;\">Hoàng Thùy Linh trở thành nghệ sĩ đầu tiên chiến thắng bốn hạng mục tại giải thưởng Âm nhạc Cống hiến.</p></td></tr></tbody></table><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Ca sĩ mới của năm thuộc về Amee, trong khi Phan Mạnh Quỳnh chiến thắng hạng mục Nhạc sĩ của năm.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Ban tổ chức cho biết theo quy chế của giải thưởng, đề cử đoạt giải là đề cử có số phiếu bầu cao nhất từ báo giới trong từng hạng mục. Trường hợp trong cùng hạng mục có 2 đề cử có số phiếu bằng nhau, thì phiếu của ban tổ chức sẽ là lá phiếu quyết định.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Năm nay ở hạng mục Chương trình của năm (gồm 6 đề cử), đề cử&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Truyện ngắn</span>&nbsp;của Hà Anh Tuấn và&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Trở về</span>&nbsp;của Tân Nhàn có số phiếu bằng nhau (cùng 28 phiếu).</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Ban tổ chức đánh giá cả 2 chương trình nói trên đều xứng đáng đoạt giải, nhưng BTC đã chọn&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Trở về</span>&nbsp;của Tân Nhàn.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Do ảnh hưởng của dịch Covid-19, giải Âm nhạc Cống hiến năm nay không tổ chức đêm trao giải như hàng năm. Ban Tổ chức đã quyết định trao cúp cho các nghệ sĩ đoạt giải tại trụ sở BTC.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Giải thưởng Âm nhạc Cống hiến là giải thưởng thường niên do các phóng viên theo dõi mảng âm nhạc của các cơ quan báo đài trên toàn quốc bình chọn.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Tiêu chí của giải là lựa chọn các tác giả, tác phẩm, chương trình: \"Có những khám phá, sáng tạo đóng góp thiết thực vào sự phong phú và phát triển của đời sống âm nhạc đại chúng\".</p><p class=\"notebox ncenter\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px 0px 18px; padding: 30px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; border-radius: 5px; line-height: 1.67; float: left; width: 660px; position: relative;\"><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Kết quả bầu chọn giải Âm nhạc Cống hiến lần 15-2020</span></p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">1. Nhà sản xuất của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Nhóm DTAP</span></font><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;</span>(Thịnh Kainz - Kata Trần - Tùng Cedrus).</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">2. Music video của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Để Mị nói cho mà nghe</span></font><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;</span>(Thể hiện: Hoàng Thùy Linh; ĐD: Nhu Đặng; Sáng tác: Thịnh Kainz - Kata Trần).</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">3. Bài hát của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Để Mị nói cho mà nghe</span></font><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;</span>(Sáng tác: Thịnh Kainz - Kata Trần;</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Thể hiện: Hoàng Thùy Linh).</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">4. Nghệ sĩ mới của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Amee.</span></font></p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">5. Album của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hoàng</span></font>&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">(Thể hiện: Hoàng Thùy Linh; Sáng tác: Thịnh Kainz - Kata Trần).</span></p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">6. Chuỗi chương trình của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Lễ hội âm nhạc TP.HCM - Hò dô 2019</span></font><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;</span>(Sở VH,TT TP.HCM).</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">7. Chương trình của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Trở về</span></font>&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">(Tân Nhàn).</span></p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 12px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">8. Nhạc sĩ của năm:&nbsp;<font color=\"#406182\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Phan Mạnh Quỳnh.</span></font></p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 12px; margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">9. Ca sĩ của năm:&nbsp;<span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial;\">Hoàng Thùy Linh.</span></p></p></p>', 'clm', 1, '2020-08-11 10:18:07', 'giaitri'),
(48, 'Cần tìm iPhone 6s đánh mất ở lớp 11 nga ngày 10/8/2020', '<p>như tiêu đề?</p><p>em cần tìm lại điện thoại đã bị đánh mất vì trong đó có chứa rất nhiều tài liệu học tập quan trọng của em ạ!</p>', 'clm', 3, '2020-08-11 10:59:56', 'timdo'),
(49, 'Nghệ sĩ Bạch Long: Tôi mua nhẫn tặng bạn gái xong không vừa đem đi đổi thì cô ấy lấy luôn ông chủ tiệm vàng', '<p>acCxz</p>', 'clm', 1, '2020-08-11 11:51:53', 'hoctap'),
(50, 'Ba loại virus máy tính từng ám ảnh Microsoft và cả thế giới', '<p>sadsdsdsd</p>', 'hoangphat', 3, '2020-08-11 11:52:23', 'hoctap'),
(51, 'địt cụ mày', '<p>gg</p>', 'hoangphat', 2, '2020-08-11 11:53:31', 'giaitri');
INSERT INTO `topics` (`topic_id`, `topic_name`, `topic_content`, `topic_creator`, `view`, `date`, `category`) VALUES
(45, 'Đen Vâu lần đầu rap trên trực thăng và nhắc tới Tăng Thanh Hà', '<p class=\"the-article-summary\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; line-height: 1.618; clear: both; float: left; width: 660px;\">Đen Vâu cho biết anh áp lực khi sáng tác sản phẩm mới \"Trời hôm nay nhiều mây cực!\". MV được quay tối giản với khung cảnh một trực thăng bay trên không trung.</p><p class=\"the-article-body\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; float: left; width: 660px; position: relative; line-height: 1.618;\"><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; float: none; width: 660px;\">Sau&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Một triệu like</span>&nbsp;được phát hành cách đây 6 tháng, Đen Vâu khá im ắng dù anh thường được nhắc đến như một trong những rapper thành công nhất của thị trường nhạc Việt hiện tại. Trước đó, anh có&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hai triệu năm</span>&nbsp;trở thành hit dù được quay đơn giản với kinh phí chỉ vài triệu đồng.</p><h3 style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 10px; margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; float: left; width: 660px;\">\"Tôi cảm thấy tù túng\"</h3><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; margin-top: 80px !important;\">Nói về lý do vắng bóng 6 tháng, Đen Vâu chia sẻ với&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Zing</span>&nbsp;anh bế tắc và áp lực trong việc tạo ra ca khúc mới để vượt qua cái bóng của những sản phẩm trước.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">“Suốt 6 tháng không viết được gì, tôi bế tắc trong những ý tưởng, sợ bị đi vào lối mòn, tất cả những câu từ nghĩ ra đều giống những sản phẩm mình đã làm rồi nên phải bỏ hết. Tôi cảm thấy tù túng, đó là lúc tôi hiểu mình đang chịu áp lực từ công việc này”, rapper chia sẻ.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">“Khi áp lực nặng nề không viết được gì, bạn bè cũng bảo hay đi chỗ này, chỗ kia đẹp để lấy cảm hứng. Khi đó, tôi nghĩ việc du lịch có thực sự đúng không hay bản thân đang bị ngoại cảnh chi phối? Cuối cùng, bài này tôi đã ở nhà để viết. Chúng ta không cần phải đi tìm thứ gì mới lạ, xa xôi nữa, mà chỉ cần ngay trong tâm trí mình”, Đen Vâu nói.</p><table class=\"picture\" align=\"center\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 18px 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; width: 660px;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative; cursor: pointer;\"><p class=\"zad-inimage-wrapper\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; overflow: hidden;\"><img src=\"https://znews-photo.zadn.vn/w660/Uploaded/qfssu/2020_08_06/MV41.jpg\" alt=\"Den vau Troi hom nay nhieu may cu anh 1\" data-bind-event=\"true\" slide-pos=\"1\" data-title=\"Đen vâu Trời hôm nay nhiều mây cự ảnh 1\" title=\"Đen vâu Trời hôm nay nhiều mây cự ảnh 1\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: block; width: 660px;\"></p></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding-top: 5px; padding-bottom: 8px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: inline;\">Đen Vâu ghi hình MV mới với trực thăng.</p></td></tr></tbody></table><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Từ tâm trạng đó, rapper viết nên ca khúc&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Trời hôm nay nhiều mây cực!</span>. MV của bài được phát hành tối 6/8. MV tiếp tục được dàn dựng theo lối đơn giản như&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hai triệu năm</span>&nbsp;quay hình dưới nước hay&nbsp;<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Một triệu like</span>&nbsp;ở rừng. Sự đơn giản trong những MV tìm về thiên nhiên đã trở thành nét đặc trưng của riêng Đen Vâu.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Nói về thông điệp muốn truyền tải qua sản phẩm, Đen Vâu cho biết: “Tôi nghĩ không chỉ riêng tôi, mọi người đều cảm thấy cuộc sống này đã có sự thay đổi. Đợt dịch này có thể phá hết toan tính của từng người, cho đến cả thế giới. Tôi nghĩ đã đến lúc chúng ta nhận ra sâu hơn rằng thực sự trong cuộc sống này mình cần điều gì, đã bỏ phí những điều gì. Ai cũng sẽ có sự thay đổi trong tư duy như vậy”.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">“Ca khúc này tôi làm để mình thoải mái, bớt chiêm nghiệm, nặng nề, sâu sắc. Sản phẩm chỉ là những suy tưởng vui vẻ của người ngước nhìn lên bầu trời vào buổi chiều tà”, anh nói thêm với<span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">&nbsp;</span>Zing. Thông qua sản phẩm, rapper muốn mang đến cho người nghe cảm giác thoải mái, dễ chịu, tạm quên đi những phiền muộn và áp lực, hay đơn giản chỉ là để khán giả dễ ngủ.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Tuy nhiên, rapper thừa nhận anh áp lực về việc sản phẩm liệu có được đánh giá cao như những ca khúc trước. “Tôi áp lực vì biết không thể nào viết hời hợt được nữa. Nhiều khán giả thích nhạc của tôi nên mong muốn những thứ mới lạ”.</p><h3 style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 10px; margin-right: 0px; margin-left: 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; float: left; width: 660px;\">\"Tôi thích làm nhạc không có kế hoạch\"</h3><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; margin-top: 80px !important;\"><span style=\"outline-color: initial; outline-style: initial; border-style: initial; border-color: initial; border-image: initial; font-size: 17.6px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\">Hôm nay trời nhiều mây cực!</span>&nbsp;là bản rap dài 80 câu với những suy tưởng thú vị của Đen Vâu trong quãng thời gian cách ly xã hội. Thay vì tập trung vào một chủ đề nhất định, ca khúc là những suy tưởng cá nhân của Đen Vâu về các mối quan hệ xã hội, cuộc sống xung quanh, chuyện công việc và cả tình yêu. Ý tưởng đến với anh tình cờ trong một buổi chiều tà khi ngước nhìn lên bầu trời mây.</p><table class=\"picture\" align=\"left\" style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 10px 20px 18px 0px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%; width: 330px;\"><tbody style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pic\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative; cursor: pointer;\"><img src=\"https://znews-photo.zadn.vn/w660/Uploaded/qfssu/2020_08_06/2.jpg\" alt=\"Den vau Troi hom nay nhieu may cu anh 2\" data-bind-event=\"true\" slide-pos=\"2\" data-title=\"Đen vâu Trời hôm nay nhiều mây cự ảnh 2\" title=\"Đen vâu Trời hôm nay nhiều mây cự ảnh 2\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: block; width: 330px;\"></td></tr><tr style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%;\"><td class=\"pCaption caption\" style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin: 0px; padding-top: 5px; padding-bottom: 8px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; position: relative;\"><p style=\"text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-bottom: 0px; padding: 0px; border: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-size-adjust: 100%; display: inline;\">Đen Vâu cho biết anh áp lực khi thực hiện sản phẩm mới.</p></td></tr></tbody></table><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Rapper quay về với lối rap thuần túy, một mình anh đọc 80 câu rap mà không có phần giai điệu kết hợp cùng giọng ca khác như trước đây. Theo Đen Vâu, khi sáng tác, anh cũng nghĩ đến chuyện kết hợp với một đồng nghiệp, nhưng cuối cùng rapper quyết định tự rap hết bài.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Giống những sáng tác trước đây của Đen Vâu, sản phẩm mới ngoài lời rap vần điệu còn có nhiều hình ảnh liên tưởng hài hước như “Tâm tư tựa như bánh tráng, mỏng và có màu cánh gián\", “Sẽ luôn làm người tốt, như là lũ nai. Học cách làm chủ được mình trước khi làm chủ ai\", “Vẫn chưa được gặp&nbsp;<a href=\"https://zingnews.vn/tieu-diem/tang-thanh-ha-nhan-vat.html\" class=\"topic person autolink quickview\" topic-id=\"3815\" style=\"text-rendering: geometricprecision; outline: none; -webkit-font-smoothing: antialiased; margin: 0px; padding: 0px; vertical-align: baseline; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; cursor: pointer; border-bottom: 1px dashed rgb(187, 187, 187);\">Tăng Thanh Hà</a>, nhưng đôi khi bỗng dưng lại muốn khóc\".</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Phần MV được Đen Vâu đầu tư quay hình trên trời. Anh thuê một chiếc trực thăng và ngồi rap nguyên bài từ đầu đến cuối. Qua đó, rapper muốn truyền tải đúng tinh thần tự do như mây trời. Ý tưởng ghi hình đến một cách tình cờ sau khi Đen Vâu sáng tác bản rap được một tuần.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Chia sẻ thêm về quá trình quay hình trên không, Đen Vâu cho biết ê-kíp của anh phải đảm bảo quy định về an toàn một cách nghiêm ngặt. Trước khi cất cánh, rapper được cài dây và thiết bị an toàn bên trong theo đúng quy định đồng thời mặc áo rộng ở ngoài để che lại. Cả đoàn chỉ được ghi hình trước khi mặt trời lặn để không ảnh hưởng đến tầm nhìn hạ cánh của trực thăng.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Lần đầu tiên quay hình và ngồi rap trên trời cũng là thử thách không nhỏ với Đen Vâu và ê-kíp thực hiện MV. Mỗi gói bay trên trời chỉ kéo dài 12 phút nên ê-kíp phải chạy đua với thời gian.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">“Tổng số lần bay là 6 và cảnh trong MV cũng là lần quay hình cuối cùng, những cảnh trước đều bị bỏ đi. Ở lần ghi hình cuối, ê-kíp nói với nhau quay nốt lần này không được đành chịu chứ không biết làm thế nào. Quay hình trên trời, có nhiều cái không thể làm tới nhưng tôi thấy vui vì lần đầu được rap trên trực thăng, lại còn đúng chủ đề của bài hát”, Đen Vâu cho biết.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">Khi được hỏi về kế hoạch âm nhạc trong thời điểm dịch diễn biến phức tạp, Đen Vâu cho biết: “Tôi không có câu trả lời trước mình sẽ làm gì. Tôi cũng lo lắng nếu không vạch kế hoạch, tôi khó đi được đường dài, làm ngày nay không biết đến ngày mai. Nhưng tôi quen với điều này, trong âm nhạc nếu làm việc như vậy sẽ đem đến cái thật, ngẫu hứng nhất như Đen Vâu từ trước đến giờ. Xét theo sự dài hạn, cách làm đó có thể là hạn chế, nhưng thú vị cho bản thân tôi”.</p><p style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; text-rendering: geometricprecision; outline: 0px; -webkit-font-smoothing: antialiased; margin-top: 18px; margin-bottom: 18px; padding: 0px; border: 0px; vertical-align: baseline; text-size-adjust: 100%;\">“Viết được một bài hát cảm giác như trong lòng mình bừng ra một cánh cửa. Đó là lý do tôi vẫn thích cảm giác làm việc như thế này hơn, rất đã. Lúc tưởng đang đi vào một con đường hẹp, nhưng khi mở nút thắt là cả bầu trở sáng bừng”, rapper nói thêm.</p></p>', 'clm', 2, '2020-08-11 10:00:35', 'giaitri');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(999) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(2, 'tunganh03', '$2y$10$w/JptjMXc/YrpQ/p7oFtB.am2Mj9h9/b8AiuNIjoD3edL/cTxGZ1i', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `view`
--

CREATE TABLE `view` (
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Đang đổ dữ liệu cho bảng `view`
--

INSERT INTO `view` (`topic_id`, `user_id`, `view`) VALUES
(13, 0, 1),
(14, 0, 1),
(13, 0, 1),
(13, 0, 1),
(13, 0, 1),
(13, 8, 1),
(12, 8, 1),
(12, 8, 1),
(14, 8, 1),
(13, 8, 1),
(13, 0, 1),
(13, 0, 1),
(11, 0, 1),
(20, 0, 1),
(19, 0, 1),
(20, 0, 1),
(20, 2, 1),
(19, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 11, 1),
(20, 8, 1),
(20, 8, 1),
(17, 8, 1),
(19, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(19, 8, 1),
(15, 8, 1),
(13, 8, 1),
(9, 8, 1),
(9, 8, 1),
(21, 0, 1),
(15, 0, 1),
(15, 0, 1),
(21, 0, 1),
(20, 8, 1),
(20, 8, 1),
(20, 8, 1),
(20, 0, 1),
(20, 2, 1),
(20, 2, 1),
(20, 0, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(19, 2, 1),
(19, 2, 1),
(17, 2, 1),
(17, 2, 1),
(20, 8, 1),
(20, 8, 1),
(19, 8, 1),
(19, 8, 1),
(14, 8, 1),
(14, 8, 1),
(15, 8, 1),
(15, 8, 1),
(7, 8, 1),
(7, 8, 1),
(23, 8, 1),
(23, 8, 1),
(20, 8, 1),
(23, 8, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(12, 2, 1),
(12, 2, 1),
(20, 2, 1),
(17, 22, 1),
(17, 22, 1),
(23, 22, 1),
(23, 22, 1),
(23, 2, 1),
(23, 2, 1),
(15, 11, 1),
(15, 11, 1),
(15, 11, 1),
(17, 11, 1),
(23, 11, 1),
(23, 11, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(19, 11, 1),
(17, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(24, 11, 1),
(20, 11, 1),
(24, 15, 1),
(24, 15, 1),
(24, 2, 1),
(24, 2, 1),
(23, 2, 1),
(23, 2, 1),
(23, 2, 1),
(20, 2, 1),
(20, 2, 1),
(20, 2, 1),
(24, 22, 1),
(24, 11, 1),
(23, 11, 1),
(23, 11, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(24, 15, 1),
(23, 2, 1),
(23, 2, 1),
(7, 2, 1),
(7, 2, 1),
(7, 2, 1),
(7, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 2, 1),
(24, 15, 1),
(24, 2, 1),
(25, 2, 1),
(26, 2, 1),
(24, 2, 1),
(25, 2, 1),
(24, 2, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(27, 2, 1),
(26, 2, 1),
(27, 2, 1),
(23, 2, 1),
(23, 2, 1),
(23, 2, 1),
(23, 2, 1),
(23, 15, 1),
(28, 15, 1),
(28, 15, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 15, 1),
(28, 15, 1),
(28, 15, 1),
(27, 15, 1),
(28, 2, 1),
(15, 2, 1),
(9, 2, 1),
(9, 2, 1),
(28, 2, 1),
(28, 15, 1),
(28, 15, 1),
(28, 15, 1),
(28, 15, 1),
(28, 15, 1),
(13, 15, 1),
(20, 2, 1),
(20, 2, 1),
(7, 2, 1),
(7, 2, 1),
(28, 2, 1),
(23, 2, 1),
(28, 2, 1),
(2, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(27, 2, 1),
(27, 15, 1),
(27, 15, 1),
(20, 15, 1),
(20, 15, 1),
(28, 2, 1),
(23, 15, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(19, 2, 1),
(23, 2, 1),
(17, 2, 1),
(17, 15, 1),
(17, 15, 1),
(23, 2, 1),
(28, 2, 1),
(28, 2, 1),
(27, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(27, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(28, 2, 1),
(27, 15, 1),
(29, 15, 1),
(29, 2, 1),
(29, 2, 1),
(29, 2, 1),
(29, 2, 1),
(29, 2, 1),
(29, 2, 1),
(29, 2, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(30, 15, 1),
(29, 15, 1),
(30, 15, 1),
(30, 15, 1),
(31, 36, 1),
(31, 36, 1),
(29, 36, 1),
(31, 36, 1),
(31, 36, 1),
(31, 36, 1),
(31, 36, 1),
(31, 2, 1),
(31, 15, 1),
(15, 2, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(30, 15, 1),
(31, 15, 1),
(29, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(23, 15, 1),
(31, 2, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 2, 1),
(31, 2, 1),
(31, 2, 1),
(31, 2, 1),
(31, 2, 1),
(31, 15, 1),
(33, 15, 1),
(33, 15, 1),
(33, 15, 1),
(33, 15, 1),
(31, 15, 1),
(31, 15, 1),
(31, 15, 1),
(30, 2, 1),
(30, 2, 1),
(30, 2, 1),
(30, 2, 1),
(30, 2, 1),
(30, 2, 1),
(27, 2, 1),
(27, 2, 1),
(17, 2, 1),
(31, 15, 1),
(32, 15, 1),
(33, 15, 1),
(33, 15, 1),
(33, 15, 1),
(32, 15, 1),
(32, 15, 1),
(32, 15, 1),
(32, 15, 1),
(33, 15, 1),
(31, 15, 1),
(30, 15, 1),
(9, 15, 1),
(9, 15, 1),
(23, 15, 1),
(34, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(35, 15, 1),
(3, 15, 1),
(34, 15, 1),
(31, 41, 1),
(31, 41, 1),
(31, 41, 1),
(31, 41, 1),
(35, 41, 1),
(35, 41, 1),
(31, 41, 1),
(31, 41, 1),
(17, 41, 1),
(17, 41, 1),
(35, 41, 1),
(35, 41, 1),
(27, 41, 1),
(35, 41, 1),
(35, 0, 1),
(35, 0, 1),
(35, 0, 1),
(35, 0, 1),
(35, 0, 1),
(35, 0, 1),
(35, 11, 1),
(35, 11, 1),
(17, 11, 1),
(17, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 11, 1),
(36, 0, 1),
(36, 0, 1),
(36, 0, 1),
(36, 0, 1),
(37, 11, 1),
(37, 11, 1),
(37, 11, 1),
(36, 11, 1),
(36, 11, 1),
(37, 11, 1),
(37, 11, 1),
(37, 0, 1),
(37, 0, 1),
(37, 0, 1),
(36, 15, 1),
(36, 15, 1),
(36, 15, 1),
(36, 15, 1),
(36, 15, 1),
(36, 15, 1),
(37, 15, 1),
(36, 15, 1),
(36, 15, 1),
(41, 15, 1),
(41, 15, 1),
(41, 15, 1),
(41, 0, 1),
(36, 0, 1),
(43, 18, 1),
(41, 18, 1),
(41, 18, 1),
(41, 18, 1),
(37, 18, 1),
(37, 18, 1),
(36, 18, 1),
(36, 18, 1),
(36, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 18, 1),
(37, 18, 1),
(37, 18, 1),
(37, 18, 1),
(36, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 18, 1),
(43, 44, 1),
(36, 44, 1),
(41, 44, 1),
(37, 44, 1),
(36, 44, 1),
(43, 44, 1),
(37, 44, 1),
(36, 44, 1),
(36, 44, 1),
(36, 44, 1),
(43, 44, 1),
(36, 0, 1),
(43, 0, 1),
(41, 0, 1),
(44, 22, 1),
(45, 22, 1),
(48, 22, 1),
(48, 22, 1),
(48, 18, 1),
(50, 18, 1),
(49, 18, 1),
(49, 18, 1),
(51, 18, 1),
(45, 18, 1),
(50, 18, 1),
(49, 18, 1),
(43, 18, 1),
(36, 0, 1),
(51, 0, 1),
(43, 0, 1),
(51, 0, 1),
(50, 0, 1),
(36, 0, 1),
(51, 0, 1),
(37, 0, 1),
(50, 0, 1),
(50, 0, 1),
(51, 0, 1),
(47, 0, 1),
(51, 0, 1),
(50, 15, 1),
(48, 15, 1),
(48, 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `views`
--

CREATE TABLE `views` (
  `audio_name` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `views`
--

INSERT INTO `views` (`audio_name`, `user_id`, `view`) VALUES
('uploads/1ec20de4-75b2-4344-8545-ee4563eaf951.ogg', 18, 1),
('uploads/5841a023-ec61-484f-8f1a-63682f5a76d7.ogg', 41, 1),
('uploads/78bf20e0-8047-4932-994c-02c341a7859f.ogg', 41, 1),
('uploads/b5015952-e87d-487e-81ed-8dff36f221ce.ogg', 15, 1),
('uploads/EmBoHutThuocChua-BichPhuongtraitimtrongvang-6281294.mp3', 15, 1),
('uploads/f91142e2-2fe6-4ea0-bfee-ce3b1e340ded.ogg', 15, 1),
('uploads/Ông Đa 70 Tuổi Remix - Thành Black Remix - ĐM Chúng Mày, Thằng Ranh Con Này.mp3', 15, 1),
('uploads/Ông20Đa 70 Tuổi Remix - Thành Black Remix - ĐM Chúng Mày, Thằng Ranh Con Này.mp3', 15, 1),
('uploads/[Karaoke] Hết thời - Ngọt.mp3', 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xephang`
--

CREATE TABLE `xephang` (
  `id` int(11) NOT NULL,
  `class_id` int(55) NOT NULL,
  `diem` text COLLATE utf8_bin NOT NULL,
  `rank` varchar(55) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Đang đổ dữ liệu cho bảng `xephang`
--

INSERT INTO `xephang` (`id`, `class_id`, `diem`, `rank`) VALUES
(32, 2970, '9', ''),
(33, 3251, '10', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `audios`
--
ALTER TABLE `audios`
  ADD PRIMARY KEY (`audio_id`);

--
-- Chỉ mục cho bảng `baocao`
--
ALTER TABLE `baocao`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `lol` (`id`),
  ADD KEY `2` (`id`);

--
-- Chỉ mục cho bảng `btvn`
--
ALTER TABLE `btvn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `forum_comments`
--
ALTER TABLE `forum_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `gvcn`
--
ALTER TABLE `gvcn`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loi_vi_pham`
--
ALTER TABLE `loi_vi_pham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating_info`
--
ALTER TABLE `rating_info`
  ADD UNIQUE KEY `topic_id` (`comment_id`,`user_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `thongbaolop`
--
ALTER TABLE `thongbaolop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tkb`
--
ALTER TABLE `tkb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tkb_color`
--
ALTER TABLE `tkb_color`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `views`
--
ALTER TABLE `views`
  ADD UNIQUE KEY `audio_name` (`audio_name`);

--
-- Chỉ mục cho bảng `xephang`
--
ALTER TABLE `xephang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `audios`
--
ALTER TABLE `audios`
  MODIFY `audio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `baocao`
--
ALTER TABLE `baocao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `btvn`
--
ALTER TABLE `btvn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `forum_comments`
--
ALTER TABLE `forum_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `gvcn`
--
ALTER TABLE `gvcn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loi_vi_pham`
--
ALTER TABLE `loi_vi_pham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `thongbaolop`
--
ALTER TABLE `thongbaolop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tkb`
--
ALTER TABLE `tkb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tkb_color`
--
ALTER TABLE `tkb_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `xephang`
--
ALTER TABLE `xephang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
