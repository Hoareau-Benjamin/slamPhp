<?php
//session_start();
//if (empty($_SESSION)){
	//header ('location:login.php');
	//exit();
//}
?>




<?php

/**
 * Fonction pour interroger les informations en fonction du
 * paramètre: ville
 *
 */

//if (isset($_POST['submit'])) {
    try  {
        
        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

        $sql = "SELECT * 
                FROM employes";

        $statement = $connection->prepare($sql);
        $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
        $statement->execute();

        $result = $statement->fetchAll();
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
//}
?>
<?php require "templates/header.php"; ?>
        
<?php  
//if (isset($_POST['submit'])) {
    if ($result && $statement->rowCount() > 0) { ?>
        <h2>Liste des employés</h2>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>genre</th>
                    <th>Pseudo</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Adresse mail</th>
                    <th>Age</th>
                    <th>ville</th>
                    <th>Date</th>
                    <th>  </th>
                    <th> 
                    <form method="POST">
                    <input type="submit" name="supprimer" value="Supprimer">
                    </th>
                    
                   
                </tr>
            </thead>
            <tbody>
            
        <?php foreach ($result as $row) { ?>

            
            <tr>
                
                <td><?php echo escape($row["id"]); ?></td>
                <td><?php echo escape($row["genre"]); ?></td>
                <td><?php echo escape($row["pseudo"]); ?></td>
                <td><?php echo escape($row["prenom"]); ?></td>
                <td><?php echo escape($row["nom"]); ?></td>
                <td><?php echo escape($row["email"]); ?></td>
                <td><?php echo escape($row["age"]); ?></td>
                <td><?php echo escape($row["ville"]); ?></td>
                <td><?php echo escape($row["date"]); ?> </td>
                
                <?php if (($_SESSION['type']==2) || ($_SESSION['type']==1)) : ?>
                    <td><a class="text-secondary" href="update.php?update=<?= $row['id']; ?>" >Modifier</a></td>
                <?php endif; ?>
                <?php if ($_SESSION['type']==2) : ?>
                <td><a class="text-danger" href="delete.php?delete=<?= $row['id']; ?>" >Supprimer</a></td>

                <!-- <td><a href="update.php?update=<?//= $row["id"] ?>">Modifier</a></td>
                <td><a href="delete.php?delete=<?//= $row["id"] ?>">Supprimer</a></td> -->
                
                <td><input type="checkbox" name="del[]" value="<?php echo $row['id']; ?>"/></td>
                
                <?php endif; ?>
            </tr>
            
       
       
       
       </tbody>
    </table>
    
    
    </form>
    
    
    <?php } else { ?>
        <blockquote>Aucun résultat trouvé pour <?php echo escape($_POST['ville']); ?>.</blockquote>
    <?php } 
} ?> 

<h2>Liste des employés</h2>

<form method="post">

    <label for="ville">ville</label>
    <input type="text" id="ville" name="ville">
    <input type="submit" name="submit" value="Voir les résultats">
</form>


<!-- supprimer checkbox -->

<?php 
if (isset($_POST['supprimer'])){
    if (isset($_POST['del'])){
        $box = $_POST['del'];

        $check = count($box);

        for ($i=0; $i< $check; $i++){

            $id = $row['id'];
            $key = $box[$i];
            $req = ("DELETE FROM dbannuaire.employes WHERE id = '$key'");
            $connection ->query($req);
            

        }

    }
    header("Location: lire.php");
}


?>


<a href="index.php">Retour</a>

<?php require "templates/footer.php"; ?>



