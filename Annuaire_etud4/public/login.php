


<?php
try  {

        require "../config.php";
        require "../common.php";

        $connection = new PDO($dsn, $username, $password, $options);

    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }

?>
    <form action="" method="post">
    <label for="POST-username">Nom d'utilisateur : </label>
    <input type="text" name="pseudo">
    <br>
    <label for="POST-password">Mot de passe : </label>
    <input type="password" name="mdp">
    <br>
    <input type="submit" value="Connexion" name="login">
</form>

<?php

if (isset($_POST['login'])){
    $user = $_POST["pseudo"];
    $mdp = $_POST["mdp"];

    $sql = "SELECT id, pseudo, mdp  FROM dbannuaire.employes WHERE pseudo = '$user' and mdp = '$mdp'";

    $result = $connection->query($sql);

    //$id = $result->fetchColumn();
    //$type_compte = $result->fetchColumn($sql);

    //echo $sql;

    //$values = $result->fetchAll(PDO::FETCH_ASSOC);
    //$id = $values[0]['id'];
    //$type = $values[0]['genre'];

    //$nbr=$result->rowCount();
    //echo "nbr = $nbr";
  //  echo "type = $id";

  //  echo "type = $type";

    //if ($nbr == 1){
      //  session_start();

      //  $_SESSION['id'] = $id;
      //  $_SESSION['pseudo'] = $user;
      //  $_SESSION['genre'] = $type;
      //  echo 'Vous êtes connecté !';
        header ('location: index.php');


    }

    else {
        echo '<script>
        alert("Mauvais identifiant ou mot de passe !");
    </script>';
    }





        /*$isPasswordCorrect = password_verify($mdp, $password);
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['pseudo'] = $pseudo;
            echo 'Vous êtes connecté !';
            header ('location: index.php');
            exit;
        }
        else {
            echo '<script>
            alert("Mauvais identifiant ou mot de passe !");
        </script>';
        }*/







?>
