-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 03 fév. 2020 à 22:54
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`post_id`, `title`, `date_posted`, `user_id`, `image_dir`, `content`) VALUES
(13, 'Blog post 2', '2020-02-02 19:44:14', 5, 'img.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.\r\n\r\n'),
(14, 'Blog post 1', '2020-02-02 19:44:07', 4, 'img.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),
(20, 'Blog post 3', '2020-02-02 19:42:16', 4, 'img.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.'),
(21, 'Blog post 4', '2020-02-02 19:45:33', 4, '20_Elon_Musk.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sagittis est a varius fermentum. Fusce feugiat sollicitudin convallis. Etiam elementum, lectus non euismod venenatis, elit purus egestas lorem, non fermentum enim elit eu diam. Cras ut nulla interdum, porta purus ac, aliquam mi. Nullam vitae mauris iaculis felis aliquet dignissim. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Vestibulum orci lacus, sodales ut nisl id, mollis condimentum leo. Pellentesque eleifend sodales velit eu ornare. Etiam sit amet magna sit amet sapien varius mattis. Vivamus sollicitudin turpis commodo erat condimentum hendrerit. Nullam lacinia viverra neque, eu consequat lacus eleifend quis. Mauris in pulvinar justo, in fermentum neque. Maecenas tellus diam, consectetur eu urna in, dignissim elementum eros. Mauris sit amet velit nec urna suscipit volutpat. Nam interdum, libero a mattis consectetur, odio tortor pulvinar ante, sollicitudin euismod velit leo eget risus. Phasellus quis augue non tellus convallis dictum in id risus. Cras efficitur lorem sit amet luctus ultricies. Mauris vel dignissim lorem, id tincidunt lorem. Duis dictum, nisl et sagittis tincidunt, arcu metus rhoncus risus, suscipit tincidunt orci risus id purus. Etiam sit amet mauris ac tellus gravida dictum. Donec nulla dolor, rhoncus pretium mauris at, semper auctor enim. Aenean venenatis imperdiet blandit. Ut nec quam dolor. Sed dignissim odio a venenatis luctus. Nulla maximus nunc sed orci porttitor convallis. Quisque in massa eu tellus dignissim consectetur. Nam efficitur quam et dui mollis blandit.');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `redactor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `admin`, `redactor`) VALUES
(4, 'Loick', 'test@lol.fr', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 1, 1),
(5, 'Romane', 'lol2@test.fr', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 1),
(6, 'Thomas', 'lol3@test.fr', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
