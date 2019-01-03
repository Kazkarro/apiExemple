<?php
// Chargement des parametres
require_once ('../params.php');

// Chargement des parametres
require_once ('../autoload.php');


// Controller par defaut
$defaultController = 'Hello';



// Morceau de l'url qui nous interesse
$urlRewrite = str_replace(__URLBASE,'',$_SERVER['REQUEST_URI']);


// Si il y a une url différente de index
if(strlen($urlRewrite)>=1){

    // Tableau des parametres de l'url
    $urlParams = explode("/",$urlRewrite);

    if(count($urlParams)>=1){
        $controllerName = ucfirst($urlParams[0]).'Controller';
    }

    if(count($urlParams)>=2){
        $controllerParam = $urlParams[1];
    }
}else{
    $controllerName =  ucfirst($defaultController).'Controller';
}


// Chargement du controller
if($controllerName){

        if(isset($controllerParam)){
            $controller = new $controllerName($controllerParam);
        }else{
            $controller = new $controllerName();
        }


}



