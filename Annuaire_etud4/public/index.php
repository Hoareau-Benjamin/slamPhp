<?php
//session_start();
//if (empty($SESSION)){
	//header("Location: login.php");
//exit();

//}
?>

 <?php
include "templates/header.php"; ?>

<!--
<ul>
	<li><a href="../install.php"><strong>Installer</strong></a> - Installer la base de données</li>
	<li><a href="create.php"><strong>Créer</strong></a> - Ajouter un employé</li>
	<li><a href="lire.php"><strong>Lire</strong></a> - Afficher les employés</li>
</ul>
-->

	<div class="list-group">
		<ul>
			<?php if ($_SESSION['type']==2) : ?>
				<a class="list-group-item list-group-item-action list-group-item-primary" href="../install.php"><strong> - Installer la base de données</strong></a></li>
			<?php endif; ?>
			<?php if (($_SESSION['type']==2) || ($_SESSION['type']==1)) : ?>
				<a class="list-group-item list-group-item-action list-group-item-light" href="create.php"><strong> - Ajouter un employé</strong></a></li>
			<?php endif; ?>
			<a class="list-group-item list-group-item-action list-group-item-primary" href="lire.php"><strong> - Afficher les employés</strong></a></li>
		</ul>
	</div>

<form action="" method="post">
    <input type="submit" value="Déconnexion" name="logout">
</form>
<?php 
	if ($_SESSION['type']==1) {
		echo "Admin";
	} 
	elseif ($_SESSION['type']==2) {
		echo "SuperAdmin";
	}
	else {
		echo "Utilisateur";
	}

?>

<?php
if (isset($_POST['logout'])) {
	session_unset();
	session_destroy();
	header ('location: index.php');
}
?>


<?php include "templates/footer.php"; ?>
