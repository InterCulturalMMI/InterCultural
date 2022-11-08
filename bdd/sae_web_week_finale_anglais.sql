-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 28 oct. 2022 à 22:02
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
-- Base de données : `sae_web_week_finale_anglais`
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
(1, 2023, 'Monuments', 'In this edition, the monuments are highlighted! Discover 5 cultures d\'around the world, centered on a monument. Visit Le Puy-en-Velay to discover themed areas.');

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
  `nbr_place_dispo` int(11) DEFAULT NULL,
  `main_activitee` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `id_pays`, `id_image`, `id_edition`, `nom_activitee`, `descriptif`, `horraires`, `date_event`, `lieu`, `prix_adulte`, `prix_enfant`, `payant`, `nbr_place_total`, `nbr_place_dispo`, `main_activitee`) VALUES
(1, 1, 11, 1, 'Carnival', 'Go behind the scenes and follow the progress of the Carnival that will take place throughout the event in order to close this beautiful weekend with a huge carnival in the colors of the Brazilian tradition. Participate in different activities and assimilate the Brazilian culture by creating typical Brazilian clothes, learning to dance and attending a capoeira show. Don’t miss out and make a reservation to be able to immerse yourself in the Brazilian culture.\r\n', '21:00:00', '2023-07-09', 'parc Henry Vinay', 10, 5, 1, 250, 250, 1),
(2, 2, 12, 1, 'Lantern throwing', 'Discover the Imperial Palace and its clay army by participating in the various activities set up in Le Puy-en-Velay. Discover with us one of the emblematic traditions of China and come to throw lanterns on the occasion of the opening of the Intercultural event on July 7, 2023 ! Lanterns, pottery or origami, don’t let your imagination limit you.\r\n', '22:30:00', '2023-07-07', 'Stade du Viouzou', 0, 0, 0, 300, 300, 1),
(3, 3, 13, 1, 'Escape Game', 'Find the pyramid of Khéops and the escape game it contains at the Pierre Cardinal center. Your only way to get out of the pyramid is to solve a set of puzzles and tests, without which you will be stuck… Do not hesitate to reserve as soon as possible to be able to participate in the activity. First come, first served! Around this last is a whole area with an Egyptian theme in which you can find a whole range of activities. You can visit the mummy museum, participate in archaeological excavations or buy local Egyptian products, which you will not taste anywhere else.\r\n', NULL, NULL, 'Centre Pierre Cardinal', 15, 10, 1, 150, 150, 1),
(4, 4, 14, 1, 'Olympics', 'The Olympics are coming to Puy-en-Velay! Come to face your competitors during a competition without a name. During the whole weekend, learn more about Ancient Greece by contemplating more than 350 objects resulting from this famous period in the museum, where you can admire vases, jewelry, glassware and an infinite number of other objects. Participate in various activities such as creating your own sculpture or, for children, a red light green light with Medusa, a famous character from Greek mythology. ', '13:00:00', '2023-07-08', 'Stade Charles Massot', 7, 5, 1, 130, 130, 1),
(5, 5, 15, 1, 'Holi Color Party', 'Saturday evening, around the Place du Breuil at 7pm, come celebrate the Holi, tradition of the transition to spring in India. Buy your paint and throw it on this occasion to create a huge colored cloud and give Puy-en-Velay the color of India. Don’t come with your nice clothes, you’ll probably end up covered in paint powder ! Find during the whole week-end on the Place du Breuil a whole range of activities related to Indian culture, such as tapestry, dances or the discovery of Indian food and its special spices.\r\n', '19:00:00', '2023-07-08', 'Place du Breuil', 0, 0, 0, 350, 350, 1),
(6, 1, 6, 1, 'Costume creation', 'Creation of costumes and content sets for Carnival', NULL, NULL, 'Parc Henry Vinay', 10, 5, 1, 150, 150, 0),
(7, 1, 6, 1, 'Danse initiation', 'Learn Brazilian dances to improve your skills and shine during Carnival!', NULL, NULL, 'Parc Henry Vinay', 0, 0, 0, 300, 300, 0),
(8, 1, 6, 1, 'Backstage', 'Discover the beginnings of the Carnival and the organization of this huge festival, and possibly help us!', '19:00:00', '2023-07-09', 'parc Henry Vinay', 0, 0, 0, 75, 75, 0),
(9, 1, 6, 1, 'Capoeira show', 'Support our artists and watch them perform Capoeira', NULL, NULL, 'Parc Henry Vinay', 0, 0, 0, 150, 150, 0),
(10, 2, 7, 1, 'Pottery', 'Join our artisans and make your own pottery. Leave with it to display or give as a gift!', NULL, NULL, 'Stade du Viouzou', 10, 6, 1, 200, 200, 0),
(11, 2, 7, 1, 'Martial arts initiation', 'Learn the art of defense, so traditional in China through different martial arts. It\'s your choice !', NULL, NULL, 'Stade du Viouzou', 5, 2, 1, 175, 175, 0),
(12, 2, 7, 1, 'Caligraphic paintings', 'Learn the art of Chinese drawing by painting Chinese characters with a traditional brush. Leave with your paintings.', NULL, NULL, 'Stade du Viouzou', 0, 0, 0, 200, 200, 0),
(13, 2, 7, 1, 'Lantern creation', 'Before the lantern toss, come make your own on our making activity! Decide whether to throw it or keep it.', NULL, '2023-07-07', 'Stade du Viouzou', 15, 10, 1, 350, 350, 0),
(14, 3, 8, 1, 'Archaeological excavations', 'Discover skeletons and relics in a digging ground! Leave with your rewards.', NULL, NULL, 'Centre Pierre Cardinal', 15, 7, 1, 150, 150, 0),
(15, 3, 8, 1, 'Labyrinth', 'Get lost and explore the surroundings of the pyramids inside a huge labyrinth, linked to the Escape Game.', NULL, NULL, 'Centre Pierre Cardinal', 3, 2, 1, 500, 500, 0),
(16, 3, 8, 1, 'Papyrus', 'Use the first methods of writing crating! Write like you\'ve never written before.', NULL, NULL, 'Centre Pierre Cardinal', 5, 3, 1, 220, 220, 0),
(17, 4, 9, 1, 'Statues exhibition', 'Discover a museum of Greek statues as you have never seen them before! Unique statues, whose details you will not forget.', NULL, NULL, 'Stade Charles Massot', 0, 0, 0, 400, 400, 0),
(18, 4, 9, 1, 'Sculpture workshop', 'Discover sculpture around a sculpture workshop, at all levels! Leave with your representations.', NULL, NULL, 'Stade Charles Massot', 15, 7, 1, 175, 175, 0),
(19, 4, 9, 1, 'Red light, Green light', 'A life-size red light, green light with Medusa as a threat, the human with cursed powers that turn to stone! Beware...', NULL, NULL, 'Stade Charles Massot', 0, 0, 0, 200, 200, 0),
(20, 5, 10, 1, 'Spices test', 'Smell, taste, test and cook typical Indian spices. Cooks, we are waiting for you to surprise us...', NULL, NULL, 'Place du Breuil', 5, 2, 1, 250, 250, 0),
(21, 5, 10, 1, 'Tapestry', 'Sew your own unique Indian-style sewing pieces! Leave with your creations to decorate your homes!', NULL, NULL, 'Place du Breuil', 25, 15, 1, 125, 125, 0),
(22, 5, 10, 1, 'Indian Dance', 'Come and learn the typical Indian dances with qualified dancers. Practice for the performance you can participate in!', NULL, NULL, 'Place du Breuil', 0, 0, 0, 175, 175, 0),
(23, 5, 10, 1, 'Dance show', 'Come and see or participate in our Indian dance show. If you have participated in the classes, we are waiting for you on stage!', '16:00:00', '2023-07-09', 'Place du Breuil', 0, 0, 0, 200, 200, 0);

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
(4, 'Drapeau Grece', 'Drapeau de la Grèce', 'drap', '../img/drap_grece.jpg'),
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
(25, 'Monument Inde 2', 'Image représentant le temple Mînâkshî', 'illu', '../img/illu_inde_2.png'),
(26, 'Carrousel Brésil', 'Carrousel de l\'image Brésil', 'carr', '../img/carrousel_bresil.jpg'),
(27, 'Carrousel Chine', 'Carrousel de l\'image Chine', 'carr', '../img/carrousel_chine.jpg'),
(28, 'Carrousel Egypte', 'Carrousel du pays Egypte', 'carr', '../img/carrousel_egypte.jpg'),
(29, 'Carrousel Grèce', 'Carrousel du pays Grèce', 'carr', '../img/carrousel_grece.jpg'),
(30, 'Carrousel Inde', 'Carrousel du pays Inde', 'carr', '../img/carrousel_inde.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `id_pays` int(11) NOT NULL,
  `id_image_ban` int(11) DEFAULT NULL,
  `id_image_car` int(11) DEFAULT NULL,
  `id_image_drap` int(11) DEFAULT NULL,
  `nom_pays` varchar(30) DEFAULT NULL,
  `geoloc_long` float DEFAULT NULL,
  `geoloc_latt` float DEFAULT NULL,
  `descriptif_pays` text DEFAULT NULL,
  `descriptif_monument` text DEFAULT NULL,
  `nom_monument_principal` varchar(50) DEFAULT NULL,
  `nom_monument_secondaire` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `id_image_ban`, `id_image_car`, `id_image_drap`, `nom_pays`, `geoloc_long`, `geoloc_latt`, `descriptif_pays`, `descriptif_monument`, `nom_monument_principal`, `nom_monument_secondaire`) VALUES
