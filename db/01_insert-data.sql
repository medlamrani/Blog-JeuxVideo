INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'utilisateur');

INSERT INTO `user` (`id`, `role_id`, `username`, `name`, `lastname`, `email`, `password`) VALUES
(1, 1, 'Haydara', 'Mohamed', 'Lamrani', 'haydara@gmail.com', '$2y$10$ENaqeR6BxxBKIn5.Cv3jeukNePv64/UvIeIAIxC64T4Z4/ouTAli2'),
(2, 2, 'Jordan23', 'M', 'Jordan', 'mjordan23@gmail.com', '$2y$10$aMihRw5c7TA8mXqoOfp0QO.L.CdPy7jN47AJfnm5oL5hSwX6jNMfW'),
(4, 2, 'KBryant24', 'Koby', 'Bryant', 'kb24@gmail.com', '$2y$10$rbtkpKWLNATrxxeVc/5Bje.42VAiesAA3zu7cIiWp/UCM1Axvq.GG');

INSERT INTO `platform` (`id`, `platform_name`) VALUES
(1, 'Playstation '),
(2, 'XBOX'),
(3, 'PC'),
(4, 'Nintendo');

INSERT INTO `editor` (`id`, `editor_name`) VALUES
(1, 'Electronics Arts'),
(2, 'Blizzard'),
(3, 'Ubisoft'),
(4, 'Bethesda');

INSERT INTO `game` (`id`, `name`, `resume`, `platform_id`, `editor_id`, `release_date`) VALUES
(1, 'NBA 2K21', 'Simulation de basket\r\n', 1, 1, '2020-09-04'),
(4, 'Fifa 21 ', 'Jeu de sport', 1, 1, '2020-10-10'),
(5, 'Fifa 21 ', 'Jeu de sport', 1, 1, '2020-10-10'),
(6, 'Fortnite', 'battle', 1, 1, '2020-09-10'),
(7, 'Game', 'safsafas cascascasca csac ascas cas s acsac ', 1, 1, '2020-09-09'),
(8, 'Harry Potter', 'Monde des sorciers ', 1, 1, '2021-01-02');

INSERT INTO `news` (`id`, `user_id`, `title`, `content`, `addDate`, `updateDate`) VALUES
(1, 1, 'Mon article', 'test', '2020-09-01 20:50:58', '2020-09-01 20:50:58'),
(2, 1, 'Mon article de test', 'Articlos', '2020-09-05 12:07:43', '2020-09-05 12:07:43');


INSERT INTO `comment_game` (`id`, `game_id`, `user_id`, `content`, `report`, `commentDate`) VALUES
(1, 7, 4, 'Great Game', 0, '2020-09-16 13:32:31'),
(2, 1, 4, 'comment', 1, '2020-09-20 15:18:48'),
(3, 1, 4, 'comment', 0, '2020-09-20 15:18:59'),
(4, 1, 4, 'magique', 0, '2020-09-20 15:44:27');

INSERT INTO `comment_news` (`id`, `news_id`, `user_id`, `content`, `report`, `commentDate`) VALUES
(1, 1, 4, 'MachaAllah', 0, '2020-09-16 13:32:31'),
(2, 1, 4, 'comment', 0, '2020-09-18 18:16:21'),
(3, 1, 4, 'good job', 0, '2020-09-20 12:44:06'),
(4, 1, 4, 'Nice', 0, '2020-09-20 12:44:44'),
(5, 1, 4, 'Commented', 0, '2020-09-20 12:45:23'),
(6, 2, 1, 'test', 0, '2020-09-21 19:46:35'),
(7, 2, 1, 'test', 0, '2020-09-21 19:47:14'),
(8, 2, 1, 'test 2', 0, '2020-09-21 19:48:36'),
(9, 2, 1, 'test', 0, '2020-09-21 19:50:10');

INSERT INTO `rating` (`game_id`, `user_id`, `rate`) VALUES
(8, 1, 4),
(4, 2, 5),
(5, 2, 5),
(7, 2, 5),
(6, 4, 3);



