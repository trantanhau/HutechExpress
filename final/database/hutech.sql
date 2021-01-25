-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 24, 2021 lúc 03:52 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hutech`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int(100) NOT NULL,
  `admin_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_user`, `email`, `password`) VALUES
(1, 'admin', 'admin@gmal.com', '1234567890');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'MiniStop'),
(2, 'GS25'),
(3, 'CircleK'),
(4, 'FamilyMart'),
(5, '7eleven'),
(6, 'Vinmart');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `product_id` int(100) DEFAULT NULL,
  `ip_add` varchar(250) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `qty` decimal(50,0) DEFAULT NULL,
  `product_price` decimal(10,2) DEFAULT NULL,
  `total_amt` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Food'),
(2, 'Drink'),
(3, 'Snack'),
(4, 'Cake'),
(5, 'Set Menu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(2) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `mobile` bigint(12) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `address1`, `mobile`, `status`) VALUES
(1, 2, 47, 15, '123', 916367574, 1),
(1, 2, 48, 1, '123', 916367574, 1),
(2, 8, 45, 10, 'd.06.05', 123456789, 0),
(2, 8, 46, 2, 'd.06.05', 123456789, 0),
(3, 8, 51, 10, 'd.06.05', 123456789, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `cat_id` int(100) DEFAULT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_desc` varchar(300) DEFAULT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(43, 1, 1, 'Mì xào', '20000.00', 'mì xào ngon bá cháy', '600ba10715fa8.jpg', 'mì'),
(44, 1, 1, 'Bánh bao', '15000.00', 'bánh bao nhân thịt người', '600ba17a9f902.jpg', 'bánh'),
(45, 2, 6, 'Coffee', '15000.00', 'cà phê nhiều đá ít cà phê', '600bb6bc60bf7.jpg', 'coffee'),
(46, 2, 1, 'Trà sữa than tre', '20000.00', 'Than tre đen như cuộc đời của bạn', '600ba247cfe28.jpg', 'trà sữa'),
(47, 3, 1, 'Bánh mai ghẹ', '12000.00', 'ngon hơn người yêu cũ của bạn', '600ba32b845b8.jpg', 'bánh'),
(48, 3, 1, 'Chả mực', '20000.00', 'lại chả ngon', '600ba3a7b5d87.jpg', 'chả'),
(49, 4, 1, 'Bánh bông lan', '16000.00', 'ăn thì ăn k ăn thì ra chỗ khác', '600ba41334f01.jpg', 'bánh'),
(50, 5, 1, 'Set menu 1', '30000.00', 'không ngon vẫn tính tiền', '600ba47a87e6c.jpg', 'set'),
(51, 4, 1, 'coke', '3000000.00', 'hàng mĩ, chơi bao phê', '600bd4633c4ff.jpg', 'cacaine');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(100) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `mobile` varchar(11) DEFAULT NULL,
  `address1` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`) VALUES
(2, 'hiep', 'hiep', 'hiep@gmail.com', '9ce4de9bcb2f15a1acefde6dba4fcb97', '0916367574', '123'),
(6, 'Van', 'Khai', 'Khai@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '0123647785', 'abc'),
(8, 'hiep', 'hiep', 'hiep1@gmail.com', '9ce4de9bcb2f15a1acefde6dba4fcb97', '123456789', 'd.06.05');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`product_title`,`product_price`,`product_image`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`,`product_title`,`product_price`,`product_image`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Chỉ mục cho bảng `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`,`product_title`,`product_price`,`product_image`) REFERENCES `products` (`product_id`, `product_title`, `product_price`, `product_image`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
