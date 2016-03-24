-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 07:20 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exporade_karani`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `idCatalog` int(11) NOT NULL,
  `idKategori` int(11) NOT NULL,
  `skuCatalog` varchar(20) NOT NULL,
  `namaCatalog` varchar(100) NOT NULL,
  `detailCatalog` text NOT NULL,
  `materialCatalog` varchar(25) NOT NULL,
  `hargaCatalog` decimal(10,2) NOT NULL,
  `discountCatalog` decimal(10,2) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(25) NOT NULL,
  `updatedDate` datetime NOT NULL,
  `updatedBy` varchar(25) NOT NULL,
  `statusCatalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`idCatalog`, `idKategori`, `skuCatalog`, `namaCatalog`, `detailCatalog`, `materialCatalog`, `hargaCatalog`, `discountCatalog`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`, `statusCatalog`) VALUES
(1, 2, '45678', 'Sepatu', 'Sepatu adalah sebuah benda', 'Kulit', '900000.00', '800000.00', '2016-01-11 21:03:50', 'fajrin1243', '2016-03-22 14:39:55', 'exporadev', 19);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_attributes`
--

CREATE TABLE `catalog_attributes` (
  `idCAttribute` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `nameCAttributes` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_attributes`
--

INSERT INTO `catalog_attributes` (`idCAttribute`, `idMenu`, `nameCAttributes`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(4, 0, 'Ukuran', '2016-01-12 17:08:42', 'fajrin1243', '2016-03-21 01:23:59', 'exporadev'),
(6, 0, 'Warna', '2016-01-12 19:04:12', 'fajrin1243', '2016-03-21 01:24:07', 'exporadev'),
(7, 0, 'Status Produk', '2016-03-22 13:54:43', 'exporadev', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_attributes_detail`
--

CREATE TABLE `catalog_attributes_detail` (
  `idCAttributesDetail` int(11) NOT NULL,
  `idCAttribute` int(11) NOT NULL,
  `nameCAttributeDetail` varchar(255) NOT NULL,
  `valueCAttributeDetail` varchar(255) NOT NULL,
  `orderCAttributeDetail` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_attributes_detail`
--

INSERT INTO `catalog_attributes_detail` (`idCAttributesDetail`, `idCAttribute`, `nameCAttributeDetail`, `valueCAttributeDetail`, `orderCAttributeDetail`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(11, 4, 'All Size', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '2016-03-21 16:06:11', 'exporadev'),
(12, 4, 'L', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '0000-00-00 00:00:00', ''),
(13, 4, 'M', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '0000-00-00 00:00:00', ''),
(14, 4, 'XL', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '0000-00-00 00:00:00', ''),
(15, 4, 'XXL', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '0000-00-00 00:00:00', ''),
(16, 6, 'Putih', '#ffffff', 0, '2016-01-12 19:52:10', 'fajrin1243', '0000-00-00 00:00:00', ''),
(17, 6, 'Biru Hijau', '#1abc9c', 0, '2016-01-12 19:52:10', 'fajrin1243', '0000-00-00 00:00:00', ''),
(18, 4, 'ML', '', 0, '2016-01-20 19:58:46', 'fajrin1243', '0000-00-00 00:00:00', ''),
(19, 7, 'Published', 'Produk ditampilkan dan bisa dicari oleh pelanggan', 0, '2016-03-22 14:15:57', 'exporadev', '2016-03-22 14:22:45', 'exporadev'),
(20, 7, 'Trashed', 'Data ini telah dihapus dari sistem, tetapi masih disimpan di database bila dibutuhkan sewaktu-waktu', 2, '2016-03-22 14:23:18', 'exporadev', '2016-03-22 14:24:51', 'exporadev'),
(21, 7, 'Not Published', 'Data tidak dihapus, tetapi memang sengaja tidak ditampilkan', 1, '2016-03-22 14:24:44', 'exporadev', '2016-03-22 14:24:55', 'exporadev');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_category`
--

CREATE TABLE `catalog_category` (
  `idCategory` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `kodeInduk` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `namaCategory` varchar(150) NOT NULL,
  `ketCategory` text NOT NULL,
  `orderCategory` int(11) NOT NULL,
  `statusCategory` char(1) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdTime` datetime NOT NULL,
  `updatedBy` varchar(30) NOT NULL,
  `updatedTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_category`
--

INSERT INTO `catalog_category` (`idCategory`, `idModule`, `kodeInduk`, `idMenu`, `namaCategory`, `ketCategory`, `orderCategory`, `statusCategory`, `createdBy`, `createdTime`, `updatedBy`, `updatedTime`) VALUES
(1, 0, 2, 0, 'Pashmina', 'Ini pashmina', 1, '1', 'exporadev', '2016-03-03 17:47:23', 'exporadev', '2016-03-21 16:18:37'),
(2, 0, 0, 0, 'Sepatu', 'Ini sepatu', 1, '1', 'exporadev', '2016-03-07 15:15:40', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_comment`
--

CREATE TABLE `catalog_comment` (
  `idCComment` int(11) NOT NULL,
  `usernameMember` varchar(16) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `isiCComment` text NOT NULL,
  `rateCComment` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `typeCComent` enum('Blog','Produk') NOT NULL,
  `statusCComent` enum('Published','Not Published') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_comment`
--

INSERT INTO `catalog_comment` (`idCComment`, `usernameMember`, `idCatalog`, `isiCComment`, `rateCComment`, `createdDate`, `typeCComent`, `statusCComent`) VALUES
(0, 'exporadev', 1, 'jelek sepatunya\r\n', 0, '2016-03-12 18:22:18', 'Blog', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_detail_stock`
--

CREATE TABLE `catalog_detail_stock` (
  `idStock` int(11) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `idSize` int(11) NOT NULL,
  `lengthStock` int(11) NOT NULL,
  `widthStock` int(11) NOT NULL,
  `idWarna` int(11) NOT NULL,
  `jumlahStock` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(25) NOT NULL,
  `updatedDate` datetime NOT NULL,
  `updatedBy` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_detail_stock`
--

INSERT INTO `catalog_detail_stock` (`idStock`, `idCatalog`, `idSize`, `lengthStock`, `widthStock`, `idWarna`, `jumlahStock`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`) VALUES
(1, 1, 13, 15, 25, 16, 50, '2016-01-12 23:54:32', 'fajrin1243', '2016-03-03 01:02:42', ''),
(2, 1, 12, 25, 25, 16, 10, '2016-01-12 23:57:40', 'fajrin1243', '2016-01-15 07:50:55', 'fajrin1243'),
(3, 1, 12, 25, 25, 17, 15, '2016-01-12 23:57:40', 'fajrin1243', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `catalog_galeri`
--

CREATE TABLE `catalog_galeri` (
  `idCGaleri` int(11) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `idCAttributeDetail` int(11) NOT NULL,
  `judulCGaleri` varchar(50) NOT NULL,
  `fotoCGaleri` varchar(100) NOT NULL,
  `detailCGaleri` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(25) NOT NULL,
  `updatedDate` datetime NOT NULL,
  `updatedBy` varchar(25) NOT NULL,
  `statusCGaleri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog_galeri`
--

INSERT INTO `catalog_galeri` (`idCGaleri`, `idCatalog`, `idCAttributeDetail`, `judulCGaleri`, `fotoCGaleri`, `detailCGaleri`, `createdDate`, `createdBy`, `updatedDate`, `updatedBy`, `statusCGaleri`) VALUES
(2, 1, 16, '', 'aaba1762aaa0e20a0246465356713983.jpg', '', '2016-03-17 00:44:31', 'exporadev', '0000-00-00 00:00:00', '', 0),
(3, 1, 17, '', '1bf6e3290aef1ed0038a6fd2273dfdaa.PNG', '', '2016-03-22 20:33:43', 'exporadev', '0000-00-00 00:00:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catalog_voucher`
--

CREATE TABLE `catalog_voucher` (
  `idCVoucher` int(11) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `kodeCVoucher` char(8) NOT NULL,
  `judulCVoucher` varchar(50) NOT NULL,
  `nominalCVoucher` decimal(10,2) NOT NULL,
  `minimumOrder` decimal(10,2) NOT NULL,
  `startDate` datetime NOT NULL,
  `expiredDate` datetime NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(25) NOT NULL,
  `updatedDate` datetime NOT NULL,
  `updatedBy` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crontab_status`
--

CREATE TABLE `crontab_status` (
  `idCrontab` int(11) NOT NULL,
  `namaCrontab` varchar(50) NOT NULL,
  `statusCrontab` int(11) NOT NULL,
  `updateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_data`
--

CREATE TABLE `master_data` (
  `idData` int(11) NOT NULL,
  `kodeInduk` int(11) NOT NULL,
  `kodeCategory` varchar(4) NOT NULL,
  `namaData` varchar(50) NOT NULL,
  `keteranganData` varchar(255) NOT NULL,
  `orderData` int(11) NOT NULL,
  `statusData` char(1) NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdTime` datetime NOT NULL,
  `updatedBy` varchar(30) NOT NULL,
  `updatedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_data`
--

INSERT INTO `master_data` (`idData`, `kodeInduk`, `kodeCategory`, `namaData`, `keteranganData`, `orderData`, `statusData`, `createdBy`, `createdTime`, `updatedBy`, `updatedTime`) VALUES
(1, 0, 'M01', 'Nanggroe Aceh Darussalam', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(2, 0, 'M01', 'Sumatera Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(3, 0, 'M01', 'Sumatera Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(4, 0, 'M01', 'Riau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(5, 0, 'M01', 'Kepulauan Riau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(6, 0, 'M01', 'Kepulauan Bangka-Belitung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(7, 0, 'M01', 'Jambi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(8, 0, 'M01', 'Bengkulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(9, 0, 'M01', 'Sumatera Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(10, 0, 'M01', 'Lampung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(11, 0, 'M01', 'Banten', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(12, 0, 'M01', 'DKI Jakarta', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(13, 0, 'M01', 'Jawa Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(14, 0, 'M01', 'Jawa Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(15, 0, 'M01', 'Daerah Istimewa Yogyakarta  ', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(16, 0, 'M01', 'Jawa Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(17, 0, 'M01', 'Bali', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(18, 0, 'M01', 'Nusa Tenggara Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(19, 0, 'M01', 'Nusa Tenggara Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(20, 0, 'M01', 'Kalimantan Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(21, 0, 'M01', 'Kalimantan Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(22, 0, 'M01', 'Kalimantan Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(23, 0, 'M01', 'Kalimantan Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(24, 0, 'M01', 'Gorontalo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(25, 0, 'M01', 'Sulawesi Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(26, 0, 'M01', 'Sulawesi Tenggara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(27, 0, 'M01', 'Sulawesi Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(28, 0, 'M01', 'Sulawesi Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(29, 0, 'M01', 'Sulawesi Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(30, 0, 'M01', 'Maluku', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(31, 0, 'M01', 'Maluku Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(32, 0, 'M01', 'Papua Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(33, 0, 'M01', 'Papua', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(34, 0, 'M01', 'Kalimantan Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(35, 1, 'M02', 'Kabupaten Aceh Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(36, 1, 'M02', 'Kabupaten Aceh Barat Daya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(37, 1, 'M02', 'Kabupaten Aceh Besar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(38, 1, 'M02', 'Kabupaten Aceh Jaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(39, 1, 'M02', 'Kabupaten Aceh Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(40, 1, 'M02', 'Kabupaten Aceh Singkil', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(41, 1, 'M02', 'Kabupaten Aceh Tamiang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(42, 1, 'M02', 'Kabupaten Aceh Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(43, 1, 'M02', 'Kabupaten Aceh Tenggara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(44, 1, 'M02', 'Kabupaten Aceh Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(45, 1, 'M02', 'Kabupaten Aceh Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(46, 1, 'M02', 'Kabupaten Bener Meriah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(47, 1, 'M02', 'Kabupaten Bireuen', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(48, 1, 'M02', 'Kabupaten Gayo Luwes', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(49, 1, 'M02', 'Kabupaten Nagan Raya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(50, 1, 'M02', 'Kabupaten Pidie', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(51, 1, 'M02', 'Kabupaten Pidie Jaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(52, 1, 'M02', 'Kabupaten Simeulue', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(53, 1, 'M02', 'Kota Banda Aceh', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(54, 1, 'M02', 'Kota Langsa', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(55, 1, 'M02', 'Kota Lhokseumawe', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(56, 1, 'M02', 'Kota Sabang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(57, 1, 'M02', 'Kota Subulussalam', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(58, 2, 'M02', 'Kabupaten Asahan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(59, 2, 'M02', 'Kabupaten Batubara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(60, 2, 'M02', 'Kabupaten Dairi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(61, 2, 'M02', 'Kabupaten Deli Serdang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(62, 2, 'M02', 'Kabupaten Humbang Hasundutan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(63, 2, 'M02', 'Kabupaten Karo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(64, 2, 'M02', 'Kabupaten Labuhan Batu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(65, 2, 'M02', 'Kabupaten Labuhanbatu Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(66, 2, 'M02', 'Kabupaten Labuhanbatu Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(67, 2, 'M02', 'Kabupaten Langkat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(68, 2, 'M02', 'Kabupaten Mandailing Natal', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(69, 2, 'M02', 'Kabupaten Nias', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(70, 2, 'M02', 'Kabupaten Nias Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(71, 2, 'M02', 'Kabupaten Nias Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(72, 2, 'M02', 'Kabupaten Nias Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(73, 2, 'M02', 'Kabupaten Padang Lawas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(74, 2, 'M02', 'Kabupaten Padang Lawas Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(75, 2, 'M02', 'Kabupaten Pakpak Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(76, 2, 'M02', 'Kabupaten Samosir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(77, 2, 'M02', 'Kabupaten Serdang Bedagai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(78, 2, 'M02', 'Kabupaten Simalungun', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(79, 2, 'M02', 'Kabupaten Tapanuli Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(80, 2, 'M02', 'Kabupaten Tapanuli Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(81, 2, 'M02', 'Kabupaten Tapanuli Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(82, 2, 'M02', 'Kabupaten Toba Samosir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(83, 2, 'M02', 'Kota Binjai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(84, 2, 'M02', 'Kota Gunung Sitoli', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(85, 2, 'M02', 'Kota Medan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(86, 2, 'M02', 'Kota Padangsidempuan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(87, 2, 'M02', 'Kota Pematang Siantar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(88, 2, 'M02', 'Kota Sibolga', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(89, 2, 'M02', 'Kota Tanjung Balai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(90, 2, 'M02', 'Kota Tebing Tinggi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(91, 3, 'M02', 'Kabupaten Agam', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(92, 3, 'M02', 'Kabupaten Dharmas Raya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(93, 3, 'M02', 'Kabupaten Kepulauan Mentawai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(94, 3, 'M02', 'Kabupaten Lima Puluh Kota', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(95, 3, 'M02', 'Kabupaten Padang Pariaman', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(96, 3, 'M02', 'Kabupaten Pasaman', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(97, 3, 'M02', 'Kabupaten Pasaman Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(98, 3, 'M02', 'Kabupaten Pesisir Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(99, 3, 'M02', 'Kabupaten Sijunjung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(100, 3, 'M02', 'Kabupaten Solok', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(101, 3, 'M02', 'Kabupaten Solok Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(102, 3, 'M02', 'Kabupaten Tanah Datar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(103, 3, 'M02', 'Kota Bukittinggi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(104, 3, 'M02', 'Kota Padang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(105, 3, 'M02', 'Kota Padang Panjang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(106, 3, 'M02', 'Kota Pariaman', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(107, 3, 'M02', 'Kota Payakumbuh', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(108, 3, 'M02', 'Kota Sawah Lunto', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(109, 3, 'M02', 'Kota Solok', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(110, 4, 'M02', 'Kabupaten Bengkalis', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(111, 4, 'M02', 'Kabupaten Indragiri Hilir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(112, 4, 'M02', 'Kabupaten Indragiri Hulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(113, 4, 'M02', 'Kabupaten Kampar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(114, 4, 'M02', 'Kabupaten Kuantan Singingi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(115, 4, 'M02', 'Kabupaten Meranti', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(116, 4, 'M02', 'Kabupaten Pelalawan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(117, 4, 'M02', 'Kabupaten Rokan Hilir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(118, 4, 'M02', 'Kabupaten Rokan Hulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(119, 4, 'M02', 'Kabupaten Siak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(120, 4, 'M02', 'Kota Dumai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(121, 4, 'M02', 'Kota Pekanbaru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(122, 5, 'M02', 'Kabupaten Bintan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(123, 5, 'M02', 'Kabupaten Karimun', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(124, 5, 'M02', 'Kabupaten Kepulauan Anambas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(125, 5, 'M02', 'Kabupaten Lingga', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(126, 5, 'M02', 'Kabupaten Natuna', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(127, 5, 'M02', 'Kota Batam', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(128, 5, 'M02', 'Kota Tanjung Pinang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(129, 6, 'M02', 'Kabupaten Bangka', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(130, 6, 'M02', 'Kabupaten Bangka Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(131, 6, 'M02', 'Kabupaten Bangka Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(132, 6, 'M02', 'Kabupaten Bangka Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(133, 6, 'M02', 'Kabupaten Belitung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(134, 6, 'M02', 'Kabupaten Belitung Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(135, 6, 'M02', 'Kota Pangkal Pinang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(136, 7, 'M02', 'Kabupaten Kerinci', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(137, 7, 'M02', 'Kabupaten Merangin', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(138, 7, 'M02', 'Kabupaten Sarolangun', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(139, 7, 'M02', 'Kabupaten Batang Hari', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(140, 7, 'M02', 'Kabupaten Muaro Jambi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(141, 7, 'M02', 'Kabupaten Tanjung Jabung Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(142, 7, 'M02', 'Kabupaten Tanjung Jabung Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(143, 7, 'M02', 'Kabupaten Tebo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(144, 7, 'M02', 'Kabupaten Bungo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(145, 7, 'M02', 'Kota Jambi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(146, 7, 'M02', 'Kota Sungai Penuh', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(147, 8, 'M02', 'Kabupaten Bengkulu Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(148, 8, 'M02', 'Kabupaten Bengkulu Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(149, 8, 'M02', 'Kabupaten Bengkulu Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(150, 8, 'M02', 'Kabupaten Kaur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(151, 8, 'M02', 'Kabupaten Kepahiang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(152, 8, 'M02', 'Kabupaten Lebong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(153, 8, 'M02', 'Kabupaten Mukomuko', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(154, 8, 'M02', 'Kabupaten Rejang Lebong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(155, 8, 'M02', 'Kabupaten Seluma', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(156, 8, 'M02', 'Kota Bengkulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(157, 9, 'M02', 'Kabupaten Banyuasin', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(158, 9, 'M02', 'Kabupaten Empat Lawang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(159, 9, 'M02', 'Kabupaten Lahat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(160, 9, 'M02', 'Kabupaten Muara Enim', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(161, 9, 'M02', 'Kabupaten Musi Banyu Asin', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(162, 9, 'M02', 'Kabupaten Musi Rawas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(163, 9, 'M02', 'Kabupaten Ogan Ilir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(164, 9, 'M02', 'Kabupaten Ogan Komering Ilir', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(165, 9, 'M02', 'Kabupaten Ogan Komering Ulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(166, 9, 'M02', 'Kabupaten Ogan Komering Ulu Se', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(167, 9, 'M02', 'Kabupaten Ogan Komering Ulu Ti', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(168, 9, 'M02', 'Kota Lubuklinggau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(169, 9, 'M02', 'Kota Pagar Alam', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(170, 9, 'M02', 'Kota Palembang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(171, 9, 'M02', 'Kota Prabumulih', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(172, 10, 'M02', 'Kabupaten Lampung Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(173, 10, 'M02', 'Kabupaten Lampung Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(174, 10, 'M02', 'Kabupaten Lampung Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(175, 10, 'M02', 'Kabupaten Lampung Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(176, 10, 'M02', 'Kabupaten Lampung Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(177, 10, 'M02', 'Kabupaten Mesuji', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(178, 10, 'M02', 'Kabupaten Pesawaran', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(179, 10, 'M02', 'Kabupaten Pringsewu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(180, 10, 'M02', 'Kabupaten Tanggamus', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(181, 10, 'M02', 'Kabupaten Tulang Bawang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(182, 10, 'M02', 'Kabupaten Tulang Bawang Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(183, 10, 'M02', 'Kabupaten Way Kanan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(184, 10, 'M02', 'Kota Bandar Lampung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(185, 10, 'M02', 'Kota Metro', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(186, 11, 'M02', 'Kabupaten Lebak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(187, 11, 'M02', 'Kabupaten Pandeglang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(188, 11, 'M02', 'Kabupaten Serang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(189, 11, 'M02', 'Kabupaten Tangerang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(190, 11, 'M02', 'Kota Cilegon', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(191, 11, 'M02', 'Kota Serang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(192, 11, 'M02', 'Kota Tangerang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(193, 11, 'M02', 'Kota Tangerang Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(194, 12, 'M02', 'Kabupaten Adm. Kepulauan Serib', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(195, 12, 'M02', 'Kota Jakarta Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(196, 12, 'M02', 'Kota Jakarta Pusat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(197, 12, 'M02', 'Kota Jakarta Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(198, 12, 'M02', 'Kota Jakarta Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(199, 12, 'M02', 'Kota Jakarta Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(200, 13, 'M02', 'Kabupaten Bandung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(201, 13, 'M02', 'Kabupaten Bandung Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(202, 13, 'M02', 'Kabupaten Bekasi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(203, 13, 'M02', 'Kabupaten Bogor', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(204, 13, 'M02', 'Kabupaten Ciamis', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(205, 13, 'M02', 'Kabupaten Cianjur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(206, 13, 'M02', 'Kabupaten Cirebon', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(207, 13, 'M02', 'Kabupaten Garut', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(208, 13, 'M02', 'Kabupaten Indramayu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(209, 13, 'M02', 'Kabupaten Karawang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(210, 13, 'M02', 'Kabupaten Kuningan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(211, 13, 'M02', 'Kabupaten Majalengka', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(212, 13, 'M02', 'Kabupaten Purwakarta', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(213, 13, 'M02', 'Kabupaten Subang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(214, 13, 'M02', 'Kabupaten Sukabumi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(215, 13, 'M02', 'Kabupaten Sumedang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(216, 13, 'M02', 'Kabupaten Tasikmalaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(217, 13, 'M02', 'Kota Bandung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(218, 13, 'M02', 'Kota Banjar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(219, 13, 'M02', 'Kota Bekasi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(220, 13, 'M02', 'Kota Bogor', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(221, 13, 'M02', 'Kota Cimahi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(222, 13, 'M02', 'Kota Cirebon', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(223, 13, 'M02', 'Kota Depok', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(224, 13, 'M02', 'Kota Sukabumi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(225, 13, 'M02', 'Kota Tasikmalaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(226, 14, 'M02', 'Kabupaten Banjarnegara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(227, 14, 'M02', 'Kabupaten Banyumas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(228, 14, 'M02', 'Kabupaten Batang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(229, 14, 'M02', 'Kabupaten Blora', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(230, 14, 'M02', 'Kabupaten Boyolali', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(231, 14, 'M02', 'Kabupaten Brebes', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(232, 14, 'M02', 'Kabupaten Cilacap', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(233, 14, 'M02', 'Kabupaten Demak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(234, 14, 'M02', 'Kabupaten Grobogan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(235, 14, 'M02', 'Kabupaten Jepara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(236, 14, 'M02', 'Kabupaten Karanganyar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(237, 14, 'M02', 'Kabupaten Kebumen', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(238, 14, 'M02', 'Kabupaten Kendal', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(239, 14, 'M02', 'Kabupaten Klaten', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(240, 14, 'M02', 'Kabupaten Kota Tegal', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(241, 14, 'M02', 'Kabupaten Kudus', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(242, 14, 'M02', 'Kabupaten Magelang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(243, 14, 'M02', 'Kabupaten Pati', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(244, 14, 'M02', 'Kabupaten Pekalongan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(245, 14, 'M02', 'Kabupaten Pemalang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(246, 14, 'M02', 'Kabupaten Purbalingga', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(247, 14, 'M02', 'Kabupaten Purworejo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(248, 14, 'M02', 'Kabupaten Rembang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(249, 14, 'M02', 'Kabupaten Semarang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(250, 14, 'M02', 'Kabupaten Sragen', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(251, 14, 'M02', 'Kabupaten Sukoharjo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(252, 14, 'M02', 'Kabupaten Temanggung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(253, 14, 'M02', 'Kabupaten Wonogiri', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(254, 14, 'M02', 'Kabupaten Wonosobo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(255, 14, 'M02', 'Kota Magelang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(256, 14, 'M02', 'Kota Pekalongan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(257, 14, 'M02', 'Kota Salatiga', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(258, 14, 'M02', 'Kota Semarang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(259, 14, 'M02', 'Kota Surakarta', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(260, 14, 'M02', 'Kota Tegal', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(261, 15, 'M02', 'Kabupaten Bantul', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(262, 15, 'M02', 'Kabupaten Gunung Kidul', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(263, 15, 'M02', 'Kabupaten Kulon Progo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(264, 15, 'M02', 'Kabupaten Sleman', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(265, 15, 'M02', 'Kota Yogyakarta', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(266, 16, 'M02', 'Kabupaten Bangkalan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(267, 16, 'M02', 'Kabupaten Banyuwangi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(268, 16, 'M02', 'Kabupaten Blitar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(269, 16, 'M02', 'Kabupaten Bojonegoro', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(270, 16, 'M02', 'Kabupaten Bondowoso', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(271, 16, 'M02', 'Kabupaten Gresik', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(272, 16, 'M02', 'Kabupaten Jember', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(273, 16, 'M02', 'Kabupaten Jombang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(274, 16, 'M02', 'Kabupaten Kediri', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(275, 16, 'M02', 'Kabupaten Lamongan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(276, 16, 'M02', 'Kabupaten Lumajang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(277, 16, 'M02', 'Kabupaten Madiun', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(278, 16, 'M02', 'Kabupaten Magetan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(279, 16, 'M02', 'Kabupaten Malang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(280, 16, 'M02', 'Kabupaten Mojokerto', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(281, 16, 'M02', 'Kabupaten Nganjuk', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(282, 16, 'M02', 'Kabupaten Ngawi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(283, 16, 'M02', 'Kabupaten Pacitan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(284, 16, 'M02', 'Kabupaten Pamekasan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(285, 16, 'M02', 'Kabupaten Pasuruan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(286, 16, 'M02', 'Kabupaten Ponorogo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(287, 16, 'M02', 'Kabupaten Probolinggo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(288, 16, 'M02', 'Kabupaten Sampang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(289, 16, 'M02', 'Kabupaten Sidoarjo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(290, 16, 'M02', 'Kabupaten Situbondo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(291, 16, 'M02', 'Kabupaten Sumenep', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(292, 16, 'M02', 'Kabupaten Trenggalek', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(293, 16, 'M02', 'Kabupaten Tuban', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(294, 16, 'M02', 'Kabupaten Tulungagung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(295, 16, 'M02', 'Kota Batu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(296, 16, 'M02', 'Kota Blitar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(297, 16, 'M02', 'Kota Kediri', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(298, 16, 'M02', 'Kota Madiun', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(299, 16, 'M02', 'Kota Malang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(300, 16, 'M02', 'Kota Mojokerto', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(301, 16, 'M02', 'Kota Pasuruan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(302, 16, 'M02', 'Kota Probolinggo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(303, 16, 'M02', 'Kota Surabaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(304, 17, 'M02', 'Kabupaten Badung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(305, 17, 'M02', 'Kabupaten Bangli', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(306, 17, 'M02', 'Kabupaten Buleleng', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(307, 17, 'M02', 'Kabupaten Gianyar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(308, 17, 'M02', 'Kabupaten Jembrana', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(309, 17, 'M02', 'Kabupaten Karang Asem', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(310, 17, 'M02', 'Kabupaten Klungkung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(311, 17, 'M02', 'Kabupaten Tabanan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(312, 17, 'M02', 'Kota Denpasar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(313, 18, 'M02', 'Kabupaten Bima', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(314, 18, 'M02', 'Kabupaten Dompu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(315, 18, 'M02', 'Kabupaten Lombok Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(316, 18, 'M02', 'Kabupaten Lombok Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(317, 18, 'M02', 'Kabupaten Lombok Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(318, 18, 'M02', 'Kabupaten Lombok Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(319, 18, 'M02', 'Kabupaten Sumbawa', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(320, 18, 'M02', 'Kabupaten Sumbawa Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(321, 18, 'M02', 'Kota Bima', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(322, 18, 'M02', 'Kota Mataram', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(323, 19, 'M02', 'Kabupaten Alor', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(324, 19, 'M02', 'Kabupaten Belu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(325, 19, 'M02', 'Kabupaten Ende', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(326, 19, 'M02', 'Kabupaten Flores Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(327, 19, 'M02', 'Kabupaten Kupang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(328, 19, 'M02', 'Kabupaten Lembata', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(329, 19, 'M02', 'Kabupaten Manggarai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(330, 19, 'M02', 'Kabupaten Manggarai Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(331, 19, 'M02', 'Kabupaten Manggarai Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(332, 19, 'M02', 'Kabupaten Nagekeo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(333, 19, 'M02', 'Kabupaten Ngada', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(334, 19, 'M02', 'Kabupaten Rote Ndao', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(335, 19, 'M02', 'Kabupaten Sabu Raijua', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(336, 19, 'M02', 'Kabupaten Sikka', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(337, 19, 'M02', 'Kabupaten Sumba Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(338, 19, 'M02', 'Kabupaten Sumba Barat Daya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(339, 19, 'M02', 'Kabupaten Sumba Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(340, 19, 'M02', 'Kabupaten Sumba Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(341, 19, 'M02', 'Kabupaten Timor Tengah Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(342, 19, 'M02', 'Kabupaten Timor Tengah Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(343, 19, 'M02', 'Kota Kupang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(344, 20, 'M02', 'Kabupaten Bengkayang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(345, 20, 'M02', 'Kabupaten Kapuas Hulu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(346, 20, 'M02', 'Kabupaten Kayong Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(347, 20, 'M02', 'Kabupaten Ketapang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(348, 20, 'M02', 'Kabupaten Kubu Raya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(349, 20, 'M02', 'Kabupaten Landak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(350, 20, 'M02', 'Kabupaten Melawi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(351, 20, 'M02', 'Kabupaten Pontianak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(352, 20, 'M02', 'Kabupaten Sambas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(353, 20, 'M02', 'Kabupaten Sanggau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(354, 20, 'M02', 'Kabupaten Sekadau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(355, 20, 'M02', 'Kabupaten Sintang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(356, 20, 'M02', 'Kota Pontianak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(357, 20, 'M02', 'Kota Singkawang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(358, 21, 'M02', 'Kabupaten Barito Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(359, 21, 'M02', 'Kabupaten Barito Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(360, 21, 'M02', 'Kabupaten Barito Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(361, 21, 'M02', 'Kabupaten Gunung Mas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(362, 21, 'M02', 'Kabupaten Kapuas', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(363, 21, 'M02', 'Kabupaten Katingan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(364, 21, 'M02', 'Kabupaten Kotawaringin Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(365, 21, 'M02', 'Kabupaten Kotawaringin Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(366, 21, 'M02', 'Kabupaten Lamandau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(367, 21, 'M02', 'Kabupaten Murung Raya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(368, 21, 'M02', 'Kabupaten Pulang Pisau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(369, 21, 'M02', 'Kabupaten Seruyan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(370, 21, 'M02', 'Kabupaten Sukamara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(371, 21, 'M02', 'Kota Palangkaraya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(372, 22, 'M02', 'Kabupaten Balangan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(373, 22, 'M02', 'Kabupaten Banjar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(374, 22, 'M02', 'Kabupaten Barito Kuala', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(375, 22, 'M02', 'Kabupaten Hulu Sungai Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(376, 22, 'M02', 'Kabupaten Hulu Sungai Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(377, 22, 'M02', 'Kabupaten Hulu Sungai Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(378, 22, 'M02', 'Kabupaten Kota Baru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(379, 22, 'M02', 'Kabupaten Tabalong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(380, 22, 'M02', 'Kabupaten Tanah Bumbu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(381, 22, 'M02', 'Kabupaten Tanah Laut', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(382, 22, 'M02', 'Kabupaten Tapin', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(383, 22, 'M02', 'Kota Banjar Baru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(384, 22, 'M02', 'Kota Banjarmasin', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(385, 23, 'M02', 'Kabupaten Berau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(386, 23, 'M02', 'Kabupaten Bulongan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(387, 23, 'M02', 'Kabupaten Kutai Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(388, 23, 'M02', 'Kabupaten Kutai Kartanegara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(389, 23, 'M02', 'Kabupaten Kutai Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(390, 23, 'M02', 'Kabupaten Malinau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(391, 23, 'M02', 'Kabupaten Nunukan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(392, 23, 'M02', 'Kabupaten Paser', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(393, 23, 'M02', 'Kabupaten Penajam Paser Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(394, 23, 'M02', 'Kabupaten Tana Tidung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(395, 23, 'M02', 'Kota Balikpapan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(396, 23, 'M02', 'Kota Bontang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(397, 23, 'M02', 'Kota Samarinda', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(398, 23, 'M02', 'Kota Tarakan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(399, 24, 'M02', 'Kabupaten Boalemo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(400, 24, 'M02', 'Kabupaten Bone Bolango', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(401, 24, 'M02', 'Kabupaten Gorontalo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(402, 24, 'M02', 'Kabupaten Gorontalo Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(403, 24, 'M02', 'Kabupaten Pohuwato', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(404, 24, 'M02', 'Kota Gorontalo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(405, 25, 'M02', 'Kabupaten Bantaeng', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(406, 25, 'M02', 'Kabupaten Barru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(407, 25, 'M02', 'Kabupaten Bone', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(408, 25, 'M02', 'Kabupaten Bulukumba', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(409, 25, 'M02', 'Kabupaten Enrekang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(410, 25, 'M02', 'Kabupaten Gowa', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(411, 25, 'M02', 'Kabupaten Jeneponto', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(412, 25, 'M02', 'Kabupaten Luwu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(413, 25, 'M02', 'Kabupaten Luwu Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(414, 25, 'M02', 'Kabupaten Luwu Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(415, 25, 'M02', 'Kabupaten Maros', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(416, 25, 'M02', 'Kabupaten Pangkajene Kepulauan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(417, 25, 'M02', 'Kabupaten Pinrang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(418, 25, 'M02', 'Kabupaten Selayar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(419, 25, 'M02', 'Kabupaten Sidenreng Rappang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(420, 25, 'M02', 'Kabupaten Sinjai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(421, 25, 'M02', 'Kabupaten Soppeng', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(422, 25, 'M02', 'Kabupaten Takalar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(423, 25, 'M02', 'Kabupaten Tana Toraja', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(424, 25, 'M02', 'Kabupaten Toraja Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(425, 25, 'M02', 'Kabupaten Wajo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(426, 25, 'M02', 'Kota Makassar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(427, 25, 'M02', 'Kota Palopo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(428, 25, 'M02', 'Kota Pare-pare', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(429, 26, 'M02', 'Kabupaten Bombana', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(430, 26, 'M02', 'Kabupaten Buton', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(431, 26, 'M02', 'Kabupaten Buton Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(432, 26, 'M02', 'Kabupaten Kolaka', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(433, 26, 'M02', 'Kabupaten Kolaka Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(434, 26, 'M02', 'Kabupaten Konawe', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(435, 26, 'M02', 'Kabupaten Konawe Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(436, 26, 'M02', 'Kabupaten Konawe Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(437, 26, 'M02', 'Kabupaten Muna', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(438, 26, 'M02', 'Kabupaten Wakatobi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(439, 26, 'M02', 'Kota Bau-bau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(440, 26, 'M02', 'Kota Kendari', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(441, 27, 'M02', 'Kabupaten Banggai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(442, 27, 'M02', 'Kabupaten Banggai Kepulauan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(443, 27, 'M02', 'Kabupaten Buol', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(444, 27, 'M02', 'Kabupaten Donggala', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(445, 27, 'M02', 'Kabupaten Morowali', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(446, 27, 'M02', 'Kabupaten Parigi Moutong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(523, 27, 'M02', 'Kabupaten Poso', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(524, 27, 'M02', 'Kabupaten Sigi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(525, 27, 'M02', 'Kabupaten Tojo Una-Una', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(526, 27, 'M02', 'Kabupaten Toli Toli', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(527, 27, 'M02', 'Kota Palu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(528, 28, 'M02', 'Kabupaten Bolaang Mangondow', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(529, 28, 'M02', 'Kabupaten Bolaang Mangondow Se', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(530, 28, 'M02', 'Kabupaten Bolaang Mangondow Ti', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(531, 28, 'M02', 'Kabupaten Bolaang Mangondow Ut', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(532, 28, 'M02', 'Kabupaten Kepulauan Sangihe', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(533, 28, 'M02', 'Kabupaten Kepulauan Siau Tagul', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(534, 28, 'M02', 'Kabupaten Kepulauan Talaud', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(535, 28, 'M02', 'Kabupaten Minahasa', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(536, 28, 'M02', 'Kabupaten Minahasa Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(537, 28, 'M02', 'Kabupaten Minahasa Tenggara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(538, 28, 'M02', 'Kabupaten Minahasa Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(539, 28, 'M02', 'Kota Bitung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(540, 28, 'M02', 'Kota Kotamobagu', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(541, 28, 'M02', 'Kota Manado', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(542, 28, 'M02', 'Kota Tomohon', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(543, 29, 'M02', 'Kabupaten Majene', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(544, 29, 'M02', 'Kabupaten Mamasa', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(545, 29, 'M02', 'Kabupaten Mamuju', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(546, 29, 'M02', 'Kabupaten Mamuju Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(547, 29, 'M02', 'Kabupaten Polewali Mandar', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00');
INSERT INTO `master_data` (`idData`, `kodeInduk`, `kodeCategory`, `namaData`, `keteranganData`, `orderData`, `statusData`, `createdBy`, `createdTime`, `updatedBy`, `updatedTime`) VALUES
(548, 30, 'M02', 'Kabupaten Buru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(549, 30, 'M02', 'Kabupaten Buru Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(550, 30, 'M02', 'Kabupaten Kepulauan Aru', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(551, 30, 'M02', 'Kabupaten Maluku Barat Daya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(552, 30, 'M02', 'Kabupaten Maluku Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(553, 30, 'M02', 'Kabupaten Maluku Tenggara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(554, 30, 'M02', 'Kabupaten Maluku Tenggara Bara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(555, 30, 'M02', 'Kabupaten Seram Bagian Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(556, 30, 'M02', 'Kabupaten Seram Bagian Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(557, 30, 'M02', 'Kota Ambon', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(558, 30, 'M02', 'Kota Tual', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(559, 31, 'M02', 'Kabupaten Halmahera Barat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(560, 31, 'M02', 'Kabupaten Halmahera Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(561, 31, 'M02', 'Kabupaten Halmahera Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(562, 31, 'M02', 'Kabupaten Halmahera Timur', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(563, 31, 'M02', 'Kabupaten Halmahera Utara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(564, 31, 'M02', 'Kabupaten Kepulauan Sula', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(565, 31, 'M02', 'Kabupaten Pulau Morotai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(566, 31, 'M02', 'Kota Ternate', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(567, 31, 'M02', 'Kota Tidore Kepulauan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(568, 32, 'M02', 'Kabupaten Fakfak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(569, 32, 'M02', 'Kabupaten Kaimana', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(570, 32, 'M02', 'Kabupaten Manokwari', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(571, 32, 'M02', 'Kabupaten Maybrat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(572, 32, 'M02', 'Kabupaten Raja Ampat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(573, 32, 'M02', 'Kabupaten Sorong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(574, 32, 'M02', 'Kabupaten Sorong Selatan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(575, 32, 'M02', 'Kabupaten Tambrauw', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(576, 32, 'M02', 'Kabupaten Teluk Bintuni', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(577, 32, 'M02', 'Kabupaten Teluk Wondama', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(578, 32, 'M02', 'Kota Sorong', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(579, 33, 'M02', 'Kabupaten Merauke', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(580, 33, 'M02', 'Kabupaten Jayawijaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(581, 33, 'M02', 'Kabupaten Nabire', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(582, 33, 'M02', 'Kabupaten Kepulauan Yapen', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(583, 33, 'M02', 'Kabupaten Biak Numfor', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(584, 33, 'M02', 'Kabupaten Paniai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(585, 33, 'M02', 'Kabupaten Puncak Jaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(586, 33, 'M02', 'Kabupaten Mimika', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(587, 33, 'M02', 'Kabupaten Boven Digoel', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(588, 33, 'M02', 'Kabupaten Mappi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(589, 33, 'M02', 'Kabupaten Asmat', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(590, 33, 'M02', 'Kabupaten Yahukimo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(591, 33, 'M02', 'Kabupaten Pegunungan Bintang', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(592, 33, 'M02', 'Kabupaten Tolikara', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(593, 33, 'M02', 'Kabupaten Sarmi', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(594, 33, 'M02', 'Kabupaten Keerom', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(595, 33, 'M02', 'Kabupaten Waropen', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(596, 33, 'M02', 'Kabupaten Jayapura', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(597, 33, 'M02', 'Kabupaten Deiyai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(598, 33, 'M02', 'Kabupaten Dogiyai', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(599, 33, 'M02', 'Kabupaten Intan Jaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(600, 33, 'M02', 'Kabupaten Lanny Jaya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(601, 33, 'M02', 'Kabupaten Mamberamo Raya', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(602, 33, 'M02', 'Kabupaten Mamberamo Tengah', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(603, 33, 'M02', 'Kabupaten Nduga', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(604, 33, 'M02', 'Kabupaten Puncak', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(605, 33, 'M02', 'Kabupaten Supiori', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(606, 33, 'M02', 'Kabupaten Yalimo', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(607, 33, 'M02', 'Kota Jayapura', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(608, 34, 'M02', 'Kabupaten Bulungan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(609, 34, 'M02', 'Kabupaten Malinau', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(610, 34, 'M02', 'Kabupaten Nunukan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(611, 34, 'M02', 'Kabupaten Tana Tidung', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(612, 34, 'M02', 'Kota Tarakan', '', 0, 'y', '0', '0000-00-00 00:00:00', '0', '0000-00-00 00:00:00'),
(613, 0, 'JR01', 'IPA', 'Jurusan IPA', 1, 'y', 'exporadev', '2016-01-23 14:56:50', '', '0000-00-00 00:00:00'),
(614, 0, 'JR01', 'Bahasa', 'Jurusan Bahasa', 2, 'y', 'exporadev', '2016-01-23 14:57:01', '', '0000-00-00 00:00:00'),
(615, 0, 'JR01', 'IPS', 'Jurusan IPS', 3, 'y', 'exporadev', '2016-01-23 14:57:10', '', '0000-00-00 00:00:00'),
(616, 613, 'KL01', 'I', 'IPA I', 1, 'y', 'exporadev', '2016-01-23 14:57:23', '', '0000-00-00 00:00:00'),
(617, 613, 'KL01', 'II', 'IPA II', 2, 'y', 'exporadev', '2016-01-23 14:57:35', '', '0000-00-00 00:00:00'),
(618, 613, 'KL01', 'III', 'IPA III', 3, 'y', 'exporadev', '2016-01-23 14:57:44', '', '0000-00-00 00:00:00'),
(619, 613, 'KL01', 'IV', 'IPA IV', 4, 'y', 'exporadev', '2016-01-23 14:57:53', '', '0000-00-00 00:00:00'),
(620, 614, 'KL01', 'I', 'Bahasa I', 1, 'y', 'exporadev', '2016-01-23 14:58:12', '', '0000-00-00 00:00:00'),
(621, 614, 'KL01', 'II', 'Bahasa II', 2, 'y', 'exporadev', '2016-01-23 14:58:22', '', '0000-00-00 00:00:00'),
(622, 614, 'KL01', 'III', 'Bahasa III', 3, 'y', 'exporadev', '2016-01-23 14:58:36', '', '0000-00-00 00:00:00'),
(623, 614, 'KL01', 'IV', 'Bahasa IV', 4, 'y', 'exporadev', '2016-01-23 14:58:46', '', '0000-00-00 00:00:00'),
(624, 615, 'KL01', 'I', 'IPS I', 1, 'y', 'exporadev', '2016-01-23 14:59:03', '', '0000-00-00 00:00:00'),
(625, 615, 'KL01', 'II', 'IPS II', 2, 'y', 'exporadev', '2016-01-23 14:59:15', '', '0000-00-00 00:00:00'),
(626, 615, 'KL01', 'III', 'IPS III', 3, 'y', 'exporadev', '2016-01-23 14:59:26', '', '0000-00-00 00:00:00'),
(627, 615, 'KL01', 'IV', 'IPS IV', 4, 'y', 'exporadev', '2016-01-23 14:59:35', '', '0000-00-00 00:00:00'),
(628, 615, 'KL01', 'V', 'IPS V', 5, 'y', 'exporadev', '2016-01-23 14:59:49', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_menu`
--

CREATE TABLE `master_menu` (
  `idMenu` int(11) NOT NULL,
  `idModule` int(11) NOT NULL,
  `kodeInduk` int(11) NOT NULL,
  `namaMenu` varchar(50) NOT NULL,
  `keteranganMenu` varchar(255) NOT NULL,
  `resumeMenu` varchar(255) NOT NULL,
  `detailMenu` text NOT NULL,
  `targetMenu` varchar(50) NOT NULL,
  `iconMenu` varchar(50) NOT NULL,
  `orderMenu` int(11) NOT NULL,
  `statusMenu` char(1) NOT NULL,
  `createdBy` varchar(16) NOT NULL,
  `createdTime` datetime NOT NULL,
  `updatedBy` int(11) NOT NULL,
  `updatedTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu`
--

INSERT INTO `master_menu` (`idMenu`, `idModule`, `kodeInduk`, `namaMenu`, `keteranganMenu`, `resumeMenu`, `detailMenu`, `targetMenu`, `iconMenu`, `orderMenu`, `statusMenu`, `createdBy`, `createdTime`, `updatedBy`, `updatedTime`) VALUES
(13, 1, 0, 'User Management', 'Keterangan\r\n', 'Resume\r\n', '', '', '', 1, 'y', '', '2016-02-17 22:20:40', 0, '2016-01-05 04:56:00'),
(14, 1, 13, 'User List', '', '', '', 'setting/user', '', 1, 'y', '', '2016-01-05 05:07:15', 0, '2016-01-05 04:58:02'),
(15, 1, 13, 'User Group', '', '', '', 'setting/role', '', 2, 'y', '', '2016-01-05 05:07:04', 0, '2016-01-05 05:00:29'),
(16, 1, 0, 'Module Management', '', '', '', 'setting/module', '', 2, 'y', '', '0000-00-00 00:00:00', 0, '2016-01-05 05:09:43'),
(17, 1, 0, 'Menu Management', '', '', '', 'setting/menu', '', 3, 'y', '', '0000-00-00 00:00:00', 0, '2016-01-05 05:11:03'),
(31, 5, 0, 'Produk', '', '', '', 'catalog/product', '', 0, 'y', '', '2016-03-02 22:34:25', 0, '2016-03-02 22:33:58'),
(32, 5, 0, 'Kategori', '', '', '', 'catalog/category', '', 1, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-03 16:13:48'),
(33, 1, 0, 'Setting Attributes', '', '', '', 'setting/attributes', 'fa-dedent', 4, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-04 02:16:38'),
(34, 5, 0, 'Atribut Katalog', '', '', '', 'catalog/attributes', '', 4, 'y', '', '2016-03-22 23:47:19', 0, '2016-03-08 16:22:56'),
(35, 5, 0, 'Komentar', '', '', '', 'catalog/comment', '', 2, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-12 17:24:19'),
(36, 6, 0, 'Data Order', '', '', '', 'order/data', '', 0, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-12 19:10:01'),
(37, 6, 0, 'Atribut Order', '', '', '', 'order/attributes', '', 2, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-22 23:01:59'),
(38, 5, 0, 'Voucher', '', '', '', 'catalog/voucher', '', 3, 'y', '', '0000-00-00 00:00:00', 0, '2016-03-22 23:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `master_menu_privilege`
--

CREATE TABLE `master_menu_privilege` (
  `idMenuPrivilege` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `actionMenuPrivilege` int(1) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` int(11) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_menu_privilege`
--

INSERT INTO `master_menu_privilege` (`idMenuPrivilege`, `idMenu`, `actionMenuPrivilege`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(1, 17, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 17, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(5, 13, 3, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(6, 31, 1, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(7, 31, 2, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(8, 31, 3, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(9, 31, 4, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_module`
--

CREATE TABLE `master_module` (
  `idModule` int(11) NOT NULL,
  `nameModule` varchar(50) NOT NULL,
  `descModule` varchar(255) NOT NULL,
  `targetModule` varchar(255) NOT NULL,
  `iconModule` varchar(255) NOT NULL,
  `orderModule` int(11) NOT NULL,
  `statusModule` enum('Tampil','Tidak Tampil') NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_module`
--

INSERT INTO `master_module` (`idModule`, `nameModule`, `descModule`, `targetModule`, `iconModule`, `orderModule`, `statusModule`, `createdBy`, `createdDate`, `modifiedBy`, `modifiedDate`) VALUES
(1, 'Setting', '', 'dashboard', 'fa-cogs', 4, 'Tampil', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(4, 'Dashboard', 'Ini dashboard', '', 'fa-align-justify', 1, 'Tampil', '', '0000-00-00 00:00:00', '', '2016-03-02 21:56:26'),
(5, 'Catalog', 'Ini catalog', '', 'fa-bookmark-o', 2, 'Tampil', 'exporadev', '2016-03-02 22:08:32', '', '0000-00-00 00:00:00'),
(6, 'Order', 'order', '', 'fa-shopping-cart', 2, 'Tampil', 'exporadev', '2016-03-12 19:05:35', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `master_user_role`
--

CREATE TABLE `master_user_role` (
  `idRole` int(11) NOT NULL,
  `namaRole` varchar(255) NOT NULL,
  `descRole` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_user_role`
--

INSERT INTO `master_user_role` (`idRole`, `namaRole`, `descRole`) VALUES
(1, 'Developer', ''),
(2, 'Superadmin', ''),
(3, 'Admin', ''),
(4, 'Anggota', '');

-- --------------------------------------------------------

--
-- Table structure for table `member_confirmation`
--

CREATE TABLE `member_confirmation` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `confirmation_code` varchar(255) NOT NULL,
  `confirmation_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_confirmation`
--

INSERT INTO `member_confirmation` (`id`, `username`, `confirmation_code`, `confirmation_datetime`) VALUES
(6, 'yuri', '99bdb0437ecabdfd38413506831a9ad46509d714', '2016-01-28 07:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `member_send_email`
--

CREATE TABLE `member_send_email` (
  `alamatEmail` varchar(100) NOT NULL,
  `subjectEmail` varchar(150) NOT NULL,
  `isiEmail` text NOT NULL,
  `createTime` datetime NOT NULL,
  `updateTime` datetime NOT NULL,
  `statusEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `idOrder` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `kodeOrder` char(12) NOT NULL,
  `alamatOrder` text NOT NULL,
  `provinsiOrder` int(11) NOT NULL,
  `kotaOrder` int(11) NOT NULL,
  `kecamatanOrder` int(11) NOT NULL,
  `kodeposOrder` char(5) NOT NULL,
  `trackingOrder` varchar(25) NOT NULL,
  `statusOrder` varchar(20) NOT NULL,
  `tanggalOrder` datetime NOT NULL,
  `tanggalKirim` datetime NOT NULL,
  `tanggalTerima` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_attributes`
--

CREATE TABLE `order_attributes` (
  `idOAttribute` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `nameOAttributes` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_attributes`
--

INSERT INTO `order_attributes` (`idOAttribute`, `idMenu`, `nameOAttributes`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(1, 0, 'Kurir', '2016-03-22 23:33:04', 'exporadev', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_attributes_detail`
--

CREATE TABLE `order_attributes_detail` (
  `idOAttributesDetail` int(11) NOT NULL,
  `idOAttribute` int(11) NOT NULL,
  `nameOAttributeDetail` varchar(255) NOT NULL,
  `valueOAttributeDetail` varchar(255) NOT NULL,
  `orderOAttributeDetail` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_attributes_detail`
--

INSERT INTO `order_attributes_detail` (`idOAttributesDetail`, `idOAttribute`, `nameOAttributeDetail`, `valueOAttributeDetail`, `orderOAttributeDetail`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(1, 1, 'Jalur Nugraha Ekakurir (JNE)', 'jne', 0, '2016-03-22 23:42:25', 'exporadev', '0000-00-00 00:00:00', ''),
(2, 1, 'Titipan Kilat (TIKI)', 'tiki', 1, '2016-03-22 23:46:42', 'exporadev', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_attribute`
--

CREATE TABLE `pengaturan_attribute` (
  `idPAttribute` int(11) NOT NULL,
  `idMenu` int(11) NOT NULL,
  `namePAttribute` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_attribute`
--

INSERT INTO `pengaturan_attribute` (`idPAttribute`, `idMenu`, `namePAttribute`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(2, 17, 'Menu Privilege', '2016-01-20 19:54:46', 'fajrin1243', '2016-01-20 20:34:33', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_attribute_detail`
--

CREATE TABLE `pengaturan_attribute_detail` (
  `idPAttributeDetail` int(11) NOT NULL,
  `idPAttribute` int(11) NOT NULL,
  `namePAttributeDetail` varchar(255) NOT NULL,
  `createdDate` datetime NOT NULL,
  `createdBy` varchar(50) NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `modifiedBy` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_attribute_detail`
--

INSERT INTO `pengaturan_attribute_detail` (`idPAttributeDetail`, `idPAttribute`, `namePAttributeDetail`, `createdDate`, `createdBy`, `modifiedDate`, `modifiedBy`) VALUES
(1, 2, 'View', '2016-01-20 20:34:33', 'fajrin1243', '0000-00-00 00:00:00', ''),
(2, 2, 'Create', '2016-01-20 20:34:34', 'fajrin1243', '0000-00-00 00:00:00', ''),
(3, 2, 'Update', '2016-01-20 20:34:34', 'fajrin1243', '0000-00-00 00:00:00', ''),
(4, 2, 'Delete', '2016-01-20 20:34:34', 'fajrin1243', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `privilege_user`
--

CREATE TABLE `privilege_user` (
  `idPrivilege` int(11) NOT NULL,
  `idRole` int(11) NOT NULL,
  `menuPrivilege` int(11) NOT NULL,
  `actionPrivilege` int(11) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `timestamp` int(10) UNSIGNED DEFAULT '0',
  `data` blob,
  `last_activity` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`, `last_activity`) VALUES
('23185f3801c936e3eca991bb8196d5ee2286acd0', '::1', 1458113405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131333135343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('a73adbf80bcdecd089008875c1537af460148a35', '::1', 1458113686, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131333535363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('06e9131feba290b7c00c8d110ebf2ac4fb7a94e1', '::1', 1458113936, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131333836373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('9c640d0d0b1f75df2c24f8356f6e17510e8624e5', '::1', 1458115037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131353033303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('15a694f44affc1f90db3aa03d04686e292f7fe48', '::1', 1458115826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131353631373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('afdabb9b491ca38484136ff5b10267c492db2de1', '::1', 1458116046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131353934313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('3ded0073e5adeee970146ee15cb85c4e3ca29b02', '::1', 1458116570, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131363331343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('4dc3893daa11b9ea4615da1c73e1d41eb8715df6', '::1', 1458116654, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383131363632303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('f2637bdc1ebf7464ad88e351723e65c2dc832831', '::1', 1458148823, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383134383739353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('873fb4400c8df7a4edc61374ee4d3b582057db3e', '::1', 1458149416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383134393136353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('1e90445db87f6d857a8cf6c934cce994c473a5af', '::1', 1458150234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383134393934383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('f304b813026541e947feb1d87705473417e3fe50', '::1', 1458150520, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383135303236363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('297b66f1ae8aaadb2e26e62362ad4c6d9036b80d', '::1', 1458230178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383233303135363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('cf9c6651355ed9e41c2378841b8cb0fd7a53754b', '::1', 1458233430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383233333134303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('e900b95ce4d864dad0985ea6bbf2f70ff90ebb04', '::1', 1458233647, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383233333434383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('071e23ba42fac0b276b069e795446e9ab5047f7f', '::1', 1458241982, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383234313938323b, NULL),
('66e3e5a0fea8859e8b1692ab67bc638a4edce0cd', '::1', 1458242435, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383234323430383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('620bfcccac4916208000ebdf89ad419b3d8ec33d', '::1', 1458484664, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383438343635313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('7f53d03ed4cf9111f5ad69d1ac9613aa1dcd807f', '::1', 1458485776, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383438353531303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('be409493aa85200b2807a43c4763a7b9c0499104', '::1', 1458487427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383438373233343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('63612976df40c0aca6c536dd2251cf7e17fd9924', '::1', 1458487841, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383438373731313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('61ca041f24433d4cca52102ff3569a9f22ee89e2', '::1', 1458489561, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383438393535383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('f42da4b12cf2582dd65385dcca1fa811753b3be5', '::1', 1458498076, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383439373834383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('dbb17aa3390072415c4c5aaaa425957b591b6446', '::1', 1458498481, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383439383138313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('12d88c27b21399f17f2978f4bbcd2a41d1421463', '::1', 1458498495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383439383438323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b269a46388524dd77057ebb8b41c2bec168ecaa4', '::1', 1458528899, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383532383539383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('dfcb6f3f522b0de2c3edf3ba6384afe987d70dc2', '::1', 1458529124, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383532383930313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('09d367a063a9a651645d107fdb92d67ce739e89b', '::1', 1458529633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383532393434363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('86fb9c4047a07fdfff3c0fbc93851f7b21d305b4', '::1', 1458549593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383534393432333b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('448feacd5692288e41979b18d49ee1edf587387f', '::1', 1458549955, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383534393931313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('c0a6f9d5822ea147be0237de5e08d77d8e3cd9c0', '::1', 1458550492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535303237323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('ca5c4cec4cbbd6377212c7bbbb15a7f2a2869931', '::1', 1458550882, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535303539343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('a3956b0b1e4353e8fa019e16b1d23143fdcf4725', '::1', 1458551173, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535313038353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('864dfa0fb2adcbf3a1527a3d066c0b8031a6e96b', '::1', 1458551707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535313431323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('2d41cc517aae6ab06f0166c72a4abca7e1f19613', '::1', 1458551934, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535313731363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b61772e0721c1c2f137f8b1a3c10b63c6d58e22b', '::1', 1458552171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535323133303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('bd7922d31335954c9d641ed68f70949392516b28', '::1', 1458553238, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383535333233303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('04ad5401f801703d2115b51f691d4f73691d2ddc', '::1', 1458628799, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383632383631323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('4f5b02cd19d53a81b908a3eab8556db1bbdc2590', '::1', 1458629295, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383632393033393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('39da8561485db4eac89a574b02fb021191c224ba', '::1', 1458629760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383632393436313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('0168abf817848ce8dc0dedac3806419a0fb13ef9', '::1', 1458630028, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383632393737303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('95542a7b85028cdaf7a5b6163c759f2a3ea30e4d', '::1', 1458630315, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633303038353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('05ab7ae8f61a5c8d9222a19f5b5223b86d8d6894', '::1', 1458631216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633303933303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('daf8164d56ad136bb780dd74b3da9f8149b415ac', '::1', 1458631496, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633313336353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d47f815c2076b44a5b733a76b7e069cef7e3a4ee', '::1', 1458632038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633323031343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('70107346cf43e046584d916b8e9558abc7beda13', '::1', 1458632589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633323335373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b60a1798d1a474806d26f6e42da7ed34aabc3b83', '::1', 1458632860, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633323637383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('0170ee8b82e8cdc61b19ea26b7769b78f48f4eea', '::1', 1458633499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633333233343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('675ce7705ac22ffa2e153874e1fad0b88115e15e', '::1', 1458634000, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633333733323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('c95e09f850d437a930c713b177b9d456899c672a', '::1', 1458634231, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633343131343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b23fc19e16c906765b36b31c560104e06b81e9ce', '::1', 1458634507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633343530313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('097f4191223b98716df3a74b4795cc4ce3dbe686', '::1', 1458635120, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633343832333b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b81b57342577d4cbeb81741bdd424c20fa3f3b60', '::1', 1458635387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633353134303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d6145678a4c52f1dfe96a474a058ed01f6cab550', '::1', 1458635719, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633353434343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('e437fd4e81ecbee594a8b8065180e3974498a032', '::1', 1458635893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633353735323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('79e2b9f803aebdfb68c2df8594a198d9c26d72cc', '::1', 1458636864, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383633363730303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('bde8927212334ddcca5728014e7eb562953fe4b4', '::1', 1458653241, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383635323932323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('83f68a7faa69b7ecbc0d685c72aa68da941a3ef3', '::1', 1458653539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383635333234353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('6deed74f7ec9276fcb18cea82a8d80ed0213b74e', '::1', 1458653628, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383635333535303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('8ada0ed6e2369768a75bff89c8c3e4204666f97a', '::1', 1458656973, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383635363936323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('0a83b60538f2babda5e05802fb823f19f99a2a76', '::1', 1458657369, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383635373330323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('e7165e88bc45f56d845216536082691e94081521', '::1', 1458662568, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636323435303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('888f953c4cbf272886269d52c6a0d4c596a79d9a', '::1', 1458663270, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636333236393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('c30a772e223255305a32b58a957df91cba735b8b', '::1', 1458663852, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636333632323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('a068964101daaeee0e06742efe70b5d2d4378036', '::1', 1458664331, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636343035323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('432be9b446ba61fd33a6b880557e75f2b978a874', '::1', 1458664659, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636343338343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('58877d2e31df76935bc21131b04eead715bddd85', '::1', 1458664969, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636343734383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('2f9916f0d3a6d056323728c8264ce3cd20770c2a', '::1', 1458665297, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636353139333b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('4f65f3db3ef99fec91d257219fc07c95d852dd94', '::1', 1458668280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383636383037323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('4b0cf1bcc491cf5c44550f6fd707e8371d6de746', '::1', 1458672440, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637323235393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('601044c3b769a762f927c7e24bddb14fdaf0ec84', '::1', 1458672819, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637323536363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('ba6715acbaeb4a0839ca92f35c6735f78e61618e', '::1', 1458673160, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637323839333b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d6fbf41e2c74330492a10f7e0c1c0a45729e2ade', '::1', 1458673406, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637333139353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d9751967851980f90f86425f087638ed25a9de52', '::1', 1458673796, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637333530373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('547019f36014b1e2eac80ae121e6250e6ce25f6c', '::1', 1458674096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637333831393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('5f2a421b6d235839fd3ffc12864c8aceb6f67658', '::1', 1458674243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383637343132363b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('ba80a3c06eb15991b50bbfa47c87ee1a53bd44e5', '::1', 1458714766, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383731343733353b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('9458bfb10fcae0ee6a24a5db172d5deb9f7c3be5', '::1', 1458715271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383731353130373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('24bb8804b4993431c5848bdef62cb9bce31e0216', '::1', 1458715487, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383731353431383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('0a61fe1f4b827c50a663f58ceaa6fb993777b425', '::1', 1458716604, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383731363332313b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('ba77d4ae279c8ca1b53f4711959d1f4ec4f67635', '::1', 1458716711, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383731363634373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('e73460ab676db0234ed9069985b084b18e9875be', '::1', 1458795275, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739353035393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('7bc408bb2b136e6ba93a06ffe0bb9096fb343e74', '::1', 1458795613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739353630373b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('b03c2207c35c422e6d0ae19cf141828aa3a52178', '::1', 1458796374, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739363130393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d70ca333e230576ed168a54312aee5af4f024dcf', '::1', 1458796650, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739363431343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('4303e4def2d165d25e22190c1ce28286ba2bdbb0', '::1', 1458797504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739373231343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('77c0d1294bc0d82b14a93c92346c41b7c95aa4d4', '::1', 1458797831, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739373631303b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('7f1f035b947f04cd36378dda669ba6c2a1ba42c5', '::1', 1458798216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739373932323b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('144c6c261fb41dade8c357a891fc6209330cf0a6', '::1', 1458798617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739383430343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('22c8aaecfb26d1d95e2d72389e40bc41301c6f87', '::1', 1458799093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739383833343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('a0528b169b03986162b79d1a610075becffe1291', '::1', 1458799324, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739393139383b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('d9084f3b3c551a9aa08f1d8fd2182e7246b901f6', '::1', 1458799752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739393534393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('45f810ce3ee7f9ab62f0cb1efb021f29ce1c4926', '::1', 1458800054, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383739393838343b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL),
('69488bc7cf53ac9d2d53db299a26a830b07a2f16', '::1', 1458800321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313435383830303239393b6964557365727c733a313a2233223b70686f6e657c733a393a22313233343536373839223b757365726e616d65557365727c733a393a226578706f7261646576223b726f6c65557365727c733a313a2231223b6c6f676765645f696e7c623a313b, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `usernameUser` varchar(16) NOT NULL,
  `nameUser` varchar(255) NOT NULL,
  `emailUser` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `passwordUser` varchar(50) NOT NULL,
  `roleUser` int(11) NOT NULL,
  `statusUser` char(1) NOT NULL,
  `lastLogin` datetime NOT NULL,
  `created_by` varchar(16) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(16) NOT NULL,
  `updated_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `usernameUser`, `nameUser`, `emailUser`, `phone`, `passwordUser`, `roleUser`, `statusUser`, `lastLogin`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(3, 'exporadev', 'Expora Developer', 'developer@exporadev.com', '123456789', 'aafb33e2a08973b99a55ccaa817837ae', 1, 'y', '2016-03-24 11:53:26', '', '2016-01-10 01:53:08', '', '0000-00-00 00:00:00'),
(4, 'zizcode', 'Aziz Melgiansyah', 'zizcode.exporadev@gmail.com', '085218078785', 'c0aab2f728ceaa0f7ac8c6c4b3cbd785', 4, 'y', '2016-01-27 20:04:24', '', '2016-01-10 01:53:08', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id_userInfo` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `noIdentitas` int(20) NOT NULL,
  `angkatanUser` int(10) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `fotoSampul` varchar(255) NOT NULL,
  `jenisKelamin` varchar(15) NOT NULL,
  `tempatLahir` varchar(100) NOT NULL,
  `tglLahir` date NOT NULL,
  `alamat` text NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kota` int(11) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `aboutMe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id_userInfo`, `idUser`, `noIdentitas`, `angkatanUser`, `jurusan`, `kelas`, `fotoUser`, `fotoSampul`, `jenisKelamin`, `tempatLahir`, `tglLahir`, `alamat`, `provinsi`, `kota`, `pekerjaan`, `aboutMe`) VALUES
(1, 4, 0, 2006, '', '', '', '', '', '', '0000-00-00', '', 0, 0, '', ''),
(6, 8, 0, 2008, '614', '621', '', '', '', 'Bandung', '1997-02-14', '', 0, 0, '', ''),
(7, 3, 0, 0, '', '', '', '', '', '', '0000-00-00', '', 13, 219, 'Programmer', 'Web and Mobile Application Development');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`idCatalog`),
  ADD UNIQUE KEY `skuCatalog` (`skuCatalog`);

--
-- Indexes for table `catalog_attributes`
--
ALTER TABLE `catalog_attributes`
  ADD PRIMARY KEY (`idCAttribute`);

--
-- Indexes for table `catalog_attributes_detail`
--
ALTER TABLE `catalog_attributes_detail`
  ADD PRIMARY KEY (`idCAttributesDetail`);

--
-- Indexes for table `catalog_category`
--
ALTER TABLE `catalog_category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Indexes for table `catalog_detail_stock`
--
ALTER TABLE `catalog_detail_stock`
  ADD PRIMARY KEY (`idStock`);

--
-- Indexes for table `catalog_galeri`
--
ALTER TABLE `catalog_galeri`
  ADD PRIMARY KEY (`idCGaleri`);

--
-- Indexes for table `catalog_voucher`
--
ALTER TABLE `catalog_voucher`
  ADD PRIMARY KEY (`idCVoucher`),
  ADD UNIQUE KEY `kodeCVoucher` (`kodeCVoucher`);

--
-- Indexes for table `crontab_status`
--
ALTER TABLE `crontab_status`
  ADD PRIMARY KEY (`idCrontab`);

--
-- Indexes for table `master_data`
--
ALTER TABLE `master_data`
  ADD PRIMARY KEY (`idData`);

--
-- Indexes for table `master_menu`
--
ALTER TABLE `master_menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `master_menu_privilege`
--
ALTER TABLE `master_menu_privilege`
  ADD PRIMARY KEY (`idMenuPrivilege`);

--
-- Indexes for table `master_module`
--
ALTER TABLE `master_module`
  ADD PRIMARY KEY (`idModule`);

--
-- Indexes for table `master_user_role`
--
ALTER TABLE `master_user_role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `member_confirmation`
--
ALTER TABLE `member_confirmation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`idOrder`);

--
-- Indexes for table `order_attributes`
--
ALTER TABLE `order_attributes`
  ADD PRIMARY KEY (`idOAttribute`);

--
-- Indexes for table `order_attributes_detail`
--
ALTER TABLE `order_attributes_detail`
  ADD PRIMARY KEY (`idOAttributesDetail`);

--
-- Indexes for table `pengaturan_attribute`
--
ALTER TABLE `pengaturan_attribute`
  ADD PRIMARY KEY (`idPAttribute`);

--
-- Indexes for table `pengaturan_attribute_detail`
--
ALTER TABLE `pengaturan_attribute_detail`
  ADD PRIMARY KEY (`idPAttributeDetail`);

--
-- Indexes for table `privilege_user`
--
ALTER TABLE `privilege_user`
  ADD PRIMARY KEY (`idPrivilege`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id_userInfo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `idCatalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `catalog_attributes`
--
ALTER TABLE `catalog_attributes`
  MODIFY `idCAttribute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `catalog_attributes_detail`
--
ALTER TABLE `catalog_attributes_detail`
  MODIFY `idCAttributesDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `catalog_category`
--
ALTER TABLE `catalog_category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `catalog_detail_stock`
--
ALTER TABLE `catalog_detail_stock`
  MODIFY `idStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `catalog_galeri`
--
ALTER TABLE `catalog_galeri`
  MODIFY `idCGaleri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `catalog_voucher`
--
ALTER TABLE `catalog_voucher`
  MODIFY `idCVoucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `crontab_status`
--
ALTER TABLE `crontab_status`
  MODIFY `idCrontab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_data`
--
ALTER TABLE `master_data`
  MODIFY `idData` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=629;
--
-- AUTO_INCREMENT for table `master_menu`
--
ALTER TABLE `master_menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `master_menu_privilege`
--
ALTER TABLE `master_menu_privilege`
  MODIFY `idMenuPrivilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_module`
--
ALTER TABLE `master_module`
  MODIFY `idModule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `master_user_role`
--
ALTER TABLE `master_user_role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `member_confirmation`
--
ALTER TABLE `member_confirmation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_attributes`
--
ALTER TABLE `order_attributes`
  MODIFY `idOAttribute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_attributes_detail`
--
ALTER TABLE `order_attributes_detail`
  MODIFY `idOAttributesDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengaturan_attribute`
--
ALTER TABLE `pengaturan_attribute`
  MODIFY `idPAttribute` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengaturan_attribute_detail`
--
ALTER TABLE `pengaturan_attribute_detail`
  MODIFY `idPAttributeDetail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `privilege_user`
--
ALTER TABLE `privilege_user`
  MODIFY `idPrivilege` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id_userInfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
