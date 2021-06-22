<?php

session_start();

$ID = $_GET["id"];
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

function isVerrouille(){
    if(isset($_SESSION['equipement']) && $_SESSION['equipement']['verrou']){
        return true;

    }else{
        return false;
    }
}

function supprimerArticle($ID){
   //Si le panier existe
   if (creationEquipement() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['id'] = array();
      $tmp['type'] = array();
      $tmp['verrou'] = $_SESSION['equipement']['verrou'];

      $Nombreelement = count($_SESSION['equipement']['id']);
      
      for($i = 0; $i < $Nombreelement; $i++)
      {
         if ($_SESSION['equipement']['id'][$i] != $ID)
         {  
            array_push( $tmp['id'],$_SESSION['equipement']['id'][$i]);
            array_push( $tmp['type'],$_SESSION['equipement']['type'][$i]);
         }
    
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['equipement'] =  $tmp;
      //On efface notre panier temporaire
     
     
    unset($tmp);
     header("location: equipement.phtml");
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

supprimerArticle($ID);


?>