<?php

require_once 'connexionDB.php';

class employe extends ConnexionDB  {

	public function getAllEmploye() {
        return $this->cnx->query("SELECT * FROM employes")->fetchAll();
	}

	public function getEmploye($id) {
		$sql = $this->cnx->prepare("SELECT * FROM employes WHERE id=?");
		$sql->execute( array($id) );
		return $sql->fetch();
	}

	public function add($empl)
	{  	
		$sql = $this->cnx->prepare("INSERT INTO employes (prenom,nom,email,age,ville) 
		VALUES (?,?,?,?,?)");
			/*var_dump($sql);
			echo "<br><br>";
			var_dump($empl);r
			exit;*/
		$sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville']) );
	
		return $sql->rowCount();
	}






	public function add2($empl)
	{  	
		$sql = $this->cnx->prepare("INSERT INTO employes (pseudo,mdp,\type,genre,prenom,nom,email,age,ville) 
		VALUES (?,?,?,?,?,?,?,?,?)");
		
		$sql->execute( array($empl['pseudo'],$empl['mdp'],$empl['type'],$empl['genre'],$empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville']) );
		
		return $sql->rowCount();
	}





	public function edit($empl,$id)
	{
		$sql = $this->cnx->prepare("UPDATE employes 
                                    SET prenom=?,nom=?,email=?,age=?,ville=? 
                                    WHERE id=?");
        $sql->execute( array($empl['prenom'],$empl['nom'],$empl['email'],$empl['age'],$empl['ville'],$id) );
		return $sql->rowCount();
	}

	public function delete($id)
	{
		$sql = $this->cnx->prepare("DELETE FROM employes WHERE id = ?");
		$sql->execute( array($id) );
		return $sql->rowCount();
	}
}