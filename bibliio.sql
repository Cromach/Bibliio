-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 juin 2019 à 23:14
-- Version du serveur :  5.7.24
-- Version de PHP :  7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bibliio`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_tome` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `com` text NOT NULL,
  PRIMARY KEY (`id_com`),
  KEY `commentaire_ibfk_1` (`id_tome`),
  KEY `commentaire_ibfk_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id_com`, `id_user`, `id_tome`, `note`, `com`) VALUES
(15, 4, 14, 10, 'Excellent livre à propos du plaisir de la lecture mais qui ne dépeint cependant pas le fait de lire comme une vérité absolue mais traite aussi de ses aspects potentiellement négatifs. A lire absolument !!! '),
(16, 7, 11, 7, 'Amusant !'),
(17, 6, 2, 1, 'J\'ai détesté ce tome il y avait des araignées géantes !  '),
(18, 6, 1, 10, 'Trop bien !!!! moi aussi je veux apprendre la magie !'),
(19, 6, 28, 3, 'Pas intéressant'),
(20, 8, 35, 8, 'Très intéressant ! à lire'),
(21, 4, 66, 10, 'Du génie !'),
(22, 4, 36, 10, 'Très touchant, une plume extraordinaire ! Génial '),
(23, 4, 29, 8, 'Beau travail d\'écriture comme attendu de John Green '),
(25, 4, 25, 9, 'Excellent bien que très dur'),
(26, 8, 81, 4, 'Trop long'),
(27, 8, 84, 5, ''),
(28, 8, 31, 7, 'pas mal'),
(29, 8, 70, 7, 'Amusant '),
(30, 8, 67, 8, 'original'),
(31, 8, 54, 6, 'Pas mal mais déçu globalement par la recherche dans l\'oeuvre ...\r\n'),
(32, 8, 83, 1, 'Nul '),
(33, 5, 37, 8, 'Sympa '),
(34, 5, 83, 6, 'Pas d\'action ... Mais reste bien écrit '),
(35, 5, 78, 8, 'Magnifique'),
(36, 5, 68, 8, 'On m\'en a dit du bien hâte de le commencer !!! '),
(37, 5, 84, 5, ''),
(38, 5, 26, 10, 'Excellent !'),
(39, 4, 33, 9, 'Stimulant\r\n'),
(40, 4, 33, 9, 'Stimulant\r\n'),
(41, 4, 34, 10, 'Brillant !'),
(42, 4, 13, 10, 'Magnifique !! à lire absolument'),
(43, 4, 49, 8, 'Bon complément à la série originale\r\n'),
(44, 4, 55, 10, ''),
(45, 4, 106, 8, ''),
(46, 4, 127, 8, 'Trop bien !!!\r\n'),
(47, 4, 35, 10, ''),
(48, 8, 136, 4, 'moyen\r\n'),
(49, 8, 57, 7, 'Pas trop mal par contre la fin est prévisible de nombreux éléments laissez penser que cela arriverait.'),
(50, 8, 55, 6, 'Sympa mais thèmes et schématique vus et revus et bien moins intéressants que dans des ouvrages de moins gros calibre.'),
(51, 8, 2, 7, ''),
(52, 8, 38, 8, ''),
(53, 7, 139, 7, 'illustrations magnifiques'),
(54, 7, 104, 5, ''),
(55, 4, 96, 7, 'Sympa'),
(56, 4, 98, 6, 'Beaucoup moins bien que le premier\r\n'),
(57, 4, 56, 10, ''),
(58, 4, 53, 9, ''),
(59, 5, 3, 9, 'Sympa bon thème !'),
(60, 5, 104, 8, 'Pas mauvais\r\n'),
(61, 5, 87, 7, ''),
(62, 5, 105, 8, 'à tester\r\n'),
(63, 5, 109, 8, 'Hâte de lire la suite !'),
(64, 5, 110, 10, 'Du génie '),
(65, 5, 136, 6, ''),
(66, 5, 115, 10, 'Trop bien !!!'),
(68, 5, 27, 8, 'Une autre vision des maths intéressant \r\n'),
(69, 5, 140, 8, 'Marrant'),
(70, 4, 17, 10, 'Excellent, une vision d\'une ironie incroyable'),
(71, 4, 38, 10, 'Bottero est un génie !'),
(72, 4, 69, 7, 'Sympa'),
(73, 4, 70, 6, 'à lire vers 9/10 ans '),
(74, 4, 139, 10, 'Bottero nous fait rêver '),
(75, 4, 68, 9, 'Robin Hobb m’impressionnera toujours '),
(76, 4, 137, 7, ''),
(77, 4, 117, 10, 'Du pur génie'),
(78, 4, 119, 10, 'Bottero nous fait passer par plein d\'émotions sans effort c\'est incroyable'),
(79, 4, 73, 10, 'toute une enfance !'),
(80, 4, 45, 7, 'Pas mal '),
(81, 4, 75, 9, ''),
(82, 4, 19, 8, ''),
(83, 4, 4, 10, 'un chef d\'oeuvre\r\n'),
(84, 4, 83, 8, ''),
(85, 4, 141, 10, ''),
(86, 4, 143, 10, 'Du génie !!'),
(87, 4, 144, 9, 'Amusant'),
(88, 4, 39, 10, 'à lire absolument !!!'),
(89, 4, 22, 8, ''),
(90, 4, 145, 8, ''),
(91, 4, 84, 8, ''),
(92, 4, 84, 8, ''),
(93, 4, 120, 10, 'Génial une toute autre vision du corps humain et de la vie'),
(94, 4, 65, 8, 'mythologie, bon point !'),
(95, 4, 24, 9, 'Excellent pour débuter les Bottero !');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_emprunt` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_tome` int(11) NOT NULL,
  `actif` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_emprunt`),
  KEY `emprunt_ibfk_1` (`id_tome`),
  KEY `emprunt_ibfk_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`id_emprunt`, `id_user`, `id_tome`, `actif`, `date`) VALUES
(10, 6, 75, 1, '2019-06-12'),
(22, 4, 35, 0, '2019-06-14'),
(23, 4, 1, 1, '2019-06-19'),
(24, 7, 11, 0, '2019-06-20'),
(25, 7, 12, 1, '2019-06-20'),
(26, 7, 32, 0, '2019-06-20'),
(27, 6, 1, 0, '2019-06-20'),
(28, 6, 13, 1, '2019-06-21'),
(29, 8, 30, 1, '2019-06-22'),
(30, 8, 35, 0, '2019-06-23'),
(31, 4, 29, 0, '2019-06-23'),
(32, 4, 66, 1, '2019-06-23'),
(33, 8, 82, 1, '2019-06-25'),
(34, 8, 53, 1, '2019-06-25'),
(35, 8, 56, 1, '2019-06-26'),
(36, 5, 31, 1, '2019-06-26'),
(37, 5, 78, 1, '2019-06-26'),
(38, 5, 68, 0, '2019-06-26'),
(39, 7, 104, 1, '2019-06-27'),
(40, 7, 139, 2, '2019-06-27'),
(41, 5, 104, 1, '2019-06-27'),
(42, 5, 105, 2, '2019-06-27'),
(43, 4, 17, 1, '2019-06-27'),
(44, 4, 119, 1, '2019-06-27'),
(45, 4, 120, 1, '2019-06-27');

-- --------------------------------------------------------

--
-- Structure de la table `liste_perso`
--

