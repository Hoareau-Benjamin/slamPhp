    
    <?php
session_start();
if (empty($_SESSION)){
	header ('location:login.php');
	exit();
}
if (($_SESSION['type']==0) || $_SESSION['type']==1){
    header ('location:index.php');
}
?>
    
    
    
    
    <?php
       
        /**
 * Ouvrir une connexion via PDO pour créer un
 * nouvelle base de données avec une table structurée.
 *
 */
 $host       = "localhost";
 $username   = "ad_annuaire";
 $password   = "pwannuaire";
 $dbname     = "dbannuaire";
 $dsn        = "mysql:host=$host;dbname=$dbname";
 $tbl        = "employes";
 $options    = array(
                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
               );


try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
}

catch(PDOException $error) {
    echo 'error';
}

    $id = $_GET ['delete'];
    
    $connection ->query("DELETE FROM dbannuaire.employes WHERE id = $id ");


    



    

    header("Location: lire.php");
    



    ?>