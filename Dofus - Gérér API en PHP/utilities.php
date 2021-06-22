<?php

function Statistiques($data){
    for($i = 0; $i < count($data["statistics"]); $i++){// On compte le nombre d'elements qu'il y a dans statistics
        foreach($data["statistics"][$i] as $key => $value){// On crée un foreach pour envoyer la Statistique ($key) et sa valeur ($value['min'] et $value['max])
        echo $key." : [min :".$value['min']."]  [max :".$value['max']."] <br />";
    };
    };
}

function Recettes($data){
    for($i = 0; $i < count($data["recipe"]); $i++){// on compte le nombre d'element qu'il y a dans le tableau recipe
        foreach($data["recipe"][$i] as $key => $value){
        echo "<img src=".$value['imgUrl'].">";
        echo "<a href='ressources.phtml?id=".$value['ankamaId']."'>".$key."</a><br />";
        echo "Type :".$value['type']."<br />";
        echo "Level :".$value['level']."<br />";
        echo "Quantité :".$value['quantity']."<br />";
        echo "<br><br>";
    };
    };
}

function calculStatistique(){

    
    for($i = 0 ; $i < count($_SESSION['equipement']['id']); $i++){//compte le nom d'element qu'il y a dans la session'id'
    
        if($_SESSION['equipement']['type'][$i] == "Familier"){//Si l'on retrouve Familier dans le tableau type alors on va sur l'url des pets sinon celle des equipements
                $datas = file_get_contents('https://fr.dofus.dofapi.fr/pets/'.$_SESSION['equipement']['id'][$i]);// Fais appel à l'API sur une URL
                $objet = json_decode($datas, TRUE);
                
                for($j = 0; $j < count($objet["statistics"]); $j++){//compte le nombre d'element qu'il ya dans statistique
       
                    foreach($objet["statistics"][$j] as $key => $value){
                        
                        $TypeObjet = array_key_exists($key, $NomStatistique);//vérifie si la clé existe dans le tableau $NomStatistique
                        
                        if($TypeObjet == false ){//Si la clé n'y est pas alors on l'ajoute dans le tableau
                            $NomStatistique[$key] = $value;//Ajouter les clé et les valeurs au seins d'un même tableau dans une boucle
        
                        }
                
                        else{//si elle n'existe pas on crée un nouveau tableau temporaire auquel on y ajoute les valeurs
                          
                        $test[$key] = $value;
                        $NomStatistique[$key]['min'] += $test[$key]['min']; // on additionne les values et les ajoute dans la clé déjà existante
                        $NomStatistique[$key]['max'] += $test[$key]['max'];
                        
                        }
        
                    };
                };
            }

        else{
            $datas = file_get_contents('https://fr.dofus.dofapi.fr/equipments/'.$_SESSION['equipement']['id'][$i]);// Fais appel à l'API sur une URL
            $objet = json_decode($datas, TRUE); 

            for($j = 0; $j < count($objet["statistics"]); $j++){//compte le nombre d'element qu'il ya dans statistique
       
                foreach($objet["statistics"][$j] as $key => $value){
                    
                    $TypeObjet = array_key_exists($key, $NomStatistique);//vérifie si la clé existe dans le tableau $NomStatistique
                    
                    if($TypeObjet == false ){//Si la clé n'y est pas alors on l'ajoute dans le tableau
                        $NomStatistique[$key] = $value;//Ajouter les clé et les valeurs au seins d'un même tableau dans une boucle
    
                    }
            
                    else{//si elle n'existe pas on crée un nouveau tableau temporaire auquel on y ajoute les valeurs
                      
                    $test[$key] = $value;//test est un tableau temporaire
                    $NomStatistique[$key]['min'] += $test[$key]['min']; // on additionne les values et les ajoute dans la clé déjà existante
                    $NomStatistique[$key]['max'] += $test[$key]['max'];
                    
                    }
    
                };
            };
        } 
    };
    // On sort de la boucle for pour ne pas répéter le foreach en dessous

    foreach($NomStatistique as $key => $value){ //On crée un foreach sur le tableau contenant les clés et les valeurs calculées et on les affiches
        echo $key." : [min :".$NomStatistique[$key]['min']."]  [max :".$NomStatistique[$key]['max']."] <br />";
    }
};

?>