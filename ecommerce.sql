-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 26 nov. 2021 à 00:14
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `user_id`, `name`, `slug`, `parent_id`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Thời Trang Nam', 'thoi-trang-nam', 0, 0, '2021-11-14 01:28:33', '2021-11-14 13:11:19'),
(2, 1, 'Thời Trang Nữ', 'thoi-trang-nu', 0, 0, '2021-11-14 01:28:34', '2021-11-14 01:28:34'),
(3, 1, 'Quần âu', 'quan-au', 1, 0, '2021-11-14 01:49:48', '2021-11-14 13:31:01'),
(4, 1, 'Quần bò', 'quan-bo', 1, 0, '2021-11-14 01:49:48', '2021-11-16 06:51:56'),
(5, 1, 'Quần ống xuông dài', 'quan-ong-xuong-444725315', 2, 1, '2021-11-14 01:49:48', '2021-11-17 10:14:15'),
(6, 1, 'Váy', 'vay', 2, 0, '2021-11-14 02:09:00', '2021-11-16 06:51:54'),
(33, 1, 'Quần thể thao', 'quan-the-thao-2092904650', 1, 0, '2021-11-16 16:22:04', '2021-11-16 16:22:04'),
(35, 1, 'Quần nữ', 'quan-nu-1510780944', 2, 0, '2021-11-17 17:05:28', '2021-11-17 17:05:28'),
(36, 1, 'Thời trang trẻ em', 'thoi-trang-tre-em-86222470', 0, 0, '2021-11-18 05:26:50', '2021-11-18 05:26:50'),
(37, 1, 'Quần áo trẻ em', 'quan-ao-tre-em-1368117909', 36, 0, '2021-11-18 17:07:14', '2021-11-18 17:07:14');

-- --------------------------------------------------------

--
-- Structure de la table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `category_post`
--

INSERT INTO `category_post` (`id`, `name`, `created_at`, `updated_at`, `slug`, `user_id`) VALUES
(1, 'Kinh nghiệm mua sắm', '2021-11-16 15:33:49', '2021-11-16 16:22:43', 'kinh-nghiem-mua-sam-969876127', 1),
(2, 'Kinh nghiệm sống', '2021-11-16 15:33:49', '2021-11-16 16:22:47', 'kinh-nghiem-song-1748315427', 1),
(4, 'Đời sống', '2021-11-16 16:22:31', '2021-11-16 16:22:31', 'doi-song-1988746932', 1);

-- --------------------------------------------------------

--
-- Structure de la table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `colorname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `color`
--

INSERT INTO `color` (`id`, `product_id`, `colorname`, `created_at`) VALUES
(211, 1, '1', NULL),
(212, 1, '2', NULL),
(213, 1, '3', NULL),
(214, 1, '9', NULL),
(217, 2, '2', NULL),
(218, 2, '9', NULL),
(225, 4, '1', NULL),
(226, 4, '2', NULL),
(227, 4, '3', NULL),
(228, 4, '10', NULL),
(233, 10, '8', NULL),
(234, 10, '9', NULL),
(235, 3, '1', NULL),
(236, 3, '2', NULL),
(237, 11, '1', NULL),
(238, 11, '2', NULL),
(239, 12, '1', NULL),
(240, 12, '7', NULL),
(241, 12, '10', NULL),
(242, 13, '1', NULL),
(243, 13, '10', NULL),
(247, 15, '1', NULL),
(248, 15, '2', NULL),
(252, 14, '1', NULL),
(253, 14, '7', NULL),
(254, 14, '8', NULL),
(255, 16, '1', NULL),
(256, 16, '2', NULL),
(257, 16, '3', NULL),
(260, 18, '1', NULL),
(261, 18, '10', NULL),
(262, 19, '1', NULL),
(263, 19, '4', NULL),
(264, 20, '1', NULL),
(265, 21, '1', NULL),
(268, 22, '1', NULL),
(269, 22, '2', NULL),
(270, 23, '1', NULL),
(271, 23, '2', NULL),
(272, 24, '1', NULL),
(273, 24, '9', NULL),
(274, 24, '10', NULL),
(275, 25, '1', NULL),
(276, 25, '4', NULL),
(277, 25, '8', NULL),
(280, 27, '8', NULL),
(281, 27, '10', NULL),
(282, 28, '2', NULL),
(283, 28, '8', NULL),
(284, 26, '8', NULL),
(285, 26, '10', NULL),
(286, 29, '1', NULL),
(287, 29, '7', NULL),
(288, 29, '10', NULL),
(289, 29, '11', NULL),
(290, 30, '4', NULL),
(291, 30, '7', NULL),
(292, 30, '9', NULL),
(293, 17, '1', NULL),
(294, 17, '2', NULL),
(295, 31, '3', NULL),
(296, 31, '7', NULL),
(297, 31, '8', NULL),
(301, 33, '5', NULL),
(302, 33, '7', NULL),
(303, 33, '8', NULL),
(314, 37, '1', NULL),
(315, 37, '2', NULL),
(316, 32, '1', NULL),
(317, 32, '2', NULL),
(318, 32, '3', NULL),
(319, 36, '3', NULL),
(320, 36, '5', NULL),
(321, 36, '6', NULL),
(322, 36, '8', NULL),
(323, 34, '3', NULL),
(324, 34, '5', NULL),
(325, 34, '7', NULL),
(329, 35, '1', NULL),
(330, 35, '3', NULL),
(331, 35, '4', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `product_id`, `post_id`, `comment`, `created_at`) VALUES
(1, 2, 1, NULL, 'Quần bò khá đẹp', '2021-11-15 05:38:24'),
(4, 9, 2, NULL, 'ok', '2021-11-15 05:39:12'),
(5, 2, 1, NULL, 'Quần bò khá đẹp', '2021-11-15 05:38:24'),
(6, 3, 1, NULL, 'ok', '2021-11-15 05:38:24');

-- --------------------------------------------------------

--
-- Structure de la table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `percent` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `number` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `usecoupon` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `coupon`
--

INSERT INTO `coupon` (`id`, `name`, `percent`, `created_at`, `number`, `user_id`, `usecoupon`) VALUES
(1, '21DVH23JBVJQ', 10, '2021-11-16 06:03:44', 15, 1, 8),
(2, '43FC12433ED', 3, '2021-11-16 06:03:44', 0, 1, 0),
(19, '6193482932CDF', 5, '2021-11-16 12:56:57', 1, 1, 0),
(20, '619B70A56781C', 15, '2021-11-22 17:27:49', 10, 1, 0),
(21, '619B794F16459', 45, '2021-11-22 18:04:47', 5, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `fullname`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 1, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', 'bảo mật web', 'bảo mật web đi hehe', 0, '2021-11-16 13:40:44'),
(2, 14, 'Trần Văn Quyền', 'tranquyen@gmail.com', 'Quần bò', 'quần bò mặc đẹp mà giá hơi đắt xíu', 1, '2021-11-16 13:40:44'),
(3, NULL, 'Nguyễn văn tú', 'tu@gmail.com', 'váy', 'váy ngắn quá', 1, '2021-11-16 13:42:55'),
(4, NULL, 'Trần Tuấn Quốc', 'quoc@gmail.com', 'Áo hoddie', 'bán toàn quần áo đểu dcmm', 0, '2021-11-16 13:42:55'),
(13, NULL, 'Trần Thế Duyệt', 'deqt@gmail.com', 'quần áo quá xấu', 'xấu', 1, '2021-11-17 13:15:34');

-- --------------------------------------------------------

--
-- Structure de la table `galery_product`
--

CREATE TABLE `galery_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `galery_product`
--

