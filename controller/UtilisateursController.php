<?php

class UtilisateursController extends RestController
{

    public function executeGet() // Récupère les clients dans la base de données
    {
        $userManager = new UtilisateursManager(); // Appel du client manager

        if($this->param){ // Si il y'a un paramètre
            $users = $userManager->read($this->param); // On affiche le client correspondant à l'id
        }else{ // Sinon
            $users = $userManager->readAll(); // On affiche tous les clients
        }

        echo json_encode($users); // Transforme les données récupérées en JSON

    }

    public function executePost(){

        $userManager = new UtilisateursManager(); // Appel du client Manager

        if(isset($_POST['id'])) {

            $userManager->update($_POST['id'],$_POST['statut'],$_POST['mdp'],$_POST['nom'],$_POST['prenom'],$_POST['rue'],$_POST['cp'],$_POST['ville'],$_POST['sexe'],$_POST['num'],$_POST['mail'],$_POST['entid']); // Récupère les données envoyé avec POST

        }else{
            $userManager->insert($_POST['statut'],$_POST['mdp'],$_POST['nom'],$_POST['prenom'],$_POST['rue'],$_POST['cp'],$_POST['ville'],$_POST['sexe'],$_POST['num'],$_POST['mail'],$_POST['entid']); // Récupère les données envoyé avec POST
        }


    }

    public function executePut(){ // NON FONCTIONNEL

        $userManager = new UtilisateursManager(); // Appel du client Manager

        $userManager->update($_POST['id'], $_POST['nom'],$_POST['prenom'],$_POST['entreprise'],$_POST['num'],$_POST['mail'],$_POST['rue'],$_POST['cp'],$_POST['ville'],$_POST['idcom']); // Récupère les données envoyé avec POST

    }

    public function executeDel() // NON FONCTIONNEL
    {
        $userManager = new UtilisateursManager(); // Appel du client Manager

        $userManager->delete($this->param);
    }

}