-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2025 at 12:40 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `logo`) VALUES
(1, 'Nike', 'logo_nike.svg'),
(2, 'Adidas', 'logo_adidas.svg'),
(3, 'Converse', 'logo_converse.svg'),
(4, 'Jordan', 'logo_air-jordan.svg'),
(5, 'Vans', 'logo_vans.svg'),
(6, 'Russell & Bromley', 'logo_russel.png'),
(8, 'Puma', 'logo_puma.svg'),
(9, 'New Balance', 'logo_new_balance.svg'),
(10, 'UGG', 'logo_ugg.svg'),
(11, 'Salomon', 'logo_salomon.svg'),
(12, 'Lacoste', 'logo_lacoste.svg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'male'),
(2, 'female'),
(3, 'unisex');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_comment` varchar(2000) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment_date` datetime NOT NULL,
  `stars_rating` int(11) NOT NULL,
  `approved` varchar(10) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_comment`, `product_id`, `comment_date`, `stars_rating`, `approved`, `user_name`, `data_status`) VALUES
(1, 'Amazing quality and fast delivery!', 5, '2025-05-01 10:00:00', 5, 'approved', 'Alice', 'old'),
(2, 'Very comfortable to wear.', 12, '2025-05-01 10:15:00', 4, 'approved', 'Bob', 'old'),
(3, 'Color was slightly different.', 25, '2025-05-01 10:30:00', 3, 'approved', 'Charlie', 'old'),
(4, 'Love these sneakers!', 40, '2025-05-01 10:45:00', 5, 'approved', 'Dana', 'old'),
(6, 'Great fit and style!', 10, '2025-05-01 11:30:00', 5, 'approved', 'Grace', 'old'),
(7, 'Disappointed with the durability.', 15, '2025-05-01 11:45:00', 2, 'approved', 'Hank', 'old'),
(9, 'The size runs a bit small.', 30, '2025-05-01 12:15:00', 3, 'approved', 'Jack', 'old'),
(10, 'Amazing sneakers, very comfortable.', 40, '2025-05-01 12:30:00', 5, 'approved', 'Kelly', 'old'),
(11, 'Quality was not up to expectations.', 50, '2025-05-01 12:45:00', 2, 'approved', 'Leo', 'old'),
(12, 'Good value for the price.', 55, '2025-05-01 13:00:00', 4, 'approved', 'Mona', 'old'),
(13, 'Comfortable but the design is plain.', 60, '2025-05-01 13:15:00', 3, 'approved', 'Nina', 'old'),
(76, 'hfghgf', 30, '2025-05-01 12:38:24', 5, 'approved', 'hahahahaha', 'old'),
(78, 'The influence of sneakers on today’s culture is undeniable. They are no longer just athletic gear but a major element of personal style and identity. The sneaker industry thrives on innovation, offering advanced performance features alongside bold, artistic designs. Exclusive drops and collaborations keep fans excited and engaged, making sneaker collecting a passion for many. With their unmatched versatility, sneakers can complement any outfit while providing the comfort and support people love. It’s clear that sneakers have secured their place as a timeless fashion essential.', 39, '2025-05-01 12:41:29', 5, 'approved', 'Adrian njhgnjgh', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `img_title` varchar(255) NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `img_src`, `img_title`, `data_status`) VALUES
(1, 'img (1).jpg', 'fdsfdsfdsfds', 'old'),
(2, 'img (2).jpg', 'dgfdgfdgfd', 'old'),
(3, 'img (3).jpg', 'fdsfdsfds', 'old'),
(4, 'img (4).jpg', 'fsdfdsfds', 'old'),
(14, 'gallery (1).jpg', 'Urban Stride: The Bold Sneaker Revolution', 'old'),
(15, 'gallery (2).jpg', 'Laced Up and Ready to Go', 'old'),
(16, 'gallery (4).jpg', 'Speed Meets Style: The Future of Footwea', 'old'),
(17, 'gallery (5).jpg', 'Kickstart Your Day with Classic Comfort', 'old'),
(18, 'gallery (6).jpg', 'Chasing Dreams, One Step at a Time', 'old'),
(19, 'gallery (7).jpg', 'Unleash the Hustle: Sneakers That Speak', 'old'),
(20, 'gallery (8).jpg', 'City Lights & Street Sprints', 'old'),
(21, 'gallery (10).jpg', 'Grounded in Style, Soaring in Comfort', 'old'),
(22, 'acc.jpg', 'Step Up Your Game: The Latest Sneaker Drop', 'old'),
(23, 'dsadsa.jpg', 'Run in Style: High-Performance Sneakers for Every Athlete', 'old'),
(24, 'fashion-shoes-sneaker (1).jpg', 'Sleek and Stylish: Your New Favorite Sneaker', 'old'),
(25, 'holi-color-white-canvas-shoes-green-grass.jpg', 'Urban Vibes: Sneakers That Define Street Style', 'old'),
(26, 'saSA.jpg', 'Fresh Kicks: Elevate Your Sneaker Collection', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_postal` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unreaded',
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_email`, `user_firstname`, `user_lastname`, `user_address`, `user_city`, `user_postal`, `user_country`, `user_message`, `status`, `data_status`) VALUES
(23, 'dsadsadsadtyra@yahoo.com', 'adda', 'dsfdsfds', '341/9 Easter Road', 'Edinburgh', 'EH6 8JG', 'United Kingdom', 'fdsfdsfds', 'readed', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `post_date` date NOT NULL,
  `post_header` varchar(255) NOT NULL,
  `post_desc` varchar(5000) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_subheading` varchar(500) NOT NULL,
  `post_banner` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `post_date`, `post_header`, `post_desc`, `post_img`, `post_subheading`, `post_banner`, `post_author`, `data_status`) VALUES
