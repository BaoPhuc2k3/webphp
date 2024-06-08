-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 31, 2023 lúc 04:48 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pj09qlhtk`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id_kh` int(50) NOT NULL,
  `ten_kh` varchar(20) NOT NULL,
  `email_kh` varchar(255) NOT NULL,
  `sdt_kh` varchar(15) NOT NULL,
  `dia_chi_kh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id_kh`, `ten_kh`, `email_kh`, `sdt_kh`, `dia_chi_kh`) VALUES
(1, 'Nam', 'nam@gmail.com', '68668', 'HN'),
(2, 'Nam', 'nam@gmail.com', '68669', 'HN'),
(5, 'oppo', 'oppo2@gmail.com', '02222345', 'Trung Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id_loai_sp` int(11) NOT NULL,
  `ten_loai_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id_loai_sp`, `ten_loai_sp`) VALUES
(1, 'Điện thoại'),
(2, 'Laptop'),
(3, 'Đồng hồ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcap`
--

CREATE TABLE `nhacungcap` (
  `id_nha_cc` int(50) NOT NULL,
  `ten_nha_cc` varchar(20) NOT NULL,
  `email_nha_cc` varchar(20) NOT NULL,
  `sdt_nha_cc` varchar(255) NOT NULL,
  `dia_chi_nha_cc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcap`
--

INSERT INTO `nhacungcap` (`id_nha_cc`, `ten_nha_cc`, `email_nha_cc`, `sdt_nha_cc`, `dia_chi_nha_cc`) VALUES
(1, 'Apple', 'apple@gmail.com', '9999', 'Mỹ'),
(2, 'Xiaomi', 'xiaomi@gmail.com', '88886', 'Trung Quốc'),
(3, 'Bphone', 'bphone@', '5554', 'VN'),
(4, 'Samsung', 'ss@gmail.com', '09678', 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `id` int(11) NOT NULL,
  `ngay_nhap` date NOT NULL,
  `nha_cung_cap_sp` varchar(255) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `mota_sp` varchar(255) NOT NULL,
  `loai_sp` varchar(255) NOT NULL,
  `gia_nhap_sp` int(255) NOT NULL,
  `so_luong` int(255) NOT NULL,
  `tong_tien_hang` bigint(255) NOT NULL,
  `nguoi_nhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`id`, `ngay_nhap`, `nha_cung_cap_sp`, `ten_sp`, `anh_sp`, `mota_sp`, `loai_sp`, `gia_nhap_sp`, `so_luong`, `tong_tien_hang`, `nguoi_nhap`) VALUES
(21, '2023-10-10', 'Apple', 'iPhone 15', 'iPhone-15-ble1.jpg', '512Gb', 'Điện thoại', 23, 10, 230, 'Hữu Nghĩa'),
(22, '2023-10-11', 'Apple', 'iPhone 15 Pro', '15-Pro-nar1170930957.jpg', '256Gb', 'Điện thoại', 25, 25, 625, 'Hữu Nghĩa'),
(23, '2023-10-03', 'Apple', 'iPhone 15 Pro Max', '15-Pro-21042049221.jpg', '512Gb', 'Điện thoại', 35, 50, 1750, 'Trần Thành'),
(24, '2023-10-02', 'Apple', 'iPhone XsMax', '600_600_xs_max_white_800x800_3_bebd9519a1814f99ae954bc598ef9bd5_1024x1024.webp', '512GB', 'Điện thoại', 8, 60, 480, 'Tú'),
(25, '2023-10-01', 'Apple', 'Smart Watch 9', '962047102.jpeg', '42 mm', 'Đồng hồ', 9, 100, 900, 'H'),
(26, '2023-10-11', 'Apple', 'Smart Watch 9-1', '540735783.jpeg', '45', 'Đ', 10, 100, 1000, 'Tú'),
(27, '2023-10-02', 'Apple', 'MacBook', '1686124909371-mbair2023-15-m2-20.jpg', '512Gb', 'Laptop', 33, 99, 3267, 'Hữu Nghĩa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `id_phieu_xuat` int(11) NOT NULL,
  `ngay_xuat` date NOT NULL,
  `nha_cung_cap_sp` varchar(50) NOT NULL,
  `ten_sp` varchar(100) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `mota_sp` varchar(255) NOT NULL,
  `loai_sp` varchar(255) NOT NULL,
  `gia_ban_sp` bigint(255) NOT NULL,
  `so_luong_xuat` int(255) NOT NULL,
  `tong_tien_hang` bigint(255) NOT NULL,
  `nguoi_xuat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`id_phieu_xuat`, `ngay_xuat`, `nha_cung_cap_sp`, `ten_sp`, `anh_sp`, `mota_sp`, `loai_sp`, `gia_ban_sp`, `so_luong_xuat`, `tong_tien_hang`, `nguoi_xuat`) VALUES
(13, '2023-10-19', 'Apple', 'iPhone 15', 'iPhone-15-ble1.jpg', '512Gb', 'Điện thoại', 25, 2, 50, 'Văn Tú'),
(14, '2023-10-11', 'Apple', 'iPhone 15 Pro Max', '15-Pro-21042049221.jpg', '512Gb', 'Điện thoại', 38, 20, 760, 'Hữu Nghĩa'),
(15, '2023-10-17', 'Apple', 'Smart Watch 9', '962047102.jpeg', '42 mm', 'Đồng hồ', 10, 30, 300, 'Hữu Nghĩa'),
(16, '2023-10-10', 'Apple', 'MacBook', '1686124909371-mbair2023-15-m2-20.jpg', '512Gb', 'Laptop', 35, 10, 350, 'Hữu Nghĩa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(255) NOT NULL,
  `anh_sp` varchar(255) NOT NULL,
  `mota_sp` varchar(255) NOT NULL,
  `loai_sp` varchar(255) NOT NULL,
  `gia_ban_sp` int(255) NOT NULL,
  `gia_nhap_sp` int(255) NOT NULL,
  `nha_cung_cap_sp` varchar(255) NOT NULL,
  `sl_ton` int(255) NOT NULL,
  `sl_ton_toithieu` int(255) NOT NULL,
  `ngay_nhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ten_sp`, `anh_sp`, `mota_sp`, `loai_sp`, `gia_ban_sp`, `gia_nhap_sp`, `nha_cung_cap_sp`, `sl_ton`, `sl_ton_toithieu`, `ngay_nhap`) VALUES
(51, 'iPhone 15', 'iPhone-15-ble1.jpg', '512Gb', 'Điện thoại', 25, 23, 'Apple', 10, 10, '2023-10-25'),
(52, 'iPhone 15 Pro', '15-Pro-nar1170930957.jpg', '256Gb', 'Điện thoại', 27, 25, 'Apple', 25, 10, '2023-10-02'),
(53, 'iPhone 15 Pro Max', '15-Pro-21042049221.jpg', '512Gb', 'Điện thoại', 38, 35, 'Apple', 30, 20, '2023-10-11'),
(54, 'iPhone XsMax', '600_600_xs_max_white_800x800_3_bebd9519a1814f99ae954bc598ef9bd5_1024x1024.webp', '512GB', 'Điện thoại', 10, 8, 'Apple', 60, 15, '2023-10-12'),
(55, 'Smart Watch 9', '962047102.jpeg', '42 mm', 'Đồng hồ', 10, 9, 'Apple', 70, 20, '2023-10-15'),
(56, 'Smart Watch 9-1', '540735783.jpeg', '45', 'Đ', 11, 10, 'Apple', 100, 20, '2023-10-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id_tk` int(6) UNSIGNED NOT NULL,
  `taikhoan` varchar(30) NOT NULL,
  `matkhau` varchar(30) NOT NULL,
  `level` int(6) DEFAULT NULL,
  `anh_tv` varchar(255) NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `namsinh` int(10) NOT NULL,
  `sdt` varchar(20) NOT NULL,
  `diachi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`id_tk`, `taikhoan`, `matkhau`, `level`, `anh_tv`, `hoten`, `namsinh`, `sdt`, `diachi`) VALUES
(1, 'huunghia', '123456', 1, '_MG_2205.JPG', 'Nguyễn Hữu Nghĩa', 2003, '0992606203', 'Hà Nội'),
(2, 'vantu', '123456', 1, 'jennie.jpg', 'Nguyễn Văn Tú', 2003, '099999999', 'Nam Định'),
(3, 'tranthanh', '123456', 1, '', 'Trần Văn Thành', 2003, '09888888', 'Hà Nội'),
(4, 'admin', '123456', 1, '', 'ADMIN', 2023, '010101010', 'VN');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`id_loai_sp`);

--
-- Chỉ mục cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  ADD PRIMARY KEY (`id_nha_cc`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`id_phieu_xuat`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id_tk`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id_kh` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id_loai_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `nhacungcap`
--
ALTER TABLE `nhacungcap`
  MODIFY `id_nha_cc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `id_phieu_xuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id_tk` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
