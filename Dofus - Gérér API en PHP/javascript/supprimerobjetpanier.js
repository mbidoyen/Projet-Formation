function RecupObjet(){
    let id = document.getElementById("supprimer").value;
    console.log(id);
    $.ajax({
        type:"POST",
        url:'supprimerunobjet.php',
        data : {id : id},
        success: function(data){
            window.alert(data);
            /*window.location = "equipement.phtml";*/
        }
    });

}

$("button").on("click", RecupObjet);