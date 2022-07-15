-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 15 juil. 2022 à 16:28
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
-- Base de données : `exercice1`
--

-- --------------------------------------------------------

--
-- Structure de la table `criteres_evaluations`
--

CREATE TABLE `criteres_evaluations` (
  `id` int(11) NOT NULL,
  `label` varchar(100) DEFAULT NULL,
  `content` text NOT NULL,
  `type` varchar(20) NOT NULL,
  `id_theme` int(11) DEFAULT NULL,
  `id_metier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `criteres_evaluations`
--

INSERT INTO `criteres_evaluations` (`id`, `label`, `content`, `type`, `id_theme`, `id_metier`) VALUES
(1, 'Esprit d\'analyse', 'J\'analyse les problèmes pour y trouver des solutions\r\nCapacité de réfléchir et de faire montre de logique et de jugement face à des décisions, d\'évaluer des problèmes ou des situations en faisant les recherches nécessaires et en analysant les différentes composantes', 'theme', NULL, 4),
(2, 'Curiosité intellectuelle', 'Je suis curieux intellectuellement pour ce qui touche à mon métier\r\nCapacité d\'ouvrir son champ de connaissance, d\'avoir l\'esprit ouvert, d\'acquérir continuellement de nouvelles connaissances et d\'apprendre de ses expériences antérieures', 'theme', NULL, 4),
(3, 'Autonomie', 'Je mène ma barque.\r\nCapacité de se prendre en charge, selon ses responsabilités, de façon à poser des actions au moment opportun dans un contexte déterminé', 'theme', NULL, 4),
(4, 'Acceptation de la critique', 'J\'accepte les commentaires dans le but d\'améliorer mon travail.\r\nCapacité de recevoir des commentaires et des remarques dans le but d\'améliorer son travail', 'theme', NULL, 4),
(5, 'Sens de l\'organisation', 'Je planifie, prépare et organise mon travail pour respecter les échéances.\r\nCapacité de gérer efficacement et rationnellement son travail et de planifier les tâches à effectuer dans un délai prescrit\r\n', 'theme', NULL, 4),
(6, 'Motivation', 'Je suis enthousiaste dans la réalisation de mes tâches.\r\nCapacité d\'avoir de l\'énergie et de la vitalité et à afficher intérêt et enthousiasme face à une tâche professionnelle\r\n', 'theme', NULL, 4),
(7, NULL, 'Je me fie à mon instinct et je commence à travailler sans réflexion', 'option', 1, 4),
(8, NULL, 'Je consulte le web à la recherche d\'une solution toute faite. Je fais appel à quelqu\'un pour m\'aider.', 'option', 1, 4),
(9, NULL, 'Je décompose un problème en sous-éléments en utilisant un schéma. Je consulte différentes ressources & documentations pour parvenir à une solution.', 'option', 1, 4),
(10, NULL, 'J\'anticipe les évolutions futures et organise les problèmes. J\'évalue de manière réaliste mes limites et le temps nécessaire.', 'option', 1, 4),
(11, NULL, 'J\'évite d\'utiliser des choses inconnues et je reste sur mes acquis.', 'option', 2, 4),
(12, NULL, 'Je découvre des nouveautés lorsqu\'elles se présentent à moi. Je pose des questions à mes pairs en fonction des besoins.', 'option', 2, 4),
(13, NULL, 'Je me tiens au courant des dernières nouveautés dans mon domaine. Je fais preuve de sens critique, j\'établis des liens.', 'option', 2, 4),
(14, NULL, 'Je fais des recherches et me lance des défis en dehors de mon temps de travail \"officiel\" (hackathons, challenges…)', 'option', 2, 4),
(15, NULL, 'Je ne m\'implique pas face à l\'énoncé d\'un problème ou je n\'ose pas poser de questions et m\'enferme dans mon coin.', 'option', 3, 4),
(16, NULL, 'Je me repose énormément sur les autres. Je perturbe ou ralenti constamment le groupe.', 'option', 3, 4),
(17, NULL, 'Je me débrouille par moi-même mais j\'ai besoin que l\'on valide mes choix et me donne des directives bien ciblées.', 'option', 3, 4),
(18, NULL, 'Je me documente et avance dans mon travail en toute autonomie. Je gère mon temps et trouve ma position dans l\'équipe.', 'option', 3, 4),
(19, NULL, 'Je considère mon travail avec suffisance. Je n\'accepte pas la critique. Je fais preuve de susceptibilité.', 'option', 4, 4),
(20, NULL, 'Je ne prends pas les critiques personnellement et questionne mes pairs, mais je suis persuadé que ma solution est la meilleure.', 'option', 4, 4),
(21, NULL, 'J\'écoute les critiques avec réserve. Je reconnais que j\'ai à apprendre des autres et je modifie mon travail en fonction.', 'option', 4, 4),
(22, NULL, 'Je participe à des \"revues de codes\" et suis à l\'écoute de toute suggestion pour m\'améliorer. Je sais aussi défendre mes propositions.', 'option', 4, 4),
(23, NULL, 'J\'organise mes ressources avec pragmatisme au fur et à mesure de mon travail.', 'option', 5, 4),
(24, NULL, 'Je commente mon code et j\'organise mes fichiers de manière cohérente et standard.', 'option', 5, 4),
(25, NULL, 'Je priorise les tâches, je décompose et établis un planning réaliste. J\'utilise des méthodes de travail collaboratif (Agile..)', 'option', 5, 4),
(26, NULL, 'J\'utilise des outils de versioning de manière collaborative. Je documente mon travail.', 'option', 5, 4),
(27, NULL, 'Je ne prends pas de plaisir dans mon travail. Je rechigne à la tâche et m\'absente volontiers.', 'option', 6, 4),
(28, NULL, 'Je mets de l\'énergie à la tâche mais je n\'éprouve pas de réel plaisir.', 'option', 6, 4),
(29, NULL, 'J\'approche le travail avec positivité et j\'éprouve du plaisir à la réalisation de projets.', 'option', 6, 4),
(30, NULL, 'Je suis passionné, je partage mes connaissances avec d\'autres et j\'aide volontiers.', 'option', 6, 4);

-- --------------------------------------------------------

--
-- Structure de la table `fonctions`
--

CREATE TABLE `fonctions` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonctions`
--

INSERT INTO `fonctions` (`id`, `name`) VALUES
(1, 'secrétaire'),
(2, 'stagiaire');

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(10) NOT NULL,
  `id_metier` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `formateur` varchar(50) NOT NULL,
  `id_lieu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `id_metier`, `name`, `start_date`, `formateur`, `id_lieu`) VALUES
(3, 4, 'Web design FRONT-END', '2023-06-09', 'Pierre', 1),
(4, 1, 'Illustrator', '2022-09-05', 'Inconnu', 3),
(5, 4, 'Web design FRONT-END', '2024-06-07', 'Pierre', 1),
(6, 1, 'formation de test', '2030-01-01', 'Roger', 4);

-- --------------------------------------------------------

--
-- Structure de la table `ge`
--

CREATE TABLE `ge` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_metier` int(11) NOT NULL,
  `id_theme_1` int(11) NOT NULL,
  `id_option_1` int(11) NOT NULL,
  `id_theme_2` int(11) NOT NULL,
  `id_option_2` int(11) NOT NULL,
  `id_theme_3` int(11) NOT NULL,
  `id_option_3` int(11) NOT NULL,
  `id_theme_4` int(11) NOT NULL,
  `id_option_4` int(11) NOT NULL,
  `id_theme_5` int(11) NOT NULL,
  `id_option_5` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `inscriptions`
--

CREATE TABLE `inscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_formation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `inscriptions`
--

INSERT INTO `inscriptions` (`id`, `id_user`, `id_formation`) VALUES
(1, 2, 3),
(2, 3, 4);

-- --------------------------------------------------------

--
-- Structure de la table `lieux`
--

CREATE TABLE `lieux` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lieux`
--

INSERT INTO `lieux` (`id`, `name`) VALUES
(1, 'Cepegra'),
(3, 'Bruxelles'),
(4, 'Namur');

-- --------------------------------------------------------

--
-- Structure de la table `metiers`
--

CREATE TABLE `metiers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `metiers`
--

INSERT INTO `metiers` (`id`, `name`) VALUES
(1, 'infographie'),
(4, 'web design');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_fonction` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `name`, `email`, `password`, `register_date`, `id_fonction`) VALUES
(2, 'Quentin', 'Devillers', 'devi.quentin@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', '2022-07-15 09:24:22', 2),
(3, 'Luc', 'Janson', 'luc.janson@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', '2022-07-15 11:24:19', 2),
(4, 'Bernad', 'Dokk', 'dokk.bernard@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', '2022-07-15 11:24:55', 1),
(6, 'Quentin2', 'Devillers2', 'devi.quentin.2@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', '2022-07-15 13:36:07', 2),
(7, 'Homer', 'Simpson', 'homer.simpson@gmail.com', 'a722c63db8ec8625af6cf71cb8c2d939', '2022-07-15 13:45:14', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `criteres_evaluations`
--
ALTER TABLE `criteres_evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `metier` (`id_metier`),
  ADD KEY `theme` (`id_theme`);

--
-- Index pour la table `fonctions`
--
ALTER TABLE `fonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `place` (`id_lieu`) USING BTREE,
  ADD KEY `id_metier` (`id_metier`);

--
-- Index pour la table `ge`
--
ALTER TABLE `ge`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_formation` (`id_formation`);

--
-- Index pour la table `lieux`
--
ALTER TABLE `lieux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `metiers`
--
ALTER TABLE `metiers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fonction` (`id_fonction`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `criteres_evaluations`
--
ALTER TABLE `criteres_evaluations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `fonctions`
--
ALTER TABLE `fonctions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ge`
--
ALTER TABLE `ge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `lieux`
--
ALTER TABLE `lieux`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `metiers`
--
ALTER TABLE `metiers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `criteres_evaluations`
--
ALTER TABLE `criteres_evaluations`
  ADD CONSTRAINT `metier` FOREIGN KEY (`id_metier`) REFERENCES `metiers` (`id`),
  ADD CONSTRAINT `theme` FOREIGN KEY (`id_theme`) REFERENCES `criteres_evaluations` (`id`);

--
-- Contraintes pour la table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `id_metier` FOREIGN KEY (`id_metier`) REFERENCES `metiers` (`id`),
  ADD CONSTRAINT `id_place` FOREIGN KEY (`id_lieu`) REFERENCES `lieux` (`id`);

--
-- Contraintes pour la table `inscriptions`
--
ALTER TABLE `inscriptions`
  ADD CONSTRAINT `id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `id_fonction` FOREIGN KEY (`id_fonction`) REFERENCES `fonctions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;