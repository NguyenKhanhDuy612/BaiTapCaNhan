-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2021 at 05:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlynhanvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `loainv`
--

CREATE TABLE `loainv` (
  `MaLoaiNV` varchar(5) NOT NULL,
  `TenLoaiNV` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loainv`
--

INSERT INTO `loainv` (`MaLoaiNV`, `TenLoaiNV`) VALUES
('LNV01', 'Chủ tịch'),
('LNV02', 'Bảo vệ'),
('LNV03', 'Trưởng phòng'),
('LNV04', 'Nhân viên'),
('LNV05', 'Thư ký'),
('LNV06', 'Kế toán');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `Ho` varchar(20) NOT NULL,
  `Ten` varchar(30) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(3) NOT NULL,
  `DiaChi` varchar(50) NOT NULL,
  `MaLoaiNV` varchar(5) NOT NULL,
  `MaPhongBan` varchar(10) NOT NULL,
  `Anh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Ho`, `Ten`, `NgaySinh`, `GioiTinh`, `DiaChi`, `MaLoaiNV`, `MaPhongBan`, `Anh`) VALUES
('NV01', 'Võ', 'Hữu Thắng', '2000-02-19', 'Nam', 'Đắk Lắk', 'LNV01', 'PB03', 'anh.png'),
('NV02', 'Kiều', 'Viết Long', '2000-04-24', 'Nam', 'Nghệ An', 'LNV03', 'PB02', 'anh.png'),
('NV03', 'Ngô', 'Nam', '2000-01-25', 'Nam', 'Nha Trang', 'LNV03', 'PB02', 'anh.png'),
('NV04', 'Hồ', 'Hiểu Lực', '2000-09-11', 'Nam', 'Nha Trang', 'LNV03', 'PB03', 'anh.png'),
('NV05', 'Phạm', 'Quốc Đạt', '2000-06-09', 'Nam', 'Phú Yên', 'LNV03', 'PB02', 'anh.png'),
('NV07', 'Thắng', 'Lomo', '2021-10-09', 'Nam', 'Nha Trang', 'LNV03', 'PB01', 'add.png');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPhongBan` varchar(10) NOT NULL,
  `TenPhongBan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPhongBan`, `TenPhongBan`) VALUES
('', ''),
('PB01', 'Phòng maketing'),
('PB02', 'Phòng tài chính'),
('PB03', 'Phòng nhân sự');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `TaiKhoan` varchar(10) NOT NULL,
  `MatKhau` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`TaiKhoan`, `MatKhau`) VALUES
('vohuuthang', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loainv`
--
ALTER TABLE `loainv`
  ADD PRIMARY KEY (`MaLoaiNV`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaLoaiNV` (`MaLoaiNV`),
  ADD KEY `MaPhongBan` (`MaPhongBan`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPhongBan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`TaiKhoan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaLoaiNV`) REFERENCES `loainv` (`MaLoaiNV`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MaPhongBan`) REFERENCES `phongban` (`MaPhongBan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
