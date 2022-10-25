-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 oct. 2022 à 11:21
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sae_web_week`
--

-- --------------------------------------------------------

--
-- Structure de la table `edition`
--

CREATE TABLE `edition` (
  `id_edition` int(11) NOT NULL,
  `annee` int(11) DEFAULT NULL,
  `theme` varchar(50) DEFAULT NULL,
  `descriptif_annee` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `edition`
--

INSERT INTO `edition` (`id_edition`, `annee`, `theme`, `descriptif_annee`) VALUES
(1, 2023, 'Monuments', 'Dans cette édition, les monuments sont mis en avant ! Découvrez 5 cultures d\'à travers tout le monde, centré sur un monument. Visitez le Puy-En-Velay pour découvrir des zones à thèmes.');

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `id_image` int(11) DEFAULT NULL,
  `id_edition` int(11) DEFAULT NULL,
  `nom_activitee` varchar(50) DEFAULT NULL,
  `descriptif` text DEFAULT NULL,
  `horraires` time DEFAULT NULL,
  `date_event` date DEFAULT NULL,
  `lieu` varchar(30) DEFAULT NULL,
  `prix_adulte` float DEFAULT NULL,
  `prix_enfant` float DEFAULT NULL,
  `payant` tinyint(1) DEFAULT NULL,
  `nbr_place_total` int(11) DEFAULT NULL,
  `nbr_place_dispo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `id_pays`, `id_image`, `id_edition`, `nom_activitee`, `descriptif`, `horraires`, `date_event`, `lieu`, `prix_adulte`, `prix_enfant`, `payant`, `nbr_place_total`, `nbr_place_dispo`) VALUES
(1, 1, 11, 1, 'Carnaval', 'Découvrez les coulisses et suivez l’avancée de la mise en place du carnaval qui se passera tout au long de l’événement, afin de clôturer ce beau week-end avec un énorme carnaval aux couleurs de la coutume brésilienne. Participez à différentes activités et assimilez la culture brésilienne en créant des vêtements typiques du Brésil, en vous initiant à la danse et en assistant à un spectacle de capoeira. Ne ratez rien et réservez pour pouvoir vous imprégner de la culture brésilienne.\r\n', '21:00:00', '2023-07-09', 'parc Henry Vinay', 10, 5, 1, 250, 250),
(2, 2, 12, 1, 'Lancer de lanternes', 'Découvrez le Palais Impérial et son armée d’argile en participant aux diverses activités mises en place au Puy en Velay. Retrouvez avec nous l’une des tradition emblématique de la Chine et venez lancer des lanternes à l’occasion de l’ouverture du festival d’Intercultural le 7 juillet 2023 ! Lanternes, poterie ou origami, ne laissez que votre imagination vous limiter.\r\n', '22:30:00', '2023-07-07', 'Stade du Viouzou', 0, 0, 0, 300, 300);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `nom_image` varchar(50) DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `nom_image`, `alt`, `type`, `url`) VALUES
(1, 'Drapeau Brésil', 'Drapeau du Brésil', 'drap', '../img/drap_bresil.png'),
(2, 'Drapeau Chine', 'Drapeau de la Chine', 'drap', '../img/drap_chine.png'),
(3, 'Drapeau Egypte', 'Drapeau de l\'Egypte', 'drap', '../img/drap_egypte.png'),
(4, 'Drapeau Grece', 'Drapeau de la Grèce', 'drap', '../img/drap_egypte.png'),
(5, 'Drapeau Inde', 'Drapeau de l\'Inde', 'drap', '../img/drap_inde.png'),
(6, 'Bannière Brésil', 'Bannière Pour le Brésil', 'bann', '../img/bann_bresil.png'),
(7, 'Bannière Chine', 'Bannière pour la Chine', 'bann', '../img/bann_chine.png'),
(8, 'Bannière Egype', 'Bannière pour l\'Egypte', 'bann', '../img/bann_egypte.png'),
(9, 'Bannière Grèce', 'Bannière pour la Grèce', 'bann', '../img/bann_grece.png'),
(10, 'Bannière Inde', 'Bannière pour l\'Inde', 'bann', '../img/bann_inde.png'),
(11, 'Event Brésil', 'Image représentant l\'activité de la zone Brésil', 'event', '../img/event_bresil.png'),
(12, 'Event Chine', 'Image représentant l\'activité de la zone Chine', 'event', '../img/event_chine.png'),
(13, 'Event Egypte', 'Image représentant l\'activité de la zone Egypte', 'event', '../img/event_egypte.png'),
(14, 'Event Grèce', 'Image représentant l\'activité de la zone Grèce', 'event', '../img/event_grece.png'),
(15, 'Event Inde', 'Image représentant l\'activité de la zone Inde', 'event', '../img/event_inde.png'),
(16, 'Monument Brésil 1', 'Représentation de la statue du Christ Rédepteur', 'illu', '../img/illu_bresil_1.png'),
(17, 'Monument Brésil 2', 'Représentation de la statue du Musée Du Futur', 'illu', '../img/illu_bresil_2.png'),
(18, 'Monument Chine 1', 'Image représentant le Palais de l\'Empereur', 'illu', '../img/illu_chine_1.png'),
(19, 'Monument Chine 2', 'Image représentant l\'Armée en Terre Cuite', 'illu', '../img/illu_chine_2.png'),
(20, 'Monument Egypte 1', 'Image représentant la Pyramide de Kheops', 'illu', '../img/illu_egypte_1.png'),
(21, 'Monument Egypte 2', 'Image représentant le Sphinx', 'illu', '../img/illu_egypte_2.png'),
(22, 'Monument Grèce 1', 'Image représentant la ville d\'Olympie', 'illu', '../img/illu_grece_1.png'),
(23, 'Monument Grèce 2', 'Image représentant le temple d\'Athéna', 'illu', '../img/illu_grece_2.png'),
(24, 'Monument Inde 1', 'Image représentant le Taj Mahal', 'illu', '../img/illu_inde_1.png'),
(25, 'Monument Inde 2', 'Image représentant le temple Mînâkshî', 'illu', '../img/illu_inde_2.png');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `id_image_ban` int(11) DEFAULT NULL,
  `id_image_drap` int(11) DEFAULT NULL,
  `nom_pays` varchar(30) DEFAULT NULL,
  `geoloc_long` float DEFAULT NULL,
  `geoloc_latt` float DEFAULT NULL,
  `descriptif_pays` text DEFAULT NULL,
  `descriptif_monument` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `id_image_ban`, `id_image_drap`, `nom_pays`, `geoloc_long`, `geoloc_latt`, `descriptif_pays`, `descriptif_monument`) VALUES
