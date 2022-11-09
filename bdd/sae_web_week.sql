-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 08 nov. 2022 à 14:39
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
  `descriptif_annee` text DEFAULT NULL,
  `theme_en` text DEFAULT NULL,
  `descriptif_annee_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `edition`
--

INSERT INTO `edition` (`id_edition`, `annee`, `theme`, `descriptif_annee`, `theme_en`, `descriptif_annee_en`) VALUES
(1, 2023, 'Monuments', 'Dans cette édition, les monuments sont mis en avant ! Découvrez 5 cultures d\'à travers tout le monde, centré sur un monument. Visitez le Puy-En-Velay pour découvrir des zones à thèmes.', 'Monuments', 'In this edition, the monuments are highlighted! Discover 5 cultures d\'around the world, centered on a monument. Visit Le Puy-en-Velay to discover themed areas.');

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
  `main_activitee` tinyint(1) DEFAULT NULL,
  `nom_activitee_en` text DEFAULT NULL,
  `descriptif_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id_event`, `id_pays`, `id_image`, `id_edition`, `nom_activitee`, `descriptif`, `horraires`, `date_event`, `lieu`, `prix_adulte`, `prix_enfant`, `payant`, `nbr_place_total`, `nbr_place_dispo`, `main_activitee`, `nom_activitee_en`, `descriptif_en`) VALUES
(1, 1, 11, 1, 'Carnaval', 'Découvrez les coulisses et suivez l’avancée de la mise en place du carnaval qui se passera tout au long de l’événement, afin de clôturer ce beau week-end avec un énorme carnaval aux couleurs de la coutume brésilienne. Participez à différentes activités et assimilez la culture brésilienne en créant des vêtements typiques du Brésil, en vous initiant à la danse et en assistant à un spectacle de capoeira. Ne ratez rien et réservez pour pouvoir vous imprégner de la culture brésilienne.\r\n', '21:00:00', '2023-07-09', 'parc Henry Vinay', 10, 5, 1, 250, 250, 1, 'Carnival', 'Go behind the scenes and follow the progress of the Carnival that will take place throughout the event in order to close this beautiful weekend with a huge carnival in the colors of the Brazilian tradition. Participate in different activities and assimilate the Brazilian culture by creating typical Brazilian clothes, learning to dance and attending a capoeira show. Don’t miss out and make a reservation to be able to immerse yourself in the Brazilian culture.\n'),
(2, 2, 12, 1, 'Lancer de lanternes', 'Découvrez le Palais Impérial et son armée d’argile en participant aux diverses activités mises en place au Puy en Velay. Retrouvez avec nous l’une des tradition emblématique de la Chine et venez lancer des lanternes à l’occasion de l’ouverture du festival d’Intercultural le 7 juillet 2023 ! Lanternes, poterie ou origami, ne laissez que votre imagination vous limiter.\r\n', '22:30:00', '2023-07-07', 'Stade du Viouzou', 0, 0, 0, 300, 300, 1, 'Lantern throwing', 'Discover the Imperial Palace and its clay army by participating in the various activities set up in Le Puy-en-Velay. Discover with us one of the emblematic traditions of China and come to throw lanterns on the occasion of the opening of the Intercultural event on July 7, 2023 ! Lanterns, pottery or origami, don’t let your imagination limit you.\n'),
(3, 3, 13, 1, 'Escape Game', 'Retrouvez la pyramide de Khéops et l’escape game qu’elle contient au centre Pierre Cardinal. Vous ne pourrez sortir que de la pyramide en résolvant un ensemble d’énigmes et d’épreuves, sans lesquelles vous resterez bloqués… N’hésitez pas à réserver au plus tôt pour espérer participer à l’activité, premier arrivé premier servi ! Autour de cette dernière toute une zone à thème de l’Egypte dans laquelle vous pourrez trouver tout un ensemble d’activités. Vous pourrez visiter le musée aux momies, participer à des fouilles archéologiques où acheter des produits locaux égyptiens, que vous ne goûterez nulle part ailleurs.\r\n', NULL, NULL, 'Centre Pierre Cardinal', 15, 10, 1, 150, 150, 1, 'Escape Game', 'Find the pyramid of Khéops and the escape game it contains at the Pierre Cardinal center. Your only way to get out of the pyramid is to solve a set of puzzles and tests, without which you will be stuck… Do not hesitate to reserve as soon as possible to be able to participate in the activity. First come, first served! Around this last is a whole area with an Egyptian theme in which you can find a whole range of activities. You can visit the mummy museum, participate in archaeological excavations or buy local Egyptian products, which you will not taste anywhere else.\n'),
(4, 4, 14, 1, 'Olympiades', 'Les Olympiades débarquent au Puy-En-Velay ! Venez affronter vos concurrents lors d’une compétition sans nom. Durant tout le week-end, apprenez en plus sur la Grèce antique en venant contempler plus de 350 objets issus de cette célèbre période dans le musée, où vous pourrez admirer des vases, des bijoux, des éléments en verre ainsi qu’une infinité d’objets. Participez à différentes activités telles que la création de votre propre sculpture ou, pour les enfants, un 1,2,3 soleil avec Méduse, célèbre personnage de la mythologie grecque. ', '13:00:00', '2023-07-08', 'Stade Charles Massot', 7, 5, 1, 130, 130, 1, 'Olympics', 'The Olympics are coming to Puy-en-Velay! Come to face your competitors during a competition without a name. During the whole weekend, learn more about Ancient Greece by contemplating more than 350 objects resulting from this famous period in the museum, where you can admire vases, jewelry, glassware and an infinite number of other objects. Participate in various activities such as creating your own sculpture or, for children, a red light green light with Medusa, a famous character from Greek mythology. '),
(5, 5, 15, 1, 'Holi, fête des couleurs', 'Samedi soir, aux alentours de la Place du Breuil à 19h, venez célébrer la Holi, tradition du passage au printemps en Inde. Achetez votre peinture et lancez-là à cette occasion pour créer un énorme nuage coloré et ainsi donner au Puy la couleur de l’Inde. Ne venez pas avec vos plus beaux habits, vous finirez probablement couvert de poudre de peinture ! Retrouvez tout le week-end sur la place du Breuil, tout un ensemble d\'activités en rapport avec la culture indienne, telles que la tapisserie, des danses ou encore la découverte de la cuisine indienne et de ses épices si particuliers.\r\n', '19:00:00', '2023-07-08', 'Place du Breuil', 0, 0, 0, 350, 350, 1, 'Holi Color Party', 'Saturday evening, around the Place du Breuil at 7pm, come celebrate the Holi, tradition of the transition to spring in India. Buy your paint and throw it on this occasion to create a huge colored cloud and give Puy-en-Velay the color of India. Don’t come with your nice clothes, you’ll probably end up covered in paint powder ! Find during the whole week-end on the Place du Breuil a whole range of activities related to Indian culture, such as tapestry, dances or the discovery of Indian food and its special spices.\n'),
(6, 1, 6, 1, 'Création déguisements', 'Création de déguisements et d\'ensembles de contenus pour le Carnaval', NULL, NULL, 'Parc Henry Vinay', 10, 5, 1, 150, 150, 0, 'Costume creation', 'Creation of costumes and content sets for Carnival'),
(7, 1, 6, 1, 'Initiation Danse', 'Apprenez les danses brésiliennes pour vous perfectionner et briller durant le carnaval !', NULL, NULL, 'Parc Henry Vinay', 0, 0, 0, 300, 300, 0, 'Danse initiation', 'Learn Brazilian dances to improve your skills and shine during Carnival!'),
(8, 1, 6, 1, 'Coulisses', 'Découvrez les prémices du Carnaval et l\'organisation de cet énorme festival, et possiblement aidez-nous !', '19:00:00', '2023-07-09', 'parc Henry Vinay', 0, 0, 0, 75, 75, 0, 'Bakcstage', 'Discover the beginnings of the Carnival and the organization of this huge festival, and possibly help us!'),
(9, 1, 6, 1, 'Spectacle capoera', 'Soutenez nos artistes et regardez les en pleine performance de Capoera !', NULL, NULL, 'Parc Henry Vinay', 0, 0, 0, 150, 150, 0, 'Capoeira show', 'Support our artists and watch them perform Capoeira'),
(10, 2, 7, 1, 'Poterie', 'Rejoignez nos artisans et réalisez vos propres poteries, repartez avec pour les exposer ou les offrir !', NULL, NULL, 'Stade du Viouzou', 10, 6, 1, 200, 200, 0, 'Pottery', 'Join our artisans and make your own pottery. Leave with it to display or give as a gift!'),
(11, 2, 7, 1, 'Initiation Art Martiaux', 'Apprenez l\'art de la défense, si traditionnel en Chine à travers différents arts martiaux. A vous de choisir !', NULL, NULL, 'Stade du Viouzou', 5, 2, 1, 175, 175, 0, 'Martial arts initiation', 'Learn the art of defense, so traditional in China through different martial arts. It\'s your choice !'),
(12, 2, 7, 1, 'Peintures Caligraphiques', 'Apprenez l\'art du dessin à la chinoise en peignant des caractères chinois, au pinceau traditionnel. Repartez avec vos peintures', NULL, NULL, 'Stade du Viouzou', 0, 0, 0, 200, 200, 0, 'Caligraphic paintings', 'Learn the art of Chinese drawing by painting Chinese characters with a traditional brush. Leave with your paintings.'),
(13, 2, 7, 1, 'Création lanterne', 'Avant le lancer de lanterne, venez réaliser les vôtres sur notre activité de réalisation ! Décidez de la lancer ou la garder.', NULL, '2023-07-07', 'Stade du Viouzou', 15, 10, 1, 350, 350, 0, 'Lantern creation', 'Before the lantern toss, come make your own on our making activity! Decide whether to throw it or keep it.'),
(14, 3, 8, 1, 'Fouilles archéologiques', 'Découvrez des squelettes et des reliques dans un terrain à fouiller ! Repartez avec vos récompenses.', NULL, NULL, 'Centre Pierre Cardinal', 15, 7, 1, 150, 150, 0, 'Archaeological excavations', 'Discover skeletons and relics in a digging ground! Leave with your rewards.'),
(15, 3, 8, 1, 'Labyrinthe', 'Perdez vous et explorez les alentours des pyramides à l\'intérieur d\'un énorme labyrinthe, lié à l\'Escape Game', NULL, NULL, 'Centre Pierre Cardinal', 3, 2, 1, 500, 500, 0, 'Labyrinth', 'Get lost and explore the surroundings of the pyramids inside a huge labyrinth, linked to the Escape Game.'),
(16, 3, 8, 1, 'Papyrus', 'Utilisez les premières méthodes de confection de l\'écriture ! Ecrivez comme vous ne l\'avez jamais fais.', NULL, NULL, 'Centre Pierre Cardinal', 5, 3, 1, 220, 220, 0, 'Papyrus', 'Use the first methods of writing crating! Write like you\'ve never written before.'),
(17, 4, 9, 1, 'Exposition Statues', 'Découvrez un musée de statues grecques comme vous ne les avez jamais vues ! Des statues uniques, dont vous n\'oublierez pas les détails.', NULL, NULL, 'Stade Charles Massot', 0, 0, 0, 400, 400, 0, 'Statues exhibition', 'Discover a museum of Greek statues as you have never seen them before! Unique statues, whose details you will not forget.'),
(18, 4, 9, 1, 'Atelier Sculpture', 'Découvrez la sculpture autour d\'un atelier de sculpture, à tous les niveaux ! Repartez avec vos représentations !', NULL, NULL, 'Stade Charles Massot', 15, 7, 1, 175, 175, 0, 'Sculpture workshop', 'Discover sculpture around a sculpture workshop, at all levels! Leave with your representations.'),
(19, 4, 9, 1, '1 2 3 Soleil', 'Un 1 2 3 Soleil grandeur nature, avec comme menace Méduse, l\'humaine aux pouvoirs maudits qui transforment en pierre ! Prenez garde..', NULL, NULL, 'Stade Charles Massot', 0, 0, 0, 200, 200, 0, 'Red light, green light', 'A life-size red light, green light with Medusa as a threat, the human with cursed powers that turn to stone! Beware...'),
(20, 5, 10, 1, 'Test épices ', 'Sentez, goûtez, testez et cuisinez des épices typiques d\'Inde. Cuisiniers, nous vous attendons pour nous surprendre..', NULL, NULL, 'Place du Breuil', 5, 2, 1, 250, 250, 0, 'Spices test', 'Smell, taste, test and cook typical Indian spices. Cooks, we are waiting for you to surprise us...'),
(21, 5, 10, 1, 'Tapisserie', 'Tapissez vos propres pièces de coutures, au style indien unique ! Repartez avec vos créations pour décorer vos maisons !', NULL, NULL, 'Place du Breuil', 25, 15, 1, 125, 125, 0, 'Tapestry', 'Sew your own unique Indian-style sewing pieces! Leave with your creations to decorate your homes!'),
(22, 5, 10, 1, 'Danse Indienne', 'Venez apprendre les danses typiques Indiennes avec des danseuses qualifiées. Entrainez-vous pour la représentation dont vous pourrez participer !', NULL, NULL, 'Place du Breuil', 0, 0, 0, 175, 175, 0, 'Indian dance', 'Come and learn the typical Indian dances with qualified dancers. Practice for the performance you can participate in!'),
(23, 5, 10, 1, 'Spectacle Danse', 'Venez assister ou participer à notre spectacle de danse indienne. Si vous avez participés aux cours, nous vous attendons sur scène !', '16:00:00', '2023-07-09', 'Place du Breuil', 0, 0, 0, 200, 200, 0, 'Dance show', 'Come and see or participate in our Indian dance show. If you have participated in the classes, we are waiting for you on stage!');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `nom_image` varchar(50) DEFAULT NULL,
  `alt` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `url_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `image`
