function RecupererIdCommande(that){

    $.ajax({
        type:"POST",
        url: '../administration/detailscommande.php',
        data : {IDcommande : that.id},
        success: function(data){
            $('#details').html(data);
        }
    });
}

function RecupererIdClient(that){
    $.ajax({
        type:"POST",
        url: '../administration/detailsclients.php',
        data : {IDclient : that.id},
        success: function(data){
            $('#details').html(data);
        }
    });
}


function RecupererIdCommandeProfil(that){
console.log(that.id)
    $.ajax({
        type:"POST",
        url: '../administration/detailscommande.php',
        data : {IDcommande : that.id},
        success: function(data){
            $('#ShowOrderProfil').html(data);
        }
    });
}
