-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopthoitrang2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `pty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `customer_id`, `product_id`, `pty`, `price`, `created_at`, `updated_at`) VALUES
(2, 4, 1, 1, 1, 500000, '2024-12-08 17:32:33', NULL),
(3, 4, 1, 1, 1, 500000, '2024-12-09 04:20:05', NULL),
(4, 4, 2, 18, 1, 174000, NULL, NULL),
(5, 4, 2, 19, 1, 100000, NULL, NULL),
(6, 7, 3, 14, 1, 275998, NULL, NULL),
(7, 7, 4, 16, 2, 228999, NULL, NULL),
(8, 7, 5, 17, 1, 215998, NULL, NULL),
(9, 7, 6, 8, 1, 179997, NULL, NULL),
(10, 7, 7, 8, 1, 179997, '2024-12-12 03:57:22', '2024-12-12 03:57:22'),
(11, 7, 9, 19, 1, 100000, '2024-12-12 04:25:31', '2024-12-12 04:25:31'),
(12, 7, 12, 19, 19, 100000, '2024-12-12 04:29:56', '2024-12-12 04:29:56'),
(13, 7, 13, 38, 1, 188998, '2024-12-13 00:42:39', '2024-12-13 00:42:39'),
(14, 7, 14, 40, 1, 67000, '2024-12-13 01:43:33', '2024-12-13 01:43:33'),
(15, 7, 15, 34, 1, 64000, '2024-12-13 02:23:01', '2024-12-13 02:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `email`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Thanh Thảo ', '1234567890', 'aaaaa', 'admin@gmail.com', 'hi', NULL, NULL),
(2, 'Nguyen Van A', '012345678', 'Đà Nẵng', 'nganphan1514@gmail.com', 'Nhớ giao', '2024-12-10 13:54:01', '2024-12-10 13:54:01'),
(3, 'test', '1234567890', 'daklak', 'test@gmail.com', 'good', '2024-12-12 03:14:32', '2024-12-12 03:14:32'),
(4, 'demo', '1234567890', 'Đà Nẵng', 'demo@gmail.com', 'dbshbf', '2024-12-12 03:47:47', '2024-12-12 03:47:47'),
(5, 'duy', '0398389726', 'Đà Nẵng', 'thao@gmail.com', 'qưe3r4t5yrtjy', '2024-12-12 03:50:43', '2024-12-12 03:50:43'),
(6, 'duy', '1234567890', 'daklak', 'thao@gmail.com', '123454wun u', '2024-12-12 03:55:07', '2024-12-12 03:55:07'),
(7, 'Thanh Thảo', '1234567890', 'daklak', 'thao@gmail.com', 'kjbukyg', '2024-12-12 03:57:22', '2024-12-12 03:57:22'),
(9, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'ok', '2024-12-12 04:25:31', '2024-12-12 04:25:31'),
(12, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', NULL, '2024-12-12 04:29:56', '2024-12-12 04:29:56'),
(13, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 00:42:39', '2024-12-13 00:42:39'),
(14, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 01:43:33', '2024-12-13 01:43:33'),
(15, 'test2', '0123456789', 'Đà Nẵng', 'test2@gmail.com', 'giao nhanh', '2024-12-13 02:23:01', '2024-12-13 02:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `content` longtext NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `description`, `content`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bộ Sưu Tập Mùa Đông', 0, 'Bộ sưu tập mùa đông dành cho nam', '<p><strong>B</strong>ộ sưu tập m&ugrave;a đ&ocirc;ng <strong>d&agrave;nh cho nam </strong>năm nay mang đến sự kết hợp ho&agrave;n hảo giữa sự ấm &aacute;p v&agrave; phong c&aacute;ch hiện đại. Với c&aacute;c m&oacute;n đồ chủ đạo như &aacute;o kho&aacute;c d&agrave;y, &aacute;o len cao cổ, v&agrave; những chiếc quần d&agrave;i d&agrave;y dặn, bộ sưu tập n&agrave;y kh&ocirc;ng chỉ gi&uacute;p ph&aacute;i mạnh giữ ấm trong những ng&agrave;y lạnh gi&aacute; m&agrave; c&ograve;n t&ocirc;n l&ecirc;n vẻ lịch l&atilde;m, năng động. Chất liệu cao cấp như len, da, v&agrave; vải chống gi&oacute; đảm bảo mang lại sự thoải m&aacute;i v&agrave; bảo vệ tối ưu trước thời tiết khắc nghiệt. M&agrave;u sắc trung t&iacute;nh như đen, x&aacute;m, n&acirc;u v&agrave; xanh qu&quoin đội dễ d&agrave;ng phối hợp, tạo n&ecirc;n phong c&aacute;ch thời trang nam t&iacute;nh, mạnh mẽ m&agrave; vẫn đầy tinh tế.</p>', 1, '2024-11-13 19:10:12', '2024-11-13 19:10:12'),
(2, 'Hàng Chính Hãng', 0, 'Hàng Chính Hãng Dành Cho Nam và Nữ', '<p>Bộ sưu tập h&agrave;ng ch&iacute;nh h&atilde;ng cho nam v&agrave; nữ mang đến những sản phẩm chất lượng vượt trội với thiết kế tinh tế, thời thượng. D&agrave;nh cho những ai y&ecirc;u th&iacute;ch sự ho&agrave;n hảo, từng m&oacute;n đồ trong bộ sưu tập đều được chọn lọc kỹ lưỡng từ những thương hiệu uy t&iacute;n, đảm bảo chất lượng v&agrave; độ bền l&acirc;u d&agrave;i. C&aacute;c sản phẩm d&agrave;nh cho nam bao gồm những chiếc &aacute;o kho&aacute;c da, &aacute;o sơ mi lịch l&atilde;m, quần jeans tối giản nhưng đầy mạnh mẽ, ph&ugrave; hợp cho cả c&ocirc;ng việc lẫn những dịp đặc biệt. Trong khi đ&oacute;, bộ sưu tập nữ giới lại mang đến vẻ đẹp thanh lịch với c&aacute;c mẫu đầm, &aacute;o blouse mềm mại, c&ugrave;ng phụ kiện đi k&egrave;m t&ocirc;n l&ecirc;n n&eacute;t nữ t&iacute;nh v&agrave; sang trọng. Chắc chắn rằng, h&agrave;ng ch&iacute;nh h&atilde;ng sẽ l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai đề cao sự tinh tế v&agrave; chất lượng trong từng sản phẩm.</p>', 1, '2024-11-13 19:12:17', '2024-11-13 19:12:17'),
(3, 'Flash Sale ', 0, 'Săn sale ngay và luôn !', '<p>Flash Sale l&agrave; sự kiện mua sắm hấp dẫn với c&aacute;c sản phẩm chất lượng được giảm gi&aacute; mạnh trong một khoảng thời gian ngắn, tạo cơ hội tuyệt vời để sở hữu những m&oacute;n đồ y&ecirc;u th&iacute;ch với mức gi&aacute; ưu đ&atilde;i. Những đợt Flash Sale thường c&oacute; số lượng sản phẩm giới hạn, v&agrave; c&aacute;c chương tr&igrave;nh giảm gi&aacute; chỉ k&eacute;o d&agrave;i từ v&agrave;i giờ đến một v&agrave;i ng&agrave;y, khiến người mua kh&ocirc;ng thể bỏ lỡ cơ hội &quot;săn sale&quot; n&agrave;y. Được tổ chức v&agrave;o c&aacute;c dịp đặc biệt hoặc trong m&ugrave;a mua sắm, Flash Sale mang đến kh&ocirc;ng kh&iacute; mua sắm s&ocirc;i động, hấp dẫn v&agrave; l&agrave; cơ hội tuyệt vời để tiết kiệm chi ph&iacute; cho những sản phẩm chất lượng cao từ c&aacute;c thương hiệu nổi tiếng.</p>', 1, '2024-11-13 19:14:26', '2024-11-30 06:44:47'),
(4, 'test', 0, 'tesst', '<p>test</p>', 0, '2024-12-13 02:19:37', '2024-12-13 02:19:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2019_08_19_000000_create_failed_jobs_table', 1),
(15, '2021_05_26_121348_create_menus_table', 1),
(16, '2021_05_29_085033_create_products_table', 1),
(17, '2021_05_29_085458_update_table_product', 1),
(18, '2021_05_30_091352_create_sliders_table', 1),
(19, '2021_06_07_115343_create_customers_table', 1),
(20, '2021_06_07_115353_create_carts_table', 1),
(21, '2021_06_11_035047_create_jobs_table', 1),
(22, '2024_11_20_073539_create_user01_table', 1),
(23, '2024_11_28_051033_create_roles_table', 1),
(24, '2024_11_29_163832_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `quantity` int(100) NOT NULL,
  `content` longtext NOT NULL,
  `menu_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thumb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `content`, `menu_id`, `price`, `price_sale`, `active`, `created_at`, `updated_at`, `thumb`) VALUES
