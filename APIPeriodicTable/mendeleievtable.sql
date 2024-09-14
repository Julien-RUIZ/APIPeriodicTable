-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 14 sep. 2024 à 12:48
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mendeleievtable`
--

-- --------------------------------------------------------

--
-- Structure de la table `api_documentation`
--

DROP TABLE IF EXISTS `api_documentation`;
CREATE TABLE IF NOT EXISTS `api_documentation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `example_request1` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `example_request2` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `example_request3` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `example_request4` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `example_response` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `endpoint4` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `endpoint1` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `endpoint2` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `endpoint3` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `button_title` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `error` varchar(1000) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `api_documentation`
--

INSERT INTO `api_documentation` (`id`, `title`, `description`, `example_request1`, `example_request2`, `example_request3`, `example_request4`, `example_response`, `endpoint4`, `endpoint1`, `endpoint2`, `endpoint3`, `button_title`, `error`) VALUES
(3, 'Introduction', 'L\'API des Éléments Périodiques est une interface conçue pour fournir des informations complètes et à jour sur les éléments chimiques du tableau périodique. Cette API permet aux développeurs d\'accéder facilement à des données précises concernant les éléments chimiques, telles que le numéro atomique, le symbole, la masse atomique, les propriétés physiques et chimiques, ainsi que d\'autres caractéristiques essentielles.\n\nQue vous travailliez sur une application éducative, scientifique, ou que vous ayez besoin d\'intégrer des informations sur les éléments chimiques dans vos projets, notre API simplifie l\'accès à ces données tout en garantissant leur exactitude et leur fiabilité.', NULL, NULL, NULL, NULL, 'Voici le modèle d\'un élément avec toutes les données disponibles. Vous pouvez utiliser ce modèle afin de réaliser vos prochaines requêtes sur la suite de la documentation. \n\n[\n	{\n		\"nom\": \"Hydrogène\",\n		\"slug\": \"hydrogene\",\n		\"electron\": \"1\",\n		\"numero\": 1,\n		\"symbole\": \"H\",\n		\"GroupeVertical\": \"1\",\n		\"PeriodeHorizontal\": \"1\",\n		\"masseVolumique\": \"0.00008988 g\\/cm³\",\n		\"cas\": \"12385-13-6\",\n		\"einecs\": \"231-595-7\",\n		\"masseAtomique\": \"1.008\",\n		\"rayonAtomique\": \"53 pm\",\n		\"rayonDeCovalence\": \"38 pm\",\n		\"rayonDeVanDerWaals\": \"120 pm\",\n		\"configurationElectronique\": \"1s¹\",\n		\"etatOxydation\": \"-1, +1\",\n		\"decouverteAnnee\": \"1766\",\n		\"decouverteNoms\": \"Henry Cavendish\",\n		\"decouvertePays\": \"Grande-Bretagne\",\n		\"electronegativite\": \"2.20\",\n		\"pointDeFusion\": \"-259.16\",\n		\"pointDEbullition\": \"-252.87\",\n		\"Radioactif\": false,\n		\"elementCategory\": {\n			\"name\": \"Non métal\",\n			\"slug\": \"nonMetal\"\n		},\n		\"elementGroupe\": {\n			\"name\": \"Alcalins\",\n			\"slug\": \"alcalins\"\n		}\n	}\n]', NULL, NULL, NULL, NULL, 'Introduction', NULL),
(7, 'Authentification et Accès', 'Les requêtes utilisant le verbe GET ne nécessitent aucune authentification. Bien que la documentation soit accessible avec une simple inscription gratuite, l\'accès aux données via des requêtes GET est libre de toute restriction ou contrôle.\n\nEn revanche, si vous souhaitez modifier les données des éléments ou les différentes définitions, une demande devra être effectuée depuis votre espace personnel. À ce stade, une clé API unique vous sera attribuée. Cette clé, valable pour une durée limitée, pourra être renouvelée au besoin. Dans ce cas, une seconde documentation, dédiée aux modifications, sera disponible dans la barre de menu pour guider les utilisateurs à travers ce processus.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Authentification et ', NULL),
(8, 'Tous les éléments', 'Récupère tous les éléments. Il est possible de spécifier des attributs ou d\'utiliser la pagination.', 'GET - /api/elements', 'GET - /api/elements?field=nom', 'GET - /api/elements?page=1&limit=6', 'GET - /api/elements?field=nom,id&page=1&limit=6', 'Exemple de requête 4 - GET - /api/elements?field=nom,id&page=1&limit=6\n\n{\n	\"data\": [\n		{\n			\"nom\": \"Hydrogène\",\n			\"id\": 1\n		},\n		{\n			\"nom\": \"Hélium\",\n			\"id\": 2\n		},\n		{\n			\"nom\": \"Lithium\",\n			\"id\": 3\n		},\n		{\n			\"nom\": \"Béryllium\",\n			\"id\": 4\n		},\n		{\n			\"nom\": \"Bore\",\n			\"id\": 5\n		},\n		{\n			\"nom\": \"Carbone\",\n			\"id\": 6\n		}\n	],\n	\"pagination\": {\n		\"Numéro de la page\": 1,\n		\"Element par page\": 6,\n		\"Page total\": 20,\n		\"Nombre d\'élément max\": 118\n	}\n}', 'api/elements?field={attribut1,attribut2,etc}&page={nbPage}&limit={nbLimit}\n- Tous les éléments du tableau périodique + choix des attributs à afficher + Indication numéro de page et limite élément par page', '/api/elements\n- Tous les éléments du tableau périodique.', 'api/elements?field={attribut1,attribut2,etc}\n- Tous les éléments du tableau périodique + choix des attributs à afficher\n- Pour afficher la catégorie ou le groupe, utiliser :\n *  elementCategory.name, sur le JSON, vous aurez pour nom categoryname\n *  elementGroupe.name, sur le JSON, vous aurez pour nom groupename', 'api/elements?page={n°page}&limit={limit}\n- Tous les éléments du tableau périodique + Indication numéro de page et limite élément par page', 'Tous les éléments', 'Erreur 500 : \n- Requête qui se termine par \",\".\n- Sensibilité a la casse en ce qui concerne l\'écriture des attributs.\n\nErreur 400 :\n- Maximum de 118 éléments donc il ne peut y avoir plus en fonction des variables \"page\" et \"limit\"');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240914062332', '2024-09-14 06:23:37', 30);

-- --------------------------------------------------------

--
-- Structure de la table `element`
--

