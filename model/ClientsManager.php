<?php

Class ClientsManager extends Manager {


	public function read($id){

	    $sql = "SELECT * FROM client WHERE cli_id = :id";
	    $this->dbh = $this->cnx->prepare($sql);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_INT);

        $this->dbh->execute();
        $client = $this->dbh->fetch();

        return $client;

    }

	public function readAll(){

	    $sql = "SELECT * FROM client";
        $results = $this->cnx->query($sql);
        $client = $results->fetchAll();

        return $client;

    }

	public function insert($nom,$prenom,$entreprise,$num,$mail,$rue,$cp,$ville,$idcom){ // Fonction "POST"

		$sql = "INSERT INTO client (cli_nom,cli_prenom,cli_entreprise,cli_num,cli_mail,cli_rue,cli_cp,cli_ville,com_id)VALUES(:nom,:prenom,:entreprise,:num,:mail,:rue,:cp,:ville,:idcom)"; // Requête SQL permettant l'insertion des donnéesdans la BDD
		$this->dbh = $this->cnx->prepare($sql); // Prépare la requête

		$this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
		$this->dbh->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $this->dbh->bindValue(':entreprise',$entreprise,PDO::PARAM_STR);
        $this->dbh->bindValue(':num',$num,PDO::PARAM_STR);
        $this->dbh->bindValue(':mail',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':idcom',$idcom,PDO::PARAM_STR);

		$ok = $this->dbh->execute(); // Exécution de la requête

		if($ok){
			return true;
		}else{
			return false;
		}

	}


	public function update($id,$nom,$prenom,$entreprise,$num,$mail,$rue,$cp,$ville,$idcom){ // NON FONCTIONNEL
        $sql = "UPDATE client SET cli_nom=:nom,cli_prenom=:prenom,cli_entreprise=:entreprise, cli_num=:num, cli_mail=:mail, cli_rue=:rue, cli_cp=:cp, cli_ville=:ville, com_id=:idcom WHERE cli_id = :id";
        $this->dbh = $this->cnx->prepare($sql);

        $this->dbh->bindValue(':id',$id,PDO::PARAM_STR);
        $this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
        $this->dbh->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $this->dbh->bindValue(':entreprise',$entreprise,PDO::PARAM_STR);
        $this->dbh->bindValue(':num',$num,PDO::PARAM_STR);
        $this->dbh->bindValue(':mail',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':idcom',$idcom,PDO::PARAM_STR);


        $ok = $this->dbh->execute();

        if($ok){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){

        $sql = "DELETE FROM client WHERE cli_id = :id";
        $this->dbh = $this->cnx->prepare($sql);

        $this->dbh->bindValue(':id',$id,PDO::PARAM_INT);

        $ok = $this->dbh->execute();

        if($ok){
            return true;
        }else{
            return false;
        }


    }


}