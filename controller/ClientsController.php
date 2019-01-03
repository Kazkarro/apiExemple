<?php

class ClientsController extends RestController
{

    public function executeGet() // Récupère les clients dans la base de données
    {
        $clientsManager = new ClientsManager(); // Appel du client manager

        if($this->param){ // Si il y'a un paramètre
            $clients = $clientsManager->read($this->param); // On affiche le client correspondant à l'id
        }else{ // Sinon
            $clients = $clientsManager->readAll(); // On affiche tous les clients
        }

        echo json_encode($clients); // Transforme les données récupérées en JSON

    }

    public function executePost(){

        $clientsManager = new ClientsManager(); // Appel du client Manager
        

        if(isset($_POST['id'])) {
            $clientsManager->update($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['entreprise'], $_POST['num'], $_POST['mail'], $_POST['rue'], $_POST['cp'], $_POST['ville'], $_POST['idcom']); // Récupère les données envoyé avec POST
        }else{
            $clientsManager->insert($_POST['nom'],$_POST['prenom'],$_POST['entreprise'],$_POST['num'],$_POST['mail'],$_POST['rue'],$_POST['cp'],$_POST['ville'],$_POST['idcom']);
        }
    }



    public function executeDel()
    {
        $clientsManager = new ClientsManager(); // Appel du client Manager

        $clientsManager->delete($this->param);



    }

}