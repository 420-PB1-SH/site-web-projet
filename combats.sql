CREATE TABLE `stats` (
  `nom` varchar(500) NOT NULL,
  `nombre_victoires` int(11) NOT NULL,
  `nombre_defaites` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

ALTER TABLE `stats`
  ADD PRIMARY KEY (`nom`);
