<?php

spl_autoload_register('autoloadController');
spl_autoload_register('autoloadEntity');
spl_autoload_register('autoloadModel');

function autoloadController($className){
    $classDir = dirname(__FILE__).'/controller/'.$className.'.php';
    if(file_exists($classDir)){
        require_once ($classDir);
    }else{
    
    }
}

function autoloadEntity($className){
    $classDir = dirname(__FILE__).'/entity/'.$className.'.php';
    if(file_exists($classDir)){
        require_once ($classDir);
    }else{
      
    }
}

function autoloadModel($className){
    $classDir = dirname(__FILE__).'/model/'.$className.'.php';
    if(file_exists($classDir)){
        require_once ($classDir);
    }else{
       
    }
}