(8, '2025-02-27', 'Limited Edition Nike Air Max Drops – Only 100 Pairs Available!', '<p>Hi-Top Sneakers is thrilled to announce the arrival of the ultra-rare Nike Air Max Supreme, available in just 100 pairs worldwide. This highly coveted sneaker features premium materials and an iconic design that makes it a must-have for sneakerheads. Be the first to secure your pair before they sell out!</p>', 'lol (1).jpg', 'Exclusive sneakers for true collectors – don’t miss out!', 'lol (5).jpg', 'Hi-Top Sneakers Team', 'old'),
(9, '2025-02-27', 'The Future of Sneakers – Self-Lacing Jordans Now In Stock', '<p>We’ve got our hands on the revolutionary self-lacing Air Jordans, blending technology and streetwear in a way never seen before. These futuristic sneakers are a game-changer, giving you the perfect fit at the touch of a button. Limited stock available!</p>', 'lol (2).jpg', 'Cutting-edge tech meets iconic sneaker culture', 'lol (6).jpg', 'Hi-Top Sneakers Team', 'old'),
(10, '2025-02-27', 'Sneaker of the Month: The Off-White x Air Jordan 4', '<p>Our featured sneaker this month is the Off-White x Air Jordan 4 – a stunning collaboration that perfectly captures the essence of streetwear. With deconstructed aesthetics and premium materials, this sneaker is a must-have for collectors and style enthusiasts alike.</p>', 'lol (3).jpg', 'A fusion of high fashion and sneaker culture', 'lol (7).jpg', 'Hi-Top Sneakers Team', 'old'),
(11, '2025-05-08', 'Shoreditch Sneakerheads: The Rise of Collectible Footwear', '<p>Sneakers have evolved beyond footwear – they are now investment pieces. Hi-Top Sneakers curates a selection of the most sought-after, limited-edition designs, catering to sneaker collectors who appreciate rarity and exclusivity. Discover why these sneakers are worth the hype!</p>', 'luis-felipe-lins-J2-wAQDckus-unsplash.jpg', 'Why limited-edition sneakers are the new luxury investment', 'maksim-larin-1vy2QcZd5FU-unsplash.jpg', 'Hi-Top Sneakers Team', 'old'),
(14, '2025-05-08', 'Step Into the Exclusive – Limited Edition Sneakers Now Online', '<p>We’ve brought our Shoreditch boutique online so sneakerheads across the UK can shop the most exclusive sneakers in the game. From sold-out global drops to hard-to-find collabs, Hi-Top Sneakers is your destination for luxury, collectable footwear. Whether you’re after clean, minimal streetwear styles or bold, statement pairs, we’ve got the heat you won’t find on the high street. Explore the collection and experience the future of sneaker culture—designed for those who know the difference.</p>', 'maria-fernanda-pissioli-DTZV8WDM1Ho-unsplash.jpg', 'Hi-Top Sneakers, London’s home for collectible, high-end kicks, is now online. Discover ultra-rare drops and limited editions from around the globe. Fashion-first sneakers for all genders, now just a click away.', 'linda-xu-fUEP0djb1hA-unsplash.jpg', 'Adrian Kotyra', 'old'),
(15, '2025-05-08', 'Sneaker of the Month: The Rarest Heat, Handpicked in Shoreditch', '<p>Say hello to our “Sneaker of the Month” — a curated spotlight on ultra-limited, premium sneakers chosen by our in-house team of collectors and sneaker obsessives. This isn’t just product—it’s art, history, and culture wrapped in leather, mesh, and hype. Stay tuned each month for new drops, background stories, and styling tips on how to wear the rarest pairs out there. Available in limited quantities, first come, first flex. Tap in before it’s gone.</p>', 'branislav-belko-lJ7iAZxplpc-unsplash.jpg', 'Every month, we spotlight one of our most coveted pairs – rare, iconic, and impossible to ignore. From our Shoreditch roots to your doorstep. Only at Hi-Top Sneakers – where collectors buy.', 'ryan-plomp-PGTO_A0eLt4-unsplash.jpg', 'Adrian Kotyra', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `data_status` varchar(25) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `user_name`, `user_email`, `data_status`) VALUES
(1, 'vfdsfds', 'fdsfds', 'old'),
(2, 'fsdfds', 'fdsfds', 'old'),
(3, 'fdsfd', 'fdsfds', 'old'),
(4, 'dsdsa', 'dsadsafcsd222@wp.pl', 'old'),
(5, 'torus magnus', 'fdsfdsfds@wp.pl', 'old'),
(9, 'bdvbdffvfd', 'fdsfdsfdsfdshahah@Wp.pl', 'old'),
(10, 'gfdgfd', 'def12ffffffff@wp.pl', 'old'),
(12, 'fdgdf', 'def12gg@wp.pl', 'old'),
(14, 'fdgdf', 'e1@c.com', 'old'),
(15, 'fdgdf', 'eh1@c.com', 'old'),
(16, 'fdgdf', 'hhe1@c.com', 'old'),
(17, 'admin', 'def12dasda@wp.pl', 'old'),
(18, 'admin', 'def12ssdasda@wp.pl', 'old'),
(19, 'admin', 'def12dsadassdasda@wp.pl', 'old'),
(20, 'admin', 'def12sda@wp.pl', 'old'),
(21, 'fdsfdsf', 'dd2fdsfdsfds@wp.pl', 'old'),
(22, 'admin', 'hadsadsaha123@wp.pl', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_db_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `transaction_status` varchar(20) NOT NULL,
  `transaction_amount` decimal(10,2) NOT NULL,
  `transaction_currency` varchar(10) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `payer_name` varchar(100) NOT NULL,
  `payer_email` varchar(100) NOT NULL,
  `payer_id` varchar(50) NOT NULL,
  `payer_phone` varchar(20) DEFAULT NULL,
  `payer_country` varchar(10) NOT NULL,
  `shipping_street` varchar(255) NOT NULL,
  `shipping_city` varchar(100) NOT NULL,
  `shipping_state` varchar(100) NOT NULL,
  `shipping_postal_code` varchar(20) NOT NULL,
  `shipping_country` varchar(10) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data_status` varchar(5) NOT NULL DEFAULT 'new',
  `delivery_option` varchar(10) NOT NULL,
  `discount_applied` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_db_id`, `transaction_id`, `transaction_status`, `transaction_amount`, `transaction_currency`, `transaction_time`, `payer_name`, `payer_email`, `payer_id`, `payer_phone`, `payer_country`, `shipping_street`, `shipping_city`, `shipping_state`, `shipping_postal_code`, `shipping_country`, `shipping_name`, `created_at`, `updated_at`, `data_status`, `delivery_option`, `discount_applied`) VALUES
