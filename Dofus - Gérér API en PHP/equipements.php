<?php

session_start();

$datas = file_get_contents('https://fr.dofus.dofapi.fr/equipments/'.$_POST["id"]);// Fais appel à l'API sur une URL

$objet = json_decode($datas, TRUE);

$ID = $objet['_id'];
$Type = $objet['type'];



function creationEquipement(){
    if(!isset($_SESSION['equipement'])){
        $_SESSION['equipement'] = array();
        $_SESSION['equipement']['id'] = array();
        $_SESSION['equipement']['type'] = array();
        $_SESSION['equipement']['verrou'] = false;
    }

    return true;
}

function ajouterUnObjet($id, $type){
    // Si le panier existe
    if(creationEquipement() && !isVerrouille()){

        //si le type est déjà existant

        $TypeObjet = array_search($type, $_SESSION['equipement']['type']);

        if($TypeObjet !== false){

            echo "Vous avez déjà un objet du même type dans votre équipement.";  
        }

        else{
           array_push($_SESSION['equipement']['id'], $id);
           array_push($_SESSION['equipement']['type'], $type);

           echo "L'objet a été ajouté dans votre équipement.";
        }

    }
    else{
        echo "Un problème est survenu veuillez contacter l'administrateur du site.";
    }
}

function isVerrouille(){
    if(isset($_SESSION['equipement']) && $_SESSION['equipement']['verrou']){
        return true;

    }else{
        return false;
    }
}

function CompterObjets(){
    if(isset($_SESSION['equipement'])){
       $NombreObjet = count($_SESSION['equipement']['id']);
        if($NombreObjet >= 7){
            echo "Votre équipement est complet";
        }
    }
}

creationEquipement();
CompterObjets();
ajouterUnObjet($ID, $Type);

?>