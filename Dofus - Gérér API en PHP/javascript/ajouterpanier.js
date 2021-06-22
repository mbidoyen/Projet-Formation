function RecupObjet(){
    let id = document.getElementById("ajouter").value;
    console.log(id);
    $.ajax({
        type:"POST",
        url:'equipements.php',
        data : {id : id},
        success: function(data){
            window.alert(data);
        }
    });

}

$("#ajouter").on("click", RecupObjet);



function RecupPets(){
    let id = document.getElementById("pets").value;
    console.log(id);
    $.ajax({
        type:"POST",
        url:'pets.php',
        data : {id : id},
        success: function(data){
            window.alert(data);
        }
    });

}

$("#pets").on("click", RecupPets);