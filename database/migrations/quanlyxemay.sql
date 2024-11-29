-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2024 lúc 12:21 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyxemay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chu_xe`
--

CREATE TABLE `chu_xe` (
  `id_chu_xe` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_cmnd` varchar(12) NOT NULL,
  `so_dien_thoai` varchar(11) NOT NULL,
  `dia_chi` text NOT NULL,
  `id_xe` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giao_dich`
--

CREATE TABLE `giao_dich` (
  `id_giao_dich` bigint(20) UNSIGNED NOT NULL,
  `id_xe` bigint(20) UNSIGNED NOT NULL,
  `ngay_giao_dich` date NOT NULL,
  `gia_ban` decimal(15,2) NOT NULL,
  `ghi_chu` text DEFAULT NULL,
  `loai_giao_dich` enum('Mua mới','Bảo trì') NOT NULL,
  `id_nguoi_ban` bigint(20) UNSIGNED NOT NULL,
  `id_nguoi_mua` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `dich_vu` enum('Mua xe','Bảo dưỡng','Sửa chữa','Phản ánh dịch vụ') NOT NULL DEFAULT 'Mua xe',
  `ghi_chu` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lien_he`
--

INSERT INTO `lien_he` (`id`, `ho_ten`, `so_dien_thoai`, `dich_vu`, `ghi_chu`, `created_at`, `updated_at`) VALUES
(1, 'sc', '252', 'Mua xe', 'scs', '2024-11-27 03:45:40', '2024-11-27 03:45:40');

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
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2024_11_27_042319_create_xe_may_table', 1),
(19, '2024_11_27_042320_create_chu_xe_table', 1),
(20, '2024_11_27_042327_create_giao_dich_table', 1),
(21, '2024_11_27_042335_create_nguoi_dung_table', 1),
(22, '2024_11_27_101824_create_lien_he_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL,
  `ten_dang_nhap` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(15) NOT NULL,
  `vai_tro` enum('Admin','Nhân viên') NOT NULL DEFAULT 'Nhân viên',
  `ngay_tao` date NOT NULL DEFAULT '2024-11-27',
  `trang_thai` enum('Hoạt động','Tạm khóa') NOT NULL DEFAULT 'Hoạt động',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id_nguoi_dung`, `ten_dang_nhap`, `mat_khau`, `ho_ten`, `email`, `so_dien_thoai`, `vai_tro`, `ngay_tao`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', '', NULL, '', 'Nhân viên', '2024-11-27', 'Hoạt động', NULL, NULL);

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
-- Cấu trúc bảng cho bảng `xe_may`
--

CREATE TABLE `xe_may` (
  `id_xe` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `bien_so` varchar(15) DEFAULT NULL,
  `dong_xe` varchar(255) NOT NULL,
  `ten_xe` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `mau_sac` varchar(255) DEFAULT NULL,
  `so_khung` varchar(50) DEFAULT NULL,
  `so_may` varchar(50) DEFAULT NULL,
  `loai_xe` enum('1','2','3','4') NOT NULL DEFAULT '1',
  `tinh_nang` varchar(255) NOT NULL,
  `cong_nghe` varchar(255) NOT NULL,
  `thiet_ke` varchar(255) NOT NULL,
  `tienich_antoan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xe_may`
--

INSERT INTO `xe_may` (`id_xe`, `hinh_anh`, `bien_so`, `dong_xe`, `ten_xe`, `gia`, `mau_sac`, `so_khung`, `so_may`, `loai_xe`, `tinh_nang`, `cong_nghe`, `thiet_ke`, `tienich_antoan`, `created_at`, `updated_at`) VALUES
(5, 'https://product.hstatic.net/200000560101/product/alpha_490c985a1d364ba4b6dda4207be9ab3a.png', 'AB1234', 'Xe số', 'Wawe Alpha', 20000000, 'Đỏ, Xanh', 'KH123456', 'SM987654', '1', 'Phanh đĩa, Động cơ mạnh mẽ', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế gọn nhẹ', 'Hệ thống chống trộm', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(6, 'https://motosaigon.vn/wp-content/uploads/2021/10/honda-future-125-2022-moi-danh-gia-xe-motosaigon-4.jpg', 'AB2345', 'Xe số', 'Future 125', 35000000, 'Xanh, Đỏ', 'KH654321', 'SM112233', '1', 'Phanh đĩa, Động cơ 125cc', 'Công nghệ tiết kiệm xăng', 'Thiết kế hiện đại', 'Hệ thống an toàn ABS', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(7, 'https://livingwithgravity.com/wp-content/uploads/2021/04/Honda-supercub-6.jpg', 'AB3456', 'Xe số', 'Supercub 125', 45000000, 'Trắng, Đen', 'KH789012', 'SM223344', '1', 'Động cơ mạnh mẽ, Tiết kiệm nhiên liệu', 'Công nghệ phun xăng điện tử', 'Thiết kế cổ điển', 'Chống trộm, khóa an toàn', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(8, 'http://cms-i.autodaily.vn/du-lieu/2017/12/07/3-mau-xe-moi-honda-autodaily-3.jpg', 'AB4567', 'Xe số', 'Honda Blade 110', 24000000, 'Đỏ, Xanh', 'KH345678', 'SM556677', '1', 'Phanh đĩa, Động cơ 110cc', 'Công nghệ tiết kiệm xăng', 'Thiết kế thể thao', 'Hệ thống giảm xóc hiệu quả', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(9, 'https://images.autofun.vn/file1/108fb6bd72614bcaa7a3ed4829d86072_800.png', 'SH160', 'Xe tay ga', 'SH160', 98000000, 'Đỏ, Trắng', 'KH876543', 'SM667788', '2', 'Phanh ABS, Động cơ mạnh mẽ', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế sang trọng', 'Chống trộm, khóa an toàn', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(10, 'http://media.vietq.vn/files/lehoa/2017/10/29/xe-tay-ga-1.jpg', 'VS110', 'Xe tay ga', 'Vision 110', 30000000, 'Đen, Trắng', 'KH123456', 'SM998877', '2', 'Động cơ 110cc, Phanh đĩa', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế thanh lịch', 'Chống trộm, khóa an toàn', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(11, 'https://ssl.latcdn.com/img/95liUzSee-mau-xe-honda-air-blade-1-ba85.jpg', 'AB160', 'Xe tay ga', 'Airblade 160', 55000000, 'Đỏ, Xanh', 'KH112233', 'SM667788', '2', 'Phanh ABS, Động cơ mạnh mẽ', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế thể thao', 'Hệ thống giảm xóc hiệu quả', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(12, 'https://arenamotosikal.com/wp-content/uploads/2022/05/2022-Honda-Lead-125-Thailand-001.jpeg', 'LD125', 'Xe tay ga', 'Lead 125', 42000000, 'Đỏ, Xám', 'KH445566', 'SM223344', '2', 'Động cơ 125cc, Phanh đĩa', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế hiện đại', 'Hệ thống an toàn ABS', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(13, 'https://media.vov.vn/sites/default/files/styles/large/public/2021-12/phien_ban_the_thao_xe_do_den.jpg', 'WX110', 'Xe côn tay', 'Winner X', 60000000, 'Đen, Đỏ', 'KH998877', 'SM334455', '3', 'Động cơ 150cc, Phanh đĩa', 'Công nghệ phun xăng điện tử', 'Thiết kế thể thao', 'Chống trộm, khóa an toàn', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(14, 'https://img.tinxe.vn/resize/1000x-/2021/01/12/XForF7yt/mau-xe-honda-cbr150r-2021-1-719c.jpg', 'CBR150', 'Xe côn tay', 'CBR150R', 80000000, 'Đỏ, Xám', 'KH223344', 'SM556677', '3', 'Phanh đĩa, Động cơ mạnh mẽ', 'Công nghệ tiết kiệm nhiên liệu', 'Thiết kế thể thao', 'Hệ thống chống trộm', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(15, 'https://cdn.honda.com.vn/e-motorbike-versions/Image360/October2024/1729582463/7.png', 'ICONE', 'Xe điện', 'ICON e', 45000000, 'Đen, Trắng', 'KH667788', 'SM998877', '4', 'Phanh ABS, Động cơ điện', 'Công nghệ tiết kiệm năng lượng', 'Thiết kế hiện đại', 'Hệ thống an toàn điện', '2024-11-27 11:18:16', '2024-11-27 11:18:16'),
(16, 'https://cdn.honda.com.vn/e-motorbike-versions/Image360/October2024/1729590859/7.png', 'CUVE', 'Xe điện', 'CUV e', 50000000, 'Trắng, Đen', 'KH223344', 'SM667788', '4', 'Động cơ điện, Phanh ABS', 'Công nghệ tiết kiệm năng lượng', 'Thiết kế tối giản', 'Hệ thống an toàn điện', '2024-11-27 11:18:16', '2024-11-27 11:18:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chu_xe`
--
ALTER TABLE `chu_xe`
  ADD PRIMARY KEY (`id_chu_xe`),
  ADD UNIQUE KEY `chu_xe_so_cmnd_unique` (`so_cmnd`),
  ADD KEY `chu_xe_id_xe_foreign` (`id_xe`);

--
-- Chỉ mục cho bảng `giao_dich`
--
ALTER TABLE `giao_dich`
  ADD PRIMARY KEY (`id_giao_dich`),
  ADD KEY `giao_dich_id_xe_foreign` (`id_xe`),
  ADD KEY `giao_dich_id_nguoi_ban_foreign` (`id_nguoi_ban`),
  ADD KEY `giao_dich_id_nguoi_mua_foreign` (`id_nguoi_mua`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id_nguoi_dung`),
  ADD UNIQUE KEY `nguoi_dung_ten_dang_nhap_unique` (`ten_dang_nhap`),
  ADD UNIQUE KEY `nguoi_dung_email_unique` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `xe_may`
--
ALTER TABLE `xe_may`
  ADD PRIMARY KEY (`id_xe`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chu_xe`
--
ALTER TABLE `chu_xe`
  MODIFY `id_chu_xe` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giao_dich`
--
ALTER TABLE `giao_dich`
  MODIFY `id_giao_dich` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `id_nguoi_dung` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xe_may`
--
ALTER TABLE `xe_may`
  MODIFY `id_xe` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chu_xe`
--
ALTER TABLE `chu_xe`
  ADD CONSTRAINT `chu_xe_id_xe_foreign` FOREIGN KEY (`id_xe`) REFERENCES `xe_may` (`id_xe`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `giao_dich`
--
ALTER TABLE `giao_dich`
  ADD CONSTRAINT `giao_dich_id_nguoi_ban_foreign` FOREIGN KEY (`id_nguoi_ban`) REFERENCES `chu_xe` (`id_chu_xe`) ON DELETE CASCADE,
  ADD CONSTRAINT `giao_dich_id_nguoi_mua_foreign` FOREIGN KEY (`id_nguoi_mua`) REFERENCES `chu_xe` (`id_chu_xe`) ON DELETE CASCADE,
  ADD CONSTRAINT `giao_dich_id_xe_foreign` FOREIGN KEY (`id_xe`) REFERENCES `xe_may` (`id_xe`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
