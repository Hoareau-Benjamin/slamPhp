INSERT INTO employes (prenom,nom,email,age,ville) 
		VALUES ( "lol", "lo", "lo@gmail.com", "45","loville")


CREATE TABLE `employes` (
  `id` int(11) UNSIGNED NOT NULL,
  `pseudo` varchar(155) NOT NULL,
  `mdp` varchar(155) NOT NULL,
  `type` int(3) NOT NULL,
  `genre` varchar(20) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `employes`
--

INSERT INTO `employes` (`id`, `pseudo`, `mdp`, `type`, `genre`, `prenom`, `nom`, `email`, `age`, `ville`, `date`) VALUES
(2, 'Pseudo', 'mdp', 1, 'M.', 'Prenom', 'Nom', 'email@email.com', 18, 'coinville', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;