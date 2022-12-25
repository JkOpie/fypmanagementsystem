-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2022 at 03:19 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestatephp`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `content`, `image`) VALUES
(10, 'About Us', '<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</p>\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project. (codeastro.com). This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</p>\r\n<div id=\"pgc-w5d0dcc3394ac1-0-0\" class=\"panel-grid-cell\">\r\n<div id=\"panel-w5d0dcc3394ac1-0-0-0\" class=\"so-panel widget widget_sow-editor panel-first-child panel-last-child\" data-index=\"0\">\r\n<div class=\"so-widget-sow-editor so-widget-sow-editor-base\">\r\n<div class=\"siteorigin-widget-tinymce textwidget\">\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project. This is a demo about us page for this project. This is a demo about us page for this project.</p>\r\n<p class=\"text_all_p_tag_css\">This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project. (codeastro.com) This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.This is a demo about us page for this project.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'condos-pool.png');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `auser` varchar(50) NOT NULL,
  `aemail` varchar(50) NOT NULL,
  `apass` varchar(50) NOT NULL,
  `adob` date NOT NULL,
  `aphone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `auser`, `aemail`, `apass`, `adob`, `aphone`) VALUES
(9, 'admin', 'admin@gmail.com', '6812f136d636e737248d365016f8cfd5139e387c', '1994-12-06', '1470002569');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(50) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `sid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`, `sid`) VALUES
(10, 'Alegas', 2),
(11, 'Floson', 2),
(14, 'Tanah Merah', 17),
(15, 'Asun', 17),
(16, 'Ayer Hitam', 17),
(17, 'Bandar Baru Bukit Kayu Hitam', 17),
(18, 'Bandar Darulaman', 17),
(19, 'Bandar Jitra', 17),
(20, 'Changlun', 17);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cid` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cid`, `name`, `email`, `phone`, `subject`, `message`) VALUES
(7, 'codeastro', 'asda@asd.com', '8888885454', 'codeastro.com', 'asdasdasd'),
(8, 'azlina', 'ina@gmail', '+60 16-478', 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(50) NOT NULL,
  `uid` int(50) NOT NULL,
  `fdescription` varchar(300) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `uid`, `fdescription`, `status`, `date`) VALUES
