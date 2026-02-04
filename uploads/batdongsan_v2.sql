-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 04, 2026 at 07:36 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batdongsan_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `baidang`
--

CREATE TABLE `baidang` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `loai_bds_id` int NOT NULL,
  `tieu_de` varchar(255) DEFAULT NULL,
  `mo_ta` text,
  `gia` bigint DEFAULT NULL COMMENT 'Gia theo VND',
  `dien_tich` float DEFAULT NULL COMMENT 'm2',
  `dia_chi` varchar(255) DEFAULT NULL,
  `trang_thai` tinyint DEFAULT '0' COMMENT '0=cho_duyet,1=hoat_dong,2=da_ban,3=an',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_priority` tinyint(1) DEFAULT '0',
  `tinh_thanh` varchar(100) DEFAULT NULL,
  `quan_huyen` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `baidang`
--

INSERT INTO `baidang` (`id`, `user_id`, `loai_bds_id`, `tieu_de`, `mo_ta`, `gia`, `dien_tich`, `dia_chi`, `trang_thai`, `created_at`, `updated_at`, `is_priority`, `tinh_thanh`, `quan_huyen`) VALUES
(16, 1, 1, 'test nhà (đã sửa) 1', 'dsadsadasdsa(đã sửa)', 223, 223, 'dsadsadsadsa(đã sửa)', 2, '2026-02-04 05:40:14', '2026-02-04 06:26:56', 1, NULL, NULL),
(17, 1, 1, 'test_nhà', '2', 2, 2, '2', 1, '2026-02-04 05:59:58', '2026-02-04 06:01:22', 0, NULL, NULL),
(18, 1, 1, 'test_nhà', '2', 2, 2, '2', 1, '2026-02-04 06:00:39', '2026-02-04 06:06:39', 0, NULL, NULL),
(19, 1, 1, 'test_nhà', '2', 2, 2, '2', 2, '2026-02-04 06:00:49', '2026-02-04 06:36:57', 0, NULL, NULL),
(20, 3, 2, 'Đất nền ven sông Thủ Đức 2dsadsadsad', 'dsadsadsadsad', 22, 22, 'TP. Thủ Đức quận 2222', 0, '2026-02-04 07:08:31', '2026-02-04 07:08:31', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `baidang_dat`
--

CREATE TABLE `baidang_dat` (
  `baidang_id` int NOT NULL,
  `loai_dat` varchar(100) DEFAULT NULL,
  `phap_ly_dat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `baidang_dat`
--

INSERT INTO `baidang_dat` (`baidang_id`, `loai_dat`, `phap_ly_dat`) VALUES
(20, 'sad', 'dsa');

-- --------------------------------------------------------

--
-- Table structure for table `baidang_images`
--

