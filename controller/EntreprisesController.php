<?php

class EntreprisesController extends RestController
{

    public function executeGet() // Récupère les clients dans la base de données
    {
        $entreprisesManager = new EntreprisesManager(); // Appel du client manager

        if($this->param){ // Si il y'a un paramètre
            $entreprises = $entreprisesManager->read($this->param); // On affiche le client correspondant à l'id
        }else{ // Sinon
            $entreprises = $entreprisesManager->readAll(); // On affiche tous les clients
        }

        echo json_encode($entreprises); // Transforme les données récupérées en JSON

    }

    public function executePost(){

        $entreprisesManager = new EntreprisesManager(); // Appel du client Manager

        if(isset($_POST['id'])) {
            $entreprisesManager->update($_POST['id'],$_POST['nom'],$_POST['siret'],$_POST['dirigeant'],$_POST['ville'],$_POST['cp'],$_POST['rue'],$_POST['mail'],$_POST['nbcommerciaux'],$_POST['mdp']); // Récupère les données envoyé avec POST
        }else{
            $entreprisesManager->insert($_POST['nom'],$_POST['siret'],$_POST['dirigeant'],$_POST['ville'],$_POST['cp'],$_POST['rue'],$_POST['mail'],$_POST['nbcommerciaux'],$_POST['mdp']); // Récupère les données envoyé avec POST
        }

    }


    public function executeDel()
    {
        $entreprisesManager = new EntreprisesManager(); // Appel du client Manager

        $entreprisesManager->delete($this->param);
    }


}