(7, 28, 'This is a demo feedback in order to use set it as Testimonial for the site. Just a simply dummy text rather than using lorem ipsum text lines.', 1, '2022-07-23 16:07:08'),
(8, 33, 'This is great. This is just great. Hmmm, just a dummy text for users feedback.', 1, '2022-07-23 21:51:09'),
(9, 40, 'good', 1, '2022-09-22 13:17:39'),
(10, 45, 'A very good website', 1, '2022-11-24 17:08:24'),
(11, 45, 'fast book', 1, '2022-11-24 17:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `landlord`
--

CREATE TABLE `landlord` (
  `lid` int(50) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `lemail` varchar(100) NOT NULL,
  `lphone` varchar(20) NOT NULL,
  `lpass` varchar(50) NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `limage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `landlord`
--

INSERT INTO `landlord` (`lid`, `lname`, `lemail`, `lphone`, `lpass`, `pimage`, `limage`) VALUES
(1, 'amira', 'amira@gmail', '0145567654', 'b2bc4dc08b0592b166b1bbdcefe8d1ae090f99c7', '', ''),
(2, 'zalika', 'zalika@gmail', '0198876656', '07c158a2e197329a0f248287a01b551b46a4378d', '', ''),
(3, 'fatin', 'fatin@gmail', '013344454', '83952353e4dd0ad558e860d7b79c07e1c36a4117', '', ''),
(4, 'yuhanis', 'yuhanis@gmail', '018776565', '4e98470002f6c8220d1fc230cc10660831e48d92', '', ''),
(5, 'vivi', 'vivi@gmail', '0197767788', 'ed42785ca24ae8fa2d9fd131401e44c3c86519ae', '', ''),
(8, 'jihan', 'jihan@gmail', '0145565567', 'jihan', '', ''),
(9, 'nadia@gmail', '0187765567', 'nadia', 'landlord', '', ''),
(10, 'Nadia', 'nadia@gmail', '0187765567', 'nadia', '', ''),
(11, 'lisa', 'lisa@gmail', '0123445667', 'lisa', '', ''),
(12, 'lisa', 'lisa@gmail', '0123445667', 'lisa', '', ''),
(13, 'siti', 'siti@gmail', '0128890988', 'siti', '', ''),
(14, 'siti', 'siti@gmail', '0128890988', 'siti', '', ''),
(15, 'sari', 'sari@gmail', '0156656676', 'bbde9ba3c334de9ac817aa0264edb8b9b1eabe72', '', ''),
(16, 'raisya', 'raisya@gmail', '0145567655', '6baf933b6e06f49d6fdae42de819952f689f8b3a', '', ''),
(17, 'rita', 'rita@gmail', '0178876556', '6fe06f8d903ee0d0242c6f31b94578b2957c9752', '', ''),
(18, 'wahida', 'wahida@gmail', '0123467789', 'da9d97cc63e5ff817fe27974f369aa080e1975c3', '', ''),
(19, 'erina', 'erina@gmail', '0176678894', '123d4c4c7a1987f7ac7c544d424433f6bd002d2f', '', ''),
(20, 'anwar', 'anwar@gmail', '0176654321', '6ea4264c2ca25ce5ca5337acea7d6888d960df42', '', 'limage'),
(21, 'aeril', 'aeril@gmail', '0156644344', '844fa953487bdb619f1716d575c940f965297cce', '', 'limage'),
(22, 'wana', 'wana@gmail', '0123348998', 'f54f998810741268a939dd2a6e4f44b613dea889', '', 'limage'),
(23, 'marzuki', 'marzuki@gmail', '0127786545', 'c93c7b3466148a7418835555700f7fb9b38e58bb', '', 'limage'),
(24, 'waniz', 'waniz@gmail', '0165567899', '5ec8f179eebc586f00d114f6320d398d900054e3', '', 'limage');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `pid` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `pcontent` longtext NOT NULL,
  `type` varchar(100) NOT NULL,
  `bhk` varchar(50) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `bedroom` int(50) NOT NULL,
  `bathroom` int(50) NOT NULL,
  `balcony` int(50) NOT NULL,
  `kitchen` int(50) NOT NULL,
  `hall` int(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `size` int(50) NOT NULL,
  `price` int(50) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `feature` longtext NOT NULL,
  `pimage` varchar(300) NOT NULL,
  `pimage1` varchar(300) NOT NULL,
  `pimage2` varchar(300) NOT NULL,
  `pimage3` varchar(300) NOT NULL,
  `pimage4` varchar(300) NOT NULL,
  `uid` int(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `mapimage` varchar(300) NOT NULL,
  `topmapimage` varchar(300) NOT NULL,
  `groundmapimage` varchar(300) NOT NULL,
  `totalfloor` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `isFeatured` int(11) DEFAULT NULL,
  `pstatus` varchar(100) NOT NULL DEFAULT 'pending',
  `lid` int(100) NOT NULL,
  `Tsize` int(50) NOT NULL,
  `furniture` varchar(100) NOT NULL,
  `Ttype` varchar(100) NOT NULL,
  `Utype` varchar(100) NOT NULL,
  `resident` varchar(100) NOT NULL,
  `Bprice` int(50) NOT NULL,
  `Tprice` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `title`, `pcontent`, `type`, `bhk`, `stype`, `bedroom`, `bathroom`, `balcony`, `kitchen`, `hall`, `floor`, `size`, `price`, `location`, `city`, `state`, `feature`, `pimage`, `pimage1`, `pimage2`, `pimage3`, `pimage4`, `uid`, `status`, `mapimage`, `topmapimage`, `groundmapimage`, `totalfloor`, `date`, `isFeatured`, `pstatus`, `lid`, `Tsize`, `furniture`, `Ttype`, `Utype`, `resident`, `Bprice`, `Tprice`) VALUES
(25, 'Zills Home', '', 'house', '4 BHK', 'sale', 4, 2, 0, 1, 1, '2nd Floor', 1869, 219690, '39 Bailey Drive', 'Floson', 'Colotana', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Appartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'zillhms1.jpg', 'zillhms2.jpg', 'zillhms3.jpg', 'zillhms4.jpg', 'zillhms5.jpg', 30, 'available', 'floorplan_sample.jpg', 'zillhms7.jpg', 'zillhms6.jpg', '2 Floor', '2022-07-22 22:29:20', 0, 'approve', 0, 0, '', '', '', '', 0, 0),
(65, 'Corner Lot', '', 'Convenience', '5 BHK', 'rent', 1, 1, 3, 4, 1, '1st Floor', 4355, 1099, 'Lorong Mahsuri', 'Tanah Merah', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 0, 'available', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', '5 Floor', '2022-11-24 14:33:33', 1, 'Approve', 18, 0, '', '', '', '', 0, 0),
(66, 'Jitra Mall Store', '', 'Specialty', '1 BHK', 'rent', 1, 1, 1, 1, 1, '1st Floor', 11111, 1500, 'Taman Suria', 'Ayer Hitam', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 0, 'available', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', '9 Floor', '2022-11-24 14:36:02', 1, 'approve', 18, 0, '', '', '', '', 0, 0),
(111, 'Kedai Sewa Jitra', '<p>Berhampiran Taman Jaya</p>', 'Convenience Store', '', '', 0, 0, 0, 0, 0, '', 1256, 1700, 'Lorong Mahsuri', 'Asun', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 0, 'available', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', '', '2022-11-26 14:48:19', 1, 'Approve', 18, 1256, 'Unfurnished', 'Malay Reserved', 'Intermediate', 'Vacant', 7, 9),
(189, 'Tanah Merah', '<p>Belakang Yawata</p>', 'Specialty Store', '', '', 0, 0, 0, 0, 0, '', 344, 1350, 'Tanah Merah Taman Mahsuri', 'Tanah Merah', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : 5</span>&nbsp;Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 0, 'available', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', '', '2022-11-26 14:34:48', 1, 'Approve', 18, 123, 'Fully Furnished', 'Freehold', 'Corner Lot', 'Vacant', 3, 4),
(190, 'Pekan Lunas Convenience Store', '', 'Convenience', '', '', 0, 0, 0, 0, 0, '', 123, 1800, 'Pekan Lunas', 'Tanah Merah', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', 0, 'available', 'PIC1.jpg', 'PIC1.jpg', 'PIC1.jpg', '', '2022-11-25 21:42:51', 1, 'approve', 18, 123, 'Fully Furnished', 'Freehold', 'Corner Lot', 'Vacant', 2, 2),
(222, 'Belakang Aneka', '<p>Berdekatan Aneka</p>', 'Department Store', '', '', 0, 0, 0, 0, 0, '', 1234, 800, 'Lorong Mahsuri', 'Bandar Darulaman', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : </span>5 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', 0, 'available', 'carousel-1.jpg', 'carousel-1.jpg', 'carousel-1.jpg', '', '2022-11-26 14:40:53', 1, 'approve', 18, 1234, 'Unfurnished', 'Leasehold', 'Corner Lot', 'Vacant', 4, 3),
(1239, 'Corner Lot Bangunan Sinaran Jaya', '', 'Convenience Store', '', '', 0, 0, 0, 0, 0, '', 1234, 1800, 'Lorong Mahsuri', 'Tanah Merah', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 0, 'available', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', '', '2022-11-30 17:19:48', 1, 'pending', 23, 123, 'Fully Furnished', 'Freehold', 'Corner Lot', 'Vacant', 2, 2),
(156889, 'Corner Lot Bangunan Taman Aman', '', 'Convenience Store', '', '', 0, 0, 0, 0, 0, '', 1234, 2000, 'Tanah Merah Taman Mahsuri', 'Tanah Merah', 'Kedah', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-dark font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', 0, 'available', 'PIC2.jpg', 'PIC2.jpg', 'PIC2.jpg', '', '2022-11-30 17:26:21', 1, 'Approve', 24, 1234, 'Unfurnished', 'Freehold', 'Corner Lot', 'Vacant', 2, 2),
(156892, 'Kedai Tingkat 11 Corner Lot', '<p>Kedai Tingkat Satu untuk Disewa<br />Lokasi Asun, Kedah<br /><br />Kedai Jenis 2 Tingkat.<br />Tingkat 1 untuk Disewa<br />Sewa hanya RM700<br /><br />Bertempat di kawasan perumahan.<br />Banyak parking.<br />hanya 5 minit jarak ke Bandar Kuantan<br />Sesuai untuk segala jenis perniagaan</p>', 'Convenience Store', '', '', 0, 0, 0, 0, 0, '', 2600, 700, 'Asun, Kedah', 'Asun', 'Kedah', '', '3.jpg', '', '', '', '', 0, 'approve', '', '', '', '', '2022-12-15 22:49:42', 0, 'approve', 16, 2600, 'Fully Furnished', 'Lot Bumiputera', 'Intermediate', 'Vacant', 2, 2),
(156893, '3 Storey Shop Lot Ground Floor', '<p>Facilities Nearby<br />===================<br />📍 C-Mart<br />📍 Star Parade<br />📍 Aman Central<br />📍 Convenience Store &amp; Restaurants</p>', 'Factory Outlet', '', '', 0, 0, 0, 0, 0, '', 2576, 700, 'Ayer Hitam, Kedah', 'Ayer Hitam', 'Kedah', '', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', 0, 'available', '4.jpg', '5.jpg', '6.jpg', '', '2022-12-15 23:44:29', 1, 'approve', 16, 2576, 'Unfurnished', 'Lot Bumiputera', 'Intermediate', 'Vacant', 2, 2),
(156894, 'Kedai Corner Lot Lima Tingkat', '', 'Factory Outlet', '', '', 0, 0, 0, 0, 0, '', 2600, 1500, 'Asun, Kedah', 'Tanah Merah', 'Kedah', '', 'cornerlot1.jpg', '', '', '', '', 0, 'approve', '', '', '', '', '2022-12-16 11:16:57', 0, 'approve', 16, 2600, 'Unfurnished', 'Malay Reserved', 'Corner Lot', 'Vacant', 2, 2),
(156895, 'testing', '', 'flat', '2,3,4 BHK', 'sale', 1, 600, 3, 1, 1, '2nd Floor', 4355, 600, 'Lorong Mahsuri', 'fghjkl', 'hjkl', '<p>&nbsp;</p>\r\n<!---feature area start--->\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Property Age : </span>10 Years</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Swiming Pool : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Parking : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">GYM : </span>Yes</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Type : </span>Apartment</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Security : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Dining Capacity : </span>10 People</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Church/Temple : </span>No</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-md-4\">\r\n<ul>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">3rd Party : </span>No</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Elevator : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">CCTV : </span>Yes</li>\r\n<li class=\"mb-3\"><span class=\"text-secondary font-weight-bold\">Water Supply : </span>Ground Water / Tank</li>\r\n</ul>\r\n</div>\r\n<!---feature area end---->\r\n<p>&nbsp;</p>', 'cheese.png', 'mushroom crisps.png', 'cheese.png', 'ubat.png', 'shampoo.png', 52, 'available', 'ubat.png', 'mushroom crisps.png', 'mushroom soup.png', '5 Floor', '2022-12-19 23:03:52', 1, 'pending', 0, 0, '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `sid` int(50) NOT NULL,
  `sname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`sid`, `sname`) VALUES
(17, 'Kedah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(50) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `uemail` varchar(100) NOT NULL,
  `uphone` varchar(20) NOT NULL,
  `upass` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `uimage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `uphone`, `upass`, `utype`, `uimage`) VALUES
(28, 'Christine', 'christine@mail.com', '7777444455', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'gr7.png'),
(29, 'Alice Howard', 'howarda@mail.com', '7775552214', '6812f136d636e737248d365016f8cfd5139e387c', 'agent', 'avatarm2-min.jpg'),
(30, 'Thomas Olson', 'thomas@mail.com', '7896665555', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'avatarm7-min.jpg'),
(31, 'Cynthia N. Moore', 'moore@mail.com', '7896547855', '6812f136d636e737248d365016f8cfd5139e387c', 'agent', 'user-default-3-min.png'),
(32, 'Carl Jones', 'carl@mail.com', '1458887969', '6812f136d636e737248d365016f8cfd5139e387c', 'agent', 'user-profile-min.png'),
(33, 'Noah Stones', 'noah@mail.com', '7965555544', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'usersys-min.png'),
(34, 'Fred Godines', 'fred@mail.com', '7850002587', '6812f136d636e737248d365016f8cfd5139e387c', 'builder', 'user-a-min.png'),
(35, 'Michael', 'michael@mail.com', '8542221140', '6812f136d636e737248d365016f8cfd5139e387c', 'user', 'usric.png'),
(37, 'ina', 'ina@gmail', '567', 'ccc4b284d5a328798bee23673513f427cfd56b77', 'user', 'cheese.png'),
(38, 'trial', 'trial@mail', '456789', '069fd3a44db682e9a4ea4bf495c0ffbee58c8431', 'user', 'mushroom crisps.png'),
(39, 'cuba', 'cuba@gmail', '+60 16-478', 'c4e7ac099dfd65af3316d47a7d6bf694a3bab581', 'user', 'mushroom crisps.png'),
(40, 'Shida Rahim', 'shida@gmail', '+60 16-478', '1b311f50eb8044fc74ffe975c7d7b194e3bef9a5', 'user', 'cheese.png'),
(41, 'Anita Rahmat', 'anita@gmail', '0123456678', 'd56c82a0ab1c536999c31ae5e2c0dab85f47a331', 'builder', 'mushroom crisps.png'),
(42, 'Q', 'Q@GMAIL', '+60 16-478', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user', 'cheese.png'),
(43, 'wani hasrita', 'hasrita@gmail', '0198765567', 'e42397217a400644fd55ded98129e9d2e05d0b03', 'agent', 'ubat.png'),
(44, 'hael husaini', 'hael@gmail', '014556899', '652e29f30df31012447a3a3cd85f81dafc3083a3', 'landlord', 'mushroom soup.png'),
(45, 'v', 'v@gmail', '098776788', '7a38d8cbd20d9932ba948efaa364bb62651d5ad4', 'landlord', 'mushroom crisps.png'),
(46, 'alif satar', 'alif@gmail', '0187767765', '707fb7d2aac6a040c4e13ca3caff4a2ba9c0308d', 'user', 'seas.png'),
(47, 'laila', 'laila@gmail', '0123345678', 'ea7c15c24f4fa9fbefd717dc2e438c32ff663fe4', 'user', 'cheese.png'),
(48, 'ariffin', 'ariffin@gmail', '0187786677', '06c1c1e454023d3d3cdebb9f54e2e62c1e22ecdf', '', 'team-4.jpg'),
(49, 'wahid', 'wahid@gmail', '0187786678', '63ea7bc88beb18b07b11bb65f91290a86e238f15', '', 'team-4.jpg'),
(50, 'azlina', 'azlina@gmail', '0123344323', '7ddc3c0f40b339f9650ba92a74ad1a187e24cc5d', '', 'avatarm2-min.jpg'),
(51, 'farah', 'farah@gmail', '0167785444', 'fb8f28b6cd384c470128f4c9fdb741a9ed31f736', '', 'cloud.png'),
(52, 'trial', 'trial@gmail', '4321', '069fd3a44db682e9a4ea4bf495c0ffbee58c8431', 'user', 'cheese.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `landlord`
--
ALTER TABLE `landlord`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `landlord`
--
ALTER TABLE `landlord`
  MODIFY `lid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156896;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `sid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