(1, 'Bộ nỉ nam thể thao DC', 'Bộ nỉ nam thể thao DC diof set quần áo nam thu đông, áo hoodie mũ 2 lớp, chất nỉ dầy dặn không xù', 0, '<p>Bộ nỉ nam thể thao DC diof set quần &aacute;o nam thu đ&ocirc;ng, &aacute;o hoodie mũ 2 lớp, chất nỉ dầy dặn kh&ocirc;ng x&ugrave;</p>', 1, 180500, NULL, 1, '2024-11-13 19:26:22', '2024-12-12 16:21:44', '/storage/uploads/2024/12/12/462585867_552053390767570_6012041273200139888_n.png'),
(2, 'Bộ Quần Áo Nỉ Nam UMA STORE', 'Bộ Quần Áo Nỉ Nam UMA STORE Phối Màu Basic, Chất Nỉ Da Cá Cao Cấp Siêu Đẹp Kiểu Dáng Thể Thao SPB22', 10, '<p>Bộ Quần &Aacute;o Nỉ Nam UMA STORE Phối M&agrave;u Basic, Chất Nỉ Da C&aacute; Cao Cấp Si&ecirc;u Đẹp Kiểu D&aacute;ng Thể Thao SPB22</p>', 1, 460000, 258000, 1, '2024-11-13 19:27:20', '2024-12-12 16:22:21', '/storage/uploads/2024/12/12/462561654_8739147662836472_3771301393207915661_n.png'),
(3, 'Bộ quần áochống nước chống gió cao cấp', 'Bộ quần áo chất vải gió 2 lớp chống nước chống gió cao cấp 2024 KJ Vua Quần Jeans', 10, '<p>Bộ quần &aacute;o chất vải gi&oacute; 2 lớp chống nước chống gi&oacute; cao cấp 2024 KJ Vua Quần Jeans</p>', 1, 300000, 209000, 1, '2024-11-13 19:28:19', '2024-12-12 16:21:27', '/storage/uploads/2024/12/12/product-detail-03.jpg'),
(4, 'Bộ Quần Áo Nam Pa Rít Đỏ', 'Bộ Quần Áo Nam Pa Rít Đỏ Thêu Logo Khóa Chuẩn Siêu Hót - Bộ Quần Áo Nam Pa Rít Thêu Siêu Đẹp', 10, '<p>Bộ Quần &Aacute;o Nam Pa R&iacute;t Đỏ Th&ecirc;u Logo Kh&oacute;a Chuẩn Si&ecirc;u H&oacute;t - Bộ Quần &Aacute;o Nam Pa R&iacute;t Th&ecirc;u Si&ecirc;u Đẹp</p>', 1, 390000, 319000, 1, '2024-11-13 19:29:15', '2024-12-12 16:21:11', '/storage/uploads/2024/12/12/462565000_1348511236557517_3830954426165221490_n.png'),
(5, 'Áo thun nam dài tay', 'Áo thun nam dài tay kiểu dáng Hàn Quốc vải nỉ cao cấp mềm mại co giãn KJ Vua Quần Jeans', 10, '<p>&Aacute;o thun nam d&agrave;i tay kiểu d&aacute;ng H&agrave;n Quốc vải nỉ cao cấp mềm mại co gi&atilde;n KJ Vua Quần Jeans</p>', 1, 249998, 154, 1, '2024-11-13 19:30:03', '2024-12-12 16:19:30', '/storage/uploads/2024/12/12/462566361_1113055487071063_8175671033992231798_n.png'),
(6, 'Quần áo nam quần tây nam kèm áo sơ mi tay', 'Combo quần áo nam quần tây nam kèm áo sơ mi tay dài cao cấp GEN ALPHA , set âu phục GEN145', 10, '<p>Combo quần &aacute;o nam quần t&acirc;y nam k&egrave;m &aacute;o sơ mi tay d&agrave;i cao cấp GEN ALPHA , set &acirc;u phục GEN145</p>', 1, 350000, 187000, 1, '2024-11-13 19:30:48', '2024-12-12 16:19:59', '/storage/uploads/2024/12/12/462558813_1573231739943314_9148598884067754727_n.png'),
(7, 'Hoodie Zip Nam Pariiisss', 'Bộ Quần Áo Hoodie Zip Nam Pariiisss Thêu Logo Siêu Đẹp - Bộ Quần Áo Nam Hoodie Pariiiss Khoá Logo Thêu Siêu Nét', 10, '<p>B&ocirc;̣ Qu&acirc;̀n Áo Hoodie Zip Nam Pariiisss Th&ecirc;u Logo Si&ecirc;u Đẹp - B&ocirc;̣ Qu&acirc;̀n Áo Nam Hoodie Pariiiss Khoá Logo Th&ecirc;u Si&ecirc;u Nét</p>', 1, 290000, 199000, 1, '2024-11-13 19:31:31', '2024-12-12 16:19:44', '/storage/uploads/2024/12/12/462570189_1229114442222275_6953810358076403270_n.png'),
(8, 'Bộ Nỉ Nam Paaa Ríttt Dệt Chữ Cổ Áo Siêu Chất', 'Bộ Nỉ Nam Paaa Ríttt Dệt Chữ Cổ Áo Siêu Chất - Bộ Quần Áo Nam Paarriss Thêu Logo Siêu Đẹp', 10, '<p>B&ocirc;̣ Nỉ Nam Paaa Ríttt D&ecirc;̣t Chữ C&ocirc;̉ Áo Si&ecirc;u Ch&acirc;́t - B&ocirc;̣ Qu&acirc;̀n Áo Nam Paarriss Th&ecirc;u Logo Si&ecirc;u Đẹp</p>', 1, 209900, 179997, 1, '2024-11-13 19:32:23', '2024-12-12 16:20:59', '/storage/uploads/2024/12/12/462562796_1971673463334106_5984781265525132188_n (1).png'),
(9, 'Bộ nỉ nam đen dài tay có cổ cao cấp', 'Bộ thu đông nam thêu chữ, bộ nỉ nam đen dài tay có cổ cao cấp - Dino store', 10, '<p>Bộ thu đ&ocirc;ng nam th&ecirc;u chữ, bộ nỉ nam đen d&agrave;i tay c&oacute; cổ cao cấp - Dino store</p>', 1, 175000, 145998, 1, '2024-11-13 19:33:23', '2024-12-12 16:19:18', '/storage/uploads/2024/12/12/462573134_1241852657024821_825534558195978408_n.png'),
(10, 'Quần áo nam trung niên', 'Quần áo nam trung niên , Bộ đồ cổ tàu thêu họa tiết đối xứng chất liệu thô đũi nhẹ mát món quà ý nghĩa tặng ông và bố', 10, '<p>Quần &aacute;o nam trung ni&ecirc;n , Bộ đồ cổ t&agrave;u th&ecirc;u họa tiết đối xứng chất liệu th&ocirc; đũi nhẹ m&aacute;t m&oacute;n qu&agrave; &yacute; nghĩa tặng &ocirc;ng v&agrave; bố</p>', 1, 275000, 186000, 1, '2024-11-13 19:34:21', '2024-12-12 16:18:55', '/storage/uploads/2024/12/12/462566353_542281348558327_6136301878490397739_n.png'),
(11, 'Set áo sơ mi đũi phối dây buộc hai bên', 'Set áo sơ mi đũi phối dây buộc hai bên eo kèm quần short cạp chun xixeoshop - S160', 10, '<p>Set &aacute;o sơ mi đũi phối d&acirc;y buộc hai b&ecirc;n eo k&egrave;m quần short cạp chun xixeoshop - S160</p>', 2, 256000, 128000, 1, '2024-11-13 19:48:01', '2024-12-12 16:18:37', '/storage/uploads/2024/12/12/462538730_500802322945065_2471318686973897998_n.png'),
(12, 'Set Áo Sơ Mi Chéo Ý Nơ Thome', 'Set Áo Sơ Mi Chéo Ý Nơ Thome Tháo Rời Kèm Độn Vai Đứng Form Mix Quần Váy Quả Bí Bồng 2 Lớp', 10, '<p>Set &Aacute;o Sơ Mi Ch&eacute;o &Yacute; Nơ Thome Th&aacute;o Rời K&egrave;m Độn Vai Đứng Form Mix Quần V&aacute;y Quả B&iacute; Bồng 2 Lớp</p>', 2, 205000, 142999, 1, '2024-11-13 19:48:52', '2024-12-12 16:17:22', '/storage/uploads/2024/12/12/462576719_8649842325131769_2952600129982138275_n.png'),
(13, 'Bộ nỉ áo Sweater Form', 'Bộ Nỉ Cotton Thu Đông Cao Cấp Set Short Vegetanian, Bộ Đồ Thu Đông Quần Shorts Áo Sweater Form Rộng Dài Tay Cá Tính', 10, '<p>Bộ Nỉ Cotton Thu Đ&ocirc;ng Cao Cấp Set Short Vegetanian, Bộ Đồ Thu Đ&ocirc;ng Quần Shorts &Aacute;o Sweater Form Rộng D&agrave;i Tay C&aacute; T&iacute;nh</p>', 2, 543000, 299000, 1, '2024-11-13 19:51:06', '2024-12-12 16:18:09', '/storage/uploads/2024/12/12/462551589_1602657523659796_8455975834193708451_n.png'),
(14, 'Chân Váy Xoè Xếp Ly', 'Set Dạ 3 Món Chân Váy Xoè Xếp Ly + Áo 2 Dây + Quần Bí (kèm kẹp hoa) HH86 HaLuu Store', 10, '<p>Set Dạ 3 M&oacute;n Ch&acirc;n V&aacute;y Xo&egrave; Xếp Ly + &Aacute;o 2 D&acirc;y + Quần B&iacute; (k&egrave;m kẹp hoa) HH86 HaLuu Store</p>', 2, 320000, 275998, 1, '2024-11-13 19:52:00', '2024-12-12 16:17:07', '/storage/uploads/2024/12/12/462544068_459332217180470_1720616737959418019_n.png'),
(15, 'Áo Trễ Vai Cổ Thuyền', 'Sét Váy Mùa Thu Gồm Áo Trễ Vai Cổ Thuyền + Chân Váy Tầng Có Quần Trong', 10, '<p>S&eacute;t V&aacute;y M&ugrave;a Thu Gồm &Aacute;o Trễ Vai Cổ Thuyền + Ch&acirc;n V&aacute;y Tầng C&oacute; Quần Trong</p>\r\n\r\n<p>&nbsp;</p>', 2, 320000, 204998, 1, '2024-11-13 19:54:16', '2024-12-12 16:16:52', '/storage/uploads/2024/12/12/462566977_1260182038317101_2275112789189197490_n.png'),
(16, 'Set bộ đồ nữ áo sơ mi phối gile', 'Set bộ đồ nữ áo sơ mi phối gile đen kèm quần ống suông, sét bộ đồ nữ áo tay dài chiết eo mix quần ống rộng kèm đai S993', 10, '<p>Set bộ đồ nữ &aacute;o sơ mi phối gile đen k&egrave;m quần ống su&ocirc;ng, s&eacute;t bộ đồ nữ &aacute;o tay d&agrave;i chiết eo mix quần ống rộng k&egrave;m đai S993</p>', 2, 486000, 228999, 1, '2024-11-13 19:55:02', '2024-12-12 16:16:33', '/storage/uploads/2024/12/12/462575557_569887922360333_7551804701555586635_n.png'),
(17, 'Áo sơ mi cổ vest phối Cavat', 'Sét váy nữ kẻ sọc gồm áo sơ mi cổ vest phối Cavat + chân váy xếp ly có quần bảo hộ chất kẻ thô HB300 !', 10, '<p>S&eacute;t v&aacute;y nữ kẻ sọc gồm &aacute;o sơ mi cổ vest phối Cavat + ch&acirc;n v&aacute;y xếp ly c&oacute; quần bảo hộ chất kẻ th&ocirc; HB300 !</p>', 2, 289000, 215998, 1, '2024-11-13 19:56:09', '2024-12-12 16:16:08', '/storage/uploads/2024/12/12/462550232_1640451676903153_6022650750065692007_n.png'),
(18, 'Set dạ nữ tiểu thư', 'Set váy tiểu thư Set dạ nữ Chất vải dạ lông Quảng Châu may 2 lớp Chân váy có sẵn quần bảo hộ Áo khoác có đệm vai HK Shop', 10, '<p>Set v&aacute;y tiểu thư Set dạ nữ Chất vải dạ l&ocirc;ng Quảng Ch&acirc;u may 2 lớp Ch&acirc;n v&aacute;y c&oacute; sẵn quần bảo hộ &Aacute;o kho&aacute;c c&oacute; đệm vai HK Shop</p>', 2, 299000, 174000, 1, '2024-11-13 19:56:52', '2024-12-12 16:15:49', '/storage/uploads/2024/12/12/462561596_593498393120536_8044450597711570090_n.png'),
(20, 'Váy xinh dự tiệc', 'Váy xinh dự tiệc Cổ Yếm - Hở Vai - Tay Bồng Thiết Kế Lucido Fashion S42', 20, '<p>V&aacute;y xinh dự tiệc Cổ Yếm - Hở Vai - Tay Bồng Thiết Kế Lucido Fashion S42</p>', 2, 690000, 550000, 1, '2024-12-12 17:14:48', '2024-12-12 17:14:48', '/storage/uploads/2024/12/13/462578407_503411039424727_5410924602494243135_n.png'),
(21, 'Váy trắng viền ren nàng thơ', 'Muse Dress - Váy trắng viền ren nàng thơ by Thematrix', 34, '<p>Muse Dress - V&aacute;y trắng viền ren n&agrave;ng thơ by Thematrix</p>', 2, 400000, 399000, 1, '2024-12-12 17:16:43', '2024-12-12 17:22:11', '/storage/uploads/2024/12/13/458760724_535831502283178_167917307242946725_n.png'),
(22, 'Váy Maxi Thô Trắng', 'Váy Maxi Thô Trắng Nhúm Eo Ly Ngực Siêu Xinh', 23, '<p>V&aacute;y Maxi Th&ocirc; Trắng Nh&uacute;m Eo Ly Ngực Si&ecirc;u Xinh</p>', 2, 250000, 111000, 1, '2024-12-12 17:17:51', '2024-12-12 17:17:51', '/storage/uploads/2024/12/13/467477759_923143039462231_5512633434615906990_n.png'),
(23, 'Váy bầu công sở', 'Váy bầu công sở , váy bầu xinh babydoll đuôi cá cổ bèo trắng cách điệu phong cách tiểu thư thanh lịch nhã nhặn', 45, '<p>V&aacute;y bầu c&ocirc;ng sở , v&aacute;y bầu xinh babydoll đu&ocirc;i c&aacute; cổ b&egrave;o trắng c&aacute;ch điệu phong c&aacute;ch tiểu thư thanh lịch nh&atilde; nhặn</p>', 2, 341800, 245000, 1, '2024-12-12 17:18:58', '2024-12-12 17:18:58', '/storage/uploads/2024/12/13/462565507_2367320323613781_4758147753206003877_n.png'),
(24, 'Đầm quây Nữ Cổ Lông Vũ', 'Kans Đầm quây Nữ Cổ Lông Vũ Đính Hạt Tiệc Sinh Nhật Bọc Váy Chic váy nữ Đầm Body vn', 26, '<p>Kans Đầm qu&acirc;y Nữ Cổ L&ocirc;ng Vũ Đ&iacute;nh Hạt Tiệc Sinh Nhật Bọc V&aacute;y Chic v&aacute;y nữ Đầm Body vn</p>', 2, 280000, 120000, 1, '2024-12-12 17:20:06', '2024-12-12 17:21:53', '/storage/uploads/2024/12/13/462575810_1632420550820116_7441475184407570835_n.png'),
(25, 'Sét váy bánh bèo tiểu', 'Sét váy bánh bèo tiểu thư thời trang nữ chất tằm gãy in hoa trễ vai có mút váy xoè tầng có lót QC', 24, '<p>S&eacute;t v&aacute;y b&aacute;nh b&egrave;o tiểu thư thời trang nữ chất tằm g&atilde;y in hoa trễ vai c&oacute; m&uacute;t v&aacute;y xo&egrave; tầng c&oacute; l&oacute;t QC</p>', 2, 169000, 144999, 1, '2024-12-12 17:20:54', '2024-12-12 17:20:54', '/storage/uploads/2024/12/13/467331081_558953053698012_762705327136712168_n.png'),
(26, 'Váy Bigsize Cao Cấp', 'Thời Trang váy Bigsize Cao Cấp Kiểu Dáng Đẹp Diện Cực Thích - A.1086', 12, '<p>Thời Trang v&aacute;y Bigsize Cao Cấp Kiểu D&aacute;ng Đẹp Diện Cực Th&iacute;ch - A.1086</p>', 2, 360000, 269000, 1, '2024-12-12 17:21:39', '2024-12-12 17:21:39', '/storage/uploads/2024/12/13/467480253_1755912535154601_7701805877099144238_n.png'),
(27, 'Áo Sơ Mi Dài Tay Quần Kaki', 'Bộ Quần Áo Nam Áo Sơ Mi Dài Tay Quần Kaki Basic Có Túi Trẻ Trung Thời Trang Zenkonu SO MI NAM 023 + QUAN NAM 060', 23, '<p>Bộ Quần &Aacute;o Nam &Aacute;o Sơ Mi D&agrave;i Tay Quần Kaki Basic C&oacute; T&uacute;i Trẻ Trung Thời Trang Zenkonu SO MI NAM 023 + QUAN NAM 060</p>', 1, 400000, 249000, 1, '2024-12-12 17:27:22', '2024-12-12 17:27:22', '/storage/uploads/2024/12/13/467397129_1105918797645064_8217784690228149964_n.png'),
(28, 'Áo sweater dệt kim', 'Áo sweater dệt kim cổ tròn dáng rộng họa tiết đường kẻ thời trang nam', 25, '<p>&Aacute;o sweater dệt kim cổ tr&ograve;n d&aacute;ng rộng họa tiết đường kẻ thời trang nam</p>', 3, 245000, 189998, 1, '2024-12-12 17:28:15', '2024-12-12 17:28:15', '/storage/uploads/2024/12/13/470053476_934220398229261_4228943888505282706_n.png'),
(29, 'Áo len tay dài cổ tròn sọc', 'Áo len tay dài cổ tròn sọc trắng đen  lông mềm phong cách Hàn quốc dành cho nam cá tính năng động mùa thu đông', 23, '<p>&Aacute;o len tay d&agrave;i cổ tr&ograve;n sọc trắng đen &nbsp;l&ocirc;ng mềm phong c&aacute;ch H&agrave;n quốc d&agrave;nh cho nam c&aacute; t&iacute;nh năng động m&ugrave;a thu đ&ocirc;ng</p>', 3, 250000, 188998, 1, '2024-12-12 17:30:29', '2024-12-12 17:48:13', '/storage/uploads/2024/12/13/466442132_620429333883046_1152623117878753095_n.png'),
(30, 'Quần Ống Suông + Áo Hoodie', 'Sét Bộ Thu Đông chất vải Nỉ Bông, Quần Ống Suông Dây Bản To + Mix Áo Hoodie Mèo Máy Form Unisex', 19, '<p>S&eacute;t Bộ Thu Đ&ocirc;ng chất vải Nỉ B&ocirc;ng, Quần Ống Su&ocirc;ng D&acirc;y Bản To + Mix &Aacute;o Hoodie M&egrave;o M&aacute;y Form Unisex</p>', 3, 230000, 145000, 1, '2024-12-12 17:31:35', '2024-12-12 17:47:55', '/storage/uploads/2024/12/13/470053585_939148244265606_7387171982147215380_n.png'),
(31, 'Quần áo teen trẻ trung', 'Quần áo teen trẻ trung thời trang là một trong các sản phẩm bán chạy trong mùa này , thoải mái khi vận động, không thể nào phù hợp hơn khi lựa chọn cho thời trang ở nhà, dạo phố cùng bạn bè.', 45, '<p>Quần &aacute;o teen trẻ trung thời trang l&agrave; một trong c&aacute;c sản phẩm b&aacute;n chạy trong m&ugrave;a n&agrave;y , thoải m&aacute;i khi vận động, kh&ocirc;ng thể n&agrave;o ph&ugrave; hợp hơn khi lựa chọn cho thời trang ở nh&agrave;, dạo phố c&ugrave;ng bạn b&egrave;.</p>', 3, 145000, 66997, 1, '2024-12-12 17:32:17', '2024-12-12 17:32:17', '/storage/uploads/2024/12/13/470053543_1142199820868541_4236095133004095349_n.png'),
(32, 'Set áo đỏ kèm quần noel-tết', 'Set áo đỏ kèm quần suôn diện noel-tết .Màu Đỏ Đi với màu đen là bộ đôi không thể nào hoàn hảo hơn , Set đồ che được bắp tay to , quần suôn tạo cảm giác chân thẳng hơn che được nhiều khuyết điểm', 129, '<p>M&agrave;u Đỏ Đi với m&agrave;u đen l&agrave; bộ đ&ocirc;i kh&ocirc;ng thể n&agrave;o ho&agrave;n hảo hơn , Set đồ che được bắp tay to , quần su&ocirc;n tạo cảm gi&aacute;c ch&acirc;n thẳng hơn che được nhiều khuyết điểm</p>', 3, 189700, 98998, 1, '2024-12-12 17:33:45', '2024-12-12 17:33:45', '/storage/uploads/2024/12/13/462575838_930217871910430_5769878976328629631_n.png'),
(33, 'Áo Thun Regular 5136', 'Áo Thun Regular 5136 là mẫu áo khoác dáng vừa, chất liệu len pha, thiết kế tối giản với ve chữ V, một hàng khuy, và có lớp lót. Màu sắc thường là xám đậm hoặc trung tính, phù hợp với phong cách thường ngày và công sở', 45, '<p>&Aacute;o Thun Regular 5136 l&agrave; mẫu &aacute;o kho&aacute;c d&aacute;ng vừa, chất liệu len pha, thiết kế tối giản với ve chữ V, một h&agrave;ng khuy, v&agrave; c&oacute; lớp l&oacute;t. M&agrave;u sắc thường l&agrave; x&aacute;m đậm hoặc trung t&iacute;nh, ph&ugrave; hợp với phong c&aacute;ch thường ng&agrave;y v&agrave; c&ocirc;ng sở</p>', 3, 157000, 98997, 1, '2024-12-12 17:35:15', '2024-12-12 17:35:15', '/storage/uploads/2024/12/13/466792447_1451433009234945_6023070573527801871_n.jpg'),
(34, 'Váy trắng xòe mix với áo nỉ lệch vai', 'Sét bộ nữ váy trắng xòe mix với áo nỉ lệch vai thích hợp lễ tết\r\nChất liệu váy thun lạnh mềm mại co dãn tốt mix thô lụa kẻ  . Sét bộ nữ váy trắng xòe mix với áo nỉ lệch vai thích hợp lễ tết', 33, '<p>S&eacute;t bộ nữ v&aacute;y trắng x&ograve;e mix với &aacute;o nỉ lệch vai th&iacute;ch hợp lễ tết Chất liệu v&aacute;y thun lạnh mềm mại co d&atilde;n tốt mix th&ocirc; lụa kẻ ///S&eacute;t bộ nữ v&aacute;y trắng x&ograve;e mix với &aacute;o nỉ lệch vai th&iacute;ch hợp lễ tết</p>', 3, 126000, 64000, 1, '2024-12-12 17:37:19', '2024-12-13 02:23:01', '/storage/uploads/2024/12/13/470053537_1970234646830964_102825830616331868_n (1).png'),
(35, 'Quần Cargo Pant Kaki', 'Quần Cargo Pant Kaki 300gsm DINOMAN , Quần Túi Hộp Nam Nữ Ống Rộng Basic QTH01', 12, '<p>Quần Cargo Pant Kaki 300gsm DINOMAN , Quần T&uacute;i Hộp Nam Nữ Ống Rộng Basic QTH01</p>', 3, 349000, 239999, 1, '2024-12-12 17:42:16', '2024-12-12 17:42:16', '/storage/uploads/2024/12/13/462575903_932119602198233_8226236580683328677_n.png'),
(36, 'Quần bò baggy nam jean', 'quần bò baggy nam jean', 36, '<p>quần b&ograve; baggy nam jean</p>', 3, 239000, 125000, 1, '2024-12-12 17:43:26', '2024-12-12 17:43:26', '/storage/uploads/2024/12/13/467473201_895808262670161_1455885330339275741_n.png'),
(37, 'Ống rộng dáng suông', 'ống rộng dáng suông chất bò cao cấp 005', 15, '<p>ống rộng d&aacute;ng su&ocirc;ng chất b&ograve; cao cấp 005</p>', 3, 249000, 20000, 1, '2024-12-12 17:44:03', '2024-12-12 17:47:08', '/storage/uploads/2024/12/13/467475711_3098723266945444_4889871207087840135_n.png'),
(38, 'Quần dài thể thao nam', 'Quần dài thể thao nam ống suông nhẹ chất poly co giãn', 16, '<p>Quần d&agrave;i thể thao nam ống su&ocirc;ng nhẹ chất poly co gi&atilde;n</p>', 3, 264000, 188998, 1, '2024-12-12 17:44:36', '2024-12-13 00:42:39', '/storage/uploads/2024/12/13/458799894_2100127640382188_334738448050193886_n.png'),
(39, 'Áo Thun Nam Nữ Form Rộng', 'Áo Thun AM Nam Nữ Form Rộng THIÊN THẦN', 34, '<p>&Aacute;o Thun AM Nam Nữ Form Rộng THI&Ecirc;N THẦN</p>', 3, 126000, 79000, 1, '2024-12-12 17:45:21', '2024-12-12 17:45:21', '/storage/uploads/2024/12/13/462563001_406224709209459_3669808828997108776_n.png'),
(40, 'Áo Sơ Mi  Kẻ Sọc 2 Tay', 'Áo Sơ Mi cộc tay nam nữ Kẻ Sọc 2 Tay Thời Trang Unisex', 55, '<p>&Aacute;o Sơ Mi cộc tay nam nữ Kẻ Sọc 2 Tay Thời Trang Unisex</p>', 3, 132000, 67000, 1, '2024-12-12 17:46:08', '2024-12-13 01:43:33', '/storage/uploads/2024/12/13/466838434_1101202341478706_7206940336000345774_n.png'),
(41, 'test', 'wrwhreh', 10, '<p>htrhj</p>', 2, 123000, 34000, 1, '2024-12-13 02:20:41', '2024-12-13 02:20:41', '/storage/uploads/2024/12/13/Red Gradient Flash Sale Landscape Banner.png');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `brand`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Quản lý', NULL, NULL),
(2, 'Client', 'Khách hàng', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `url`, `thumb`, `sort_by`, `active`, `created_at`, `updated_at`) VALUES
(4, 'OFF 50%', 'http://127.0.0.1:8000/danh-muc/2-hang-chinh-hang.html', '/storage/uploads/2024/12/13/banner2.png', 1, 1, '2024-12-11 18:45:31', '2024-12-12 19:18:05'),
(5, 'Sale', 'http://127.0.0.1:8000/danh-muc/1-bo-suu-tap-mua-dong.html', '/storage/uploads/2024/12/12/banner1.png', 1, 1, '2024-12-11 18:45:31', '2024-12-11 18:45:31'),
(7, 'Sale', 'http://127.0.0.1:8000/danh-muc/3-flash-sale.html', '/storage/uploads/2024/12/13/banner3.png', 1, 1, '2024-12-12 19:07:23', '2024-12-12 19:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `SĐT` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`, `status`, `SĐT`, `address`) VALUES
(4, 'Thắm', 'admin@localhost.com', NULL, '$2y$10$yh/ejMNMdhLpo8w1aHdGtumkYCdPw8PTPxSClyihL3bi0udW59Vbm', NULL, 1, '2024-11-29 23:48:56', '2024-12-11 09:22:33', 1, '123456789023', 'Đà Nẵng'),
(6, 'thắm', 'thambtl.23it@vku.udn.vn', NULL, '$2y$10$dsV.6Rqsy4tbe7rTCtag6O9MiKdIDu910FCDUumfvcKeGTQjQs4aO', NULL, 1, '2024-12-11 09:01:00', '2024-12-12 03:05:08', 1, NULL, NULL),
(7, 'test2', 'test2@gmail.com', NULL, '$2y$10$TpSQSj1JKQgM/VryCyrNyuLWEIvm0F/QUxdPz4zW9O9cMmR2vhmjm', NULL, 2, '2024-12-12 03:13:27', '2024-12-13 02:26:34', 1, '0123456789', 'quang trij'),
(8, 'Thắm', 'thambtl.13it@vku.udn.vn', NULL, '$2y$10$H.JC/N7s0UEaNTEzgWL7guEavffvkQbTFLrTNObM2sJp8WO4BBHia', NULL, 1, '2024-12-13 02:18:46', '2024-12-13 02:19:06', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
