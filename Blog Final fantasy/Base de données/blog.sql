-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2021 at 03:13 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `id_blogueur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `article` text NOT NULL,
  `date_article` datetime NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id_article`, `id_blogueur`, `pseudo`, `article`, `date_article`, `categorie`, `titre`) VALUES
(11, 10, 'Mathieu', 'Après 1 ans et demi d\'aventure dans shadowbringer, une nouvelle vidéo est apparue pour annoncer la nouvelle extension de Final Fantasy 14. \r\n\r\nElle se fait appeller End Walker et devrait sortir fin 2021 .', '2021-03-03 15:11:02', 'actualite', 'Une nouvelle aventure commence !'),
(12, 10, 'Mathieu', 'Après le grand succès de final fantasy 7 remake sorti le 10 avril 2020, Square-enix sortira le jeu sur PS5 le 10 juin 2021. De plus pour les possesseurs de la version PS4 la mise a niveau sur PS5 sera gratuite. Cette épisode sera consacré au personnage Yuffie.', '2021-03-04 13:04:06', 'actualite', 'Final fantasy 7 remake arrive sur PS5'),
(13, 10, 'Mathieu', 'Les précommande pour célébrer le Fan Festival numérique Final Fantasy XIV 2021 ont commencé.', '2021-03-04 13:06:51', 'actualite', 'Festival numérique Final Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `blogueur`
--

CREATE TABLE `blogueur` (
  `id_blogueur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_inscription` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogueur`
--

INSERT INTO `blogueur` (`id_blogueur`, `pseudo`, `email`, `password`, `date_inscription`) VALUES
(10, 'Mathieu', 'azariel@live.fr', '07e22fadee79dece955f825da29c6b02', '2021-03-02 08:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id_comm` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `commentaires`
--

INSERT INTO `commentaires` (`id_comm`, `id_article`, `pseudo`, `commentaire`, `date_commentaire`) VALUES
(4, 11, 'Mathieu', 'Test commentaire', '2021-03-04'),
(7, 13, 'Laura', 'J\'ai acheté une belle peluche', '2021-03-04'),
(8, 13, 'Mathieu', 'Je me suis fait plaisir en achetant un porte clé', '2021-03-04'),
(9, 12, 'Franck', 'Trop cool. La version PS4 était déjà très jolie', '2021-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `blogueur`
--
ALTER TABLE `blogueur`
  ADD PRIMARY KEY (`id_blogueur`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id_comm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blogueur`
--
ALTER TABLE `blogueur`
  MODIFY `id_blogueur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
