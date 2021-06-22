'use strict';

/***********************************************************************************/
/* *********************************** DONNEES *************************************/
/***********************************************************************************/

/***********************ALLUMAGE***********************/

let LaunchButton = document.querySelector("#firing-button");
let CancelButton = document.querySelector("#cancel-button");
let ResetButton = document.querySelector("#reset-button");
let index = 10;
let interval;


 function Decompte(){
    LaunchButton.removeEventListener("click",Start);
    FuseeAllumage();
    let Affichage = document.querySelector("span");
    Affichage.textContent = index; 
    index--;
    if(index < 0){
        StopDecompte();
        FuseeDecollage();
    }
    
 }

function StopDecompte(){
    CancelButton.classList.add("disabled");
    LaunchButton.classList.remove("disabled");
    window.clearInterval(interval);
    LaunchButton.addEventListener("click",Start);    
}

CancelButton.addEventListener("click",StopDecompte);

function Start(){
    LaunchButton.classList.add("disabled");
    CancelButton.classList.remove("disabled");
    ResetButton.classList.remove("disabled");
    interval = window.setInterval(Decompte, 1000);;
}

LaunchButton.addEventListener("click",Start);

function ResetDecompte(){
    ResetButton.classList.add("disabled");
    LaunchButton.classList.remove("disabled");
    index = 10;
    let Affichage = document.querySelector("span");
    Affichage.textContent = index;
    FuseeAllumageStop();
    window.clearInterval(interval);
    LaunchButton.addEventListener("click",Start);
}

ResetButton.addEventListener("click",ResetDecompte);

/********************ANIMATION FUSEE****************************/
let Fusee = document.getElementById("rocket");
let src = Fusee.getAttribute("src");

function FuseeAllumage(){
    
 if(src = "images/rocket1.png");
 {
     Fusee.src = "images/rocket2.gif";
 }
}

function FuseeAllumageStop(){
    
    if(src = "images/rocket2.gif")
    {
        Fusee.src = "images/rocket1.png";
    }
}

function FuseeDecollage(){

    if(src = "images/rocket2.gif")
    {
        Fusee.src = "images/rocket3.gif";
        Fusee.classList.add("tookOff");
    }
}



/******************ETOILE****************/


/***********************************************************************************/
/* ********************************** FONCTIONS ************************************/
/***********************************************************************************/



/************************************************************************************/
/* ******************************** CODE PRINCIPAL **********************************/
/************************************************************************************/
