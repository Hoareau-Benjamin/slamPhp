<?php
session_start();
if (empty($SESSION)){
	header("Location: login.php");
exit();

}
include "templates/header.php"; ?>

<ul>
	<li><a href="../install.php"><strong>Installer</strong></a> - Installer la base de données</li>
	<li><a href="create.php"><strong>Créer</strong></a> - Ajouter un employé</li>
	<li><a href="lire.php"><strong>Lire</strong></a> - Afficher les employés</li>
</ul>

<?php include "templates/footer.php"; ?>
