<?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
if ($_SESSION['type']==0){
    header ('location:index.php');
}
?>


<?php


/**
 * Utilisez un formulaire HTML pour créer une nouvelle entrée
 * dans la table des utilisateurs.
 *
 */


if (isset($_POST['submit'])) {
    require "../config.php";
    require "../common.php";

    try  {
        $connection = new PDO($dsn, $username, $password, $options);

        $new_user = array(
            "pseudo"     => $_POST['pseudo'],
            "mdp"       => $_POST['mdp'],
            "genre"     => $_POST['genre'],
            "prenom"    => $_POST['prenom'],
            "nom"       => $_POST['nom'],
            "email"     => $_POST['email'],
            "age"       => $_POST['age'],
            "ville"     => $_POST['ville']
        );

        $sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "employes",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user))
        );

        $statement = $connection->prepare($sql);
        $statement->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>

<?php require "templates/header.php"; ?>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <blockquote><?php echo $_POST['prenom']; ?> a été ajouté avec succès.</blockquote>
<?php } ?>

<h2>Ajouter un employé</h2>

<form method="post">
    <SELECT name="genre" size="1">
    <OPTION>M.
    <OPTION>Mme.
    <OPTION>Mlle.
    <OPTION>Non.Bin
    </SELECT>

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" required>
    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" id="mdp" required>
     <label for="prenom">Prénom</label>
    <input type="text" name="prenom" id="prenom" required>
    <label for="nom">Nom</label>
    <input type="text" name="nom" id="nom" required>
    <label for="email">Adresse mail</label>
    <input type="text" name="email" id="email">
    <label for="age">Age</label>
    <input type="text" name="age" id="age">
    <label for="ville">ville de résidence</label>
    <input type="text" name="ville" id="ville">
    <br><br>
    <input type="submit" name="submit" value="Ajouter">
    <br><br>

     <select name="type" id="type">
        <option value=0>Utilisateur</option>
        <option value=1>Admin</option>
        <?php if ($_SESSION['type']==2) : ?>
        <option value=2>Super Admin</option>
        <?php endif; ?>
        
    </select>
</form>

<a href="index.php">Retour</a>

<?php require "templates/footer.php"; ?>