CREATE TABLE `baidang_images` (
  `id` int NOT NULL,
  `baidang_id` int NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `baidang_images`
--

INSERT INTO `baidang_images` (`id`, `baidang_id`, `image`) VALUES
(45, 16, '1770183614_6982dbbec73a9.png'),
(51, 19, '1770184849_6982e091611ae.png'),
(52, 19, '1770184849_6982e09161b63.png'),
(56, 19, '1770185545_Screenshot 2025-11-04 230157.png'),
(58, 16, '1770186003_anhtess.png'),
(59, 20, '1770188911_6982f06f74fe9.png'),
(60, 20, '1770188911_6982f06f75912.png'),
(61, 20, '1770188911_6982f06f7613a.png'),
(62, 20, '1770188911_6982f06f768f7.png');

-- --------------------------------------------------------

--
-- Table structure for table `baidang_nha`
--

CREATE TABLE `baidang_nha` (
  `baidang_id` int NOT NULL,
  `so_phong` int DEFAULT NULL,
  `so_tang` int DEFAULT NULL,
  `phap_ly_nha` varchar(255) DEFAULT NULL,
  `noi_that` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `baidang_nha`
--

INSERT INTO `baidang_nha` (`baidang_id`, `so_phong`, `so_tang`, `phap_ly_nha`, `noi_that`) VALUES
(16, 2, 2, '', ''),
(19, 2, 2, 'đầy đủ', 'đầy đủ');

-- --------------------------------------------------------

--
-- Table structure for table `phanloai_bds`
--

CREATE TABLE `phanloai_bds` (
  `id` int NOT NULL,
  `ten_loai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phanloai_bds`
--

INSERT INTO `phanloai_bds` (`id`, `ten_loai`) VALUES
(1, 'Nhà ở'),
(2, 'Đất nền'),
(3, 'Chung cư'),
(4, 'Mặt bằng');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `baidang_id` int DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `content` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `is_home` tinyint DEFAULT '0' COMMENT '1: hiển thị trang chủ, 0: không',
  `status` tinyint DEFAULT '1' COMMENT '1: đã duyệt, 0: nháp',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_priority` tinyint DEFAULT '0' COMMENT '1: hiển thị lên đầu, 0: bình thường',
  `priority_at` datetime DEFAULT NULL COMMENT 'Thời điểm được ưu tiên'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `baidang_id`, `title`, `slug`, `content`, `thumbnail`, `is_home`, `status`, `created_at`, `updated_at`, `is_priority`, `priority_at`) VALUES
(1, NULL, 'Nhà đất hot Quận 9 đầu năm 2026', 'nha-dat-hot-quan-9-2026', 'Danh sách các bất động sản nổi bật, pháp lý rõ ràng, giá tốt tại Quận 9.', 'uploads/posts/quan9_hot.jpg', 1, 1, '2026-01-31 15:32:54', '2026-01-31 15:32:54', 1, '2026-01-31 15:32:54'),
(2, NULL, 'Nhà 2 tầng trung tâm Quận 9', 'bat-dong-san-1', 'Nhà mới xây, sổ hồng riêng', 'uploads/nha1_1.jpg', 1, 1, '2026-01-31 15:33:53', '2026-01-31 15:33:53', 1, '2026-01-31 15:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `hotline` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `site_color` varchar(20) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` text,
  `slide1` varchar(255) DEFAULT NULL,
  `slide2` varchar(255) DEFAULT NULL,
  `slide3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `hotline`, `email`, `address`, `site_color`, `seo_title`, `seo_description`, `slide1`, `slide2`, `slide3`) VALUES
(1, 'SinhDoiLand ', '1770182471_logo.png', '0909 999 999', 'contact@sinhdoiland.vn', 'TP.HCM', '#16a34a', 'SinhDoiLand - Bất động sản', 'Trang web mua bán bất động sản uy tín', 'slide1.png', 'slide2.png', 'slide3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tuvan`
--

CREATE TABLE `tuvan` (
  `id` int NOT NULL,
  `ten_khach` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `noi_dung` text,
  `baidang_id` int DEFAULT NULL,
  `user_nhan_id` int DEFAULT NULL,
  `trang_thai` int DEFAULT NULL COMMENT '0=chua_xu_ly, 1=da_lien_he, 2=da_coc, 3=da_chot, 4=da_xu_ly',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tuvan`
--

INSERT INTO `tuvan` (`id`, `ten_khach`, `phone`, `email`, `noi_dung`, `baidang_id`, `user_nhan_id`, `trang_thai`, `created_at`) VALUES
(32, 'Hòa Đặng Đình', '0362053209', 'jjklight66@gmail.com', 'fdsasdsa', NULL, 1, 3, '2026-02-03 08:34:35'),
(56, 'dsadsadas', '2222222', 'dasdasd@gsdsa.c', 'đasadsadasdasdsadasd', NULL, 1, 3, '2026-02-04 06:22:04'),
(57, 'Hòa Đặng Đình', '0362053209', 'jjklight66@gmail.com', 'test nahf', 16, 1, 2, '2026-02-04 06:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `created_at`) VALUES
(1, 'Admin Sinh Đôi', 'admin@sinhdoi.com', 'e10adc3949ba59abbe56e057f20f883e', '0909000000', 'admin', 1, '2026-01-31 07:08:53'),
(2, 'Nguyễn Văn A', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0909111111', 'user', 1, '2026-01-31 07:08:53'),
(3, 'Trần Văn B', 'user2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0909222222', 'user', 1, '2026-01-31 07:08:53'),
(5, 'Hòa Đặng Đình', 'jjklight66@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0362053209', 'user', 1, '2026-02-04 07:34:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_baidang_user` (`user_id`),
  ADD KEY `fk_baidang_loai` (`loai_bds_id`);

--
-- Indexes for table `baidang_dat`
--
ALTER TABLE `baidang_dat`
  ADD PRIMARY KEY (`baidang_id`);

--
-- Indexes for table `baidang_images`
--
ALTER TABLE `baidang_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_images_baidang` (`baidang_id`);

--
-- Indexes for table `baidang_nha`
--
ALTER TABLE `baidang_nha`
  ADD PRIMARY KEY (`baidang_id`);

--
-- Indexes for table `phanloai_bds`
--
ALTER TABLE `phanloai_bds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_baidang` (`baidang_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tuvan`
--
ALTER TABLE `tuvan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tuvan_baidang` (`baidang_id`),
  ADD KEY `fk_tuvan_user` (`user_nhan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `baidang_images`
--
ALTER TABLE `baidang_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `phanloai_bds`
--
ALTER TABLE `phanloai_bds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tuvan`
--
ALTER TABLE `tuvan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baidang`
--
ALTER TABLE `baidang`
  ADD CONSTRAINT `fk_baidang_loai` FOREIGN KEY (`loai_bds_id`) REFERENCES `phanloai_bds` (`id`),
  ADD CONSTRAINT `fk_baidang_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `baidang_dat`
--
ALTER TABLE `baidang_dat`
  ADD CONSTRAINT `fk_dat_baidang` FOREIGN KEY (`baidang_id`) REFERENCES `baidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `baidang_images`
--
ALTER TABLE `baidang_images`
  ADD CONSTRAINT `fk_images_baidang` FOREIGN KEY (`baidang_id`) REFERENCES `baidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `baidang_nha`
--
ALTER TABLE `baidang_nha`
  ADD CONSTRAINT `fk_nha_baidang` FOREIGN KEY (`baidang_id`) REFERENCES `baidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_baidang` FOREIGN KEY (`baidang_id`) REFERENCES `baidang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tuvan`
--
ALTER TABLE `tuvan`
  ADD CONSTRAINT `fk_tuvan_baidang` FOREIGN KEY (`baidang_id`) REFERENCES `baidang` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_tuvan_user` FOREIGN KEY (`user_nhan_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