(1, 6, 26, 1, 'Brazil', 3.88, 43.03, 'The culture in Brazil is the mirror of the plural identity, the mixture and the values of the country. If the handicraft testifies of the ethnic cohesion, festivals and cultural manifestations confirm the atmosphere, the art of living and especially the community life. In Manaus like in Pantanal, from Minas-Gerais to Belém, the tradition and handicraft have built the Brazilian identity. The multicolored and folkloric stalls draw the streets, while the natural landscapes, sources of inspiration for the arts, compose the cities. A trip to Brazil will be as rich in discoveries as in colorful memories.', 'Christ the Redeemer is a tall statue of Christ overlooking the city of Rio de Janeiro in Brazil, from the top of the mountain Corcovado. Over the years, it has become one of the internationally recognized emblems of the city, just like the Sugar Loaf, Copacabana Beach or carnival. Christ the Redeemer is a work of art whose meaning is linked to the religious imagination of Brazil. The Museum of Tomorrow is a museum of science in the city of Rio de Janeiro, Brazil. It was designed by the spanish neofuturistic architect Santiago Calatrava, and built near the waterfront in Pier Maua. Its construction was supported by the Roberto Marinho Foundation and cost about 230 millions reais. The building was opened on December 17, 2015.', 'Christ the Redeemer', 'Museum of Tomorrow'),
(2, 7, 27, 2, 'China', 3.87, 45.04, 'China has one of the four oldest civilizations in the world (along with the Babylonian, Egyptian and Indian civilizations). This civilization has left a rich, unique and deep-rooted culture, but beyond this heritage, the country can also boast of 3,600 years of written history, a vast and varied territory that is an invaluable asset for the whole world. With a culture that is very different from ours in all areas, come and discover a cuisine, inhabitants, activities and traditions that we are unlikely to find in our western countries.\r\n', 'Hidden behind a wall of more than 3 400 meters, the Imperial Palace was built on a land of not less than 720 000 m². Considered the largest wooden construction in China, it is no less than 960m long and 750m wide. In addition, it has 995.5 pieces. Since its construction in 1406, 24 emperors had the honor to live in it. Today, the Palace has given away to a museum. The Terracotta Army was designed for the sole purpose of accompanying the First Emperor of China to his tomb. The thousands of realistic, human-sized statues evoke the army that would unify China at the end of the Warring Kingdoms period.', 'Imperial Palace', 'Terracotta Army'),
(3, 8, 28, 3, 'Egypt', 3.88, 45.04, 'The culture and tradition of Egypt is truly cosmopolitan. It is the fusion of many cultures which have been intertwined to create a real Melting Pot. Here we find a liberal attitude, displayed in the friendly behavior of Egyptians towards foreigners and tourists. If we ask them, Egyptians will always share their service and enthusiasm. The culture of Egypt has immense traditions, languages, history and civilizations to ancient places mixing traditions and heritage.', 'Presumed tomb of the pharaoh Khéops, the pyramid of Khéops was built more than 4 500 years ago, under the 4th Egyptian dynasty, in the center of the funerary complex of Kéops located in Gizeh in Egypt. Considered since Antiquity as the first of the Seven Wonders, she never ceased to fascinate. One of the biggest mysteries of the pyramid resides in its construction, which researchers have not yet discovered all of its secrets. Around this last one, we find the great sphinx of Giza. With its lion’s body and human’s head, he represents Rê-Horakhty, a form of solar god power, and is the incarnation of the royal power and the protector of the temple doors. The huge paws enclose a stele where is recorded a dream that made Thoutmosis IV when he was a prince, in which the sphinx tells him that he would become king if he would free him from the sand.\r\n', 'Pyramid of Khéops', 'The Sphinx'),
(4, 9, 29, 4, 'Greece', 3.87385, 45.046, 'Country of art and culture by excellence, Greece sees her greatness in its myths, its monuments and history. Trips in this nation of artistic and cultural movements are memorable for culture lovers. Between ancient cities, temples, charming islands, be completely captivated and dive into the fabulous world of Greece.\r\n', 'Olympia is one of the biggest religious centers of Ancient Greece. It is located in the Péloponnèse, in Elidea, on the right bank of the river Alpheus and at the foot of Mount Cronion. The site of Olympia was dedicated to Zeus. To honor this god, Olympia hosted every four years the Olympic games during Antiquity. Even today, the Olympic flame is lit there a few months before the opening ceremony of the modern games. As for the temple of Athena, built entirely of pentelic marble between 427 and 421 BC, stands on a 6 meter high stone platform that extends from the southwestern corner of the Acropolis. The temple was the first ionic structure to be built on the Acropolis. It is dedicated to Nikè, a form of Athena, who is considered as the goddess of Victory in Greek mythology.', 'Olympia', 'The Temple of Athena'),
(5, 10, 30, 5, 'India', 3.88402, 45.0416, 'With its many colors, smells and flavors, India is a strong change of scenery for the Western traveler. It surprises, confuses, enchants and even shocks sometimes. The roots of Indian culture are deeply planted, and it will be possible for you to discover them in Puy-en-Velay. Hindu temples, orientales tapestries and tasty Indian dishes are many elements that will transport you into its past and history. Not to mention the cult around an animal that in our country is quite ordinary. Come discover the specificities of that country during this intercultural week-end.', 'Monument with a rather misunderstood utility, the Taj Mahal is in reality the shrine of the emperor Shâh Jahân’s favorite wife, Mumtaz Mahal. Its construction lasted from 1631 to 1648, During which more than 22.000 slaves will work to build a white marble structure almost 75 meters high. The emperor will join his wife at his death, in 1666. He is considered as the jewel of the mongolian architecture, even worldwide. This time for religious purposes, the Mînâkshî Temple is a Dravidian-style Hindu temple located in Madurai in Tamil Nadu, India. It is the masterpiece of Dravidian architecture and one of the most important active temples in India. It is dedicated to Mînâkshî, an avatar of the Hindu Goddess Parvati, the wife of Shiva, as well as Shiva, in his Sundareshvara form.\r\n', 'Taj Mahal', 'Temple of Mînâkshî');

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
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1);

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
(2, 1, 17),
(3, 2, 18),
(4, 2, 19),
(5, 3, 20),
(6, 3, 21),
(7, 4, 22),
(8, 4, 23),
(9, 5, 24),
(10, 5, 25);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id_user` int(11) NOT NULL,
  `pseudo_user` varchar(50) NOT NULL,
  `mdp_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_user`, `pseudo_user`, `mdp_user`) VALUES
(1, 'user_test', 'mdp_test');

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
  ADD KEY `id_image_car` (`id_image_car`),
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
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id_user`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pays_edition`
--
ALTER TABLE `pays_edition`
  MODIFY `id_pays_edition` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `pays_image`
--
ALTER TABLE `pays_image`
  MODIFY `id_pays_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_pays`) REFERENCES `pays` (`id_pays`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_image`) REFERENCES `image` (`id_image`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`id_edition`) REFERENCES `edition` (`id_edition`);

--
-- Contraintes pour la table `pays`
--
ALTER TABLE `pays`
  ADD CONSTRAINT `pays_ibfk_1` FOREIGN KEY (`id_image_ban`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `pays_ibfk_2` FOREIGN KEY (`id_image_drap`) REFERENCES `image` (`id_image`),
  ADD CONSTRAINT `pays_ibfk_3` FOREIGN KEY (`id_image_car`) REFERENCES `image` (`id_image`);

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
