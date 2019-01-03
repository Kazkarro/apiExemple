<?php

class EntreprisesManager extends Manager
{

    public function read($id){

        $sql = "SELECT * FROM entreprise WHERE ent_id = :id";
        $this->dbh = $this->cnx->prepare($sql);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_INT);

        $this->dbh->execute();
        $entreprise = $this->dbh->fetch();

        return $entreprise;

    }

    public function readAll(){
        /* $clientCollection = [];*/

        $sql = "SELECT * FROM entreprise";
        $results = $this->cnx->query($sql);
        $client = $results->fetchAll();

        return $client;

    }

    public function insert($nom,$siret, $dirigeant, $ville, $cp, $rue, $mail, $nbcommerciaux, $mdp){ // Fonction "POST"

        $sql = "INSERT INTO entreprise (ent_nom,ent_siret,ent_dirigeant,ent_ville,ent_cp,ent_rue,ent_mail,ent_nbcommerciaux,ent_mdp) VALUES(:nom,:siret,:dirigeant,:ville,:cp,:rue,:email,:nbcommerciaux,:mdp)"; // Requête SQL permettant l'insertion des donnéesdans la BDD
        $this->dbh = $this->cnx->prepare($sql); // Prépare la requeête

        $this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
        $this->dbh->bindValue(':siret',$siret,PDO::PARAM_STR);
        $this->dbh->bindValue(':dirigeant',$dirigeant,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':email',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':nbcommerciaux',$nbcommerciaux,PDO::PARAM_STR);
        $this->dbh->bindValue(':mdp',$mdp,PDO::PARAM_STR);

        $ok = $this->dbh->execute(); // Exécution de la requête

        if($ok){
            return true;
        }else{
            return false;
        }

    }

    public function update($id, $nom, $siret, $dirigeant, $ville, $cp, $rue, $mail, $nbcommerciaux, $mdp){ // NON FONCTIONNEL
        $sql = "UPDATE entreprise SET ent_nom=:nom, ent_siret=:siret, ent_dirigeant=:dirigeant, ent_ville=:ville, ent_cp=:cp,ent_rue=:rue,ent_mail=:mail, ent_nbcommerciaux=:nbcommerciaux, ent_mdp=:mdp WHERE ent_id = :id";
        $this->dbh = $this->cnx->prepare($sql);

        $this->dbh->bindValue(':id',$id,PDO::PARAM_STR);
        $this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
        $this->dbh->bindValue(':siret',$siret,PDO::PARAM_STR);
        $this->dbh->bindValue(':dirigeant',$dirigeant,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':mail',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':nbcommerciaux',$nbcommerciaux,PDO::PARAM_STR);
        $this->dbh->bindValue(':mdp',$mdp,PDO::PARAM_STR);

        $ok = $this->dbh->execute();

        if($ok){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){

        $sql = "DELETE FROM entreprise WHERE ent_id = :id";
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