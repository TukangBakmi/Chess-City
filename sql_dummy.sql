-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2022 pada 18.55
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20212_wp2_412020031`
--
CREATE DATABASE IF NOT EXISTS `20212_wp2_412020031` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `20212_wp2_412020031`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('chesscity@gmail.com', '$2y$10$J84jWFiJsinaIjSlrp4ha.HhYVpwbzM9D//GPqtGQlBUKakn/gvaW');

-- --------------------------------------------------------

--
-- Struktur dari tabel `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Albert'),
(2, 'Leonard Barden'),
(12, 'Vanessa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `name`, `date`, `text`) VALUES
(3, 7, 'Michael Vin', '2022-06-29 12:54:35', 'Halo'),
(4, 1, 'Albert Ardiansyah', '2022-07-01 07:44:45', 'Good Job');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `image`) VALUES
(1, 'Gallery1', '62be3babaa9a6.jpg'),
(2, 'Gallery2', '62be3bba3f0ae.jpg'),
(3, 'Gallery3', '62be3bcc109d0.jpg'),
(4, 'Gallery4', '62be3bd77deb3.jpg'),
(5, 'Gallery5', '62be3be2a7431.jpg'),
(6, 'Gallery6', '62be3bedd9944.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `content` mediumtext NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `title`, `date`, `content`, `author_id`, `image`) VALUES
(6, 'Chess: Nepomniachtchi and Caruana lead in Madrid with Carlsen in sight', '2022-06-25', 'After six of the 14 rounds at the world championship Candidates in Madrid, Ian Nepomniachtchi and Fabiano Caruana, the 2021 and 2018 title challengers, have broken away from their rivals. The pair will meet in Monday’s ninth round (2pm start, live and free to watch on major chess websites) in what could be the tournament decider.  It is a surprise result so far, and one which may test the resolve of the world champion, Magnus Carlsen, who has said that he is unlikely to defend his crown again if the opponent is from his own generation. Carlsen and Nepomniachtchi are both 31, Caruana is 29. If the Norwegian, widely regarded as the No 1 chess player of all time, refuses to play, then under the rules the top two in Madrid will meet in a world championship series.', 2, '62bc480626ce3.png'),
(18, 'FIDE Announces New Knockout Format for Women\'s Candidates', '2022-07-04', 'On Wednesday, the International Chess Federation (FIDE) announced a change in the format for the Women\'s Candidates Tournament. Instead of mirroring the format of the general world championship cycle with a double round robin, the eight qualified players will play a series of knockout matches.   The eight players competing for the honor to challenge reigning Women\'s World Champion GM Ju Wenjun are:  GM Aleksandra Goryachkina (runner-up at the FIDE World Championship Match 2020) GM Humpy Koneru (top-two finisher in the 2021 FIDE Women\'s Grand Prix) GM Kateryna Lagno (top-two finisher in the 2021 FIDE Women\'s Grand Prix) GM Alexandra Kosteniuk (top-three finisher in the 2021 FIDE World Cup) GM Tan Zhongyi (top-three finisher in the 2021 FIDE World Cup) GM Anna Muzychuk (top-three finisher in the 2021 FIDE World Cup) GM Lei Tingjie (winner of the FIDE Women\'s Grand Swiss Tournament) GM Mariya Muzychuk (highest-rated player on the FIDE January 2022 rating list) The first stage of the event, which includes the quarterfinals and semifinals, will be held in October-November. Each match will consist of four games, plus possible tiebreaks. The players have been divided into two pools for this stage, and the quarterfinal pairings have been set:  Pool A  Koneru vs. A. Muzychuk Lei vs. M. Muzychuk Pool B  Goryachkina vs. Kosteniuk Lagno vs. Tan The final match will be played between the winner of each pool and will consist of six games, plus possible tiebreaks. It will take place in the first quarter of 2023.   One of the competitors, Kosteniuk, tweeted about her thoughts on the change, as the new format―with the Ukrainian and Russian players designated to different pools―seems intended to prevent a Russia vs. Ukraine matchup before the final', 12, '62c2cc35c8947.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `description` mediumtext NOT NULL DEFAULT 'No description',
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `picture`, `description`, `date`) VALUES
(1, 'Classic Chess Set', 119, '62be3d746cd9c.jpg', 'Proudly imported from Europe, The Classic wood chess set has been handcrafted and hand-finished out of the finest hornbeam natural and stained wood. It\'s name is derived from the fact that it\'s design is based upon the traditional Staunton pattern chess set. In keeping true with it’s European heritage, the King, Queen and Bishop pieces feature crowns that are made of  the opposing wood type, providing a beautiful color contrast.', '2022-07-01'),
(2, 'Premium Chess Set', 304, '62be3eaaba563.jpg', 'Premium Chess Set, Unique Metal and Plexy Chess Pieces, Marble Patterned Chess Set, Metal Chess Figures, Chess Board, Chess Set Handmade.', '2022-07-03'),
(3, 'Luxury Metal Chess Pieces Set', 599, '62be3f1d6a325.jpg', 'The pieces are ergonomically engineered to feature smooth surfaces and seamless edges to make extended games comfortable and a joy to play. The large-headed pawns and bishops, and the grooved knight’s stem are easier to grasp. Heavy and durable, this set became the iconic plastic chess set here in the United States.', '2022-07-03'),
(4, 'Turkey Chess Set', 499, '62be405f55b17.jpg', 'The main board is made of Beech wood and the size is 44.5cm x 42.6cm. Squares are inlaid with walnut veneer and mother of pearl. Sides are decorated with handmade wooden mosaic. The Chess Arena will make your office or home more elegant with its classy shape and unique design. It will always remind you of the importance of strategy. And yes, we are chess lovers too!', '2022-07-03'),
(5, 'Professional Chess Clock Game Timer Analogue Clock ', 39, '62be40f30ebb4.jpg', 'Professional mechanical analog Chess Clock. Available for Chinese Chess, International Chess and I-GO. The clock adopts a mechanical structure with a timing start button. Easy Operation. The timing is accurate, and the daily error is no more than 1 second. It is suitable for all kinds of chess game timing clocks.', '2022-07-03'),
(6, 'Digital Professional Chess Clock Count Up Down Timer ', 26, '62be41533156b.jpg', 'Presettable, also can serve as count-down chess timer, before switching count on and count down, the machine need to be restarted. Alarm function: digital chess clock with alarm function when the match is over, also with bonus and delay setting. Digital chess clock can serve as count-up chess clock, which is light weight and portable. The left and right sides can set different basic time and auxiliary parameters. Suitable for Chinese chess, international chess, I-go, home game and competitions.', '2022-07-04'),
(7, 'Chess T Shirts', 14, '62be4206035df.jpg', 'Chess Funny T Shirts Men King Queen 60S Board Game Horse Fan Player Dad Vintage 100% Cotton Tees Short Sleeve T Shirt Gift Idea', '2022-07-04'),
(8, 'Bobby Fischer Teaches Chess by Bobby Fischer, Stuart Margulies and Don Mosenfelder', 12, '62be42bcd78fe.jpg', 'Learning how to play chess from one of the greatest players of all time proved to be effective for a generation of chess players. Bobby Fischer’s book remains one of the best-selling chess books ever. The book covers everything from how the pieces move to basic checkmates and how to attack the opponent. Readers will go from knowing nothing about chess to being ready to play a game, and getting a game is relatively easy these days.', '2022-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `date_purchased` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id`, `user_id`, `product_id`, `product_name`, `price`, `quantity`, `total_price`, `receipt`, `date_purchased`) VALUES
(1, 1, 1, 'Classic Chess Set', 119, 1, 119, 'rne18iavj2j', '2022-07-04 08:42:10'),
(2, 1, 5, 'Professional Chess Clock Game Timer Analogue Clock ', 39, 1, 39, 'rne18iavj2j', '2022-07-04 08:42:10'),
(3, 1, 8, 'Bobby Fischer Teaches Chess by Bobby Fischer, Stuart Margulies and Don Mosenfelder', 12, 1, 12, 'rne18iavj2j', '2022-07-04 08:42:10'),
(4, 1, 7, 'Chess T Shirts', 14, 2, 28, 'rne18iavj2j', '2022-07-04 08:42:10'),
(5, 1, 4, 'Turkey Chess Set', 499, 1, 499, 'kn2a8v46u8f', '2022-07-04 08:43:28'),
(6, 1, 4, 'Turkey Chess Set', 499, 1, 499, 'l998kqbgmd', '2022-07-04 11:35:25'),
(7, 1, 5, 'Professional Chess Clock Game Timer Analogue Clock ', 39, 2, 78, 'l998kqbgmd', '2022-07-04 11:35:25'),
(8, 1, 6, 'Digital Professional Chess Clock Count Up Down Timer ', 26, 1, 26, 'l998kqbgmd', '2022-07-04 11:35:25'),
(9, 1, 8, 'Bobby Fischer Teaches Chess by Bobby Fischer, Stuart Margulies and Don Mosenfelder', 12, 1, 12, 'l998kqbgmd', '2022-07-04 11:35:25'),
(10, 2, 2, 'Premium Chess Set', 304, 1, 304, 'f240i9u61nj', '2022-07-04 13:19:30'),
(11, 2, 5, 'Professional Chess Clock Game Timer Analogue Clock ', 39, 1, 39, 'f240i9u61nj', '2022-07-04 13:19:30'),
(12, 2, 7, 'Chess T Shirts', 14, 2, 28, 'f240i9u61nj', '2022-07-04 13:19:30'),
(13, 2, 8, 'Bobby Fischer Teaches Chess by Bobby Fischer, Stuart Margulies and Don Mosenfelder', 12, 1, 12, 'f240i9u61nj', '2022-07-04 13:19:30'),
(14, 2, 6, 'Digital Professional Chess Clock Count Up Down Timer ', 26, 1, 26, 'f240i9u61nj', '2022-07-04 13:19:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL DEFAULT 'unknown',
  `profile_picture` varchar(255) DEFAULT 'defaultProfile.png',
  `date_joined` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `password`, `phone`, `address`, `gender`, `profile_picture`, `date_joined`) VALUES
(1, 'albert@gmail.com', 'Albert Ardiansyah', '$2y$10$u9W0GN2v5wAs7tFirO1LgOeueoWbvcwzyMA.bIaZK5XF1YOXRzDfy', '087881003310', 'Terate', 'male', '62be43546bfef.jpeg', '2022-06-25'),
(2, 'ester@gmail.com', 'Ester Febiola', '$2y$10$IGQTlxlY6XDdGPpqAQi6ne6reQStCvYhbfJ4CwVzIY3MHHOTc.YgG', '081280130013', 'Kemayoran', 'female', 'defaultProfile.png', '2022-06-26'),
(3, 'felix@gmail.com', 'Felix Savero', '$2y$10$n/o.s6JXo32eePOYHEoRRu.quGQ8/8SeSZS7wft70LLxb3RFEZivG', '87780212003', 'Iron Bridge', 'unknown', 'defaultProfile.png', '2022-06-26'),
(4, 'albert.412020012@civitas.ukrida.ac.id', 'Albert Saputra Zebua', '$2y$10$3iopNQ9YIn36dH/.eiqGmeWOR5qAsH2/ybFq2NoTgTDx5h8YPzUWm', '81219300633', 'Puri Permata Taman Buah D2/6', 'unknown', 'defaultProfile.png', '2022-06-27'),
(5, 'maxy2020@gmail.com', 'maxy', '$2y$10$vjE4fA5wwEXYOSOFhHDDTOGMgSvgzrd2sqVrzUeXkhOVOyLcp1HiK', '12341234', 'ukrida', 'unknown', 'defaultProfile.png', '2022-06-27'),
(6, 'denni@gmail.com', 'Denni', '$2y$10$uxKYfixOzU0tq4h5AHMp.eNDFV7i3Ed4I7pSwkEFy4RJf6tufFRVO', '087826136969', 'Jakarta', 'unknown', 'defaultProfile.png', '2022-06-29'),
(7, 'michael@gmail.com', 'Michael Vin', '$2y$10$Btt6ORgsVXdcijyFjbBbIOcIXF1BVYATUpA/vchNK54Oa57Y6xTQC', '085235768843', 'Jakarta', 'unknown', 'defaultProfile.png', '2022-06-29');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