DROP TABLE IF EXISTS `element`;
CREATE TABLE IF NOT EXISTS `element` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `info_element` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(13) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `symbole` varchar(4) COLLATE utf8mb3_unicode_ci NOT NULL,
  `element_category_id` int DEFAULT NULL,
  `element_groupe_id` int DEFAULT NULL,
  `masse_volumique` varchar(100) COLLATE utf8mb3_unicode_ci NOT NULL,
  `cas` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `einecs` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `masse_atomique` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rayon_atomique` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `rayon_de_covalence` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `rayon_de_van_der_waals` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `electron` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `configuration_electronique` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `etat_oxydation` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `decouverte_annee` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `decouverte_noms` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `decouverte_pays` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `electronegativite` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `point_de_fusion` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `point_debullition` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  `radioactif` tinyint(1) NOT NULL,
  `groupe_vertical` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `periode_horizontal` varchar(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_41405E39B8E0C54F` (`element_category_id`),
  KEY `IDX_41405E39D24E1BA7` (`element_groupe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `element`
--

INSERT INTO `element` (`id`, `nom`, `info_element`, `slug`, `numero`, `symbole`, `element_category_id`, `element_groupe_id`, `masse_volumique`, `cas`, `einecs`, `masse_atomique`, `rayon_atomique`, `rayon_de_covalence`, `rayon_de_van_der_waals`, `electron`, `configuration_electronique`, `etat_oxydation`, `decouverte_annee`, `decouverte_noms`, `decouverte_pays`, `electronegativite`, `point_de_fusion`, `point_debullition`, `radioactif`, `groupe_vertical`, `periode_horizontal`) VALUES
(1, 'Hydrogène', 'L’hydrogène est l’élément le plus abondant dans l’univers, constituant environ 75 % de sa masse. Il est également la source principale d’énergie dans les étoiles, y compris notre Soleil.', 'hydrogene', 1, 'H', 10, 1, '0.00008988 g/cm³', '12385-13-6', '231-595-7', '1.008', '53 pm', '38 pm', '120 pm', '1', '1s¹', '-1, +1', '1766', 'Henry Cavendish', 'Grande-Bretagne', '2.20', '-259.16', '-252.87', 0, '1', '1'),
(2, 'Hélium', 'L’hélium est le deuxième élément le plus léger, principalement utilisé dans les ballons et les dirigeables en raison de sa flottabilité. Il est également utilisé dans les environnements à très basse température, comme les réacteurs nucléaires.', 'helium', 2, 'He', 2, 10, '0.0001786 g/cm³', '7440-59-7', '231-168-5', '4.0026', '31 pm', '32 pm', '140 pm', '2', '1s²', '0', '1895', 'Sir William Ramsay', 'Royaume-Uni', 'N/A', '-272.20', '-268.93', 0, '18', '1'),
(3, 'Lithium', 'Le lithium est un métal léger utilisé principalement dans les batteries rechargeables pour les téléphones portables, les ordinateurs portables et les voitures électriques.', 'lithium', 3, 'Li', 5, 1, '0.534 g/cm³', '7439-93-2', '231-102-5', '6.94', '134 pm', '134 pm', '182 pm', '2|1', '[He] 2s¹', '+1', '1817', 'Johan August Arfvedson', 'Suède', '0.98', '180.54', '1342.0', 0, '1', '2'),
(4, 'Béryllium', 'Le béryllium est un métal léger mais très résistant, souvent utilisé dans les alliages pour les composants aéronautiques et spatiaux.', 'beryllium', 4, 'Be', 6, 2, '1.848 g/cm³', '7440-41-7', '231-150-7', '9.0122', '112 pm', '90 pm', '153 pm', '2|2', '[He] 2s²', '+2', '1798', 'Louis-Nicolas Vauquelin', 'France', '1.57', '1287.0', '2470.0', 0, '2', '2'),
(5, 'Bore', 'Le bore est un métalloïde important utilisé dans les produits de nettoyage, les savons, ainsi que dans les matériaux résistants à haute température comme la fibre de verre.', 'bore', 5, 'B', 8, 5, '2,34 g·cm-3 (cristaux)\r\n2,37 g·cm-3 (variété amorphe)', '7440-42-8', '231-151-2', '10.81', '85 pm (87 pm)', '82 pm', '208 pm', '2|3', '[He] 2s² 2p¹', '3', '1808', 'Louis Joseph Gay-Lussac, Louis Jacques Thénard, Humphry Davy', 'France et Grande-Bretagne', '2,04', '2 075 °C', '4 000 °C', 0, '13', '2'),
(6, 'Carbone', 'Le carbone est l’élément de base de la vie. Sous différentes formes, il peut être aussi tendre que le graphite ou aussi dur que le diamant.', 'carbone', 6, 'C', 10, 6, '2.267 g/cm³', '7440-44-0', '231-153-3', '12.011', '70 pm', '77 pm', '170 pm', '2|4', '[He] 2s² 2p²', '-4, +2, +4, +6', 'Antiquité', 'Connu depuis l Antiquité', 'Divers', '2.55', '3550.0', '4827.0', 0, '14', '2'),
(7, 'Azote', 'L’azote constitue environ 78 % de l’atmosphère terrestre. Il est un composant essentiel des acides aminés et des protéines, jouant un rôle clé dans les processus biologiques.', 'azote', 7, 'N', 10, 7, '1,24982 g·l-1', '17778-88-0 (atome), 7727-37-9 (molécule)', '231-783-9', '14.007', '65 pm (56 pm)', '75 pm', '150 pm', '2|5', '[He] 2s² 2p³', '-3, 0, +2, +3, +4, +', '1772', 'Daniel Rutherford', 'Écosse', '3,04', '-210,00 °C', '-195,798 °C', 0, '15', '2'),
(8, 'Oxygène', 'L’oxygène est essentiel à la respiration des êtres vivants. Il constitue environ 21 % de l’atmosphère terrestre et est le troisième élément le plus abondant dans l’univers.', 'oxygene', 8, 'O', 10, 8, '0.001429 g·l-1 (gaz à 0 °C et 1 atm)', '7782-44-7', '231-956-9', '15.999', '60 pm', '73 pm', '152 pm', '2|6', '[He] 2s² 2p⁴', '-2', '1774', 'Joseph Priestley, Carl Wilhelm Scheele', 'Angleterre, Suède', '3.44', '-218.79 °C', '-182.96 °C', 0, '16', '2'),
(9, 'Fluor', 'Le fluor est un halogène très réactif, utilisé dans les dentifrices pour protéger contre les caries, ainsi que dans la production de produits chimiques industriels.', 'fluor', 9, 'F', 3, 9, '1,696 g·l-1 (0 °C, 1 atm),\n1,50 g·cm-3 (liquide, -188,12 °C)', '14762-94-8', '', '18.998', '50 pm (42 pm)', '71 pm', '135 pm', '2|7', '[He] 2s² 2p⁵', '-1', '1886', 'Henri Moissan', 'France', '3,98', '-219,67 °C', '-188,12 °C', 0, '17', '2'),
(10, 'Néon', 'Le néon est un gaz noble inerte utilisé principalement dans les enseignes lumineuses et les tubes à vide pour créer des effets visuels lumineux.', 'neon', 10, 'Ne', 2, 10, '0.0008999 g/cm³', '7440-01-9', '231-103-0', '20.18', '38 pm', '69 pm', '154 pm', '2|8', '[He] 2s² 2p⁶', '0', '1898', 'Sir William Ramsay et Morris Travers', 'Royaume-Uni', 'N/A', '-248.59', '-246.05', 0, '18', '2'),
(11, 'Sodium', 'Le sodium est un métal alcalin, essentiel à la vie. Il est principalement utilisé dans les lampes à vapeur de sodium et comme électrolyte dans le corps humain.', 'sodium', 11, 'Na', 5, 1, '0,971 g·cm-3 (20 °C)', '7440-23-5', '231-132-9', '22.99', '180 pm (190 pm)', '154 pm', '227 pm', '2|8|1', '[Ne] 3s¹', '+1', '1807', 'Humphry Davy', 'Grande-Bretagne', '0,93', '97,80 °C', '883 °C', 0, '1', '3'),
(12, 'Magnésium', 'Le magnésium est un métal léger utilisé dans les alliages pour les avions, ainsi que dans les feux d’artifice pour produire une lumière blanche intense.', 'magnesium', 12, 'Mg', 6, 2, '1,738 g·cm-3 (20 °C)', '7439-95-4', '231-104-6', '24.305', '150 pm', '130 pm', '173', '2|8|2', '[Ne] 3s²', '2', '1775', 'Joseph Black', 'Écosse', '1,31', '650 °C', '1 090 °C', 0, '2', '3'),
(13, 'Aluminium', 'L’aluminium est un métal léger et résistant à la corrosion, utilisé dans les canettes, le papier aluminium, les avions et la construction.', 'aluminium', 13, 'Al', 9, 5, '2,6989 g·cm-3', '7429-90-5', '231-072-3', '26.982', '125 pm (118 pm)', '118 pm', '205 pm', '2|8|3', '[Ne] 3s² 3p¹', '3', '1827', 'Hans Christian Ørsted', 'Danemark', '1,61', '660,323 °C', '2 519 °C', 0, '13', '3'),
(14, 'Silicium', 'Le silicium est un semi-conducteur utilisé dans la fabrication des puces électroniques et des panneaux solaires. Il est également le principal composant du sable et du verre.', 'silicium', 14, 'Si', 8, 6, '2,33 g·cm-3 (25 °C)', '7440-21-3', '231-130-8', '28.085', '110 pm (111 pm)', '111 pm', '210', '2|8|4', '[Ne] 3s² 3p²', '+1, +2, +3, +4', '1824', 'Jöns Jacob Berzelius', 'Suède', '1,9', '1 414 °C', '3 265 °C', 0, '14', '3'),
(15, 'Phosphore', 'Le phosphore est essentiel à la vie, jouant un rôle clé dans les processus biologiques tels que la photosynthèse. Il est également utilisé dans les allumettes et les feux d’artifice.', 'phosphore', 15, 'P', 10, 7, '1,82 g·cm-3 (blanc),\r\n2,16 g·cm-3 (rouge),\r\n2,25 à 2,69 g·cm-3 (noir)', '7723-14-0 (jaune), 29879-37-6 (rouge)', '231-768-7', '30.974', '100 pm (98 pm)', '106 pm', '180', '2|8|5', '[Ne] 3s² 3p³', '±3, 5, 4', '1669', 'Hennig Brandt', 'Allemagne', '2,19', '44,15 °C', '280,5 °C', 0, '15', '3'),
(16, 'Soufre', 'Le soufre est un élément essentiel utilisé dans la production d’acide sulfurique, l’un des produits chimiques les plus importants au monde. Il est aussi présent dans certains composés odorants.', 'soufre', 16, 'S', 10, 8, '2,07 g·cm-3 (rhombique),\r\n2,00 g·cm-3 (monoclinique, 20 °C)', '7704-34-9', '231-722-6', '32.06', '100 pm (88 pm)', '102 pm', '180', '2|8|6', '[Ne] 3s² 3p⁴', '±2, 4, 6', 'Antiquité', 'Antoine de Lavoisier (1743-1794) et Louis Gay Lussac (1778-1850)', 'France', '2,58', '115,21 °C', '444,61 °C', 0, '16', '3'),
(17, 'Chlore', 'Le chlore est utilisé comme désinfectant dans l’eau potable et les piscines. C’est également un élément essentiel dans de nombreux produits chimiques industriels.', 'chlore', 17, 'Cl', 3, 9, '3,214 g·l-1,\r\n1,56 g·cm-3 (-33,6 °C)', '22537-15-1', '', '35.45', '100 pm (79 pm)', '99 pm', '180 pm', '2|8|7', '[Ne] 3s² 3p⁵', '0, ±1, +3, +5, +7', '1774', 'Carl Wilhelm Scheele', 'Suède', '3,16', '-101,5 °C', '-34,04 °C', 0, '17', '3'),
(18, 'Argon', 'L’argon est un gaz noble utilisé principalement dans les ampoules à incandescence pour protéger le filament de tungstène de l’oxydation.', 'argon', 18, 'Ar', 2, 10, '1,7837 g·l-1\r\n(0 °C, 1 atm)', '7440-37-1', '231-147-0', '39.948', '(71 pm)', '97 pm', '188 pm', '2|8|8', '[Ne] 3s² 3p⁶', '0', '1894', 'William Ramsay, John William Strutt Rayleigh', '', '', '-189,36 °C', '-185,85 °C', 0, '18', '3'),
(19, 'Potassium', 'Le potassium est un électrolyte essentiel pour le bon fonctionnement des cellules et des nerfs dans le corps humain. Il est également utilisé dans les engrais pour l’agriculture.', 'potassium', 19, 'K', 5, 1, '0,89 g·cm-3', '7440-09-7', '231-119-8', '39.098', '220 pm (243 pm)', '196 pm', '275', '2|8|8|1', '[Ar] 4s¹', '1', '1807', 'Humphry Davy', 'Grande-Bretagne', '0,82', '63,5 °C', '759 °C', 0, '1', '4'),
(20, 'Calcium', 'Le calcium est essentiel pour les os et les dents chez les humains et les animaux. Il est également utilisé dans la construction, notamment dans le ciment et le béton.', 'calcium', 20, 'Ca', 6, 2, '1,54 g·cm-3 (20 °C)', '7440-70-2', '231-179-5', '40.078', '180 pm (194 pm)', '174 pm', '197,3 pm', '2|8|8|2', '[Ar] 4s²', '2', '1808', 'Humphry Davy', 'Grande-Bretagne', '1', '842 °C', '1 484 °C', 0, '2', '4'),
(21, 'Scandium', 'Le scandium est un métal rare utilisé dans les alliages pour les composants légers de haute performance, tels que ceux utilisés dans les avions et les équipements sportifs.', 'scandium', 21, 'Sc', 7, 3, '2,989 g·cm-3 (25 °C)', '7440-20-2', '231-129-2', '44.956', '160 pm (184 pm)', '144 pm', '', '2|8|9|2', '[Ar] 3d¹ 4s²', '3', '1879', 'Lars Fredrik Nilson', 'Suède', '1,36', '1 541 °C', '2 836 °C', 0, '3', '4'),
(22, 'Titane', 'Le titane est un métal très résistant à la corrosion et léger, souvent utilisé dans les implants chirurgicaux et les applications aérospatiales.', 'titane', 22, 'Ti', 7, 3, '4,51 g·cm-3', '7440-32-6', '231-142-3', '47.867', '140 pm (176 pm)', '136 pm', '', '2|8|10|2', '[Ar] 3d² 4s²', '4', '1791', 'William Gregor', 'Grande-Bretagne', '1,54', '1 668 °C', '3 287 °C', 0, '4', '4'),
(23, 'Vanadium', 'Le vanadium est utilisé pour renforcer l’acier, ce qui en fait un composant essentiel dans la construction de bâtiments, de ponts et de pipelines.', 'vanadium', 23, 'V', 7, 3, '6,0 g·cm-3 (18,7 °C)', '7440-62-2', '231-171-1', '50.942', '135 pm (171 pm)', '125 pm', '', '2|8|11|2', '[Ar] 3d³ 4s²', '5, 3', '1901', 'Andrés Manuel del Río', 'Suède', '1,63', '1 910 °C', '3 407 °C', 0, '5', '4'),
(24, 'Chrome', 'Le chrome est utilisé dans les alliages pour produire de l’acier inoxydable et dans les revêtements pour conférer aux surfaces un éclat miroir.', 'chrome', 24, 'Cr', 7, 3, '7,15 g·cm-3 (20 °C)', '7440-47-3', '231-157-5', '51.996', '140 pm (166 pm)', '127 pm', '', '2|8|13|1', '[Ar] 3d⁵ 4s¹', '6, 3, 2', '1797', 'Louis-Nicolas Vauquelin', 'France', '1,66', '1 907 °C', '2 671 °C', 0, '6', '4'),
(25, 'Manganèse', 'Le manganèse est un élément essentiel pour la production d’acier, car il aide à éliminer les impuretés. Il est également important pour la santé osseuse et le métabolisme des nutriments.', 'manganese', 25, 'Mn', 7, 3, '7,21 à 7,44 g·cm-3', '7439-96-5', '231-105-1', '54.938', '140 pm (161 pm)', '139 pm', '126', '2|8|13|2', '[Ar] 3d⁵ 4s²', '7, 6, 4, 2, 3', '1774', 'Ignatius Gottfried Kaim, Johan Gottlieb Gahn', 'Suède', '1,55', '1 246 °C', '2 061 °C', 0, '7', '4'),
(26, 'Fer', 'Le fer est le métal le plus abondant dans la croûte terrestre et un élément clé pour la fabrication de l’acier. Il est aussi essentiel pour le transport de l’oxygène dans le sang via l’hémoglobine.', 'fer', 26, 'Fe', 7, 3, '7,874 g·cm-3 à (20 °C)', '7439-89-6', '231-096-4', '55.845', '140 pm (156 pm)', '125 pm', '', '2|8|14|2', '[Ar] 3d⁶ 4s²', '+2, +3, +4, +6', '8000 ans av J.C', 'Nc', 'les égyptiens et les Sumériens', '1,83', '1 538 °C', '2 861 °C', 0, '8', '4'),
(27, 'Cobalt', 'Le cobalt est célèbre pour sa couleur bleue vive et a été utilisé pendant des siècles pour colorer la verrerie et la céramique. Les premiers artisans égyptiens utilisaient des composés de cobalt pour créer des teintes bleues saisissantes.', 'cobalt', 27, 'Co', 7, 3, '8,9 g·cm-3 (20 °C)', '7440-48-4', '231-158-0', '58.933', '135 pm (152 pm)', '126 pm', '', '2|8|15|2', '[Ar] 3d⁷ 4s²', '+1, +2, +3, +4', '1735', 'Georg Brandt', 'Suède', '1,88', '1 495 °C', '2 927 °C', 0, '9', '4'),
(28, 'Nickel', 'Le nickel est largement utilisé dans les batteries rechargeables et les alliages. Il est aussi célèbre pour être très résistant à la corrosion, ce qui en fait un choix populaire pour les alliages de haute performance.', 'nickel', 28, 'Ni', 7, 3, '8,902 g·cm-3 (25 °C)', '7440-02-0', '231-111-4', '58.693', '135 pm (149 pm)', '121 pm', '163 pm', '2|8|16|2', '[Ar] 3d⁸ 4s²', '2, 3', '1751', 'Axel Frederik Cronstedt', 'Suède', '1,91', '1 455 °C', '2 913 °C', 0, '10', '4'),
(29, 'Cuivre', 'Le cuivre est un métal utilisé depuis l’Antiquité pour ses propriétés de conductivité électrique et thermique. Il est également employé dans la fabrication de pièces de monnaie et de tuyaux.', 'cuivre', 29, 'Cu', 7, 3, '8,96 g·cm-3 (20 °C)', '7440-50-8', '231-159-6', '63.546', '135 pm (145 pm)', '138 pm', '140 pm', '2|8|18|1', '[Ar] 3d¹⁰ 4s¹', '2, 1', 'Antiquité', '', '', '1,9', '1 084,62 °C', '2 562 °C', 0, '11', '4'),
(30, 'Zinc', 'Le zinc est utilisé principalement comme revêtement pour protéger l’acier de la corrosion (galvanisation). Il est également essentiel pour la croissance et le fonctionnement du système immunitaire.', 'zinc', 30, 'Zn', 7, 3, '7,134 g·cm-3 (25 °C)', '7440-66-6', '231-175-3', '65.38', '135 pm (142 pm)', '131 pm', '139 pm', '2|8|18|2', '[Ar] 3d¹⁰ 4s²', '2', 'Antiquité', '', '', '1,65', '419,527 °C', '907 °C', 0, '12', '4'),
(31, 'Gallium', 'Le gallium pur a un aspect argenté et il se brise sous forme solide de la même manière que le verre. Le volume du gallium augmente de 3,1 % lorsqu\'il se solidifiea et pour cette raison ne doit pas être stocké dans un récipient en verre ou en métal. Le gal', 'gallium', 31, 'Ga', 9, 5, '5,904 g·cm-3 (solide, 29,6 °C),\r\n6,095 g·cm-3 (liquide, 29,6 °C)', '7440-55-3', '231-163-8', '69.723', '130 pm (136 pm)', '126 pm', '187 pm', '2|8|18|3', '[Ar] 3d¹⁰ 4s² 4p¹', '3', '1875', 'Paul-Émile Lecoq de Boisbaudran', 'France', '1,81', '29,7646 °C', '2 204 °C', 0, '13', '4'),
(32, 'Germanium', 'Le germanium est un semi-conducteur utilisé dans les transistors et les diodes, ainsi que dans les équipements de vision nocturne et les fibres optiques.', 'germanium', 32, 'Ge', 8, 6, '5,323 g·cm-3 (25 °C)', '7440-56-4', '231-164-3', '72.63', '125 pm (125 pm)', '122 pm', '', '2|8|18|4', '[Ar] 3d¹⁰ 4s² 4p²', '4, 2', '1886', 'Clemens Winkler', 'Allemagne', '2,01', '938,25 °C', '2 833 °C', 0, '14', '4'),
(33, 'Arsenic', 'L’arsenic est un élément toxique utilisé dans divers traitements médicaux et pesticides. Il est également employé dans certaines alliages et semi-conducteurs.', 'arsenic', 33, 'As', 8, 7, '5,72 g·cm-3 (gris);\r\n1,97 g·cm-3 (jaune);\r\n4,7–5,1 g·cm-3 (noir)', '7440-38-2', '231-148-6', '74.922', '115 pm (114 pm)', '119 pm', '185 pm', '2|8|18|5', '[Ar] 3d¹⁰ 4s² 4p³', '±3, 5', '~1250', 'Albert le Grand', '', '2,18', '817 °C', '339,85 °C', 0, '15', '4'),
(34, 'Sélénium', 'Le sélénium est un oligo-élément essentiel pour les cellules du corps, jouant un rôle dans la protection contre le stress oxydatif. Il est aussi utilisé dans les cellules photovoltaïques.', 'selenium', 34, 'Se', 10, 8, '4,79 g·cm-3 (gris),\r\n4,28 g·cm-3 (vitreux)', '7782-49-2', '231-957-4', '78.971', '115 pm (103 pm)', '116 pm', '190', '2|8|18|6', '[Ar] 3d¹⁰ 4s² 4p⁴', '±2, 4, 6', '1817', 'Johan Gottlieb Gahn, Jöns Jacob Berzelius', 'Suède', '2,55', '221 °C', '685 °C', 0, '16', '4'),
(35, 'Brome', 'Le brome est utilisé dans la fabrication de produits chimiques industriels et comme désinfectant dans les piscines. Il est également présent dans certains produits pharmaceutiques.', 'brome', 35, 'Br', 3, 9, '7,59 g·l-1 (gaz)\r\n3,12 g·cm-3 (liquide, 20 °C)', '10097-32-2', '', '79.904', '115 pm (94 pm)', '114 pm', '195 pm', '2|8|18|7', '[Ar] 3d¹⁰ 4s² 4p⁵', '-1, 0, 1, 3, 5, 7', '1826', 'Leopold Gmelin, Antoine-Jérôme Balard', 'France', '2,96', '-7,2 °C', '58,8 °C', 0, '17', '4'),
(36, 'Krypton', 'Le krypton est un gaz noble utilisé dans les lampes à décharge haute intensité pour créer une lumière très brillante. Il est également employé dans les applications de haute technologie, comme les lasers.', 'krypton', 36, 'Kr', 2, 10, '3,733 g·l-1 (0 °C)', '7439-90-9', '231-098-5', '83.798', '(88 pm)', '110 pm', '202 pm', '2|8|18|8', '[Ar] 3d¹⁰ 4s² 4p⁶', '0', '1898', 'Morris William Travers, William Ramsay', 'Grande-Bretagne', '', '-157,36 °C', '-153,34 °C', 0, '18', '4'),
(37, 'Rubidium', 'Le rubidium est un métal alcalin rare utilisé dans les horloges atomiques, ainsi que dans certains types de verre et de céramiques spéciales.', 'rubidium', 37, 'Rb', 5, 1, '1,532 g·cm-3 (solide, 20 °C),\r\n1,475 g·cm-3 (liquide, 39 °C)', '7440-17-7', '231-126-6', '85.468', '235 pm (265 pm)', '211 pm', '244 pm', '2|8|18|8|1', '[Kr] 5s¹', '1', '1861', '', 'Allemagne', '0,82', '39,30 °C', '688 °C', 0, '1', '5'),
(38, 'Strontium', 'Le strontium est utilisé dans les feux d’artifice pour produire une couleur rouge vif et dans la fabrication de céramiques et de certains types de verre.', 'strontium', 38, 'Sr', 6, 2, '2,64 g·cm-3', '7440-24-6', '231-133-4', '87.62', '219 pm', '192 pm', 'inconnu', '2|8|18|8|2', '[Kr] 5s²', '2', '1790', 'William Cruickshank', 'Écosse', '0,95', '777 °C', '1 382 °C', 0, '2', '5'),
(39, 'Yttrium', 'L’yttrium est utilisé dans les alliages métalliques, ainsi que dans les phosphores pour les écrans à tube cathodique et les LED.', 'yttrium', 39, 'Y', 7, 3, '4,469 g·cm-3 (25 °C)', '7440-65-5', '231-174-8', '88.906', '180 pm (212 pm)', '162 pm', '', '2|8|18|9|2', '[Kr] 4d¹ 5s²', '3', '1794', 'Johan Gadolin', 'Finlande', '1,22', '1 522 °C', '3 345 °C', 0, '3', '5'),
(40, 'Zirconium', 'Le zirconium est un métal résistant à la corrosion utilisé dans les réacteurs nucléaires et les équipements chimiques. Il est également utilisé dans les bijoux en tant que pierre de synthèse.', 'zirconium', 40, 'Zr', 7, 3, '6,52 g·cm-3 (20 °C)', '7440-67-7', '231-176-9', '91.224', '155 pm (206 pm)', '148 pm', '0,160 pm ?', '2|8|18|10|2', '[Kr] 4d² 5s²', '4', '1789', 'Martin Heinrich Klaproth', 'Allemagne', '1,33', '1 855 °C', '4 409 °C', 0, '4', '5'),
(41, 'Niobium', 'Le niobium est un métal utilisé dans les alliages pour améliorer la résistance à la chaleur et la ténacité, et dans les aimants supraconducteurs pour la recherche scientifique.', 'niobium', 41, 'Nb', 7, 3, '8,57 g·cm-3 (20 °C)', '7440-03-1', '231-113-5', '92.906', '145 pm (198 pm)', '137 pm', '', '2|8|18|12|1', '[Kr] 4d⁴ 5s¹', '5, 3', '1801', 'Charles Hatchett', 'Grande-Bretagne', '1,6', '2 477 °C', '4 744 °C', 0, '5', '5'),
(42, 'Molybdène', 'Le molybdène est utilisé pour renforcer l’acier et dans les applications nécessitant une haute résistance à la chaleur, comme les turbines à gaz.', 'molybdene', 42, 'Mo', 7, 3, '10,22 g·cm-3 (20 °C)', '7439-98-7', '231-107-2', '95.95', '145 pm', '145 pm', '', '2|8|18|13|1', '[Kr] 4d⁵ 5s¹', '2, 3, 4, 5, 6', '1778', 'Carl Wilhelm Scheele', 'Suède', '2,16', '2 623 °C', '4 639 °C', 0, '6', '5'),
(43, 'Technétium', 'Le technétium est un élément radioactif utilisé dans les procédures médicales pour les scintigraphies osseuses et d’autres types d’imagerie médicale.', 'technetium', 43, 'Tc', 7, 3, '11,50 g·cm-3 (calculée)', '7440-26-8', '231-136-0', '98', '135 pm (183 pm)', '156 pm', '', '2|8|18|13|2', '[Kr] 4d⁵ 5s²', '7', '1937', '', 'Italie', '2,1', '2 157 °C', '4 265 °C', 1, '7', '5'),
(44, 'Ruthénium', 'Le ruthénium est utilisé dans les alliages pour augmenter la résistance à l’usure et dans les contacts électriques en raison de ses propriétés de résistance à la corrosion.', 'ruthenium', 44, 'Ru', 7, 3, '12,1 g·cm-3 (20 °C)', '7440-18-8', '231-127-1', '101.07', '130 pm (178 pm)', '126 pm', '', '2|8|18|15|1', '[Kr] 4d⁷ 5s¹', '2, 3, 4, 6, 8', '1844', 'Jędrzej Śniadecki', 'Russie', '2,2', '2 334 °C', '4 150 °C', 0, '8', '5'),
(45, 'Rhodium', 'Le rhodium est un métal précieux utilisé principalement comme catalyseur dans les pots d’échappement des voitures pour réduire les émissions nocives.', 'rhodium', 45, 'Rh', 7, 3, '12,41 g·cm-3 (20 °C)', '7440-16-6', '231-125-0', '102.91', '135 pm (173 pm)', '135 pm', '', '2|8|18|16|1', '[Kr] 4d⁸ 5s¹', '2, 3, 4', '1803', 'William Hyde Wollaston', 'Grande-Bretagne', '2,28', '1 964 °C', '3 695 °C', 0, '9', '5'),
(46, 'Palladium', 'Le palladium est utilisé dans les catalyseurs automobiles pour réduire les émissions, ainsi que dans la fabrication de bijoux et d’alliages spécialisés.', 'palladium', 46, 'Pd', 7, 3, '12,02 g·cm-3 (20 °C)', '7440-05-3', '231-115-6', '106.42', '140 pm (169 pm)', '131 pm', '163 pm', '2|8|18|18', '[Kr] 4d¹⁰', '0, 1, 2, 4, 6', '1803', 'William Hyde Wollaston', 'Grande-Bretagne', '2,2', '1 554,8 °C', '2 963 °C', 0, '10', '5'),
(47, 'Argent', 'L’argent est utilisé dans les bijoux, les pièces de monnaie, et les appareils électroniques en raison de sa conductivité électrique exceptionnelle et de ses propriétés antibactériennes.', 'argent', 47, 'Ag', 7, 3, '10,50 g·cm-3 (20 °C);\r\n9,35 g·cm-3 (liquide, 961,9 °C),\r\n9,05 g·cm-3 (liquide, 1 250 °C)', '7440-22-4', '231-131-3', '107.87', '160 pm (165 pm)', '153 pm', '172 pm', '2|8|18|18|1', '[Kr] 4d¹⁰ 5s¹', '±1', 'Antiquité', '', '', '1,93', '961,78 °C', '~2 200 °C', 0, '11', '5'),
(48, 'Cadmium', 'Le cadmium est utilisé dans les batteries rechargeables, les revêtements métalliques pour la protection contre la corrosion, et dans certaines applications nucléaires.', 'cadmium', 48, 'Cd', 7, 3, '8,69 g·cm-3 (20 °C)', '7440-43-9', '231-152-8', '112.41', '155 pm (161 pm)', '148 pm', '158 pm', '2|8|18|18|2', '[Kr] 4d¹⁰ 5s²', '2', '1817', 'Karl Samuel Leberecht Hermann, Friedrich Stromeyer', 'Allemagne', '1,69', '321,07 °C', '767 °C', 0, '12', '5'),
(49, 'Indium', 'L’indium est utilisé dans les alliages à basse température de fusion et dans les écrans tactiles grâce à son oxyde transparent, l’ITO (oxyde d’indium-étain).', 'indium', 49, 'In', 9, 5, '7,31 g·cm-3 (20 °C)', '7440-74-6', '231-180-0', '114.82', '155 pm (156 pm)', '144 pm', '193 pm', '2|8|18|18|3', '[Kr] 4d¹⁰ 5s² 5p¹', '3', '1863', '', 'Allemagne', '1,78', '156,5985 °C', '2 072 °C', 0, '13', '5'),
(50, 'Étain', 'L’étain est utilisé dans les alliages comme le bronze et le laiton, ainsi que pour le revêtement de surfaces en acier afin d’éviter la rouille.', 'etain', 50, 'Sn', 9, 6, '5,77 g·cm-3 (gris),\r\n7,29 g·cm-3 (blanc)', '7440-31-5', '231-141-8', '118.71', '145 pm (145 pm)', '141 pm', '217', '2|8|18|18|4', '[Kr] 4d¹⁰ 5s² 5p²', '0, +2, +4', 'Antiquité', '', '', '1,96', '231,928 °C', '2 602 °C', 0, '14', '5'),
(51, 'Antimoine', 'L’antimoine est utilisé dans les alliages pour améliorer leur dureté et leur résistance, ainsi que dans certains produits de type retardateurs de flamme.', 'antimoine', 51, 'Sb', 8, 7, '6,68 g·cm-3 (20 °C)', '7440-36-0', '231-146-5', '121.76', '145 pm (133 pm)', '138 pm', '', '2|8|18|18|5', '[Kr] 4d¹⁰ 5s² 5p³', '±1', '~1000', 'Jabir Ibn Hayyan', '', '2,05', '630,63 °C', '1 587 °C', 0, '15', '5'),
(52, 'Tellure', 'Le tellure est utilisé dans les alliages pour améliorer leurs propriétés thermiques et électriques, et dans certaines applications photovoltaïques.', 'tellure', 52, 'Te', 8, 8, '6,23 g·cm-3 (20 °C)', '13494-80-9', '236-813-4', '127.6', '140 pm (123 pm)', '135 pm', '206', '2|8|18|18|6', '[Kr] 4d¹⁰ 5s² 5p⁴', '±2, 4, 6', '1783', '', 'Roumanie', '2,1', '449,51 °C', '988 °C', 0, '16', '5'),
(53, 'Iode', 'L’iode est essentiel pour la synthèse des hormones thyroïdiennes et est utilisé dans les antiseptiques et les solutions de désinfection.', 'iode', 53, 'I', 3, 9, '11,27 g·l-1 (gaz),\r\n4,93 g·cm-3 (solide, 20 °C)', '14362-44-8 (élément), 7553-56-2 (diiode)', '231-442-4 (diiode)', '126.9', '140 pm (115 pm)', '133 pm', '215 pm', '2|8|18|18|7', '[Kr] 4d¹⁰ 5s² 5p⁵', '±1, 5, 7', '1811', 'Bernard Courtois', 'France', '2,66', '113,7 °C', '184,4 °C', 0, '17', '5'),
(54, 'Xénon', 'Le xénon est un gaz noble utilisé dans les lampes à haute intensité et les anesthésiques, ainsi que dans certaines applications de recherche scientifique.', 'xenon', 54, 'Xe', 2, 10, '5,887 ± 0,009 g·l-1 (gaz),\r\n2,95 g·cm-3 (liquide, -109 °C)', '7440-63-3', '231-172-7', '131.29', '(108 pm)', '130 pm', '216 pm', '2|8|18|18|8', '[Kr] 4d¹⁰ 5s² 5p⁶', '0, 1, 2, 4, 6, 8', '1898', '', 'Grande-Bretagne', '2,6', '-111,74 °C', '-108,09 °C', 0, '18', '5'),
(55, 'Césium', 'Le césium est utilisé dans les horloges atomiques pour leur précision extrême, et dans certaines applications nucléaires et industrielles.', 'cesium', 55, 'Cs', 5, 1, '1.93 g/cm³', '7440-46-2', '231-132-9', '132.91', '225 pm', '225 pm', 'N/A', '2|8|18|18|8|1', '[Xe] 6s¹', '+1', '1860', 'Robert Bunsen et Gustav Kirchhoff', 'Allemagne', '0.79', '28.5', '671.0', 0, '1', '6'),
(56, 'Baryum', 'Le baryum est utilisé dans les produits de contraste pour les radiographies médicales, ainsi que dans certains types de verre et d’alliages.', 'baryum', 56, 'Ba', 6, 2, '3,62 g·cm-3 (20 °C)', '7440-39-3', '231-149-1', '137.33', '215 pm (253 pm)', '198 pm', '', '2|8|18|18|8|2', '[Xe] 6s²', '2', '1808', 'Carl Wilhelm Scheele', 'Grande-Bretagne', '0,89', '727 °C', '~1 750 °C', 0, '2', '6'),
(57, 'Lanthane', 'Le lanthane est utilisé dans les alliages pour améliorer leur résistance, ainsi que dans les catalyseurs et les matériaux magnétiques.', 'lanthane', 57, 'La', 4, 3, '6,145 g·cm-3 (25 °C)', '7439-91-0', '231-099-0', '138.91', '195 pm', '169 pm', '', '2|8|18|18|9|2', '[Xe] 5d¹ 6s²', '3', '1839', 'Carl Gustaf Mosander', 'Suède', '1,1', '920 °C', '3 464 °C', 0, '3', '6'),
(58, 'Cérium', 'Le cérium est utilisé dans les catalyseurs automobiles pour réduire les émissions et dans les verres et les polisseurs pour leur capacité à décolorer.', 'cerium', 58, 'Ce', 4, 3, '6.77 g/cm³', '7440-45-1', '231-154-3', '140.12', '182 pm', '', 'N/A', '2|8|18|19|9|2', '[Xe] 4f¹ 5d¹ 6s²', '+3', '1803', 'Martin Heinrich Klaproth, Jöns Jakob Berzelius, et Wilhelm Hisinger', 'Suède', '1.12', '798.0', '3257.0', 0, '3', '6'),
(59, 'Praséodyme', 'Le praséodyme est utilisé dans les aimants permanents et les verres optiques, ainsi que dans certaines applications de haute technologie.', 'praseodymium', 59, 'Pr', 4, 3, '6.77 g/cm³', '7440-10-0', '231-140-8', '140.91', '183 pm', '', 'N/A', '2|8|18|21|8|2', '[Xe] 4f³ 6s²', '+3', '1885', 'Carl Auer von Welsbach', 'Autriche', '1.13', '931.0', '3670.0', 0, '3', '6'),
(60, 'Néodyme', 'Le néodyme est utilisé dans les aimants extrêmement puissants pour les moteurs électriques et les haut-parleurs, ainsi que dans certains types de lasers.', 'neodymium', 60, 'Nd', 4, 3, '7.01 g/cm³', '7440-00-8', '231-105-1', '144.24', '181 pm', '', 'N/A', '2|8|18|22|2', '[Xe] 4f⁴ 6s²', '+3', '1885', 'Carl Auer von Welsbach', 'Autriche', '1.14', '1021.0', '3127.0', 0, '3', '6'),
(61, 'Prométhium', 'Le prométhium est un élément radioactif utilisé dans les sources lumineuses et les dispositifs de mesure de haute précision.', 'promethium', 61, 'Pm', 4, 3, '7.26 g/cm³', '7440-09-7', '231-098-5', '145', '180 pm', '', 'N/A', '2|8|18|23|2', '[Xe] 4f⁵ 6s²', '+3', '1896', 'Frederick Soddy et Albert Eugene', 'Royaume-Uni', '1.13', '1042.0', '3000.0', 1, '3', '6'),
(62, 'Samarium', 'Le samarium est utilisé dans les aimants permanents, ainsi que dans les équipements de recherche et certains types de réacteurs nucléaires.', 'samarium', 62, 'Sm', 4, 3, '7,520 g·cm-3 (25 °C, α)', '7440-19-9', '231-128-7', '150.36', '185 pm (238 pm)', '', '', '2|8|18|24|8|2', '[Xe] 4f⁶ 6s²', '3', '1879', '', 'France', '1,17', '1 072 °C', '1 794 °C', 0, '3', '6'),
(63, 'Europium', 'L’europium est utilisé dans les écrans fluorescents pour produire des couleurs rouges et bleues, ainsi que dans certains équipements électroniques.', 'europium', 63, 'Eu', 4, 3, '5,244 g·cm-3 (25 °C)', '7440-53-1', '231-161-7', '151.96', '185 pm (247 pm)', '', '', '2|8|18|25|8|2', '[Xe] 4f⁷ 6s²', '3', '1901', '', 'France', '1,2', '822 °C', '1 596 °C', 0, '3', '6'),
(64, 'Gadolinium', 'Le gadolinium est utilisé dans les agents de contraste pour l’imagerie par résonance magnétique (IRM) et dans les alliages à haute température.', 'gadolinium', 64, 'Gd', 4, 3, '7,901 g·cm-3 (25 °C)', '7440-54-2', '', '157.25', '188 pm (233 pm)', '', '', '2|8|18|25|9|2', '[Xe] 4f⁷ 5d¹ 6s²', '3', '1880', '', 'Suisse', '1,2', '1 313 °C', '3 273 °C', 0, '3', '6'),
(65, 'Terbium', 'Le terbium est utilisé dans les phosphores pour les écrans et les LED, ainsi que dans certains types d’alliages et d’équipements électroniques.', 'terbium', 65, 'Tb', 4, 3, '8,230 g·cm-3', '7440-27-9', '', '158.93', '175 pm (225 pm)', '', '', '2|8|18|26|8|2', '[Xe] 4f⁹ 6s²', '3', '1843', '', 'Suède', '1,2', '1 356 °C', '3 230 °C', 0, '3', '6'),
(66, 'Dysprosium', 'Le dysprosium est utilisé dans les aimants permanents et les dispositifs de stockage d’énergie, ainsi que dans certaines applications de haute technologie.', 'dysprosium', 66, 'Dy', 4, 3, '8,551 g·cm-3 (25 °C)', '7429-91-6', '231-073-9', '162.5', '175 pm (228 pm)', '', '', '2|8|18|27|8|2', '[Xe] 4f¹⁰ 6s²', '3', '1886', '', 'France', '1,22', '1 412 °C', '2 567 °C', 0, '3', '6'),
(67, 'Holmium', 'L’holmium est utilisé dans les lasers, les équipements de résonance magnétique, et dans certaines applications de recherche en physique.', 'holmium', 67, 'Ho', 4, 3, '8,795 g·cm-3 (25 °C)', '7440-60-0', '', '164.93', '247 pm', '', '', '2|8|18|28|8|2', '[Xe] 4f¹¹ 6s²', '3', '1878', 'Per Teodor Cleve, Jacques-Louis Soret, Marc Delafontaine', 'Suède, Suisse', '1,23', '1 472 °C', '2 700 °C', 0, '3', '6'),
(68, 'Erbium', 'L’erbium est utilisé dans les fibres optiques pour les télécommunications, ainsi que dans les lasers et les alliages pour améliorer leurs propriétés.', 'erbium', 68, 'Er', 4, 3, '9,066 g·cm-3 (25 °C)', '7440-52-0', '231-160-1', '167.26', '175 pm (226 pm)', '', '', '2|8|18|29|8|2', '[Xe] 4f¹² 6s²', '3', '1842', '', 'Suède', '1,24', '1 529 °C', '2 868 °C', 0, '3', '6'),
(69, 'Thulium', 'Le thulium est utilisé dans les lasers médicaux, ainsi que dans certains équipements de recherche et applications industrielles.', 'thulium', 69, 'Tm', 4, 3, '9,321 g·cm-3 (25 °C)', '7440-30-4', '', '168.93', '175 pm (222 pm)', '', '', '2|8|18|30|8|2', '[Xe] 4f¹³ 6s²', '3', '1879', '', 'Suède', '1,25', '1 545 °C', '1 950 °C', 0, '3', '6'),
(70, 'Ytterbium', 'L’ytterbium est utilisé dans les alliages pour améliorer leur résistance, ainsi que dans les lasers et les équipements de recherche.', 'ytterbium', 70, 'Yb', 4, 3, '6,903 g·cm-3 (α)\r\n6,966 g·cm-3 (β)', '7440-64-4', '', '173.05', '175 pm (222 pm)', '', '', '2|8|18|31|8|2', '[Xe] 4f¹⁴ 6s²', '3', '1878', '', 'Suisse', '1,1', '824 °C', '1 196 °C', 0, '3', '6'),
(71, 'Lutécium', 'Le lutécium est utilisé dans les détecteurs de particules et les équipements de recherche, ainsi que dans certains types d’alliages et de matériaux optiques.', 'lutecium', 71, 'Lu', 4, 3, '9,841 g·cm-3 (25 °C)', '7439-94-3', '', '174.97', '175 pm (217 pm)', '160 pm', '', '2|8|18|32|8|2', '[Xe] 4f¹⁴ 5d¹ 6s²', '3', '1907', '', 'France et Allemagne', '1,27', '1 663 °C', '3 402 °C', 0, '3', '6'),
(72, 'Hafnium', 'Le hafnium est utilisé dans les alliages pour améliorer leur résistance à la corrosion et à la chaleur, ainsi que dans les barres de contrôle pour les réacteurs nucléaires.', 'hafnium', 72, 'Hf', 7, 3, '13,281 g·cm-3 (20 °C)', '7440-58-6', '231-166-4', '178.49', '155 pm (208 pm)', '150 pm', '161 pm', '2|8|18|32|10|2', '[Xe] 4f¹⁴ 5d² 6s²', '4', '1923', 'George de Hevesy, Dirk Coster', 'Danemark', '1,3', '2 233 °C', '4 603 °C', 0, '4', '6'),
(73, 'Tantale', 'Le tantale est utilisé dans les composants électroniques, les implants médicaux et les équipements de haute technologie en raison de sa résistance à la corrosion.', 'tantale', 73, 'Ta', 7, 3, '16,4 g·cm-3', '7440-25-7', '231-135-5', '180.95', '145 pm (200 pm)', '138 pm', '', '2|8|18|32|11|2', '[Xe] 4f¹⁴ 5d³ 6s²', '5', '1802', '', 'Suède', '1,5', '3 017 °C', '5 458 °C', 0, '5', '6'),
(74, 'Tungstène', '', 'tungstene', 74, 'W', 7, 3, '19,3 g·cm-3 (20 °C)', '7440-33-7', '231-143-9', '183.84', '135 pm (193 pm)', '146 pm', '137 pm', '2|8|18|32|12|2', '[Xe] 4f¹⁴ 5d⁴ 6s²', '6, 5, 4, 3, 2', '1783', '', 'Espagne', '1,7', '3 422 °C', '5 555 °C', 0, '6', '6'),
(75, 'Rhénium', 'Le rhénium est utilisé dans les alliages pour les turbines à gaz et les équipements aérospatiaux, ainsi que dans certains catalyseurs industriels.', 'rhenium', 75, 'Re', 7, 3, '20,8 g·cm-3 (20 °C)', '7440-15-5', '231-124-5', '186.21', '135 pm (188 pm)', '159 pm', '', '2|8|18|32|13|2', '[Xe] 4f¹⁴ 5d⁵ 6s²', '6, 4, 2, -2', '1925', '', 'Allemagne', '1,9', '3 185 °C', '5 596 °C', 0, '7', '6'),
(76, 'Osmium', 'L’osmium est le métal le plus dense, utilisé dans les alliages pour augmenter la dureté et dans certains instruments scientifiques.', 'osmium', 76, 'Os', 7, 3, '22,587 g·cm-3', '7440-04-2', '231-114-0', '190.23', '130 pm (185 pm)', '128 pm', '', '2|8|18|32|14|2', '[Xe] 4f¹⁴ 5d⁶ 6s²', '± 0,7', '1803', '', 'Grande-Bretagne', '2,2', '3 033 °C', '5 012 °C', 0, '8', '6'),
(77, 'Iridium', 'L’iridium est un métal précieux extrêmement résistant à la corrosion et à l’oxydation, souvent utilisé dans les équipements de haute technologie et les contacts électriques.', 'iridium', 77, 'Ir', 7, 3, '22,562 g·cm-3 (20 °C)', '7439-88-5', '', '192.22', '135 pm (180 pm)', '137 pm', '', '2|8|18|32|15|2', '[Xe] 4f¹⁴ 5d⁷ 6s²', '2, 3, 4, 6', '1803', '', 'Grande-Bretagne et France', '2,2', '2 446 °C', '4 428 °C', 0, '9', '6'),
(78, 'Platine', 'Le platine est un métal précieux largement utilisé dans les catalyseurs automobiles et les bijoux, en raison de sa résistance à la corrosion et de son apparence attrayante.', 'platine', 78, 'Pt', 7, 3, '21,45 g·cm-3 (20 °C)', '7440-06-4', '231-116-1', '195.08', '135 pm (177 pm)', '128 pm', '175 pm', '2|8|18|32|16|2', '[Xe] 4f¹⁴ 5d⁹ 6s¹', '2, 4', '1735', 'Antonio de Ulloa', 'Italie', '2,2', '1 768,2 °C', '3 825 °C', 0, '10', '6'),
(79, 'Or', 'L’or est un métal précieux utilisé principalement dans les bijoux, les pièces de monnaie et les applications électroniques pour ses propriétés de conductivité et de résistance à la corrosion.', 'or', 79, 'Au', 7, 3, '~19,3 g·cm-3 (20 °C)', '7440-57-5', '231-165-9', '196.97', '135 pm (174 pm)', '144 pm', '166 pm', '2|8|18|32|17|2', '[Xe] 4f¹⁴ 5d¹⁰ 6s¹', '3, 1', 'Antiquité', '', '', '2,4', '1 064,18 °C', '2 856 °C', 0, '11', '6'),
(80, 'Mercure', 'Le mercure est un métal liquide à température ambiante, utilisé dans les thermomètres et les amalgames dentaires, bien qu’il soit toxique et doit être manipulé avec soin.', 'mercure', 80, 'Hg', 7, 3, '13,546 g·cm-3 (20 °C)', '7439-97-6', '231-106-7', '200.59', '150 pm (171 pm)', '149 pm', '155 pm', '2|8|18|32|18|2', '[Xe] 4f¹⁴ 5d¹⁰ 6s²', '2, 1', 'Antiquité', '', '', '1,9', '-38,842 °C', '356,62 °C', 0, '12', '6'),
(81, 'Thallium', 'Le thallium est un métal rare utilisé dans les semi-conducteurs et les produits pharmaceutiques, bien qu’il soit hautement toxique et doive être manipulé avec précaution.', 'thallium', 81, 'Tl', 9, 5, '11,85 g·cm-3 (20 °C)', '7440-28-0', '231-138-1', '204.38', '190 pm (156 pm)', '148 pm', '196', '2|8|18|32|18|3', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p¹', '3, 1', '1861', '', 'Grande-Bretagne', '1,8', '304 °C', '1 473 °C', 0, '13', '6'),
(82, 'Plomb', 'Le plomb est utilisé dans les batteries et les munitions, ainsi que dans les matériaux de protection contre les radiations, bien qu’il soit toxique et soumis à des régulations strictes.', 'plomb', 82, 'Pb', 9, 6, '11,35 g·cm-3 (20 °C)', '7439-92-1', '231-100-4', '207.2', '180 pm (154 pm)', '147 pm', '202', '2|8|18|32|18|4', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p²', '4, 2', 'Antiquité', '', '', '1,8', '327,46 °C', '1 749 °C', 0, '14', '6'),
(83, 'Bismuth', 'Le bismuth est utilisé dans les alliages pour les fusibles et les matériaux de protection contre les radiations, et il est également employé dans certains médicaments contre les troubles digestifs.', 'bismuth', 83, 'Bi', 9, 7, '9,79 g·cm-3 (20 °C)', '7440-69-9', '231-177-4', '208.98', '160 pm (143 pm)', '146 pm', '152 pm', '2|8|18|32|18|5', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p³', '3, 5', '1753', 'Jabir Ibn Hayyan', 'France', '1,9', '271,4 °C', '1 564 °C', 1, '15', '6'),
(84, 'Polonium', 'Le polonium est un élément radioactif utilisé principalement dans des applications de recherche et dans les dispositifs de décharge électrostatique.', 'polonium', 84, 'Po', 8, 8, '9,20 g·cm-3', '7440-08-6', '', '209', '190 pm (135 pm)', '', '', '2|8|18|32|18|6', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p⁴', '4, 2', '1898', 'Marie Curie, Pierre Curie', 'France', '2', '254 °C', '962 °C', 1, '16', '6'),
(85, 'Astate', 'L’astate est un élément rare et radioactif dont les applications sont encore en cours de recherche en raison de sa rareté et de sa radioactivité.', 'astate', 85, 'At', 3, 9, '', '142364-73-6', '', '210', '', '', '', '2|8|18|32|18|7', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p⁵', '±1, 3, 5, 7', '1940', '', 'États-Unis', '2,2', '302 °C', '', 1, '17', '6'),
(86, 'Radon', 'Le radon est un gaz noble radioactif qui peut s’accumuler dans les bâtiments et est un facteur de risque pour le cancer du poumon à haute concentration.', 'radon', 86, 'Rn', 2, 10, '9,73 g·l-1 (gaz),\n4,4 g·cm-3 (liquide, -62 °C),\n4 g·cm-3 (solide)', '10043-92-2', '233-146-0', '222', '120 pm', '145 pm', '', '2|8|18|32|18|8', '[Xe] 4f¹⁴ 5d¹⁰ 6s² 6p⁶', '0', '1900', '', 'Allemagne', '2,2', '-71 °C', '-61,7 °C', 1, '18', '6'),
(87, 'Francium', 'Le francium est un élément extrêmement rare et radioactif, dont les propriétés sont encore peu connues en raison de sa courte demi-vie et de sa rareté.', 'francium', 87, 'Fr', 5, 1, '1 870 kg·m-3', '7440-73-5', '', '223', '', '', '', '2|8|18|32|18|8|1', '[Rn] 7s¹', '1', '1939', '', 'France', '0,7', '27 °C', '', 1, '1', '7'),
(88, 'Radium', 'Le radium est un élément radioactif utilisé dans le passé pour ses propriétés luminescentes, bien qu’il soit maintenant principalement utilisé dans des applications de recherche.', 'radium', 88, 'Ra', 6, 2, '5 g·cm-3', '7440-14-4', '231-122-4', '226', '215 pm', '', '', '2|8|18|32|18|8|2', '[Rn] 7s²', '2', '1898', 'Pierre Curie, Marie Curie', 'France', '0,9', '696 °C', '1 736,85 °C', 1, '2', '7'),
(89, 'Actinium', 'L’actinium est un élément radioactif utilisé principalement dans les recherches scientifiques et les études sur les propriétés des matériaux radioactifs.', 'actinium', 89, 'Ac', 1, 3, '10,07 g·cm-3 (calculée)', '7440-34-8', '', '227', '195 pm', '', '', '2|8|18|32|18|8|3', '[Rn] 6d¹ 7s²', '3', '1899', '', 'France', '1,1', '1 050 °C', '3 198 °C', 1, '3', '7'),
(90, 'Thorium', 'Le thorium est un élément radioactif utilisé dans certaines applications nucléaires comme le combustible pour réacteurs, et dans des alliages pour améliorer leur résistance.', 'thorium', 90, 'Th', 1, 3, '11,72 g·cm-3', '7440-29-1', '', '232.04', '179 pm', '', '', '2|8|18|32|18|8|4', '[Rn] 6d² 7s²', '4', '1828', '', 'Suède', '1,3', '1 750 °C', '4 788 °C', 1, '3', '7'),
(91, 'Protactinium', 'Le protactinium est un élément radioactif utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments radioactifs.', 'protactinium', 91, 'Pa', 1, 3, '15,37 g·cm-3 (calculée)', '7440-13-3', '', '231.04', '163 pm', '', '', '2|8|18|32|18|8|5', '[Rn] 5f² 6d¹ 7s²', '2, 3, 4, 5', '1913', '', 'Grande-Bretagne', '1,5', '1 572 °C', '4 026,85 °C', 1, '3', '7'),
(92, 'Uranium', 'L’uranium est utilisé comme combustible pour les réacteurs nucléaires et dans les armes nucléaires, et il est également utilisé dans certains procédés de recherche scientifique.', 'uranium', 92, 'U', 1, 3, '19,1 g·cm-3', '7440-61-1', '231-170-6', '238.03', '175 pm', '', '186', '2|8|18|32|18|8|6', '[Rn] 5f³ 6d¹ 7s²', '+3, +4, +5, +6', '1789', '', 'Grande-Bretagne', '1,7', '', '', 1, '3', '7'),
(93, 'Neptunium', 'Le neptunium est un élément radioactif utilisé principalement dans la recherche sur les propriétés des matériaux et dans certains types de réacteurs nucléaires.', 'neptunium', 93, 'Np', 1, 3, '20,25 g·cm-3 (20 °C)', '7439-99-8', '', '237', '155 pm', '', '', '2|8|18|32|18|8|7', '[Rn] 5f⁴ 6d¹ 7s²', '6, 5, 4, 3', '1940', '', 'États-Unis', '1,3', '644 °C', '3 999,85 °C', 1, '3', '7'),
(94, 'Plutonium', 'Le plutonium est un élément radioactif utilisé dans les armes nucléaires et comme combustible pour certains types de réacteurs nucléaires, en raison de sa capacité à soutenir une réaction en chaîne.', 'plutonium', 94, 'Pu', 1, 3, '19 816 kg·m-3', '7440-07-5', '231-117-7', '244', '159 pm', '', '', '2|8|18|32|18|8|8', '[Rn] 5f⁶ 7s²', '6, 5, 4, 3', '1940', 'Arthur Wahl, Edwin McMillan, Glenn Theodore Seaborg, Joseph W. Kennedy', 'États-Unis', '1,3', '640 °C', '3 228 °C', 1, '3', '7'),
(95, 'Américium', 'L’américium est utilisé dans les détecteurs de fumée et dans certaines applications de recherche scientifique, ainsi que dans les générateurs radioisotopes.', 'americium', 95, 'Am', 1, 3, '12 g·cm-3', '7440-35-9', '', '243', '173 pm', '', '', '2|8|18|32|18|8|9', '[Rn] 5f⁷ 7s²', '6, 5, 4, 3', '1944', 'N/A', 'États-Unis', '1,3', '1 176 °C', '2 011 °C', 1, '3', '7'),
(96, 'Curium', 'Le curium est un élément radioactif utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments lourds et dans certains dispositifs de détection.', 'curium', 96, 'Cm', 1, 3, '13,51 g·cm-3 (calculée)', '7440-51-9', '', '247', '174 pm', '', '', '2|8|18|32|18|8|10', '[Rn] 5f⁷ 6d¹ 7s²', '3', '1944', 'N/A', 'États-Unis', '1,3', '1 345 °C', '3 109,85 °C', 1, '3', '7'),
(97, 'Berkélium', 'Le berkélium est un élément radioactif utilisé principalement dans la recherche scientifique pour étudier les propriétés des éléments transuraniens.', 'berkelium', 97, 'Bk', 1, 3, '14.78 g/cm³', '7440-40-6', '231-148-6', '247', '175 pm', '', 'N/A', '2|8|18|32|18|8|11', '[Rn] 5f⁹ 7s²', '+3', '1949', 'Albert Ghiorso, Ralph A. James et Glenden L. Smith', 'États-Unis', '1.3', '986.0', '1470.0', 1, '3', '7'),
(98, 'Californium', 'Le californium est utilisé dans les détecteurs de neutrons et les équipements de radiographie, ainsi que dans certaines applications médicales et scientifiques.', 'californium', 98, 'Cf', 1, 3, '15.1 g/cm³', '7440-71-3', '231-164-0', '251', '183 pm', '', 'N/A', '2|8|18|32|18|8|12', '[Rn] 5f¹⁰ 7s²', '+3', '1950', 'Albert Ghiorso, Ralph A. James, et Glenden L. Smith', 'États-Unis', '1.3', '900.0', '1470.0', 1, '3', '7'),
(99, 'Einsteinium', 'L’einsteinium est un élément radioactif utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments lourds et transuraniens.', 'einsteinium', 99, 'Es', 1, 3, '8.08 g/cm³', '7400-71-3', '231-164-4', '252', '172 pm', '', 'N/A', '2|8|18|32|18|8|13', '[Rn] 5f¹¹ 7s²', '+3', '1952', 'Albert Ghiorso, Ralph A. James, et Glenden L. Smith', 'États-Unis', '1.3', '860.0', '996.0', 1, '3', '7'),
(100, 'Fermium', 'Le fermium est un élément radioactif utilisé dans la recherche sur les propriétés des éléments transuraniens et dans certaines applications de physique nucléaire.', 'fermium', 100, 'Fm', 1, 3, '9.7 g/cm³', '7440-72-4', '231-166-0', '257', '170 pm', '', 'N/A', '2|8|18|32|18|8|14', '[Rn] 5f¹² 7s²', '+3', '1952', 'Albert Ghiorso, Ralph A. James et Glenden L. Smith', 'États-Unis', '1.3', '1527.0', '1800.0', 1, '3', '7'),
(101, 'Mendélévium', 'Le mendelevium est utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments lourds et transuraniens.', 'mendelevium', 101, 'Md', 1, 3, '10.3 g/cm³', '7400-73-5', '231-168-0', '258', '167 pm', '', 'N/A', '2|8|18|32|18|8|15', '[Rn] 5f¹³ 7s²', '+3', '1955', 'Albert Ghiorso, Ralph A. James, et Glenden L. Smith', 'États-Unis', '1.3', '1100.0', '1500.0', 1, '3', '7'),
(102, 'Nobélium', 'Le nobélinium est un élément radioactif utilisé dans des recherches scientifiques pour étudier les propriétés des éléments lourds et transuraniens.', 'nobelium', 102, 'No', 1, 3, '9.7 g/cm³', '440-02-0', '231-169-4', '259', '166 pm', '', 'N/A', '2|8|18|32|18|8|16', '[Rn] 5f¹⁴ 7s²', '+3', '1958', 'Albert Ghiorso, Ralph A. James, et Glenn T. Seaborg', 'États-Unis', '1.3', '827.0', '1400.0', 1, '3', '7'),
(103, 'Lawrencium', 'Le lawrencium est un élément radioactif utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments transuraniens.', 'lawrencium', 103, 'Lr', 1, 3, '13.5 g/cm³', '22537-16-1', '245-106-7', '262', '160 pm', '', 'N/A', '2|8|18|32|18|8|18', '[Rn] 5f¹⁴ 7s² 7p¹', '+3', '1961', 'Albert Ghiorso, Albert A. Levin, et Torbørn Sikkeland', 'États-Unis', '1.3', '1627.0', '3400.0', 1, '3', '7'),
(104, 'Rutherfordium', '', 'rutherfordium', 104, 'Rf', 7, 3, '13.0 g/cm³', '53850-35-4', 'N/A', '267', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|2', '[Rn] 5f¹⁴ 6d² 7s²', '+4', '1969', 'Albert Ghiorso, Georgy Flerov, et al.', 'États-Unis/Russie', '1.3', '2100.0', '4400.0', 1, '4', '7'),
(105, 'Dubnium', '', 'dubnium', 105, 'Db', 7, 3, '14.0 g/cm³', '53850-37-6', 'N/A', '270', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|3', '[Rn] 5f¹⁴ 6d³ 7s²', '+5', '1970', 'Albert Ghiorso, Georgy Flerov, et al.', 'États-Unis/Russie', '1.3', '3000.0', '5000.0', 1, '5', '7'),
(106, 'Seaborgium', '', 'seaborgium', 106, 'Sg', 7, 3, '15.0 g/cm³', '54038-81-2', 'N/A', '271', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|4', '[Rn] 5f¹⁴ 6d⁴ 7s²', '+6', '1974', 'Albert Ghiorso, et al.', 'États-Unis', '1.3', '2700.0', '5000.0', 1, '6', '7'),
(107, 'Bohrium', '', 'bohrium', 107, 'Bh', 7, 3, '14.0 g/cm³', '54037-02-6', 'N/A', '270', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|5', '[Rn] 5f¹⁴ 6d⁵ 7s²', '+7', '1981', 'Albert Ghiorso, et al.', 'États-Unis', '1.3', '2700.0', '5000.0', 1, '7', '7'),
(108, 'Hassium', '', 'hassium', 108, 'Hs', 7, 3, '14.6 g/cm³', '54038-81-2', 'N/A', '277', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|6', '[Rn] 5f¹⁴ 6d⁶ 7s²', '+8', '1984', 'Albert Ghiorso, et al.', 'États-Unis', '1.3', '2700.0', '5000.0', 1, '8', '7'),
(109, 'Meitnerium', '', 'meitnerium', 109, 'Mt', 7, 3, '13.0 g/cm³', '54037-12-1', 'N/A', '276', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|7', '[Rn] 5f¹⁴ 6d⁷ 7s²', '+9', '1982', 'Albert Ghiorso, et al.', 'Allemagne', '1.3', '1100.0', '2500.0', 1, '9', '7'),
(110, 'Darmstadtium', '', 'darmstadtium', 110, 'Ds', 7, 3, 'N/A', '54037-12-1', 'N/A', '281', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|8', '[Rn] 5f¹⁴ 6d⁸ 7s²', '+10', '1994', 'Gesellschaft für Schwerionenforschung (GSI)', 'Allemagne', '1.3', 'N/A', 'N/A', 1, '10', '7'),
(111, 'Roentgenium', '', 'roentgenium', 111, 'Rg', 7, 3, 'N/A', '54038-00-9', 'N/A', '282', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|9', '[Rn] 5f¹⁴ 6d⁹ 7s²', '+1', '1994', 'Gesellschaft für Schwerionenforschung (GSI)', 'Allemagne', '1.3', 'N/A', 'N/A', 1, '11', '7'),
(112, 'Copernicium', '', 'copernicium', 112, 'Cn', 7, 3, 'N/A', '54038-43-4', 'N/A', '285', '140 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|10', '[Rn] 5f¹⁴ 6d¹⁰ 7s²', '+2', '1996', 'Gesellschaft für Schwerionenforschung (GSI)', 'Allemagne', '1.3', 'N/A', 'N/A', 1, '12', '7'),
(113, 'Nihonium', 'Le nihonium est un élément synthétique, découvert en 2004, utilisé principalement dans des recherches scientifiques pour étudier les propriétés des éléments lourds.', 'nihonium', 113, 'Nh', 9, 5, 'N/A', '54038-43-3', 'N/A', '286', '150 pm', 'N/A', 'N/A', '2|8|18|32|18|8|18|12|1', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p¹', '+1, +3', '2003', 'RIKEN', 'Japon', '1.6', 'N/A', 'N/A', 1, '13', '7'),
(114, 'Flérovium', 'Le flerovium est un élément synthétique, découvert en 1998, principalement étudié dans le cadre de recherches en physique nucléaire en raison de sa courte demi-vie.', 'flerovium', 114, 'Fl', 9, 6, 'N/A', '54038-43-5', 'N/A', '289', 'N/A', 'N/A', 'N/A', '2|8|18|32|18|8|18|12|2', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p²', '+2, +4', '1999', 'Institut de recherche nucléaire de Dubna', 'Russie', '1.6', 'N/A', 'N/A', 1, '14', '7'),
(115, 'Moscovium', 'Le moscovium est un élément superlourd, découvert en 2003, dont les propriétés sont encore en grande partie théoriques, principalement étudié en laboratoire pour des recherches en chimie et physique.', 'moscovium', 115, 'Mc', 9, 7, 'N/A', '54038-43-6', 'N/A', '290', 'N/A', 'N/A', 'N/A', '2|8|18|32|18|8|18|13|2', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p³', '+1, +3, +5', '2003', 'Institut de recherche nucléaire de Dubna et Joint Institute for Nuclear Research', 'Russie', '1.6', 'N/A', 'N/A', 1, '15', '7'),
(116, 'Livermorium', 'Le livermorium est un élément superlourd, découvert en 2000, dont les propriétés sont encore en cours d’étude, utilisé principalement pour la recherche scientifique dans le domaine de la chimie des éléments lourds.', 'livermorium', 116, 'Lv', 9, 8, 'N/A', '54038-43-7', 'N/A', '293', 'N/A', 'N/A', 'N/A', '2|8|18|32|18|8|18|14|2', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁴', '+2, +4, +6', '2012', 'Institut de recherche nucléaire de Dubna et Lawrence Livermore National Laboratory', 'Russie, États-Unis', '1.6', 'N/A', 'N/A', 1, '16', '7'),
(117, 'Tennessine', 'Le tennessine est un élément synthétique extrêmement rare, dont les propriétés sont encore largement théoriques et qui est principalement étudié dans des contextes de recherche avancée.', 'tennessine', 117, 'Ts', 3, 9, 'N/A', '54038-43-8', 'N/A', '294', 'N/A', 'N/A', 'N/A', '2|8|18|32|18|8|18|15|2', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁵', '-1, +1, +3, +5, +7', '2010', 'Institut de recherche nucléaire de Dubna et Lawrence Livermore National Laboratory', 'Russie, États-Unis', '2.2', 'N/A', 'N/A', 1, '17', '7'),
(118, 'Oganesson', 'L’oganesson est un élément superlourd et radioactif, synthétisé en laboratoire. Ses propriétés sont encore largement hypothétiques, et il est principalement étudié pour la recherche en physique nucléaire.', 'oganesson', 118, 'Og', 2, 10, 'N/A', '54038-43-9', 'N/A', '294', 'N/A', 'N/A', 'N/A', '2|8|18|32|18|8|18|16|2', '[Rn] 5f¹⁴ 6d¹⁰ 7s² 7p⁶', '+1, +2, +4, +6', '2002', 'Institut de recherche nucléaire de Dubna et Lawrence Livermore National Laboratory', 'Russie, États-Unis', '2.8', 'N/A', 'N/A', 1, '18', '7');

-- --------------------------------------------------------

--
-- Structure de la table `element_category`
--

DROP TABLE IF EXISTS `element_category`;
CREATE TABLE IF NOT EXISTS `element_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `definition` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `element_category`
--

INSERT INTO `element_category` (`id`, `name`, `slug`, `definition`, `color`) VALUES
(1, 'Actinide', 'actinide', 'Série de 15 éléments radioactifs, suivant l\'actinium. Ils incluent des éléments utilisés pour l\'énergie nucléaire et les armes nucléaires. Exemples : Uranium, Plutonium.', 'RGB(255, 105, 180)'),
(2, 'Gaze noble', 'gazNoble', 'Éléments du groupe 18, chimiquement inertes, avec des couches électroniques externes complètes. Ils sont utilisés dans des environnements non réactifs. Exemples : Hélium, Néon.', 'RGB(128, 128, 128)'),
(3, 'Halogène', 'halogene', 'Éléments très réactifs du groupe 17. Ils réagissent facilement avec les métaux pour former des sels. Exemples : Fluor, Chlore.', 'RGB(64, 224, 208)'),
(4, 'Lanthanide', 'lanthanide', 'Série de 15 métaux qui suivent le lanthane. Ils sont souvent utilisés dans les technologies modernes pour les aimants puissants, les lasers et les dispositifs électroniques. Exemples : Cérium, Néodyme.', 'RGB(148, 0, 211)'),
(5, 'Métal alcalin', 'metalAlcalin', 'Ce sont des métaux très réactifs du groupe 1 du tableau périodique. Ils possèdent un seul électron de valence et réagissent fortement avec l\'eau pour former des bases fortes et libérer de l\'hydrogène. Exemples : Lithium, Sodium, Potassium.', 'RGB(255, 0, 0)'),
(6, 'Métal alcalino terreux', 'metalAlcalinoTerreux', 'Métaux du groupe 2, légèrement moins réactifs que les alcalins. Ils ont deux électrons de valence et réagissent également avec l\'eau, bien que de façon plus modérée. Exemples : Béryllium, Magnésium, Calcium.', 'RGB(255, 165, 0)'),
(7, 'Métal de transition', 'metalDeTransition', 'Ce sont des métaux des groupes 3 à 12 qui peuvent adopter plusieurs états d\'oxydation. Ils sont souvent utilisés dans l\'industrie pour leurs propriétés de conductivité électrique et thermique. Exemples : Fer, Cuivre, Or.', 'RGB(0, 0, 255)'),
(8, 'Métalloide', 'metalloide', 'Éléments ayant des propriétés intermédiaires entre les métaux et les non-métaux. Ils sont souvent semi-conducteurs et utilisés dans les composants électroniques. Exemples : Bore, Silicium.', 'RGB(144, 238, 144)'),
(9, 'Métal pauvre', 'metalPauvre', 'Métaux du groupe 13 et au-delà, avec des propriétés métalliques faibles. Ils sont moins réactifs que les métaux de transition et présentent une faible conductivité. Exemples : Aluminium, Plomb.', 'RGB(255, 255, 0)'),
(10, 'Non métal', 'nonMetal', 'Éléments qui ne sont ni métaux ni métalloïdes. Ils sont souvent de mauvais conducteurs de chaleur et d\'électricité. Exemples : Carbone, Azote.', 'RGB(0, 100, 0)');

-- --------------------------------------------------------

--
-- Structure de la table `element_definitions`
--

DROP TABLE IF EXISTS `element_definitions`;
CREATE TABLE IF NOT EXISTS `element_definitions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `definition` varchar(1000) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name_property_element` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `element_definitions`
--

INSERT INTO `element_definitions` (`id`, `name`, `definition`, `name_property_element`) VALUES
(1, 'Masse volumique', 'La masse volumique, également appelée densité, est une mesure de la quantité de matière contenue dans un volume donné. Elle est définie comme la masse d\'un matériau par unité de volume.', 'masseVolumique'),
(2, 'CAS', 'En chimie et en sciences des matériaux, CAS (Chemical Abstracts Service) est un service qui attribue des numéros d\'enregistrement uniques aux substances chimiques. Ces numéros sont appelés numéros CAS et sont utilisés pour identifier de manière unique les produits chimiques, les éléments et les composés.', 'cas'),
(3, 'EINECS', 'L\'EINECS (European Inventory of Existing Commercial Chemical Substances) est un inventaire des substances chimiques commerciales existantes, maintenu par l\'Agence européenne des produits chimiques (ECHA). Ce système a été mis en place dans le cadre de la législation européenne sur les substances chimiques, en particulier le règlement REACH (Registration, Evaluation, Authorization, and Restriction of Chemicals).', 'einecs'),
(4, 'Masse atomique', 'La masse atomique (ou masse atomique relative) est une mesure de la masse d\'un atome, relative à celle de l\'atome de carbone-12, qui est utilisé comme référence. Elle est exprimée en unités de masse atomique (u), également appelées daltons (Da).', 'masseAtomique'),
(5, 'Rayon atomique', 'Le rayon atomique est une mesure de la taille d\'un atome, généralement définie comme la distance entre le noyau de l\'atome et la bordure extérieure de l\'enveloppe électronique. Ce concept aide à comprendre la taille relative des atomes et la manière dont ils se comportent dans les molécules et les solides.', 'rayonAtomique'),
(6, 'Rayon de covalence', 'Le rayon de covalence est une mesure de la taille d\'un atome lorsqu\'il est impliqué dans une liaison covalente avec un autre atome. Contrairement au rayon atomique, qui est une mesure plus générale de la taille des atomes, le rayon de covalence se réfère spécifiquement aux atomes liés par une liaison covalente.', 'rayonDeCovalence'),
(7, 'Rayon de Van der Waals', 'Le rayon de Van der Waals est une mesure de la taille effective d\'un atome lorsqu\'il est dans un état non lié. Il s\'applique également lorsqu\'il interagit avec d\'autres atomes ou molécules par des forces de Van der Waals, aussi appelées forces de dispersion. Ces forces sont des interactions faibles qui se produisent entre les molécules ou les atomes dans les situations où il n\'y a pas de liaison chimique forte, comme dans les gaz nobles ou les molécules non polaires.', 'rayonDeVanDerWaals'),
(8, 'Électron', 'Un électron est une particule subatomique fondamentale qui porte une charge électrique négative. Il orbite autour du noyau d\'un atome et est responsable des propriétés chimiques et des interactions entre les atomes.', 'electron'),
(9, 'Configuration Électroniqu', 'La configuration électronique décrit la distribution des électrons dans les différentes orbitales d\'un atome. Elle indique comment les électrons sont arrangés dans les niveaux d\'énergie autour du noyau.', 'configurationElectronique'),
(10, 'État d\'oxydation', 'État d\'oxydation (ou numéro d\'oxydation) est un concept en chimie qui indique la charge effective d\'un atome dans un composé, en supposant que les liaisons sont entièrement ioniques. Il s\'agit d\'un nombre qui représente le degré d\'oxydation d\'un élément dans une molécule ou un ion. Les états d\'oxydation sont utilisés pour décrire comment les électrons sont répartis dans les liaisons chimiques et sont essentiels pour comprendre les réactions d\'oxydoréduction.', 'etatOxydation'),
(11, 'Électronégativité', 'C\'est la capacité d\'un atome dans une molécule à attirer les électrons de liaison vers lui-même. Plus un atome est électronégatif, plus il attire fortement les électrons partagés dans une liaison chimique.', 'electronegativite'),
(12, 'Point de Fusion', 'C\'est la température à laquelle la phase solide d\'une substance se transforme en phase liquide sous une pression atmosphérique standard (généralement 1 atmosphère ou 101,3 kPa). À ce point, les solides et les liquides coexistent en équilibre.', 'pointDeFusion'),
(13, 'Point d\'Ébullition', 'C\'est la température à laquelle la pression de vapeur du liquide devient égale à la pression atmosphérique extérieure, permettant au liquide de se transformer en vapeur. À cette température, des bulles de vapeur se forment dans tout le liquide et montent à la surface pour s\'échapper', 'pointDEbullition'),
(14, 'Symbole chimique', 'Le symbole chimique d\'un élément est une abréviation ou un code utilisé pour représenter un élément chimique spécifique dans le tableau périodique. Ce symbole est généralement composé d\'une ou deux lettres, où la première lettre est toujours en majuscule et la seconde en minuscule (si elle existe). Par exemple, le symbole de l\'hydrogène est H, celui de l\'oxygène est O, et celui du fer est Fe.', 'symbole'),
(15, 'Numéro atomique', 'Le numéro atomique d\'un élément, noté généralement par la lettre Z, est le nombre de protons présents dans le noyau de chaque atome de cet élément. C\'est une caractéristique fondamentale qui détermine l\'identité de l\'élément et sa position dans le tableau périodique. Par exemple, l\'élément hydrogène à un numéro atomique de 1, ce qui signifie qu\'il possède un proton dans son noyau. Le numéro atomique détermine également la charge positive du noyau et, dans un atome neutre, il est égal au nom.', 'numero'),
(18, 'Nom', '', 'nom');

-- --------------------------------------------------------

--
-- Structure de la table `element_groupe`
--

DROP TABLE IF EXISTS `element_groupe`;
CREATE TABLE IF NOT EXISTS `element_groupe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `group_n` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `definition` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Déchargement des données de la table `element_groupe`
--

INSERT INTO `element_groupe` (`id`, `name`, `slug`, `group_n`, `definition`) VALUES
(1, 'Alcalins', 'alcalins', 'Groupe1', 'Les éléments du groupe 1 sont des métaux très réactifs avec un seul électron de valence. Ils réagissent fortement avec l\'eau pour former des bases fortes et des gaz d\'hydrogène. Ils sont mous et peuvent être coupés avec un couteau.'),
(2, 'Alcalino-terreux', 'alcalinoterreux', 'Groupe2', 'Les éléments du groupe 2 sont des métaux réactifs ayant deux électrons de valence. Ils sont plus durs que les alcalins et réagissent également avec l\'eau, mais moins violemment. Ils forment des oxydes et des hydroxydes.'),
(3, 'Métaux de transition', 'metauxdetransition', 'Groupe3_12', 'Ces éléments sont caractérisés par leur capacité à adopter plusieurs états d\'oxydation et à former des complexes. Ils sont généralement de bons conducteurs électriques et thermiques et sont souvent utilisés dans l\'industrie et la fabrication de matériaux.'),
(5, 'Groupe du Bore', 'groupedubore', 'Groupe13', 'Ce groupe comprend des métalloïdes et des métaux pauvres avec trois électrons de valence. Les éléments de ce groupe sont moins réactifs que les métaux alcalins ou alcalino-terreux, et sont souvent utilisés dans les matériaux de construction et l\'électronique.'),
(6, 'Groupe du Carbone', 'groupeducarbonne', 'Groupe14', 'Les éléments de ce groupe ont quatre électrons de valence et montrent une grande diversité dans leurs propriétés, allant des non-métaux (carbone) aux métaux (étain, plomb). Ils sont essentiels dans la chimie organique et la construction de semi-conducteurs.'),
(7, 'Pnictogènes', 'pnictogene', 'Groupe15', 'Les éléments de ce groupe possèdent cinq électrons de valence. Ils forment des composés stables avec l\'oxygène et d\'autres éléments, et sont présents dans des molécules biologiquement importantes comme l\'ADN et les protéines.'),
(8, 'Chalcogènes', 'chalcogenes', 'Groupe16', 'Les éléments du groupe 16 ont six électrons de valence et sont souvent impliqués dans des réactions de réduction. Ils forment des oxydes et des composés avec des métaux pour créer des minéraux essentiels à la vie.'),
(9, 'Halogènes', 'halogenes', 'Groupe17', 'Les halogènes sont des éléments très réactifs avec sept électrons de valence, ce qui leur permet de réagir facilement avec les métaux pour former des sels. Ils sont également utilisés comme agents désinfectants et dans les lampes à haute intensité.'),
(10, 'Gaz Nobles', 'gaznoble', 'Groupe18', 'Les gaz nobles sont chimiquement inertes en raison de leur couche d\'électrons complète. Ils sont utilisés dans les applications nécessitant un environnement non réactif, comme les éclairages, les lasers et les systèmes de refroidissement.');

-- --------------------------------------------------------

--
-- Structure de la table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE IF NOT EXISTS `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `username`) VALUES
(23, 'user0@mail.fr', '[\"ROLE_SUPER_ADMIN\"]', '$2y$13$XWiPiCSMqd1SuAgJ.u43X.pfrJucVd.dKVOe7iz0ivPN2A3vSpa66', 'user0'),
(24, 'user1@mail.fr', '[\"ROLE_ADMIN\"]', '$2y$13$FabLQO4X4c.FeGZ3119HHuv9UeQP0pq3AJc.0hg4OEL5fkFrxjv/m', 'user1'),
(25, 'user2@mail.fr', '[\"ROLE_USER\"]', '$2y$13$vvDIfzVv4H7gqe8Affw9Y.Nlwf1pCXnv9cB4z16aMrn4Dn2UEmD0W', 'user2');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `element`
--
ALTER TABLE `element`
  ADD CONSTRAINT `FK_282D920B530A8000` FOREIGN KEY (`element_category_id`) REFERENCES `element_category` (`id`),
  ADD CONSTRAINT `FK_282D920BAFF1D52B` FOREIGN KEY (`element_groupe_id`) REFERENCES `element_groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