--

INSERT INTO `image` (`id_image`, `nom_image`, `alt`, `type`, `url`, `url_en`) VALUES
(1, 'Drapeau Brésil', 'Drapeau du Brésil', 'drap', 'img/drap_bresil.png', '../img/drap_bresil.png'),
(2, 'Drapeau Chine', 'Drapeau de la Chine', 'drap', 'img/drap_chine.png', '../img/drap_chine.png'),
(3, 'Drapeau Egypte', 'Drapeau de l\'Egypte', 'drap', 'img/drap_egypte.png', '../img/drap_egypte.png'),
(4, 'Drapeau Grece', 'Drapeau de la Grèce', 'drap', 'img/drap_grece.jpg', '../img/drap_grece.jpg'),
(5, 'Drapeau Inde', 'Drapeau de l\'Inde', 'drap', 'img/drap_inde.png', '../img/drap_inde.png'),
(6, 'Bannière Brésil', 'Bannière Pour le Brésil', 'bann', 'img/bann_bresil.png', '../img/bann_bresil.png'),
(7, 'Bannière Chine', 'Bannière pour la Chine', 'bann', 'img/bann_chine.png', '../img/bann_chine.png'),
(8, 'Bannière Egype', 'Bannière pour l\'Egypte', 'bann', 'img/bann_egypte.png', '../img/bann_egypte.png'),
(9, 'Bannière Grèce', 'Bannière pour la Grèce', 'bann', 'img/bann_grece.png', '../img/bann_grece.png'),
(10, 'Bannière Inde', 'Bannière pour l\'Inde', 'bann', 'img/bann_inde.png', '../img/bann_inde.png'),
(11, 'Event Brésil', 'Image représentant l\'activité de la zone Brésil', 'event', 'img/event_bresil.png', '../img/event_bresil.png'),
(12, 'Event Chine', 'Image représentant l\'activité de la zone Chine', 'event', 'img/event_chine.png', '../img/event_chine.png'),
(13, 'Event Egypte', 'Image représentant l\'activité de la zone Egypte', 'event', 'img/event_egypte.png', '../img/event_egypte.png'),
(14, 'Event Grèce', 'Image représentant l\'activité de la zone Grèce', 'event', 'img/event_grece.png', '../img/event_grece.png'),
(15, 'Event Inde', 'Image représentant l\'activité de la zone Inde', 'event', 'img/event_inde.png', '../img/event_inde.png'),
(16, 'Monument Brésil 1', 'Représentation de la statue du Christ Rédepteur', 'illu', 'img/illu_bresil_1.png', '../img/illu_bresil_1.png'),
(17, 'Monument Brésil 2', 'Représentation de la statue du Musée Du Futur', 'illu', 'img/illu_bresil_2.png', '../img/illu_bresil_2.png'),
(18, 'Monument Chine 1', 'Image représentant le Palais de l\'Empereur', 'illu', 'img/illu_chine_1.png', '../img/illu_chine_1.png'),
(19, 'Monument Chine 2', 'Image représentant l\'Armée en Terre Cuite', 'illu', 'img/illu_chine_2.png', '../img/illu_chine_2.png'),
(20, 'Monument Egypte 1', 'Image représentant la Pyramide de Kheops', 'illu', 'img/illu_egypte_1.png', '../img/illu_egypte_1.png'),
(21, 'Monument Egypte 2', 'Image représentant le Sphinx', 'illu', 'img/illu_egypte_2.png', '../img/illu_egypte_2.png'),
(22, 'Monument Grèce 1', 'Image représentant la ville d\'Olympie', 'illu', 'img/illu_grece_1.png', '../img/illu_grece_1.png'),
(23, 'Monument Grèce 2', 'Image représentant le temple d\'Athéna', 'illu', 'img/illu_grece_2.png', '../img/illu_grece_2.png'),
(24, 'Monument Inde 1', 'Image représentant le Taj Mahal', 'illu', 'img/illu_inde_1.png', '../img/illu_inde_1.png'),
(25, 'Monument Inde 2', 'Image représentant le temple Mînâkshî', 'illu', 'img/illu_inde_2.png', '../img/illu_inde_2.png'),
(26, 'Carrousel Brésil', 'Carrousel de l\'image Brésil', 'carr', 'img/carrousel_bresil.jpg', '../img/carrousel_bresil.jpg'),
(27, 'Carrousel Chine', 'Carrousel de l\'image Chine', 'carr', 'img/carrousel_chine.jpg', '../img/carrousel_chine.jpg'),
(28, 'Carrousel Egypte', 'Carrousel du pays Egypte', 'carr', 'img/carrousel_egypte.jpg', '../img/carrousel_egypte.jpg'),
(29, 'Carrousel Grèce', 'Carrousel du pays Grèce', 'carr', 'img/carrousel_grece.jpg', '../img/carrousel_grece.jpg'),
(30, 'Carrousel Inde', 'Carrousel du pays Inde', 'carr', 'img/carrousel_inde.jpg', '../img/carrousel_inde.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `mails`
--

CREATE TABLE `mails` (
  `id_code` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mails`
--

INSERT INTO `mails` (`id_code`, `email`, `code`) VALUES
(1, 'fgd', '468928108'),
(2, 'test', '415'),
(22, 'wanou10092003@gmail.com', '622'),
(23, 'wanou10092003@gmail.com', '2344185034'),
(24, 'wanou10092003@gmail.com', '6351436482'),
(25, 'wanou10092003@gmail.com', '33392'),
(26, 'wanou10092003@gmail.com', '5551'),
(27, 'wanou10092003@gmail.com', '781838172'),
(28, 'wanou10092003@gmail.com', '871499188540570'),
(29, 'une@gmail.com', '377598'),
(30, 'testfinal@gmail.com', '5908108583'),
(31, 'jsp@mail.com', '888342712');

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
  `nom_monument_secondaire` varchar(50) DEFAULT NULL,
  `nom_pays_en` text DEFAULT NULL,
  `descriptif_pays_en` text DEFAULT NULL,
  `descriptif_monument_en` text DEFAULT NULL,
  `nom_monument_principal_en` text DEFAULT NULL,
  `nom_monument_secondaire_en` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`id_pays`, `id_image_ban`, `id_image_car`, `id_image_drap`, `nom_pays`, `geoloc_long`, `geoloc_latt`, `descriptif_pays`, `descriptif_monument`, `nom_monument_principal`, `nom_monument_secondaire`, `nom_pays_en`, `descriptif_pays_en`, `descriptif_monument_en`, `nom_monument_principal_en`, `nom_monument_secondaire_en`) VALUES
(1, 6, 26, 1, 'Brésil', 3.88, 43.03, 'La culture au Brésil est le miroir de l’identité plurielle, du métissage et des valeurs du pays. Si l’artisanat témoigne de la cohésion ethnique, les festivals et manifestations culturels confirment l’ambiance, l’art de vivre et surtout la vie communautaire. À Manaus comme à Pantanal, de Minas-Gerais à Belém, la tradition et l’artisanat ont bâti l’identité brésilienne. Les étals multicolores et folkloriques dessinent les ruelles, tandis que les paysages naturels, sources d’inspiration des arts, composent les cités. Un voyage au Brésil s’annonce aussi riche en découvertes qu’en souvenirs colorés.', 'Le Christ Rédempteur est une grande statue du Christ dominant la ville de Rio de Janeiro au Brésil, du haut du mont Corcovado. Elle est devenue au fil des ans un des emblèmes reconnus internationalement de la ville, au même titre que le Pain de Sucre, la plage de Copacabana ou le carnaval. Le Christ Rédempteur est une œuvre dont la signification est liée à l\'imaginaire religieux du Brésil. Le Musée de demain est un musée de la science dans la ville de Rio de Janeiro, Brésil. Il a été conçu par l’architecte espagnol neofuturistic Santiago Calatrava, et construit près du front de mer à Pier Maua. Sa construction a été soutenue par la Fondation Roberto Marinho et a coûté environ 230 millions de reais. Le bâtiment a été ouvert le 17 Décembre 2015.', 'Chris Rédempteur', 'Musée du futur', 'Brazil', 'The culture in Brazil is the mirror of the plural identity, the mixture and the values of the country. If the handicraft testifies of the ethnic cohesion, festivals and cultural manifestations confirm the atmosphere, the art of living and especially the community life. In Manaus like in Pantanal, from Minas-Gerais to Belém, the tradition and handicraft have built the Brazilian identity. The multicolored and folkloric stalls draw the streets, while the natural landscapes, sources of inspiration for the arts, compose the cities. A trip to Brazil will be as rich in discoveries as in colorful memories.', 'Christ the Redeemer is a tall statue of Christ overlooking the city of Rio de Janeiro in Brazil, from the top of the mountain Corcovado. Over the years, it has become one of the internationally recognized emblems of the city, just like the Sugar Loaf, Copacabana Beach or carnival. Christ the Redeemer is a work of art whose meaning is linked to the religious imagination of Brazil. The Museum of Tomorrow is a museum of science in the city of Rio de Janeiro, Brazil. It was designed by the spanish neofuturistic architect Santiago Calatrava, and built near the waterfront in Pier Maua. Its construction was supported by the Roberto Marinho Foundation and cost about 230 millions reais. The building was opened on December 17, 2015.', 'Christ the Redeemer', 'Museum of Tomorrow'),
(2, 7, 27, 2, 'Chine', 3.87, 45.04, 'La Chine a l’une des quatre civilisations les plus anciennes du monde (avec les civilisations babylonienne, égyptienne, indienne). Cette civilisation a laissé une culture riche, unique et très ancrée, Mais, au-delà de cet héritage, le pays peut aussi se vanter de 3 600 ans d’Histoire écrite, d’un vaste territoire très varié qui est un atout inestimable pour le monde entier. Avec une culture très changeante de la nôtre dans tous les domaines, venez découvrir une cuisine, des habitants, des activités et des traditions que l’on ne risque pas de retrouver dans nos pays occidentaux.', 'Caché derrière un mur d’enceinte de plus de 3 400 mètres, le palais impérial fut construit sur un terrain de pas moins de 720 000 m². Considéré comme la plus grande construction de bois de chine, il ne mesure pas moins de 960 m de long et de 750 m de large, en outre il compte 999.5 pièces. Depuis sa construction en 1406, 24 empereurs ont eu l’honneur de vivre en son sein. Aujourd’hui, le Palais à laissé place à un musée. L\'Armée de terre cuite a été conçue dans le seul but d\'accompagner le Premier Empereur de Chine, dans son tombeau. Les milliers de statues de taille humaine et très réalistes évoquent l\'armée qui unifiera la Chine à la fin de la période des Royaumes Combattants', 'Palais Impérial', 'Armée de Terre Cuite', 'China', 'China has one of the four oldest civilizations in the world (along with the Babylonian, Egyptian and Indian civilizations). This civilization has left a rich, unique and deep-rooted culture, but beyond this heritage, the country can also boast of 3,600 years of written history, a vast and varied territory that is an invaluable asset for the whole world. With a culture that is very different from ours in all areas, come and discover a cuisine, inhabitants, activities and traditions that we are unlikely to find in our western countries.\n', 'Hidden behind a wall of more than 3 400 meters, the Imperial Palace was built on a land of not less than 720 000 m². Considered the largest wooden construction in China, it is no less than 960m long and 750m wide. In addition, it has 995.5 pieces. Since its construction in 1406, 24 emperors had the honor to live in it. Today, the Palace has given away to a museum. The Terracotta Army was designed for the sole purpose of accompanying the First Emperor of China to his tomb. The thousands of realistic, human-sized statues evoke the army that would unify China at the end of the Warring Kingdoms period.', 'Imperial Palace', 'Terracotta Army'),
(3, 8, 28, 3, 'Egypte', 3.88, 45.04, 'La culture et la coutume de l\'Egypte est vraiment cosmopolite, elle est la fusion d’énormément de cultures qui se sont entremêlées pour créer un véritable Melting Pot. Ici, on y trouve une attitude libérale, affichée dans le comportement amical des Égyptiens envers les étrangers et les touristes. Si on leur demande, les Egyptiens partageront toujours leur service et leur enthousiasme. La culture d\'Egypte immense les traditions, les langues, l\'histoire et les civilisations à des lieux anciens mélangeant coutumes et patrimoine.', 'Tombeau présumé du pharaon Khéops, la pyramide de Khéops fut édifiée il y a plus de 4 500 ans, sous la IVe dynastie égyptienne, au centre du complexe funéraire de Khéops se situant à Gizeh en Égypte. Considérée depuis l\'Antiquité comme la première des Sept merveilles du monde, elle n\'a cessé de fasciner. L\'un des plus grands mystères de la pyramide réside dans sa construction, dont les chercheurs n\'ont pas encore percé tous les secrets. Aux alentours de cette dernière, on retrouve Le grand sphinx de Gizeh. Avec son corps de lion et sa tête humaine, il représente Rê-Horakhty, une forme du puissant dieu solaire, et est l\'incarnation du pouvoir royal et le protecteur des portes du temple. Les énormes pattes enserrent une stèle où est consigné un rêve que fit Thoutmosis IV lorsqu\'il était prince, dans lequel le sphinx lui dit qu’il deviendrait roi s\'il le dégageait du sable.\r\n', 'Pyramide de Khéops', 'Le Sphinx', 'Egypt', 'The culture and tradition of Egypt is truly cosmopolitan. It is the fusion of many cultures which have been intertwined to create a real Melting Pot. Here we find a liberal attitude, displayed in the friendly behavior of Egyptians towards foreigners and tourists. If we ask them, Egyptians will always share their service and enthusiasm. The culture of Egypt has immense traditions, languages, history and civilizations to ancient places mixing traditions and heritage.', 'Presumed tomb of the pharaoh Khéops, the pyramid of Khéops was built more than 4 500 years ago, under the 4th Egyptian dynasty, in the center of the funerary complex of Kéops located in Gizeh in Egypt. Considered since Antiquity as the first of the Seven Wonders, she never ceased to fascinate. One of the biggest mysteries of the pyramid resides in its construction, which researchers have not yet discovered all of its secrets. Around this last one, we find the great sphinx of Giza. With its lion’s body and human’s head, he represents Rê-Horakhty, a form of solar god power, and is the incarnation of the royal power and the protector of the temple doors. The huge paws enclose a stele where is recorded a dream that made Thoutmosis IV when he was a prince, in which the sphinx tells him that he would become king if he would free him from the sand.\n', 'Pyramid of Khéops', 'The Sphinx'),
(4, 9, 29, 4, 'Grèce', 3.87385, 45.046, 'Pays d’art et de culture par excellence, la Grèce voit sa grandeur dans ses mythes, ses monuments et son histoire. Les voyages dans cette nation initiatrice de mouvements artistiques et culturels se révèlent mémorables pour les passionnés de culture. Entre cités antiques, temples, îles de charme, soyez complètement captivé et plongez dans le monde fabuleux de la Grèce.\r\n', 'Olympie est l\'un des grands centres religieux de la Grèce antique. Il est situé dans le Péloponnèse, en Élide, sur la rive droite du fleuve Alphée et au pied du mont Cronion. Le site d\'Olympie était dédié à Zeus. Pour honorer ce dieu, Olympie accueillait tous les quatre ans les jeux olympiques durant l\'Antiquité. Aujourd\'hui encore, la flamme olympique y est allumée quelques mois avant la cérémonie d\'ouverture des jeux modernes. Quant au temple d\'Athéna, construit entièrement en marbre pentélique entre 427 et 421 avant J.-C., se dresse sur une plate-forme de pierre de 6 mètres de haut qui s\'étend depuis l\'angle sud-ouest de l\'Acropole. Le temple a été la première structure ionique à être construite sur l\'Acropole. Il est dédié à Nikè, une forme d\'Athéna, qui est considérée comme la déesse de la Victoire dans la mythologie grecque.', 'Olympie', 'Temple d\'Athéna', 'Greece', 'Country of art and culture by excellence, Greece sees her greatness in its myths, its monuments and history. Trips in this nation of artistic and cultural movements are memorable for culture lovers. Between ancient cities, temples, charming islands, be completely captivated and dive into the fabulous world of Greece.\n', 'Olympia is one of the biggest religious centers of Ancient Greece. It is located in the Péloponnèse, in Elidea, on the right bank of the river Alpheus and at the foot of Mount Cronion. The site of Olympia was dedicated to Zeus. To honor this god, Olympia hosted every four years the Olympic games during Antiquity. Even today, the Olympic flame is lit there a few months before the opening ceremony of the modern games. As for the temple of Athena, built entirely of pentelic marble between 427 and 421 BC, stands on a 6 meter high stone platform that extends from the southwestern corner of the Acropolis. The temple was the first ionic structure to be built on the Acropolis. It is dedicated to Nikè, a form of Athena, who is considered as the goddess of Victory in Greek mythology.', 'Olympia', 'The Temple of Athena'),
(5, 10, 30, 5, 'Inde', 3.88402, 45.0416, 'Avec ses nombreuses couleurs, ses odeurs et ses saveurs, l’Inde est un dépaysement très fort pour le voyageur occidental. Elle surprend, elle déroute, elle enchante et choque même parfois. Les racines de la culture indienne sont profondément plantées, et il vous sera possible de les découvrir au Puy-En-Velay. Les temples hindous, les tapisseries orientales et les savoureux plats indiens sont autant d’éléments qui vous transporteront dans son passé et son histoire. Sans compter le culte autour d’un animal qui chez nous est tout à fait ordinaire, venez découvrir les spécificités de ce pays durant un week-end interculturel.', 'Monument à l’utilité plutôt incomprise, le Taj Mahal est en réalité le sanctuaire de la femme ‘favorite’ de l’empereur Shâh Jahân, Mumtaz Mahal. Sa construction dure de 1631 à 1648, au cours de laquelle plus de 22.000 esclaves travailleront pour réaliser une structure de marbre blanc haute de presque 75 mètres. L’empereur rejoindra sa femme à sa mort, en 1666. Il est considéré comme le joyau de l’architecture mongole, voire mondiale. A utilité religieuse cette fois-ci, le Temple de Mînâkshî est un temple hindou de style dravidien situé à Madurai dans le Tamil Nadu, en Inde. Il est un des chefs-d\'œuvre de l\'architecture dravidienne et l\'un des temples en activité les plus importants de l\'Inde. Il est consacré à Mînâkshî, un avatar de la déesse hindoue Parvati, l\'épouse de Shiva, ainsi qu\'à Shiva, sous sa forme Sundareshvara.\r\n', 'Taj Mahal', 'Temple de Mînâkshî', 'India', 'With its many colors, smells and flavors, India is a strong change of scenery for the Western traveler. It surprises, confuses, enchants and even shocks sometimes. The roots of Indian culture are deeply planted, and it will be possible for you to discover them in Puy-en-Velay. Hindu temples, orientales tapestries and tasty Indian dishes are many elements that will transport you into its past and history. Not to mention the cult around an animal that in our country is quite ordinary. Come discover the specificities of that country during this intercultural week-end.', 'Monument with a rather misunderstood utility, the Taj Mahal is in reality the shrine of the emperor Shâh Jahân’s favorite wife, Mumtaz Mahal. Its construction lasted from 1631 to 1648, During which more than 22.000 slaves will work to build a white marble structure almost 75 meters high. The emperor will join his wife at his death, in 1666. He is considered as the jewel of the mongolian architecture, even worldwide. This time for religious purposes, the Mînâkshî Temple is a Dravidian-style Hindu temple located in Madurai in Tamil Nadu, India. It is the masterpiece of Dravidian architecture and one of the most important active temples in India. It is dedicated to Mînâkshî, an avatar of the Hindu Goddess Parvati, the wife of Shiva, as well as Shiva, in his Sundareshvara form.\n', 'Taj Mahal', 'Temple of Mînâkshî');

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
(1, 'user_test', 'mdp_test'),
(3, 'ewan', '123'),
(4, 'hugo', '666'),
(5, 'emma', '234'),
(6, 'agathe la patate', 'agathe'),
(7, 'agathe', 'agathe'),
(8, 'test.', 'test.');

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
-- Index pour la table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id_code`);

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
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `mails`
--
ALTER TABLE `mails`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