(1, 6, 1, 'Brésil', 3.88, 43.03, 'La culture au Brésil est le miroir de l’identité plurielle, du métissage et des valeurs du pays. Si l’artisanat témoigne de la cohésion ethnique, les festivals et manifestations culturels confirment l’ambiance, l’art de vivre et surtout la vie communautaire. À Manaus comme à Pantanal, de Minas-Gerais à Belém, la tradition et l’artisanat ont bâti l’identité brésilienne. Les étals multicolores et folkloriques dessinent les ruelles, tandis que les paysages naturels, sources d’inspiration des arts, composent les cités. Un voyage au Brésil s’annonce aussi riche en découvertes qu’en souvenirs colorés.', 'Le Christ Rédempteur est une grande statue du Christ dominant la ville de Rio de Janeiro au Brésil, du haut du mont Corcovado. Elle est devenue au fil des ans un des emblèmes reconnus internationalement de la ville, au même titre que le Pain de Sucre, la plage de Copacabana ou le carnaval. Le Christ Rédempteur est une œuvre dont la signification est liée à l\'imaginaire religieux du Brésil. Le Musée de demain est un musée de la science dans la ville de Rio de Janeiro, Brésil. Il a été conçu par l’architecte espagnol neofuturistic Santiago Calatrava, et construit près du front de mer à Pier Maua. Sa construction a été soutenue par la Fondation Roberto Marinho et a coûté environ 230 millions de reais. Le bâtiment a été ouvert le 17 Décembre 2015.'),
(2, 7, 2, 'Chine', 3.87, 45.04, 'test', 'Caché derrière un mur d’enceinte de plus de 3 400 mètres, le palais impérial fut construit sur un terrain de pas moins de 720 000 m². Considéré comme la plus grande construction de bois de chine il ne mesure pas moins de 960 m de long et de 750 m de large, en outre il compte 999.5 pièces. Depuis sa construction en 1406, 24 empereurs ont eu l’honneur de vivre en son sein. Aujourd’hui, le Palais à laisser place à un musée.');

-- --------------------------------------------------------

--
-- Structure de la table `pays_edition`
--

CREATE TABLE `pays_edition` (
  `id_pays_edition` int(11) NOT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `id_edition` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays_edition`
--

INSERT INTO `pays_edition` (`id_pays_edition`, `id_pays`, `id_edition`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `pays_image`
--

CREATE TABLE `pays_image` (
  `id_pays_image` int(11) NOT NULL,
  `id_pays` int(11) DEFAULT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays_image`
--

INSERT INTO `pays_image` (`id_pays_image`, `id_pays`, `id_image`) VALUES
(1, 1, 16),
(2, 1, 17);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `edition`
--
ALTER TABLE `edition`
  ADD PRIMARY KEY (`id_edition`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_pays` (`id_pays`),
  ADD KEY `id_image` (`id_image`),
  ADD KEY `id_edition` (`id_edition`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`id_pays`),
  ADD KEY `id_image_ban` (`id_image_ban`),
  ADD KEY `id_image_drap` (`id_image_drap`);

--
-- Index pour la table `pays_edition`
--
ALTER TABLE `pays_edition`
  ADD PRIMARY KEY (`id_pays_edition`),
  ADD KEY `id_pays` (`id_pays`),
  ADD KEY `id_edition` (`id_edition`);

--
-- Index pour la table `pays_image`
--
ALTER TABLE `pays_image`
  ADD PRIMARY KEY (`id_pays_image`),
  ADD KEY `id_pays` (`id_pays`),
  ADD KEY `id_image` (`id_image`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `edition`
--
ALTER TABLE `edition`
  MODIFY `id_edition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pays_edition`
--
ALTER TABLE `pays_edition`
  MODIFY `id_pays_edition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `pays_image`
--
ALTER TABLE `pays_image`
  MODIFY `id_pays_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`id_edition`) REFERENCES `edition` (`id_edition`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`id_image_ban`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`id_image_drap`) REFERENCES `image` (`id_image`);

--
-- Contraintes pour la table `pays_edition`
--
ALTER TABLE `pays_edition`
  ADD CONSTRAINT `pays_edition_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `pays_edition_ibfk_2` FOREIGN KEY (`id_edition`) REFERENCES `edition` (`id_edition`);

--
-- Contraintes pour la table `pays_image`
--
ALTER TABLE `pays_image`
  ADD CONSTRAINT `pays_image_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `pays_image_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
