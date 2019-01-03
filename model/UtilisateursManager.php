<?php

class UtilisateursManager extends Manager
{

    public function read($id){

        $sql = "SELECT * FROM utilisateur WHERE com_id = :id";
        $this->dbh = $this->cnx->prepare($sql);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_INT);

        $this->dbh->execute();
        $user = $this->dbh->fetch();

        return $user;

    }

    public function readAll(){

        $sql = "SELECT * FROM utilisateur";
        $results = $this->cnx->query($sql);
        $user = $results->fetchAll();

        return $user;

    }


    public function insert($statut,$mdp,$nom,$prenom,$rue,$cp,$ville,$sexe,$num,$mail,$entid){ // Fonction "POST"

        $sql = "INSERT INTO utilisateur (user_statut,com_mdp,com_nom,com_prenom,com_rue,com_cp,com_ville,com_sexe,com_num,com_mail,ent_id)VALUES(:statut,:mdp,:nom,:prenom,:rue,:cp,:ville,:sexe,:num,:mail,:entid)"; // Requête SQL permettant l'insertion des donnéesdans la BDD
        $this->dbh = $this->cnx->prepare($sql); // Prépare la requeête


        $this->dbh->bindValue(':statut',$statut,PDO::PARAM_STR);
        $this->dbh->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
        $this->dbh->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':sexe',$sexe,PDO::PARAM_STR);
        $this->dbh->bindValue(':num',$num,PDO::PARAM_STR);
        $this->dbh->bindValue(':mail',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':entid',$entid,PDO::PARAM_STR);

        $ok = $this->dbh->execute(); // Exécution de la requête

        if($ok){
            return true;
        }else{
            return false;
        }

    }


    public function update($id, $statut,$mdp,$nom,$prenom,$rue,$cp,$ville,$sexe,$num,$mail,$entid){ // NON FONCTIONNEL
        $sql = "UPDATE utilisateur SET user_statut=:statut,com_mdp=:mdp,com_nom=:nom,com_prenom=:prenom,com_rue=:rue,com_cp=:cp,com_ville=:ville,com_sexe=:sexe,com_num=:num,com_mail=:mail,ent_id=:entid  WHERE com_id=:id";
        $this->dbh = $this->cnx->prepare($sql);

        $this->dbh->bindValue(':statut',$statut,PDO::PARAM_STR);
        $this->dbh->bindValue(':mdp',$mdp,PDO::PARAM_STR);
        $this->dbh->bindValue(':nom',$nom,PDO::PARAM_STR);
        $this->dbh->bindValue(':prenom',$prenom,PDO::PARAM_STR);
        $this->dbh->bindValue(':rue',$rue,PDO::PARAM_STR);
        $this->dbh->bindValue(':cp',$cp,PDO::PARAM_STR);
        $this->dbh->bindValue(':ville',$ville,PDO::PARAM_STR);
        $this->dbh->bindValue(':sexe',$sexe,PDO::PARAM_STR);
        $this->dbh->bindValue(':num',$num,PDO::PARAM_STR);
        $this->dbh->bindValue(':mail',$mail,PDO::PARAM_STR);
        $this->dbh->bindValue(':entid',$entid,PDO::PARAM_STR);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_STR);

        $ok = $this->dbh->execute();

        if($ok){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id){

        $sql = "DELETE FROM utilisateur WHERE com_id = :id";
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