INSERT INTO `galery_product` (`id`, `product_id`, `thumbnail`, `created_at`) VALUES
(46, 1, '../images/shop/61fab36da4ddc6ca351ba7a2bd560ac0.jpg', NULL),
(47, 1, '../images/shop/d04923d3fec475b26739abeb390ffbe4.jpg', NULL),
(48, 2, '../images/shop/1fcccbd27721b35c1520e7d8394f8008.jpg', NULL),
(49, 2, '../images/shop/38ad2ad561d596bbd1ba9d9d45ed6d55.jpg', NULL),
(50, 3, '../images/shop/1804a4aeb65f809bfff11480f955adee.jpg', NULL),
(51, 3, '../images/shop/2970210795726fb9f4853738db51ff91.jpg', NULL),
(52, 4, '../images/shop/05658457075061d9185f3b9649e8a4bb.jpg', NULL),
(53, 4, '../images/shop/d2fbba688515d9fccf20152b6c85a732.jpg', NULL),
(54, 10, '../images/shop/a7817736a2af6c6da9e61b6116523c7c.jpg', NULL),
(55, 10, '../images/shop/d9f48757a7136373dbcee92a75cac7e6.jpg', NULL),
(56, 11, '../images/shop/d04923d3fec475b26739abeb390ffbe4.jpg', NULL),
(57, 12, '../images/shop/703387b993ce16f97637e65ecb95554b.jpg', NULL),
(58, 13, '../images/shop/fc9c73f62764b50c0e47014604fde26a.jpg', NULL),
(59, 15, '../images/shop/6c82650f90480c2e8bc4d4de0a5416e7.jpg', NULL),
(61, 14, '../images/shop/qu_n_jeans_nam_d_ng_m_i7jea009i_xanh-01_490000_2_.jpg', NULL),
(62, 16, '../images/shop/5990e680119e2cb0933685d6f54e6d69.jpg', NULL),
(66, 18, '../images/shop/tải xuống (1).jpg', NULL),
(67, 19, '../images/shop/e9a0786aa80fcc48bf12bb47b81331b7.jpg', NULL),
(68, 20, '../images/shop/tải xuống (2).jpg', NULL),
(69, 21, '../images/shop/pasted image 0.png', NULL),
(70, 22, '../images/shop/7f3e886ba2020ebd3f2c98c692a30079.jpg', NULL),
(71, 23, '../images/shop/70db11b5a1ff382d3db02a41ae8102e7.jpg', NULL),
(72, 24, '../images/shop/562b4c0835e90fe327b8ebc4c75c3edf.jpg', NULL),
(73, 25, '../images/shop/d7cf35f01de0c751542ac1263e4b2514.jpg', NULL),
(75, 27, '../images/shop/palvin-vay-nu-cach-dieu-tre-trung-t06202-dam-den-sang-chanh-mau-vay-den-dep-vay-dep-1.jpg', NULL),
(76, 28, '../images/shop/quan-nu-dep-3-560x560-1.jpg', NULL),
(77, 26, '../images/shop/palvin-vay-nu-cach-dieu-tre-trung-t06202-dam-den-sang-chanh-mau-vay-den-dep-vay-dep-1.jpg', NULL),
(78, 29, '../images/shop/tải xuống (3).jpg', NULL),
(79, 30, '../images/shop/tải xuống.jpg', NULL),
(80, 17, '../images/shop/148202124855_IMG_3764.jpg', NULL),
(81, 31, '../images/shop/4073a-angela-mckay-x-hm-3x2-1-1280x853-1616131217562782934411.jpg', NULL),
(82, 32, '../images/shop/148202124855_IMG_3764.jpg', NULL),
(83, 33, '../images/shop/18398865713946490909075662480909044377533935-n-1620986436187.jpg', NULL),
(84, 34, '../images/shop/images.jpg', NULL),
(85, 35, '../images/shop/thoi-trang-tre-em.jpg', NULL),
(86, 36, '../images/shop/thoi-trang-tre-em-da-dang-hop-xu-huong-o-beeshop-1.jpg', NULL),
(87, 37, '../images/shop/thoi-trang-tre-em-tai-da-nang(11).jpg', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `orders_shipping` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `usecoupon` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `fullname`, `email`, `phonenumber`, `address`, `note`, `order_date`, `status`, `user_id`, `role_id`, `total_money`, `orders_shipping`, `updated_at`, `order_id`, `usecoupon`) VALUES
(2, 'Trần Thị Thoa', 'hoa206@gmail.com', '023474323', '268 Đội Cấn,Hai Bà Trưng,Hà Nội', 'giao hàng giờ hành chính', '2021-11-16 19:06:26', 3, 2, 2, 3, 1, '2021-11-17 08:53:09', 274736, 0),
(6, 'nguyen quang truong', 'truongdinhta@gmail.com', '1', '111', 'dfeq', '2021-11-19 09:24:59', 3, NULL, 3, 711000, 0, '2021-11-19 16:12:29', 669287, 0),
(7, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'dddddd', '2021-11-19 09:56:05', 0, 1, 2, 639900, 0, NULL, 743589, 1),
(8, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'aaa', '2021-11-19 09:59:55', 3, 1, 2, 95040, 0, '2021-11-19 19:41:01', 724950, 1),
(10, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'hahaha', '2021-11-19 10:11:25', 1, 1, 2, 486000, 0, '2021-11-22 17:28:41', 245339, 1),
(11, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'aaaa', '2021-11-19 10:30:44', 4, 1, 2, 880000, 0, '2021-11-19 20:02:51', 375324, 0),
(12, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'ok', '2021-11-19 13:59:45', 0, 1, 2, 425000, 0, NULL, 537523, 0),
(13, 'Phan Tấn Trung', 'phantrung1992@gmail.com', '34597312', 'Thường Tín,Hà Nội', 'ok', '2021-11-21 11:53:18', 3, NULL, 3, 306000, 0, '2021-11-22 17:26:36', 665198, 0),
(14, 'Trần Thị Thoa', 'dvs@gmail.com', '9235832', 'Hâ Nam', 'ok', '2021-11-22 01:26:50', 0, NULL, 3, 105600, 2, NULL, 108289, 0),
(15, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Hà Nội', 'giao hàng giờ hành chính', '2021-11-22 11:25:25', 0, NULL, 3, 3718800, 2, NULL, 914429, 1),
(16, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'ok', '2021-11-22 11:30:47', 0, 1, 2, 850000, 0, NULL, 887064, 0),
(17, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'ok', '2021-11-22 11:31:25', 0, 1, 2, 711000, 0, NULL, 205172, 0),
(18, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'ko', '2021-11-22 11:31:44', 0, 1, 2, 306000, 0, NULL, 831004, 0),
(19, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'giao hàng nhanh', '2021-11-22 12:01:09', 3, 1, 2, 1089000, 2, '2021-11-22 18:02:59', 143169, 1),
(20, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'vang', '2021-11-24 12:21:39', 0, 1, 2, 180000, 0, NULL, 770816, 0),
(21, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'test', '2021-11-24 12:22:42', 0, 1, 2, 711000, 0, NULL, 531208, 0),
(22, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'hello', '2021-11-24 12:23:55', 0, 1, 2, 200000, 0, NULL, 585439, 0),
(23, 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', 'ok', '2021-11-24 12:24:24', 0, 1, 2, 405000, 0, NULL, 411647, 0);

-- --------------------------------------------------------

--
-- Structure de la table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `total_money` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `size` int(11) DEFAULT 1,
  `color` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `num`, `total_money`, `created_at`, `updated_at`, `size`, `color`) VALUES
(1, 2, 4, 1, 1, 1, '2021-11-16 19:21:15', '2021-11-16 19:21:15', 1, 1),
(2, 2, 10, 1, 2, 2, '2021-11-16 19:23:08', '2021-11-16 19:23:08', 1, 1),
(4, 6, 3, 790000, 1, 790000, '2021-11-19 09:24:59', NULL, 1, 1),
(5, 7, 3, 790000, 1, 1350900, '2021-11-19 09:56:05', NULL, 1, 1),
(6, 8, 31, 105600, 1, 105600, '2021-11-19 09:59:55', NULL, 1, 1),
(7, 10, 37, 180000, 3, 540000, '2021-11-19 10:11:25', NULL, 1, 1),
(8, 11, 21, 880000, 1, 880000, '2021-11-19 10:30:44', NULL, 1, 1),
(9, 12, 10, 425000, 1, 425000, '2021-11-19 13:59:45', NULL, 5, 9),
(10, 13, 22, 306000, 1, 306000, '2021-11-21 11:53:18', NULL, 1, 1),
(11, 14, 31, 105600, 1, 105600, '2021-11-22 01:26:50', NULL, 2, 3),
(12, 15, 22, 306000, 2, 612000, '2021-11-22 11:25:25', NULL, 2, 1),
(13, 15, 21, 880000, 4, 3520000, '2021-11-22 11:25:25', NULL, 3, 1),
(14, 16, 10, 425000, 2, 850000, '2021-11-22 11:30:47', NULL, 5, 9),
(15, 17, 3, 711000, 1, 711000, '2021-11-22 11:31:25', NULL, 2, 2),
(16, 18, 22, 306000, 1, 306000, '2021-11-22 11:31:44', NULL, 1, 2),
(17, 19, 37, 180000, 2, 360000, '2021-11-22 12:01:09', NULL, 2, 2),
(18, 19, 10, 425000, 2, 850000, '2021-11-22 12:01:09', NULL, 5, 9),
(19, 20, 33, 180000, 1, 180000, '2021-11-24 12:21:39', NULL, 4, 7),
(20, 21, 3, 711000, 1, 711000, '2021-11-24 12:22:42', NULL, 1, 1),
(21, 22, 26, 200000, 1, 200000, '2021-11-24 12:23:55', NULL, 1, 8),
(22, 23, 1, 405000, 1, 405000, '2021-11-24 12:24:24', NULL, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `title`, `slug`, `user_id`, `content`, `created_at`, `updated_at`, `category_id`, `view`, `thumbnail`) VALUES
(1, 'Giáo dục miễn phí với tất cả mọi người', 'giao-duc-mien-phi', 1, '<p style=\"margin-bottom: 18px; line-height: 2.6rem; color: rgb(34, 34, 34); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250); font-size: 1.6rem !important;\">“Khi lượng đổi thì ắt chất sẽ đổi. Thời gian ở nhà lâu quá, việc học online quá lâu đã dẫn tới nhiều hệ lụy”, thầy Khang tâm sự.</p><table class=\"picture\" align=\"center\" style=\"line-height: 2.6rem; color: rgb(34, 34, 34); width: auto; margin: 0px auto 15px; padding: 0px; font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250); font-size: 1.6rem !important;\"><tbody style=\"line-height: 2.6rem; font-size: 1.6rem !important;\"><tr style=\"line-height: 2.6rem; font-size: 1.6rem !important;\"><td class=\"pic\" style=\"line-height: 2.6rem; font-size: 1.6rem !important;\"><a class=\"photo\" href=\"https://photo-cms-giaoduc.zadn.vn//Uploaded/2021/bpcgtqvp/2021_11_15/thay-khang-6645.jpg\" data-desc=\"Thầy Nguyễn Xuân Khang - Hiệu trưởng trường Marie Curie, Hà Nội (Ảnh: Thùy Linh)\" data-index=\"0\" style=\"transition: all 0.2s ease-out 0s; color: rgb(19, 103, 145); display: inline; line-height: 2.6rem; font-size: 1.6rem !important;\"><img data-image-id=\"1016933\" src=\"https://photo-cms-giaoduc.zadn.vn/w700/Uploaded/2021/bpcgtqvp/2021_11_15/thay-khang-6645.jpg\" data-width=\"700\" data-height=\"525\" class=\"cms-photo\" data-photo-original-src=\"https://photo-cms-giaoduc.zadn.vn/Uploaded/2021/bpcgtqvp/2021_11_15/thay-khang-6645.jpg\" cms-photo-caption=\"Thầy Nguyễn Xuân Khang - Hiệu trưởng trường Marie Curie, Hà Nội (Ảnh: Thùy Linh)\" style=\"border-style: none; line-height: 2.6rem; color: rgb(34, 34, 34); max-width: 100%; font-size: 1.6rem !important;\"></a></td></tr><tr style=\"line-height: 2.6rem; font-size: 1.6rem !important;\"><td class=\"caption\" style=\"text-align: center; font-style: italic; padding: 10px 20px 8px; background: rgb(238, 238, 238); display: block; line-height: 20px !important; font-size: 14px !important;\"><p style=\"color: rgb(34, 34, 34); margin-bottom: 0px !important; line-height: 20px !important; font-size: 14px !important;\">Thầy Nguyễn Xuân Khang - Hiệu trưởng trường Marie Curie, Hà Nội (Ảnh: Thùy Linh)</p></td></tr></tbody></table><p style=\"margin-bottom: 18px; line-height: 2.6rem; color: rgb(34, 34, 34); font-family: Roboto, Helvetica, Arial, sans-serif; background-color: rgb(250, 250, 250); font-size: 1.6rem !important;\">Nếu giai đoạn đầu năm 2020 bùng phát đợt dịch đầu tiên thì bố mẹ được làm tại nhà, trẻ con được tạm dừng đến trường. Khi đó bố mẹ có thể kèm con học nhưng thời gian ở nhà lâu khiến mâu thuẫn gia đình tăng cao.</p>', '2021-11-16 18:28:09', '2021-11-16 18:34:11', 2, 1000, '../images/blog/1.jpg'),
(2, 'Doanh nghiệp logistics và cuộc đua chinh phục khách hàng dịp cuối năm', 'doanh-nghiep-logistics-va-cuoc-dua-chinh-phuc-khach-hang-dip-cuoi-nam', 1, 'Theo ghi nhận, số lượng đơn hàng được vận chuyển bởi J&T Express trong dịp sale ngày 11/11 trên các sàn TMĐT cao hơn so với cùng kỳ năm ngoái, đặc biệt không chỉ ở các thành phố lớn như TP HCM, Hà Nội mà lượng đơn hàng cũng có sự tăng trưởng ở các tỉnh thành và khu vực khác.\r\n\r\nDự kiến khi nhiều địa phương dần thực hiện các chính sách nới lỏng việc di chuyển, giao hàng trong giai đoạn \"bình thường mới\", số lượng đơn hàng sẽ tiếp tục tăng vọt khi các sàn TMĐT tung ra các chương trình khuyến mãi cho mùa lễ hội cuối năm, như ngày Black Friday vào 26/11 sắp tới đây.\r\n\r\nGóp phần không nhỏ vào sự phát triển của TMĐT chính là hệ thống logistics. Các doanh nghiệp logistics cũng không ngừng nâng cao năng lực để có thể đáp ứng được yêu cầu về sự phát triển của TMĐT Việt Nam.\r\n\r\nTiêu biểu có thể kể đến J&T Express với những nỗ lực trong việc triển khai các chương trình khuyến mãi hấp dẫn hỗ trợ đối tác và người dùng. Như chương trình \"Red Tuesday\" hoàn tiền và giảm trừ cước phí gửi hàng cho các đối tác sử dụng dịch vụ, mở rộng dịch vụ đặc thù và tăng cường vận hành đảm bảo hiệu quả, an toàn.\r\n\r\nDịch vụ giao nhận cũng được xem là nhân tố quan trọng quyết định lợi thế trong cuộc đua của các doanh nghiệp trên sàn TMĐT trong việc tạo ra trải nghiệm tốt nhất cho người tiêu dùng. Vì vậy, để TMĐT Việt Nam có thể phục hồi sau đại dịch và tiếp tục phát triển bền vững trong tương lai, việc đầu tư và phát triển cả về lượng và chất trong năng lực của các đơn vị logistics rất cần được chú trọng.', '2021-11-16 15:29:43', '2021-11-16 15:29:43', 1, 423432, '../images/blog/2.jpg'),
(4, 'Doanh nghiệp logistics và cuộc đua chinh phục khách hàng dịp cuối năm', 'doanh-nghiep-logistics-va-cuoc-dua-chinh-phuc-khach-hang-dip-cuoi-nam', 1, 'Theo ghi nhận, số lượng đơn hàng được vận chuyển bởi J&T Express trong dịp sale ngày 11/11 trên các sàn TMĐT cao hơn so với cùng kỳ năm ngoái, đặc biệt không chỉ ở các thành phố lớn như TP HCM, Hà Nội mà lượng đơn hàng cũng có sự tăng trưởng ở các tỉnh thành và khu vực khác.\r\n\r\nDự kiến khi nhiều địa phương dần thực hiện các chính sách nới lỏng việc di chuyển, giao hàng trong giai đoạn \"bình thường mới\", số lượng đơn hàng sẽ tiếp tục tăng vọt khi các sàn TMĐT tung ra các chương trình khuyến mãi cho mùa lễ hội cuối năm, như ngày Black Friday vào 26/11 sắp tới đây.\r\n\r\nGóp phần không nhỏ vào sự phát triển của TMĐT chính là hệ thống logistics. Các doanh nghiệp logistics cũng không ngừng nâng cao năng lực để có thể đáp ứng được yêu cầu về sự phát triển của TMĐT Việt Nam.\r\n\r\nTiêu biểu có thể kể đến J&T Express với những nỗ lực trong việc triển khai các chương trình khuyến mãi hấp dẫn hỗ trợ đối tác và người dùng. Như chương trình \"Red Tuesday\" hoàn tiền và giảm trừ cước phí gửi hàng cho các đối tác sử dụng dịch vụ, mở rộng dịch vụ đặc thù và tăng cường vận hành đảm bảo hiệu quả, an toàn.\r\n\r\nDịch vụ giao nhận cũng được xem là nhân tố quan trọng quyết định lợi thế trong cuộc đua của các doanh nghiệp trên sàn TMĐT trong việc tạo ra trải nghiệm tốt nhất cho người tiêu dùng. Vì vậy, để TMĐT Việt Nam có thể phục hồi sau đại dịch và tiếp tục phát triển bền vững trong tương lai, việc đầu tư và phát triển cả về lượng và chất trong năng lực của các đơn vị logistics rất cần được chú trọng.', '2021-11-16 15:29:43', '2021-11-16 15:29:43', 1, 423432, '../images/blog/3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT 0,
  `view` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `sold` int(11) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `product_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `user_id`, `title`, `slug`, `description`, `price`, `discount`, `view`, `quantity`, `sold`, `deleted`, `created_at`, `updated_at`, `product_code`) VALUES
(1, 1, 'Quần jean nam xanh trắng chất bò co giãn 4 chiều', 'quan-jean-nam-xanh-trang-chat-bo-co-gian-4-chieu1653466388', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size 31:&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chiều cao:&amp;nbsp;1m84&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng:&amp;nbsp;71kg&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng:&amp;nbsp;95-76-96cm&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 450000, 10, 103201, 991, 91, 1, '2021-11-14 14:58:51', '2021-11-17 16:00:42', 23525431),
(2, 1, 'ÁO THUN NAM CỔ TRÒN MS', 'ao-dep', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Áo thun nam cổ tròn, tay ngắn. Trang trí hình và chữ sinh động mặt trước. Dáng áo suông cơ bản.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chất liệu thun cao cấp cùng thiết kế bắt mắt, mang đến cho bạn nam sự trẻ trung, năng động nhưng cũng không kém phần hiện đại. Bên cạnh đó, sản phẩm với gam màu trung tính, giúp bạn nam dễ phối cùng các phụ kiện khác làm tăng thêm sự sành điệu trong phong cách thời trang của mình.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Rêu Khói -&amp;nbsp;Bạc Hà&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size L:&lt;/strong&gt;&lt;/p&gt;&lt;ul style=&quot;border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 12px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);&quot;&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chiều cao:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;1m86&lt;/li&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;75kg&lt;/li&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng&lt;/strong&gt;&lt;/span&gt;: 100-82-98 cm&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Áo&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cổ áo&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Cổ tròn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Tay áo&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Tay ngắn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Khác&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Dài thường&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Thun&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 300000, 15, 12432, 10, 5, 0, '2021-11-14 14:58:51', '2021-11-17 16:02:44', 5235243),
(3, 1, 'CHÂN VÁY BÚT CHÌ KẺ', 'chan-vay-but-chi-ke1101322659', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chân váy bút chì dáng ôm body. Xẻ gấu 1 bên mặt trước. Hàng khuy đính tạo điểm nhấn. Cài khóa kéo ẩn phía sau. Có thể mix cùng áo croptop 2 dây đồng bộ.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Ảnh hưởng từ phong cách cổ điển, nhiều nhà mốt IVY moda mang tới mẫu đầm thanh lịch với tông màu đơn sắc&amp;nbsp;dễ sử dụng khi đi làm.&amp;nbsp;Vải tweed có khả năng giữ ấm cơ thể tốt, được biết tới là chất liệu dày dặn và độ chống thấm cao.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc: Kẻ Xanh Tím Than&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size M:&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chiều cao: 1m78&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng: 55kg&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng: 88-64-95cm&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Ladies&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Zuýp&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Bút chì&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua gối&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Tweed&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 790000, 10, 12432, 10, 5, 0, '2021-11-14 14:58:51', '2021-11-17 16:17:11', 52353253),
(4, 1, 'CHÂN VÁY ĐUÔI CÁ CỔ ĐIỂN', 'chan-vay-duoi-ca-co-dien40470189', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Zuýp/Chân váy đuôi cá 2 lớp. Với chiều dài ngang bắp có dây kéo khóa phía sau. Có thể mix cùng áo khoác MS 67M6899 đồng bộ - bộ đồ thời trang lại cổ điển.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Hóa công nương xinh đẹp, thanh lịch đang dạo bước trong cung điện của mình, nàng toát lên vẻ đẹp sang trọng đầy kiêu sa trong set đồ màu xanh hoàng gia, cổ điển.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size M:&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chiều cao: 1m78&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng: 55kg&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng: 88-64-95cm&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Ladies&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Zuýp&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Đuôi cá&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Ngang bắp&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Tuysi&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 170000, 10, 532523, 100, 10, 0, '2021-11-16 07:48:37', '2021-11-17 16:07:13', 235692),
(10, 1, 'CHÂN VÁY TWEED 2 LỚP DÁNG CHỮ A', 'chan-vay-tweed-2-lop-dang-chu-a1571528302', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Zuýp Tweed 2 lớp dáng chữ A, dài trên gối. Cài bằng khóa kéo ẩn sau lưng. Gấu kiểu viền tua rua. Đính 3 khuy ngọc mặt trước. Có thể mix cùng áo khoác đồng bộ MS&amp;nbsp;70B9012&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Vải tweed cổ điển luôn là hiện thân của nét thanh lịch kín đáo vô cùng kiêu sa cho phong cách dự tiệc của các nàng. Mix cùng áo vest&amp;nbsp;đồng bộ. Với thiết kế này, các nàng có thể diện thật thanh lịch trong các bữa tiệc quan trọng.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc: Họa tiết Gold&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size M:&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Chiều cao: 1m78&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng: 55kg&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng: 88-64-95cm&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;You&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Zuýp&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Chữ A&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trên gối&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Tweed&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 500000, 15, 2142321, 100, 80, 3, '2021-11-16 09:33:25', '2021-11-17 16:16:43', 348722),
(11, 1, 'QUẦN JEANS NAM SLIM FIT', 'quan-jeans-nam-slim-fit1155828923', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống đứng.&amp;nbsp;Gấu lật. Có 5 túi. Mặt trước mài sáng. Cài phía trước bằng khóa kéo và khuy. Dáng quần Slim fit là sản phẩm must-have trong tủ đồ của bạn vì tính ứng dụng rất cao.&amp;nbsp;Phù hợp với mọi tỉ lệ cơ thể cũng như biến hóa với gần như tất cả outfit của bạn.&amp;nbsp;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc: Xanh Lơ&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size 31:&lt;/strong&gt;&lt;/p&gt;&lt;ul style=&quot;border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 12px; line-height: inherit; font-family: Helvetica, Arial, sans-serif; vertical-align: baseline; color: rgb(51, 51, 51);&quot;&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chiều cao:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;1m86&lt;/li&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng:&lt;/strong&gt;&lt;/span&gt;&amp;nbsp;75kg&lt;/li&gt;&lt;li style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: baseline;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng&lt;/strong&gt;&lt;/span&gt;: 100-82-98 cm&lt;/li&gt;&lt;/ul&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 350000, 0, 124443, 190, 20, 0, '2021-11-17 16:26:10', '2021-11-17 16:26:10', 234432),
(12, 1, 'QUẦN JEANS ĐEN DÁNG SLIM FIT', 'quan-jeans-den-dang-slim-fit1887651568', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần bò cạp sử dụng khóa và khuy kim loại. Có 5 túi. Ống quần đứng.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc: Đen&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Mẫu mặc size 31:&lt;/strong&gt;&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chiều cao:&lt;/strong&gt;&amp;nbsp;1m85&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Cân nặng:&amp;nbsp;&lt;/strong&gt;75kg&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;strong style=&quot;margin: 0px; padding: 0px;&quot;&gt;Số đo 3 vòng:&amp;nbsp;&lt;/strong&gt;100-78-95 cm&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 450000, 0, 1000, 100, 0, 0, '2021-11-17 16:28:12', '2021-11-17 16:28:12', 54353),
(13, 1, 'QUẦN BÒ REGULAR FIT', 'quan-bo-regular-fit7560949', '&lt;p&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Regular fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Ngang mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 500000, 0, 34442, 100, 5, 0, '2021-11-17 16:30:03', '2021-11-17 16:30:03', 45235),
(14, 1, 'QUẦN BÒ SLIM FIT', 'quan-bo-slim-fit1297231992', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dáng lửng cắt cúp. Kiểu bạc màu, tạo sóng phía trước. Mài sáng phía trước.&amp;nbsp;Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 300000, 0, 1233, 100, 1, 0, '2021-11-17 16:31:44', '2021-11-17 16:34:28', 242314),
(15, 1, 'QUẦN BÒ SLIM', 'quan-bo-slim1557846669', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 140000, 0, 23423, 100, 0, 0, '2021-11-17 16:32:50', '2021-11-17 16:32:50', 52353),
(16, 1, 'Quần jean ống rộng nữ', 'quan-jean-ong-rong-nu1510309928', '&lt;p&gt;&lt;span style=&quot;color: rgb(241, 243, 244); font-family: Roboto, Arial, sans-serif; font-size: 12px; letter-spacing: 0.3px; background-color: rgb(20, 21, 24);&quot;&gt;&lt;b&gt;Form: Ống rộng, co giãn nhẹ, giặt không ra màu, chất vải rất dày, bao giá toàn thị trường, quần cao cấp, không như quần giá rẻ nhé!!!!!, tiền nào của ...&lt;/b&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 220000, 0, 32454, 100, 0, 0, '2021-11-17 16:36:50', '2021-11-17 16:36:50', 437653),
(17, 1, 'quần jean namđẹp quần bỏ lỡ', 'quan-jean-nu-dep-quan-bo-lo1812814489', '&lt;p&gt;&lt;span style=&quot;color: rgb(241, 243, 244); font-family: Roboto, Arial, sans-serif; font-size: 12px; letter-spacing: 0.3px; background-color: rgb(20, 21, 24);&quot;&gt;Buy quần jean nữ đẹp, quần bò lỡ online at Lazada Vietnam. Discount prices and promotional sale on all Women Clothing. Free Shipping.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 300000, 0, 34982, 100, 0, 0, '2021-11-17 16:40:59', '2021-11-17 17:20:23', 432432),
(18, 1, 'quần ống rộng nam c23', 'quan-ong-rong-nam-c231439076370', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 220000, 0, 43534, 100, 0, 0, '2021-11-17 16:44:10', '2021-11-17 16:44:10', 25832),
(19, 1, 'Quần bò đen nam ống rộng', 'quan-bo-den-nam-ong-rong27693407', '&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;margin: 0px; padding: 0px; background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;&lt;b style=&quot;margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/b&gt;&lt;/td&gt;&lt;td style=&quot;margin: 0px; padding-bottom: 5px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 340000, 0, 124324, 100, 100, 0, '2021-11-17 16:45:50', '2021-11-17 16:45:50', 523243);
INSERT INTO `product` (`id`, `user_id`, `title`, `slug`, `description`, `price`, `discount`, `view`, `quantity`, `sold`, `deleted`, `created_at`, `updated_at`, `product_code`) VALUES
(20, 1, 'quần bò nam siêu ngầu trắng', 'quan-bo-nam-sieu-ngau-trang391138433', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 300000, 0, 3222, 100, 100, 0, '2021-11-17 16:47:43', '2021-11-17 16:47:43', 238475),
(21, 1, 'Quần bò sơn tùng mtp', 'quan-bo-son-tung-mtp1655319717', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 1000000, 12, 100120, 100, 15, 0, '2021-11-17 16:49:02', '2021-11-17 16:49:02', 23853),
(22, 1, 'Quần bò nữ MECDOI', 'quan-bo-nu-mecdoi1690646180', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 340000, 10, 1023, 100, 1, 0, '2021-11-17 17:08:04', '2021-11-17 17:08:33', 23462),
(23, 1, 'quần bagge nữ đẹp', 'quan-bagge-nu-dep493628606', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 220000, 0, 83257, 1000, 10, 0, '2021-11-17 17:09:22', '2021-11-17 17:09:22', 27356),
(24, 1, 'Quần nữ xám bagge chất liệu nhung', 'quan-nu-xam-bagge-chat-lieu-nhung615989610', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 400000, 5, 10123, 100, 1, 0, '2021-11-17 17:10:16', '2021-11-17 17:10:16', 3295674),
(25, 1, 'Váy nữ trắng kiểu công chúa', 'vay-nu-trang-kieu-cong-chua2116039932', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 300000, 0, 129474, 100, 0, 0, '2021-11-17 17:10:59', '2021-11-17 17:10:59', 23763),
(26, 1, 'Váy nữ đen huyền bí', 'vay-nu-den-huyen-bi151007091', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 200000, 0, 2354, 100, 0, 0, '2021-11-17 17:12:40', '2021-11-17 17:14:27', 237564),
(27, 1, 'Đầm nữ điệu đà', 'dam-nu-dieu-da707005400', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 120000, 0, 21442, 200, 80, 0, '2021-11-17 17:13:24', '2021-11-17 17:13:24', 3279596),
(28, 1, 'Quần nữ cá tính', 'quan-nu-ca-tinh1022982216', '&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;h4 style=&quot;color: rgb(51, 51, 51);&quot;&gt;Chi tiết sản phẩm&lt;/h4&gt;&lt;p&gt;&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 400000, 2, 14324, 100, 2, 0, '2021-11-17 17:14:10', '2021-11-17 17:14:10', 32554),
(29, 1, 'Quần ống xuông nữ 283', 'quan-ong-xuong-nu-283200703040', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 100000, 0, 35297, 200, 139, 0, '2021-11-17 17:15:22', '2021-11-17 17:15:22', 54253),
(30, 1, 'Quần nữ siêu cá tính', 'quan-nu-sieu-ca-tinh1123140155', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 340000, 10, 124234, 100, 10, 0, '2021-11-17 17:15:59', '2021-11-17 17:15:59', 53243),
(31, 1, 'Váy trẻ em', 'vay-tre-em991710681', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 120000, 12, 12423, 100, 1, 0, '2021-11-18 05:27:57', '2021-11-18 05:27:57', 32534),
(32, 1, 'Áo len sọc trẻ em', 'ao-len-soc-tre-em576678596', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 230000, 0, 53453, 100, 100, 0, '2021-11-18 05:28:39', '2021-11-18 18:04:22', 252344);
INSERT INTO `product` (`id`, `user_id`, `title`, `slug`, `description`, `price`, `discount`, `view`, `quantity`, `sold`, `deleted`, `created_at`, `updated_at`, `product_code`) VALUES
(33, 1, 'Áo bò trẻ em', 'ao-bo-tre-em1217881693', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 200000, 10, 432565, 100, 0, 0, '2021-11-18 05:29:19', '2021-11-18 05:29:19', 56324),
(34, 1, 'Áo trẻ em HUCX màu nhẹ đẹp', 'ao-tre-em-hucx-mau-nhe-dep2082686915', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 300000, 10, 342352, 100, 100, 0, '2021-11-18 05:30:04', '2021-11-18 18:04:52', 46345),
(35, 1, 'Áo thun trẻ em kẻ sọc trắng đỏ', 'ao-thun-tre-em-ke-soc-trang-do778823057', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 120000, 5, 1423413, 100, 100, 3, '2021-11-18 05:30:49', '2021-11-22 18:03:59', 53454),
(36, 1, 'Váy cô dâu trẻ em siêu dễ thương', 'vay-co-dau-tre-em-sieu-de-thuong342481148', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 1000000, 20, 124342, 10, 10, 0, '2021-11-18 05:31:47', '2021-11-18 18:04:44', 4235),
(37, 1, 'Quần bò trẻ em kiểu cổ điển', 'quan-bo-tre-em-kieu-co-dien347358818', '&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Quần jeans ống suông, dài&amp;nbsp;qua mắt cá chân. Kiểu bạc màu. Gấu lật. Có 5 túi. Cài phía trước bằng khóa kéo và khuy.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;- Thành phần chủ yếu cotton: Mềm mại, an toàn cho da nhạy cảm nhất&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Không sử dụng các chất làm màu, hóa chất độc. Khi mua jeans, khách hàng được tặng gói hút ẩm để bảo quản sp tối ưu&lt;br style=&quot;margin: 0px; padding: 0px;&quot;&gt;-&amp;nbsp;Có độ bền cao, hạn chế phai, bạc màu: Khóa YKK, cúc được sản xuất riêng. Quá trình giặt cầm màu cho màu bền hơn.&lt;/p&gt;&lt;p style=&quot;font-family: Helvetica, Arial, sans-serif; color: rgb(51, 51, 51); font-size: 12px; padding: 0px;&quot;&gt;Màu sắc:&amp;nbsp;Xanh Lơ&lt;/p&gt;&lt;p&gt;&lt;br style=&quot;margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;/p&gt;&lt;table class=&quot;&quot; width=&quot;70%&quot; style=&quot;background-color: rgb(255, 255, 255); color: rgb(51, 51, 51); margin: 0px; padding: 0px; font-family: Helvetica, Arial, sans-serif; font-size: 12px;&quot;&gt;&lt;tbody style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Dòng sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Men&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Nhóm sản phẩm&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Quần&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Kiểu dáng&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Slim fit&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Độ dài&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Qua mắt cá chân&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Họa tiết&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Trơn&lt;/td&gt;&lt;/tr&gt;&lt;tr style=&quot;margin: 0px; padding: 0px;&quot;&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;&lt;span style=&quot;font-weight: 700; margin: 0px; padding: 0px;&quot;&gt;Chất liệu&lt;/span&gt;&lt;/td&gt;&lt;td style=&quot;padding-bottom: 5px; margin: 0px;&quot;&gt;Denim&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;', 200000, 10, 21423, 100, 0, 0, '2021-11-18 05:32:33', '2021-11-18 05:32:33', 543224);

-- --------------------------------------------------------

--
-- Structure de la table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product_category`
--

INSERT INTO `product_category` (`id`, `product_id`, `category_id`, `created_at`) VALUES
(98, 1, 1, NULL),
(99, 1, 2, NULL),
(101, 2, 1, NULL),
(106, 4, 2, NULL),
(107, 4, 6, NULL),
(112, 10, 2, NULL),
(113, 10, 6, NULL),
(114, 3, 2, NULL),
(115, 3, 6, NULL),
(116, 11, 1, NULL),
(117, 11, 4, NULL),
(118, 12, 1, NULL),
(119, 12, 4, NULL),
(120, 12, 5, NULL),
(121, 13, 1, NULL),
(122, 13, 4, NULL),
(123, 13, 5, NULL),
(126, 15, 1, NULL),
(127, 15, 4, NULL),
(130, 14, 1, NULL),
(131, 14, 5, NULL),
(132, 16, 2, NULL),
(135, 18, 1, NULL),
(136, 18, 4, NULL),
(137, 19, 1, NULL),
(138, 19, 4, NULL),
(139, 20, 1, NULL),
(140, 20, 4, NULL),
(141, 21, 1, NULL),
(142, 21, 4, NULL),
(144, 22, 2, NULL),
(145, 22, 35, NULL),
(146, 23, 2, NULL),
(147, 23, 35, NULL),
(148, 24, 2, NULL),
(149, 24, 35, NULL),
(150, 25, 2, NULL),
(151, 25, 6, NULL),
(154, 27, 2, NULL),
(155, 27, 6, NULL),
(156, 28, 2, NULL),
(157, 28, 35, NULL),
(158, 26, 2, NULL),
(159, 26, 6, NULL),
(160, 29, 2, NULL),
(161, 29, 35, NULL),
(162, 30, 2, NULL),
(163, 30, 35, NULL),
(164, 17, 1, NULL),
(165, 17, 4, NULL),
(166, 31, 36, NULL),
(168, 33, 36, NULL),
(172, 37, 36, NULL),
(173, 32, 36, NULL),
(174, 36, 36, NULL),
(175, 34, 36, NULL),
(177, 35, 36, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reset_pass`
--

CREATE TABLE `reset_pass` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `number_check` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Người dùng'),
(3, 'Khách');

-- --------------------------------------------------------

--
-- Structure de la table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sizename` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `size`
--

INSERT INTO `size` (`id`, `product_id`, `sizename`, `created_at`) VALUES
(301, 1, '3', NULL),
(302, 1, '5', NULL),
(305, 2, '2', NULL),
(306, 2, '3', NULL),
(312, 4, '1', NULL),
(313, 4, '2', NULL),
(316, 10, '5', NULL),
(317, 3, '1', NULL),
(318, 3, '2', NULL),
(319, 3, '3', NULL),
(320, 11, '1', NULL),
(321, 11, '2', NULL),
(322, 11, '3', NULL),
(323, 12, '1', NULL),
(324, 12, '2', NULL),
(325, 13, '1', NULL),
(326, 13, '2', NULL),
(327, 13, '3', NULL),
(331, 15, '2', NULL),
(332, 15, '4', NULL),
(335, 14, '1', NULL),
(336, 14, '5', NULL),
(337, 16, '2', NULL),
(338, 16, '3', NULL),
(341, 18, '2', NULL),
(342, 18, '3', NULL),
(343, 19, '2', NULL),
(344, 19, '4', NULL),
(345, 20, '1', NULL),
(346, 20, '2', NULL),
(347, 21, '3', NULL),
(348, 21, '4', NULL),
(352, 22, '1', NULL),
(353, 22, '2', NULL),
(354, 22, '3', NULL),
(355, 23, '3', NULL),
(356, 24, '3', NULL),
(357, 24, '5', NULL),
(358, 25, '3', NULL),
(359, 25, '4', NULL),
(362, 27, '2', NULL),
(363, 27, '3', NULL),
(364, 27, '4', NULL),
(365, 28, '2', NULL),
(366, 28, '4', NULL),
(367, 28, '5', NULL),
(368, 26, '1', NULL),
(369, 29, '3', NULL),
(370, 29, '4', NULL),
(371, 29, '5', NULL),
(372, 30, '2', NULL),
(373, 30, '3', NULL),
(374, 17, '2', NULL),
(375, 17, '3', NULL),
(376, 31, '2', NULL),
(378, 33, '3', NULL),
(379, 33, '4', NULL),
(386, 37, '1', NULL),
(387, 37, '2', NULL),
(388, 32, '1', NULL),
(389, 36, '1', NULL),
(390, 34, '3', NULL),
(391, 34, '5', NULL),
(394, 35, '1', NULL),
(395, 35, '2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `token`
--

CREATE TABLE `token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `token`
--

INSERT INTO `token` (`id`, `user_id`, `token`, `created_at`) VALUES
(14, 1, '3aaccfa8f8a3de12b66f684a314adfac', '2021-11-13 19:15:45'),
(15, 1, '4418d09d81c574e1a59b9e12060a98d6', '2021-11-13 19:17:57'),
(18, 1, '6c34ffa64e3c98568ed31d61169ebf4c', '2021-11-14 05:35:58'),
(20, 1, '30be6edb5c08288cefc62897a4e6e675', '2021-11-14 05:37:33'),
(21, 1, 'e6c877ee83be69ac5835f7fca349c00c', '2021-11-15 12:33:32'),
(22, 1, 'dcaaaf3bbf84a2337044b826e256e3f4', '2021-11-15 17:20:47'),
(23, 1, '77746f6249655be361f269db972b5255', '2021-11-15 17:58:50'),
(24, 1, '79d5bd23f3a7e0817766c2f1d0c853b6', '2021-11-16 09:10:53'),
(25, 1, '4f9cd20850b9785c05f98d4a7c52fa66', '2021-11-16 09:11:29'),
(26, 1, '0cf0daf41541263a012657e5cec36b59', '2021-11-17 08:23:13'),
(27, 1, '9c1a36f0ec6d1d48c26fce179b69e290', '2021-11-18 10:16:28'),
(28, 1, '6e999c7425696c7b34b6afbe1522db8d', '2021-11-19 09:59:16'),
(29, 1, '11e75d6334e1b792609c3c3323c624b4', '2021-11-19 13:51:32'),
(30, 1, '6723d7cc973807bdea232134d0652468', '2021-11-19 14:31:02'),
(31, 1, 'e1237af3ce23359b180e3d4744ad8ad5', '2021-11-19 14:55:05'),
(32, 1, 'ef0d3c770742f32f51ac896d64a87669', '2021-11-19 14:55:12'),
(33, 1, '6922059500ad666328849d12645a66f2', '2021-11-19 15:25:07'),
(34, 1, 'b1ea750015e49961b3af7fc2f52d3cc7', '2021-11-19 17:49:47'),
(35, 1, '9550af29c464bf322a2f4cff39262fa7', '2021-11-19 18:46:11'),
(36, 14, 'ad5c833baff6664c965efafe2142a512', '2021-11-20 07:02:39'),
(37, 26, '362bfbb0c56d44faa2ada894c6ee3436', '2021-11-20 07:43:10'),
(38, 26, '3dc9781b66630eeb148585108816a96f', '2021-11-20 07:54:41'),
(39, 1, '51dcf4da70a06f2fe213a2e459787b24', '2021-11-20 07:55:34'),
(40, 1, '0f124f0f90955529f2f4519da32922cb', '2021-11-20 07:57:09'),
(41, 26, 'cbc1821c89d841d4aebe047bbc9f6ed8', '2021-11-20 07:59:13'),
(42, 1, '26101169858280f4974a0ca03ef7fe79', '2021-11-20 08:04:10'),
(43, 1, 'f89786598dc1cbc77100c0607af2e42a', '2021-11-20 08:05:59'),
(44, 26, '6c6bac2b5b072a6d5cd4d06e1e31c2e8', '2021-11-20 08:07:26'),
(45, 1, '9b2f94b719d582996a9065d6e8fe7740', '2021-11-20 08:11:57'),
(46, 1, '5c28e14fa0a47d5cc75647ee920aae9e', '2021-11-20 08:12:33'),
(47, 1, 'c9a9f83df10e4df7ddbe317e7d385039', '2021-11-20 08:14:31'),
(48, 26, '1c2b9b5904fa674537b1ada2211c98d2', '2021-11-20 08:14:56'),
(49, 26, 'd1fd7281c35b97d2fd01ba00401e4986', '2021-11-20 08:18:23'),
(50, 1, 'be7bc3248b7920ff65d204f4759f6691', '2021-11-20 08:23:35'),
(51, 1, 'b2bddbfb9c6d2c94ac6cc12f48a0b7ad', '2021-11-20 08:24:34'),
(52, 1, '2b1bbf1fb804d31a6ffdc263a7e2d9f7', '2021-11-20 08:24:39'),
(53, 1, '80eecb37897602c0ba4ae7cf074390ad', '2021-11-20 08:30:53'),
(54, 26, '3bf0c5088e85095563974b96cc435bf7', '2021-11-20 08:31:07'),
(55, 1, '185a523de8ba553251a8e48809d457b0', '2021-11-20 08:31:19'),
(56, 26, 'f6856bf5768d9d120e276a140dca3b74', '2021-11-22 06:58:26'),
(57, 26, '530fedb7864fa71ce6ee871b84c666cc', '2021-11-22 07:05:52'),
(58, 26, 'cfd86deb66944b9adcee98244c53ad95', '2021-11-22 07:06:27'),
(59, 26, 'ead1d9fdd5fdf7489d58a2d5872e33f7', '2021-11-22 07:29:02'),
(60, 1, 'c459b7f6341922b0a74d54c4921c334c', '2021-11-22 17:26:03'),
(61, 1, '47d489b3d8ad0d02c5a3a078c10e25e8', '2021-11-22 17:59:56'),
(62, 1, 'b9c580b9a1c47d49e2b23e1d159881b4', '2021-11-22 18:02:29'),
(63, 26, '1c2a6a75aa0433d8349f357db8ea3c70', '2021-11-23 17:13:22'),
(64, 1, '633ce7124766f49551d703e6eef88bdd', '2021-11-24 07:19:20'),
(65, 26, '624a89a414889e43e1ee2dd2ba06ba7d', '2021-11-24 18:24:59'),
(66, 1, 'c63599731ea148355b1b62ce26730aa5', '2021-11-26 06:08:08');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `story` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `role_id`, `username`, `fullname`, `email`, `phonenumber`, `address`, `password`, `thumbnail`, `birthday`, `story`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'truongbo', 'Nguyễn Quang Trường', 'truongisgay5@gmail.com', '0368869690', 'Vĩnh Tuy,Hai Bà Trưng,Hà Nội', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/201964377_1225942097847383_3361996911028059582_n.jpg', '2001-10-17', 'tao la con cho :)) haha', 3, '2021-11-12 17:37:40', '2021-11-22 18:01:38'),
(2, 2, 'tranthihoahoa', 'Trần Thị Thoa Hoa', 'tranthihoa@gmail.com', '0352465454', 'Thái Thụy,Tiền Hải,Thái Bình', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/240770891_111779131239363_8455883811852187416_n.png', '2003-11-23', 'hoa vui tính hay cười', 0, '2021-11-12 17:37:40', '2021-11-14 06:47:51'),
(3, 2, 'nguyennam1', 'Nguyễn Văn Nam', 'namnguyen@gmail.com', '039432324', 'Hải Hậu,Nam Định', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/178109456_297612915448704_4829542306506049385_n.jpg', '2003-11-10', 'nam đẹp trai lớp 6a2', 1, '2021-11-12 17:37:40', '2021-11-14 07:03:39'),
(5, 2, 'phantrung123', 'Phan Tấn Trung', 'phantrung1992@gmail.com', '', '', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/119903441_384761746249949_5522586022961146909_n.jpg', '0000-00-00', '', 1, NULL, '2021-11-13 11:01:55'),
(6, 2, 'hoangnguyen', 'Hoàng Trung Nguyên', 'hoangtrungnguyen@gmail.com', '', '', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/247018788_3056967394625033_2205184100778480648_n.jpg', '0000-00-00', '', 0, NULL, '2021-11-16 06:15:13'),
(7, 2, 'phantrung1992', 'Trương Đình Tạ A', 'admin@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, NULL),
(8, 2, 'xuandoanlonton', 'Xuân Đoàn', 'xuandoan@gmail.com', '', '', '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', '2021-11-18', 'học giỏi', 0, NULL, '2021-11-18 17:02:59'),
(9, 2, 'doanhyduc', 'Đoàn Huỳnh Đức', 'duc@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, NULL),
(10, 2, 'anhtuan', 'Hoàng Anh Tuấn', 'anhtuan@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 1, NULL, NULL),
(11, 2, '19120169', 'test', 'test@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, '2021-11-14 07:00:44'),
(14, 2, 'vanquyen', 'Trăn Văn Quyền', 'vanquyen1105@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, NULL),
(22, 2, 'trantienfefefw', 'tran tien', 'conmeo@gmail.com', '', '', '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/193013194_504655810979128_6663279863135660571_n.jpg', '0000-00-00', '', 1, NULL, '2021-11-14 10:47:41'),
(23, 2, 'hoang', 'hoang', 'hoangtrungnguyen1@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, NULL),
(24, 2, 'hoanghoang', 'hoanghoang', 'hoangtrungnguyen@gmail.comhoang', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 0, NULL, NULL),
(25, 2, 'fefefw', 'fefefw', 'truongdinhta@gmail.comfefefw', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'https://1.bp.blogspot.com/-AQGEieyPelA/YGLZYXmgm5I/AAAAAAAArCs/PbWWA1iXJv81kEaImML8MpvsioaEvuNgQCNcBGAsYHQ/s0/28a2a1a063787990401e660943419d41.jpeg', NULL, NULL, 1, NULL, '2021-11-14 10:47:22'),
(26, 2, 'taolaconmeo', 'truong', 'afktruongngu@gmail.com', NULL, NULL, '24333dcb1d80a14dd663e32a9883c276', 'images/avatar/240770891_111779131239363_8455883811852187416_n.png', NULL, NULL, 0, '2021-11-20 07:42:07', '2021-11-22 18:03:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_group` (`user_id`);

--
-- Index pour la table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Index pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `galery_product`
--
ALTER TABLE `galery_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `reset_pass`
--
ALTER TABLE `reset_pass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `galery_product`
--
ALTER TABLE `galery_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT pour la table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT pour la table `reset_pass`
--
ALTER TABLE `reset_pass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT pour la table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `fk_group` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `comment_ibfk_3` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Contraintes pour la table `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `galery_product`
--
ALTER TABLE `galery_product`
  ADD CONSTRAINT `galery_product_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category_post` (`id`);

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Contraintes pour la table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Contraintes pour la table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `token_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
