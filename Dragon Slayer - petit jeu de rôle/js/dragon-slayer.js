'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* **************************************** DONNEES JEU **************************************** */
/*************************************************************************************************/



/*************************************************************************************************/
/* *************************************** FONCTIONS JEU *************************************** */
/*************************************************************************************************/
/*Avertissement commentaire*/

/*************************************************************************************************/
/* ************************************** CODE PRINCIPAL *************************************** */
/*************************************************************************************************/

/************FONCTION LANCER DE DES**************************/
function getRandomInteger(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function ThrowDices(Des, cote){
  let sum = 0;
   for(let index = 1; index <= Des; index++)
   {
       /*cote = Math.floor(Math.random() * (cote)) + 1;*/
       sum += getRandomInteger(1, cote);
   }
   return sum;
}



/***************Choix de la difficulté*********************/
function requestInteger(message, min, max)
{
    var integer;
do
{
    integer = parseInt(window.prompt(message));
}
while(isNaN(integer) == true || integer < min || integer > max);

return integer;
}

let PVdragon = 0;
let PVJoueur = 0;

let PVdragonini = 0;
let PVJoueurini = 0;

function Etat(){
    
        if (PVdragon <= (PVdragonini * 30 /100) && PVJoueur <= (PVJoueurini * 30 /100)){
            document.write('<div class="game-state"><figure class="game-state_player"><img src="images/knight-wounded.png" alt="Chevalier"><figcaption><progress max='+ PVJoueurini +' value=' + PVJoueur + '></progress>'+PVJoueur+'</figcaption></figure><figure class="game-state_player"><img src="images/dragon-wounded.png" alt="Dragon"><figcaption><progress max='+ PVdragonini +' value=' + PVdragon + '></progress>'+PVdragon+'</figcaption></figure></div>')
        }else if (PVdragon <= (PVdragonini * 30 /100)){
            document.write('<div class="game-state"><figure class="game-state_player"><img src="images/knight.png" alt="Chevalier"><figcaption><progress max='+ PVJoueurini +' value=' + PVJoueur + '></progress>'+PVJoueur+'</figcaption></figure><figure class="game-state_player"><img src="images/dragon-wounded.png" alt="Dragon"><figcaption><progress max='+ PVdragonini +' value=' + PVdragon + '></progress>'+PVdragon+'</figcaption></figure></div>')
        }else if (PVJoueur <= (PVJoueurini * 30 /100)){
            document.write('<div class="game-state"><figure class="game-state_player"><img src="images/knight-wounded.png" alt="Chevalier"><figcaption><progress max='+ PVJoueurini +' value=' + PVJoueur + '></progress>'+PVJoueur+'</figcaption></figure><figure class="game-state_player"><img src="images/dragon.png" alt="Dragon"><figcaption><progress max='+ PVdragonini +' value=' + PVdragon + '></progress>'+PVdragon+'</figcaption></figure></div>')
        }else{
            document.write('<div class="game-state"><figure class="game-state_player"><img src="images/knight.png" alt="Chevalier"><figcaption><progress max='+ PVJoueurini +' value=' + PVJoueur + '></progress>'+PVJoueur+'</figcaption></figure><figure class="game-state_player"><img src="images/dragon.png" alt="Dragon"><figcaption><progress max='+ PVdragonini +' value=' + PVdragon + '></progress>'+PVdragon+'</figcaption></figure></div>')
        }
    }

let Difficulte = requestInteger("Choisissez votre difficulté: Facile = 1, Normal = 2, Difficile = 3", 1, 3 );



switch(Difficulte){
    case 1:
        PVdragon = 100 + ThrowDices(5, 10);
        PVJoueur = 100 + ThrowDices(10, 10);
        PVdragonini = PVdragon;
        PVJoueurini = PVJoueur;
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du joueur sont à " + PVJoueur)
        Etat();
        break;
    case 2 : 
        PVdragon = 100 + ThrowDices(10, 10);
        PVJoueur = 100 + ThrowDices(10, 10);
        PVdragonini = PVdragon;
        PVJoueurini = PVJoueur;
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du joueur sont à " + PVJoueur)
        Etat();
        break;
    case 3 :
        PVdragon = 100 + ThrowDices(10, 10);
        PVJoueur = 100 + ThrowDices(7, 10);
        PVdragonini = PVdragon;
        PVJoueurini = PVJoueur;
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du joueur sont à " + PVJoueur)
        Etat();
        break;
}

/***********************************LES CLASSES***************************/

let Classe = requestInteger("Quel classe voulez-vous joué ? 1. Chevalier , 2. Voleur , 3.Mage",1 , 3);

/*****************************LE COMBAT******************************/

let Tour = 1;

function Combat(){

console.log("******************TOUR N°"+Tour+"*******************");

/*****************VALEUR PAR DEFAUT********************/
var dragonInitiative = Math.round(ThrowDices(10, 6));
var JoueurInitiative = Math.round(ThrowDices(10, 6));

var JoueurAttaque = Math.round(ThrowDices(3, 6));
var DragonAttaque = Math.round(ThrowDices(3, 6));

/*****************MODE FACILE**************************/
let DegatDragonEasy = Math.round(DragonAttaque - (DragonAttaque * ThrowDices(2, 6) / 100));
let PVJoueurEasy =  Math.round(PVJoueur - DegatDragonEasy);
let DegatJoueurEasy = Math.round(JoueurAttaque + (JoueurAttaque * ThrowDices(2, 6) / 100 ));

/*****************MODE DIFFICILE***********************/
let DegatDragonHard =  Math.round(DragonAttaque + (DragonAttaque * ThrowDices(1, 6) / 100));
let PVJoueurHard = Math.round(PVJoueur - DegatDragonHard);
let DegatJoueurHard = Math.round(JoueurAttaque - (JoueurAttaque * ThrowDices(1, 6) / 100 ));


    function JournalJoueur(){
        if (Difficulte = 1){
            document.write('<figure class="game-round"><img src="images/knight-winner.png" alt="Chevalier vainqueur"><figcaption>Vous êtes le plus rapide, vous attaquez le dragon et lui infligez '+ DegatJoueurEasy +' points de dommage !</figcaption></figure>')
        }else if(Difficulte = 3){
            document.write('<figure class="game-round"><img src="images/knight-winner.png" alt="Chevalier vainqueur"><figcaption>Vous êtes le plus rapide, vous attaquez le dragon et lui infligez '+ DegatJoueurHard +' points de dommage !</figcaption></figure>')
        }else{
            document.write('<figure class="game-round"><img src="images/knight-winner.png" alt="Chevalier vainqueur"><figcaption>Vous êtes le plus rapide, vous attaquez le dragon et lui infligez '+ JoueurAttaque +' points de dommage !</figcaption></figure>')
        }
    }
    function JournalDragon(){
        if(Difficulte = 1){
            document.write('<figure class="game-round"><img src="images/dragon-winner.png" alt="Dragon vainqueur"><figcaption>Le dragon prend linitiative, vous attaque et vous inflige '+ DegatDragonEasy +' points de dommage !</figcaption></figure>')
        }else if (Difficulte = 3){
            document.write('<figure class="game-round"><img src="images/dragon-winner.png" alt="Dragon vainqueur"><figcaption>Le dragon prend linitiative, vous attaque et vous inflige ' + DegatDragonHard + ' points de dommage !</figcaption></figure>')
        }else{
            document.write('<figure class="game-round"><img src="images/dragon-winner.png" alt="Dragon vainqueur"><figcaption>Le dragon prend linitiative, vous attaque et vous inflige ' + DragonAttaque + ' points de dommage !</figcaption></figure>')
        }
    }

    switch(Classe){
        case 1 :/*Chevalier*/
            console.log("Le dragon a une attaque initiale de "+DragonAttaque)
            DragonAttaque = Math.round(DragonAttaque - (DragonAttaque * ThrowDices(1, 10) / 100));
            console.log("Le chevalier réduit les dégat du dragon et subit " + DragonAttaque + " de dégâts")
            break;

        case 2 :/*Voleur*/
           console.log("Le voleur a une vitesse initiale de "+JoueurInitiative)
           JoueurInitiative = Math.round(JoueurInitiative + (JoueurInitiative * ThrowDices(1, 6)/100));
           console.log("La vitesse du voleur passe a " + JoueurInitiative);
            break;

        case 3 :/*Mage*/
            console.log("Le mage a une attaque de base de " + JoueurAttaque);
            JoueurAttaque = Math.round(JoueurAttaque + (JoueurAttaque * (ThrowDices(1, 10)/100)));
            console.log("le Mage a augmenté ses dégâts à " + JoueurAttaque );
            break;
    }
    
    

    switch(Difficulte){
        case 1 : 
        if(JoueurInitiative >= dragonInitiative){
            console.log("Le joueur a l'initiative il frappe le premier");
                PVdragon = Math.round( PVdragon - DegatJoueurEasy);
                console.log("Le joueur inflige " + DegatJoueurEasy + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);
                JournalJoueur();
                Etat();

            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVJoueur = PVJoueurEasy;
                console.log("Le dragon inflige " + DegatDragonEasy + " de dégâts au joueur");
                console.log("Les PV du joueur tombe à " + PVJoueur);
                JournalDragon();
                Etat();
        }       
            break;

        case 2 :
            if(JoueurInitiative >= dragonInitiative){
                console.log("Le joueur a l'initiative il frappe le premier");
                PVdragon = Math.round (PVdragon - JoueurAttaque);
                console.log("Le joueur inflige " + JoueurAttaque + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);
                JournalJoueur();
                Etat();
            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVJoueur = Math.round(PVJoueur - DragonAttaque);
                console.log("Le dragon inflige " + DragonAttaque + " de dégâts au joueur")
                console.log("Les PV du joueur tombe à " + PVJoueur);
                JournalDragon();
                Etat();
            }
            break;

        case 3 :
            if(JoueurInitiative >= dragonInitiative){
                console.log("Le joueur a l'initiative il frappe le premier");            
                PVdragon = PVdragon - DegatJoueurHard;
                console.log("Le joueur inflige " + DegatJoueurHard + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);
                JournalJoueur();
                Etat();
            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVJoueur = PVJoueurHard;
                console.log("Le dragon inflige " + DegatDragonHard);
                console.log("Les PV du joueur tombe à " + PVJoueur);
                JournalDragon();
                Etat();
            }
            break;           
    }       
}



while(PVdragon >= 0 || PVJoueur >= 0){
    document.write('<h3>Tour n°'+ Tour +'</h3>')
    Combat();
    if(PVdragon <= 0){
        console.log("Le joueur à battu le dragon")
        console.log("Vous avez gagné")
        document.write('<div class="game-state"><figure class="game-state_player"><img src="images/dragon-wounded.png" alt="Dragon battu"><figcaption>Game Over</figcaption></figure><figure class="game-state_player"><img src="images/knight-winner.png" alt="Chevalier vainqueur"><figcaption>You win</figcaption></figure></div>')
        document.write('<footer><h3>Fin de la partie</h3><figure class="game-end"><figcaption>Vous avez gagné le combat, le chevalier a eu la tête du dragon !</figcaption><img src="images/knight-winner.png" alt="Chevalier vainqueur"></figure></footer></div>')
    break;
    }else if (PVJoueur <= 0){
        console.log("Le dragon à battu le joueur");
        console.log("Vous avez perdu");
        document.write('<div class="game-state"><figure class="game-state_player"><img src="images/knight-wounded.png" alt="Chevalier battu"><figcaption>Game Over</figcaption></figure><figure class="game-state_player"><img src="images/dragon-winner.png" alt="Dragon vainqueur"><figcaption>You win</figcaption></figure></div>')
        document.write('<footer><h3>Fin de la partie</h3><figure class="game-end"><figcaption>Vous avez perdu le combat, le dragon vous a carbonisé !</figcaption><img src="images/dragon-winner.png" alt="Dragon vainqueur"></figure></footer></div>')
    break;
    }
    Tour++;
}
