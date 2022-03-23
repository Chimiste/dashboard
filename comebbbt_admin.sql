-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 23 mars 2022 à 14:53
-- Version du serveur :  10.2.43-MariaDB
-- Version de PHP : 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `comebbbt_admin`
--

-- --------------------------------------------------------

--
-- Structure de la table `reporting`
--

CREATE TABLE `reporting` (
  `id` int(11) NOT NULL,
  `name` varchar(66) NOT NULL,
  `type_violence` varchar(66) NOT NULL,
  `phone_victime` varchar(66) NOT NULL,
  `phone_violeur` varchar(66) NOT NULL,
  `pieces` varchar(66) NOT NULL,
  `location` varchar(66) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `type_violences`
--

CREATE TABLE `type_violences` (
  `id` int(11) NOT NULL,
  `violence` varchar(66) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_violences`
--

INSERT INTO `type_violences` (`id`, `violence`, `description`) VALUES
(1, 'La violence physique', 'Elle suppose une agression physique ou une tentative d’agression du partenaire — coups et blessures, coups de pied et coups de poing, brûlures, tirage par les cheveux, gifles, pincements, morsures, etc. — en refusant l’accès aux soins médicaux ou en obligeant à la consommation d’alcool et/ou de drogues, ou en utilisant tout type de force physique. Elle entraîne aussi parfois des dégâts matériels.'),
(2, 'La violence verbale', 'le fait de prôner, de promouvoir ou d’encourager, sous quelque forme que ce soit, le dénigrement, la haine ou la diffamation d’une personne ou d’un groupe de personnes, ainsi que le harcèlement, l’injure, les stéréotypes négatifs, la stigmatisation et la menace envers une personne ou un groupe de personnes et la justification de tous les types précédents d’expression au motif de la « race »8, de la couleur, de l’origine familiale, nationale ou ethnique, de l’âge, du handicap, de la langue, de la religion ou des convictions, du sexe, du genre, de l’identité de genre, de l’orientation sexuelle et d’autres caractéristiques personnelles ou de statu'),
(3, 'La violence psychologique', 'Elle consiste à provoquer de la peur par l’intimidation ; à menacer de se nuire à soi-même, à son partenaire ou à ses enfants, à détruire des biens, voire des animaux de compagnie ; à jouer un « jeu psychologique » ou manipulateur ; ou à obliger à l’isolement de la personne, en la privant de voir ses amis, sa famille, d’aller à l’école ou au travail.'),
(4, 'La violence sexuelle ', 'Elle consiste à forcer un partenaire à prendre part à un acte sexuel sans son consentement.'),
(5, 'La violence socioéconomique', 'Elle consiste à rendre (ou tenter de rendre) une personne financièrement dépendante en maintenant un contrôle total sur ses ressources financières, en refusant l’accès à l’argent et/ou en lui interdisant d’aller à l’école ou de travailler.'),
(6, 'Violence émotionnelle', 'Elle consiste à miner le sentiment d’estime de soi d’une personne par le biais de critiques constantes, à la déconsidérer en minimisant ses capacités, à la traiter de tous les noms ou à proférer des menaces verbales, à nuire à la relation du partenaire avec ses enfants ou encore à ne pas le/la laisser voir ses amis et/ou sa famille.'),
(7, 'harcèlement (sexuel)', 'toute forme de comportement non désiré, verbal, non verbal ou physique, à caractère sexuel, ayant pour objet ou pour effet de violer la dignité d’une personne, en particulier lorsque ce comportement crée un environnement intimidant, hostile, dégradant, humiliant ou offensan'),
(8, 'Les mariages forcés', 'Le mariage d’enfants désigne tout type de mariage où l’un des conjoints ou les deux sont âgés de moins de 18 ans. Il est contraire à la Déclaration universelle des droits de l’homme, qui énonce : « Le mariage ne peut être conclu qu’avec le libre et plein consentement des futurs époux ». Les filles sont plus susceptibles d’être mariées alors qu’elles ne sont encore que des enfants et, par conséquent, d’être forcées d’abandonner l’école en s’exposant à d’autres formes de violence.'),
(9, 'Les mutilations génitales féminines', 'Les mutilations génitales féminines (MGF) font référence à des procédures destinées à altérer délibérément les organes génitaux féminins ou à causer des lésions pour des raisons qui ne sont pas médicales. Elles sont classées en quatre grandes catégories, et tant les pratiques que les motivations qui les sous-tendent varient d’un pays à un autre. Les MGF résultent de normes sociales, souvent considérées comme une étape nécessaire à la préparation des filles pour leur mariage et leur entrée dans l’âge adulte ; elles sont généralement motivées par des croyances anciennes sur le genre et ce qui doit être son expression sexuelle appropriée'),
(10, 'L’avortement et la stérilisation forcés', ''),
(11, 'Violence en ligne ou numérique', 'La violence en ligne ou violence numérique, à l’égard des femmes en particulier, désigne tout acte de violence commis, assisté ou aggravé par l’utilisation des technologies de l’information et de la communication (téléphones mobiles, Internet, médias sociaux, jeux informatiques, messagerie de texte, courriels, etc.) simplement parce qu’elles sont des femmes.'),
(12, 'Traite des êtres humains', 'La traite des êtres humains est l’acquisition et l’exploitation de personnes, par divers moyens tels que la force, la fraude, la coercition ou la tromperie. Ce crime odieux piège des millions de femmes et de filles dans le monde, dont beaucoup finissent par être sexuellement exploitées.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `name` varchar(100) NOT NULL COMMENT 'name',
  `email` varchar(100) NOT NULL COMMENT 'email',
  `password` varchar(100) NOT NULL COMMENT 'password',
  `status` int(11) NOT NULL COMMENT '1= admin, 2 = user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='users auth list';

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'bacar said', 'admin@gmail.com', '$2y$10$8dlAcuYkPiUl92yWgUCne.j9XDniGXgLO9XlNml0SR1.iu8BRtCEG', 1, '2022-03-21 17:51:45'),
(2, 'bacar said', 'admin1@gmail.com', '$2y$10$/KgK0j1mU1Or712URqnEFuBbsWbjOxNAdMou/gMpu/R3VRkcHEndi', 1, '2022-03-21 17:53:54'),
(3, 'bacar said', 'admin3@gmail.com', '$2y$10$0pNz8xIVm8qy78XtMivNEeQxoI/duysGX.XsBvQ45Pf8m029/ZFkC', 1, '2022-03-21 17:55:14'),
(4, 'kari ali', 'user1@gmail.com', '$2y$10$QD552bkGnmLHRt0YukARw.A7ErzMR4n/w7ic7Do5uNOSi0hFb.KIy', 2, '2022-03-21 18:07:38');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `type_violences`
--
ALTER TABLE `type_violences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