DROP TABLE IF EXISTS `liste_perso`;
CREATE TABLE IF NOT EXISTS `liste_perso` (
  `id_user` int(11) NOT NULL,
  `liste` int(11) NOT NULL,
  `id_tome` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_tome`),
  KEY `id_tome` (`id_tome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `liste_perso`
--

INSERT INTO `liste_perso` (`id_user`, `liste`, `id_tome`) VALUES
(4, 1, 1),
(4, 1, 14),
(4, 1, 29),
(4, 3, 33),
(4, 1, 45),
(4, 1, 66),
(4, 1, 73),
(5, 3, 68),
(5, 1, 83),
(6, 1, 1),
(6, 1, 2),
(6, 2, 13),
(6, 3, 33),
(7, 1, 11),
(7, 2, 12),
(8, 2, 30),
(8, 1, 35),
(8, 2, 53),
(8, 3, 55),
(8, 3, 57),
(8, 2, 82);

-- --------------------------------------------------------

--
-- Structure de la table `serie`
--

DROP TABLE IF EXISTS `serie`;
CREATE TABLE IF NOT EXISTS `serie` (
  `id_serie` int(11) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  `auteur` text NOT NULL,
  `id_type` int(11) NOT NULL,
  `actif` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id_serie`),
  KEY `serie_ibfk_1` (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `serie`
--

INSERT INTO `serie` (`id_serie`, `titre`, `auteur`, `id_type`, `actif`) VALUES
(1, 'Harry Potter', 'J. K. Rowling', 1, 1),
(3, 'Hunger games', 'Suzanne Collins', 1, 1),
(4, 'Le Seigneur des anneaux', 'J.R.R. Tolkien', 1, 1),
(27, 'L\'île des esclaves', 'Marivaux', 6, 1),
(28, 'Sublimes créatures', 'Kami Garcia', 1, 1),
(30, 'Les âmes croisées ', 'Pierre Bottero', 1, 1),
(31, 'Andromaque', 'Jean Racine', 6, 1),
(32, 'Antigone', 'Jean Anouilh', 6, 1),
(33, 'L\'apprentie de Merlin', 'Fabien Clavel', 1, 1),
(34, 'L\'autre', 'Pierre Bottero', 1, 1),
(36, 'Bel ami', 'Maupassant', 1, 1),
(37, 'Le bon gros géant', 'Roald Dalh', 1, 1),
(39, 'Charlie et la chocolaterie', 'Roald Dalh', 1, 1),
(41, 'Candide', 'Voltaire', 7, 1),
(42, 'Le chant du troll', 'Pierre Bottero', 8, 1),
(43, 'Cherub', 'Robert Muchamore', 1, 1),
(44, 'Les chroniques du monde emergé', 'Licia Troisi', 1, 1),
(45, 'Claude Gueux', 'Victor Hugo', 1, 1),
(47, 'Cœur d\'encre ', 'Cornelia Funke', 1, 1),
(48, 'Da Vinci Code', 'Dan Brown', 1, 1),
(49, 'Dernier jour d\'un condamné', 'Victor Hugo', 1, 1),
(51, 'Divergente', 'Veronica Roth', 1, 1),
(52, 'Les dix petits nègres', 'Agatha Christie', 1, 1),
(53, 'Don Juan', 'Molière', 6, 1),
(54, 'Le pacte des Marchombres', 'Pierre Bottero', 1, 1),
(55, 'L\'épouvanteur', 'Joseph Delaney', 1, 1),
(56, 'La face cachée de Margo', 'John Green', 1, 1),
(57, 'Fils de sorcière', 'Pierre Bottero', 1, 1),
(59, 'Les fourberies de Scapin', 'Molière', 6, 1),
(60, 'La gloire de mon père', 'Marcel Pagnol', 1, 1),
(62, 'Eragon', 'Christopher Paolini', 1, 1),
(63, 'Percy Jackson ', 'Rick Riordan', 1, 1),
(65, 'James et la grosse pêche', 'Roald Dalh', 1, 1),
(66, 'Labyrinthe', 'James Dashner', 1, 1),
(67, 'Le malade imaginaire', 'Molière', 6, 1),
(68, 'Mathieu Hidalf', 'Christauphe Mauri', 1, 1),
(69, 'Matilda', 'Roald Dalh', 1, 1),
(71, 'Le meilleur des mondes', 'Aldous Huxley', 7, 1),
(72, 'Météorite', 'Pierre Bottero', 1, 1),
(73, 'La quête d\'Ewilan', 'Pierre Bottero', 1, 1),
(74, 'Les mondes D\'Ewilan', 'Pierre Bottero', 1, 1),
(77, 'Nos étoiles contraires', 'John Green', 1, 1),
(80, 'Les petites filles modèles', 'Comtesse de Ségur', 1, 1),
(81, 'Oscar Pill', 'Eli Anderson', 1, 1),
(85, 'Princesse en danger', 'Pierre Bottero', 1, 1),
(86, 'Qui es tu Alaska ?', 'John Green', 1, 1),
(87, 'Les sorcières de l\'épouvanteur', 'Joseph Delaney', 1, 1),
(88, 'Le théorème des Katherine', 'John Green', 1, 1),
(89, 'Tobie Lolness', 'Timothée de Flombelle', 1, 1),
(92, 'Une vie', 'Maupassant', 1, 1),
(93, 'Will and Will', 'John Green', 1, 1),
(95, 'Divergente raconté par Quatre ', 'Veronica Roth', 1, 1),
(96, 'Tara Duncan', 'Sophie Audouin-Mamikonian', 1, 1),
(100, 'Erased', 'Kei Sanbe', 3, 1),
(102, 'A comme aujourd\'hui', 'David Levithan', 1, 1),
(103, 'La citadelle des ombres ', 'Robin Hobb', 1, 1),
(104, 'Le faucon Malté', 'Anthony Horowitz ', 1, 1),
(105, 'Le grimoire d\'Arkandias', 'Alexandre Castagnetti', 1, 1),
(107, 'Le gentil petit diable', 'Pierre Gripari', 10, 1),
(108, 'La sorcière de la rue Mouffetard et autres contes de la rue Broca ', 'Pierre Gripari', 10, 1),
(109, 'Le petit prince', 'Antoine de Saint-Exupéry', 1, 1),
(110, 'Le petit Nicolas', 'René Goscinny', 1, 1),
(111, 'Sacrées sorcières', 'Roald Dalh', 1, 1),
(112, 'L\'odyssée', 'Homère', 5, 1),
(113, 'Les fleurs du mal', 'Charles Baudelaire', 5, 1),
(114, 'Madame Bovary', 'Gustave Flaubert', 1, 1),
(115, 'Moby Dick', 'Herman Melville', 1, 1),
(116, 'Le Comte de Monte-Cristo', 'Alexandre Dumas', 1, 1),
(117, 'Le vieil homme et la mer', 'Ernest Hemingway', 1, 1),
(119, 'Orgueil et préjugés', 'Jane Austen', 1, 1),
(120, 'Cabane Magique', '?', 1, 0),
(121, 'Narnia', 'Lewis', 1, 0),
(122, 'Le monde de narnia', 'Lewis', 1, 0),
(123, 'Le vent se lève', '?', 5, 0),
(124, 'Magyk', '?', 1, 0),
(125, 'Silent voice', '?', 3, 0),
(126, 'L\'île du crâne', '?', 1, 0),
(127, 'les contes des mille et une nuits', '????', 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tag_list`
--

DROP TABLE IF EXISTS `tag_list`;
CREATE TABLE IF NOT EXISTS `tag_list` (
  `id_tag` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  PRIMARY KEY (`id_tag`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag_list`
--

INSERT INTO `tag_list` (`id_tag`, `description`) VALUES
(1, 'Historique'),
(2, 'Fantasy'),
(3, 'Science-fiction'),
(4, 'Romance'),
(5, 'Slice of life'),
(6, 'Heroic fantasy'),
(7, 'Horreur'),
(8, 'Comédie'),
(9, 'Policier'),
(10, 'Classique'),
(11, 'Aventure'),
(12, 'Utopie'),
(13, 'Dystopie'),
(14, 'Tragédie'),
(15, 'Jeunesse'),
(16, 'Adulte'),
(17, 'Post apocalyptique\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `tag_serie`
--

DROP TABLE IF EXISTS `tag_serie`;
CREATE TABLE IF NOT EXISTS `tag_serie` (
  `id_tag` int(11) NOT NULL,
  `id_serie` int(11) NOT NULL,
  PRIMARY KEY (`id_tag`,`id_serie`),
  KEY `tag_serie_ibfk_1` (`id_serie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tag_serie`
--

INSERT INTO `tag_serie` (`id_tag`, `id_serie`) VALUES
(2, 1),
(6, 1),
(15, 1),
(13, 3),
(15, 3),
(17, 3),
(6, 4),
(11, 4),
(10, 27),
(4, 28),
(15, 28),
(6, 30),
(15, 30),
(1, 31),
(10, 31),
(14, 31),
(1, 32),
(4, 32),
(10, 32),
(1, 33),
(2, 33),
(4, 33),
(11, 33),
(15, 33),
(6, 34),
(15, 34),
(10, 36),
(15, 37),
(2, 39),
(8, 39),
(15, 39),
(10, 41),
(12, 41),
(2, 42),
(15, 42),
(9, 43),
(11, 43),
(15, 43),
(6, 44),
(11, 44),
(15, 44),
(10, 45),
(2, 47),
(6, 47),
(11, 47),
(15, 47),
(1, 48),
(9, 48),
(16, 48),
(10, 49),
(4, 51),
(17, 51),
(9, 52),
(10, 52),
(8, 53),
(10, 53),
(14, 53),
(2, 54),
(6, 54),
(11, 54),
(6, 55),
(4, 56),
(5, 56),
(8, 56),
(11, 56),
(15, 56),
(2, 57),
(8, 59),
(10, 59),
(10, 60),
(6, 62),
(11, 62),
(6, 63),
(11, 63),
(15, 63),
(8, 65),
(15, 65),
(3, 66),
(15, 66),
(17, 66),
(8, 67),
(10, 67),
(2, 68),
(6, 68),
(8, 68),
(15, 68),
(5, 69),
(8, 69),
(15, 69),
(3, 71),
(10, 71),
(12, 71),
(15, 72),
(2, 73),
(6, 73),
(11, 73),
(15, 73),
(6, 74),
(11, 74),
(15, 74),
(4, 77),
(5, 77),
(15, 77),
(10, 80),
(15, 80),
(3, 81),
(15, 81),
(4, 85),
(11, 85),
(15, 85),
(4, 86),
(5, 86),
(11, 86),
(15, 86),
(16, 86),
(6, 87),
(4, 88),
(5, 88),
(15, 88),
(2, 89),
(11, 89),
(10, 92),
(5, 93),
(15, 93),
(11, 95),
(17, 95),
(2, 96),
(4, 96),
(6, 96),
(15, 96),
(3, 102),
(4, 102),
(15, 102),
(6, 103),
(9, 104),
(11, 104),
(2, 105),
(15, 105),
(15, 107),
(8, 108),
(15, 108),
(10, 109),
(15, 109),
(5, 110),
(15, 110),
(2, 111),
(15, 111),
(1, 112),
(10, 112),
(10, 113),
(5, 114),
(10, 114),
(10, 115),
(10, 116),
(11, 116),
(10, 117),
(10, 119);

-- --------------------------------------------------------

--
-- Structure de la table `tome`
--

DROP TABLE IF EXISTS `tome`;
CREATE TABLE IF NOT EXISTS `tome` (
  `id_tome` int(11) NOT NULL AUTO_INCREMENT,
  `id_serie` int(11) NOT NULL,
  `numtome` int(11) NOT NULL,
  `titre` text NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `nbtome` int(11) NOT NULL,
  `nbemprunte` int(11) NOT NULL,
  PRIMARY KEY (`id_tome`,`numtome`),
  KEY `tome_ibfk_1` (`id_serie`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tome`
--

INSERT INTO `tome` (`id_tome`, `id_serie`, `numtome`, `titre`, `description`, `photo`, `nbtome`, `nbemprunte`) VALUES
(1, 1, 1, 'Harry Potter à l\'école des sorciers', 'Le jour de ses onze ans, Harry Potter, un orphelin élevé par un oncle et une tante qui le détestent, voit son existence bouleversée. Un géant vient le chercher pour l\'emmener au collège Poudlard, école de sorcellerie où une place l\'attend depuis toujours. Qui est donc Harry Potter ? Et qui est l\'effroyable V..., le mage dont personne n\'ose prononcer le nom ?', 'bookpics/Harry_Potter1.jpg', 3, 1),
(2, 1, 2, 'Harry Potter et la Chambre des secrets', 'Une rentrée fracassante en voiture volante, une étrange malédiction qui s\'abat sur les élèves, cette deuxième année à l\'école des sorciers ne s\'annonce pas de tout repos ! Harry Potter découvre une inscription énigmatique : \"La Chambre des Secrets a été ouverte. Ennemis de l\'héritier prenez garde !\" En compagnie de ses fidèles amis, Ron et Hermione, l\'apprenti sorcier mène l\'enquête.', 'bookpics/Harry_Potter2.jpg', 1, 1),
(3, 3, 1, 'Hunger Games', 'Dans chaque district de Panem, une société reconstruite sur les ruines des États-Unis, deux adolescents sont choisis pour participer aux Hunger Games. La règle est simple : tuer ou se faire tuer. Celui qui remporte l\'épreuve, le dernier survivant, assure la prospérité à son district pendant un an. Katniss et Peeta sont les « élus » du district numéro douze. Les voilà catapultés dans un décor violent, semé de pièges, où la nourriture est rationnée et, en plus, ils doivent remporter les votes de ceux qui les observent derrière leur télé. Alors que les candidats tombent comme des mouches, que les alliances se font et se défont, Peeta déclare sa flamme pour Katniss à l\'antenne. La jeune fille avoue elle-aussi son amour. Calcul ? Idylle qui se conclura par la mort d\'un des amants ? Un suicide ? Tout est possible, et surtout, tout est faussé au sein des Hunger Games.\r\nSuzanne Collins a écrit de nombreuses sériés télévisées pour enfants, avant de se consacrer à l\'écriture de romans. Hunger Games est sa deuxième série pour la jeunesse. Elle vit avec sa famille dans le Connecticut, aux États-Unis.', 'bookpics/HungerGames1.jpg', 2, 1),
(4, 4, 1, 'La communauté de l\'anneau', 'Dans les vertes prairies de la Comté, les Hobbits, ou Semi-hommes, vivaient en paix... Jusqu\'au jour fatal où l\'un d\'entre eux, au cours de ses voyages, entra en possession de l\'Anneau Unique aux immenses pouvoirs. Pour le reconquérir, Sauron, le seigneur ténébreux, va déchaîner toutes les forces du Mal... Frodon, le Porteur de l\'Anneau, Gandalf, le magicien, et leurs intrépides compagnons réussiront-t-ils à écarter la menace qui pèse sur la Terre du Milieu ?', 'bookpics/seigneurdesanneaux1.jpg', 1, 0),
(9, 27, 1, 'L\'île des esclaves', '«Vous êtes moins nos esclaves que nos malades, et nous ne prenons que trois ans pour vous rendre sains, c\'est-à-dire, humains, raisonnables, et généreux pour toute votre vie.» C\'est Trivelin, insulaire de longue date, qui présente ainsi la situation aux naufragés dès leur arrivée. Ceux qui traitaient leurs serviteurs comme des esclaves vont être soignés, et le traitement est simple : ils échangeront fonction et habit avec leurs domestiques pour éprouver ce que l\'on ressent quand on est socialement humilié. Cette courte pièce a été jouée pour la première fois en 1725. La Révolution française n\'a pas encore eu lieu, on ne parle pas encore de lutte des classes, et pourtant l\'aspiration à la justice et l\'envie de renverser l\'ordre établi sont en germe dans L\'Île des Esclaves.', 'bookpics/iledesesclaves.jpg', 1, 0),
(10, 34, 1, 'Le souffle de la hyène', 'Natan est un sportif surdoué, membre d’une étrange famille. Shaé possède, tapie au fond d’elle-même, une Chose qu’elle ne maîtrise pas. Les deux adolescents sont séparés par des kilomètres, mais lorsqu’ils se rencontrent, ils se découvrent un héritage commun fascinant et dangereux. Suffira-t-il à combattre l’Autre, terrifiante incarnation du Mal ?', 'bookpics/autre3.jpg', 2, 0),
(11, 39, 1, 'Charlie et la chocolaterie', '«Moi, Willy Wonka, j\'ai décidé de permettre à cinq enfants de visiter ma chocolaterie cette année. Ces cinq chanceux seront initiés à tous mes secrets, à toute ma magie.»Willy Wonka est le plus grand inventeur de chocolat de tous les temps. Et savez-vous qui est Charlie ? Charlie Bucket est le héros de cette histoire. Il y a quatre autres enfants dans ce livre, d\'affreux petits garnements, nommés Augustus Gloop (goinfre), Veruca Salt(gâtée), Violette Beauregard (mordue de chewing-gum) et Mike Teavee (obsédé par la télé).Les voilà qui arrivent, avec leurs tickets d\'or, à la chocolaterie Wonka ! Quels secrets vont-ils découvrir ?Notre tournée va commencer ! Mais ne vous dispersez pas ! Wonka n\'aimerait pas perdre l\'un de vous à ce stade... ', 'bookpics/Charlie_et_la_chocolaterie1.jpg', 3, 0),
(12, 39, 2, 'Charlie et le grand ascenseur de verre', 'Charlie a gagné la fabuleuse chocolaterie de Willy Wonka qu\'il survole maintenant à bord d\'un extraordinaire engin, le grand ascenseur de verre, en compagnie de toute sa famille. Mais une fausse man uvre va projeter l\'ascenseur dans l\'espace. Un espace qu\'ils découvrent peuplé d\'êtres fantastiques et monstrueux, les Kpoux Vermicieux, terreurs de l\'univers interstellaire, contre lesquels ils vont livrer une terrible bataille...', 'bookpics/Charlie_et_la_chocolaterie2.jpg', 1, 1),
(13, 47, 1, 'Cœur d\'encre', 'Meggie, douze ans, vit seule avec son père, Mo. Comme lui, elle a une passion pour les livres. Mais pourquoi Mo ne lit-il plus d\'histoires à voix haute ? Ses livres auraient-ils un secret ? Leurs mots auraient-ils un secret ? Un soir, un étrange personnage frappe à leur porte. Alors commence pour Meggie et Mo une extraordinaire aventure, encore plus folle que celles que racontent les livres. Et leur vie va changer pour toujours.', 'bookpics/coeurdencre.jpg', 2, 1),
(14, 47, 2, 'Sang d\'encre', 'Meggie et ses parents savourent leurs retrouvailles lorsque Farid apporte une nouvelle bouleversante : prêt à tout pour revoir les fées et sa famille, Doigt de Poussière a regagné le Monde d\'encre, ignorant qu\'un grand danger l\'attend. Farid et Meggie décident de partir à sa recherche. C\'est le début d\'un voyage incroyable... et terrifiant.', 'bookpics/sangdencre.jpg', 1, 0),
(15, 47, 3, 'Mort d\'encre', 'Le Monde d\'encre est plus violent que jamais et Meggie et ses parents sont menacés par le tyran Tête de Vipère. Farid, lui, cherche à faire revenir à la vie le cracheur de feu Doigt de Poussière. Orphée lui a promis d\'écrire les mots qui le ressusciteront, mais la Mort exige bien des sacrifices pour exaucer les souhaits des humains et les mots peuvent être trompeurs...', 'bookpics/mortdencre.jpg', 1, 0),
(17, 71, 1, 'Le meilleur des mondes', 'Voici près d\'un siècle, dans d\'étourdissantes visions, Aldous Huxley imagine une civilisation future jusque dans ses rouages les plus surprenants : un État Mondial, parfaitement hiérarchisé, a cantonné les derniers humains \" sauvages \" dans des réserves. La culture in vitro des fœtus a engendré le règne des \" Alphas \", génétiquement déterminés à être l\'élite dirigeante. Les castes inférieures, elles, sont conditionnées pour se satisfaire pleinement de leur sort. Dans cette société où le bonheur est loi, famille, monogamie, sentiments sont bannis. Le meilleur des mondes est possible. Aujourd\'hui, il nous paraît même familier...', 'bookpics/meilleurdesmondes.jpg', 1, 1),
(18, 72, 1, 'Météorite', 'Mattéo, 10 ans, mène une vie presque parfaite à Sainte-Lucie. Mais un jour, il découvre qu’un don lui permet de parler aux animaux. Puis il rencontre Naomie qui bouleverse sa vie. Une météorite, tombée sur la maternité à leur naissance, leur a accordé des dons exceptionnels qui vont les transformer en héros. Car un danger constitué de cinq entités menace la Terre…', 'bookpics/meteorite.jpg', 2, 0),
(19, 77, 1, 'Nos étoiles contraires', '\"Lorsque je lisais ce livre à la plage, ma mère m\'a demandé ce qu\'il racontait, et moi, complétement absorbée par ma lecture et désirant y retourner au plus vite, je lui ai dit le gros de l\'histoire.  - C\'est une fille qui a le cancer, qui rencontre un gars qui avait le cancer. C\'est génial !  Alors là, elle m\'a lancé un regard inquiet et m\'a dit :  - Tu es sûre que ça va ?\"  Une lectrice sur Booknode.com  \"Un roman sur la vie, sur la mort et sur les gens qui se retrouvent coincés entre les deux. \"Nos étoiles contraires\", c\'est John Green au sommet de son art. On rit, on pleure et on en redemande\"  Marcus Zusak, auteur du bestseller La voleuse de livres', 'bookpics/nosetoiles.jpg', 5, 0),
(22, 80, 1, 'Les petites filles modèles', 'Au château de Fleurville, Camille et Madeleine sont deux « petites filles modèles » qui font la joie de leur maman. Hélas, il n\'en est pas de même pour la pauvre Sophie... Battue, fouettée par sa méchante belle-mère, la malheureuse accumule les sottises.', 'bookpics/fillesmodel.jpg', 2, 0),
(24, 85, 1, 'Princesse en danger', 'Tout avait bien commencé. Ma famille d\'accueil me plaisait et j\'avais maté le gros dur de la classe. ET puis, au cours d\'une balade en VTT, Shi-Meï, princesse de Pataman, a surgi devant moi. Le miracle a continué. Elle m\'a souri. Mais j\'ai le coeur en morceaux car elle vient d\'être enlevée. Il ne me reste qu\'une solution : la délivrer. A tout prix...', 'bookpics/princesseendanger.jpg', 1, 0),
(25, 86, 1, 'Qui es tu Alaska ?', 'Miles Halter a seize ans mais n\'a pas l\'impression d\'avoir vécu. Assoiffé d\'expériences, il quitte le cocon familial pour le campus universitaire : ce sera le lieu de tous les possibles, de toutes les premières fois. Et de sa rencontre avec Alaska. La troublante, l\'insaisissable Alaska Young, insoumise et fascinante. Amitiés fortes, amour, transgression, quête de sens : un roman qui fait rire, et fondre en larmes l\'instant d\'après...«Le défi en écrivant \"Qui es-tu Alaska ?\" était de comprendre qu\'un roman est là pour révéler la vérité, sans se préoccuper des faits. Car pour citer William Faulkner : \"C\'est la vérité qui m\'intéresse, pas les faits\"» John Green.', 'bookpics/alaska.jpg', 3, 0),
(26, 87, 1, 'Les sorcières de l\'épouvanteur', 'Saviez-vous que l\'Épouvanteur John Gregory était prêt à tout pour garder près de lui Meg Skelton, la lamia dont il est tombé follement amoureux ? Que la sorcière Dora a été débusquée et torturée par un redoutable Inquisiteur ? Que la plus redoutable des tueuses, Grimalkin, a eu un bel enfant avec le Malin ? Qu\'Alice a affronté une immonde créature mangeuse de cerveaux chez Lizzie l\'Osseuse ?  Et enfin, que Tom Ward a combattu une divinité celte quand il était en formation avec Bill Arkwright ?  Un recueil de cinq récits fascinants et effrayants à souhait !  Des révélations palpitantes sur les personnages les plus importants de la saga de l\'Épouvanteur !  Attention !  Histoires à ne pas lire la nuit...', 'bookpics/sorciereepouvanteur.jpg', 1, 0),
(27, 88, 1, 'Le théorème des Katherine', 'Dix-neuf fois Colin est tombé amoureux. Dix-neuf fois la fille s\'appelait Katherine. Pas Katie, ni Kat, ni Kittie, ni Cathy, et surtout pas Catherine, mais KATHERINE. Et, dix-neuf fois, il s\'est fait larguer.', 'bookpics/katherine.jpg', 2, 0),
(28, 92, 1, 'Une vie', 'Jeanne, fille unique très choyée du baron et de la baronne Le Perthuis des Vauds, avait tout pour être heureuse. Son mariage avec Julien de Lamare, rustre et avare, se révélera une catastrophe. Sa vie sera une suite d\'épreuves et de désillusions.', 'bookpics/Une_vie1.jpg', 2, 0),
(29, 93, 1, 'Will and Will', 'Will Grayson se méfie des sentiments. Les histoires de cœur portent la poisse, tout le temps. Alors dans la vie, autant se faire discret. Son meilleur ami, Tiny Cooper, est à la fois une bénédiction et une vraie plaie : ami fidèle et rayonnant, il est aussi ouvertement gay que corpulent et n\'a pas l\'habitude de passer inaperçu.À l\'autre bout de la ville, un adolescent en pleine déprime assume mal sa différence. Le hasard veut qu\'il se nomme lui aussi Will Grayson...', 'bookpics/Will_and_Will1.jpg', 3, 0),
(30, 31, 1, 'Andromaque', 'Fin d’une guerre où l’on crie malheur aux vaincus. Prise d’otages. Chantage sur un enfant. Complot. Manipulation. Passions trahies et noyées dans le sang. Fanatisme. Folie. Bain de sang final. Des horreurs d’aujourd’hui  ? Non. C’est le résumé de la tragédie Andromaque, sur les suites de la guerre de Troie, qui lance, en 1667, la grande carrière de Racine. Ici, il est impossible à la fois d’aimer et d’être aimé, de posséder et l’amour et le pouvoir. Une tragédie de tous les temps.', 'bookpics/Andromaque.jpg', 1, 1),
(31, 32, 1, 'Antigone', '', 'bookpics/antigone.jpg', 2, 1),
(32, 36, 1, 'Bel ami', 'Georges Duroy, dit Bel-Ami, est un jeune homme au physique avantageux. Le hasard d\'une rencontre le met sur la voie de l\'ascension sociale. Malgré sa vulgarité et son ignorance, cet arriviste parvient au sommet par l\'intermédiaire de ses maîtresses et du journalisme. Cinq héroïnes vont tour à tour l\'initier aux mystères du métier, aux secrets de la mondanité et lui assurer la réussite qu\'il espère. Dans cette société parisienne en pleine expansion capitaliste et coloniale, que Maupassant dénonce avec force parce qu\'il la connaît bien, les femmes éduquent, conseillent, œuvrent dans l\'ombre. La presse, la politique, la finance s\'entremêlent. Mais derrière les combines politiques et financières, l\'érotisme intéressé, la mort est là qui veille, et avec elle, l\'angoisse que chacun porte au fond de lui-même.', 'bookpics/Bel_ami.jpg', 2, 0),
(33, 41, 1, 'Candide', ' Le plus célèbre conte philosophique de Voltaire est une oeuvre drôle et féroce dans laquelle l’auteur nous mène avec son héros à la recherche du meilleur des mondes…', 'bookpics/Candide.jpg', 6, 0),
(34, 45, 1, 'Claude Gueux', '« ...Un homme nommé Claude Gueux, pauvre ouvrier, vivait à Paris en 1831. Il avait avec lui une fille qui était sa maîtresse et un enfant de cette fille... Il était capable, habile, intelligent, fort mal traité par l\'éducation, fort bien traité par la nature, ne sachant pas lire mais sachant penser. Un hiver, l\'ouvrage manqua. L\'homme, la fille et l\'enfant eurent froid et faim. L\'homme vola. Il en résulta trois jours de pain et de feu pour la femme et pour l\'enfant et cinq ans de prison pour l\'homme. Il fut envoyé faire son temps à la Maison Centrale de Clairvaux. On va voir ce que la Société en a fait. » Relation allégorique d\'un drame individuel, cet ardent plaidoyer contre la peine de mort et contre la prison met à nu le mécanisme de la brutalité sociale qui ne sait répondre à la détresse que par la répression. Avec Claude Gueux, Victor Hugo n\'est plus simplement romancier ou poète. Il conquiert une place éminente auprès des plus grands orateurs de la Liberté.', 'bookpics/Claude_Gueux.jpg', 1, 0),
(35, 48, 1, 'Da Vinci Code', 'Robert Langdon, un éminent spécialiste de symbologie de Harvard, est convoqué d’urgence au Louvre. On a découvert un message codé sur le cadavre du conservateur en chef, retrouvé assassiné au milieu de la Grande Galerie. Pour examiner la série de pictogrammes, il est épaulé par Sophie Neveu, une brillante cryptographe membre de la police. À leur grande surprise, les premiers indices les conduisent à l\'œuvre de Léonard de Vinci. En déchiffrant le code, Langdon va mettre au jour l\'un des plus grands mystères de notre temps... et devenir un homme traqué.', 'bookpics/Da_Vinci_Code1.jpg', 3, 0),
(36, 49, 1, 'Dernier jour d\'un condamné', 'Victor Hugo nous fait entrer dans la tête d’un condamné à mort qui attend son exécution. On ignore qui il est, quel crime il a commis. Car l’auteur ne veut pas débattre mais montrer l’horreur et l’absurdité de la situation. Son texte a une telle puissance de suggestion que le lecteur, s’identifiant au narrateur, partage avec lui l’angoisse et les vaines espérances. Réquisitoire le plus véhément jamais prononcé contre la peine de mort, ce roman est aussi une admirable leçon d’écriture et d’humanité.', 'bookpics/dernier.jpg', 2, 0),
(37, 53, 1, 'Don Juan', 'Qui est Dom Juan ? À en croire son valet, Sganarelle, il est «le plus grand scélérat que la terre ait porté». Devenu une figure mythique, le personnage peint par Molière est un séducteur, un provocateur, un libertin sans scupule qui refuse les bornes imposées à son désir. Il multiplie les conquêtes féminines, offense son père, défie la morale et la religion, sans se soucier du châtiment à venir... Longtemps censurée, la pièce de Molière continue de fasciner les lecteurs et les spectateurs par son ambiguïté et sa profondeur.', 'bookpics/Don_Juan1.jpg', 1, 0),
(38, 57, 1, 'Fils de sorcière', 'Jean est le seul de sa famille à ne pas avoir hérité des dons de sorcellerie, car la magie se transmet uniquement de mère en fille ! Sa mère, ses six tantes, sa grand-mère et même sa petite sœur Lisa disposent de pouvoirs extraordinaires. Mais quand un buveur de magie les fait disparaître les unes après les autres, Jean appelle son père, qu’il ne connaît pas, au secours. Simples humains, vont-ils terrasser le dangereux buveur de magie et… recréer une famille heureuse ?', 'bookpics/Fils_de_sorci`ere1.jpg', 2, 0),
(39, 74, 1, 'La forêt des captifs', 'Pendant que ses parents explorent les territoires sauvages de l\'autre monde, Ewilan se retrouve prisonnière, sur Terre, d\'une sinistre \"Institution\". Dans ce laboratoire clandestin, la Sentinelle félonne Eléa Ril\'Morienval fomente son retour à Gwendalavir. Privée de son Don, torturée, affaiblie, Ewilan ne pourra plus compter que sur le courage de Salim pour s\'en sortir...', 'bookpics/mondeewilan.jpg', 2, 0),
(40, 74, 2, 'L’œil d\'Otolep', 'De retour à Gwendalavir, Ewilan développe ses pouvoirs à l\'académie d\'Al-Jeit quand on découvre qu\'une méduse aux tentacules mortels bloque l\'accès à l\'Imagination. Pour la combattre, la jeune fille se joint à l\'équipée en route pour la lointaine cité de Valingaï. Après de nombreux combats de l\'Empire, devant l\'oeil d\'Otolep, un lac mythique...', 'bookpics/mondeewilan2', 2, 0),
(41, 74, 3, 'Les tentacules du mal', 'Avec ses amis, Ewilan poursuit son périple vers la mystérieuse cité de Valingaï afin de retrouver ses parents, de rendre le jeune Illian à sa famille et de contrer la méduse qui a envahi l\'Imagination. Au terme de maintes épreuves, c\'est dans cette ville, sur le sable des arènes, que les destins de la jeune fille, de ses compagnons, d\'Eléa Ril\' Morienval et de la méduse se croiseront une dernière fois, dans une confrontation sans merci.', 'bookpics/mondeewilan3', 2, 0),
(42, 54, 1, 'Ellana', 'Seule survivante d’un groupe de pionniers après l’attaque de leur caravane par des Raïs, au nord de l’Empire, une fillette est recueillie par le peuple des Petits. Elle grandit dans la Forêt Maison à l’écart des hommes et décide, à l’adolescence, de partir en quête de ses origines. En chemin, sous le nom d’Ellana, elle croise le plus grand des Marchombres, le maître Jilano Alhuïn, qui la prend pour élève et l’initie aux secrets de sa guilde. Son apprentissage est semé d’embûches mais aussi de rencontres et d’inimitiés.', 'bookpics/Le_pacte_des_Marchombres1.jpg', 3, 0),
(43, 54, 2, 'Ellana l\'envol', 'Encore apprentie marchombre, Ellana est chargée par Jilano, son maître, d’une mission à haut risque : escorter une caravane au chargement précieux et mystérieux. Mais au fi l de ses rencontres, Ellana peine à identifi er ses véritables ennemis, la voie tend à se dérober devant elle et les choix qui engagent sa loyauté et ses sentiments se révèlent périlleux…', 'bookpics/Le_pacte_des_Marchombres2.jpg', 2, 0),
(44, 54, 3, 'Ellana la prophétie', 'Ellana est face à son destin, et doit livrer une ultime bataille pour tenter de retrouver ce qu’elle a de plus précieux au monde : son fils, enlevé par les mercenaires du Chaos. Mais où se trouve la cité des mercenaires ? Est-il encore temps de sauver Destan et l’Empire, promis tous deux à un terrible avenir ?', 'bookpics/Le_pacte_des_Marchombres3.jpg', 2, 0),
(45, 66, 1, 'Labyrinthe', 'Enfermés tels des rats de laboratoire, des ados doivent trouver l\'issue d\'un labyrinthe peuplé de monstres...  Quand Thomas reprend connaissance, sa mémoire est vide, seul son nom lui est familier... Il se retrouve entouré d\'adolescents dans un lieu étrange, à l\'ombre de murs infranchissables. Quatre portes gigantesques, qui se referment le soir, ouvrent sur un labyrinthe peuplé de monstres d\'acier. Chaque nuit, le plan en est modifié.  Thomas comprend qu\'une terrible épreuve les attend tous. Comment s\'échapper par le labyrinthe maudit sans risquer sa vie ? Si seulement il parvenait à exhumer les sombres secrets  enfouis au plus profond de sa mémoire...', 'bookpics/laby.jpg', 1, 0),
(46, 66, 2, 'Terre brulée', 'Pour Thomas, la sortie du Labyrinthe devait être comme une renaissance. Mais aucun des survivants n\'imaginait quel genre de vie les attendait dehors.  Thomas en était sûr, la sortie du labyrinthe marquerait la fin de l\'épreuve. Mais, à l\'extérieur, il découvre un monde ravagé. La terre est dépeuplée, brûlée par un climat ardent. Plus de gouvernement, plus d\'ordre... Et des hordes de gens infectés, en proie à une folie meurtrière, errent dans les villes en ruines.  Au lieu de la liberté espérée, Thomas se trouve confronté à un nouveau défi démoniaque. Au coeur de cette terre brûlée, parviendra-t-il à trouver la paix... et un peu d\'amour ?', 'bookpics/laby2.jpg', 1, 0),
(47, 66, 3, 'Remède Mortel', 'Thomas sait désormais qu\'il ne peut pas faire confiance à Wicked. Armé de ses souvenirs, il s\'élève contre les créateurs de la Cure, à la recherche d\'une vérité potentiellement mortelle...  Le WICKED a tout volé à Thomas : sa vie, sa mémoire et maintenant ses seuls amis. Mais l\'épreuve touche à sa fin. Ne reste qu\'un dernier test... Terrifiant.  Cependant Thomas a retrouvé assez de souvenirs pour ne plus faire confiance à l\'Organisation. Il a triomphé du labyrinthe. Il a survécu sur la terre brûlée. Il fera tout pour sauver ses amis, même si la vérité risque de provoquer la fin de tout.', 'bookpics/laby3.jpg', 1, 0),
(49, 95, 1, 'Divergente raconté par Quatre ', 'Lors de sa cérémonie du Choix, un jeune Altruiste se dresse contre sa famille et sa faction : il choisit de rejoindre les Audacieux. Il choisit de se libérer de son passé. Il choisit un nouveau destin, et devient Quatre. \r\nMais ce qu\'il découvre chez les Audacieux peut mettre en péril son avenir, et celui de la société tout entière. Doit-il se dresser contre sa nouvelle faction ? \r\nEt si Tris, cette novice qui ne ressemble à aucune autre, était la réponse à ses interrogations ?', 'bookpics/divergente4.jpg', 2, 0),
(51, 96, 2, 'Le livre interdit', 'Cal est en prison ! Avec Robin, le demi-elfe, Moineau, la Bête du Lancovit, et le sortcelier Fabrice, Tara retourne sur AutreMonde délivrer son ami et combattre le terrifiant Ravageur d\'Âme. Mais, quand elle rencontre le fantôme de son père, elle découvre que bien des secrets lui ont été cachés sur ses origines et sur la source de son incontrôlable pouvoir. ', 'bookpics/Tara_Duncan2.jpg', 2, 0),
(52, 96, 6, 'Dans le piège de Magister', 'La jolie Tara, de son vrai nom Tara\'tylanhnem Duncan, est à un tournant de sa jeune existence. Longtemps, elle s\'est contentée de parer les machinations de Magister, le maître de la magie démoniaque, qui ne cesse de s\'employer à dévaster sa vie. Il a tué son père, il l\'a contrainte à grandir cachée, a agressé ses amis, sans même parler de ses projets de devenir maître d\'AutreMonde. Mais aujourd\'hui, Tara a quinze ans. Elle prend de plus en plus à cœur son rôle d\'héritière de l\'Empire. Elle en a assez d\'être passive. Quand Magister tente de s\'emparer de Selena, sa mère, dont il est amoureux fou, Tara prend une grande résolution. Elle va passer à l\'attaque. Elle va débusquer Magister et débarrasser AutreMonde de sa détestable influence et de la noirceur de sa magie. C\'est le début d\'une aventure où la guettent trahisons, périls et faux-semblants.\r\n', 'bookpics/Tara_Duncan6.jpg', 1, 0),
(53, 1, 5, 'Harry Potter et l\'ordre du Phoenix ', 'À quinze ans, Harry entre en cinquième année à Poudlard, mais il n\'a jamais été si anxieux. L\'adolescence, la perspective des examens et ces étranges cauchemars... Car Celui-Dont-On-Ne-Doit-Pas-Prononcer-Le-Nom est de retour. Le ministère de la Magie semble ne pas prendre cette menace au sérieux, contrairement à Dumbledore. La résistance s\'organise alors autour de Harry qui va devoir compter sur le courage et la fidélité de ses amis de toujours...', 'bookpics/Harry_Potter5.jpg', 3, 1),
(54, 1, 3, 'Harry Potter et le prisonnier d\'Azkaban', 'Sirius Black, le dangereux criminel qui s\'est échappé de la forteresse d\'Azkaban, recherche Harry Potter. C\'est donc sous bonne garde que l\'apprenti sorcier fait sa troisième rentrée. Au programme : des cours de divination, la fabrication d\'une potion de Ratatinage, le dressage des hippogriffes... Mais Harry est-il vraiment à l\'abri du danger qui le menace ?', 'bookpics/Harry_Potter3.jpg', 3, 0),
(55, 1, 7, 'Harry Potter et les reliques de la mort', 'Cette année, Harry a dix-sept ans et ne retourne pas à Poudlard. Avec Ron et Hermione, il se consacre à la dernière mission confiée par Dumbledore. Mais le Seigneur des Ténèbres règne en maître. Traqués, les trois fidèles amis sont contraints à la clandestinité. D\'épreuves en révélations, le courage, les choix et les sacrifices de Harry seront déterminants dans la lutte contre les forces du Mal.', 'bookpics/Harry_Potter7.jpg', 4, 0),
(56, 1, 4, 'Harry Potter et la coupe de feu ', 'Harry Potter a quatorze ans et entre en quatrième année à Poudlard. Une grande nouvelle attend Harry, Ron et Hermione à leur arrivée : la tenue d\'un tournoi de magie exceptionnel entre les plus célèbres écoles de sorcellerie. Déjà les délégations étrangères font leur entrée. Harry se réjouit... Trop vite. Il va se trouver plongé au cœur des événements les plus dramatiques qu\'il ait jamais eu à affronter.', 'bookpics/Harry_Potter4.jpg', 4, 1),
(57, 1, 6, 'Harry Potter et le prince de sang mêlé ', 'Dans un monde de plus en plus inquiétant, Harry se prépare à retrouver Ron et Hermione. Bientôt, ce sera la rentrée à Poudlard, avec les autres étudiants de sixième année. Mais pourquoi Dumbledore vient-il en personne chercher Harry chez les Dursley ? Dans quels extraordinaires voyages au cœur de la mémoire va-t-il l\'entraîner ?', 'bookpics/Harry_Potter6.jpg', 3, 0),
(58, 62, 1, 'Eragon', 'Eragon n\'a que quinze ans, mais le destin de l\'Empire eEragon n\'a que quinze ans, mais le destin de l\'Empire est désormais entre ses mains !C\'est en poursuivant une biche dans la montagne que le jeune Eragon, quinze ans, tombe sur une magnifique pierre bleue, qui s\'avère être... un oeuf de dragon ! Fasciné, il l\'emporte à Carvahall, le village où il vit pauvrement avec son oncle et son cousin. Il n\'imagine pas alors qu\'une dragonne, porteuse d\'un héritage ancestral, va en éclore...Très vite, la vie d\'Eragon est bouleversée. Contraint de quitter les siens, le jeune homme s\'engage dans une quête qui le mènera aux confins de l\'empire de l\'Alagaësia. Armé de son épée et guidé par les conseils de Brom, le vieux conteur, Eragon va devoir affronter avec sa dragonne les terribles ennemis envoyés par le roi Galbatorix, dont la malveillance démoniaque ne connaît aucune limite.', 'bookpics/Eragon1.jpg', 2, 0),
(59, 62, 4, 'L\'héritage', 'Il y a peu encore, Eragon n\'était qu\'un simple garçon de ferme, et Saphira, son dragon, une étrange pierre bleue ramassée dans la forêt... Depuis, le sort de plusieurs peuples repose sur leurs épaules. De longs mois d\'entraînement et de combats, s\'ils ont permis des victoires et ranimé l\'espoir, ont aussi provoqué des pertes cruelles. Or, l\'ultime bataille contre Galbatorix reste à mener. Certes, Eragon et Saphira ne sont pas seuls, ils ont des alliés : les Vardens conduits par Nasuada, Arya et les elfes, le roi Orik et ses nains, Garzhvog et ses redoutables Urgals. Le peuple des chats-garous s\'est même joint à eux avec son roi, Grimrr Demi-Patte. Pourtant, si le jeune Dragonnier et sa puissante compagne aux écailles bleues ne trouvent pas en eux-mêmes la force d\'abattre le tyran, personne n\'y réussira. Ils n\'auront pas de seconde chance. Tel est leur destin. Il faut renverser le roi maléfique, restaurer la paix et la justice en Alagaësia. Quel que soit le prix à payer.', 'bookpics/Eragon4.jpg', 2, 0),
(60, 62, 2, 'L\'aîné', 'Eragon et Saphira, sa dragonne, sont à peine sortis vainqueurs de la bataille de Farthen Dûr que des Urgals attaquent de nouveau et tuent le chef des Vardens... Nasuada, sa fille, est nommée à leur tête. Après lui avoir prêté allégeance, Eragon entreprend avec Saphira un long et périlleux voyage vers Ellesméra, le royaume des elfes, où ils recevront les enseignements du fameux Togira Ikonoka, l\'Infirme Inchangé. Pendant ce temps, Roran, le cousin d\'Eragon, organise la défense de son village contre les Ra\'zacs. Le jeune homme est persuadé qu\'ils veulent récupérer la mystérieuse pierre trouvée par Eragon sur la Crète. De son côté, le royaume du Surda est toujours en lutte contre l\'Empire de Galbatorix. Eragon, Roran, les Vardens et les rebelles du Surda poursuivent désormais un seul et même but :détruire les forces du Mal.', 'bookpics/Eragon2.jpg', 1, 0),
(61, 28, 1, '16 lunes', 'Ethan a longtemps rêvé de cette fille. Elle apparaissait dans un cauchemar où, malgré tous ses efforts, elle tombait sans qu\'il puisse la sauver. Il se savait lié à elle d\'une façon particulière. Et puis un jour, elle est arrivée en chair et en os au lycée . Elle était belle et mystérieuse. Si Ethan avait su qu\'en même temps que cette fille surgirait aussi une malédiction... Il était éperdument amoureux, mais cet amour était perdu d\'avance.', 'bookpics/16lunes.jpg', 1, 0),
(62, 28, 2, '17 lunes', 'Ethan n’aurait jamais imaginé que Lena pouvait le fuir ou lui cacher des choses. Qu’un jour arriverait où ils ne se comprendraient plus. Son statut de Mortel lui interdisait l’accès au monde des Enchanteurs, mais était-ce une raison pour rompre tout lien ? Après le désastre du seizième anniversaire de Lena, il avait pensé que l’aimer et la soutenir suffiraient. Et que leur amour, indestructible hier, était à présent voué à l’échec.', 'bookpics/17lunes.jpg', 1, 0),
(63, 28, 3, '18 lunes', 'Entourés de Link, l\'Incube nouveau venu, et de Ridley, la Sirène déchue, Ethan et Lena vont vivre une nouvelle année de rêves et de cauchemars. Entre malédiction et trahisons, le choix de l\'amour est-il encore possible?', 'bookpics/18lunes.jpg', 1, 0),
(64, 28, 4, '19 lunes', 'Au lendemain des terribles événements de la Dix-huitième Lune, Ethan n\'a plus qu\'une idée en tête: trouver le moyen de retourner auprès de Lena et de ceux qu\'il aime. De retour à Gatlin, Lena fait quant à elle le serment de tenter l\'impossible pour aider Ethan à revenir. Même si, pour cela, elle doit pactiser avec ses ennemis de toujours. Dans ce final renversant de la saga «\'16 Lunes\", Ethan et Lena devront une fois de plus lutter pour leur amour et écrire leur propre destin. La mort sera-t-elle la fin ou le commencement?', 'bookpics/19lunes.jpg', 1, 0),
(65, 63, 1, 'Le voleur de foudre', 'Percy Jackson n’est pas un garçon comme les autres. Il découvre un jour le secret de sa différence : son père, n’est autre que Poséidon, le dieu de la mer dans la mythologie grecque. Placé pour sa protection dans un camp de vacances pour enfants « sangs mêlés » (mi-humains, mi-divins), Percy se voit injustement accusé d’avoir volé l’éclair de Zeus. Afin d’éviter une guerre fratricide entre les dieux de l’Olympe, il va devoir retrouver l’éclair et démasquer le vrai coupable… au péril de sa vie.', 'bookpics/percy.jpg', 2, 0),
(66, 68, 1, 'Le premier défi de Mathieu Hidalf', 'Mathieu Hidalf, 10 ans seulement, est déjà un trouble-fête de légende. Chaque année, il s\'ingénie à gâcher la plus grande célébration du royaume : l\'anniversaire du roi. Mais cette fois, la plaisanterie risque de tourner au drame. Les redoutables frères Estaffes ont rompu un serment magique et menacent de tuer le souverain. C\'en est trop pour Mathieu : il ne laissera personne prendre sa place d\'expert en sabotage !', 'bookpics/hidalf.jpg', 8, 1),
(67, 102, 1, 'A comme aujourd\'hui', 'Chaque matin, A se réveille dans un corps différent, dans une nouvelle vie, et ne dispose d\'aucun moyen de savoir qui sera son hôte. Une seule chose est sûre : il n\'empruntera cette identité que le temps d\'une journée. Aussi incroyable que cela puisse paraître, A a accepté cet état de fait, et a même établi plusieurs règles qui régissent son existence : ne pas s\'attacher, ne pas se faire remarquer, ne jamais s\'immiscer dans la vie de l\'autre. Jusqu\'à ce qu\'il se réveille dans le corps de Justin, 16 ans, et qu\'il fasse la connaissance de Rhiannon, sa petite amie. Dès lors, il n\'est plus question de subir : il tente par tous les moyens de la revoir, quitte à bouleverser la vie de ses hôtes. Car A a enfin croisé quelqu\'un avec qui il veut être jour après jour...', 'bookpics/acommeaujourdhui.jpg', 2, 0),
(68, 103, 1, 'La citadelle des ombres ', 'Aujourd\'hui, en France et à l\'étranger, La Citadelle des Ombres est unanimement saluée comme l\'un des chefs-d\'oeuvre de la littérature fantastique. Comment n\'être pas envoûté dès les premières pages par la force et le réalisme de l\'intrigue, le foisonnement des péripéties et leurs rebondissements, l\'atmosphère de mystère et de magie de plus en plus oppressante au fur et à mesure que l\'on s\'enfonce dans l\'action ? Au royaume des Six-Duchés, dans l\'inquiétant décor d\'une forteresse battue par les vents et les flots, Fitz, un jeune garçon issu d\'une lignée royale, fait à la cour le rude apprentissage de la vie. Un maître d\'écurie, étrange et bourru, lui prodigue conseils et affection ; un vieux sage, isolé au sommet d\'une tour, le forme à la délicate perception du Bien et du Mal ; des molosses qui l\'ont adopté lui apportent réconfort et protection. Commence alors pour le jeune homme un long voyage initiatique semé d\'embûches et de trahisons. Un voyage au bout de l\'angoisse, de l\'amour, de la désespérance. Confronté aux cruelles exigences de la loyauté, existe-t-il pour lui une autre voie que celle du sacrifice ?', 'bookpics/citadelledesombres.jpg', 1, 0),
(69, 104, 1, 'Le faucon Malté', 'Tim Diamant, le détective privé, a sans doute fait une bonne affaire : le nain Johnny Naples, qui semble redouter de très gros ennuis, lui a offert une vraie fortune pour qu\'il garde précieusement un paquet. Et le plus étonnant, c\'est que ce paquet ne contient que des chocolats maltés! Mais voilà que pour Tim, les catastrophes s\'enchaînent...', 'bookpics/faucon.jpg', 1, 0),
(70, 105, 1, 'Le grimoire d\'Arkandias', 'Au jeu du chat et de la souris, qui aura le dernier mot ? Théophile Amoretti a 12 ans. Il aime passionnément la lecture et passe ses mercredis à la bibliothèque. Par le plus grand des hasards, il découvre, un jour, un grimoire intitulé Leçons pratiques de magie rouge. En le feuilletant, il tombe sur une note oubliée entre deux pages. Stupeur ! Cette note indique comment devenir invisible. Aidé de son ami Bonaventure, il déploie des trésors d\'ingéniosité pour se procurer un oeuf punais et un dé à coudre de sang de poule noire... Mais un inconnu les suit : le mystérieux Agénor Arkandias.', 'bookpics/arkandias.jpg', 2, 0),
(72, 107, 1, 'Le gentil petit diable', 'Écoutez bien Monsieur Pierre : il va raconter aux enfants de Papa Saïd des histoires très, très vraies et très, très sérieuses. Celle du petit diable qui faisait le désespoir de sa famille parce qu\'il voulait être gentil. Celle de l\'avare qui aimait tant son argent qu\'il ne s\'apercevait même pas qu\'il était mort. Celle du prince qui épousa la sirène, celle du petit cochon qui avala l\'étoile polaire, et celle enfin du jeune nigaud qui alla chercher «je ne sais quoi», le rapporta, le partagea et rendit tout le monde heureux…Un gentil petit diable bouleverse la théologie en préférant le ciel à l’enfer. Une patate vit un grand roman d’amour. Des petites filles mutines utilisent la boutique de papa Saïd pour y cacher leur cochon-tirelire. La rue Broca ouvre beaucoup de portes sur l’imaginaire.', 'bookpics/broca1.jpg', 1, 0),
(73, 108, 1, 'La sorcière de la rue Mouffetard et autres contes de la rue Broca ', 'Il était une fois la ville de Paris. Il était une fois une rue Broca. Il était une fois un café kabyle. Il était une fois un Monsieur Pierre. Il était une fois un petit garçon qui s\'appelait Bachir. Il était une fois une petite fille. Et c\'est ainsi que, dans ce livre, vous allez faire la connaissance d\'une sorcière, d\'un géant, d\'une paire de chaussures, de Scoubidou, la poupée voyageuse, d\'une fée, et que vous saurez enfin la véritable histoire de Lustucru et de la mère Michel. Les sorcières et les fées d\'aujourd\'hui, narrées par le génial conteur et ses petits voisins de la rue Broca, à Paris. Pierre Gripari s\'amuse à brouiller les pistes et le lecteur s\'amuse avec lui.', 'bookpics/broca2.jpg', 1, 0),
(74, 109, 1, 'Le petit prince', '«Le premier soir, je me suis donc endormi sur le sable à mille milles de toute terre habitée. J\'étais bien plus isolé qu\'un naufragé sur un radeau au milieu de l\'océan. Alors, vous imaginez ma surprise, au lever du jour, quand une drôle de petite voix m\'a réveillé. Elle disait : “S\'il vous plaît... dessine-moi un mouton !” J\'ai bien regardé. Et j\'ai vu ce petit bonhomme tout à fait extraordinaire qui me considérait gravement...»', 'bookpics/petitprince.jpg', 3, 0),
(75, 110, 1, 'Le petit Nicolas', '\"Savez-vous qui est le petit garçon le plus impertinent, le plus malin et le plus tendre aussi? ? l\'école ou en famille, il a souvent de bonnes idées et cela ne lui réussit pas toujours. Vous l\'avez tous reconnu. C\'est le petit Nicolas évidemment! La maîtresse est inquiète, le photographe s\'éponge le front, le Bouillon devient tout rouge, les mamans ont mauvaise mine, quant ? l\'inspecteur, il est reparti aussi vite qu\'il était venu. Pourtant, Geoffroy, Agnan, Eudes, Rufus, Clotaire, Maixent, Alceste, Joachim... et le petit Nicolas sont - presque - toujours sages... \"', 'bookpics/petitnicolas', 1, 0),
(76, 111, 1, 'Sacrées sorcières', 'Ce livre n\'est pas un conte de fées, mais une histoire de vraies sorcières. Vous n\'y trouverez ni stupides chapeaux noirs, ni manches à balai : la vérité est beaucoup plus épouvantable. Les vraies sorcières sont habillées de façon ordinaire, vivent dans des maisons ordinaires. En fait, elles ressemblent à n\'importe qui. Si on ajoute à cela qu\'une sorcière passe son temps à dresser les plans les plus démoniaques pour attirer les enfants dans ses filets, vous comprendrez pourquoi ce livre vous est indispensable !', 'bookpics/sorciere.jpg', 2, 0),
(77, 112, 1, 'L\'odyssée', 'L\'édition de référence dans une présentation renouvelée. Lecture recommandée en 6 ème et 5 ème par le Ministère de l\'Education National. Dans la petite île d\'Ithaque, Pénélope et son fils Télémaque attendent Ulysse, leur époux et père. Voilà vingt ans qu\'il est parti pour Troie et qu\'ils sont sans nouvelles. De l\'autre côté des mers, Ulysse a pris le chemin du retour depuis longtemps déjà, mais les tempêtes, les monstres, les géants, les dieux parfois, l\'arrêtent ou le détournent de sa route... Premier grand voyageur, Ulysse découvre l\'Inconnu, où naissent les rêves et les peurs des hommes depuis la nuit des temps. L\'Odyssée nous dit cette aventure au terme de laquelle le héros retrouve enfin, aux côtés de Pénélope, « la joie du lit ancien ».', 'bookpics/odyse1.jpg', 2, 0),
(78, 113, 1, 'Les fleurs du mal', '«Voici venir les temps où vibrant sur sa tige Chaque fleur s\'évapore ainsi qu\'un encensoir.» En juin 1857, Charles Baudelaire publie Les Fleurs du Mal, quelques mois seulement après que Flaubert a été jugé pour «outrage à la morale publique et religieuse et aux bonnes moeurs» à cause d\'extraits de Madame Bovary jugés trop sulfureux. Sans surprise, il est accusé à son tour. La justice, qui a finalement acquitté le romancier, condamne le poète «maudit» et le contraint à supprimer six pièces, dont «Les Bijoux» et «Les Métamorphoses du vampire», pour leur caractère explicitement érotique et provocateur. Ce n\'est qu\'en 1949 que Baudelaire est réhabilité à titre posthume, la cour reconnaissant bien tard le «frisson nouveau» que ce recueil apporte à la littérature.', 'bookpics/fleurdumal.jpg', 4, 1),
(80, 115, 1, 'Moby Dick', 'Moby Dick (1851), le chef-d\'oeuvre de Melville, est l\'histoire d\'une obsession : depuis qu\'un féroce cachalot a emporté la jambe du capitaine Achab, celui-ci le poursuit sans relâche de sa haine. Ismaël, matelot embarqué à bord du baleinier le Péquod, se trouve pris peu à peu dans le tourbillon de cette folle vengeance : c\'est par sa voix que se fera entendre l\'affrontement final de l\'homme et du grand Léviathan blanc. Somme encyclopédique érigeant la baleine en un véritable mythe, récit hanté par l\'énigme du bien et du mal, Moby Dick nous fait naviguer sur des mers interdites et accoster sur des rivages inhumains. Jamais on n\'épuisera la science des baleines, suggère Melville. Jamais non plus on ne viendra à bout de la fascination qu\'inspire ce roman sombre et puissant.', 'bookpics/mobydick', 2, 0),
(81, 116, 1, 'Le Comte de Monte-Cristo', '«On fit encore quatre ou cinq pas en montant toujours, puis Dantès sentit qu\'on le prenait par la tête et par les pieds et qu\'on le balançait.«Une, dirent les fossoyeurs.- Deux.- Trois !»En même temps, Dantès se sentit lancé, en effet, dans un vide énorme, traversant les airs comme un oiseau blessé, tombant, tombant toujours avec une épouvante qui lui glaçait le cœur. Quoique tiré en bas par quelque chose de pesant qui précipitait son vol rapide, il lui sembla que cette chute durait un siècle. Enfin, avec un bruit épouvantable, il entra comme une flèche dans une eau glacée qui lui fit pousser un cri, étouffé à l\'instant même par l\'immersion.Dantès avait été lancé dans la mer, au fond de laquelle l\'entraînait un boulet de trente-six attaché à ses pieds.La mer est le cimetière du château d\'If.»', 'bookpics/montecristo.jpg', 3, 0),
(82, 117, 1, 'Le vieil homme et la mer', 'À Cuba, voilà quatre-vingt-quatre jours que le vieux Santiago rentre bredouille de la pêche, ses filets désespérément vides. La chance l’a déserté depuis longtemps. À l’aube du quatre-vingt-cinquième jour, son jeune ami Manolin lui fournit deux belles sardines fraîches pour appâter le poisson, et lui souhaite bonne chance en le regardant s’éloigner à bord de son petit bateau. Aujourd’hui, Santiago sent que la fortune lui revient. Et en effet, un poisson vient mordre à l’hameçon. C’est un marlin magnifique et gigantesque. Débute alors le plus âpre des duels. Combat de l’homme et de la nature, roman du courage et de l’espoir, Le vieil homme et la mer est un des plus grands livres de la littérature américaine.', 'bookpics/vieilhommeetmer.jpg', 1, 1),
(83, 114, 1, 'Madame Bovary', 'Emma Rouault, adolescente, s’était bercée de rêves romanesques. Son mariage avec Charles Bovary, terne médecin de province, la confronte à une réalité prosaïque, dont elle cherche à s’évader par tous les moyens. Mais la maternité, l’ambition qu’elle nourrit pour Charles, le goût des belles choses qui l’entraîne à la dépense ne peuvent satisfaire cette jeune femme qui étouffe dans la société étriquée d’une petite ville normande dominée par la plate figure du pharmacien Homais. Si l’amour est son ultime espérance, sa soif d’idéal, de beauté, de grandeur, l’accule à un point de non-retour. L’histoire d’Emma Bovary, qui valut un procès à son auteur en 1857, s’inscrit dans un univers ordinaire, minutieusement dépeint par l’écriture très maîtrisée de Flaubert. Tout son art se déploie dans ce drame psychologique aux couleurs réalistes.', 'bookpics/bovary.jpg', 1, 0),
(84, 119, 1, 'Orgueil et préjugés', 'Élisabeth Bennet a quatre soeurs et une mère qui ne songe qu’à les marier. Quand parvient la nouvelle de l’installation à Netherfield, le domaine voisin, de Mr Bingley, célibataire et beau parti, toutes les dames des alentours sont en émoi, d’autant plus qu’il est accompagné de son ami Mr Darcy, un jeune et riche aristocrate. Les préparatifs du prochain bal occupent tous les esprits… Jane Austen peint avec ce qu’il faut d’ironie les turbulences du coeur des jeunes filles et, aujourd’hui comme hier, on s’indigne avec l’orgueilleuse Élisabeth, puis on ouvre les yeux sur les voies détournées qu’emprunte l’amour…', 'bookpics/orgueil.jpg', 2, 0),
(87, 65, 1, 'James et la grosse pêche', 'Le petit James mène une existence bien malheureuse auprès de ses deux tantes abominablement méchantes, tante Éponge et tante Piquette, qui ne cessent de le tourmenter et de le maltraiter. Mais un jour, James rencontre un curieux personnage : un vieil homme qui lui confie un sac rempli de mille petites choses vertes recelant tout le pouvoir magique du monde. De plus, une pêche se met à pousser sur le vieux pêcher, à pousser jusqu\'à devenir aussi grosse qu\'une maison ! Événements insolites qui vont bouleverser la vie de James.', 'bookpics/James_et_la_grosse_p^eche.jpg', 3, 0),
(88, 43, 1, '100 jours en enfer', 'James, placé dans un orphelinat sordide à la mort de sa mère, ne tarde pas à tomber dans la délinquance. Il est alors recruté par CHERUB et va suivre un éprouvant programme d\'entraînement avant de se voir confier sa première mission d\'agent secret. Sera t-il capable de résister 100 jours ? 100 jours en enfer...', 'bookpics/Cherub1.jpg', 2, 0),
(89, 43, 2, 'Trafic', 'Pour sa seconde mission, l\'agent James Adams reçoit l\'ordre de pénétrer au coeur du gang du plus puissant trafiquant de dragua du Royaume Son objectif : réunir les preuves nécessaires pour Envoyer ce dangereux criminel derrière les barreaux. Une opération à haut risque...', 'bookpics/Cherub2.jpg', 1, 0),
(90, 43, 3, 'Arizona Max', 'Plongé dans l\'univers impitoyable d\'un pénitencier de haute sécurité, James s\'apprête à vivre les instants les plus périlleux de sa carrière d\'agent Chérub. Il a pour mission de se lier d\'amitié avec l\'un de ses codétenus et de l\'aider à s\'évader d\'Arizona Max...', 'bookpics/Cherub3.jpg', 1, 0),
(91, 43, 4, 'Chute libre', 'En difficulté avec la direction de Cherub, l\'agent James Adams est envoyé dans un quartier défavorisé de Londres pour enquêter sur les activités obscures d\'un petit truand local. Mais cette mission sans envergure va bientôt mettre au jour un complot criminel d\'une ampleur inattendue...', 'bookpics/Cherub4.jpg', 1, 0),
(92, 43, 5, 'Les survivants', 'Le milliardaire Joel Sagan règne sur la secte des Survivants. Et derrière les prophéties fantaisistes du gourou se cache une menace bien réelle... L\'agent James Adams, 14 ans, reçoit l\'ordre d\'infiltrer le quartier général du culte. Saura-t-il résister aux méthodes de manipulation mentale des adeptes ? CHERUB est un département ultrasecret des services de renseignement britanniques composé d\'agents âgés de 10 à 17 ans.', 'bookpics/Cherub5.jpg', 1, 0),
(93, 43, 6, 'Sang pour sang', 'Chaque jour, des animaux sont sacrifiés dans les laboratoires d\'expérimentation scientifique. l\'agent James Adams et sa sœur Lauren sont chargés d\'identifier les membres d\'un groupe terroriste prêt à tout pour faire cesser ce massacre. Une opération qui les conduira aux frontières du bien et du mal... Cherub est un département ultrasecret des services de renseignement britanniques - composé d\'agents âgés de 10 à 17 ans.', 'bookpics/Cherub6.jpg', 1, 0),
(94, 43, 7, 'A la dérive', 'Lors de la chute de l\'empire soviétique, Denis Obidin a fait main basse sur l\'industrie aéronautique russe. Aujourd\'hui confronté à des difficultés financières, il s\'apprête à vendre son arsenal à des groupes terroristes. James est envoyé en Russie pour infiltrer le clan Obidin. Il ignore encore que cette mission va le conduire au bord de l\'abîme...', 'bookpics/Cherub7.jpg', 1, 0),
(95, 43, 8, 'Mad dogs', 'Une impitoyable guerre des gangs ensanglante la ville de Luton. les autorités britanniques confient à Cherub la mission d\'infiltrer les Mad Bugs, la plus redoutable de ces organisations criminelles. James Adams, 15 ans, est le seul agent capable de réussir cette opération de tous les dangers... Cherub est un département ultrasecret des services de renseignement britanniques composé d\'agents âgés de 10 à 17 ans.', 'bookpics/Cherub8.jpg', 1, 0),
(96, 51, 1, 'Divergente', 'Différente. Déterminée. Dangereuse. DIVERGENTE\r\nTris vit dans un monde post-apocalyptique où la société est divisée en cinq factions. À 16 ans, elle doit choisir son appartenance pour le reste de sa vie. Cas rarissime, son test d\'aptitudes n\'est pas concluant.\r\nElle est divergente. \r\nCe secret peut la sauver... ou la tuer.', 'bookpics/Divergente1.jpg', 3, 0),
(97, 51, 2, 'L\'insurrection', 'Différente. Déterminée. Dangereuse. DIVERGENTE \r\nLe monde de Triss a volé en éclats. La guerre a dressé entre elles les factions qui régissent la société, elle a tué ses parents et fait de ses amis des tueurs. Triss est rongée par le chagrin et la culpabilité. Mais elle est divergente. Plus que tout autre, elle doit choisir son camp. \r\nEt se battre pour sauver ce qui peut encore l\'être.', 'bookpics/Divergente2.jpg', 2, 0),
(98, 51, 3, 'Au-delà du mur', 'Différente. Déterminée. Dangereuse. DIVERGENTE\r\nLe règne des factions a laissé place à une nouvelle dictature. Tris et ses amis refusent de s\'y soumettre. Ils doivent s\'enfuir. \r\nMais que trouveront-ils au delà de la clôture ? \r\nEt si tout n\'était que mensonge ?', 'bookpics/Divergente3.jpg', 3, 0);
INSERT INTO `tome` (`id_tome`, `id_serie`, `numtome`, `titre`, `description`, `photo`, `nbtome`, `nbemprunte`) VALUES
(99, 100, 1, '1', 'Un thriller temporel palpitant où intrigues et souvenirs se croisent entre passé et présent\r\n2006. Aspirant mangaka dont la carrière peine à décoller, Satoru Fujinuma travaille comme livreur de pizzas pour joindre les deux bouts. Effacé et peu enclin à s\'ouvrir aux autres, il observe le monde qui l\'entoure sans vraiment y prendre part. Pourtant, Satoru possède un don exceptionnel : à chaque fois qu\'un incident ou une tragédie se déroule près de lui, il est projeté quelques minutes dans le passé pour empêcher l\'inévitable avant qu\'il ne se produise... \r\n\r\nCette anomalie de l\'espace-temps lui vaut un séjour à l\'hôpital le jour où, pour rattraper le conducteur d\'un camion fou, il est percuté par un autre véhicule de plein fouet. Après l\'accident, petit à petit, les souvenirs effacés de l\'enfance traumatisante de Satoru resurgissent... \r\n', 'bookpics/Erased1.jpg', 1, 0),
(100, 100, 2, '2', 'Intriguée par ce qui semble être une tentative de kidnapping, la mère de Satoru commence à se poser des questions sur la série de meurtres qui a secoué Hokkaidô 18 ans plus tôt. Et si la justice ne tenait pas le vrai coupable ? Mais celui-ci l’a reconnue : avant qu’elle ait pu mener l’enquête, elle est assassinée à coups de poignard.\r\nSatoru, arrivé sur les lieux juste après le drame, se retrouve alors propulsé à l’époque de son enfance, quelques jours avant la disparition tragique d’une de ses camarades de classe ! Désormais convaincu que les meurtres sont liés, il va tout faire pour changer le cours des choses…', 'bookpics/Erased2.jpg', 1, 0),
(101, 100, 3, '3', 'Réparer les tragédies du passé pour accepter le présent... Découvrez Erased, le thriller temporel de Kei Sanbe !\r\n2006. Aspirant mangaka dont la carrière peine à décoller, Satoru Fujinuma travaille comme livreur de pizzas pour joindre les deux bouts. Effacé et peu enclin à s\'ouvrir aux autres, il observe le monde qui l\'entoure sans vraiment y prendre part. Pourtant, Satoru possède un don exceptionnel : à chaque fois qu\'un incident ou une tragédie se déroule près de lui, il est projeté quelques minutes dans le passé pour empêcher l\'inévitable avant qu\'il ne se produise... \r\nCette anomalie de l\'espace-temps lui vaut un séjour à l\'hôpital le jour où, pour rattraper le conducteur d\'un camion fou, il est percuté par un autre véhicule de plein fouet. Après l\'accident, petit à petit, les souvenirs effacés de l\'enfance traumatisante de Satoru resurgissent... \r\nRéparer les tragédies du passé pour accepter le présent... Découvrez Erased, le thriller temporel de Kei Sanbe !', 'bookpics/Erased3.jpg', 1, 0),
(102, 100, 4, '4', '', 'bookpics/Erased4.jpg', 1, 0),
(103, 3, 2, 'L\'embrasement', 'À la fois symbole de la rébellion et marionnette d\'une dictature sanglante, Katniss a le pouvoir entre ses mains... liées.\r\n\r\nAprès le succès des derniers Hunger Games, le peuple de Panem est impatient de retrouver Katniss et Peeta pour la Tournée de la victoire. Mais pour Katniss, il s\'agit surtout d\'une tournée de la dernière chance. Celle qui a osé défier le Capitole est devenue le symbole d\'une rébellion qui pourrait bien embraser Panem. Si elle échoue à ramener le calme dans les districts, le président Snow n\'hésitera pas à noyer dans le sang le feu de la révolte. À l\'aube des Jeux de l\'Expiation, le piège du Capitole se referme sur Katniss...', 'bookpics/Hunger_games2.jpg', 1, 0),
(104, 3, 3, 'La révolte', 'Je m\'appelle Katniss Everdeen. Je devrais être morte. Maintenant je vais mener la révolte.\r\n\r\nContre toute attente, Katniss a survécu une seconde fois aux Hunger Games. Mais le Capitole crie vengeance. Katniss doit payer les humiliations qu\'elle lui a fait subir. Et le président Snow a été très clair : Katniss n\'est pas la seule à risquer sa vie. Sa famille, ses amis et tous les anciens habitants du district Douze sont visés par la colère sanglante du pouvoir. Pour sauver les siens, Katniss doit redevenir le geai moqueur, le symbole de la rébellion. Quel que soit le prix à payer.', 'bookpics/Hunger_games3.jpg', 2, 2),
(105, 33, 1, 'Le dragon et l’épée', '\" Tout mythe a un commencement. Voici le début de la plus célèbre quête, celle d\'Arthur Pendragon. \"Ana, la voleuse, détrousse les passants pour survivre. Mais, aujourd\'hui, elle s\'est attaquée à plus malin qu\'elle, et c\'est tout son destin qui bascule en un instant. Car le mystérieux voyageur n\'est autre que le légendaire Merlin. Et justement, l\'enchanteur cherche une apprentie. La vie est dure sous la loi du mage, pourtant Ana tient bon, car elle connaît l\'importance de sa mission : une fois initiée à l\'art de l\'écrit et des runes magiques, elle devra aider Merlin à donner un nouveau roi à la Bretagne. Mais en ces temps de chaos où les armées s\'affrontent, quel seigneur de la guerre est digne de brandir Excalibur ? Fées et dragons sont les pièces d\'un jeu de pouvoir dont Merlin lui-même ne connaît pas tous les enjeux. Ana pourrait bien en être l\'atout maître, celle qui est destinée à changer les règles.', 'bookpics/L\'apprentie_de_Merlin1.jpg', 1, 1),
(106, 33, 2, 'L\'Ogre et le bouclier', '\" Le mythe devient réalité. La Table ronde est sur le point de naître. \"Ana n\'est plus la petite voleuse d\'antan. Désormais, elle est l\'apprentie de Merlin. Le célèbre enchanteur l\'a plongée dans un long sommeil.à son réveil, la jeune fille découvre qu\'Arthur est en âge de réclamer la couronne d\'Angleterre. Mais pour cela, il doit s\'en montrer digne et retirer Excalibur de son rocher. Or de nombreux chevaliers convoitent l\'épée magique. D\'autres obstacles et périls vont parsemer sa route. Afin de l\'assister dans sa quête, ana aide Arthur à rassembler autour de lui de valeureux compagnons. Des garçons fougueux qui ont pour nom Lancelot ou Gauvain, promis eux aussi à un destin d\'exception. Sous l\'oeil de Merlin, le fils d\'Uther Pendragon devra vaincre ses ennemis et se faire le bouclier de son peuple.', 'bookpics/L\'apprentie_de_Merlin2.jpg', 2, 0),
(107, 33, 3, 'La Fée et le Bâton', '\" Le mythe a pris corps. Le royaume d\'Arthur entre dans des temps troublés. \"Près de vingt ans se sont écoulés depuis qu\'Ana, l\'ancienne voleuse devenue apprentie de Merlin, s\'est endormie.à son réveil, la jeune fille constate que son maître est lui aussi plongé dans un profond sommeil dont rien ne peut le tirer. C\'est donc seule qu\'il lui faut rejoindre la cour du roi Arthur à Caameloth, qu\'on dit affaiblie depuis la mystérieuses disparition de Lancelot. Cependant, la magicienne est aussi décidée à faire toute la lumière sur les circonstances de sa propre naissance et sur les obscures motivations de Merlin. Mais Ana est-elle prête à affronter les révélations qui l\'attendent ? Sur le chemin de la vérité, les épreuves sont nombreuses, d\'autant que l\'ombre d\'Eliavrès, le nécromant, plane toujours sur Brocéliande.', 'bookpics/L\'apprentie_de_Merlin3.jpg', 1, 0),
(108, 34, 3, 'La Huitième Porte', 'Huit ans ont passé. L’Autre a gagné. Partout la liberté cède à la violence, les hommes ploient sous le joug d\'Eqkter et de ses créatures maléfiques. Pourtant une lueur d\'espoir subsiste : le sang des sept Familles n\'est pas tari. Les antiques pouvoirs vibrent toujours dans les veines d\'Elio, un jeune garçon qui coule une existence paisible dans un village du Haut-Atlas…', 'bookpics/L\'autre3.jpg', 1, 0),
(109, 34, 2, 'Le maître des tempêtes', 'Natan et Shaé sont venus à bout d’une partie des forces du Mal. Mais il en reste deux à vaincre, et ils doivent en découdre avec le Maître des tempêtes, qui sème la désolation par des catastrophes naturelles. Leur rencontre avec un Guide aveugle, Emiliano, les conduit à se séparer. Natan rejoint sa Famille et tombe dans le piège tendu par sa cousine. Seul, il est condamné…', 'bookpics/autre2.jpg', 2, 0),
(110, 55, 1, 'L\'apprenti-épouvanteur ', '\" L\'Epouvanteur a eu de nombreux apprentis, me dit maman. Mais peu ont achevé leur formation. Et ceux qui y sont parvenus sont loin d\'être à la hauteur. Ils sont fragiles, veules ou lâches. Ils se font payer fort cher de bien maigres services. Il ne reste que toi, mon fils. Tu es notre dernière chance, notre dernier espoir. Il faut que quelqu\'un le fasse. Il faut que quelqu\'un se dresse contre les forces obscures. Tu es le seul qui en soit capable. \" Thomas Ward, le septième fils d\'un septième fils, devient l\'apprenti de l\'Epouvanteur du comté. Son maître est très exigeant. Thomas doit apprendre à tenir les spectres à distance, à entraver les gobelins, à empêcher les sorcières de nuire... Cependant, il libère involontairement Mère Malkin, la sorcière la plus maléfique qui soit, et l\'horreurcommence...', 'bookpics/epouvanteur.jpg', 3, 0),
(111, 55, 2, 'La malédiction de l\'épouvanteur', 'L\'Épouvanteur et son apprenti, Thomas Ward, se sont rendus à Priestown pour y achever un travail. Dans les profondeurs des catacombes de la cathédrale est tapie une créature que l\'Épouvanteur n\'a jamais réussi à vaincre. On l\'appelle le Fléau.\r\nTandis que Thomas et M. Gregory se préparent à mener la bataille de leur vie, il devient évident que le Fléau n\'est pas leur seul ennemi. L\'Inquisiteur est arrivé à Priestown. Il arpente le pays à la recherche de tous ceux qui ont affaire aux forces de l\'obscur! Thomas et son maître survivront-ils à l\'horreur qui s\'annonce?', 'bookpics/epouvanteur2.jpg', 1, 0),
(112, 55, 3, 'Le secret de l\'épouvanteur', 'Alors que le froid se fait plus vif, l\'Épouvanteur reçoit un message qui semble grandement le perturber. Il décide aussitôt de quitter Chipenden pour se rendre dans sa maison d\'hiver, à Anglezarke. La vieille demeure est lugubre : dans les profondeurs obscures de ses caves sont enfermées des sorcières et des gobelins. Quant au mystérieux auteur de la lettre, qui rôde dans les parages, il se révèle être l\'ennemi juré de John Gregory. Au cours de longs mois d\'hiver, Tom découvre peu à peu le passé caché de son maître...', 'bookpics/epouvanteur3.jpg', 2, 0),
(114, 62, 3, 'Brisingr', 'Eragon a une double promesse à tenir : aider Roran à délivrer sa fiancée, Katrina , prisonnière des Ra\'zacs ¿ et venger la mort de son oncle Garrow. Saphira emmène les deux cousins jusqu\'à Helgrind, repaire des monstres. Or, depuis que Murtagh lui a repris Zar\'oc, l\'épée que Brom lui avait donnée, Eragon n\'est plus armé que du bâton du vieux conteur. Cependant, depuis la Cérémonie du Sang, le jeune Dragonnier ne cesse de se transformer, acquérant peu à peu les fabuleuses capacités d\'un elfe. Et Roran mérite plus que jamais son surnom de Puissant Marteau. Quant à Saphira, elle est une combattante redoutable. Ainsi commence cette troisième partie de l\'Héritage, où l\'on verra l\'intrépide Nasuada, chef des Vardens, subir avec bravoure l\'épreuve des Longs Couteaux ; les Vardens affronter les soldats démoniaques de Galbatorix ; Arya et Eragon rivaliser de délicates inventions magiques ; Murtagh chevauchant Thorn, son dragon rouge, batailler contre Eragon et Saphira. On s\'enfoncera dans les galeries souterrainesdes nains ; on se laissera séduire par Nar Garzhvog, le formidable Urgal, et par l\'énigmatique Lupus Enghren, l\'elfe au pelage de loup ; on retrouvera avec bonheur Oromis et Glaedr, le dragon d\'or ; on constatera avec jubilation que Saphira montre toujours un goût certain pour l\'hydromel. Et on saura enfin pourquoi le roman porte ce titre énigmatique : Brisingr, Feu en ancien langage.', 'bookpics/Eragon3.jpg', 2, 0),
(115, 89, 1, 'La vie suspendue', 'Courant parmi les branches, épuisé, les pieds en sang, Tobie fuit, traqué par les siens... Tobie Lolness ne mesure pas plus d\'un millimètre et demi. Son peuple habite le grand chêne depuis la nuit des temps. Parce que son père a refusé de livrer le secret d\'une invention révolutionnaire, sa famille a été exilée, emprisonnée. Seul Tobie a pu s\'échapper. Mais pour combien de temps ?', 'bookpics/Tobie_Lolness1.jpg', 3, 0),
(116, 89, 2, 'Les yeux d\'Elisha', 'Le grand chêne où vivent Tobie et les siens est blessé à mort. Les mousses et les lichens ont envahi ses branches. Léo Blue règne en tyran sur les Cimes et retient Elisha prisonnière. Les habitants se terrent. Les Pelés sont chassés sans pitié. Dans la clandestinité, Tobie se bat, et il n\'est pas le seul. Au plus dur de l\'hiver, la résistance prend corps. Parviendra-t-il à sauver son monde fragile ? Retrouvera-t-il Elisha ?', 'bookpics/Tobie_Lolness2.jpg', 2, 0),
(117, 73, 1, 'D\'un monde à l\'autre', 'La vie de Camille, adolescente surdouée, bascule quand elle pénètre par accident dans l’univers de Gwendalavir avec son ami Salim. Là, des créatures menaçantes, les Ts’liches, la reconnaissent sous le nom d’Ewilan et tentent de la tuer. Originaire de ce monde, elle est l’héritière d’un don prodigieux, le Dessin, qui peut s’avérer une arme décisive dans la lutte de son peuple pour reconquérir pouvoir, liberté et dignité. Épaulée par le maître d’armes de l’empereur et un vieil érudit, Camille parviendra-t-elle à maîtriser son pouvoir ?', 'bookpics/ewilan.jpg', 3, 0),
(118, 73, 2, 'Les frontières de glace', 'En Gwendalavir, Ewilan et Salim partent avec leurs compagnons aux abords des Frontières de Glace pour libérer les Sentinelles garantes de la paix. Ils repoussent en chemin les attaques de guerriers cochons, d’ogres et de mercenaires du Chaos, résolus avec les Ts’liches à tuer Ewilan, mais se découvrent un peuple allié : les Faëls. Salim se lit d’amitié avec une marchombre aux pouvoirs fascinants, tandis qu’Ewilan assoit son autorité et affermit son Don. Mais pour prétendre délivrer les Sentinelles, elle devra d’abord percer le secret du Dragon.', 'bookpics/ewilan2.jpg', 2, 0),
(119, 73, 3, 'L\'île du destin', 'Les Sentinelles libérées, Ewilan et Salim rejoignent la Citadelle des Frontaliers avec leurs compagnons. Là, Ewilan découvre la retraite du légendaire Merwyn, le plus grand des dessinateurs. Il leur conseille de regagner l’autre monde et de convaincre Mathieu, le frère d’Ewilan, de les suivre en Gwendalavir. À leur retour avec lui, la troupe embarque pour les îles Alines où les parents d’Ewilan sont détenus par la traîtresse Eléa Ril’ Morienval. Mais des pirates les pourchassent. Ewilan parviendra-t-elle à mener sa quête jusqu’au bout ?', 'bookpics/ewilan3', 3, 1),
(120, 81, 1, 'La révélation des Médicus', '« Je m\'appelle Oscar Pill et je ne suis pas un garçon comme les autres. Je suis un Médicus : j\'ai le pouvoir extraordinaire de voyager dans n\'importe quel corps vivant. Comme mon père, qui fut autrefois célèbre avant de disparaître. Aujourd\'hui, l\'humanité entière est à nouveau menacée : Skarsdale, le sombre Prince des Pathologus, s\'est échappé de sa prison. Et moi, j\'ai été choisi pour l\'affronter. Il me faut braver tous les dangers et rapporter un Trophée d\'un endroit où je ne suis jamais allé. Un univers mystérieux qui se trouve... dans le corps humain. »', 'bookpics/oscarpill1.jpg', 2, 1),
(121, 81, 2, 'Les deux royaumes', '\"Je m\'appelle Oscar Pill et je suis un Médicus : j\'ai le pouvoir extraordinaire de voyager dans le corps humain. Je pars pour le deuxième Univers intérieur alors que le Prince Noir a juré ma perte. Je suis prêt à y affronter tous les dangers pour trouver, au coeur des Royaumes des Souffles et de Pompée, la mystérieuse Table d\'Emeraude... Car elle seule permettrait de réaliser un rêve fou : ramener mon père à la vie.\"', 'bookpics/oscarpill2.jpg', 1, 0),
(122, 81, 3, 'Le secret des éternels', 'Je pense à elle tout le temps. Quand on est ensemble, rien d\'autre n\'existe. Pour la première fois, je suis vraiment amoureux... Mais notre histoire est impossible. À cause de mes incroyables pouvoirs. Comment lui dire que je peux voyager dans un corps humain, contrôler la pensée ? Que j\'ai même pris place dans la fusée qui se dresse chez l\'homme pour envoyer ses cosmogonautes dans le corps de la femme ? Nos ennemis jurés veulent dominer le monde. Ils nous poursuivent partout. Notre seule chance de survie : réussir la mission que le grand Maître des Médicus m\'a confiée. Mais dois-je renoncer à l\'amour pour sauver le monde ? \"', 'bookpics/oscarpill3.jpg', 1, 0),
(123, 81, 4, 'L\'allié des ténèbres', '\"J\'ai seize ans et j\'ai été banni de l\'Ordre des Médicus. Bientôt, le monde va être anéanti par la terrible attaque du Prince Noir. Le chef des Pathologus veut détruire ce que le corps humain a de plus précieux et de plus dangereux : nos gènes. Je n\'ai plus qu\'un seul espoir : pénétrer dans Génétys, le quatrième Univers, avec mes fabuleux pouvoirs et le diable pour allié.\"', 'bookpics/oscarpill4.jpg', 1, 0),
(124, 81, 5, 'Cérébra, l\'ultime voyage', '\"Trouve le quatrième Pilier. Retourne la terre s\'il le faut, mais trouve-le, Oscar. Et que la prophétie se réalise\". Alors que le monde est ravagé par la folie du Prince Noir, Oscar part pour l\'ultime destination de son voyage initiatique dans le corps humain : Cérébra, le plus fascinant - et le plus dangereux - des univers intérieurs, qui lui révélera aussi le secret de sa propre destinée.', 'bookpics/oscarpill5.jpg', 2, 0),
(125, 44, 1, 'Nihal de la terre du vent', 'Le monde de Nashira va être détruit, consumé par la chaleur. Faute d\'arbres, l\'air se raréfie et le désert s\'étend. C\'est dans cet univers rigoureusement divisé entre esclaves et hommes libres, foi et doute, obscurantisme et vérité, que la jeune comtesse Talitha toujours vécu. Fine lame prisonnière d\'une vie qui ne lui convient pas, Talitha devra affronter un voyage jusqu\'aux terres froides de Talaria et trouver la seule réponse capable de sauver Nashira.', 'bookpics/mondeemerge.jpg', 1, 0),
(126, 44, 2, 'La mission de Sennar', 'Convaincu que le Monde Émergé ne peut résister seul aux armées du Tyran, Sennar le magicien supplie le Conseil des Mages de le laisser partir à la recherche du Monde Submergé pour obtenir de l\'aide.  De son côté, Nihal, la jeune guerrière aux cheveux bleus, poursuit son apprentissage de chevalier du Dragon. Mais le souvenir de Sennar, qu\'elle a blessé au visage lors de leur dernière entrevue, la hante douloureusement...', 'bookpics/mondeemerge2.jpg', 1, 0),
(127, 44, 3, 'Le talisman du pouvoir', 'Grâce à son armée de fantômes, le Tyran est près de remporter la guerre contre les Terres libres. Seule Nihal peut encore l\'arrêter. Si elle parvient à réunir les huit pierres d\'un mystérieux talisman, dispersées dans les Terres du Monde Émergé, Nihal pourra invoquer les Esprits de la nature et contrer la magie du Tyran. Escortée par Sennar, la demi-elfe se lance dans cette mission au terme de laquelle elle découvrira enfi n le sens caché de son destin.', 'bookpics/mondeemerge3.jpg', 2, 0),
(136, 56, 1, 'La face cachée de Margo', 'Margo Roth Speigelman, le nom qui fait fantasmer Quentin depuis toujours. Alors, forcément, quand elle s\'introduit dans sa chambre, un soir, pour l\'entaîner dans une expédition vengeresse, il la suit. Mais au lendemain de leur folle nuit blanche, Margo a disparu. Quentin saura-t-il décrypter les indices qu\'elle a laissés derrière elle ?', 'bookpics/margo.jpg', 1, 0),
(137, 60, 1, 'La gloire de mon père', 'Un petit Marseillais d\'il y a un siècle: l\'école primaire ; le cocon familial ; les premières vacances dans les collines, à La Treille ; la première chasse avec son père...  Lorsqu il commence à rédiger ses Souvenirs d\'enfance, au milieu des années cinquante, Marcel Pagnol est en train de s\'éloigner du cinéma., et le théâtre ne lui sourit plus. La Gloire de mon père, dès sa parution, en 1957, est salué comme marquant l\'avènement d\'un grand prosateur. Joseph, le père instituteur., Augustine, la timide maman., l\'oncle Jules, la tante Rosé, le petit frère Paul, deviennent immédiatement aussi populaires que Marius, César ou Panisse. Et la scène de la chasse à la bartavelle se transforme immédiatement en dictée d\'école primaire... Les souvenirs de Pagnol sont un peu ceux de tous les enfants du monde. Plus tard, paraît-il, Pagnol aurait voulu qu\'ils deviennent un film. C \'est Yves Robert qui, longtemps après la mort de l\'écrivain, le réalisera.  « Je suis né dans la ville d\'Aubagne. sons le Garlaban couronné de chèvres au temps des derniers chevriers. »', 'bookpics/gloiredemonpere.jpg', 1, 0),
(138, 37, 1, 'Le bon gros géant', 'Sophie ne rêve pas, cette nuit-là, quand elle aperçoit de la fenêtre de l\'orphelinat une silhouette immense vêtue d\'une longue cape noire et munie d\'une curieuse trompette. Une main énorme s\'approche... et la saisit. Et Sophie est emmenée au pays des géants. Terrifiée, elle se demande de quelle façon elle va être dévorée. Mais la petite fille est tombée entre les mains d\'un géant peu ordinaire : c\'est le BGG, le Bon Gros Géant, qui se nourrit de légumes, et souffle des rêves dans les chambres des enfants.', 'bookpics/bgg.jpg', 1, 0),
(139, 42, 1, 'Le chant du troll', 'Quand Léna sort de chez elle pour aller à l’école, le ciel a des couleurs étranges. Une fleur pourpre émerge d’une fissure sur un mur de l’école. Perché sur une branche, un petit être l’interpelle. Il l’avertit que le basculement a commencé et que deux forces vont s’affronter…', 'bookpics/troll.jpg', 1, 1),
(140, 67, 1, 'Le malade imaginaire', 'Angélique et Cléante se sont promis l\'un à l\'autre... Argan, père autoritaire, en a décidé autrement : sa fille Angélique épousera un médecin qui le soignera de toutes ses maladies imaginaires. Comment amener ce faux malade à se ranger du côté de l\'amour vrai ? Toinette et Béralde y travaillent, mais la tâche est ardue et Argan têtu', 'bookpics/maladeimaginaire.jpg', 2, 0),
(141, 30, 1, 'Les âmes croisées', 'Nawel vit à Jurilan, le royaume des douze cités. Aspirante comme ses amis Philla et Ergaïl, elle va choisir la caste correspondant à ses aspirations profondes pour le reste de sa vie. Tout indique qu’elle entrera, selon le désir de ses parents, chez les prestigieuses Robes Mages. Mais Nawel s’interroge sur sa place dans cette caste et sur la voie qu’elle doit suivre…', 'bookpics/amescroisees.jpg', 1, 0),
(143, 52, 1, 'Les dix petits nègres', 'Il se passe quelque chose d\'anormal. Les dix personnes conviées sur l\'ïle du Nègre en ont la certitude. Pourquoi leur hôte est-il absent? Soudain, une voix s\'élève, accusant d\'un crime chaque invité. Commence alors une ronde mortelle, rythmée par les couplets d\'une étrange comptine...', 'bookpics/petitnegre.jpg', 1, 0),
(144, 59, 1, 'Les fourberies de Scapin', 'Octave et Léandre apprennent que leurs pères respectifs rentrent de voyage avec la ferme intention de les marier à des inconnues. Or, l\'un d\'eux vient d\'épouser en secret Hyacinte et l\'autre a promis le mariage à une jeune bohémienne. Que faire dans une telle situation ? Une seule solution : appeler le valet Scapin à la rescousse.', 'bookpics/scapin.jpg', 1, 0),
(145, 69, 1, 'Matilda', 'Avant même d\'avoir cinq ans, Matilda sait lire et écrire, connaît tout Dickens, tout Hemingway, a dévoré Kipling et Steinbeck. Pourtant son exercice est loin d\'être facile entre une mère indifférente, abrutie par la télévision et un père d\'une franche malhonnêteté. Sans oublier Mlle Legourdin, la directrice de l\'école, personnage redoutable qui voue à tous les enfants une haine implacable. Sous la plume tendre et acerbe de Roald Dahl, les événements vont se précipiter, étranges, terribles, hilarants...', 'bookpics/matilda.jpg', 1, 0),
(146, 127, 1, 'les contes des mille et une nuits', '', 'bookpics/default.png', -1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id_type`, `description`) VALUES
(1, 'Roman'),
(2, 'BD'),
(3, 'Manga'),
(4, 'Documentaire'),
(5, 'Poésie'),
(6, 'Théâtre'),
(7, 'Oeuvre didactique \r\n'),
(8, 'Album'),
(9, 'Dictionnaire'),
(10, 'Recueil de contes ');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `profilpic` text NOT NULL,
  `password` text NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `date_naissance` date NOT NULL,
  `mail` text NOT NULL,
  `telephone` text NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `login`, `profilpic`, `password`, `admin`, `nom`, `prenom`, `date_naissance`, `mail`, `telephone`, `adresse`) VALUES
(4, 'bertrandmanon', 'profilpics/manon.jpg', '5e3ce643f67600b9c5f1cc89a7dee89b9a3fddb8', 1, 'Bertrand', 'Manon', '2000-09-25', 'manon.bertrand@ig2i.centralelille.fr', '0769980342', '3 rue Denfert Rochereau'),
(5, 'boyavalclément', 'profilpics/clement.jpg', '02f924cf5a96852e01352fe74dae14c46856d3b9', 1, 'Boyaval', 'Clément', '2000-11-06', 'clement.boyaval@ig2i.centralelille.fr', '', ''),
(6, 'el_hanidino', 'profilpics/dino.jpg', '62b7c585472931e34df7d3c2652c83cc5617a0eb', 0, 'El_Hani', 'Dino', '2000-10-23', 'dino.elhani@ig2i.centralelille.fr', '', ''),
(7, 'fauconnathan', 'profilpics/nathan.jpg', '9770652af4249167dd50e1180bd3e2d89ed95ff7', 0, 'Faucon', 'Nathan', '2001-02-05', 'nathan.faucon@ig2i.centralelille.fr', '', ''),
(8, 'brouartaxel', 'profilpics/default-avatar.png', '73314f0f2a6793f7abfab26520008a83f27067ea', 0, 'Brouart', 'Axel', '2000-02-10', 'axel.brouart@ig2i.centralelille.fr', '', '');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`id_tome`) REFERENCES `tome` (`id_tome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commentaire_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `emprunt`
--
ALTER TABLE `emprunt`
  ADD CONSTRAINT `emprunt_ibfk_1` FOREIGN KEY (`id_tome`) REFERENCES `tome` (`id_tome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprunt_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `liste_perso`
--
ALTER TABLE `liste_perso`
  ADD CONSTRAINT `liste_perso_ibfk_1` FOREIGN KEY (`id_tome`) REFERENCES `tome` (`id_tome`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liste_perso_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_ibfk_1` FOREIGN KEY (`id_type`) REFERENCES `type` (`id_type`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tag_serie`
--
ALTER TABLE `tag_serie`
  ADD CONSTRAINT `tag_serie_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tag_serie_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag_list` (`id_tag`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `tome`
--
ALTER TABLE `tome`
  ADD CONSTRAINT `tome_ibfk_1` FOREIGN KEY (`id_serie`) REFERENCES `serie` (`id_serie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
