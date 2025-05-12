-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2025 at 05:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NhaHang`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ban`
--

CREATE TABLE `Ban` (
  `ID_Ban` int(10) NOT NULL,
  `TenBan` varchar(50) NOT NULL,
  `SoChoNgoi` int(10) NOT NULL,
  `ViTri` varchar(100) DEFAULT NULL,
  `TrangThai` enum('Trong','DaDat','DangSuDung') DEFAULT 'Trong'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Ban`
--

INSERT INTO `Ban` (`ID_Ban`, `TenBan`, `SoChoNgoi`, `ViTri`, `TrangThai`) VALUES
(11, 'Bàn sự kiện', 7, 'S01', 'DaDat'),
(12, 'Bàn ngoài trời', 5, 'T01', 'DaDat'),
(13, 'Bàn Gia đình', 3, 'G01', 'DaDat'),
(14, 'Bàn Gia đình', 3, 'G02', 'DaDat');

-- --------------------------------------------------------

--
-- Table structure for table `CaLamViec`
--

CREATE TABLE `CaLamViec` (
  `ID_CaLamViec` int(10) NOT NULL,
  `TG_BatDau` datetime(6) NOT NULL,
  `TG_KetThuc` datetime(6) NOT NULL,
  `ID_User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ChiTietDonHang`
--

CREATE TABLE `ChiTietDonHang` (
  `ID_ChiTietDH` int(10) NOT NULL,
  `ID_DonHang` int(10) NOT NULL,
  `ID_ThucDon` int(10) NOT NULL,
  `SoLuongMon` int(10) NOT NULL,
  `Gia` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ChiTietNguyenLieu`
--

CREATE TABLE `ChiTietNguyenLieu` (
  `ID_ChiTietNguyenLieu` int(11) NOT NULL,
  `ID_MonAn` int(11) NOT NULL,
  `ID_NguyenLieu` int(11) NOT NULL,
  `SoLuong` float NOT NULL,
  `DonViTinh` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ChiTietNguyenLieu`
--

INSERT INTO `ChiTietNguyenLieu` (`ID_ChiTietNguyenLieu`, `ID_MonAn`, `ID_NguyenLieu`, `SoLuong`, `DonViTinh`) VALUES
(1, 1, 1, 200, 'gram'),
(2, 1, 2, 150, 'gram'),
(3, 2, 1, 100, 'gram'),
(4, 2, 3, 50, 'ml'),
(5, 3, 9, 1, 'gói'),
(6, 3, 10, 2, 'quả'),
(7, 4, 1, 150, 'gram'),
(8, 4, 4, 20, 'gram'),
(9, 5, 1, 100, 'gram'),
(10, 5, 7, 10, 'gram'),
(11, 6, 1, 100, 'gram'),
(12, 6, 2, 150, 'gram'),
(13, 7, 1, 120, 'gram'),
(14, 7, 3, 40, 'ml'),
(15, 8, 1, 200, 'gram'),
(16, 8, 9, 1, 'gói'),
(17, 9, 10, 3, 'quả'),
(18, 9, 5, 5, 'gram'),
(19, 10, 9, 1, 'gói'),
(20, 10, 10, 1, 'quả');

-- --------------------------------------------------------

--
-- Table structure for table `DatBan`
--

CREATE TABLE `DatBan` (
  `ID_DatBan` int(10) NOT NULL,
  `ID_Ban` int(10) NOT NULL,
  `ThoiGianDat` datetime(6) NOT NULL,
  `ID_User` int(10) NOT NULL,
  `soLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `DatBan`
--

INSERT INTO `DatBan` (`ID_DatBan`, `ID_Ban`, `ThoiGianDat`, `ID_User`, `soLuong`) VALUES
(12, 11, '2025-04-03 02:10:00.000000', 10, 1),
(13, 12, '2025-04-09 02:16:00.000000', 10, 1),
(14, 13, '2025-04-04 02:45:00.000000', 10, 1),
(15, 14, '2025-04-05 02:47:00.000000', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `DonHang`
--

CREATE TABLE `DonHang` (
  `ID_DonHang` int(10) NOT NULL,
  `ThoiGianDat` datetime(6) NOT NULL,
  `TongTien` decimal(10,4) NOT NULL,
  `ID_KhuyenMai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `KhuyenMai`
--

CREATE TABLE `KhuyenMai` (
  `ID_KhuyenMai` int(10) NOT NULL,
  `TenKhuyenMai` varchar(250) NOT NULL,
  `GiamGia` decimal(10,4) NOT NULL,
  `NgayBatDau` datetime(6) NOT NULL,
  `NgayKetThuc` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `KhuyenMai`
--

INSERT INTO `KhuyenMai` (`ID_KhuyenMai`, `TenKhuyenMai`, `GiamGia`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, 'Giảm 20% Hóa Đơn Trên 300K', 0.2000, '2025-04-01 00:00:00.000000', '2025-04-15 23:59:59.000000'),
(2, 'Combo Trưa Giảm 15%', 0.1500, '2025-04-01 10:00:00.000000', '2025-04-30 14:00:00.000000'),
(3, 'Ưu Đãi Sinh Nhật -30%', 0.3000, '2025-01-01 00:00:00.000000', '2025-12-31 23:59:59.000000'),
(4, 'Giảm 10% Cho Khách Mới', 0.1000, '2025-04-01 00:00:00.000000', '2025-06-30 23:59:59.000000'),
(5, 'Happy Hour 17h-19h', 0.2500, '2025-04-01 17:00:00.000000', '2025-05-31 19:00:00.000000'),
(6, 'Tặng 1 Món Tráng Miệng Cho Hóa Đơn Trên 500K', 0.0000, '2025-04-10 00:00:00.000000', '2025-04-25 23:59:59.000000'),
(7, 'Giảm 25% Khi Đặt Bàn Trước 1 Ngày', 0.2500, '2025-04-01 00:00:00.000000', '2025-12-31 23:59:59.000000'),
(8, 'Ưu Đãi Thứ 2 Đầu Tuần - 12%', 0.1200, '2025-04-07 00:00:00.000000', '2025-06-30 23:59:59.000000'),
(9, 'Khuyến Mãi Giờ Vàng - 18h Đến 20h', 0.1800, '2025-04-01 18:00:00.000000', '2025-04-30 20:00:00.000000'),
(10, 'Thẻ Thành Viên - Giảm 5% Toàn Thời Gian', 0.0500, '2025-01-01 00:00:00.000000', '2025-12-31 23:59:59.000000'),
(11, 'Ưu Đãi Đặc Biệt Cho Người Dùng Mới', 0.1500, '2025-04-22 00:00:00.000000', '2025-05-15 23:59:59.000000'),
(12, 'Khuyến Mãi Món Ăn Có Nguyên Liệu Gà', 0.2000, '2025-04-22 00:00:00.000000', '2025-05-10 23:59:59.000000');

-- --------------------------------------------------------

--
-- Table structure for table `KhuyenMai_KhachHang`
--

CREATE TABLE `KhuyenMai_KhachHang` (
  `ID_km-kh` int(10) NOT NULL,
  `ID_KhuyenMai` int(10) NOT NULL,
  `ID_User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `LichLamViec`
--

CREATE TABLE `LichLamViec` (
  `ID_LichLamViec` int(10) NOT NULL,
  `ID_CaLamVIec` int(10) NOT NULL,
  `NgayLamViec` date NOT NULL,
  `GioVaoLam` datetime NOT NULL,
  `GioTanLam` datetime NOT NULL,
  `TrangThai` enum('DaLam','ChuaLam') NOT NULL,
  `ID_User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `MonAn`
--

CREATE TABLE `MonAn` (
  `ID_MonAn` int(10) NOT NULL,
  `TenMon` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `ID_ThucDon` int(10) DEFAULT NULL,
  `HinhAnh` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `MonAn`
--

INSERT INTO `MonAn` (`ID_MonAn`, `TenMon`, `Gia`, `ID_ThucDon`, `HinhAnh`) VALUES
(1, 'Cơm Tấm Sườn Nướng ', 35000.00, 3, 'com-tam.jpg'),
(2, 'Phở Bò Hà Nội', 45000.00, 1, 'pho-bo-ha-noi.jpg'),
(3, 'Bánh Mì Ốp La Việt Nam', 25000.00, 4, 'banh-mi-op-la.jpg\r\n'),
(4, 'Bún Chả Hà Thành', 40000.00, 1, 'bun-cha-ha-thanh.jpg'),
(5, 'Gỏi Cuốn Nam Bộ', 30000.00, 3, 'goi-cuon.jpg'),
(6, 'Cháo Gà Trứng Bắc Thảo', 30000.00, 5, ''),
(7, 'Hủ Tiếu Nam Vang', 50000.00, 8, ''),
(8, 'Mì Xào Giòn Tôm Thịt', 55000.00, 9, ''),
(9, 'Trứng Chiên Lá Lốt', 15000.00, 10, ''),
(10, 'Mì Trứng Rau Củ Tươi', 20000.00, 6, 'mi-trung-rau-cu.jpg'),
(11, 'Canh Chua Cá Quả', 35000.00, 1, 'canh-chua.jpg\r\n'),
(12, 'Nem Rán Hà Nội', 30000.00, 1, 'nem-ran-ha-noi.jpg'),
(13, 'Chả Cá Lã Vọng', 50000.00, 1, 'cha-ca-la-vong.jpg'),
(14, 'Cá Kho Tộ', 45000.00, 1, 'ca-kho-to.jpg'),
(15, 'Miến Lươn Nước', 40000.00, 1, ''),
(16, 'Mì Quảng', 40000.00, 2, 'mi-quang.jpg\r\n'),
(17, 'Bánh Bèo Huế', 25000.00, 2, 'banh-beo-hue.jpg'),
(18, 'Bún Bò Huế', 45000.00, 2, 'bun-bo-hue.jpg'),
(19, 'Cơm Hến', 30000.00, 2, 'com-hen.jpg'),
(20, 'Ram Tép Huế', 30000.00, 2, 'ram-tep-hue.jpg'),
(21, 'Canh Khổ Qua Nhồi Thịt', 30000.00, 3, 'canh-kho-qua.jpg'),
(22, 'Bún Mắm Miền Tây', 40000.00, 3, 'bun-mam.jpg\r\n'),
(23, 'Cá Lóc Nướng Trui', 50000.00, 3, 'ca-loc-nuong.jpg'),
(24, 'Hủ Tiếu Nam Vang Khô', 45000.00, 3, 'hu-tiu-nam-vang.jpg'),
(25, 'Gà Nướng Sả Ớt', 55000.00, 3, ''),
(26, 'Bánh Tráng Trộn', 20000.00, 4, 'banh-trang-tron.jpg'),
(27, 'Xôi Mặn Sài Gòn', 25000.00, 4, 'xoi-man.jpg'),
(28, 'Chè Bưởi', 20000.00, 4, 'che-buoi.jpg'),
(29, 'Bắp Xào Tôm Khô', 15000.00, 4, 'bap-xao-tom-kho.jpg'),
(30, 'Bánh Tráng Nướng Đà Lạt', 30000.00, 4, 'banh-trang-nuong.jpg'),
(31, 'Thắng Cố', 50000.00, 5, ''),
(32, 'Xôi Ngũ Sắc', 30000.00, 5, ''),
(33, 'Lợn Cắp Nách Quay', 60000.00, 5, ''),
(34, 'Cơm Lam Tây Bắc', 25000.00, 5, ''),
(35, 'Cá Suối Nướng', 40000.00, 5, ''),
(36, 'Canh Chua Cá Quả', 35000.00, 1, ''),
(37, 'Nem Rán Hà Nội', 30000.00, 1, ''),
(38, 'Chả Cá Lã Vọng', 50000.00, 1, ''),
(39, 'Cá Kho Tộ', 45000.00, 1, ''),
(40, 'Miến Lươn Nước', 40000.00, 1, ''),
(46, 'Canh Khổ Qua Nhồi Thịt', 30000.00, 3, ''),
(47, 'Bún Mắm Miền Tây', 40000.00, 3, ''),
(48, 'Cá Lóc Nướng Trui', 50000.00, 3, ''),
(49, 'Hủ Tiếu Nam Vang Khô', 45000.00, 3, ''),
(50, 'Gà Nướng Sả Ớt', 55000.00, 3, ''),
(57, 'Xôi Ngũ Sắc', 30000.00, 5, ''),
(58, 'Lợn Cắp Nách Quay', 60000.00, 5, ''),
(59, 'Cơm Lam Tây Bắc', 25000.00, 5, ''),
(60, 'Cá Suối Nướng', 40000.00, 5, ''),
(61, 'Đậu Hủ Kho Sả', 25000.00, 6, 'dau-hu-kho-xa.jpg'),
(62, 'Cà Tím Nướng Mỡ Hành Chay', 20000.00, 6, 'ca-tim-nuong-mo-hanh.jpg'),
(63, 'Lẩu Nấm Chay', 60000.00, 6, 'lau-nam-chay.jpg'),
(64, 'Canh Rong Biển Chay', 30000.00, 6, 'canh-rong-bien.jpg'),
(66, 'Ghẹ Rang Me', 70000.00, 7, 'ghe-rang-me.jpg\r\n'),
(67, 'Tôm Sú Hấp Bia', 80000.00, 7, 'tom-su-hap-bia.jpg'),
(68, 'Cua Rang Muối', 75000.00, 7, 'cua-rang-muoi.jpg'),
(69, 'Mực Nướng Muối Ớt', 65000.00, 7, 'muc-nuong-muoi-ot.jpg'),
(70, 'Hàu Nướng Phô Mai', 60000.00, 7, 'hau-nuong-pho-mai.jpg'),
(71, 'Phở Tái Bò Viên', 45000.00, 8, ''),
(72, 'Hủ Tiếu Bò Kho', 50000.00, 8, ''),
(73, 'Bún Riêu Cua', 40000.00, 8, ''),
(74, 'Phở Gà Trộn', 40000.00, 8, ''),
(75, 'Bún Mọc Miền Bắc', 35000.00, 8, ''),
(76, 'Thịt Xiên Nướng', 30000.00, 9, ''),
(77, 'Sườn Cây Nướng Mật Ong', 55000.00, 9, ''),
(78, 'Cá Hồi Nướng Giấy Bạc', 60000.00, 9, ''),
(79, 'Gà Rút Xương Nướng', 50000.00, 9, ''),
(80, 'Ba Chỉ Cuộn Nấm Kim Châm', 45000.00, 9, ''),
(81, 'Gà Chiên Mắm', 45000.00, 10, ''),
(82, 'Khoai Lang Lắc Phô Mai', 25000.00, 10, ''),
(83, 'Tôm Tẩm Bột Chiên Xù', 50000.00, 10, ''),
(84, 'Bánh Bao Chiên', 20000.00, 10, ''),
(85, 'Nem Hải Sản Chiên Giòn', 40000.00, 10, ''),
(91, 'Bánh Canh Cá Lóc', 35000.00, 2, 'banh-canh-ca-loc.jpg'),
(92, 'Bánh Nậm Huế', 25000.00, 2, 'banh-nam.jpg'),
(93, 'Gỏi Bò Khô', 30000.00, 2, 'goi-bo-kho.jpg'),
(94, 'Bánh Khoái', 40000.00, 2, 'banh-khoai.jpg'),
(95, 'Chè Bắp Cẩm Nang', 20000.00, 2, 'che-bap.jpg'),
(96, 'Bánh Tráng Nướng', 25000.00, 4, 'banh_trang_nuong.jpg'),
(97, 'Gỏi Xoài Khô Mực', 30000.00, 4, 'goi_xoai_kho_muc.jpg'),
(98, 'Cá Viên Chiên', 20000.00, 4, 'ca_vien_chien.jpg'),
(99, 'Bắp Xào Mỡ Hành', 20000.00, 4, 'bap_xao.jpg'),
(100, 'Bún Chay Huế', 30000.00, 6, 'bun-chay-hue.jpg'),
(101, 'Cơm Tấm Chay', 28000.00, 6, 'com-tam-chay.jpg'),
(102, 'Gỏi Cuốn Chay', 25000.00, 6, 'goi-cuon-chay.jpg'),
(103, 'Mực Xào Sa Tế', 50000.00, 7, 'muc-xao-sa-te.jpg'),
(104, 'Tôm Nướng Muối Ớt', 55000.00, 7, 'tom-nuong-muoi-ot.jpg'),
(105, 'Lẩu Hải Sản', 75000.00, 7, 'lau-hai-san.jpg'),
(106, 'Mực Xào Sa Tế', 50000.00, 7, 'muc-xao-sa-te.jpg'),
(107, 'Tôm Nướng Muối Ớt', 55000.00, 7, 'tom-nuong-muoi-ot.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `NguoiDung`
--

CREATE TABLE `NguoiDung` (
  `ID_User` int(10) NOT NULL,
  `TenUser` varchar(250) NOT NULL,
  `MatKhau` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `SoDienThoai` int(10) NOT NULL,
  `DiaChi` varchar(250) NOT NULL,
  `NgaySinh` date NOT NULL,
  `HinhAnh` varchar(250) NOT NULL,
  `CheckIn` date DEFAULT NULL,
  `CheckOut` date DEFAULT NULL,
  `ID_Role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `NguoiDung`
--

INSERT INTO `NguoiDung` (`ID_User`, `TenUser`, `MatKhau`, `Email`, `SoDienThoai`, `DiaChi`, `NgaySinh`, `HinhAnh`, `CheckIn`, `CheckOut`, `ID_Role`) VALUES
(1, 'Minh', 'e10adc3949ba59abbe56e057f20f883e', 'minh111103@gmail.com', 379789461, '109/7/17 Thạnh Xuân 222222', '2015-04-01', 'minh.jpg', '2025-05-06', NULL, 1),
(3, 'An', '6537e99af2c2223642df9f70a0b5afca', 'an@gmail.com', 166775654, 'Kha Vanj Caan', '2015-06-08', 'an.jpg', NULL, NULL, 2),
(7, 'đầy', 'e10adc3949ba59abbe56e057f20f883e', 'day@gmail.com', 848675068, 'Nguyễn Văn Bảo', '2003-06-10', 'day.png', NULL, NULL, 2),
(8, 'Mạnh', 'e10adc3949ba59abbe56e057f20f883e', 'manh@gmail.com', 972498463, 'Lê Văn Việt, quận 9', '2015-02-10', 'manh.jpg', '2025-04-21', '2025-04-21', 3),
(9, 'Thanh', 'e10adc3949ba59abbe56e057f20f883e', 'thanh@gmail.com', 823820302, 'Ho Chi Minh city\r\n473/8B Lê Văn Quới, Bình Tân', '2010-06-19', 'thanh.jpg', '2025-04-21', '2025-04-21', 3),
(10, 'Nhi', 'e10adc3949ba59abbe56e057f20f883e', 'nhi@gmail.com', 987654321, 'nam hải, đại hải', '2005-01-02', '_ (1).jpeg', '2025-05-06', '2025-05-06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `NguyenLieu`
--

CREATE TABLE `NguyenLieu` (
  `ID_NguyenLieu` int(10) NOT NULL,
  `TenNguyenLieu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DonViTinh` varchar(20) NOT NULL,
  `SoLuongTon` decimal(10,2) NOT NULL,
  `GhiChu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `NguyenLieu`
--

INSERT INTO `NguyenLieu` (`ID_NguyenLieu`, `TenNguyenLieu`, `DonViTinh`, `SoLuongTon`, `GhiChu`) VALUES
(1, 'Thịt sườn heo', 'gram', 10000.00, 'Sườn non để nướng ăn với cơm tấm'),
(2, 'Gạo thơm Việt Nam', 'gram', 20000.00, 'Gạo dùng cho cơm tấm, cháo'),
(3, 'Nước mắm Phú Quốc', 'ml', 5000.00, 'Nước mắm pha chấm bún, gỏi'),
(4, 'Ớt hiểm', 'gram', 1000.00, 'Ớt đỏ cay Việt Nam'),
(5, 'Muối hột', 'gram', 3000.00, 'Dùng trong ướp và luộc món ăn'),
(6, 'Đường cát trắng', 'gram', 4000.00, 'Dùng pha nước mắm, ướp thịt'),
(7, 'Tỏi ta', 'gram', 1500.00, 'Tỏi dùng cho món nướng, chiên'),
(8, 'Hành tím', 'gram', 2000.00, 'Hành phi, xào, ướp thịt'),
(9, 'Bánh phở', 'gram', 500.00, 'Bánh phở dùng cho món phở bò'),
(10, 'Trứng gà ta', 'quả', 100.00, 'Dùng cho món ốp la, cháo, trứng chiên');

-- --------------------------------------------------------

--
-- Table structure for table `PhanHoiKH`
--

CREATE TABLE `PhanHoiKH` (
  `ID_PhanHoi` int(10) NOT NULL,
  `BinhLuan` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ID_User` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ThanhToan`
--

CREATE TABLE `ThanhToan` (
  `ID_MaTT` int(10) NOT NULL,
  `ID_DonHang` int(10) NOT NULL,
  `HinhThucThanhToan` enum('Tiền Mặt','Ngân Hàng') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ThucDon`
--

CREATE TABLE `ThucDon` (
  `ID_ThucDon` int(10) NOT NULL,
  `TenThucDon` varchar(100) NOT NULL,
  `Mota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ThucDon`
--

INSERT INTO `ThucDon` (`ID_ThucDon`, `TenThucDon`, `Mota`) VALUES
(1, 'Ẩm Thực Miền Bắc', 'Hương vị thanh tao, chuẩn vị Hà Thành'),
(2, 'Ẩm Thực Miền Trung', 'Đậm đà, cay nồng – tinh hoa xứ Huế'),
(3, 'Ẩm Thực Miền Nam', 'Vị ngọt hài hòa, gần gũi của vùng sông nước'),
(4, 'Món Ăn Đường Phố', 'Những món ăn bình dân, thân thuộc và ngon mê ly'),
(5, 'Đặc Sản Vùng Cao', 'Món ngon độc đáo từ núi rừng Tây Bắc'),
(6, 'Món Chay Việt', 'Thanh tịnh, thuần khiết từ rau củ tự nhiên'),
(7, 'Hải Sản Việt Nam', 'Tươi sống từ biển khơi Việt Nam'),
(8, 'Bún - Phở - Hủ Tiếu', 'Tinh túy nước lèo của ba miền'),
(9, 'Món Nướng Truyền Thống', 'Thơm ngon chuẩn vị quê nhà'),
(10, 'Món Chiên Giòn Việt', 'Giòn rụm hấp dẫn, ăn là ghiền');

-- --------------------------------------------------------

--
-- Table structure for table `VaiTro`
--

CREATE TABLE `VaiTro` (
  `ID_Role` int(11) NOT NULL,
  `TenViTri` varchar(50) NOT NULL,
  `Mota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `VaiTro`
--

INSERT INTO `VaiTro` (`ID_Role`, `TenViTri`, `Mota`) VALUES
(1, 'Admin', 'Tất cả các quyền'),
(2, 'Staff', 'Quản lý nguyên liệu, xem ca làm việc, lịch làm việc,...'),
(3, 'Customer', 'Khách hàng');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ban`
--
ALTER TABLE `Ban`
  ADD PRIMARY KEY (`ID_Ban`);

--
-- Indexes for table `CaLamViec`
--
ALTER TABLE `CaLamViec`
  ADD PRIMARY KEY (`ID_CaLamViec`),
  ADD KEY `fk-user-1` (`ID_User`);

--
-- Indexes for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  ADD PRIMARY KEY (`ID_ChiTietDH`),
  ADD KEY `FK_CTDonHang_DonHang` (`ID_DonHang`),
  ADD KEY `fk_ThucDon` (`ID_ThucDon`);

--
-- Indexes for table `ChiTietNguyenLieu`
--
ALTER TABLE `ChiTietNguyenLieu`
  ADD PRIMARY KEY (`ID_ChiTietNguyenLieu`),
  ADD KEY `FK_CTNguyenLieu_MonAn` (`ID_MonAn`),
  ADD KEY `FK_CTNguyenLieu_NguyenLieu` (`ID_NguyenLieu`);

--
-- Indexes for table `DatBan`
--
ALTER TABLE `DatBan`
  ADD PRIMARY KEY (`ID_DatBan`),
  ADD KEY `FK_DatBan_Ban` (`ID_Ban`),
  ADD KEY `fk-user-2` (`ID_User`);

--
-- Indexes for table `DonHang`
--
ALTER TABLE `DonHang`
  ADD PRIMARY KEY (`ID_DonHang`),
  ADD KEY `fk-km-kh` (`ID_KhuyenMai`);

--
-- Indexes for table `KhuyenMai`
--
ALTER TABLE `KhuyenMai`
  ADD PRIMARY KEY (`ID_KhuyenMai`);

--
-- Indexes for table `KhuyenMai_KhachHang`
--
ALTER TABLE `KhuyenMai_KhachHang`
  ADD PRIMARY KEY (`ID_km-kh`),
  ADD KEY `fk-khuyenmai` (`ID_KhuyenMai`),
  ADD KEY `fk-user-1` (`ID_User`);

--
-- Indexes for table `LichLamViec`
--
ALTER TABLE `LichLamViec`
  ADD PRIMARY KEY (`ID_LichLamViec`),
  ADD KEY `fk-calamviec` (`ID_CaLamVIec`),
  ADD KEY `fk-user-3` (`ID_User`);

--
-- Indexes for table `MonAn`
--
ALTER TABLE `MonAn`
  ADD PRIMARY KEY (`ID_MonAn`),
  ADD KEY `fk-thucdon` (`ID_ThucDon`);

--
-- Indexes for table `NguoiDung`
--
ALTER TABLE `NguoiDung`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `FK_NhanVien_VaiTro` (`ID_Role`);

--
-- Indexes for table `NguyenLieu`
--
ALTER TABLE `NguyenLieu`
  ADD PRIMARY KEY (`ID_NguyenLieu`);

--
-- Indexes for table `PhanHoiKH`
--
ALTER TABLE `PhanHoiKH`
  ADD PRIMARY KEY (`ID_PhanHoi`),
  ADD KEY `fk-user` (`ID_User`);

--
-- Indexes for table `ThanhToan`
--
ALTER TABLE `ThanhToan`
  ADD PRIMARY KEY (`ID_MaTT`),
  ADD KEY `fk-donhang` (`ID_DonHang`);

--
-- Indexes for table `ThucDon`
--
ALTER TABLE `ThucDon`
  ADD PRIMARY KEY (`ID_ThucDon`);

--
-- Indexes for table `VaiTro`
--
ALTER TABLE `VaiTro`
  ADD PRIMARY KEY (`ID_Role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ban`
--
ALTER TABLE `Ban`
  MODIFY `ID_Ban` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `CaLamViec`
--
ALTER TABLE `CaLamViec`
  MODIFY `ID_CaLamViec` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  MODIFY `ID_ChiTietDH` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ChiTietNguyenLieu`
--
ALTER TABLE `ChiTietNguyenLieu`
  MODIFY `ID_ChiTietNguyenLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `DatBan`
--
ALTER TABLE `DatBan`
  MODIFY `ID_DatBan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `DonHang`
--
ALTER TABLE `DonHang`
  MODIFY `ID_DonHang` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `KhuyenMai`
--
ALTER TABLE `KhuyenMai`
  MODIFY `ID_KhuyenMai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `KhuyenMai_KhachHang`
--
ALTER TABLE `KhuyenMai_KhachHang`
  MODIFY `ID_km-kh` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `LichLamViec`
--
ALTER TABLE `LichLamViec`
  MODIFY `ID_LichLamViec` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `MonAn`
--
ALTER TABLE `MonAn`
  MODIFY `ID_MonAn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `NguoiDung`
--
ALTER TABLE `NguoiDung`
  MODIFY `ID_User` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `NguyenLieu`
--
ALTER TABLE `NguyenLieu`
  MODIFY `ID_NguyenLieu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `PhanHoiKH`
--
ALTER TABLE `PhanHoiKH`
  MODIFY `ID_PhanHoi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ThanhToan`
--
ALTER TABLE `ThanhToan`
  MODIFY `ID_MaTT` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ThucDon`
--
ALTER TABLE `ThucDon`
  MODIFY `ID_ThucDon` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ChiTietDonHang`
--
ALTER TABLE `ChiTietDonHang`
  ADD CONSTRAINT `FK_CTDonHang_DonHang` FOREIGN KEY (`ID_DonHang`) REFERENCES `DonHang` (`ID_DonHang`),
  ADD CONSTRAINT `fk_ThucDon` FOREIGN KEY (`ID_ThucDon`) REFERENCES `ThucDon` (`ID_ThucDon`);

--
-- Constraints for table `ChiTietNguyenLieu`
--
ALTER TABLE `ChiTietNguyenLieu`
  ADD CONSTRAINT `FK_CTNguyenLieu_MonAn` FOREIGN KEY (`ID_MonAn`) REFERENCES `MonAn` (`ID_MonAn`),
  ADD CONSTRAINT `FK_CTNguyenLieu_NguyenLieu` FOREIGN KEY (`ID_NguyenLieu`) REFERENCES `NguyenLieu` (`ID_NguyenLieu`);

--
-- Constraints for table `DatBan`
--
ALTER TABLE `DatBan`
  ADD CONSTRAINT `FK_DatBan_Ban` FOREIGN KEY (`ID_Ban`) REFERENCES `Ban` (`ID_Ban`),
  ADD CONSTRAINT `fk-user-2` FOREIGN KEY (`ID_User`) REFERENCES `NguoiDung` (`ID_User`);

--
-- Constraints for table `DonHang`
--
ALTER TABLE `DonHang`
  ADD CONSTRAINT `fk-km-kh` FOREIGN KEY (`ID_KhuyenMai`) REFERENCES `KhuyenMai` (`ID_KhuyenMai`);

--
-- Constraints for table `KhuyenMai_KhachHang`
--
ALTER TABLE `KhuyenMai_KhachHang`
  ADD CONSTRAINT `fk-khuyenmai` FOREIGN KEY (`ID_KhuyenMai`) REFERENCES `KhuyenMai` (`ID_KhuyenMai`),
  ADD CONSTRAINT `fk-user-1` FOREIGN KEY (`ID_User`) REFERENCES `NguoiDung` (`ID_User`);

--
-- Constraints for table `LichLamViec`
--
ALTER TABLE `LichLamViec`
  ADD CONSTRAINT `fk-calamviec` FOREIGN KEY (`ID_CaLamVIec`) REFERENCES `CaLamViec` (`ID_CaLamViec`),
  ADD CONSTRAINT `fk-user-3` FOREIGN KEY (`ID_User`) REFERENCES `NguoiDung` (`ID_User`);

--
-- Constraints for table `MonAn`
--
ALTER TABLE `MonAn`
  ADD CONSTRAINT `fk-thucdon` FOREIGN KEY (`ID_ThucDon`) REFERENCES `ThucDon` (`ID_ThucDon`);

--
-- Constraints for table `NguoiDung`
--
ALTER TABLE `NguoiDung`
  ADD CONSTRAINT `fk-role` FOREIGN KEY (`ID_Role`) REFERENCES `VaiTro` (`ID_Role`);

--
-- Constraints for table `PhanHoiKH`
--
ALTER TABLE `PhanHoiKH`
  ADD CONSTRAINT `fk-user` FOREIGN KEY (`ID_User`) REFERENCES `NguoiDung` (`ID_User`);

--
-- Constraints for table `ThanhToan`
--
ALTER TABLE `ThanhToan`
  ADD CONSTRAINT `fk-donhang` FOREIGN KEY (`ID_DonHang`) REFERENCES `DonHang` (`ID_DonHang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
