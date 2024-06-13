-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2024 lúc 07:45 PM
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
-- Cơ sở dữ liệu: `ql_nhahang`
--
CREATE DATABASE IF NOT EXISTS `ql_nhahang` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ql_nhahang`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `sdt` int(13) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `timeNhan` datetime NOT NULL,
  `ghiChu` varchar(255) DEFAULT NULL,
  `thanhToan` varchar(255) NOT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `totalTien` float NOT NULL,
  `trangThai` varchar(255) NOT NULL,
  `idtk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `hoTen`, `sdt`, `diaChi`, `timeNhan`, `ghiChu`, `thanhToan`, `qrcode`, `totalTien`, `trangThai`, `idtk`) VALUES
(10, 'Nguyễn Thế Quang', 971625535, 'Từ Sơn - Bắc Ninh', '2024-06-11 13:20:13', '', 'cod', NULL, 120000, 'Đang xử lý', 12),
(11, 'Nguyễn Thế Quang', 971625535, 'Từ Sơn - Bắc Ninh', '2024-06-11 13:57:38', 'test qr', 'online', NULL, 75000, 'Đang xử lý', 12),
(12, 'Nguyễn Thế Quang', 971625535, 'Từ Sơn - Bắc Ninh', '2024-06-11 14:18:28', '12345', 'cod', NULL, 100000, 'Đang xử lý', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billinfo`
--

CREATE TABLE `billinfo` (
  `id` int(11) NOT NULL,
  `tenSp` varchar(255) NOT NULL,
  `giaTien` float NOT NULL,
  `soLuong` int(9) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `idbill` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `billinfo`
--

INSERT INTO `billinfo` (`id`, `tenSp`, `giaTien`, `soLuong`, `total`, `idbill`) VALUES
(10, 'CocaCola', 12000, 10, 120000, 10),
(11, 'Bánh bông lan', 25000, 3, 75000, 11),
(12, 'Bánh bông lan', 25000, 4, 100000, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(13) NOT NULL,
  `idtk` int(13) DEFAULT NULL,
  `idsp` int(13) DEFAULT NULL,
  `soluong` int(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmsanpham`
--

CREATE TABLE `dmsanpham` (
  `id` int(9) NOT NULL,
  `tenDm` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dmsanpham`
--

INSERT INTO `dmsanpham` (`id`, `tenDm`) VALUES
(8, 'Bánh ngọt'),
(9, 'Trà sữa'),
(10, 'Coffe'),
(11, 'Nước ép'),
(12, 'Nước ngọt'),
(13, 'Đồ ăn ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dmtaikhoan`
--

CREATE TABLE `dmtaikhoan` (
  `id` int(9) NOT NULL,
  `ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dmtaikhoan`
--

INSERT INTO `dmtaikhoan` (`id`, `ten`) VALUES
(1, 'Quản lý'),
(2, 'Nhân viên phục vụ'),
(3, 'Nhân viên kho'),
(5, 'Người dùng'),
(7, 'Nhân viên bán hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(9) NOT NULL,
  `tenSp` varchar(255) NOT NULL,
  `giaTien` float(255,0) DEFAULT NULL,
  `hinhAnh` varchar(255) DEFAULT NULL,
  `soLuong` int(9) NOT NULL,
  `moTa` varchar(255) DEFAULT NULL,
  `iddmSp` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tenSp`, `giaTien`, `hinhAnh`, `soLuong`, `moTa`, `iddmSp`) VALUES
(7, 'Bánh bông lan', 25000, 'bonglan.jpg', 43, 'Có ruốc, nhân bơ đường', 8),
(8, 'CocaCola', 12000, 'coca.jpg', 190, 'Nước có gas 300ml', 12),
(9, 'Pesi', 12000, 'pesi.jpg', 200, 'Nước có gas 300ml', 12),
(10, '7up', 10000, '7up.jpg', 200, 'Nước có gas 300ml', 12),
(11, 'Nước ép cam', 35000, 'nuoc-cam.jpg', 50, 'Cam nguyên chất ', 11),
(12, 'Nước ép táo', 35000, 'nuoc-ep-taojpg.jpg', 50, 'Táo nguyên chất', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(9) NOT NULL,
  `taiKhoan` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hoTen` varchar(255) NOT NULL,
  `sdt` int(13) NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `iddmTk` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `taiKhoan`, `matKhau`, `email`, `hoTen`, `sdt`, `diaChi`, `iddmTk`) VALUES
(12, 'admin', '123456', 'nguyenthequangdev@gmail.com', 'Nguyễn Thế Quang', 971625535, 'Từ Sơn - Bắc Ninh', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_idtk` (`idtk`);

--
-- Chỉ mục cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billinfo_bill` (`idbill`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idtk_taikhoan` (`idtk`),
  ADD KEY `idsp_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dmtaikhoan`
--
ALTER TABLE `dmtaikhoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sp_dmsp` (`iddmSp`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `dmsanpham`
--
ALTER TABLE `dmsanpham`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dmtaikhoan`
--
ALTER TABLE `dmtaikhoan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_idtk` FOREIGN KEY (`idtk`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `billinfo`
--
ALTER TABLE `billinfo`
  ADD CONSTRAINT `billinfo_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `idsp_sanpham` FOREIGN KEY (`idsp`) REFERENCES `sanpham` (`id`),
  ADD CONSTRAINT `idtk_taikhoan` FOREIGN KEY (`idtk`) REFERENCES `taikhoan` (`id`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sp_dmsp` FOREIGN KEY (`iddmSp`) REFERENCES `dmsanpham` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
