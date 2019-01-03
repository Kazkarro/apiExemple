<?php

class FraisManager extends Manager
{
    public function read($id){

        $sql = "SELECT * FROM frais WHERE frais_id = :id";
        $this->dbh = $this->cnx->prepare($sql);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_INT);

        $this->dbh->execute();
        $frais = $this->dbh->fetch();

        return $frais;

    }

    public function readAll(){
        /* $clientCollection = [];*/

        $sql = "SELECT * FROM frais";
        $results = $this->cnx->query($sql);
        $frais = $results->fetchAll();

        return $frais;

    }

    public function insert($datef,$typef,$mission,$montantht,$montanttotal,$etat,$tvacat,$idcom){ // Fonction "POST"

        $sql = "INSERT INTO frais (frais_date,frais_type,frais_mission,frais_montantht,frais_montanttotal,frais_etat,tva_categorie,com_id)VALUES(:datef,:typef,:mission,:montantht,:montanttotal,:etat,:tvacat,:idcom)"; // Requête SQL permettant l'insertion des donnéesdans la BDD
        $this->dbh = $this->cnx->prepare($sql); // Prépare la requeête

        $this->dbh->bindValue(':datef',$datef,PDO::PARAM_STR);
        $this->dbh->bindValue(':typef',$typef,PDO::PARAM_STR);
        $this->dbh->bindValue(':mission',$mission,PDO::PARAM_STR);
        $this->dbh->bindValue(':montantht',$montantht,PDO::PARAM_STR);
        $this->dbh->bindValue(':montanttotal',$montanttotal,PDO::PARAM_STR);
        $this->dbh->bindValue(':etat',$etat,PDO::PARAM_STR);
        $this->dbh->bindValue(':tvacat',$tvacat,PDO::PARAM_STR);
        $this->dbh->bindValue(':idcom',$idcom,PDO::PARAM_STR);

        $ok = $this->dbh->execute(); // Exécution de la requête

        if($ok){
            return true;
        }else{
            return false;
        }

    }


    public function update($datef,$typef,$mission,$montantht,$montanttotal,$etat,$tvacat,$idcom,$id){ // NON FONCTIONNEL
        $sql = "UPDATE frais SET frais_date=:datef,frais_type=:typef, frais_mission=:mission, frais_montantht=:montantht,frais_montanttotal=:montanttotal, frais_etat=:etat, tva_categorie=:tvacat, com_id=:idcom WHERE frais_id = :id";
        $this->dbh = $this->cnx->prepare($sql);


        $this->dbh->bindValue(':datef',$datef,PDO::PARAM_STR);
        $this->dbh->bindValue(':typef',$typef,PDO::PARAM_STR);
        $this->dbh->bindValue(':mission',$mission,PDO::PARAM_STR);
        $this->dbh->bindValue(':montantht',$montantht,PDO::PARAM_STR);
        $this->dbh->bindValue(':montanttotal',$montanttotal,PDO::PARAM_STR);
        $this->dbh->bindValue(':etat',$etat,PDO::PARAM_STR);
        $this->dbh->bindValue(':tvacat',$tvacat,PDO::PARAM_STR);
        $this->dbh->bindValue(':idcom',$idcom,PDO::PARAM_STR);
        $this->dbh->bindValue(':id',$id,PDO::PARAM_STR);

        $ok = $this->dbh->execute();

        if($ok){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id)
    {

        $sql = "DELETE FROM frais WHERE frais_id = :id";
        $this->dbh = $this->cnx->prepare($sql);

        $this->dbh->bindValue(':id', $id, PDO::PARAM_INT);

        $ok = $this->dbh->execute();

        if ($ok) {
            return true;
        } else {
            return false;
        }

    }

}