(53, 4, '83Y91631KG2800522', 'COMPLETED', 200.00, 'GBP', '2025-03-20 10:06:00', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 10:06:00', '2025-05-23 09:40:23', 'old', '', 0),
(54, 4, '7G178472RY110001U', 'COMPLETED', 94.00, 'GBP', '2025-03-20 10:12:07', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 10:12:08', '2025-05-23 09:40:23', 'old', '', 0),
(55, 4, '11F34761M1204754E', 'COMPLETED', 88.00, 'GBP', '2025-03-20 10:16:50', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 10:16:51', '2025-05-23 09:40:23', 'old', '', 0),
(56, 4, '81T45605VB754674G', 'COMPLETED', 50.00, 'GBP', '2025-03-20 11:16:06', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 11:16:06', '2025-05-23 09:40:23', 'old', '', 0),
(57, 4, '0SJ66253GF050474T', 'COMPLETED', 196.00, 'GBP', '2025-03-20 11:36:59', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 11:36:59', '2025-05-23 09:40:23', 'old', '', 0),
(58, NULL, '1X931193BP570271H', 'COMPLETED', 25.00, 'GBP', '2025-03-20 12:29:09', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 12:29:10', '2025-05-23 09:40:23', 'old', '', 0),
(59, 4, '18550864T1412125X', 'COMPLETED', 25.00, 'GBP', '2025-03-20 12:30:21', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-20 12:30:21', '2025-05-23 09:40:23', 'old', '', 0),
(60, 66, '10G38540C69982738', 'COMPLETED', 30.00, 'GBP', '2025-03-29 14:44:17', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-03-29 14:44:17', '2025-05-23 09:40:23', 'old', '', 0),
(61, 66, '28265570Y13446136', 'COMPLETED', 25.00, 'GBP', '2025-04-02 21:04:59', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-04-02 21:05:00', '2025-05-23 09:40:23', 'old', '', 0),
(62, 66, '9BV371714W6234508', 'COMPLETED', 122.00, 'GBP', '2025-04-02 21:06:22', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', '', '2025-04-02 21:06:23', '2025-05-23 09:40:23', 'old', '', 0),
(63, 5, '39S77924NM415135S', 'COMPLETED', 50.00, 'GBP', '2025-04-06 10:34:58', 'John Doe', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', '341/9 Easter Road', 'Edinburgh', 'MIDLOTHIAN', 'EH6 8JG', 'GB', '', '2025-04-06 10:34:58', '2025-05-23 09:40:23', 'old', '', 0),
(71, 69, '94A920614T8824834', 'COMPLETED', 29.00, 'GBP', '2025-04-22 13:16:54', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-22 13:16:55', '2025-05-23 09:40:23', 'old', '', 0),
(72, 5, '8AK25908MG332991U', 'COMPLETED', 54.00, 'GBP', '2025-04-23 18:45:33', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 18:45:34', '2025-05-23 09:40:23', 'old', '', 0),
(73, 5, '70E49544SW319914H', 'COMPLETED', 79.00, 'GBP', '2025-04-23 18:52:14', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 18:52:14', '2025-05-23 09:40:23', 'old', '', 0),
(74, 5, '2L1127727T4446948', 'COMPLETED', 79.00, 'GBP', '2025-04-23 18:53:27', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 18:53:28', '2025-05-23 09:40:23', 'old', '', 0),
(75, 5, '00B01542VF859200V', 'COMPLETED', 79.00, 'GBP', '2025-04-23 18:55:19', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 18:55:20', '2025-05-23 09:40:23', 'old', '', 0),
(76, 5, '6CT58088L0721121J', 'COMPLETED', 79.00, 'GBP', '2025-04-23 18:59:57', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 18:59:58', '2025-05-23 09:40:23', 'old', '', 0),
(77, 5, '9GC45068GP3877335', 'COMPLETED', 50.00, 'GBP', '2025-04-23 19:02:14', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-04-23 19:02:15', '2025-05-23 09:40:23', 'old', '', 0),
(78, 69, '04S06716208124218', 'COMPLETED', 98.00, 'GBP', '2025-05-07 08:46:09', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-05-07 08:46:10', '2025-05-23 09:40:23', 'old', '', 0),
(79, 69, '2BM638959C279520J', 'COMPLETED', 155.54, 'GBP', '2025-05-07 09:43:25', 'Zbigniew Grabarczyk', 'sb-keorm38206390@personal.example.com', 'TKNRSCRZFYPAS', '', 'GB', 'Whittaker House', 'Richmond', 'Surrey', 'TW9 1EH', 'GB', 'Zbigniew Grabarczyk', '2025-05-07 09:43:25', '2025-05-23 09:40:23', 'old', 'express', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `size` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `size`, `created_at`) VALUES
(58, 53, 5, 2, 50.00, '4', '2025-03-20 10:06:00'),
(59, 53, 4, 4, 25.00, '7', '2025-03-20 10:06:00'),
(60, 54, 4, 2, 25.00, '7', '2025-03-20 10:12:08'),
(61, 54, 1, 2, 22.00, '11', '2025-03-20 10:12:08'),
(62, 55, 1, 1, 22.00, '3', '2025-03-20 10:16:51'),
(63, 55, 2, 2, 33.00, '3', '2025-03-20 10:16:51'),
(64, 56, 4, 1, 25.00, '7', '2025-03-20 11:16:06'),
(65, 56, 4, 1, 25.00, '8', '2025-03-20 11:16:06'),
(66, 57, 29, 2, 98.00, '4', '2025-03-20 11:36:59'),
(67, 58, 4, 1, 25.00, '8', '2025-03-20 12:29:10'),
(68, 59, 4, 1, 25.00, '7', '2025-03-20 12:30:21'),
(69, 60, 16, 1, 30.00, '13', '2025-03-29 14:44:17'),
(70, 61, 4, 1, 25.00, '9', '2025-04-02 21:05:00'),
(71, 62, 18, 1, 20.00, '3', '2025-04-02 21:06:23'),
(72, 62, 1, 1, 22.00, '3', '2025-04-02 21:06:23'),
(73, 62, 4, 1, 25.00, '7', '2025-04-02 21:06:23'),
(74, 62, 17, 1, 25.00, '3', '2025-04-02 21:06:23'),
(75, 62, 16, 1, 30.00, '3', '2025-04-02 21:06:23'),
(76, 63, 5, 1, 50.00, '3', '2025-04-06 10:34:58'),
(85, 71, 17, 1, 25.00, '3', '2025-04-22 13:16:55'),
(86, 72, 4, 2, 25.00, '7', '2025-04-23 18:45:34'),
(87, 73, 4, 3, 25.00, '7', '2025-04-23 18:52:14'),
(88, 74, 4, 3, 25.00, '7', '2025-04-23 18:53:28'),
(89, 75, 4, 3, 25.00, '7', '2025-04-23 18:55:20'),
(90, 76, 4, 3, 25.00, '7', '2025-04-23 18:59:58'),
(91, 77, 4, 2, 25.00, '7', '2025-04-23 19:02:15'),
(92, 78, 29, 1, 98.00, '3', '2025-05-07 08:46:10'),
(93, 79, 4, 7, 25.00, '7', '2025-05-07 09:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_img4` varchar(255) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_views` int(11) NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_img`, `product_price`, `product_img2`, `product_img3`, `product_img4`, `product_desc`, `product_views`, `data_status`) VALUES
(1, 'adidas Anthony Edwards 1 Low', 'img1.WEBP', 22, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Lightweight and responsive, this low-top sneaker is designed for speed and agility on the court, inspired by NBA star Anthony Edwards.', 130, 'old'),
(2, 'adidas Campus 00s', 'img1.WEBP', 33, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Classic and versatile, the adidas Campus 00s combines retro styling with modern comfort for everyday wear.', 41, 'old'),
(3, 'adidas Megaride', 'img1.WEBP', 33, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A futuristic running shoe built for maximum cushioning and energy return, perfect for long-distance performance.', 56, 'old'),
(4, 'Converse Chuck 70 High', 'img1.WEBP', 25, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'An elevated take on the iconic Chuck Taylor, featuring premium materials and a timeless high-top silhouette.', 38, 'old'),
(5, 'Converse Chuck Taylor All Star City Trek', 'img1.WEBP', 50, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Urban-ready Chucks with rugged features and weather-resistant design, ideal for exploring the city.', 105, 'old'),
(6, 'Converse Pl Vulc Pro', 'img1.WEBP', 55, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Skate-inspired sneakers with enhanced grip and durability for both style and performance on and off the board.', 51, 'old'),
(7, 'Jordan Flight Court', 'img1.WEBP', 60, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Engineered for court dominance, this basketball shoe offers excellent support and bold Jordan branding.', 134, 'old'),
(8, 'Jordan One Take 5', 'img1.WEBP', 45, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A dynamic, lightweight basketball shoe designed for quick cuts and explosive movements.', 40, 'old'),
(9, 'Jordan Retro 11', 'img1.WEBP', 40, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A beloved classic, the Retro 11 combines sleek patent leather and unparalleled comfort for iconic streetwear style.', 25, 'old'),
(10, 'Jordan Spizike Low', 'img1.WEBP', 65, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A hybrid silhouette blending Jordan’s most iconic elements into a sleek and stylish low-top design.', 42, 'old'),
(11, 'Jordan Tatum 3', 'img1.WEBP', 75, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Signature performance footwear tailored for Jayson Tatum’s game, offering style and top-tier court functionality.', 65, 'old'),
(12, 'New Balance 327', 'img1.WEBP', 85, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A modern twist on retro running styles, the 327 stands out with bold designs and cushioned comfort.', 51, 'old'),
(13, 'Nike Air Force 1 Low', 'img1.WEBP', 95, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A timeless legend, the Air Force 1 Low features clean lines and durable materials for everyday wearability.', 109, 'old'),
(14, 'Nike Dunk Low', 'img1.WEBP', 105, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'An icon of sneaker culture, the Dunk Low delivers bold colorways and versatility for any look.', 33, 'old'),
(15, 'Nike G.T. Hustle Academy', 'img1.WEBP', 35, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Built for the fast-paced player, this basketball shoe provides lightweight support and responsive cushioning.', 47, 'old'),
(16, 'Nike Lebron', 'img1.WEBP', 30, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'High-performance footwear inspired by LeBron James, built for power, speed, and impact on the court.', 19, 'old'),
(17, 'Nike Lunar Force 1 Duckboot', 'img1.WEBP', 25, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A rugged, weatherproof take on the classic Air Force 1, perfect for cold and wet conditions.', 103, 'old'),
(18, 'Nike Precision 7', 'img1.WEBP', 20, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A sleek and lightweight basketball shoe designed for precision movements and lasting comfort.', 23, 'old'),
(19, 'Vans Old Skool', 'img1.WEBP', 100, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A skateboarding classic with timeless design, durable materials, and versatile everyday wear.', 31, 'old'),
(25, 'PARK CORD', 'img1.WEBP', 150, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Winter-ready Chucks with durable materials and enhanced traction for cold weather.', 29, 'old'),
(26, 'ROLLER', 'img1.WEBP', 76, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A retro-inspired high-top sneaker with premium materials and bold adidas branding.', 26, 'old'),
(27, 'PEAR', 'img1.WEBP', 79, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A chic and lightweight lifestyle sneaker, perfect for casual outfits and everyday comfort.', 22, 'old'),
(28, 'Puma Suede XL', 'img1.WEBP', 88, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'Celebrate greatness with the Jordan MVP, featuring a design inspired by championship moments.', 23, 'old'),
(29, 'Nike Dunk High', 'img1.WEBP', 98, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A retro basketball sneaker brought back for modern street style and unmatched comfort.', 121, 'old'),
(30, 'Converse Pc2 Wntr', 'img1.WEBP', 88, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A lightweight and breathable running shoe built for consistent performance and durability.', 188, 'old'),
(31, 'adidas Forum 84 High', 'img1.WEBP', 79, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A premium running shoe offering advanced cushioning and support for long-distance runs.', 28, 'old'),
(32, 'Puma Lajla', 'img1.WEBP', 77, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A timeless classic in sneaker history, combining comfort, durability, and iconic style.', 18, 'old'),
(33, 'Jordan Mvp', 'img1.WEBP', 84, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A streetwear staple, the Samba OG offers vintage vibes and unmatched versatility.', 20, 'old'),
(34, 'New Balance 550', 'img1.WEBP', 97, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A mid-top version of the iconic Jordan 1, balancing heritage and contemporary appeal.', 28, 'old'),
(35, 'Nike Downshifter 12', 'img1.WEBP', 66, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'A retro-inspired sneaker celebrating Arizona’s desert tones with modern Puma aesthetics.', 70, 'old'),
(36, 'Nike Zoom Vomero 5', 'img1.WEBP', 98, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike Zoom Vomero 5 is a premium running shoe that combines advanced cushioning and breathable materials with a sleek, retro-inspired design, offering unparalleled comfort and support for long-distance runs.', 27, 'old'),
(37, 'Nike Air Force 1', 'img1.WEBP', 66, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike Air Force 1 is a timeless classic, featuring a clean and durable design that has stood the test of time. With its iconic silhouette, premium materials, and unmatched comfort, it\'s a versatile sneaker perfect for both everyday wear and making bold style statements.', 86, 'old'),
(38, 'adidas Samba OG', 'img1.WEBP', 44, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The adidas Samba OG is a true classic, blending vintage design with modern versatility. Originally designed for indoor soccer, its sleek silhouette, premium materials, and iconic gum sole make it a staple for streetwear and casual looks alike.', 28, 'old'),
(39, 'Jordan 1 Mid', 'img1.WEBP', 75, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Jordan 1 Mid offers a fresh take on the iconic original, featuring a mid-top design that balances classic heritage with modern style. With premium materials, bold colorways, and exceptional comfort, it’s perfect for both the court and everyday wear.', 65, 'old'),
(40, 'Puma Arizona Retro', 'img1.WEBP', 110, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Puma Arizona Retro combines vintage vibes with modern comfort, offering a sleek and casual design. With its retro-inspired look, premium suede materials, and lightweight feel, it’s perfect for everyday wear and adds a stylish touch to any outfit.', 29, 'old'),
(41, 'Puma Mb.04', 'img1.WEBP', 76, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike Precision 7 is a lightweight basketball sneaker designed for agility and quick movements on the court. It features responsive cushioning, durable traction, and ankle support, making it ideal for both casual and competitive play.', 17, 'old'),
(42, 'Puma Suede One Piece', 'img1.WEBP', 66, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Puma Suede One Piece is a special edition sneaker inspired by the iconic anime series One Piece. Featuring unique design elements, premium suede materials, and exclusive branding, this sneaker is a must-have for collectors and fans of both Puma and the anime culture.', 35, 'old'),
(43, 'adidas Nmd G1', 'img1.WEBP', 99, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Adidas NMD G1 is a modern lifestyle sneaker that blends comfort and style. Featuring a sleek design, Boost cushioning for all-day support, and a breathable upper, it is perfect for everyday wear and street-style fashion.', 18, 'old'),
(44, 'UGG Ca78 Tasman', 'img1.WEBP', 77, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The UGG CA78 Tasman combines the brand\'s signature comfort with a stylish, sneaker-inspired design. Featuring a suede upper, plush lining, and a cushioned sole, it offers a cozy yet fashionable option for everyday wear.', 49, 'old'),
(45, 'Nike Air Max 2013', 'img1.WEBP', 77, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike Air Max 2013 is a performance-driven sneaker featuring a full-length Air unit for maximum cushioning and impact absorption. With a breathable mesh upper and a flexible design, it provides comfort and support for both athletic activities and casual wear.', 32, 'old'),
(46, 'Nike Zoom Vomero Roam', 'img1.WEBP', 66, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike Zoom Vomero Roam blends comfort and style, featuring a cushioned Zoom Air midsole for a soft ride and a sleek design suited for everyday wear. With a breathable upper and durable outsole, it offers a perfect mix of functionality and street-style appeal.', 26, 'old'),
(47, 'Salomon ACS+FT', 'img1.WEBP', 55, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Salomon ACS+FT is designed for outdoor performance, offering durability and comfort for rugged terrain. With advanced cushioning, a grippy sole, and weather-resistant materials, it is ideal for hiking, trail running, and other outdoor activities. The robust build and supportive features make it perfect for those who enjoy exploring the great outdoors.', 15, 'old'),
(48, 'Jordan Aj38', 'img1.WEBP', 55, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Jordan AJ38 is a high-performance basketball sneaker, built to provide excellent support, stability, and responsiveness on the court. Featuring advanced cushioning technology and a lightweight design, it\'s perfect for athletes looking for a sneaker that enhances both speed and agility during intense games. The iconic Jordan branding adds a stylish touch, making it a standout choice for basketball players and sneaker enthusiasts alike.', 21, 'old'),
(49, 'Jordan Luka 2', 'img1.WEBP', 98, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Jordan Luka 2 is a basketball sneaker designed for agility and performance on the court. Inspired by NBA star Luka Dončić, it features advanced cushioning for comfort, superior traction for quick movements, and a sleek design. The lightweight, responsive build ensures maximum support during intense play, making it a great choice for athletes looking to elevate their game while showcasing their', 46, 'old'),
(50, 'Nike G.T. Hustle 2', 'img1.WEBP', 76, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Nike G.T. Hustle 2 is a high-performance basketball sneaker designed for explosive speed and support. With a durable, traction-driven sole and responsive cushioning, it offers stability during sharp cuts and jumps. The sleek, modern design combined with advanced materials makes it ideal for athletes who demand both style and functionality on the court. Whether you\'re playing or training, the G.T. Hustle 2 provides the comfort and durability needed for intense basketball sessions.', 43, 'old'),
(51, 'Lacoste T-clip', 'img1.WEBP', 77, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Lacoste T-Clip combines sporty style with everyday comfort. Featuring a sleek design, high-quality leather upper, and durable rubber sole, it offers both style and versatility for casual wear. The sneaker is perfect for those who want a fashionable yet comfortable option for daily activities, with the signature Lacoste branding adding a touch of sophistication. Its timeless look works well with various outfits, making it a go-to choice for stylish, laid-back occasions.', 17, 'old'),
(52, 'adidas SL 72 RS', 'img1.WEBP', 120, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Adidas SL 72 RS is a throwback to the iconic 70s, blending retro design with modern comfort. Originally designed as a running shoe, it features a classic silhouette with suede and nylon materials, offering a lightweight and stylish option for everyday wear. With a vintage-inspired look and a cushioned sole, the SL 72 RS provides both nostalgic appeal and all-day comfort, making it a great choice for those who appreciate timeless sneaker designs.', 66, 'old'),
(53, 'adidas LA Trainer 1', 'img1.WEBP', 66, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Adidas LA Trainer 1 is a classic sneaker with a rich heritage, originally designed for the 1984 Los Angeles Olympics. Featuring a lightweight mesh and suede upper, it incorporates the iconic three-stripes design and a comfortable EVA midsole for cushioning. Its timeless look, combined with the innovative cushioning technology of its time, makes it a great choice for sneaker enthusiasts who appreciate vintage designs and a stylish, versatile shoe for casual wear.', 65, 'old'),
(54, 'Converse Chuck Taylor All Star Hi', 'img1.WEBP', 88, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Converse Chuck Taylor All Star Hi is an iconic high-top sneaker that has stood the test of time. Known for its classic canvas upper, rubber toe cap, and signature Chuck Taylor patch, it combines casual style with comfort. Originally designed for basketball, the Chuck Taylor All Star Hi has evolved into a staple in streetwear fashion, making it perfect for everyday wear. Its versatile design and rich history make it a go-to sneaker for those looking for a blend of style and practicality.', 40, 'old'),
(55, 'Converse Ctas Hi', 'img1.WEBP', 76, 'img2.WEBP', 'img3.WEBP', 'img4.WEBP', 'The Converse CTAS Hi (Chuck Taylor All Star Hi) is a modern take on the classic high-top sneaker. Featuring a durable canvas upper, rubber toe cap, and the signature Chuck Taylor patch, it offers a timeless, streetwear-ready look. Whether paired with casual or semi-casual outfits, the CTAS Hi delivers comfort and versatility, making it a staple in everyday sneaker collections. Its clean design and legacy in the world of fashion make it a go-to option for those seeking both style and comfort.', 29, 'old'),
(57, 'Nike SB Dunk Low', 'img1.webp', 56, 'img2.webp', 'img3.webp', 'img4.webp', 'Honoring the legacy of Black cowboys in Western history. The Nike SB Dunk Low BHM blends cultural storytelling with bold design. From Sonora-style embroidery to lasso-inspired branding, every detail pays tribute to the spirit of the frontier.', 32, 'old'),
(58, 'Air Jordan 1 Retro Low OG SP', 'img1.webp', 56, 'img2.webp', 'img3.webp', 'img4.webp', 'The Travis Scott x Air Jordan 1 Low \"Velvet Brown\" is a limited-edition collaboration featuring a premium suede construction and a distinctive Dark Mocha and Black color scheme. ', 30, 'old'),
(59, 'Air Jordan 1 Retro High', 'img1.webp', 111, 'img2.webp', 'img3.webp', 'img4.webp', 'The Travis Scott x Air Jordan 1 features Red Nike and Cactus Jack tongue labels. But the most notable feature is the logo \"Cactus Jack\" on the tongue and other finishes including a secret pocket in the lining of the pair.', 44, 'old'),
(60, 'Nike x Travis Scott Air Force 1 Low', 'img1.webp', 444, 'img2.webp', 'img3.webp', 'img4.webp', ' Nike Nike x Travis Scott Air Force 1 Low \'Cactus Jack\' CN2405-900 Mens £296 afterpay  Select your size  SELECT SIZE  Authenticity Guaranteed We only sell authentic products from verified brand partners and retail partners globally. Authenticity PRODUCT INFORMATION Model CN2405-900 Release Date 2019-11-15 Series Air Force Nickname Cactus Jack Thickness Regular Sole Upper Material Leather Closure Lacing Sole Material Rubber Sole Upper Low Top Toe Type Round Toe Style Street Style Occasion lifesty', 33, 'old');

-- --------------------------------------------------------

--
-- Table structure for table `product_year`
--

CREATE TABLE `product_year` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description_1` varchar(255) NOT NULL,
  `header_1` varchar(255) NOT NULL,
  `description_2` varchar(255) NOT NULL,
  `header_2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_year`
--

INSERT INTO `product_year` (`id`, `product_id`, `description_1`, `header_1`, `description_2`, `header_2`) VALUES
(1, 11, 'The Jordan Tatum 3 is built for explosive play with a lightweight structure that doesn\\\'t compromise on stability. Designed in collaboration with Jayson Tatum, this sneaker features targeted support zones and ultra-responsive cushioning, giving players th', 'Lightweight Performance, Bold Design', 'Beyond its performance capabilities, the Tatum 3 brings serious style. Sleek lines, bold colorways, and premium materials make it just as striking off the court as it is on it. Whether you\\\'re hooping or hanging out, this is a sneaker that makes a stateme', 'Built for the Court, Styled for the Street');

-- --------------------------------------------------------

--
-- Table structure for table `rel_categories_products`
--

CREATE TABLE `rel_categories_products` (
  `cat_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rel_categories_products`
--

INSERT INTO `rel_categories_products` (`cat_id`, `prod_id`, `id`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 3, 3),
(2, 4, 4),
(2, 5, 5),
(1, 6, 6),
(2, 7, 7),
(1, 8, 8),
(2, 9, 9),
(1, 10, 10),
(2, 11, 11),
(1, 12, 12),
(2, 13, 13),
(1, 14, 14),
(2, 15, 15),
(1, 16, 16),
(2, 17, 17),
(1, 18, 18),
(2, 19, 19),
(2, 25, 25),
(2, 26, 26),
(2, 27, 27),
(2, 28, 28),
(3, 29, 29),
(2, 30, 30),
(2, 31, 31),
(2, 32, 32),
(2, 33, 33),
(2, 34, 34),
(2, 35, 35),
(2, 36, 36),
(2, 37, 37),
(2, 38, 38),
(2, 39, 39),
(2, 40, 40),
(1, 41, 41),
(1, 42, 42),
(1, 43, 43),
(1, 44, 44),
(1, 45, 45),
(1, 46, 46),
(1, 47, 47),
(1, 48, 48),
(1, 49, 49),
(1, 50, 50),
(1, 51, 51),
(3, 52, 52),
(3, 53, 53),
(1, 54, 54),
(1, 55, 55),
(3, 57, 57),
(3, 58, 58),
(3, 59, 59),
(3, 60, 60);

-- --------------------------------------------------------

--
-- Table structure for table `rel_products_brands`
--

CREATE TABLE `rel_products_brands` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rel_products_brands`
--

INSERT INTO `rel_products_brands` (`id`, `brand_id`, `product_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 3, 4),
(5, 3, 5),
(6, 3, 6),
(7, 4, 7),
(8, 4, 8),
(9, 4, 9),
(10, 4, 10),
(11, 4, 11),
(12, 9, 12),
(13, 1, 13),
(14, 1, 14),
(15, 1, 15),
(16, 1, 16),
(17, 1, 17),
(18, 1, 18),
(19, 5, 19),
(20, 6, 20),
(22, 10, 27),
(23, 8, 28),
(24, 1, 29),
(25, 3, 30),
(26, 2, 31),
(27, 8, 32),
(28, 4, 33),
(29, 9, 34),
(30, 1, 35),
(31, 1, 36),
(32, 1, 37),
(33, 2, 38),
(34, 4, 39),
(35, 8, 40),
(36, 8, 41),
(37, 8, 42),
(38, 2, 43),
(39, 10, 44),
(40, 1, 45),
(41, 1, 46),
(42, 11, 47),
(43, 4, 48),
(44, 4, 49),
(45, 1, 50),
(46, 12, 51),
(47, 2, 52),
(48, 2, 53),
(49, 3, 54),
(50, 3, 55),
(51, 1, 58),
(52, 1, 57),
(53, 4, 58),
(54, 4, 59),
(55, 1, 60),
(56, 6, 25);

-- --------------------------------------------------------

--
-- Table structure for table `rel_products_sizes`
--

CREATE TABLE `rel_products_sizes` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rel_products_sizes`
--

INSERT INTO `rel_products_sizes` (`id`, `prod_id`, `size_id`, `stock`) VALUES
(2, 1, 2, 4),
(6, 2, 1, 8),
(7, 2, 2, 2),
(8, 2, 3, 5),
(9, 2, 4, 9),
(10, 2, 5, 3),
(11, 3, 1, 3),
(12, 3, 2, 9),
(13, 3, 3, 5),
(14, 3, 4, 8),
(15, 3, 5, 8),
(17, 4, 7, 6),
(18, 4, 8, 6),
(19, 4, 9, 3),
(20, 4, 10, 4),
(26, 6, 8, 1),
(27, 6, 9, 4),
(28, 6, 10, 6),
(29, 6, 11, 2),
(30, 6, 12, 1),
(36, 8, 4, 6),
(37, 8, 5, 4),
(38, 8, 6, 8),
(39, 8, 7, 4),
(40, 8, 8, 2),
(41, 9, 5, 5),
(42, 9, 6, 3),
(43, 9, 7, 9),
(44, 9, 8, 9),
(45, 9, 9, 6),
(46, 10, 6, 3),
(47, 10, 7, 5),
(48, 10, 8, 7),
(49, 10, 9, 1),
(50, 10, 10, 3),
(51, 11, 7, 9),
(52, 11, 8, 1),
(53, 11, 9, 6),
(54, 11, 10, 6),
(55, 11, 11, 5),
(56, 12, 8, 6),
(57, 12, 9, 6),
(58, 12, 10, 2),
(59, 12, 11, 1),
(60, 12, 12, 5),
(66, 14, 10, 1),
(67, 14, 11, 3),
(68, 14, 12, 1),
(69, 14, 13, 5),
(70, 14, 1, 4),
(71, 15, 11, 2),
(72, 15, 12, 7),
(73, 15, 13, 4),
(74, 15, 1, 6),
(75, 15, 2, 7),
(76, 16, 12, 8),
(77, 16, 13, 3),
(78, 16, 1, 7),
(79, 16, 2, 8),
(80, 16, 3, 8),
(81, 17, 13, 9),
(82, 17, 1, 9),
(83, 17, 2, 9),
(84, 17, 3, 9),
(85, 17, 4, 9),
(86, 18, 1, 9),
(87, 18, 2, 1),
(88, 18, 3, 1),
(89, 18, 4, 5),
(90, 18, 5, 2),
(91, 19, 2, 4),
(92, 19, 3, 2),
(93, 19, 4, 9),
(94, 19, 5, 2),
(95, 19, 6, 8),
(96, 20, 3, 8),
(97, 20, 4, 8),
(98, 20, 5, 6),
(99, 20, 6, 6),
(100, 20, 7, 3),
(101, 21, 4, 3),
(102, 21, 5, 8),
(103, 21, 6, 1),
(104, 21, 7, 7),
(105, 21, 8, 7),
(106, 22, 5, 4),
(107, 22, 6, 6),
(108, 22, 7, 8),
(109, 22, 8, 4),
(110, 22, 9, 6),
(111, 23, 6, 6),
(112, 23, 7, 4),
(113, 23, 8, 3),
(114, 23, 9, 8),
(115, 23, 10, 7),
(116, 24, 7, 9),
(117, 24, 8, 5),
(118, 24, 9, 5),
(119, 24, 10, 1),
(120, 24, 11, 8),
(121, 25, 8, 9),
(122, 25, 9, 3),
(123, 25, 10, 3),
(124, 25, 11, 9),
(125, 25, 12, 7),
(131, 27, 10, 6),
(132, 27, 11, 9),
(133, 27, 12, 5),
(134, 27, 13, 1),
(135, 27, 1, 7),
(136, 28, 11, 5),
(137, 28, 12, 1),
(138, 28, 13, 2),
(139, 28, 1, 4),
(140, 28, 2, 6),
(141, 29, 12, 1),
(142, 29, 13, 1),
(143, 29, 1, 3),
(144, 29, 2, 7),
(145, 29, 3, 4),
(156, 32, 2, 6),
(157, 32, 3, 7),
(158, 32, 4, 9),
(159, 32, 5, 6),
(160, 32, 6, 1),
(161, 33, 3, 3),
(162, 33, 4, 5),
(163, 33, 5, 7),
(164, 33, 6, 9),
(165, 33, 7, 6),
(166, 34, 4, 1),
(167, 34, 5, 5),
(168, 34, 6, 6),
(169, 34, 7, 2),
(170, 34, 8, 2),
(171, 35, 5, 2),
(172, 35, 6, 4),
(173, 35, 7, 6),
(174, 35, 8, 7),
(175, 35, 9, 7),
(176, 36, 6, 3),
(177, 36, 7, 4),
(178, 36, 8, 3),
(179, 36, 9, 3),
(180, 36, 10, 3),
(181, 37, 7, 8),
(182, 37, 8, 1),
(183, 37, 9, 9),
(184, 37, 10, 3),
(185, 37, 11, 8),
(186, 38, 8, 4),
(187, 38, 9, 4),
(188, 38, 10, 8),
(189, 38, 11, 2),
(190, 38, 12, 9),
(196, 40, 10, 5),
(197, 40, 11, 8),
(198, 40, 12, 6),
(199, 40, 13, 6),
(200, 40, 1, 4),
(202, 41, 4, 6),
(203, 41, 6, 8),
(204, 42, 7, 5),
(205, 42, 8, 4),
(206, 42, 9, 6),
(207, 42, 12, 5),
(208, 43, 6, 6),
(209, 43, 8, 5),
(210, 44, 8, 10),
(211, 44, 9, 10),
(212, 45, 12, 5),
(213, 45, 11, 11),
(214, 46, 4, 5),
(215, 46, 8, 3),
(216, 48, 6, 5),
(217, 48, 12, 11),
(218, 49, 9, 10),
(219, 49, 12, 10),
(220, 50, 6, 18),
(221, 50, 12, 6),
(222, 51, 8, 5),
(223, 51, 12, 8),
(224, 52, 12, 5),
(225, 52, 9, 11),
(226, 53, 12, 10),
(227, 53, 11, 10),
(228, 54, 7, 5),
(229, 54, 11, 3),
(231, 66, 12, 15),
(236, 1, 10, 10),
(237, 1, 1, 11),
(246, 5, 1, 10),
(247, 5, 3, 11),
(248, 5, 8, 11),
(249, 31, 14, 10),
(250, 31, 4, 11),
(251, 30, 14, 10),
(252, 30, 1, 11),
(253, 39, 14, 11),
(254, 39, 1, 10),
(255, 39, 3, 88),
(256, 13, 14, 11),
(257, 26, 14, 10),
(258, 26, 1, 10),
(259, 26, 3, 11),
(260, 26, 4, 11),
(261, 7, 14, 10),
(263, 47, 10, 10),
(264, 55, 11, 10),
(265, 55, 7, 10),
(266, 60, 10, 11),
(267, 59, 11, 44),
(268, 58, 12, 22),
(269, 57, 11, 22),
(270, 49, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rel_types_products`
--

CREATE TABLE `rel_types_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rel_types_products`
--

INSERT INTO `rel_types_products` (`id`, `product_id`, `type_id`) VALUES
(2, 2, 3),
(3, 3, 1),
(4, 4, 4),
(5, 5, 4),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 5),
(10, 10, 3),
(12, 12, 3),
(13, 13, 3),
(14, 14, 3),
(16, 16, 1),
(17, 17, 2),
(18, 18, 1),
(19, 19, 3),
(26, 25, 3),
(27, 26, 3),
(28, 27, 3),
(30, 29, 4),
(31, 30, 4),
(32, 31, 3),
(33, 32, 3),
(35, 34, 2),
(36, 35, 2),
(37, 36, 2),
(38, 37, 10),
(39, 38, 10),
(40, 39, 4),
(41, 40, 7),
(42, 41, 1),
(43, 42, 5),
(44, 43, 3),
(45, 44, 10),
(46, 45, 10),
(47, 46, 2),
(48, 47, 2),
(49, 48, 2),
(50, 49, 5),
(52, 51, 10),
(54, 53, 7),
(55, 54, 4),
(56, 55, 4),
(57, 55, 3),
(58, 2, 7),
(59, 10, 7),
(60, 14, 7),
(61, 12, 7),
(62, 6, 10),
(67, 57, 1),
(68, 57, 2),
(69, 58, 1),
(70, 58, 3),
(71, 58, 4),
(72, 59, 1),
(73, 59, 2),
(74, 59, 4),
(75, 60, 3),
(76, 60, 8),
(77, 52, 5),
(78, 52, 7),
(79, 50, 2),
(80, 50, 5),
(81, 28, 5),
(82, 28, 7),
(83, 33, 1),
(84, 33, 5),
(85, 15, 1),
(86, 15, 5),
(87, 11, 1),
(88, 11, 5),
(89, 1, 1),
(90, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size`) VALUES
(1, 3),
(3, 4),
(4, 5),
(5, 6),
(6, 7),
(7, 8),
(8, 9),
(9, 10),
(10, 11),
(11, 12),
(12, 13),
(13, 14),
(14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `surname`, `image`, `role`, `description`, `data_status`) VALUES
(1, 'Liam', 'Foster', 'team/img_1.jpg', 'Admin', 'Liam oversees the core operations of the online store, ensuring Liam oversees the core operations of the online store, ensuring everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.Liam oversees the core operations of the online store, ensuring everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.Liam oversees the core operations of the online store, ensuring everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.Liam oversees the core operations of the online store, ensuring everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.Liam oversees the core operations of the online store, ensuring everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.everything runs securely and efficiently. He manages user roles and product updates. With a background in IT management, Liam ensures the platform remains robust.', 'old'),
(2, 'Ava', 'Montgomery', 'team/img_2.jpg', 'Marketing Manager', 'Ava leads all digital marketing efforts, from email campaigns to the “Sneaker of the Month” feature. She ensures the brand reaches style-conscious buyers across the UK. Ava\'s keen eye for trends helps drive engagement and sales.', 'old'),
(3, 'Noah', 'Delgado', 'team/img_3.jpg', 'Developer', 'Noah is responsible for developing and maintaining the e-commerce platform. He implements user-friendly design and ensures full mobile responsiveness. Noah also manages website integrations and performance optimization.', 'old'),
(4, 'Isla', 'Harrington', 'team/img_4.jpg', 'Inventory Manager', 'Isla keeps track of all stock, including rare and limited-edition sneakers. She updates product listings and ensures availability across the system. Her attention to detail helps maintain smooth logistics.', 'old'),
(5, 'Elijah', 'Stone', 'team/img_5.jpg', 'Admin', 'Elijah handles backend administration tasks and supports secure data handling. He assists with system monitoring and user account management. His technical knowledge ensures the site remains compliant and protected.', 'old'),
(6, 'Maya', 'Whitaker', 'team/img_6.jpg', 'Marketing Manager', 'Maya focuses on social media strategy and influencer partnerships. She curates visual content that resonates with the urban fashion audience. Her campaigns spotlight the most exclusive sneaker drops.', 'old'),
(7, 'Oliver', 'Grant', 'team/img_7.jpg', 'Developer', 'Oliver builds custom features for the website, including the admin panel. He ensures all functionalities are accessible and standards-compliant. Oliver is also in charge of cross-browser testing and bug fixing.', 'old'),
(8, 'Sophia', 'Reed', 'team/img_8.jpg', 'Inventory Manager', 'Sophia monitors incoming shipments and updates the product catalog daily. She collaborates with suppliers to secure exclusive releases. Her organizational skills help avoid stock-outs and overselling.', 'old'),
(9, 'Lucas', 'Khan', 'team/img_9.jpg', 'Developer', 'Lucas specializes in front-end development, ensuring the website looks clean and modern. He optimizes page load speeds and implements animations. His designs reflect the tastes of Shoreditch’s sneakerheads.', 'old'),
(10, 'Zoe', 'Bennett', 'team/img_10.jpg', 'Admin', 'Zoe handles content approvals and user permissions on the admin side. She helps keep the product and blog sections up-to-date. Zoe is also involved in onboarding new staff to the platform.', 'old'),
(11, 'Amelia', 'Shaw', 'team/img_11.jpg', 'Marketing Manager', 'Amelia runs targeted campaigns and oversees social media analytics. Her strategic insights help boost sneaker visibility. She’s a key player in brand engagement initiatives.', 'old'),
(12, 'Ethan', 'Price', 'team/img_12.jpg', 'Developer', 'Ethan works on backend infrastructure and system security. He ensures the database and APIs are optimized. His focus is speed, scalability, and uptime.', 'old'),
(13, 'Freya', 'Lewis', 'team/img_13.jpg', 'Inventory Manager', 'Freya ensures the stock database reflects real-time changes. She coordinates with suppliers and updates limited edition entries. Her efficiency helps prevent inventory mismatches.', 'old'),
(14, 'Harvey', 'Clark', 'team/img_14.jpg', 'Admin', 'Harvey maintains system access and user-level controls. He reviews site logs and permissions to ensure security. Harvey also supports internal operations and troubleshooting.', 'old'),
(15, 'Chloe', 'Dixon', 'team/img_15.jpg', 'Marketing Manager', 'Chloe crafts newsletter content and manages the influencer outreach program. She tailors promotions to sneaker collector communities. Her storytelling draws in niche buyers.', 'old'),
(16, 'Leo', 'Martin', 'team/img_16.jpg', 'Developer', 'Leo focuses on UI/UX improvements and accessibility features. He ensures the site meets modern design standards. His tweaks directly enhance user satisfaction.', 'old'),
(17, 'Ivy', 'Younga', 'team/img_17.jpg', 'Inventory Manager', 'Ivy tracks inbound logistics and syncs new arrivals to the storefront. She updates metadata for product visibility. Her quick actions reduce time-to-list.', 'old'),
(18, 'Jacob', 'Harper', 'team/img_18.jpg', 'Admin', 'Jacob helps onboard new employees and manages administrative credentials. He ensures process documentation is always current. Jacob’s organized approach boosts internal efficiency.', 'old'),
(19, 'Layla', 'Evans', 'team/img_19.jpg', 'Marketing Manager', 'Layla manages cross-channel ad campaigns and optimizes PPC strategy. Her focus is maximizing ROI on paid ads. She also experiments with viral sneaker drops.', 'old'),
(20, 'Oscar', 'Wells', 'team/img_20.jpg', 'Developer', 'Oscar builds reusable code components for the e-commerce system. He prioritizes performance and cross-platform functionality. His modular work supports rapid feature deployment.', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `type_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `type_name`, `type_img`) VALUES
(1, 'Sports Shoes', 'Sports Shoes.jpg'),
(2, 'Outdoor Shoes', 'Outdoor Shoes.jpg'),
(3, 'Casual Sneakers', 'Casual Sneakers.jpg'),
(4, 'Hi-Top Sneakers', 'Hi-Top Sneakers.jpg'),
(5, 'Limited Edition Collectibles', 'Limited Edition Collectibles.jpg'),
(7, 'Retro/Classic Sneakers', 'Classic Sneakers.jpg'),
(10, 'Seasonal Sneakers', 'Seasonal Sneakers.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_country` varchar(255) NOT NULL,
  `user_postcode` varchar(255) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `data_status` varchar(5) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `user_firstname`, `user_lastname`, `user_password`, `user_address`, `user_country`, `user_postcode`, `user_city`, `data_status`) VALUES
(5, 'admin', 'Adrian', 'Kotyra', '$2y$10$QyiGBw/d/SGEQF0yAxbCPO2sxhfjoQOJsRqDCE8pXw70LUifigkca', '341/9 Easter Road', 'United Kingdom', 'EH6 8JG', 'Edinburgh', 'old'),
(69, 'def12@wp.pl', 'Damian', 'Rich', '$2y$10$5fyx9xqKgZ93DjH2CHkuBOBUTWykr.wQWAUhzlQDEGMYRt58.4CHi', '', '', '', '', 'old'),
(70, 'mr.pintu0716@gmail.com', 'John', 'Malbro', '$2y$10$n0D7QFlPWtq2g2xmvBHwZuNhh9IF7a/j.anRyrOu0ZuS6ZWbi9qxy', '', '', '', '', 'old');

-- --------------------------------------------------------

--
-- Table structure for table `users_register`
--

CREATE TABLE `users_register` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `hash_password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `verification_token` varchar(255) NOT NULL,
  `token_expiry` datetime NOT NULL,
  `verification_code` varchar(6) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_register`
--

INSERT INTO `users_register` (`id`, `email`, `hash_password`, `firstname`, `surname`, `verification_token`, `token_expiry`, `verification_code`, `is_verified`, `created_at`) VALUES
(39, 'adriankotyra@yahoo.com', '$2y$10$cyCEMRndLo2/8sI4i/rr3OMFtkb1I5t8EXdhfB5ekw3i0Fh5tjDOW', 'Adrian', 'Kotyra', '', '0000-00-00 00:00:00', '418186', 1, '2025-03-29 15:28:10'),
(45, 'def12@wp.pl', '$2y$10$IDCBFgWafjdBPYBEALGxtufLk4tF5cb80f02UG0WVc.3srFpcacai', 'Damian', 'Rich', '', '0000-00-00 00:00:00', '909046', 1, '2025-04-19 18:13:06'),
(46, 'mr.pintu0716@gmail.com', '$2y$10$n0D7QFlPWtq2g2xmvBHwZuNhh9IF7a/j.anRyrOu0ZuS6ZWbi9qxy', 'John', 'Malbro', '', '0000-00-00 00:00:00', '274852', 1, '2025-05-05 12:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `user_password_reminder`
--

CREATE TABLE `user_password_reminder` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `reminder_token` varchar(255) NOT NULL,
  `token_expiry` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_verified` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_password_reminder`
--

INSERT INTO `user_password_reminder` (`id`, `email`, `reminder_token`, `token_expiry`, `created_at`, `is_verified`) VALUES
(2, 'adriankotyra@yahoo.com', '5bc34270eefa22303e25fce6fd04c5a83a9b0930e8a9663e706493e6f26db2a8', '2025-04-20 00:00:00', '2025-04-20 00:00:00', 0),
(24, 'def12@wp.pl', '', '0000-00-00 00:00:00', '2025-05-19 18:03:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`) VALUES
(89, 4, 29),
(125, 66, 29),
(126, 66, 8),
(127, 66, 4),
(133, 66, 5),
(147, 5, 35),
(148, 70, 1),
(149, 70, 3),
(150, 70, 6),
(151, 70, 37),
(155, 69, 4),
(156, 69, 39),
(157, 69, 17),
(158, 69, 34),
(159, 69, 35),
(160, 69, 36),
(161, 69, 7),
(162, 69, 6),
(163, 69, 10),
(164, 69, 1),
(165, 5, 1),
(166, 5, 45),
(167, 5, 8),
(168, 5, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_year`
--
ALTER TABLE `product_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rel_categories_products`
--
ALTER TABLE `rel_categories_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rel_products_brands`
--
ALTER TABLE `rel_products_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rel_products_sizes`
--
ALTER TABLE `rel_products_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rel_types_products`
--
ALTER TABLE `rel_types_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_register`
--
ALTER TABLE `users_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_password_reminder`
--
ALTER TABLE `user_password_reminder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `product_year`
--
ALTER TABLE `product_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rel_categories_products`
--
ALTER TABLE `rel_categories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `rel_products_brands`
--
ALTER TABLE `rel_products_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `rel_products_sizes`
--
ALTER TABLE `rel_products_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT for table `rel_types_products`
--
ALTER TABLE `rel_types_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users_register`
--
ALTER TABLE `users_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user_password_reminder`
--
ALTER TABLE `user_password_reminder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
