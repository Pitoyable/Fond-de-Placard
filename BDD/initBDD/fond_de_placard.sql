-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Janvier 2017 à 16:32
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fond_de_placard`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `com_content` text,
  `com_fav` tinyint(1) DEFAULT NULL,
  `com_date` datetime DEFAULT NULL,
  `com_rec_id` int(11) NOT NULL,
  `com_use_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `com_content`, `com_fav`, `com_date`, `com_rec_id`, `com_use_id`) VALUES
(1, NULL, 1, NULL, 1, 4),
(69, NULL, 1, NULL, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `group`
--

CREATE TABLE `group` (
  `id` int(11) NOT NULL,
  `gro_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `group`
--

INSERT INTO `group` (`id`, `gro_name`) VALUES
(1, 'admin'),
(2, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `ing_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ingredients`
--

INSERT INTO `ingredients` (`id`, `ing_name`) VALUES
(6, 'ail'),
(8, 'avocat'),
(3, 'basilic'),
(19, 'beurre'),
(4, 'chèvre'),
(23, 'farine'),
(18, 'lait'),
(9, 'maïs'),
(7, 'miel'),
(2, 'mozzarella'),
(21, 'noisette'),
(24, 'oeuf'),
(11, 'oignon'),
(13, 'patate'),
(14, 'Pâte'),
(5, 'poivrons '),
(22, 'pommes'),
(17, 'riz'),
(10, 'salade'),
(16, 'steak'),
(20, 'sucre'),
(12, 'surimi'),
(15, 'thon'),
(1, 'tomate');

-- --------------------------------------------------------

--
-- Structure de la table `link_ing_rec`
--

CREATE TABLE `link_ing_rec` (
  `ingredients_id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `link_ing_rec`
--

INSERT INTO `link_ing_rec` (`ingredients_id`, `recipe_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(1, 3),
(8, 3),
(10, 3),
(11, 3),
(12, 3),
(6, 4),
(13, 4),
(6, 5),
(14, 5),
(15, 5),
(1, 6),
(10, 6),
(11, 6),
(16, 6),
(17, 7),
(18, 7),
(13, 8),
(19, 8),
(20, 8),
(21, 8),
(22, 8),
(19, 9),
(20, 9),
(23, 9),
(24, 9);

-- --------------------------------------------------------

--
-- Structure de la table `link_rec_the`
--

CREATE TABLE `link_rec_the` (
  `recipe_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `link_rec_use`
--

CREATE TABLE `link_rec_use` (
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `link_rec_use`
--

INSERT INTO `link_rec_use` (`recipe_id`, `user_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(9, 4);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(255) NOT NULL,
  `pic_alt` varchar(255) NOT NULL,
  `pic_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `picture`
--

INSERT INTO `picture` (`id`, `pic_name`, `pic_alt`, `pic_description`) VALUES
(1, 'default', 'default', 'default');

-- --------------------------------------------------------

--
-- Structure de la table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `rec_name` varchar(255) NOT NULL,
  `rec_html` text NOT NULL,
  `rec_type` varchar(45) NOT NULL,
  `rec_valide` tinyint(1) NOT NULL DEFAULT '0',
  `picture_id` int(11) NOT NULL DEFAULT '1',
  `rec_caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `recipe`
--

INSERT INTO `recipe` (`id`, `rec_name`, `rec_html`, `rec_type`, `rec_valide`, `picture_id`, `rec_caption`) VALUES
(1, 'Salade tomates Mozzarella', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 15 minute</p>\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: aucun !</p>\n<p style="padding-left: 60px;">&nbsp;</p>\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\n<p style="padding-left: 60px;">- 750g de tomates</p>\n<p style="padding-left: 60px;">- 250g de mozzarella</p>\n<p style="padding-left: 60px;">- 3 branche de basilic</p>\n<p style="padding-left: 60px;">- 2 c. &agrave; soupe d\'huile d\'olive</p>\n<p style="padding-left: 60px;">- &nbsp;sel, poivre</p>\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\n<p>&nbsp;</p>\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\n<p style="padding-left: 90px;">Lavez les tomates et &eacute;mincez-les en fines rondelles.</p>\n<p style="padding-left: 60px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\n<p style="padding-left: 90px;">Taillez la mozzarella en lamelles de la m&ecirc;me &eacute;paisseur.</p>\n<p style="padding-left: 30px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\n<p style="padding-left: 90px;">Effeuillez le basilic et ciselez-le grossi&egrave;rement.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\n<p style="padding-left: 90px;">Dressez les tomates et la mozzarella, en couronne, sur 4 assiettes, en alternant les rondelles de tomates et les lamelles de fromage.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\n<p style="padding-left: 90px;">Parsemez de basilic.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 6 :</strong></em></p>\n<p style="padding-left: 90px;">Arrosez d&rsquo;huile d&rsquo;olive.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 7 :</strong></em></p>\n<p style="padding-left: 90px;">Salez et poivrez.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<p style="padding-left: 60px;"><em><strong>Etape 8 :</strong></em></p>\n<p style="padding-left: 90px;">&nbsp;Servez frais.</p>\n<p style="padding-left: 90px;">&nbsp;</p>\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\n<p style="padding-left: 30px;">&nbsp;</p>\n<p class="MsoNormal" style="padding-left: 60px;"><span lang="FR">N&rsquo;h&eacute;sitez pas &agrave; ajouter des condiments (noix, thym, ect) !</span></p>', 'entree', 1, 1, 'Une salade de tomates et de mozzarella !'),
(2, 'Bruschetta au chèvre et pommes', 'D&eacute;tails :\r\n- Nombre de personne : 4 Personnes\r\n- Temps de pr&eacute;paration&nbsp;: 10 minutes\r\n- Temps de cuisson&nbsp;: 15 minutes\r\n&nbsp;\r\nIngr&eacute;dients :\r\n- 4 Tranches de pain\r\n- 200g de fromage de ch&egrave;vre\r\n- 2 poivrons rouges\r\n- 1 gousse d\'ail\r\n- 4 c. &agrave; soupe de miel liquide\r\n-&nbsp;1 filet d\'huile d\'olive\r\n- sel, poivre\r\n&nbsp;\r\nPr&eacute;paration :\r\n&nbsp;\r\n&nbsp;Etape 1 :&nbsp;&nbsp;\r\nFaites griller les tranches de pain de campagne au grille-pain ou sous le gril du four, d&eacute;pos&eacute;es sur une plaque de four recouverte de papier sulfuris&eacute;, jusqu&rsquo;&agrave; ce qu&rsquo;elles soient dor&eacute;es.\r\n&nbsp;\r\nEtape 2 :&nbsp;\r\nQuand les tranches de pain sont grill&eacute;es, laissez-les ti&eacute;dir de c&ocirc;t&eacute;.\r\n&nbsp;\r\nEtape 3 :\r\nPelez l&rsquo;ail.\r\n&nbsp;\r\n&nbsp;Etape 4 :\r\nFrottez l&rsquo;ail pel&eacute; sur une seule face de chaque tranche de pain grill&eacute;. R&eacute;servez les tranches de pain, c&ocirc;t&eacute; &laquo; ail &raquo; vers le haut, sur un plat de pr&eacute;sentation.\r\n&nbsp;\r\nEtape 5 :\r\nNettoyez et coupez en deux les poivrons rouges. Retirez les queues, les p&eacute;pins et les peaux blanches, puis tranchez-les en fines lamelles.\r\n&nbsp;\r\nEtape 6 :\r\nFaites chauffer l&rsquo;huile d&rsquo;olive dans une po&ecirc;le sur feu moyen.\r\n&nbsp;\r\nEtape 7 :\r\nQuand l&rsquo;huile d&rsquo;olive est bien chaude, faites-y revenir les lamelles de poivrons pendant 15 min, en les remuant fr&eacute;quemment, jusqu&rsquo;&agrave; obtenir une compot&eacute;e. Salez et poivrez selon vos go&ucirc;ts.\r\n&nbsp;\r\nEtape 8 :\r\n&Ocirc;tez la po&ecirc;le du feu en fin de cuisson.\r\n&nbsp;\r\nEtape 9 :\r\nTartinez de ch&egrave;vre frais la face &laquo; ail&eacute;e &raquo; des tranches de pain grill&eacute;. Disposez par dessus les lamelles de poivrons revenues dans la po&ecirc;le.\r\n&nbsp;\r\nEtape 10 :\r\nVersez 1 c. &agrave; soupe de miel sur le dessus de chaque bruschetta, puis parsemez de romarin s&eacute;ch&eacute;. Rectifiez l&rsquo;assaisonnement en sel et en poivre si besoin.\r\n&nbsp;\r\nEtape 11 :\r\nServez de suite ces bruschettas au ch&egrave;vre, au poivron et au miel dans les assiettes. D&eacute;gustez-les &agrave; l&rsquo;ap&eacute;ritif ou &agrave; l&rsquo;entr&eacute;e, accompagn&eacute;es d&rsquo;une salade verte assaisonn&eacute;e.\r\n&nbsp;\r\nConseil, Astuce :&nbsp;\r\n&nbsp;\r\nVous pouvez utilis&eacute; d&rsquo;autre fruits que la pomme, comme la poire par exemple&nbsp;!', 'entree', 1, 1, 'Bruschetta au chèvre et pommes fondantes'),
(3, 'Wraps de surimi', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 20 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: aucune !</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 4 c. &agrave; soupe de mayonnaise</p>\r\n<p style="padding-left: 60px;">- 2 c &agrave; c&agrave;f&eacute; de moutarde</p>\r\n<p style="padding-left: 60px;">- 1 avocat</p>\r\n<p style="padding-left: 60px;">- 4 galettes de ma&iuml;s</p>\r\n<p style="padding-left: 60px;">-&nbsp;4 feuilles de salade</p>\r\n<p style="padding-left: 60px;">-&nbsp;2 oignons</p>\r\n<p style="padding-left: 60px;">-&nbsp;16 petits coraya</p>\r\n<p style="padding-left: 60px;">-&nbsp;8 tomates cerise</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">M&eacute;langer dans un bol la mayonnaise et la moutarde.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Emincer l\'oignon nouveau. Peler puis couper en petits cubes l\'avocat.</p>\r\n<p style="padding-left: 90px;">Couper les tomates cerise en petits cubes.</p>\r\n<p style="padding-left: 90px;">Dans un saladier, m&eacute;langer l\'oignon, l\'avocat et les tomates.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Etaler une galette sur une assiette. Etaler au centre 1 c &agrave; s de mayonnaise moutard&eacute;e.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 90px;">D&eacute;poser une feuille de salade dessus. Ajouter 4 Petits Coraya puis un quart du m&eacute;lange oignon, avocat et tomates.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Rouler la galette en serrant bien. Fermer le wrap avec deux morceaux de ficelle puis couper en 2.</p>\r\n<p style="padding-left: 90px;">Faire de m&ecirc;me avec les autres galettes.</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">&nbsp;</span></h3>', 'entree', 1, 1, 'Prêt en un tour de main, ces jolis wraps au surimi façon “california roll” sont top pour épater vos invités '),
(4, 'Pommes de terre au four à la suedoise', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 10 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 40 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- Ail</p>\r\n<p style="padding-left: 60px;">- Thym</p>\r\n<p style="padding-left: 60px;">- Pommes de terre</p>\r\n<p style="padding-left: 60px;">- Huilde d\'olive</p>\r\n<p style="padding-left: 60px;">- sel, poivre</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Nettoyer les pommes de terre et les couper en rondelles sans aller jusqu\'&agrave; la base.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">D&eacute;poser les pommes de terre dans un plat allant au four.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Arroser les pommes de terre d\'huile d\'olive puis les parsemer de thym, de fleur de sel et de poivre.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 90px;">Ajouter les gousses d\'ail &eacute;cras&eacute;es.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Faire cuire au four pendant 30 &agrave; 40 minutes tout en surveillant jusqu\'&agrave; ce que les pommes de terre soient tendres et dor&eacute;es.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 90px;">Du fromage &agrave; la charcueterie, ces pommes de terre iront parfaitement avec !</p>', 'plat', 1, 1, 'Des pommes de terre au four qui accompagne parfaitement une assiette de charcuterie '),
(5, 'Pâtes au thon', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 15 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 10 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 400g de&nbsp;p&acirc;tes</p>\r\n<p style="padding-left: 60px;">- 1 boite de thon</p>\r\n<p style="padding-left: 60px;">- 3 gousse d\'ail</p>\r\n<p style="padding-left: 60px;">- 1 pot de cr&egrave;me fraiche</p>\r\n<p style="padding-left: 60px;">- sel, poivre</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Faites bouillir l\'eau pour les p&acirc;tes.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Quand l\'eau bout, mettez-y les spaghettis.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Pendant la cuisson, pr&eacute;parez la sauce : faites revenir le thon et l\'ail.</p>\r\n<p style="padding-left: 90px;">Salez et poivrez.</p>\r\n<p style="padding-left: 90px;">En fin de cuisson, ajoutez la cr&egrave;me fra&icirc;che et faites mariner un peu le tout.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 4:</strong></em></p>\r\n<p style="padding-left: 90px;">Lorsque les spaghettis sont pr&ecirc;ts, m&eacute;langez-les &agrave; la sauce.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Servez.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">Le crabe se marie tr&eacute;s bien avec les p&acirc;tes aussi !</p>', 'plat', 0, 1, 'Un bonne assiette de pâte au thon !'),
(6, 'Hamburger maison', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 10 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 10 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 2 c. &agrave; soupe de moutarde</p>\r\n<p style="padding-left: 60px;">- 3 c. &agrave; soupe de ketchup</p>\r\n<p style="padding-left: 60px;">- Fromage</p>\r\n<p style="padding-left: 60px;">- Cornichon</p>\r\n<p style="padding-left: 60px;">-&nbsp;2 tomate</p>\r\n<p style="padding-left: 60px;">-&nbsp;4 steak hach&eacute;s</p>\r\n<p style="padding-left: 60px;">-&nbsp;2 oignons</p>\r\n<p style="padding-left: 60px;">-&nbsp;Salade</p>\r\n<p style="padding-left: 60px;">-&nbsp;4 pains hamburger</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Cuire les steacks hach&eacute;s. Hacher les oignons, les tomates en rondelles et les cornichons en petits cubes.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Pr&eacute;parer la sauce en m&eacute;langeant le ketchup et la moutarde.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Dans une po&ecirc;le, chauffer 1 c &agrave; s d\'huile d\'olive et faire revenir les pains hambuger.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 90px;">Monter ensuite les hamburgers : Mettre la sauce sur les deux pains hamburgers, mettre le steak hach&eacute;, mettre le fromage si vous le souhaitez, de l\'oignon, les rondelles de tomates, les cornichons. Envelopper le tout dans un papier d\'alu et mettre au four pour 10 minutes.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Ajouter la salade avant de servir et servir avec des chips ou des frites.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">De la sauce au fromage, vous pouvez vari&eacute; les plaisirs !</p>', 'plat', 1, 1, 'De délicieux hamburgers fait maison !'),
(7, 'Riz au lait carambar', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 20 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 30 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 1 sachet de sucre vanill&eacute;</p>\r\n<p style="padding-left: 60px;">- 130g de riz rond</p>\r\n<p style="padding-left: 60px;">- 6 carambar</p>\r\n<p style="padding-left: 60px;">- 65 cl de lait</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Laver le riz et le faire cuire pendant 5minutes dans une casserole d\'eau bouillante.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Egoutter le riz, le remettre dans la casserole et ajouter le lait, les carambers et le sucre vanill&eacute;.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Porter &agrave; ebullition tout en remuant, puis baisser le et faire cuire &agrave; feu doux pendant 25 minutes.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 90px;">&nbsp;Verser le riz au lait dans des coupelles et laisser refroidir avent de servir.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">Vous pouvez r&eacute;alisez se riz au lait avec d\'autre friandise !</p>', 'dessert', 1, 1, 'Du riz au lait au carambar, pour variée les plaisirs !'),
(8, 'Pommes au four', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 4 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 20 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 60 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 2c &agrave; soupe de sirop d\'erable</p>\r\n<p style="padding-left: 60px;">- 7,5 cl d\'eau</p>\r\n<p style="padding-left: 60px;">- 1/2 c. &agrave; c&agrave;f&eacute; de canelle</p>\r\n<p style="padding-left: 60px;">- 30g de sucre roux&nbsp;</p>\r\n<p style="padding-left: 60px;">-&nbsp;70g de fruit sec</p>\r\n<p style="padding-left: 60px;">- 25g de noisette</p>\r\n<p style="padding-left: 60px;">-&nbsp;4 pommes</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Coupez le bas de chaque pomme de fa&ccedil;on &agrave; ce qu\'elles tiennent debout.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">&nbsp;Retirez le p&eacute;doncule de chaque pomme.</p>\r\n<p style="padding-left: 90px;">Videz les pommes &agrave; l\'aide d\'une cuill&egrave;re &agrave; pomme parisienne ou un couteau, pour retirer les trognons.</p>\r\n<p style="padding-left: 90px;">Incisez la peau de chaque pomme sur le tour, pour ne pas qu\'elles &eacute;clatent &agrave; la cuisson.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Pr&eacute;parez la farce des pommes au four.</p>\r\n<p style="padding-left: 90px;">Concassez les noisettes en morceaux, avec un couteau, ainsi que les abricots secs.</p>\r\n<p style="padding-left: 90px;">Placez les noisettes concass&eacute;es et les abricots, dans un saladier. Ajoutez la cannelle et le sucre roux.</p>\r\n<p style="padding-left: 90px;">M&eacute;langez.</p>\r\n<p style="padding-left: 90px;">D&eacute;posez une belle cuill&egrave;re &agrave; soupe de fruits secs au centre de chaque pomme.</p>\r\n<p style="padding-left: 90px;">Ajoutez un petit morceau de beurre au centre et versez 1 c &agrave; soupe de sirop d\'&eacute;rable sur chaque pomme.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 90px;">Placez les pommes dans un plat &agrave; gratin et versez un peu d\'eau au fond du plat.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Dans un four pr&eacute;chauff&eacute; &agrave; 140&deg;C, enfournez les pommes pour 1h &agrave; 1h30 de cuisson, selon si vous les aimez encore un peu croquantes ou confites.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Conseil, Astuce :&nbsp;</span></h3>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;">Utilisez des noix, du cacao ou du miel pour les parfumer si vous le d&eacute;sirez !</p>', 'dessert', 0, 1, 'Des pommes au four au fruits sec et cannelle !'),
(9, 'Quatre Quart', '<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">D&eacute;tails :</span></h3>\r\n<p style="padding-left: 60px;">- Nombre de personne : 6 Personnes</p>\r\n<p style="padding-left: 60px;">- Temps de pr&eacute;paration&nbsp;: 15 minutes</p>\r\n<p style="padding-left: 60px;">- Temps de cuisson&nbsp;: 45 minutes</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="text-align: left; padding-left: 30px;"><span style="text-decoration: underline;">Ingr&eacute;dients :</span></h3>\r\n<p style="padding-left: 60px;">- 1 sachet de levure</p>\r\n<p style="padding-left: 60px;">- 250g de beurre</p>\r\n<p style="padding-left: 60px;">- 250g de farine</p>\r\n<p style="padding-left: 60px;">- 250g de sucre</p>\r\n<p style="padding-left: 60px;">-&nbsp;4 oeufs</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<h3 style="padding-left: 30px;"><span style="text-decoration: underline;">Pr&eacute;paration :</span></h3>\r\n<p>&nbsp;</p>\r\n<p style="padding-left: 60px;">&nbsp;<em><strong>Etape 1 :</strong><strong><em><span style="font-size: 14px;">&nbsp;</span></em>&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Faites chauffer le four &agrave; 180&deg;C ou Th.6.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 2 :&nbsp;</strong></em></p>\r\n<p style="padding-left: 90px;">Dans un saladier, m&eacute;langez le beurre ramolli et le sucre, ajoutez les jaunes d\'oeufs.</p>\r\n<p style="padding-left: 90px;">M&eacute;langez.</p>\r\n<p style="padding-left: 90px;">Ajoutez la farine et la levure tamis&eacute;es dans le saladier et m&eacute;langez.</p>\r\n<p style="padding-left: 30px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 3 :</strong></em></p>\r\n<p style="padding-left: 90px;">Battez les blancs en neige avec une pinc&eacute;e de sel.</p>\r\n<p style="padding-left: 90px;">Ajoutez &agrave; la spatule les blancs en neige, d&eacute;licatement.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 4 :</strong></em></p>\r\n<p style="padding-left: 90px;">&nbsp;</p>\r\n<p style="padding-left: 90px;">Versez dans votre moule &agrave; cake beurr&eacute; et farin&eacute; et enfournez 45 &agrave; 55 minutes.</p>\r\n<p style="padding-left: 90px;">V&eacute;rifiez la cuisson avec la lame d\'un couteau qui doit ressortir s&egrave;che.</p>\r\n<p style="padding-left: 60px;">&nbsp;</p>\r\n<p style="padding-left: 60px;"><em><strong>Etape 5 :</strong></em></p>\r\n<p style="padding-left: 90px;">Laissez refroidir sur une grille.</p>\r\n<p style="padding-left: 90px;">&nbsp;</p>', 'dessert', 1, 1, 'Un Quatre Quart breton !');

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `the_name` varchar(45) NOT NULL,
  `the_valide` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `theme`
--

INSERT INTO `theme` (`id`, `the_name`, `the_valide`) VALUES
(1, 'salsa', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `use_pseudo` varchar(45) NOT NULL,
  `use_email` varchar(45) NOT NULL,
  `use_password` varchar(60) NOT NULL,
  `use_valide` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '2',
  `use_key` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `use_pseudo`, `use_email`, `use_password`, `use_valide`, `group_id`, `use_key`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$nFwj087qSMzLQWOGIgPi2O5p9r0/y009mSu.RizL9mxxFdUBhKHMi', 1, 1, NULL),
(4, 'ler-theo', 'lerquet.theo@orange.fr', '$2y$10$aJ9aTb98SiHqoXPayf3nb.r0hhmDDDLoe0S4PjEmXeaxgO1Hn6d8O', 1, 1, 'b928e07501944b3146dd879aeb3e4de3');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_recipe_has_user1_idx` (`com_rec_id`,`com_use_id`);

--
-- Index pour la table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gro_name_UNIQUE` (`gro_name`);

--
-- Index pour la table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ing_name_UNIQUE` (`ing_name`);

--
-- Index pour la table `link_ing_rec`
--
ALTER TABLE `link_ing_rec`
  ADD PRIMARY KEY (`ingredients_id`,`recipe_id`),
  ADD KEY `fk_ingredients_has_recipe_recipe1_idx` (`recipe_id`),
  ADD KEY `fk_ingredients_has_recipe_ingredients_idx` (`ingredients_id`);

--
-- Index pour la table `link_rec_the`
--
ALTER TABLE `link_rec_the`
  ADD PRIMARY KEY (`recipe_id`,`theme_id`),
  ADD KEY `fk_recipe_has_theme_theme1_idx` (`theme_id`),
  ADD KEY `fk_recipe_has_theme_recipe1_idx` (`recipe_id`);

--
-- Index pour la table `link_rec_use`
--
ALTER TABLE `link_rec_use`
  ADD PRIMARY KEY (`recipe_id`,`user_id`),
  ADD KEY `fk_recipe_has_user_user1_idx` (`user_id`),
  ADD KEY `fk_recipe_has_user_recipe1_idx` (`recipe_id`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `img_name_UNIQUE` (`pic_name`);

--
-- Index pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rec_name_UNIQUE` (`rec_name`),
  ADD KEY `fk_recipe_picture1_idx` (`picture_id`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `the_name_UNIQUE` (`the_name`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `use_pseudo_UNIQUE` (`use_pseudo`),
  ADD UNIQUE KEY `use_email_UNIQUE` (`use_email`),
  ADD KEY `fk_user_group1_idx` (`group_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT pour la table `group`
--
ALTER TABLE `group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_recipe_has_user1` FOREIGN KEY (`com_rec_id`,`com_use_id`) REFERENCES `link_rec_use` (`recipe_id`, `user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_ing_rec`
--
ALTER TABLE `link_ing_rec`
  ADD CONSTRAINT `fk_ingredients_has_recipe_ingredients` FOREIGN KEY (`ingredients_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ingredients_has_recipe_recipe1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_rec_the`
--
ALTER TABLE `link_rec_the`
  ADD CONSTRAINT `fk_recipe_has_theme_recipe1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_theme_theme1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `link_rec_use`
--
ALTER TABLE `link_rec_use`
  ADD CONSTRAINT `fk_recipe_has_user_recipe1` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recipe_has_user_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_recipe_picture1` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_group1` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
