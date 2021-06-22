'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* *********************************** FONCTIONS UTILITAIRES *********************************** */
/*************************************************************************************************/


/*
  https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Math/random
  La fonction Math.random() renvoie un nombre flottant pseudo-aléatoire compris dans l'intervalle [0, 1[ (ce qui signifie que 0 est compris dans l'intervalle mais que 1 en est exclu)

  Ce nombre peut ensuite être multiplié afin de couvrir un autre intervalle.
  Nota : Dans l'exemple correspondant, on ramène min/max à une valeur entière
    min = 5.2 -> 6
    max = 8.3 -> 8

  https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Math/floor
  La fonction Math.floor(x) renvoie le plus grand entier qui est inférieur ou égal à un nombre x.

  Math.floor(5.95) -> 5

  https://developer.mozilla.org/fr/docs/Web/JavaScript/Reference/Objets_globaux/Math/ceil
  La fonction Math.ceil() retourne le plus petit entier supérieur ou égal au nombre donné.

  Math.ceil(7.004) -> 8
*/

'use strict';   // Mode strict du JavaScript

/*************************************************************************************************/
/* *********************************** FONCTIONS UTILITAIRES *********************************** */
/*************************************************************************************************/

/*
  Objectif de la fonction

  Eviter une demande de saisie libre sujette à erreurs et compliquée à tester
  La fonction doit pouvoir être utilisée pour n'importe quel besoin

    Proposer à l'utilisateur de saisir un réponse parmi celles attendues

      -> Demander à l'utilisateur de choisir une valeur parmi celles proposées dans le message affiché par prompt()
      -> Tant que l'utilisateur ne saisit pas une des valeurs attendues, représenter le prompt

    Le plus simple est donc que les valeurs soit des nombres entiers, chaque nombre correspondant à un choix explicite, affiché dans le message

    En fonction du la demande, le nombre de réponses possibles peut varier
    Nous savons tester si la réponse est un nombre,
    Reste à voir si ce nombre fait partie des valeurs attendues
      Une piste : les intervalles

  La fonction doit prendre en paramètre :
  Le message affichant les choix correspondants à un nombre à saisir
  L'intervalle entre le numéro du premier chiox et celui du dernier

  Si la valeur est un entier et que cet entier est compris dans l'intervalle, la saisie est correcte !

*/

/**
 * Demande à l'utilisateur un entier entre 2 bornes et retourne cet entier
 * @param {string} message Le message affiché à l'utilisateur dans la boîte de dialogue
 * @param {number} min La borne minimale
 * @param {number} max La borne maximale
 * @returns {number}
 */
function requestInteger(message, min, max)
{
    var integer;

    /*
     * La boucle s'exécute tant que l'entier n'est pas un nombre (fonction isNaN()) et
     * n'est pas compris entre les arguments min et max -> [min,max].
     */
    do
    {
        // On demande à l'utilisateur de saisir un nombre entier.
        integer = parseInt(window.prompt(message));
    }
    while(isNaN(integer) == true || integer < min || integer > max);

    return integer;
}


/*
  getRandomInteger(200,250) doit renvoyer un nombre compris entre 200 et 250 inclus
    Le nombre doit se situer dans l'intervalle [200,250]
      -> 51 possibilités = 250 - 200 + 1

  Pour obtenir une valeur sur ces 51 possibilités :
    51 * tirage aléatoire entre [0,1[
      renvoie une valeur flottante comprise dans l'intervalle [0,51[
      en ramenant au plud grand entier inférieur ou égal, on récupère un entier dans [0,50]

  Exemple :
    Si Math.random() renvoie 0.28
      => 51 * 0.28 = 14.28
    Or, le nombre doit être un entier
      => Math.floor(14.28) -> 14
    Et être compris entre 200 et 250
      => 14 + 200 = 214
*/

/**
 * Tire un entier au hasard et le retourne
 * @param {number} min
 * @param {number} max
 * @returns {number}
 */
function getRandomInteger(min, max)
{
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

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

let result = ThrowDices(5, 10);
console.log(result);


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

let Difficulte = requestInteger("Choisissez votre difficulté: Facile = 1, Normal = 2, Difficile = 3", 1, 3 );

let Game = {};

let PVdragon;
let PVchevalier;

switch(Difficulte){
    case 1:
        PVdragon = 100 + ThrowDices(5, 10);
        PVchevalier = 100 + ThrowDices(10, 10);
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du chevalier sont à " + PVchevalier)
        break;
    case 2 : 
        PVdragon = 100 + ThrowDices(10, 10);
        PVchevalier = 100 + ThrowDices(10, 10);
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du chevalier sont à " + PVchevalier)
        break;
    case 3 :
        PVdragon = 100 + ThrowDices(10, 10);
        PVchevalier = 100 + ThrowDices(7, 10);
        console.log("Les PV du dragon sont à " + PVdragon)
        console.log("Les PV du chevalier sont à " + PVchevalier)
        break;
}


/*****************************LE COMBAT******************************/

function Combat(){
    let ChevalierAttaque = ThrowDices(3, 6);
    let DragonAttaque = ThrowDices(3, 6);

    let dragonInitiative = ThrowDices(10, 6);
    let chevalierInitiative = ThrowDices(10, 6);
       
    switch(Difficulte){
        case 1 : 

        if(chevalierInitiative >= dragonInitiative){
            console.log("Le chevalier a l'initiative il frappe le premier");
                PVdragon = Math.round( PVdragon - ChevalierAttaque);
                console.log("Le chevalier inflige " + ChevalierAttaque + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);

            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVchevalier = Math.round(PVchevalier - (DragonAttaque - (DragonAttaque * ThrowDices(2, 6) / 100)));
                console.log("Le dragon inflige " + Math.round(DragonAttaque - (DragonAttaque * ThrowDices(2, 6) / 100)) + " de dégâts au chevalier")
                console.log("Les PV du chevalier tombe à " + PVchevalier);
        }
            break;

        case 2 :
            if(chevalierInitiative >= dragonInitiative){
                console.log("Le chevalier a l'initiative il frappe le premier");
                PVdragon = Math.round (PVdragon - ChevalierAttaque);
                console.log("Le chevalier inflige " + ChevalierAttaque + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);
            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVchevalier = Math.round(PVchevalier - DragonAttaque);
                console.log("Le dragon inflige " + DragonAttaque + " de dégâts au chevalier")
                console.log("Les PV du chevalier tombe à " + PVchevalier);
            }
            break;

        case 3 :
            if(chevalierInitiative >= dragonInitiative){
                console.log("Le chevalier a l'initiative il frappe le premier");            
                PVdragon = PVdragon - ChevalierAttaque;
                console.log("Le chevalier inflige " + ChevalierAttaque + " de dégâts au dragon");
                console.log("Les PV du dragon tombe à " + PVdragon);
            }else{
                console.log("Le dragon a l'initiative il frappe le premier");
                PVchevalier = Math.round(PVchevalier - (DragonAttaque + (DragonAttaque * ThrowDices(1, 6) / 100)));
                console.log("Le dragon inflige " + Math.round(DragonAttaque + (DragonAttaque * ThrowDices(1, 6) / 100)));
                console.log("Les PV du chevalier tombe à " + PVchevalier);
            }
            break;           
    }       
}

while(PVdragon >= 0 || PVchevalier >= 0){
    Combat();
    if(PVdragon <= 0){
        console.log("Le chevalier à battu le dragon")
        console.log("Vous avez gagné")
    break;
    }else if (PVchevalier <= 0){
        console.log("Le dragon à battu le chevalier");
        console.log("Vous avez perdu");
        break;
    }
}