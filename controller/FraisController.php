<?php

class FraisController extends RestController
{
    public function executeGet() // Récupère les clients dans la base de données
    {
        $fraisManager = new FraisManager(); // Appel du client manager

        if($this->param){ // Si il y'a un paramètre
            $frais = $fraisManager->read($this->param); // On affiche le client correspondant à l'id
        }else{ // Sinon
            $frais = $fraisManager->readAll(); // On affiche tous les clients
        }

        echo json_encode($frais); // Transforme les données récupérées en JSON

    }

    public function executePost(){

        $fraisManager = new FraisManager(); // Appel du client Manager

        if(isset($_POST['id'])) {
            $fraisManager->update($_POST['datef'],$_POST['typef'],$_POST['mission'],$_POST['montantht'],$_POST['montanttotal'],$_POST['etat'],$_POST['tvacat'],$_POST['idcom'], $_POST['id']);
        }else{
            $fraisManager->insert($_POST['datef'],$_POST['typef'],$_POST['mission'],$_POST['montantht'],$_POST['montanttotal'],$_POST['etat'],$_POST['tvacat'],$_POST['idcom']);
        }



    }

    public function executeDel()
    {
        $fraisManager = new FraisManager(); // Appel du client Manager

        $fraisManager->delete($this->param);



    }
}